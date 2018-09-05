<? 
ob_start();
session_start();
include("ck_session_self.php");

function DateThai($strDate){
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
    <style type="text/css"> 

        #printable { display: block; }
        
        @media print 
        { 
             #non-printable { display: none; } 
             #printable { display: block; } 
        } 

</style> 
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
            $top = 10;  //หน้าเริ่มบน  original 100
            $left = 530; //500หน้าเริ่มซ้าย
            $crow = 0;
            $ccol = 1;
            $i = 1; //นับจำนวนบัตร
            $j = 0; //นับ column
            $temp = 50; //เก็บจำวนความสูงชั่วคราว
            $k = 2;
            $strSQL66 = "SELECT * FROM account JOIN student ON account.studentid = student.studentid AND accid = '".$_GET["accid"]."'";
    $objQuery66 = mysqli_query($con_ajtongmath_self,$strSQL66);
    $objResult66 = mysqli_fetch_array($objQuery66);
            ?>
            
            <div id="printable"> 
                            <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">ชื่อ    : <?=$objResult66["name"]; ?></FONT></CENTER>
                            </DIV>
                             <?
                             $o=1;
                            
                //$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
                $strSQL1 =  "SELECT subject_real.name_subject_real,  `subject`.subname
                            FROM credit
                            LEFT JOIN  `subject` ON  `subject`.subid = credit.subid
                            LEFT JOIN subject_real ON subject.id_subject_real = subject_real.id_subject_real
                            WHERE credit.accid = '".$_GET["accid"]."'";
                $objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
                while ($objResult1 = mysqli_fetch_array($objQuery1)) {
                    if($objResult1['name_subject_real'] ==''){
                        $subject = $objResult1['subname'];
                    }else{
                        $subject = $objResult1['name_subject_real'];
                    }
                    $top = $top + 16;
                if($o==1){
                    
    ?>
    <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">วิชาเรียน  : <?=$subject ?></FONT></CENTER>
                            </DIV>
                            <?
                }
                else
                {
                            ?>
                             <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$subject?></FONT></CENTER>
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
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">
                                สถานที่เรียน  : 
                                <?php
                                  $sql_branch = "SELECT branch.`name`
                                                  FROM
                                                  account
                                                  LEFT JOIN branch ON branch.branchid = account.`status`
                                                  WHERE account.accid = '".$_GET["accid"]."'";
                                              
                                  $objQuery_branch = mysqli_query($con_ajtongmath_self,$sql_branch);
                                  $objResult_branch = mysqli_fetch_array($objQuery_branch);
                                  echo $objResult_branch['name'];
                                  ?>
                                    
                            </FONT></CENTER>
                            </DIV>
                            <DIV STYLE="position:absolute; top:100px; left:140px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">จองเวลาเรียน www.aj-tongmath.com</FONT></CENTER>
                            </DIV>
                            <DIV STYLE="position:absolute; top:115px; left:150px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">Username  : <?=$objResult66["username"] ?></FONT></CENTER>
                            </DIV>
                            <DIV STYLE="position:absolute; top:125px; left:150px;">
                                <LEFT><FONT face="TH Niramit AS" SIZE="3.0" COLOR="000000">Password  : <?=$objResult66["password"] ?></FONT></CENTER>
                            </DIV>
                          </DIV>  

<div id="non-printable"> 
    <A HREF="javascript:window.print()"> <button style="margin-left:200px; width:200px; font-size:20px; height:80px;" >PRINT</button> </A>
    <a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET["std"]?>" style="text-decoration:none"><< กลับ</a>
</div> 
<? mysqli_close($con_ajtongmath_self);?>
</DIV>
</body>
</html>