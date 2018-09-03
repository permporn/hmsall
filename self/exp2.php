<? 
include("config.inc.php");
ob_start();
	$account=$_POST["account"];
	$staffid=$_POST["staffid"];
	$type = "test";
	$date = date('y-m-d');
	$strSQL = "SELECT * FROM account WHERE username = '".$account."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	if($objResult){echo "Account already exist";
	}else{
		
		$student=$_POST["show_arti_topic_name"];
		$strSQL1 = "SELECT * FROM student WHERE name = '".$student."' ";
		$objQuery1 = mysql_query($strSQL1);
		$objResult1 = mysql_fetch_array($objQuery1);
		$studentid = $objResult1["studentid"];
		
		$sub = $_POST["show_arti_topic_subj"];
		$strSQL2 = "SELECT * FROM subject WHERE subname = '".$sub."' ";
		$objQuery2 = mysql_query($strSQL2);
		$objResult2 = mysql_fetch_array($objQuery2);
		$subid = $objResult2["subid"];
		
		$sub = $_POST["show_arti_topic_subj"];
		$strSQL7 = "SELECT * FROM subject WHERE subname = '".$sub."' ";
		$objQuery7 = mysql_query($strSQL7);
		$objResult7 = mysql_fetch_array($objQuery7);
		$totalcredit = 4;
		$s = 1;
		$ck = 0 ;
		$strSQL8 = "SELECT * FROM account WHERE studentid = '".$studentid."' ";
		$objQuery8 = mysql_query($strSQL8);
		while ($objResult8 = mysql_fetch_array($objQuery8)){
			$usertest = substr($objResult8["username"],0,4);
			if($usertest == "test"){
			$strSQL10 = "SELECT * FROM credit WHERE accid = '".$objResult8["accid"]."' ";
			$objQuery10 = mysql_query($strSQL10);
			$objResult10 = mysql_fetch_array($objQuery10);
			if($objResult10['subid'] == $subid){ $ck++; }
			}
		}
		if($ck == 0){
			$strSQL9 = "INSERT INTO account ";
			$strSQL9 .="(studentid,username,password,state,sdate,edate,totalcredit,credit_start,status,staffid) ";
			$strSQL9 .="VALUES ";
			$strSQL9 .="('".$studentid."','".$_POST["account"]."'";
			$strSQL9 .=",'".$_POST["password"]."','1'";
			$strSQL9 .=",'".$_POST["date"]."','".$_POST["edate"]."'";
			$strSQL9 .=",'".$totalcredit."','".$totalcredit."','".$_POST["status"]."','".$staffid."') ";
			$objQuery = mysql_query($strSQL9);
			if(!$objQuery9){echo "Error Save [".mysql_error()."]";}
			$strSQL4 = "SELECT * FROM account WHERE username = '".$account."' ";
			$objQuery4 = mysql_query($strSQL4);
			$objResult4 = mysql_fetch_array($objQuery4);
			$accid = $objResult4["accid"];
			$strSQL = "INSERT INTO credit ";
			$strSQL .="(accid,subid,staffid,type_pay,date_regis) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$accid."'";
			$strSQL .=",'".$subid."' ";
			$strSQL .=",'".$staffid."' ";
			$strSQL .=",'".$type."'";
			$strSQL .=",'".$date."') ";
			$objQuery = mysql_query($strSQL);
		mysql_close();
		header("location:viewaccount.php?accid=$accid&status=notedit&std=$studentid");
		}else{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('นักเรียนเคยเรียนวิชานี้แล้ว กรุณาทำรายการใหม่');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=exp.php'>";
			exit();
		}
	}
?>