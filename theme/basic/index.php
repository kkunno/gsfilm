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

<div class= co1_wr>
    <div class="co1">
        <div class="co1-txt">
            <h2 class="main_title">
                제품정보
            </h2>
            <p>
                명랑농원의 유기농 제품을 만나보세요.
            </p>
            <div class="viewdetail"> <!-- 버튼이 하고싶어요 도와주세요 -->
                자세히 보기
                <img src="../theme/basic/img/rpoint.svg" alt="">
            </div>
        </div>
        <a href="/bbs/content.php?co_id=me1_1" class="co1-1 act"><div class="co1-text"><div class="subject">유기농 호박즙<span>농약과 화학비료를 전혀<br> 쓰지 않은 호박으로 즙을<br> 냈습니다.</span></div></div><img src="../theme/basic/img/main/01.png"></a>
        <a href="/bbs/content.php?co_id=me1_2" class="co1-1 act"><div class="co1-text"><div class="subject">유기농 양배추즙<span>농약과 화학비료를 전혀<br> 쓰지 않은 양배추로 즙을<br> 냈습니다.</span></div></div><img src="../theme/basic/img/main/02.jpg"></a>
        <a href="/bbs/content.php?co_id=me1_3" class="co1-1 act"><div class="co1-text"><div class="subject">유기농 비트즙<span>농약과 화학비료를 전혀<br> 쓰지 않은 비트로 즙을<br> 냈습니다.</span></div></div><img src="../theme/basic/img/main/03.jpg"></a>
    </div>
</div>

<div class="co2_wr">
    <div class="co2_bg">
        <img src="../theme/basic/img/co2_bg.jpg" alt="">
    </div>
    <h2 class="main_title">
        명랑 STORY
    </h2>
    <div class="co2">
        <img src="../theme/basic/img/image 1.jpg" alt="">
        <div class="co2_txt">
            <h3>
                할아버지의 진심,<br>아버지의 뚝심,<br>명인의 자존심
            </h3>
            <div class="bar"></div>
            <p>
                1987년부터 3대째 지켜온 건강한 먹거리에 대한 자부심을 가지고 운영하고 있습니다. 무엇보다 식재료에 대한 집념과 철학, 진정성을 여실히 담고 있는 유기농 명인 “명랑농원” 입니다.
            </p>
        </div>
    </div>
</div>

<div class="co3_wr">
    <div class="co3">
        <h3 class="co3_title">
            소중한 사람들과 함께<br><span>신선한 유기농 농작물</span>을 즐겨요!
        </h3>
        <p>
            숨겨진 보물을 찾는 듯한 설렘을 느끼며<br> 맛에 얽힌 이야기를 찾아보세요!
        </p>
        <div class="co_btn"> <!-- 버튼이 하고싶어요 도와주세요 -->
        주문하러가기
    </div>
    </div>
    <div class="co3_img">
        <img src="../theme/basic/img/co3_img.jpg" alt="">
    </div>
</div>

<div class="co4_wr">
    <h3 class="co4_title">
        고객문의
    </h3>
    <div class="co4">
        <p>
            더 궁금한게 있으신가요?
        </p>
        <div class="co4_num">
            <img src="../theme/basic/img/call.svg" alt="">
            062-123-4567
        </div>
    </div>
    <div class="co_btn">
        <img src="../theme/basic/img/Q.svg" alt="">
        자주 묻는 질문
    </div>
    <div class="co_btn">
        <img src="../theme/basic/img/Q2.svg" alt="">
        1:1문의
    </div>
</div>
<!-- 유튜브 (각종 설정은 js/theme.php에 있음)-->
<?/*<div class='youtube-wrap' video-id='7wEGyqDCxOI'><div id='youtube_player'></div></div>*/?>












<?php
include_once(G5_THEME_PATH.'/tail.php');