<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>����������Ϣ</title><link rel="stylesheet" href="online_test-web-master/css.css" type="text/css">
</head>

<body>
<?php
session_start();
?>
	<font color="black">��ǰ�û���<?php echo $_SESSION["username"]?> </font>
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
<p>���г�����Ϣ�б�</p>
<form id="form1" name="form1" method="post" action="">
  ����:�����߱��:
  <input name="bh" type="text" id="bh" />
  <input type="submit" name="Submit" value="����" />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="24" bgcolor="#CCFFFF">�����߱��</td>
    <td width="97" bgcolor='#CCFFFF'>����������</td>
    <td width="146" bgcolor='#CCFFFF'>����������</td>
    <td width="97" bgcolor='#CCFFFF'>�����߰��</td>
    <td width="133" bgcolor='#CCFFFF'>����</td>
	 <td width="118"  bgcolor='#CCFFFF'>����Ч��</td>
    <td width="173" bgcolor='#CCFFFF'>�����߷���</td>
	<td width="99" align="center" bgcolor="#CCFFFF">���ʱ��</td>
    <td width="127" align="center" bgcolor="#CCFFFF">����</td>
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
  $pagelarge=10;//ÿҳ������
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
	?>&amp;tablename=gonggongxinxi" onclick="return confirm('���Ҫɾ����')">ɾ��</a>
		<br>
		<a href="baitj.php?scxbh=<?php
		echo mysql_result($query,$i,"scxbh");
	?>">�鿴����Ӱ׳�����</a>
	</td>
  </tr>
  	<?php
	}
}
?>
</table>
<p>�������ݹ�<?php
		echo $rowscount;
	?>��,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="��ӡ��ҳ" />
</p>
<p align="center"><a href="scxggxx.php?pagecurrent=1">��ҳ</a>, <a href="scxggxx.php?pagecurrent=<?php echo $pagecurrent-1;?>">ǰһҳ</a> ,<a href="scxggxx.php?pagecurrent=<?php echo $pagecurrent+1;?>">��һҳ</a>, <a href="scxggxx.php?pagecurrent=<?php echo $pagecount;?>">ĩҳ</a>, ��ǰ��<?php echo $pagecurrent;?>ҳ,��<?php echo $pagecount;?>ҳ </p>

<p>&nbsp; </p>

</body>
</html>