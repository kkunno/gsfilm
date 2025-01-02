<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<script src="<?php echo G5_THEME_URL ?>/js/swipe.js"></script>
<script src="<?php echo G5_THEME_URL ?>/js/jquery-modal-video.min.js"></script>
<script src="<?php echo G5_THEME_URL ?>/js/common.js"></script>

<div class="wrap">	
	<!-- 상단 영역 //-->
    <?php
        error_reporting(0); // 모든 에러 억제
    ?>
	<div class="header">
        <a href="/" class="h1"><img src="<?php echo G5_THEME_URL ?>/images/logo_color.png" alt="주식회사 금성필름"></a>
        <button type="button" class="btn-menu"></button>        
        <div class="nav-wrap">
            <ul>
                <li><a href="/bbs/content.php?co_id=me1" <?php if($co_id=="greeting" || $co_id=="summary" || $co_id=="vision" || $co_id=="history" || $co_id=="location") echo 'class="active"';?>>회사소개</a>
                    <ul>
                        <li><a href="/bbs/content.php?co_id=me1" <?php if($co_id=="greeting") echo 'class="active"';?>>인사말</a></li>
                        <li><a href="/bbs/content.php?co_id=me1_4" <?php if($co_id=="summary") echo 'class="active"';?>>회사현황 및 조직도</a></li>
                       <?/* <li><a href="/bbs/content.php?co_id=me1_2" <?php if($co_id=="vision") echo 'class="active"';?>>비전 및 C.I</a></li>*/?>
                        <li><a href="/bbs/content.php?co_id=me1_5" <?php if($co_id=="history") echo 'class="active"';?>>연혁</a></li>
                       <?/* <li><a href="/bbs/content.php?co_id=me1_3" <?php if($co_id=="location") echo 'class="active"';?>>사업장 위치</a></li>*/?>
                    </ul>
                </li>
                <li><a href="/bbs/content.php?co_id=me2" <?php if($co_id=="farmfilm" || $co_id=="technicalfilm" || $co_id=="homefilm" || $co_id=="equipment" || $co_id=="antiv") echo 'class="active"';?>>제품과 기술</a>
                    <ul>
                        <li><a href="/bbs/content.php?co_id=me2" <?php if($co_id=="farmfilm") echo 'class="active"';?>>농업용 비닐(비오칸)</a></li>
                        <li><a href="/bbs/content.php?co_id=me2_2" <?php if($co_id=="technicalfilm") echo 'class="active"';?>>산업용 필름</a></li>
                        <li><a href="/bbs/content.php?co_id=me2_3" <?php if($co_id=="homefilm") echo 'class="active"';?>>가정용 필름</a></li>
                        <li><a href="/bbs/content.php?co_id=me2_4" <?php if($co_id=="equipment") echo 'class="active"';?>>설비현황</a></li>
                        <li><a href="/bbs/content.php?co_id=me2_5" <?php if($co_id=="antiv") echo 'class="active"';?>>향균비닐제조공정</a></li>
                    </ul>
                </li>
                <li><a href="/bbs/board.php?bo_table=me3" <?php if($co_id=="lab" || $co_id=="rnd" || $co_id=="permission" || $co_id=="quality") echo 'class="active"';?>>연구개발</a>
                    <ul>
                        <li><a href="/bbs/board.php?bo_table=me3" <?php if($co_id=="lab") echo 'class="active"';?>>기업부설 연구소</a></li>
                        <li><a href="/bbs/board.php?bo_table=me3_3" <?php if($co_id=="permission") echo 'class="active"';?>>각종 인증 및 허가</a></li>
                    </ul>
                </li>
                <li><a href="/bbs/board.php?bo_table=notice" <?php if($bo_table=="notice" || $bo_table=="cscenter" || $bo_table=="order" || $co_id=="warning" || $bo_table=="news") echo 'class="active"';?>>고객지원</a>
                    <ul>
                        <li><a href="/bbs/board.php?bo_table=notice" <?php if($bo_table=="notice") echo 'class="active"';?>>공지사항</a></li>
                        <li><a href="/bbs/board.php?bo_table=me5_1" <?php if($bo_table=="cscenter") echo 'class="active"';?>>고객센터</a></li>
                        <li><a href="/bbs/content.php?co_id=warning" <?php if($co_id=="warning") echo 'class="active"';?>>취급 시 주의사항</a></li>
                        <li><a href="/bbs/board.php?bo_table=news" <?php if($bo_table=="news") echo 'class="active"';?>>뉴스룸</a></li>
                    </ul>
                </li>
                <li><a href="/bbs/board.php?bo_table=video" <?php if($bo_table=="video" || $bo_table=="pds") echo 'class="active"';?>>홍보관</a>
                    <ul>
                        <li><a href="/bbs/board.php?bo_table=video" <?php if($bo_table=="video") echo 'class="active"';?>>IR 영상보기</a></li>
                        <li><a href="/bbs/board.php?bo_table=me4_3" <?php if($bo_table=="pds") echo 'class="active"';?>>자료 다운로드</a></li>
                    </ul>
                </li>

            </ul>
            <div class="member">
				<?php echo outlogin('theme/head_basic');?>
