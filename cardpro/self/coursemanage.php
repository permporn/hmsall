<? 
session_start();
include("funtion.php");
include("ck_session_self.php");
error_reporting(~E_NOTICE);

if($_POST["idyear"] != "" && $_POST["idterm"] != ""){
  $idyear=$_POST["idyear"];
  $idterm=$_POST["idterm"];
  
  $strSQL = "SELECT * FROM  `addtrem` WHERE `idyear`= $idyear  AND  `idterm` = $idterm";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
  $objResult = mysqli_fetch_array($objQuery);
  $idaddterm = $objResult['idaddterm'];
  }
  $strSQLbranch = "SELECT * FROM branch WHERE branchid = '".$objResult99["branchid"]."'";
  $objQuerybranch = mysqli_query($con_ajtongmath_self,$strSQLbranch);
  $objResultbranch = mysqli_fetch_array($objQuerybranch);
  $branchname = $objResultbranch['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]//,
      //"order": [[ 2, "desc" ]]
    });
} );

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
    return "datacourse.php?q=" +encodeURIComponent(this.value);
    }); 
} 
make_autocom("show_arti_topic","h_arti_id");

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
</head>

<body>

<!-- START PAGE SOURCE -->
<div id="container">
  <?php include('menu.php');?>
  <div id="content">
    <h2>ตารางไฟล์เรียน SELF ทั้งหมด</h2>
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
  //*** Delete Condition ***//
  if($_GET["Action"] == "Del")
  {
    /*$strSQL = "DELETE FROM subject ";
    $strSQL .="WHERE subid = '".$_GET["CusID"]."' ";
    $objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
    if(!$objQuery)
    {
      echo "Error Delete [".mysqli_error()."]";
    }*/
    $status=1;
    $strSQL_update = "UPDATE subject SET"; 
    $strSQL_update .=" status_delete = '".$status."'";
    $strSQL_update .=" WHERE subid = '".$_GET["CusID"] ."'";
    $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update);
    //echo $strSQL_update;
    if(!$objQuery_update)
    {
      echo "Error Delete [".mysqli_error()."]";
    }
    
  }
?>
<!-- <form action="<?=$_SERVER["PHP_SELF"];?>" method="post">
<table width="100%">
  <tr>
      <td align="center" height="45">ค้นตามชื่อวิชา : 
      <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
      <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
        <input class="button" type="submit" name="Submit" value="ค้นหา" />
        </td>
     </tr>
</table>
</form>  -->

<!-- <form method="post" action="<?=$_SERVER["PHP_SELF"];?>">
<table width="100%">
  <tr>
      <td align="center" height="55">ค้นหาตามปีการศึกษา : 
        <select name="idyear" id="idyear" style="font-size:14px; color:#666;">
        <option value="0" selected>เลือกปีการศึกษา</option>
      <?
        $strSQL = "SELECT * FROM year";
        $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
        while($objResult = mysqli_fetch_array($objQuery)){?>         
        <option value="<?=$objResult['idyear'];?>"><?=$objResult['nameyear'];?></option>
        <? }?>
        </select>    
        <select name="idterm" id="idterm" style="font-size:14px; color:#666;">
        <option value="0" selected>เลือก SEC</option>
      <?
        $strSQL = "SELECT * FROM term";
        $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
        while($objResult = mysqli_fetch_array($objQuery)){?>         
        <option value="<?=$objResult['idterm'];?>"><?=$objResult['nameterm']/*."-".$objResult['idterm']*/;?></option>
         <? }?>
        </select>    
        <input class="button" type="submit" name="Submit" value="ค้นหา"/>
        </td>
    </tr>
</table>            
</form> -->

