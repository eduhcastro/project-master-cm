<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Recharge 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\CMRRecharge;

use BixcoitoDoce\CMPDOProstgreSQL\Connection;
use BixcoitoDoce\CMRRecharge\Addons\Items;

class RechargePin
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  private function decode($data)
  {
    return json_decode($data, true);
  }

  private function check($pin)
  {
    if (strlen($pin) <= 5)  return [false, "Pin Invalido"];
    if (!is_numeric($pin))  return [false, "Pin Invalido"];
    return [true];
  }

  private function search($pin)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_recharges WHERE code = :a AND type = 0");
    $sth->execute([
      ":a" => $pin,
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  private function insertHistory($pin, $id, $data)
  {
    $sth = $this->Conn->prepareCM("INSERT INTO cmweb_recharges_history (id, login, code, date, data) VALUES (:a, :b, :c, :d, :e)");
    $sth->execute([
      ":a" => $id,
      ":b" => $_SESSION["user"],
      ":c" => $pin,
      ":d" => date("Y-m-d H:i:s"),
      ":e" => $data
    ]);
  }

  private function delete($pin)
  {
    $sth = $this->Conn->prepareCM("DELETE FROM cmweb_recharges WHERE code = :a");
    $sth->execute([
      ":a" => $pin,
    ]);
  }


  private function updateUser($coin)
  {
    $sth = $this->Conn->prepareCM("UPDATE accounts SET money = money + :a WHERE login = :b");
    $sth->execute([
      ":a" => $coin,
      ":b" => $_SESSION["user"],
    ]);
  }


  public function handler($pin)
  {
    $Check = $this->check($pin);
    if (!$Check[0]) return $Check[1];
    $Pin = $this->search($pin);
    if (!$Pin) return [false, "Pin Invalido"];
    if (!isset($this->decode($Pin["data"])["value"])) return [false, "Pin Invalido"];
    $this->insertHistory($pin, $Pin["id"], $Pin["data"]);
    $this->updateUser($this->decode($Pin["data"])["value"]);
    $this->delete($pin);
    return [true, $Pin["id"], $this->decode($Pin["data"]), date("d-m-Y")];
  }
}

class RechargeCoupon
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
    $this->ItemsAddons = new Items();
  }

  private function decode($data)
  {
    return json_decode($data, true);
  }

  private function check($coupon)
  {
    if (strlen($coupon) <= 5)  return  [false,  "Cupom Invalido"];
    if (!ctype_alpha($coupon))  return [false, "Cupom Invalido"];
    return [true];
  }

  private function search($coupon)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_recharges WHERE code = :a AND type = 1");
    $sth->execute([
      ":a" => $coupon,
    ]);
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  private function insertHistory($coupon, $id, $data)
  {
    $sth = $this->Conn->prepareCM("INSERT INTO cmweb_recharges_history (id, login, code, date, data) VALUES (:a, :b, :c, :d, :e)");
    $sth->execute([
      ":a" => $id,
      ":b" => $_SESSION["user"],
      ":c" => $coupon,
      ":d" => date("Y-m-d H:i:s"),
      ":e" => $data
    ]);
  }

  private function delete($coupon)
  {
    $sth = $this->Conn->prepareCM("DELETE FROM cmweb_recharges WHERE code = :a");
    $sth->execute([
      ":a" => $coupon,
    ]);
  }

  private function updateUserItems($Data)
  {
    foreach($Data as $key => $value)
    {
      $this->ItemsAddons->handler($value["id"],$value["name"],$value["count"],$value["category"]);
    }
    return true;
  }

  public function handler($coupon)
  {
    $Check = $this->check($coupon);
    if (!$Check[0]) return $Check[1];
    $Coupon = $this->search($coupon);
    if (!$Coupon) return [false, "Cupom Invalido"];
    if (isset($this->decode($Coupon["data"])["value"])) return [false, "Cupom Invalido"];
    $this->updateUserItems($this->decode($Coupon["data"])["items"]);
    $this->insertHistory($coupon, $Coupon["id"], $Coupon["data"]);
    $this->delete($coupon);
    return [true, $Coupon["id"], $this->decode($Coupon["data"]), date("d-m-Y")];
  }
}
