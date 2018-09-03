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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<? include("script_link.php");?>
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
	<? include('menu.php')?>
    <div id="content">
    <h2>Print HMS card</h2>
    <center>
<form name="form1" action="HMS_PrintCardAll.php" method="get">
    <label for="year">ช่วงเวลาสมัคร:</label>
        วันเริ่มต้น <input type="date" name="st" id="st" value="<?=$_GET['st']?>" />
        วันสิ้นสุด <input type="date" name="en" id="en" value="<?=$_GET['en']?>" />
    <label for="status">เลือกสถานะบัตร:</label>
       <select name="card_status" id="card_status" style="width:170px;">
            <option value="" <? if($_GET["card_status"]==''){?>selected="selected"<? }?>>ทุกสถานะ</option>
            <?
            $query_stc = mysql_query("SELECT * FROM hms_card_status WHERE id IN ('1','2')");
            while($result_stc = mysql_fetch_array($query_stc)){
            ?>
            <option value="<?=$result_stc['id']?>" <? if($_GET["card_status"]==$result_stc['id']){?>selected="selected"<? }?>><?=$result_stc['name']?></option>
            <? }?>
       </select>
     <label for="">เลือกสาขา:</label>
       <select name="branchid" id="branchid" style="width:170px;">
            <option value="" <? if($_GET["branchid"]==''){?>selected="selected"<? }?>>ทุกสาขา</option>
            <?
            $QR_branch = mysql_query("SELECT * FROM branch");
            while($RS_branch = mysql_fetch_array($QR_branch)){
            ?>
            <option value="<?=$RS_branch['branchid']?>" <? if($_GET["branchid"]==$RS_branch['branchid']){?>selected="selected"<? }?>><?=$RS_branch['branchname']?></option>
            <? }?>
       </select>   
    
       
    <br><br>
    <label><strong>ค้นหารายชื่อ :</strong></label>
        <?
            if($_GET['h_arti_id']!=''){
                $query_stc = mysql_query("SELECT * FROM hms_allstudent WHERE id = '".$_GET['h_arti_id']."'");
                $result_stc = mysql_fetch_array($query_stc);
                
                $sch_name = $result_stc['name'];
            }
        ?>
        <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$sch_name?>" />
        <input name="h_arti_id" type="hidden" id="h_arti_id" value="" />
    
    <input type="submit" name="submit" value="ค้นหา" />   
</p>
<?
if($_GET['st']==''||$_GET['en']==''){$s_date = '1';}else{$s_date = "card.start_date BETWEEN '".$_GET['st']."' AND '".$_GET['en']."'";}
if($_GET['card_status']==''){$s_cardst = "card.status IN ('1','2')";}else{$s_cardst = "card.status = '".$_GET['card_status']."'";} 
if($_GET['h_arti_id']==''){$s_allid = '1';}else{$s_allid = "card.id_allstudent = '".$_GET['h_arti_id']."'";}
if($_GET['branchid']==''){$s_branch	= '1';}else{$s_branch = "b.branchid = '".$_GET['branchid']."'";}
?>
</form>
   </center>

  <br />
  <form name="frmMain" action="HMS_PrintCardAll_save_idcard.php" method="post" >
	<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
  	  <tr>
          <td colspan="11" class="tbl23" style="white-space: nowrap;" align="center"  height="35">ตารางรายชื่อ</td>
      </tr>
	  <tr>
          <td width="7%"  class="tbl2" style="white-space: nowrap;" align="center">
			<? if($_GET['card_status']=='1'){?>              
			<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">all <? }?>
            <? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
            <input name="submit" type="submit" value="Add IDCard"/> 
            <? }?>
          </td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">ลำดับที่</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">วันที่สมัครบัตร</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">point</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">เจ้าหน้าที่</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">ชำระ</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">สาขา</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">เพิ่มเลขบัตร</td>
          <td width="" class="tbl2" style="white-space: nowrap;" align="center">ร้บบัตร</td>
      </tr>
      
