<? 
session_start();
include("funtion.php");
include("ck_session_self.php");
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
    <h1>จัดการ วิชาเรียน SELF </h1>
    <p>
    <div align="right">
    <!--<form action="searchstudent.php" method="get" id="search-form">
        <label >ค้นหารายชื่อ:</label>
        <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  		<input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
        <a href="#" onClick="document.getElementById('search-form').submit()">ค้นหา</a>
    </form>-->
    </div>
    </p>
<p>

<?
include("config.incself.php");
       
//*** Update Condition ***//
if($_POST["hdnCmd"] == "Update")
{
	$h_arti_id = $_POST["h_arti_id"];
	$creditid = $_POST["creditid"];
	$sumpoint = $_POST["finaltest"]+$_POST["collectionpoints"];
	$strSQL = "UPDATE credit SET ";
	$strSQL .="finaltest = '".$_POST["finaltest"]."' ";
	$strSQL .=",collectionpoints = '".$_POST["collectionpoints"]."' ";
	$strSQL .=",sumpoint = $sumpoint ";
	$strSQL .=",statuspoint = 1 ";
	$strSQL .="WHERE creditid = $creditid ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Update [".mysql_error()."]";
	}
}

if($objResultSTT["status"] == "adminexam" or $objResultSTT["status"] == "admin"){ ?>

<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>?subid=<?=$_GET["subid"];?>">
<? 	
	if($_GET["subid"] != ''){
	$strSQL = "SELECT * FROM credit 
				JOIN account ON credit.accid = account.accid 
				JOIN student ON account.studentid = student.studentid	
				WHERE subid = '".$_GET["subid"]."'";
	$strSQL .=" ORDER BY  `credit`.`creditid` ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	/*echo "33";*/
	$objResult = mysql_fetch_array($objQuery);
	}
	
	
	?>
    
    
    <input type="hidden" name="hdnCmd" value="">
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
    <? if($objResultSTT["status"] == "adminexam" or $objResultSTT["status"] == "admin"){ $a=8;}else{$a=6;}?>
	<? 
	if($_GET["idaddterm"] != ''){
	$objResult = mysql_fetch_array($objQuery);
	$strSQL3 = "SELECT * 
				FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
				INNER JOIN year ON addtrem.idyear = year.idyear
				WHERE addtrem.idaddterm = '".$_GET["idaddterm"]."'";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	$objResult3 = mysql_fetch_array($objQuery3);
	
	?>
    <tr><td style="white-space:nowrap;" class="tbl2" colspan="<?=$a?>"> <center>[<?=$objResult3["nameyear"]; ?>]<?=$objResult3["nameterm"];?></center></td> </tr>
    <? } 
	else { ?>
    <tr><td style="white-space:nowrap;" class="tbl2" colspan="<?=$a?>"> <center> ทั้งหมด</center></td> </tr>
    <? } ?>
    <tr>
          <td width="7%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>ลำดับ</strong></div></td>
          <td width="28%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong> ชื่อ- นามสกุล</strong></div></td>
          <td width="16%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>รหัสวิชา</strong></div></td>
          <td width="14%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>คะแนนเก็บ</strong></div></td>
          <td width="13%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>คะแนนสอบ</strong></div></td>
          <td width="12%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>รวม</strong></div></td>
          <th width="10%" class="tblyy3" style="white-space: nowrap;"> แก้ไข </th>
          <th width="10%" class="tblyy3" style="white-space: nowrap;"> ยกเลิก </th>
         
  	 </tr>
   	<? 
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{ 
		$i++;
		$strSQL2 = "SELECT * FROM subject WHERE subid = '".$objResult["subid"]."'";
		$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");
		$objResult2 = mysql_fetch_array($objQuery2);
		$objResult2['code'];
		
		if($objResult['creditid'] == $_GET["CusID"] and $_GET["Action"] == "Edit")
		{
		
		?> 
	<tr>
		<td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?>
        <input type="hidden" name="ssss" size="5"  id="ssss" value="<?=$objResult["studentid"]?>"></div></td>
    	<td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult["name"];?></div></td>
   		<td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult2['code'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center">
        <input name="collectionpoints" type="text"  id="collectionpoints" size="2" value="<?=$objResult['collectionpoints'];?>"></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center">
        <input name="finaltest" type="text"  id="finaltest" size="2" value="<?=$objResult['finaltest'];?>">
        <input type="hidden" name="creditid"  id="creditid" size="5" value="<?=$objResult["creditid"];?>">
        </div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['sumpoint'];?>
        <input type="hidden" name="subid" size="5" value="<?=$objResult["subid"];?>"></div></td>
        <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center">
       	<input name="btnAdd" type="button" id="btnUpdate" value="update" onClick="frmMain.hdnCmd.value='Update';frmMain.submit();"></div></td>
         <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center">
        <input name="btnAdd" type="button" id="btnCancel"  value="Cancel" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>?subid=<?=$objResult["subid"];?>';"></div></td></tr>
	<? }else{?>   
    <tr>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
      <td  class="tblyy"><?=$objResult["name"];?></a></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult2['code'];?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['collectionpoints'];?></div>
      <input type="hidden" name="h_arti_id" size="5" value="<?=$_POST["h_arti_id"]?>"></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['finaltest'];?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['sumpoint'];?></div></td>
       <? if($objResultSTT["status"] == "adminexam" or $objResultSTT["status"] == "admin"){ ?>
      <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&CusID=<?=$objResult['creditid'];?>&subid=<?=$objResult["subid"];?>&idaddterm=<?=$_GET["idaddterm"];?>&h_arti_id=<?=$_POST["h_arti_id"]?>">Edit</a></div></td>
      <td width="10%" style="white-space:nowrap;" class="tblyy"></td>
      <? } ?>
      </tr>
	<? } }?>
    
    
	</table>
	
</form><? }else{?>


<!-- ตารางแยก -->
<? 	
	if($_GET["subid"] != ''){
	$strSQL = "SELECT * FROM credit 
				JOIN account ON credit.accid = account.accid 
				JOIN student ON account.studentid = student.studentid	
				WHERE subid = '".$_GET["subid"]."'";
	$strSQL .=" ORDER BY  `credit`.`creditid` ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	/*echo "33";*/
	}
	
	
	?>
    <input type="hidden" name="hdnCmd" value=""> 
    <div align="right"><input type="submit" name="cmdweblogin" class="button" value="กลับ" onclick="window.location='addscore.php'" style="width:100px; height:25px; margin-bottom:10px"/></div>	
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
    <? 
	if($_GET["idaddterm"] != ''){
	$objResult = mysql_fetch_array($objQuery);
	$strSQL3 = "SELECT * 
				FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
				INNER JOIN year ON addtrem.idyear = year.idyear
				WHERE addtrem.idaddterm = '".$_GET["idaddterm"]."'";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	$objResult3 = mysql_fetch_array($objQuery3)
	?>
    <tr>
        <td width="10%"  class="tblyy3" style="white-space: nowrap;" colspan="7">
        <center>[<?=$objResult3["nameyear"]; ?>]<?=$objResult3["nameterm"];?></center>
        </td> 
    </tr>
    <? } 
	else { ?>
    <tr><td style="white-space:nowrap;" class="tblyyy" colspan="8"> <center> ทั้งหมด</center></td> </tr>
    <? } ?>
    <tr>
          <td style="white-space:nowrap;" class="tblyy3"><div align="center"><strong>รหัสนักเรียน</strong></div></td>
          <td style="white-space:nowrap;" class="tblyy3"><div align="center"><strong> ชื่อ- นามสกุล</strong></div></td>
          <td style="white-space:nowrap;" class="tblyy3"><div align="center"><strong>รหัสวิชา</strong></div></td>
          <td style="white-space:nowrap;" class="tblyy3"><div align="center"><strong>ลำดับ</strong></div></td>
          <td style="white-space:nowrap;" class="tblyy3"><div align="center"><strong>คะแนนเก็บ</strong></div></td>
          <td style="white-space:nowrap;" class="tblyy3"><div align="center"><strong>คะแนนสอบ</strong></div></td>
          <td style="white-space:nowrap;" class="tblyy3"><div align="center"><strong>รวม</strong></div></td>
      	
  	 </tr>
     <? 
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{ 
		$i++;
		$strSQL2 = "SELECT * FROM subject WHERE subid = '".$objResult["subid"]."'";
		$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");
		$objResult2 = mysql_fetch_array($objQuery2);
		$objResult2['code'];
		
		?> 
     <tr>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['creditid'];;?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><?=$objResult["name"];?></a></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult2['code'];?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['collectionpoints'];?></div>
      <input type="hidden" name="h_arti_id" size="5" value="<?=$_POST["h_arti_id"]?>"></td>
      
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['finaltest'];?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['sumpoint'];?></div></td>
      
      </tr> <? }?>
     </table>
    <? } ?>
		  <p><div align="right"><input type="submit" name="cmdweblogin" class="button" value="กลับ" onclick="window.location='addscore.php'" style="width:100px; height:25px;margin-top:5px"/></div></p>	
          
</p>
</div>
<? mysql_close();?>
</body>
</html>