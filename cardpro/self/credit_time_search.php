<? 
ob_start();
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

<div id="container">
<? include('menu.php');?>
<div id="content">
<h1>ทะเบียนนักเรียน</h1>
<p>
<div align="right">
  <form action="<?=$_SERVER['SCRIPT_NAME'];?>" method="get" id="search-form">
    <label >ค้นหารายชื่อ:</label>
    <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
    <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
    <a href="#" onClick="document.getElementById('search-form').submit()">ค้นหา</a>
  </form>
</div>
    <?
    if($_GET["h_arti_id"] != ""){

      $strSQL = "SELECT * FROM student WHERE name = '".$_GET["h_arti_id"]."'";
      $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
      $objResult = mysqli_fetch_array($objQuery);
      $std = $objResult["studentid"];
      $stdname = $objResult["name"];
      $tel = $objResult["tel"];
      $email = $objResult["email"];
      $school = $objResult["school"];
      
      
      $statusout = "out";
      $strSQL2 = "SELECT * FROM account WHERE studentid = ".$std." AND status != '".$statusout."'    ";
      $objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL2."]");
      $l = 1;

    ?>
    <br>
    <div align="right"><font color="#0099FF">*ขยายเวลาฟรี 14 วัน /ขยายเคดิตฟรี 4 ชม. หรือ 8 เคดิต</font></div>
    <p></p>
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
    <tr>
      <th width="75" class="tbl2" style="white-space: nowrap;">Acc.</th>
      <th width="122" class="tbl2" style="white-space: nowrap;">Username</th>
      <th width="293" class="tbl2" style="white-space: nowrap;"> ชื่อ-นามสกุล</th>
      <th width="264" class="tbl2" style="white-space: nowrap;"> คอร์ส</th>
      <th width="102" class="tbl2" style="white-space: nowrap;"> ขยายเวลา</th>
      <th width="75" class="tbl2" style="white-space: nowrap;"> เพิ่มเครดิต</th>
    </tr>
  <?
  while($objResult = mysqli_fetch_array($objQuery2))
  {
    $strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$objResult["accid"]."' AND subject.status = '1' ";
    $objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
    
  ?>
     <tr>
        <td width="75" class="tblyy"><center><?=$l++;?></center></td>
        <td width="122" class="tblyy"><center><?=$objResult["username"];?></center></td>
    <td width="293" class="tblyy"><center><?=$stdname;?></center></td>
       
        <td width="264" style="white-space:nowrap;" class="tblyy">
    <?php $n = 1; while($objResult1 = mysqli_fetch_array($objQuery1)){echo $n++." ) ".$objResult1["subname"]."<br><br>";}?>
        </td>
        

        <td width="102" class="tblyy"><div align="center">

        <?
        if($objResultSTT["status"] =="manager_franchise" || $objResultSTT["status"] =="user_franchise"){
        if($objResult['status'] == $id_branch_self){

        $objQuery_ckTime = mysqli_query($con_ajtongmath_self,$strSQL1);
        while($objResult_ckTime = mysqli_fetch_array($objQuery_ckTime)){
          if($objResult_ckTime["events_add_time"]=="0"){
          ?>
            <a href="credit_time_edit.php?accid=<?=$objResult["accid"];?>&action=addtime&studenname=<?=$stdname?>&creditid=<?=$objResult_ckTime["creditid"]?>" onclick="return confirm('กรุณายืนยันการขยายเวลาอีกครั้ง !!!')" ><img src="../images/clock.png" width="15" height="15"></a>

          <? }else{ echo "ขยายแล้ว";}?><br><br>
            <? }?>
        </div>
        <? }}else{
          $objQuery_ckTime = mysqli_query($con_ajtongmath_self,$strSQL1);
          while($objResult_ckTime = mysqli_fetch_array($objQuery_ckTime)){
          if($objResult_ckTime["events_add_time"]=="0"){
          ?>
            <a href="credit_time_edit.php?accid=<?=$objResult["accid"];?>&action=addtime&studenname=<?=$stdname?>&creditid=<?=$objResult_ckTime["creditid"]?>" onclick="return confirm('กรุณายืนยันการขยายเวลาอีกครั้ง !!!')" ><img src="../images/clock.png" width="15" height="15"></a>

          <? }else{ echo "ขยายแล้ว";}?><br><br>
            <? }?>
        </div>
        <? } ?>
        </td>
        <td width="75" class="tblyy"><div align="center">
        <? 
        if($objResultSTT["status"] =="manager_franchise" || $objResultSTT["status"] =="user_franchise"){
        if($objResult['status'] == $id_branch_self){

        $objQuery_ckCredit = mysqli_query($con_ajtongmath_self,$strSQL1);
        while($objResult_ckCredit = mysqli_fetch_array($objQuery_ckCredit)){
          if($objResult_ckCredit["events_add_credit"]=="0"){
            ?><a href="credit_time_edit.php?accid=<?=$objResult["accid"];?>&action=addcredit&studenname=<?=$stdname?>&creditid=<?=$objResult_ckCredit["creditid"]?>" onclick="return confirm('กรุณายืนยันการเพิ่มเครดิตอีกครั้ง !!!')" ><img src="../images/credit.png" width="15" height="15"></a>
          <? }else{ echo "เพิ่มแล้ว";}?><br><br>
        <? }?>
        </div>
        <? }}else{ 
        $objQuery_ckCredit = mysqli_query($con_ajtongmath_self,$strSQL1);
        while($objResult_ckCredit = mysqli_fetch_array($objQuery_ckCredit)){
          if($objResult_ckCredit["events_add_credit"]=="0"){
            ?><a href="credit_time_edit.php?accid=<?=$objResult["accid"];?>&action=addcredit&studenname=<?=$stdname?>&creditid=<?=$objResult_ckCredit["creditid"]?>" onclick="return confirm('กรุณายืนยันการเพิ่มเครดิตอีกครั้ง !!!')" ><img src="../images/credit.png" width="15" height="15"></a>
          <? }else{ echo "เพิ่มแล้ว";}?><br><br>
        <? }?>
        </div>
        <? }?>
        </td>
       </tr>
  <? }?>
  </table>
  <? } ?>

</p></div></div>
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
</script>
</body>
</html>