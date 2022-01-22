<?php

if (!isset(
  $_POST['username'],
  $_POST['password'],
  $_POST['email'],
  $_POST['quest'],
  $_POST["g_recaptcha_response"],
)) {
  echo json_encode(array('status' => false, 'error' => 'Invalid request'));
  exit;
}

try {
  $Recaptcha = new $Init["Recaptcha"];
  if (!$Recaptcha->verify($_POST["g_recaptcha_response"])) {
    echo json_encode(array('status' => false, 'msg' => 'Invalid reCAPTCHA'));
    exit;
  }

  $Register = new $Init["Register"];
  $Executar = $Register->execute(
    $_POST['username'],
    $_POST['password'],
    $_POST['email'],
    $_POST['quest'],
  );
  if ($Executar[0]) {
    echo json_encode(array('status' => true, 'msg' => 'Register successful'));
  } else {
    echo json_encode(array('status' => false, 'msg' => $Executar[1]));
  }
  exit;
} catch (Exception $e) {
  var_dump($e);
  echo json_encode(array('status' => false, 'msg' => 'Erro interno'));
  exit;
}
