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
        <style type="text/css"> 

		#printable { display: block; }
		
		@media print 
		{ 
			 #non-printable { display: none; } 
			 #printable { display: block; } 
		} 

</style> 
    </head>
    <body>
        <?
            $top = 43;  //หน้าเริ่มบน  original 100
            $left = 525; //หน้าเริ่มซ้าย
            $crow = 0;
            $ccol = 1;
            $i = 1; //นับจำนวนบัตร
            $j = 0; //นับ column
			$k = 0; //นับ column
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
                            <div id="printable"> 
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">ชื่อ    : <?= $objResult["studentname"]; ?></FONT></CENTER>
                            </DIV>
                            <?
                            //3 ชื่อนามสกุล
                            $top = $top + 16;
							$strSQL1 = "SELECT * FROM subject 
							JOIN room ON subject.roomid = room.roomid 
							JOIN branch ON room.branchid = branch.branchid 
							WHERE subcode = '".$objResult["subcode"]."'AND id_year = '".$_GET["id_year"]."'";
							
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
                            $top = $top + 4;
							?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:190px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">เลขประจำตัวนักเรียน :<?= $objResult["studentid"]; ?></FONT></CENTER>
                            </DIV>
                            
                            <?
							$top = $top + 16;
							?>
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:190px;">
                                <LEFT><FONT face="jasmineUPC" SIZE="2.0" COLOR="000000">รหัสผ่าน          :<?= $objResult["pass"]; ?></FONT></CENTER>
                            </DIV>
                            <?
                            //วันเริ่มเรียน
               				
							
                		 
                    	 $top = $top + (75); //-$k-1บวกเพิ่มแนวตั้ง
       						
                    //$top = $temp;
                   //บวกเพิ่มแนวนอน
               if($k<6){$k++;}else{$k=0;}
				
				$j++;
				
			/*	if($j==6)
				{$top=987*$ccol;//1088
				if($ccol>2){$top = $top-(12+$k);
				}if($ccol>=2){$top=$top-(40*($ccol-1))+($ccol*3);}
				$ccol++;
				$j=0;
				}*/
				if($j==6)
				{$top=(1095*$ccol)-$j;
				if($ccol>=2){$top=$top-(40*($ccol-1))+($ccol*3);}
				$ccol++;$j=0;}
            
        
				
            }
        }
        ?>
</DIV>

        <div id="non-printable"> 
            <A HREF="javascript:window.print()"> <button style="margin-left:200px; width:200px; font-size:20px; height:80px;" >PRINT</button> </A></A>
            </div> 
        </DIV>
    </body>
</html>