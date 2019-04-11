# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)
[만약 추가한 파일이 있으면, 내용 추가! 없으면 이 문구 삭제!]
```

## board.php (수정)
```

<?php

$connect = mysql_connect("localhost", "pcs", "1234");
mysql_select_db("pcs_db",$connect);

$sql = "select * from boardz where title like '%$_GET[name]%' ";
$result = mysql_query($sql);


?>

<div class="boardz centered-block beautiful">
                            <?php
                            for($i=0;$i<3;$i++) {
                                echo "<ul>";
                                while ($array = mysql_fetch_array($result)) {
                                    if ($array[num] / 3 == $i) {
                                        echo "
                                    <h1>$array[title]</h1>
                      k              <br/> $array[contents]
                                    <li>
                                        <img src=\"$array[image_url]\" alt=\"demo image\"/>
                                    </li>";
                                    }
                                }
                                echo "</ul>";
                            }
                            ?>
```
