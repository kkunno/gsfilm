<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head_common.php');
?>

<script>
$(function(){
	var stit = $(".sub-content h3:nth-of-type(1)").text();
	$(".sub-gnb-list > li:last-child > a").text(stit);
});
</script>

<!-- 서브 비주얼 //-->
    <div class="sub-visual sub03">
        <div><h2>연구개발</h2></div>        
    </div>
	<!--// 서브 비주얼 -->
    <!-- 네비게이션 //-->
    <div class="sub-gnb">
        <div class="sub-gnb-container">
            <ul class="sub-gnb-list">
                <li><a href="/n/"><img src="<?php echo G5_THEME_URL ?>/images/icon_home.png" alt="홈"></a></li>
                <li><a href="#none">연구개발</a>
                    <ul class="depth">
                        <li><a href="/n/bbs/content.php?co_id=greeting">회사소개</a></li>
                        <li><a href="/n/bbs/content.php?co_id=farmfilm">제품&기술</a></li>
                        <li><a href="/n/bbs/content.php?co_id=lab">연구개발</a></li>
                        <li><a href="/n/bbs/board.php?bo_table=notice">고객지원</a></li>
                        <li><a href="/n/bbs/board.php?bo_table=video">홍보관</a></li>
                    </ul>                    
                </li>
                <li><a href="#none"></a>
                    <ul class="depth">
                        <li><a href="/n/bbs/content.php?co_id=lab">기업부설 연구소</a></li>
                        <li><a href="/n/bbs/content.php?co_id=rnd">연구실적 및 과제</a></li>
                        <li><a href="/n/bbs/content.php?co_id=permission">각종 인증 및 허가</a></li>
                        <li><a href="/n/bbs/content.php?co_id=quality">품질관리</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--// 네비게이션 -->
    <!-- 콘텐트 영역 //-->
    <div class="sub-content">