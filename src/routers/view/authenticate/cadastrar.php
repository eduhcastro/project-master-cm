<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="cache-control" content="no-cache">
  <meta name="description" content="Point Blank ücretsiz; Türkçe, İngilizce ve Arapça içeriğe sahip olan ve bu dillerde destek sağlayan ülkenin en kaliteli MMOFPS oyunudur. En gerçekçi vuruş hissini, onlarca silah ve harita seçeneklerinde, çekişmeli eSpor turnuvalarıyla milyonlarca oyuncu ile yaşamak istiyorsanız, doğru tercih Point Blank TAM!">
  <meta name="csrf-token" content="6Hpe20Cpsv0igkMyGljetjTp3qD4NjEBU4v5JcfU">
  <link rel="icon" href="/favicon.ico" type="image/x-icon" />
  <title>Point Blank Kayıt - TAM Game</title>
  <link rel="stylesheet" href="/template/css/authenticate/app.css?id=52febf5284875d7c8acb">
  <link rel="stylesheet" href="/template/css/authenticate/new-register.css?id=677924750f7d40c6f93b">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  <style type="text/css">
    .register-form form li select,
    .register-form form li input {}

    .register-form .check_agree label {}
  </style>
  <style type="text/css">
    body {
      background: url(/template/images/auth/banner_event.jpg) top center no-repeat #000;
    }
  </style>
</head>

