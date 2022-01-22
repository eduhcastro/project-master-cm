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

namespace BixcoitoDoce\CMUsersD;

use BixcoitoDoce\CMPDOProstgreSQL\Connection;

class Addons
{

  private function SearchQuest($Index)
  {
    foreach (SECRET_QUESTIONS as $key => $value) {
      if ($key == $Index) return true;
    }
    return false;
  }

  protected function SwitchQuery($filter)
  {
    switch ($filter) {
      case "all":
        return ["SELECT * FROM accounts ORDER BY player_id DESC", []];
      case "playing":
        return ["SELECT * FROM accounts WHERE online = :o ORDER BY player_id DESC", [":o" => "t"]];
      case "masters":
        return ["SELECT * FROM accounts WHERE access_level >= :l ORDER BY player_id DESC", [":l" => "1"]];
    }
  }

  protected function EncryPassword($Senha)
  {
    $salt = '/x!a@r-$r%an¨.&e&+f*f(f(a)';
    $output = hash_hmac('md5', $Senha, $salt);
    return $output;
  }


  protected function invalidAnswerText($ArrayAnswer)
  {
    if (!is_array($ArrayAnswer))        return true;
    if (count($ArrayAnswer) < 2)       return true;
    if (@$ArrayAnswer["answer"] == '')   return true;
    if (@$ArrayAnswer["question"] == '') return true;
    if (!is_numeric($ArrayAnswer["question"]))    return true;
    if (!$this->SearchQuest($ArrayAnswer["question"])) return true;
    if (strlen($ArrayAnswer["answer"]) < 3)   return true;
    if (strlen($ArrayAnswer["answer"]) > 20)  return true;
    if (!preg_match('/^[a-zA-Z0-9]+$/', $ArrayAnswer["answer"])) return true;
    return false;
  }
}

