<?php
include('src/includes/Header.include.php');
$HOST = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$AddonsRoot = new $Init['AddonsRoot']();
$FeaturesRanks = new $Init['FeaturesRanks']();
?>
<div class="contents">
  <div class="sub_title">Individual Ranking</div>
  <div class="sub_contents_pnone">
    <div class="sub_tab_many_line">
      <ul class="sub_tab_many sub_tab_four <!--sub_tab_three-->">
        <li class="basic" id="xp"><a href="/ranking/individual?type=exp" class="btn">XP</a></li>
        <li class="basic" id="kda"><a href="/ranking/individual?type=kda" class="btn">KILL/DEATH</a></li>
        <!-- <li class="last"><a href="javascript:void(0);" onclick="GoRankType('headshot')" class="btn">HEADSHOT</a></li> -->
      </ul>
    </div>
    <div class="cont_p30">
      <table class="bbs_list_rank">
        <colgroup>
          <col style="width:114px">
          <col style="width:238px">
          <col style="width:218px">
          <col style="width:100px">
        </colgroup>
        <thead>
          <tr>
            <th>Ranking</th>
            <th>Character</th>
            <th>Rank</th>
            <?php echo $FeaturesRanks->rankAllPlayersType(@$AddonsRoot->getParams($HOST)["type"]); ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $FeaturesRanks->rankAllPlayers($AddonsRoot->getPage($HOST), @$AddonsRoot->getParams($HOST)["nick"],  @$AddonsRoot->getParams($HOST)["type"]);
          ?>
        </tbody>
      </table>
      <ul class="bbs_paging">
        <?php $FeaturesRanks->rankAllPlayersPages($AddonsRoot->getParams($HOST), @$AddonsRoot->getParams($HOST)["type"]); ?>
      </ul>
    </div>
    <div class="bbs_search">
      <form name="iForm">
        <input type="hidden" id="keyword" name="keyword" value="">
        <p><input type="text" name="nick" id="nickname" value="Please Enter Character Name" onfocus="this.style.color='black';"></p>
        <p class="btn_form"><a href="javascript:void(0);" onclick="javascript:GoSearch();" class="btn">CONTROL</a></p>
      </form>
    </div>
  </div>
</div>
</div>
<script>
  var url = new URL(window.location.href);
  if (url.searchParams.get("type") === "kda") $("#kda").addClass("first_on");
  else $("#xp").addClass("first_on");
</script>
<?php include('src/includes/Footer.include.php'); ?>