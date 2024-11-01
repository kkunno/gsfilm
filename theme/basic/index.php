<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가



if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

<!-- 메인 슬라이드 (각종 설정은 js/theme.php에 있음)-->
<div class="slider-wr">
 <div class="text-wr"><span class='toptext'></span><br><span class='toptext2'></span></div>
 <div class="main-slider">
  <div><img src='../theme/basic/img/mainslider/1.jpg'></div>
  <div><img src='../theme/basic/img/mainslider/2.jpg'></div>
 </div>
 <a id="pauseButton"><div></div><div></div></a>
</div>





뭐야이거 dsafsdkl;fjas;ldkjfalk;sdjf;laksdjflk;ajdsf;lkajsdfja;sdj

고경석




<!-- 유튜브 (각종 설정은 js/theme.php에 있음)-->
<?/*<div class='youtube-wrap' video-id='7wEGyqDCxOI'><div id='youtube_player'></div></div>*/?>












<?php
include_once(G5_THEME_PATH.'/tail.php');