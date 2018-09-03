<? 
session_start();
include("config.inc.php");
	$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	if($_SESSION["stid"] == " ")
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
	
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate));
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>S.E.L.F</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
	background:url(images/infostudent.png) no-repeat left top;
}
#hh{
	font-size:10px;
	color:#666;
	font-family:Tahoma, Geneva, sans-serif;
}
a:link {
	color: #0099FF;
}
</style>
<script language="javascript">
function chk_null(){
	if (document.addstudentForm.sub.value == 0){
		alert("กรุณากรอกจำนวน")
		document.addstudentForm.sub.focus()
		return false
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
         
      </div>
   </header>
   <div class="container">
      <!-- aside -->
      <aside>
         <h3>MENU</h3>
         <ul class="categories">
            <li><span><a href="searchstudent.php">ค้นหาข้อมูลนักเรียน</a></span></li>
            <li><span><a href="addstudent.php">เพิ่มนักเรียนใหม่</a></span></li>
            <!--<li><span><a href="addstudent9.php">เพิ่มนักเรียนใหม่(ชั้น9 โปรโมชั่น)</a></span></li>-->
            
            <li><span><a href="manageaccount.php">เพิ่มaccount</a></span></li>
            <li><span><a href="shirt_search.php">รับเสื้อนักเรียน</a></span></li>
            <li><span><a href="shirt_search.php">รับหนังสือ</a></span></li>
            <li><span><a href="credit_time_search.php">ขยายเวลา/เพิ่มเครดิต(free)</a></span></li>
            <li><span><a href="credit_time_search2.php">ขยายเวลา/เพิ่มเครดิต(คิดค่าบริการ)</a></span></li>
             <? if($objResult99['status'] == 'admin') {?>
           <!-- <li class="last"><span><a href="results_account.php">สรุปรายงาน account</a></span></li>-->
            <? } ?>
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
      <section id="content">
        <div id="sss"></div>
         <div class="inside"><div align="center">
         <form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
         <label >ค้นหารายชื่อ:</label>
              <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
              <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
              <button type="submit" name="button" id="button" class="submit2" >ค้นหา</button>
  		</form>
		</div>
		<?
        if($_GET["Action"] == "Del")
        {
            $strSQL = "DELETE FROM account ";
            $strSQL .="WHERE accid = '".$_GET["accid"]."' ";
            $objQuery = mysql_query($strSQL);
            if(!$objQuery)
            {
                echo "Error Delete [".mysql_error()."]";
            }
            //header("location:$_SERVER[PHP_SELF]");
            //exit();
        }
        if($_GET["h_arti_id"] != ""){

            $strSQL = "SELECT * FROM student WHERE name = '".$_GET["h_arti_id"]."'";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$objResult = mysql_fetch_array($objQuery);
			$std = $objResult["studentid"];
			$stdname = $objResult["name"];
			
			
			$statusout = "out";
			$strSQL2 = "SELECT * FROM account WHERE studentid = ".$std." AND status != '".$statusout."' ";
			$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
			$l = 1;

            ?>
    <br>
    <div align="right"><font color="#0099FF">*ขยายเวลาฟรี 14 วัน /ขยายเคดิตฟรี 4 ชม. หรือ 8 เคดิต</font></div>
    <p></p>
    <table cellpadding="0" cellspacing="1" width="100%">
	  <tr>
      	<th width="75" class="tbl2" style="white-space: nowrap;">Acc.</th>
        <th width="122" class="tbl2" style="white-space: nowrap;">Username</th>
		<th width="293" class="tbl2" style="white-space: nowrap;"> ชื่อ-นามสกุล</th>
        <th width="264" class="tbl2" style="white-space: nowrap;"> คอร์ส</th>
		<th width="102" class="tbl2" style="white-space: nowrap;"> ขยายเวลา</th>
        <th width="75" class="tbl2" style="white-space: nowrap;"> เพิ่มเครดิต</th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery2))
	{
		$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$objResult["accid"]."' AND subject.status = '1' ";
		$objQuery1 = mysql_query($strSQL1);
		
	?>
	   <tr>
       	<td width="75" class="tblyy"><center><?=$l++;?></center></td>
       	<td width="122" class="tblyy"><center><?=$objResult["username"];?></center></td>
		<td width="293" class="tblyy"><center><?=$stdname;?></center></td>
       
        <td width="264" style="white-space:nowrap;" class="tblyy">
		<?php $n = 1; while($objResult1 = mysql_fetch_array($objQuery1)){echo $n++." ) ".$objResult1["subname"]."<br><br>";}?>
        </td>
        <td width="102" class="tblyy"><div align="center">
			<? 
				$objQuery_ckTime = mysql_query($strSQL1);
				while($objResult_ckTime = mysql_fetch_array($objQuery_ckTime)){
					if($objResult_ckTime["events_add_time"]=="0"){
						?><a href="credit_time_edit.php?accid=<?=$objResult["accid"];?>&action=addtime&studenname=<?=$stdname?>&creditid=<?=$objResult_ckTime["creditid"]?>" onclick="return confirm('กรุณายืนยันการขยายเวลาอีกครั้ง !!!')" ><img src="images/clock.png"width="15" height="15"></a>
					<? }else{ echo "ขยายแล้ว";}?><br><br>
            <? }?>
        </div></td>
        <td width="75" class="tblyy"><div align="center">
			<? 
				$objQuery_ckCredit = mysql_query($strSQL1);
				while($objResult_ckCredit = mysql_fetch_array($objQuery_ckCredit)){
					if($objResult_ckCredit["events_add_credit"]=="0"){
						?><a href="credit_time_edit.php?accid=<?=$objResult["accid"];?>&action=addcredit&studenname=<?=$stdname?>&creditid=<?=$objResult_ckCredit["creditid"]?>" onclick="return confirm('กรุณายืนยันการเพิ่มเครดิตอีกครั้ง !!!')" ><img src="images/credit.png"width="15" height="15"></a>
					<? }else{ echo "เพิ่มแล้ว";}?><br><br>
        <? }?>
        </div></td>
       </tr>
	<? }?>
	</table>
    <? } ?>
    
           
</div></div>
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
               3D Models provided by <a class="new_window" href="http://www.templates.com/product/3d-models/" target="_blank" rel="nofollow">www.templates.com</a></div>
         </div>
      </div>
   </div>
</footer>
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
</script><script type="text/javascript"> Cufon.now(); </script>
</body>
</html>