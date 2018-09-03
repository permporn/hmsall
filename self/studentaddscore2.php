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
         <!--<form action="<?=$_SERVER["PHP_SELF"];?>" id="search-form" method="post">
            <fieldset>
            <div class="rowElem">
               <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
               <a href="#" onClick="document.getElementById('search-form').submit()">Search</a></div>
            </fieldset>
         </form>-->
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
		return "datanamescore.php?q=" + encodeURIComponent(this.value);
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
      <section id="content">
        <div id="sss"></div>
         <div class="inside">
         <?
		 include("config.inc.php");
       
//*** Update Condition ***//
if($_POST["hdnCmd"] == "Update")
{
	$h_arti_id = $_POST["h_arti_id"];
	$creditid = $_POST["creditid"];
	$sumpoint = $_POST["finaltest"]+$_POST["collectionpoints"];
	$strSQL = "UPDATE credit SET ";
	$strSQL .="finaltest = '".$_POST["finaltest"]."' ";
	$strSQL .=",collectionpoints = '".$_POST["collectionpoints"]."' ";
	$strSQL .=",sumpoint = $sumpoint ";
	$strSQL .="WHERE creditid = $creditid ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Update [".mysql_error()."]";
	}

	//echo " <a href='$_SERVER[PHP_SELF]?h_arti_id=$_POST[ssss]>uu</a> ";
	//header("location:'".$_SERVER["PHP_SELF"]."'?h_arti_id='".$_POST["ssss"]."'");
	//exit();
}

