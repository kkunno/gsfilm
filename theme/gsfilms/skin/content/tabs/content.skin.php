<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
?>

<article id="ctt" class="ctt_<?php echo $co_id; ?>">
	<?php echo $str; ?>
</article>

<script>
    // 탭 메뉴
	var tabList = $('.tab_menu a');
	var tabTarget = $('');
	tabList.each(function(index, el) {
		if ($(this).attr('href').indexOf(".") > -1) {
			tabTarget = tabTarget.add($(this).attr('href'));
			if (!$(this).parent().hasClass('current')) {
					$($(this).attr('href')).hide();
				};
			$(this).click(function(event) {
				$(this).parent().addClass('current').siblings().removeClass('current');
				tabTarget.hide();
				$($(this).attr('href')).show();
				scrollGoing = $(window).scrollTop();
				window.scrollTo(0, scrollGoing);
				return false;
			});
		};
	});
</script>