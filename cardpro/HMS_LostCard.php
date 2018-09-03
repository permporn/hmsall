<? 
ob_start();
session_start();
include("config.inc.php");
include("funtion.php");
include("ck_session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<? include("script_link.php");?>
<script type="text/javascript">

$(document).ready(function(){
	var id_card = $.urlParam('id_card');
	//alert(id_card);
	
});

$.urlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	if (results==null){
		return null;
	}
	else{
		return results[1] || 0;
	}
}

</script>
</head>

<body>
<!-- START PAGE SOURCE -->
<div id="container">
	<? include('menu.php')?>
    <div id="content">
	<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
    <tr>
    <td colspan="3" class="tbl23" style="white-space: nowrap;" align="center"  height="">แจ้งบัตรหาย</td>
    </tr>
    <tr>
          <td width="14%"  height="" colspan="" align="right" class="tblyy" style="white-space: nowrap;">
          รหัสบัตร : </td>
          <td width="72%"  height="" colspan="" align="left" class="tblyy" style="white-space: nowrap;">
          <font color="#0099FF"></font>
          </td>
          <td class="tblyy"  rowspan="14" style="white-space: nowrap;" align="left"  height=""> <img src="images/hmscard.png" width="150"/></td>
    </tr>
    <tr>
          <td width="14%"  height="" colspan="" align="right" class="tblyy" style="white-space: nowrap;">
          รหัสนักเรียน : </td>
          <td width="72%"  height="" colspan="" align="left" class="tblyy" style="white-space: nowrap;">
          <font color="#0099FF"></font>
          </td>
    </tr>
     <tr>
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อ - นามสกุล : </td>
		  
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$result_std["studentname"];?></font>
          </td>
      </tr>
      <tr>
          <td width="14%"  height="" colspan="" align="right" class="tblyy" style="white-space: nowrap;">
          วันที่ :</td>
          <td width="72%"  height="" colspan="" align="left" class="tblyy" style="white-space: nowrap;">
          <input type="date"/>
          </td>
      </tr>
      <tr>
      	  <td colspan="" class="tblyy" style="white-space: nowrap;" align="right"  height=""></td>
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <input type=button onClick="parent.location=''" value='ยืนยัน'/>
          <input type=button onClick="parent.location=''" value='ยกเลิก'/>
          </td>
      </tr>
</table>
</div>
</div>

</body>
</html>
<?php mysql_close();?>