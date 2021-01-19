<?php
session_start();
include "pdo.php";

$pdo = getPdo();
//获取房间列表
$sql = "select * from p_rooms";
$res = $pdo->query($sql);
$data = $res->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>欧青辣少</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>




<div id="container">
    <div>
        <?php
        if(isset($_SESSION['uid'])){
            echo "<a href=\"logout.php\">退出</a>";
        }else{
            ?>
            <a href="reg.html" target="_blank">注册</a>
            <a href="login.html" target="_blank">登录</a>

            <?php
        }
        ?>
        <a href="prize.html" target="_blank">抽奖</a>
    </div>
    <hr>
    <div id="app">
        <h1>房间预订</h1>  <span id="time"></span>
        <hr>
        <?php
        foreach ($data as $k=>$v){
            $price = $v['price'] / 100 . '.00';
            $id = $v['id'];
            echo "<div class='seat  green ' data-id='{$id}' data-status='0'>";
            echo "<button class='btn' >可预订 ¥{$price}</button>";
            echo "<h1 class='nickname'>{$v['name']}</h1>";
            echo "</div>";
        }
        ?>

    </div>
</div>




<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/time.js"></script>
<script src="/js/seat.js"></script>

</body>
</html>