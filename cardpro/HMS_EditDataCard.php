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
    <h1>แก้ไขข้อมูล</h1>
    

<form name="frmMain" action="HMS_EditDataCard.php?ac_edit=save_edit&id_hmsall=<?=$_GET['id_hmsall']?>" method="post" >

  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
  	  <tr>
          <?php
		  	$query_allst = mysql_query("SELECT * FROM hms_allstudent WHERE id = '".$_GET['id_hmsall']."'" ,$connect_school);
			$result_allst = mysql_fetch_array($query_allst);
				
			$query_card = mysql_query("SELECT * FROM hms_card WHERE id_allstudent = '".$result_allst['id']."' && status IN ('1' ,'2')" ,$connect_school);
			$result_card = mysql_fetch_array($query_card);
				
			?>
      	<? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN") {$a = 10;$b = 2;$c = 7;?><? }else{$a = 9;$b = 2;$c = 6;} ?>
          <td colspan="<?=$a?>" class="tbl23" style="white-space: nowrap;" align="center"  height="">ข้อมูลนักเรียน 
              <div align="right">
                สถานะบัตร 
                <font color="#FF0000">
                <?
					$Q_statusname = mysql_query("SELECT * FROM hms_card_status WHERE id = '".$result_card['status']."'" ,$connect_school);
					$R_statusname = mysql_fetch_array($Q_statusname);
					echo $R_statusname['note'];
				?>
                </font>
				<!--<?php if($id_bill != ''){?><input type=button onClick="parent.location='HMS_PrintBillcrad.php?id_bill=<?=$id_bill?>'" value='พิมใบเสร็จ'/><?php }?>-->
              </div>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          รหัสนักเรียน : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$result_allst['id']?></font>
          </td>
          <td class="tblyy"  rowspan="16" style="white-space: nowrap;" align="left"  height=""> 
          	<img src="images/hmscard.png" width="200"/><br /><center>
            <!--<button type="button" onClick="parent.location='self/manageaccount.php?id_hmsall=<?=$result_allst['id']?>'" >สมัครคอร์สเรียน Self</button></center>-->
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          รหัสบัตร : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">

          <font color="#0099FF"><input type="text" name="id_card" id="id_card" value="<?=$result_card['id_card'];?>"/><?=$result_card['id_card'];?> จำนวน<?=strlen($result_card['id_card']);?>หลัก</font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
           แก้ไข point  : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#EE0000"><input type="text" name="point" id="point" value="<?=$result_card['point'];?>"/> <?=$result_card['point'];?> point </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          วันหมดอายุ POINT : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#EE0000"><input type="date" name="date_expirePoint" id="date_expirePoint" value="<?=$result_card['date_expirePoint']?>"/>
		  <?=DateThai($result_card['date_expirePoint']);?> </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
           แก้ไข เงินสะสม  : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#EE0000"><input type="text" name="savings" id="savings" value="<?=$result_card['savings'];?>"/> <?=$result_card['savings'];?> บาท </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          Mapข้อมูล : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
		  <font color="#0099FF">
          <input type="text" name="show_school" id="show_school" size="30" value="<?=$_GET['name'];?>" placeholder="ค้นหารายชื่อการเรียน สด/DVD" />
          <input type="hidden" name="id_school" id="id_school" value="" />
          <input type="text" name="show_self" id="show_self" size="30" value="<?=$_GET['name'];?>" placeholder="ค้นหารายชื่อการเรียน self" />
          <input type="hidden" name="id_self" id="id_self" value="" />
          </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อ : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
		  <font color="#0099FF"><input type="text" name="name" id="name" value="<?=$result_allst["name"];?>" /></font>
          </td>
      </tr>
      <tr>
       	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เบอร์โทร : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="tel" id="tel" value="<?=$result_allst["tel"];?>"/></font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          email :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="email" id="email" value="<?=$result_allst["email"];?>"/></font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อเล่น :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="nickname" id="nickname" value="<?=$result_allst["nickname"];?>"/></font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          โรงเรียน :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="school" id="school" value="<?=$result_allst["school"];?>"/></font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          วันเกิด :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="date" name="birthday" id="birthday" value="<?=$result_allst["birthday"];?>"/></font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เลขประจำตัวประชาชน :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="pcode" id="pcode" value="<?=$result_allst["pcode"];?>"/></font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ที่อยู่ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="address" id="address" value="<?=$result_allst["address"];?>"/></font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อพ่อ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="dadname" id="dadname" value="<?=$result_allst["dadname"];?>"/></font>
           เบอร์โทรพ่อ :  <font color="#0099FF"><input type="text" name="dadtel" id="dadtel" value="<?=$result_allst["dadtel"];?>"/></font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อแม่ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="momname" id="momname" value="<?=$result_allst["momname"];?>"/></font>
          เบอร์โทรแม่ :  <font color="#0099FF"><input type="text" name="momtal" id="momtal" value="<?=$result_allst["momtal"];?>"/></font>
          </td>
      </tr>
