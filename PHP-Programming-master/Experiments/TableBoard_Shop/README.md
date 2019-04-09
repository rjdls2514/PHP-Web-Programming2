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

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]

<?php
    $connect = mysql_connect("localhost", "pcs", "1234");
    mysql_select_db("pcs_db",$connect);

    $sql = "select * from tableBoard_shop";
    $result = mysql_query($sql);

    $array = mysql_fetch_array($result);
    $row = mysql_fetch_row($result);
?>

- $connect를 사용해 mysql과 연결 후 mysql_select_db로 해당 DB에 연결
- $sql에 tableboard_shop 테이블의 모든 데이터를 불러오는 쿼리를 입력
- mysql_query로 $sql의 쿼리를 실행하고 그 데이터를 $result에 저장

 for($i=0;$i<10;$i++){

                        echo"<tr onclick='location.href = ('board_form.php?num=$row[num]')'>
                        <td class='column1'>$array[date]</td>
                        <td class='column2'>$array[order_id]</td>
                        <td class='column3'>$array[name]</td>
                        <td class='column4'>$array[price]</td>
                        <td class='column5'>$array[quantity]</td>
                        <td class='column6'>$array[price]*$array[quantity]</td>
                        </tr>";

                    }

- 테이블 10개를 for문으로 출력
- 각 요소의 값을 해당 테이블에 있는 필드의 값을 불러와 출력

## board_form.php 수정
[여기에 board_form.php 를 어떻게 수정했는지, 설명을 작성하세요.]

<td class="column1"> <input name="date" type="text" value="<? echo "$array[Date]";#TODO: 정보 표시 ?>" /> </td>
                                <td class="column2"> <input name="order_id" type="number" value="<? echo "$array[order_id]" #TODO: 정보 표시 ?>" /> </td>
                                <td class="column3"> <input name="name" type="text" value="<? echo "$array[name]" #TODO: 정보 표시 ?>" /> </td>
                                <td class="column4"> <input name="price" type="number" placeholder="$" style="text-align: right;" value="<? echo "$array[price]" #TODO: 정보 표시 ?>" /> </td>
                                <td class="column5"> <input name="quantity" type="number" value="<? echo "$array[quantity]" #TODO: 정보 표시 ?>" style="text-align: right;" /> </td>
                                <td class="column6"> $<span id="total"> <? echo "$array[peice]*echo \"$array[quantity]\"" #TODO: 정보 표시 ?> </span> </td>

- num에 해당하는 테이블이 이미 있을 때 num에 해당하는 테이블의 필드 값을 표시

## function
### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]

$connect = mysql_connect("localhost", "pcs", "1234");
mysql_select_db("pcs_db",$connect);

$sql = "insert into tableboard_shop(Date, order_id, name, price, quantity) values($_POST[date], $_POST[order_id], '$_POST[name]', $_POST[price], $_POST[quantity]";

$result = mysql_query($sql);

mysql에서 해당 DB를 불러와서 insert를 사용하여 테이블을 추가.
이떄 각 값들은 board_form.php상에서 입력된 값을 POST형식으로 불러와 저장

### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]

$connect = mysql_connect("localhost", "pcs", "1234");
mysql_select_db("pcs_db",$connect);

$sql = "update tableboard_shop set Date=$_POST[date], order_id=$_POST[order_id], name='$_POST[name]', price=$_POST[price], quantity=$_POST[quantity]";

$result = mysql_query($sql);

mysql에서 해당 DB를 불러와서 update를 사용하여 num에 해당하는 테이블의 필드값을 갱신.
이떄 각 값들은 board_form.php상에서 입력된 값을 POST형식으로 불러와 저장




### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]

$connect = mysql_connect("localhost", "pcs", "1234");
mysql_select_db("pcs_db",$connect);

$sql = "delete from tableboard_shop where num=$_POST[num]";

$result = mysql_query($sql);

mysql에서 해당 DB를 불러와서 num에 해당하는 번호의 테이블을 delete를 사용하여 제거
