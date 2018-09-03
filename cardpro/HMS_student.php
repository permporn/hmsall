<? 
session_start();
include("funtion.php");
include("config.inc_multidb.php");
include("ck_session2.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php')?>
  <div id="content">
    <h1>ประวัติการเรียนของนักเรียน</h1>
  <br /> <br />
  <div align="center">
  <form name="form2" action="HMS_student.php" method="get">
  		<label><strong>ค้นหารายชื่อ :</strong></label>
  		<input name="show_arti_topic" type="text" id="show_arti_topic" size="50" />
  		<input name="h_arti_id" type="hidden" id="h_arti_id" value="" />
        <input name="submit" type="submit" value="ค้นหา" />
  </form>
  </div>
  <br />
  
<?
	if($_GET['NewPoint'] != $_GET['OldPoint']){
		$str_up10 = "UPDATE hms_card SET ";
		$str_up10 .="point = '".$_GET['NewPoint']."' ";
		$str_up10 .="WHERE id_hms = '".$_GET['ID_Point']."' ";
		$OQ_up10 = mysql_query($str_up10,$connect_school) or die ("Error Query [".$str_up10."]");
		
		echo "<script>alert('Upload file successfully!');</script>";
	}
	if($_GET['Newsavings'] != $_GET['Oldsavings']){
		$str_up10 = "UPDATE hms_card SET ";
		$str_up10 .="savings = '".$_GET['Newsavings']."' ";
		$str_up10 .="WHERE id_hms = '".$_GET['ID_Point']."' ";
		$OQ_up10 = mysql_query($str_up10,$connect_school) or die ("Error Query [".$str_up10."]");
		
		echo "<script>alert('Upload file successfully!');</script>";
	}

	if($_GET["h_arti_id"] != "" || $_GET['id_hms'] != ""){
		
		if($_GET["h_arti_id"] != ""){
			$strSQL_stu = "SELECT * FROM hms_allstudent WHERE id = '".$_GET["h_arti_id"]."'";
		}else if($_GET['id_hms'] != ""){
			$strSQL_stu = "SELECT * FROM hms_allstudent WHERE id = '".$_GET["id_hms"]."'";
		}
		$objQuery_stu = mysql_query($strSQL_stu ,$connect_school) or die ("Error Query [".$strSQL_stu."]");
		$objResult_stu = mysql_fetch_array($objQuery_stu);
	
?>


  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
  	  <tr>
          <?php
		  	if($_GET['id_hms'] != ""){
				$query_card = mysql_query("SELECT * FROM hms_card WHERE id_allstudent = '".$_GET["id_hms"]."' AND status IN ('1','2')" ,$connect_school);  
			}else{
				$query_allst = mysql_query("SELECT * FROM hms_allstudent WHERE id = '".$objResult_stu['id']."'" ,$connect_school);
				$result_allst = mysql_fetch_array($query_allst);
				
				$query_card = mysql_query("SELECT * FROM hms_card WHERE id_allstudent = '".$result_allst['id']."' && status IN ('1' ,'2')" ,$connect_school);
			}
			$result_card = mysql_fetch_array($query_card);
				
			$query_bill = mysql_query("SELECT * FROM hms_bill WHERE id_hms = '".$result_card['id_hms']."'" ,$connect_school);
			$result_bill = mysql_fetch_array($query_bill);
			$id_bill = $result_bill['id'];
		  ?>
      	<? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["status"]=="admin") {$a = 10;$b = 2;$c = 7;?><? }else{$a = 9;$b = 2;$c = 6;} ?>
          <td colspan="<?=$a?>" class="tbl23" style="white-space: nowrap;" align="center"  height="">ข้อมูลนักเรียน 
           <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["status"]=="admin") {?>
          <button type="button" onClick="parent.location='HMS_EditDataCard.php?id_hmsall=<?=$objResult_stu['id']?>'" >แก้ไขข้อมูล</button>
           <? } ?>
              <div align="right">
                สถานะบัตร 
                <font color="#FF0000">
                <?
					$Q_statusname = mysql_query("SELECT * FROM hms_card_status WHERE id = '".$result_card['status']."'" ,$connect_school);
					$R_statusname = mysql_fetch_array($Q_statusname);
					echo $R_statusname['note'];
				?>
                </font>
				<?php if($id_bill != ''){?><input type=button onClick="parent.location='HMS_PrintBillcrad.php?id_bill=<?=$id_bill?>'" value='พิมใบเสร็จ'/><?php }?>
              </div>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          รหัสนักเรียน : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF">
		  <?
          	echo $objResult_stu["id"];
		    if($objResultSTT["accid"]=="28") {
				echo "<br>"."(รหัส school) ".$objResult_stu["school_studentid"];
				echo "<br>"."(รหัส self) ".$objResult_stu["selfdb_studentid"];
			 }
		  ?></font>
          </td>
          <td class="tblyy"  rowspan="15" style="white-space: nowrap;" align="left"  height=""> 
          	<img src="images/hmscard.png" width="200"/><br /><center>
            <button type="button" onClick="parent.location='self/manageaccount.php?id_hmsall=<?=$objResult_stu['id']?>'" style="height:50px" >สมัครคอร์สเรียน Self</button></center>
          </td> 
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          รหัสบัตร : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$result_card['id_card'];?></font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          POINT สะสม : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#EE0000"><?=$result_card['point'];?> point </font>
          <? if($objResultSTT['accid']=='28' or $objResultSTT['status'] == 'ADMIN' or $objResultSTT["status"]=="admin"){?>
          <form name="frmMain" action="HMS_student.php?id_hms=<?=$objResult_stu['id']?>'" method="get" >
            <input type="text" id="NewPoint" name="NewPoint" value="<?=$result_card['point'];?>" style="width:30px"/>
            <input type="hidden" id="OldPoint" name="OldPoint" value="<?=$result_card['point'];?>" />
            <input type="hidden" id="ID_Point" name="ID_Point" value="<?=$result_card['id_hms'];?>" />
            <input type="hidden" id="show_arti_topic" name="show_arti_topic" value="<?=$_GET['show_arti_topic'];?>" />
            <input type="hidden" id="h_arti_id" name="h_arti_id" value="<?=$_GET['h_arti_id'];?>" />
            <input type="hidden" id="id_hms" name="id_hms" value="<?=$_GET['id_hms'];?>" />
            <input name="submit" type="submit" value="save" />
          </form>
          <? }?>
          <br />
          
		  <?php if($result_card['status'] == '2' && $result_card['point'] > 0){?><input type=button onClick="parent.location='HMScardscan.php'" value='แลก POINT'/><?php }?> <font color="#FF0000"><strong>*</strong> การแลก point ต้องใช้บัตร HMS Card ในการแลก</font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          วันหมดอายุ POINT : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#EE0000"><?=DateThai($result_card['date_expirePoint']);?> </font><!--<?php if($result_card['status'] == '3'){?><input type=button onClick="parent.location='HMS_CardRenewal.php'" value='ต่ออายุ POINT'/><?php }?>-->
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เงินสะสม : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
 			<font color="#EE0000"><?=$result_card['savings'];?> บาท </font>
          <form name="frmMain" action="HMS_student.php?id_hms=<?=$objResult_stu['id']?>'" method="get" >
            <input type="text" id="Newsavings" name="Newsavings" value="<?=$result_card['savings'];?>" style="width:50px"/> บาท
            <input type="hidden" id="Oldsavings" name="Oldsavings" value="<?=$result_card['savings'];?>" />
            <input type="hidden" id="ID_Point" name="ID_Point" value="<?=$result_card['id_hms'];?>" />
            <input type="hidden" id="show_arti_topic" name="show_arti_topic" value="<?=$_GET['show_arti_topic'];?>" />
            <input type="hidden" id="h_arti_id" name="h_arti_id" value="<?=$_GET['h_arti_id'];?>" />
            <input type="hidden" id="id_hms" name="id_hms" value="<?=$_GET['id_hms'];?>" />
            <input name="submit" type="submit" value="save" />
          </form>
          
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อ : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">

          <font color="#0099FF"><?=$objResult_stu["name"];?></font>
          </td>
      </tr>
      <tr>
       	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เบอร์โทร : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["tel"];?> </font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          email :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["email"];?> </font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อเล่น :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["nickname"];?> </font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          โรงเรียน :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["school"];?> </font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          วันเกิด :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF">
		  <?
		  	if($objResult_stu["birthday"] != '0000-00-00'){
				echo DateThai($objResult_stu["birthday"]);
			}else{echo "-";}
		  ?> </font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เลขประจำตัวประชาชน :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><? if($objResult_stu["pcode"] == '0'){echo '-';}else{echo $objResult_stu["pcode"];}?> </font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ที่อยู่ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["address"];?> </font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อพ่อ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["dadname"];?> </font>
           เบอร์โทรพ่อ :  <font color="#0099FF"><?=$objResult_stu["dadtel"];?> </font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อแม่ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["momname"];?> </font>
          เบอร์โทรแม่ :  <font color="#0099FF"><?=$objResult_stu["momtal"];?> </font>
          </td>
      </tr>
      <tr>
      	<? //if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN") {$a = 8;$b = 2;$c = 7;?><? //}else{$a = 8;$b = 2;$c = 6;} ?>
          <td colspan="10" class="tbl2" style="white-space: nowrap;" align="left"  height="">
          + ข้อมูลวิชาเรียนทั้งหมด ของ <font color="#0099FF"><?=$objResult_stu["name"];?></font> 
          </td>
      </tr>
	  <tr>
          <td width="5%"  class="tbl2" style="white-space: nowrap;" align="center">ลำดับที่</td>
          <td width="25%"  class="tbl2" style="white-space: nowrap;" align="center">ชื่อวิชา</td>
          <td width="9%"  class="tbl2" style="white-space: nowrap;" align="center">รหัสวิชา</td>
          <td width="7%" class="tbl2" style="white-space: nowrap;" align="center">วันโอนเงิน</td>
          <td width="7%" class="tbl2" style="white-space: nowrap;" align="center">ราคา</td>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">ปีการศึกษา</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">เทอม</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">ถูกนับ/Point</td>
          <td width="10%" colspan="4" class="tbl2" style="white-space: nowrap;" align="center">ประวัติ</td>
          <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["status"]=="admin") {?>
          <!--<td width="4%"  class="tbl2" style="white-space: nowrap;" align="center">แก้ไข</td>-->
           <? }?>
      </tr>
      
