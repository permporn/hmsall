<? 
session_start();
include("config.inc.php");
$strSQL99 = "SELECT * FROM account WHERE accid = '".$_SESSION["accid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	if($_SESSION["accid"]=="")
	{echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Please Login!!');</script>";
echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
			exit();
		}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ทะเบียนนักเรียน อ.โต้ง</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<script type="text/javascript" src="js/jquery.poshytip.min.js"></script>
<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
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
		return "data2.php?q=" +encodeURIComponent(this.value);
    });	
}	
 
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");
</script>

</head>
<body id="page3">
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<nav>
					<ul id="menu">
						
					</ul>
				</nav>
				<ul id="icons">
					
				</ul>
			</div>
			<div class="wrapper">
				<h1><a href="index.html" id="logo">Learn Center</a></h1>
			</div>
			
		</header>

	</div>
</div>
<div class="body2">
	<div class="main">
<!-- content -->
		<section id="content">
			<div class="box1">
			  <div class="wrapper">
					<article class="col2 pad_left22">
                    <div class="pad_left1">
                     
                    	
                     <table width="250" border="1">
                            <tr>
                                <td style="white-space: nowrap;"  class="tblx">
                                <p><?php /*?><?= $namestu; ?><?php */?></p>
                            </td>
                            </tr>
                              <?php /*?> <? while($objResult7 = mysql_fetch_array($objQuery7)){?><?php */?>
                              <tr>
                                  <td width="90"><p><img src="images/Earth.png"/> welcome: </td>
                                  <td><?=$objResult99["name"];?></td></p>
                             </tr>
                                <tr>
                                  <td width="90"><p><img src="images/Earth.png"/> Status: </td>
                                  <td><?=$objResult99["status"];?></td></p>
                             </tr>
                      </table>
                    </div> 
                     <p></p>
                    
                    <div class="pad_left1">
                  		<ul class="list1">
                        <? if($objResult99["status"]=="Manager"||$objResult99["status"]=="ADMIN") {?>
                        <li><a href="upload.php">ดึงไฟล์ธนาคาร</a></li>
                        <? }?>
                        <li><a href="Home.php">ทะเบียนนักเรียน</a></li>
                            <li><a href="search.php">ค้นหานักเรียน</a></li>
							<li><a href="Subject.php">จัดการข้อมูลวิชาเรียน</a></li>
                            <li><a href="branch.php">จัดการข้อมูลสาขา</a></li>
                            <li><a href="room.php">จัดการข้อมูลห้องเรียน</a></li>
                            <li><a href="term.php">จัดการข้อมูลปีการศึกษา</a></li>
                            <li><a href="Teacher.php">จัดการข้อมูลอาจารย์</a></li>
                            <li><a href="exp.php">คะแนนสอบ</a></li>
                             <? if($objResult99["status"]=="Manager"||$objResult99["status"]=="ADMIN") {?>
                             <li><a href="price.php">ยอดแต่ละสาขา</a></li>
                            <li><a href="account.php">จัดการผู้มีสิทธิใช้ระบบ</a></li>
                            <li><a href="even.php">แจ้งข่าวสาร</a></li>
                            <? }?>
						<!--	<li><a href="editpass.php">เปลี่ยนพาสเวิร์ด</a></li>-->
							<li><a href="logout.php">ออกจากระบบ</a></li>
						</ul>    
                    </div>
                 </article>
                    
			<article class="col11">
						<div class="pad_left11">
							<h2><img src="images/expsubstu.png"/></h2>
						</div>
                         
                         <div class="pad_left11">
                         <form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
  <center><label>ค้นหารหัส : </label><input name="show_arti_topic" type="text" class="tbl-border" id="show_arti_topic" value="<?=$_GET["h_arti_id"];?>" size="50" />
  <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
  <button type="submit" name="button" id="button" class="submit2" >ค้นหา</button></center>
  <p>&nbsp;</p>
  <!--</div>-->
         </form>
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
		return "data2.php?q=" +encodeURIComponent(this.value);
    });	
}	
 
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");
</script>
							<?
							if($_GET["h_arti_id"] == "" && $_GET["show_arti_topic"] == "")
	{
$strSQL = "SELECT * FROM subject 
		JOIN room ON subject.roomid = room.roomid 
		WHERE id_year = '".$_GET["id_year"]."' && branchid = '".$_GET["branchid"]."'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);
