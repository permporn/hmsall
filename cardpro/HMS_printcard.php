<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("config.inc.php");
include("funtion.php");
include("ck_session.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include("script_link.php");?>
</head>
<body>
<?
/////////////////////////////////////////////////////////////////// for save
	$ck_indb = 0;
	$ck_10char = 0;
	$ck_double = 0;
	
	for($ckID_CARD = 0; $ckID_CARD < count($_POST["ID_HMS"]); $ckID_CARD++){
		$ch_idcard = trim(mysql_real_escape_string(str_replace("\r\n", '', $_POST["ID_CARD"][$ckID_CARD]))); //ตัดช่องว่าง
		$query_ckID_CARD = mysql_query("SELECT * FROM hms_card WHERE id_card = '".$ch_idcard."'");
		//$result_ckID_CARD = mysql_fetch_array($query_ckID_CARD);
		$ck_numrow = mysql_num_rows($query_ckID_CARD); // เช็คจำนวนแถว
		
		if($ck_numrow != 0 || $ch_idcard == ''){$ck_indb++;}
		if(strlen($ch_idcard) != 10){;$ck_10char++;}
		//echo 'ch_idcard = '.$ch_idcard.'<BR>';
	}
	
	$datas = $_POST["ID_CARD"];
	$check= array(); //array สำหรับการตรวจสอบ
	for ($i=0; $i<count($datas); $i++) {
		$check[$datas[$i]]++; //mark array
		if ($check[$datas[$i]]>1){
			$ck_double++;
		}
	}
	
	if($ck_indb == 0 && $ck_10char == 0 && $ck_double == 0){ //ถ้าไม่ซ้ำ svae
		
		for($inum = 0; $inum < count($_POST["ID_HMS"]); $inum++){
			$new_idcard = trim(mysql_real_escape_string(str_replace("\r\n", '', $_POST["ID_CARD"][$inum]))); //ตัดช่องว่าง
			$str_upcard = "UPDATE hms_card SET ";
			$str_upcard .="id_card = '".$new_idcard."' ";
			$str_upcard .=",status = '2' ";
			$str_upcard .="WHERE id_hms = '".$_POST['ID_HMS'][$inum]."' ";
			$OQ_upcard = mysql_query($str_upcard);
			//echo $_POST['ID_CARD'][$inum].'<BR>';
		}
		echo "<script language='javascript'>alert('บันทึกเสร็จสิ้น!!');</script>";
		/*echo "<script>window.location='HMS_printcard.php?arr_IDHMS=$arr_IDHMS';</script>";*/
	}
	
	if($ck_indb > 0){echo "<script language='javascript'>alert('ขออภัย มี id card ซ้ำใน db!!');</script>";}
	if($ck_10char > 0){echo "<script language='javascript'>alert('ขออภัย มี id card ไม่ถูกต้อง!!');</script>";}
	if($ck_double > 0){echo "<script language='javascript'>alert('ขออภัย มี id card ซ้ำ!!');</script>";}
	
	if($ck_indb > 0 || $ck_10char > 0 || $ck_double > 0){echo "<script>window.location='HMS_PrintCardAll.php';</script>";}
/////////////////////////////////////////////////////////////////// end for save

?>
<div id="non-printable">
	<form name="frmMain" action="php_writeexcel-0.3.0/Export.php" method="post">
	<table class="tbl-border" cellpadding="0" cellspacing="1" width="50%" align="">
    	<tr>
          <td width=""  class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">รหัสบัตร</td>
        </tr>
		<? // for echo value
        for($i=0;$i<count($_POST["ID_HMS"]);$i++){
            if($_POST["ID_HMS"][$i] != ""){
                $strSQL = "SELECT card.id_card, allstud.school_studentid, allstud.selfdb_studentid, allstud.name 
                        FROM hms_card card 
                        INNER JOIN hms_allstudent allstud 
                        ON allstud.id = card.id_allstudent";
                $strSQL .=" WHERE card.id_hms = '".$_POST["ID_HMS"][$i]."' ";
                $objQuery = mysql_query($strSQL);
                $objResult = mysql_fetch_array($objQuery);
                   
                if($objResult['school_studentid']!='0'){
                    $code_stud = $objResult['school_studentid'];
                }else{
                    $code_stud = $objResult['selfdb_studentid'];
                }
                ?>
        <tr>
          <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult['name'];?></td>
          <td width="" class="tblyy" style="white-space: nowrap;" align="center"><?=$code_stud?></td>
          <td width="" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult['id_card']?></td>
        </tr>
  		<?	}?>
	

<input type="hidden" id="ID_HMS<?=$i;?>" name="ID_HMS[]" value="<?=$_POST['ID_HMS'][$i];?>" >
<? 
} 
?>
</table>
	    
        <button type="submit" style="margin-right:55px; margin-top:5px; width:100px">PRINT</button>
        <input type="button" onClick="window.location.href='HMS_PrintCardAll.php'" value="กลับ" style="margin-right:55px; margin-top:5px; width:100px"/>
        
	</form>
</div>

        

</body>
</html>