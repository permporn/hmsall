<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?
	session_start();
	include ('config.php');
	include ('if_all.php');
	//$_SESSION["account"] = $_SESSION["account"];
	//$_SESSION["hostname"] = $_SESSION["hostname"];
	if($_GET['id_set'] != ''){
		$_SESSION["id_set"] = $_GET['id_set'];
	}else if($_GET['id_set'] == ''){
		$_SESSION["id_set"] = $_SESSION["id_set"];
	}
	//$creditid = 20061;
	$creditid = $_GET["creditid"];
	//echo "screen=".$_SESSION["screen"];
	
	/* $sql_head = "SELECT student.name 
				FROM account 
				INNER JOIN student
					on student.studentid = account.studentid
				WHERE account.accid = '".$_SESSION["account"]."'
				";
	$query_head = mysql_query($sql_head) or die ("Error Query [".$sql_head."]");
	$result_head = mysql_fetch_array($query_head); */
	
	//หาชื่อวิชา
	$sql_set = "SELECT *
				FROM ex_set 
				INNER JOIN ex_subject
					on ex_subject.id = ex_set.id_subject
				INNER JOIN ex_mapexam
					on  ex_set.id_subject = ex_mapexam.id_subjex
				WHERE ex_set.id_set =  '".$_SESSION['id_set']."'
				";
	$query_set = mysql_query($sql_set) or die ("Error Query [".$sql_set."]");
	$result_set = mysql_fetch_array($query_set);
	
	// คิวรี่เช็คการสอบครั้งแรก
	$sql_mapset = "SELECT * FROM ex_mapset WHERE accid = '".$_SESSION['account']."' AND id_set = '".$_SESSION['id_set']."' ";
	$query_mapset = mysql_query($sql_mapset);//or die ("Error Query [".$sql_mapset."]")
	//$mapset_Rows = mysql_num_rows($query_mapset);
	//echo $sql_mapset.'<BR>';
	//เช็คว่าเป็นการสอบครั้งแรก
	if(!$query_mapset){
		$count_tesr = '1';
		//echo "88888888888888888";
	}else{
		$result_mapset = mysql_fetch_array($query_mapset);
		$count_tesr = $result_mapset['quiz_count']+1;
		//echo "99999999999999999";
	}
	
	$stud_name = $result_head['name'];
	//$sub_name = $result_set['name_sub'];
        $sub_name = $result_set['name'];
	$set_name = $result_set['name_set'];
	
	// คิวรี่หาข้อสอบ
	$strSQL = "SELECT * FROM ex_question WHERE id_set = ".$_SESSION["id_set"]." ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$Num_Rows = mysql_num_rows($objQuery);
	
	// จำนวนข้อทั้งหมด
	$_SESSION["num_ex"] = $Num_Rows;
	
	// set เริ่มหน้าที่ 1
	$Per_Page = 1;
	
	// รับค่า หน้าต่อไป	
	$Page = $_GET["Page"];
	
	$status_finaltest = $result_set['status_finaltest'];
	
	// เช็คว่าเป็นข้อสอบครั้งสุดท้าย และ สอบครั้งแรก // **
	if($result_set['status_finaltest'] == 1 && $count_tesr == '1' && $Page == ''){
		//echo "final + sสอบครั้งแรก";
		//echo "/count_tesr=".$count_tesr."/SESSION['account']=".$_SESSION['account']."/id_subject=".$result_set['id_subject']."/Page=".$Page."/status_finaltest=".$result_set['status_finaltest'];	
	
		$strSQL_lastfinal = "SELECT lastfinal_No ,lastfinal_score FROM credit 
							WHERE creditid = '".$creditid."'";
							
		$objQuery_lastfinal = mysql_query($strSQL_lastfinal) or die ("Error Query [".$strSQL_lastfinal."]");
		$result_lastfinal = mysql_fetch_array($objQuery_lastfinal);
		//echo $strSQL_lastfinal."<br>";
		//echo "<br>lastfinal_No=".$result_lastfinal['lastfinal_No']."<br>lastfinal_score=".$result_lastfinal['lastfinal_score']."<br>";
		
		if($result_lastfinal['lastfinal_No'] == 0){
			//echo "A";
			$Page = 1;
		}else{
			//echo "B";
			$Page = $result_lastfinal['lastfinal_No'];
			$sum_score_t = $result_lastfinal['lastfinal_score'];
			//echo $Page.")".$sum_score_t;
		}
	}
	
	if(!$_GET["Page"] && $Page == ''){
		$Page = 1;
	}
	
	$Prev_Page = $Page-1;
	$Next_Page = $Page+1;
	
	$Page_Start = (($Per_Page*$Page)-$Per_Page);
	if($Num_Rows<=$Per_Page)
	{
		$Num_Pages =1;
	}
	else if(($Num_Rows % $Per_Page) == 0)
	{
		$Num_Pages =($Num_Rows/$Per_Page) ;
	}
	else
	{
		$Num_Pages =($Num_Rows/$Per_Page)+1;
		$Num_Pages = (int)$Num_Pages;
	}
	
	$strSQL .="ORDER BY Article,id_question ASC LIMIT $Page_Start , $Per_Page";
	$objQuery  = mysql_query($strSQL);

	$str_tp = "SELECT * FROM ex_set WHERE id_set = ".$_SESSION["id_set"];
	$oq_tp = mysql_query($str_tp) or die ("Error Query [".$str_tp."]");
	$rs_tp = mysql_fetch_array($oq_tp);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>S.E.L.F</title>
