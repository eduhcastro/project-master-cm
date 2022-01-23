/*
|--------------------------------------------------------------------------
| App 
|--------------------------------------------------------------------------
|
| This is the main entry point for the application.
*/

/**
 * Modules External
 */
const { app, session, BrowserWindow, globalShortcut, Menu, Notification, dialog } = require('electron');
const { autoUpdater } = require("electron-updater");
const contextMenu = require('electron-context-menu');
const Alert = require("electron-alert");
const axios = require('axios').default;
const pkg = require('getmac');
require('dotenv').config()


/**
 * Modules Internal
 */
const Store = require('./core/store');


/*
|--------------------------------------------------------------------------
| Global Variables & Constants
|--------------------------------------------------------------------------
*/

/**
 * ErrorObject
 * @type {Object}
 * @description Error to be used in the application, Mac Address is not found
 */
const ErrorObject = {
	type: 'error',
	defaultId: 2,
	title: 'Invalid',
	message: 'Sistema não permitido',
	detail: 'Entrada Invalida, sistema não permitido',
};


const TEMPLATE = [];


let mainWindow;


console.log({ MAC: pkg.default() });



/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
*/

/**
 * CheckMac
 * @description Check if the mac is registered in the database - Admin
 * @returns {string}
 */
async function CheckMac() {
	return await axios.get('http://localhost/client/mac?address=' + pkg.default())
		.then((response) => {
			return response
		})
		.catch((response) => {
			return response
		})
}

/*
|--------------------------------------------------------------------------
| Event Listeners
|--------------------------------------------------------------------------
*/
contextMenu({
	showSaveImageAs: true
});


if (process.platform !== "darwin") {
	app.commandLine.appendSwitch('high-dpi-support', "1");
}


app.commandLine.appendSwitch("--enable-npapi");
app.commandLine.appendSwitch('disable-site-isolation-trials');
app.commandLine.appendSwitch('no-sandbox');
app.commandLine.appendSwitch('ignore-certificate-errors', 'true');
app.commandLine.appendSwitch('allow-insecure-localhost', 'true');

let sendWindow = (identifier, message) => {
	mainWindow.webContents.send(identifier, message);
};


/**
 * store
 * @description Store object to be used in the application
 */
const store = new Store({
	configName: 'user-preferences',
	defaults: {
		windowBounds: { width: 1280, height: 720, max: false }
	}
});


/**
 * menu
 * @description Menu object to be used in the application
 */
const menu = Menu.buildFromTemplate(TEMPLATE);
Menu.setApplicationMenu(menu);


/*
|--------------------------------------------------------------------------
| App Events
|--------------------------------------------------------------------------
*/

app.on("ready", () => {

	/**
	 * Process on exit
	 * @description Process on exit by Exception
	 * @param {Object} event
	 * @param {Object} exitCode
	 * @param {Object} signal
	 * @returns {void}
	 * @private
	 */
	process.on(
		"uncaughtException",
		Alert.uncaughtException(false, err => {
			console.error("Uncaught Exception:", err);
			app.exit(1);
		}, true, true)
	);
});


app.on('ready', async () => {

	let { width, height, isMax } = store.get('windowBounds');

	if (width < 100 || height < 100) {
		width = 800;
		height = 500;
	}

	mainWindow = new BrowserWindow({
		width: width,
		height: height,
		frame: false,
		show: false,
		backgroundColor: '#202124',
		webPreferences: {
			nodeIntegration: true,
			webviewTag: true,
			plugins: true,
			additionalArguments: ['filePath']
		}
	});


	const url = require('url').format({
		protocol: 'file',
		slashes: true,
		pathname: require('path').join(__dirname, '/view/index.html')
	})

	mainWindow.loadURL(url)



	//	mainWindow.loadURL(`/view/index.html`);
	//console.log(Teste)
	//
	// Modify the user agent for all requests to the following urls.
	const filter = {
		urls: ['https://*.darkorbit.com/*']
	}
	mainWindow.webContents.session.webRequest.onBeforeSendHeaders(filter, (details, callback) => {
		//details.url
		details.requestHeaders['X-APP'] = app.getVersion();
		details.requestHeaders['User-Agent'] = 'BigpointClient/1.4.6';
		callback({ requestHeaders: details.requestHeaders })
	});

	sendWindow("version", app.getVersion());

	mainWindow.on('closed', () => {
		mainWindow = null;
	});




	mainWindow.once('ready-to-show', () => {
		if (isMax) {
			if (process.platform === "win32") {
				mainWindow.maximize();

			}
			else {
				mainWindow.setFullScreen(true)
			}


		}
		mainWindow.show()
	})


	// Upper Limit is working of 500 %
	mainWindow.webContents.setVisualZoomLevelLimits(1, 5).then().catch((err) => console.log(err));


	mainWindow.on('resize', () => {
		var isMax = mainWindow.isMaximized() || mainWindow.isFullScreen()

		if (isMax) {
			let { width, height, max } = store.get('windowBounds');
			store.set('windowBounds', { width, height, isMax });
		}
		else {
			let { width, height } = mainWindow.getBounds();
			store.set('windowBounds', { width, height, isMax });
		}

	});

	/*
	|--------------------------------------------------------------------------
	| Shortcuts
	|--------------------------------------------------------------------------
	*/

	globalShortcut.register("CTRL+SHIFT+I", () => {
		mainWindow.webContents.openDevTools();
	});

	globalShortcut.register("CmdOrCtrl+=", () => {
		console.log("CmdOrCtrl+");
		mainWindow.webContents.zoomFactor = mainWindow.webContents.getZoomFactor() + 0.2;
	});
	globalShortcut.register("CmdOrCtrl+-", () => {
		mainWindow.webContents.zoomFactor = mainWindow.webContents.getZoomFactor() - 0.2;
	});

	globalShortcut.register("CTRL+SHIFT+F10", () => {
		let session = mainWindow.webContents.session;
		session.clearCache();
		app.relaunch();
		app.exit();
	});

	/**
	 * setTimeOut - Check Mac
	 */
	setTimeout(async () => {

		/**
		 * Check Mac
		 * @description Check Mac in 10 seconds
		 * @void
		 */
		await CheckMac().then(data => {
			if (!data.data?.status) {
				dialog.showMessageBox(null, ErrorObject)
				setTimeout(() => {
					app.exit(1);
				}, 1000);
			}
		})
	}, 1000);


	mainWindow.webContents.zoomFactor = 1;
	autoUpdater.checkForUpdatesAndNotify();


});

app.on('open-file', (event, path) => {
	event.preventDefault();
});



app.on('window-all-closed', () => {
	if (process.platform !== 'darwin') {
		app.quit();
	}
});

autoUpdater.on('checking-for-update', () => {
	sendWindow('checking-for-update', '');
});

autoUpdater.on('update-available', () => {
	sendWindow('update-available', '');
});

autoUpdater.on('update-not-available', () => {
	sendWindow('update-not-available', '');
});

autoUpdater.on('error', (err) => {
	sendWindow('error', 'Error: ' + err);
});

autoUpdater.on('download-progress', (d) => {
	sendWindow('download-progress', {
		speed: d.bytesPerSecond,
		percent: d.percent,
		transferred: d.transferred,
		total: d.total
	});
});

autoUpdater.on('update-downloaded', () => {
	sendWindow('update-downloaded', 'Update downloaded');
	autoUpdater.quitAndInstall();
});


// DECRAPTED --
//if (pkg.isMAC(pkg.default())) {
//	//throw new Error('Entrada Invalida, Sistema não permitido');
//}




