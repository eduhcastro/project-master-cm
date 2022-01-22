<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Evento de Inauguração | Point Blank CM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="Author" content="Zepetto">
  <meta http-equiv="Title" content="Bonifacio Supreme Deal &mid; Point Blank PH">
  <meta name="Keywords" content="pb point blank , FPS, online, online game, game point blank ,point blank, game pb, pb game, point blank garena, point pb, garena pb zepetto pb, pb zepetto, zepetto point blank, point blank zepetto">
  <meta name="Description" content="Favorite FPS game since 2009, Point Blank Beyond Limit is the No. 1 FPS game Thailand for 10 years. Played in 100 countries and has 100 million world players." />
  <meta property="og:type" content="website">
  <meta property="og:title" content="Bonifacio Supreme Deal &mid; Point Blank PH">
  <meta property="og:url" content="https://pointblank.zepetto.com/ph/event/bonifacio">
  <meta property="og:description" content="Favorite FPS game since 2009, Point Blank Beyond Limit is the No. 1 FPS game Thailand for 10 years. Played in 100 countries and has 100 million world players.">
  <meta property="og:image" content="https://pointblank.zepetto.com/template/event/images/bonifacio.jpg">
  <link rel="stylesheet" type="text/css" href="/template/event/css/common.css">
  <link rel="stylesheet" type="text/css" href="/template/event/css/animate.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" charset="utf-8"></script>
  <script src="/template/event/js/library/wow.min.js"></script>



  <script type="text/javascript">
    //if (document.location.protocol == 'http:') {
    //  document.location.href = document.location.href.replace('http:', 'https:');
    //}
    let MyTokens = 0;
  </script>


</head>

