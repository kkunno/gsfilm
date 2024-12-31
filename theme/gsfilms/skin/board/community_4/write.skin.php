<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

foreach($menu_datas as $index => $row){
}
?>
<?php
// 현재 URL을 가져옵니다.
$currentUrl = $_SERVER['REQUEST_URI'];

// 키워드와 인덱스를 매핑합니다.
$keywords = ['company', 'esg', 'field', 'RnD', 'community', 'service'];
$indexToFind = null;

// URL에 있는 각 키워드를 검사합니다.
foreach ($keywords as $index => $keyword) {
    if (strpos($currentUrl, $keyword) !== false) {
        $indexToFind = $index;
        break;
    }
}

// 일치하는 키워드가 있는 경우, 해당 인덱스의 $row 값을 찾아 출력합니다.
if ($indexToFind !== null) {
    foreach ($menu_datas as $index => $row) {
        if ($index === $indexToFind) {
            break;
        }
    }
}
?>
<div class="con1-wr">
   <div class="con1">
    <div class="sidemenu">
        <div class="h1"><?php echo get_text($row['me_name']); ?></div>
        <div class="bar3"></div>
    <div class="bar2"></div>
    <?php
            foreach($menu_datas as $index => $row){
                if($index == $menuItemIndex){
                    $isFirst = true; // 첫 번째 항목 플래그
                    foreach((array) $row['sub'] as $row2){
                        if(empty($row2)) continue;
                        
                        // 분리자 추가 (첫 번째 항목 제외)
                        if (!$isFirst) {
                        } else {
                            $isFirst = false;
                        }
                        $isActive = false;
                        if (!empty($currentCoId) && strpos($row2['me_pid'], $currentCoId) !== false) {
                            $isActive = true;
                        }
                        if (!empty($currentBoTable) && strpos($row2['me_pid'], $currentBoTable) !== false) {
                            $isActive = true;
                        }
                        $activeClass = $isActive ? ' active' : '';
                        echo '<div class="bannercontent ' . $activeClass .'">';
                                     
                        // 하위 메뉴가 있는지 확인하는 SQL 쿼리
                        $sql_check_sub = "SELECT COUNT(*) as sub_count FROM {$g5['menu_table']} 
                                          WHERE me_code LIKE '".substr($row2['me_code'], 0, 4)."%' 
                                          AND length(me_code) = '6' 
                                          AND me_use = '1'";
                                          $result_check_sub = sql_query($sql_check_sub);
                                          $row_check_sub = sql_fetch_array($result_check_sub);
                                          if ($row_check_sub['sub_count'] > 0) {
                            // 하위 메뉴가 존재하면 여기에 코드 추가
                            echo '<a target="_'. $row2['me_target'] .'" class="gnb_2da"><span>'. $row2['me_name'].'</span> ';  
                            echo '<svg version="1.1" id="레이어_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 18.86 7.59" style="enable-background:new 0 0 18.86 7.59;" xml:space="preserve">
                            <polyline class="st01" points="0.58,0.81 9.72,7.38 18.86,0.81 "/>
                       </svg>';
                        }
                        else{
                        echo '<a href="'. $row2['me_link'] .'" target="_'. $row2['me_target'] .'" class="gnb_2da">'. $row2['me_name'];  }
                        echo '</a>';
                        // 하위 메뉴 쿼리 수정
                        if ($row_check_sub['sub_count'] > 0) {   
                 
                        echo '<div class="gnb_3da">';
                        $sql3 = "SELECT * FROM {$g5['menu_table']} 
                                 WHERE me_code LIKE '".substr($row2['me_code'], 0, 4)."%' 
                                 AND length(me_code) = '6' 
                                 AND me_use = '1' 
                                 ORDER BY me_order, me_id";
                        $query3 = sql_query($sql3);
                        while($submenu3 = sql_fetch_array($query3)){
                            $isActive2 = false;
                            if (!empty($currentCoId) && strpos($submenu3['me_link'], $currentCoId) !== false) {
                                $isActive2 = true;
                            }
                            if (!empty($currentBoTable) && strpos($submenu3['me_link'], $currentBoTable) !== false) {
                                $isActive2 = true;
                            }
                            $active2Class = $isActive2 ? ' active' : '';      
                            echo "<a href='".$submenu3['me_link']."'><li class='gnb_3li".$active2Class."'>".$submenu3['me_name'].'</li></a>';
                         }
                        echo '</div>'; // End of gnb_3da
                    }
                        
                        echo '</div>'.PHP_EOL;
                        echo '<div class="bar2"></div>';
                    }
                    break; // 해당하는 메뉴 항목을 찾았으면 반복 종료
                }
            }
            ?>
    </div>
    <div id="ctt_con">
        <div class="h1"><?= get_head_title($g5['title'])?> </div>
        <div class="bar2"></div>

        <div class="content-wr wide">
