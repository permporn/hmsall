<? 
session_start();
include("config.inc.php");
	$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	if($_SESSION["stid"] == "")
	{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('Please Login!!');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
		exit();
	}
	$strSQLbranch = "SELECT * FROM branch WHERE branchid = '".$objResult99["branchid"]."'";
	$objQuerybranch = mysql_query($strSQLbranch);
	$objResultbranch = mysql_fetch_array($objQuerybranch);
	$branchname = $objResultbranch['name'];
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>S.E.L.F</title>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="Templates.com - website templates provider">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>

<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/addsub.png) no-repeat left top;
}
</style>
<script language="javascript">

function checkForm(){ 
	if(((document.getElementById("h_arti_id_subj").value).length) == 0 ){
		alert("กรุณาเลือกวิชา");
		return false;
	}
	if(((document.getElementById("codetransfer").value).length) == 0 ){
		alert("กรุณารหัสคอร์สโอนคอร์ส");
		return false;
	}
	/*if(((document.getElementById("Invoicenumber").value).length) == 0 ){
		alert("กรุณากรอกหมายเลขใบชำระเงิน");
		return false;
	}*/
	if(((document.getElementById("amount").value).length) == 0 ){
		alert("กรุณาราคาคอร์ส");
		return false;
	}
	if(((document.getElementById("date_pay").value).length) == 0 ){
		alert("กรุณาเลือกวันที่โอน");
		return false;
	}
	
}
function checkForm2(){ 
	if(((document.getElementById("chk").value).length) == 0 ){
		alert("กรุณาเลือกวิชาที่จะแก้ไข");
		return false;
	}
	if(((document.getElementById("h_arti_id_subj").value).length) == 0 ){
		alert("กรุณาเลือกวิชา");
		return false;
	}	
}
function checkForm3(){ 
	if(((document.getElementById("h_arti_id_subj").value).length) == 0 ){
		alert("กรุณาเลือกวิชา");
		return false;
	}
	/*if(((document.getElementById("codetransfer").value).length) == 0 ){
		alert("กรุณารหัสคอร์สโอนคอร์ส");
		return false;
	}*/
	if(((document.getElementById("amount").value).length) == 0 ){
		alert("กรุณาราคาคอร์ส");
		return false;
	}
	
	
}
</script>

