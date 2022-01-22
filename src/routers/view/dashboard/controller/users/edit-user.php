<?php
$HOST = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$AddonsRoot = new $Init['AddonsRoot']();

if (!isset($AddonsRoot->getParams($HOST)["id"]) || !is_numeric($AddonsRoot->getParams($HOST)["id"])) {
  echo "<script>history.go(-1);</script>";
  exit;
}

$UserCheck = new $InitD["Users"]["Responsive"];
if (!$UserCheck->getUser($AddonsRoot->getParams($HOST)["id"])) {
  echo "<script>history.go(-1);</script>";
  exit;
}
$User = $UserCheck->getUser($AddonsRoot->getParams($HOST)["id"]);
$Answers = $UserCheck->getAnswers($User["login"]);
if(!$Answers){
  $UserCheck->insetAnswers($User["login"]);
  $Answers["question"] = "1";
  $Answers["answer"] = "New";
}
include('src/includes/master/Header.include.php'); ?>
<?php
echo '<script>
  let oldInfo = {
    "login": "' . $User["login"] . '",
    "nickname": "' . $User["player_name"] . '",
    "rank": "' . $User["rank"] . '",
    "function": "' . $User["access_level"] . '",
    "email": "' . $User["email"] . '",
    "secret_ask": "' . $Answers["question"] . '",
    "secret_answer": "' . $Answers["answer"] . '",
    "gold": "' . $User["gp"] . '",
    "cash": "' . $User["money"] . '",
    "exp": "' . $User["exp"] . '",
  }</script>'
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<div class="container-fluid my-3 py-3">
  <div class="row mb-5">
    <div class="col-lg-3">
      <div class="card position-sticky top-1">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
          <li class="nav-item">
            <a class="nav-link text-body" data-scroll="" href="#profile">
              <div class="icon me-2">
                <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>spaceship</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(4.000000, 301.000000)">
                          <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                          <path class="color-background" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                          <path class="color-background" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" opacity="0.598539807"></path>
                          <path class="color-background" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" opacity="0.598539807"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="text-sm">Profile</span>
            </a>
          </li>
          <li class="nav-item pt-2">
            <a class="nav-link text-body" data-scroll="" href="#basic-info">
              <div class="icon me-2">
                <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>document</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(154.000000, 300.000000)">
                          <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                          <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="text-sm">Basic Info</span>
            </a>
          </li>
          <li class="nav-item pt-2">
            <a class="nav-link text-body" data-scroll="" href="#password">
              <div class="icon me-2">
                <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>box-3d-50</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(603.000000, 0.000000)">
                          <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                          <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                          <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="text-sm">Change Password</span>
            </a>
          </li>
          <li class="nav-item pt-2">
            <a class="nav-link text-body" data-scroll="" href="#questions">
              <div class="icon me-2">
                <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>switches</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1870.000000, -440.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(154.000000, 149.000000)">
                          <path class="color-background" d="M10,20 L30,20 C35.4545455,20 40,15.4545455 40,10 C40,4.54545455 35.4545455,0 30,0 L10,0 C4.54545455,0 0,4.54545455 0,10 C0,15.4545455 4.54545455,20 10,20 Z M10,3.63636364 C13.4545455,3.63636364 16.3636364,6.54545455 16.3636364,10 C16.3636364,13.4545455 13.4545455,16.3636364 10,16.3636364 C6.54545455,16.3636364 3.63636364,13.4545455 3.63636364,10 C3.63636364,6.54545455 6.54545455,3.63636364 10,3.63636364 Z" opacity="0.6"></path>
                          <path class="color-background" d="M30,23.6363636 L10,23.6363636 C4.54545455,23.6363636 0,28.1818182 0,33.6363636 C0,39.0909091 4.54545455,43.6363636 10,43.6363636 L30,43.6363636 C35.4545455,43.6363636 40,39.0909091 40,33.6363636 C40,28.1818182 35.4545455,23.6363636 30,23.6363636 Z M30,40 C26.5454545,40 23.6363636,37.0909091 23.6363636,33.6363636 C23.6363636,30.1818182 26.5454545,27.2727273 30,27.2727273 C33.4545455,27.2727273 36.3636364,30.1818182 36.3636364,33.6363636 C36.3636364,37.0909091 33.4545455,40 30,40 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="text-sm">Quests</span>
            </a>
          </li>
          <li class="nav-item pt-2">
            <a class="nav-link text-body" data-scroll="" href="#event">
              <div class="icon me-2">
                <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>settings</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(304.000000, 151.000000)">
                          <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                          <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                          <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="text-sm">Event</span>
            </a>
          </li>
          <li class="nav-item pt-2">
            <a class="nav-link text-body" data-scroll="" href="#delete">
              <div class="icon me-2">
                <svg class="text-dark mb-1" width="16px" height="16px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>shop </title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(0.000000, 148.000000)">
                          <path class="color-background" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" opacity="0.598981585"></path>
                          <path class="color-foreground" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="text-sm">Delete Account</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-lg-9 mt-lg-0 mt-4">
      <!-- Card Profile -->
      <div class="card card-body" id="profile">
        <div class="row justify-content-center align-items-center">
          <div class="col-sm-auto col-4">
            <div class="avatar avatar-xl position-relative">
              <img src="<?= '/template/images/ranks/icon/' . $User["rank"] . '.png' ?>" alt="bruce" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-sm-auto col-8 my-auto">
            <div class="h-100">
              <h5 class="mb-1 font-weight-bolder">
                <?= $User["login"] ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                <?= ($User["player_name"] ? $User["player_name"] : "Await..."); ?> / <?= LEVELS_ACCESS[$User['access_level']]; ?>
              </p>
            </div>
          </div>
          <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
            <label class="form-check-label mb-0">
              <small id="profileVisibility">
                Switch to invisible
              </small>
            </label>
            <div class="form-check form-switch ms-2">
              <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()">
            </div>
          </div>
        </div>
      </div>
      <!-- Card Basic Info -->
      <div class="card mt-4" id="basic-info">
        <div class="card-header">
          <h5>Basic Info</h5>
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col-4">
              <label class="form-label">Login</label>
              <div class="input-group">
                <input id="login" name="login" class="form-control" type="text" placeholder="Alec" value="<?= $User["login"] ?>" disabled>
              </div>
            </div>
            <div class="col-6">
              <label class="form-label">NickName</label>
              <div class="input-group">
                <input id="nickname" name="nickname" class="form-control" type="text" placeholder="Thompson" required="required" value="<?= $User["player_name"] ?>">
              </div>
            </div>
            <div class="col-2">
              <label class="form-label">Rank</label>
              <div class="input-group">
                <input id="rank" name="rank" class="form-control" type="number" placeholder="0" required="required" value="<?= $User["rank"] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-6">
              <label class="form-label mt-4">Function</label>
              <select class="form-control" name="function" id="function">
                <?php foreach (LEVELS_ACCESS as $Key => $Level) {

                  echo '<option value="' . $Key . '" ' . ($Key == $User["access_level"] ? "selected" : "") . '>' . $Level . '</option>';
                } ?>
              </select>
            </div>
            <div class="col-sm-8">
              <div class="row">
                <div class="col-6">
                  <label class="form-label mt-4">Email</label>
                  <div class="input-group">
                    <input id="email" name="email" class="form-control" type="email" value="<?= $User["email"] ?>" placeholder="example@email.com">
                  </div>
                </div>
                <div class="col-6">
                  <label class="form-label mt-4">ID</label>
                  <div class="input-group">
                    <input id="id" name="id" class="form-control" type="number" value="<?= $User["player_id"] ?>" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button id="update-basic" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Card Change Password -->
      <div class="card mt-4" id="password">
        <div class="card-header">
          <h5>Change Password</h5>
        </div>
        <div class="card-body pt-0">
          <label class="form-label">New password</label>
          <div class="form-group">
            <input class="form-control" id="newPassword" type="password" placeholder="New password">
          </div>
          <label class="form-label">Confirm new password</label>
          <div class="form-group">
            <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm password">
          </div>
          <button id="edit-password" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update password</button>
        </div>
      </div>

      <!-- Secret Questions -->
      <div class="card mt-4" id="questions">
        <div class="card-header">
          <h5>Secret Questions</h5>
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col-6">
              <label class="form-label">Question</label>
              <select class="form-control" name="secret_question" id="secret_question">
                <?php foreach (SECRET_QUESTIONS as $Key => $Quest) {
                  echo '<option value="' . $Key . '" ' . ($Key == $Answers["question"] ? "selected" : "") . '>' . $Quest . '</option>';
                } ?>

              </select>
            </div>
            <div class="col-6">
              <label class="form-label">Reply</label>
              <div class="input-group">
                <input id="secret_reply" name="secret_reply" class="form-control" type="text" placeholder="Thompson" required="required" value="<?= $Answers["answer"] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button id="edit-questions" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Extra -->
      <div class="card mt-4" id="Extra">
        <div class="card-header">
          <h5>Extra</h5>
        </div>
        <div class="card-body pt-0">
          <div class="row">

            <div class="col-4">
              <label class="form-label">Gold</label>
              <div class="input-group">
                <input id="gold" name="gold" class="form-control" type="text" placeholder="Thompson" required="required" value="<?= $User["gp"] ?>">
              </div>
            </div>

            <div class="col-4">
              <label class="form-label">Cash</label>
              <div class="input-group">
                <input id="cash" name="cash" class="form-control" type="text" placeholder="Thompson" required="required" value="<?= $User["money"] ?>">
              </div>
            </div>

            <div class="col-4">
              <label class="form-label">Exp</label>
              <div class="input-group">
                <input id="exp" name="exp" class="form-control" type="text" placeholder="Thompson" required="required" value="<?= $User["exp"] ?>">
              </div>
            </div>


          </div>
          <div class="row">
            <div class="col-12">
              <button id="edit-extra" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update</button>
            </div>
          </div>
        </div>
      </div>

      <?php if (EVENT_ACTIVE && REWARD_BY_LOGGIN) {
        $UserEvent = $UserCheck->getTokens($User["login"]);
      ?>
        <!-- Event -->
        <div class="card mt-4" id="event">
          <div class="card-header">
            <h5>Event</h5>
          </div>
          <div class="card-body pt-0">
            <div class="row">

              <div class="col-8">
                <label class="form-label">Tokens</label>
                <div class="input-group">
                  <input id="tokens" name="tokens" class="form-control" type="number" placeholder="0" required="required" value="<?= (is_numeric($UserEvent["tokens"]) ? $UserEvent["tokens"] : "0") ?>">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-12">
                <button id="edit-event" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update</button>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>

      <!-- Card Delete Account -->
      <div class="card mt-4" id="delete">
        <div class="card-header">
          <h5>Controller Account</h5>
          <p class="text-sm mb-0">Once you delete your account, there is no going back. Please be certain.</p>
        </div>
        <div class="card-body d-sm-flex pt-0">
          <div class="d-flex align-items-center mb-sm-0 mb-4">
            <div>
              <div class="form-check form-switch mb-0">
                <input class="form-check-input" type="checkbox" id="delete-user-check">
              </div>
            </div>
            <div class="ms-2">
              <span class="text-dark font-weight-bold d-block text-sm">Confirm</span>
              <span class="text-xs d-block">I am aware that I will delete this account.</span>
            </div>
          </div>
          <button id="ban-account" class="btn btn-outline-secondary mb-0 ms-auto" type="button" name="button">Ban Account</button>
          <button id="delete-account" class="btn bg-gradient-danger mb-0 ms-2" type="button" name="button">Delete Account</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    // DEBUG
    //window.onerror = function(error, url, line) {
    //  alert(error);
    //};
    class EditUser {


      Apis = {

        Basic: () => {
          $.ajax({
            url: "/client/user/edit-basic",
            type: "POST",
            data: {
              nick: $("#nickname").val(),
              email: $("#email").val(),
              rank: $("#rank").val(),
              func: $("#function option:selected").val(),
              id: () => {
                let url = new URL(window.location.href);
                return url.searchParams.get("id")
              }
            },
            success: (data) => {
              alert("Update Success");

            },
            error: (data) => {

              alert("Update Error");
            }
          })
        },

        Password: () => {
          $.ajax({
            url: "/client/user/edit-password",
            type: "POST",
            data: {
              new: $("#newPassword").val(),
              confirm: $("#confirmPassword").val(),
              id: () => {
                let url = new URL(window.location.href);
                return url.searchParams.get("id")
              }
            },
            success: (data) => {
              alert("Update Success");

            },
            error: (data) => {

              alert("Update Error");
            }
          })
        },

        Question: () => {
          $.ajax({
            url: "/client/user/edit-question",
            type: "POST",
            data: {
              question: $("#secret_question option:selected").val(),
              answer: $("#secret_reply").val(),
              login: oldInfo.login
            },
            success: (data) => {
              if (!data.status) return alert("Update Error params");
              alert("Update Success");

            },
            error: (data) => {
              alert("Update Error");
            }
          })
        },

        Extra: () => {
          $.ajax({
            url: "/client/user/edit-extra",
            type: "POST",
            data: {
              gold: $("#gold").val(),
              cash: $("#cash").val(),
              exp: $("#exp").val(),
              id: () => {
                let url = new URL(window.location.href);
                return url.searchParams.get("id")
              }
            },
            success: (data) => {
              if (!data.status) return alert("Update Error params");
              alert("Update Success");

            },
            error: (data) => {
              alert("Update Error");
            }
          })
        },

        Event: () => {
          $.ajax({
            url: "/client/user/edit-event",
            type: "POST",
            data: {
              tokens: $("#tokens").val(),
              login: oldInfo.login
            },
            success: (data) => {
              if (!data.status) return alert("Update Error params");
              alert("Update Success");

            },
            error: (data) => {
              alert("Update Error");
            }
          })
        },

        Delete: () => {
          $.ajax({
            url: "/client/user/delete",
            type: "POST",
            data: {
              login: oldInfo.login,
              id: () => {
                let url = new URL(window.location.href);
                return url.searchParams.get("id")
              }
            },
            success: (data) => {
              if (!data.status) return alert("Delete Error params");
              alert("Delete Success");
              window.location.href = "/client/user/list";
            },
            error: (data) => {
              alert("Delete Error");
            }
          })
        }

      }

      Filters = {

        Basic: (nick, rank, email, funct) => {

          const regEng = /[a-zA-Z]/g,
            regExp = /^[A-Za-z0-9]{1}([-_.]|[A-Za-z0-9]){3,16}$/,
            regEmail = /^[0-9a-zA-Z]([-_\.]*[0-9a-zA-Z]*)*@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;

          if (nick == oldInfo.nickname && rank == oldInfo.rank && email == oldInfo.email && funct == oldInfo.function) {
            alert("No changes detected");
            return false;
          }

          if (nick == "" || nick.length < 4 || nick.length > 16) {
            alert("Nickname must be between 4 and 16 characters long.");
            return false;
          }

          if (!nick.match(regExp) || !nick.match(regEng)) {
            alert("Nickname must be alphanumeric.");
            return false;
          }

          if (isNaN(rank) || rank < 0 || rank > 53) {
            alert("Invalid Rank.");
            return false;
          }

          if (email == "" || !email.match(regEmail)) {
            alert("Invalid Email .");
            return false;
          }

          if (isNaN(funct) || funct < 0 || funct > <?= count(LEVELS_ACCESS); ?>) {
            alert("Invalid Function.");
            return false;
          }

          return true;
        },

        Password: (password, repeat) => {

          if (password.length < 6 || password > 20) {
            alert("Password must be between 6 and 20 characters long.");
            return false;
          }

          if (password != repeat) {
            alert("Passwords do not match.");
            return false;
          }
          return true;
        },

        Question: (question, answer) => {

          const regEng = /[a-zA-Z]/g,
            regExp = /^[A-Za-z0-9]{1}([-_.]|[A-Za-z0-9]){3,16}$/;

          if (question == oldInfo.secret_ask && answer == oldInfo.secret_answer) {
            alert("No changes detected");
            return false;
          }

          if (question == "" || answer == "") {
            alert("Question and Answer must be filled.");
            return false;
          }

          if (!answer.match(regExp) || !answer.match(regEng)) {
            alert("Answer must be alphanumeric.");
            return false;
          }

          return true;
        },

        Extra: (gold, cash, exp) => {

          if (gold == oldInfo.gold && cash == oldInfo.cash && exp == oldInfo.exp) {
            alert("No changes detected");
            return false;
          }

          if (isNaN(gold) || gold < 0 || gold > 999999999 ||
            isNaN(cash) || cash < 0 || cash > 999999999 ||
            isNaN(exp) || exp < 0 || exp > 999999999) {
            alert("Invalid Mount.");
            return false;
          }

          return true;
        },

        Event: (tokens) => {

          if (isNaN(tokens) || tokens < 0 || tokens > 999999999) {
            alert("Invalid Mount.");
            return false;
          }

          return true;
        },

        Delete: () => {
          if (!$("#delete-user-check").is(':checked')) {
            alert("Please confirm you want to delete this user.");
            return false;
          }
          return true;
        }

      }

      Basic(self, nick, rank, email, functi) {
        if (!self.Filters.Basic(nick, rank, email, functi)) return;
        return self.Apis.Basic();
      }

      Actions = (self) => {
        $("#update-basic").click(() => {
          const nick = $("#nickname").val(),
            rank = $("#rank").val(),
            email = $("#email").val(),
            functi = $("#function option:selected").val();

          self.Basic(self, nick, rank, email, functi);
        });

        $("#edit-password").click(() => {
          const password = $("#newPassword").val(),
            repeat = $("#confirmPassword").val();

          if (!self.Filters.Password(password, repeat)) return;
          return self.Apis.Password();
        });

        $("#edit-questions").click(() => {
          const question = $("#secret_question option:selected").val(),
            answer = $("#secret_reply").val();

          if (!self.Filters.Question(question, answer)) return;
          return self.Apis.Question();
        });

        $("#edit-extra").click(() => {
          const gold = $("#gold").val(),
            cash = $("#cash").val(),
            exp = $("#exp").val();

          if (!self.Filters.Extra(gold, cash, exp)) return;
          return self.Apis.Extra();
        });

        $("#edit-event").click(() => {
          const tokens = $("#tokens").val();

          if (!self.Filters.Event(tokens)) return;
          return self.Apis.Event();
        });

        $("#ban-account").click(() => {
          alert("Not implemented yet");
        });

        $("#delete-account").click(() => {
          if (!self.Filters.Delete()) return;
          return self.Apis.Delete();
        });

      }

      init() {
        this.Actions(this);
      }
    }
    new EditUser().init();
  </script>
  <?php include('src/includes/master/Footer.include.php'); ?>