<? 
session_start();
include("config.inc.php");

	$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	
	if($_SESSION["stid"]=="")
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
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">  
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>  
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>   
<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
<script language="javascript">

function checkForm(){ 
	if(((document.getElementById("show_arti_topic_name").value).length) == 0 ){
		alert("กรุณากรอกชื่อ-นามสุกล");
		return false;
	}
	if(((document.getElementById("show_arti_topic_subj").value).length) == 0 ){
		alert("กรุณาเลือกวิชา");
		return false;
	}
	if(((document.getElementById("status").value)) == 0 ){
		alert("กรุณาเลือกสถานที่");
		return false;
	}
	if(((document.getElementById("totalcredit").value)) == 0 ){
		alert("กรุณาเลือกชั่วโมงเรียน");
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
	
}

</script>
<script type="text/javascript">  
$(function(){  
    // แทรกโค้ต jquery  
    $("#date").datepicker({ dateFormat: 'yy-mm-dd',minDate: 0 });
	$("#edate").datepicker({ dateFormat: 'yy-mm-dd',minDate: 0 });
});  
</script>
<style type="text/css">  
.ui-datepicker{  
    width:180px;  
    font-family:tahoma;  
    font-size:11px;  
    text-align:center;  
}  
</style>  
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/addaccountself.png) no-repeat left top;
}
</style>

