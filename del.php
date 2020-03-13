//验证登陆信息
<?php session_start();?>
<?php
error_reporting(0); 
//数据库链接文件
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }   
	   //选择数据库
	   $db_selected=mysql_select_db("vehicle",$con); 
	   if (!$db_selected)

  {

  die ("Can\'t use class_db : " . mysql_error());

  }
mysql_query("set names 'gb2312'");
	?>
<?php
//if($_POST['submit']){
	$id=$_GET["id"];
	$tablename=$_GET['tablename'];
	echo $id;
	//$userpass=md5($userpass);
	//echo $sql;
$sql="delete from $tablename where id=$id";
mysql_query($sql);
		$comewhere=$_SERVER['HTTP_REFERER'];
		echo "<script language='javascript'>alert('删除成功！');location.href='$comewhere';</script>";
	
//}
?>