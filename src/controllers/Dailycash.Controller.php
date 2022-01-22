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

namespace BixcoitoDoce\Dailycash;

use BixcoitoDoce\CMPDOProstgreSQL\Connection;

class DailyCash
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  private function randomCash()
  {
    return rand(100, 10000);
  }

  private function checkUser()
  {
    $sth = $this->Conn->prepareCM("SELECT login,cmweb_dailycash FROM accounts WHERE login = :a");
    $sth->execute([
      ":a" => $_SESSION['user'],
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  private function setCash()
  {
    $sth = $this->Conn->prepareCM("UPDATE accounts SET cmweb_dailycash = :daly, money = money + :m  WHERE login = :lo");
    $sth->execute([
      ":daly" => date("d/m/Y"),
      ":lo" => $_SESSION["user"],
      ":m" => $this->randomCash()
    ]);
  }

  public function handler()
  {
    if (date_format(date_create($this->checkUser()["cmweb_dailycash"]), 'd/m/Y') == date("d/m/Y")) return [false, "Erro"];
    $this->setCash();
    return [true];
  }
}