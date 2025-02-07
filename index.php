<?php include "api/db.php"?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <!-- 0207 改路徑 -->
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <!-- 0207 改路徑 -->
    <script src="./js/js.js"></script>
    <!-- 0207 加JS -->
    <script src="./js/jquery-3.4.1.min.js"></script>
</head>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <div id="main">
        <div id="top">
            <a href="index.php">
                <!-- 0207 改路徑 -->
                <img src="./icon/0416.jpg" style='width:500px'>
            </a>
            <div style="padding:10px;">
                <a href="index.php">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
                    if(empty($_SESSION['Mem'])){
                        echo "<a href='?do=login'>會員登入</a> |";
                    } else {
                        echo "<a href='./api/logout.php?table=Mem'>會員登出</a> |";
                    }
                ?>
                <?php
                    if(empty($_SESSION['Admin'])){
                        echo "<a href='?do=admin'>管理登入</a> |";
                    } else {
                        echo "<a href='back.php'>後台管理</a> |";
                    }
                ?>
            </div>
            <!-- 0207 刪掉 -->
            <!-- 情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~ -->
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <!-- 0207 右側顯示東西 -->
        <div id="right">
            <!-- 0207 include file -->
            <?php
            $do = $_GET['do'] ?? 'main';
            $file = "front/" . $do . ".php";
            if (file_exists($file)) {
                include $file;
            } else {
                include "front/main.php";
            }
            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            頁尾版權 : </div>
    </div>

</body>

</html>