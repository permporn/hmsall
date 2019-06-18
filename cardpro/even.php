<?php

ob_start();

session_start();

include("funtion.php");

include("ck_session.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link href="css/jquery.dataTables.min.css" rel="stylesheet">

<?php  include("script_link.php");?>

</head>

<script src="js/jquery.dataTables.min.js"></script>

<script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>


<body>

<!-- START PAGE SOURCE -->

<script language="JavaScript">

function ChkSubmit(result){

	if(document.getElementById("even").value == "")

		{
			alert('กรุณาใส่ข่าวสารที่ต้องการแจ้ง');

			return false;
		}
}

</script>

<div id="container">

  <?php  include('menu.php')?>

  <div id="content">

  <h1>แจ้งข่าวสาร</h1>

  <form action="saveeven.php?type=add" name="frmMain" method="post" onSubmit="return ChkSubmit();">

  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">

	<tr>

	<td width="" class="tbl2" style="white-space: nowrap;" align="center"> กรอกข้อความ :</td>

    <td width="" class="tblyy" style="white-space: nowrap;" align="">

    <textarea name="even" cols="55" rows="8" class="" id="even"></textarea>

    </td>

    </tr>

    <tr>

    <td width="" class="tbl2" style="white-space: nowrap;" align=""></td>

    <td width="" class="tblyy" style="white-space: nowrap;" align="">

    <input name="idstaff" type="hidden" class="" id="idstaff" value="<?=$objResultSTT["accid"]?>" />

    <input name="Save" type="submit" class="" id="Save" value="Save" />

    <input name="reset" type="reset" class="" id="reset" value="Reset" />

    </td>

    </tr>

  </table>

  </form>

  </br>

<?php

	error_reporting(~E_NOTICE);

	$i=1;

	$strSQL = "SELECT * 

	FROM even e

	INNER JOIN account a 

	ON e.idstaff = a.accid";
	
	$objQuery = mysqli_query($con_ajtongmath_scho, $strSQL) or die ("Error Query [".$strSQL."]");

	$Num_Rows = mysqli_num_rows($objQuery);

	$objQuery = mysqli_query($con_ajtongmath_scho, $strSQL) or die ("Error Query [".$strSQL."]");

?>
<table id="myTable" class="display" style="width:100%">
	<thead>
	  <tr>
			<td width="" class="tbl2" style="white-space: nowrap;" align="center"> วันที่</th>
			<td width="" class="tbl2" style="white-space: nowrap;" align="center"> ข่าว</th>
			<td width="" class="tbl2" style="white-space: nowrap;" align="center"> ผู้แจ้ง</th>
			<?php if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
			<td width="" class="tbl2" style="white-space: nowrap;" align="center"> ลบ</th>
			<?php }?>
	  </tr>
	</thead>	
	<tbody>
	<?php

	$num = 0;

	while($objResult = mysqli_fetch_array($objQuery))
	{
		$num++;

		if($num % 2 == 0){$tblyy = "tblyy2";}

		else{$tblyy = "tblyy";}
	?>
	<tr>
		<td  style="white-space: nowrap;" align="left"><?=DateThai($objResult["date"]);?></td>
			<td  style="white-space: nowrap;" align="left"><?=$objResult["even"];?></td>
			<td  style="white-space: nowrap;" align="left"><?=$objResult["name"];?></td>
			<?php if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
			<td  style="white-space: nowrap;" align="center">
			<a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='saveeven.php?evenid=<?=$objResult["evenid"];?>&type=del';}"><img src="images/delete-2.png"></a>
			</td>
			<?php } ?>
	</tr>
  <?php $i++; }?>
	</tbody>
</table>
</html>

<?php mysqli_close($con_ajtongmath_scho);?>