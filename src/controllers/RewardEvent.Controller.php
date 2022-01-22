<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite Reward Event 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\Event;

use BixcoitoDoce\CMPDOProstgreSQL\Connection;
use BixcoitoDoce\CMRRecharge\Addons\Items;

class SpecialResponsive
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  protected function details()
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_event_config LIMIT 1");
    $sth->execute();
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  public function announcement()
  {
    $Detalhes = $this->details();
    if (EVENT_ACTIVE) {
      echo '<ul>
      <li class="thumb">
        <a href="/event/now" target="_blank">
          <img src="' . $Detalhes["image"] . '">
        </a>
      </li>
      <li class="cont">
        <p class="title"><a href="#">' . $Detalhes["title"] . '</a></p>
        <p class="date">' . date_format(date_create($Detalhes["start"]), 'd/m/Y') . ' até ' . date_format(date_create($Detalhes["end"]), 'd/m/Y') . '
        </p><p>
        </p><p class="txt"><a href="#">' . $Detalhes["text"] . '</a></p>
      </li>
    </ul>';
    } else {
      echo '<ul>
      <li class="thumb">
        <a href="#" target="_blank">
          <img src="' . $Detalhes["image"] . ' filter: grayscale(1);">
        </a>
      </li>
      <li class="cont">
        <p class="title"><a href="#">[FINALIZADO] ' . $Detalhes["title"] . '</a></p>
        <p class="date">' . date_format(date_create($Detalhes["start"]), 'd/m/Y') . ' até ' . date_format(date_create($Detalhes["end"]), 'd/m/Y') . '
        </p><p>
        </p><p class="txt"><a href="#">' . $Detalhes["text"] . '</a></p>
      </li>
    </ul>';
    }
  }


  public function itemListForever()
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_event_items WHERE item_count <= 0 ORDER BY id DESC LIMIT 3");
    $sth->execute();
    $i = 0;
    while ($Res = $sth->fetch(\PDO::FETCH_ASSOC)) {
      echo '<li>
      <p class="token">' . $Res["tokens"] . '</p>
      <div class="item">
        <p class="thumb"><img src="' . $Res["image"] . '"></p>
        <p class="info"><span>' . $Res["name"] . '<br>
            <font class="limit">ETERNO</font>
          </span></p>
      </div>
      <a href="javascript:getReward('.$Res["id"].', '.$Res["tokens"].');" class="btn_exchange">TROCAR</a>
    </li>';
    }
  }

  public function itemsList()
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_event_items WHERE item_count > 0 ORDER BY id DESC");
    $sth->execute();
    while ($Res = $sth->fetch(\PDO::FETCH_ASSOC)) {

      echo '<li>
       <p class="token">' . $Res["tokens"] . '</p>
       <div class="item">
         <p class="thumb"><img src="' . $Res["image"] . '"></p>
         <p class="info"><span>' . $Res["name"] . '<br>
             <font class="limit">' . ($Res["item_count"] / 86400) . 'D</font>
           </span></p>
       </div>
       <a href="javascript:getReward('.$Res["id"].', '.$Res["tokens"].');" class="btn_exchange">TROCAR</a>
     </li>';
    }
  }
}

class SpecialUsage extends SpecialResponsive
{

  private function detailsItem($id)
  {
    $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_event_items WHERE id = :id");
    $sth->bindParam(":id", $id);
    $sth->execute();
    return $sth->fetch(\PDO::FETCH_ASSOC);
  }

  protected function updateTokensUP($tokens)
  {
    $sth = $this->Conn->prepareCM("UPDATE cmweb_event_users SET tokens = tokens + :tokens WHERE login = :lo");
    $sth->execute([
      ":tokens" => $tokens,
      ":lo" => $_SESSION["user"]
    ]);
  }

  protected function updateTokensDown($tokens)
  {
    $sth = $this->Conn->prepareCM("UPDATE cmweb_event_users SET tokens = tokens - :tokens WHERE login = :lo");
    $sth->execute([
      ":tokens" => $tokens,
      ":lo" => $_SESSION["user"]
    ]);
  }

  public function changer($id)
  {
    if (!EVENT_ACTIVE) return [false, "Evento não está ativo"];
    $Details = $this->detailsItem($id);
    if (!$Details) return [false, "Item não encontrado"];
    $Execute = new Items();
    $Execute->handler($Details["item_id"], $Details["name"], $Details["item_count"], $Details["item_cat"]);
    $this->updateTokensDown($Details["tokens"]);
    return [true];
  }
}

class SpecialFeatures extends SpecialUsage
{
  public function winByLoggingIn()
  {
    if(rand(0, 1) == 1) $this->updateTokensUP(1);
  }

  public function winByUsageCode()
  {
    $this->updateTokensUP(rand(1, 5));
  }
}
