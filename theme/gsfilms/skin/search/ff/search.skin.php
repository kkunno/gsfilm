<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$search_skin_url.'/style.css">', 0);
?>

<h3>검색결과</h3>

<!-- 전체검색 시작 { -->
<form name="fsearch" onsubmit="return fsearch_submit(this);" method="get">
<input type="hidden" name="srows" value="<?php echo $srows ?>">
<fieldset id="sch_res_detail">
    <legend>상세검색</legend>
    <!--<?php echo $group_select ?>
    <script>document.getElementById("gr_id").value = "<?php echo $gr_id ?>";</script>-->

    <label for="sfl" class="sound_only">검색조건</label>
    <select name="sfl" id="sfl">
        <option value="wr_subject||wr_content"<?php echo get_selected($_GET['sfl'], "wr_subject||wr_content") ?>>제목+내용</option>
        <option value="wr_subject"<?php echo get_selected($_GET['sfl'], "wr_subject") ?>>제목</option>
        <option value="wr_content"<?php echo get_selected($_GET['sfl'], "wr_content") ?>>내용</option>
        <option value="mb_id"<?php echo get_selected($_GET['sfl'], "mb_id") ?>>회원아이디</option>
        <option value="wr_name"<?php echo get_selected($_GET['sfl'], "wr_name") ?>>이름</option>
    </select>

    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo $text_stx ?>" id="stx" required class="frm_input required" maxlength="20">
    <input type="submit" class="btn_submit" value="검색">

    <script>
    function fsearch_submit(f)
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

        f.action = "";
        return true;
    }
    </script>
	<div style="display: inline-block; padding: 5px;">
		<input type="radio" value="or" <?php echo ($sop == "or") ? "checked" : ""; ?> id="sop_or" name="sop">
		<label for="sop_or">OR &nbsp;&nbsp;</label>
		<input type="radio" value="and" <?php echo ($sop == "and") ? "checked" : ""; ?> id="sop_and" name="sop">
		<label for="sop_and">AND</label>
	</div>
</fieldset>
</form>

<br><br>

<div id="sch_result">


<?php //  내용관리 검색 기능 시작
if (number_format($page) == 1) { // 첫번째 검색 페이지에서만 노출
echo '<br>';
echo '<section id="sch_res_ov">
		<h2><strong>"'.$stx.'"</strong> 일반페이지 검색결과</h2>
    </section>';
echo '<section class="sch_res_list">';
$sql = "SELECT * FROM g5_content WHERE (co_content LIKE '%$stx%' OR co_subject LIKE '%$stx%')";
$re = sql_query($sql);
$i = 0;
    while ($result = sql_fetch_array($re)) {
        $co_href = G5_BBS_URL.'/content.php?co_id='.$result['co_id'];
        //print '<h2><a href="'.$co_href.'">'.$result['co_subject'].' </a>페이지내 결과</h2>';
        print '<ul><li><a href="'.$co_href.'" class="sch_res_title">'.$result['co_subject'].'</a><p class=t2>';
        print cut_str(strip_tags($result['co_content']),200).'</p></li></ul>';
        $i++;
    }
if($i == 0){
    echo '<div class="empty_list">일반페이지에서는 검색된 자료가 하나도 없습니다.</div>';
    } else {
        echo '<p class="t-right mt15">일반페이지에서 <strong>'.$i.'</strong>개의 결과가 검색되었습니다.</p>';
    }

echo  '</section>';
}  //  내용관리 검색 기능 끝
?>
	<br><br><br>
    <section id="sch_res_ov">
        <h2><strong>"<?php echo $stx ?>"</strong> 게시판 내 검색결과</h2>
    </section>
    <?php
    if ($stx) {
        if ($board_count) {
    ?>
    <?php
        }
    }
    ?>

    <?php
    if ($stx) {
        if ($board_count) {
     ?>
    <ul id="sch_res_board">
        <li><a href="?<?php echo $search_query ?>&amp;gr_id=<?php echo $gr_id ?>" <?php echo $sch_all ?>>전체게시판</a></li>
        <?php echo $str_board_list; ?>
    </ul>
    <?php
        } else {
     ?>
    <div class="empty_list">게시판에서는 검색된 자료가 하나도 없습니다.</div>


    <?php } }  ?>

    <hr>




    <?php if ($stx && $board_count) { ?><section class="sch_res_list"><?php }  ?>
    <?php
    $k=0;
    for ($idx=$table_index, $k=0; $idx<count($search_table) && $k<$rows; $idx++) {
     ?>
        <h2><a href="./board.php?bo_table=<?php echo $search_table[$idx] ?>&amp;<?php echo $search_query ?>"><?php echo $bo_subject[$idx] ?> 게시판 내 결과</a></h2>
        <ul>
        <?php
        for ($i=0; $i<count($list[$idx]) && $k<$rows; $i++, $k++) {
            if ($list[$idx][$i]['wr_is_comment'])
            {
                $comment_def = '<span class="cmt_def">댓글 | </span>';
                $comment_href = '#c_'.$list[$idx][$i]['wr_id'];
            }
            else
            {
                $comment_def = '';
                $comment_href = '';
            }
         ?>

            <li>
                <a href="<?php echo $list[$idx][$i]['href'] ?><?php echo $comment_href ?>" class="sch_res_title"><?php echo $comment_def ?><?php echo $list[$idx][$i]['subject'] ?></a>
                <!--<a href="<?php echo $list[$idx][$i]['href'] ?><?php echo $comment_href ?>" target="_blank">새창</a>-->
                <p><?php echo $list[$idx][$i]['content'] ?></p>
                <?php echo $list[$idx][$i]['name'] ?>
                <span class="sch_datetime"><?php echo $list[$idx][$i]['wr_datetime'] ?></span>
            </li>
        <?php }  ?>
        </ul>
        <div class="sch_more"><a href="./board.php?bo_table=<?php echo $search_table[$idx] ?>&amp;<?php echo $search_query ?>"><strong><?php echo $bo_subject[$idx] ?></strong> 결과 더보기</a></div>

        <hr>
    <?php }  ?>
	<br>
	<div class="f-clear">
		<p class="t-left f-left"><?php echo number_format($page) ?>/<?php echo number_format($total_page) ?> 페이지 열람 중</p>
		<p class="t-right f-right"><!--<strong><?php echo $board_count ?>개</strong>의 -->게시판 게시글에서 <strong><?php echo number_format($total_count) ?>개</strong>의 결과가 검색되었습니다.</p>
	</div>
	
	
	<?php if ($stx && $board_count) {  ?></section><?php }  ?>

    <?php echo $write_pages ?>

</div>
<!-- } 전체검색 끝 -->
