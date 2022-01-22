<?php
//$UserToken = $User->getTokensEvent();
if (!isset($_SESSION['user'])) {
  echo '<div class="login">
  <p class="register">
    <a href="/authenticate/cadastrar" class="btn" target="_blank">
      <font>REGISTER</font>
    </a>
  </p>
  <p class="sso">
    <a href="javascript:void(0);" onclick="javascript:openLayerPopup();" class="btn" style="">
      LOGIN </a>
  </p>
</div>';
} else {
  $User =        new $Init["User"];
  $UserDetails = $User->getInfo();
  $AddonsRanks = new $Init["AddonsRanks"];
  echo '<div class="logout">
<ul class="my_info">
    <li class="grade">
        <p><span>Nick</span> ' . $UserDetails["player_name"] . '</p>
        <p><span>Rank</span> ' . $AddonsRanks->player($UserDetails['rank']) . ' <img src="/template/images/ranks/icon/' . $UserDetails['rank'] . '.png"></p>
        <p><span>Cash</span> ' . number_format($UserDetails["money"]) . ' </p>
        <p><span>Gold</span> ' . number_format($UserDetails["gp"]) . '    </p>';
  //if (EVENT_ACTIVE) echo '<p><span>Tokens</span> ' . number_format($UserToken["tokens"]) . '  </p>';
  echo '</li>
    <li class="btn">
        <p><a href="/user/index"><img src="/template/images/auth/btn_lnb_mypage.png"></a>
        </p>';
  if ($_SESSION["master"] >= __GM_LEVEL__) echo '<p style="position: absolute;right: 0;left: 35%;"><a href="/dashboard/controller/index"><img src="/template/images/auth/btn_master.png"></a>
        </p>';
  echo '<p class="right"><a href="javascript:void(0)"><img id="logout" src="/template/images/auth/btn_lnb_logout.png"></a>
        </p>
    </li>
</ul>
</div>';
}
