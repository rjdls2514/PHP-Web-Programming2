<!-- 구글 검색 : galley board css => CSS Only Pinterest-like Responsive Board Layout - Boardz.css | CSS ... -->
<!-- 출처 : https://www.cssscript.com/css-pinterest-like-responsive-board-layout-boardz-css/ -->

<?php

$connect = mysql_connect("localhost", "pcs", "1234");
mysql_select_db("pcs_db",$connect);
if(isset($_GET[num])) {
    $sql = "select * from boardz where title like '$_GET[num]' ";
}
else {$sql = "select * from boardz";}
echo $sql;
$result = mysql_query($sql);


?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8"> 

    <title>Boardz Demo</title>
    <meta name="description" content="Create Pinterest-like boards with pure CSS, in less than 1kB.">
    <meta name="author" content="Burak Karakan">
    <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
    <link rel="stylesheet" href="src/boardz.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wingcss/0.1.8/wing.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="seventyfive-percent  centered-block">
        <!-- Sample code block -->
        <div>    
            <hr class="seperator">

            <!-- Example header and explanation -->
            <div class="text-center">
                <h2>Beautiful <strong>Boardz</strong></h2>
                <div style="display: block; width: 50%; margin-right: auto; margin-left: auto; position: relative;">
                    <form class="example" method="POST" action="board.php?num=sumo">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <!--<hr class="seperator fifty-percent">-->

                        <!-- Example Boardz element. -->
                        <div class="boardz centered-block beautiful">
                            <?php
                            for($i=0;$i<1000;$i++){
                                echo "<ul>";
                                while ($array = mysql_fetch_array($result)) {
                                    echo "
                                    <li>
                                    <h1>$array[title]</h1>
                                    <br/> $array[contents]
                                        <img src=\"$array[image_url]\" alt=\"demo image\"/>
                                    </li>";
                                    break;
                                }
                                while ($array = mysql_fetch_array($result)) {
                                    echo "
                                    <li>
                                    <h1>$array[title]</h1>
                                    <br/> $array[contents]
                                        <img src=\"$array[image_url]\" alt=\"demo image\"/>
                                    </li>";
                                    break;
                                }
                                echo "</ul>";
                            }
                            ?>
            </div>
        </div>

        <hr class="seperator">

    </div>
</body>
</html>