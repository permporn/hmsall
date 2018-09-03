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
<script type="text/javascript">



</script>
</head>

<body>
<!-- START PAGE SOURCE -->
<div id="container">
	<? include('menu.php')?>
    <div id="content">
    
    <h2>สมัครสมาชิกบัตร HMS </h2>
<?php
	if($_GET["action"] == ""){
?>    
<form action="HMS_regiscard.php?action=savecard" name="add_hmscard" method="post" >
<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
    <tr>
    	<td colspan="3" class="tbl23" style="white-space: nowrap;" align="center"  height="">กรอกข้อมูล <font color="#FF0000"> *กรุณาตรวจสอบรายชื่อผู้มีบัตรแล้ว ก่อนสมัครใหม่</font></td>
    </tr>
    <tr>
    <td width="20%" class="tblyy2" height="35">ค้นหา ชื่อ-นามสกุล : </td>
        <td width="60%" class="tblyy" height="35">
        <?php if($_GET["id_std"] == ""){?>
        <input type="text" name="show_school" id="show_school" size="30" value="<?=$_GET['name'];?>" placeholder="ค้นหารายชื่อการเรียน สด & DVD" />
        <input type="hidden" name="id_school" id="id_school" value="" />
        <input type="text" name="show_self" id="show_self" size="30" value="<?=$_GET['name'];?>" placeholder="ค้นหารายชื่อการเรียน self" />
        <input type="hidden" name="id_self" id="id_self" value="" />
        <a href="HMS_AddName.php?type=addacount">เพิ่มรายชื่อ</a> 
        <?php }else{
			$query_std = mysql_query("SELECT * FROM student WHERE studentid = '".$_GET["id_std"]."'",$connect_school);  
			$result_std = mysql_fetch_array($query_std);
		?>
        <input type="text" name="newUser_nameShow" id="newUser_nameShow" size="30" value="<?=$result_std['studentname'];?>" disabled="disabled" /> 
        <input type="hidden" name="newUser_id" id="newUser_id" value="<?=$result_std['studentid'];?>" />
        
        <input type="hidden" name="name" id="name" value="<?=$result_std['studentname'];?>" />
        <input type="hidden" name="tel" id="tel" value="<?=$result_std['tel'];?>" />
        <input type="hidden" name="birthday" id="birthday" value="<?=$result_std['birthday'];?>" />
        <input type="hidden" name="address" id="address" value="<?=$result_std['address'];?>" />
        <input type="hidden" name="school" id="school" value="<?=$result_std['school'];?>" />
        <input type="hidden" name="email" id="email" value="<?=$result_std['email'];?>" />
        <input type="hidden" name="nickname" id="nickname" value="<?=$result_std['nickname'];?>" />
        <input type="hidden" name="dadname" id="dadname" value="<?=$result_std['dadname'];?>" />
        <input type="hidden" name="momname" id="momname" value="<?=$result_std['momname'];?>" />
        <input type="hidden" name="dadtel" id="dadtel" value="<?=$result_std['dadtel'];?>" />
        <input type="hidden" name="momtal" id="momtal" value="<?=$result_std['momtal'];?>" />
        <?php }?>
        <br /><font color="#FF0000"><strong> *</strong> กรุณาค้นหารายชื่อให้ครบถ้วนและถูกต้อง</font></td>
    <td width="14%"  height=""  rowspan="8" align="left" class="tblyy" style="white-space: nowrap;"> <img src="images/hmscard.png" width="132" height="200"/></td>
    </tr>
    <tr>
    	<td width="20%" class="tblyy2" height="35">เลขบัตรประชาชชน : </td>
        <td width="60%" class="tblyy" height="35">
        	<input type="text" name="pcode" id="pcode" value="<?=$result_std['pcode'];?>" <?php if($result_std['pcode']!=""){?>disabled="disabled"<?php }?>> <font color="#FF0000"><strong> *</strong></font>
        	<input type="hidden" name="h_pcode" id="h_pcode" value="<?=$result_std['pcode'];?>" />
        </td>
    </tr>
    <tr>
    	<td width="20%" class="tblyy2" height="35">วันที่สมัคร : </td>
        <td width="60%" class="tblyy" height="35">
        	<input type="date" name="start_date" id="start_date" value="<?=date("Y-m-d")?>" > <font color="#FF0000"><strong> *</strong></font></td>
    </tr>
    <tr>
    	<td width="20%" class="tblyy2" height="35">อายุการใช้งาน : </td>
        <td width="60%" class="tblyy" height="35">
        <select name="day_expire" id="day_expire"> 
            <option value="0" disabled selected>เลือก</option>
            <option value="365">1 ปี</option>
            <!--<option value="730">2 ปี</option>
            <option value="1095">3 ปี</option>
            <option value="1460">4 ปี</option>
            <option value="1825">5 ปี</option>-->
       	</select></td>
    </tr>
    <tr>
    	<td width="20%" class="tblyy2" height="35">สถานที่รับบัตร : </td>
        <td width="60%" class="tblyy" height="35">
        <select name="branchid" id="branchid"> 
            <option value="" selected>เลือก</option>
            <?
			$QR_branchname = mysql_query("SELECT * FROM branch",$connect_school);
			while($RS_branchname = mysql_fetch_array($QR_branchname)){
			?>
            <option value="<?=$RS_branchname['branchid']?>"><?=$RS_branchname['branchname']?></option>
            <? }?>
        </select></td>
    </tr>
    <tr>
    	<td width="20%" class="tblyy2" height="35">ค่าสมัครการ์ด : </td>
        <td width="60%" class="tblyy" height="35">
        	<input type="radio" name="free" value="fee" checked="checked">ชำระค่าบัตร
        	<input type="radio" name="free" value="nonfee" >ฟรี ตามโปรโมชั่น
        </td>
    </tr>
    <tr>
    	<td width="20%" class="tblyy2" height="35">ประเภทการชำระ : </td>
        <td width="60%" class="tblyy" height="35">
        	<input type="radio" name="monay" value="monay" checked="checked">เงินสด
        	<input type="radio" name="monay" value="cradit" >บัตรเคดิต
            <input type="radio" name="monay" value="transfer" >โอน
            <input type="radio" name="monay" value="free" >ฟรี 
        </td>
    </tr>
    <tr>
    	<td width="20%" class="tblyy2" height="35"></td>
        <td width="60%" class="tblyy" height="35">
        	<!--<a href="HMS_CardDetail.php"><button>บันทึก</button></a>-->
            <font color="#FF0000"><strong> หมายเหตุ : ถ้ามีบัตรอยู่แล้ว บัตรเก่าจะหมดอายุ และถูกยกเลิกทันทีไม่สามารถใช้งานบัตรนั้นได้อีก<!--<BR>
            &nbsp;&nbsp;&nbsp;--></strong></font><BR>
            <input name="Save" type="submit" class="" id="Save" value="Save" />
        </td>
    </tr>
</table>
</form>
<?php }else if($_GET["action"] == "savecard"){
	$id_allst = '';
	$alert_ck = '1';
	$newPoint = 0;
	
	$name = '';
	$tel = '';
	$birthday = '';
	$address = '';
	$school = '';
	$email = '';
	$nickname = '';
	$dadname = '';
	$momname = '';
	$dadtel = '';
	$momtal = '';
	
	if($_POST["newUser_id"] != ""){
		$school_studentid = $_POST["newUser_id"];
		$name = $_POST["name"];
		$tel = $_POST["tel"];
		$birthday = $_POST["birthday"];
		$address = $_POST["address"];
		$school = $_POST["school"];
		$email = $_POST["email"];
		$nickname = $_POST["nickname"];
		$dadname = $_POST["dadname"];
		$momname = $_POST["momname"];
		$dadtel = $_POST["dadtel"];
		$momtal = $_POST["momtal"];
		
	}else if($_POST["id_school"] != ''){
		$query_schoolid = mysql_query("SELECT * FROM hms_allstudent WHERE school_studentid = '".$_POST["id_school"]."'",$connect_school);/////////////
		$result_schoolid = mysql_fetch_array($query_schoolid);
		
		if(!empty($result_schoolid)){ //ถ้ามี school id ใน all
			$id_allst = $result_schoolid["id"];
			
			$query_card = mysql_query("SELECT * FROM hms_card WHERE id_allstudent = '".$id_allst."' AND status IN('1','2')",$connect_school);/////////////
			while( $result_card = mysql_fetch_array($query_card) ){
				$newPoint = $result_card['point'] ;
				$str_chg = "UPDATE hms_card SET ";
				$str_chg .="status = '4' ";
				$str_chg .="WHERE id_hms = '".$result_card['id_hms']."' ";
				$OQ_chg = mysql_query($str_chg,$connect_school);
				
				if($alert_ck == '1'){
					$alert_ck = '2';
					echo "<script language='javascript'>alert('*บัตรเก่าจะถูกยกเลิก');</script>";
				}
			}
		}else{
			
			$query_scid = mysql_query("SELECT * FROM student WHERE studentid = '".$_POST["id_school"]."'",$connect_school);
			$result_scid = mysql_fetch_array($query_scid);
			$name = $result_scid["studentname"];
			$tel = $result_scid["tel"];
			$birthday = $result_scid["birthday"];
			$address = $result_scid["address"];
			$school = $result_slid["school"];
			$email = $result_slid["email"];
			$nickname = $result_scid["nickname"];
			$dadname = $result_scid["dadname"];
			$momname = $result_scid["momname"];
			$dadtel = $result_scid["dadtel"];
			$momtal = $result_scid["momtal"];
			
		}
			
		if($result_schoolid['selfdb_studentid'] == '0' || $result_schoolid['selfdb_studentid'] == '' || $_POST['pcode'] != ''){
			if($_POST['pcode']==''){
				$newPcode = $result_schoolid['pcode'];
			}else{
				$newPcode = $_POST['pcode'];
			}
			
			if($_POST['id_self']==''){
				$newIdself = $result_schoolid['selfdb_studentid'];
			}else{
				$newIdself = $_POST['id_self'];
			}
			
			$str_upidself = "UPDATE hms_allstudent SET ";
			$str_upidself .="selfdb_studentid = '".$newIdself."' ";
			$str_upidself .=", pcode = '".$newPcode."' ";
			$str_upidself .="WHERE id = '".$result_schoolid["id"]."' ";
			$OQ_upidself = mysql_query($str_upidself,$connect_school);
		}
	
	}else if($_POST["id_self"] != ''){
		$query_selfid = mysql_query("SELECT * FROM hms_allstudent WHERE selfdb_studentid = '".$_POST["id_self"]."'",$connect_school);/////////////
		$result_selfid = mysql_fetch_array($query_selfid);
		
		if(!empty($result_selfid)){ //ถ้ามี self id ใน all 
			$id_allst = $result_selfid["id"];
			
			$query_card = mysql_query("SELECT * FROM hms_card WHERE id_allstudent = '".$id_allst."' AND status IN('1','2')",$connect_school);/////////////
			while( $result_card = mysql_fetch_array($query_card) ){
				$newPoint = $result_card['point'] ;
				$str_chg = "UPDATE hms_card SET ";
				$str_chg .="status = '4' ";
				$str_chg .="WHERE id_hms = '".$result_card['id_hms']."' ";
				$OQ_chg = mysql_query($str_chg,$connect_school);
				
				if($alert_ck == '1'){
					$alert_ck = '2';
					echo "<script language='javascript'>alert('*บัตรเก่าจะถูกยกเลิก');</script>";
				}
			}
		}else{
			
			$str_slid = "SELECT * FROM student WHERE studentid = '".$_POST["id_self"]."'";
			$query_slid = mysql_query($str_slid,$connect_self)or die ("Error Query [".$str_slid."]");
			$result_slid = mysql_fetch_array($query_slid);
			$name = $result_slid['name'];
			$tel = $result_slid['tel'];
			$birthday = "";
			$address = "";
			$school = $result_slid["school"];
			$email = $result_slid["email"];
			$nickname = "";
			$dadname = "";
			$momname = "";
			$dadtel = "";
			$momtal = "";
			
			
			
		}
	}
	
	if($_POST["id_self"] != ''){
		$selfdb_studentid = $_POST["id_self"];
	}
	if($_POST["newUser_id"] == ""){
		$school_studentid = $_POST["id_school"];
	}
	
	if($_POST["pcode"] != ""){
		$pcode = $_POST["pcode"];
	}else if($_POST["h_pcode"] != ""){
		$pcode = $_POST["h_pcode"];
	}else{
		$pcode = $result_scid["pcode"];
	}
	
	if($id_allst == ""){
		
		/*$query_ckname = mysql_query("SELECT * FROM hms_allstudent WHERE name = '".$name."'",$connect_school);// ตอนแรกจะใส่เพื่อเช็ค ชื่อซ้ำ
		$result_ckname = mysql_fetch_array($query_ckname);
		if(!empty($result_ckname)){
			echo "<script language='javascript'>alert('ขออภัย ชื่อนี้ถูกใช้แล้ว!! ');</script>";
			echo "<script>window.location='HMS_regiscard.php';</script>";
		}*/
		
		//hms_allstudent
		$sql_allst = "INSERT INTO hms_allstudent (";
		$sql_allst .= "school_studentid";
		$sql_allst .= ", selfdb_studentid";
		$sql_allst .= ", pcode";
		$sql_allst .= ", name";
		$sql_allst .= ", tel";
		$sql_allst .= ", birthday";
		$sql_allst .= ", address ";
		$sql_allst .= ", school";
		$sql_allst .= ", email";
		$sql_allst .= ", nickname";
		$sql_allst .= ", dadname";
		$sql_allst .= ", momname";
		$sql_allst .= ", dadtel";
		$sql_allst .= ", momtal";
		$sql_allst .= ") values (";
		$sql_allst .= "'$school_studentid'";
		$sql_allst .= ", '$selfdb_studentid'";
		$sql_allst .= ", '$pcode'";
		$sql_allst .= ", '$name'";
		$sql_allst .= ", '$tel'";
		$sql_allst .= ", '$birthday'";
		$sql_allst .= ", '$address'";
		$sql_allst .= ", '$school'";
		$sql_allst .= ", '$email'";
		$sql_allst .= ", '$nickname'";
		$sql_allst .= ", '$dadname'";
		$sql_allst .= ", '$momname'";
		$sql_allst .= ", '$dadtel'";
		$sql_allst .= ", '$momtal'";
		$sql_allst .= ")"; 
		$dbquery_allst = mysql_query($sql_allst,$connect_school) or die ("Error Query [".$sql_allst."]");
		//$id_allst = mysql_insert_id($connect_school); ใช้คำสั่งนี้ไม่ได้
		
		$QR_IDall = mysql_query("SELECT * FROM hms_allstudent WHERE id = (SELECT MAX(id) FROM hms_allstudent)",$connect_school);/////////////
		$RS_IDall = mysql_fetch_array($QR_IDall);
		$id_allst = $RS_IDall['id'];
	}
	
	$start_date = $_POST["start_date"];
	if($_POST["day_expire"]=='' || $_POST["day_expire"]=='0'){
		$numday_expire = 356;
	}else{
		$numday_expire = $_POST["day_expire"];
	}
	$date_expirePoint = date ("Y-m-d", strtotime($numday_expire." day", strtotime($start_date)));
	$status = "1";
	$branchid = $_POST['branchid'];
	
	//hms_card
	$sql_hcard = "INSERT INTO hms_card (";
	$sql_hcard .= "id_allstudent";
	$sql_hcard .= ", start_date";
	$sql_hcard .= ", date_expirePoint";
	$sql_hcard .= ", point";
	$sql_hcard .= ", status";
	$sql_hcard .= ", branchid";
	$sql_hcard .= ") values (";
	$sql_hcard .= "'$id_allst'";
	$sql_hcard .= ", '$start_date'";
	$sql_hcard .= ", '$date_expirePoint'";
	$sql_hcard .= ", '$newPoint'";
	$sql_hcard .= ", '$status'";
	$sql_hcard .= ", '$branchid'";
	$sql_hcard .= ")"; 
	$dbquery_hcard = mysql_query($sql_hcard,$connect_school) or die ("Error Query [".$sql_hcard."]");
	
	//$id_hms_card = mysql_insert_id($connect_school); ใช้ไม่ได้
	$QR_hmsCard = mysql_query("SELECT * FROM hms_card WHERE id_hms = (SELECT MAX(id_hms) FROM hms_card)",$connect_school);/////////////
	$RS_hmsCard = mysql_fetch_array($QR_hmsCard);
	$id_hms_card = $RS_hmsCard['id_hms'];
	
	$id_staff = $_SESSION['accid_cardpro'];
	$dateNow = date('Y-m-d');
	$Payment = $_POST['monay'];
	if($_POST['free'] == 'fee'){
		$money = 250;
	}else if($_POST['free'] == 'nonfee'){
		$money = 0;
	}
	$sql_bill = "INSERT INTO hms_bill (";
	$sql_bill .= "id_hms";
	$sql_bill .= ", id_staff";
	$sql_bill .= ", date";
	$sql_bill .= ", money";
	$sql_bill .= ", Payment";
	$sql_bill .= ") values (";
	$sql_bill .= "'$id_hms_card'";
	$sql_bill .= ", '$id_staff'";
	$sql_bill .= ", '$dateNow'";
	$sql_bill .= ", '$money'";
	$sql_bill .= ", '$Payment'";
	$sql_bill .= ")"; 
	$dbquery_bill = mysql_query($sql_bill,$connect_school) or die ("Error Query [".$sql_bill."]");
	$id_bill = mysql_insert_id($connect_school);
	
	echo "<script language='javascript'>alert('บันทึกเสร็จสิ้น!! ');</script>";
	echo "<script>window.location='HMS_student.php?id_hms=$id_allst';</script>";

}else if($_POST['id_school'] == '' && $_POST['id_self'] == ''){

	echo "<script language='javascript'>alert('กรุณาใส่ข้อมูลให้ถูกต้อง!! ');</script>";
	echo "<script>window.location='HMS_student.php';</script>";

}
?>
</div>
</div>
<div id="dialog" title="สแกนบัตร" align="center">
	<img src="images/taaaa.png" width="400"/>
	<input id="idcard_textbox" type="text" size="40" />
</div>
</body>
</html>
<?php mysql_close();?>

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
		return "HMS_data_self.php?q=" +encodeURIComponent(this.value);
    });	
}	
make_autocom("show_self","id_self");


function make_autocomSc(autoObj,showObj){
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
		return "HMS_data_school.php?q=" +encodeURIComponent(this.value);
    });	
}	
make_autocomSc("show_school","id_school");




</script>
<script type="text/javascript"> Cufon.now(); </script>