<body>
  <div class="container ">
    <div class="logo">
      <img src="/template/images/auth/pointblank_logo_beyaz.png" alt="Point Blank" class="img-fluid">
    </div>
    <div class="contents">
      <div class="row">
        <div class="col-12">
          <div class="event-detail">
            <style>
              .gifts img {
                border-radius: 5px;
              }

              .contents .row:first-child {
                display: none;
              }

              .contents .row:last-child {
                margin-top: 40px;
              }

              .download-here {
                display: none;
                position: fixed;
                left: 10px;
                bottom: -85px;
              }
            </style>
          </div>
        </div>
      </div>
      <div class="row ">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="register-form">
            <h1>BEM VINDO AO <br>POINT BLANK CASTROMS</h1>
            <form name="userForm" id="userForm" class="form dev_check_enter" onsubmit="return formSend();">
              <input type="hidden" name="_token" value="6Hpe20Cpsv0igkMyGljetjTp3qD4NjEBU4v5JcfU"> <input type="hidden" name="querystring" id="querystring" value="" />


              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
                <input type="text" id="userid" name="userid" class="form-control" title="E-posta Adresinizi Girin" placeholder="Usuario" value="">
              </div>

              <p class="notice_txt" id="notice_txt_userid"></p>

              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
                <input type="email" id="useremail" name="useremail" class="form-control" title="E-posta Adresinizi Girin" placeholder="Email" value="">
              </div>

              <p class="notice_txt" id="notice_txt_useremail"></p>

              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-key"></i>
                  </span>
                </div>
                <input type="password" id="password" name="password" class="form-control" title="Şifrenizi Girin" placeholder="Senha">
                <div class="input-group-append show-password">
                  <label class="input-group-text">
                    <i class="fas fa-eye-slash"></i>
                  </label>
                </div>
              </div>
              <p class="notice_txt" id="notice_txt_password"></p>
              <div class="input-group">
                <div class="input-group-append">
                  <label class="input-group-text">
                    <i class="fas fa-globe-asia"></i>
                  </label>
                </div>
                <select class="form-control" id="secretas" name="secretas">
                  <option value="" selected="selected">Pergunta Secreta</option>
                  <?php foreach (SECRET_QUESTIONS as $Pergunta => $Quest) {
                    echo '<option value="' . array_search($Quest, SECRET_QUESTIONS) . '">' . $Quest . '</option>';
                  } ?>

                </select>
              </div>
              <p class="notice_txt" id="notice_txt_secretas"></p>


              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
                <input type="text" id="resposta" name="resposta" class="form-control" title="E-posta Adresinizi Girin" placeholder="Resposta Da Pergunta Secreta" value="">
              </div>
              <p class="notice_txt" id="notice_txt_resposta"></p>
              <div class="check_agree">


                <div class="form-check">
                  <input class="form-check-input" name="join_agree" type="checkbox" value="1" id="join_agree">
                  <label class="form-check-label" for="join_agree"><a href="//www.tamgame.com/policy/customer.do" target="_blank">Eu li os termos do </a>, <a href="//www.tamgame.com/policy/privacy.do" target="_blank">E estou ciente de todas as </a> Responsabilidades <a href="//www.tamgame.com/policy/manner.do" target="_blank">e do que</a> se trata.</label>
                </div>
              </div>
              <div class="form-group capcha">
                <div class="enter_capcha">
                  <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=pt"></script>
                  <div class="g-recaptcha" data-sitekey="6LdbH-kcAAAAAIXyV0wLgtAUaDHLzNONy5BYrjOb" data-theme="light" style="margin: 0 auto;display: table">
                  </div>
                </div>
              </div>
              <p class="notice_txt" id="notice_txt_capcha"></p>
              <button type="button" id="btnSubmit" class="submit-form" onclick="javascript:sendIt();">Cadastrar</button>
              <a href="login" target="_blank" class="download-game"><i class="fas fa-sign-in-alt"></i> Já sou cadastrado</a>

            </form>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="gifts">

            <img src="/template/images/auth/starterpack400x600-TR.png" alt="Point Blank Kayıt - TAM Game" class="img-fluid">
          </div>
        </div>


      </div>

    </div>
  </div>
  <script src="/js/app.js?id=4a49fc85d45c02c4113c"></script>
  <!-- Global site tag (gtag.js) - Google Ads: 740032863 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-740032863"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-740032863');
    gtag('config', 'UA-46612030-8');
    gtag('config', 'UA-100070945-1');
    gtag('config', 'AW-529534602');
  </script>
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
  <!-- Google Analytics Remarketing Code -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-797572607"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'AW-797572607');
  </script>
  <!-- End Google Analytics Remarketing Code -->

  <script type="text/javascript">
    $('.register-form input').keypress(function(e) {
      if (e.which == 13) {
        sendIt();
        return false;
      }
    });

    function drawMsg(key, str) {
      $("#notice_txt_" + key).html(str).fadeIn();
    }



    $(document).ready(function() {
      //document.title = "title.site.register.title";
      $('#userid').keyup(function(evt) {
        if (evt.keyCode == 13) {
          return false;
        }
      });
      $('.notice_txt').hide();
    });
  </script>
  <script type="text/javascript">
    var focusId = "";
    var errorCount = 0;

    function formSend() {
      sendIt();
      return false;
    }

    function sendIt() {
      focusId = "";
      errorCount = 0;

      $('.notice_txt').hide();
      setSubmitBlock(true);

      if ($('#countryCode').val() == "") {
        drawMsg("countryCode", "Lütfen ülkenizi seçin.");
        if (focusId == "") focusId = "countryCode";
        errorCount++;
      }

      var regEng = /[a-zA-Z]/g;
      var regPwd = /[^a-zA-Z0-9~`!@#$%^&*()_\-+={}[\]|\\;:'""<>,.?/]/g;
      var regNum = /[0-9]/g;
      var regEng = /[a-zA-Z]/g;
      var regExp = /^[A-Za-z0-9]{1}([-_.]|[A-Za-z0-9]){4,15}$/;
      var regEmail = /^[0-9a-zA-Z]([-_\.]*[0-9a-zA-Z]*)*@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;

      if ($.trim($("#userid").val()) == "") {
        drawMsg("userid", "Insira um login valido.");
        if (focusId == "") focusId = "userid";
        errorCount++;
      } else if ($.trim($("#userid").val()).length < 5 || $.trim($("#userid").val()).length > 16) {
        drawMsg("userid", "Deve ter no minino 5 caracteres, ou menor que 16.");
        if (focusId == "") focusId = "userid";
        errorCount++;
      } else if (!$('#userid').val().match(regExp) || !$('#userid').val().match(regEng)) {
        drawMsg("userid", "O ID deve ser composto por letras e números (A-Z, 0-9). Você pode incluir sublinhados (_), hifens (-) e pontos (.). O ID deve começar e terminar com alfabeto ou número e conter pelo menos um alfabeto.");
        if (focusId == "") focusId = "userid";
        errorCount++;
      }

      if ($.trim($("#useremail").val()) == "") {
        drawMsg("useremail", "Insira um email valido.");
        if (focusId == "") focusId = "useremail";
        errorCount++;
      } else if ($.trim($("#useremail").val()).length < 6 || $.trim($("#userid").val()).length > 60) {
        drawMsg("useremail", "Digite de 6 a 60 caracteres para o e-mail.");
        if (focusId == "") focusId = "useremail";
        errorCount++;
      } else if (!$('#useremail').val().match(regEmail)) {
        drawMsg("useremail", "O endereço de e-mail que você é invalido");
        if (focusId == "") focusId = "useremail";
        errorCount++;
      }

      if ($("#password").val().trim().length < 6 || $("#password").val().trim().length > 60) {
        drawMsg("password", "Coloque uma senha valida!");
        if (focusId == "") focusId = "password";
        errorCount++;
      }

      if ($.trim($("#resposta").val()) == "") {
        drawMsg("resposta", "Coloque uma resposta valida!");
        if (focusId == "") focusId = "resposta";
        errorCount++;
      } else if (!$('#resposta').val().match(regExp) || !$('#resposta').val().match(regEng)) {
        drawMsg("resposta", "A Reposta deve ser composta por letras e números (A-Z, 0-9). Você pode incluir sublinhados (_), hifens (-) e pontos (.). O ID deve começar e terminar com alfabeto ou número e conter pelo menos um alfabeto.");
        if (focusId == "") focusId = "resposta";
        errorCount++;
      }

      var checkid = $("#userid").attr("checkid");

      if ($.trim(checkid) != "" && checkid != "1") {
        drawMsg("userid", "Girilen eposta adresi ile hesap mevcut!");
        if (focusId == "") focusId = "userid";
        errorCount++;
      }

      formSubmit();

    }

    function setSubmitBlock(stat) {
      if (stat) {
        $("#btnSubmit").attr("disabled", "true");
        //$(".loding").show();        //$("#loading_progress").show();
      } else {
        $("#btnSubmit").removeAttr("disabled");
        //$(".loding").hide();        //$("#loading_progress").hide();
      }
    }

    function formSubmit() {

      if ($.trim($("#g-recaptcha-response").val()) == "") {
        drawMsg("capcha", "Complete o reCAPTCHA");
        errorCount++;
      }

      if ($.trim(focusId) != "") $('#' + focusId).focus();
      if (errorCount > 0) {
        setSubmitBlock(false);
        return;
      }

      if (errorCount > 0) {
        setSubmitBlock(false);
        return;
      }

      $.ajax({
        url: "/user/register",
        type: "POST",
        dataType: 'json',
        data: {
          username: $("#userid").val(),
          password: $("#password").val(),
          email: $("#useremail").val(),
          quest: {
            answer: $("#resposta").val(),
            question: $("#secretas").val()
          },
          g_recaptcha_response: $("#g-recaptcha-response").val(),
        },
        success: function(data) {
          if (data.status) {
            setSubmitBlock(false);
            window.location.href = "/authenticate/finish";
          } else {
            setSubmitBlock(false);
            if (data.msg == "Invalid reCAPTCHA") {
              drawMsg("capcha", "refaça o reCAPTCHA");
            } else {
              drawMsg("capcha", data.msg);
            }
            grecaptcha.reset();
          }
        }
      });

      console.log("submit");
      //var frm = $("#userForm");
      //frm.attr("method", "POST");
      //frm.attr("onsubmit", "return true");
      ////setSubmitBlock(false);
      ////console.log(frm.serialize());
      //frm.submit();
    }

    function cbEnter() {
      sendIt();
    }

    $(document).ready(function() {
      $(".show-password").click(function() {
        input = $(this).prev('input');
        icon = $(this).find('i');
        if (input.attr('type') == 'password') {
          input.attr('type', 'text');
          icon.attr('class', 'fas fa-eye');
        } else {
          input.attr('type', 'password');
          icon.attr('class', 'fas fa-eye-slash');
        }
      });
    });
  </script>
</body>

</html>