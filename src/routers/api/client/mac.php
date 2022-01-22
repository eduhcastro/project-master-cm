<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];

try {
  $Explode = explode("/", $user_agent);
  if(!isset($Explode[0]) || $Explode[0] != "axios"){
    echo json_encode(array('status' => false, 'msg' => 'System address is invalid'));
    exit;
  }
  $HOST = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $AddonsRoot = new $Init['AddonsRoot'];
  if (isset($AddonsRoot->getParams($HOST)["address"])) {
    $Mac = new $Init["Client"]["Mac"];
    $Execute = $Mac->handler($AddonsRoot->getParams($HOST)["address"]);
    if ($Execute) {
      echo json_encode(array('status' => true, 'user' => $Execute["user"], 'msg' => 'Mac address is valid'));
      exit;
    }
    echo json_encode(array('status' => false, 'msg' => 'Mac address is invalid'));
    exit;
  }
  echo json_encode(array('status' => false, 'msg' => 'Mac address is invalid'));
  exit;
} catch (Exception $e) {
  echo json_encode(array('status' => false, 'error' => 'Erro interno'));
  exit;
}