?>
<? if($_SESSION["status"] == "adminexam" or $_SESSION["status"] == "admin"){ ?>
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>?subid=<?=$_GET["subid"];?>">
<? 	
	if($_GET["subid"] != ''){
	$strSQL = "SELECT * FROM credit 
				JOIN account ON credit.accid = account.accid 
				JOIN student ON account.studentid = student.studentid	
				WHERE subid = '".$_GET["subid"]."'";
	$strSQL .=" ORDER BY  `credit`.`creditid` ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	/*echo "33";*/
	}
	
	
	?>
    <input type="hidden" name="hdnCmd" value="">
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
    <? 
	if($_GET["idaddterm"] != ''){
	$objResult = mysql_fetch_array($objQuery);
	$strSQL3 = "SELECT * 
				FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
				INNER JOIN year ON addtrem.idyear = year.idyear
				WHERE addtrem.idaddterm = '".$_GET["idaddterm"]."'";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	$objResult3 = mysql_fetch_array($objQuery3)
	?>
    <tr><td style="white-space:nowrap;" class="tblyy" colspan="8"> <center>[<?=$objResult3["nameyear"]; ?>]<?=$objResult3["nameterm"];?></center></td> </tr>
    <? } 
	else { ?>
    <tr><td style="white-space:nowrap;" class="tblyy" colspan="8"> <center> ทั้งหมด</center></td> </tr>
    <? } ?>
    <tr>
          <td width="7%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>ลำดับ</strong></div></td>
          <td width="28%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong> ชื่อ- นามสกุล</strong></div></td>
          <td width="16%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>รหัสวิชา</strong></div></td>
          <td width="14%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>คะแนนเก็บ</strong></div></td>
          <td width="13%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>คะแนนสอบ</strong></div></td>
          <td width="12%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>รวม</strong></div></td>
          <th width="10%" class="tblyy3" style="white-space: nowrap;"> แก้ไข </th>
          <th width="10%" class="tblyy3" style="white-space: nowrap;"> ยกเลิก </th>
         
  	 </tr>
   	<? 
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{ 
		$i++;
		$strSQL2 = "SELECT * FROM subject WHERE subid = '".$objResult["subid"]."'";
		$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");
		$objResult2 = mysql_fetch_array($objQuery2);
		$objResult2['code'];
		
		if($objResult['creditid'] == $_GET["CusID"] and $_GET["Action"] == "Edit")
		{
		
		?> 
	<tr>
		<td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?>
        <input type="hidden" name="ssss" size="5"  id="ssss" value="<?=$objResult["studentid"]?>"></div></td>
    	<td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult["name"];?></div></td>
   		<td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult2['code'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center">
        <input name="collectionpoints" type="text"  id="collectionpoints" size="2" value="<?=$objResult['collectionpoints'];?>"></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center">
        <input name="finaltest" type="text"  id="finaltest" size="2" value="<?=$objResult['finaltest'];?>">
        <input type="hidden" name="creditid"  id="creditid" size="5" value="<?=$objResult["creditid"];?>">
        </div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['sumpoint'];?>
        <input type="hidden" name="subid" size="5" value="<?=$objResult["subid"];?>"></div></td>
        <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center">
       	<input name="btnAdd" type="button" id="btnUpdate" value="update" onClick="frmMain.hdnCmd.value='Update';frmMain.submit();"></div></td>
         <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center">
        <input name="btnAdd" type="button" id="btnCancel"  value="Cancel" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>?subid=<?=$objResult["subid"];?>';"></div></td></tr>
	<? }else{?>   
    <tr>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
      <td  class="tblyy"><?=$objResult["name"];?></a></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult2['code'];?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['collectionpoints'];?></div>
      <input type="hidden" name="h_arti_id" size="5" value="<?=$_POST["h_arti_id"]?>"></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['finaltest'];?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['sumpoint'];?></div></td>
       <? if($_SESSION["status"] == "adminexam" or $_SESSION["status"] == "admin"){ ?>
      <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&CusID=<?=$objResult['creditid'];?>&subid=<?=$objResult["subid"];?>&idaddterm=<?=$_GET["idaddterm"];?>&h_arti_id=<?=$_POST["h_arti_id"]?>">Edit</a></div></td>
      <td width="10%" style="white-space:nowrap;" class="tblyy"></td>
      <? } ?>
      </tr>
	<? } }?>
    
    
	</table>
	
</form><? }else{?>


<!-- ตารางแยก -->
<? 	
	if($_GET["subid"] != ''){
	$strSQL = "SELECT * FROM credit 
				JOIN account ON credit.accid = account.accid 
				JOIN student ON account.studentid = student.studentid	
				WHERE subid = '".$_GET["subid"]."'";
	$strSQL .=" ORDER BY  `credit`.`creditid` ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	/*echo "33";*/
	}
	
	
	?>
    <input type="hidden" name="hdnCmd" value=""> 
    <div align="right"><input type="submit" name="cmdweblogin" class="button" value="กลับ" onclick="window.location='addscore.php'" style="width:100px; height:25px; margin-bottom:10px"/></div>	
    <table class="tblyyy" cellpadding="0" cellspacing="1" width="100%">
    <? 
	if($_GET["idaddterm"] != ''){
	$objResult = mysql_fetch_array($objQuery);
	$strSQL3 = "SELECT * 
				FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
				INNER JOIN year ON addtrem.idyear = year.idyear
				WHERE addtrem.idaddterm = '".$_GET["idaddterm"]."'";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	$objResult3 = mysql_fetch_array($objQuery3)
	?>
    <tr><td style="white-space:nowrap;" class="tblyyy" colspan="8"> <center>[<?=$objResult3["nameyear"]; ?>]<?=$objResult3["nameterm"];?></center></td> </tr>
    <? } 
	else { ?>
    <tr><td style="white-space:nowrap;" class="tblyyy" colspan="8"> <center> ทั้งหมด</center></td> </tr>
    <? } ?>
    <tr>
          <td width="7%"   class="tblyyy" style="white-space: nowrap;"><div align="center"><strong>รหัสนักเรียน</strong></div></td>
          <td width="28%"  class="tblyyy" style="white-space: nowrap;"><div align="center"><strong> ชื่อ- นามสกุล</strong></div></td>
          <td width="16%"   class="tblyyy" style="white-space: nowrap;"><div align="center"><strong>รหัสวิชา</strong></div></td>
          <td width="7%"   class="tblyyy" style="white-space: nowrap;"><div align="center"><strong>ลำดับ</strong></div></td>
          <td width="14%"  class="tblyyy" style="white-space: nowrap;"><div align="center"><strong>คะแนนเก็บ</strong></div></td>
          <td width="13%"   class="tblyyy" style="white-space: nowrap;"><div align="center"><strong>คะแนนสอบ</strong></div></td>
          <td width="12%"   class="tblyyy" style="white-space: nowrap;"><div align="center"><strong>รวม</strong></div></td>
      	
  	 </tr>
     <? 
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{ 
		$i++;
		$strSQL2 = "SELECT * FROM subject WHERE subid = '".$objResult["subid"]."'";
		$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");
		$objResult2 = mysql_fetch_array($objQuery2);
		$objResult2['code'];
		
		?> 
     <tr>
      <td style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult['creditid'];;?></div></td>
      <td  class="tblyyy"><?=$objResult["name"];?></a></td>
      <td style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult2['code'];?></div></td>
      <td style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$i;?></div></td>
      <td style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult['collectionpoints'];?></div>
      <input type="hidden" name="h_arti_id" size="5" value="<?=$_POST["h_arti_id"]?>"></td>
      
      <td style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult['finaltest'];?></div></td>
      <td style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult['sumpoint'];?></div></td>
      
      </tr> <? }?>
     </table>
    <? } ?>
		  <p><div align="right"><input type="submit" name="cmdweblogin" class="button" value="กลับ" onclick="window.location='addscore.php'" style="width:100px; height:25px;margin-top:5px"/></div></p>	
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
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>