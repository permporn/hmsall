<? 
ob_start();
session_start();
include("config.inc.php");
include("funtion.php");
include("ck_session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
</head>
<body>
<!-- START PAGE SOURCE -->
<script language="JavaScript">
 
function ChkSubmit(result){
	if(document.getElementById("even").value == "")
		{
			alert('กรุณาใส่ข่าวสารที่ต้องการแจ้ง');
			return false;
		}
}
</script>

<div id="container">
  <? include('menu.php')?>
  <div id="content">
  <h1>แจ้งข่าวสาร</h1>
  <form action="saveeven.php" name="frmMain" method="post" onSubmit="return ChkSubmit();">
  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
	<tr>
	<td width="" class="tbl2" style="white-space: nowrap;" align="center"> กรอกข้อความ :</td>
    <td width="" class="tblyy" style="white-space: nowrap;" align="">
    <textarea name="even" cols="55" rows="8" class="" id="even"></textarea>
    </td>
    </tr>
    <tr>
    <td width="" class="tbl2" style="white-space: nowrap;" align=""></td>
    <td width="" class="tblyy" style="white-space: nowrap;" align="">
    <input name="idstaff" type="hidden" class="" id="idstaff" value="<?=$objResultSTT["accid"]?>" />
    <input name="Save" type="submit" class="" id="Save" value="Save" />
    <input name="reset" type="reset" class="" id="reset" value="Reset" />
    </td>
    </tr>
  </table>
  </form>
  </br>
<?
$i=1;
$strSQL = "SELECT * 
FROM even e
INNER JOIN account a 
ON e.idstaff = a.accid";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);
$Per_Page = 15;   // Per Page

	$Page = $_GET["Page"];
	if(!$_GET["Page"])
	{
		$Page=1;
	}

	$Prev_Page = $Page-1;
	$Next_Page = $Page+1;

	$Page_Start = (($Per_Page*$Page)-$Per_Page);
	if($Num_Rows<=$Per_Page)
	{
		$Num_Pages =1;
	}
	else if(($Num_Rows % $Per_Page)==0)
	{
		$Num_Pages =($Num_Rows/$Per_Page) ;
	}
	else
	{
		$Num_Pages =($Num_Rows/$Per_Page)+1;
		$Num_Pages = (int)$Num_Pages;
	}
	$strSQL .=" order  by evenid DESC LIMIT $Page_Start , $Per_Page";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
	  <tr>
		<td width="" class="tbl2" style="white-space: nowrap;" align="center"> วันที่</th>
		<td width="" class="tbl2" style="white-space: nowrap;" align="center"> ข่าว</th>
        <td width="" class="tbl2" style="white-space: nowrap;" align="center"> ผู้แจ้ง</th>
        <? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
        <td width="" class="tbl2" style="white-space: nowrap;" align="center"> ลบ</th>
        <? }?>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
		$num++;
		if($num % 2 == 0){$tblyy = "tblyy2";}
		else{$tblyy = "tblyy";}
	?>
	  <tr>
		<td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=DateThai($objResult["date"]);?></td>
        <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["even"];?></td>
        <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
        <?=$objResult["name"];?>
        </td>
        <? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
        <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
        <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='saveeven.php?evenid=<?=$objResult["evenid"];?>&type=del';}"><img src="images/delete-2.png"></a>
        </td>
        <? } ?>
	  </tr>
	
	
    <?
	$i++;
	}
	?>
    </table>
    <div align="right"><p>
    Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
	<?
	if($Prev_Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&txtKeyword=$_GET[h_arti_id]'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
		if($i != $Page)
		{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&txtKeyword=$_GET[h_arti_id]'>$i</a> ]";
		}
		else
		{
			echo "<b> $i </b>";
		}
	}
	if($Page!=$Num_Pages)
	{
		echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&txtKeyword=$_GET[h_arti_id]'>Next>></a> ";
	}
	?>
    </p></div>
  </div>
</html>
<?php mysql_close();?>