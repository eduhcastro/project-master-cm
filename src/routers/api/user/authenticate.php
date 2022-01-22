<?php

if (!isset($_POST['username'], $_POST['password'], $_POST["g_recaptcha_response"])) {
  echo json_encode(array('status' => false, 'error' => 'Invalid request'));
  exit;
}

try {
  $Recaptcha = new $Init["Recaptcha"];
  if (!$Recaptcha->verify($_POST["g_recaptcha_response"])) {
    echo json_encode(array('status' => false, 'msg' => 'Invalid reCAPTCHA'));
    exit;
  }
  $Authenticate = new $Init["Authenticate"];
  $Event = new $Init["Event"]["Features"];
  if ($Authenticate->Login($_POST['username'], $_POST['password'])) {
    if (EVENT_ACTIVE && REWARD_BY_LOGGIN) $Event->winByLoggingIn();
    echo json_encode(array('status' => true, 'msg' => 'Login successful'));
  } else {
    echo json_encode(array('status' => false, 'msg' => 'Login failed'));
  }
  exit;
} catch (Exception $e) {
  echo json_encode(array('status' => false, 'msg' => 'Erro interno'));
  exit;
}
