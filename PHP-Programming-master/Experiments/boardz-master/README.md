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
├──action-page.php
[만약 추가한 파일이 있으면, 내용 추가! 없으면 이 문구 삭제!]
```

## board.php (수정)
```
<div class="boardz centered-block beautiful">
                            <?php
                            for($i=0;$i<3;$i++) {
                                echo "<ul>";
                                while ($array = mysql_fetch_array($result)) {
                                    if ($array[num] / 3 == $i) {
                                        echo "
                                    <h1>$array[title]</h1>
                                    <br/> $array[contents]
                                    <li>
                                        <img src=\"$array[image_url]\" alt=\"demo image\"/>
                                    </li>";
                                    }
                                }
                                echo "</ul>";
                            }
                            ?>
```