class UsersD extends Addons
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  public function countUsers($filter)
  {
    $sth = $this->Conn->prepareCM($this->SwitchQuery($filter)[0]);
    $sth->execute($this->SwitchQuery($filter)[1]);
    return $sth->rowCount();
  }

  /**
   * Function to /controller/users/edit-user
   */
  public function listUsers()
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts ORDER BY player_id DESC LIMIT 30");
    $sth->execute();
    $Position = 0;
    while ($Result = $sth->fetch(\PDO::FETCH_ASSOC)) {
      $Position++;
      echo ' <tr>
      <td>
        <div class="d-flex px-2 py-1">
          <div>
            <img src="/template/images/ranks/icon/' . $Result["rank"] . '.png" class="avatar avatar-sm me-3" alt="user1">
          </div>
          <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm"> ' . $Result["login"] . ' - ' . ($Result["player_name"] ? $Result["player_name"] : "Await...") . '</h6>
            <p class="text-xs text-secondary mb-0">' . $Result["email"] . '</p>
          </div>
        </div>
      </td>
      <td>
        <p class="text-xs font-weight-bold mb-0">' . LEVELS_ACCESS[$Result['access_level']] . '</p>
        
      </td>
      <td class="align-middle text-center text-sm">
        <span class="badge badge-sm bg-gradient-' . ($Result["online"] == "t" ? "success" : "secondary") . '">' . ($Result["online"] == "t" ? "Online" : "Offline") . '</span>
      </td>
      <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
      </td>
      <td class="align-middle">
        <a href="/dashboard/controller/users/edit-user?id=' . $Result["player_id"] . '" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
          Edit
        </a>
      </td>
    </tr>';
    }
  }

  /**
   * Function to /controller/users/list-banneds
   */
  public function listBanneds() // falta terminar
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts ORDER BY player_id DESC LIMIT 30");
    $sth->execute();
    $Position = 0;
    while ($Result = $sth->fetch(\PDO::FETCH_ASSOC)) {
      $Position++;
      echo ' <tr>
      <td>
        <div class="d-flex px-2 py-1">
          <div>
            <img src="/template/images/ranks/icon/' . $Result["rank"] . '.png" class="avatar avatar-sm me-3" alt="user1">
          </div>
          <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm"> ' . $Result["login"] . ' - ' . ($Result["player_name"] ? $Result["player_name"] : "Await...") . '</h6>
            <p class="text-xs text-secondary mb-0">' . $Result["email"] . '</p>
          </div>
        </div>
      </td>
      <td>
        <p class="text-xs font-weight-bold mb-0">' . LEVELS_ACCESS[$Result['access_level']] . '</p>
        
      </td>
      <td class="align-middle text-center text-sm">
        <span class="badge badge-sm bg-gradient-' . ($Result["online"] == "t" ? "success" : "secondary") . '">' . ($Result["online"] == "t" ? "Online" : "Offline") . '</span>
      </td>
      <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
      </td>
      <td class="align-middle">
        <a href="/dashboard/controller/users/edit-user?id=' . $Result["player_id"] . '" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
          Edit
        </a>
      </td>
    </tr>';
    }
  }

  /**
   * Function to /controller/users/list-gms
   */
  public function listUsersGMS()
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts WHERE rank = 53 ORDER BY player_id DESC LIMIT 30");
    $sth->execute();
    $Position = 0;
    while ($Result = $sth->fetch(\PDO::FETCH_ASSOC)) {
      $Position++;
      echo ' <tr>
      <td>
        <div class="d-flex px-2 py-1">
          <div>
            <img src="/template/images/ranks/icon/' . $Result["rank"] . '.png" class="avatar avatar-sm me-3" alt="user1">
          </div>
          <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm"> ' . $Result["login"] . ' - ' . ($Result["player_name"] ? $Result["player_name"] : "Await...") . '</h6>
            <p class="text-xs text-secondary mb-0">' . $Result["email"] . '</p>
          </div>
        </div>
      </td>
      <td>
        <p class="text-xs font-weight-bold mb-0">' . LEVELS_ACCESS[$Result['access_level']] . '</p>
        
      </td>
      <td class="align-middle text-center text-sm">
        <span class="badge badge-sm bg-gradient-' . ($Result["online"] == "t" ? "success" : "secondary") . '">' . ($Result["online"] == "t" ? "Online" : "Offline") . '</span>
      </td>
      <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
      </td>
      <td class="align-middle">
        <a href="/dashboard/controller/users/edit-user?id=' . $Result["player_id"] . '" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
          Edit
        </a>
      </td>
    </tr>';
    }
  }


  public function getUser($ID)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts WHERE player_id = :id");
    $sth->execute([":id" => $ID]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  public function getAnswers($Login)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_retrieve_answers WHERE login = :login");
    $sth->execute([":login" => $Login]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  public function getTokens($Login)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_event_users WHERE login = :login");
    $sth->execute([":login" => $Login]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  /**
   * Function to /controller/users/edit-user
   */
  public function editUser($Params)
  {
    $sth = $this->Conn->prepareCM("UPDATE accounts SET player_name = :name, email = :email, access_level = :access, rank = :rank WHERE player_id = :id");
    $sth->execute([
      ":name" => $Params["nick"],
      ":rank" => $Params["rank"],
      ":email" => $Params["email"],
      ":access" => $Params["func"],
      ":id" => $Params["id"]
    ]);
    return true;
  }

  public function editUserPassword($Params)
  {
    $sth = $this->Conn->prepareCM("UPDATE accounts SET password = :password WHERE player_id = :id");
    $sth->execute([
      ":password" => $this->EncryPassword($Params["new"]),
      ":id" => $Params["id"]
    ]);
    return true;
  }

  public function editUserQuestion($Params)
  {
    if ($this->invalidAnswerText($Params)) return false;
    $sth = $this->Conn->prepareCM("UPDATE cmweb_retrieve_answers SET question = :question, answer = :answer WHERE login = :login");
    $sth->execute([
      ":question" => $Params["question"],
      ":answer" => $Params["answer"],
      ":login" => $Params["login"]
    ]);
    return true;
  }

  public function editExtraUser($Params)
  {
    $sth = $this->Conn->prepareCM("UPDATE accounts SET exp = :exp, gp = :gp, money = :money WHERE player_id = :id");
    $sth->execute([
      ":exp" => $Params["exp"],
      ":gp" => $Params["gold"],
      ":money" => $Params["cash"],
      ":id" => $Params["id"]
    ]);
    return true;
  }

  public function editUserEvent($Params)
  {
    $sth = $this->Conn->prepareCM("UPDATE cmweb_event_users SET tokens = :tokens WHERE login = :login");
    $sth->execute([
      ":tokens" => $Params["tokens"],
      ":login" => $Params["login"]
    ]);
    return true;
  }

  public function deleteUser($Params)
  {
    $sth = $this->Conn->prepareCM("DELETE FROM accounts WHERE player_id = :id");
    $sth->execute([":id" => $Params["id"]]);
    if ($sth->rowCount() > 0) {
      $Items = $this->Conn->prepareCM("DELETE FROM player_items WHERE owner_id = :id");
      $Items->execute([":id" => $Params["id"]]);

      $Friends1 = $this->Conn->prepareCM("DELETE FROM friends WHERE owner_id = :id");
      $Friends1->execute([":id" => $Params["id"]]);

      $Friends2 = $this->Conn->prepareCM("DELETE FROM friends WHERE friend_id = :id");
      $Friends2->execute([":id" => $Params["id"]]);

      $Event = $this->Conn->prepareCM("DELETE FROM cmweb_event_users WHERE login = :id");
      $Event->execute([":id" => $Params["login"]]);

      $Answers = $this->Conn->prepareCM("DELETE FROM cmweb_retrieve_answers WHERE login = :id");
      $Answers->execute([":id" => $Params["login"]]);

      $Recharges = $this->Conn->prepareCM("DELETE FROM cmweb_recharges_history WHERE login = :id");
      $Recharges->execute([":id" => $Params["login"]]);

      // Func to 3.24++
      //$Characteres = $this->Conn->prepareCM("DELETE FROM player_characters WHERE player_id = :id");
      //$Characteres->execute([":id" => $Params["id"]]);
      return true;
    }
    return false;
  }

  public function insetAnswers($Login)
  {
    $sth = $this->Conn->prepareCM("INSERT INTO cmweb_retrieve_answers (login, question, answer) VALUES (:a, :b, :c);");
    $sth->execute([
      ":a" => $Login,
      ":b" => "1",
      ":c" => "New"
    ]);
  }

  /**
   * Function to /client/user/search Api
   */
  public function searchUser($Params)
  {
    $Type = $Params["type"] == "string" ? "string" : "int";
    if ($Params["user"] == "") return false;
    if ($Type == "int") {
      return $this->getUser($Params["user"]);
    }
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts WHERE player_name = :user");
    $sth->execute([":user" => $Params["user"]]);
    $Result = $sth->fetch(\PDO::FETCH_ASSOC);
    if (empty($Result)) {
      $sth = $this->Conn->prepareCM("SELECT * FROM accounts WHERE email = :user");
      $sth->execute([":user" => $Params["user"]]);
      $Result = $sth->fetch(\PDO::FETCH_ASSOC);
      if (empty($Result)) {
        $sth = $this->Conn->prepareCM("SELECT * FROM accounts WHERE login = :user");
        $sth->execute([":user" => $Params["user"]]);
        $Result = $sth->fetch(\PDO::FETCH_ASSOC);
        if (empty($Result)) {
          return false;
        }
        return $Result;
      }
      return $Result;
    }
    return $Result;
  }
}
