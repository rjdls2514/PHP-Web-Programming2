<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!
$connect = mysql_connect("localhost", "pcs", "1234");
mysql_select_db("pcs_db",$connect);

$sql = "insert into tableboard_shop(Date, order_id, name, price, quantity) values($_POST[date], $_POST[order_id], '$_POST[name]', $_POST[price], $_POST[quantity]";

$result = mysql_query($sql);


# 참고 : 에러 메시지 출력 방법
if(!$result){
    echo "<script> alert('에러입니다!');</script>"; // 알림 표시창
}
?>


<script>
  //  location.replace('../index.php');
</script>
