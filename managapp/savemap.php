<?php
include("config.inc.php");
		
		$strSQL5 = "SELECT * FROM learn WHERE subcode ='".$_POST["subcode"]."' AND id_year = '".$_POST["id_year"]."'";
		$objQuery5 = mysql_query($strSQL5) or die ("Error Query [".$strSQL5."]");
		$date_end = $_POST["date_end"];
		
		while($objResult5 = mysql_fetch_array($objQuery5)){
		$strSQL6 = "INSERT INTO  map_video (`studentid`,`id_ref_video`,`learnid`)";
		$strSQL6 .= " VALUES ('".$objResult5["studentid"]."'";
		$strSQL6 .= ",'".$_POST["id_ref_video"]."'";
		$strSQL6 .= ",'".$objResult5["learnid"]."')";
		$objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL6."]");
		
		$strSQL7 = "UPDATE learn SET ";
		$strSQL7 .="expire_dt = '".$date_end."' ";
		$strSQL7 .="WHERE learnid =  '".$objResult5["learnid"]."'";
		$objQuery7 = mysql_query($strSQL7) or die ("Error Query [".$strSQL7."]");
		}
		if(!$objQuery6){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('ไม่สำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
		else{
			$id_ref_video = $_POST["id_ref_video"];
			$strSQL = "UPDATE path_video SET ";
			$strSQL .="status = '1' ";
			$strSQL .="WHERE id_ref_video =  '".$id_ref_video."'";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			if(!$objQuery){
				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
				echo "<script language='javascript'>alert('ไม่สำเร็จ');</script>";
				echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
			else{
				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
				echo "<script language='javascript'>alert('เปิด เรียบร้อย');</script>";
				echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";
				
				}
		}	
?>
