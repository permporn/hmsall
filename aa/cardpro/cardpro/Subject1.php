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
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<script type="text/javascript" src="js/jquery.poshytip.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

		    $("#datepicker-th").datepicker({ dateFormat: 'yy-mm-dd', maxDate: +90, minDate: 0, isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

		    $("#datepicker-th-2").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay,dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

     		    $("#edate").datepicker({ dateFormat: 'yy-mm-dd'});

		    $("#inline").datepicker({ dateFormat: 'yy-mm-dd', inline: true });


			});
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
                            <li><a href="price.php">ยอดแต่ละสาขา</a></li>
                            <? if($objResult99["status"]=="Manager"||$objResult99["status"]=="ADMIN") {?>
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
							<h2><img src="images/Subject.jpg"/></h2>
						</div>
                         
                         <div class="pad_left11">
							 <form action="savesub.php" name="frmMain" method="post" onSubmit="return ChkSubmit();">
      <p>
        <script language="JavaScript">
 
function ChkSubmit(result)
{
if(document.getElementById("subname").value == "")
{
alert('กรุณากรอกชื่อวิชา');
return false;
}
if(document.getElementById("code").value == "")
{
alert('กรุณากรอกรหัสวิชา');
return false;
}
<?
$strSQL = "SELECT * FROM subject";
$objQuery = mysql_query($strSQL);
while($objResuet = mysql_fetch_array($objQuery))
{
	?>
if(	document.getElementById("code").value == "<?=$objResuet["subcode"]?>")
{
	if(document.getElementById("term").value == "<?=$objResuet["id_year"];?>")
	{
		alert('มีรหัสวิชาSELF ในระบบ ในปีการศึกษานี้แล้ว');
		return false;
		}
}
<? }?>
if(document.getElementById("price").value == "")
	{
	alert('กรุณากรอกราคา');
	return false;
	}
if(document.getElementById("day").value == "")
	{
	alert('กรุณากรอกวันเรียน');
	return false;
	}
if(document.getElementById("time").value == "")
	{
	alert('กรุณากรอกเวลาเรียน');
	return false;
	}
if(document.getElementById("date").value == "")
	{
	alert('กรุณากรอกวันที่เรียน');
	return false;
	}
if(document.getElementById("edate").value == "")
	{
	alert('กรุณากรอกวันปิดคอร์ส');
	return false;
	}
if(document.getElementById("room").value == "")
	{
	alert('กรุณาเลือกห้อง');
	return false;
	}
if(document.getElementById("teacher").value == "")
	{
	alert('กรุณาเลือกอาจารย์');
	return false;
	}
if(document.getElementById("term").value == "")
	{
	alert('กรุณาเลือกเทอมการศึกษา');
	return false;
	}
if(document.getElementById("type").value == "")
	{
	alert('กรุณาเลือกประเภทคอร์ส');
	return false;
	}
}
   </script>
   
        <p>ชื่อวิชา &nbsp;&nbsp;: 
        
        <input name="subname" type="text" class="tbl-border" id="subname" />   รหัสวิชา&nbsp;:&nbsp;<input name="code" type="text" class="tbl-border" id="code" />      
      <p>ราคา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
      <input name="price" type="text" class="tbl-border" id="price" /> วันเรียน&nbsp;&nbsp;: <input name="day" type="text" class="tbl-border" id="day" />
      <p>เวลา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <input name="time" type="text" class="tbl-border" id="time" />เริ่มเรียน : <input name="date" type="text" class="tbl-border" id="date" />
       <p> ปิดคอร์ส &nbsp;: 
         <input name="edate" type="text" class="tbl-border" id="edate" />        
        <p>ห้องเรียน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <select name="room" class="tbl-border" id="room">
<option value="">< -- เลือกห้องเรียน -- ></option>
<?
$strSQL = "SELECT * FROM room WHERE branchid = '".$objResult99["branchid"]."' ORDER BY roomid ASC";
$objQuery = mysql_query($strSQL);
while($objResuut = mysql_fetch_array($objQuery))
{
?>
<option value="<?=$objResuut["roomid"];?>"><?=$objResuut["roomname"];?></option>
<?
}
?>
</select>    
          <p>อาจารย์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <select name="teacher" class="tbl-border" id = "teacher">
<option value="">< -- เลือกอาจารย์ -- ></option>
<?
$strSQL = "SELECT * FROM teacher ORDER BY teacherid ASC";
$objQuery = mysql_query($strSQL);
while($objResuut = mysql_fetch_array($objQuery))
{
?>
<option value="<?=$objResuut["teacherid"];?>"><?=$objResuut["teachername"];?></option>
<?
}
?>
</select>  
    <p><label>ปีการศึกษา : </label>
    <select name="term" class="tbl-border" id = "term">
            <option value="">< -- เทอมการศึกษา -- ></option>
            <?
			$strSQL2 = "SELECT * FROM  addterm 
					JOIN term ON  addterm.termid = term.termid 
					JOIN year ON  addterm.year_id =  year.id 
					ORDER BY id_year ASC";
           	$objQuery2 = mysql_query($strSQL2);
            while($objResuut2 = mysql_fetch_array($objQuery2)){?>
            <option value="<?=$objResuut2["id_year"];?>">[<?=$objResuut2["id_year"];?>][<?=$objResuut2["nameyear"];?>]-<?=$objResuut2["term"];?></option><? }?>
	</select>
    <p><label> ประเภทคอร์ส : </label>
	<select name="type" class="tbl-border" id = "type">
            <option value="">< -- ประเภทคอร์ส -- ></option>
            <option value="1">คอร์สสด</option>
            <option value="2">คอร์สDVD</option>
            
	</select>
<br/><br/>
      <center><input type="submit" name="Save" id="Save" value="Save" />            
      <input type="reset" name="reset" id="reset" value="Reset" />  </center>   <br/><br/>
      <!--	JOIN addterm ON  addterm.id_year = subject.id_year 
			JOIN year ON  addterm.year_id =  year.id
			JOIN term ON  addterm.termid =  term.termid-->
    </form>
<div id="divresult"></div>
<?
$strSQL = "SELECT * FROM subject 
			JOIN room ON subject.roomid = room.roomid 
			JOIN teacher ON subject.teachid = teacher.teacherid  
		    WHERE branchid = '".$objResult99["branchid"]."' && type != '3'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);
