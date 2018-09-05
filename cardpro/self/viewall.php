<? 
session_start();
include("../config.inc.php");
include("funtion.php");
	$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysqli_query($con_ajtongmath_self,$strSQL99);
	$objResult99 = mysqli_fetch_array($objQuery99);
	if($_SESSION["stid"] == "")
	{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('Please Login!!');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
		exit();
	}
	$strSQLbranch = "SELECT * FROM branch WHERE branchid = '".$objResult99["branchid"]."'";
	$objQuerybranch = mysqli_query($con_ajtongmath_self,$strSQLbranch);
	$objResultbranch = mysqli_fetch_array($objQuerybranch);
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
	background:url(images/infostudent.png) no-repeat left top;
}
</style>
<!--[if lt IE 7]>
     <link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="screen">
     <script type="text/javascript" src="js/ie_png.js"></script>
     <script type="text/javascript">
        ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');
     </script>
<![endif]-->
<!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
</head>
<?php
function DateThai($strDate)
						{
						$strYear = date("Y",strtotime($strDate))+543;
						$strMonth= date("n",strtotime($strDate));
						$strDay= date("j",strtotime($strDate));
						$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
						$strMonthThai=$strMonthCut[$strMonth];
						return "$strDay $strMonthThai $strYear";
						}
?>
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
            <li><span><a href="addstudent.php">เพิ่มนักเรียนใหม่</a></span></li>
            <!--<li><span><a href="addstudent9.php">เพิ่มนักเรียนใหม่(ชั้น9 โปรโมชั่น)</a></span></li>-->
            <li><span><a href="searchstudent.php">ค้นหาข้อมูลนักเรียน</a></span></li>
            <li><span><a href="manageaccount.php">เพิ่มaccount</a></span></li>
            <li><span><a href="shirt_search.php">รับเสื้อนักเรียน</a></span></li>
            <li><span><a href="shirt_search.php">รับหนังสือ</a></span></li>
            <li><span><a href="credit_time_search.php">ขยายเวลา/เพิ่มเครดิต(free)</a></span></li>
            <li><span><a href="credit_time_search2.php">ขยายเวลา/เพิ่มเครดิต(คิดค่าบริการ)</a></span></li>
             <? if($objResult99['status'] == 'admin') {?>
            <li class="last"><span><a href="results_account.php">สรุปรายงาน account</a></span></li>
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
		 include("config.inc.php");
		 $strSQL = "SELECT * FROM even order by ideven desc";
		 $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
		 while($objResult = mysqli_fetch_array($objQuery))
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
         <div class="inside">
      
         <form action="">
           <table width="100%" border="1" class="tbl-border">
             <tr>
               <td height="30" colspan="4"  class="tbl2"><div align="center"><strong>ประวัตินักเรียน</strong></div></td>
             </tr>
             
              <? 	
			  if($_POST["h_arti_id"] != ''){
			  		$strSQL = "SELECT * FROM student WHERE (name LIKE '%".$_POST["h_arti_id"]."%')";
					$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
					$Num_Rows = mysqli_num_rows($objQuery); 
					$objResult = mysqli_fetch_array($objQuery);
					$std = $objResult["studentid"];
					$studenname = $objResult["name"];
			  }else{
				  	$strSQL = "SELECT * FROM student WHERE name = '".$_GET["studenname"]."'";
					$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
					$Num_Rows = mysqli_num_rows($objQuery); 
					$objResult = mysqli_fetch_array($objQuery);
					$std = $objResult["studentid"];
					$studenname = $objResult["name"];
				}
				?>
             <tr>
               <td height="50" class="tblyy"  width="101">ชื่อ</td>
                <td class="tblyy" width="18"><center>:</center></td>
               <td  class="tblyy"  width="358"><?=$objResult["name"]?></td>
               <td width="137" colspan="1" rowspan="1" class="tblyy" >
                               </td>
             </tr>
             <tr>
               <td height="50"  class="tblyy">เบอร์โทรศัพท์</td>
               <td class="tblyy"><center>:</center></td>
               <td   class="tblyy"><?=$objResult["tel"]?></td>
              <td width="137" colspan="1" rowspan="1" class="tblyy" >
             </tr>
             <tr>
               <td height="50"  class="tblyy">รูปภาพ</td>
                <td class="tblyy"><center>:</center></td>
               <td   class="tblyy"><?=$objResult["school"]?></td>
               <td width="137" colspan="1" rowspan="1" class="tblyy" >
             </tr>
             <tr>
               <td height="50"  class="tblyy">โรงเรียน</td>
                <td class="tblyy"><center>:</center></td>
               <td   class="tblyy"><? if($objResult["filename"] != ""){?>
               <img src="<?=$objResult["filename"]?>" height="147" width="116" /><? } else {?><img src="images/no_img.gif" height="146" width="115" /><? } ?></td>
               <td width="137" colspan="1" rowspan="1" class="tblyy" >
             </tr>
                <?
				$statusout = "out";
				$strSQL = "SELECT * FROM account WHERE studentid = '".$std."' AND status != '".$statusout."' ";
				$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
				$Num_Rows = mysqli_num_rows($objQuery); 
				?>
    		<tr>
               <td height="30" colspan="4"  class="tbl2"><div align="center"><strong>Account</strong></div></td>
             </tr>
             
             <? $l=1; while($objResult = mysqli_fetch_array($objQuery)) {?>
             <tr>
               <td height="20" colspan="4" class="tblyy"><div align="left"><strong>Account ที่ <?=$l; $l++;?></strong></div></td>
             </tr>
             <tr>
               <td height="50" class="tblyy">Username</td>
               <td class="tblyy" width="18"><center>:</center></td>
               <td class="tblyy"><?=$objResult["username"]?></td>
               <td colspan="1"  class="tblyy">
			   <a href="viewaccount.php?accid=<?=$objResult["accid"]?>&studenname=<?=$studenname;?>" style="text-decoration:none"><img src="images/46.png" width="33" height="33">จัดการ account</a>
               </td>
             </tr>
            
             <tr>
               <td height="50" class="tblyy">Password</td>
               <td class="tblyy" width="18"><center>:</center></td>
               <td class="tblyy"><?=$objResult["password"]?></td>
               <td colspan="1" class="tblyy">
               <?php if($objResult99['status'] == "admin"){?>
               <a href="delaccount.php?accid=<?=$objResult["accid"]?>&staffid=<?=$_SESSION["stid"]?>" style="text-decoration:none"><img src="images/116.png" width="29" height="29" >ลบ account</a>
               <? } ?>
               </td>
             </tr>
             <?php
				$strSQL11 = "SELECT * FROM staff WHERE stid = '".$objResult["staffid"]."' ";
				$objQuery11 = mysqli_query($con_ajtongmath_self,$strSQL11) or die ("Error Query [".$strSQL11."]");
			 	$objResult11 = mysqli_fetch_array($objQuery11);
				
				$strSQL12 = "SELECT * FROM branch WHERE branchid = '".$objResult11["branchid"]."' ";
				$objQuery12 = mysqli_query($con_ajtongmath_self,$strSQL12) or die ("Error Query [".$strSQL12."]");
			 	$objResult12 = mysqli_fetch_array($objQuery12);
			 ?>
             <tr>
               <td width="101" height="50" class="tblyy">โดย(ออก/แก้ไข) </td>
               <td class="tblyy" width="18"><center>:</center></td>
               <td class="tblyy"><?php if($objResult11["stid"] == 0 ){echo "ไม่ได้เก็บข้อมูล";} else{?> <?=$objResult11["stname"]?> ( สาขา<?=$objResult12["name"];?> )<? }?></td>
               <td colspan="1" height="50"  class="tblyy"></td>
             </tr>

             <tr>
               <td height="50" class="tblyy">วันที่เริ่มเรียน</td>
               <td class="tblyy" width="18"><center>:</center></td>
               <td class="tblyy"><?=DateDMY($objResult["sdate"])?></td>
               <td colspan="1" class="tblyy"></td>
             </tr>
             <tr>
               <td class="tblyy" height="50">วันหมดอายุ</td>
               <td class="tblyy" width="18"><center>:</center></td>
               <td class="tblyy"><?=DateDMY($objResult["edate"])?></td>
               <td colspan="1" height="50" class="tblyy"></td>
             </tr>
             <tr>
               <td height="50" class="tblyy">เครดิตคงเหลือ</td>
               <td class="tblyy" width="18"><center>:</center></td>
               <td class="tblyy"><?=$objResult["totalcredit"]?>&nbsp;&nbsp;(<?=$objResult["totalcredit"]*0.5 ?>&nbsp;ชั่วโมง)
               <? if($objResult["credit_start"] == "0"){}else{?>จากทั้งหมด <?=$objResult["credit_start"]?>(<?=$objResult["credit_start"]*0.5 ?>ชั่วโมง) <? } ?></td>
               <td colspan="1" height="50" class="tblyy"></td>
             </tr>
            <? 
			 	$ff=$objResult["accid"];
				$i=1;
				$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$ff."' ";
				$objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
  				while ($objResult1 = mysqli_fetch_array($objQuery1)) {
				if($i==1){
				?> 
             <tr>
               <td width="101" height="50" class="tblyy">วิชาที่เรียน</td>
               <td class="tblyy" width="18"><center>:</center></td>
               <td class="tblyy"><?=$i; ?>. <?=$objResult1["subname"]?></td>
               <td colspan="1" height="50"  class="tblyy">
               </td>
             </tr>
             
             <? } else {?>
              <tr>
               <td width="101" height="50" class="tblyy"></td>
               <td class="tblyy" width="18"><center>:</center></td>
               <td class="tblyy"><?=$i; ?>. <?=$objResult1["subname"]?></td>
               <td colspan="1" class="tblyy"> 
               </td>
             </tr>
              <? } ?>
              
             <? $i++; } 
			 $strSQL2 = "SELECT * FROM reserve where accid = '".$objResult["accid"]."' order  by reservid DESC";
				$objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2);
				$j=1;
				while ($objResult2 = mysqli_fetch_array($objQuery2)){
					if($objResult2["section"]!=0){
						$time7 = 8 + floor(($objResult2["section"]-1)/2); 
							
							if($objResult2["section"]%2==1){$min7="00";}else{$min7="30";}
							
							$time8 = 8 + ceil(($objResult2["section"]-1)/2); 
							
							if($objResult2["section"]%2==1){$min8="30";}else{$min8="00";}
					}else{
							$time7 = 8 + floor(($objResult2["section_s"]-1)/2); 
							
							if($objResult2["section_s"]%2==1){$min7="00";}else{$min7="30";}
								  
							$time8 = 8 + floor(($objResult2["section_e"]-1)/2); 
							
							if($objResult2["section_e"]%2==1){$min8="00";}else{$min8="30";}
					}
					$datenew=$objResult2["time"];?>
                
			 <tr>
             
               <td width="101" height="50" class="tblyy"><? if($j==1){?>เวลาที่จอง<? } ?></td>
               <td class="tblyy" width="18"><center>:</center></td>
               <td class="tblyy">วันที่<?=DateThai($objResult2["time"])?> เวลา<?=$time7;?>:<?=$min7?>-<?=$time8;?>:<?=$min8?> 
                <? if($objResult2["branchid"]==1){ ?>(พญาไท)<? } ?>
                <? if($objResult2["branchid"]==2){ ?>(วงเวียนใหญ่)<? } ?>
				<? if($objResult2["branchid"]==3){ ?>(วิสุทธิธานี)<? } ?>
				<? if($objResult2["branchid"]==4){ ?>(พญาไทยชั้น2)<? } ?>
				<? if($objResult2["branchid"]==5){ ?>(พญาไทชั้น9)<? } ?>
				<? if($objResult2["branchid"]==6){ ?>(สระบุรี)<? } ?>
				<? if($objResult2["branchid"]==7){ ?>(ชลบุรี)<? } ?>
				<? if($objResult2["branchid"]==8){ ?>(ราชบุรี)<? } ?></td>
               <td colspan="1" height="50" class="tblyy"></td>
             </tr>
			
		<?	$j++; }} ?>
          <!--     <tr>
               <td width="107" height="52">&nbsp;</td>
               <td >&nbsp;</td>
             </tr>
           <tr>
               <td></td>
               <td width="378">&nbsp;</td>
               <td width="0">&nbsp;</td>
               <td width="141">&nbsp;</td>
             </tr>-->
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
</body>
</html>