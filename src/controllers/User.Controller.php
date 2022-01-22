<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite User 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\CMUser;

use BixcoitoDoce\CMPDOProstgreSQL\{Connection};

class Addons
{

  protected function decode($data)
  {
    return json_decode($data, true);
  }

  protected function EncryPassword($Senha)
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

  protected function invalidEmailText($Email)
  {
    if (strlen($Email) < 6) return true;
    if (strlen($Email) > 50) return true;
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) return true;
    return false;
  }

  protected function invalidAnswerText($answer)
  {
    if (@$answer == '')   return true;
    if (strlen($answer) < 3)   return true;
    if (strlen($answer) > 20)  return true;
    if (!preg_match('/^[a-zA-Z0-9]+$/', $answer)) return true;
    return false;
  }
}

class User extends Addons
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  private function insertUserInToken($User)
  {
    $sth = $this->Conn->prepareCM("INSERT INTO cmweb_event_users (login) VALUES (:a);");
    $sth->execute([
      ":a" => $User
    ]);
  }

  public function getInfo($User = null)
  {
    if (is_null($User)) $User = $_SESSION['user'];
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts WHERE login = :a");
    $sth->execute([
      ":a" => $User,
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  public function getTokensEvent($User = null)
  {
    if (is_null($User)) $User = $_SESSION['user'];
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_event_users WHERE login = :a");
    $sth->execute([
      ":a" => $User,
    ]);
    $Details = $sth->fetch(\PDO::FETCH_ASSOC);
    if (!$Details) {
      $this->insertUserInToken($User);
      return [
        "tokens" => 0,
        "login" => $User
      ];
    }
    return $Details;
  }

  public function updateData($Params)
  {
    $UserDetails = $this->getInfo();
    if ($this->EncryPassword($Params["senha_atual"]) != $UserDetails["password"]) return [false, "Senha atual incorreta"];
    if ($this->invalidEmailText($Params["email"])) return [false, "Email inválido"];

    if (isset($Params['senha'], $Params["senha_re"]) && strlen($Params['senha']) > 0) {
      if ($Params["senha"] != $Params["senha_re"]) return [false, "As senhas não são iguais"];
      $sth = $this->Conn->prepareCM("UPDATE accounts SET password = :asZ WHERE login = :login");
      $sth->execute([
        ":asZ"   => $this->EncryPassword($Params['senha']),
        ":login" => $UserDetails["login"]
      ]);
    }

    if ($Params["email"] != $UserDetails["email"]) {
      $sth = $this->Conn->prepareCM("UPDATE accounts SET email = :asZ WHERE login = :login");
      $sth->execute([
        ":asZ"   => $Params["email"],
        ":login" => $UserDetails["login"]
      ]);
    }

    if (isset($Params["resposta"]) && strlen($Params['resposta']) > 0) {
      if ($this->invalidAnswerText($Params["resposta"])) return [false, "Resposta inválida"];
      $sth = $this->Conn->prepareCM("UPDATE cmweb_retrieve_answers SET answer = :asZ WHERE login = :login");
      $sth->execute([
        ":asZ" => $Params["resposta"],
        ":login" => $UserDetails["login"]
      ]);
    }

    return [true];

  }
  
}

class UserMore extends User
{


  public function getRecharges()
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_recharges_history WHERE login = :a ORDER BY date DESC");
    $sth->execute([
      ":a" => $_SESSION['user']
    ]);
    $i = 0;
    while ($Res = $sth->fetch(\PDO::FETCH_ASSOC)) {
      $i++;
      $Decodado = $this->decode($Res['data']);
      if (isset($Decodado['value'])) {
        echo ' <tr data-target="Item-1">
      <td class="rank">
       ' . $Res["id"] . '
      </td>
      <td class="nick">PIN CASH</td>
      <td class="rank_class">' . number_format($Decodado["value"]) . ' CASH POINTS</td>
      <td class="gray" style="' . ($i == 1 ? "color: red;" : "") . '">' . date_format(date_create($Res["date"]), 'd/m/Y') . '</td>
    </tr>';
      } else {
        echo ' <tr data-target="Item-1">
        <td class="rank">
         ' . $Res["id"] . '
        </td>
        <td class="nick">CUPOM ITENS</td>
        <td class="rank_class">';
        foreach ($Decodado["items"] as $key => $value) {
          echo '' . $value["name"] . ' (' . ($value["count"] / 86400) . 'D) , ';
        }
        echo '</td><td class="gray" style="' . ($i == 1 ? "color: red;" : "") . '">' . date_format(date_create($Res["date"]), 'd/m/Y') . '</td>
      </tr>';
      }
    }
  }
}
