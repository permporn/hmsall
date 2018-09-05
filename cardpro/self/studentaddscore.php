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
    <h1>จัดการ วิชาเรียน SELF </h1>
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
  background:url(images/managesub.png) no-repeat left top;
}
.submit{
  width:90px;
  height:30px;
  background-color:#069;
  border-bottom-color:#CCC;
  color:#FFF;
  font-size: 10pt;
  font-family: arial;
  margin-left:80px;
}
</style>
<?
    
//*** Update Condition ***//
if($_POST["hdnCmd"] == "Update")
{
  $h_arti_id = $_POST["h_arti_id"];
  $creditid = $_POST["creditid"];
  $sumpoint = $_POST["finaltest"]+$_POST["collectionpoints"];
  $strSQL = "UPDATE credit SET ";
  $strSQL .="finaltest = '".$_POST["finaltest"]."' ";
  $strSQL .=",collectionpoints = '".$_POST["collectionpoints"]."' ";
  $strSQL .=",sumpoint = $sumpoint ";
  $strSQL .=",statuspoint = 1 ";
  $strSQL .="WHERE creditid = $creditid ";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
  if(!$objQuery){echo "Error Update [".mysqli_error()."]";}
  
}

?>
<form action="<?=$_SERVER["PHP_SELF"];?>" method="post">
<table width="100%">
  <tr>
      <td align="center" height="45"><strong>ค้นหาชื่อ-นามสกุล : </strong>
      <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
      <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
        <input class="button" type="submit" name="Submit" value="ค้นหา" />
        </td>
     </tr>
