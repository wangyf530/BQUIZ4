<!-- 0217 -->
<h2 class="ct">填寫資料</h2>
<!-- table.all>tr*5>td.tt.ct+td.pp>input:text -->
<table class="all" style="margin-bottom: 0px;">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp"><?=$_SESSION['Mem'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="" id=""></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="" id=""></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="" id=""></td>
    </tr>
    <tr>
        <td class="tt ct">連絡電話</td>
        <td class="pp"><input type="text" name="" id="  "></td>
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
    $total=0;
    foreach($_SESSION['cart'] as $id => $qt):
        $item = $Item->find($id);
        $price = $item['price']*$qt;
        $total += $price;
    ?>
    <tr class="pp">
        <td><?=$item['name'];?></td>
        <td><?=$item['no'];?></td>
        <td><?=$qt;?></td>
        <td><?=$item['price'];?></td>
        <td><?=$price;?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="5" class="tt ct">
            總價：<?=$total;?>
        </td>
    </tr>
</table>
<div class="ct">
    <button>確定送出</button>
    <button onclick="location.href='?do=buycart'">返回修改訂單</button>
</div>