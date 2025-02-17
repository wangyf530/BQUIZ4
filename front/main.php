<!-- 0217 -->
<?php
$nav='';
$TypeId = $_GET['type'];
if($TypeId == 0){
    $nav = '全部商品';
} else{
    $type = $Type->find($TypeId);
    if($type['big_id']==0){
        $nav = $type['name'];
    } else {
        $big = $Type->find($type['big_id']);
        $nav = $big['name'] . " > " . $type['name'];
    }
}
?>
<h2><?=$nav;?></h2>
<style>
    .item{
        display: flex;
        margin: 3px auto;
        width: 85%;
    }

    .item div{
        padding: 5px;
        border: 1px solid white;
    }

    .item>div:nth-child(1){
        width: 40%;
    }
    .item>div:nth-child(2){
        width: 60%;
    }
</style>
<?php
    $rows = $Item->all();
    if(isset($big)){
        $rows = $Item->all(['mid'=>$TypeId]);
    } else if ($TypeId !=0){
        $rows = $Item->all(['big'=>$TypeId]);
    } else {
        $rows = $Item->all();
    }

    foreach($rows as $row):
?>
<div class="item">
    <div class="pp">
        <a href="?do=detail&id=<?=$row['id'];?>">我要購買</a>
        <img src="./img/<?=$row['img'];?>" style="width:150px; height:120px;">
    </div>
    <div class="">
        <div class="tt ct"><?=$row['name'];?></div>
        <div class="pp">價錢：<?=$row['price'];?></div>
        <div class="pp">規格：<?=$row['spec'];?></div>
        <div class="pp">簡介：<?=substr($row['intro'],0,21);?>...</div>
    </div>
</div>
<?php
endforeach;
?>