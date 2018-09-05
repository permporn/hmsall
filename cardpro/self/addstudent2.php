<? 
session_start();
include("../funtion.php");
include("ck_session_self.php");
error_reporting(~E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
</head>
<body>
<script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjax() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'AjaxPHPRegister2.php';
		  var pmeters = "tUsername=" + encodeURI( document.getElementById("txtUsername").value);

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpan").innerHTML = "..";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'AjaxPHPRegister3.php';
					}
					else
					{
						document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
					}
				}
				
			}

	   }
</script>
<script language="javascript">
	function chk_null(){
		if (document.frmMain.txtUsername.value ==""){
			alert("กรุณากรอกชื่อนักเรียนด้วยครับ")
			document.frmMain.txtUsername.focus()
			return false
		}
	}
</script>
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/addstudent3.png) no-repeat left top;
}
#hh{
	font-size:12px;
	color:#666;
	font-family:Tahoma, Geneva, sans-serif;
}
</style>
<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php');?>
  <div id="content">
    <h1>เพิ่มนักเรียน</h1>
    <p>
    <div align="right">
    <form action="searchstudent.php" method="get" id="search-form">
        <label >ค้นหารายชื่อ:</label>
        <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  		<input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
        <a href="#" onClick="document.getElementById('search-form').submit()">ค้นหา</a>
    </form>
    </div>
    <br /> <br /> <br />
    <form name="frmMain" action="addstudent22.php" method="post" enctype="multipart/form-data"  onSubmit="return chk_null();">
            <table class="tbl-border" cellpadding="0" cellspacing="1" width="50%" align="center">
             <tr>
             
               <td width="35%" height="35" class="tbl2" style="white-space: nowrap;">ชื่อ-นามสกุล  :</td>
               <td align="left"  class="tblyy" colspan="2">
               <input type="hidden" name="type" value="<?=$_GET["type"]?>"/>
               <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
               <input type="text" name="txtUsername" id="txtUsername" OnChange="JavaScript:doCallAjax();"><span id="mySpan"></span><font color="#FF0000"><strong> *</strong> การพิมพ์รายชื่อต้องพิมพ์ชื่อเว้นวรรณ 1 ที ตามด้วยนามสกุล เช่น เด็กโต้ง ขยันเรียน </font></td>
             </tr>
             <tr>
               <td width="35%" height="35" class="tbl2" style="white-space: nowrap;">เลขบัตรประชาชน:</td>
               <td align="left"  class="tblyy" colspan="2">
               <input type="text" name="pcode" id="pcode">
               </td>
             </tr>
             <tr>
               <td width="35%" height="35" class="tbl2" style="white-space: nowrap;">โรงเรียน:</td>
               <td align="left"  class="tblyy" colspan="2">
               <input type="text" name="school" id="school"></td>
             </tr>
             <tr>
               <td width="35%" height="35" class="tbl2" style="white-space: nowrap;">เบอร์โทรศัพท์:</td>
               <td align="left"  class="tblyy" colspan="2">
               <input type="text" name="tel" id="tel">
               </td>
             </tr>
             <tr>
               <td width="35%" height="35" class="tbl2" style="white-space: nowrap;"></td>
               <td width="31%" align="left"  class="tblyy" >
               <center><input type="image" name="submit" id="submit" src="../images/131.png"  width="30" height="30"><div id="hh">SAVE</div></center>
               </td>
               <td width="34%" align="left"  class="tblyy">
               <center><a href="javascript:document.frmMain.reset()">
               <img src="../images/129.png" width="30" height="30"><div id="hh">CANCEL</div>
               </a></center>
               </td>
             </tr>
           </table>
           </form>
    
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
</html>
