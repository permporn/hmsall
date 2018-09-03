<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?
	session_start();
	//$_SESSION["account"] = $_SESSION["account"];
	//$_SESSION["hostname"] = $_SESSION["hostname"];
	include ('config.php');
	include ('if_all.php');
	$creditid = $_GET["creditid"];
	
	//หาชื่อวิชา
	$sql_set = "SELECT ex_set.id_set
				,ex_set.name_set 
				,ex_set.status_finaltest
				,ex_subject.id exsubid
				,ex_subject.name name_sub
				,ex_mapexam.subid
				FROM ex_set 
				INNER JOIN ex_subject
					on ex_subject.id = ex_set.id_subject
				INNER JOIN ex_mapexam
					on ex_mapexam.id_subjex = ex_set.id_subject
				WHERE ex_set.id_set = '".$_SESSION['id_set']."'
				";
	$query_set = mysql_query($sql_set) or die ("Error Query [".$sql_set."]");
	$result_set = mysql_fetch_array($query_set);


	
	// คิวรี่่ หาข้อมูลการสอบ		
	$sql_mapset = "SELECT * FROM ex_mapset WHERE accid = '".$_SESSION['account']."' AND id_set = '".$_SESSION['id_set']."' ";
	$query_mapset = mysql_query($sql_mapset);//or die ("Error Query [".$sql_mapset."]")
	$mapset_Rows = mysql_num_rows($query_mapset);
	
	//เช็คว่าเป็นการสอบครั้งแรก 
	if(!$query_mapset){
		$count_tesr = '1';
	}else{
		$result_mapset = mysql_fetch_array($query_mapset);
		$count_tesr = $result_mapset['quiz_count']+1;
	}
	
	$sub_name = $result_set['name_sub'];
	$set_name = $result_set['name_set'];
	
	/*
	// คิวรี่่ หาข้อมูลการสอบ		
	$sql_mapset = "SELECT * FROM ex_mapset WHERE accid = '".$_SESSION['account']." AND id_set = '".$_SESSION['id_set']."' ";
	$query_mapset = mysql_query($sql_mapset);//or die ("Error Query [".$sql_mapset."]")
	//$mapset_Rows = mysql_num_rows($query_mapset);
	
	//เช็คว่าเป็นการสอบครั้งแรก
	if(!$query_mapset){
		$count_tesr = '1';
	}else{
		$result_mapset = mysql_fetch_array($query_mapset);
		$count_tesr = $result_mapset['quiz_count']+1;
	}*/
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>S.E.L.F</title>
<link rel="stylesheet" href="css/styleall<?="_".$_SESSION["screen"]?>.css">
</head>
<style>
td {
    height:50px;
    vertical-align:bottom;
}
</style>
<body onLoad="begintimer()">
<div id="dplay" ></div>
<div id="headerExam">
<table width="100%">
      <tr>
        <td width="34%" height="30" style="vertical-align:top;"><font size="+2" style="font-weight:300">วิชา </font> 
        <font size="+1" style="font-weight:300"><?=$sub_name?></font></td>
        <td width="46%" style="padding-bottom:20px;vertical-align:middle;"><font size="+2" style="font-weight:300">ชุด </font>
        <font size="+1" style="font-weight:300"><?=$set_name?> </font></td>
        <td width="20%" style="padding-bottom:20px;vertical-align:middle;"><font size="+2" style="font-weight:300">สอบครั้งที่ </font>
        <font size="+1" style="font-weight:300"><?=$count_tesr?></font></td>  
      </tr>
    </table>
</div>
<div id="PaperExam">

<?php
	// คิวรี่หาเฉลย 
	$str_AnsQues = "SELECT * FROM ex_question WHERE id_question = '".$_POST["id_question"]."'";
	$OQ_AnsQues = mysql_query($str_AnsQues);
	$OR_AnsQues = mysql_fetch_array($OQ_AnsQues);
	
	$AnsQues = $OR_AnsQues["answer"];
	$AnsDetail = $OR_AnsQues["$AnsQues"];
	$ans = $_POST["ans__"];
	$id_question = $_POST["id_question"];
	$score = $_POST["score"];
	$sum_score = $_POST["sum_score"];
	//echo '<br>'.$sum_score.'<br>';
	$status_finaltest = $_POST["status_finaltest"]; // **
	
