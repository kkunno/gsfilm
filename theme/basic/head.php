<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE & ~E_WARNING);
if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

add_javascript('<script src="'.G5_THEME_JS_URL.'/theme.js"></script>')
?>
<meta property="og:image" content="<?=G5_THEME_IMG_URL?>/ogimage.jpg" />
<link rel="shortcut icon" href="<?=G5_THEME_IMG_URL?>/pavicon.png" type="image/x-icon">
<link rel="stylesheet" as="style" crossorigin href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_URL ?>/css/layout.css">

<!-- 로딩 -->
<div id="loading">
    <img src="<?php echo G5_THEME_IMG_URL ?>/loading.gif">
</div>


<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
    <div id="tnb">
    	<div class="inner">
            <?php if(G5_COMMUNITY_USE) { ?>
    		<ul id="hd_define">
    			<li class="active"><a href="<?php echo G5_URL ?>/">커뮤니티</a></li>
                <?php if (defined('G5_USE_SHOP') && G5_USE_SHOP) { ?>
    			<li><a href="<?php echo G5_SHOP_URL ?>/">쇼핑몰</a></li>
                <?php } ?>
    		</ul>
            <?php } ?>
			<ul id="hd_qnb">
	            <li><a href="<?php echo G5_BBS_URL ?>/faq.php">FAQ</a></li>
	            <li><a href="<?php echo G5_BBS_URL ?>/qalist.php">Q&A</a></li>
	            <li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
	            <li><a href="<?php echo G5_BBS_URL ?>/current_connect.php" class="visit">접속자<strong class="visit-num"><?php echo connect('theme/basic'); // 현재 접속자수, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?></strong></a></li>
	        </ul>
		</div>
    </div>
    <div id="hd_wrapper">

        <div id="logo">
            <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/logo.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>
    
        <div class="hd_sch_wr">
            <fieldset id="hd_sch">
                <legend>사이트 내 전체검색</legend>
                <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
                <input type="hidden" name="sfl" value="wr_subject||wr_content">
                <input type="hidden" name="sop" value="and">
                <label for="sch_stx" class="sound_only">검색어 필수</label>
                <input type="text" name="stx" id="sch_stx" maxlength="20" placeholder="검색어를 입력해주세요">
                <button type="submit" id="sch_submit" value="검색"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
                </form>

                <script>
                function fsearchbox_submit(f)
                {
                    var stx = f.stx.value.trim();
                    if (stx.length < 2) {
                        alert("검색어는 두글자 이상 입력하십시오.");
                        f.stx.select();
                        f.stx.focus();
                        return false;
                    }

                    // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                    var cnt = 0;
                    for (var i = 0; i < stx.length; i++) {
                        if (stx.charAt(i) == ' ')
                            cnt++;
                    }

                    if (cnt > 1) {
                        alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                        f.stx.select();
                        f.stx.focus();
                        return false;
                    }
                    f.stx.value = stx;

                    return true;
                }
                </script>

            </fieldset>
                
            <?php echo popular('theme/basic'); // 인기검색어, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?>
        </div>
        <ul class="hd_login">        
            <?php if ($is_member) {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
            <?php if ($is_admin) {  ?>
            <li class="tnb_admin"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
            <?php }  ?>
            <?php } else {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
            <?php }  ?>

        </ul>
    </div>
    
    <nav id="gnb">
        <h2>메인메뉴</h2>
        <div class="gnb_wrap">
            <ul id="gnb_1dul">
                <li class="logo-wr"><a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_IMG_URL ?>/logo.svg"></a></li>

                <!--<li class="gnb_1dli gnb_mnal"><button type="button" class="gnb_menu_btn" title="전체메뉴"><i class="fa fa-bars" aria-hidden="true"></i><span class="sound_only">전체메뉴열기</span></button></li>
            -->
               <div class="pc-wr">
               <?php
				$menu_datas = get_menu_db(0, true);
				$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                $i = 0;
                foreach( $menu_datas as $row ){
                    if( empty($row) ) continue;
                    $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plus' : '';
                ?>
                <li class="gnb_1dli <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                    <?php
                    $k = 0;
                    foreach( (array) $row['sub'] as $row2 ){

                        if( empty($row2) ) continue; 

                        if($k == 0)
                            echo '<span class="bg">하위분류</span><div class="gnb_2dul"><ul class="gnb_2dul_box">'.PHP_EOL;
                    ?>
                        <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                    <?php
                    $k++;
                    }   //end foreach $row2

                    if($k > 0)
                        echo '</ul></div>'.PHP_EOL;
                    ?>
                </li>
                <?php
                $i++;
                }   //end foreach $row

                if ($i == 0) {  ?>
                    <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                <?php } ?>
                </div>
                <div class="mobile-wr">
                <button type="button" id="gnb_open" class="hd_opener"><i><div class="bar1"></div><div class="bar2"></div><div class="bar3"></div></i><span class="sound_only"> 메뉴열기</span></button>
                </div>


            </ul>
            <div id="gnb_all">
                <!--<h2>전체메뉴</h2>-->
                <ul class="gnb_al_ul">
                    <div class="gnb_al_li-wr">
                    <?php
                    
                    $i = 0;
                    foreach( $menu_datas as $row ){
                    ?>
                    <li class="gnb_al_li">
                        <a target="_<?php echo $row['me_target']; ?>" class="gnb_al_a"><?php echo $row['me_name'] ?> <img src="../theme/basic/img/arrow.png"></a>
                        <?php
                        $k = 0;
                        foreach( (array) $row['sub'] as $row2 ){
                            if($k == 0)
                                echo '<ul class="gnb_al_ul2">'.PHP_EOL;
                        ?>
                            <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
                        <?php
                        $k++;
                        }   //end foreach $row2

                        if($k > 0)
                            echo '</ul>'.PHP_EOL;
                        ?>
                    </li>
                    <?php
                    $i++;
                    }   //end foreach $row

                    if ($i == 0) {  ?>
                        <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                    <?php } ?>
                    </div>
                </ul>
                <button type="button" class="gnb_close_btn"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div id="gnb_all_bg"></div>
        </div>
    </nav>

