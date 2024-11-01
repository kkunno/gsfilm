<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}

if(! defined('_INDEX_')) define('_INDEX_', TRUE);
include_once(G5_THEME_PATH.'/head.php');
$svg = ' <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px"
y="0px" >
<polyline class="st0" points="0.3,0.2 4.6,8.7 0.3,17.3 "/>
</svg>';
/*


include_once(G5_THEME_SHOP_PATH.'/shop.head.php');*/
?>


<div class="topBanner">
    <div class="bannerText"><?php echo htmlspecialchars($primaryMenuName); ?><br><?php echo htmlspecialchars($g5['title']); ?></div>
    <img src="../theme/basic/img/banner40.png">

    <div class="button-wr">
        <?php foreach ($secondaryMenus as $index => $subMenu): ?>
            <?php
            // 현재 페이지 식별자(co_id 또는 bo_table)가 서브 메뉴의 me_link에 정확히 포함되어 있는지 확인
            $isActive = (!empty($currentCoId) && strpos($subMenu['me_link'], "co_id=$currentCoId") !== false) ||
                        (!empty($currentBoTable) && strpos($subMenu['me_link'], "bo_table=$currentBoTable") !== false);
            $activeClass = $isActive ? 'active' : '';
            ?>
            <a href="<?php echo htmlspecialchars($subMenu['me_link']); ?>" class="button <?php echo $activeClass; ?>"><div><?php echo htmlspecialchars($subMenu['me_name']); ?></div></a>
            <?php if ($index < count($secondaryMenus) - 1): // 마지막 항목이 아닐 경우에만 분리자 추가 ?>
                <div class="bar2"></div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="bar"></div>
</div>


<article id="ctt">
    <div id="ctt_con">
<!-- 사이드메뉴 -->
<?php
$menu_datas = get_menu_db(0, true); // 1차 메뉴 가져오기
?>
<div class="sidemenu">
    <div class="top">유제 제품</div>
    <div class="bottom">
        <?php foreach ($menu_datas as $menu_item): // 1차 메뉴 반복 ?>
            <li class="side-li <?php echo ($menu_item['me_code'] == '40') ? ' active' : ''; // 타이틀이 me_name과 같으면 active 추가 ?>">
                <a href="<?php echo $menu_item['me_link']; ?>" target="_<?php echo $menu_item['me_target']; ?>">
                    <?php echo $menu_item['me_name']; ?>
                    <div><?php echo str_repeat($svg, 3); ?></div>
                </a>
            </li>
        <?php endforeach; ?>
    </div>
</div>



<?php if($default['de_type1_list_use']) { ?>
<!-- 할인상품 시작 { -->
<section class="sct_wrap">
    <?php
    $list_mod = 4;     // 가로 이미지수
    $list_row = 2;     // 이미지줄 수, Query를 직접 지정하기 때문에 이미지줄 수는 적용되지 않음
    $img_width = 230;  // 이미지 폭
    $img_height = 230; // 이미지 높이
    $skin = G5_SHOP_SKIN_PATH.'/main.10.skin.php'; // 스킨
    $sql = " select * from {$g5['g5_shop_item_table']} where it_use = '1' order by it_order, it_id desc ";
    $list = new item_list($skin, $list_mod, $list_row, $img_width, $img_height);
    $list->set_view('it_id', false);
    $list->set_view('it_name', true);
    $list->set_view('it_basic', true);
    $list->set_view('it_cust_price', true);
    $list->set_view('it_price', true);
    $list->set_view('it_icon', true);
    $list->set_view('sns', true);
    $list->set_view('star', true);
    echo $list->run();
    ?>
</section>
<!-- } 할인상품 끝 -->
<?php } ?>
</div>
        </article>
<?php
include_once(G5_THEME_PATH.'/tail.php');