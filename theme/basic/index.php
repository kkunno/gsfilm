<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가



if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');

?>


<!-- 뷰디테일, 콘텍트 버튼 -->
<?
$svg = ' <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px"
y="0px" >
<polyline class="st0" points="0.3,0.2 4.6,8.7 0.3,17.3 "/>
</svg>';
$viewb = '<a href="';
$viewDetail = '" class="viewDetails">view&nbsp;<span> details</span>&ensp;
'. str_repeat($svg, 4) .'
</a>';
$Contact = ' "class="viewDetails Contact"><span> Contact</span>&nbsp;
'.str_repeat($svg, 4) .'
</a>';
?>

<!-- 메인 슬라이드 (각종 설정은 js/theme.php에 있음)-->
<div class="slider-wr">
 <div class="text-wr">
    <span class='t_text'>ECO</span><span class="m_text">FRIENDLY</span><span class='b_text'>FILM</span>
</div>
<div class="text-wr2">
    생분해 멀칭필름 / 농업용 멀칭필름 / 산업용 수축필름 / 바이오매스 필름 / 자원순환
</div>
 <div class="main-slider">
  <div><img src='../theme/basic/img/mainslider/1.jpg'></div>
  <!--
  <div><img src='../theme/basic/img/mainslider/2.jpg'></div>
  <div><img src='../theme/basic/img/mainslider/3.jpg'></div>
  -->
 </div>
 <a id="pauseButton"><div></div><div></div></a>
</div>
<div class="co1">
    <div class="blank3"></div>
    <div class="co_title">
        <span class="title_s">Product</span><br>
        최고의 제품을 합리적인 제품으로 제공해드립니다
    </div>
    <div class="blank1"></div>
    <div class="co1_wr">
        <div class="co1-1 act">
            <!-- <img src="../theme/basic/img/main/co1-1.jpg">-->
            <img src="../theme/basic/img/logo_white.png" alt="" class="co1_logo">
            <div class="co1-text">
                <div class="subject">농업용 멀칭필름<br>자원순환</div>
            </div>
            div
            <a href="/bbs/content.php?co_id=me1_1" class="detail">
                자세히보기
                <img src="../theme/basic/img/btn_right.svg">
            </a>
        </div>
        <div class="co1-1 act">
            <!-- <img src="../theme/basic/img/main/co1-1.jpg">-->
            <img src="../theme/basic/img/logo_white.png" alt="" class="co1_logo">
            <div class="co1-text">
                <div class="subject">산업용</div>
            </div>
            <a href="/bbs/content.php?co_id=me1_1" class="detail">
                자세히보기
                <img src="../theme/basic/img/btn_right.svg">
            </a>
        </div>
        <div class="co1-1 act">
            <!-- <img src="../theme/basic/img/main/co1-1.jpg">-->
            <img src="../theme/basic/img/logo_white.png" alt="" class="co1_logo">
            <div class="co1-text">
                <div class="subject">농업용 멀칭필름<br>자원순환</div>
            </div>
            <a href="/bbs/content.php?co_id=me1_1" class="detail">
                자세히보기
                <img src="../theme/basic/img/btn_right.svg">
            </a>
        </div>
    </div>
</div>

<div class="co2 bg1">
    <div class="top"><div class="subject">사업 영역 <span>Business Area</span></div></div>
    <div class="middle">
        <div class="box act s1">
        <div><img src="../theme/basic/img/main/co2-1.svg"></div>
        <div class="co2-1">Surgical <span>Clip</span></div>
        <div class="co2-2">Used for general surgical<br>
             procedures requiring vascular<br>
             or tissue ligation.</div>
        </div>
        <div class="bar2"></div>
       

        <div class="box act s3">
        <div><img src="../theme/basic/img/main/co2-2.svg"></div>
        <div class="co2-1">Urology Medical <span>Device</span></div>
        <div class="co2-2">Ureteral Access Sheath, etc.</div>
        </div>
        <div class="bar2"></div>
       

        <div class="box act s5">
        <div><img src="../theme/basic/img/main/co2-3.svg"></div>
        <div class="co2-1">Disposable <span>Device</span></div>
        <div class="co2-2">Catheter securement device,<br>
             skin closure device, etc.</div>
        </div>
        </div>
    <div class="bottom">
        
    <?= $viewb. 'asdfa'. $viewDetail?>

    </div>
</div>


<div class="co3 bg1">
<div class="top"><div class="subject">제품소개 <span>Product Introduce</span></div></div>
<div class="bottom">
 <a href="/bbs/content.php?co_id=me3_1" class="box act s1"> <img src="../theme/basic/img/main/co3-1.png"> <span class="boxtext">Cure <span>Lock</span></span></a>
 <a href="/bbs/content.php?co_id=me3_2" class="box act s2"> <img src="../theme/basic/img/main/co3-2.png"> <span class="boxtext">D-Cure <span>Fix Plus</span></span></a>
 <a href="/bbs/content.php?co_id=me3_3" class="box act s3"> <img src="../theme/basic/img/main/co3-3.png"> <span class="boxtext">S-Cure <span>Fix</span></span></a>
</div>
</div>



<div class="co4">
    <div class="left">
    <div class="top">
    <div class="subject left">커뮤니티 <span>Community</span></div>
    <?= $viewb. '/bbs/board.php?bo_table=me4_1'. $viewDetail?>
    </div>
    <div class="bottom">
    <div class="tab">
    <button class="tablink tab1 active" onclick="openTab('tab1')">공지사항</button>
    <button class="tablink tab2" onclick="openTab('tab2')">자료실</button>
    </div>
    <div class="tabcontent active tab1">
    <?php echo latest('theme/basic', 'me4_1', 6, 23);?></div>
    <div class="tabcontent tab2">
    <?php echo latest('theme/basic', 'me4_2', 6, 23);?></div>
</div>
    </div>
    <div class="right">
     <div class="row">
        <div class="box act">
            <div class="top">고객센터 <br><span>Service Center</span></div>
            <div class="imgs"><img src="../theme/basic/img/main/co4-1.svg"><?= $viewb. '/bbs/write.php?bo_table=me5_1'. $Contact ?></div>
        </div>
        <div class="box act s1">
            <div class="top">오시는길 <br><span>Way To Come</span></div>
            <div class="imgs"><img src="../theme/basic/img/main/co4-2.svg"><?= $viewb. '/bbs/content.php?co_id=me1_5'. $Contact ?></div>
        </div>
     </div>
     <div class="row">
     <div class="box box2 act">
            <div class="top">견적문의 <br><span>Quote Contact</span></div>
            <div class="imgs"><img src="../theme/basic/img/main/co4-3.svg"><?= $viewb. '/bbs/write.php?bo_table=me5_2'. $Contact ?></div>
        </div>
     </div>
    </div>
</div>







<!-- 유튜브 (각종 설정은 js/theme.php에 있음)-->
<?/*<div class='youtube-wrap' video-id='7wEGyqDCxOI'><div id='youtube_player'></div></div>*/?>












<?php
include_once(G5_THEME_PATH.'/tail.php');