<? 
ob_start();
session_start();
include("config.inc_multidb.php");
include("funtion.php");
include("ck_session2.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<? include("script_link.php");?>
<script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjax() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'AjaxPHPRegister2.php';
		  var pmeters = "tUsername=" + encodeURI( document.getElementById("txtUsername").value);

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpan").innerHTML = "..";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'AjaxPHPRegister3.php';
					}
					else
					{
						document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
					}
				}
				
			}

	   }
	   function chk_null(){
		if (document.frmMain.txtUsername.value ==""){
			alert("กรุณากรอกชื่อนักเรียนด้วยครับ")
			document.frmMain.txtUsername.focus()
			return false
		}
	}
</script>
</head>

<body>
<!-- START PAGE SOURCE -->

<div id="container">
	<? include('menu.php')?>
    <div id="content">
    
    <?php if($_GET["type"] == "addacount"){?>
    <h2>เพิ่มชื่อนักเรียน</h2>   
<form action="HMS_AddName.php?type=SaveAcount" name="newUser" method="post" >
<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
    <tr>
    	<td colspan="3" class="tbl23" style="white-space: nowrap;" align="center"  height="">กรอกข้อมูล</td>
    </tr>
    <tr>
        <td width="15%" height="35" class="tblyy2" style="white-space: nowrap;">ชื่อ-นามสกุล  :</td>
        <td align="left"  class="tblyy" colspan="2">
        <input type="text" name="name" id="name" OnChange="JavaScript:doCallAjax();"><span id="mySpan"></span><font color="#FF0000"><strong> *</strong> กรอกชื่อและนามสุกุล โดยเว้นวรรชื่อนามสกุล 1 วรรคเท่านั้น ไม่ต้องมีคำนำหน้าชื่อ ตัวอย่าง เด็กโต้ง ขยันเรียน</font></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35">เลขบัตรประชาชชน : </td>
        <td width="85%" class="tblyy" height="35">
        <input type="text" name="pcode" id="pcode" value=""> <font color="#FF0000"><strong> *</strong></font></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35">โรงเรียน : </td>
        <td width="85%" class="tblyy" height="35">
        <input type="text" name="school" id="school" value=""></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35">เบอร์โทรศัพท์ : </td>
        <td width="85%" class="tblyy" height="35">
        <input type="text" name="tel" id="tel" value=""><font color="#FF0000"><strong> *</strong></font></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35">email : </td>
        <td width="85%" class="tblyy" height="35">
        <input type="text" name="email" id="email" value=""></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35">nickname : </td>
        <td width="85%" class="tblyy" height="35">
        <input type="text" name="nickname" id="nickname" value=""></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35">ที่อยู่ : </td>
        <td width="85%" class="tblyy" height="35">
        <textarea name="address" id="address" cols="40"></textarea></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35">ชื่อพ่อ : </td>
        <td width="85%" class="tblyy" height="35">
        <input type="text" name="dadname" id="dadname" value=""></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35">เบอร์โทรพ่อ : </td>
        <td width="85%" class="tblyy" height="35">
        <input type="text" name="dadtel" id="dadtel" value=""></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35">ชื่อแม่ : </td>
        <td width="85%" class="tblyy" height="35">
        <input type="text" name="momname" id="momname" value=""></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35">เบอร์โทรแม่ : </td>
        <td width="85%" class="tblyy" height="35">
        <input type="text" name="momtal" id="momtal" value=""></td>
    </tr>
    <tr>
    	<td width="15%" class="tblyy2" height="35"></td>
        <td width="85%" class="tblyy" height="35">
            <input name="Save" type="submit" class="" id="Save" value="Save" />
            <!--<a href="HMS_regiscard.php"><button>บันทึก</button></a>-->
        </td>
    </tr>    
</table>
</form>
<?php }else if($_GET["type"] == "SaveAcount"){
	$query_SchNameAll = mysql_query("SELECT id FROM hms_allstudent WHERE name = '".$_POST["name"]."'" ,$connect_school);
	$result_SchNameAll = mysql_fetch_array($query_SchNameAll);
	
	$query_SchNameSt = mysql_query("SELECT studentid FROM student WHERE studentname = '".$_POST["name"]."'" ,$connect_school);
	$result_SchNameSt = mysql_fetch_array($query_SchNameSt);
	
	$str_ckself = "SELECT studentid FROM student WHERE name = '".$_POST["name"]."'";
	$query_ckself = mysql_query($str_ckself ,$connect_self);
	$result_ckself = mysql_fetch_array($query_ckself);
	
	if(empty($result_SchNameAll) && empty($result_SchNameSt) && empty($result_ckself)){
		$sql_st = "INSERT INTO student (";
		$sql_st .= "studentname";
		$sql_st .= ", tel";
		$sql_st .= ", pcode";
		$sql_st .= ", birthday";
		$sql_st .= ", address ";
		$sql_st .= ", school";
		$sql_st .= ", email";
		$sql_st .= ", nickname";
		$sql_st .= ", dadname";
		$sql_st .= ", momname";
		$sql_st .= ", dadtel";
		$sql_st .= ", momtal";
		$sql_st .= ", DateAddName";
		$sql_st .= ") values (";
		$sql_st .= "'".$_POST["name"]."'";
		$sql_st .= ", '".$_POST["tel"]."'";
		$sql_st .= ", '".$_POST["pcode"]."'";
		$sql_st .= ", '".$_POST["birthday"]."'";
		$sql_st .= ", '".$_POST["address"]."'";
		$sql_st .= ", '".$_POST["school"]."'";
		$sql_st .= ", '".$_POST["email"]."'";
		$sql_st .= ", '".$_POST["nickname"]."'";
		$sql_st .= ", '".$_POST["dadname"]."'";
		$sql_st .= ", '".$_POST["momname"]."'";
		$sql_st .= ", '".$_POST["dadtel"]."'";
		$sql_st .= ", '".$_POST["momtal"]."'";
		$sql_st .= ", '".date("Y-m-d H:i:s")."'";
		$sql_st .= ")"; 
		$dbquery_st = mysql_query($sql_st ,$connect_school) or die ("Error Query [".$sql_st."]");
		//$dbquery_st = mysql_db_query($dbname, $sql_st) or die ("Error Query [".$sql_st."]");
		//$last_id = mysql_insert_id();
		
		$qr_maxid = mysql_query("SELECT * FROM student WHERE studentid = (SELECT MAX(studentid) FROM student)" ,$connect_school);
		$rs_maxid = mysql_fetch_array($qr_maxid);
		$id_std = $rs_maxid['studentid'];
		//$id_std = mysql_insert_id();  //ใช้เพื่อเอาค่า id สุดท้ายที่ insert
		//echo "id_all = ".$id_all."<BR>";
		
		//header("location:HMS_regiscard.php?id_all=$id_all");
		echo "<script language='javascript'>alert('บันทึกเสร็จสิ้น!!');</script>";
		echo "<script>window.location='HMS_regiscard.php?id_std=$id_std';</script>";
	}else{
		
		echo "<script language='javascript'>alert('ชื่อ-นามสกุล นี้ถูกใช้แล้ว!!');</script>";
		echo "<script>window.location='HMS_regiscard.php';</script>";
	}
}?>



</div>
</div>

</body>
</html>
<?php mysql_close();?>