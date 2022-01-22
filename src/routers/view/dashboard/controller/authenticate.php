<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/template/dashboard/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/template/dashboard/assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/template/dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/template/dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/template/dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/template/dashboard/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_PUBLICV3 ?>"></script>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/template/dashboard/pages/dashboard.html">
              PBCM DashBoard
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">

              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="#" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Copyright 2021 Creative Tim</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Electron DashBoard</h3>
                  <p class="mb-0"><?= $lang["login_description_dashboard"] ?></p>
                </div>
                <div class="card-body">
                  <div role="form">
                    <label>Login</label>
                    <div class="mb-3">
                      <input type="text" id="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="email-addon">
                    </div>
                    <label><?= $lang["password_dashboard"] ?></label>
                    <div class="mb-3">
                      <input type="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe"><?= $lang["remember_dashboard"] ?></label>
                    </div>
                    <div class="text-center">
                      <button type="button" id="enter" class="btn bg-gradient-info w-100 mt-4 mb-0"><?= $lang["enter_dashboard"] ?></button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('/template/dashboard/assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">

      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script><?= $lang["login_footer_dashboard"] ?>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="/template/dashboard/assets/js/core/popper.min.js"></script>
  <script src="/template/dashboard/assets/js/core/bootstrap.min.js"></script>
  <script src="/template/dashboard/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/template/dashboard/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/template/dashboard/assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    function findGetParameter(parameterName) {
      var result = null,
        tmp = [];
      location.search
        .substr(1)
        .split("&")
        .forEach(function(item) {
          tmp = item.split("=");
          if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
      return result;
    }

    class Authenticate {

      reCAPTCHA(e, self) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('<?php echo RECAPTCHA_PUBLICV3 ?>', {
            action: 'submit'
          }).then(function(token) {
            return self.Auth(token)
          });
        });
      }

      Auth(token) {
        $.ajax({
          url: '/client/auth/log-in',
          type: 'POST',
          data: {
            username: $("#username").val(),
            password: $("#password").val(),
            g_recaptcha_response: token,
            code: findGetParameter('acesskey')
          },
          success: function(data) {
            //alert(data);
            if (data.status) {
              alert("<?= $lang["login_success_dashboard"] ?>");
              return window.location.href = '/dashboard/controller/index';
            } else {
              //alert(data)
              alert("<?= $lang["login_error_dashboard"] ?>");

            }
          }
        });
      }

      Responsive = {

        active(self) {
          $("#enter").click(function(e) {
            self.reCAPTCHA(e, self);
          });
        }

      }

      init() {
        this.Responsive.active(this)
      }

    }
    new Authenticate().init();
  </script>
</body>

</html>