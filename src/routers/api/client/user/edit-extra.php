<?php

if (!isset($_POST['gold'], $_POST['cash'], $_POST["exp"], $_POST["id"])) {
  echo json_encode(array('status' => false, 'error' => 'Invalid request'));
  exit;
}

try {
  $Execute = new $InitD["Users"]["Responsive"];
  if ($Execute->editExtraUser($_POST)) {
    echo json_encode(array('status' => true, 'msg' => 'User Extra edited successfully'));
  } else {
    echo json_encode(array('status' => false, 'msg' => 'User not edited'));
  }
  exit;
} catch (Exception $e) {
  echo json_encode(array('status' => false, 'msg' => 'Erro interno'));
  exit;
}
