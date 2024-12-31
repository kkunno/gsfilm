<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
?>

<article id="ctt" class="ctt_<?php echo $co_id; ?>">
	<?php echo $str; ?>
</article>

<script>
    // swiper
    new Swiper('.pro-swiper', {
        speed: 1500,
        navigation: {
            nextEl: '.next',
            prevEl: '.prev',
        }, 
        effect : 'fade', 
        pagination : { el : '.swiper-pagination',},
        autoplay: { delay: 3000,},
        autoplayDisableOnInteraction: true, 
        loop : true
    });
</script>