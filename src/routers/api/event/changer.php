<?php

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
  echo json_encode(array('status' => false, 'error' => 'ID Invalido'));
  exit;
}
try {
  //if (!$Recaptcha->verify($_POST["g_recaptcha_response"], "V3")) {
  //  echo json_encode(array('status' => false, 'msg' => 'Invalid reCAPTCHA'));
  //  exit;
  //}
  $Event = new $Init["Event"]["Usage"];
  $Execute = $Event->changer($_POST['id']);
  if ($Execute[0]) {
    echo json_encode(array('status' => true));
    exit;
  } else {
    echo json_encode(array('status' => false, 'error' => $Execute[1]));
    exit;
  }
} catch (Exception $e) {
  echo json_encode(array('status' => false, 'error' => 'Erro interno'));
  exit;
}
