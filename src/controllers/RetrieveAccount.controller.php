<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Retrieve Account Controller 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\RetrieveAccount;

use BixcoitoDoce\CMPDOProstgreSQL\Connection;
use BixcoitoDoce\CMMail\Mailer;

class Addons
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  protected function EncryPassword($Senha)
  {
    $salt = '/x!a@r-$r%an¨.&e&+f*f(f(a)';
    $output = hash_hmac('md5', $Senha, $salt);
    return $output;
  }

  protected function invalidToken($Token)
  {
    if (!isset($Token) || $Token == "" || is_null($Token)) true;
    if (strlen($Token) != 64) return true;
    if (!preg_match('/^[a-zA-Z0-9]+$/', $Token)) return true;
  }


  protected function checkToken($Token)
  {
    if ($this->invalidToken($Token)) return false;
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_retrieve_accounts WHERE token = :a");
    $sth->execute([
      ":a" => $Token
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  protected function changerPassword($Password, $User)
  {
    $sth = $this->Conn->prepareCM("UPDATE accounts SET password = :a WHERE login = :b");
    $sth->execute([
      ":a" => $this->EncryPassword($Password),
      ":b" => $User
    ]);
  }

  protected function deleteToken($Token)
  {
    $sth = $this->Conn->prepareCM("DELETE FROM cmweb_retrieve_accounts WHERE token = :a");
    $sth->execute([
      ":a" => $Token
    ]);
  }

  protected function invalidUserText($User)
  {
    if (strlen($User) < 3) return true;
    if (strlen($User) > 20) return true;
    if (!preg_match('/^[a-zA-Z0-9]+$/', $User)) return true;
    return false;
  }

  protected function invalidEmailText($Email)
  {
    if (strlen($Email) < 6) return true;
    if (strlen($Email) > 50) return true;
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) return true;
    return false;
  }

  protected function genereteToken()
  {
    $token = bin2hex(random_bytes(32));
    return $token;
  }

  protected function insertToken($User, $Token)
  {
    $sth = $this->Conn->prepareCM("INSERT INTO cmweb_retrieve_accounts (login, token) VALUES (:a, :b)");
    $sth->execute([
      ":a" => $User,
      ":b" => $Token
    ]);
  }

  protected function findAccount($User)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts WHERE login = :a");
    $sth->execute([
      ":a" => $User,
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  protected function checkRetrieveExist($User)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_retrieve_accounts WHERE login = :a");
    $sth->execute([
      ":a" => $User
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }
}

class Email extends Addons
{


  private function sendMail($User, $Email, $Token)
  {
    $Mail = new Mailer();
    return [$Mail->send($Email, $User, "PB CM Recuperar conta", "Olá, " . $User . "!\n\nPara recuperar seu cadastro, acesse o link abaixo:\n\n" . __DOMAIN__ . "/change-password?token=" . $Token . "\n\nCaso não tenha sido você, ignore este e-mail.\n\nAtenciosamente,\nEquipe PointBlank", "asd")];
  }

  public function handler($User, $Email)
  {
    if ($this->invalidUserText($User)) return [false, "Login invalido"];
    if ($this->invalidEmailText($Email)) return [false, "Email invalido"];
    $Details = $this->findAccount($User);
    if (!$Details) return [false, "Usuario não encontrado"];
    if ($Details["email"] != $Email) return [false, "Este email não esta vinculado a esta conta"];
    $Token = $this->genereteToken();
    $this->insertToken($User, $Token);
    $this->sendMail($User, $Email, $Token);
    return [true, "Email enviado com sucesso"];
  }
}

class Questions extends Addons
{



  private function invalidAnswerText($ArrayAnswer)
  {
    if (!is_numeric($ArrayAnswer["question"]))         return true;
    if (strlen($ArrayAnswer["answer"]) < 3)   return true;
    if (strlen($ArrayAnswer["answer"]) > 20)  return true;
    if (!preg_match('/^[a-zA-Z0-9]+$/', $ArrayAnswer["answer"])) return true;
    return false;
  }

  private function detailsAnswerUser($User)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_retrieve_answers WHERE login = :a");
    $sth->execute([
      ":a" => $User
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  public function handler($User, $ArrayAnswer)
  {
    if ($this->invalidUserText($User))          return [false, "Login invalido"];
    if ($this->invalidAnswerText($ArrayAnswer)) return [false, "Questão invalida"];

    $DetailsUser = $this->findAccount($User);
    if (!$DetailsUser) return [false, "Usuario não encontrado"];

    $Details = $this->detailsAnswerUser($User);
    if (!$Details)     return [false, "Usuario não encontrado"];

  

    if ($ArrayAnswer["question"] == $Details["question"] && $ArrayAnswer["answer"] == $Details["answer"]) {
      if ($this->checkRetrieveExist($User)) {
        return [true, $this->checkRetrieveExist($User)["token"]];
      }
      $Token = $this->genereteToken();
      $this->insertToken($User, $Token);
      return [true, $Token];
    }
    return [false, "Resposta e/ou Pergunta incorreta"];
  }
}

class ChangePassword extends Addons
{

  public function checkToken($Token)
  {
    if ($this->invalidToken($Token)) return false;
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_retrieve_accounts WHERE token = :a");
    $sth->execute([
      ":a" => $Token
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  public function handler($Password, $Token)
  {
    if ($this->invalidToken($Token)) return [false, "Token invalido"];
    $Details = $this->checkToken($Token);
    if (!$Details) return [false, "Token invalido"];
    $this->changerPassword($Password, $Details["login"]);
    $this->deleteToken($Token);
    return [true, "Senha alterada com sucesso"];
  }
}
