<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드 삭제하기!
$connect = mysql_connect("localhost", "pcs", "1234");
mysql_select_db("pcs_db",$connect);

$sql = "delete from tableboard_shop where num=$_POST[num]";

$result = mysql_query($sql);

if(!$result){
    echo "<script> alert('에러입니다!');</script>"; // 알림 표시창
}
?>


<script>
  //  location.replace('../index.php');
</script>