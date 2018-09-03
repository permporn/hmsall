<!--self-->
<link type="text/css" href="../menutest/menu.css" rel="stylesheet" />
<!--<script type="text/javascript" src="../menutest/jquery.js"></script>-->
<script type="text/javascript" src="../menutest/menu.js"></script>
<script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 500
      },
      hide: {
        effect: "explode",
        duration: 200
      },
    width: 500
    });
  
    $( "#opener" ).click(function() {
    $('#idcard_textbox').val('');
      $( "#dialog" ).dialog( "open" );
    });
  });
  
  $(document).keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    var id_card = $('#idcard_textbox').val();
    if(keycode == '13'){
      window.location.href = '../HMS_CardDetail.php'+'?id_card='+id_card;
    }
  });
</script>
<div id="header"> <a href="#"><img src="../images/logo01.png" alt="" class="logo"/><img src="../images/header.jpg" alt="" class="logo"/></a>
    <ul id="toplinks">
      <li><font style="font-size:14px"><img src="../images/Yellow tag.png"/> Status: <?=$objResultSTT["status"];?>
    <li><font style="font-size:14px"><img src="../images/user.png"/> Welcome: 
    <?
      if($_SESSION["db"] == "school"){echo $objResultSTT["name"];}
      if($_SESSION["db"] == "selfdb"){echo $objResultSTT["stname"];}
    ?></font></li>
      <br />
      <li><font style="font-size:14px" ><a href="../logout.php">ออกจากระบบ</a></font></li>
    </ul>
    </ul>
  </div>

