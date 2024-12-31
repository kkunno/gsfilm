<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<!-- 로그인 후 아웃로그인 시작 { -->
<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="s_ol_after_info"><strong><?php echo $nick ?></strong> 님</a>
<a href="<?php echo G5_BBS_URL ?>/logout.php" id="s_ol_after_logout">LOGOUT</a>
<!-- } 로그인 후 아웃로그인 끝 -->
