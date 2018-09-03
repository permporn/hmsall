<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("config.inc.php");
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
            $top = 40;  //หน้าเริ่มบน  original 100
            $left = 500; //หน้าเริ่มซ้าย
            $crow = 0;
            $ccol = 1;
            $i = 1; //นับจำนวนบัตร
            $j = 0; //นับ column
            $temp = 50; //เก็บจำวนความสูงชั่วคราว
$strSQL = "SELECT * FROM learn JOIN student ON learn.studentid = student.studentid";
$strSQL .=" WHERE learnid = '".$_GET["learnid"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
                            ?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">ชื่อ    : <?= $objResult["studentname"]; ?><?= $top; ?></FONT></CENTER>
                            </DIV>
                            <?
                            //3 ชื่อนามสกุล
                            $top = $top + 16;
							$strSQL1 = "SELECT * FROM subject JOIN room ON subject.roomid = room.roomid JOIN branch ON room.branchid = branch.branchid WHERE subcode = '".$objResult["subcode"]."'";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
                            ?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">สาขา  : <?= $objResult1["branchname"]; ?></FONT></CENTER>
                            </DIV>
                            
                            <?
                            //4 คอร์ส
                            $top = $top + 16;
							
                    ?>
                    <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="jasmineUPC"  SIZE="2.0" COLOR="000000">คอร์ส  : <?= $objResult1["subname"]; ?> <?= $objResult["subcode"]; ?></FONT></CENTER>
                            </DIV>
                    <?
					$top = $top + 16;
                            
                                ?>
                                <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                    <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">เลขที่นั่ง : <?= $objResult1["roomname"]; ?>-<?= $objResult["seat"]; ?></FONT></CENTER>
                                </DIV>
                            <?
                            //5 เลขที่นั่ง
                            $top = $top + 16;
                            ?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">	วันเรียน : <?= $objResult1["day"]; ?> เวลา <?= $objResult1["time"]; ?></FONT></CENTER>
                            </DIV>
                            <?
                            //7 เวลาเรียน
                            $top = $top + 16;
                            ?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">วันที่เริ่มเรียน :<?= $objResult1["date"]; ?></FONT></CENTER>
                            </DIV>
                            <?
                            $top = $top + 5;
							?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:160px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">เลขประจำตัวนักเรียน :<?= $objResult["studentid"]; ?></FONT></CENTER>
                            </DIV>
                            
                            <?
							$top = $top + 16;
							?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:160px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">รหัสผ่าน          :<?= $objResult["pass"]; ?></FONT></CENTER>
                            </DIV>
                            <?
                            //วันเริ่มเรียน
                
                
                    $top = $top + 110; //บวกเพิ่มแนวตั้ง
       
                    //$top = $temp;
                   //บวกเพิ่มแนวนอน
                
				?>



        <DIV STYLE="position:absolute; top:<?= $top + 1128; ?>px; left:20px; width:200px; height:25px">
            <A HREF="javascript:window.print()"> >>Click to Print<< </A></A>
        </DIV>
    </body>
</html>