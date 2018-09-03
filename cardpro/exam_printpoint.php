<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("ck_session.php");
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
         <style type="text/css"> 

		#printable { display: block; }
		
		@media print 
		{ 
			 #non-printable { display: none; } 
			 #printable { display: block; } 
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
            for($i=0;$i<count($_POST["chkDel"]);$i++)
				{
				if($_POST["chkDel"][$i] != "")
					{
$strSQL = "SELECT * FROM learn JOIN student ON learn.studentid = student.studentid";
$strSQL .=" WHERE learnid = '".$_POST["chkDel"][$i]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
                            ?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:600px;">
                                <img src="images/logo1.png" width="100" height="100"/>
                            </DIV>
                            <?
                            //3 ชื่อนามสกุล
                            $top = $top + 16;
	
                            ?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:60px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="3.0" COLOR="000000">คณิตศาสตร์ อ.โต้ง</FONT></CENTER>
                            </DIV>
                            
                            <?
                            //4 คอร์ส
                            $top = $top + 16;
							
                    ?>
                    <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:60px;">
                                <LEFT><FONT face="jasmineUPC"  SIZE="2.0" COLOR="000000">ประกาศคะแนนสอบ</FONT></CENTER>
                            </DIV>
                    <?
					$top = $top + 16;
                            $strSQL1 = "SELECT * 
							FROM subject 
							JOIN room 
							ON subject.roomid = room.roomid 
							JOIN branch ON room.branchid = branch.branchid 
							WHERE subject.subcode = '".$objResult["subcode"]."' AND subject.id_year = '".$objResult["id_year"]."'";
							
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
                                ?>
                                <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:60px;">
                                    <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000"><strong><?= $objResult1["subname"]; ?></strong></FONT></CENTER>
                                </DIV>
                            <?
                            //5 เลขที่นั่ง
                            $top = $top + 16;
                            ?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:400px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">คะแนนที่ได้ <?=$objResult['finaltest']+$objResult['sumpoint'];?></FONT></CENTER>
                            </DIV>
                            <?
                            //7 เวลาเรียน
                            $top = $top + 16;
                            ?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:388px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000"></CENTER>
                            </DIV>
                            <?
                            $top = $top + 5;
							?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:60px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">ชื่อ    : <?= $objResult["studentname"]; ?></FONT></CENTER>
                            </DIV>
                            
                            <?
							$top = $top + 16;
							?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:60px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">เลขประจำตัวนักเรียน :<?= $objResult["studentid"]; ?></FONT></CENTER>
                            </DIV>
                            <?
							$top = $top + 64;
							?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:1px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">--------------------------------------------------------------------------------------------------------------------------------------</FONT></CENTER>
                            </DIV>
                            <? if($objResult['finaltest']+$objResult['sumpoint']>83){ ?>
                            <DIV STYLE="position:absolute; top:<?= $top-80; ?>px; left:350px;">
                                <img src="images/Cartoon exam card.png" width="150" height="59"/>
                            </DIV>
                            <? } ?>
                            
    <?
							$top = $top - 64;
							?>
                            <?
                            //วันเริ่มเรียน
                
                
                    $top = $top + 110; //บวกเพิ่มแนวตั้ง
       
                    //$top = $temp;
                   //บวกเพิ่มแนวนอน
                
				
	 $j++;
				if($j==5)
				{$top=1088*$ccol;
				if($ccol>=2){$top=$top-(40*($ccol-1))+($ccol*3);}
				$ccol++;$j=0;}
            }
        }
        ?>


<div id="non-printable"> 
        <A HREF="javascript:window.print()"> <button style="margin-left:200px; width:200px; font-size:20px; height:80px;" >PRINT</button> </A></A>
        </div>
    </body>
</html>
<?php mysql_close();?>