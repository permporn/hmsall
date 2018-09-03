<? 
session_start();
include("config.inc.php");
$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	if($_SESSION["stid"]=="")
	{echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('Please Login!!');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
			exit();
		}
	if($_POST["idyear"] != "" && $_POST["idterm"] != ""){
	//echo $_POST["idyear"]."-".$_POST["idterm"];
	$idyear=$_POST["idyear"];
	$idterm=$_POST["idterm"];
	$strSQL = "SELECT * FROM  `addtrem` WHERE `idyear`= $idyear  AND  `idterm` = $idterm";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	$idaddterm = $objResult['idaddterm'];
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
               <li class="current"><a href="coursemanage.php" class="m3">COURSE & SCORE</a></li>
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
            <li class=""><span><a href="coursemanage.php">จัดการวิชาเรียน</a></span></li>
            <li class=""><span><a href="addscore.php">คะแนนตามรายวิชา</a></span></li>
            <li class="last"><span><a href="studentaddscore.php">คะแนนตามรายชื่อ</a></span></li>
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
<?		
if($_POST["hdnCmd"] == "Add")
{ 	
	$idyear=$_POST["idyear"];
	$idterm=$_POST["idterm"];
	$strSQL = "SELECT * FROM  `addtrem` WHERE `idyear`= $idyear  AND  `idterm` = $idterm";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	$idaddterm = $objResult['idaddterm'];
	
	$strSQL = "INSERT INTO subject";
	$strSQL .="(subname,code,hour,disc,idaddterm) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["txtAddCustomerID"]."','".$_POST["txtAddName"]."' ";
	$strSQL .=",'".$_POST["txtAddEmail"]."' ";
	$strSQL .=",'".$_POST["txtAddCountryCode"]."' ";
	$strSQL .=",'".$idaddterm."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery){echo "Error Save [".mysql_error()."]";}
}

//*** Update Condition ***//
if($_POST["hdnCmd"] == "Update")
{
	$idyear=$_POST["idyear11"];
	$idterm=$_POST["idterm11"];
	$strSQL = "SELECT * FROM  `addtrem` WHERE `idyear`= $idyear  AND  `idterm` = $idterm";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	$idaddterm = $objResult['idaddterm'];
	
	$strSQL = "UPDATE subject SET ";
	$strSQL .="subname = '".$_POST["txtEditCustomerID"]."' ";
	$strSQL .=",code = '".$_POST["txtEditName"]."' ";
	$strSQL .=",hour = '".$_POST["txtEditEmail"]."' ";
	$strSQL .=",disc = '".$_POST["txtEditCountryCode"]."' ";
	$strSQL .=",idaddterm = '".$idaddterm."' ";
	$strSQL .="WHERE subid = '".$_POST["hdnEditCustomerID"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery){echo "Error Update [".mysql_error()."]";}
}

//*** Delete Condition ***//
if($_GET["Action"] == "Del")
{
	$strSQL = "DELETE FROM subject ";
	$strSQL .="WHERE subid = '".$_GET["CusID"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery){echo "Error Delete [".mysql_error()."]";}
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
        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
        while($objResult = mysql_fetch_array($objQuery)){?>         
        <option value="<?=$objResult['idyear'];?>"><?=$objResult['nameyear'];?></option>
        <? }?>
        </select>    
        <select name="idterm" id="idterm" style="font-size:14px; color:#666;">
        <option value="0" selected>เลือก SEC</option>
    	<?
        $strSQL = "SELECT * FROM term";
        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
        while($objResult = mysql_fetch_array($objQuery)){?>         
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
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");}
	else
	{$strSQL = "SELECT * FROM subject WHERE idaddterm = $idaddterm ORDER BY  `subject`.`subid` ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");}
	
	if($idaddterm == 0 ){
	$strSQL = "SELECT * FROM subject ORDER BY  `subject`.`subid` ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");}
	else
	{$strSQL = "SELECT * FROM subject WHERE idaddterm = $idaddterm ORDER BY  `subject`.`subid` ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");}
	
	if($_POST["h_arti_id"] != ''){
	$strSQL = "SELECT * FROM subject
				WHERE subid = '".$_POST["h_arti_id"]."'
				ORDER BY  `subject`.`subid` ASC  ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");}
	?>
    
    <input type="hidden" name="hdnCmd" value="">
    
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
    <? 
	if($idaddterm != 0){
	
	$strSQL2 = "SELECT * 
				FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
				INNER JOIN year ON addtrem.idyear = year.idyear
				WHERE addtrem.idaddterm = $idaddterm";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysql_fetch_array($objQuery2)
	?>
    <tr><td style="white-space:nowrap;" class="tblyy" colspan="7"> <center>[<?=$objResult2["nameyear"]; ?>]<?=$objResult2["nameterm"];?></center></td> </tr>
    <? } 
	else { ?>
    <tr><td style="white-space:nowrap;" class="tblyy" colspan="7"> <center> ทั้งหมด</center></td> </tr>
    <? } ?>
    <tr>
      <td width="10%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>ลำดับ</strong></div></td>
      <td width="38%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>วิชา</strong></div></td>
      <td width="20%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>รหัสวิชา</strong></div></td>
      <td width="32%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>ปีการศึกษา</strong></div></td>
    </tr>
   	<? 
	$i=0;
	while($objResult = mysql_fetch_array($objQuery)){
		$i++;
	$strSQL2 = "SELECT * 
				FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
				INNER JOIN year ON addtrem.idyear = year.idyear
				WHERE addtrem.idaddterm = '".$objResult['idaddterm']."'";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while($objResult2 = mysql_fetch_array($objQuery2)){?>
	<tr>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
      <td  class="tblyy" style="white-space:nowrap;"><a href="studentaddscore2.php?subid=<?=$objResult["subid"];?>&idaddterm=<?=$objResult['idaddterm'];?>"><?=$objResult["subname"];?></a></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult["code"];?></div></td>
      <td style="white-space:nowrap;" class="tblyy">[<?=$objResult2["nameyear"]; ?>]<?=$objResult2["nameterm"];?> </td> 
  	</tr>
	<? }} ?>
</table>
</form>
			<? mysql_close();?>
           </ul>
		</div>
     
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
Cufon.now(); </script>
</body>
</html>