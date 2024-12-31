<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<style>
.gall_date { font-size:11px; }
.gall_name { font-size:11px; }
</style>

<div class="ctt_admin"><a href="<?php echo $admin_href ?>" class="btn_admin btn"><span class="sound_only">관리자</span><i class="fa fa-cog fa-spin fa-fw"></i></a></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
					<!-- 게시판 목록 시작 { -->
					<div id="bo_gall" style="width:<?php echo $width; ?>">

						<?php if ($is_category) { ?>
						<nav id="bo_cate">
							<h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
							<ul id="bo_cate_ul">
								<?php echo $category_option ?>
							</ul>
						</nav>
						<?php } ?>


						<!-- 게시판 페이지 정보 및 버튼 시작 { -->
						<div id="bo_btn_top">
							<div id="bo_list_total">
								<span>Total <?php echo number_format($total_count) ?>건</span>
								<?php echo $page ?> 페이지
							</div>

							<?php if ($rss_href || $write_href) { ?>
							<ul class="btn_bo_user">
								<!--<?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
								<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
								<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn"><i class="far fa-edit"></i> 글쓰기</a></li><?php } ?>-->
							</ul>
							<?php } ?>
						</div>
						<!-- } 게시판 페이지 정보 및 버튼 끝 -->

						<form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
						<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
						<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
						<input type="hidden" name="stx" value="<?php echo $stx ?>">
						<input type="hidden" name="spt" value="<?php echo $spt ?>">
						<input type="hidden" name="sst" value="<?php echo $sst ?>">
						<input type="hidden" name="sod" value="<?php echo $sod ?>">
						<input type="hidden" name="page" value="<?php echo $page ?>">
						<input type="hidden" name="sw" value="">

						<?php if ($is_checkbox) { ?>
<!--
						<div id="gall_allchk" style="margin-left: 20px;">
							<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
							<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
						</div>
-->
						<?php } ?>
							
							
					<div class="grid-list">
						
						<?php for ($i=0; $i<count($list); $i++) { ?>
						<div class="item">
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
							<a class='img-card' href="<?php echo $list[$i]['href'] ?>#tab_menu">
								<?php
								if ($list[$i]['is_notice']) { // 공지사항  ?>
									<!--span class="is_notice">공지</span-->

								<?php
									// notice
									$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);
									if($thumb['src']) {
										$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
									} else {
										$img_content = '<span class="no_image">no image</span>';
									}
									echo $img_content;
								?>
								<?php } else {
									$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);

									if($thumb['src']) {
										$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
									} else {
										$img_content = '<span class="no_image">no image</span>';
									}
									echo $img_content;
								}
								?>
							</a>
						</div>
						<?php }//for ?>
					</div>

					  <section class="wrapper">
						 <?php if ($list_href || $is_checkbox || $write_href) { ?>
						<div class="bo_fx">
							<?php if ($list_href || $write_href) { ?>
							<ul class="btn_bo_user">
								<?php if ($is_checkbox) { ?>
								<li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_b01"></li>
								<!--<li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn_b01"></li>
								<li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn_b01"></li>-->
								<?php } ?>
								<?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>#tab_menu" class="btn_b01 btn">목록</a></li><?php } ?>
								<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>#tab_menu" class="btn_b02 btn">글쓰기</a></li><?php } ?>
							</ul>
							<?php } ?>
						</div>
						<?php } ?>
						</form>

					</section>
				</form>
						 




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
        f.action = g5_bbs_url+"/board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = g5_bbs_url+"/move.php";
    f.submit();
}

// 게시판 리스트 관리자 옵션
jQuery(function($){
    $(".btn_more_opt.is_list_btn").on("click", function(e) {
        e.stopPropagation();
        $(".more_opt.is_list_btn").toggle();
    });
    $(document).on("click", function (e) {
        if(!$(e.target).closest('.is_list_btn').length) {
            $(".more_opt.is_list_btn").hide();
        }
    });
});
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->


			</div>
		</div><!--/collapse col-->
	</div><!-- /row -->
</div><!-- /container -->
<div class="divide80"></div>


<script>
$(document).ready(function(){
	$('.breadcrumb-wrap').backstretch([
	  "<?php echo G5_THEME_URL?>/img/etc/sub-1.png",
	  "<?php echo G5_THEME_URL?>/img/etc/sub-2.png",
	  "<?php echo G5_THEME_URL?>/img/etc/sub-3.png",
	  "<?php echo G5_THEME_URL?>/img/etc/sub-5.png",
	  "<?php echo G5_THEME_URL?>/img/etc/sub-6.png"
	], {
		fade: 750,
		duration: 4000
	});
});
</script>