</head>
<body id="page1">
<div class="wrap">
   <!-- header -->
   <header>
      <div class="container">
         <h1><a href="index.html">Student's site</a></h1>
         <nav>
            <ul>
               <li ><a href="home.php" class="m1">Home</a></li>
               <li><a href="addstudent.php" class="m2">STUDENT</a></li>
               <li><a href="coursemanage.php" class="m3">COURSE</a></li>
               <li><a href="viewseat.php" class="m4">SEAT</a></li>
               <li class="last current"><a href="exp.php" class="m5">Trial</a></li>
            </ul>
         </nav>
          <form action="viewall.php" id="search-form" method="post">
            <fieldset>
            <div class="rowElem">
               <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
               <a href="#" onClick="document.getElementById('search-form').submit()">Search</a></div>
            </fieldset>
         </form>
      </div>
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
		return "data.php?q=" +encodeURIComponent(this.value);
    });	
}	
 
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");
</script>
   </header>
   <div class="container">
      <!-- aside -->
      <aside>
         <h3>MENU</h3>
         <ul class="categories">
             <li><span><a href="exp.php">ทดลองเรียน S.E.L.F</a></span></li>
            <li class="last"><span><a href="trial.php">ชดเชยระบบ S.E.L.F</a></span></li>
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
		 include("config.inc.php");
		 $strSQL = "SELECT * FROM even order by ideven desc";
		 $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		 while($objResult = mysql_fetch_array($objQuery))
         {
		 ?>
            <li><strong><?=$objResult["date"];?></strong>
               <h4><a href="#"><?=$objResult["teven"];?></a></h4>
               <?=$objResult["even"];?> </li>
               <?
		 }
		 ?>
         </ul>
      </aside>
      <!-- content -->
      <? 
		$strSQL1 = "SELECT * FROM counter3";
		$objQuery1 = mysql_query($strSQL1);
		$objResult1 = mysql_fetch_array($objQuery1);
		$c=$objResult1["count"];
		$c++;
		$strSQL = "UPDATE counter3 SET ";
			$strSQL .="count = '$c' ";
			$objQuery = mysql_query($strSQL);
			if(!$objQuery)
			{
				echo "Error Update [".mysql_error()."]";
			}
		?>
      <section id="content">
        <div id="sss"></div>
         <div class="inside">
         <form name="studentForm" method="post" action="trial2.php" onSubmit="return checkForm();">
          <?
		  	$strSQL = "SELECT * FROM counter3";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$objResult = mysql_fetch_array($objQuery);
			$counter=$objResult["count"];
			$fix="BT";
			for($i=0;$i<3-strlen($counter);$i++){
				$fix=$fix."0";
				}
				$fix=$fix.$objResult["count"];
            ?>
           <table width="100%" border="1">
             <tr>
               <td width="117" height="35">Username :</td>
               <td colspan="4"><label for="namestu"></label>
               <input type="hidden" name="staffid" value="<?=$_SESSION["stid"]?>"/>
               <input type="text" name="account" id="account" value="<?=$fix; ?>" readonly></td>
             </tr>
             <tr>
             <? $random = substr(number_format(time() * rand(), 0, '', ''), 0, 5); ?>
               <td height="35">Password:</td>
               <td colspan="4"><input type="text" name="password" id="password" value="<?=$random; ?>" readonly></td>
             </tr>
             <tr>
               <td width="117" height="35">ค้นหาชื่อ-นามสกุล:</td>
               <td colspan="4">
                 <input name="show_arti_topic_name" type="text" id="show_arti_topic_name" size="30" value="<?=$_GET['name'];?>" />
                 <input name="h_arti_id_name" type="hidden" id="h_arti_id_name" value="" />
                 <a href="addstudent2.php?type=trial">เพิ่มรายชื่อ</a><font color="#FF0000" size="-1" > *</font></td>
             </tr>
             <tr>
               <td height="36">ค้นหาวิชา:</td>
               <td colspan="4"><input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
               <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /><font color="#FF0000" size="-1" > *</font></td>
            </tr>
              <!--<tr>
               <td height="39">Startdate:</td>
               <td colspan="4">-->
               <input type="hidden" name="date" id="date" value="<?=date("Y-m-d"); ?> "></td>
            <!--  </tr>
            <tr>
               <td height="39">Enddate</td>
               <td colspan="4"><label for="edate"></label>-->
               <input type="hidden" name="edate" id="edate" value="<?=date("Y-m-d",strtotime("+30 day")); ?>"></td>
             <!--</tr>-->
             <tr>
               <td height="39">วันที่โอน :</td>
               <td colspan="4"><label for="date_pay"></label>
               <input type="date" name="date_pay" id="date_pay" value=""></td>
               </tr>
             <tr>
               <td height="38">เรียนที่ :</td>
               <td colspan="4"> 
               <select name="status" id="status">
            		   <option value="0"  disabled="disabled" selected="selected">เลือก</option>
                       <option value="1">เรียนได้ทุกสาขา</option>
                       <option value="2">เฉพาะวงเวียนใหญ่</option>
                       <option value="3">เฉพาะวิสุทธิ</option>
                       <option value="6">เฉพาะสระบุรี</option>
                       <option value="7">เฉพาะชลบุรี</option>
                       <option value="8">เฉพาะราชบุรี</option>
               </select><font color="#FF0000" size="-1" > *</font>                 
               </td>
             </tr>
             <tr>
               <td width="117" height="38">จำนวนชั่วโมง:</td>
               <td colspan="4">
                 <select name="totalcredit" id="totalcredit" >
                       <option value="0" disabled="disabled" selected="selected">เลือก</option>
                       <option value="4">2 ชั่วโมง</option>
                       <option value="8">4 ชั่วโมง</option>
                       <option value="12">6 ชั่วโมง</option>
               </select>
               </td>
             </tr>
             <tr>
                 <td width="117" height="39">จ่ายเงินโดย:</td>
                 <td colspan="4">
                 <input name="type_pay" type="radio" value="transfer" class="input4" checked="checked" />โอน&nbsp;			
                 <input name="type_pay" type="radio" value="cradit" class="input4" /> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" /> เงินสด 
                 <? if($objResult99['status'] == 'admin' && $objResult99['stid'] = 2) {?>
                 <input name="type_pay" type="radio" value="free" class="input4" /> ฟรี 
                 <? } ?>
                 <font color="#FF0000"> * กรณีเงินสดไม่ต้องกรอกหมายเลขใบชำระ</font></td>
             </tr>
             <tr>
                 <td width="117" height="39">รหัสคอร์สที่โอน:</td>
                 <td colspan="4"><input type="text" name="codetransfer" id="codetransfer" size="10"><font color="#FF0000"> * กรอกรหัสคอร์สที่โอน ตย.HA0101</font></td>
             </tr>
             <tr>
                 <td width="117" height="39">หมายเลขใบชำระ:</td>
                 <td colspan="4"><input type="text" name="Invoicenumber" id="Invoicenumber" ><font color="#FF0000"> * เลขสลิปโอน ตย.0880-98001 /บัตรเคดิต ตย.000000001229 </font></td>
             </tr>
             <tr>
                 <td width="117" height="39">จำนวนเงิน:</td>
                 <td colspan="4"><input type="text" name="amount" id="amount"   size="10">บาท <font color="#FF0000"> *กรอกเฉพาะตัวเลข ตย. 3500</font></td>
             </tr>
             <? if($objResult99['status'] == 'admin' && $objResult99['stid'] = 2) {?>
             <tr>
                 <td width="117" height="39">หมายเลขใบคำร้อง</td>
                 <td colspan="4"><input type="text" name="noptt" id="noptt"  size="10"> <font color="#FF0000"></font></td>
             </tr>
             <tr>
                 <td width="117" height="53">ผู้ร้องขอ</td>
                 <td colspan="4">
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
             <? }?>
             <tr>
               <td></td>
               <td width="62" height="50"><input type="image" name="submit" id="submit" src="images/121.png" >SAVE</td>
               <td width="20">&nbsp;</td>
               <td width="81" height="50"><a href="javascript:document.frmMain.reset()"><img src="images/129.png" width="48" height="48"></a></td>
               <td width="95">&nbsp;</td>
               <td width="94">&nbsp;</td>
             </tr>
           </table>
           </form>
          
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
            <div class="aligncenter">จองเวลาเรียน <a class="new_window" href="http://www.aj-tongmath.com" target="_blank" rel="nofollow">www.aj-tongmath.com</a><br/>
               คณิตศาสตร์ อ.โต้ง <a class="new_window" href="http://www.aj-tong.com" target="_blank" rel="nofollow">www.aj-tong.com</a></div>
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
</body>
</html>