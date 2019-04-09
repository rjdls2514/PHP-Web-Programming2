<?php
/**
 * Created by PhpStorm.
 * User: 박찬수
 * Date: 2019-03-28
 * Time: 오후 2:27
 */

$connect = mysql_connect("localhost","pcs","1234");
$db_con = mysql_select_db("pcs_db", $connect);

$sql = "select * from business_card where name=$_POST[name]";
$result = mysql_query($sql,$connect);

$row = mysql_fetch_array($result);

//if(!$row) {
    $sql = "insert into business_card(name, password, email, company, side, job, blog_url, facebook_id, twitter_id, github_id) 
values('$_POST[name]', '$_POST[password]', '$_POST[email]', '$_POST[company]', '$_POST[side]', '$_POST[job]', '$_POST[blog_url]', '$_POST[facebook_id]', '$_POST[twitter_id]', '$_POST[github_id]')";

  echo $sql;
$result = mysql_query($sql,$connect);

if(!$result){
    echo "<script> alert('에러입니다!');</script>"; // 알림 표시창
}
//}

mysql_close();

?>
<!--<script>-->
<!--    location.href = "login_form.php"; // 로그인 화면으로 이동-->
<!--</script>-->