<div id="menu">
    <ul class="menu">
      <li><a href="../index.php"><span>หน้าแรก</span></a>
          <div><ul>
            <li><a href="../even.php"><span>แจ้งข่าวสาร</span></a></li>
            </ul></div>
        </li>
          <? if(($objResultSTT["status"] == "user" || $objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") &&  $objResultSTT["status"] != "teacher"){?>
          <li><a href="#" class="parent"><span>สด และ DVD</span></a>
              <div><ul>
          <? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
                    <li><a href="#" class="parent"><span>Import Excel</span></a>
                        <div><ul>
                            <li><a href="../testImportExcel/upload.php?type=addstu"><span>ดึงไฟล์ธนาคาร</span></a></li>
                            <li><a href="../testImportExcel/upload.php?type=addsubj"><span>ดึงไฟล์วิชาเรียน</span></a></li>
                            <li><a href="../testImportExcel/upload.php?type=addCardHMS"><span>ดึงไฟล์รายชื่อบัตร HMS</span></a></li>
                        </ul></div>
                    </li>
                  <? } ?>
                    <li><a href="../home.php" class="parent"><span>ทะเบียนนักเรียน</span></a>
                        <div><ul>
                            <li><a href="../student_detail_search.php"><span>ค้นหารายชื่อ</span></a></li>
                            <li><a href="../home.php"><span>ทะเบียนนักเรียน</span></a></li>
                         </ul></div>
                    </li>
                    <li><a href="../exam.php"><span>คะแนนสอบ</span></a></li>
                    <li><a href="#" class="parent"><span>จัดการข้อมูล</span></a>
                        <div><ul>
                            <li><a href="../subject.php"><span>จัดการข้อมูลวิชา</span></a></li>
                            <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["mapid"]=="29" || $objResultSTT["mapid"]=="51") {?>
                             <li><a href="../coursemanage_real_subject.php"><span>จัดการวิชาเรียนจริง</span></a></li>
                             <? }?>
                        </ul></div>
                    </li>
      <? if($objResultSTT["mapid"]=="28" || $objResultSTT["mapid"]=="133"  || $objResultSTT["mapid"]=="117" || $objResultSTT["accid"]=="134") {?>
                    <li><a href="#" class="parent"><span>สรุปยอด</span></a>
                        <div><ul>
                            <li><a href="../price.php"><span>ยอดแต่ละสาขา</span></a></li>
                            <!--<li><a href="../results_request.php"><span>ยอดใบคำร้อง</span></a></li>-->
                        </ul></div>
                    </li>
                  <? } ?>
              </ul></div>
          </li>
          <? }?>
            <li><? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" or $objResultSTT["mapid"]=="59" or $objResultSTT["mapid"]=="10" or $objResultSTT["mapid"]=="14" or $objResultSTT["mapid"]=="23" or $objResultSTT["mapid"]=="29" || $objResultSTT["status"] == "admin_hms") {?>
                  <a href="../endorsee_home.php" ><span>ใบคำร้อง</span></a>
                    <div><ul>
                           <li><a href="../results_request.php"><span>ยอดใบคำร้อง</span></a></li>
                    </ul></div>
                  <? }else{
                      if( $objResultSTT["status"] == "user" || $objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["status"]=="manager_franchise" || $objResultSTT["status"]=="user_franchise"){?>
                    <a href="../user_home.php"><span>ใบคำร้อง</span></a>
                  <? }} ?>
             </li>
          <? if($objResultSTT["status"] != "teacher"){?>
          <li><a href="searchstudent.php" class="parent"><span>SELF</span></a>
              <div><ul>
                    <li><a href="searchstudent.php" class="parent"><span>ทะเบียนนักเรียน</span></a>
                        <div><ul>
                            <li><a href="searchstudent.php"><span>ค้นหาข้อมูลนักเรียน</span></a></li>
                            <!--<li><a href="addstudent.php"><span>เพิ่มนักเรียนใหม่</span></a></li>-->
                            <? 
                            if( $objResultSTT["status"]!="pre_end"){
                            if( $objResultSTT["status"]=="manager_franchise" || $objResultSTT["status"]=="user_franchise"){?>
                              <li><a href="manageaccount_franchise.php" ><span>เพิ่ม account</span></a></li>
                            <? }else{?>
                              <li><a href="manageaccount.php"><span>เพิ่ม account</span></a></li>
                            <? }}?>
                            <? //if( $objResultSTT["status"]!="manager_franchise" && $objResultSTT["status"]!="user_franchise"){?>
                            <li><a href="shirt_search.php"><span>รับเสื้อนักเรียน</span></a></li>
                            <li><a href="book_search.php"><span>รับหนังสือ</span></a></li>
                            <? //} ?>
                            <li><a href="credit_time_search.php"><span>ขยายเวลา/เพิ่มเครดิต(free)</span></a></li>
                            <li><a href="credit_time_search2.php"><span>ขยายเวลา/เพิ่มเครดิต(คิดค่าบริการ)</span></a></li>
                            <? if( $objResultSTT["status"]!="manager_franchise" && $objResultSTT["status"]!="user_franchise"){?>
                            <li><a href="exp.php"><span>ทดลองเรียน S.E.L.F</span></a></li>
                            <? }else{?>
                             <li><a href="exp_franchise.php"><span>ทดลองเรียน S.E.L.F</span></a></li>
                            <? }?>
                            <li><a href="trial.php"><span>ชดเชยระบบ S.E.L.F</span></a></li>
                        </ul></div>
                    </li>
                  <li>
                  <? if( $objResultSTT["status"]=="manager_franchise" || $objResultSTT["status"]=="user_franchise" || $objResultSTT["status"]=="pre_end"){?>
                    <a href="course_franchise.php" class="parent"><span>วิชาเรียน</span></a>
                  <? }else{?>
                    <a href="coursemanage.php" class="parent"><span>วิชาเรียน</span></a>
                  <? }?>
                  <? if($objResultSTT["status"] != "manager_franchise" && $objResultSTT["status"] !="user_franchise" && $objResultSTT["status"] != "pre_end"){?>
                        <div><ul>
                            <li><a href="coursemanage.php"><span>จัดการวิชาเรียน</span></a></li>
                             <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["mapid"]=="29" || $objResultSTT["mapid"]=="51" || $objResultSTT["status"] == "admin_hms" && ($objResultSTT["status"] != "manager_franchise" && $objResultSTT["status"] !="user_franchise" && $objResultSTT["status"] !="pre_end")) {?>
                             <li><a href="coursemanage_real_subject.php"><span>จัดการวิชาเรียนจริง</span></a></li>
                             <? }?>
                        </ul>
                        </div>
                    <? }?>
                    </li>
                   <li><a href="#" class="parent"><span>คะแนนสอบ</span></a>
                        <div><ul>
                            <li><a href="addscore.php"><span>คะแนนตามรายวิชา</span></a></li>
                            <li><a href="studentaddscore.php"><span>คะแนนตามรายชื่อ</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="#" class="parent"><span>ที่นั่งself</span></a>
                        <div><ul>
                            <li><a href="viewseat.php"><span>ดูจำนวนที่นั่ง</span></a></li>
                            <li><a href="seat.php"><span>จองเวลา</span></a></li>
                            <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["status"]=="manager_franchise" || $objResultSTT["status"]=="user_franchise" || $objResultSTT["status"]=="pre_end"){?>
                            <li><a href="" class="parent"><span>จัดการจำนวนที่นั่ง</span></a>
                              <div><ul>
                                 <li><a href="seat/seat_add.php"><span>เพิ่มที่นั่ง</span></a></li>
                                 <li><a href="seat/seat_edit.php"><span>แก้ไข บวก-ลบ ที่นั่ง </span></a></li>
                                 <li><a href="seat/seat_delsecion.php"><span>ลบช่วงเวลา</span></a></li>
                                </ul></div>
                            </li>
                            <? }?>
                        </ul></div>
                    </li>
          <? if($objResultSTT["mapid"]=="28" || $objResultSTT["mapid"]=="133"  || $objResultSTT["mapid"]=="117" || $objResultSTT["accid"]=="134") {?>
                    <li><a href="#" class="parent"><span>สรุปยอด</span></a>
                        <div><ul>
                            <li><a href="results_account.php"><span>ยอด account self</span></a></li>
                        </ul></div>
                    </li>
                  <? }?>
                   <? if( $objResultSTT["status"]=="pre_end"){
                   if( $objResultSTT["status"] == "user" || $objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"){?>
                     <li><a href="manageaccount_day.php" class=""><span>self after school </span></a></li>
                     <? }?>
                     <? if( $objResultSTT["status"] == "manager_franchise" || $objResultSTT["status"]=="admin_hms"||$objResultSTT["status"]=="user_franchise"){?>
                     <li><a href="manageaccount_day_franchise.php" class=""><span>self after school </span></a></li>
                     <? }}?>
                      <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["mapid"]=="23") {?>
                     <li><a href="manageaccount_tutorfree.php" class=""><span>ติวฟรีแถม SELF and APP</span></a></li>
                     <? }?>
              </ul></div>
          </li>
            <? if( $objResultSTT["status"] == "user" || $objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"){?>
            <li><a href="../HMScardscan.php"><span>HMS CARD</span></a>
                <div><ul>
                <li><a><div id="opener"><span><strong>HMS CARD สแกน</strong></span></div></a></li>
                <li><a href="../HMS_student.php"><span>ค้นหาชื่อสมาชิกบัตร</span></a></li>
                <li><a href="../HMS_regiscard.php"><span>สมัครบัตรHMS</span></a></li>
                <? //if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
                <li><a href="../HMS_PrintCardAll.php"><span>รับบัตร/พิมพ์บัตรHMS</span></a></li>
                <? //} ?>
                </ul></div>
          </li>
            <? }?>
             <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"  || $objResultSTT["status"]=="manager_franchise" || $objResultSTT["status"] == "admin_hms"|| $objResultSTT["status"]=="user_franchise" ||  $objResultSTT["status"]=="pre_end") {?>
             <li><a href="../Manag_account_personnel.php"><span>จัดการ account</span></a></li>
             <li><a href="information_branch.php"><span>จัดการข้อมูลสาขา</span></a></li>
             <? } ?>
            <? if( $objResultSTT["status"] == "user" || $objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"){?>
<li><a href="../seat/index.php"  target="_blank"><span>ระบบจองที่นั่ง</span></a></li>
<? }?>
<? if($objResultSTT["status"]=="manager_franchise" || $objResultSTT["status"] == "admin_hms" ||  $objResultSTT["status"]=="pre_end") {?>
<li><a href="../report/index.php"  target="_blank"><span><img src="../images/icn_new.gif"/> สรุปยอด </span></a></li><? }} ?>

