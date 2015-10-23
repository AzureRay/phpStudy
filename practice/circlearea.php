<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>第一个PHP程序</title>
  </head>
  <body>
    <?php
       define("PI",3.14);
       function area($r){
        $areaa=$r*$r*PI;
        return $areaa;
       }
        //如果不判断isset($_REQUEST['radius']的话，就会先报错，因为在用户没输入时，这里的radius的值为undefined
       if(isset($_REQUEST['radius'])){
         $r=$_POST["radius"];            
       echo "你输入的圆的半径为：".$r."<br/>该圆的面积为：".area($r);  
       }
    ?>
    
    <form action="" method="post">
    <label for="radius"><h3>圆的半径：</h3></label>
      <input type="text" name="radius" id="radius"/>
      <input type="submit" id="submit"/>
      <input type="reset"/>
    </form>
  </body>
</html>