<?
include("../config.inc.php");
?>
<HTML>
	<HEAD>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
		<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
		<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
		<SCRIPT LANGUAGE="JavaScript">
		<!--
		function pick(symbol) {
		if (window.opener && !window.opener.closed)
		window.opener.document.studentForm.student.value = symbol;
		window.close();
		}
		// -->
		</SCRIPT>
		<link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
	</HEAD>
	<BODY>
		<form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
			<input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
			<input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
			<button type="submit" name="button" id="button" >ค้นหา</button>
			<p>&nbsp;</p>
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
		
		// การใช้งาน
		// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
		make_autocom("show_arti_topic","h_arti_id");
		</script>
		<?
		if($_GET["h_arti_id"] == "")
		{
		// Search By Name or Email
		$strSQL = "SELECT * FROM student WHERE 1";
		$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
		$Num_Rows = mysqli_num_rows($objQuery);
		$Per_Page = 5;   // Per Page
		$Page = $_GET["Page"];
		if(!$_GET["Page"])
		{
		$Page=1;
		}
		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;
		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
		$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
		$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
		$Num_Pages =($Num_Rows/$Per_Page)+1;
		$Num_Pages = (int)$Num_Pages;
		}
		$strSQL .=" order  by studentid ASC LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysqli_query($con_ajtongmath_self,$strSQL);
		?>
		<table class="tbl-border" cellpadding="0" cellspacing="1" width="600">
			<tr>
				<th width="180" height="40" class="tbl2"> <div align="center">ชื่อนามสกุล</div></th>
				<th width="180" class="tbl2"> <div align="center">เบอร์โทร</div></th>
			</tr>
			
			<?
			while($objResult = mysqli_fetch_array($objQuery))
			{
			?>
			<tr>
				<td height="30" class="tblyy"><div align="center"><A HREF="javascript:pick('<?= $objResult['name']; ?>')"><?=$objResult["name"];?></A></font></div></td>
				<td height="30" class="tblyy"><div align="center"><?=$objResult["tel"];?></div></td>
			</tr>
			<?
			}
			?>
		</table>
		<br>
		<div class="fontaa">Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
			<?
			if($Prev_Page)
			{
			echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&txtKeyword=$_GET[h_arti_id]'><< Back</a> ";
			}
			for($i=1; $i<=$Num_Pages; $i++){
			if($i != $Page)
			{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&txtKeyword=$_GET[h_arti_id]'>$i</a> ]";
			}
			else
			{
			echo "<b> $i </b>";
			}
			}
			if($Page!=$Num_Pages)
			{
			echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&txtKeyword=$_GET[h_arti_id]'>Next>></a> ";
			}
			
			mysqli_close();
			}
			
			else if($_GET["h_arti_id"] != "")
			{
			// Search By Name or Email
			$strSQL = "SELECT * FROM student WHERE (name LIKE '%".$_GET["h_arti_id"]."%')";
			$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
			$Num_Rows = mysqli_num_rows($objQuery);
			$Per_Page = 30;   // Per Page
			$Page = $_GET["Page"];
			if(!$_GET["Page"])
			{
			$Page=1;
			}
			$Prev_Page = $Page-1;
			$Next_Page = $Page+1;
			$Page_Start = (($Per_Page*$Page)-$Per_Page);
			if($Num_Rows<=$Per_Page)
			{
			$Num_Pages =1;
			}
			else if(($Num_Rows % $Per_Page)==0)
			{
			$Num_Pages =($Num_Rows/$Per_Page) ;
			}
			else
			{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
			}
			$strSQL .=" order  by studentid ASC LIMIT $Page_Start , $Per_Page";
			$objQuery  = mysqli_query($con_ajtongmath_self,$strSQL);
		?></div>
		<table class="tbl-border" cellpadding="0" cellspacing="1" width="600">
			<tr>
				<th width="180" height="40" class="tbl2"> <div align="center">ชื่อนามสกุล</div></th>
				<th width="180" class="tbl2"> <div align="center">เบอร์โทร</div></th>
			</tr>
			<?
			while($objResult = mysqli_fetch_array($objQuery))
			{
			?>
			<tr>
				<td height="30" class="tblyy"><div align="center"><font size="4"><A HREF="javascript:pick('<?= $objResult['name']; ?>')"><?=$objResult["name"];?></A></font></div></td>
				<td height="30" class="tblyy"><div align="center"><?=$objResult["tel"];?></div></td>
			</tr>
			<?
			}
			?>
		</table>
		<br>
		<div class="fontaa">Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
			<?
			if($Prev_Page)
			{
			echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&txtKeyword=$_GET[h_arti_id]'><< Back</a> ";
			}
			for($i=1; $i<=$Num_Pages; $i++){
			if($i != $Page)
			{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&txtKeyword=$_GET[h_arti_id]'>$i</a> ]";
			}
			else
			{
			echo "<b> $i </b>";
			}
			}
			if($Page!=$Num_Pages)
			{
			echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&txtKeyword=$_GET[h_arti_id]'>Next>></a> ";
			}
			
			mysqli_close($con_ajtongmath_self);
			}
		?></div>
	</BODY>
</HTML>