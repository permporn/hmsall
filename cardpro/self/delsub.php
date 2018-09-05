<? 
session_start();
include("funtion.php");
include("ck_session_self.php");
error_reporting(~E_NOTICE);
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
    <h1>+ admin </h1>
    <p>
    <div align="right">
    <form action="searchstudent.php" method="get" id="search-form">
        <label >ค้นหารายชื่อ:</label>
        <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  		<input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
        <a href="#" onClick="document.getElementById('search-form').submit()">ค้นหา</a>
    </form>
    </div>
    </p>
<p>
<script language="javascript">

function fncConfirm1()
{
	if(confirm('Goto 1')==true){document.frm1.submit();}
	else{}
}

</script>
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/delectsub.png) no-repeat left top;
}
</style>

         <?
			$strSQL = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = ".$_GET["accid"]." ";
			$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
			$Num_Rows = mysqli_num_rows($objQuery); 
		 ?>
         
    <form action="delsub1.php?accid=<?=$_GET["accid"];?>" method="post" name="form1">
    <p><strong>- admin ลบวิชา</strong></p>
        <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
        	<tr>
            	<input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
                <input type="hidden" name="staffid" value="<?=$_SESSION["stid"]?>"/>
            	<td width="80%" class="tblyy2" height="35" colspan="2">เลือกวิชาที่ต้องการลบ :</td>
         	</tr>
			<? $i=0;?>
			<? while($objResult = mysqli_fetch_array($objQuery)){ 
			if($objResult["creditid"] != ''){?>
            <tr>
         		<td width="5%" class="tblyy" height="35"><input type="checkbox" name="chk[]" value="<?=$objResult["creditid"]?>"><?=$objResult["subname"]?></td>
         	</tr>
			<? $i++; 
			}else{ ?>
            <tr>
         		<td width="5%" class="tblyy" height="35">ไม่มีวิชาเรียน</td>
         	</tr>
            <? }} ?>
            <tr>
         		<td width="75%" class="tblyy" height="35">
                <input name="btnSubmit" type="submit" value="ลบ" class="submit2" style="width:80px">
                <a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET["std"]?>" style="text-decoration:none"><< กลับ</a>
                </td>
         	</tr>
		</table>
    </form>
</p>
</div>
<? mysqli_close($con_ajtongmath_self);?>
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
		return "data.php?q=" +encodeURIComponent(this.value);
    });	
}	
make_autocom("show_arti_topic","h_arti_id");
</script>
</body>
</html>