</head>
<body id="page1">
<div class="wrap">
   <!-- header -->
   <header>
      <div class="container">
         <h1><a href="index.html">Student's site</a></h1>
         <nav>
            <ul>
               <li><a href="home.php" class="m1">Home</a></li>
               <li class="current"><a href="addstudent.php" class="m2">STUDENT</a></li>
               <li><a href="coursemanage.php" class="m3">COURSE</a></li>
               <li><a href="viewseat.php" class="m4">SEAT</a></li>
               <li class="last"><a href="exp.php" class="m5">Trial</a></li>
            </ul>
         </nav>
        <!--<form action="viewall.php" id="search-form" method="post">
            <fieldset>
            <div class="rowElem">
               <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
               <a href="#" onClick="document.getElementById('search-form').submit()">Search</a></div>
            </fieldset>
         </form>-->
      </div>
   </header>
   <div class="container">
      <!-- aside -->
      <aside>
         <h3>MENU</h3>
         <ul class="categories">
            <li><span><a href="addstudent.php">เพิ่มนักเรียนใหม่</a></span></li>
            <!--<li><span><a href="addstudent9.php">เพิ่มนักเรียนใหม่(ชั้น9 โปรโมชั่น)</a></span></li>-->
            <li><span><a href="searchstudent.php">ค้นหาข้อมูลนักเรียน</a></span></li>
            <li><span><a href="manageaccount.php">เพิ่มaccount</a></span></li>
            <li><span><a href="shirt_search.php">รับเสื้อนักเรียน</a></span></li>
            <li><span><a href="book_search.php">รับหนังสือ</a></span></li>
            <li><span><a href="credit_time_search.php">ขยายเวลา/เพิ่มเครดิต(free)</a></span></li>
            <li><span><a href="credit_time_search2.php">ขยายเวลา/เพิ่มเครดิต(คิดค่าบริการ)</a></span></li>
            
           <!-- <li class="last"><span><a href="manageaccountAPP.php">เพิ่มaccount เรียนผ่าน Application</a></span></li>-->
         </ul>
         <form action="" id="newsletter-form">
            <fieldset>
            <div class="rowElem">
               <h2>Account</h2>
               <p>WELCOME: <?=$objResult99["stname"]?><br><?=$branchname?></p>
               <div class="clear"><a class="fright" href=javascript:if(confirm('ยืนยันการออกจากระบบ')==true){window.location='logout.php';}>ออกจากระบบ</a></div>
            </div>
            </fieldset>
         </form>
         <h2>EVEN <span>News</span></h2>
         <ul class="news">
            <?
			$strSQL = "SELECT * FROM even order by ideven desc";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		 	while($objResult = mysql_fetch_array($objQuery)){?>
            	<li><strong><?=$objResult["date"];?></strong><h4><a href="#"><?=$objResult["teven"];?></a></h4><?=$objResult["even"];?> </li>
            <? }?>
         </ul>
      </aside>
      <!-- content -->
      <section id="content">
        <div id="sss"></div>
         <div class="inside">
         <? if($objResult99['status'] == 'admin' && $objResult99['stid'] = 2) {
			 if($_GET['type'] == "Add"){?>
            <form name="addstudentForm" method="post" action="addsub.php?accid=<?=$_GET["accid"]?>&type=Add" onSubmit="return checkForm3();">
          <p> <strong> + admin เพิ่มวิชา</strong></p>
           <table width="100%" border="1" >
             
             <tr>
                 <td width="104" class="tbl1">เลือกวิชา</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1">
                 <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
                 <input type="hidden" name="staffid" value="<?=$_SESSION["stid"]?>"/>
                 <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
                 <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /></td>
                 <td width="0" colspan="5"></td>
             </tr>
             <tr>
               <td width="104" class="tbl1">วันที่โอน</td>
               <td width="26"  class="tbl1"><center>:</center></td>
               <td width="484" class="tbl1"><input type="date" name="date_pay" id="date_pay" value=""><font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="117" class="tbl1">ประเภทการจ่าย</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1">
                 <input name="type_pay" type="radio" value="transfer" class="input4" checked="checked" />โอน&nbsp;			
                 <input name="type_pay" type="radio" value="cradit" class="input4" /> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" /> เงินสด 
                 <input name="type_pay" type="radio" value="free" class="input4" /> ฟรี
                 <font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="117" class="tbl1">รหัสคอร์สที่โอน</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="codetransfer" id="codetransfer" size="10" ><font color="#FF0000"> * กรอกรหัสคอร์สที่โอน</font></td>
             </tr>
             <tr>
                 <td width="104" class="tbl1">หมายเลขใบชำระ</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="Invoicenumber" id="Invoicenumber" ><font color="#FF0000"> * เลขสลิปโอน ตย.0880-98001 /บัตรเคดิต ตย.000000001229 </font></td>
             </tr>
             <tr>
                 <td width="104" class="tbl1">จำนวนเงิน</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="amount" id="amount"  size="10">บาท <font color="#FF0000"> *กรอกเฉพาะตัวเลข ตย. 3500</font></td>
             </tr>
             <tr>
                 <td width="104" class="tbl1">หมายเลขใบคำร้อง:</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="noptt" id="noptt"  size="10"> <font color="#FF0000"></font></td>
             </tr>
             <tr>
                 <td width="104" class="tbl1">ผู้ร้องขอ:</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1">
                 <select name="no_petition_staff" id="no_petition_staff">
                 <option value="" selected='selected' >เลือก</option>
                 <?
				 $strSQL_staff = "SELECT staff.stname ,staff.stid FROM staff";
				 $objQuery_staff = mysql_query($strSQL_staff);
					while ($objResult_staff = mysql_fetch_array($objQuery_staff)) {
				 ?>
                 <option value="<?=$objResult_staff["stid"]?>"><?=$objResult_staff["stname"]?></option>
                 <? } ?>
                 </select>
                </td>
             </tr>
             <tr>
                 <td colspan="3"><input type="submit" name="submit" id="submit" class="submit3" value="ตกลง" ></td>
                 <td colspan="5"></td>
             </tr>
             
            <? 
				$i=1;
				$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
				$objQuery1 = mysql_query($strSQL1);
  				while ($objResult1 = mysql_fetch_array($objQuery1)) {
				if($i==1){}else {} $i++; }
			?>
            
             
           </table>
           </form>
           <? }if($_GET['type'] == "Edit"){?>
           <form name="addstudentForm" method="post" action="updatesub.php?accid=<?=$_GET["accid"]?>&type=update" onSubmit="return checkForm2();">
            <p><strong>+ admin แก้ไขไฟล์เรียน</strong></p>
           <table width="100%" border="1" >
           <tr>
           		
             <?
				$strSQL = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = ".$_GET["accid"]." ";
				$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
				$Num_Rows = mysql_num_rows($objQuery); 
				$objQuery  = mysql_query($strSQL);
		 	?>
            <? $i=0;?>
			<? while($objResult = mysql_fetch_array($objQuery)){ ?>
			<tr>
            	<input type="hidden" name="staffid" value="<?=$_SESSION["stid"]?>"/>
            	<td width="200" class="tbl1">เลือกวิชาที่ต้องการแก้ไข</td>
                <td width="26"  class="tbl1"><center>:</center></td>
         		<td class="tbl1"><input type="radio" name="chk" id="chk" value="<?=$objResult["creditid"]?>"><?=$objResult["subname"]?></td>
         	</tr>
			<? $i++; } ?>
           
            <tr>
                 <td width="200" class="tbl1">ค้นหาวิชาใหม่</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1">
                 <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
                 <input type="hidden" name="staffid" value="<?=$_SESSION["stid"]?>"/>
                 <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
                 <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /></td>
                 
             </tr>
             <tr>
                 <td width="200" class="tbl1">หมายเลขใบคำร้อง</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="noptt" id="noptt"  size="10"> <font color="#FF0000"></font></td>
             </tr>
             <tr>
                 <td width="200" class="tbl1">ผู้ร้องขอ</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1">
                 <select name="no_petition_staff" id="no_petition_staff">
                 <option value="" selected='selected' >เลือก</option>
                 <?
				 $strSQL_staff = "SELECT staff.stname ,staff.stid FROM staff";
				 $objQuery_staff = mysql_query($strSQL_staff);
					while ($objResult_staff = mysql_fetch_array($objQuery_staff)) {
				 ?>
                 <option value="<?=$objResult_staff["stid"]?>"><?=$objResult_staff["stname"]?></option>
                 <? } ?>
                 </select>
                </td>
             </tr>
             
             <tr>
                 <td colspan="3"><input type="submit" name="submit" id="submit" class="submit3" value="ตกลง" ></td>
                 <td colspan="5"></td>
             </tr>
            <? 
				$i=1;
				$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
				$objQuery1 = mysql_query($strSQL1);
  				while ($objResult1 = mysql_fetch_array($objQuery1)) {
				if($i==1){}else {} $i++; }
			?>
            
             
           </table>
           </form>
            <? }if($_GET['type'] == "editall"){?>
            <form name="addstudentForm" method="post" action="addsub.php?type=editall&creditid=<?=$_GET["creditid"]?>&std=<?=$_GET['std']?>&accid=<?=$_GET["accid"]?>" onSubmit="return checkForm3();">
          <strong>+ admin แก้ไขข้อมูลรายวิชา </strong><br /><br />
           <table width="100%" border="1" >
             <?
			 $strSQL1 = "SELECT subject.subname ,credit.date_pay ,credit.codetransfer ,credit.Invoicenumber ,credit.amount ,credit.no_petition,credit.no_petition_staff
			 ,staff.stname ,branch.name ,staff.stid , credit.type_pay
			 FROM credit 
			 INNER JOIN subject ON credit.subid = subject.subid 
			 INNER JOIN staff ON credit.staffid = staff.stid
			 INNER JOIN branch ON staff.branchid = branch.branchid
			 WHERE credit.creditid = '".$_GET['creditid']."'
			 ";
			 $objQuery1 = mysql_query($strSQL1);
  				while ($objResult1 = mysql_fetch_array($objQuery1)) {
				
			 ?>
             <tr>
             	<input type="hidden" name="staffid" value="<?=$_SESSION["stid"]?>"/>
                 <td width="104" class="tbl1">วิชา</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><?=$objResult1["subname"];?></td>
                 <td width="0" colspan="5"></td>
             </tr>
             <tr>
               <td width="104" class="tbl1">วันที่โอน</td>
               <td width="26"  class="tbl1"><center>:</center></td>
               <td width="484" class="tbl1"><input type="date" name="date_pay" id="date_pay" value="<?=$objResult1["date_pay"]?>"><font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="117" class="tbl1">ประเภทการจ่าย</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1">
                 <input name="type_pay" type="radio" value="transfer" class="input4" <? if($objResult1["type_pay"]== "transfer"){?>checked="checked"<? }?> />โอน&nbsp;			
                 <input name="type_pay" type="radio" value="cradit" class="input4" <? if($objResult1["type_pay"]== "cradit"){?>checked="checked"<? }?>/> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" <? if($objResult1["type_pay"]== "money"){?>checked="checked"<? }?>/> เงินสด 
                 <input name="type_pay" type="radio" value="free" class="input4" <? if($objResult1["type_pay"]== "free"){?>checked="checked"<? }?>/> ฟรี
                 <font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="117" class="tbl1">รหัสคอร์สที่โอน</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="codetransfer" id="codetransfer" size="10" value="<?=$objResult1["codetransfer"]?>"></td>
             </tr>
             <tr>
                 <td width="104" class="tbl1">หมายเลขใบชำระ</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="Invoicenumber" id="Invoicenumber" value="<?=$objResult1["Invoicenumber"]?>"></td>
             </tr>
             <tr>
                 <td width="104" class="tbl1">จำนวนเงิน</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="amount" id="amount"  size="10" value="<?=$objResult1["amount"]?>">บาท </td>
             </tr>
             
             <tr>
                 <td width="104" class="tbl1">หมายเลขใบคำร้อง</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="noptt" id="noptt"  size="10" value="<?=$objResult1["no_petition"]?>"> </td>
             </tr>
             <tr>
                 <td width="104" class="tbl1">ผู้ร้องขอ</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1">
                 <select name="no_petition_staff" id="no_petition_staff">
                 <? 
					$strSQL14 = "SELECT * FROM staff WHERE stid = '".$objResult1["no_petition_staff"]."' ";
					$objQuery14 = mysql_query($strSQL14) or die ("Error Query [".$strSQL14."]");
					$objResult14 = mysql_fetch_array($objQuery14);
				?>
                 <option value="<?=$objResult1["no_petition_staff"]?>" selected='selected' ><?=$objResult14["stname"]?></option>
                 <?
				 $strSQL_staff = "SELECT staff.stname ,staff.stid FROM staff";
				 $objQuery_staff = mysql_query($strSQL_staff);
					while ($objResult_staff = mysql_fetch_array($objQuery_staff)) {
				 ?>
                 <option value="<?=$objResult_staff["stid"]?>"><?=$objResult_staff["stname"]?></option>
                 <? } ?>
                 </select>
                 </td>
             </tr>
             <tr>
                 <td colspan="3"><input type="submit" name="submit" id="submit" class="submit3" value="ตกลง" >
                 </td>
                 <td colspan="5"></td>
             </tr>
            <? 
			}
			?>
            
             
           </table>
           </form>
            <? }}
			else{ ?>
         <? if($_GET['type'] == "Add"){?>
         <form name="addstudentForm" method="post" action="addsub.php?accid=<?=$_GET["accid"]?>&type=Add&stid=<?=$_SESSION["stid"]?>" onSubmit="return checkForm();">
          
           <table width="100%" border="1" >
             
             <tr>
                 <td width="104" class="tbl1">เลือกวิชา</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1">
                 <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
                 <input type="hidden" name="staffid" value="<?=$_SESSION["stid"]?>"/>
                 <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
                 <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /></td>
                 <td width="0" colspan="5"></td>
             </tr>
             <tr>
                 <td width="117" class="tbl1">ประเภทการจ่าย</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1">
                 <input name="type_pay" type="radio" value="transfer" class="input4" checked="checked" />โอน&nbsp;			
                 <input name="type_pay" type="radio" value="cradit" class="input4" /> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" /> เงินสด 
                <font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="117" class="tbl1">รหัสคอร์สที่โอน</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td class="tbl1"><input type="text" name="codetransfer" id="codetransfer" size="10" ><font color="#FF0000"> * กรอกรหัสคอร์สที่โอน</font></td>
             </tr>
             <tr>
                 <td width="104" class="tbl1">หมายเลขใบชำระ</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="Invoicenumber" id="Invoicenumber" ><font color="#FF0000"> * เลขสลิปโอน ตย.0880-98001 /บัตรเคดิต ตย.000000001229 </font></td>
             </tr>
             <tr>
                 <td width="104" class="tbl1">จำนวนเงิน</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1"><input type="text" name="amount" id="amount"  size="10">บาท <font color="#FF0000"> *กรอกเฉพาะตัวเลข ตย. 3500</font></td>
             </tr>
             <tr>
                 <td colspan="3"><input type="submit" name="submit" id="submit" class="submit3" value="ตกลง" ></td>
                 <td colspan="5"></td>
             </tr>
            <? 
				$i=1;
				$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
				$objQuery1 = mysql_query($strSQL1);
  				while ($objResult1 = mysql_fetch_array($objQuery1)) {
				if($i==1){}else {} $i++; }
			?>
            
             
           </table>
           </form>
           <? } ?>
           <? if($_GET['type'] == "Edit"){?>
           <form name="addstudentForm" method="post" action="updatesub.php?accid=<?=$_GET["accid"]?>&type=update" onSubmit="return checkForm2();">
           <table width="100%" border="1" >
           <tr>
           		
             <?
				$strSQL = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = ".$_GET["accid"]." ";
				$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
				$Num_Rows = mysql_num_rows($objQuery); 
				$objQuery  = mysql_query($strSQL);
		 	?>
            <? $i=0;?>
			<? while($objResult = mysql_fetch_array($objQuery)){ ?>
			<tr>
            	<td width="104" class="tbl1">เลือกวิชาที่ต้องการแก้ไข</td>
                <td width="26"  class="tbl1"><center>:</center></td>
         		<td class="tbl1"><input type="radio" name="chk" id="chk" value="<?=$objResult["creditid"]?>"><?=$objResult["subname"]?></td>
         	</tr>
			<? $i++; } ?>
           
            <tr>
                 <td width="104" class="tbl1">ค้นหาวิชาใหม่</td>
                 <td width="26"  class="tbl1"><center>:</center></td>
                 <td width="484" class="tbl1">
                 <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
                 <input type="hidden" name="staffid" value="<?=$_SESSION["stid"]?>"/>
                 <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
                 <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /></td>
                 
             </tr>
             <tr>
                 <td colspan="3"><input type="submit" name="submit" id="submit" class="submit3" value="ตกลง" ></td>
                 <td colspan="5"></td>
             </tr>
            <? 
				$i=1;
				$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
				$objQuery1 = mysql_query($strSQL1);
  				while ($objResult1 = mysql_fetch_array($objQuery1)) {
				if($i==1){}else {} $i++; }
			?>
            
             
           </table>
           </form>
           <? } }?>
           <br></br>
          
           </ul>
           
</div>
      </section>
   </div>
</div>
<!-- footer -->
<footer>
   <div class="container">
      <div class="inside">
         <div class="wrapper">
            <div class="fleft">AJ-TONG <span>www.aj-tong.com</span></div>
            <div class="aligncenter">Website template designed by <a class="new_window" href="http://www.templatemonster.com" target="_blank" rel="nofollow">www.templatemonster.com</a><br/>
               </div>
         </div>
      </div>
   </div>
</footer>
<script type="text/javascript">
function make_autocomname(autoObj,showObj){
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
		return "dataname.php?q=" +encodeURIComponent(this.value);
    });	
}		

function make_autocomsubj(autoObj,showObj){
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
		return "datasubj.php?q=" +encodeURIComponent(this.value);
    });	
}		

make_autocomsubj("show_arti_topic_subj","h_arti_id_subj");
make_autocomname("show_arti_topic_name","h_arti_id_name");
Cufon.now(); 
 </script>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>