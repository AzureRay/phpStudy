<?php
   // 该方法必须处于脚本最顶部
   session_start();

  // 新建一个真彩色图像,宽为100，高为30
  $image = imagecreatetruecolor(100,30);
  //将背景设为白色
  $bgcolor = imagecolorallocate($image,255,255,255);       
  imagefill($image,0,0,$bgcolor);
   
   //画出随机数字验证码
  // for($i=0;$i<4;$i++){
  // 	// 字体大小
  // 	$fontsize = 6;
  // 	// 字体颜色,设置成较深的颜色
  // 	$fontcolor = imagecolorallocate($image, rand(0,120),rand(0,120),rand(0,120));
  // 	// 随机数字0-9
  // 	$fontcontent = rand(0,9);
  // 	// 验证码数字的位置
  // 	$x = ($i*100/4)+rand(5,10);
  // 	$y = rand(5,10);
  // 	// 水平地画一行字符串
  // 	imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
  // }
   
   $captch_code="";
  // 开始画字母加数字的验证码
  for($i=0;$i<4;$i++){
  	$fontsize=5;
  	$fontcolor=imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
  	$data='abcdefghijkmnopqrstuvwxy3456789';
  	// 随机截取目标字符串中的长度为1的子串
  	$fontcontent=substr($data,rand(0,strlen($data)),1);
    // 通过captch_code变量保存验证码
  	$captch_code.=$fontcontent;

  	$x = ($i*100/4)+rand(5,10);
  	$y = rand(5,10);
  	// 水平地画一行字符串
  	imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
  }
   // 结束画字母加数字的验证码
   // 通过SESSION保存验证码
    $_SESSION['authcode'] = $captch_code;

    //增加干扰点
    for($i=0;$i<200;$i++){
    	$pointcolor = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
    	imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);
    }

    //增加干扰线
    for($i=0;$i<3;$i++){
    	$linecolor = imagecolorallocate($image, rand(80,220), rand(80,220), rand(80,220));
    	imageline($image, rand(1,99), rand(1,39), rand(1,99), rand(1,39), $linecolor);
    }

    //表明输出内容的格式为PNG图片
	  header('content-type:image/png');  
	//以 PNG 格式将图像输出到浏览器或文件 
	  imagepng($image);

	  imagedestroy($image);
?>