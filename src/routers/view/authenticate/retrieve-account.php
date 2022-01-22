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
  <title>Recuperar Conta - Point Blank CastroMS</title>
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
          <div class="register-form" style="height: 100%;">
            <h1>RECUPERAÇÃO DE CONTA <br>POINT BLANK CASTROMS</h1>
            <form name="userForm" id="userForm" class="form dev_check_enter" onsubmit="return formSend();">
              <input type="hidden" name="_token" value="<? echo RECAPTCHA_PUBLIC; ?>"> <input type="hidden" name="querystring" id="querystring" value="" />

              <p class="notice_txt" id="notice_txt_countryCode"></p>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-user"></i>
                  </span>
                </div>
                <input type="text" id="userid" name="userid" class="form-control" title="Usuario" placeholder="Usuario" value="">
              </div>
              <p class="notice_txt" id="notice_txt_userid"></p>

              <div class="input-group">
                <div class="input-group-append">
                  <label class="input-group-text">
                    <i class="fas fa-globe-asia"></i>
                  </label>
                </div>
                <select class="form-control" id="metodo" name="metodo">
                  <option value="0" selected="selected">Via Perguntas Secretas</option>
                  <option value="1">Via Email</option>
                </select>
              </div>

              <div class="input-group" id="secretas-div">
                <div class="input-group-append">
                  <label class="input-group-text">
                    <i class="fas fa-user-secret"></i>
                  </label>
                </div>
                <select class="form-control" id="secretas" name="secretas">
                  <option value="" selected="selected">Pergunta Secreta</option>
                  <?php foreach (SECRET_QUESTIONS as $Pergunta => $Quest) {
                    echo '<option value="' . array_search($Quest, SECRET_QUESTIONS) . '">' . $Quest . '</option>';
                  } ?>
                </select>
              </div>

              <div class="input-group" id="secretas-resposta-div">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-key"></i>
                  </span>
                </div>
                <input type="text" id="resposta" name="resposta" class="form-control" title="E-posta Adresinizi Girin" placeholder="Resposta Da Pergunta Secreta" value="">
              </div>

              <div class="input-group" style="display: none" id="email">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
                <input type="email" id="useremail" name="useremail" class="form-control" title="Email" placeholder="Email" value="">
              </div>


              <p class="notice_txt" id="notice_txt_useremail"></p>


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
              <button type="button" id="btnSubmit" class="submit-form" onclick="javascript:Handler();">RECUPERAR</button>
              <a href="retrieve-account" target="_blank" class="download-game"><i class="fas fa-home"></i> INICIO</a>

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



  <!-- End Facebook Pixel Code -->
  <!-- Google Analytics Remarketing Code -->

  <!-- End Google Analytics Remarketing Code -->

  <script type="text/javascript">
    $("#metodo").click(function(e) {
      if ($(this).val() == 0) {
        $("#secretas-div").show();
        $("#secretas-resposta-div").show();
        $("#email").hide();
      } else {
        $("#secretas-resposta-div").hide();
        $("#secretas-div").hide();
        $("#email").show();
      }
    });


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
    var regEng = /[a-zA-Z]/g;
    var regExp = /^[A-Za-z0-9]{1}([-_.]|[A-Za-z0-9]){4,15}$/;
    var regEmail = /^[0-9a-zA-Z]([-_\.]*[0-9a-zA-Z]*)*@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
    let errorCount = 0
    var focusId = "";

    function reCAPTCHA() {
      if ($.trim($("#g-recaptcha-response").val()) == "") {
        drawMsg("capcha", "Complete o reCAPTCHA");
        errorCount++;
      }
    }

    function userID() {
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
    }

    function byEmail() {
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
    }

    function byQuest() {
      if ($.trim($("#resposta").val()) == "") {
        drawMsg("useremail", "Insira uma pergunta secreta.");
        if (focusId == "") focusId = "secretas";
        errorCount++;
      } else if ($.trim($("#resposta").val()).length < 5 || $.trim($("#resposta").val()).length > 60) {
        drawMsg("useremail", "Digite de 5 a 60 caracteres para a pergunta secreta.");
        if (focusId == "") focusId = "secretas";
        errorCount++;
      }
    }

    function Handler() {
      errorCount = 0;
      $(".notice_txt").hide();
      $("#notice_txt_capcha").css("");
      userID();
      reCAPTCHA();
      if ($("#metodo").val() == 0) {
        byQuest()
        if (errorCount == 0) {
          $("#btnSubmit").attr("disabled", true);
          $("#btnSubmit").html("<i class='fas fa-spinner fa-spin'></i>");
          $.ajax({
            type: "POST",
            url: "/retrive-account/questions",
            data: {
              username: $("#userid").val(),
              quest: {
                answer: $("#resposta").val(),
                question: $("#secretas").val()
              },
              g_recaptcha_response: $("#g-recaptcha-response").val(),
            },
            success: function(data) {
              if (data.status) {
                return window.location.href = "/change-password?token=" + data.msg;
              } else {
                $("#btnSubmit").html("RECUPERAR");
                $("#btnSubmit").attr("disabled", false);
                $("#notice_txt_capcha").html(data.msg);
                $("#notice_txt_capcha").fadeIn();
                grecaptcha.reset();
              }
            }
          });
        }

      } else {
        byEmail();
        if (errorCount == 0) {
          $("#btnSubmit").attr("disabled", true);
          $("#btnSubmit").html("<i class='fas fa-spinner fa-spin'></i>");
          $.ajax({
            type: "POST",
            url: "/retrive-account/email",
            data: {
              username: $("#userid").val(),
              email: $("#useremail").val(),
              g_recaptcha_response: $("#g-recaptcha-response").val(),
            },
            success: function(data) {
              if (data.status) {
                $("#btnSubmit").html("<i class='fas fa-check'></i>");
                $("#btnSubmit").attr("disabled", false);
                $("#notice_txt_capcha").html("Um link para a troca de senha foi enviado para o seu e-mail.");
                $("#notice_txt_capcha").css("background", "#136f13");
                $("#notice_txt_capcha").css("border", "1px solid #00ff00");
                $("#notice_txt_capcha").fadeIn();
                $("#form-retrieve").trigger("reset");
              } else {
                $("#btnSubmit").html("RECUPERAR");
                $("#btnSubmit").attr("disabled", false);
                $("#notice_txt_capcha").html(data.msg);
                $("#notice_txt_capcha").fadeIn();
                grecaptcha.reset();
              }
            }
          });
        }
      }

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