<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>九九乘法表</title>
	<style type="text/css">
	h3{
		margin:0 auto;
	}
	</style>
</head>
<body>
    <h3>九九乘法口诀表</h3>
	<?php
	  for($j=1;$j<10;$j++){
	  	for($i=1;$i<=$j;$i++){
	  		$result=$i*$j;
	  		echo $i.'*'.$j.'='.$result.'&nbsp;';
	  	}
	  	echo '<br>';
	  }
    
	?>
</body>
</html>