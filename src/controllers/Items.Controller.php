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

namespace BixcoitoDoce\CMRRecharge\Addons;

use BixcoitoDoce\CMPDOProstgreSQL\Connection;

class Items
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  private function generateRandomId()
  {
    return rand(0000000, 9999999);
  }

  private function daysToSeconds($days)
  {
    if (is_numeric($days)) {
      return 86400 * $days;
    } else {
      return 0;
    }
  }

  private function inUse($Item)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM player_items WHERE item_id = :item AND owner_id = :owner");
    $sth->execute([
      ':item' => $Item,
      ':owner' => $_SESSION['player_id']
    ]);
    $sthRes = $sth->fetch(\PDO::FETCH_ASSOC);
    if ($sthRes > 1) {
      if ($sthRes['equip'] == 1) {
        return [1, $sthRes];
      } elseif ($sthRes['equip'] == 2) {
        return [2, $sthRes];
      }
      return [3, $sthRes];
    } else {
      return [0];
    }
  }

  private function insertNewItem($Itemid, $ItemName, $Count, $Category)
  {
    $sth = $this->Conn->prepareCM("INSERT INTO player_items (object_id,owner_id,item_id,item_name,count,category,equip) VALUES (?,?,?,?,?,?,?)");
    $sth->execute(array($this->generateRandomId(), $_SESSION["player_id"], $Itemid, $ItemName, $Count, $Category, 1));
    return true;
  }

  private function insertItemExistingUnused($Itemid, $Count)
  {
    $stmt2 = $this->Conn->prepareCM('UPDATE player_items SET count = count + :days WHERE owner_id = :logged AND item_id = :itemid');
    $stmt2->execute(array(
      ':logged' => $_SESSION["player_id"],
      ':itemid' => $Itemid,
      ':days' => $Count
    ));
    return true;
  }

  private function insertItemExistingUsed($ExistingItem, $Seconds)
  {
    $Date = $ExistingItem['count'];
    $Year = substr($Date, 0, 2);
    $Month = substr($Date, 2, 2);
    $Day = substr($Date, 4, 2);
    @$More = substr($Date, 6, 4);
    $TransFormDate = "$Year-$Month-$Day";
    $NewDate = date('ymd', strtotime($TransFormDate . ' + ' . $Seconds  / 86400 . ' days'));
    $stmt2 = $this->Conn->prepareCM('UPDATE player_items SET count = :date WHERE owner_id = :logged AND item_id = :itemid');
    $stmt2->execute(array(
      ':logged' => $_SESSION["player_id"],
      ':itemid' => $ExistingItem["item_id"],
      ':date' => $NewDate . $More
    ));
    return true;
  }

  public function handler($Itemid, $ItemName, $Count, $Category)
  {
    $WeaponInUser = $this->inUse($Itemid);
    if ($WeaponInUser[0] == 0) return $this->insertNewItem($Itemid, $ItemName, $Count, $Category);
    if ($WeaponInUser[0] == 1) return $this->insertItemExistingUnused($Itemid, $Count);
    if ($WeaponInUser[0] == 2) return $this->insertItemExistingUsed($WeaponInUser[1], $Count);
    //if($WeaponInUser[0] == 3) return $this->insertItemExistingUsed($WeaponInUser[1], $Count); OUTRO TIPO DE ITEM
  }
}
