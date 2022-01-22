<?php

$UserDetails = new $Init["User"];
$Details = $UserDetails->getInfo();
include('src/includes/Header.include.php'); ?>
<script src="https://www.google.com/recaptcha/api.js?render=<?= RECAPTCHA_PUBLICV3 ?>"></script>
<?php
echo '<script>
        const oldDetails = {
        login:     "' . $Details['login'] . '",
        playerId:  "' . $Details['player_id'] . '",
        email:     "' . $Details['email'] . '",
        }
        </script>';

?>
<div class="contents">
  <div class="sub_title"> Perfil</div>
  <div class="sub_contents">
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden" style="
    display: none;
    box-shadow: inset 0 0px 1px 1px rgba(254, 254, 254, 0.9), 0 20px 27px 0 rgba(0, 0, 0, 0.05) !important;
    box-shadow: inset 0px 0px 2px #fefefed1;
    -webkit-backdrop-filter: saturate(200%) blur(30px);
    backdrop-filter: saturate(200%) blur(30px);
    margin-top: 0rem !important;
    background-color: rgb(255 102 0 / 65%) !important;
    margin-right: 1.5rem !important;
    margin-left: 1.5rem !important;
    overflow: hidden !important;
    flex: 1 1 auto;
    padding: 1rem 1rem;
    position: relative;
    display: none;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, 0.125);
    border-radius: 1rem;
">
      <div class="row gx-4" style="
    --bs-gutter-x: 1.5rem;
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(var(--bs-gutter-y) * -1);
    margin-right: calc(var(--bs-gutter-x) * -.5);
    margin-left: calc(var(--bs-gutter-x) * -.5);
">
        <div class="col-auto" style="
    flex: 0 0 auto;
    width: auto;
    flex-shrink: 0;
    width: 100%;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
    margin-top: var(--bs-gutter-y);
">
          <div class="avatar avatar-xl position-relative" style="
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    border-radius: 0.75rem;
    height: 48px;
    width: 48px;
    transition: all .2s ease-in-out;
    width: 74px !important;
    height: 74px !important;
    position: relative !important;
">
            <img src="https://pb.ongame.net/static/img/pb/patentes/50.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm" style="border-radius: 0.75rem;width: 100% !important;box-shadow: 0 0.3125rem 0.625rem 0 rgba(0, 0, 0, 0.12) !important;">
          </div>
        </div>
        <div class="col-auto my-auto" style="
    margin-top: auto !important;
    margin-bottom: auto !important;
    flex: 0 0 auto;
    width: auto;
    flex-shrink: 0;
    width: 100%;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
    margin-top: var(--bs-gutter-y);
">
          <div class="h-100" style="
    height: 100% !important;
">
            <h5 class="mb-1" style="
    margin-bottom: 0.25rem !important;
    font-weight: 600;
    font-size: 1.25rem;
    line-height: 1.375;
">
              Alec Thompson
            </h5>
            <p class="mb-0 font-weight-bold text-sm" style="
    font-weight: 600 !important;
    font-size: 0.875rem !important;
    line-height: 1.5;
    margin-bottom: 0 !important;
">
              CEO / Co-Founder
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3" style="
    margin-left: auto !important;
    margin-right: 0 !important;
    margin-top: auto !important;
    margin-bottom: auto !important;
    flex: 0 0 auto;
    width: 33.333333%;
">
          <div class="nav-wrapper position-relative end-0" style="
    right: 0 !important;
    position: relative !important;
">
            <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist" style="
    background: #f8f9fa;
    border-radius: 0.75rem;
    position: relative;
    background-color: transparent !important;
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    padding: 0.25rem !important;
    list-style: none;
">
              <li class="nav-item" style="
    z-index: 3;
    flex: 1 1 auto;
    text-align: center;
">
                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true" style="
    animation: 0.2s ease;
    z-index: 3;
    color: #344767;
    border-radius: 0.5rem;
    background-color: inherit;
    width: 100%;
    padding-top: 0.25rem !important;
    padding-bottom: 0.25rem !important;
">
                  <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g transform="translate(603.000000, 0.000000)">
                            <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                            </path>
                            <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                            <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                  <span class="ms-1">App</span>
                </a>
              </li>
              <li class="nav-item" style="
    z-index: 3;
    flex: 1 1 auto;
    text-align: center;
">
                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                  <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>document</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g transform="translate(154.000000, 300.000000)">
                            <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                            <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                            </path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                  <span class="ms-1">Messages</span>
                </a>
              </li>
              <li class="nav-item" style="
    z-index: 3;
    flex: 1 1 auto;
    text-align: center;
">
                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                  <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>settings</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g transform="translate(304.000000, 151.000000)">
                            <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                            </polygon>
                            <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                            <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                            </path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                  <span class="ms-1">Settings</span>
                </a>
              </li>
              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 109px;"><a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="sub_stit_slash">
      <p class="stit">Dados</p>
    </div>
    <p class="stit" style="
    text-align: center;
    color: #f00;
    font-size: 10px;
"><b style="
    text-align: center;