</table>
<br />
<center><input type="submit" value="บันทึก"  /></center>

</form>
<br />
<br />
</div>
</body>
<?php
	if($_GET['ac_edit'] == 'save_edit'){
		$id_allst = $result_allst['id'];
		$name = $_POST['name'];
		$tel = $_POST['tel'];
		$email = $_POST['email'];
		$nickname = $_POST['nickname'];
		$school = $_POST['school'];
		$birthday = $_POST['birthday'];
		$pcode = $_POST['pcode'];
		$address = $_POST['address'];
		$dadname = $_POST['dadname'];
		$dadtel = $_POST['dadtel'];
		$momname = $_POST['momname'];
		$momtal = $_POST['momtal'];
		if($_POST['id_school'] != ''){
			$id_school = $_POST['id_school'];
		}else{
			$id_school = $result_allst['school_studentid'];
		}
		if($_POST['id_self'] != ''){
			$id_self = $_POST['id_self'];
		}else{
			$id_self = $result_allst['selfdb_studentid'];
		}
		
		$str_hmsall = "UPDATE hms_allstudent SET ";
		$str_hmsall .="school_studentid = '".$id_school."' ";
		$str_hmsall .=", selfdb_studentid = '".$id_self."' ";
		$str_hmsall .=", pcode = '".$pcode."' ";
		$str_hmsall .=", name = '".$name."' ";
		$str_hmsall .=", tel = '".$tel."' ";
		$str_hmsall .=", birthday = '".$birthday."' ";
		$str_hmsall .=", address = '".$address."' ";
		$str_hmsall .=", school = '".$school."' ";
		$str_hmsall .=", email = '".$email."' ";
		$str_hmsall .=", nickname = '".$nickname."' ";
		$str_hmsall .=", dadname = '".$dadname."' ";
		$str_hmsall .=", momname = '".$momname."' ";
		$str_hmsall .=", dadtel = '".$dadtel."' ";
		$str_hmsall .=", momtal = '".$momtal."' ";
		$str_hmsall .="WHERE id = '".$id_allst."' ";
		$OQ_hmsall = mysql_query($str_hmsall,$connect_school) or die ("Error Query [".$str_hmsall."]");
		
		echo $str_hmsall.'<BR>';
		
		
		$id_hmscard = $result_card['id_hms'];
		$id_card = $_POST['id_card'];
		$point = $_POST['point'];
		$date_expirePoint = $_POST['date_expirePoint'];
		$savings = $_POST['savings'];
		$num_id_hmscard = strlen($id_card);
		if($num_id_hmscard == 10){
			$status = '2';
		}else{
			$status = '1';
		}
		
		$str_hmscard = "UPDATE hms_card SET ";
		$str_hmscard .="id_card = '".$id_card."' ";
		$str_hmscard .=", point = '".$point."' ";
		$str_hmscard .=", date_expirePoint = '".$date_expirePoint."' ";
		$str_hmscard .=", status = '".$status."' ";
		$str_hmscard .=", savings = '".$savings."' ";
		$str_hmscard .="WHERE id_hms = '".$id_hmscard."' ";
		$OQ_hmscard = mysql_query($str_hmscard,$connect_school) or die ("Error Query [".$str_hmscard."]");
		
		echo $str_hmscard.'<BR>';
		
		
		echo "<script language='javascript'>alert('บันทึกเสร็จสิ้น!! ');</script>";
		echo "<script>window.location='HMS_student.php?id_hms=$id_allst';</script>";
	}
?>

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
		return "HMS_data_self.php?q=" +encodeURIComponent(this.value);
    });	
}	
make_autocom("show_self","id_self");


function make_autocomSc(autoObj,showObj){
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
		return "HMS_data_school.php?q=" +encodeURIComponent(this.value);
    });	
}	
make_autocomSc("show_school","id_school");	

</script>
<script type="text/javascript"> Cufon.now(); </script>
<div id="dialog" title="สแกนบัตร" align="center">
	<img src="images/taaaa.png" width="400"/>
	<input id="idcard_textbox" type="text" size="40" />
</div>
</html>
<?php mysql_close();?>