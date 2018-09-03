<?php 
include('config/config_db.php'); 
session_start();
include("ck_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ajtong</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php //include('config/config_lib.php');?>
    
    
</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <?php include('navigation.php');?>

    <input id="id_couses" name="id_couses" type="hidden" value="<?=$_GET['id_subject']?>">
            
    <?php include('query_01.php');?>

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <!--<a class="btn btn-default page-scroll" href="#about">Click Me to Scroll Down!</a>-->
        <div class="container">

            <!-- header -->
             <?php include('header.php');?>

            <!-- /.row -->
            
            <!-- button seat -->
            <div class="row">
            <?php 
            function DateThai($strDate)
                {
                    $strYear = date("Y",strtotime($strDate))+543;
                    $strMonth= date("n",strtotime($strDate));
                    $strDay= date("j",strtotime($strDate));
                    $strHour= date("H",strtotime($strDate));
                    $strMinute= date("i",strtotime($strDate));
                    $strSeconds= date("s",strtotime($strDate));
                    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                    $strMonthThai=$strMonthCut[$strMonth];
                    return "$strDay $strMonthThai $strYear";
                }
                
            function DateThaiDMY($strDate)
                {
                    $strYear = date("Y",strtotime($strDate))+543;
                    $strMonth= date("n",strtotime($strDate));
                    $strDay= date("j",strtotime($strDate));
                    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                    $strMonthThai=$strMonthCut[$strMonth];
                    return "$strDay $strMonthThai $strYear";
                }

            function DateDiff($strDate1,$strDate2)
                {
                    return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
                } 

            $id_subject = $_GET['id_subject'];
            $studentid = $_GET['studentid'];
            $subject_code = $_GET['subject_code'];
            
            if($id_subject !='' && $studentid !='' && $subject_code !='' ){

                $strSQL = "SELECT
                                seat_log.seat_no AS seat_no,
                                seat_log.subject_id AS subject_id,
                                seat_log.`status` AS seat_staus,
                                seat_log.`update` AS seat_time,
                                `subject`.subcode AS subject_code,
                                student.studentname AS student_name,
                                `subject`.subname AS subject_name,
                                `subject`.price AS subject_price,
                                `subject`.`day` AS subject_day,
                                `subject`.time AS subject_time,
                                `subject`.date AS subject_date,
                                `subject`.edate AS subject_end_date,
                                `subject`.type AS subject_type,
                                student.tel AS student_phone,
                                student.studentid As student_id,
                                `subject`.roomid AS room_id,
                                teacher.teachername AS subject_teacher,
                                room.roomname AS room_name,
                                `year`.nameyear AS subject_year,
                                term.term AS subject_term,
                                learn.regisdate AS date_regis,
                                learn.learnid AS id_regis,
                                learn.seat AS num_seat,
                                learn.pass AS pass,
                                learn.id_staff AS id_staff,
                                learn.type_price AS type_price,
                                account.name AS name_staff,
                                learn.pricek AS pricek
                            FROM
                                seat_log
                            LEFT JOIN `subject` ON `subject`.subid = seat_log.subject_id
                            LEFT JOIN learn ON `subject`.subcode = learn.subcode
                            AND learn.seat = seat_log.seat_no
                            LEFT JOIN student ON student.studentid = learn.studentid
                            LEFT JOIN teacher ON teacher.teacherid = `subject`.teachid
                            LEFT JOIN room ON room.roomid = `subject`.roomid
                            RIGHT JOIN addterm ON addterm.id_year = `subject`.id_year
                            LEFT JOIN `year` ON `year`.id = addterm.year_id
                            LEFT JOIN term ON term.termid = addterm.termid
                            LEFT JOIN account ON account.accid = learn.id_staff
                            WHERE
                            `subject`.subid = ".$id_subject." AND student.studentid = ".$studentid;

            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
            $objResult = mysql_fetch_array($objQuery);
        }
            ?>
        <input type="hidden" name="subject_id" id="subject_id" value="<?=$objResult['subject_id']?>">
        <input type="hidden" name="subject_name" id="subject_name" value="<?=$objResult['subject_name']?>">
    
                <div class="col-md-12 thumbnail" style="margin:2px">
                <center>
                <button id="print" name="print" class="btn btn-info" >print</button>
                <button id="close_print" name="close_print" class="btn btn-default" >close</button>
                </center>
                
                <div align="center" style="background-color:#FAFAFA;" id="mydiv">
                    <div class="thumbnail">
                    <table width="100%" cellpadding="0" cellspacing="1" style="margin-top:20px; padding:10px">
                       <tr>
                            <td align="left">
                                <strong><font size="-2">โรงเรียนกวดวิชาคณิตศาสตร์ อ.โต้ง
                                <br>High Solution Math School</font></strong>
                                <font size="-2"><br>34 อาคาร C.P TOWER3 ตึกA
                                <br>ถนนพญาไท เขตราชเทวี แขวงทุ่งพญาไท
                                <br>กรุงเทพมหานคร 10400</font>
                            </td>
                            <td>
                                <table>
                                <tr>
                                <td align="center"><img src="images/logo01.png" width="67" height="67"/> </td>
                                </tr>
                                <tr>
                                <td><strong>ใบเสร็จชำระเงิน</strong>
                               <strong>RECEIPT</strong></td>
                                </tr> 
                                </table>                           
                            </td>
                            <td align="center">
                                <table cellpadding="0" cellspacing="1" width="75%" align="right" border="1" >
                                    <tr><td align="left" class="tblyy12" bgcolor="#00FFFF"> &nbsp;สำหรับ ลูกค้า</td></tr>
                                    <tr><td align="left" class="tblyy12"> &nbsp;เลขที่ No.<?=$objResult['id_regis'];?></td></tr>
                                    <tr><td align="left" class="tblyy13"> &nbsp;วันที่ Date. <?=DateThaiDMY($objResult['date_regis']);?></td></tr>
                                </table>
                            </td>
                        </tr>                       
                        <tr><td colspan="3"> <br> </td></tr>
                        <tr>
                            <td colspan="3" align="left" class="tblyy13">ชื่อ - นามสกุล : <?=$objResult['student_name'];?></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" class="tblyy13">รหัสนักเรียน : <?=$objResult['student_id'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" class="tblyy13">เบอร์โทร : <?=$objResult['student_phone'] ?></td>
                        </tr>
                        <!-- <tr>
                            <td colspan="3" align="left" class="tblyy13">ที่นั่ง : <?=$objResult['room_name'];?> - <?=$objResult['num_seat'];?></td>
                        </tr> -->
                        <tr><td colspan="3"> <br> </td></tr>
                        <tr>
                            <td colspan="3" align="center">
                                <table  width="100%" align="center" border="1">
                                    <tr>
                                        <td align="center" class="tblyy14" height="20">รายการ</td>
                                        <td align="center" class="tblyy14">จำนวนเ</td>
                                        <td align="center" class="tblyy14">ราคาต่อหน่วย</td>
                                        <td align="center" class="tblyy14">รวมทั้งสิ้น</td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="tblyy14" height="20"> &nbsp;&nbsp;<?=$objResult['subject_code'];?> <?=$objResult['subject_name'];?></td>
                                        <td align="center" class="tblyy14" height="20">1</td>
                                        <td align="center" class="tblyy14"><?=number_format($objResult['pricek']);?> บาท</td>
                                        <td align="center" class="tblyy14"><?=number_format($objResult['pricek']);?> บาท</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td colspan="3" align="left" class="tblyy13"><br>หมายเหตุ : กรุณาเก็บใบเสร็จไว้เป็นหลักฐาน และตรวจสอบความถูกต้องของรายการในเอกสารฉบับนี้ มิฉะนั้นขะถือว่าสมบูรณ์</td></tr>
                        <tr>
                            <td colspan="3" align="left" class="tblyy13">ชำระโดย :
                            <?  if($objResult["type_price"] == "1"){ echo "เงินสด";}
                                if($objResult["type_price"] == "2"){ echo "บัตรเคดิต";}
                                if($objResult["type_price"] == "0"){ echo "โอน";}  ?>
                           <!--  <label class="radio-inline"><input type="checkbox"> เงินสด</label>
                            <label class="radio-inline"><input type="checkbox"> บัตรเคดิต</label>
                            <label class="radio-inline"><input type="checkbox"> โอน</label> -->
                                
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" class="tblyy13">ผู้รับเงิน : เจ้าหน้าที่่ <?=$objResult['name_staff'];?> ____________________________( ลงชื่อ )</td>
                        </tr>                        
                    </table>
                    </div>
                    ------------------------------------------------------------------------------------------------------------------------------
                    <div class="thumbnail">
                    <table width="100%" cellpadding="0" cellspacing="1" style="margin-top:20px; padding:10px" ">
                        <tr>
                        <td> ชื่อ : </td>
                        <td> <?=$objResult['student_name'];?></td>
                        </tr>
                        <tr>
                        <td> วิชา : </td>
                        <td> <?=$objResult['subject_code'];?> <?=$objResult['subject_name'];?></td>
                        </tr>
                        <!-- 
                        <tr>
                        <td> เลขที่นั่ง : </td>
                        <td> <?=$objResult['room_name'];?> - <?=$objResult['num_seat'];?></td>
                        </tr> -->
                        <tr>
                        <td> เวลาเรียน : </td>
                        <td> <?=$objResult['subject_day'];?> <?=$objResult['subject_date'];?>( <?=$objResult['subject_time'];?>)</td>
                        </tr>
                        <tr>
                        <td> เลขประจำตัวนักเรียน (Username) : </td>
                        <td> <?=$objResult['student_id'];?></td>
                        </tr>
                        <tr>
                        <td> รหัสผ่าน (Password): </td>
                        <td> <?=$objResult['pass'];?></td>
                        </tr>
                    </table>
                    </div>
                    ------------------------------------------------------------------------------------------------------------------------------
                    <div class="thumbnail">
                    <table width="100%" cellpadding="0" cellspacing="1" style="margin-top:20px; padding:10px">
                       <tr>
                            <td align="left">
                                <strong><font size="-2">โรงเรียนกวดวิชาคณิตศาสตร์ อ.โต้ง
                                <br>High Solution Math School</font></strong>
                                <font size="-2"><br>34 อาคาร C.P TOWER3 ตึกA
                                <br>ถนนพญาไท เขตราชเทวี แขวงทุ่งพญาไท
                                <br>กรุงเทพมหานคร 10400</font>
                            </td>
                            <td>
                                <table>
                                <tr>
                                <td align="center"><img src="images/logo01.png" width="67" height="67"/> </td>
                                </tr>
                                <tr>
                                <td><strong>ใบเสร็จชำระเงิน</strong>
                               <strong>RECEIPT</strong></td>
                                </tr> 
                                </table>                           
                            </td>
                            <td align="center">
                                <table cellpadding="0" cellspacing="1" width="75%" align="right" border="1" >
                                    <tr><td align="left" class="tblyy12" bgcolor="#00FFFF"> &nbsp;สำหรับ เจ้าหน้าที่</td></tr>
                                    <tr><td align="left" class="tblyy12"> &nbsp;เลขที่ No.<?=$objResult['id_regis'];?></td></tr>
                                    <tr><td align="left" class="tblyy13"> &nbsp;วันที่ Date. <?=DateThaiDMY($objResult['date_regis']);?></td></tr>
                                </table>
                            </td>
                        </tr>                       
                        <tr><td colspan="3"> <br> </td></tr>
                        <tr>
                            <td colspan="3" align="left" class="tblyy13">ชื่อ - นามสกุล : <?=$objResult['student_name'];?></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" class="tblyy13">รหัสนักเรียน : <?=$objResult['student_id'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" class="tblyy13">เบอร์โทร : <?=$objResult['student_phone'] ?></td>
                        </tr>
                        <!-- <tr>
                            <td colspan="3" align="left" class="tblyy13">ที่นั่ง : <?=$objResult['room_name'];?> - <?=$objResult['num_seat'];?></td>
                        </tr> -->
                        <tr><td colspan="3"> <br> </td></tr>
                        <tr>
                            <td colspan="3" align="center">
                                <table  width="100%" align="center" border="1">
                                    <tr>
                                        <td align="center" class="tblyy14" height="20">รายการ</td>
                                        <td align="center" class="tblyy14">จำนวน</td>
                                        <td align="center" class="tblyy14">ราคาต่อหน่วย</td>
                                        <td align="center" class="tblyy14">รวมทั้งสิ้น</td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="tblyy14" height="20"> &nbsp;&nbsp;<?=$objResult['subject_code'];?> <?=$objResult['subject_name'];?></td>
                                        <td align="center" class="tblyy14" height="20">1</td>
                                        <td align="center" class="tblyy14"><?=number_format($objResult['pricek']);?> บาท</td>
                                        <td align="center" class="tblyy14"><?=number_format($objResult['pricek']);?> บาท</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td colspan="3" align="left" class="tblyy13"><br>หมายเหตุ : กรุณาเก็บใบเสร็จไว้เป็นหลักฐาน และตรวจสอบความถูกต้องของรายการในเอกสารฉบับนี้ มิฉะนั้นขะถือว่าสมบูรณ์</td></tr>
                        <tr>
                            <td colspan="3" align="left" class="tblyy13">ชำระโดย :
                            <?  if($objResult["type_price"] == "1"){ echo "เงินสด";}
                                if($objResult["type_price"] == "2"){ echo "บัตรเคดิต";}
                                if($objResult["type_price"] == "0"){ echo "โอน";}  ?>
                           <!--  <label class="radio-inline"><input type="checkbox"> เงินสด</label>
                            <label class="radio-inline"><input type="checkbox"> บัตรเคดิต</label>
                            <label class="radio-inline"><input type="checkbox"> โอน</label> -->
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" class="tblyy13">ผู้รับเงิน : เจ้าหน้าที่่ <?=$objResult['name_staff'];?>  ____________________________( ลงชื่อ )</td>
                        </tr>                        
                    </table>
                    </div>
                </div>
                </div>
                
                </div>
                
            </div>
            <!-- /.row -->
        </div>       
    </section>    

    <!-- jQuery -->
    <script src="js/jquery.js"></script> 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>
    <!-- <script src="js/jquery.dataTables.min.js"></script>-->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap3-typeahead.min.js"></script>

</body>

</html>
