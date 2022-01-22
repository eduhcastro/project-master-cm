<?php

if (!isset($_POST['password'], $_POST['token'], $_POST["g_recaptcha_response"])) {
  echo json_encode(array('status' => false, 'error' => 'Invalid request'));
  exit;
}

try {
  $Recaptcha = new $Init["Recaptcha"];
  if (!$Recaptcha->verify($_POST["g_recaptcha_response"])) {
    echo json_encode(array('status' => false, 'msg' => 'Invalid reCAPTCHA'));
    exit;
  }

  $Retrive = new $Init["Retrive"]["Password"];
  $Execute = $Retrive->handler($_POST['password'], $_POST['token']);
  if ($Execute[0]) {
    echo json_encode(array('status' => true, 'msg' => 'Alterado com sucesso!'));
  } else {
    echo json_encode(array('status' => false, 'msg' => $Execute[1]));
  }
  exit;
} catch (Exception $e) {
  echo json_encode(array('status' => false, 'msg' => 'Erro interno'));
  exit;
}
