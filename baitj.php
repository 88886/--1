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
$addnew=$_POST["addnew"];
$scxbh=$_GET["scxbh"];
echo $scxbh;
$bcsm=$_POST["bcsm"];
$bcsm1 = strtoupper($bcsm);
$sql="select * from baicheshenma where bcsm='$bcsm1'";
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($addnew=='1'){
ischongfu("select bcsm from baicheshenma where  bcsm='$bcsm1'");

$sql="insert into baicheshenma(bcsm,name) values('$bcsm1','".$_SESSION["username"]."')where scxbh='$scxbh' AND bcsm=�� ��";
	mysql_query($sql);
$sql="insert into czjl(`1` ,`2` ,`3` ,`4` ,`5` ,`6` ,`czfs` ,`name` ) values('$bcsm1','EBD-A','','', '', '', '���','".$_SESSION["username"]."') ";
	mysql_query($sql);
	echo "<script>javascript:alert('��ӳɹ�!');location.href='scxggxx.php';</script>";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
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
	<body>
<p>��Ӱ׳����룺</p>
<script language="javascript">
	function check()
{
	if(document.form1.bcsm.value==""){alert("������");document.form1.timu.focus();return false;}
    
}
	function gow()
	{
		location.href='peixunccccailiao_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value+"&id=<?php echo $_GET["id"]?>";
	}
</script>
 <?php
//islbdq $sql="select * from melieibaoduqubiaoiguo where id=".$_GET["id"];
//islbdq $query=mysql_query($sql);
//islbdq $rowscount=mysql_num_rows($query);
//islbdq if($rowscount>0)
//islbdq {
//islbdq 	lelelelelele
//islbdq }
?>
<form id="form1" name="form1" method="post" action="?baitj.php?scxbh=<?php echo $_GET["scxbh"]?>">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>�׳����룺</td><td><textarea name='bcsm' cols='50' rows='8' id='timu' style='border:solid 1px #000000; color:#666666'></textarea>&nbsp;*</td></tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="���" onClick="return check();"  style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="����" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr>
    <td width="24" bgcolor="#CCFFFF">�����߱��</td>
    <td width="97" bgcolor='#CCFFFF'>�׳�����</td>
		<td width="99" align="center" bgcolor="#CCFFFF">���ʱ��</td>
    <td width="127" align="center" bgcolor="#CCFFFF">����</td>
	</tr>
	<?php 
    $sql="select * from baicheshenma where scxbh='$scxbh'";
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
    <td><?php echo mysql_result($query,$i,bcsm);?></td>
    <td width="99" align="center"><?php echo mysql_result($query,$i,"addtime");?></td>
    <td width="120" align="center"><a href="del.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>&amp;tablename=baicheshenma" onClick="return confirm('���Ҫɾ����')">ɾ��</a>
		<br>
<p>&nbsp;</p>
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
  <input type="button" name="Submit2" onClick="javascript:window.print();" value="��ӡ��ҳ" />
</p>
<p align="center"><a href="baitj.php?pagecurrent=1">��ҳ</a>, <a href="baitj.php?pagecurrent=<?php echo $pagecurrent-1;?>">ǰһҳ</a> ,<a href="baitj.php?pagecurrent=<?php echo $pagecurrent+1;?>">��һҳ</a>, <a href="baitj.php?pagecurrent=<?php echo $pagecount;?>">ĩҳ</a>, ��ǰ��<?php echo $pagecurrent;?>ҳ,��<?php echo $pagecount;?>ҳ </p>

<p>&nbsp; </p>

</body>
</html>
<?php
	function ischongfu($sql)
	{
		$query=mysql_query($sql);
 		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			echo "<script>javascript:alert('�Բ��𣬸ð׳������Ѿ�����!');history.back();</script>";
			exit;
		}
		
	}
?>