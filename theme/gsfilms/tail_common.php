<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>
    
    <!-- 푸터 영역 //-->
    <div class="footer-wrap">
        <div class="footer">
            <div class="footer-con01">
                <img src="<?php echo G5_THEME_URL ?>/images/icon_logo.png" alt="">
                <ul>
                    <li><a href="/n/bbs/content.php?co_id=privacy" class="privacy">개인정보처리방침</a></li>
                    <li><a href="/n/bbs/board.php?bo_table=cscenter">고객센터</a></li>
                </ul>
            </div>
            <div class="footer-con02">
                <p>전라남도 함평군 학교면 동함평산단길 22</p>
                <ul>
                    <li>TEL : 061)323-3236</li>
                    <li>FAX : 061)323-3113</li>
                    <li>사업자번호: 412-81-23321</li>
                    <li>대표자명: 김용동</li>
                </ul>
                <p>COPYRIGHT GSFILMS. ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </div>
    <!--// 푸터 영역 -->
</div>

</body>
</html>



<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");