$Per_Page = 15;   // Per Page

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
		<th width="15%" class="tbl2" style="white-space: nowrap;"> วิชา</th>
		<th width="10%" class="tbl2" style="white-space: nowrap;"> รหัส</th>
        <th width="10%" class="tbl2" style="white-space: nowrap;"> วันเรียน</th>
        <th width="10%" class="tbl2" style="white-space: nowrap;"> เริ่มเรียน</th>
        <th width="10%" class="tbl2" style="white-space: nowrap;"> คอร์ส</th>
        <th width="10%" class="tbl2" style="white-space: nowrap;"> ห้อง</th>
        <!--<th width="10%" class="tbl2" style="white-space: nowrap;"> ปีการศึกษา</th>-->
        <th width="10%" class="tbl2" style="white-space: nowrap;"> แก้ไข</th>
        <th width="10%" class="tbl2" style="white-space: nowrap;"> ลบ</th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
		$strSQL2 =  "SELECT * FROM addterm WHERE id_year = '".$objResult["id_year"]."'";
		$objQuery2 = mysql_query($strSQL2);
			while($objResult2 = mysql_fetch_array($objQuery2)){	
			$strSQL3 = "SELECT * FROM  term  WHERE termid = '".$objResult2["termid"]."'";
			$objQuery3 = mysql_query($strSQL3);
				while($objResult3 = mysql_fetch_array($objQuery3)){	
				$strSQL4 = "SELECT * FROM  year  WHERE id = '".$objResult2["year_id"]."'";
				$objQuery4 = mysql_query($strSQL4);
				while($objResult4 = mysql_fetch_array($objQuery4)){	
        ?>
		<? /* 	$strSQL2 = "SELECT * FROM  addterm 
			JOIN term ON  addterm.termid = term.termid 
			JOIN year ON  addterm.year_id =  year.id";
			$strSQL2 =  "SELECT addterm.*,term.* , year.* 
			FROM addterm,term,year 
			WHERE addterm.year_id = '".$objResult["id_year"]."'";*/
			?>
           	
	 		
	  <tr>
		<td width="30%" " class="tblyy"><?=$objResult["subname"];?></td>
        <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult["subcode"];?></div></td>
		<td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult["day"];?></div></td>
		<td width="15%" class="tblyy"><?=$objResult["date"];?></td>
        <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><div align="center"><? if( $objResult["type"]==1 ) {echo "สด";}else if ($objResult["type"]==2){echo "DVD";}?></div></td>
        <td width="5%" style="white-space:nowrap;" class="tblyy"><div align="center"><div align="center"><?=$objResult["roomname"];?></div></td>
        
       <!-- <td width="10%" style="white-space:nowrap;" class="tblyy"><?php /*?><?=$objResuut2["nameyear"];?>/<?=$objResult3["term"];?>[<?=$objResuut2["id_year"];?>[]<?php */?>
		<?php /*?><?=$objResult["id_year"];?>[<?=$objResult2["year_id"];?>]<?php */?><?=$objResult4["nameyear"];?>/<?php /*?>[<?=$objResult2["termid"];?>]<?php */?><?=$objResult3["term"];?></td>-->
        <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><div align="center"><a href="editsub.php?subid=<?=$objResult["subid"];?>"><img src="images/edit (1).png"></a></div></td>
        <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><div align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='delsub.php?subid=<?=$objResult["subid"];?>';}"><img src="images/delete-2.png"></a></div></td>
	  </tr>
	
	
    <?
    }}
	}}
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
    ?>

						</div>
               		
                        <div class="pad_left11">
                      
                        <h2></h2>
                        </div>
					
				</div>
			</div>
	
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