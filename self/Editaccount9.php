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
<script language="javascript">
function fncConfirm1()
{
if(confirm('Goto 1')==true)
{
document.frm1.submit();
}
else 
{}
}
</script>
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/editstudent.png) no-repeat left top;
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
                <li><a href="home.php" class="m1">Home</a></li>
               <li><a href="addstudent.php" class="m2">STUDENT</a></li>
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
               <a href="#" onclick="document.getElementById('search-form').submit()">Search</a></div>
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
            <li><span><a href="searchstudent.php">ค้นหาข้อมูลนักเรียน</a></span></li>
            <li><span><a href="addstudent.php">เพิ่มนักเรียนใหม่</a></span></li>
            <!--<li><span><a href="addstudent9.php">เพิ่มนักเรียนใหม่(ชั้น9 โปรโมชั่น)</a></span></li>-->
            
            <li><span><a href="manageaccount.php">เพิ่มaccount</a></span></li>
            <li><span><a href="shirt_search.php">รับเสื้อนักเรียน</a></span></li>
            <li><span><a href="book_search.php">รับหนังสือ</a></span></li>
            <li><span><a href="credit_time_search.php">ขยายเวลา/เพิ่มเครดิต(free)</a></span></li>
            <li><span><a href="credit_time_search2.php">ขยายเวลา/เพิ่มเครดิต(คิดค่าบริการ)</a></span></li>
             <? if($objResult99['status'] == 'admin') {?>
            <!--<li class="last"><span><a href="results_account.php">สรุปรายงาน account</a></span></li>-->
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
         <div class="inside">
         <?
			$strSQL = "SELECT * FROM account WHERE accid = ".$_GET["accid"]." ";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$Num_Rows = mysql_num_rows($objQuery); 
			$objResult = mysql_fetch_array($objQuery);?>
            
         <form action="saveacc.php?accid=<?=$_GET["accid"];?>" method="post" name="frm1">
          + admin 
          <table width="600" border="1">
             <tr>
               <td width="160" height="35">Username :</td>
               <td colspan="3">
               <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
               <input type="hidden" name="staffid" value="<?=$_SESSION["stid"]?>"/>
               <input type="text" name="username" id="username" value="<?=$objResult["username"]?>"></td>
               <td width="183" rowspan="5"></td>  
             </tr>
             <tr>
               <td height="35">Password :</td>
               <td colspan="3">
               <input type="text" name="password" id="password" value="<?=$objResult["password"]?>"></td>
             </tr>
             <tr>
               <td height="35">วันเริ่ม :</td>
               <td colspan="3"><input type="text" name="sdate" id="sdate" value="<?=$objResult["sdate"]?>" /></td>
             </tr>
             <tr>
               <td height="35">วันหมดอายุ :</td>
               <td colspan="3"><input type="text" name="edate" id="edate" value="<?=$objResult["edate"]?>" /></td>
             </tr>
             <tr>
               <td height="35">เครดิตคงเหลือ :</td>
               <td colspan="3"><input type="text" name="totalcredit" id="totalcredit" value="<?=$objResult["totalcredit"]?>" /></td>
             </tr>
             <tr>
               <td height="35">ที่เรียน :</td>
               <td colspan="3">
                 <select name="status" id="status" >
                 <option value="<?=$objResult["status"]?>" selected>
				 <? if($objResult["status"]==1){?>เรียนได้ทุกสาขา<? }
				 else if($objResult["status"]==2){ ?>เฉพาะวงเวียนใหญ่<? } 
				 else if($objResult["status"]==3) { ?>เฉพาะวิสุทธานี<? } 
				 else if($objResult["status"]==6){ ?> เฉพาะสระบุรี <?  } 
                 else if($objResult["status"]==7){ ?>เฉพาะชลบุรี<? } 
				 else if($objResult["status"]==8) { ?>เฉพาะราชบุรี<? }?>
                 </option>
                 <option value="1">เรียนได้ทุกสาขา</option>
                 <option value="2">เฉพาะวงเวียนใหญ่</option>
                 <option value="3">เฉพาะวิสุทธิ</option> 
                 <option value="6">เฉพาะสระบุรี</option>
                 <option value="7">เฉพาะชลบุรี</option>
                 <option value="8">เฉพาะราชบุรี</option>
               </select></td>
             </tr>
              <?
				$strSQL1 = "SELECT * FROM credit WHERE accid = '".$objResult["accid"]."'";
				$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
				$objResult1 = mysql_fetch_array($objQuery1);
				
				$strSQL2 = "SELECT * FROM account WHERE accid = '".$objResult["accid"]."'";
				$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				$studentid = $objResult2['studentid'];
				//echo $studentid;
				?>
                <input type="hidden" name="studentid" value="<?=$studentid?>"/>
             <!--<tr>
                 <td width="117" height="53">จ่ายเงินโดย:</td>
                 <td colspan="3">
                 <input name="type_pay" type="radio" value="transfer" class="input4" <? if($objResult1["type_pay"]=='transfer'){?>checked="checked" <? } ?> />โอน&nbsp;			
                 <input name="type_pay" type="radio" value="cradit" class="input4" <? if($objResult1["type_pay"]=='cradit'){?> checked="checked" <? } ?>/> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" <? if($objResult1["type_pay"]=='money'){?> checked="checked" <? } ?>/> เงินสด 
                 <input name="type_pay" type="radio" value="free" class="input4" <? if($objResult1["type_pay"]=='free'){?> checked="checked" <? } ?>/> ฟรี
                 </td>
             </tr>-->
             <tr>
               <td width="122" height="52">&nbsp;</td>
               <td><a href="JavaScript:if(confirm('ยืนยันการแก้ไข?')==true){document.frm1.submit();}"><input type="image" name="submit" id="submit" src="images/131.png" ></a>SAVE</td>
               <td><a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>" style="text-decoration:none"><img src="images/129.png" ></a></td>
               <td width="-1">&nbsp;</td>
             </tr>
             <tr>
               <td></td>
               <td width="63">&nbsp;</td>
               <td width="103" height="50">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
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
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>