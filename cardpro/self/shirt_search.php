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
    <h1>รับเสื้อ</h1>
    <p>
    <div align="right">
    <!--<form action="searchstudent.php" method="get" id="search-form">
        <label >ค้นหารายชื่อ:</label>
        <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  		<input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
        <a href="#" onClick="document.getElementById('search-form').submit()">ค้นหา</a>
    </form>-->
    </div>
    </p>
<p>
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/infostudent.png) no-repeat left top;
}
#hh{
	font-size:10px;
	color:#666;
	font-family:Tahoma, Geneva, sans-serif;
}
a:link {
	color: #0099FF;
}
</style>
<script language="javascript">
function chk_null(){
	if (document.addstudentForm.sub.value == 0){
		alert("กรุณากรอกจำนวน")
		document.addstudentForm.sub.focus()
		return false
	}
}
</script>
		<form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
         <div align="right">
         <label >ค้นหารายชื่อ:</label>
         	  <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
              <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
              <button type="submit" name="button" id="button" class="submit2" >ค้นหา</button>
              </div>
  		</form>
		<?
        if($_GET["Action"] == "Del")
        {
            $strSQL = "DELETE FROM account ";
            $strSQL .="WHERE accid = '".$_GET["accid"]."' ";
            $objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
            if(!$objQuery)
            {
                echo "Error Delete [".mysqli_error()."]";
            }
            //header("location:$_SERVER[PHP_SELF]");
            //exit();
        }
        if($_GET["h_arti_id"] != ""){

            $strSQL = "SELECT * FROM student WHERE name = '".$_GET["h_arti_id"]."'";
            $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
			$objResult = mysqli_fetch_array($objQuery);
			$std = $objResult["studentid"];
			$stdname = $objResult["name"];
			
			
			$statusout = "out";
			$strSQL2 = "SELECT * FROM account WHERE studentid = ".$std." AND status != '".$statusout."' ";
			$objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL2."]");
			$l = 1;

            ?>
    <br>
   <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
	  <tr>	
	 		<td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height="">ข้อมูลนักเรียน</td>
      </tr>
      <tr>
          <td colspan="2" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          รหัสนักเรียน : </td>
          <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$std;?></font>
          </td>
      </tr>
      <tr>
          <td colspan="2" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อ : </td>
          <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$stdname;?></font>
          </td>
      </tr>
      <tr>
       	  <td colspan="2" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เบอร์โทร : </td>
          <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$tel;?> </font>
          </td>
      </tr>
      <tr>
      	  <td colspan="2" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          email :</td>
          <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$email;?> </font>
          </td>
      </tr>
      <!--<tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อเล่น :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["nickname"];?> </font>
          </td>
      </tr>-->
      <tr>
      	  <td colspan="2" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          โรงเรียน :</td>
          <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$school;?> </font>
          </td>
      </tr>
      <!--<tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          วันเกิด :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["birthday"];?> </font>
          </td>
      </tr>
      <tr>
      	  <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เลขประจำตัวประชาชน :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["pcode"];?> </font>
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
      </tr>-->
      <tr>
      	
          <td colspan="6" class="tbl2" style="white-space: nowrap;" align="left"  height="">
          + ข้อมูลวิชาเรียนทั้งหมด ของ <font color="#0099FF"><?=$objResult_stu["studentname"];?></font> 
          </td>
      </tr>
      <tr>
      	<td width="5%" class="tbl2" height="35" align="center"><strong>Acc.</strong></td>
        <td width="10%" class="tbl2" height="35" align="center"><strong>Username</strong></td>
		<td width="10%" class="tbl2" height="35" align="center"><strong>password</strong></td>
        <td width="25%" class="tbl2" height="35" align="center"><strong> คอร์ส</strong></td>
		<td width="10%" class="tbl2" height="35" align="center"><strong> รับเสื้อแล้ว/ตัว</strong></td>
        <td width="10%" class="tbl2" height="35" align="center"> <strong>รับเสื้อ</strong></td>
	  </tr>
	<?
	while($objResult = mysqli_fetch_array($objQuery2))
	{
		$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$objResult["accid"]."' ";
		$objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
		if ($i % 2 == 0){$tblyy = "tblyy2";}else{$tblyy = "tblyy";}
		$i++;
	?>
	   <tr>
       	<td width="" class="<?=$tblyy?>" height="25"><center><?=$l++;?></center></td>
       	<td width="" class="<?=$tblyy?>" height="25"><center><?=$objResult["username"];?></center></td>
		<td width="" class="<?=$tblyy?>" height="25"><center><?=$objResult["password"];?></center></td>
       
        <td width="" class="<?=$tblyy?>" height="25">
		<?php $n = 1; while($objResult1 = mysqli_fetch_array($objQuery1)){echo $n++." ) ".$objResult1["subname"]."<br><br>";}?>
        </td>
        <td width="" class="<?=$tblyy?>" height="25"><div align="center"><?=$objResult["shirt"];?></div></td>
        <td width="" class="<?=$tblyy?>" height="25"><div align="center">
        <a href="shirt_search.php?studentid=<?=$objResult["studentid"];?>&type=Edit&accid=<?=$objResult["accid"]?>&studenname=<?=$stdname;?>"><img src="../images/Create.png"width="15" height="15"></div></td>
       </tr>
	<? }?>
	</table>
    <? } ?>
    
    <!-- ****************************** -->
	<? if($_GET["type"] ==  "Edit" && $_GET["studentid"] !=  "" && $_GET["accid"] != '' && $_GET["studenname"] != ''){
		
    		$strSQL = "SELECT * FROM student WHERE studentid = '".$_GET["studentid"]."'";
            $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
			$objResult = mysqli_fetch_array($objQuery);
			$std = $objResult["studentid"];
			$stdname = $objResult["name"];
			
			$strSQL2 = "SELECT * FROM account WHERE accid = '".$_GET["accid"]."'";
			$objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL2."]");
			$l = 1;?>
            
        <form action="shirt_edit.php?accid=<?=$_GET["accid"];?>" method="post" name="frm1" >
        <br>
          <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
         	<tr>
            
                <td width="5%" class="tbl2" height="35" align="center"><strong>Acc.</strong></td>
                <td width="5%" class="tbl2" height="35" align="center"><strong>Username</strong></td>
                <td width="5%" class="tbl2" height="35" align="center"><strong>ชื่อ-นามสุกล</strong></td>
                <td width="5%" class="tbl2" height="35" align="center"><strong>คอร์ส</strong></td>
                <td width="5%" class="tbl2" height="35" align="center"><strong>รับเสื้อแล้ว/ตัว</strong></td>
                <td width="5%" class="tbl2" height="35" align="center"><strong>บันทึก</strong></td>
              </tr>
              <?
        while($objResult = mysqli_fetch_array($objQuery2))
        {
            $strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$objResult["accid"]."' ";
            $objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
           $i++; if ($i % 2 == 0){$tblyy = "tblyy2";}else{$tblyy = "tblyy";}
			
        ?>
              <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
              <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
              <tr>
                <td width="" class="<?=$tblyy?>" height="25"><center><?=$l++;?></center></td>
                <td width="" class="<?=$tblyy?>" height="25"><center><?=$objResult["username"];?></center></td>
                <td width="" class="<?=$tblyy?>" height="25"><center><?=$stdname;?></center></td>
                <td width="" class="<?=$tblyy?>" height="25">
				<?php $n = 1; while($objResult1 = mysqli_fetch_array($objQuery1)){echo $n++." ) ".$objResult1["subname"]."<br><br>";}?></td>
                <td width="" class="<?=$tblyy?>" height="25">
                <div align="center"><?=$objResult["shirt"];?> + <input name="num" type="text" value="1"  style="width:20px"></div></td>
                <td width="" class="<?=$tblyy?>" height="25">
                <div align="center"><input type="submit" name="submit" id="submit" class="" value="ตกลง" ></div></td>
              </tr>
              <? } ?>
            </table>
        </form>
 <? } ?>
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
</script><script type="text/javascript"> Cufon.now(); </script>
</body>
</html>