<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
$svg = ' <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px"
y="0px" >
<polyline class="st0" points="0.3,0.2 4.6,8.7 0.3,17.3 "/>
</svg>';
?>








<article id="ctt" class="ctt_<?php echo $co_id; ?>">
    <header>

    </header>

    <div id="ctt_con">
        <div class="ctt_con_wr">

                <!-- 사이드메뉴 -->
                <? $menu2 = $menu['sub']; ?><!-- 선언해두기 -->
        <div class="sidemenu">
            <div class="top"><?php echo $menu['me_name']; ?></div>
            <div class="bottom">
                <?php foreach ($menu2 as $menu_item): //menu2[0]부터 끝까지 반복하기 ?>
                    <li class="side-li <?php echo ($menu_item['me_name'] == $g5['title']) ? ' active' : '';//타이틀이 me_name이랑 같으면 active 추가 ?>">
                    <a href="<?php echo $menu_item['me_link']; ?>"><?php echo $menu_item['me_name']; ?> <div><?= str_repeat($svg, 3)?></div>
                    </a>
                    </li>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="co-wr">
        <div id="daumRoughmapContainer1708326768874" class="root_daum_roughmap root_daum_roughmap_landing"></div>
        <div class="blank"></div>
        <div class="co9">
    <div class="left"><div class="subject"><span>오시는 길</span>  </div>
    <div class="co9-grid">
     <div class="left"><span>주  소</span></div><div class="right"><span>광주광역시 북구 삼소로 270번길 25 융합의료기기 산업지원센터 213호</span></div>
     <div class="left"><span>전  화</span></div><div class="right"><span>062-970-3066</span></div>
     <div class="left"><span>팩  스</span></div><div class="right"><span>062-970-3067</span></div>
    </div>
    </div>
    <div class="right"><img src="../theme/basic/img/company/map1.png"></div>

</div>





        <div class="blank"></div>
        </div>
        </div>
    </div>

</article>


<!--
	2. 설치 스크립트
	* 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
-->
<script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

<!-- 3. 실행 스크립트 -->
<script charset="UTF-8">
	new daum.roughmap.Lander({
		"timestamp" : "1708326768874",
		"key" : "2i6fa",
	}).render();
</script>