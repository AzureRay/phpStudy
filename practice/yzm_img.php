<?php
   //图片验证码 
   // 该方法必须处于脚本最顶部
   session_start();
   // 验证码图片和对应的验证值的对应关系
   $table = array(
     'pic0' => '博美',
     'pic1' => '仓鼠',
     'pic2' => '萨摩',
     'pic3' => '泰迪',
   	);

   $index = rand(0,3);
    
   $value = $table['pic'.$index];
   // 随机验证码图片对应的验证值
   $_SESSION['authcode'] = $value;
    
   // 验证码图片的地址
   $filename = dirname(_FILE_).'/img/pic'.$index.'.jpg';
   $contents = file_get_contents($filename);
   
   // 一开始图片不显示，显示一堆乱码，加上这句就好了！
   ob_clean();

   header('Content-Type:image/jpeg');
   echo $contents;

?>