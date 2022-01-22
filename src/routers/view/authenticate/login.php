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
  <link rel="icon" href="/favicon.ico" type="image/x-icon" />
  <title>Point Blank CastroMS</title>
  <link rel="stylesheet" href="/template/css/authenticate/app.css?id=52febf5284875d7c8acb">
  <link rel="stylesheet" href="/template/css/authenticate/new-register.css?id=677924750f7d40c6f93b">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
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
          <div class="register-form" style="height: 75%;">
            <h1>BEM VINDO AO <br>POINT BLANK CASTROMS</h1>
            <form name="userForm" id="userForm" class="form dev_check_enter" onsubmit="return formSend();">
              <input type="hidden" name="_token" value="<? echo RECAPTCHA_PUBLIC; ?>"> <input type="hidden" name="querystring" id="querystring" value="" />

              <p class="notice_txt" id="notice_txt_countryCode"></p>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
                <input type="email" id="userid" name="userid" class="form-control" title="Usuario" placeholder="Usuario" value="">
              </div>
              <p class="notice_txt" id="notice_txt_userid"></p>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-key"></i>
                  </span>
                </div>
                <input type="password" id="password" name="password" class="form-control" title="Senha" placeholder="Senha">
                <div class="input-group-append show-password">
                  <label class="input-group-text">
                    <i class="fas fa-eye-slash"></i>
                  </label>
                </div>
              </div>
              <p class="notice_txt" id="notice_txt_password"></p>


              <div class="check_agree">

              </div>
              <div class="form-group capcha">
                <div class="enter_capcha">
                  <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=pt"></script>
                  <div class="g-recaptcha" data-sitekey="6LdbH-kcAAAAAIXyV0wLgtAUaDHLzNONy5BYrjOb" data-theme="light" style="margin: 0 auto;display: table">
                  </div>
                </div>
              </div>
              <p class="notice_txt" id="notice_txt_capcha"></p>
              <button type="button" id="btnSubmit" class="submit-form" onclick="javascript:sendIt();">ENTRAR</button>
              <a href="cadastrar" target="_blank" class="download-game"><i class="fas fa-user-circle"></i> CADASTRAR</a>
              <p style="text-align: right;"><a href="retrieve-account">Recuperar conta</a></p>
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

  <!-- Global site tag (gtag.js) - Google Ads: 740032863 -->
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

      var regExp = /^[0-9a-zA-Z]([-_\.]*[0-9a-zA-Z]*)*@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
      if ($("#userid").val().trim() == "" || $("#userid").val().trim() == "title.single.join.email") {
        drawMsg("userid", "Insira um ID");
        if (focusId == "") focusId = "userid";
        errorCount++;

      } else if ($("#password").val().trim().length < 6 || $("#password").val().trim().length > 60) {
        drawMsg("password", "Coloque uma senha valida!");
        if (focusId == "") focusId = "password";
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
      var checkid = $("#userid").attr("checkid");

      if ($.trim(checkid) != "" && checkid != "1") {
        drawMsg("userid", "Girilen eposta adresi ile hesap mevcut!");
        if (focusId == "") focusId = "userid";
        errorCount++;
      }

      //var regPwd1 = /[^a-zA-Z0-9~`!@#$%^&*()_\-+={}[\]|\\;:'""<>,.?/]/g;
      var regPwd1 = /^[a-zA-Z0-9-_.]+$/;
      var regPwd2 = /([a-zA-Z0-9])\1{2,}/g;

      if ($("#password").val().trim().length <= 0 || $("#password").val().trim() == "title.single.join.password") {
        drawMsg("password", "Insira uma senha valida!");
        if (focusId == "") focusId = "password";
        errorCount++;
      } else if ($("#password").val().trim().length < 6 || $("#password").val().trim().length > 16) {
        drawMsg("password", "Şifreniz 6-16 karakter uzunluğunda olmalıdır.");
        if (focusId == "") focusId = "password";
        errorCount++;
        //} else if (regPwd1.test($("#password").val().trim())) {
      } else if ($("#password").val().search(regPwd1)) {
        drawMsg("password", "Şifrenizde sadece harf, rakam, nokta (.), alt tire (_) ve orta çizgi (-) kullanabilirsiniz.");
        if (focusId == "") focusId = "password";
        errorCount++;
      } else if (regPwd2.test($("#password").val().trim())) {
        drawMsg("password", "Lütfen şifrenizde tekrar eden karakterler kullanmayın.");
        if (focusId == "") focusId = "password";
        errorCount++;
      }
      /* else if ($("#password").val().trim() != $("#password_confirmation").val().trim()) {
                          drawMsg("password_confirmation", "Şifreniz doğrulama şifresiyle eşleşmiyor.");
                          $("#password_confirmation").val("");
                          if (focusId == "") focusId = "password_confirmation";
                          errorCount++;
                      }*/

      if ($.trim($("#g-recaptcha-response").val()) == "") { //geegle recaptcha v2
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

      $("#btnSubmit").attr("disabled", true);
      $("#btnSubmit").html("<i class='fas fa-spinner fa-spin'></i>");

      $.ajax({
        url: "/user/authenticate",
        type: "POST",
        dataType: 'json',
        data: {
          username: $("#userid").val(),
          password: $("#password").val(),
          g_recaptcha_response: $("#g-recaptcha-response").val(),
        },
        success: function(data) {
          if (data.status) {
            setSubmitBlock(false);
            window.location.href = "/home";
          } else {
            setSubmitBlock(false);
            if (data.msg == "Invalid reCAPTCHA") {
              drawMsg("capcha", "refaça o reCAPTCHA");
            } else if (data.msg == "Login failed") {
              drawMsg("userid", "Usuario ou senha invalidos.");
            } else {
              drawMsg("userid", "Erro interno!");
            }
            $("#btnSubmit").html("ENTRAR");
            $("#btnSubmit").attr("disabled", false);
            grecaptcha.reset();
          }
        }
      });


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