<body>
  <header>
    <h1><a href="/"><img src="/template/event/images/bi_pbbl_bk.png" alt="Point Blank Beyond Limits"></a></h1>
    <div class="util">
      <!--- <a href="javascript:getHistoryList()" class="btn_history">HISTORICO</a> !-->
      <?php if (!isset($_SESSION['user'])) echo '<a href="/ph/login/form" class="btn_login">ENTRAR</a>';

      ?>
      <a href="/" class="btn_home">INICIO</a>
    </div>
  </header>

  <div class="quick">
    <p class="ticket">
      <span>MEUS<br>
        <font>TOKENS</font>
      </span>
      <?php if (!isset($_SESSION['user'])) {
        echo '<span class="num">0</span>';
      } else {
        $User = new $Init['User']();
        $UserToken = $User->getTokensEvent();
        echo '
        <script> MyTokens = ' . $UserToken["tokens"] . '; </script>
        <span class="num">' . $UserToken["tokens"] . '</span>';
      } ?>
    </p>
    <!--- <a href="javascript:getHistoryList()" class="btn_history">HISTORICO</a> !-->
    <?php if (!isset($_SESSION['user'])) echo '<a href="/authenticate/login" class="btn_login">ENTRAR</a>'; ?>
    <a href="/" class="btn_home">INICIO</a>
  </div>';

  ?>
  <div class="container">
    <section class="visual" style="">
      <div>
        <p class="figure1"><img src="/template/event/images/figure1.png"></p>
        <p class="figure2"><img src="/template/event/images/figure2.png"></p>
        <p class="figure4"><img src="/template/event/images/figure4.png" class="wow bounceInLeft" data-wow-delay="0.3s"></p>
        <p class="figure5"><img src="/template/event/images/figure5.png"></p>
        <p class="figure6"><img src="/template/event/images/figure6.png"></p>
        <p class="figure7"><img src="/template/event/images/figure7.png" class="wow bounceInRight"></p>
        <p class="figure8"><img src="/template/event/images/figure8.png" class="wow bounceInUp"></p>
        <p class="figure9"><img src="/template/event/images/figure9.png"></p>
        <p class="figure10"><img src="/template/event/images/figure10.png" class="wow bounceInUp"></p>
        <p class="figure11"><img src="/template/event/images/figure11.png" class="wow bounceInRight" data-wow-delay="0.3s"></p>
        <p class="figure12"><img src="/template/event/images/figure12.png" class="wow bounceInDown"></p>
        <p class="figure13"><img src="/template/event/images/figure13.png" class="wow bounceInUp" data-wow-delay="0.6s"></p>
        <p class="figure14"><img src="/template/event/images/figure14.png" class="wow bounceInLeft"></p>
        <p class="figure15"><img src="/template/event/images/figure15.png" class="wow bounceInUp"></p>
        <p class="figure20"><img src="/template/event/images/figure12.png"></p>
      </div>
    </section>

    <section class="title">
      <div>
        <div class="tit">
          <p class="tit1"><img src="/template/event/images/title_bonifacio.png"></p>
          <p class="tit2"><img src="/template/event/images/title_supreme1.png"></p>
          <p class="tit3"><img src="/template/event/images/title_supreme2.png"></p>
          <p class="tit4"><img src="/template/event/images/title_deal.png" class="wow swing"></p>
          <p class="titimg"><img src="/template/event/images/title_img.png"></p>
        </div>
        <h3 class="date"><span>NOV 24, 2021</span> <span>ATÉ</span> <span class="end">
            <font>DEC 8,</font> 2021
          </span></h3>
      </div>
    </section>

    <section class="about">
      <div>
        <div class="img">
          <p class="about_img1 wow flipInY"><img src="/template/event/images/about_img1.png"></p>
          <p class="about_img2 wow flipOutY"><img src="/template/event/images/about_img2.png"></p>
          <p class="about_img3 wow flipInY"><img src="/template/event/images/about_img3.png"></p>
          <p class="about_img4 wow flipOutY"><img src="/template/event/images/about_img4.png"></p>
          <p class="about_img5 wow flipInY"><img src="/template/event/images/about_img5.png"></p>
          <p class="about_img6 wow flipInY"><img src="/template/event/images/about_img6.png"></p>
        </div>
        <div class="cont">
          <h2>RECEBA TOKENS E TROQUE POR ITENS <font>DE GRAÇA!</font>
          </h2>
          <p class="txt">
            Receba Tokens fazendo login no site <span style="color: #cc0000; font-size: 13px;">(50% DE CHANCE 'POR LOGIN)</span><br>
            Receba Tokens usando PIN/Cupom <span style="color: #14f114; font-size: 13px;">(100% GARANTIDO de 1-5 TOKENS)</span>
          </p>
          <p class="exp">Todos os tokens que não forem usados até o final do evento serão guardados para um evento futuro.</p>
          <a href="/recharge/pin-code" target="_blank" class="btn_shop">VAMOS LÁ!</a>
        </div>
        <div class="random">
          <ul>
            <li class="wow fadeInUp"><img src="/template/event/images/item_rbox1.png"><br>Assassin's<br>Killer Box</li>
            <li class="wow fadeInUp"><img src="/template/event/images/item_rbox2.png"><br>Best choice<br>Funtion Box</li>
            <li class="wow fadeInUp"><img src="/template/event/images/item_rbox3.png"><br>HK417<br>Super Box</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="itemlist">
      <div>
        <ul>
          <?php 
            $Event = new $Init['Event']["Responsive"]();
          $Event->itemListForever();
          echo '<li class="txt">
            If you exchange tokens with durability weapon, Pre-order Ticket will be given.<br>
            Players with pre-order ticket will receive durability weapon on Dec 8th.<br>
            <font>Please DO NOT DELETE pre-order ticket in your inventory!!!</font><br>
            If Players who already own above weapon purchase same weapon again, the weapon will be repaired to 100% on Dec 8th.
          </li>';
          $Event->itemsList();
          ?>
        </ul>
      </div>
    </section>

    <section class="caution">
      <div>
        <ul>
          <li>In case of any exploitation or abuse, the reward items may be confiscated.</li>
          <li>Each reward can be received only once.</li>
          <li>Tokens will be removed at the end of event.</li>
          <li>Event rewards may be changed without prior notice.</li>
          <li>Please be aware of any fraud or impersonation of Point Blank or Zepetto.</li>
        </ul>
        <p class="figure16"><img src="/template/event/images/figure16.png"></p>
        <p class="figure17"><img src="/template/event/images/figure17.png" class="wow bounce"></p>
        <p class="figure18"><img src="/template/event/images/figure18.png" class="wow bounceInRight"></p>
      </div>
    </section>
  </div>

  <footer>
    <img src="/template/event/images/zepetto.png" alt="Zepetto">
    <div class="footer">
      <p class="cs">If there are questions contact <a href="mailto:ask_pbph@zepetto.biz" target="_blank">ask_pbph@zepetto.biz</a></p>
      <p class="copy">Copyright Zepetto Co. All rights reserved.</p>
    </div>
  </footer>

  <!--// layerpop (history) -->
  <div class="popup pop_history">
    <p class="dimmed">&nbsp;</p>
    <div class="pop_layout">
      <div class="pop_title"><img src="/template/event/images/pop_title.png" alt="History"><button type="button">close</button></div>
      <div class="pop_cont">
        <ul class="list">
        </ul>
      </div>
    </div>
  </div>
  <!-- layerpop (history) //-->

  <script>
    new WOW().init();

    $(document).ready(function() {
      $(".pop_history .dimmed, .pop_title > button").on("click", function() {
        $(".pop_history").hide();
      });
    });

    function getReward(prizeIDX, prizeCost) {
      if (confirm('Deseja realmente fazer isso?')) {

        if (MyTokens < prizeCost) {
          alert("Tokens insuficientes, voce precisa de " + (prizeCost - MyTokens) + " tokens.");
          return;
        }

        $.ajax({
          url: "/event/changer",
          data: {
            id: prizeIDX
          },
          dataType: "json",
          type: "POST",
          success: function(data) {
            if (data.status) {
              alert("Item trocado com sucesso!");
              location.reload();
            } else {
              alert(data.msg);
              location.reload();
            }
          },
          error: function(xhr, status, error) {
            alert("Erro interno.");
            location.reload();
          }
        });
      }
    }

    function getHistoryList() {


      var idx = $("#idx").val();

      $.ajax({
        url: "/event/bonifacio/history",
        dataType: "json",
        type: "GET",
        success: function(data) {
          $(".pop_history").find(".list").html("");
          if (data != null && data.length > 0) {
            var html = "";
            for (var i = 0; i < data.length; i++) {
              var row = data[i];
              html = "<li>"
              html += "<div class=\"date\"><p>" + row.date + "</p></div>";
              if (row.ticket > 0) {
                html += "<div class=\"item\"><p>" + row.history + "<font> " + row.ticket + " Tokens.</font></p></div>";
              } else {
                html += "<div class=\"item item_buy\"><p>" + row.history + "<font> " + row.ticket + " Tokens.</font></p></div>";
              }
              html += "</li>";

              $(".pop_history").find("ul.list").append(html);
            }
          } else {
            $(".pop_history").find("ul.list").html("<li class=\"none\"><p>no data</p></li>");
          }

          $(".pop_history").show();
        },
        error: function(xhr, status, error) {
          alert("An error occurred.");
          location.reload();
        }
      });
    }
  </script>
</body>

</html>