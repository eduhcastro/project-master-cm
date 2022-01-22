<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite News Master 
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 22/01/2022
 **/

namespace BixcoitoDoce\CMNewsD;

use BixcoitoDoce\CMPDOProstgreSQL\Connection;

class Addons
{

    protected function categorysNews($Type)
    {
        switch ($Type) {
            case '0':
                return ["bul_thumb_news.png", "/notices/news"];

            case '1':
                return ["bul_thumb_news.png", "/notices/patch"];

            case '2':
                return ["bul_thumb_news.png", "/notices/events"];
        }
    }
}


class NewsD extends Addons
{

    public function __construct()
    {
        $this->Conn = new Connection();
        $this->Conn->On();
    }

    public function listNotices()
    {
        $sth = $this->Conn->prepareCM("SELECT * FROM cmweb_news ORDER BY id DESC LIMIT 30");
        $sth->execute();
        $Position = 0;
        while ($Result = $sth->fetch(\PDO::FETCH_ASSOC)) {
            $Position++;
            echo ' <tr>
      <td>
        <div class="d-flex px-2 py-1">
          <div>
            <img src="/template/images/comum/' . $this->categorysNews($Result["category"])[0] . '" class="avatar avatar-sm me-3" alt="user1">
          </div>
          <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm"> ' . $Result["title"] . '</h6>
            <p class="text-xs text-secondary mb-0">' . date_format(date_create($Result["date"]), 'jS F Y') . '</p>
          </div>
        </div>
      </td>
      <td>
        <p class="text-xs font-weight-bold mb-0">' .$Result['text_small']. '</p>
        
      </td>
      <td class="align-middle">
        <a href="/dashboard/controller/users/edit-user?id=' . $Result["id"] . '" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
          Edit
        </a>
      </td>
    </tr>';
        }
    }
}
