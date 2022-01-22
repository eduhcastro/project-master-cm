<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite PGSQL PDO 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\CMPDOProstgreSQL;

class Connection
{
  private $dsn, $username, $password, $database, $pdo;

  public function outputPDOerror($errorCode = 0)
  {
    return 'Website Offline';
  }

  public function __construct($host = DATABASE_HOST, $username = DATABASE_USER, $password = DATABASE_PASSWORD, $database = DATABASE_NAME)
  {
    $this->dsn = "pgsql:dbname=$database;host=$host";
    $this->username = $username;
    $this->password = $password;
    $this->database = $database;
  }
  public function On()
  {
    try {
      $this->pdo = new \PDO($this->dsn, $this->username, $this->password, null);
      $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    } catch (\PDOException $err) {
      die($this->outputPDOerror($err->getCode()));
    }
  }
  public function prepareCM($query)
  {
    return $this->pdo->prepare($query);
  }
  public function bindCM($query)
  {
    return $this->pdo->bindParam($query);
  }
  public function queryCM($query)
  {
    return $this->pdo->query($query);
  }
}
