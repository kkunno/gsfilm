<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
?>
<link rel="stylesheet" href="<?php echo $board_skin_url;?>/style.css">
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->

<h3>주문신청</h3>

<article id="bo_v">

    <section id="bo_v_info" class="f-clear">
		<div class="f-left w40p">
			<?php echo $view['file'][0]['view'] ?>
		</div>
		<div class="f-right w60p">
		  <table class="tbl_view">
			  <thead>
			  	<tr>
					<th colspan="4">
						<?php if ($category_name) { ?>
						<span class="bo_v_cate"><?php echo $view['ca_name']; // 분류 출력 끝 ?></span>
						<?php } ?>
						<span class="bo_v_tit">
						<?php
						echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
						?></span>
					</th>
				</tr>
			  </thead>
			  <tr>
				  <th>공</th>
				  <td><?php echo $view['wr_1'] ?></td>
				  <th>두께</th>
				  <td><?php echo $view['wr_2'] ?></td>
			  </tr>
			  <tr>
				  <th>너비</th>
				  <td><?php echo $view['wr_3'] ?></td>
				  <th>길이</th>
				  <td><?php echo $view['wr_4'] ?></td>
			  </tr>
			  <tr>
				  <th>중량</th>
				  <td><?php echo $view['wr_5'] ?></td>
				  <th></th>
				  <td></td>
			  </tr>
		   </table>
		</div>
    </section>

    <section id="bo_v_atc">

		<div id="bo_v_img">
			<?php echo $view['file'][1]['view'] ?>
		</div>

        <!-- 본문 내용 시작 { -->
<!--        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>-->
        <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>


        <!--  추천 비추천 시작 { -->
        <?php if ( $good_href || $nogood_href) { ?>
        <div id="bo_v_act">
            <?php if ($good_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="bo_v_good"><span class="sr-only">추천</span><strong><?php echo number_format($view['wr_good']) ?></strong></a>
                <b id="bo_v_act_good"></b>
            </span>
            <?php } ?>
            <?php if ($nogood_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="bo_v_nogood"><span class="sr-only">비추천</span><strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
                <b id="bo_v_act_nogood"></b>
            </span>
            <?php } ?>
        </div>
        <?php } else {
            if($board['bo_use_good'] || $board['bo_use_nogood']) {
        ?>
        <div id="bo_v_act">
            <?php if($board['bo_use_good']) { ?><span class="bo_v_good"><span class="sr-only">추천</span><strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
            <?php if($board['bo_use_nogood']) { ?><span class="bo_v_nogood"><span class="sr-only">비추천</span><strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
        </div>
        <?php
            }
        }
        ?>
        <!-- }  추천 비추천 끝 -->
    </section>

<!--
    <div id="bo_v_share" class="m-3">
        <?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="btn btn_b03" onclick="win_scrap(this.href); return false;"><i class="fa fa-thumb-tack" aria-hidden="true"></i> 스크랩</a><?php } ?>

        <?php
        include_once(G5_SNS_PATH."/view.sns.skin.php");
        ?>
    </div>
-->

    <?php
    $cnt = 0;
    if ($view['file']['count']) {
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
     ?>

    <?php if($cnt) { ?>
    <!-- 첨부파일 시작 { -->
    <section id="bo_v_file">
        <h2>첨부파일</h2>
        <ul>
        <?php
        // 가변 파일
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
         ?>
            <li>
                <i class="fa fa-download" aria-hidden="true"></i>
                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                    <strong><?php echo $view['file'][$i]['source'] ?></strong>
                </a>
                <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드 | DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
            </li>
        <?php
            }
        }
         ?>
        </ul>
    </section>
    <!-- } 첨부파일 끝 -->
    <?php } ?>

    <?php if(isset($view['link'][1]) && $view['link'][1]) { ?>
    <!-- 관련링크 시작 { -->
    <section id="bo_v_link">
        <h2>관련링크</h2>
        <ul>
        <?php
        // 링크
        $cnt = 0;
        for ($i=1; $i<=count($view['link']); $i++) {
            if ($view['link'][$i]) {
                $cnt++;
                $link = cut_str($view['link'][$i], 70);
            ?>
            <li>
                <i class="fa fa-link" aria-hidden="true"></i> <a href="<?php echo $view['link_href'][$i] ?>" target="_blank">

                    <strong><?php echo $link ?></strong>
                </a>
                <span class="bo_v_link_cnt"><?php echo $view['link_hit'][$i] ?>회 연결</span>
            </li>
            <?php
            }
        }
        ?>
        </ul>
    </section>
    <!-- } 관련링크 끝 -->
    <?php } ?>

	<hr class="line" />
	
    <div class="order-wrap">
      <form name="fwrite" id="fwrite" action="<?php echo G5_BBS_URL ?>/write_update.php" onsubmit="return fregister_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" class="form">
      <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
      <input type="hidden" name="w" value="<?php echo $w ?>">
      <input type="hidden" name="bo_table" value="<?php echo $board['bo_10'];?>">
      <input type="hidden" name="sca" value="<?php echo $sca ?>">
      <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
      <input type="hidden" name="stx" value="<?php echo $stx ?>">
      <input type="hidden" name="spt" value="<?php echo $spt ?>">
      <input type="hidden" name="sst" value="<?php echo $sst ?>">
      <input type="hidden" name="sod" value="<?php echo $sod ?>">
      <input type="hidden" name="page" value="<?php echo $page ?>">

      <input type="hidden" name="wr_subject" value="<?php echo $view['wr_subject'] ?>">
      <input type="hidden" name="wr_10" value="<?php echo $view['wr_1'] ?>"> <!--상품가격 -->
      <input type="hidden" name="wr_9" value="<?php echo $view['wr_2'] ?>"> <!--주문단위 -->
      <input type="hidden" name="wr_8" value="<?php echo $view['wr_id'] ?>"> <!--글번호 -->
      <input type="hidden" name="wr_7" value="<?php echo $bo_table ?>"> <!--상품게시판명 -->
      <input type="hidden" name="wr_6" value="<?php echo $view['ca_name'] ?>"> <!-- 분류 -->

      <div class="form-group row">
        <label for="wr_name" class="frm_label">이름</label>
        <div>
        <input type="text" name="wr_name" required class="frm_input w50p" value="<?php echo $member['mb_name'] ?>" id="wr_name" aria-describedby="nameHelp" placeholder="" readonly>
        </div>
      </div>

      <?php if ($is_quest) { ?>
          <label for="wr_password" class="sr-only">비밀번호<strong>필수</strong></label>
          <input type="hidden" name="wr_password" value="<?php echo date('his');?>" class="frm_input w50p" >
      <?php } ?>

      <div class="form-group row">
          <label for="wr_1" class="frm_label">수량</label>
          <div>
          <input type="number" name="wr_1" required class="frm_input w20p" id="wr_1" aria-describedby="numberHelp" placeholder="">
          </div>
      </div>

      <div class="form-group row">
          <label for="wr_email" class="frm_label">이메일</label>
          <div>
          <input type="text" name="wr_email" value="<?php echo $member['mb_email'] ?>" id="wr_email" class="frm_input w50p" aria-describedby="emailHelp" placeholder="">
          </div>
      </div>

      <div class="form-group row">
        <label for="wr_2" class="frm_label">연락처</label>
          <div class="w20p" style="display: inline-block;">
            <select name="tel1" id="tel1" class="frm_input" required>
            <option value="" >선택</option>
            <option value="02">02</option>
            <option value="031">031</option>
            <option value="032">032</option>
            <option value="033">033</option>
            <option value="041">041</option>
            <option value="042">042</option>
            <option value="043">043</option>
            <option value="051">051</option>
            <option value="052">052</option>
            <option value="053">053</option>
            <option value="054">054</option>
            <option value="055">055</option>
            <option value="061">061</option>
            <option value="062">062</option>
            <option value="063">063</option>
            <option value="064">064</option>
            <option value="070">070</option>
            <option value="050">050</option>
            <option value="010">010</option>
            <option value="011">011</option>
            <option value="016">016</option>
            <option value="017">017</option>
            <option value="018">018</option>
            <option value="019">019</option>
            </select>
          </div>
		  -
          <div class="w20p" style="display: inline-block;">
            <input type="text" name="tel2" class="frm_input" maxlength=4 required placeholder="">
          </div>
		  -
          <div class="w20p" style="display: inline-block;">
            <input type="text" name="tel3" class="frm_input" maxlength=4 required aria-describedby="telHelp" placeholder="">
          </div>
      </div>

      <div class="form-group row">
        <label for="wr_3" class="frm_label">주소</label>

        <input type="text" name="wr_zip" value="" id="reg_wr_zip"<?php echo $is_req_addr?' required':''; ?> class="frm_input w20p mb5" maxlength="6" readonly>
        <button type="button" class="btn btn-gray mb5" onclick="win_zip('fwrite', 'wr_zip', 'wr_addr1', 'wr_addr2', 'wr_addr3', 'wr_addr_jibeon');">주소 검색</button>

        <input type="text" name="wr_addr1" value="" id="reg_wr_addr1" <?php echo $is_req_addr?"required":""; ?> class="frm_input mb5" placeholder="기본주소">
        <input type="text" name="wr_addr2" value="" id="reg_wr_addr2" class="frm_input mb5" placeholder="상세주소">
        <input type="hidden" name="wr_addr3" value="">
        <input type="hidden" name="wr_addr_jibeon" value="">
      </div>

      <div class="form-group row">
            <label for="wr_content" class="frm_label">기타 요청사항</label>
          <textarea name="wr_content" class="frm_input" placeholder="주문과 관련한 요청사항을 적어주세요." style="height: 140px;"></textarea>
      </div>

      <div class="form-group row">
          <label for="cf_stipulation" class="frm_label">개인정보 수집 및 이용 동의</label>
          <div class="frm_input" style="height: 140px; overflow: auto; color: #666; padding: 1em; line-height: 1.5;" id="" readonly>
				<p class="mb10">※ 귀하는 위 항목에 동의하지 않을 권리가 있습니다. 단, 동의하지 않는 경우 서비스 이용이 어려울 수 있습니다. 귀하는 언제든지 본 동의를 철회할 수 있습니다.</p>
				<b class="ml10">- 수집∙이용 목적 :</b> 주문신청 관련 본인여부 확인, 문의사항 응대, 제품발송 및 이후 고객응대<br>
				<b class="ml10">- 수집 항목 :</b> 상기 기재하신 개인정보 (성명, 이메일, 전화번호, 주소)<br>
				<b class="ml10">- 보유 및 이용기간 :</b> 2년 또는 동의를 철회한 때 또는 관련 법령에 따라 요구되는 때까지
		  </div>
      </div>

      <div class="form-check row mb-2 mt10">
          <input type="checkbox" name="agree" class="form-check-input" id="cf_stipulation">
          <label class="form-check-label" for="cf_stipulation" style="vertical-align: top">개인정보 수집 및 이용 동의</label>
      </div>
		 <br><br>

      <div class="form-group row">
          <?php if ($is_guest) {
            $captcha_html = '';
            $captcha_js   = '';
            $is_use_captcha = ((($board['bo_use_captcha'] && $w !== 'u') || $is_guest) && !$is_admin) ? 1 : 0;

            if ($is_use_captcha) {
                $captcha_html = captcha_html();
                $captcha_js   = chk_captcha_js();
            }

             ?>
              <?php echo $captcha_html; ?>
          <?php } ?>
        </div>
        <div class="t-center mt20">
          <input type="submit" value="주문하기" id="btn_submit" accesskey="s" class="btn-join">
        </div>
		  
      </form>
    </div>


    <!-- 게시물 상단 버튼 시작 { -->
    <div id="bo_v_top" class="f-clear pt15">
        <?php
        ob_start();
        ?>

        <div class="f-left">
            <?php if ($update_href) { ?><a href="<?php echo $update_href ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 수정</a><?php } ?>
            <?php if ($delete_href) { ?><a href="<?php echo $delete_href ?>" class="btn btn-primary btn-sm" onclick="del(this.href); return false;"><i class="fa fa-trash-o" aria-hidden="true"></i> 삭제</a><?php } ?>
<!--            <?php if ($copy_href) { ?><a href="<?php echo $copy_href ?>" class="btn btn-danger btn-sm" onclick="board_move(this.href); return false;"><i class="fa fa-files-o" aria-hidden="true"></i> 복사</a><?php } ?>
            <?php if ($move_href) { ?><a href="<?php echo $move_href ?>" class="btn btn-danger btn-sm" onclick="board_move(this.href); return false;"><i class="fa fa-arrows" aria-hidden="true"></i> 이동</a><?php } ?>
            <?php if ($search_href) { ?><a href="<?php echo $search_href ?>" class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i> 검색</a><?php } ?>-->
        </div>

        <div class="f-right">
           <a href="<?php echo $list_href ?>" class="btn btn-default border btn-sm"><i class="fa fa-list" aria-hidden="true"></i> 목록</a>
<!--            <?php if ($reply_href) { ?><a href="<?php echo $reply_href ?>" class="btn btn-primary btn-sm"><i class="fa fa-reply" aria-hidden="true"></i> 답변</a><?php } ?>-->
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> 제품등록</a><?php } ?>
        </div>
        <?php if ($prev_href || $next_href) { ?>
                <ul class="bo_v_nb">
                    <?php if ($prev_href) { ?><li class="btn_prv"><span class="nb_tit"><i class="fa fa-caret-up" aria-hidden="true"></i> 이전상품</span><a href="<?php echo $prev_href ?>"><?php echo $prev_wr_subject;?></a> <span class="nb_date"><?php echo str_replace('-', '.', substr($prev_wr_date, '2', '8')); ?></span></li><?php } ?>
                    <?php if ($next_href) { ?><li class="btn_next"><span class="nb_tit"><i class="fa fa-caret-down" aria-hidden="true"></i> 다음상품</span><a href="<?php echo $next_href ?>"><?php echo $next_wr_subject;?></a>  </li><?php } ?>
                </ul>
                <?php } ?>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>

    <!-- } 게시물 상단 버튼 끝 -->

    <?php
    // 코멘트 입출력
  //  include_once(G5_BBS_PATH.'/view_comment.php');
     ?>


</article>
<!-- } 게시판 읽기 끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();

    //sns공유
    $(".btn_share").click(function(){
        $("#bo_v_sns").fadeIn();

    });

    $(document).mouseup(function (e) {
        var container = $("#bo_v_sns");
        if (!container.is(e.target) && container.has(e.target).length === 0){
        container.css("display","none");
        }
    });
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->
<script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
        <script>
            function openDaumPostcode() {
            new daum.Postcode({
            oncomplete: function(data) {
            var fullAddr = '';
            var extraAddr = '';
            if (data.userSelectedType === 'R') {
            fullAddr = data.roadAddress;
            } else {
            fullAddr = data.jibunAddress;
            }
            if(data.userSelectedType === 'R'){
            if(data.bname !== ''){
            extraAddr += data.bname;
            }
            if(data.buildingName !== ''){
            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
            }
            fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
            }
            document.getElementById('postcode').value = data.zonecode;
            document.getElementById('addr').value = fullAddr;
            document.getElementById('addr2').focus();
            }
            }).open();
            }
</script>
<script>
        function fregister_submit(f)
        {
            if (!f.agree.checked) {
                alert("개인정보 수집 및 이용 동의 내용에 동의해 주세요.");
                f.agree.focus();
                return false;
            }

            return true;
        }
</script>
