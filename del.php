//��֤��½��Ϣ
<?php session_start();?>
<?php
error_reporting(0); 
//���ݿ������ļ�
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }   
	   //ѡ�����ݿ�
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
		echo "<script language='javascript'>alert('ɾ���ɹ���');location.href='$comewhere';</script>";
	
//}
?>