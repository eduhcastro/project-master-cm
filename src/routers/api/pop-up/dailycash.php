<?php
try {
  $DailyCash = new $Init["DailyCash"];
  $Execute = $DailyCash->handler();
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
