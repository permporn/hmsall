<? 
session_start();
include("config.inc.php");
$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	if($_SESSION["stid"]=="")
	{echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Please Login!!');</script>";
echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
			exit();
		}
		function DateThai($strDate)
						{
						$strYear = date("Y",strtotime($strDate))+543;
						$strMonth= date("n",strtotime($strDate));
						$strDay= date("j",strtotime($strDate));
						$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
						$strMonthThai=$strMonthCut[$strMonth];
						return "$strDay $strMonthThai $strYear";
						}
?>
<html>
    <head>
        <style>
            body {
                height: 842px;
                width: 595px;
                /* to centre page on screen*/
                margin-left: auto;
                margin-right: auto;
            }
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
    </head>
    <body>
        <?
            $top = 38;  //หน้าเริ่มบน  original 100
            $left = 504; //หน้าเริ่มซ้าย
            $crow = 0;
            $ccol = 1;
            $i = 1; //นับจำนวนบัตร
            $j = 2; //นับ column
            $temp = 50; //เก็บจำวนความสูงชั่วคราว
			$strSQL66 = "SELECT * FROM account JOIN student ON account.studentid = student.studentid AND accid = '".$_GET["accid"]."'";
	$objQuery66 = mysql_query($strSQL66);
	$objResult66 = mysql_fetch_array($objQuery66);
			?>
            
            
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">ชื่อ    : <?=$objResult66["name"]; ?></FONT></CENTER>
                            </DIV>
                             <?
							 $o=1;
                            
                           $strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
				$objQuery1 = mysql_query($strSQL1);
  				while ($objResult1 = mysql_fetch_array($objQuery1)) {
					$top = $top + 16;
				if($o==1){
					
	?>
    <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">วิชาเรียน  : <?=$objResult1['subname'] ?></FONT></CENTER>
                            </DIV>
                            <?
				}
				else
				{
							?>
                             <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$objResult1['subname'] ?></FONT></CENTER>
                            </DIV>
                            <?
				}
				$o++;}
							?>
                             <?
                            //3 ชื่อนามสกุล
                            $top = $top + 16;
                            ?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">เครดิต  : <?=$objResult66['totalcredit'] ?> เครดิต (<?=$objResult66['totalcredit']*0.5 ?> ชั่วโมง)</FONT></CENTER>
                            </DIV>
                            <?
                            //3 ชื่อนามสกุล
                            $top = $top + 16;
                            ?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">วันหมดอายุ  : <?= DateThai($objResult66['edate']) ?></FONT></CENTER>
                            </DIV>
                             <?
                            //3 ชื่อนามสกุล
                            $top = $top + 16;
                            ?>
                             <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">สถานที่เรียน  : <? if($objResult66["status"]==1){ ?>เรียนได้ทุกสาขา<? } else if($objResult66["status"]==2) { ?> วงเวียนใหญ่ <? } else if($objResult66["status"]==8) { ?> ราชบุรี <? } else if($objResult66["status"]==6) { ?> สระบุรี <? } else if($objResult66["status"]==7) { ?> ชลบุรี <? }else if($objResult66["status"]==3) { ?>วิสุทธานี<? } ?> </FONT></CENTER>
                            </DIV>
                            <DIV STYLE="position:absolute; top:123px; left:145px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">จองเวลาเรียน www.aj-tongmath.com</FONT></CENTER>
                            </DIV>
                            <DIV STYLE="position:absolute; top:155px; left:230px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">Username  : <?=$objResult66["username"] ?></FONT></CENTER>
                            </DIV>
                            <DIV STYLE="position:absolute; top:171px; left:230px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">Password  : <?=$objResult66["password"] ?></FONT></CENTER>
                            </DIV>
                            
          



        <DIV STYLE="position:absolute; top:<?= $top + 1126; ?>px; left:20px; width:200px; height:25px">
            <A HREF="javascript:window.print()">Click to Print This Page</A>
        </DIV>
    </body>
</html>