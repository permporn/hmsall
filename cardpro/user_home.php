<? 
session_start();
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
<div id="container">
  <? include('menu.php')?>
	 <div id="content">
   <!-- <h1>ใบคำร้อง</h1>-->
    <p>
    <div align="right">
    <form name="form1" action="user_request.php" method="post">
    <label for="type"><strong>+ เพิ่มใบคำร้อง :</strong></label>
       <select name="type" id="type" >
       		<option value="0" disabled="disabled" selected="selected">เลือกประเภทใบคำร้อง</option>
		<? $objQuery_type = mysql_query("SELECT * FROM ptt_type ORDER BY id");
	   while($objResult_type = mysql_fetch_array($objQuery_type)){?>
            <option value="<?=$objResult_type['id']?>"><?=$objResult_type['name_type']?></option><? } ?>
       </select>
       <input class="button" type="submit" name="Submit" value="เพิ่ม" style="width:70px"/>
   </form>
   
   <br /><br />
   <form name="form_s" action="user_home.php" method="get">
   <table width="60%" align="center">
   <tr>
    <td align="left">  
   	   <strong>  ค้นหาวันที่ร้องขอ :</strong>
       <input type="date" name="s_day" id="s_day" value="<?=$_GET["s_day"]?>"/>
       </td>
       <td align="left">  
       <strong>  ค้นหาชื่อผู้ขอ :</strong>
       <input type="text" name="s_name" id="s_name" value="<?=$_GET["s_name"]?>"/>
       </td>
       <td align="left">  
       <strong>  ค้นหาประเภทใบคำร้อง :</strong>
       <select name="s_type" id="s_type" >
       		<option value="" <? if($_GET["s_type"]==""){?>selected="selected"<? }?>>ทุกประเภท</option>
            <? $objQuery_s_type = mysql_query("SELECT * FROM ptt_type ORDER BY id");
			while($objResult_s_type = mysql_fetch_array($objQuery_s_type)){?>
            <option value="<?=$objResult_s_type["id"]?>" <? if($_GET["s_type"]==$objResult_s_type["id"]){?>selected="selected"<? }?>><?=$objResult_s_type["name_type"]?></option>
            <? } ?>
       </select>
       </td>
       <td align="left">  
       <strong>  ค้นหาสถานะ :</strong>
       <select name="s_status" id="s_status" >
       		<option value="" <? if($_GET["s_status"]==""){?>selected="selected"<? }?>>ทุกสถานะ</option>
            <? $objQuery_s_status = mysql_query("SELECT * FROM ptt_status ORDER BY id");
			while($objResult_s_status = mysql_fetch_array($objQuery_s_status)){?>
            <option value="<?=$objResult_s_status["id"]?>" <? if($_GET["s_status"]==$objResult_s_status["id"]){?>selected="selected"<? }?>><?=$objResult_s_status["name"]?></option>
            <? } ?>
       </select></td>
       </tr>
       
       <td align="center" colspan="5">   
       
       <input class="button" type="submit" name="Submit" value="ค้นหา" style="width:70px"/>
       </td>
       <tr>
   </table>
   </form>
   </div>
   </p>
   </div>
   <table width="100%">
  	<tr>
    	<td colspan="2" align="center"><strong>ตารางรายการใบคำร้อง</strong></td>
    </tr>
</table>
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
	  <tr>
      	  <!--<td width="" class="tbl2" style="white-space: nowrap;"><center> ลำดับที่ </center></td>-->
          <td width="" class="tbl2" style="white-space: nowrap;"><center> เลขใบคำร้อง </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> วันที่ร้องขอ </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center>ชื่อผู้ขอ</center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> ประเภทใบคำร้อง </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> สาขา </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> สถานะ </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> แก้ไข </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> ยกเลิก </center></td>
          <!--<td width="" class="tbl2" style="white-space: nowrap;"><center> ราคา </center></td>-->	
      </tr>
        <?php

if($_GET["s_day"]==""){$key_day = "1";}else if($_GET["s_day"]!=""){$key_day = "date_request = '".$_GET["s_day"]."'";}
if($_GET["s_name"]==""){$key_name = "1";}else if($_GET["s_name"]!=""){$key_name = "name LIKE '%".$_GET["s_name"]."%'";}   //non autocompleat
if($_GET["s_type"]==""){$key_type = "1";}else if($_GET["s_type"]!=""){$key_type = "type = ".$_GET["s_type"];}
if($_GET["s_status"]==""){$key_status = "1";}else if($_GET["s_status"]!=""){$key_status = "status = ".$_GET["s_status"];}

$str_reall = "SELECT * FROM ptt_request WHERE $key_day AND $key_name AND $key_type AND $key_status AND branchid = '".$objResultSTT["branchid"]."'";

