<?php

if (!isset($_POST['nick'], $_POST['email'], $_POST["rank"], $_POST["func"], $_POST["id"])) {
  echo json_encode(array('status' => false, 'error' => 'Invalid request'));
  exit;
}

try {
  $Execute = new $InitD["Users"]["Responsive"];
  if ($Execute->editUser($_POST)) {
    echo json_encode(array('status' => true, 'msg' => 'User edited successfully'));
  } else {
    echo json_encode(array('status' => false, 'msg' => 'User not edited'));
  }
  exit;
} catch (Exception $e) {
  echo json_encode(array('status' => false, 'msg' => 'Erro interno'));
  exit;
}
