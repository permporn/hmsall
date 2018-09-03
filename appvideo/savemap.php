<?php
include("config.inc.php");
		/*$strSQL2 = "SELECT * FROM addterm WHERE id_year ='".$_POST['id_year']."'";
		$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
		
		while($objResult2 = mysql_fetch_array($objQuery2)){
		$strSQL4 = "SELECT * FROM year WHERE id ='".$objResult2['year_id']."'";
		$objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
		
		$strSQL3 = "SELECT * FROM term WHERE termid ='".$objResult2['termid']."'";
		$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
		
		while($objResult3 = mysql_fetch_array($objQuery3)){
			while($objResult4 = mysql_fetch_array($objQuery4)){ */
			//echo $_POST["idvideo"].",".$_POST["subcode"].",".$_POST["id_year"].",".$objResult4['nameyear'].",".$objResult3['term'];
			/*}
		}
		}*/
		$strSQL = "UPDATE  path_video  SET ";
		$strSQL .="subcode = '".$_POST["subcode"]."' ";
		$strSQL .=",id_year = '".$_POST["id_year"]."' ";
		$strSQL .=",status = '0' ";
		$strSQL .="WHERE `id_ref_video` =  '".$_POST["id_ref_video"]."'";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		if(!$objQuery){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('ไม่สำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
		else{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
		
		$strSQL5 = "SELECT * FROM learn WHERE subcode ='".$_POST["subcode"]."' AND id_year = '".$_POST["id_year"]."'";
		$objQuery5 = mysql_query($strSQL5) or die ("Error Query [".$strSQL5."]");
		
		while($objResult5 = mysql_fetch_array($objQuery5)){ 
		
		$strSQL6 = "INSERT INTO  map_video (`studentid` ,`id_ref_video`)";
		$strSQL6 .= " VALUES ('".$objResult5["studentid"]."'";
		$strSQL6 .= ",'".$_POST["id_ref_video"]."')";
		$objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL6."]");
		}
		if(!$objQuery6){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('ไม่สำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
		else{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
?>