$Per_Page = 25;   // Per Page

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
	$strSQL .=" order  by subid desc LIMIT $Page_Start , $Per_Page";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
	  <tr>
		<th width="100%" class="tbl2" style="white-space: nowrap;"> คอร์ส </th>
   
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
		$strSQL8 ="SELECT COUNT(subcode) AS sum FROM learn WHERE subcode = '".$objResult["subcode"]."'&& id_year = '".$_GET["id_year"]."'";
		$objQuery8 = mysql_query($strSQL8) or die ("Error Query [".$strSQL8."]");
		$objResult8 = mysql_fetch_array($objQuery8);
	?>
	  <tr>
		<td width="100%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="expstudent.php?subid=<?=$objResult["subcode"];?>&id_year=<?=$objResult["id_year"];?>&branchid=<?=$objResult["branchid"];?>"><img src="images/Yellow tag.png"/><?=$objResult["subname"];?> <?=$objResult["subcode"];?></a> (<?=$objResult8["sum"];?> คน)</div></td>
   
	  </tr>
	
	
    <?
	}
	?>
    </table>
    </center>
    <br>
	<div class="fontaa">Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
	<?
	if($Prev_Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&txtKeyword=$_GET[h_arti_id]&id_year=$_GET[id_year]&branchid=$_GET[branchid]'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
		if($i != $Page)
		{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&txtKeyword=$_GET[h_arti_id]&id_year=$_GET[id_year]&branchid=$_GET[branchid]'>$i</a> ]";
		}
		else
		{
			echo "<b> $i </b>";
		}
	}
	if($Page!=$Num_Pages)
	{
		echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&txtKeyword=$_GET[h_arti_id]&id_year=$_GET[id_year]&branchid=$_GET[branchid]'>Next>></a> ";
	}
	
	mysql_close();	
	}
	else if($_GET["h_arti_id"] != "")
	{
$strSQL = "SELECT * FROM subject JOIN room ON subject.roomid = room.roomid WHERE subcode= '".$_GET["h_arti_id"]."'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);
$Per_Page = 25;   // Per Page

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
	$strSQL .=" order  by subid desc LIMIT $Page_Start , $Per_Page";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
	  <tr>
		<th width="100%" class="tbl2" style="white-space: nowrap;"> คอร์ส </th>
   
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
		$strSQL8 ="SELECT COUNT(subcode) AS sum FROM learn WHERE subcode = '".$objResult["subcode"]."'&& id_year = '".$objResult["id_year"]."'";
		$objQuery8 = mysql_query($strSQL8) or die ("Error Query [".$strSQL8."]");
		$objResult8 = mysql_fetch_array($objQuery8);
	?>
	  <tr>
		<td width="100%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="expstudent.php?subid=<?=$objResult["subcode"];?>&id_year=<?=$objResult["id_year"];?>&branchid=<?=$objResult["branchid"];?>"><img src="images/Yellow tag.png"/><?=$objResult["subname"];?> <?=$objResult["subcode"];?></a>(<?=$objResult8["sum"];?> คน)</div></td>
   
	  </tr>
	
	
    <?
	}
	?>
    </table>
    </center>
    <br>
	<div class="fontaa">Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
	<?
	if($Prev_Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&txtKeyword=$_GET[h_arti_id]'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
		if($i != $Page)
		{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&txtKeyword=$_GET[h_arti_id]'>$i</a> ]";
		}
		else
		{
			echo "<b> $i </b>";
		}
	}
	if($Page!=$Num_Pages)
	{
		echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&txtKeyword=$_GET[h_arti_id]'>Next>></a> ";
	}
	
	mysql_close();	
	}
	else if($_GET["show_arti_topic"] != "")
	{
$strSQL = "SELECT * FROM subject JOIN room ON subject.roomid = room.roomid WHERE (subname LIKE '%".$_GET["show_arti_topic"]."%' or subcode LIKE '%".$_GET["show_arti_topic"]."%' )";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);
$Per_Page = 25;   // Per Page

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
	$strSQL .=" order  by subid desc LIMIT $Page_Start , $Per_Page";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
	  <tr>
		<th width="100%" class="tbl2" style="white-space: nowrap;"> คอร์ส </th>
   
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
		$strSQL8 ="SELECT COUNT(subcode) AS sum FROM learn WHERE subcode = '".$objResult["subcode"]."'";
		$objQuery8 = mysql_query($strSQL8) or die ("Error Query [".$strSQL8."]");
		$objResult8 = mysql_fetch_array($objQuery8);
	?>
	  <tr>
		<td width="100%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="expstudent.php?subid=<?=$objResult["subcode"];?>&id_year=<?=$objResult["id_year"];?>&branchid=<?=$objResult["branchid"];?>"><img src="images/Yellow tag.png"/><?=$objResult["subname"];?> <?=$objResult["subcode"];?></a>(<?=$objResult8["sum"];?> คน)</div></td>
   
	  </tr>
	
	
    <?
	}
	?>
    </table>
    </center>
    <br>
	<div class="fontaa">Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
	<?
	if($Prev_Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&show_arti_topic=$_GET[show_arti_topic]'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
		if($i != $Page)
		{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&show_arti_topic=$_GET[show_arti_topic]'>$i</a> ]";
		}
		else
		{
			echo "<b> $i </b>";
		}
	}
	if($Page!=$Num_Pages)
	{
		echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&show_arti_topic=$_GET[show_arti_topic]'>Next>></a> ";
	}
	
	mysql_close();	
	}
    ?>
						</div>
               		</article>
                        <div class="pad_left11">
                      
                        <h2></h2>
                        </div>
					</article>
				</div>
			</div>
		</section>
<!-- content -->
<!-- footer -->
		<footer>
			<div class="wrapper">
				<div class="pad1">
					
				</div>
			</div>
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>