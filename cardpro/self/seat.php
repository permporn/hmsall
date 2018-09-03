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
    <h1>จองที่นัง SELF FAST </h1>
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
  background:url(images/sear.jpg) no-repeat left top;
}
</style>
<script type="text/javascript">
      $(function () {
        var d = new Date();
        var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


        // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

        $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', maxDate: +90, minDate: 0, isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th-2").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay,dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

            $("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});

        $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });


      });
    </script>
<script language="javascript">
function chk_null(){
if (document.studentForm.sub.value ==""){
alert("กรุณาเลือกวิชาด้วยด้วยครับ")
document.studentForm.sub.focus()
return Erase
}
}
</script>
<SCRIPT LANGUAGE="JavaScript">
    <!--
    function showList() {
        sList = window.open("studentlist.php", "list", "width=700,height=500");
    }
    function showSubList() {
        sList = window.open("subjectlist.php", "list", "width=700,height=500");
    }
    function remLink() {
        if (window.sList && window.sList.open && !window.sList.closed)
            window.sList.opener = null;
    }
    // -->
</SCRIPT>
<style type="text/css">

      .demoHeaders { margin-top: 2em; }
      #dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
      #dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
      ul#icons {margin: 0; padding: 0;}
      ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
      ul#icons span.ui-icon {float: left; margin: 0 4px;}
      ul.test {list-style:none; line-height:30px;}
    </style>  

<form name="form1" method="post" action="saveseat.php">
          <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
          <tr>
              <td style="white-space:nowrap;" class="tbl2"> Username :</td>
              <td width="" style="white-space:nowrap;" class="tblyy"><input type="text" name="username" id="username"/></td>
          </tr>
          <tr>
            <td style="white-space:nowrap;" class="tbl2">password :</td>
            <td width="" style="white-space:nowrap;" class="tblyy"><input type="password" name="password" id="password"></td>  
          </tr>                    
          <tr>
            <td style="white-space:nowrap;" class="tbl2">เวลาเริ่ม :</td> 
            <td width="" style="white-space:nowrap;" class="tblyy">
            <select name="time_s" id="time_s">
               <option value="0">&lt;-- เลือกเวลา --&gt;</option>
               <option value="1">8.00</option>
               <option value="2">8.30</option>
               <option value="3">9.00</option>
               <option value="4">9.30</option>
               <option value="5">10.00</option>
               <option value="6">10.30</option>
               <option value="7">11.00</option>
               <option value="8">11.30</option>
               <option value="9">12.00</option>
               <option value="10">12.30</option>
               <option value="11">13.00</option>
               <option value="12">13.30</option>
               <option value="13">14.00</option>
               <option value="14">14.30</option>
               <option value="15">15.00</option>
               <option value="16">15.30</option>
               <option value="17">16.00</option>
               <option value="18">16.30</option>
               <option value="19">17.00</option>
               <option value="20">17.30</option>
               <option value="21">18.00</option>
               <option value="22">18.30</option>
               <option value="23">19.00</option>
               <option value="24">19.30</option>
               <option value="25">20.00</option>
             </select>
             <td>
       </td>
       <tr>
       <td style="white-space:nowrap;" class="tbl2">เวลาสิ้นสุด:</td>
          <td width="" style="white-space:nowrap;" class="tblyy">
          <select name="time_e" id="time_e">
               <option value="0">&lt;-- เลือกเวลา --&gt;</option>
               <option value="1">8.00</option>
               <option value="2">8.30</option>
               <option value="3">9.00</option>
               <option value="4">9.30</option>
               <option value="5">10.00</option>
               <option value="6">10.30</option>
               <option value="7">11.00</option>
               <option value="8">11.30</option>
               <option value="9">12.00</option>
               <option value="10">12.30</option>
               <option value="11">13.00</option>
               <option value="12">13.30</option>
               <option value="13">14.00</option>
               <option value="14">14.30</option>
               <option value="15">15.00</option>
               <option value="16">15.30</option>
               <option value="17">16.00</option>
               <option value="18">16.30</option>
               <option value="19">17.00</option>
               <option value="20">17.30</option>
               <option value="21">18.00</option>
               <option value="22">18.30</option>
               <option value="23">19.00</option>
               <option value="24">19.30</option>
               <option value="25">20.00</option>
             </select>
           </td>
      </tr>
      <tr>
          <td style="white-space:nowrap;" class="tbl2">สาขา :</td>
          <td width="" style="white-space:nowrap;" class="tblyy">
          <select name="branch" id="branch">
          <option value="0"  disabled="disabled" selected="selected">เลือก</option>
            <?   
            include("config.incself.php");
            if( $objResultSTT["status"] == "manager_franchise" || $objResultSTT["status"] == "user_franchise"){?>
                  <?
                  $strSQL_branch = "SELECT * FROM branch";
                  $objQuery_branch = mysql_query($strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
                  while ( $result_branch = mysql_fetch_array($objQuery_branch)){
                      if($result_branch['branchid'] == $id_branch_self){?>
                      <option value="<?=$result_branch['branchid']?>" ><?=$result_branch['name'];?></option>
                  <? }}?>
            <? }else{
                  $strSQL_branch = "SELECT * FROM branch WHERE branchid != 9 AND branchid != 10";
                  $objQuery_branch = mysql_query($strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
                  while ( $result_branch = mysql_fetch_array($objQuery_branch)){?>
                      <option value="<?=$result_branch['branchid']?>" ><?=$result_branch['name'];?></option>
                  <? }?>
            <? }?>
            </select>
      </td>
      </tr>
      <tr>
          <td style="white-space:nowrap;" class="tbl2"></td>
          <td width="" style="white-space:nowrap;" class="tblyy">
          <input type="hidden" name="hiddenField" id="hiddenField">
          <input type="submit" name="Save" id="Save" value="Save">
          </td>
      </tr> 
  </table>                           
           </form>
    </p>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>