<!-- theme.php 파일 포함 -->
<?php include 'js/theme.php'; ?>

</div>
<!-- } 상단 끝 -->




<?php
// 메뉴 데이터 로드
$menu_datas = get_menu_db(0, true);
$currentUrl = $_SERVER['REQUEST_URI'];

// URL에서 쿼리 스트링 파싱
$queryString = parse_url($currentUrl, PHP_URL_QUERY);
parse_str($queryString, $params);

// co_id와 bo_table 값 추출
$currentCoId = $params['co_id'] ?? '';
$currentBoTable = $params['bo_table'] ?? '';

$primaryMenuName = ''; // 1차 메뉴 이름
$primaryMenuCode = ''; // me_code의 앞 두 자리
$secondaryMenus = []; // 2차 메뉴 항목들

// 메뉴 데이터 순회하여 현재 페이지에 해당하는 메뉴 정보 찾기
foreach ($menu_datas as $menu) {
    // co_id 또는 bo_table 값이 메뉴 링크에 포함되어 있는지 확인
    $menuQuery = parse_url($menu['me_link'], PHP_URL_QUERY);
    parse_str($menuQuery, $menuParams);
    
    if (($currentCoId && !empty($menuParams['co_id']) && $menuParams['co_id'] === $currentCoId) ||
        ($currentBoTable && !empty($menuParams['bo_table']) && $menuParams['bo_table'] === $currentBoTable)) {
        $primaryMenuName = $menu['me_name'];
        $primaryMenuCode = substr($menu['me_code'], 0, 2);
        $secondaryMenus = $menu['sub'];
        break;
    }

    // 서브 메뉴 항목 검사
    foreach ($menu['sub'] as $subMenu) {
        $subMenuQuery = parse_url($subMenu['me_link'], PHP_URL_QUERY);
        parse_str($subMenuQuery, $subMenuParams);
        
        if (($currentCoId && !empty($subMenuParams['co_id']) && $subMenuParams['co_id'] === $currentCoId) ||
            ($currentBoTable && !empty($subMenuParams['bo_table']) && $subMenuParams['bo_table'] === $currentBoTable)) {
            $primaryMenuName = $menu['me_name']; // 상위 메뉴 이름을 1차 메뉴 이름으로 설정
            $primaryMenuCode = substr($menu['me_code'], 0, 2); // 상위 메뉴의 me_code 앞 두 자리 설정
            $secondaryMenus = $menu['sub']; // 상위 메뉴에 속한 전체 2차 메뉴 항목들 저장
            break 2;
        }
    }
}

// 1차 메뉴 이름이 설정된 경우에만 내용 표시
if (!empty($primaryMenuName)):
?>
<div class="topBanner">
    <div class="bannerText"><?php echo htmlspecialchars($primaryMenuName); ?><br><?php echo htmlspecialchars($g5['title']); ?></div>
    <img src="../theme/basic/img/banner<?php echo htmlspecialchars($primaryMenuCode); ?>.png">

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
<?php endif; ?>







<hr>

<!-- 콘텐츠 시작
<div id="wrapper">
    <div id="container_wr">
   
    <div id="container">--> 
        <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><?/*<span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span>*/?></h2><?php }