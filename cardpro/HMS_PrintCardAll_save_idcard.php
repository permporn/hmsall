<? 
ob_start();
session_start();
include("config.inc.php");
include("funtion.php");
include("ck_session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include("script_link.php");?>
<link type="text/css" href="menutest/menu.css" rel="stylesheet" />
<script type="text/javascript" src="menutest/menu.js"></script>
</head>
<script language="JavaScript">
function ClickCheckAll(vol){
	var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++){
			if(vol.checked == true){
				eval("document.frmMain.chkDel"+i+".checked=true");
			}else{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}
</script>
<body>
<!-- START PAGE SOURCE -->
<div id="container">
	<? //include('menu.php')?>
    <div id="header"> <a href="#"><img src="images/logo01.png" alt="" class="logo"/><img src="images/header.jpg" alt="" class="logo"/></a>
    <ul id="toplinks">
      <li><font style="font-size:14px"><img src="images/Yellow tag.png"/> Status: <?=$objResultSTT["status"];?>
	  <li><font style="font-size:14px"><img src="images/user.png"/> Welcome: 
	  <?
	  	if($_SESSION["db"] == "school"){echo $objResultSTT["name"];}
		else if($_SESSION["db"] == "selfdb"){echo $objResultSTT["stname"];}
	  ?></font></li>
      <br />
      <li><font style="font-size:14px" ><a href="logout.php">ออกจากระบบ</a></font></li>
    </ul>
    </ul>
  </div>

<div id="menu">
    <ul class="menu">
    	<li><a href="index.php"><span>หน้าแรก</span></a>
        	<div><ul>
            <li><a href="even.php"><span>แจ้งข่าวสาร</span></a></li>
            </ul></div>
        </li>
         	<li><a href="#" class="parent"><span>สด และ DVD</span></a>
            	<div><ul>
					<? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
                    <li><a href="#" class="parent"><span>Import Excel</span></a>
                        <div><ul>
                            <li><a href="testImportExcel/upload.php?type=addstu"><span>ดึงไฟล์ธนาคาร</span></a></li>
                            <li><a href="testImportExcel/upload.php?type=addsubj"><span>ดึงไฟล์วิชาเรียน</span></a></li>
                        </ul></div>
                    </li>
                	<? } ?>
                    <li><a href="home.php" class="parent"><span>ทะเบียนนักเรียน</span></a>
                        <div><ul>
                            <li><a href="student_detail_search.php"><span>ค้นหารายชื่อ</span></a></li>
                            <li><a href="home.php"><span>ทะเบียนนักเรียน</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="exam.php"><span>คะแนนสอบ</span></a></li>
                    <li><a href="#" class="parent"><span>จัดการข้อมูล</span></a>
                        <div><ul>
                            <li><a href="subject.php"><span>จัดการข้อมูลวิชา</span></a></li>
                            <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
                            <li><a href="manageall.php"><span>จัดการข้อมูลอื่นๆ</span></a></li>
                            <? }?>
                        </ul></div>
                    </li>
					<? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
                    <li><a href="#" class="parent"><span>สรุปยอด</span></a>
                        <div><ul>
                            <li><a href="price.php"><span>ยอดแต่ละสาขา</span></a></li>
                            <!--<li><a href="results_request.php"><span>ยอดใบคำร้อง</span></a></li>-->
                        </ul></div>
                    </li>
               		<? }?>
                	
            	</ul></div>
            </li>
            <li><? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["accid"]=="7" /*or $objResultSTT["accid"]=="13" or $objResultSTT["accid"]=="14" or $objResultSTT["accid"]=="23" or $objResultSTT["accid"]=="29"*/ || $objResultSTT["status"]=="admin") {?>
                	<a href="endorsee_home.php" ><span>ใบคำร้อง</span></a>
                    <div><ul>
                           <li><a href="results_request.php"><span>ยอดใบคำร้อง</span></a></li>
                    </ul></div>
                	<? }else{?>
                	<a href="user_home.php"><span>ใบคำร้อง</span></a>
                	<? } ?>
             </li>
            
       		<li><a href="self/searchstudent.php" class="parent"><span>SELF</span></a>
            	<div><ul>
                    <li><a href="self/searchstudent.php" class="parent"><span>ทะเบียนนักเรียน</span></a>
                        <div><ul>
                            <li><a href="self/searchstudent.php"><span>ค้นหาข้อมูลนักเรียน</span></a></li>
                            <!--<li><a href="self/addstudent.php"><span>เพิ่มนักเรียนใหม่</span></a></li>-->
                            <li><a href="self/manageaccount.php"><span>เพิ่ม account</span></a></li>
                            <li><a href="self/shirt_search.php"><span>รับเสื้อนักเรียน</span></a></li>
                            <li><a href="self/book_search.php"><span>รับหนังสือ</span></a></li>
                            <li><a href="self/credit_time_search.php"><span>ขยายเวลา/เพิ่มเครดิต(free)</span></a></li>
                            <li><a href="self/credit_time_search2.php"><span>ขยายเวลา/เพิ่มเครดิต(คิดค่าบริการ)</span></a></li>
                            <li><a href="self/exp.php"><span>ทดลองเรียน S.E.L.F</span></a></li>
                            <li><a href="self/trial.php"><span>ชดเชยระบบ S.E.L.F</span></a></li>
                        </ul></div>
                    </li>
                	<li><a href="self/coursemanage.php" class="parent"><span>วิชาเรียน</span></a>
                        <div><ul>
                        	 <li><a href="self/coursemanage.php"><span>จัดการวิชาเรียน</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="#" class="parent"><span>คะแนนสอบ</span></a>
                        <div><ul>
                             <li><a href="self/addscore.php"><span>คะแนนตามรายวิชา</span></a></li>
                            <li><a href="self/studentaddscore.php"><span>คะแนนตามรายชื่อ</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="#" class="parent"><span>ที่นั่งself</span></a>
                        <div><ul>
                            <li><a href="self/viewseat.php"><span>ดูจำนวนที่นั่ง</span></a></li>
                            <li><a href="self/seat.php"><span>จองเวลา</span></a></li>
                        </ul></div>
                    </li>
					<? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["accid"]=="7") {?>
                    <li><a href="#" class="parent"><span>สรุปยอด</span></a>
                        <div><ul>
                            <li><a href="self/results_account.php"><span>ยอด account self</span></a></li>
                        </ul></div>
                    </li>
                    <? }?>
                	<li><a href="self/manageaccount_day.php" class=""><span> <img src="images/icn_new.gif"/>self after school</span></a></li>
            	</ul></div>
        	</li>
             <li><a href="HMScardscan.php"><span><img src="images/icn_new.gif"/>HMS CARD</span></a>
                <div><ul>
                <!--<li><a><div id="opener"><span><strong> HMS CARD สแกน</strong></span></div></a></li>-->
                <li><a href="HMS_student.php"><span>ค้นหาชื่อสมาชิกบัตร</span></a></li>
                <li><a href="HMS_regiscard.php"><span>สมัครบัตรHMS</span></a></li>
				<? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
                <li><a href="HMS_PrintCardAll.php"><span>พิมพ์บัตรHMS</span></a></li>
                <? } ?>
                </ul></div>
        	</li>