<!--
                <select class="header-language">
                    <option>KOR</option>
                    <option>영어</option>
                    <option>일본어</option>
                    <option>중국어(간체)</option>
                    <option>중국어(번체)</option>
                </select>
-->
				<!-- <div id="google_translate_element" style="display: inline-block;"></div>
				<script type="text/javascript">
				function googleTranslateElementInit() {
				  new google.translate.TranslateElement({pageLanguage: 'ko', includedLanguages: 'en,ja,ko,zh-CN,zh-TW', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
				}
				</script>
				<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
				<div class="header-search">
					<fieldset id="hd_sch">
						<legend>사이트 내 전체검색</legend>
						<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
						<input type="hidden" name="sfl" value="wr_subject||wr_content">
						<input type="hidden" name="sop" value="and">
						<label for="sch_stx" class="sound_only">검색어 필수</label>
						<input type="text" name="stx" id="sch_stx" maxlength="20" placeholder="">
						<button type="submit" id="sch_submit" value="검색"><img src="<?php echo G5_THEME_URL ?>/images/icon_search.jpg"></button>
						</form>

						<script>
						function fsearchbox_submit(f)
						{
							if (f.stx.value.length < 2) {
								alert("검색어는 두글자 이상 입력하십시오.");
								f.stx.select();
								f.stx.focus();
								return false;
							}

							// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
							var cnt = 0;
							for (var i=0; i<f.stx.value.length; i++) {
								if (f.stx.value.charAt(i) == ' ')
									cnt++;
							}

							if (cnt > 1) {
								alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
								f.stx.select();
								f.stx.focus();
								return false;
							}

							return true;
						}
						</script>

					</fieldset>
				</div>-->
				
				
            </div>
        </div>

        <div class="dim"></div>
	</div>
	<div class="nav-subbg"></div>
	<!--// 상단 영역 -->




<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

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
?>

<script src="<?php echo G5_THEME_URL ?>/js/swipe.js"></script>
<script src="<?php echo G5_THEME_URL ?>/js/jquery-modal-video.min.js"></script>
<script src="<?php echo G5_THEME_URL ?>/js/common.js"></script>
<?/*
<!-- 상단 시작 { 
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
                    if (f.stx.value.length < 2) {
                        alert("검색어는 두글자 이상 입력하십시오.");
                        f.stx.select();
                        f.stx.focus();
                        return false;
                    }

                    // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                    var cnt = 0;
                    for (var i=0; i<f.stx.value.length; i++) {
                        if (f.stx.value.charAt(i) == ' ')
                            cnt++;
                    }

                    if (cnt > 1) {
                        alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                        f.stx.select();
                        f.stx.focus();
                        return false;
                    }

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
                <li class="gnb_1dli gnb_mnal"><button type="button" class="gnb_menu_btn" title="전체메뉴"><i class="fa fa-bars" aria-hidden="true"></i><span class="sound_only">전체메뉴열기</span></button></li>
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
            </ul>
            <div id="gnb_all">
                <h2>전체메뉴</h2>
                <ul class="gnb_al_ul">
                    <?php
                    
                    $i = 0;
                    foreach( $menu_datas as $row ){
                    ?>
                    <li class="gnb_al_li">
                        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_al_a"><?php echo $row['me_name'] ?></a>
                        <?php
                        $k = 0;
                        foreach( (array) $row['sub'] as $row2 ){
                            if($k == 0)
                                echo '<ul>'.PHP_EOL;
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
                </ul>
                <button type="button" class="gnb_close_btn"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div id="gnb_all_bg"></div>
        </div>
    </nav>
    <script>
    
    $(function(){
        $(".gnb_menu_btn").click(function(){
            $("#gnb_all, #gnb_all_bg").show();
        });
        $(".gnb_close_btn, #gnb_all_bg").click(function(){
            $("#gnb_all, #gnb_all_bg").hide();
        });
    });

    </script>
</div>
 } 상단 끝 -->*/?>


<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
   
    <div id="container">
        <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php }
		
	