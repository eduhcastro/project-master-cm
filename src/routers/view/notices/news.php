<?php
include('src/includes/Header.include.php');
$HOST = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

echo '<div class="contents">
   <div class="sub_title">NEWS</div>
   <div class="sub_contents">';
$AddonsRoot = new $Init['AddonsRoot']();
$FeaturesNews = new $Init["FeaturesNews"]();
if (isset($AddonsRoot->getParams($HOST)["reference"]) && is_numeric($AddonsRoot->getParams($HOST)["reference"])) {
  $View = $FeaturesNews->viewNotice(0, $AddonsRoot->getParams($HOST)["reference"]);
  if ($View[1] <= 0) {
    echo '<div class="error">Notice not found.</div>';
    exit;
  }
  echo '<div class="sub_contents">
          <ul class="bbs_view_tit">
            <li class="tit">' . $View[0]["title"] . '</li>
            <li class="date">' . date_format(date_create($View[0]["date"]), 'jS F Y') . ' </li>';
  echo '</ul>
                <div class="bbs_view">';
  echo $View[0]["content"];
  echo '<p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><strong>Thank you!</strong></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><span style="color:#ffa500"><strong>PK GAME || Project Kobra</strong></span></p> </div>
     <div class="cont_btn">
    <p class="btn"><span class="btn_cont_w135"><a class="btn" href="javascript:void(0);" onclick="List();">List</a></span></p>
    </div>
  </div>';
} else {
  echo '<ul class="bbs_list_news">';
  $FeaturesNews->noticesList($AddonsRoot->getPage($HOST));
  echo '</ul>
<ul class="bbs_paging">';
 
  $FeaturesNews->noticesPages($AddonsRoot->getParams($HOST), 0);
  echo '</ul>
</div>';
}
echo '</div></div>';
include('src/includes/Footer.include.php');
