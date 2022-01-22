<?php

if (!isset($_POST['username'], $_POST['password'], $_POST["g_recaptcha_response"], $_POST["code"])) {
  echo json_encode(array('status' => false, 'error' => 'Invalid request'));
  exit;
}

try {
  $Recaptcha = new $Init["Recaptcha"];
  if (!$Recaptcha->verify($_POST["g_recaptcha_response"], "V3")) {
    echo json_encode(array('status' => false, 'msg' => 'Invalid reCAPTCHA'));
    exit;
  }
  $Authenticate = new $Init["Client"]["Advance"]["Authenticate"];
  if ($Authenticate->LoginClient($_POST['username'], $_POST['password'], $_POST["code"])) {
    //if (EVENT_ACTIVE && REWARD_BY_LOGGIN) $Event["Features"]->winByLoggingIn();
    echo json_encode(array('status' => true, 'msg' => 'Login successful'));
  } else {
    echo json_encode(array('status' => false, 'msg' => 'Login failed'));
  }
  exit;
} catch (Exception $e) {
  echo json_encode(array('status' => false, 'msg' => 'Erro interno'));
  exit;
}
