<?php

if (!isset($_POST['code'], $_POST["g_recaptcha_response"]) || !preg_replace("/[^a-zA-Z0-9]+/", "", $_POST['code'])) {
  echo json_encode(array('status' => false, 'error' => 'Cupom Invalido'));
  exit;
}
try {
  $Recaptcha = new $Init["Recaptcha"];
  if (!$Recaptcha->verify($_POST["g_recaptcha_response"], "V3")) {
    echo json_encode(array('status' => false, 'msg' => 'Invalid reCAPTCHA'));
    exit;
  }
  $Recharge = new $Init["Recharge"]["coupon"];
  $Execute = $Recharge->handler($_POST['code']);
  if ($Execute[0]) {
    $Event = new $Init["Event"]["Features"];
    if (EVENT_ACTIVE && REWARD_BY_CODE) $Event["Features"]->winByUsageCode();
    echo json_encode(array('status' => true, 'code' => [$Execute[1], $Execute[2], $Execute[3]]));
    exit;
  } else {
    echo json_encode(array('status' => false, 'error' => $Execute[1]));
    exit;
  }
} catch (Exception $e) {
  echo json_encode(array('status' => false, 'error' => 'Erro interno'));
  exit;
}
