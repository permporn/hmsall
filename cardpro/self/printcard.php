<? 
ob_start();
session_start();
include("ck_session_self.php");
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
            $top = 42;  //หน้าเริ่มบน  original 100
            $left = 530; //หน้าเริ่มซ้าย
            $crow = 0;
            $ccol = 1;
            $i = 1; //นับจำนวนบัตร
            $j = 2; //นับ column
            $temp = 50; //เก็บจำวนความสูงชั่วคราว
            $strSQL66 = "SELECT * FROM account JOIN student ON account.studentid = student.studentid AND accid = '".$_GET["accid"]."'";
    $objQuery66 = mysqli_query($con_ajtongmath_self,$strSQL66);
    $objResult66 = mysqli_fetch_array($objQuery66);
            ?>
            
            
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">ชื่อ    : <?=$objResult66["name"]; ?></FONT></CENTER>
                            </DIV>
                             <?
                             $o=1;
                            
                           $strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
                $objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
                while ($objResult1 = mysqli_fetch_array($objQuery1)) {
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
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">สถานที่เรียน  : 
                                <?php
                                 $sql_branch = "SELECT *
                                                  FROM
                                                  account
                                                  LEFT JOIN branch ON branch.branchid = account.`status`
                                                  WHERE account.accid = '".$_GET["accid"]."'";
                                              
                                $objQuery_branch = mysqli_query($con_ajtongmath_self,$sql_branch);
                                while ($objResult_branch = mysqli_fetch_array($objQuery_branch)) {
                                    if($objResult66["status"] == $objResult_branch['branchid']){
                                        echo $objResult_branch['name'];
                                    }if($objResult66["status"] == 111) { echo "พญาไท"; }

                                }
                                

                                  
                                  ?>

                                <? /*if($objResult66["status"]==1){ ?>เรียนได้ทุกสาขา<? } else if($objResult66["status"]==2) { ?> วงเวียนใหญ่ <? } else if($objResult66["status"]==3) { ?>วิสุทธานี<? }else if($objResult66["status"]==4) { ?>พญาไท ชั้น9<? }else if($objResult66["status"]==6) { ?>สระบุรี<? }  else if($objResult66["status"]==7) { ?>ชลบุรี<? }  else if($objResult66["status"]==111) { ?>พญาไท<? }  */?></FONT></CENTER>
                            </DIV>


                            <DIV STYLE="position:absolute; top:100px; left:150px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">Username : <?=$objResult66["username"];?></FONT></CENTER>
                            </DIV>
                            <DIV STYLE="position:absolute; top:115px; left:150px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">Password  : <?=$objResult66["password"] ?></FONT></CENTER>
                            </DIV>
                            <DIV STYLE="position:absolute; top:125px; left:105px;">
                            <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">จองเวลาเรียน www.aj-tongmath.com</FONT></CENTER>
                            </DIV>
                            
          



         <div id="non-printable"> 
            <A HREF="javascript:window.print()"> <button style="margin-left:200px; width:200px; font-size:20px; height:80px;" >PRINT</button> </A>
            <a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET["std"]?>" style="text-decoration:none"><< กลับ</a>
           
            </div> 
        <? mysqli_close($con_ajtongmath_self);?>
    </body>
</html>