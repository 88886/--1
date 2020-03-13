<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>车辆公共信息</title><link rel="stylesheet" href="online_test-web-master/css.css" type="text/css">
</head>

<body>
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
	?>
<p>已有车辆信息列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索:生产线编号:
  <input name="bh" type="text" id="bh" />
  <input type="submit" name="Submit" value="查找" />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="24" bgcolor="#CCFFFF">生产线编号</td>
    <td width="97" bgcolor='#CCFFFF'>生产线类型</td>
    <td width="146" bgcolor='#CCFFFF'>生产线名称</td>
    <td width="97" bgcolor='#CCFFFF'>生产线班次</td>
    <td width="133" bgcolor='#CCFFFF'>线速</td>
	 <td width="118"  bgcolor='#CCFFFF'>运行效率</td>
    <td width="173" bgcolor='#CCFFFF'>生产线分组</td>
	<td width="99" align="center" bgcolor="#CCFFFF">添加时间</td>
    <td width="127" align="center" bgcolor="#CCFFFF">操作</td>
  </tr>
  <?php 
    $sql="select * from gonggongxinxi where 1=1";
  if ($_POST["bh"]!="")
{
  	$nreqbh=$_POST["bh"];
  	$sql=$sql." and scxbh like '%$nreqbh%'";
}
  $sql=$sql." order by id desc";
  
$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=10;//每页行数；
  $pagecurrent=$_GET["pagecurrent"];
  if($rowscount%$pagelarge==0)
  {
		$pagecount=$rowscount/$pagelarge;
  }
  else
  {
   		$pagecount=intval($rowscount/$pagelarge)+1;
  }
  if($pagecurrent=="" || $pagecurrent<=0)
{
	$pagecurrent=1;
}
 
if($pagecurrent>$pagecount)
{
	$pagecurrent=$pagecount;
}
		$ddddd=$pagecurrent*$pagelarge;
	if($pagecurrent==$pagecount)
	{
		if($rowscount%$pagelarge==0)
		{
		$ddddd=$pagecurrent*$pagelarge;
		}
		else
		{
		$ddddd=$pagecurrent*$pagelarge-$pagelarge+$rowscount%$pagelarge;
		}
	}

	for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$ddddd;$i++)
{
  ?>
  <tr>
    <td><?php echo mysql_result($query,$i,scxbh);?></td>
    <td><?php echo mysql_result($query,$i,scxlx);?></td>
    <td><?php echo mysql_result($query,$i,scxmc);?></td>
    <td><?php echo mysql_result($query,$i,bc);?></td>
	 <td><?php echo mysql_result($query,$i,xs);?></td>
    <td><?php echo mysql_result($query,$i,scxl);?></td>
	<td><?php echo mysql_result($query,$i,scxfz);?></td>
    <td width="99" align="center"><?php echo mysql_result($query,$i,"addtime");?></td>
    <td width="120" align="center"><a href="del.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>&amp;tablename=gonggongxinxi" onclick="return confirm('真的要删除？')">删除</a>
		<br>
		<a href="baitj.php?scxbh=<?php
		echo mysql_result($query,$i,"scxbh");
	?>">查看、添加白车身码</a>
	</td>
  </tr>
  	<?php
	}
}
?>
</table>
<p>以上数据共<?php
		echo $rowscount;
	?>条,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" />
</p>
<p align="center"><a href="scxggxx.php?pagecurrent=1">首页</a>, <a href="scxggxx.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="scxggxx.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="scxggxx.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>

</body>
</html>