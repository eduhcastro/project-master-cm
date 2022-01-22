<?php

if (!isset($_POST['username'], $_POST['quest'], $_POST["g_recaptcha_response"])) {
  echo json_encode(array('status' => false, 'error' => 'Invalid request'));
  exit;
}

try {
  $Recaptcha = new $Init["Recaptcha"];
  if (!$Recaptcha->verify($_POST["g_recaptcha_response"])) {
    echo json_encode(array('status' => false, 'msg' => 'Invalid reCAPTCHA'));
    exit;
  }
  $Retrive = new $Init["Retrive"]["Questions"];
  $Execute = $Retrive->handler($_POST['username'], $_POST['quest']);
  if ($Execute[0]) {
    echo json_encode(array('status' => true, 'msg' => $Execute[1]));
  } else {
    echo json_encode(array('status' => false, 'msg' => $Execute[1]));
  }
  exit;
} catch (Exception $e) {
  var_dump($e);
  echo json_encode(array('status' => false, 'msg' => 'Erro interno'));
  exit;
}
