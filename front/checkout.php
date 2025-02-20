<!-- 0220 extra -->
<?php
// 0220 extra when cart is empty --- not really proper
/* if(isset($_GET['err']) && $_GET['err']==1){
    echo "<div class='ct'>購物車需要有商品才可以結帳</div>";
}*/

$user = $Mem->find(['acc' => $_SESSION['Mem']]);
?>

<!-- 0217 -->
<h2 class="ct">填寫資料</h2>
<!-- table.all>tr*5>td.tt.ct+td.pp>input:text -->
<table class="all" style="margin-bottom: 0px;">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp"><?= $user['acc']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?= $user['name']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email" value="<?= $user['email']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="address" id="address" value="<?= $user['address']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">連絡電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?= $user['tel']; ?>"></td>
    </tr>
</table>

<table class="all" style="margin-top:0">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    $sum = 0;
    foreach ($_SESSION['cart'] as $id => $qt):
        $item = $Item->find($id);
        $price = $item['price'] * $qt;
        $sum += $price;
    ?>
        <tr class="pp">
            <td class="ct"><?= $item['name']; ?></td>
            <td class="ct"><?= $item['no']; ?></td>
            <td class="ct"><?= $qt; ?></td>
            <td class="ct"><?= $item['price']; ?></td>
            <td class="ct"><?= $price; ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="5" class="tt ct">
            總價：<?= $sum; ?>
        </td>
    </tr>
</table>
<div class="ct">
    <!-- 0220 增加checkout function -->
    <button onclick="checkout()">確定送出</button>
    <button onclick="location.href='?do=buycart'">返回修改訂單</button>
</div>

<!-- 0220 -->
<script>
    function checkout() {
        let data = {
            name: $("#name").val(),
            email: $("#email").val(),
            address: $("#address").val(),
            tel: $("#tel").val(),
            total: <?= $sum; ?>
            // acc 因為已經保存在session裡面了所以不需要再
        }
        $.post("./api/checkout.php", data, function(res) {
            console.log(res);
            
            if (res.trim() === '1') {
                console.log('this is 1');
                
                alert("購物車尚無商品，無須結帳！");
                return;
            }
            alert("訂購成功\n感謝您的選購");
            location.href = "?do=main";
        })
    }
</script>