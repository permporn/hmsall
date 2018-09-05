<? 
session_start();
include("funtion.php");
include("ck_session_self.php");
error_reporting(~E_NOTICE);

if($_POST["idyear"] != "" && $_POST["idterm"] != ""){
	$idyear=$_POST["idyear"];
	$idterm=$_POST["idterm"];
	
	$strSQL = "SELECT * FROM  `addtrem` WHERE `idyear`= $idyear  AND  `idterm` = $idterm";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysqli_fetch_array($objQuery);
	$idaddterm = $objResult['idaddterm'];
	}
	$strSQLbranch = "SELECT * FROM branch WHERE branchid = '".$objResult99["branchid"]."'";
	$objQuerybranch = mysqli_query($con_ajtongmath_self,$strSQLbranch);
	$objResultbranch = mysqli_fetch_array($objQuerybranch);
	$branchname = $objResultbranch['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
</head>
<body>

<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php');?>
  <div id="content">
    <h1>วิชาเรียน SELF</h1>
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
	//*** Delete Condition ***//
	if($_GET["Action"] == "Del")
	{
		$strSQL_update = "UPDATE subject_real SET"; 
	    $strSQL_update .=" status_delete = 1";
	    $strSQL_update .=" WHERE id_subject_real = '".$_GET["CusID"]."' ";
		// $strSQL = "DELETE FROM subject_real ";
		// $strSQL .="WHERE id_subject_real = '".$_GET["CusID"]."' ";
		$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
		if(!$objQuery)
		{
			echo "Error Delete [".mysqli_error()."]";
		}
		
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

<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>">
<? 
	if($_GET["h_arti_id"] != '' ){
	$strSQL = "SELECT * 
				FROM subject_real sr
				INNER JOIN teacher t  ON sr.id_teacher = t.teacherid 
				LEFT JOIN type_self ON sr.type_self = type_self.type_id
				WHERE sr.status_delete = 0 AND sr.id_subject_real = '".$_GET["h_arti_id"]."' ORDER BY sr.id_teacher,sr.name_subject_real,sr.id_subject_real ASC";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");}
	
	if($_POST["h_arti_id"] != '' ){
	$strSQL = "SELECT * 
				FROM subject_real sr
				INNER JOIN teacher t ON sr.id_teacher = t.teacherid 
				LEFT JOIN type_self ON sr.type_self = type_self.type_id
				WHERE sr.status_delete = 0 AND sr.id_subject_real = '".$_POST["h_arti_id"]."' ORDER BY sr.id_teacher,sr.name_subject_real,sr.id_subject_real ASC";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");}
	else{
	$strSQL = "SELECT * 
				FROM subject_real sr
				INNER JOIN teacher t ON sr.id_teacher = t.teacherid 
				LEFT JOIN type_self ON sr.type_self = type_self.type_id
				WHERE sr.status_delete = 0
				 ORDER BY t.teacherid ,sr.name_subject_real,sr.id_subject_real ASC";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");	
	}
	
	?>
    
	<input type="hidden" name="hdnCmd" value="">
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" align="center">
    <tr>
      <td colspan="7" class="tbl2" style="white-space: nowrap;" align="center"  height="">ตารางวิชา SELF ทั้งหมด
      <div align="right"><a href="coursemanage_add.php?type=Addrealsub" style="font-size:14px; color:#0033FF">+เพิ่มชื่อวิชาจริง</a>
      </div></td>
    </tr>
    <tr>
      <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ลำดับ</strong></div></td>
      <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ชื่อ</strong></div></td>
      <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ผู้สอน</strong></div></td>
      <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ราคา</strong></div></td>
      <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ประเภท</strong></div></td>
      <? if($objResultSTT["status"] == "admin" || $objResultSTT["status"] == "ADMIN" or $objResultSTT['stid'] == 20 or $objResultSTT['stid'] == 26 || $objResultSTT["status"] == "admin_hms"){ ?>
      <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>Edit</strong></div></td>
      <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ซ่อน</strong></div></td>
      <? } ?>
    </tr>
    <? $i=0;
	while($objResult = mysqli_fetch_array($objQuery)){
	$i++;
	 	?>
    <tr>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
      <td  class="tblyy" ><?=$objResult["name_subject_real"];?></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center">
      <? if($objResult){echo $objResult['teachername']; }
		else{ echo "ไม่มีข้อมูล";}
		?>
      </div></td>
      <td  class="tblyy" ><?=$objResult["price"];?></td>
      <td class="tblyy"><?=$objResult["type_name"];?></td>
      <? if($objResultSTT["status"] == "admin" || $objResultSTT["status"] == "ADMIN" or $objResultSTT['stid'] == 20 or $objResultSTT['stid'] == 26 || $objResultSTT["status"] == "admin_hms"){ ?>
      <td align="center" class="tblyy"><a href="coursemanage_add.php?type=EditSubjectReal&CusID=<?=$objResult["id_subject_real"];?>&h_arti_id=<?=$_POST["h_arti_id"]?>">Edit</a></td>
      <td align="center"  class="tblyy"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&CusID=<?=$objResult["id_subject_real"];?>';}">ซ่อน</a></td>
		<? } ?>
    </tr>
 
    <? } ?>
    </table>
<br/>


	
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
		return "data_real_subject.php?q=" +encodeURIComponent(this.value);
    });	
}	
make_autocom("show_arti_topic","h_arti_id");
</script>
</body>
</html>