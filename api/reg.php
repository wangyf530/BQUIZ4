<?php
include_once "db.php";
$Mem -> save($_POST);

// 0213 如果有id -> 修改 -> 返回原本的頁面
if(isset($_POST['id'])){
    to("../back.php?do=mem");
}