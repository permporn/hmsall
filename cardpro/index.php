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

<? include("script_link.php");?>

</head>



<body>

<!-- START PAGE SOURCE -->

<div id="container">

  <? include('menu.php')?>

  <div id="content">

  <h1>แจ้งข่าวสาร</h1>

	<?

$i=1;

$strSQL = "SELECT * 

FROM even e

INNER JOIN account a 

ON e.idstaff = a.accid";

$objQuery = mysqli_fetch_array($strSQL) or die ("Error Query [".$strSQL."]");

$Num_Rows = mysqli_num_rows($objQuery);

$Per_Page = 10;   // Per Page



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

	$strSQL .=" order  by evenid DESC LIMIT $Page_Start , $Per_Page";

	$objQuery = mysqli_query($strSQL) or die ("Error Query [".$strSQL."]");

	

	if(!$objQuery){}

	else{

?>



<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">

	  <tr>

		<td width="20%" class="tbl2" style="white-space: nowrap;" align="center"> วันที่</th>

		<td width="60%" class="tbl2" align="center"> ข่าว</th>

        <td width="20%" class="tbl2" style="white-space: nowrap;" align="center"> ผู้แจ้ง</th>

        

	  </tr>

	<?

	

	$s=date('Y-m-d');

	while($objResult = mysqli_fetch_array($objQuery))

	{

		$num++;

		if($num % 2 == 0){$tblyy = "tblyy2";}

		else{$tblyy = "tblyy";}

	?>

	  <tr>

		<td width="20%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=DateThai($objResult["date"]);?></td>

        <td width="60%" class="<?=$tblyy?>" align="center"><? if(DateDiff($s,$objResult["date"])<=0&&DateDiff($s,$objResult["date"])>-7) {?> &nbsp;&nbsp;<img src="images/icn_new.gif"/> <? } ?><?=$objResult["even"];?></td>

        <td width="20%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">

        <?=$objResult["name"];?>

        </td>

        

	  </tr>

	

	

    <?

	$i++;

	}

	?>

    </table>

    <div align="right"><p>

    Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :

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

	?>

    </p></div>

    <? }?>

</div>

</html>

<?php mysqli_close();?>