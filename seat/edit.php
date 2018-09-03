<?php include("config.inc.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Seats</title>

<script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.js" ></script>
<link rel="stylesheet" href="css/smoothness-jquery-ui.css">

</head>
<script type="text/javascript">
 $(function() {
    $( "#date0" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
  
 $(function() {
    $( "#date1" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
		</script>	
<?php
	 
?>
<body>
<form id="form1" name="form1" method="post" action="editseat.php">
<p> แก้ไข บวก-ลบ ที่นั่ง </p>
                <div class="bg left">
                  	<input class="input" type="text" value="เลือกวันที่"	 id="date0" name="date0" onblur="if(this.value=='') this.value='เลือกวันที่'" onFocus="if(this.value =='เลือกวันที่' ) this.value=''" />
                
                  	<input class="input" type="text" value="เลือกวันที่"	 id="date1" name="date1" onblur="if(this.value=='') this.value='เลือกวันที่'" onFocus="if(this.value =='เลือกวันที่' ) this.value=''" />
                </div>
                <div class="bg left">
               <select name="time" id="time">
                   <option>เลือกเวลาเปิด</option>
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
                
                <select name="timeend" id="timeend">
                   <option>เลือกเวลาปิด</option>
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
                </div>
                
                <div class="bg left">
                <input type="radio" name="addsub" value="plus">บวก
				<input type="radio" name="addsub" value="sub">ลบ
				<label>จำนวน</label><input class="input" type="text"  name="nums1" id="nums1" />
                </div>
                <div class="bg left">
                <select name="local"  id="local" class="input2 input1" >
              		<option value="" onfocus="this.value='';" onblur="if(this.value=='') this.value='เลือกสาขา'" onFocus="if(this.value =='เลือกสาขา' ) this.value=''"<option>เลือกสาขา</option>
                    <option value="1">พญาไท ชั้น 10 </option>
                    <option value="5">พญาไท ชั้น 9 </option>
                    <option value="4">พญาไท ชั้น 2 </option>
                  	<option value="2">วงเวียนใหญ่</option>
                  	<option value="3">วิสุทธิธานี</option>
                  	<option value="6">สระบุรี สุขอนันต์ ปาร์ค</option>
                    <option value="7">ชลบุรี</option>
                    <option value="8">ราชบุรี</option>
                 </select>
                </div>
                <div class="bg left">
                  	<input type="hidden" name="hiddenField" id="hiddenField">
             		<input type="submit" name="Save" id="Save" value="Save">
                </div>   
                </form>
</body>
</html>