">* Obrigatorio para a alteração. (Caso queira mudar algo, altere o campo desejado)</b></p>
    <div class="cont_p30">
      <form style="
            /* text-align: center; */
            ">
        <div class="form-group">
          <label for="pwd" style="
                  font-size: 14px;
                  "><b>USUARIO: </b></label>
          <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $Details["login"] ?>" disabled="" style="
                  width: 100%;
                  " disabled>
        </div>
        <div class="form-group">
          <label for="pwd" style="
                  font-size: 14px;
                  "><b>EMAIL:</b></label>
          <input type="email" class="form-control" id="email" name="email" value="<?= $Details["email"] ?>" style="
                  width: 100%;
                  ">
        </div>
        <div class="form-group">
          <label for="pwd" style="
                  font-size: 14px;
                  "><b>NOVA SENHA: </b></label>
          <input type="password" class="form-control" id="nova-senha" name="nova-senha" style="
                  width: 100%;
                  ">
        </div>
        <div class="form-group">
          <label for="pwd" style="
                  font-size: 14px;
                  "><b>REPITA A SENHA: </b></label>
          <input type="password" class="form-control" id="nova-senha-re" name="nova-senha-re" style="
                  width: 100%;
                  ">
        </div>
        <div class="form-group">
          <label for="nova-reposta" style="
                  font-size: 14px;
                  "><b>NOVA REPOSTA PARA A PERGUNTA SECRETA: </b></label>
          <input type="text" class="form-control" id="nova-reposta" name="nova-reposta" style="
                  width: 100%;
                  ">
        </div>
        <div class="form-group">
          <label for="pwd" style="
                  font-size: 14px;
                  "><b>*SENHA ATUAL: </b></label>
          <input type="password" class="form-control" id="senha-atual" name="senha-atual" style="
                  width: 100%;
                  ">
        </div>
        <button type="button" id="btnSubmit" class="submit-form" style="background: #f60;
    border: 0;
    color: #000;
    cursor: pointer;
    display: inline-block;
    font-size: 24px;
    font-weight: 700;
    height: 56px;
    line-height: 54px;
    margin-top: 10px;
    transition: .2s ease-out;
    width: 100%;">ALTERAR DADOS</button>
      </form>
    </div>

  </div>
</div>
<!---// CONTENTS --->
<!--- QUICK --->
<!---// QUICK --->
</div>
<script>
  class User {

    reCAPTCHA(self) {
      grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo RECAPTCHA_PUBLICV3 ?>', {
          action: 'submit'
        }).then(function(token) {
          return self.Api.execute(token, self)
        });
      });
    }

    Api = {
      execute: (token) => {
        $.ajax({
          url: '/user/change-data',
          type: 'POST',
          data: {
            token,
            'email': $('#email').val(),
            'senha': $('#nova-senha').val(),
            'senha_re': $('#nova-senha-re').val(),
            'resposta': $('#nova-reposta').val(),
            'senha_atual': $('#senha-atual').val()
          },
          success: function(data) {
            if (data.status) {
              alert("Dados atualizados");
              return location.reload();
            }
            return alert(data.msg)
          },
          error: function(data) {
            return alert("Erro interno 2")
          }
        });
      }
    }

    Filter = {

      email: () => {
        if ($.trim($("#email").val()) == "") {} else if ($.trim($("#email").val()).length < 6) return [false, "Insira um email valido"]
        if (!$('#email').val().match(/^[0-9a-zA-Z]([-_\.]*[0-9a-zA-Z]*)*@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/)) return [false, "Insira um email valido"]
        return [true]
      },

      newPassword: () => {
        if ($.trim($("#nova-senha").val()) != "") {
          if ($("#nova-senha-re").val().trim().length < 6 || $("#nova-senha-re").val().trim().length > 60) return [false, "Coloque uma senha valida"]
          if ($.trim($("#nova-senha").val()) != $.trim($("#nova-senha-re").val())) return [false, "As senhas não combinam"]
        }
        return [true]
      },

      answer: () => {
        if ($.trim($("#resposta").val()) != "") {
          let regEng = /[a-zA-Z]/g;
          if (!$('#resposta').val().match(regExp) || !$('#resposta').val().match(regEng))[false, "Insira uma resposta valida"]
        }
        return [true]
      },

      oldPassword: () => {
        if ($("#senha-atual").val().trim().length < 6 || $("#senha-atual").val().trim().length > 60) return [false, "Coloque sua senha antiga"]
        return [true]
      }


    }
    Responsive = {

      clicks: (self) => {
        $("#btnSubmit").click(() => {
          if ($("#email").val() == oldDetails.email && $("#nova-senha").val() == "" && $("#nova-senha-re").val() == "" && $("#nova-reposta").val() == "" && $("#senha-atual").val() == "") {
            return alert("Nenhuma alteração foi feita!");
          }


          if ($.trim($("#email").val()) == "") {} else if ($.trim($("#email").val()).length < 6) {
            return alert("Insira um email valido")
          }
          if (!$('#email').val().match(/^[0-9a-zA-Z]([-_\.]*[0-9a-zA-Z]*)*@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/)) {
            return alert("Insira um email valido")
          }

          if ($.trim($("#nova-senha").val()) != "") {
            if ($("#nova-senha-re").val().trim().length < 6 || $("#nova-senha-re").val().trim().length > 60) {
              return alert("Coloque uma senha valida")
            }
            if ($.trim($("#nova-senha").val()) != $.trim($("#nova-senha-re").val())) {
              return alert("As senhas não combinam")
            }
          }

          if ($.trim($("#resposta").val()) != "") {
            let regEng = /[a-zA-Z]/g;
            if (!$('#resposta').val().match(regExp) || !$('#resposta').val().match(regEng)) {
              return alert("Insira uma resposta valida")
            }
          }

          if ($("#senha-atual").val().trim().length < 2) {
            return alert("Coloque sua senha antiga")
          }

          self.reCAPTCHA(self)

        })
      }
    }
    init() {
      this.Responsive.clicks(this)
    }
  }
  const UserData = new User().init()
</script>
<?php include('src/includes/Footer.include.php'); ?>