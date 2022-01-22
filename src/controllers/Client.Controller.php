<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Check Account 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\Client;

use BixcoitoDoce\CMPDOProstgreSQL\Connection;

class Mac
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  private function checkMac()
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_macs_master WHERE mac = :mac");
    $sth->execute([
      ":mac" => $this->mac
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  public function handler($Mac)
  {
    $this->mac = $Mac;
    return $this->checkMac();
  }
}

class Usage
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  private function checkBrowser(){
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
      return strpos($user_agent, 'Electron');
  }

  public function handler(){
    return $this->checkBrowser();
  } 
}