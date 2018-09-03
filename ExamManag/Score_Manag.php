<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php
session_start();
include ('config.php');

if($_SESSION["stid"] == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('session ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{
	
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}
	
	if($_GET['action_shift']=='shift_score'){
		$OQ_exset = mysql_query("SELECT ex_set.*
								,ex_mapset.score
								,credit.creditid
								,credit.sumpoint
								FROM ex_mapset 
									JOIN ex_set 
										ON ex_set.id_set = ex_mapset.id_set 
									JOIN ex_mapexam 
										ON ex_mapexam.id_subjex = ex_set.id_subject 
									JOIN credit 
										ON credit.accid = ex_mapset.accid AND credit.subid = ex_mapexam.subid
								WHERE ex_mapset.id = '".$_GET['id_mapset']."'
								");
        $OR_exset = mysql_fetch_array($OQ_exset);
		if($OR_exset['status_finaltest']=='1'){
			$new_sumpoint = $OR_exset['sumpoint'] - $OR_exset['score'] + $_GET['up_score'];
			
			$str_shift_credit = "UPDATE credit SET ";
			$str_shift_credit .="finaltest = '".$_GET['up_score']."' ";
			$str_shift_credit .=",sumpoint = '".$new_sumpoint."' ";
			$str_shift_credit .="WHERE creditid = '".$OR_exset['creditid']."' ";
			$objQuery_shift_credit = mysql_query($str_shift_credit) or die ("Error Query [".$str_shift_credit."]");
			
		}
		
		$str_shift = "UPDATE ex_mapset SET ";
		$str_shift .="score = '".$_GET['up_score']."' ";
		$str_shift .="WHERE id = '".$_GET['id_mapset']."' ";
		$objQuery_shift = mysql_query($str_shift) or die ("Error Query [".$str_shift."]");
		
	}else if($_GET['action_shift']=='shift_status_score'){
		if($_GET['now_status']== '0'){$new_status = '1';}
		else if($_GET['now_status']== '1'){$new_status = '0';}
		$str_shift = "UPDATE ex_mapset SET ";
		$str_shift .="status = '".$new_status."' ";
		$str_shift .="WHERE id = '".$_GET['id_mapset']."' ";
		$objQuery_shift = mysql_query($str_shift) or die ("Error Query [".$str_shift."]");
		
	}else if($_GET['action_shift']=='shift_callet'){
		$OQ_credit = mysql_query("SELECT * FROM credit WHERE creditid = '".$_GET['creditid']."' ");
        $OR_credit = mysql_fetch_array($OQ_credit);
		$new_sumpoint = $OR_credit['sumpoint'] - $OR_credit['collectionpoints'] + $_GET['up_scorecollect'];
		
		$str_shift_credit = "UPDATE credit SET ";
		$str_shift_credit .="collectionpoints = '".$_GET['up_scorecollect']."' ";
		$str_shift_credit .=",sumpoint = '".$new_sumpoint."' ";
		$str_shift_credit .="WHERE creditid = '".$OR_credit['creditid']."' ";
		$objQuery_shift_credit = mysql_query($str_shift_credit) or die ("Error Query [".$str_shift_credit."]");
	}
	
	$s_student = $_GET['s_student'];
	$s_course = $_GET['s_course'];
	$s_startdate = $_GET['s_startdate'];
	$s_enddate = $_GET['s_enddate'];
	
	if($s_startdate != '' && $s_enddate != ''){
		$str_date = "ex_mapset.date_test BETWEEN '$s_startdate' AND '$s_enddate'";
	}else{
		$today = date('Y-m-d');
		$date_week = date('Y-m-d',strtotime("-7 day"));
		$str_date = "ex_mapset.date_test BETWEEN '$date_week' AND '$today'";
	}
	if($s_student != ''){$str_student = "student.studentid = $s_student";}else{$str_student = '1';}
	if($s_course != ''){$str_course = "ex_set.id_set = $s_course";}else{$str_course = '1';}
	

	$strSQL = "
	SELECT ex_mapset.id id_mapset
	,ex_mapset.id_set
	,ex_mapset.status
	,ex_mapset.score
	,ex_mapset.date_test
	,student.name
	,ex_subject.name sub_name
	,ex_set.name_set set_name
	,ex_set.status_finaltest
	,credit.creditid
	,credit.collectionpoints
	,credit.sumpoint
	FROM ex_mapset 
		JOIN account
        	ON account.accid = ex_mapset.accid
		JOIN student
        	ON student.studentid = account.studentid
		JOIN ex_set
        	ON ex_set.id_set = ex_mapset.id_set
		JOIN ex_subject
        	ON ex_subject.id = ex_set.id_subject
		JOIN ex_mapexam
			ON ex_mapexam.id_subjex = ex_set.id_subject
		JOIN credit
        	ON credit.accid = ex_mapset.accid AND credit.subid = ex_mapexam.subid
	WHERE $str_date
	AND ex_set.type_answer = '1'
	AND $str_student
	AND $str_course
	";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

$Num_Rows = mysql_num_rows($objQuery);
$Per_Page = 20 ;   // Per Page

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

$strSQL .=" ORDER BY ex_mapset.date_test DESC, ex_set.name_set, student.name LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="publisher" content="Your publisher infos here ..." />
  <meta name="copyright" content="Your copyright infos here ..." />
  <meta name="author" content="Design: Wolfgang (www.1-2-3-4.info) / Modified: Your Name" />
  <meta name="distribution" content="global" />
  <meta name="description" content="Your page description here ..." />
  <meta name="keywords" content="Your keywords, keywords, keywords, here ..." />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout1_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout1_text.css" />
  <link rel="icon" type="image/x-icon" href="./img/logo2.png" />
  <title>ระบบจัดการข้อสอบ S.E.L.E</title>
</head>
<body>
<div class="page-container">
<div class="header">
<div class="header-middle">    
<a class="sitelogo" href="#" title="Go to Start page"></a>
<div class="sitename">
<h1><a href="index.html" title="Go to Start page"><img src="img/Logo.png" width="397" /></a></h1>
</div>
<div class="nav1">
</div>              
</div>
<div class="header-bottom">
<div class="nav2">
<ul>
<li><a href="index.php">หน้าแรก</a></li>
</ul>
<ul>
<li><a href="Exam_Manag_AddnameSubj.php">สร้างข้อสอบ</a>
<ul>
<li><a href="Exam_Manag_AddnameSubj.php">เพิ่มวิชาข้อสอบ</a></li>
<li><a href="Exam_Manag_ShowAll.php">รายการวิชาข้อสอบทั้งหมด</a></li>
</ul>
</li>
</ul>
<ul><li><a href="Subject_Manag_Showall.php">จัดการคลังข้อสอบ</a></li></ul>
<ul><li><a href="Score_Manag.php">จัดการคะแนนสอบ</a></li></ul>
</div>
</div>
</div>
<div class="main">
<div class="main-content">
<br />
<h1 class="pagetitle">จัดการคะแนนสอบ</h1>
<h1 class="block">1 - ค้นหาชื่อนักเรียน</h1>
<div class="column1-unit">
<div class="contactform">
<form name="from1" method="get" action="Score_Manag.php">
    <fieldset><legend>&nbsp;+ค้นหา&nbsp;</legend>
    <p>
    <label for="contact_firstname" class="left">ค้นหาชื่อนักเรียน :</label>
    <input type="text" name="name_student" id="name_student" class="field" value="" style="width:250px"/>
    <input type="hidden" name="s_student" id="s_student" value="" />
    </p>
    <p>
    <label for="contact_firstname" class="left">ค้นหาวิชาเรียน(ชุด) :</label>
    <input type="text" name="name_course" id="name_course" class="field" value="" style="width:250px"/>
    <input type="hidden" name="s_course" id="s_course" value="" />
    </p>
    <p>
    <label for="contact_firstname" class="left">ค้นหาวันที่ :</label>
    ตั้งแต่วันที่ <input type="date" name="s_startdate" id="s_startdate" class="field" value="" style="width:150px"/>
    ถึงวันที่ <input type="date" name="s_enddate" id="s_enddate" class="field" value="" style="width:150px"/>
    </p>
    <input type="submit" name="button1" class="button" value="ค้นหา" style="width:50px"/>
    </fieldset>
</form>
</div>              
</div> 
<h1 class="block">2 - ตารางคะแนนสอบนักเรียน</h1>
<div class="column1-unit">
<table width="100%">
    <tr>
        <th width="12%" class="top" scope="col"><center>วันที่</center></th>
        <th width="25%" class="top" scope="col"><center>ชื่อ - นามสกุล</center></th>
        <th width="30%" class="top" scope="col"><center>วิชา-ชุดข้อสอบ</center></th>
        <th width="23%" class="top" scope="col"><center>คะแนนที่สอบได้/เต็ม</center></th>
        <th width="23%" class="top" scope="col"><center>คะแนนเก็บ</center></th>
        <th width="23%" class="top" scope="col"><center>คะแนนรวม</center></th>
        <th width="10%" class="top" scope="col"><center>สถานะ</center></th>
    </tr>
<?php    while($objResult = mysql_fetch_array($objQuery)){ ?>
    <tr>
        <td><center><?=DateThai($objResult['date_test']);?></center></td>
        <td><center><?=$objResult['name'];?></center></td>
        <td><center><?=$objResult['sub_name'];?> - <?=$objResult['set_name'];?></center></td>
        <td>
        	<center>
            <form name="from2" method="get" action="Score_Manag.php">
                <input type="text" name="up_score" id="up_score" class="field" value="<?=$objResult['score'];?>" style="width:30px"/>/
                <?
                    $STR_FullScore = "SELECT * FROM ex_question WHERE id_set = '".$objResult['id_set']."'";
                    $OQ_FullScore = mysql_query($STR_FullScore);
                    $FullScore = 0;
                    while($OR_FullScore = mysql_fetch_array($OQ_FullScore)){
                        $FullScore = $FullScore + $OR_FullScore["score"];
                    }
                    echo $FullScore;
                ?>
                <input type="hidden" name="id_mapset" id="id_mapset" value="<?=$objResult['id_mapset']?>" />
                <input type="hidden" name="Page" id="Page" value="<?=$Prev_Page?>" />
                <input type="hidden" name="s_student" id="s_student" value="<?=$s_student?>" />
                <input type="hidden" name="s_course" id="<?=$s_course?>" value="<?=$s_course?>" />
                <input type="hidden" name="s_startdate" id="s_startdate" value="<?=$s_startdate?>" />
                <input type="hidden" name="s_enddate" id="s_enddate" value="<?=$s_enddate?>" />
                <input type="hidden" name="action_shift" id="action_shift" value="shift_score" />
                <input type="submit" name="button2" class="button" value="แก้ไข" style="width:50px"/>
                
            </form>
        	</center>
        </td>
        <td>
        	<center>
            
            <form name="from3" method="get" action="Score_Manag.php">
				<input type="text" name="up_scorecollect" id="up_scorecollect" class="field" value="<?=$objResult['collectionpoints'];?>" style="width:30px"/>
                <input type="hidden" name="creditid" id="creditid" value="<?=$objResult['creditid']?>" />
                <input type="hidden" name="Page" id="Page" value="<?=$Prev_Page?>" />
                <input type="hidden" name="s_student" id="s_student" value="<?=$s_student?>" />
                <input type="hidden" name="s_course" id="<?=$s_course?>" value="<?=$s_course?>" />
                <input type="hidden" name="s_startdate" id="s_startdate" value="<?=$s_startdate?>" />
                <input type="hidden" name="s_enddate" id="s_enddate" value="<?=$s_enddate?>" />
                <input type="hidden" name="action_shift" id="action_shift" value="shift_callet" />
                <? if($objResult['status_finaltest']=='1'){?><input type="submit" name="button2" class="button" value="แก้ไข" style="width:50px"/><? }?>
            </form>
            </center>
        </td>
        <td>
        	<center>
            <?=$objResult['sumpoint'];?>
            </center>
        </td>
        <td>
        	<center><a href="Score_Manag.php?action_shift=shift_status_score&id_mapset=<?=$objResult['id_mapset']?>&now_status=<?=$objResult['status']?>&Page=<?=$Prev_Page?>&s_student=<?=$s_student?>&s_course=<?=$s_course?>&s_startdate=<?=$s_startdate?>&s_enddate=<?=$s_enddate?>">
            <?
				if($objResult['status']=='1'){?><font color="#00CCCC"> <? echo 'เปิด';?></font> <? }
				else if($objResult['status']=='0'){?> <font color="#666666">  <? echo 'ปิด';?></font> <? }
			?>
            </a></center>
        </td>
    </tr>
<?php }?>   
	<? if($Num_Rows == 0){?>
    <tr>
    	<th colspan="5"><center><font color="#FF0000">ไม่พบข้อมูล</font></center></th>
    </tr>
	<? }?>	 
</table>
<br>
Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
<?php
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&s_student=$s_student&s_course=$s_course&s_startdate=$s_startdate&s_enddate=$s_enddate'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&s_student=$s_student&s_course=$s_course&s_startdate=$s_startdate&s_enddate=$s_enddate'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&s_student=$s_student&s_course=$s_course&s_startdate=$s_startdate&s_enddate=$s_enddate'>Next>></a> ";
}
//mysql_close($objConnect);
?>
</div>          
</div>
</div>
<!-- C. FOOTER AREA -->      
<div class="footer">
<p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>		
</div>      
</div> 
</body>
<script type="text/javascript">
function name_autocom(autoObj,showObj){
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
		return "autocomplete/data_sch_name.php?q=" +encodeURIComponent(this.value);
    });	
}	

function set_autocom(autoObj,showObj){
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
		return "autocomplete/data_sch_set.php?q=" +encodeURIComponent(this.value);
    });	
}	

name_autocom("name_student","s_student");
set_autocom("name_course","s_course");
</script>
</html>
<?php } ?>