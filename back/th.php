<!-- 0213 -->
<h2 class="ct">商品分類</h2>
<div class="ct">新增大分類
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="selbig" id="selbig"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>
<!-- table.all>(tr>td.tt+td.tt.ct>button*2)+(tr.ct>td.pp+td.pp>button*2)*2 -->
<table class="all">
    <tr>
        <td class="tt" width="70%">流行皮件</td>
        <td class="tt ct">
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr>
    <tr class="ct">
        <td class="pp">女用皮件</td>
        <td class="pp">
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr>
    <tr class="ct">
        <td class="pp">男用皮件</td>
        <td class="pp">
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr>
</table>

<script>
    getBigs();

    function addType(type) {
        let name, big_id;
        switch (type) {
            case 'big':
                name = $("#big").val();
                big_id = 0;
                break;

            case 'mid':
                name = $("#mid").val();
                big_id = $("#selbig").val();
                break;
        }
        $.post("./api/save_types.php", {name,big_id}, function() {
            // ???
            // location.reload();
            // 獲取大分類
            if (type == 'big') {
                getBigs();
                $("#big").val("");
            } else {
                $("#mid").val("");
            }
        })
    }

    function getBigs() {
        $.get("./api/get_bigs.php", function(bigs) {
            $("#selbig").html(bigs);
        })
    }
</script>



<h2 class="ct">商品管理</h2>
<div class="ct">
    <button>新增商品</button>
</div>
<div class="ct">
    <select name="prod" id="prod">
        <option value="all">全部商品</option>
    </select>
</div>
<!-- table.all>tr.tt*2>td.ct*5 -->
<table class="all">
    <tr class="tt">
        <td class="ct">編號</td>
        <td class="ct">商品名稱</td>
        <td class="ct">庫存量</td>
        <td class="ct">狀態</td>
        <td class="ct">操作</td>
    </tr>
    <tr class="">
        <td class="ct"></td>
        <td class="ct"></td>
        <td class="ct"></td>
        <td class="ct"></td>
        <td class="ct"></td>
    </tr>
</table>