<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>
<link rel="stylesheet" href="<?php echo $board_skin_url;?>/style.css">
<!--<script src="<?php echo $board_skin_url;?>/lodash.js"></script>-->
<!-- 게시판 목록 시작 { -->
<h3>주문신청</h3>

	<div class="bo_sch_wrap">
		<!-- 게시판 검색 시작 { -->
		<fieldset id="bo_sch">
			<legend>게시물 검색</legend>

			<form name="fsearch" method="get">
			<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
			<input type="hidden" name="sca" value="<?php echo $sca ?>">
			<input type="hidden" name="sop" value="and">
			<label for="sfl" class="sound_only">검색대상</label>
			<select name="sfl" id="sfl">
				<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제품명</option>
<!--				<option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
				<option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제품명+내용</option>
				<option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
				<option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
				<option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>작성자</option>
				<option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>작성자(코)</option>-->
			</select>
			<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
			<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder="검색어를 입력해주세요">
			<button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
			</form>
		</fieldset>
		<!-- } 게시판 검색 끝 -->
	</div>

<div id="bo_gall" class="gallery-block cards-gallery">

    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>


    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div id="bo_btn_top" class="mt-3 mb-2">
        <div class="text-left">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div>

<!--
        <?php if ($rss_href || $write_href) { ?>
        <div class="text-right">
            <?php if ($rss_href) { ?><a href="<?php echo $rss_href ?>" class="btn btn-sm btn-default border"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a><?php } ?>
            <?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="btn btn-sm btn-danger"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a><?php } ?>
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> 제품등록</a><?php } ?>
        </div>
        <?php } ?>
-->
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post" class="form">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

<!--
    <?php if ($is_checkbox) { ?>
    <div id="gall_allchk">
        <label for="chkall" class="sr-only">현재 페이지 게시물 전체</label>
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
    </div>
    <?php } ?>
-->

		
	<div class="gallery_wrap">
		<ul>

		<?php for ($i=0; $i<count($list); $i++) { ?>
		<li>
				<a href="<?php echo $list[$i]['href'] ?>">
				<?php
					$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);

					if($thumb['src']) {
						$img_content = '<div class="img" style="background-image: url('.$thumb['src'].');">';
					} else {
						$img_content = '<div class="img" style="background-image: url(images/noimage.gif);">';
					}
				?>
				<?php echo $img_content;?>

				<!-- 체크박스 -->
				<div class="gall_chk">
					<?php if ($is_checkbox) { ?>
					<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
					<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
					<?php } ?>
					<span class="sound_only">
						<?php
						if ($wr_id == $list[$i]['wr_id'])
							echo "<span class=\"bo_current\">열람중</span>";
						else
							echo $list[$i]['num'];
						 ?>
					</span>
				</div>
				<!-- /체크박스 -->
			</div>
			<p class="mt20 mb10">

				<span class="bo_v_cate"><?php echo $list[$i]['ca_name']; // 분류 출력 끝 ?></span>

				<?php echo $list[$i]['subject'] ?>
			</p>
			</a>
			
            <!--<table class="tbl_view">
                 <tr>
					 <th class="">공</th>
					 <td><?php echo $list[$i]['wr_1'] ?></td>
                 	 <th class="">두께</th>
					 <td><?php echo $list[$i]['wr_2'] ?></td>
				 </tr>
                 <tr>
					 <th class="">너비</th>
					 <td><?php echo $list[$i]['wr_3'] ?></td>
                 	 <th class="">길이</th>
				 	 <td><?php echo $list[$i]['wr_4'] ?></td>
				 </tr>
                 <tr>
					 <th class="">제품중량</th>
					 <td><?php echo $list[$i]['wr_5'] ?></td>
					 <th class=""></th>
					 <td></td>
				 </tr>
              </table>-->
		</li>
		<?php }//for ?>
			
        <?php if (count($list) == 0) { echo "<p>게시물이 없습니다.</p>"; } ?>
	</div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="f-clear pt15">
		<div class="f-left">
        <?php if ($list_href || $write_href) { ?>
            <?php if ($is_checkbox) { ?>
            <button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button>
            <button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn-danger btn-sm"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button>
<!--            <button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn-danger btn-sm"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button>-->
            <?php } ?>
		</div>
		<div class="f-right">
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> 제품등록</a><?php } ?>
		</div>
        <?php } ?>
    </div>	
	
    <?php } ?>
    </form>

</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == 'copy')
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
