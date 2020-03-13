<html>
<head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]--></head>
    
    <body>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>正在导入</legend>
</fieldset>
<?php
require_once "./lib/PHPExcel.php";
require_once "./lib/PHPExcel/IOFactory.php";
require_once "./lib/PHPExcel/Reader/Excel5.php";
$error=0;
$pass=0;
include('connect.php');//链接数据库
session_start();
if ($_FILES["file"]["error"] > 0)
	{
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
        echo "<script>window.history.go(-1)</script>";
    }
    
    $filename=$_FILES["file"]["tmp_name"];
    $objReader = PHPExcel_IOFactory::createReader("Excel5");//use excel2007 for 2007 format 
    $objPHPExcel = $objReader->load($filename); //$filename可以是上传的文件，或者是指定的文件
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); // 取得总行数 
    $highestColumn = $sheet->getHighestColumn(); // 取得总列数
//循环读取excel文件,读取一条,插入一条
$sn= $objPHPExcel->getActiveSheet()->getCell("B2")->getValue();
$year= $objPHPExcel->getActiveSheet()->getCell("E2")->getValue();
$percent=0;
for($j=4;$j<=$highestRow;$j++)
{
$type = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取车型列的值
$material = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取物料号列的值
$specie=substr($material,0,4);
$motor=substr($material,4,2);
$gear=substr($material,6,1);
$color=substr($material,7,2);
$quantity = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();//获取数量列的值
$especial = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();//获取特殊要求列的值
$company = $objPHPExcel->getActiveSheet()->getCell("E".$j)->getValue();//获取订货单位列的值
$batch= $objPHPExcel->getActiveSheet()->getCell("F".$j)->getValue();//获取批次列的值
$time= $objPHPExcel->getActiveSheet()->getCell("G".$j)->getFormattedValue();//获取入库时间列的值
$remark = $objPHPExcel->getActiveSheet()->getCell("H".$j)->getValue();//获取备注列的值
$id="0".$year.$batch;
$percent=($j/$highestRow)*100;
echo"<script>   layui.use('element', function(){
    var $ = layui.jquery
    ,element = layui.element;
    element.progress('bar', $percent+'%');
     }</script>";
if($type!=''){
    
    $check_sql="select * from order_vehicle where id='$id'";
    $result = mysql_query($check_sql);//执行sql 
    $rows=mysql_num_rows($result);//返回一个数值
    if(!$rows)
    {//0 false 1 true
        $sql = "INSERT INTO order_vehicle VALUES ('$year','$id', '$time', '$type','$color', '$sn', '$quantity','$specie','$gear','$motor','$company','$batch','$especial','$remark')";
        mysql_query($sql);
        $pass++;
    }else{
       $error++;
        }
    }
}
    $user=$_SESSION['username'];
 date_default_timezone_set('PRC');
$now_time= time();
$time_act= date('Y-m-d H:i:s',$now_time);
$action="导入了".$pass."条订单车信息";
$sql = "INSERT INTO  log VALUES ('$user',  '$time_act',  '$action')";
$result = mysql_query($sql);//执行sql
$msg="导入".$pass."条，".$error."条重复";
?>
<div class="layui-progress" lay-showpercent="true">
  <div class="layui-progress-bar" lay-percent="100%" lay-filter="bar"></div>
</div>

<script>
      layui.use(['form', 'layer','jquery'],
              function() {
                  $ = layui.jquery;
                  var form = layui.form,
                  layer = layui.layer;
                      layer.render();
                      return false;
              });
</script>
    <?php
    echo" <script>layui.use(['form', 'layer','jquery'],
    function() {
        $ = layui.jquery;
        var form = layui.form,
        layer = layui.layer;
            layer.alert('$msg',
            function() {
                //关闭当前frame
                xadmin.close();
    
                // 可以对父窗口进行刷新 
                xadmin.father_reload();
            });
            return false;
    
    });</script>";
    ?>
    </body>
</html>