<? 	//$sumamount = 0;    list history regis school db
	$num = 0;
	if($objResult_stu["school_studentid"] != '0'){
		
		$strSQL = "SELECT 
		s.studentid,
		s.studentname,
		s.tel,
		sj.subcode,
		sj.subname,
		sj.id_year,
		sj.subid,
		l.learnid,
		l.regisdate,
		l.id_change_couses,
        l.pricek,
		y.nameyear,
		t.term,
		l.check_pointhms
		FROM learn l
		INNER JOIN student s
			ON l.studentid = s.studentid 
		INNER JOIN subject sj
			ON l.subcode = sj.subcode 
		INNER JOIN addterm at
			ON l.id_year = at.id_year 
		INNER JOIN year y
			ON at.year_id = y.id 
		INNER JOIN term t
			ON at.termid = t.termid ";
		$strSQL .=" WHERE l.studentid = '".$objResult_stu["school_studentid"]."' AND sj.id_year = l.id_year";
		$strSQL .=" order by regisdate DESC"; //seat 
		$objQuery = mysql_query($strSQL ,$connect_school) or die ("Error Query [".$strSQL."]");
		
		while($objResult = mysql_fetch_array($objQuery)){
			$num++;
			if($num % 2 == 0){ $tblyy = "tblyy2"; }
			else{ $tblyy = "tblyy" ;}
		
			$strSQL2 = "SELECT ptt.subject, ptt.id , ptt.status , ptt_s.name statusname
						FROM learn l
						INNER JOIN ptt_request ptt
							ON l.id_change_couses = ptt.id 
						INNER JOIN ptt_type ptt_t
							ON ptt.type = ptt_t.id 
						INNER JOIN ptt_status ptt_s
							ON ptt.status = ptt_s.id 
						WHERE l.id_change_couses = '".$objResult["id_change_couses"]."'";
			$objQuery2 = mysql_query($strSQL2 ,$connect_school) or die ("Error Query [".$strSQL2."]");
			$objResult2 = mysql_fetch_array($objQuery2);
?>      
      <tr>
      	  <td width="5%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"> สด/DVD <?=$num+(($Page-1)*$Per_Page)?></td>
          <td width="25%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><?=$objResult["subname"];?></td>
          <td width="9%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["subcode"];?></td>
          <td width="7%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><? if($objResult['regisdate'] != '0000-00-00'){echo DateThaiDMY($objResult['regisdate']);}else{echo '-';}?></td>
          <td width="9%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["pricek"];?></td>
          <td width="9%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["nameyear"];?></td>
          <td width="6%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["term"];?></td>
          <td width="6%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><? if($objResult["check_pointhms"] == 0){echo "-";} else{ echo $objResult["check_pointhms"];}?></td>
          <td width="10%" colspan="4" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
	      <a href="endorsee_request_details.php?id=<?=$objResult2["id"];?>"><?=$objResult2["subject"];?> <?=$objResult2["statusname"];?></a></td>
      </tr>
      <? } }//end list history regis school db?>
      
