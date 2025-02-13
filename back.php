<?php include "api/db.php";
// 0213 撈出登入的管理者權限
$user = $Admin->find(['acc'=>$_SESSION['Admin']]);
$pr = unserialize($user['pr']);
?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>┌精品電子商務網站」</title>
	<!-- 0207 改路徑 -->
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<!-- 0207 改路徑 -->
	<script src="./js/js.js"></script>
	<!-- 0207 加JS -->
	<script src="./js/jquery-3.4.1.min.js"></script>
</head>

<body>
	<iframe name="back" style="display:none;"></iframe>
	<div id="main">
		<div id="top">
			<a href="?">
				<!-- 0207 改路徑 -->
				<img src="./icon/0416.jpg">
			</a>
			<!-- 0207 改路徑 -->
			<img src="./icon/0417.jpg">
		</div>
		<div id="left" class="ct">
			<div style="min-height:400px;">
				<!-- 把 =admin&redo 選取 CtrlD把這一排的都刪掉 -->
				<a href='?do=admin'>管理權限設置</a>
				<!-- 0213 admin沒寫要改 其他菜單 根據登入的帳號擁有的權限顯示指定菜單 -->
				 <?php
				echo (in_array(1,$pr))?"<a href='?do=th'>商品分類與管理</a>":"";
				echo (in_array(2,$pr))?"<a href='?do=order'>訂單管理</a>":"";
				echo (in_array(3,$pr))?"<a href='?do=mem'>會員管理</a>":"";
				echo (in_array(4,$pr))?"<a href='?do=bot'>頁尾版權管理</a>":"";
				echo (in_array(5,$pr))?"<a href='?do=news'>最新消息管理</a>":"";
?>
				<a href="./api/logout.php?table=Admin" style="color:#f00;">登出</a>
			</div>
		</div>
		<div id="right">
			<!-- 0207 include file 
			 main->admin 
			 front->back 
			 --> 
			<?php
			$do = $_GET['do'] ?? 'admin';
			$file = "back/" . $do . ".php";
			if (file_exists($file)) {
				include $file;
			} else {
				include "back/admin.php";
			}
			?>
		</div>
		<div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
			頁尾版權 : </div>
	</div>

</body>

</html>