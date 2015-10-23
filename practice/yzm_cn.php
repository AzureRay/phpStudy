<?php
   // 该方法必须处于脚本最顶部
   session_start();

  // 新建一个真彩色图像,宽为200，高为60
  $image = imagecreatetruecolor(200,60);
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
   
   // 保存字体文件路径
  // 选用TTF的文件需要支持中文
   $fontface = 'fonts/FZYTK.TTF';
   // 定义一个简单的汉字数据库
   $str = "金木水火土甲乙丙丁午己庚辛壬中国人名共和国";

   // str_split 将字符串转换为数组
   // 一个中文汉字在utf-8里，每三个字符代表一个汉字
   $strdb = str_split($str,3);
   $captch_code="";
   for($i=0;$i<4;$i++){
      $fontcolor = imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
       // 随机取出每个汉字
      // count()后面要减去1，因为数组下标是从0开始。否则有的验证码图片不会正常显示
      $index = rand(0,count($strdb)-1);
       $cn = $strdb[$index];
       $captch_code.=$cn;    
       imagettftext($image, mt_rand(20,24), mt_rand(-60,60), (40*$i+20), mt_rand(30,35),$fontcolor, $fontface, $cn);

   }

   // 通过SESSION保存验证码
    $_SESSION['authcode'] = $captch_code;

    //增加干扰点
    for($i=0;$i<200;$i++){
    	$pointcolor = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
    	imagesetpixel($image, rand(1,199), rand(1,59), $pointcolor);
    }

    //增加干扰线
    for($i=0;$i<3;$i++){
    	$linecolor = imagecolorallocate($image, rand(80,220), rand(80,220), rand(80,220));
    	imageline($image, rand(1,199), rand(1,59), rand(1,199), rand(1,59), $linecolor);
    }

    //表明输出内容的格式为PNG图片
	  header('content-type:image/png');  
	//以 PNG 格式将图像输出到浏览器或文件 
	  imagepng($image);

	  imagedestroy($image);
?>