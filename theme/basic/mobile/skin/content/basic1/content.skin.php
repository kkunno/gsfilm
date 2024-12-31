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
        <?php echo $str; ?><!-- 본문내용, 관리자 내용관리에서 수정할 수 있다.-->
        <div class='youtube-wrap' video-id='BydKuXnSit8'><div class="blocker"></div> <div id='youtube_player'></div></div>



        <div class="blank"></div>
        </div>
        </div>
    </div>

</article>