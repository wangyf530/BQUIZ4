<!-- 0217 -->
<?php
// 看有沒有建立購物車
// 第一行可省略但實際下來會有風險
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (!empty($_GET['id'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
// dd($_SESSION['cart']);
// 如果沒登入
if (!isset($_SESSION['Mem'])) {
    to("index.php?do=login");
}

// 0220 extra when cart is empty --- not really proper
if(isset($_GET['err']) && $_GET['err']==1){
    echo "<h2 class='ct'>購物車需要有商品才可以結帳</h2>";
}


?>

<h2 class="ct"><?= $_SESSION['Mem']; ?>的購物車</h2>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    foreach ($_SESSION['cart'] as $id => $qt):
        $item = $Item->find($id);
    ?>
        <tr class="pp">
            <td class="ct"><?= $item['no']; ?></td>
            <td class="ct"><?= $item['name']; ?></td>
            <td class="ct"><?= $qt; ?></td>
            <td class="ct"><?= $item['stock']; ?></td>
            <td class="ct"><?= $item['price']; ?></td>
            <td class="ct"><?php echo $item['price'] * $qt; ?></td>
            <td class="ct">
                <img src="./icon/0415.jpg" alt="" onclick="delCart(<?= $id; ?>)">
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="ct">
    <img src="./icon/0411.jpg" onclick="location.href='index.php'">
    <img id='checkout' src="./icon/0412.jpg" onclick="location.href='?do=checkout'">
</div>

<script>
    function delCart(id) {
        $.post("./api/delcart.php", {
            id
        }, function() {
            location.href = '?do=buycart';
        })
    }

    // $("#checkout").on("click",function(){
    //     if(empty($_SESSION['cart'])){
    //         alert('empty cart no need to checkout')
    //     }
    // })
</script>