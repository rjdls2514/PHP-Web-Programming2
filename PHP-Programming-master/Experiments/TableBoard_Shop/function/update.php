<?php

$connect = mysql_connect("localhost", "pcs", "1234");
mysql_select_db("pcs_db",$connect);

$sql = "update tableboard_shop set Date=$_POST[date], order_id=$_POST[order_id], name='$_POST[name]', price=$_POST[price], quantity=$_POST[quantity] where num=$_GET[num]";

$result = mysql_query($sql);
if(!$result) {
    echo "<script> alert('update - error message') </script>";
}
?>

<script>
    location.replace('../index.php');
</script>
