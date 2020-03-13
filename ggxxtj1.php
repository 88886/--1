<?php
session_start();
?>
	<font color="black">当前用户：<?php echo $_SESSION["username"]?> </font>
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
function getoption($ntable,$nzd)
{
		$sql="select ".$nzd." from ".$ntable." order by id desc";
		$query=mysql_query($sql);
		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			for ($fi=0;$fi<$rowscount;$fi++)
			{
				?>
				<option value="<?php echo mysql_result($query,$fi,0);?>"><?php echo mysql_result($query,$fi,0);?></option>
				<?php
			}
		}
}
?>
<?php 
$id=$_GET["id"];
$bh=$_POST["bh"];
$lx=$_POST["lx"];
$mc=$_POST["mc"];
$scxbc=$_POST["scxbc"];
$scxxs=$_POST["scxxs"];
$yxxl=$_POST["yxxl"];
$scxfz=$_POST["scxfz"];
$bh1 = strtoupper($bh);
$mc1 = strtoupper($mc);
$sql="select * from gonggongxinxi where scxbh='$bh1'";
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($yxxl>1||$yxxl<0)
{
	echo "<script>javascript:alert('运行效率只能大于0小于1！');location.href='ggxxtj.php';</script>";
}
else if($rowscount>0)
{
	echo "<script>javascript:alert('生产线编号不唯一！');location.href='ggxxtj.php';</script>";
}
else
{
$sql="insert into gonggongxinxi(scxbh,scxlx,scxmc,bc,scxl,xs,scxfz,name) values('$bh1','$lx','$mc1','$scxbc','$yxxl','$scxxs','$scxfz','".$_SESSION["username"]."') ";
	mysql_query($sql);
	$sql="insert into czjl(`1` ,`2` ,`3` ,`4` ,`5` ,`6` ,`czfs` ,`name` ) values('$bh1','$lx','$mc1','$scxbc','$yxxl','$scxxs','添加','".$_SESSION["username"]."') ";
	mysql_query($sql);
	$sql="INSERT INTO `vehicle`.`baicheshenma` (`bcsm`, `scxbh`, `id`, `addtime`, `name`) VALUES ('', '$bh1', NULL, CURRENT_TIMESTAMP, ''); ";
	mysql_query($sql);
	echo "<script>javascript:alert('添加成功!');location.href='scxggxx.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>添加</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>
<script language="javascript">
	
	
	function OpenScript(url,width,height)
{
  var win = window.open(url,"SelectToSort",'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes' );
}
	function OpenDialog(sURL, iWidth, iHeight)
{
   var oDialog = window.open(sURL, "_EditorDialog", "width=" + iWidth.toString() + ",height=" + iHeight.toString() + ",resizable=no,left=0,top=0,scrollbars=no,status=no,titlebar=no,toolbar=no,menubar=no,location=no");
   oDialog.focus();
}
</script>