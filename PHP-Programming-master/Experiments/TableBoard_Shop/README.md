# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!
```
create table tableboard_shop(
    -> num int primary key auto_increment,
    -> Date date,
    -> order_id int(20),
    -> name char(100),
    -> price int(20),
    -> quantity int(10)
    -> ); 
```
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]
```
<?php
    # TODO: MySQL 데이터베이스 연결 및 레코드 가져오기!
    $connect = mysql_connect("localhost", "pcs", "1234");
    mysql_select_db("pcs_db",$connect);

    $sql = "select * from tableBoard_shop";
    $result = mysql_query($sql);
?>

- $connect를 사용해 mysql과 연결 후 mysql_select_db로 해당 DB에 연결
- $sql에 tableboard_shop 테이블의 모든 데이터를 불러오는 쿼리를 입력
- mysql_query로 $sql의 쿼리를 실행하고 그 데이터를 $result에 저장

 <?php
                         while($row = mysql_fetch_row($result)){ ?>
 
                         <tr onclick="location.href = ('board_form.php?num=<? echo $row[0]?>')">
                         <td class='column1'><? echo $row[1];?></td>
                         <td class='column2'><? echo $row[2];?></td>
                         <td class='column3'><? echo $row[3];?></td>
                         <td class='column4'><? echo $row[4];?></td>
                         <td class='column5'><? echo $row[5];?></td>
                         <td class='column6'><? echo $row[4]*$row[5];?></td>
                         </tr>
 
                     <?php
                     }
                     ?>

- while문으로 모든 테이블을 출력. 단, 조건문을 테이블을 배열로 불러오는 mysql_fetch_row()로 설정
- 각 요소의 값을 해당 테이블에 있는 필드의 값을 불러와 출력
- total 값을 표시하기 위해 echo를 이용해 호출
```
## board_form.php 수정
[여기에 board_form.php 를 어떻게 수정했는지, 설명을 작성하세요.]
```
<?php

if(isset($_GET[num])) {
    $connect = mysql_connect("localhost", "pcs", "1234");
    mysql_select_db("pcs_db",$connect);

    $sql = "select * from tableBoard_shop where num=$_GET[num]";
    $result = mysql_query($sql);

    $row = mysql_fetch_row($result);
}
?>
- mysql 에서 num에 해당하는 번호의 테이블을 가져옴(단, 목록 클릭을 통해 해당 num값의 테이블이 있을 경우)

<td class="column1"> <input name="date" type="text" value="<? echo $row[1]; ?>" /> </td>
                                <td class="column2"> <input name="order_id" type="number" value="<? echo $row[2]; ?>" /> </td>
                                <td class="column3"> <input name="name" type="text" value="<? echo $row[3]; ?>" /> </td>
                                <td class="column4"> <input name="price" type="number" placeholder="$" style="text-align: right;" value="<? echo $row[4]; ?>" /> </td>
                                <td class="column5"> <input name="quantity" type="number" value="<? echo $row[5]; ?>" style="text-align: right;" /> </td>
                                <td class="column6"> $<span id="total"> <? echo $row[4]*$row[5]; ?> </span> </td>
- num에 해당하는 테이블이 이미 있을 때(update 또는 delete 시) num에 해당하는 테이블의 필드 값을 표시
- total 값을 표시하기 위해서 각 출력을 echo로 처리
```
## function
### insert.php 수정
```
<?php

$connect = mysql_connect("localhost", "pcs", "1234");
mysql_select_db("pcs_db",$connect);

$sql = "insert into tableboard_shop(Date, order_id, name, price, quantity) values($_POST[date], $_POST[order_id], '$_POST[name]', $_POST[price], $_POST[quantity])";

$result = mysql_query($sql);


# 참고 : 에러 메시지 출력 방법
if(!$result){
    echo "<script> alert('에러입니다!');</script>"; // 알림 표시창
}
?>


<script>
    location.replace('../index.php');
</script>

mysql에서 해당 DB를 불러와서 insert를 사용하여 테이블을 추가.
이떄 각 값들은 board_form.php상에서 입력된 값을 POST형식으로 불러와 저장
```
### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]
```
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


mysql에서 해당 DB를 불러와서 update를 사용하여 num에 해당하는 테이블의 필드값을 갱신.
이떄 각 값들은 board_form.php상에서 입력된 값을 POST형식으로 불러와 저장


```

### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]
```
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

mysql에서 해당 DB를 불러와서 num에 해당하는 번호의 테이블을 delete를 사용하여 제거
```