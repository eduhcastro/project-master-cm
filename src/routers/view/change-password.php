<?php
$HOST = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$Details = $Retrive["Password"]->checkToken($AddonsRoot->getParams($HOST)["token"]);
if(!$Details){
    header("Location: /");
    exit();
}


?>


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
  <title>Alterar-Senha Point Blank CastroMS</title>
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
            <h1>ALTERAÇÃO DE SENHA <br>POINT BLANK CASTROMS</h1>
            <form name="userForm" id="userForm" class="form dev_check_enter" onsubmit="return formSend();">
              <input type="hidden" name="_token" value="<? echo RECAPTCHA_PUBLIC; ?>"> <input type="hidden" name="querystring" id="querystring" value="" />

              <p class="notice_txt" id="notice_txt_countryCode"></p>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
                <input type="email" id="userid" name="userid" class="form-control" title="Usuario" placeholder="Usuario" value="<?php echo $Details["login"] ?>" disabled style="    background: #333333;">
              </div>
              <p class="notice_txt" id="notice_txt_userid"></p>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-key"></i>
                  </span>
                </div>
                <input type="password" id="password" name="password" class="form-control" title="Senha" placeholder="Nova Senha">
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
              <input type="hidden" id="token" value="<?php echo $AddonsRoot->getParams($HOST)["token"]; ?>">
              <p class="notice_txt" id="notice_txt_capcha"></p>
              <button type="button" id="btnSubmit" class="submit-form" onclick="javascript:Changer();">ALTERAR</button>
              <a href="/" target="_blank" class="download-game"><i class="fas fa-slash"></i> CANCELAR</a>
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


    function Changer() {
      $(".notice_txt").hide();
      var regPwd1 = /^[a-zA-Z0-9-_.]+$/;
      var regPwd2 = /([a-zA-Z0-9])\1{2,}/g;

      if ($("#password").val().trim().length < 6 || $("#password").val().trim().length > 60) {
        drawMsg("password", "Coloque uma senha valida!");
        if (focusId == "") focusId = "password";
        errorCount++;
      }
   
      if ($.trim($("#g-recaptcha-response").val()) == "") { //geegle recaptcha v2
        drawMsg("capcha", "Complete o reCAPTCHA");
        errorCount++;
      }

      if (errorCount > 0) {
        $("#" + focusId).focus();
        return false;
      }

      $.ajax({
        url: "/retrive-account/changer",
        type: "POST",
        dataType: 'json',
        data: {
          password: $("#password").val(),
          token: $("#token").val(),
          g_recaptcha_response: $("#g-recaptcha-response").val(),
        },
        success: function(data) {
          if (data.status) {
            alert("Senha alterada com sucesso!");
            window.location.href = "/authenticate/login";
          } else {
            setSubmitBlock(false);
            if (data.msg == "Invalid reCAPTCHA") {
              drawMsg("capcha", "refaça o reCAPTCHA");
            } else {
              drawMsg("userid", data.msg);
            }
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