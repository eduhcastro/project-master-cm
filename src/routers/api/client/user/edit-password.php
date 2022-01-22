<?php

if (!isset($_POST['new'], $_POST['confirm'], $_POST["id"])) {
  echo json_encode(array('status' => false, 'error' => 'Invalid request'));
  exit;
}

if($_POST['new'] != $_POST['confirm']){
  echo json_encode(array('status' => false, 'error' => 'Passwords do not match'));
  exit;
}

try {
  $Execute = new $InitD["Users"]["Responsive"];
  if ($Execute->editUserPassword($_POST)) {
    echo json_encode(array('status' => true, 'msg' => 'User password edited successfully'));
  } else {
    echo json_encode(array('status' => false, 'msg' => 'User not edited'));
  }
  exit;
} catch (Exception $e) {
  echo json_encode(array('status' => false, 'msg' => 'Erro interno'));
  exit;
}