</ul>
        
</div>
<br /><br /><br /><br />
<div id="copyright"><!--Copyright &copy; 2014--> <a href="http://apycom.com/"><!--Apycom jQuery Menus--></a></div>

    <div id="content">
    <h2>Print HMS card</h2>
  <br />

<form name="frmMain" action="HMS_printcard.php" method="post" >
	<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
  	  <tr>
          <td colspan="6" class="tbl23" style="white-space: nowrap;" align="center"  height="35">ตารางรายชื่อ</td>
      </tr>
	  <tr>
          <!--<td width="7%"  class="tbl2" style="white-space: nowrap;" align="center">
              <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">all
              <input name="submit" type="submit" value="Print"/> 
          </td>-->
          <td width="7%"  class="tbl2" style="white-space: nowrap;" align="center">ลำดับที่</td>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
          <td width="29%" class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
          <td width="13%" class="tbl2" style="white-space: nowrap;" align="center">วันที่สมัครบัตร</td>
          <td width="8%" class="tbl2" style="white-space: nowrap;" align="center">เพิ่มเลขบัตร</td>
      </tr>
      
<? 
if(count($_POST["chkDel"]) == 0){
	echo "<script language='javascript'>alert('กรุณาเลือก เพื่อเพิ่มหมายเลขการ์ด!!');</script>";
	echo "<script>window.location='HMS_PrintCardAll.php';</script>";
}
for($i=0;$i<count($_POST["chkDel"]);$i++){
	if($_POST["chkDel"][$i] != ""){
		$strSQL = "SELECT 
			card.id_hms,
			card.id_card,
			card.start_date,
			card.date_expirePoint,
			card.status,
			allstud.school_studentid,
			allstud.selfdb_studentid,
			allstud.name
			FROM hms_card card
			INNER JOIN hms_allstudent allstud
				ON allstud.id = card.id_allstudent 
			WHERE card.id_hms = '".$_POST["chkDel"][$i]."' ";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$objResult = mysql_fetch_array($objQuery);
		$num++;
		if($num % 2 == 0){
			$tblyy = "tblyy2";
		}else{
			$tblyy = "tblyy";
		}
?>      
      <tr>
      	 <!-- <td width="7%" style="white-space:nowrap;" class="<?=$tblyy?>" align="center">
          	<? if($objResult['id_card']==''){?><input type="checkbox" name="chkDel[]" id="chkDel<?=$num;?>" value="<?=$objResult['id_hms'];?>"/><? }?>
          </td>-->
          <td width="7%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$num;?></td>
          <td width="9%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
		  	<? 
				if($objResult['school_studentid']!='0'){
					echo $objResult['school_studentid'];
				}else{
					echo $objResult['selfdb_studentid'];
				}
			?>
          </td>
          <td width="29%" class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><?=$objResult['name']?></td>
          <td width="13%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=DateThaiDMY($objResult["start_date"])?></td>
          <td width="8%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
          	<textarea name="ID_CARD[]" id="ID_CARD<?=$num;?>" /><?=$objResult["id_card"]?></textarea>
            <input type="hidden" name="ID_HMS[]" id="ID_HMS<?=$num;?>" value="<?=$objResult['id_hms'];?>" />
          </td>
       </tr>
<? 
	}
}
?>
	<input type="hidden" name="hdnCount" value="<?=$num;?>">
  </table>
  <BR><center><input name="submit" type="submit" value="SAVE&Print"/></center>
</form>
</div>
</div>

</body>

<script type="text/javascript"> Cufon.now(); </script>
</html>
<?php mysql_close();?>