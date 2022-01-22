<?php

//var_dump($_SESSION);
//if(!isset($_SESSION["user"])){
//  $_SESSION["user"] = "NICKKKKKK";
//}
include('src/includes/Header.include.php'); ?>



<script type="text/javascript">
  function noticeView(n) {
    var url = "/news/notice/view.do";

    url += "?page=1";
    url += "&idx=" + n;

    document.location.href = url;
  }
</script>
<div class="contents">
  <div class="main_banner">
    <div class="main_slide">
      
      <?php 
      $FeaturesNews = new $Init["FeaturesNews"]();
      $FeaturesNews->carouselNews(); ?>
    </div>
  </div>
  <link rel="stylesheet" href="/template/css/owl.carousel.min.css" media="screen">
  <script src="/template/js/owl.carousel.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $owlContainer = $('.main_slide');
      $owlSlides = $owlContainer.children('div');
      if ($owlSlides.length > 1) {
        $owlContainer.owlCarousel({
          animateOut: 'fadeOut',
          navigation: true,
          navText: ["", ""],
          loop: true,
          slideSpeed: 300,
          autoplay: true,
          autoplayTimeout: 5000,
          autoplayHoverPause: true,
          items: 1,
          paginationSpeed: 400,
          mouseDrag: true,
          singleItem: true,
          dots: !0
        });
      } else {

      }
    });
  </script>
  <div class="main_news">
    <div class="news">
      <p class="main_tit"><a href="/news/notice/list.do" style="text-transform:uppercase;">NOTICIAS</a><span class="more"><a href="/news/notice/list.do"><img src="/template/images/comum/btn_tit_more.png" /></a></span></p>
      <?php $FeaturesNews->fourRecentNews(); ?>
    </div>
    <div class="esports">
      <p class="main_tit">
        <a href="#" target="_blank">
          EVENTO ESPECIAL </a>
        <span class="more"><a href="javascript:void(0);"><img src="/template/images/comum/btn_tit_more.png" /></a></span>
      </p>
      <?php 
      $Event = new $Init["Event"]["Responsive"]();
      $Event->announcement(); ?>
    
    </div>
  </div>
  <div class="main_event">
    <div class="fix">
      <a href="https://www.tamgame.com/premiumcafe/info.do" target="_blank">
        <img src="/template/images/comum/banner_fix.jpg" />
      </a>
    </div>
    <div class="event">
      <ul class="main_event_slide">
        <li><a href="#"><img src="/template/images/comum/banner_event.jpg" /></a></li>
      </ul>
    </div>
  </div>
</div>



</div>

<?php include('src/includes/Footer.include.php'); ?>