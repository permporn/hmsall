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
    <h1>+ admin แก้ไขวิชา</h1>
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
if(confirm('Goto 1')==true)
{
document.frm1.submit();
}
else 
{}
}
</script>
<style type="text/css">
#sss {
  width:691px;
  height:60px;
  background:url(images/editstudent.png) no-repeat left top;
}
</style>
         <?
     include("config.incself.php");
      $strSQL = "SELECT * FROM account WHERE accid = ".$_GET["accid"]." ";
      $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
      $Num_Rows = mysql_num_rows($objQuery); 
      $objResult = mysql_fetch_array($objQuery);?>
            
         <form action="saveacc.php?accid=<?=$_GET["accid"];?>" method="post" name="frm1">
          
          <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
             <tr>
               <td width="20%" class="tblyy2" height="35">Username :</td>
               <td width="80%" class="tblyy" height="35" colspan="2">
               <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
               <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
               <input type="text" name="username" id="username" value="<?=$objResult["username"]?>"></td>
             </tr>
             <tr>
               <td width="" class="tblyy2" height="35">Password :</td>
               <td width="" class="tblyy" height="35" colspan="2">
               <input type="text" name="password" id="password" value="<?=$objResult["password"]?>"></td>
      </tr>
             <tr>
               <td width="" class="tblyy2" height="35">วันเริ่ม :</td>
               <td width="" class="tblyy" height="35" colspan="2">
               <input type="text" name="sdate" id="sdate" value="<?=$objResult["sdate"]?>" /></td>
             </tr>
             <tr>
               <td width="" class="tblyy2" height="35">วันหมดอายุ :</td>
               <td width="" class="tblyy" height="35" colspan="2">
               <input type="text" name="edate" id="edate" value="<?=$objResult["edate"]?>" /></td>
             </tr>
             <tr>
               <td width="" class="tblyy2" height="35">เครดิตคงเหลือ :</td>
               <td width="" class="tblyy" height="35" colspan="2">
               <input type="text" name="totalcredit" id="totalcredit" value="<?=$objResult["totalcredit"]?>" /></td>
             </tr>
             <tr>
               <td width="" class="tblyy2" height="35">ที่เรียน :</td>
               <td width="" class="tblyy" height="35" colspan="2">
                 <select name="status" id="status" >
                 <!-- <option value="<?=$objResult["status"]?>" selected>
         <? if($objResult["status"]==1){?>เรียนได้ทุกสาขา<? }
         else if($objResult["status"]==2){ ?>เฉพาะวงเวียนใหญ่<? } 
         else if($objResult["status"]==3) { ?>เฉพาะวิสุทธานี<? } 
         else if($objResult["status"]==6){ ?> เฉพาะสระบุรี <?  } 
                 else if($objResult["status"]==7){ ?>เฉพาะชลบุรี<? } 
         else if($objResult["status"]==8) { ?>เฉพาะราชบุรี<? }?>
                 </option>
                 <option value="1">เรียนได้ทุกสาขา</option>
                 <option value="2">เฉพาะวงเวียนใหญ่</option>
                 <option value="3">เฉพาะวิสุทธิ</option> 
                 <option value="6">เฉพาะสระบุรี</option>
                 <option value="7">เฉพาะชลบุรี</option>
                 <option value="8">เฉพาะราชบุรี</option> -->
                 <?
                    $strSQL_branch = "SELECT * FROM branch";
                    $objQuery_branch = mysql_query($strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
                    while ( $result_branch = mysql_fetch_array($objQuery_branch)){
                        //if($result_branch['branchid'] == $id_branch_self){?>
                            <option value="<?=$result_branch['branchid']?>" <? if($result_branch['branchid']==$id_branch_self){?> selected <? }?>><?=$result_branch['name'];?></option>
                    <? }//}?>
               </select></td>
             </tr>
              <?
        $strSQL1 = "SELECT * FROM credit WHERE accid = '".$objResult["accid"]."'";
        $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
        $objResult1 = mysql_fetch_array($objQuery1);
         ?>
         
                <?
        $strSQL2 = "SELECT * FROM account WHERE accid = '".$objResult["accid"]."'";
        $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
        $objResult2 = mysql_fetch_array($objQuery2);
        $studentid = $objResult2['studentid'];
        //echo $studentid;
        ?>
                <tr>
                 <td width="" class="tblyy2" height="35">หมายเลขใบคำร้อง:</td>
                 <td width="" class="tblyy" height="35" colspan="2"><input type="text" name="noptt" id="noptt"  size="10" value="<?=$objResult2["no_petition"]?>"> </td>
              </tr>
                <input type="hidden" name="studentid" value="<?=$studentid?>"/>
             <!--<tr>
                 <td width="117" height="53">จ่ายเงินโดย:</td>
                 <td colspan="3">
                 <input name="type_pay" type="radio" value="transfer" class="input4" <? if($objResult1["type_pay"]=='transfer'){?>checked="checked" <? } ?> />โอน&nbsp;     
                 <input name="type_pay" type="radio" value="cradit" class="input4" <? if($objResult1["type_pay"]=='cradit'){?> checked="checked" <? } ?>/> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" <? if($objResult1["type_pay"]=='money'){?> checked="checked" <? } ?>/> เงินสด 
                 <input name="type_pay" type="radio" value="free" class="input4" <? if($objResult1["type_pay"]=='free'){?> checked="checked" <? } ?>/> ฟรี
                 </td>
             </tr>-->
            
              <?
          $strSQL13 = "SELECT * FROM staff WHERE stid = '".$objResult2["no_petition_staff"]."' ";
        $objQuery13 = mysql_query($strSQL13) or die ("Error Query [".$strSQL13."]");
        $objResult13 = mysql_fetch_array($objQuery13);
        ?>
             <tr>
                 <td width="" class="tblyy2" height="35">ผู้ร้องขอ</td>
                 <td width="" class="tblyy" height="35" colspan="2">
                 <select name="no_petition_staff" id="no_petition_staff">
                 
                 <option value="<?=$objResult2["no_petition_staff"]?>" selected='selected' ><?=$objResult13["stname"]?></option>
                 <?
         $strSQL_staff = "SELECT staff.stname ,staff.stid FROM staff";
         $objQuery_staff = mysql_query($strSQL_staff);
          while ($objResult_staff = mysql_fetch_array($objQuery_staff)) {
         ?>
                 <option value="<?=$objResult_staff["stid"]?>"><?=$objResult_staff["stname"]?></option>
                 <? } ?>
                 </select>
                </td>
             </tr>
             <tr>
               <td width="" class="tblyy2" height="35"></td>
               <td width="" class="tblyy" height="35">
               <center><a href="JavaScript:if(confirm('ยืนยันการแก้ไข?')==true){document.frm1.submit();}">
               <input type="image" name="submit" id="submit" src="../images/131.png"width="30" height="30"><div id="hh">SAVE</div></a></center></td>
               <td width="" class="tblyy" height="35"><center><a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$studentid?>" style="text-decoration:none"><img src="../images/129.png" width="30" height="30"><div id="hh">CANCEL</div></center></a></td>
             </tr>
             
           </table>
           </form>
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
make_autocom("show_arti_topic","h_arti_id");
</script>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>