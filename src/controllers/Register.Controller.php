<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Register 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/


namespace BixcoitoDoce\CMRegister;

use BixcoitoDoce\CMPDOProstgreSQL\Connection;
use BixcoitoDoce\CMMail\Mailer;

class Register
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  private function EncryPassword($Senha)
  {
    $salt = '/x!a@r-$r%an¨.&e&+f*f(f(a)';
    $output = hash_hmac('md5', $Senha, $salt);
    return $output;
  }

  private function SearchQuest($Index)
  {
    foreach (SECRET_QUESTIONS as $key => $value) {
      if ($key == $Index) return true;
    }
    return false;
  }

  private function invalidUserText($User)
  {
    if (strlen($User) < 3) return true;
    if (strlen($User) > 20) return true;
    if (!preg_match('/^[a-zA-Z0-9]+$/', $User)) return true;
    return false;
  }

  private function invalidEmailText($Email)
  {
    if (strlen($Email) < 6) return true;
    if (strlen($Email) > 50) return true;
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) return true;
    return false;
  }

  private function invalidAnswerText($ArrayAnswer)
  {
    if (!is_array($ArrayAnswer))        return true;
    if (count($ArrayAnswer) != 2)       return true;
    if (@$ArrayAnswer["answer"] == '')   return true;
    if (@$ArrayAnswer["question"] == '') return true;
    if (!is_numeric($ArrayAnswer["question"]))    return true;
    if (!$this->SearchQuest($ArrayAnswer["question"])) return true;
    if (strlen($ArrayAnswer["answer"]) < 3)   return true;
    if (strlen($ArrayAnswer["answer"]) > 20)  return true;
    if (!preg_match('/^[a-zA-Z0-9]+$/', $ArrayAnswer["answer"])) return true;
    return false;
  }

  private function AccountDetails($User, $From = "accounts_temp")
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM " . $From . " WHERE login = :a;");
    $sth->execute([
      ":a" => $User
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  private function genereteToken()
  {
    $token = bin2hex(random_bytes(32));
    return $token;
  }

  public function execute($User, $Password, $Email, $Answer)
  {
    if ($this->invalidUserText($User)) return [false, "Login invalido"];
    if ($this->invalidEmailText($Email)) return [false, "Email invalido"];
    if ($this->invalidAnswerText($Answer)) return [false, "Pergunta ou resposta invalida"];
    if ($this->AccountDetails($User) || $this->AccountDetails($User, "accounts")) return [false, "Usuario ja existente"];
    //if ($this->AccountDetails($User, "accounts")["email"] == $Email) return [false, "Email ja existente"];
    $Token = $this->genereteToken();
    $sth = $this->Conn->prepareCM("INSERT INTO accounts_temp (login, password, email, answer, token) VALUES (:a, :b, :c, :d, :e);");
    $sth->execute([
      ":a" => $User,
      ":b" => $this->EncryPassword($Password),
      ":c" => $Email,
      ":d" => $Answer["question"] . '/' . $Answer["answer"],
      ":e" => $Token
    ]);

    $Mail = new Mailer();
    return [$Mail->send($Email, $User, "PB CM Confirmacao de cadastro", "Olá, " . $User . "!\n\nPara confirmar seu cadastro, acesse o link abaixo:\n\n".__DOMAIN__."/authenticate/check?token=" . $Token . "\n\nCaso não tenha sido você, ignore este e-mail.\n\nAtenciosamente,\nEquipe PointBlank", "asd")];
  }
}