<div class="content">
<section id="bo_w">
    <h2 class="sound_only"><?php echo $g5['title'] ?></h2>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) { 
        $option = '';
        if ($is_notice) {
            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="notice" name="notice"  class="selec_chk" value="1" '.$notice_checked.'>'.PHP_EOL.'<label for="notice"><span></span>공지</label></li>';
        }
        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" class="selec_chk" value="'.$html_value.'" '.$html_checked.'>'.PHP_EOL.'<label for="html"><span></span>html</label></li>';
            }
        }
        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="secret" name="secret"  class="selec_chk" value="secret" '.$secret_checked.'>'.PHP_EOL.'<label for="secret"><span></span>비밀글</label></li>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }
        if ($is_mail) {
            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="mail" name="mail"  class="selec_chk" value="mail" '.$recv_email_checked.'>'.PHP_EOL.'<label for="mail"><span></span>답변메일받기</label></li>';
        }
    }
    echo $option_hidden;
    ?>
   

    <div class="bo_w_tit write_div">

         
        <div id="autosave_wrapper" class="write_div">
        <div class="write_grid">
        <div class="left">    
        <span>*</span>제&emsp;&ensp;목
        </div>
        <div class="right"> 
              <label for="wr_subject" class="sound_only">제목<strong>필수</strong></label>
            <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input full_input short" size="50" maxlength="255" placeholder="">
            <?php if ($is_member) { // 임시 저장된 글 기능 ?>
            <script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
            <?php if($editor_content_js) echo $editor_content_js; ?>
            <button type="button" id="btn_autosave" class="btn_frmline">임시 저장된 글 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
            <div id="autosave_pop">
                <strong>임시 저장된 글 목록</strong>
                <ul></ul>
                <div><button type="button" class="autosave_close">닫기</button></div>
            </div>
            <?php } ?>
            </div>


        <div class="left">    
        <span>*</span>날&emsp;&ensp;짜
        </div>
        <div class="right">
        <input type="text" name="wr_2" value="<?php echo $wr_2 ?>" id="wr_2" required class="frm_input full_input" size="50" maxlength="255" placeholder="날짜 입력">
        </div>
        
            </div>
        </div>
        
    <input type="hidden" name="wr_name" value="user">
    <input type="hidden" name="wr_password" value="a1111111">
    <input type="hidden" name="wr_email" value="-">
    <input type="hidden" name="wr_homepage" value="-">
  <!--  <div class="bo_w_info write_div">
	    <?php if ($is_name) { ?>
	        <label for="wr_name" class="sound_only">이름<strong>필수</strong></label>
	        <input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input half_input required" placeholder="이름">
	    <?php } ?>
	
	    <?php if ($is_password) { ?>
	        <label for="wr_password" class="sound_only">비밀번호<strong>필수</strong></label>
	        <input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input half_input <?php echo $password_required ?>" placeholder="비밀번호">
	    <?php } ?>
	
	    <?php if ($is_email) { ?>
			<label for="wr_email" class="sound_only">이메일</label>
			<input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input half_input email " placeholder="이메일">
	    <?php } ?>
	    
	
	    <?php if ($is_homepage) { ?>
	        <label for="wr_homepage" class="sound_only">홈페이지</label>
	        <input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input half_input" size="50" placeholder="홈페이지">
	    <?php } ?>
	</div>-->
	</div>
    <?php if ($option) { ?>
    <div class="write_div">
        <span class="sound_only">옵션</span>
        <ul class="bo_v_option">
        <?php echo $option ?>
        </ul>
    </div>
    <?php } ?>
    <div class="write_grid">
    <div class="left">    
    <span>*</span>본&emsp;&ensp;문
        </div>
    <div class="right"> 
    <div class="write_div">
        <label for="wr_content" class="sound_only">내용<strong>필수</strong></label>
        <div class="wr_content <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
            <?php if($write_min || $write_max) { ?>
            <!-- 최소/최대 글자 수 사용 시 -->
            <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
            <?php } ?>
            <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
            <?php if($write_min || $write_max) { ?>
            <!-- 최소/최대 글자 수 사용 시 -->
            <div id="char_count_wrap"><span id="char_count"></span>글자</div>
            <?php } ?>
        </div>
        
    </div></div></div>

    <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
    <div class="bo_w_link write_div">
        <label for="wr_link<?php echo $i ?>"><i class="fa fa-link" aria-hidden="true"></i><span class="sound_only"> 링크  #<?php echo $i ?></span></label>
        <input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){ echo $write['wr_link'.$i]; } ?>" id="wr_link<?php echo $i ?>" class="frm_input full_input" size="50">
    </div>
    <?php } ?>
    <div class="bo_w_fiel_wr">
    <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        
    <div class="bo_w_flie write_div">

        <div class="file_wr write_div">
            <label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><span class="sound_only"> 파일 #<?php echo $i+1 ?></span>
            <input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file ">
            <span class="fileh1">파일첨부<span>(총100M까지 가능)</span></span><br>
            <div class="filebutton">파일 업로드</div>
            <span class="file-name">선택한 파일이 없습니다.</span>
            </label>

        </div>
        <?php if ($is_file_content) { ?>
        <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" size="50" placeholder="파일 설명을 입력해주세요.">
        <?php } ?>

        <?php if($w == 'u' && $file[$i]['file']) { ?>
        <span class="file_del">
            <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
        </span>
        <?php } ?>
        
        
        </div>
    <?php } ?>
    
    </div>
    <div class="bo_w_flie">
    <?php if ($is_use_captcha) { //자동등록방지  ?>
    <div class="write_div">
        <?php echo $captcha_html ?>
    </div>
    <?php } ?></div>
    <div class="hrline"></div>
    <div class="btn_confirm write_div">
        <button type="submit" id="btn_submit" accesskey="s" class="btn_submit btn">작성</button>
        
        <a href="<?php echo get_pretty_url($bo_table); ?>" class="btn_cancel btn">취소</a>
    </div>
    </form>

    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        if (!f.wr_1.checked) {
        alert("개인정보수집이용에 동의하셔야 작성할 수 있습니다.");
        f.wr_1.focus();
        return false;
    }
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    document.addEventListener('DOMContentLoaded', function() {
    // 모든 파일 입력 필드에 이벤트 리스너를 추가합니다.
    document.querySelectorAll('input[type="file"]').forEach(function(fileInput) {
        fileInput.addEventListener('change', function() {
            // 파일 입력 필드에 해당하는 파일 이름 표시 요소를 찾습니다.
            var fileNameDisplay = this.parentNode.querySelector('.file-name');

            if (this.files.length > 0) {
                // 파일이 선택되었다면, 선택된 파일의 이름을 표시합니다.
                fileNameDisplay.textContent = this.files[0].name;
            } else {
                // 파일이 선택되지 않았다면, "선택된 파일 없음" 텍스트를 표시합니다.
                fileNameDisplay.textContent = "선택된 파일이 없습니다.";
            }
        });
    });
});



    </script>
    
</section>
<!-- } 게시물 작성/수정 끝 --></div></div></div></div>