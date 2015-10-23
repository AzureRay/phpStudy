<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP5内置数组</title>
</head>
<body>
	<?php
	if (isset($_REQUEST['submit'])) {
		$CFQ=$_POST["tag"];     //用来判断用户是否单击了按钮
      if($CFQ==1){            //如果用户单击了计算按钮，则分别取出两个输入文本框中的值
      	$addNum1=$_POST["addNum1"];
      	$addNum2=$_POST["addNum2"];
      }
      else{
       $addNum1=0;
       $addNum2=0;
      }
      $sum=$addNum1+$addNum2;  //对两个数求和
	}     
	?>
    <h3>在下面输入两个数</h3>
	<form action="" method="post" name="form1">
		<input type="hidden" name="tag" size="4" value="1"/>
		<input type="text" name="addNum1" size="4" value="<?php if(isset($_REQUEST['submit'])){echo $addNum1;}?>"/>
		+
		<input type="text" name="addNum2" size="4" value="<?php if(isset($_REQUEST['submit'])){echo $addNum2;}?>"/>
		=
		<?php if(isset($_REQUEST['submit'])){echo $sum;}?><br>  
		<input type="submit" name="submit" value="计算"/>
	</form>
</body>
</html>