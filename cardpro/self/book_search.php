<? 
session_start();
include("funtion.php");
include("ck_session_self.php");
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
    <h1>รับหนังสือ</h1>
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
<? include("config.incself.php");?>
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
            $objQuery = mysql_query($strSQL);
            if(!$objQuery)
            {
                echo "Error Delete [".mysql_error()."]";
            }
            //header("location:$_SERVER[PHP_SELF]");
            //exit();
        }
        if($_GET["h_arti_id"] != ""){

            $strSQL = "SELECT * FROM student WHERE name = '".$_GET["h_arti_id"]."'";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$objResult = mysql_fetch_array($objQuery);
			$std = $objResult["studentid"];
			$stdname = $objResult["name"];
			
			
			$statusout = "out";
			$strSQL2 = "SELECT * FROM account WHERE studentid = ".$std." AND status != '".$statusout."' ";
			$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
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
      	<td width="5%" class="tbl2" height="35" align="center"><strong>Acc.</strong></th>
        <td width="10%" class="tbl2" height="35" align="center"><strong>Username</th>
		<td width="10%" class="tbl2" height="35" align="center"><strong>password</th>
        <td width="25%" class="tbl2" height="35" align="center"><strong>คอร์ส</th>
		<td width="25%" class="tbl2" height="35" align="center"><strong>สถานะหนังสือ/เล่ม</th>
        <td width="5%" class="tbl2" height="35" align="center"><strong>รับหนังสือ</th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery2))
	{
		$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$objResult["accid"]."' ";
		$objQuery1 = mysql_query($strSQL1);
		if ($i % 2 == 0){$tblyy = "tblyy2";}else{$tblyy = "tblyy";}
		$i++;

	?>
	   <tr>
       	<td width="" class="<?=$tblyy?>" height="25"><center><?=$l++;?></center></td>
       	<td width="" class="<?=$tblyy?>" height="25"><center><?=$objResult["username"];?></center></td>
		<td width="" class="<?=$tblyy?>" height="25"><center><?=$objResult["password"];?></center></td>
       
        <td width="" class="<?=$tblyy?>" height="25">
		<?php $n = 1; while($objResult1 = mysql_fetch_array($objQuery1)){echo $n++." ) ".$objResult1["subname"]."<br><br>";}?>
        </td>
        <td width="" class="<?=$tblyy?>" height="25"><div align="center">
		<?
		$objQuery22 = mysql_query($strSQL1);
		while($objResult22 = mysql_fetch_array($objQuery22)){
			if($objResult22["book_status"]=="" && $objResult22["book_num"]=="" && $objResult22["book_detail"]==""){
				echo "ไม่พบข้อมูล";
			}else{
				echo $objResult22["book_status"]."/".$objResult22["book_num"];
				if($objResult22["book_status"]=="ขาด"){
					echo "/".$objResult22["book_detail"];
				}
			}
			echo "<br><br>";
		}
		?></div></td>
        <td width="" class="<?=$tblyy?>" height="25"><div align="center">
        <?
		$objQuery33 = mysql_query($strSQL1);
		while($objResult33 = mysql_fetch_array($objQuery33)){?>
        	<a href="book_search.php?studentid=<?=$objResult["studentid"];?>&type=Edit&accid=<?=$objResult["accid"]?>&studenname=<?=$stdname;?>&creditid=<?=$objResult33["creditid"]?>"><img src="../images/Create.png"width="15" height="15"></a><br><br>
        <? }?>
        </div></td>
       </tr>
	<? }?>
	</table>
    <? } ?>
    
    <!-- ****************************** -->
	<? if($_GET["type"] ==  "Edit" && $_GET["studentid"] !=  "" && $_GET["accid"] != '' && $_GET["studenname"] != ''){
		
    		$strSQL = "SELECT * FROM student WHERE studentid = '".$_GET["studentid"]."'";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$objResult = mysql_fetch_array($objQuery);
			$std = $objResult["studentid"];
			$stdname = $objResult["name"];
			
			$strSQL2 = "SELECT * FROM account WHERE accid = '".$_GET["accid"]."'";
			$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
			$l = 1;?>
            
        <form action="book_edit.php?accid=<?=$_GET["accid"];?>&creditid=<?=$_GET["creditid"]?>" method="post" name="frm1" >
        <br>
          <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
	  		<tr>	
	 			<td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height=""><strong>+ รับหนังสือ</strong></td>
            </tr>
         <?
         while($objResult = mysql_fetch_array($objQuery2)){
         ?>
              <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
              <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
              
              <tr>
                <td width="20%" class="tblyy2" height="35" align="center"><strong>Username</strong></td>
                <td width="60%" class="tblyy" height="25"><?=$objResult["username"];?></td>
              </tr>
              <tr>
              	<td width="20%" class="tblyy2" height="35" align="center"><strong>ชื่อ-นามสกุล</strong></td>
                <td width="" class="tblyy" height="25"><?=$stdname;?></td>
              </tr>
              <tr> 
              	<td width="20%" class="tblyy2" height="35" align="center"><strong>คอร์ส</strong></td> 
             	<td width="" class="tblyy" height="25">
				<?
					$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$objResult["accid"]."' AND credit.creditid = '".$_GET["creditid"]."'";
            		$objQuery1 = mysql_query($strSQL1);
					$objResult1 = mysql_fetch_array($objQuery1);{echo $objResult1["subname"];}
				?></td>
              </tr>
              <tr>
              	<td width="20%" class="tblyy2" height="35" align="center"><strong> สถานะหนังสือ/เล่ม</strong></td>
                <td width="" class="tblyy" height="25">
                <input type="radio" name="book_status" value="ครบ" <? if($objResult1["book_status"]=="ครบ"){?>checked="checked"<? }?>>ครบ
				<input type="radio" name="book_status" value="ขาด" <? if($objResult1["book_status"]=="ขาด" || $objResult1["book_status"]==""){?>checked="checked"<? }?>>ขาด
             
                </td>
              </tr>
              <tr>
              	<td width="20%" class="tblyy2" height="35" align="center"><strong>จำนวน</strong></td>
                <td width="" class="tblyy" height="25"><input name="book_num" type="text" value="<?=$objResult1["book_num"]?>" style="width:40px"> เล่ม <font color="#FF0000">* ขาดหรือครบ ต้องกรอกจำนวนเล่ม</font></td>
              </tr>
              <tr>
              	<td width="20%" class="tblyy2" height="35" align="center"><strong>รายละเอียด(ในกรณีที่ขาด)</strong></td>
                <td width="" class="tblyy" height="25"><textarea id="book_detail" name="book_detail" rows="4" cols="30"><?=$objResult1["book_detail"]?></textarea></td>
              </tr>
              <tr>
              	<td width="20%" class="tblyy2" height="35" align="center"></td>
                <td width="" class="tblyy" height="25"><input type="submit" name="submit" id="submit" class="" value="บันทึก" ></td>
              </tr>
              <? } ?>
            </table></th>
          </tr>
          </table>
        </form>
 <? } ?>
</p>
</div>
<? mysql_close();?>
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
 
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");
</script><script type="text/javascript"> Cufon.now(); </script>
</body>
</html>