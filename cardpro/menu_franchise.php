<!--สด & DVD-->
<link type="text/css" href="menutest/menu.css" rel="stylesheet" />
<script type="text/javascript" src="menutest/menu.js"></script>
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
          window.location.href = 'HMS_CardDetail.php'+'?id_card='+id_card;
      }
  });
</script>
<div id="header"> <a href="#"><img src="images/logo01.png" alt="" class="logo"/><img src="images/header.jpg" alt="" class="logo"/></a>
    <ul id="toplinks">
      <li><font style="font-size:14px"><img src="images/Yellow tag.png"/> Status: <?=$objResultSTT["status"];?></font>
      <li><font style="font-size:14px"><img src="images/user.png"/> Welcome: $account_name
      <?
        if($_SESSION["db"] == "school"){echo $objResultSTT["name"];}
        else if($_SESSION["db"] == "selfdb"){echo $objResultSTT["stname"];}
      ?></font></li>
      <br />
      <li><font style="font-size:14px" ><a href="logout.php">ออกจากระบบ</a></font></li>
    </ul>
    </ul>
  </div>

<div id="menu">
    <ul class="menu">
        <li><a href="index.php"><span>หน้าแรก</span></a>
            <div><ul>
            <li><a href="even.php"><span>แจ้งข่าวสาร</span></a></li>
            </ul></div>
        </li>
            
        <li>
          <a href="user_home.php"><span>ใบคำร้อง</span></a>
        </li>
            
            <li><a href="self/searchstudent.php" class="parent"><span>SELF</span></a>
                <div><ul>
                    <li><a href="self/searchstudent.php" class="parent"><span>ทะเบียนนักเรียน</span></a>
                        <div><ul>
                            <li><a href="self/searchstudent.php"><span>ค้นหาข้อมูลนักเรียน</span></a></li>
                            <!--<li><a href="self/addstudent.php"><span>เพิ่มนักเรียนใหม่</span></a></li>-->
                            <li><a href="self/manageaccount.php"><span>เพิ่ม account</span></a></li>
                            <li><a href="self/shirt_search.php"><span>รับเสื้อนักเรียน</span></a></li>
                            <li><a href="self/book_search.php"><span>รับหนังสือ</span></a></li>
                            <li><a href="self/credit_time_search.php"><span>ขยายเวลา/เพิ่มเครดิต(free)</span></a></li>
                            <li><a href="self/credit_time_search2.php"><span>ขยายเวลา/เพิ่มเครดิต(คิดค่าบริการ)</span></a></li>
                            <li><a href="self/exp.php"><span>ทดลองเรียน S.E.L.F</span></a></li>
                            <li><a href="self/trial.php"><span>ชดเชยระบบ S.E.L.F</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="self/coursemanage.php" class="parent"><span>วิชาเรียน</span></a></li>
                    <li><a href="#" class="parent"><span>คะแนนสอบ</span></a>
                        <div><ul>
                             <li><a href="self/addscore.php"><span>คะแนนตามรายวิชา</span></a></li>
                            <li><a href="self/studentaddscore.php"><span>คะแนนตามรายชื่อ</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="#" class="parent"><span>ที่นั่งself</span></a>
                        <div><ul>
                            <li><a href="self/viewseat.php"><span>ดูจำนวนที่นั่ง</span></a></li>
                            <li><a href="self/seat.php"><span>จองเวลา</span></a></li>
                            <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"){?>
                            <li><a href="" class="parent"><span>จัดการจำนวนที่นั่ง</span></a>
                                <div><ul>
                                 <li><a href="self/seat/seat_add.php"><span>เพิ่มที่นั่ง</span></a></li>
                                 <li><a href="self/seat/seat_edit.php"><span>แก้ไข บวก-ลบ ที่นั่ง </span></a></li>
                                 <li><a href="self/seat/seat_delsecion.php"><span>ลบช่วงเวลา</span></a></li>
                                </ul></div>
                            </li>
                            <? }?>
                        </ul></div>
                    </li>
                </ul></div>
            </li>
            <li><a href="Manag_account_personnel.php"><span>จัดการ account พนักงาน</span></a></li>
            <li><a href="report/index.php"><span>สรุปยอดสาขา</span></a></li>
            <li><a href="book_store/index.php"><span>BOOK STORE</span></a></li>
      </ul>
        
</div>
<br /><br /><br /><br />


<div id="copyright"><!--Copyright &copy; 2014--> <a href="http://apycom.com/"><!--Apycom jQuery Menus--></a></div>
<!--<div id="dialog" title="สแกนบัตร" align="center">
    <img src="images/taaaa.png" width="400"/>
    <input id="idcard_textbox" type="text" size="40" />
</div>-->