<? 	//$sumamount = 0;
	$strSQL = "SELECT 
		card.id_hms
		,card.id_card
		,card.start_date
		,card.date_expirePoint
		,card.status
		,card.branchid
		,card.ReceiveCard
		,allstud.id
		,allstud.school_studentid
		,allstud.selfdb_studentid
		,allstud.name
		,card.point
		,b.branchname
		,bill.money
		,acc.name name_staff
		FROM hms_card card
		INNER JOIN hms_allstudent allstud
			ON allstud.id = card.id_allstudent 
		LEFT JOIN branch b
			ON b.branchid = card.branchid 
		LEFT JOIN hms_bill bill
			ON bill.id_hms = card.id_hms
		LEFT JOIN account acc
			ON acc.accid = bill.id_staff
		WHERE $s_allid AND $s_cardst AND $s_date AND $s_branch";
		//ORDER BY card.start_date DESC
$OQ_NumRow = mysql_query($strSQL);
$Num_Rows = mysql_num_rows($OQ_NumRow);
$Per_Page = 20;   // Per Page
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

$strSQL .=" ORDER BY card.start_date desc, allstud.name desc LIMIT $Page_Start , $Per_Page";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	
	$num = 0;
	while($objResult = mysql_fetch_array($objQuery)){
		$num++;
		if($num % 2 == 0){$tblyy = "tblyy2";}
		else{$tblyy = "tblyy";}
?>      
      <tr>
      	  <td width="" style="white-space:nowrap;" class="<?=$tblyy?>" align="center">
          	<? if($objResult['id_card']==''){?><input type="checkbox" name="chkDel[]" id="chkDel<?=$num;?>" value="<?=$objResult['id_hms'];?>"/><? }?>
          </td>
          <td width=""  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=(($Page-1)*$Per_Page)+$num;?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><? echo $objResult['id']/*if($objResult['school_studentid']!='0'){echo $objResult['school_studentid'];}else{echo $objResult['selfdb_studentid'];}*/?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><?=$objResult['name']?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=DateThaiDMY($objResult["start_date"])?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["point"]?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["name_staff"]?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
		  <? if($objResult["money"] == 0){echo "ฟรี";}else{echo $objResult["money"]." บ.";} ?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult['branchname'];?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><? if($objResult['id_card']!=''){echo $objResult['id_card'];}?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
		  <? if($objResult['ReceiveCard'] == 0 && $objResult['status'] == 2){?><a href="HMS_Save_ReceiveCard.php?id_hms=<?=$objResult['id_hms'];?>&type=1&st=<?=$_GET['st']?>&en=<?=$_GET['en']?>&card_status=<?=$_GET["card_status"]?>&branchid=<?=$_GET["branchid"]?>&show_arti_topic=<?=$sch_name?>&h_arti_id=<?=$_GET['h_arti_id']?>">รับบัตร</a> 
		  <? }if($objResult['ReceiveCard'] != 0){echo DateThaiDMY($objResult['ReceiveCard']);}?>
          <font color="#FF0000"><? if($objResult['ReceiveCard'] == 0 && $objResult['status'] == 1){echo "ยังไม่พิมพ์บัตร";}?></font>
          </td>
       </tr>
     <? }?>
      <? if($num == 0){?>
       	<tr>
        	<td colspan="11" style="white-space:nowrap;" class="tblyy" align="center"><font color="#FF0000"><strong>ไม่พบข้อมูล</strong></font></td>
        </tr>
      <? }?>
      <input type="hidden" name="hdnCount" value="<?=$num;?>">
      
  </table>
<div align="right">
<p>Total <?= $Num_Rows;?> Record :<?=$Num_Pages;?> Page :
<?
$s_st = $_GET["st"];
$s_en = $_GET["en"];
$s_card_status = $_GET["card_status"];
$s_h_arti_id = $_GET["h_arti_id"];
$s_branchid = $_GET['branchid'];

if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&st=$s_st&en=$s_en&card_status=$s_card_status&h_arti_id=$s_h_arti_id&branchid=$s_branchid'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$i&st=$s_st&en=$s_en&card_status=$s_card_status&h_arti_id=$s_h_arti_id&branchid=$s_branchid'>$i</a> ";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&st=$s_st&en=$s_en&card_status=$s_card_status&h_arti_id=$s_h_arti_id&branchid=$s_branchid'>Next>></a> ";
}
/*mysql_close($objConnect);*/
?></p>     
</div>

  </form>
</div>
</div>
<div id="dialog" title="สแกนบัตร" align="center">
	<img src="images/taaaa.png" width="400"/>
	<input id="idcard_textbox" type="text" size="40" />
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
</html>
<?php mysql_close();?>