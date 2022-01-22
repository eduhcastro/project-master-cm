<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="description" content="TAM Game">
    <meta name="csrf-token" content="T3prvSIj4jqVmJm1r324ludiSnmRVAffu5gRsYWT">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <title>TAM Game</title>
    <link rel="stylesheet" href="/template/css/authenticate/app.css?id=52febf5284875d7c8acb">
    <link rel="stylesheet" href="/template/css/authenticate/new-register.css?id=677924750f7d40c6f93b">
    <style type="text/css">
        body {
            background: url(/template/images/auth/banner_event.jpg) top center no-repeat #000;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 register-result-new">
                <div class="logo text-center">
                    <a href="https://pb.tamgame.com" target="_blank" onclick="gtag('event', 'click', {'event_category': 'PB Register Result Page - EN', 'event_label': 'Point Blank Logo'});">
                        <img src="/template/images/auth/pointblank_logo_beyaz.png" alt="Point Blank" class="img-fluid">
                    </a>
                </div>
                <div class="content">
                    <h1 class="welcome">
                        Soldier of Point Blank! Welcome!
                    </h1>
                    <div class="rewards">
                        <img src="/template/images/auth/sp-result-1120-en.jpg" alt="Rewards" class="img-fluid d-block mt-2">
                        <div class="w-100"></div>
                        <a class="download" href="https://zpt-tr.zepetto.com/TR/Pointblank_TAM_20200910.exe">
                            Download and Start Playing!
                        </a>
                    </div>

                    <div class="validate-email row no-gutters">
                        <div class="col-12 col-md-10 text">
                            Verify Your Mail & Earn Your <strong>Verification Reward!</strong>
                        </div>
                        <div class="col-12 col-md-2 go-home">
                            <a href="/" target="_blank" onclick="gtag('event', 'click', {'event_category': 'PB Register Result Page - EN', 'event_label': 'Go to PB Website'});">
                                <img src="/template/images/auth/ico-home.png" alt="Go to Website">Go to Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="/template/images/auth/en/download-here.png" class="download-here">
    <script src="/js/app.js?id=4a49fc85d45c02c4113c"></script>
    <script>
        $(document).ready(function() {
            $('.download').on('click', function() {
                $('.download-here').fadeIn(2000);
            });
        });
    </script>
    <!-- Google Analytics Remarketing Code -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-740032863"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-740032863');
        gtag('config', 'AW-797572607');
        gtag('config', 'UA-46612030-8');
        gtag('config', 'UA-100070945-1');
    </script>
    <!-- End Google Analytics Remarketing Code -->

    <!-- Event snippet for MCC Tam Game Point Blank Sign Up conversion page -->
    <!-- Event snippet for Kayit-Tesekkurler conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-740032863/hVoRCNv8gKEBEN-C8OAC'
        });
        gtag('event', 'conversion', {
            'send_to': 'AW-797572607/v0qlCOSzxYUBEP_7p_wC'
        });
        gtag('event', 'conversion', {
            'send_to': 'AW-529534602/7MUaCKa0pOsBEIqdwPwB'
        });
    </script>
    <!-- Adform Tracking Code BEGIN -->
    <script type="text/javascript">
        window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : (window._adftrack ? [window._adftrack] : []);
        window._adftrack.push({
            pm: 1479566,
            divider: encodeURIComponent('|'),
            pagename: encodeURIComponent('TamGame|PointBlank|SignUp|ThankYou')
        });
        (function() {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = 'https://track.adform.net/serving/scripts/trackpoint/async/';
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })();
    </script>
    <noscript>
        <p style="margin:0;padding:0;border:0;">
            <img src="https://track.adform.net/Serving/TrackPoint/?pm=1479566&ADFPageName=WebsiteName|SectionName|SubSection|PageName&ADFdivider=|" width="1" height="1" alt="" />
        </p>
    </noscript>
    <!-- Adform Tracking Code END -->
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1106763092725273');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1106763092725273&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
</body>

</html>