<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php
session_start();
include ('config.php');
//$_SESSION["account"] = "10952";  //for fix
if($_GET["hostname"] != '' &&  $_GET["accid"] != '' && $_GET["hostname2"] != '' && $_GET["screen"] != ''){
	$_SESSION["hostname"] = $_GET["hostname"];
	$_SESSION["account"] = $_GET["accid"];
	$_SESSION["hostname2"] = $_GET["hostname2"];
	$_SESSION["screen"] = $_GET["screen"];
}else{
	$_SESSION["hostname2"] = $_SESSION["hostname2"];
	$_SESSION["account"] = $_SESSION["account"];
	$_SESSION["hostname"] = $_SESSION["hostname"];
	$_SESSION["screen"] = $_SESSION["screen"];
	}
$account_acc = $_SESSION["account"];  
if($_SESSION["account"] == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('session ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=Logouthost.php'>";
}else{
include ('if_all.php');
	
	/*$sql_head = "SELECT student.name 
				FROM account 
				INNER JOIN student
					on student.studentid = account.studentid
				WHERE account.accid = '".$_SESSION["account"]."'
				";
	$query_head = mysql_query($sql_head) or die ("Error Query [".$sql_head."]");
	$result_head = mysql_fetch_array($query_head);*/
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>S.E.L.F</title>
<link rel="stylesheet" href="css/styleall<?="_".$_SESSION["screen"]?>.css">
</head>


<script language="JavaScript">
	function confirm_test(){
		var str_alert;
		str_alert  = "- การเก็บคะแนนจะเก็บเฉพาะครั้งแรกที่สอบ \n";
		str_alert += "- ห้ามออกจากระบบสอบ หรือกด back มิฉะนั้นระบบจะไม่ทำการเก็บคะแนนให้ \n";
		str_alert += "- ต้องแน่ใจว่าเวลาที่จองไว้เพียงพอกับเวลาที่สอบ เพราะระบบต้องตัดเวลาสอบตามเวลาที่จอง \n";
		if(confirm(str_alert)){
			return true;
		}else{
			return false;
		}
	}
</script>

<body onLoad="begintimer()">
<div id="main">
<div id="dplay" ></div>
<div id="selectSub2">
<!--<?=$result_head['name'];?>-->
<form name="form" method="get" action="Self_SelectExam.php">
 <table>
  <tr>
      <td width="210px">
	<select name="id_subject" id="id_subject" class="input2" style="width:200px">
    	<option value="" <?php if($_GET['id_subject']==''){?> selected="selected"<?php }?>>ทั้งหมด</option>
    	<?php
		$QR_se_sub = mysql_query("
		SELECT ex_subject.id
				,ex_subject.name 
		FROM ex_subject 
			INNER JOIN ex_mapexam
				on ex_mapexam.id_subjex = ex_subject.id
			INNER JOIN subject
				on subject.subid = ex_mapexam.subid 
			INNER JOIN credit
				on credit.subid = subject.subid 	
			INNER JOIN account
				on account.accid = credit.accid 
			WHERE account.accid = $account_acc
		");
		while($RS_se_sub = mysql_fetch_array($QR_se_sub)){
		?>
        <option value="<?=$RS_se_sub['id']?>"<?php if($_GET['id_subject']==$RS_se_sub['id']){?> selected="selected"<?php }?>><?=$RS_se_sub['name']?></option>
        <?php }?>
	</select>
    </td>
    <td><input type="submit" name="Submit" value="ค้นหา" style="width:55px; height:25px"> </td>
    </tr>
</table>
</form>
</div>
<div id="TableExam">
<table width="100%">
     
<?php
	//echo $_GET['id_subject']." ".$_POST['id_set'];
	if($_GET['id_subject']==""){$s_idsub = "1";}
	else{$s_idsub = "ex_set.id_subject = '".$_GET['id_subject']."'";}
	if($_POST['id_set']==""){$s_idset = "1";}
	else{$s_idset = "ex_set.id_set = '".$_POST['id_set']."'";}
	

	$sql = "
	SELECT account.accid
			, ex_set.id_set
			, ex_set.id_subject
			, ex_set.name_set
			, ex_subject.name
			, ex_set.name_set
			, credit.creditid
	FROM ex_set 
	INNER JOIN ex_subject
		on ex_set.id_subject = ex_subject.id
	INNER JOIN ex_mapexam
		on ex_mapexam.id_subjex = ex_subject.id
	INNER JOIN subject
		on subject.subid = ex_mapexam.subid 
	INNER JOIN credit
		on credit.subid = subject.subid 	
	INNER JOIN account
		on account.accid = credit.accid 
	WHERE account.accid = $account_acc
	AND $s_idsub AND $s_idset 
	AND ex_set.status_set = '1' 
	
	";
	/*$objQuery = mysql_query($sql);
	$Num_Rows = mysql_num_rows($objQuery);*/
	$num = 0; 
	
	
$objQuery = mysql_query($sql) or die ("Error Query [".$sql."]");
$Num_Rows = mysql_num_rows($objQuery);



if($_SESSION["screen"] == "C"){$Per_Page = 13;}
else if($_SESSION["screen"] == "B"){$Per_Page = 12;}
else if($_SESSION["screen"] == "A"){$Per_Page = 9;}
//echo  $width1."/". $height1;

//$Per_Page = 10;   // Per Page

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

$sql .=" ORDER BY ex_subject.name ASC, ex_set.id_set ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($sql);
	
	while($objResult_ex_subject = mysql_fetch_array($objQuery)){
	$num++;
	//$objResult_ex_subject['id_set'] = 18;  //for fix
	
            ?>
            <tr >
                <td width="9%" height="25px"align="center"><?=$num+(($Page-1)*$Per_Page);?></td>
                <td width="24%" height="25px" align="left"><?=$objResult_ex_subject["name"];?></td>
                <td width="28%" height="25px" align="left"><a href="Self_Exam.php?id_set=<?=$objResult_ex_subject["id_set"];?>&creditid=<?=$objResult_ex_subject["creditid"];?>" onclick="return confirm_test();"><?=$objResult_ex_subject["name_set"];?></a></td>
                <?php
					$strSQL_ex_mapset = "SELECT * FROM ex_mapset WHERE accid = '".$objResult_ex_subject['accid']."' and id_set = '".$objResult_ex_subject['id_set']."'";
					$objQuery_ex_mapset = mysql_query($strSQL_ex_mapset) or die ("Error Query [".$strSQL_ex_mapset."]");
					//echo $strSQL_ex_mapset;
					$objResult_ex_mapset = mysql_fetch_array($objQuery_ex_mapset);	
					
					//$Num_Rows_ex_mapset = mysql_num_rows($objQuery_ex_mapset);
					
				?>
                <td width="16%" align="center">
                <!--<a href="javascript:;"><img src="img/2.png" width="25" height="25" /></a>-->
                <?php
					
					$str_sum_score = "SELECT * FROM ex_question WHERE id_set = '".$objResult_ex_subject['id_set']."'";
					$objQuery_sum_score = mysql_query($str_sum_score);
					$sum_score = 0;
					while($objResult_sum_score = mysql_fetch_array($objQuery_sum_score)){
						$sum_score = $sum_score + $objResult_sum_score["score"];
						//echo $objResult_ex_subject['id_set']." ".$sum_score." ".$objResult_sum_score["score"]."<br>";
					}
					if(!$objResult_ex_mapset){
						echo "-";
					}else if($objResult_ex_mapset['status']=='1'){
						echo $objResult_ex_mapset["score"]." / ".$sum_score." คะแนน";
					}else if($objResult_ex_mapset['status']=='0'){
						echo "รอผลคะแนน";
					}
				?>
                </td>
                <td width="15%" height="25px" align="center">
                <?php
					if(!$objResult_ex_mapset){echo "ยังไม่เคยสอบ";}
					else{echo $objResult_ex_mapset["quiz_count"]." ครั้ง";}
                ?></td>
                <td width="8%" height="25px" align="center"><a href="Self_Exam.php?id_set=<?=$objResult_ex_subject["id_set"];?>&creditid=<?=$objResult_ex_subject["creditid"];?>" onclick="return confirm_test();">สอบ</a></td>
            </tr>
          <?php }
		  	if(!$Num_Rows){
		  ?>
            <tr><td colspan="8" height="25px">
            	<center><font color="#FF0000">ไม่พบข้อมูล</font></center>
            </td></tr>  
          <?php } ?>
          </table>           
</div>
<div id="Pagei">
Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
<?php
$id_subject = $_GET['id_subject'];
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&id_subject=$id_subject'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&id_subject=$id_subject'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&id_subject=$id_subject'>Next>></a> ";
}
//mysql_close($objConnect);
?>
</div>
<? 
$hostname = explode("/",$_SESSION["hostname"]);
$hostname1 = $hostname[2]; // ip
$hostname2 = $hostname[3]; // โฟล์เดอร์
//echo $hostname1."/".$hostname2."/";
$Self_Index = "http://".$hostname1."/".$hostname2."/Self_Index.php";
$Logout = "http://".$hostname1."/".$hostname2."/Logout.php";
$Self_video = "http://".$hostname1."/".$hostname2."/Self_video.php";
?>
<!--ปุ่มหน้าแรก -->
<div onmousedown="window.location.href='Logouthost.php?link=<?=$Self_Index?>'" id="Button_Home" title="หน้าแรก">
	<embed src="img/Button_Home.swf" width="200" height="" wmode="transparent"/>
</div>
<!--ปุ่มเรียน-->
<div onmousedown="window.location.href='Logouthost.php?link=<?=$Self_video?>'" id="Button_HistoryExamForlearm" title="เรียน">
	<embed src="img/Button_LearnSELF.swf" width="200" height="" wmode="transparent"/>
</div>
<!--ปุ่มออกจากระบบ-->
<div onmousedown="window.location.href='Logouthost.php?link=<?=$Logout?>'" id="Button_LogoutForlearm" title="ออกจากระบบ">
	<embed src="img/ButtonLogout.swf" width="200" height="" wmode="transparent"/>
</div>
<!--BG-->
<? 
if($_SESSION["screen"] == "C"){ $width1 = "1920"; $height1 = "1077";}
else if($_SESSION["screen"] == "B"){ $width1 = "1606"; $height1 = "899";}
else if($_SESSION["screen"] == "A"){ $width1 = "1360"; $height1 = "762";}
//echo  $width1."/". $height1;
?>
<div align="left">
<embed src="img/Self_TableExam.swf" width="<?=$width1?>px" height="<?=$height1?>px" wmode="transparent" style="margin:0 0 0 0px;float:left;"/>
</div>

</div>
</body>
</html>
<?php } ?>