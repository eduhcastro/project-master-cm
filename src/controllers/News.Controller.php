<?php

/**
 *   
 *|--------------------------------------------------------------------------
 *| PointBlank WebSite NEWS
 *|--------------------------------------------------------------------------
 *|
 *| @author CastroMS#8830 
 *| 17/11/2021
 **/

namespace BixcoitoDoce\CMNews;

use BixcoitoDoce\CMPDOProstgreSQL\{Connection};

class News
{

  public function __construct()
  {
    $this->Conn = new Connection();
    $this->Conn->On();
  }

  private function categorysNews($Type)
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

  private function noticesCount($Cat)
  {
    $Query = $this->Conn->prepareCM("SELECT * FROM cmweb_news WHERE category = :cat ORDER BY id DESC");
    $Query->execute([
      ':cat' => $Cat
    ]);
    return ceil($Query->rowCount() / 20);
  }

  public function carouselNews()
  {
    $CarouselNews = $this->Conn->prepareCM("SELECT * FROM cmweb_news WHERE img_big<>'' ORDER BY id DESC LIMIT 5");
    $CarouselNews->execute();
    $id = 0;
    while ($ResCarousel = $CarouselNews->fetch(\PDO::FETCH_ASSOC)) {
      echo ' <div class="item"><a href="' . $this->categorysNews($ResCarousel["category"])[1] . '?reference=' . $ResCarousel['id'] . '" target="_blank">
      <img src="' . $ResCarousel["img_big"] . '" alt="15-21 November Weekly Event"></a></div>';
    }
  }

  public function fourRecentNews()
  {
    $NoticesGeral4 = $this->Conn->prepareCM("SELECT * FROM cmweb_news ORDER BY id DESC LIMIT 5");
    $NoticesGeral4->execute();
    $id = 0;
    while ($ResNotices = $NoticesGeral4->fetch(\PDO::FETCH_ASSOC)) {
      $id++;
      if ($id == 1) {
        echo '<ul class="special">
        <li class="thumb">
          <p class="bul"><img src="/template/images/comum/' . $this->categorysNews($ResNotices["category"])[0] . '"></p>
          <p><a href="' . $this->categorysNews($ResNotices["category"])[1] . '?reference='.$ResNotices["id"].'"><img src="' . $ResNotices["img_small"] . '"></a></p>
        </li>
        <li class="cont">
          <p class="title"><a href="' . $this->categorysNews($ResNotices["category"])[1] . '?reference='.$ResNotices["id"].'">' . $ResNotices["title"] . '</a></p>
          <p class="txt"><a href="' . $this->categorysNews($ResNotices["category"])[1] . '?reference='.$ResNotices["id"].'">'.$ResNotices["text_small"].'</a></p>
          <p class="date">' . date_format(date_create($ResNotices["date"]), 'jS F Y') . '</p>
        </li>
      </ul>
      <ul class="list">';
      } else {
        echo '<li><a href="' . $this->categorysNews($ResNotices["category"])[1] . '?reference='.$ResNotices["id"].'">' . $ResNotices["title"] . '</a> <span>' . date_format(date_create($ResNotices["date"]), 'jS M Y') . '</span></li>';
      }
    }
    echo '</ul>';
  }

  public function noticesList($Limit)
  {
    $NoticesGeral = $this->Conn->prepareCM("SELECT * FROM cmweb_news WHERE category = 0 ORDER BY id DESC LIMIT 20 OFFSET :limit");
    $NoticesGeral->execute([
      ":limit" => $Limit,
    ]);
    while ($ResNoticesGeral = $NoticesGeral->fetch(\PDO::FETCH_ASSOC)) {
      echo '<li class="thumb">
      <dl>
        <dd class="thumb_img"><img src="'.$ResNoticesGeral['img_small'].'" alt=""></dd>
        <dd>
          <p class="tit"><a href="?reference='.$ResNoticesGeral["id"].'">'.$ResNoticesGeral['title'].'</a></p>
          <p class="date">' . date_format(date_create($ResNoticesGeral["date"]), 'jS F Y') . '</p>
          <p class="txt"><a href="?reference='.$ResNoticesGeral["id"].'">'.$ResNoticesGeral["text_small"].'</a></p>
        </dd>
      </dl>
    </li>';
    }
  }

  public function patchList($Limit)
  {
    $NoticesGeral = $this->Conn->prepareCM("SELECT * FROM cmweb_news WHERE category = 1 ORDER BY id DESC LIMIT 20 OFFSET :limit");
    $NoticesGeral->execute([
      ":limit" => $Limit,
    ]);
    while ($ResNoticesGeral = $NoticesGeral->fetch(\PDO::FETCH_ASSOC)) {
      echo '<li class="thumb">
      <dl>
        <dd class="thumb_img"><img src="'.$ResNoticesGeral['img_small'].'" alt=""></dd>
        <dd>
          <p class="tit"><a href="?reference='.$ResNoticesGeral["id"].'">'.$ResNoticesGeral['title'].'</a></p>
          <p class="date">' . date_format(date_create($ResNoticesGeral["date"]), 'jS F Y') . '</p>
          <p class="txt"><a href="?reference='.$ResNoticesGeral["id"].'">'.$ResNoticesGeral["text_small"].'</a></p>
        </dd>
      </dl>
    </li>';
    }
  }

  public function eventList($Limit)
  {
    $NoticesGeral = $this->Conn->prepareCM("SELECT * FROM cmweb_news WHERE category = 2 ORDER BY id DESC LIMIT 20 OFFSET :limit");
    $NoticesGeral->execute([
      ":limit" => $Limit,
    ]);
    while ($ResNoticesGeral = $NoticesGeral->fetch(\PDO::FETCH_ASSOC)) {
      echo '<li class="thumb">
      <dl>
        <dd class="thumb_img"><img src="'.$ResNoticesGeral['img_small'].'" alt=""></dd>
        <dd>
          <p class="tit"><a href="?reference='.$ResNoticesGeral["id"].'">'.$ResNoticesGeral['title'].'</a></p>
          <p class="date">' . date_format(date_create($ResNoticesGeral["date"]), 'jS F Y') . '</p>
          <p class="txt"><a href="?reference='.$ResNoticesGeral["id"].'">'.$ResNoticesGeral["text_small"].'</a></p>
        </dd>
      </dl>
    </li>';
    }
  }

  public function viewNotice($Cat,$Reference)
  {
    $NoticesGeral = $this->Conn->prepareCM("SELECT * FROM cmweb_news WHERE id = :reference AND category = :cat");
    $NoticesGeral->execute([
      ":cat" => $Cat,
      ":reference" => $Reference,
    ]);
    return [$NoticesGeral->fetch(\PDO::FETCH_ASSOC), $NoticesGeral->rowCount()];
  }

  public function noticesPages($Keyword = null, $Category){
    $Actual = 1;
    if (!is_null($Keyword) && @$Keyword["page"]) $Actual = $Keyword["page"];
    $Count = $this->noticesCount($Category);
    echo '<li class="first"><a href="?page=1"><span>First</span></a></li>';
    for ($n = 0; $n < $Count && $n <= 10; $n++) {
      if ($Actual == $n + 1) echo '<li class="here"><a href="#">' . ($n + 1) . '</a></li>';
      else echo '<li><a href="?page=' . ($n + 1) . '">' . ($n + 1) . '</a></li>';
    }
    echo '<li class="last"><a href="?page=' . $Count . '"><span>Last</span></a></li>';
  }

}
//