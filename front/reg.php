<!-- 0207 -->

<h2 class="ct">會員註冊</h2>

<!-- table.all>tr*5>td.tt.ct+td.pp>input:text -->
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
            <button onclick='chkAcc()'>檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="address" id="address"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">註冊</button>
    <button type="reset">重置</button>
</div>

<script>
    function chkAcc() {
        let acc = $("#acc").val();
        if (acc == 'admin') {
            alert("不可使用");
        } else {
            $.get("api/chk_acc.php",{acc},function(res){
                console.log('res', res);
                if (parseInt(res) >= 1) {
                    alert("帳號已被使用!");
                } else {
                    alert("帳號可以使用!");

                }
            })
        }
    }

    function reg(){
        let data ={
            name:$("#name").val(),
            acc:$("#acc").val(),
            pw:$("#pw").val(),
            tel:$("#tel").val(),
            address:$("#address").val(),
            email:$("#email").val()
        }

        if (data.acc == 'admin') {
            alert("不可使用");
        } else {
            $.get("api/chk_acc.php", {acc:data.acc}, function(res) {
                if (parseInt(res) >= 1) {
                    alert("帳號已被使用!");
                } else {
                    $.post("api/reg.php",data,function(res){
                        // console.log('res',res);
                        alert("註冊成功!歡迎加入");
                        location.reload();
                    })
                }
            })
        }
    }
</script>