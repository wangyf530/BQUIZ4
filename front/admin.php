<h2 class="ct">管理者登入</h2>
<!-- php-> serialize([1,2,3,4,5]) -->
<!-- table.all>tr*3>td.tt.ct+td.pp>input:text -->
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp">
            <input type="password" name="pw" id="pw">
        </td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <?php
            $intA = rand(1,99);
            $intB = rand(2,99);
            $_SESSION['ans'] = $intA + $intB;
            echo "$intA + $intB = ";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login()">確認</button>
</div>

<script>
    function login(){
        let ans = $("#ans").val();
        $.get("./api/chk_ans.php",{ans},function(res){
            // console.log('res',res);
            if(parseInt(res)){
                $.post("api/chk_pw.php",{
                    acc:$("#acc").val(),
                    pw:$("#pw").val(),
                    table:'Admin'
                }, function(res){
                    console.log(res);
                    
                    if(parseInt(res)){
                        // correct
                        location.href="back.php";
                    } else {
                        alert("帳號或密碼錯誤!請重新輸入!");
                    }
                })
                // alert("正確");
            } else {
                alert("驗證碼錯誤，請重新輸入!");
            }
        })
    }
</script>