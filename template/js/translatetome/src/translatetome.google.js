"use restrict";

let comboGoogleTradutor = null;
let langsSeted = null;

function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    includedLanguages: langsSeted,
    layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
  }, 'google_translate_element');
  comboGoogleTradutor = document.getElementById("google_translate_element").querySelector(".goog-te-combo");
}

const TranslateToMe = {
  loadResponsive: function () {
    // Open modal show
    document.getElementsByTagName("akm")[0].addEventListener("click", function () {
      console.log("click")
      document.querySelectorAll(".yuHFGkiOEFCADwsQGsOE.PhBqvfkp")[0].classList.add("show")
    })

    // Close modal show
    document.querySelectorAll(".vlOXsRZG.apJZTsAb.sZPanrSdXu.lksoO.yuHFGkiOEFCADwsQGsOE-close-button")[0].addEventListener("click", function () {
      document.querySelectorAll(".yuHFGkiOEFCADwsQGsOE.PhBqvfkp")[0].classList.remove("show")
    })


  },
  createMenu: (a, b, c) => {

    const menu = document.createElement("div");
    menu.classList.add("yuHFGkiOEFCADwsQGsOE", "PhBqvfkp");
    document.getElementsByTagName("body")[0].firstElementChild.nextSibling.parentNode.insertBefore(menu, document.getElementsByTagName("body")[0].firstElementChild.nextSibling);


    const google_translate_element = document.createElement("div");
    google_translate_element.setAttribute("id", "google_translate_element");
    google_translate_element.style.display = "none";
    document.getElementsByTagName("body")[0].firstElementChild.nextSibling.parentNode.insertBefore(google_translate_element, document.getElementsByTagName("body")[0].firstElementChild.nextSibling);

    const menuButton = document.createElement("aKm");
    menuButton.classList.add("yuHFGkiOEFCADwsQGsOE-button", "sZPanrSdXu", "BMcznCDYQi", "TMJxx", "KnYjs");
    menu.appendChild(menuButton);

    const menuButtonIcon = document.createElement("i");
    menuButtonIcon.classList.add("KnYjs");
    menuButton.appendChild(menuButtonIcon);

    const menuButtonIconImage = document.createElement("img");
    menuButtonIconImage.classList.add("iMmG");
    menuButtonIconImage.src = "https://static-s.aa-cdn.net/img/ios/1498719723/760c3afcb1512207c0d4414df94c4892?v=1";
    menuButtonIconImage.style.width = "35px";
    menuButtonIcon.appendChild(menuButtonIconImage);

    const menuComponent1 = document.createElement("div");
    menuComponent1.classList.add("qVLYQoK", "voxjkzH", "MgIjWWt");
    menu.appendChild(menuComponent1);

    const menuComponent1_header = document.createElement("div");
    menuComponent1_header.classList.add("qVLYQoK-header", "eQzny", "dTqcp", "lQsTHksX");
    menuComponent1.appendChild(menuComponent1_header);

    const menuComponent1_header_title = document.createElement("div");
    menuComponent1_header_title.classList.add("Dwujaiqm");
    menuComponent1_header.appendChild(menuComponent1_header_title);

    const menuComponent1_header_title_h5 = document.createElement("kpsfc");
    menuComponent1_header_title_h5.classList.add("notranslate", "f6cR", "jO2s", "h600", "h5_h5", "bxsJg", "gGGdY");
    menuComponent1_header_title_h5.innerHTML = "TranslateToMe Configurator";
    menuComponent1_header_title.appendChild(menuComponent1_header_title_h5);

    const menuComponent1_header_title_p = document.createElement("pFkmX");
    menuComponent1_header_title_p.classList.add("notranslate", "f6cR", "jO2s");
    menuComponent1_header_title_p.innerHTML = "See our language options.";
    menuComponent1_header_title.appendChild(menuComponent1_header_title_p);

    const menuComponent1_header_options = document.createElement("div");
    menuComponent1_header_options.classList.add("fyatDgOW", "ltZbZ");
    menuComponent1_header.appendChild(menuComponent1_header_options);

    const menuComponent1_header_options_button = document.createElement("button");
    menuComponent1_header_options_button.classList.add("vlOXsRZG", "apJZTsAb", "sZPanrSdXu", "lksoO", "yuHFGkiOEFCADwsQGsOE-close-button");
    menuComponent1_header_options.appendChild(menuComponent1_header_options_button);

    const menuComponent1_header_options_button_image_close = document.createElement("img");
    menuComponent1_header_options_button_image_close.classList.add("iMmG");
    menuComponent1_header_options_button_image_close.src = "https://img.icons8.com/material-outlined/24/000000/delete-sign.png";
    menuComponent1_header_options_button_image_close.style.width = "20px";
    menuComponent1_header_options_button.appendChild(menuComponent1_header_options_button_image_close);

    const menuComponent1_hr = document.createElement("hRAmOP");
    menuComponent1_hr.classList.add("pcwCtswS", "dark", "gekfe");
    menuComponent1.appendChild(menuComponent1_hr);

    const menuComponent1_body = document.createElement("div");
    menuComponent1_body.classList.add("qVLYQoK-body", "ECSnZoO", "fXxpLtj");
    menuComponent1.appendChild(menuComponent1_body);

    const menuComponent1_body_title1 = document.createElement("div");
    menuComponent1_body.appendChild(menuComponent1_body_title1);

    const menuComponent1_body_title1_h6 = document.createElement("KaXMsf");
    menuComponent1_body_title1_h6.classList.add("notranslate", "f6cR", "gGGdY");
    menuComponent1_body_title1_h6.innerHTML = "Languages";
    menuComponent1_body_title1.appendChild(menuComponent1_body_title1_h6);

    const menuComponent1_body_a_lengagues = document.createElement("aKm");
    menuComponent1_body_a_lengagues.classList.add("switch-trigger", "background-color");
    menuComponent1_body_a_lengagues.setAttribute("href", "javascript:void(0)");
    menuComponent1_body.appendChild(menuComponent1_body_a_lengagues);

    const menuComponent1_body_a_lengagues_list = document.createElement("div");
    menuComponent1_body_a_lengagues_list.classList.add("badge-colors", "rECgD", "tnvsodHB");
    menuComponent1_body_a_lengagues.appendChild(menuComponent1_body_a_lengagues_list);

    a.forEach(lang => {
      if(typeof b[lang] !== "undefined") {
        let dinamic_element = document.createElement("img");
        dinamic_element.classList.add("iMmG", "OAIbXXx");
        dinamic_element.src = b[lang]["img"];
        dinamic_element.setAttribute("onclick", "TranslateToMe.actions.changeLangue('" + lang + "')");
        menuComponent1_body_a_lengagues_list.appendChild(dinamic_element);
      }else{
        console.warn("[TranslateToMe] Invalid language " + lang);
      }
    })

    const menuComponent1_body_a_lengagues_list_cancel = document.createElement("img");
    menuComponent1_body_a_lengagues_list_cancel.classList.add("iMmG");
    menuComponent1_body_a_lengagues_list_cancel.classList.add("OAIbXXx");
    menuComponent1_body_a_lengagues_list_cancel.src = b["cancel"]["img"];
    menuComponent1_body_a_lengagues_list_cancel.setAttribute("onclick", "TranslateToMe.actions.changeLangue('cancel')");
    menuComponent1_body_a_lengagues_list.appendChild(menuComponent1_body_a_lengagues_list_cancel);


    if (c) {
      const menuComponent1_body_title2 = document.createElement("div");
      menuComponent1_body_title2.classList.add("zPRyU", "xYPoa", "uZRzl");
      menuComponent1_body.appendChild(menuComponent1_body_title2);

      const menuComponent1_body_title2_h6 = document.createElement("KaXMsf");
      menuComponent1_body_title2_h6.classList.add("notranslate", "f6cR", "gGGdY");
      menuComponent1_body_title2_h6.innerHTML = "Save configuration";
      menuComponent1_body_title2.appendChild(menuComponent1_body_title2_h6);

      const menuComponent1_body_check_form = document.createElement("div");
      menuComponent1_body_check_form.classList.add("form-check", "hmQEjrGdLt", "uuEUN", "xYPoa", "uZRzl");
      menuComponent1_body.appendChild(menuComponent1_body_check_form);

      const menuComponent1_body_check_form_input = document.createElement("input");
      menuComponent1_body_check_form_input.classList.add("lvPwwpGCui", "cnWVE", "npMtH");
      menuComponent1_body_check_form_input.setAttribute("onclick", "darkMode(this)");
      menuComponent1_body_check_form_input.setAttribute("type", "checkbox");
      menuComponent1_body_check_form_input.setAttribute("id", "darkMode");
      menuComponent1_body_check_form.appendChild(menuComponent1_body_check_form_input);

    }
    const menuComponent1_body_hr2 = document.createElement("hRAmOP");
    menuComponent1_body_hr2.classList.add("pcwCtswS", "dark", "abFMz");
    menuComponent1_body.appendChild(menuComponent1_body_hr2);

    const menuComponent1_body_footer = document.createElement("div");
    menuComponent1_body_footer.classList.add("iEYAnUXW", "thyGlOFO");
    menuComponent1_body_footer.style.position = "absolute";
    menuComponent1_body_footer.style.bottom = "5px";
    menuComponent1_body_footer.style.left = "0px";
    menuComponent1_body.appendChild(menuComponent1_body_footer);

    const menuComponent1_body_footer_span = document.createElement("span");
    menuComponent1_body_footer.appendChild(menuComponent1_body_footer_span);

    const menuComponent1_body_footer_h6 = document.createElement("KaXMsf");
    menuComponent1_body_footer_h6.classList.add("notranslate", "f6cR", "bxsJg");
    menuComponent1_body_footer_h6.innerHTML = "@github/skillerm ❤️";
    menuComponent1_body_footer_span.appendChild(menuComponent1_body_footer_h6);

    const menuComponent1_div1 = document.createElement("div");
    menuComponent1_div1.classList.add("ZahnKMDa-x");
    menuComponent1_div1.style.left = "0px";
    menuComponent1_div1.style.bottom = "0px";
    menuComponent1.appendChild(menuComponent1_div1);

    const menuComponent1_div1_div = document.createElement("div");
    menuComponent1_div1_div.classList.add("OAAoAPkU-x");
    menuComponent1_div1_div.style.left = "0px";
    menuComponent1_div1_div.style.width = "0px";
    menuComponent1_div1_div.setAttribute("tabindex", "0");
    menuComponent1_div1.appendChild(menuComponent1_div1_div);

    const menuComponent1_div2 = document.createElement("div");
    menuComponent1_div2.classList.add("ZahnKMDa-y");
    menuComponent1_div2.style.right = "0px";
    menuComponent1_div2.style.top = "0px";
    menuComponent1.appendChild(menuComponent1_div2);

    const menuComponent1_div2_div = document.createElement("div");
    menuComponent1_div2_div.classList.add("OAAoAPkU-y");
    menuComponent1_div2_div.style.height = "0px";
    menuComponent1_div2_div.style.top = "0px";
    menuComponent1_div2_div.setAttribute("tabindex", "0");
    menuComponent1_div2.appendChild(menuComponent1_div2_div);

    const menuComponent1_div3 = document.createElement("div");
    menuComponent1_div3.classList.add("ps__rail-x");
    menuComponent1_div3.style.left = "0px";
    menuComponent1_div3.style.top = "0px";
    menuComponent1.appendChild(menuComponent1_div3);

    const menuComponent1_div3_div = document.createElement("div");
    menuComponent1_div3_div.classList.add("ps__thumb-x");
    menuComponent1_div3_div.style.left = "0px";
    menuComponent1_div3_div.style.width = "0px";
    menuComponent1_div3.appendChild(menuComponent1_div3_div);

    const menuComponent1_div4 = document.createElement("div");
    menuComponent1_div4.classList.add("ps__rail-y");
    menuComponent1_div4.style.left = "0px";
    menuComponent1_div4.style.top = "0px";
    menuComponent1.appendChild(menuComponent1_div4);

    const menuComponent1_div4_div = document.createElement("div");
    menuComponent1_div4_div.classList.add("ps__thumb-y");
    menuComponent1_div4_div.style.top = "0px";
    menuComponent1_div4_div.style.height = "0px";
    menuComponent1_div4.appendChild(menuComponent1_div4_div);

  },
  attributes : {
    getPath: function() {
      let scr = document.querySelectorAll('[data-load="on"]')[0];
      if(typeof scr === "undefined") {
        console.warn("[TranslateToMe] Invalid script loaded");
        return;
      }
      return scr.src.split("translatetome.google.js")[0];
    }
  },
  loadComponents: {
    styles: function () {
      const styles = document.createElement('link');
      styles.rel = 'stylesheet';
      styles.href = TranslateToMe.attributes.getPath()+'translatetome.google.css';
      document.head.appendChild(styles);
    },
    flags: async function () {
      const flag = await fetch(TranslateToMe.attributes.getPath()+'translatetome.flags.json')
      const flagJson = await flag.json()
      return flagJson
    },
    scripts: function () {
      var googleTranslateScript = document.createElement('script');
      googleTranslateScript.type = 'text/javascript';
      googleTranslateScript.async = true;
      googleTranslateScript.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(googleTranslateScript);
    },
    setLanguages: function (langs) {
      let Langs = "";
      for (let i = 0; i < langs.length; i++) {
        Langs += `${langs[i]},`
      }
      Langs = Langs.substring(0, Langs.length - 1);
      return Langs
    }
  },
  actions: {
    changeEvent: function (el) {
      if (el.fireEvent) {
        el.fireEvent('onchange');
      } else {
        var evObj = document.createEvent("HTMLEvents");
        evObj.initEvent("change", false, true);
        el.dispatchEvent(evObj);
      }
    },
    changeLangue: function (sigla) {
      if (sigla == "cancel") {
        return
      }
      if (comboGoogleTradutor) {
        comboGoogleTradutor.value = sigla;
        TranslateToMe.actions.changeEvent(comboGoogleTradutor);
      }
      document.getElementById(':1.container').style.display = 'none'
      document.getElementsByTagName("body")[0].removeAttribute("style")
    }
  },

  init: class {
    constructor({
      languages = [],
      defaultLanguage = '',
      saveLanguage = false,
    }) {
      this.languages = languages;
      this.defaultLanguage = defaultLanguage;
      langsSeted = TranslateToMe.loadComponents.setLanguages(languages);
      TranslateToMe.loadComponents.scripts();
      TranslateToMe.loadComponents.styles();
      TranslateToMe.loadComponents.flags().then(flagJson => {
        TranslateToMe.createMenu(languages, flagJson, saveLanguage);
        TranslateToMe.loadResponsive();

      });
    }
    changeLanguage(sigla) {
      TranslateToMe.actions.changeLangue(sigla);
    }
  }
}