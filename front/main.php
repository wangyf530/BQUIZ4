<!-- 0217 -->
<?php
$nav = '';
$typeId=$_GET['type']??0;
if ($typeId == 0) {
    $nav = '全部商品';
} else {
    $type = $Type->find($typeId);
    if ($type['big_id'] == 0) {
        $nav = $type['name'];
    } else {
        $big = $Type->find($type['big_id']);
        $nav = $big['name'] . " > " . $type['name'];
    }
}
?>
<h2><?= $nav; ?></h2>
<style>
    .item {
        display: flex;
        margin: 3px auto;
        width: 85%;
    }

    .item div {
        padding: 5px;
        border: 1px solid white;
    }

    .item>div:nth-child(1) {
        width: 40%;
    }

    .item>div:nth-child(2) {
        width: 60%;
    }
</style>
<?php
$rows = $Item->all();
if (isset($big)) {
    $rows = $Item->all(['mid' => $typeId]);
} else if ($typeId != 0) {
    $rows = $Item->all(['big' => $typeId]);
} else {
    $rows = $Item->all();
}

foreach ($rows as $row):
?>
    <div class="item">
        <div class="pp ct">
            <a href="?do=detail&id=<?= $row['id']; ?>">
                <img src="./img/<?= $row['img']; ?>" style="width:200px; height:150px;">
            </a>
        </div>
        <div class="">
            <div class="tt ct"><?= $row['name']; ?></div>
            <div class="pp">價錢：<?= $row['price']; ?>
            <a href="?do=buycart&id=<?=$row['id'];?>&qt=1">    
                <img src="./icon/0402.jpg" style="float:right;">
            </a>
            </div>
            <div class="pp">規格：<?= $row['spec']; ?></div>
            <div class="pp">簡介：<?= substr($row['intro'], 0, 21); ?>...</div>
        </div>
    </div>
<?php
endforeach;
?>