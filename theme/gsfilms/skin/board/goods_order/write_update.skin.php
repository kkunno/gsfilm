<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$wr_2 = "$tel1-$tel2-$tel3";
$sql2  = " update $write_table set wr_2 = '$wr_2' where wr_id = '$wr_id' ";
sql_query($sql2);

//$wr_3 = "[{$wr_zip}] {$wr_addr1} {$wr_addr2} {$wr_addr3}({$wr_addr_jibeon})";
$wr_3 = "[{$wr_zip}] {$wr_addr1} {$wr_addr2} {$wr_addr3}";
$sql3  = " update $write_table set wr_3 = '$wr_3' where wr_id = '$wr_id' ";
sql_query($sql3);

alert('주문신청이 완료되었습니다. 담당자가 곧 연락드리겠습니다.', G5_URL);
?>
