<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Authentication 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\CMAuthenticate;

require 'PGSQL.Controller.php';

use BixcoitoDoce\CMPDOProstgreSQL\Connection;

class Authenticate
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

  public function SessionAuth()
  {
    return isset($_SESSION['user']);
  }

  public function SessionDestroy()
  {
    session_destroy();
  }


  public function Login($User, $Password)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts WHERE login = :a AND password = :b;");
    $sth->execute([
      ":a" => $User,
      ":b" => $this->EncryPassword($Password)
    ]);
    $res = $sth->fetch(\PDO::FETCH_ASSOC);
    if ($res) {
      $_SESSION['user']      =  $res['login'];
      $_SESSION['player_id'] =  $res['player_id'];
      $_SESSION['master']    =  $res['access_level'];
      return true;
    }
    return false;
  }

  public function userDetails()
  {
    return $_SESSION;
  }
}

class AuthenticateClient extends Authenticate
{
  public function __construct()
  {
    parent::__construct();
  }

  private function get_only_numbers($string)
  {
    return preg_replace('/\D+/', '', $string); // returns "49950"
  }

  private function findMac($Mac, $User)
  {
    //echo $Mac;
    //echo $User;
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_macs_master WHERE mac = :user");
    $sth->execute([
      ":user" => $Mac
    ]);
    $res = $sth->fetch(\PDO::FETCH_ASSOC);
    ///var_dump($res);
    if ($res) {
      if ($res["user"] == $User) {
        return true;
      }
    }

    return false;
  }

  public function LoginClient($User, $Password, $Mac)
  {

    if (!$this->findMac($Mac, $User)) return false;
    $sth = $this->Conn->prepareCM("SELECT * FROM accounts WHERE login = :a AND password = :b;");
    $sth->execute([
      ":a" => $User,
      ":b" => $this->EncryPassword($Password)
    ]);
    $res = $sth->fetch(\PDO::FETCH_ASSOC);
    if ($res) {
      $_SESSION['user']      =  $res['login'];
      $_SESSION['player_id'] =  $res['player_id'];
      $_SESSION['master']    =  $res['access_level'];
      $_SESSION['mac']       =  $Mac;
      return true;
    }
    return false;
  }
}
