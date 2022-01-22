<?php
try{
  $Authenticate = new $Init["Authenticate"];
  if($Authenticate->SessionAuth()){
    $Authenticate->SessionDestroy();
    echo '{"status": true}';
    exit;
  }
}catch(Exception $e){
  echo '{"status": false}';
  exit;
}
