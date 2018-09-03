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
	
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strYear = substr($strYear, 2, 2);
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

<SCRIPT LANGUAGE="JavaScript">
function checkForm(){ 
	if(((document.getElementById("date").value).length) == 0 ){
		alert("กรุณาเลือกช่วงเวลา");
		return false;
	}
	if(((document.getElementById("edate").value).length) == 0 ){
		alert("กรุณาเลือกช่วงเวลา");
		return false;
	}
	if(((document.getElementById("status").value)) == 0 ){
		alert("กรุณาเลือกสาขา");
		return false;
	}

}



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
	background:url(images/addaccount.png) no-repeat left top;
}
#hh{
	font-size:11px;
	color:#666;
	font-family:Tahoma, Geneva, sans-serif;
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
		 $strSQL_even = "SELECT * FROM even order by ideven desc";
		 $objQuery_even = mysql_query($strSQL_even) or die ("Error Query [".$strSQL_even."]");
		 while($objResult_even = mysql_fetch_array($objQuery_even)){?>
         	<li><strong><?=$objResult_even["date"];?></strong><h4><a href="#"><?=$objResult_even["teven"];?></a></h4><?=$objResult_even["even"];?> </li>
         <? }?>
         </ul>
      </aside>
      <!-- content -->

      <section id="content">
        <div id="sss"></div>
         <div class="inside2">
         <form name="Form1" method="get" action="results_account.php" onSubmit="return checkForm();">
           <table width="100%" border="1">
             <tr>
               <td height="39">ตั้งแต่:</td>
               <td colspan="4"><input type="date" name="sdate" id="sdate" value="<?=$_GET["sdate"]?>"></td>
             </tr>
             <tr>
               <td height="39">ถึงวันที่:</td>
               <td colspan="4"><input type="date" name="edate" id="edate" value="<?=$_GET["edate"]?>"></td>
             </tr>
             <tr>
               <td width="117" height="39">เลือกสาขา:</td>
               <td colspan="4">
               <? $strSQL1 = "SELECT * FROM branch";
				  $objQuery1 = mysql_query($strSQL1);?>
                	<select name="status" id="status">
                        <? if($_POST["status"]==""){?><option value="00" selected="selected">เลือกสาขา</option><? }?>
                        <option value="00" <? if($_GET["status"]=="00"){?>selected="selected"<? }?>>ทุกสาขา</option>
                        <? while ($objResult1 = mysql_fetch_array($objQuery1)){?>
                        <option value="<?=$objResult1["branchid"]?>" <? if($objResult1["branchid"]==$_GET["status"]){?>selected="selected"<? }?>><?=$objResult1["name"]?></option>
                   		<? } ?>
                 	</select>
               </td>
             </tr>
             <tr>
               <td height="39"></td>
               <td colspan="4"><input type="submit" name="submit" id="submit" value="ค้นหา"></td>
             </tr>
             
           </table>
           </form>
           
           <br><br>
           <? if($_GET["sdate"]!=""&&$_GET["edate"]!=""){?>
           <form name="Form2" method="get" action="results_account.php" >
           <table width="100%" border="1">
           <tr>
               <td width="117" height="39" class="tbl2">ค้นหาชื่อคอร์ส:</td>
               <td class="tbl2" height="39">
                   <?
				   	if($_GET["h_arti_id_subj"]!=""){
				   		$objQuery_TpSj = mysql_query("SELECT * FROM subject WHERE subid = '".$_GET["h_arti_id_subj"]."'");
				 		$objResult_TpSj = mysql_fetch_array($objQuery_TpSj);
				 	}
                   ?>
                   <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="<?=$objResult_TpSj["subname"]?>" />
                   <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="<?=$_GET["h_arti_id_subj"]?>" />
                   <input name="sdate" type="hidden" id="sdate" value="<?=$_GET["sdate"]?>" />
                   <input name="edate" type="hidden" id="edate" value="<?=$_GET["edate"]?>" />
                   <input name="status" type="hidden" id="status" value="<?=$_GET["status"]?>" />
                   <input type="submit" name="submit" id="submit" value="ค้นหา">
               </td>
            </tr>
            </form>
            
            <form name="Form3" method="get" action="results_account.php" >
            <tr>
               <td width="117" height="39" class="tbl2">ค้นหาตามประเภทจ่าย:</td>
               <td class="tbl2" height="39">
                 <select name="type_pay" id="type_pay">
                     <? if($_GET["type_pay"]==""){?><option value="0" disabled="disabled" selected="selected">เลือก</option><? }?>
                     <option value="transfer" <? if($_GET["type_pay"]=="transfer"){?>selected="selected"<? }?>>โอน</option>
                     <option value="cradit" <? if($_GET["type_pay"]=="cradit"){?>selected="selected"<? }?>>บัตรเครดิต</option>
                     <option value="test" <? if($_GET["type_pay"]=="test"){?>selected="selected"<? }?>>ทอดลองเรียนฟรี</option>
                 </select>
                 <input name="sdate" type="hidden" id="sdate" value="<?=$_GET["sdate"]?>" />
                 <input name="edate" type="hidden" id="edate" value="<?=$_GET["edate"]?>" />
                 <input name="status" type="hidden" id="status" value="<?=$_GET["status"]?>" />
                 <input type="submit" name="submit" id="submit" value="ค้นหา">
                  </td>
           </tr>
           </table>
           </form>
           <? }?>
           <br><br>
        
           <? if($_GET["sdate"]!=""&&$_GET["edate"]!=""){?>
           
<?
$sdate = $_GET["sdate"];
$edate = $_GET["edate"];
$status = $_GET["status"];
$h_arti_id_subj = $_GET["h_arti_id_subj"];
$type_pay = $_GET["type_pay"];

$num = 0;
$strSQL = "
SELECT a.accid
, a.studentid
, a.username
, a.password
, a.sdate
, a.edate
, a.staffid
, s.stname
, c.subid
, c.type_pay
, c.amount
FROM account a
INNER JOIN credit c
    on a.accid = c.accid
INNER JOIN staff s
    on c.staffid = s.stid
WHERE c.date_regis between '".$sdate."' AND '".$edate."'
";
if($status!="00"){
	$strSQL .= " AND s.branchid = '".$status."'";
}
if($h_arti_id_subj!=""){
	$strSQL .= " AND c.subid = '".$h_arti_id_subj."'";
}
if($type_pay!=""){
	$strSQL .= " AND c.type_pay = '".$type_pay."'";
}

$objQuery = mysql_query($strSQL);
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 50;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by a.accid ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>   
		   <table width="100%" border="1">
           <tr>
              <td colspan="9" class="tbl2" style="white-space: nowrap;"><div align="center"><strong>สรุปรายงาน Account ระบบเรียน S.E.L.F</strong></div></td>
           </tr>
           <tr>
              <td colspan="9" class="tbl2" style="white-space: nowrap;"><div align="center"><strong>
              จำนวน <font color="#3366FF"> <?= $Num_Rows;?> </font> Account ตั้งแต่วันที่ <font color="#3366FF"><?=DateThai($_GET["sdate"])?></font> ถึงวันที่ <font color="#3366FF"><?=DateThai($_GET["edate"])?></font>  สาขา  <font color="#3366FF">
              <?
			  if($_GET["status"]=="00"){echo "ทุกสาขา";}
			  else{
			  	 $objQuery_bns = mysql_query("SELECT * FROM branch WHERE branchid = '".$_GET["status"]."'");
				 $objResult_bns = mysql_fetch_array($objQuery_bns);
				 echo $objResult_bns["name"];
			  }
			  ?>
              </font></strong></div></td>
           </tr>
           
           <tr>
              <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ลำดับ</strong></div></td>
              <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ชื่อ-นามสกุล</strong></div></td>
              <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>Username</strong></div></td>
              <!--<td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>password</strong></div></td>-->
              <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ชื่อคอร์สเรียน</strong></div></td>
              <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ราคา</strong></div></td>
              <!--<td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>วันที่เริ่มเรียน</strong></div></td>
              <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>วันที่หมดอายุ</strong></div></td>-->
              <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>จ่ายโดย</strong></div></td>
              <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ออกโดย</strong></div></td>
            </tr>

<? 	$sumamount = 0;
	while($objResult = mysql_fetch_array($objQuery)){
		$num++;
		
?>

            <tr>
              <td width=""  class="tblyy" style="white-space: nowrap;"><div align="center"><?=$num+(($Page-1)*$Per_Page)?></div></td>
              <td width=""  class="tblyy" style="white-space: nowrap;">
			  <?
			  	$objQuery_stname = mysql_query("SELECT name FROM student WHERE studentid = '".$objResult["studentid"]."'");
				$objResult_stname = mysql_fetch_array($objQuery_stname);
				echo $objResult_stname["name"];
			  ?></td>
              <td width=""  class="tblyy" style="white-space: nowrap;"><?=$objResult["username"]?></td>
             <!-- <td width=""  class="tblyy" style="white-space: nowrap;"><div align="center"><?=$objResult["password"]?></div></td>-->
              <td width=""  class="tblyy" style="white-space: nowrap;">
			  <?
			  	$objQuery_subname = mysql_query("SELECT subname FROM subject WHERE subid = '".$objResult["subid"]."'");
				$objResult_subname = mysql_fetch_array($objQuery_subname);
				echo $objResult_subname["subname"];
			  ?></td>
              <td width=""  class="tblyy" style="white-space: nowrap;"><div align="center"><?=number_format($objResult["amount"])?></div></td>
              <!--<td width=""  class="tblyy" style="white-space: nowrap;"><div align="center"><?=DateThai($objResult["sdate"])?></div></td>
              <td width=""  class="tblyy" style="white-space: nowrap;"><div align="center"><?=DateThai($objResult["edate"])?></div></td>-->
              <td width=""  class="tblyy" style="white-space: nowrap;"><div align="center"><?=$objResult["type_pay"]?></div></td>
              <td width=""  class="tblyy" style="white-space: nowrap;"><div align="center"><?=$objResult["stname"]?></div></td>
            </tr>
 <? $sumamount = $sumamount + $objResult["amount"];}if($Num_Rows>0){?>           
            <tr>
              <td colspan="9" class="tblyy" style="white-space: nowrap;"><div align="right">รวมเป็นเงิน = <font color="#DD0000" ><?=number_format($sumamount)?> </font>บาท</div></td>
            </tr>
            <tr>
              <td colspan="9" class="tblyy" style="white-space: nowrap;"><div align="center"><input type="submit" name="submit" id="submit" value="พิมพ์"></div></td>
           </tr>
<? }if($Num_Rows==0){?>
			<tr>
            	<td colspan="10" class="tblyy" style="white-space: nowrap;"><div align="center"><font color="#FF0000">ไม่พบข้อมูล</font></div></td>
            </tr>
<? }?>
           </table>

<br>
Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
<?
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&sdate=$sdate&edate=$edate&status=$status&h_arti_id_subj=$h_arti_id_subj&type_pay=$type_pay'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&sdate=$sdate&edate=$edate&status=$status&h_arti_id_subj=$h_arti_id_subj&type_pay=$type_pay'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&sdate=$sdate&edate=$edate&status=$status&h_arti_id_subj=$h_arti_id_subj&type_pay=$type_pay'>Next>></a> ";
}
//mysql_close($objConnect);
?>

           <? }?>
           
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
		return "dataname.php?q=" +encodeURIComponent(this.value);
    });	
}		

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
		return "datasubj.php?q=" +encodeURIComponent(this.value);
    });	
}		

make_autocomsubj("show_arti_topic_subj","h_arti_id_subj");
make_autocomname("show_arti_topic_name","h_arti_id_name");
Cufon.now(); </script>
</body>
</html>