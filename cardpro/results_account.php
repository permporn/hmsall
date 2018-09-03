<? 
session_start();
include("ck_session.php");
mysql_close();
include("funtion.php");
include("config.incself.php");
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
    <h1>สรุปยอด account self</h1>
    <div align="center">
    <p>
    <form name="Form1" method="get" action="results_account.php" onSubmit="return checkForm();">
           <label for=""> ตั้งแต่ :</label><input type="date" name="sdate" id="sdate" value="<?=$_GET["sdate"]?>">
           <label for=""> ถึงวันที่ :</label><input type="date" name="edate" id="edate" value="<?=$_GET["edate"]?>">
           <label for="">สาขา:</label> 
           <? 	$strSQL1 = "SELECT * FROM branch";
				$objQuery1 = mysql_query($strSQL1);?>
                
                <select name="status" id="status">
                        <? if($_POST["status"]==""){?><option value="00" selected="selected">เลือกสาขา</option><? }?>
                        <option value="00" <? if($_GET["status"]=="00"){?>selected="selected"<? }?>>ทุกสาขา</option>
                        <? while ($objResult1 = mysql_fetch_array($objQuery1)){?>
                        <option value="<?=$objResult1["branchid"]?>" <? if($objResult1["branchid"]==$_GET["status"]){?>selected="selected"<? }?>><?=$objResult1["name"]?></option>
                   		<? } ?>
                 	</select>
            <input type="submit" name="submit" id="submit" value="ค้นหา"></td>
         
   </form>
   </p>
   </div>
   <br />
	<p>
  <? if($_GET["sdate"]!=""&&$_GET["edate"]!=""){?>
     <form name="Form2" method="get" action="results_account.php" >
          <center>
          <table>
          <tr>
          <td>
          <label for="">ค้นหาชื่อคอร์ส: </label>
                   <?
				   	if($_GET["h_arti_id_subj"]!=""){
				   		$objQuery_TpSj = mysql_query("SELECT * FROM subject WHERE subid = '".$_GET["h_arti_id_subj"]."'");
				 		$objResult_TpSj = mysql_fetch_array($objQuery_TpSj);
				 	}
                   ?>
                   <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="<?=$objResult_TpSj["subname"]?>" />
                   <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="<?=$_GET["h_arti_id_subj"]?>" />
                   <input name="sdate" type="hidden" id="sdate" value="<?=$_GET["sdate"]?>" />
                   <input name="edate" type="hidden" id="edate" value="<?=$_GET["edate"]?>" />
                   <input name="status" type="hidden" id="status" value="<?=$_GET["status"]?>" />
                  
                   </td>
 
      </form>
      </p>
      <p>
      <form name="Form3" method="get" action="results_account.php" >

          <td>
            <center>
            <label for="">ค้นหาตามประเภทจ่าย:</label>
                 <select name="type_pay" id="type_pay">
                     <? if($_GET["type_pay"]==""){?><option value="0" disabled="disabled" selected="selected">เลือก</option><? }?>
                     <option value="transfer" <? if($_GET["type_pay"]=="transfer"){?>selected="selected"<? }?>>โอน</option>
                     <option value="cradit" <? if($_GET["type_pay"]=="cradit"){?>selected="selected"<? }?>>บัตรเครดิต</option>
                     <option value="money" <? if($_GET["type_pay"]=="money"){?>selected="selected"<? }?>>เงินสด</option>
                     <option value="test" <? if($_GET["type_pay"]=="test"){?>selected="selected"<? }?>>ทดลองเรียนฟรี</option>
                     <option value="free" <? if($_GET["type_pay"]=="free"){?>selected="selected"<? }?>>ฟรี พิเศษ</option>
                 </select>
                 <input name="sdate" type="hidden" id="sdate" value="<?=$_GET["sdate"]?>" />
                 <input name="edate" type="hidden" id="edate" value="<?=$_GET["edate"]?>" />
                 <input name="status" type="hidden" id="status" value="<?=$_GET["status"]?>" />
                 <input type="submit" name="submit" id="submit" value="ค้นหา">
                 </center>
                 </td>
                 </tr>
      </form>
      </p>
      </table>
      <br />
           <? }?>
           <? if($_GET["sdate"]!=""&&$_GET["edate"]!=""){?>
           
<?
$sdate = $_GET["sdate"];
$edate = $_GET["edate"];
$status = $_GET["status"];
$h_arti_id_subj = $_GET["h_arti_id_subj"];
$type_pay = $_GET["type_pay"];

$num = 0;
$strSQL = "
SELECT a.accid
, a.studentid
, a.username
, a.password
, a.sdate
, a.edate
, a.staffid
, s.stname
, c.subid
, c.type_pay
, c.amount
, c.Invoicenumber
FROM account a
INNER JOIN credit c
    on a.accid = c.accid
INNER JOIN staff s
    on c.staffid = s.stid
WHERE c.date_regis between '".$sdate."' AND '".$edate."'
";
if($status!="00"){
	$strSQL .= " AND s.branchid = '".$status."'";
}
if($h_arti_id_subj!=""){
	$strSQL .= " AND c.subid = '".$h_arti_id_subj."'";
}
if($type_pay!=""){
	$strSQL .= " AND c.type_pay = '".$type_pay."'";
}

$objQuery = mysql_query($strSQL);
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 50;   // Per Page

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

//นับคนทั้งหมด และ จำนวนเงินทั้งหมด
$sumamount_all = 0;
$objQuery_sum  = mysql_query($strSQL);
while($objResult_sum = mysql_fetch_array($objQuery_sum)){
	
	$sumamount_all = $sumamount_all + $objResult_sum["amount"];
}

$strSQL .=" order  by a.accid DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>   
		   <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
           <tr>
              <td colspan="9" class="tbl2" style="white-space: nowrap;"><div align="center"><strong>สรุปรายงาน Account ระบบเรียน S.E.L.F</strong></div></td>
           </tr>
           <tr>
              <td colspan="9" class="tbl2" style="white-space: nowrap;"><div align="center"><strong>
              จำนวน <font color="#3366FF"> <?= $Num_Rows;?> </font> Account ตั้งแต่วันที่ <font color="#3366FF"><?=DateThai($_GET["sdate"])?></font> ถึงวันที่ <font color="#3366FF"><?=DateThai($_GET["edate"])?></font>  สาขา  <font color="#3366FF">
              <?
			  if($_GET["status"]=="00"){echo "ทุกสาขา";}
			  else{
			  	 $objQuery_bns = mysql_query("SELECT * FROM branch WHERE branchid = '".$_GET["status"]."'");
				 $objResult_bns = mysql_fetch_array($objQuery_bns);
				 echo $objResult_bns["name"];
			  }
			  ?>
              </font></strong></div></td>
           </tr>
           <tr>
              <td width="" class="tbl24" colspan="9"  style="white-space: nowrap;"><div align="right">รวมเป็นเงิน = <font color="#DD0000" ><?=number_format($sumamount_all)?> </font>บาท</div></td>
            </tr>
           
           <tr>
              <td width="" class="tbl2" style="white-space: nowrap;"><center>ลำดับ</div></td>
              <td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>วันที่</strong></div></td>
              <td width="" class="tbl2" style="white-space: nowrap;"><center>ชื่อ-นามสกุล</div></td>
              <td width="" class="tbl2" style="white-space: nowrap;"><center>Username</div></td>
              <!--<td width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>password</strong></div></td>-->
              <td width="" class="tbl2" style="white-space: nowrap;"><center>ชื่อคอร์สเรียน</div></td>
              <td width="" class="tbl2" style="white-space: nowrap;"><center>ราคา</div></td>
              <td width="" class="tbl2" style="white-space: nowrap;"><center>เลขใบเสร็จ</div></td>
              <td width="" class="tbl2" style="white-space: nowrap;"><center>จ่ายโดย</div></td>
              <td width="" class="tbl2" style="white-space: nowrap;"><center>ออกโดย</div></td>
            </tr>

<? 	
	while($objResult = mysql_fetch_array($objQuery)){
		$num++;
		if($num % 2 == 0){$tblyy = "tblyy2";}
		else{$tblyy = "tblyy";}
		
?>

            <tr>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=$num+(($Page-1)*$Per_Page)?></div></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=DateThai($objResult["sdate"])?></div></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;">
			  <?
			  	$objQuery_stname = mysql_query("SELECT name FROM student WHERE studentid = '".$objResult["studentid"]."'");
				$objResult_stname = mysql_fetch_array($objQuery_stname);
				echo $objResult_stname["name"];
			  ?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=$objResult["username"]?></center></td>
              
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;">
			  <?
			  	$objQuery_subname = mysql_query("SELECT subname FROM subject WHERE subid = '".$objResult["subid"]."'");
				$objResult_subname = mysql_fetch_array($objQuery_subname);
				echo $objResult_subname["subname"];
			  ?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=number_format($objResult["amount"])?></center></td>
              <td width=""  class="<?=$tblyy?>" style="white-space: nowrap;"><div align="left"><?=$objResult["Invoicenumber"]?></div></td>
              <!--<td width=""  class="tblyy" style="white-space: nowrap;"><div align="center"><?=DateThai($objResult["edate"])?></div></td>-->
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center>
			  <? if($objResult["type_pay"] == 'transfer'){echo "โอน";}
			  	 else if($objResult["type_pay"] == 'test'){echo "ทดลองเรียน";}
				 else if($objResult["type_pay"] == 'cradit'){echo "บัตรเคดิต";}
				 else if($objResult["type_pay"] == 'money'){echo "เงินสด";}
				 else if($objResult["type_pay"] == 'free'){echo "ฟรี พิเศษ";}
			  ?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=$objResult["stname"]?></center></td>
            </tr>
 <? }if($Num_Rows>0){?>           
            
            <!--<tr>
              <td colspan="9" class="tblyy" style="white-space: nowrap;"><div align="center"><input type="submit" name="submit" id="submit" value="พิมพ์"></div></td>
           </tr>-->
<? }if($Num_Rows==0){?>
			<tr>
            	<td colspan="9" class="tblyy" style="white-space: nowrap;"><div align="center"><font color="#FF0000">ไม่พบข้อมูล</font></div></td>
            </tr>
<? }?>
           </table>

<br>
Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
<?
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&sdate=$sdate&edate=$edate&status=$status&h_arti_id_subj=$h_arti_id_subj&type_pay=$type_pay'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&sdate=$sdate&edate=$edate&status=$status&h_arti_id_subj=$h_arti_id_subj&type_pay=$type_pay'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&sdate=$sdate&edate=$edate&status=$status&h_arti_id_subj=$h_arti_id_subj&type_pay=$type_pay'>Next>></a> ";
}
//mysql_close($objConnect);
?>

           <? }?>
                  
<script type="text/javascript"> 
function make_autocomsubj(autoObj,showObj){
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
		return "dataname.php?q=" +encodeURIComponent(this.value);
    });	
}		

function make_autocomname(autoObj,showObj){
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
		return "datasubj.php?q=" +encodeURIComponent(this.value);
    });	
}		

make_autocomsubj("show_arti_topic_subj","h_arti_id_subj");
make_autocomname("show_arti_topic_name","h_arti_id_name");
Cufon.now(); </script>
</div>
</body>
</html>