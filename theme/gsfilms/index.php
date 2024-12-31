<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head_common.php');
?>

	
	<!-- 메인 비주얼 //-->
	<div class="main-visual">
        <div class="main-text">
            <img src="<?php echo G5_THEME_URL ?>/images/img_mainvisual_text.svg" alt="ECO FRIENDLY FILM">
            <p>생분해 멀칭필름 / 농업용 멀칭필름 / 산업용 수축필름 / 바이오매스 필름 / 자원순환</p>
        </div>
        <ul class="main-list">
            <li><a href="/n/bbs/content.php?co_id=vision"><img src="<?php echo G5_THEME_URL ?>/images/icon_main_01.png" alt="">Vision</a></li>
            <li><a href="/n/bbs/board.php?bo_table=cscenter"><img src="<?php echo G5_THEME_URL ?>/images/icon_main_02.png" alt="">Customer Center</a></li>
            <li><a href="/n/bbs/board.php?bo_table=notice"><img src="<?php echo G5_THEME_URL ?>/images/icon_main_03.png" alt="">Notice</a></li>
            <li><a href="/n/bbs/content.php?co_id=farmfilm"><img src="<?php echo G5_THEME_URL ?>/images/icon_main_04.png" alt="">Product</a></li>
            <li><!--<a href="/n/bbs/board.php?bo_table=order">--><a href="#"><img src="<?php echo G5_THEME_URL ?>/images/icon_main_05.png" alt="">Order</a></li>
        </ul>
        
        <div class="main-swiper">
     <?/*       <div class="swiper-navigation">
                <div class="swiper-button-prev prev"></div>                     
                <div class="swiper-button-next next"></div>                        
            </div>
            <div class="swiper-pagination"></div>*/?>
            <div class="swiper-wrapper">
        <?/*        <div class="swiper-slide" style="background-image: url(<?php echo G5_THEME_URL ?>/images/img_mainvisual01.jpg);"></div>
                <div class="swiper-slide" style="background-image: url(<?php echo G5_THEME_URL ?>/images/img_mainvisual02.jpg);"></div>
                <div class="swiper-slide" style="background-image: url(<?php echo G5_THEME_URL ?>/images/img_mainvisual04.jpg);"></div>*/?>
				    <div class="swiper-slide">
      <iframe
        id="youtube-player"
        src="https://www.youtube.com/embed/4h4phu99NMs?autoplay=1&mute=1&loop=1&playlist=4h4phu99NMs&controls=0&disablekb=1&modestbranding=1&enablejsapi=1"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen>
      </iframe>

 
    </div>
  </div>
</div>
	</div>
	<!--// 메인 비주얼 -->


    <!-- 콘텐트 영역 //-->
    <div class="main-content">
        <div class="main-product up-on-scroll">
            <h2>Product<p class="comment1">최고의 제품을 합리적인<br>제품으로 제공해드립니다</p></h2>


       

        </div>
        <div class="main-product full up-on-scroll">
            <ul>
                <li>
                    <a href="/n/bbs/content.php?co_id=farmfilm">
                        <img class="logos" src="<?php echo G5_THEME_URL ?>/images/logo1.svg" alt="">
                        <h3><img src="<?php echo G5_THEME_URL ?>/images/icon_main_06.png" alt=""></h3>
                        <p>비옥한 토지에 건강하고 풍성하게 <br>성장하는 농산물을 상징하는 <br>㈜금성필름의 농업용 멀칭비닐 브랜드</p>

                    </a>
                </li>
                <li>
                    <a href="/n/bbs/content.php?co_id=technicalfilm">
                        <img class="logos" src="<?php echo G5_THEME_URL ?>/images/logo2.svg" alt="">
                        <h3><img src="<?php echo G5_THEME_URL ?>/images/icon_main_07.png" alt=""></h3>
                        <p>Every day Fresh를 슬로건으로 하는 <br>㈜금성필름의 산업용 필름 브랜드</p>
                    </a>
                </li>
                <li>
                    <a href="/n/bbs/content.php?co_id=homefilm">
                        <img class="logos" src="<?php echo G5_THEME_URL ?>/images/logo3.svg" alt="">
                        <h3><img src="<?php echo G5_THEME_URL ?>/images/icon_main_08.png" alt=""></h3>
                        <p>깨끗한 친환경제품으로 대표되는 <br>㈜금성필름의 가정용 비닐 브랜드</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main-rnd up-on-scroll">
            <div>
                <img src="<?php echo G5_THEME_URL ?>/images/icon_main_12.jpg" alt="">
                <div>
                    <h2>R&D</h2>
                    <p class="comment2">지속적인 연구개발을 통하여 <br>품질 경쟁력을 확보해 나아갑니다.</p>
                    <ul>
                        <li><a href="/n/bbs/content.php?co_id=lab"><img src="<?php echo G5_THEME_URL ?>/images/icon_main_13.png" alt="">기업부설연구소</a></li>
                        <li><a href="/n/bbs/content.php?co_id=antiv"><img src="<?php echo G5_THEME_URL ?>/images/icon_main_14.png" alt="">향균비닐 제조공정</a></li>
                        <li><a href="/n/bbs/content.php?co_id=permission"><img src="<?php echo G5_THEME_URL ?>/images/icon_main_15.png" alt="">각종 인증 및 허가</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-etc up-on-scroll">
        <div>
            <div class="main-board">
                <div class="main-notice">
					<?php
						// latest(스킨, 게시판아이디, 출력라인, 글자수);
						echo latest('theme/notice2', 'notice', 3, 30);
					?>
                </div>
                <div class="main-video">
                    <h2>홍보영상<a href="/n/bbs/board.php?bo_table=video"><img src="<?php echo G5_THEME_URL ?>/images/icon_more.png" alt=""></a></h2>
                    <ul>
                        <li class="js-video-button" data-video-id='nYh0-c3Mqb0'><img src="<?php echo G5_THEME_URL ?>/images/icon_main_16.png"></li>
                        <li class="js-video-button" data-video-id='RRHwUE9btrQ'><img src="<?php echo G5_THEME_URL ?>/images/icon_main_17.png"></li>
                    </ul>
                </div>
            </div>
            <div class="main-quick">
                <div>
                    <p>금성필름이 걸어온 길은 어느덧 역사가 되었습니다</p>
                    <a href="/n/bbs/content.php?co_id=history"><img src="<?php echo G5_THEME_URL ?>/images/icon_main_18.png" alt="">HISTORY</a>
                </div>
                <div>
                    <p>금성필름으로 찾아오시는 길을 안내해드립니다</p>
                    <a href="/n/bbs/content.php?co_id=location"><img src="<?php echo G5_THEME_URL ?>/images/icon_main_19.png" alt="">CONTACT</a>
                </div>
            </div>
        </div>
    </div>
	<!--// 콘텐트 영역 -->

		<script>
			// main swiper
			var main_swiper = new Swiper('.main-swiper', {
			  speed: 3000,
			  effect : 'fade',
			  navigation: {
				nextEl: '.next',
				prevEl: '.prev',
			  },
			  pagination: {
				el: ".swiper-pagination",
				clickable: true,
				renderBullet: function (index, className) {
				return '<span class="' + className + '">' + (index + 1) + "</span>";
			  }},
			  autoplay: {
				delay: 3000,
			  },
			  autoplayDisableOnInteraction: true,   
			  loop: true,      
			});
			// youtube
			$(".js-video-button").modalVideo({
				youtube:{
					controls:0,
					autoplay:true,
					nocookie: true
				}
			});
		</script>
<?php
include_once(G5_THEME_PATH.'/tail_common.php');