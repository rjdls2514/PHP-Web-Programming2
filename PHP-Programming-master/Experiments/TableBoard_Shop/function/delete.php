<?php

$connect = mysql_connect("localhost", "pcs", "1234");
mysql_select_db("pcs_db",$connect);

$sql = "delete from tableboard_shop where num=$_GET[num]";

$result = mysql_query($sql);
echo $sql;
if(!$result){
    echo "<script> alert('에러입니다!');</script>"; // 알림 표시창
}
?>


<script>
   location.replace('../index.php');
</script>