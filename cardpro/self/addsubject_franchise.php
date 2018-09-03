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
    <h1>เพิ่มวิชาเรียน </h1>
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
<style type="text/css">
#sss {
    width:691px;
    height:60px;
    background:url(images/addsub.png) no-repeat left top;
}
</style>
<script language="javascript">

function checkForm(){ 
    // if(((document.getElementById("h_arti_id_subj").value).length) == 0 ){
    //     alert("กรุณาเลือกวิชา");
    //     return false;
    // }
    if(((document.getElementById("codetransfer").value).length) == 0 ){
        alert("กรุณารหัสคอร์สโอนคอร์ส");
        return false;
    }
    /*if(((document.getElementById("Invoicenumber").value).length) == 0 ){
        alert("กรุณากรอกหมายเลขใบชำระเงิน");
        return false;
    }*/
    if(((document.getElementById("amount").value).length) == 0 ){
        alert("กรุณาราคาคอร์ส");
        return false;
    }
    if(((document.getElementById("date_pay").value).length) == 0 ){
        alert("กรุณาเลือกวันที่โอน");
        return false;
    }
    
}
</script>

    <? 
    include("config.incself.php");
    if($_GET['type'] == "Add"){?>
         <form name="addstudentForm" method="post" action="addsub.php?accid=<?=$_GET["accid"]?>&type=Add&stid=<?=$_SESSION["mapid"]?>" onSubmit="return checkForm();">
           <input type="hidden" name="staffid" id="staffid"  value="<?=$id_account_self?>"/>
           <input type="hidden" name="studenname"  id="studenname" value="<?=$_GET['studenname'];?>">
           <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
            <tr>
                 <td width="20%" class="tblyy2" height="35">เลือกวิชา :</td>
                 <td width="60%" class="tblyy" height="35">
                 <select name="type_self" id="type_self">
                        <option value="0" disabled="disabled" selected="selected">เลือก</option>
                        <?
                        $strSQL_type = "SELECT * FROM type_self WHERE type_id != 2 AND type_id != 3";
                        $objQuery_type = mysql_query($strSQL_type) or die ("Error Query [".$strSQL_type."]");
                        while ( $result_type = mysql_fetch_array($objQuery_type)){?>
                                <option value="<?=$result_type['type_id']?>" ><?=$result_type['type_name'];?></option>
                        <? }?>
                    </select>
                    <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" placeholder="ค้นหาวิชา" />
                    <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" />

                    <input name="show_arti_topic_subj_broadcast" type="text" id="show_arti_topic_subj_broadcast" size="30" value=""  placeholder="ค้นหาวิชา"/>
                    <input name="h_arti_id_subj_broadcast" type="hidden" id="h_arti_id_subj_broadcast" value="" />
                    <font color="#FF0000"> *</font>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">วันที่โอน : </td>
               <td width="60%" class="tblyy" height="35">
               <input type="date" name="date_pay" id="date_pay" value=""><font color="#FF0000"> * วัน/เดือน/ค.ศ</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">ประเภทการจ่าย :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input name="type_pay" type="radio" value="transfer" class="input4" checked="checked" />โอน            
                 <input name="type_pay" type="radio" value="cradit" class="input4" /> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" /> เงินสด 
                <font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">รหัสคอร์สที่โอน :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="codetransfer" id="codetransfer" size="10" ><font color="#FF0000"> * กรอกรหัสคอร์สที่โอน ตย.HA0101</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">หมายเลขใบชำระ :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="Invoicenumber" id="Invoicenumber" ><font color="#FF0000"> * เลขสลิปโอน ตย.0880-98001 /บัตรเคดิต ตย.000000001229 </font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">จำนวนเงิน :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="amount" id="amount"  size="10">บาท <font color="#FF0000"> *กรอกเฉพาะตัวเลข ตย. 3500</font></td>
             </tr>
             <tr>
                <td width="20%" class="tblyy2" height="35" colspan="5" ><strong>- จ่ายหนังสือ</strong></td>
            </tr>
            <tr>
                <td width="20%" class="tblyy2" height="35">สถานะหนังสือ/เล่ม</td>
                <td width="60%" class="tblyy" height="35">
                    <input type="radio" name="book_status" value="ครบ" <? if($objResult1["book_status"]=="ครบ"){?>checked="checked"<? }?>>ครบ
                    <input type="radio" name="book_status" value="ขาด" <? if($objResult1["book_status"]=="ขาด" || $objResult1["book_status"]==""){?>checked="checked"<? }?>>ขาด
                </td>
            </tr>
            <tr>
                <td width="20%" class="tblyy2" height="35">จำนวนที่จ่ายไป</td>
                <td width="60%" class="tblyy" height="35"><input name="book_num" type="text" value="<?=$objResult1["book_num"]?>" style="width:40px"> เล่ม <font color="#FF0000">* ขาดหรือครบ ต้องกรอกจำนวนเล่ม</font></td>
            </tr>
            <tr>
                <td width="20%" class="tblyy2" height="35">รายละเอียด</td>
                <td width="60%" class="tblyy" height="35"><textarea id="book_detail" name="book_detail" rows="4" cols="30"><?=$objResult1["book_detail"]?></textarea><font color="#FF0000">*(ในกรณีที่ขาด)</font></td>
            </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35"></td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="submit" name="submit" id="submit" class="submit3" value="ตกลง" >
                 <a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET["std"]?>" style="text-decoration:none"><< กลับ</a></td>
             </tr>
           </table>
        </form>
        <? } ?>
           
</div>
<? mysql_close();?>
<script type="text/javascript">

$("#show_arti_topic_subj_broadcast").hide();
$("#show_arti_topic_subj").hide();


$( "#type_self" ).change(function() {
     if($('#type_self').val() == 4){
         $("#show_arti_topic_subj").hide();
         $("#show_arti_topic_subj_broadcast").show("slow");
     }else{
         $("#show_arti_topic_subj_broadcast").hide();
         $("#show_arti_topic_subj").show("slow");
     }
});

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
        return "dataname.php?q=" +encodeURIComponent(this.value);
    }); 
}       

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
        return "datasubj_franchise.php?q=" +encodeURIComponent(this.value);
    }); 
}

function make_autocomsubjbroadcast(autoObj,showObj){
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
        return "datasubj_franchise_broadcast.php?q=" +encodeURIComponent(this.value);
    }); 
}       

make_autocomsubj("show_arti_topic_subj","h_arti_id_subj");
make_autocomname("show_arti_topic_name","h_arti_id_name");
make_autocomsubjbroadcast("show_arti_topic_subj_broadcast","h_arti_id_subj_broadcast");
//Cufon.now(); 
</script>
           
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
<script type="text/javascript">// Cufon.now(); </script>
</body>
</html>