<!-- 0213 獲取所有大分類 -->
 <!-- 0214 需要同樣方式獲取中分類 改動 -->
<?php include_once "db.php";
$type= $_GET['type'];
$big_id = $_GET['big_id']??0;
$rows = $Type->all(['big_id'=>$big_id]);
foreach ($rows as $row) {
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
}