<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>">
<? 
  if($_POST["idyear"] == 0 or $_POST["idterm"] == 0){
  $strSQL = "SELECT * FROM subject WHERE status_delete != 1 ORDER BY  `subject`.`subid` DESC  ";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");}
  else
  {$strSQL = "SELECT * FROM subject WHERE idaddterm = $idaddterm AND status_delete != 1 ORDER BY  `subject`.`subid` ASC ";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");}
  
  if($idaddterm == 0 ){
  $strSQL = "SELECT * FROM subject WHERE status != 0  AND status_delete != 1 ORDER BY  `subject`.`subid` ASC ";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");}
  else
  {$strSQL = "SELECT * FROM subject WHERE idaddterm = $idaddterm AND status_delete != 1 ORDER BY  `subject`.`subid` ASC ";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");}
  
  if($_GET["h_arti_id"] != '' ){
  $strSQL = "SELECT * FROM subject WHERE subid = '".$_POST["h_arti_id"]."'" AND status_delete != 1;
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");}
  
  if($_POST["h_arti_id"] != '' ){
  $strSQL = "SELECT * FROM subject WHERE subid = '".$_POST["h_arti_id"]."' AND status_delete != 1 ORDER BY  `subject`.`subid` ASC ";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");}
  ?>
    
  <input type="hidden" name="hdnCmd" value="">
<? 
  if($idaddterm != 0){
  $strSQL2 = "SELECT * 
        FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
        INNER JOIN year ON addtrem.idyear = year.idyear
        WHERE addtrem.idaddterm = $idaddterm";
  $objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysqli_fetch_array($objQuery2)
  ?>
    <? } 
  else { ?>
    <? } ?>
    </table>
    <h3><?=$objResult2["nameyear"]; ?> <?=$objResult2["nameterm"];?>
    <? if($objResultSTT['status'] == 'admin' || $objResultSTT['status'] == 'ADMIN' or $objResultSTT['stid'] == 20 or $objResultSTT['stid'] == 26 || $objResultSTT["status"] == "admin_hms"){ ?>
      <div align="right">
        <a href="coursemanage_add.php?type=Add" style="font-size:14px; color:#0033FF">+เพิ่มไฟล์เรียน</a>  
        <a href="coursemanage_add.php?type=Addrealsub" style="font-size:14px; color:#0033FF">+เพิ่มชื่อวิชาจริง</a>
      </div>
      <? } ?>
    </h3>

    <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
      <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>#</strong></div></td>
      <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ชื่อไฟล์</strong></div></td>
      <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>วิชา</strong></div></td>
      <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>รหัสวิชา</strong></div></td>
      <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ผู้สอน</strong></div></td>
      <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ปีการศึกษา</strong></div></td>
      <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>เครดิต</strong></div></td>
      <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>แผ่น</strong></div></td>
      <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>อัพแล้ว</strong></div></td>
      <? if($objResultSTT["status"] == "admin" || $objResultSTT['status'] == 'ADMIN' or $objResultSTT['stid'] == 20 or $objResultSTT['stid'] == 26){ ?>
      <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>จัดการ</strong></div></td>
      <!--<th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ลบ</strong></div></td>-->
      <? } ?>
    </tr>
    </thead>
    <tbody>
    <? $i=0;
  while($objResult = mysqli_fetch_array($objQuery)){
  $i++;
    ?>
    
    <tr>
      <td style="white-space:nowrap;" class="tblyy"><div align="center">
      <? if ($objResult["status_branch_school"] == 1){?><font color="#FF4000">S</font> <? };?>
      <? if ($objResult["status_branch_hms"] == 1){?><font color="#0000FF">F</font> <? };?>
      </td>
      <td ><?=$objResult["subname"];?></td>
      <?
    $strSQL7 = "SELECT * FROM subject_real WHERE id_subject_real = '".$objResult['id_subject_real']."'";
        $objQuery7 = mysqli_query($con_ajtongmath_self,$strSQL7) or die ("Error Query [".$strSQL7."]"); 
    $objResult7 = mysqli_fetch_array($objQuery7);
       ?>
      <td ><?=$objResult7["name_subject_real"];?></td>
      <td style="white-space:nowrap;"><div align="center"><?=$objResult["code"];?></div></td>
      <?
    $strSQL4 = "SELECT * FROM teacher WHERE  teacherid = '".$objResult['teacherid']."'";
        $objQuery4 = mysqli_query($con_ajtongmath_self,$strSQL4) or die ("Error Query [".$strSQL."]"); 
    $objResult4 = mysqli_fetch_array($objQuery4);
    ?>
      <td style="white-space:nowrap;"><div align="center">
      <?  if($objResult4){echo $objResult4['teachername']; }
          else{ echo "ไม่มีข้อมูล";}
      ?>
      </div>
      </td>
      <?
        $strSQL_trem = "SELECT * 
        FROM (addtrem INNER JOIN term ON addtrem.idterm = term.idterm)
        INNER JOIN year ON addtrem.idyear = year.idyear
        WHERE addtrem.idaddterm = '".$objResult['idaddterm']."'";
                    $objQuery_trem = mysqli_query($con_ajtongmath_self,$strSQL_trem) or die ("Error Query [".$strSQL_trem."]");
          $objResult_trem = mysqli_fetch_array($objQuery_trem)
          ?>
      
      <td style="white-space:nowrap;"><div align="center">
      <?  if($objResult_trem){echo $objResult_trem['nameyear']."/".$objResult_trem["nameterm"]; }
          else{ echo "ไม่มีข้อมูล";}
      ?>
      </div></td>
      <td style="white-space:nowrap;"><div align="center">
        <?=$objResult["hour"];?>
      </div></td>
      <td style="white-space:nowrap;"><div align="center">
        <?=$objResult["disc"];?>
      </div></td>
      <td  style="white-space:nowrap;"><div align="center">
        <?=$objResult["brsnchvdo"];?>
      </div></td>
       <? if($objResultSTT["status"] == "admin" || $objResultSTT['status'] == 'ADMIN' or $objResultSTT['stid'] == 20 or $objResultSTT['stid'] == 26){ ?>
      <td align="center">
      <a href="coursemanage_add.php?type=Edit&CusID=<?=$objResult["subid"];?>&idaddterm=<?=$idaddterm?>&h_arti_id=<?=$_POST["h_arti_id"]?>&brsnchvdo=<?=$objResult["brsnchvdo"];?>">Edit</a>
      <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&CusID=<?=$objResult["subid"];?>';}">ซ่อน</a></td>
    <? } ?>
    </tr>
 
    <? } ?> 
    </tbody>
    </table>
    <table class="tbl22" cellpadding="0" cellspacing="1" width="100%" align="rigth">
        <tr><td class="tbl3">*หมายเหตุ :หมายเลขของแต่ละสาขา เพื่อบ่งบอกไฟล์เรียนที่อัพแล้ว</td></tr>
        <tr><td class="tbl4">1.พญาไทชั้น10 , 2.วงเวียนใหญ่  , 3.วิสุทธิธานี , 4.พญาไทชั้น2 , 5.พญาไทชั้น9 , 6.สระบุรี , 7.ชลบุรี , 8.ราชบุรี 
        <strong><font color="#FF4000"> , S (โรงเรียนคณิตศาสตร์ อ.โต้ง)  , </font> <font color="#0000FF">F (HMS Franchise )</font></strong></td></tr>
    </table>
<br/>  
</form>
</p>
</div>
</body>
<? mysqli_close($con_ajtongmath_self);?>
</html>