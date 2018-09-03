<?
include("config.inc.php");
?>
<HTML>
    <HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
        <script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
        <SCRIPT LANGUAGE="JavaScript">
            <!--
            function pick(symbol) {
                if (window.opener && !window.opener.closed)
                    window.opener.document.studentForm.sub.value = symbol;
                window.close();
            }
            // -->
        </SCRIPT>
</HEAD>
    <BODY>
         <form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
  <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
  <button type="submit" name="button" id="button"  class="submit4">ค้นหา         </button>
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
		return "data1.php?q=" +encodeURIComponent(this.value);
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
	$strSQL = "SELECT * FROM subject WHERE 1";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$Num_Rows = mysql_num_rows($objQuery);


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


	$strSQL .=" order  by subid ASC LIMIT $Page_Start , $Per_Page";
	$objQuery  = mysql_query($strSQL);

	?>
	<table class="tbl-border" cellpadding="0" cellspacing="1" width="600">
	  <tr>
		<th width="180" height="40" class="tbl2"> <div align="center">วิชา</div></th>
		<th width="180" class="tbl2"> <div align="center">เครดิต</div></th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr><div class="fontaa">
		<td height="30" class="tblyy"><div align="center"><A HREF="javascript:pick('<?= $objResult['subname']; ?>')"><?=$objResult["subname"];?></A></div></td>
		<td height="30"  class="tblyy"><div align="center"><?=$objResult["hour"];?></div></td></div>
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
	
	mysql_close();

	}
	
 else if($_GET["h_arti_id"] != "")
	{
	// Search By Name or Email
	$strSQL = "SELECT * FROM subject WHERE (subname LIKE '%".$_GET["h_arti_id"]."%')";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$Num_Rows = mysql_num_rows($objQuery);


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


	$strSQL .=" order  by subid ASC LIMIT $Page_Start , $Per_Page";
	$objQuery  = mysql_query($strSQL);

	?></div>
	<table class="tbl-border" cellpadding="0" cellspacing="1" width="600">
	  <tr>
		<th width="180" height="40" class="tbl2"> <div align="center">วิชา</div></th>
		<th width="180" class="tbl2"> <div align="center">เครดิต</div></th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr><div class="fontaa">
		<td height="30" class="tblyy"><div align="center"><font size="4"><A HREF="javascript:pick('<?= $objResult['subname']; ?>')"><?=$objResult["subname"];?></A></font></div></td>
		<td height="30" class="tblyy"><div align="center"><?=$objResult["hour"];?></div></td></div>
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
	
	mysql_close();

	}		
    ?></div>
    </BODY>
</HTML>