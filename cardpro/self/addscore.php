<? 
session_start();
include("funtion.php");
include("ck_session_self.php");
error_reporting(~E_NOTICE);
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
    </div>
    </p>
<p>
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/managesub.png) no-repeat left top;
}
.submit{
	width:90px;
	height:30px;
	background-color:#069;
	border-bottom-color:#CCC;
	color:#FFF;
	font-size: 10pt;
	font-family: arial;
	margin-left:80px;
}
</style>
<?		
if($_POST["hdnCmd"] == "Add")
{ 	
	$idyear=$_POST["idyear"];
	$idterm=$_POST["idterm"];
	$strSQL = "SELECT * FROM  `addtrem` WHERE `idyear`= $idyear  AND  `idterm` = $idterm";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysqli_fetch_array($objQuery);
	$idaddterm = $objResult['idaddterm'];
	
	$strSQL = "INSERT INTO subject";
	$strSQL .="(subname,code,hour,disc,idaddterm) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["txtAddCustomerID"]."','".$_POST["txtAddName"]."' ";
	$strSQL .=",'".$_POST["txtAddEmail"]."' ";
	$strSQL .=",'".$_POST["txtAddCountryCode"]."' ";
	$strSQL .=",'".$idaddterm."') ";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
	if(!$objQuery){echo "Error Save [".mysqli_error()."]";}
}

//*** Update Condition ***//
if($_POST["hdnCmd"] == "Update")
{
	$idyear=$_POST["idyear11"];
	$idterm=$_POST["idterm11"];
	$strSQL = "SELECT * FROM  `addtrem` WHERE `idyear`= $idyear  AND  `idterm` = $idterm";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysqli_fetch_array($objQuery);
	$idaddterm = $objResult['idaddterm'];
	
	$strSQL = "UPDATE subject SET ";
	$strSQL .="subname = '".$_POST["txtEditCustomerID"]."' ";
	$strSQL .=",code = '".$_POST["txtEditName"]."' ";
	$strSQL .=",hour = '".$_POST["txtEditEmail"]."' ";
	$strSQL .=",disc = '".$_POST["txtEditCountryCode"]."' ";
	$strSQL .=",idaddterm = '".$idaddterm."' ";
	$strSQL .="WHERE subid = '".$_POST["hdnEditCustomerID"]."' ";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
	if(!$objQuery){echo "Error Update [".mysqli_error()."]";}
}

//*** Delete Condition ***//
if($_GET["Action"] == "Del")
{
	$strSQL = "DELETE FROM subject ";
	$strSQL .="WHERE subid = '".$_GET["CusID"]."' ";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
	if(!$objQuery){echo "Error Delete [".mysqli_error()."]";}
}
?>

<form action="<?=$_SERVER["PHP_SELF"];?>" method="post">
<table width="100%">
	<tr>
    	<td align="center" height="45">ค้นตามชื่อวิชา : 
    	<input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  		<input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
        <input class="button" type="submit" name="Submit" value="ค้นหา" />
        </td>
     </tr>
</table>
</form>

<form method="post" action="<?=$_SERVER["PHP_SELF"];?>">
<table width="100%">
	<tr>
    	<td align="center" height="55">ค้นหาตามปีการศึกษา : 
        <select name="idyear" id="idyear" style="font-size:14px; color:#666;">
        <option value="0" selected>เลือกปีการศึกษา</option>
   		<?
        $strSQL = "SELECT * FROM year";
        $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
        while($objResult = mysqli_fetch_array($objQuery)){?>         
        <option value="<?=$objResult['idyear'];?>"><?=$objResult['nameyear'];?></option>
        <? }?>
        </select>    
        <select name="idterm" id="idterm" style="font-size:14px; color:#666;">
        <option value="0" selected>เลือก SEC</option>
    	<?
        $strSQL = "SELECT * FROM term";
        $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
        while($objResult = mysqli_fetch_array($objQuery)){?>         
        <option value="<?=$objResult['idterm'];?>"><?=$objResult['nameterm']/*."-".$objResult['idterm']*/;?></option>
         <? }?>
        </select>    
        <input class="button" type="submit" name="Submit" value="ค้นหา"/>
        </td>
    </tr>
