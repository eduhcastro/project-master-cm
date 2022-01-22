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

namespace BixcoitoDoce\CMCheckAccount;

use BixcoitoDoce\CMPDOProstgreSQL\Connection;

class CheckAccount
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  private function findAccount($Token)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts_temp WHERE token = :a");
    $sth->execute([
      ":a" => $Token,
    ]);
    return [$sth->fetch(\PDO::FETCH_ASSOC), $sth->rowCount()];
  }

  private function deleteTempAccount($Token)
  {
    $sth = $this->Conn->prepareCM("DELETE FROM accounts_temp WHERE token = :a");
    $sth->execute([
      ":a" => $Token,
    ]);
  }

  private function insertAccount()
  {
    $sth = $this->Conn->prepareCM("INSERT INTO accounts (login, password, email) VALUES (:a, :b, :c)");
    $sth->execute([
      ":a" => $this->findAccount($this->token)[0]["login"],
      ":b" => $this->findAccount($this->token)[0]["password"],
      ":c" => $this->findAccount($this->token)[0]["email"]
    ]);
  }

  private function insertAsnwer()
  {
    $sth = $this->Conn->prepareCM("INSERT INTO cmweb_retrieve_answers (login, question, answer) VALUES (:a, :c, :b)");
    $sth->execute([
      ":a" => $this->findAccount($this->token)[0]["login"],
      ":b" => explode("/",$this->findAccount($this->token)[0]["answer"])[1],
      ":c" => explode("/",$this->findAccount($this->token)[0]["answer"])[0]
    ]);
  }

  public function handler($Token)
  {
    $this->token = $Token;
    if (!isset($Token) || $Token == '')     return [false, "Token não informado"];
    if ($this->findAccount($Token)[1] <= 0) return [false, "Token invalido"];
    $this->insertAccount();
    $this->insertAsnwer();
    $this->deleteTempAccount($Token);
    return [true];
  }
}
