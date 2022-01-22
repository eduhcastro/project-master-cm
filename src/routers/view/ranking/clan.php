<?php
include('src/includes/Header.include.php');
$HOST = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$AddonsRoot = new $Init['AddonsRoot']();
$FeaturesRanks = new $Init['FeaturesRanks']();
?>

<div class="contents">
  <div class="sub_title">Clan Ranking</div>
  <div class="sub_contents_pnone">
    <div class="cont_p30">
      <table class="bbs_list_rank">
        <colgroup>
          <col style="width:160px">
          <col style="width:140px">
          <col style="width:140px">
          <col style="width:90px">
          <col style="width:90px">
          <col style="width:50px">
        </colgroup>
        <thead>
          <tr>
            <th>Ranking</th>
            <th>Clan Name</th>
            <th>title</th>
            <th>XP</th>
            <th>W/L</th>
            <th class="last">Point</th>
          </tr>
        </thead>
        <tbody>
          <?php $FeaturesRanks->rankAllClans($AddonsRoot->getPage($HOST), @$AddonsRoot->getParams($HOST)["nick"]); ?>
        </tbody>
      </table>
      <ul class="bbs_paging">
     <?php $FeaturesRanks->rankAllClansPages(($AddonsRoot->getPage($HOST))); ?>
      </ul>
    </div>
    <div class="bbs_search">
       <!-- <form name="iForm">
        <input type="hidden" id="keyword" name="keyword" value="">
        <p><input type="text" name="clanname" id="clanname" value="Please Enter Clan Name" onfocus="this.style.color='black';"></p>
        <p class="btn_form"><a href="javascript:void(0);" onclick="javascript:GoSearch();" class="btn">CONTROL</a></p>
      </form>-->
    </div>
  </div>
</div>
</div>
<?php include('src/includes/Footer.include.php'); ?>