<?php //list history regis self db
	if($objResult_stu["selfdb_studentid"] != '0'){
		
		//connect selfdb

		
		$SQL_std_self = "SELECT 
		sj.subname,
		sj.code,
		c.date_pay,
        c.amount,
		c.check_pointhms	
		FROM credit c
		INNER JOIN account a
			ON a.accid = c.accid 
		INNER JOIN subject sj
			ON sj.subid = c.subid 
		WHERE a.studentid = '".$objResult_stu["selfdb_studentid"]."' AND a.status != 'out'
		ORDER BY c.creditid DESC";
		$OQ_std_self = mysql_query($SQL_std_self ,$connect_self) or die ("Error Query [".$SQL_std_self."]");
		
		while($OR_std_self = mysql_fetch_array($OQ_std_self)){
			$num++;
			if($num % 2 == 0){ $tblyy = "tblyy2"; }
			else{ $tblyy = "tblyy" ;}
?>      	
      <tr>
      	  <td width="5%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="center">self <?=$num+(($Page-1)*$Per_Page)?></td>
          <td width="25%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><?=$OR_std_self["subname"];?></td>
          <td width="9%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$OR_std_self["code"];?></td>
          <td width="7%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><? if($OR_std_self['date_pay'] != '0000-00-00'){echo DateThaiDMY($OR_std_self['date_pay']);}else{echo '-';}?></td>
          <td width="9%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$OR_std_self["amount"];?></td>
          <td width="9%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">-</td>
          <td width="6%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">-</td>
          <td width="6%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><? if($OR_std_self["check_pointhms"] == 0){echo "-";} else{ echo $OR_std_self["check_pointhms"];}?></td>
          <td width="10%" colspan="4" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
	  </tr>
<? 
		}
	//connect schooldb

	  
	}//end list history regis self db?>  
      <? if($num == 0){?>
      <tr>
          <td class="tblyy" style="white-space: nowrap;" align="center" colspan="10"><font color="#FF0033"><strong>ไม่พบข้อมูล</strong></font></td>
      </tr>
      <? } ?>

  </table>
  
  <? }?>
  <input type="hidden" name="hdnCount" value="<?=$num;?>">
  
  <br />
  <br />
  <br />
</div>
</body>

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
		return "HMS_student_data.php?q=" +encodeURIComponent(this.value);
    });	
}	

// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");

</script>
<script type="text/javascript"> Cufon.now(); </script>
<div id="dialog" title="สแกนบัตร" align="center">
	<img src="images/taaaa.png" width="400"/>
	<input id="idcard_textbox" type="text" size="40" />
</div>
</html>
<?php mysql_close();?>