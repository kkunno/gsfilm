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
                    <div class="blocker"></div>
      <iframe
        id="youtube-player"
        src="https://www.youtube.com/embed/k3LuoLCA06k?autoplay=1&mute=1&loop=1&playlist=k3LuoLCA06k&controls=0&disablekb=1&modestbranding=1&enablejsapi=1"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen>
      </iframe>

 
    </div>
  </div>
</div>
	</div>
	<!--// 메인 비주얼 -->


    <!-- 프로덕트 영역 //-->
    <div class="main-content">
    <div class="blank2"></div>
        <div class="main-product up-on-scroll">
            <h2>Product<p class="comment1">최고의 제품을 합리적인<br>제품으로 제공해드립니다</p></h2>
        </div>



        <div class="main-product full up-on-scroll">
            <ul>
                <li class="mainbox">
                    <a href="/n/bbs/content.php?co_id=farmfilm">
                        <img class="logos" src="<?php echo G5_THEME_URL ?>/images/logo1.svg" alt="">
                        <div>
                            <p>농업용 멀칭필름<br>자원순환</p>
                            <h3>자세히 보기 <img src="<?php echo G5_THEME_URL ?>/images/arrow.svg" alt=""></h3>
                        </div>
                    </a>
                </li>
                <li class="mainbox">
                    <a href="/n/bbs/content.php?co_id=technicalfilm">
                        <img class="logos" src="<?php echo G5_THEME_URL ?>/images/logo2.svg" alt="">
                        <div>
                            <p>산업용 포장필름</p>
                            <h3>자세히 보기 <img src="<?php echo G5_THEME_URL ?>/images/arrow.svg" alt=""></h3>
                        </div>
                    </a>
                </li>
                <li class="mainbox">
                    <a href="/n/bbs/content.php?co_id=homefilm">
                        <img class="logos" src="<?php echo G5_THEME_URL ?>/images/logo3.svg" alt="">
                        <div>
                            <p>친환경 생분해 필름</p>
                            <h3>자세히 보기 <img src="<?php echo G5_THEME_URL ?>/images/arrow.svg" alt=""></h3>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <script>
            document.querySelectorAll('.mainbox').forEach((box) => {
  box.addEventListener('mouseenter', () => {
    document.querySelectorAll('.mainbox').forEach((otherBox) => {
      if (otherBox !== box) {
        otherBox.querySelector('a').classList.add('opacity0');
      }
    });
  });

  box.addEventListener('mouseleave', () => {
    document.querySelectorAll('.mainbox a').forEach((link) => {
      link.classList.remove('opacity0');
    });
  });
});
</script>
     <div class="blank1"></div>
    </div>
    <!-- 프로덕트 영역 끝-->
    




    <!-- R&D 영역 -->

    <div class="main-content bggray">
    <div class="blank2"></div>
        <div class="main-product up-on-scroll">
            <h2 class="right">R&D Achievement<p class="comment1">지속적인 연구개발을 통하여<br>품질 경쟁력을 확보해 나아갑니다</p></h2>
        </div>


        <div class="main-rnd up-on-scroll">
            <div>
                <img src="<?php echo G5_THEME_URL ?>/images/mainbg.png" alt="">
                <div>
                    <ul>
                        <li><a href="/n/bbs/content.php?co_id=lab"><img src="<?php echo G5_THEME_URL ?>/images/mainicon1.svg" alt="">회사현황 및 조직도</a></li>
                        <li><a href="/n/bbs/content.php?co_id=antiv"><img src="<?php echo G5_THEME_URL ?>/images/mainicon2.svg" alt="">기업부설연구소</a></li>
                        <li><a href="/n/bbs/content.php?co_id=permission"><img src="<?php echo G5_THEME_URL ?>/images/mainicon3.svg" alt="">인증 및 허가증</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<!-- -->


<div class="main-content bg7FBF40">
    <div class="blank2"></div>
        <div class="main-product up-on-scroll">
            <h2 class="white">Promotional Video<p class="comment1">환경을 생각한 필름, 미래를 위한 선택</p></h2>
        </div>
    <div class="main-etc up-on-scroll">
        <div>

        <?php
            // latest(스킨, 게시판아이디, 출력라인, 글자수);
                echo latest('theme/pic_block2', 'video', 2, 30);
            ?>


        <?/*
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
        */?>
        </div>
    </div>
    <div class="blank4"></div>
    <div class="blank1"></div>
    <img class="mainbglogo" src="<?php echo G5_THEME_URL ?>/images/mainbglogo.png" alt="">
</div>
</div>
	<!--// 콘텐트 영역 -->




<div class="main-content">
        <div class="mainmapwr">
            <div class="mainmap">

                <div class="mainmap2">
                <!-- * 카카오맵 - 지도퍼가기 -->
                <!-- 1. 지도 노드 -->
                <div id="daumRoughmapContainer1735884293320" class="root_daum_roughmap root_daum_roughmap_landing"></div>

                <!--
                    2. 설치 스크립트
                    * 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
                -->
                <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

                <!-- 3. 실행 스크립트 -->
                <script charset="UTF-8">
                    new daum.roughmap.Lander({
                        "timestamp" : "1735884293320",
                        "key" : "2moro",
                        "mapWidth" : "1000",
                        "mapHeight" : "1000"
                    }).render();
                </script>
                </div>
            </div><div class="main-product up-on-scroll">
                <h2><p class="comment1">오시는 길</p></h2><br>
                <p>전라남도 함평군 학교면 동함평산단길 22<br>
                <span>TEL </span>&nbsp; 061)323-3236<br>
                <span>FAX </span>&nbsp; 061)323-3113
                </p>
            </div>
        </div>
</div>




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