// ถ้าข้อหน้า < หน้าทั้งหมด	
if($_GET["Page"] < $_SESSION["num_ex"]){?>

<form id="form1" name="form1" method="post" action="Self_Exam.php?Page=<?=$_GET["Page"] + 1;?>&id_set=<?=$_SESSION["id_set"]?>&creditid=<?=$creditid?>">
	<?php
	//echo $AnsQues."==".$ans."<br>".$mapset_Rows;
	// เช็คคำตอบถูก
	if($AnsQues == $ans){?>
    <!--<div align="center">
    <table width='50%' align="center">
        <tr>
        	<td width="29%" rowspan="2" >
			<img src='img/correct.png' style='width:80px'/>
            </td>
            <td width="71%" colspan="2" style="vertical-align:middle">  คำตอบที่ถูกต้อง</td>
        </tr>
    </table>
    </div>-->
    <br />
	<? 	if($mapset_Rows == 0 && $status_finaltest == 1){ // ข้อสอบ final สอบครั้งแรก จะupdate คะแนนในตาราง credit // **
		
		//echo "ข้อสอบ final สอบครั้งแรก จะupdate คะแนนในตาราง credit";
		
		$str_final = "SELECT * FROM credit WHERE creditid = '".$creditid."'";
		$OQ_final = mysql_query($str_final);
		$OR_final = mysql_fetch_array($OQ_final);
		$sum_score = $OR_final['lastfinal_score'] + $OR_AnsQues['score'];
		
		//echo "/sum_score=".$sum_score."/No.=".$No."/creditid=".$OR_final["creditid"];
		
		$sum_score = $sum_score;
		
 		}else{
			
		$sum_score = $sum_score + $score;// บวกคะแนน
		
		} // **
	}else{
		//echo "B1/";
		?>
    <!--<div align="center">
	<table width='50%' align="center">
        <tr>
        	<td width="24%" rowspan="2" >
            <img src='img/wrong.png' style='width:80px'/></td>
            <td colspan="2"> คำตอบผิด !! คำตอบที่ถูกต้อง คือ</td>
      	</tr>
		<tr>
            <td width="6%" style="vertical-align:middle">
            <? /*if($AnsQues == "choice1"){echo "1.";}
            else if($AnsQues == "choice2"){echo "2.";}
            else if($AnsQues == "choice3"){echo "3.";}
            else if($AnsQues == "choice4"){echo "4.";}
            else if($AnsQues == "choice5"){echo "5.";}
            else if($AnsQues == "choice6"){echo "6.";}*/
            ?></td>
            <td width="70%" style="vertical-align:middle"><div align="left"><? //$AnsDetail;?></div></td>
		</tr>
	</table>
    </div>-->
	<?
	}
		if($mapset_Rows == 0 && $status_finaltest == 1){
			
		    // echo "ข้อสอบ final สอบครั้งแรก + ข้อ";
			//echo '<br>'.$query_mapset.' '.$status_finaltest.'<br>';
		
			$No = $_GET["Page"]+1;
			//echo $No;
			$strSQL = "UPDATE credit SET ";
			$strSQL .="lastfinal_No = '".$No."' ";
			$strSQL .=", lastfinal_score = '".$sum_score."' ";
			$strSQL .=" WHERE creditid = '".$creditid."'";
			$objQuery = mysql_query($strSQL);
			//echo "<br>".$strSQL  ;
		
		}
		
	?>

    <input type="hidden" name="sum_score" value="<?=$sum_score;?>" />
    <center><input type="submit" name="button" id="button" value="Next" style="width:70px; height:35px;"/></center>
</form>

<?php }else if($_GET["Page"] == $_SESSION["num_ex"]){ // หน้าเท่ากับหน้าสุดท้าย?>

<form id="form1" name="form1" method="post" action="Self_Exam2.php?Page=<?=$_GET["Page"] + 1;?>&id_set=<?=$_SESSION["id_set"]?>&creditid=<?=$creditid?>">
	<?php
	// เช็คคำตอบถูก
	if($AnsQues == $ans){?>
	<!--<div align="center">
    <table width='50%' align="center">
        <tr>
        	<td width="24%" rowspan="2" >
			<img src='img/correct.png' style='width:80px'/>
            </td>
            <td colspan="2" width="71%"  style="vertical-align:middle">  คำตอบที่ถูกต้อง</td>
        </tr>
    </table>
    </div>-->
    <br />
	<? 	if($mapset_Rows == 0 && $status_finaltest == 1){ // ข้อสอบ final สอบครั้งแรก จะupdate คะแนนในตาราง credit // **
		//echo "A1/";
		$str_final = "SELECT * FROM credit WHERE creditid = '".$creditid."'";
		$OQ_final = mysql_query($str_final);
		$OR_final = mysql_fetch_array($OQ_final);
		$sum_score = $OR_final['lastfinal_score'] + $OR_AnsQues['score'];
		
		//echo "/sum_score=".$sum_score."/No.=".$No."/creditid=".$OR_final["creditid"];
		
		$sum_score = $sum_score;
		
	}else{
		$sum_score = $sum_score + $score;// บวกคะแนน
		} // **
	}else{?>
    <!--<div align="center">
	<table width='50%' align="center" >
        <tr>
        	<td width="24%" rowspan="2" >
            <img src='img/wrong.png' style='width:80px'/></td>
            <td colspan="2"> คำตอบผิด !! คำตอบที่ถูกต้อง คือ</td>
      	</tr>
		<tr>
            <td width="6%" style="vertical-align:middle">
            <? /*if($AnsQues == "choice1"){echo "1.";}
            else if($AnsQues == "choice2"){echo "2.";}
            else if($AnsQues == "choice3"){echo "3.";}
            else if($AnsQues == "choice4"){echo "4.";}
            else if($AnsQues == "choice5"){echo "5.";}
            else if($AnsQues == "choice6"){echo "6.";}*/
            ?></td>
            <td width="70%" style="vertical-align:middle"><div align="left"><? //$AnsDetail;?></div></td>
		</tr>
	</table>
    </div>-->
	<? }
		if($mapset_Rows == 0 && $status_finaltest == 1){ 
		$No = $_GET["Page"]+1;
		//echo $No;
		$strSQL = "UPDATE credit SET ";
		$strSQL .="lastfinal_No = '".$No."' ";
		$strSQL .=", lastfinal_score = '".$sum_score."' ";
		$strSQL .=" WHERE creditid = '".$creditid."'";
		$objQuery = mysql_query($strSQL);
		}
	?>
    <br />
    <input type="hidden" name="sum_score" value="<?=$sum_score;?>" />
    <center><input type="submit" name="button" id="button" value="Next" style="width:70px; height:35px;"/></center>
</form>

<?php }else{
	// คิวรี่ ข้อมูลการสอบ
	$STR_FullScore = "SELECT * FROM ex_question WHERE id_set = '".$_SESSION["id_set"]."'";
	$OQ_FullScore = mysql_query($STR_FullScore);
	$FullScore = 0;
	while($OR_FullScore = mysql_fetch_array($OQ_FullScore)){
		$FullScore = $FullScore + $OR_FullScore["score"];
	}
	
	/*$str_SetName = "SELECT * FROM ex_set WHERE id_set = '".$_SESSION["id_set"]."'";
	$OQ_SetName = mysql_query($str_SetName);
	$OR_SetName = mysql_fetch_array($OQ_SetName);
	
	$str_SubName = "SELECT * FROM ex_subject WHERE id = '".$OR_SetName["id_subject"]."'";
	$OQ_SubName = mysql_query($str_SubName);
	$OR_SubName = mysql_fetch_array($OQ_SubName);*/
	
	$SetName = $result_set["name_set"];
	$SubName = $result_set["name_set"]; 
	
	$STR_MapSet = "SELECT * FROM ex_mapset WHERE accid = '".$_SESSION["account"]."' and id_set = '".$_SESSION["id_set"]."'";
	$OQ_MapSet = mysql_query($STR_MapSet);
	$Num_MapSet = mysql_num_rows($OQ_MapSet);
	$OR_MapSet = mysql_fetch_array($OQ_MapSet);
	
	//for update in credit table if final set_test 
	// ข้อสอบ final สอบครั้งแรก จะupdate คะแนนในตาราง credit
	if($result_set["status_finaltest"]=='1' && $Num_MapSet == 0){
		$str_final = "SELECT * FROM credit WHERE creditid = '".$_GET["creditid"]."'";
		$OQ_final = mysql_query($str_final);
		$OR_final = mysql_fetch_array($OQ_final);
		$sumpoint = $OR_final['sumpoint'] + $sum_score;
		
		$strSQL = "UPDATE credit SET ";
		$strSQL .="finaltest = '".$sum_score."' ";
		$strSQL .=", sumpoint = '".$sumpoint."' ";
		$strSQL .=" WHERE creditid = '".$OR_final["creditid"]."'";
		$objQuery = mysql_query($strSQL);
	}
	//if(empty($OR_MapSet)){
	// ถ้าสอบครั้งแรก จะเพิ่มข้อมูลการสอบ ในตาราง ex_mapset
	if($Num_MapSet == 0){
		$quiz_count = '1';
		$sql_MapSet = "INSERT INTO ex_mapset (";
		$sql_MapSet .= "accid";
		$sql_MapSet .= ", id_set";
		$sql_MapSet .= ", score";
		$sql_MapSet .= ", quiz_count";
		$sql_MapSet .= ", date_test";
		$sql_MapSet .= ") values (";
		$sql_MapSet .= "'".$_SESSION["account"]."'";
		$sql_MapSet .= ", '".$_SESSION["id_set"]."'";
		$sql_MapSet .= ", '$sum_score'";
		$sql_MapSet .= ", '$quiz_count'";
		$sql_MapSet .= ", '".date('Y-m-d')."'";
		$sql_MapSet .= ")"; 
		$dbquery_MapSet = mysql_db_query($dbname, $sql_MapSet) or die ("Error Query [".$sql_MapSet."]");
	// ถ้าเคยสอบจะบวกจำนวนครั้งที่สอบที่สอบไปใน ตาราง ex_mapset
	}else if($Num_MapSet >= 1){
		$new_quiz_count = $OR_MapSet["quiz_count"] + 1 ;
		$strSQL = "UPDATE ex_mapset SET ";
		$strSQL .="quiz_count = '".$new_quiz_count."' ";
		$strSQL .=" WHERE id = '".$OR_MapSet["id"]."'";
		$objQuery = mysql_query($strSQL);
		echo "<br><br><center>คะแนนจะไม่ถูกบันทึก เนื่องจากผู้สอบเคยสอบแล้ว"."</center><br>";
	}
	
?>
<!-- สรุปการสอบ -->
<center>
<form id="form1" name="form1" method="post" action="Self_SelectExam.php">
	<!--วิชา <?=$SubName." ".$SetName;?><br><br>
    คะแนนที่ได้ <font color="#EE0000"><strong><?=$sum_score;?></strong></font> คะแนน เต็ม <font color="#0066FF"><strong><?=$FullScore;?></strong></font> คะแนน<br><br><br>-->
    รอผลคะแนน ติดต่อเจ้าหน้าที่
	<br /><br />
	<input type="submit" name="button" id="button" value="ออก"  style="width:70px; height:35px;" />
</form>
</center>
<?php } ?>
</div>
</body>
</html>