<link rel="stylesheet" href="css/styleall<?="_".$_SESSION["screen"]?>.css">
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

<script language="javascript">
	
// เช็คเลือกข้อสอบ	
function checkForm(){
	var selectedVal = "";
	var selected = $("input[type='radio'][name='ans__']:checked");
	
	if (selected.length > 0) {
		selectedVal = selected.val();
		return true;
	} else {
		alert('กรุณาเลือกคำตอบ !!!');
		return false;
	}
	
	/*alert(selectedVal);
	alert(document.getElementById("ans__").value);
	if(((document.getElementById("ans__").value).length) == 0 ){
		alert('กรุณาเลือกคำตอบ !!!');
		return false;
	}*/
}
</script>
</head>
<style>
.img{
	min-width:700px;
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

<!--/////////////////////////////////////////////////////// ประเภทตัวเลือก ////////////////////////////////////////////////////////////////////////////////-->
<?php if($rs_tp['type_answer']=='1'){?>

    <form id="form1" name="form1" method="post" action="Self_Exam2.php?Page=<?=$Page;?>&creditid=<?=$creditid?>" onSubmit="return checkForm()">
        <?php 
        // เซตคะแนนรวมเริ่มที่ 0
        if($Page == 1){
            $_POST["sum_score"] = 0;
        }
		
		// ถ้ามีคะแนนเดิมจากสอบครั้งแรกไม่เสร็จ  // **
		if($sum_score_t){
			$_POST["sum_score"] = $sum_score_t ; 
		}
        // แสดงข้อสอบ
        while($objResult = mysql_fetch_array($objQuery))
        {?>	
        <center>
        
        <table style="width:100%">
          <tr>
            <td width="5%" height="30" style="vertical-align:top;"><?=$Page?>. </td>
            <input type="hidden" name="id_question" value="<?=$objResult["id_question"];?>" />
            <input type="hidden" name="score" value="<?=$objResult["score"];?>" />
            <input type="hidden" name="sum_score" value="<?=$_POST["sum_score"];?>" />
            <input type="hidden" name="status_finaltest" value="<?=$status_finaltest?>" />
            <td width="95%" style="padding-bottom:20px;vertical-align:middle;"><?=$objResult["question"]?></td> 
          </tr>
        </table>
        <table style="width:100%">
          <tr>
            <td height="29" style="vertical-align:middle;"><center><input type="radio" name="ans__" id="ans__" value="choice1" /> 1.</center></td>
            <td width="90%" style="vertical-align:middle;"><?=$objResult["choice1"]?></td> 
          </tr>
          <tr>
            <td height="29" style="vertical-align:middle;"><center><input type="radio" name="ans__" id="ans__" value="choice2" /> 2.</center></td>
            <td width="90%" style="vertical-align:middle;"><?=$objResult["choice2"]?></td> 
          </tr>
          <tr>
            <td height="29" style="vertical-align:middle;"><center><input type="radio" name="ans__" id="ans__" value="choice3" /> 3.</center></td>
            <td width="90%" style="vertical-align:middle;"><?=$objResult["choice3"]?></td> 
          </tr>
          <tr>
            <td height="29" style="vertical-align:middle;"><center><input type="radio" name="ans__" id="ans__" value="choice4" /> 4.</center></td>
            <td width="90%" style="vertical-align:middle;"><?=$objResult["choice4"]?></td>  
          </tr>
          <?php if($objResult["choice5"]!=""){?>
          <tr>
            <td height="29" style="vertical-align:middle;"><center><input type="radio" name="ans__" id="ans__" value="choice5" /> 5.</center></td>
            <td width="90%" style="vertical-align:middle;"><?=$objResult["choice5"]?></td> 
          </tr><?php }?>
          <?php if($objResult["choice6"]!="" && $objResult["choice5"]!=""){?>
          <tr>
            <td height="29" style="vertical-align:middle;"><center><input type="radio" name="ans__" id="ans__" value="choice6" /> 6.</center></td>
            <td width="90%" style="vertical-align:middle;"><?=$objResult["choice6"]?></td>  
          </tr><?php }?>
        </table>
        </center>
        <?php }?>
        <br>
         <div style="margin-top:20px; margin-right:30px" align="right">
         <input type="submit" name="button" id="button" value="ยืนยันคำตอบ" style="width:100px; height:35px;"/></div>
        <br><br>
    </form>
<?php }?>

<!--/////////////////////////////////////////////////////// ประเภทข้อเขียน ////////////////////////////////////////////////////////////////////////////////-->
<?php if($rs_tp['type_answer']=='2'){ ?>

	<?php while($objResult = mysql_fetch_array($objQuery)){?>	
    <table style="width:50%">
      <tr>
        <td style="vertical-align:top;" height="40" ><?="หน้าที่ ".$Page."."?></td>
      </tr>
      <tr>
        <input type="hidden" name="id_question" value="<?=$objResult["id_question"];?>" />
        <input type="hidden" name="score" value="<?=$objResult["score"];?>" />
        <input type="hidden" name="sum_score" value="<?=$_POST["sum_score"];?>" />
        <td><center><?=$objResult["question"]?></center></td> 
      </tr>
    </table>
	<?php } ?>
    
	<?php if($_GET["Page"] < $_SESSION["num_ex"]){?>
        <form id="form1" name="form1" method="post" action="Self_Exam.php?Page=<?=$Page+1;?>&creditid=<?=$creditid?>">
            <div style="margin-top:20px; margin-right:30px" align="right">
            <input type="submit" name="button" id="button" value="Next" style="width:100px; height:35px;"/>
            </div>
        </form>
    <?php }else if($_GET["Page"] == $_SESSION["num_ex"]){?>

	<?php 
        $STR_MapSet = "SELECT * FROM ex_mapset WHERE accid = '".$_SESSION["account"]."' and id_set = '".$_SESSION["id_set"]."'";
        $OQ_MapSet = mysql_query($STR_MapSet);
        $Num_MapSet = mysql_num_rows($OQ_MapSet);
        $OR_MapSet = mysql_fetch_array($OQ_MapSet);
        // ถ้าไม่เคยสอบ เพิ่มข้อมูลการสอบครั้งแรก
        if($Num_MapSet == 0){
            $sql_MapSet = "INSERT INTO ex_mapset (";
            $sql_MapSet .= "accid";
            $sql_MapSet .= ", id_set";
            $sql_MapSet .= ", quiz_count";
            $sql_MapSet .= ") values (";
            $sql_MapSet .= "'".$_SESSION["account"]."'";
            $sql_MapSet .= ", '".$_SESSION["id_set"]."'";
            $sql_MapSet .= ", '1'";
            $sql_MapSet .= ")"; 
            $dbquery_MapSet = mysql_db_query($dbname, $sql_MapSet) or die ("Error Query [".$sql_MapSet."]");
		// ถ้าเคยสอบ จะเพิ่มจำนวนครั้งการสอบ	
        }else if($Num_MapSet >= 1){
            $new_quiz_count = $OR_MapSet["quiz_count"] + 1 ;
            $strSQL = "UPDATE ex_mapset SET ";
            $strSQL .="quiz_count = '".$new_quiz_count."' ";
            $strSQL .=" WHERE id = '".$OR_MapSet["id"]."'";
            $objQuery = mysql_query($strSQL);
        }
    ?>

	<form id="form1" name="form1" method="post" action="Self_SelectExam.php">
    	<div style="margin-top:20px; margin-right:30px" align="right"> < หน้าที่สุดท้าย >
    		<br /><input type="submit" name="button" id="button" value="ออก" style="width:100px; height:35px;" />
        </div>
    </form>
<?php }?>



<?php }?>
</div>
<!--BG-->
<!--<div align="left"><embed src="img/Self_Exam6.swf" width="1600" height="892" wmode="transparent" style="margin:0 0 0 -8px;float:left;"/></div> -->
</body>
</html>