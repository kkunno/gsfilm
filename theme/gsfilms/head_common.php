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

<script src="/js/jquery.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/theme.php"></script>
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
                        <li><a href="/n/bbs/content.php?co_id=warning" <?php if($co_id=="warning") echo 'class="active"';?>>취급 시 주의사항</a></li>
                        <li><a href="/n/bbs/board.php?bo_table=news" <?php if($bo_table=="news") echo 'class="active"';?>>뉴스룸</a></li>
                    </ul>
                </li>
                <li><a href="/n/bbs/board.php?bo_table=video" <?php if($bo_table=="video" || $bo_table=="pds") echo 'class="active"';?>>홍보관</a>
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