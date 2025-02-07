<!-- 0207 -->

<marquee behavior="" direction="">
    年終特賣會開跑了
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    情人節特惠活動
</marquee>
<h2 class="ct">最新消息</h2>

<div class="ct" style="color:red;">*點擊標題觀看詳細資訊</div>
<!-- 
最新消息1
標題
年終特賣會開跑了
內容
即日期至年底，凡會員購物滿仟送佰，買越多送越多~

最新消息2
標題
情人節特惠活動
內容
為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~ -->

<!-- table.all>(tr.tt>td.ct)+(tr.pp>td)*2 -->
<table class="all news">
    <tr class="tt">
        <td class="ct">標題</td>
    </tr>
    <tr class="pp">
        <td>
            <a href="#" data-table="news1" class="title">
                年終特賣會開跑了
            </a>
        </td>
    </tr>
    <tr class="pp">
        <td>
            <a href="#" data-table="news2" class="title">
                情人節特惠活動
            </a>
        </td>
    </tr>
</table>


<!-- 可以不寫 -->

<!-- table.all>tr*2>td.tt.ct+td.pp -->
 <!-- 第一則消息 -->
<table class="all news" id="news1" style="display: none">
    <tr>
        <td class="tt ct">標題</td>
        <td class="pp">年終特賣會開跑了</td>
    </tr>
    <tr>
        <td class="tt ct">內容</td>
        <td class="pp">即日期至年底，凡會員購物滿仟送佰，買越多送越多~</td>
    </tr>
    <tr>

        <td colspan='2' style="text-align:center;">
            <button><a href="?do=news">返回</a>
            </button>
        </td>
    </tr>
</table>


<!-- table.all>tr*2>td.tt.ct+td.pp -->
 <!-- 第二則消息 -->
<table class="all news" id="news2" style="display: none">
    <tr>
        <td class="tt ct">標題</td>
        <td class="pp">情人節特惠活動</td>
    </tr>
    <tr>
        <td class="tt ct">內容</td>
        <td class="pp">為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</td>
    </tr>
    <tr>

        <td colspan='2' style="text-align:center;">
            <button><a href="?do=news">返回</a>
            </button>
        </td>
    </tr>
</table>

<!-- 點擊顯示消息內容 -->
<script>
    $(".title").on("click", function() {
        let table = $(this).data("table");
        // 隱藏
        $(".news").hide();
        // 特定框顯示出來
        $(`#${table}`).show();
    })
</script>