</table>            
</form>

<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>?h_arti_id=<?=$_POST["h_arti_id"];?>&subid=<?=$_GET["subid"];?>">
<? 

	if($_POST["idyear"] == 0 || $_POST["idterm"] == 0){
	$strSQL = "SELECT * FROM subject ORDER BY  `subject`.`subid` ASC  ";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");}
	
	if($_POST["h_arti_id"] != ''){
	$strSQL = "SELECT * FROM subject
				WHERE subid = '".$_POST["h_arti_id"]."'
				ORDER BY  `subject`.`subid` ASC  ";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");}
	echo $_POST["idyear"];
	echo $_POST["idterm"];
	if($_POST["idyear"] != 0 AND $_POST["idterm"] != 0){
		$strSQL = "SELECT * FROM  `addtrem` WHERE `idyear`=". $_POST["idyear"] ." AND  `idterm` = ". $_POST["idterm"];
		$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
		$objResult = mysqli_fetch_array($objQuery);
		$idaddterm = $objResult['idaddterm'];
		echo $strSQL;
		if($idaddterm != ''){
			$strSQL2 = "SELECT * FROM subject WHERE idaddterm = $idaddterm ORDER BY  `subject`.`subid` ASC ";
			$objQuery = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL."]");
		}else{
			$strSQL = "SELECT * FROM subject ORDER BY  `subject`.`subid` ASC  ";
			$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
		}
		
	}
	?>
    
    <input type="hidden" name="hdnCmd" value="">
    
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
	
    
	<? 
	if($idaddterm != 0){
	
	$strSQL2 = "SELECT * 
				FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
				INNER JOIN year ON addtrem.idyear = year.idyear
				WHERE addtrem.idaddterm = $idaddterm";
	$objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysqli_fetch_array($objQuery2)
	?>
    <tr>
        <td style="white-space:nowrap;" class="tblyy" colspan="4"> 
        <center>[<?=$objResult2["nameyear"]; ?>]<?=$objResult2["nameterm"];?></center>
        </td> 
    </tr>
    <? } 
	else { ?>
    <tr><td colspan="4" class="tbl2" style="white-space: nowrap;" align="center">ตารางวิชา SELF ทั้งหมด</td></tr>
    <? } ?>
    <tr>
      <td width="10%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>ลำดับ</strong></div></td>
      <td width="38%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>วิชา</strong></div></td>
      <td width="20%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>รหัสวิชา</strong></div></td>
      <td width="32%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>ปีการศึกษา</strong></div></td>
    </tr>
   	<? 
	$i=0;
	while($objResult = mysqli_fetch_array($objQuery)){
		$i++;
	$strSQL2 = "SELECT * 
				FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
				INNER JOIN year ON addtrem.idyear = year.idyear
				WHERE addtrem.idaddterm = '".$objResult['idaddterm']."'";
	$objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysqli_fetch_array($objQuery2)){?>
	<tr>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
      <td  class="tblyy" style="white-space:nowrap;"><a href="studentaddscore2.php?subid=<?=$objResult["subid"];?>&idaddterm=<?=$objResult['idaddterm'];?>"><?=$objResult["subname"];?></a></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult["code"];?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center">[<?=$objResult2["nameyear"]; ?>]<?=$objResult2["nameterm"];?></div></td> 
  	</tr>
	<? }} ?>
</table>
</form>
</p>
</div>
<? mysqli_close($con_ajtongmath_self);?>
<script type="text/javascript">
function make_autocom(autoObj,showObj){
	var mkAutoObj=autoObj; 
	var mkSerValObj=showObj; 
	new Autocomplete(mkAutoObj, function() {
		this.setValue = function(id) {		
			document.getElementById(mkSerValObj).value = id;
		}
		if ( this.isModified )
			this.setValue("");
		if ( this.value.length < 1 && this.isNotClick ) 
			return ;	
		return "datacourse.php?q=" +encodeURIComponent(this.value);
    });	
}	
 
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");
</script>
</body>
</html>
