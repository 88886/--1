<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>车辆公共信息</title><link rel="stylesheet" href="online_test-web-master/css.css" type="text/css">
</head>
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
<form id="form1" name="form1" method="post" action="ggxxtj1.php">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>生产线编号</td><td><textarea name='bh' cols='50' rows='8' id='bh'></textarea>&nbsp;*</td></tr>
	<tr>
	  <td>生产线类型</td>
	  <td><select name='lx' id='lx' ><?php getoption("gonggongxinxi","scxlx")?></select></td>
    </tr>
	<tr><td>生产线名称</td><td><textarea name='mc' cols='50' rows='8' id='mc'></textarea>&nbsp;*</td></tr>
	<tr><td>生产线班次</td><td><textarea name='scxbc' cols='50' rows='8' id='scxbc'></textarea>&nbsp;*</td></tr>
	<tr><td>生产线线速</td><td><textarea name='scxxs' cols='50' rows='8' id='scxxs'></textarea>&nbsp;*</td></tr>
	<tr><td>运行效率</td><td><textarea name='yxxl' cols='50' rows='8' id='yxxl'></textarea>&nbsp;*</td></tr>
	<tr><td>生产线分组</td><td><textarea name='scxfz' cols='50' rows='8' id='scxfz'></textarea>&nbsp;*</td></tr>
	<tr>
      <td>&nbsp;</td>
      <td>
        <input type="submit" name="Submit" value="添加" onclick="return check();" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>
</body>
</html>

