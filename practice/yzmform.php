<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图形验证码的实现</title>
	<style type="text/css">
	img{
		border:1px solid black;
		width: 100px;
		height:30px;
	}
	</style>
	<script type="text/javascript">
	// 用JS修改验证码图片地址就能实现更换验证码
	function change(){
		document.getElementById('captcha_img').src='yzm.php?r='+Math.random();
	}
	</script>
</head>
<body>
<form action="" method="post">
  <label>验证码图片：</label>
  <img id="captcha_img" src="yzm.php?r=<?php echo rand();?>">
  <a href="javascript:void(0)" onclick="change()">看不清</a>
  <label for="correctcode">请输入验证码：</label>
  <input type="text" name="correctcode"/><br>

  <input type="submit" value="提交">
  </form>
  <?php
    if(isset($_REQUEST['correctcode'])){
    	session_start();
    	// strtolower()函数将用户输入的验证码转换为小写的
    	if($_SESSION['authcode'] == strtolower($_POST['correctcode'])){
    		echo "验证码正确";
    	}else{
    		echo "验证码错误";
    	}
    	exit();
    }
  ?>
</body>
</html>
