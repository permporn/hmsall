<? 
session_start();
include("ck_session.php");
mysql_close();
include("funtion.php");
include("config.inc.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php');?>
  <div id="content">
    <h1>สรุปยอด ใบคำร้อง</h1>
    <div align="center">
    <p>
    <form name="Form1" method="get" action="results_request.php" onSubmit="return checkForm();">
           <label for=""> ตั้งแต่ :</label><input type="date" name="sdate" id="sdate" value="<?=$_GET["sdate"]?>">
           <label for=""> ถึงวันที่ :</label><input type="date" name="edate" id="edate" value="<?=$_GET["edate"]?>">
           	<label for="">สาขา:</label> 
           	<select name="s_branch" id="s_branch">
           		<option value="" <? if($_GET["s_branch"]==""){?>selected="selected"<? }?>>ทุกสาขา</option>
              <? if($objResultSTT["status"] == "admin_hms"){
                  $objQuery_s_branch = mysql_query("SELECT * FROM branch WHERE status = 3 ORDER BY branchid");
                }else{ 
                  $objQuery_s_branch = mysql_query("SELECT * FROM branch ORDER BY branchid");
                }
				        while ($objResult_s_branch = mysql_fetch_array($objQuery_s_branch)){?>
                <option value="<?=$objResult_s_branch["branchid"]?>" <? if($objResult_s_branch["branchid"]==$_GET["s_branch"]){?>selected="selected"<? }?>><?=$objResult_s_branch["branchname"]?></option><? } ?>
			</select>
            <br /><br />
            <label for="">ประเภทใบคำร้อง:</label> 
           	<select name="s_type" id="s_type">
           		<option value="" <? if($_GET["s_type"]==""){?>selected="selected"<? }?>>ทุกประเภท</option>
           		<? $objQuery_s_type = mysql_query("SELECT * FROM ptt_type ORDER BY id");
				while ($objResult_s_type = mysql_fetch_array($objQuery_s_type)){?>
                <option value="<?=$objResult_s_type["id"]?>" <? if($objResult_s_type["id"]==$_GET["s_type"]){?>selected="selected"<? }?>><?=$objResult_s_type["name_type"]?></option><? } ?>
			</select>
            <label for="">ประเภทการชำระ:</label> 
           	<select name="s_pay" id="s_pay">
           		<option value="" <? if($_GET["s_pay"]==""){?>selected="selected"<? }?>>ทุกประเภท</option>
           		<option value="transfer" <? if($_GET["s_pay"]=="transfer"){?>selected="selected"<? }?>>โอน</option>
                <option value="cradit" <? if($_GET["s_pay"]=="cradit"){?>selected="selected"<? }?>>บัตรเครดิต</option>
                <option value="monay" <? if($_GET["s_pay"]=="monay"){?>selected="selected"<? }?>>เงินสด</option>
                <option value="free" <? if($_GET["s_pay"]=="free"){?>selected="selected"<? }?>>ฟรี</option>
			</select>
            
            <label for="">ปี/เทอม:</label>
            <select name="s_year" id="s_year" >
                <option value="" <? if($_GET["s_year"]==""){?>selected="selected"<? }?>>ทุกปี/ทุกเทอม</option>
                <? $objQuery_s_year = mysql_query("SELECT * FROM addterm ORDER BY id_year");
                while($objResult_s_year = mysql_fetch_array($objQuery_s_year)){?>
                    <option value="<?=$objResult_s_year["id_year"]?>" <? if($_GET["s_year"]==$objResult_s_year["id_year"]){?>selected="selected"<? }?>>
                    <?
                        $oq_ny = mysql_query("SELECT nameyear FROM year WHERE id = ".$objResult_s_year['year_id']." ");
                        $or_ny = mysql_fetch_array($oq_ny);
                        $oq_nt = mysql_query("SELECT term FROM term WHERE termid = ".$objResult_s_year['termid']." ");
                        $or_nt = mysql_fetch_array($oq_nt);
                        echo $or_ny['nameyear'].'/'.$or_nt['term'];
                    ?>
                    </option>
                <? } ?>
           </select>
           
            <input type="submit" name="submit" id="submit" value="ค้นหา"></td>
         
   </form>
   </p>
   </div>
   <br />
	<p>
  <? if($_GET["sdate"]!=""&&$_GET["edate"]!=""){?>
     
      </p>
      <p>
      
      </p>
      </table>
      <br />
           <? }?>
           <? if($_GET["sdate"]!=""&&$_GET["edate"]!=""){?>
           
<?
$sdate = $_GET["sdate"];
$edate = $_GET["edate"];
$s_branch = $_GET["s_branch"];
$s_type = $_GET["s_type"];
$s_pay = $_GET["s_pay"];
$s_year = $_GET["s_year"];
if($sdate!="" && $edate!=""){$key_day = "date_request between '".$sdate."' AND '".$edate."'";}else{$key_day = "1";}
if($s_branch != ""){$key_branch = "branchid = $s_branch";}else{$key_branch = "1";}
if($s_type != ""){$key_type = "type = $s_type";}else{$key_type = "1";}
if($s_pay != ""){$key_pay = "type_pay = '".$s_pay."'";}else{$key_pay = "1";}
if($s_year !=""){$key_year = "id_addterm = ".$s_year;}else{$key_year = "1";}

$num = 0;
$strSQL = "SELECT * FROM ptt_request WHERE $key_day AND $key_branch AND $key_type AND $key_pay AND status = 5 AND $key_year";
//echo $strSQL;
if($objResultSTT["status"] == "admin_hms"){
$str_reall .=" AND status = 3";
}
$objQuery = mysql_query($strSQL);
$Num_Rows = mysql_num_rows($objQuery);

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

//นับคนทั้งหมด และ จำนวนเงินทั้งหมด
$sumamount_all = 0;
$objQuery_sum  = mysql_query($strSQL);
while($objResult_sum = mysql_fetch_array($objQuery_sum)){
	
	$sumamount_all = $sumamount_all + $objResult_sum["money_balance"];
}

$strSQL .=" order  by id DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>   
		   <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
           <tr>
              <td colspan="9" class="tbl2" style="white-space: nowrap;"><div align="center"><strong>สรุปรายงาน ระบบใบคำร้อง</strong></div></td>
           </tr>
           <tr>
              <td colspan="9" class="tbl2" style="white-space: nowrap;"><div align="center"><strong>
              จำนวน <font color="#3366FF"> <?= $Num_Rows;?> </font> ใบคำร้อง ตั้งแต่วันที่ <font color="#3366FF"><?=DateThai($_GET["sdate"])?></font> ถึงวันที่ <font color="#3366FF"><?=DateThai($_GET["edate"])?></font>  สาขา  <font color="#3366FF">
              <? if($_GET["s_branch"]==""){echo "ทุกสาขา";}
			  else{
			  	 $objQuery_bns = mysql_query("SELECT * FROM branch WHERE branchid = '".$_GET["s_branch"]."'");
				 $objResult_bns = mysql_fetch_array($objQuery_bns);
				 echo $objResult_bns["branchname"];
			  }?>
              </font></strong></div></td>
           </tr>
           <tr>
              <td width="" class="tbl24" colspan="9"  style="white-space: nowrap;"><div align="right">รวมเป็นเงิน = <font color="#DD0000" ><?=number_format($sumamount_all)?> </font>บาท</div></td>
           </tr>
           <tr>
              <td width="" class="tbl2" style="white-space: nowrap;" align="center">ลำดับที่</td>
              <td width="" class="tbl2" style="white-space: nowrap;" align="center">เลขใบคำร้อง</td>
              <td width="" class="tbl2" style="white-space: nowrap;" align="center">วันที่ร้องขอ</td>
              <td width="" class="tbl2" style="white-space: nowrap;" align="center">ชื่อผู้ขอ</td>
              <td width="" class="tbl2" style="white-space: nowrap;" align="center">สาขา</td>
              <td width="" class="tbl2" style="white-space: nowrap;" align="center">ประเภทใบคำร้อง</td>
              <td width="" class="tbl2" style="white-space: nowrap;" align="center">ประเภทการชำระเงิน</td>
              <td width="" class="tbl2" style="white-space: nowrap;" align="center">เลขใบเสร็จ</td>
              <td width="" class="tbl2" style="white-space: nowrap;" align="center">ราคา</td>
            </tr>

<? 	
	while($objResult = mysql_fetch_array($objQuery)){
		$num++;
		if($num % 2 == 0){$tblyy = "tblyy2";}
		else{$tblyy = "tblyy";}
?>
            <tr>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$num+(($Page-1)*$Per_Page)?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["id"]?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=DateThai($objResult["date_request"])?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><?=$objResult["name"]?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
			  <?
			  	$objQuery_bname = mysql_query("SELECT branchname FROM branch WHERE branchid = '".$objResult["branchid"]."'");
				$objResult_bname = mysql_fetch_array($objQuery_bname);
				echo $objResult_bname["branchname"];
			  ?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="left">
			  <?
			  	$objQuery_tname = mysql_query("SELECT name_type FROM ptt_type WHERE id = '".$objResult["type"]."'");
				$objResult_tname = mysql_fetch_array($objQuery_tname);
				echo $objResult_tname["name_type"];
			  ?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
			  <? if($objResult["type_pay"] == 'transfer'){echo "โอน";}
			  	 else if($objResult["type_pay"] == 'cradit'){echo "บัตรเคดิต";}
				 else if($objResult["type_pay"] == 'monay'){echo "เงินสด";}
				 else if($objResult["type_pay"] == 'free'){echo "ฟรี";}
			  ?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["num_pay"]?></td>
              <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=number_format($objResult["money_balance"])?></td>
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
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&sdate=$sdate&edate=$edate&s_branch=$s_branch&s_type=$s_type&s_pay=$s_pay&s_year=$s_year'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&sdate=$sdate&edate=$edate&s_branch=$s_branch&s_type=$s_type&s_pay=$s_pay&s_year=$s_year'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&sdate=$sdate&edate=$edate&s_branch=$s_branch&s_type=$s_type&s_pay=$s_pay&s_year=$s_year'>Next>></a> ";
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
<?php mysql_close();?>