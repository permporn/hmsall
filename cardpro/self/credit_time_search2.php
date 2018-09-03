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
  <? include('menu.php');?>
  <div id="content">
    <h1>ขยายเวลา/เพิ่มเครดิต(คิดค่าบริการ)</h1>
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
        
    </div>
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
    <table cellpadding="0" cellspacing="1" width="100%">
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
        <th width="75" class="tbl2" style="white-space: nowrap;">Acc.</th>
        <th width="122" class="tbl2" style="white-space: nowrap;">Username</th>
    <!--<th width="293" class="tbl2" style="white-space: nowrap;"> ชื่อ-นามสกุล</th>-->
        <th width="264" class="tbl2" style="white-space: nowrap;"> คอร์ส</th>
    <th width="177" class="tbl2" style="white-space: nowrap;"> crคงเหลือ/exe</th>
        <th width="75" class="tbl2" style="white-space: nowrap;"> เพิ่มเครดิต/เวลา</th>
    </tr>
  <?
  while($objResult = mysql_fetch_array($objQuery2))
  {
    $strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$objResult["accid"]."' AND subject.status = '1' ";
    $objQuery1 = mysql_query($strSQL1);
    if ($i % 2 == 0){$tblyy = "tblyy2";}else{$tblyy = "tblyy";}
    $i++;
  ?>
     <tr>
        <td width="75" class="<?=$tblyy?>"><center><?=$l++;?></center></td>
        <td width="122" class="<?=$tblyy?>"><center><?=$objResult["username"];?></center></td>
    <!--<td width="293" class="tblyy"><center><?=$stdname;?></center></td>-->
        <td width="264" style="white-space:nowrap;" class="<?=$tblyy?>"><?php $n = 1; while($objResult1 = mysql_fetch_array($objQuery1)){echo $n++." ) ".$objResult1["subname"]."<br><br>";}?></td>
        <td width="102" class="<?=$tblyy?>" style="white-space: nowrap;"><div align="left">เคดิต: <?=$objResult["totalcredit"]?> เคดิต<br> วันหมด: <?=DateThai($objResult["edate"])?></div></td>
        <td width="75" class="<?=$tblyy?>" style="white-space: nowrap;"><div align="center">
        <? 
        if($objResultSTT["status"] =="manager_franchise" || $objResultSTT["status"] =="user_franchise"){
        if($objResult['status'] == $id_branch_self){
        ?>
        <a href="credit_time_search2.php?type=Edit&studenname=<?=$stdname?>&accid=<?=$objResult["accid"]?>&studentid=<?=$objResult["studentid"];?>"><img src="../images/Create.png"width="15" height="15"></a><br><br>
        </div>
        <? }}else{?>
          <a href="credit_time_search2.php?type=Edit&studenname=<?=$stdname?>&accid=<?=$objResult["accid"]?>&studentid=<?=$objResult["studentid"];?>"><img src="../images/Create.png"width="15" height="15"></a><br><br>
        <? }?>
        </td>
       </tr>
  <? }?>
  </table>
    <? } ?>
    
    <!-- ****************************** -->
    
  <? if($_GET["type"] == "Edit" && $_GET["studentid"] != "" && $_GET["accid"] != "" && $_GET["studenname"] != ""){
    
        $strSQL = "SELECT * FROM student WHERE studentid = '".$_GET["studentid"]."'";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
      $objResult = mysql_fetch_array($objQuery);
      $std = $objResult["studentid"];
      $stdname = $objResult["name"];
      
      $strSQL2 = "SELECT * FROM account WHERE accid = '".$_GET["accid"]."'";
      $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
      $l = 1;?>
            
        <form action="credit_time_edit2.php" method="post" name="frm1" >
        <br>
          <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
        <tr>  
        <td colspan="4" class="tbl2" style="white-space: nowrap;" align="center"  height="">ข้อมูลนักเรียน</td>
        </tr>
              <tr>
                <th width="197" height="27" class="tbl2" style="white-space: nowrap;">Acc.</th>
                <th width="355" class="tbl2" style="white-space: nowrap;">Username</th>
                <th width="264" class="tbl2" style="white-space: nowrap;"> ชื่อ-นามสกุล</th>
                <th width="117" class="tbl2" style="white-space: nowrap;"> คอร์ส</th>
              </tr>
              <?
        while($objResult = mysql_fetch_array($objQuery2))
        {
        ?>
              <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
              <input type="hidden" name="accid" value="<?=$_GET["accid"]?>"/>
              <input type="hidden" name="type_self" value="6"/>
              <input type="hidden" name="staffid" value="<?=$id_account_self?>"/>
              <tr>
                <td width="197" class="tblyy"><center><?=$l++;?></center></td>
                <td width="355" class="tblyy"><center>
                  <?=$objResult["username"];?>
                </center></td>
                <td width="264" class="tblyy"><center>
                  <?=$stdname;?>
                </center></td>
                <td width="117" style="white-space:nowrap;" class="tblyy">
        <?
          $strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$objResult["accid"]."' AND subject.status = '1'";
                $objQuery1 = mysql_query($strSQL1);
          while($objResult1 = mysql_fetch_array($objQuery1)){echo $objResult1["subname"]."<br><br>";}
        ?></td>
                <tr>
                <th width="197" class="tbl2" style="white-space: nowrap;"> การซื้อ</th>
                <th width="355" class="tbl2" style="white-space: nowrap;"> ประเภทการโอน</th>
                <th width="264" class="tbl2" style="white-space: nowrap;"> หมายเลขใบชำระ</th>
                <th width="117" class="tbl2" style="white-space: nowrap;"> บันทึก</th>
                </tr>
                <tr>
                <td width="197" class="tblyy2"><div align="center">
                <select id="subid" name="subid">
                    <?
                    $strSQL_s = "SELECT subject.subid, subject_real.name_subject_real
                                FROM subject 
                                JOIN subject_real ON subject.id_subject_real = subject_real.id_subject_real
                                WHERE type_self = 6";
                          $objQuery_s = mysql_query($strSQL_s);
                    while($objResult_s = mysql_fetch_array($objQuery_s)){
                    ?>
                    <option  selected="selected" value="<?=$objResult_s['subid']?>"><?=$objResult_s['name_subject_real']?></option>
                    <? }?>
                    <!-- <option value="330" selected="selected">เพิ่ม 4ชม/1เดือน 400 บาท</option>
                    <option value="331">เพิ่ม 8ชม/2เดือน 700 บาท</option>
                    <option value="332">เพิ่ม 12ชม/3เดือน 900 บาท</option -->>
                </select>
                </div>
                </td>
                <td width="355" class="tblyy2">
                <input type="radio" name="type_pay" value="transfer" checked="checked">โอน<br>
                <input type="radio" name="type_pay" value="cradit">บัตรเครดิต<br>
                <input type="radio" name="type_pay" value="money">เงินสด
                </td>
                <td width="264" class="tblyy2"><div align="center"><input type="text" id="Invoicenumber" name="Invoicenumber" value=""><br>* ชำระเงินสดไม่ต้องกรอก</div></td>
                <td class="tblyy2"><center><input type="submit" name="submit" id="submit" class="" value="ตกลง"></center></td>
              </tr>
              <? } ?>
            
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