</table>
</form>
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>?&h_arti_id=<?=$_POST["h_arti_id"]?>&CusID=<?=$_GET["CusID"]?>">
<?  
  
  if( $_GET["Action"] == "Edit" && $_GET["CusID"] != ''){
  $strSQL = "SELECT * 
        FROM (account INNER JOIN student ON account.studentid = student.studentid)
        INNER JOIN credit ON account.accid = credit.accid
        WHERE credit.creditid  ='".$_GET["CusID"]."'";
  $strSQL .=" ORDER BY  `account`.`studentid` ASC ";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
  /*echo "11";*/
  }
  if($_POST["h_arti_id"] != ''){
  $strSQL = "SELECT * 
        FROM (account INNER JOIN student ON account.studentid = student.studentid)
        INNER JOIN credit ON account.accid = credit.accid
        WHERE account.studentid  ='".$_POST["h_arti_id"]."'";
  $strSQL .=" ORDER BY  `account`.`studentid` ASC ";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
  /*echo "22";*/
  }else{
  $strSQL = "SELECT * 
        FROM (account INNER JOIN student ON account.studentid = student.studentid)
        INNER JOIN credit ON account.accid = credit.accid
        WHERE credit.creditid  ='".$_GET["CusID"]."'";
  $strSQL .=" ORDER BY  `account`.`studentid` ASC ";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
  /*echo "33";*/
  }
  $h_arti_id = $_POST["h_arti_id"];
  
  ?>
    <input type="hidden" name="hdnCmd" value="">
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
    <? if($objResultSTT["status"] == "adminexam" or $objResultSTT["status"] == "admin" or $objResultSTT["status"] == "admin_hms"){ $a=9;}else{$a=7;}?> 
    <? 
  if($_GET["idaddterm"] != ''){
  $objResult = mysqli_fetch_array($objQuery);
  $strSQL3 = "SELECT * 
        FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
        INNER JOIN year ON addtrem.idyear = year.idyear
        WHERE addtrem.idaddterm = '".$_GET["idaddterm"]."'";
  $objQuery3 = mysqli_query($con_ajtongmath_self,$strSQL3) or die ("Error Query [".$strSQL3."]");
  $objResult3 = mysqli_fetch_array($objQuery3)
  ?>
    <tr><td style="white-space:nowrap;" class="tbl2" colspan="<?=$a?>"> <center>[<?=$objResult3["nameyear"]; ?>]<?=$objResult3["nameterm"];?></center></td> </tr>
    <? } 
  else { ?>
    <tr><td style="white-space:nowrap;" class="tbl2" colspan="<?=$a?>"> <center>รายชื่อ</center></td> </tr>
    <? } ?>
    <tr>
          <td width="5%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>ลำดับ</strong></div></td>
          <td width="19%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong> ชื่อ- นามสกุล</strong></div></td>
          <td width="9%"   class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>รหัสวิชา</strong></div></td>
          <td width="28%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>ชื่อวิชา</strong></div></td>
          <td width="9%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>คะแนนเก็บ</strong></div></td>
          <td width="8%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>คะแนนสอบ</strong></div></td>
          <td width="7%"  class="tblyy3" style="white-space: nowrap;"><div align="center"><strong>รวม</strong></div></td>
          <? if($objResultSTT["status"] == "adminexam" or $objResultSTT["status"] == "admin" or $objResultSTT["status"] == "admin_hms"){ ?>
          <th width="7%"   class="tblyy3" style="white-space: nowrap;"> แก้ไข </th>
          <th width="8%"  class="tblyy3" style="white-space: nowrap;"> ยกเลิก </th>
          <? } ?>
     </tr>
    <? 
  $i=0;
  while($objResult = mysqli_fetch_array($objQuery))
  { 
    $i++;
    $strSQL2 = "SELECT * FROM subject WHERE subid = '".$objResult["subid"]."'";
    $objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL."]");
    $objResult2 = mysqli_fetch_array($objQuery2);
    $objResult2['code'];
   ?>

  <?  if($objResult['creditid'] == $_GET["CusID"] and $_GET["Action"] == "Edit")
    {
    
    ?> 
  <tr>
    <td width="" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?>
        <input type="hidden" name="ssss" size="5"  id="ssss" value="<?=$objResult["studentid"]?>"></div></td>
      <td width="" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult["name"];?></div></td>
        <td width="" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult2['code'];?></div></td>
        <td width=""  class="tblyy"><div align="center"><?=$objResult2['subname'];?></div></td>
        <td width="" style="white-space:nowrap;" class="tblyy"><div align="center">
        <input name="collectionpoints" type="text" id="collectionpoints" size="2" value="<?=$objResult['collectionpoints'];?>"></div></td>
        <td width="" style="white-space:nowrap;" class="tblyy"><div align="center">
        <input name="finaltest" type="text" id="finaltest" size="2" value="<?=$objResult['finaltest'];?>">
        <input type="hidden" name="creditid"  id="creditid" size="5" value="<?=$objResult["creditid"];?>">
        </div></td>
        <td width="" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['sumpoint'];?>
        <input type="hidden" name="subid" size="5" value="<?=$objResult["subid"];?>"></div></td>
        <? if($objResultSTT["status"] == "adminexam" or $objResultSTT["status"] == "admin" or $objResultSTT["status"] == "admin_hms"){ ?>
        <td width="" style="white-space:nowrap;" class="tblyy"><div align="center">
        <input name="btnAdd"  type="button" id="btnUpdate" value="update" onClick="frmMain.hdnCmd.value='Update';frmMain.submit();"></div></td>
         <td width="" style="white-space:nowrap;" class="tblyy"><div align="center">
        <input name="btnAdd" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>?subid=<?=$objResult["subid"];?>';"></div></td>
        <? } ?></tr>
  <? }else{?>   
    <tr>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
      <td style="white-space:nowrap;"  class="tblyy"><div align="center"><?=$objResult["name"];?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult2['code'];?></div></td>
      <td width=""  class="tblyy"><div align="center"><?=$objResult2['subname'];?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['collectionpoints'];?></div>
      <input type="hidden" name="h_arti_id" size="5" value="<?=$_POST["h_arti_id"]?>"></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['finaltest'];?></div></td>
      <td style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['sumpoint'];?></div></td>
      <? if($objResultSTT["status"] == "adminexam" or $objResultSTT["status"] == "admin" or $objResultSTT["status"] == "admin_hms"){ ?>
      <td width="" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&CusID=<?=$objResult['creditid'];?>&subid=<?=$objResult["subid"];?>&idaddterm=<?=$_GET["idaddterm"];?>&h_arti_id=<?=$_POST["h_arti_id"]?>">Edit</a></div></td>
      <td width="" style="white-space:nowrap;" class="tblyy"></td>
      <? }?> 
      </tr>
  <? } }?>
    
    
  </table>
</form>
<p><div align="right">
  <input type="button" name="cmdweblogin" class="button" value="กลับ" onclick="window.location='studentaddscore.php?&h_arti_id=<?=$_POST["h_arti_id"]?>'" style="width:100px; height:25px;margin-top:5px"/>
    </div></p>  
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
    return "datanamescore.php?q=" + encodeURIComponent(this.value);
    }); 
} 
make_autocom("show_arti_topic","h_arti_id");
</script>
</body>
</html>