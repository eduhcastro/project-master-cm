<?php

if (!isset($_POST['email'], $_POST['senha_atual'], $_POST["token"])) {
  echo json_encode(array('status' => false, 'error' => 'Invalid request'));
  exit;
}

try {
  $Recaptcha = new $Init["Recaptcha"];
  if (!$Recaptcha->verify($_POST["token"], "V3")) {
    echo json_encode(array('status' => false, 'msg' => 'Invalid reCAPTCHA'));
    exit;
  }
  $Execute = new $Init["User"];
  if ($Execute->updateData($_POST)[0]) {
    echo json_encode(array('status' => true, 'msg' => 'Update successful'));
  } else {
    echo json_encode(array('status' => false, 'msg' => $Execute->updateData($_POST)[1]));
  }
  exit;
} catch (Exception $e) {
  echo json_encode(array('status' => false, 'msg' => 'Erro interno'));
  exit;
}