<? if($objResultSTT["mapid"]=="28" || $objResultSTT["mapid"]=="133" || $objResultSTT["mapid"]=="76" || $objResultSTT["mapid"]=="94" || $objResultSTT["mapid"]=="99"  || $objResultSTT["mapid"]=="117" || $objResultSTT["accid"]=="134" || $objResultSTT["status"] == "teacher" || $objResultSTT["accid"]=="55") {?>
<li><a href="../report/index.php"  target="_blank"><span> สรุปยอด </span></a></li><? } ?>
<? if(($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["status"]=="manager_franchise" || $objResultSTT["status"] == "admin_hms" || $objResultSTT["status"]=="user_franchise" || $objResultSTT["status"]=="pre_end") && $objResultSTT["status"] != "teacher"){?>

<li><a href="../bill/index.php" target="_blank"><span><img src="../images/icn_new.gif"/> แจ้งชำระเงิน </span></a></li>
<? }if($objResultSTT["status"] != "teacher"){?>

<li><a href="../book_store/index.php"  target="_blank"><span> BOOK STORE </span></a></li>
<? }?>
</ul>
        
</div>
<br /><br /><br /><br />


<!-- รูปให้สแกน -->
<!--<div id="dialog" title="สแกนบัตร" align="center"><img src="../images/taaaa.png" width="400"/>
  <input id="idcard_textbox" type="text" size="40" />
</div>-->
<div id="copyright"><!--Copyright &copy; 2014--> <a href="http://apycom.com/"><!--Apycom jQuery Menus--></a></div>
<?php mysql_close();?>