$objQuery_reall = mysql_query($str_reall);
$Num_Rows = mysql_num_rows($objQuery_reall) /*or die ("Error Query [".$objQuery_reall."]")*/;

$Per_Page = 20;   // Per Page

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

$str_reall .=" ORDER BY id DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($str_reall);
			$i = 0;
		  	$num = 0;
			while($objResult_all = mysql_fetch_array($objQuery)){
				$num++;
			$i++;
			if ($i % 2 == 0){$tblyy = "tblyy2";}else{$tblyy = "tblyy";}
		  ?>
        <tr>
        	<!--<td align="center"  class="<?=$tblyy?>"><?=($Per_Page*($Page-1))+$num?></td>-->
            <td align="center"  class="<?=$tblyy?>"><?=$objResult_all["id"]?></td>
            <td align="center"  class="<?=$tblyy?>"><?=DateThaiDMY($objResult_all["date_request"])?></td>
            <td align="left" class="<?=$tblyy?>"><?=$objResult_all["name"]?></td>
            <td align="left"    class="<?=$tblyy?>">
            <a href="user_request_details.php?id=<?=$objResult_all["id"]?>">
			<?  $objQuery_TName = mysql_query("SELECT name_type FROM ptt_type WHERE id = '".$objResult_all["type"]."'");
				$objResult_Tname = mysql_fetch_array($objQuery_TName);
				echo $objResult_Tname["name_type"];
			?></a></td>
            <?  $objQuery_branch = mysql_query("SELECT * FROM branch WHERE branchid = '".$objResult_all["branchid"]."'");
				$objResult_branch = mysql_fetch_array($objQuery_branch);?>
        	<td align="center"  class="<?=$tblyy?>"><?=$objResult_branch["branchname"]?></td>
			<td align="center"  class="<?=$tblyy?>">
			<?  $objQuery_SName = mysql_query("SELECT name, id FROM ptt_status WHERE id = '".$objResult_all["status"]."'");
				$objResult_Sname = mysql_fetch_array($objQuery_SName);
				if($objResult_Sname["id"] == '1'){?><font color="#DD0000"><?=$objResult_Sname["name"];?></font><? }
				if($objResult_Sname["id"] == '2'){?><font color="#00BB00"><?=$objResult_Sname["name"];?></font><? }
				if($objResult_Sname["id"] == '3'){?><font color="#AAAAAA"><?=$objResult_Sname["name"];?></font><? }
				if($objResult_Sname["id"] == '4'){?><font color="#CCCC00"><?=$objResult_Sname["name"];?></font><? }
				if($objResult_Sname["id"] == '5'){?><font color="#0099FF"><?=$objResult_Sname["name"];?></font><? }
				if($objResult_Sname["id"] == '6'){?><font color="#00BB00"><?=$objResult_Sname["name"];?></font><? }
				//echo $objResult_Sname["name"];
			?></td>
            <td align="center"  class="<?=$tblyy?>">
			<? if($objResult_all["status"]=="1"){?>
            <a href="user_request.php?ac=edit&id=<?=$objResult_all["id"]?>">
            	<img src="images/im_edit.png" width="25" height="25 " class="center"/>
            </a>
			<? }?></td>
            <td align="center"  class="<?=$tblyy?>">
			<? if($objResult_all["status"]=="1"){?>
            <a href="user_request_insert.php?ac=del&id=<?=$objResult_all["id"]?>" onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')">
            	<img src="images/im_del.png" width="20" height="20 " class="center"/>
          	</a>
			<? }?></td>
           <!-- <td align="center"  class="<?=$tblyy?>"><?=number_format($objResult_all["money_balance"])?></td>-->
        </tr>
        <?php }if($num == 0){?>
        <tr>
        	<td colspan="10" class="tblyy"><center><font color="#FF0000">ไม่พบข้อมูล</font></center></td>
        </tr>
        <?php } ?>
    </table>
    
<p>Total <?= $Num_Rows;?> Record :<?=$Num_Pages;?> Page :
<?
$s_day = $_GET["s_day"];
$s_name = $_GET["s_name"];
$s_type = $_GET["s_type"];
$s_status = $_GET["s_status"];
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&s_day=$s_day&s_name=$s_name&s_type=$s_type&s_status=$s_status'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$i&s_day=$s_day&s_name=$s_name&s_type=$s_type&s_status=$s_status'>$i</a> ";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&s_day=$s_day&s_name=$s_name&s_type=$s_type&s_status=$s_status'>Next>></a> ";
}
/*mysql_close($objConnect);*/
?></p>
 
</body>
</html>
<?php mysql_close();?>
