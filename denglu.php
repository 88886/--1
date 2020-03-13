<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<?php
//验证登陆信息<br>
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
				<session value="<?php echo mysql_result($query,$fi,0);?>"><?php echo mysql_result($query,$fi,0);?></session>
				<?php
			}
		}
}
?>
	<?php
	session_start();
$username=$_POST['username'];
$pwd=$_POST['pwd'];
if ($username!="" && $pwd!="")
{
	$sql="select * from caozuo where ID='$username' and mima='$pwd'";
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
			{
	$_SESSION['username']=$username;      
	echo "<script language='javascript'>alert('登陆成功！');location='tkuangjia.html';</script>";
            }
			else
			{
					echo "<script language='javascript'>alert('用户名或密码错误！');history.back();</script>";
			}
	}
		else
		{
				echo "<script language='javascript'>alert('请输入完整！');history.back();</script>";
		}
	
?>

	</html>