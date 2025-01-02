<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);

?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />


<article id="ctt" class="ctt_<?php echo $co_id; ?>">
    <header>
        <h1><?php echo $g5['title']; ?></h1>
    </header>

    <div id="ctt_con">
        <?php echo $str; ?>
    </div>

</article>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$(document).ready(function () {
  $('.sub-slider').slick({
    slidesToShow: 3,      // 한 번에 하나의 슬라이드 표시
    slidesToScroll: 1,    // 한 번에 하나씩 이동
    infinite: true,       // 무한 반복
    dots: true,           // 하단 점 네비게이션
    arrows: true,         // 좌우 화살표 표시
    autoplay: true,       // 자동 재생
    autoplaySpeed: 5000,  // 전환 간격 3초
  });
});
</script>