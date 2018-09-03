<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"   
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>jquery ui autocomplete</title>  
<style type="text/css">  
body {  
    font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;  
    font-size:12px;  
}  
</style>  
<?php  
$jquery_ui_v="1.8.5";  
$theme=array(  
    "0"=>"base",  
    "1"=>"black-tie",  
    "2"=>"blitzer",  
    "3"=>"cupertino",  
    "4"=>"dark-hive",  
    "5"=>"dot-luv",  
    "6"=>"eggplant",  
    "7"=>"excite-bike",  
    "8"=>"flick",  
    "9"=>"hot-sneaks",  
    "10"=>"humanity",  
    "11"=>"le-frog",  
    "12"=>"mint-choc",  
    "13"=>"overcast",  
    "14"=>"pepper-grinder",  
    "15"=>"redmond",  
    "16"=>"smoothness",  
    "17"=>"south-street",  
    "18"=>"start",  
    "19"=>"sunny",  
    "20"=>"swanky-purse",  
    "21"=>"trontastic",  
    "22"=>"ui-darkness",  
    "23"=>"ui-lightness",  
    "24"=>"vader"  
);  
$jquery_ui_theme=$theme[11];  
?>  
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/<?=$jquery_ui_v?>/themes/<?=$jquery_ui_theme?>/jquery-ui.css" />  
<style>  
/*   css ส่วนของรายการที่แสดง  */  
.ui-autocomplete {  
    max-height:200px;  
    overflow:auto;  
}  
.ui-button {  
    margin-left: -1px;  
}  
.ui-button-icon-only .ui-button-text {  
    padding: 0.35em;  
}  
/* css ส่วน textbox  */  
.ui-autocomplete-input {  
    font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;  
    font-size:12px;   
    height:18px;  
    width:200px;  
}  
.ui-menu,.ui-menu-item{  
  
}  
/*  css  ส่วนปุ่มคลิกเลือกแสดงรายการทั้งหมด*/  
.myselect{  
/*  border:0px solid;*/  
    width:20px;  
    height:25px;  
}  
</style>  
</head>  
  
<body>  
  
  
<form id="form1" name="form1" method="post" action="">  
  <label for="input_q">Tags: </label>  
<!-- ส่วนสำหรับแสดงค่ารายการที่เลือก   -->  
    <input name="input_q" id="input_q" size="50" />  
<!--    ส่วนสำหรับกำหนดค่า id ของรายการที่เลือก เพื่อไปใช้งาน-->  
    <input name="h_input_q" type="hidden" id="h_input_q" value="" />  
</form>  
  
<pre>  
<?php  
// ส่วนทดสอบแสดงค่า เมื่อกดปุ่มส่งข้อมูล   
if(count($_POST)>0){  
    print_r($_POST);      
}  
?>  
</pre>  
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>  
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>  
  
<script type="text/javascript">  
    $(function() {  
        $( "#input_q" ).autocomplete({ // ใช้งาน autocomplete กับ input text id=tags  
            minLength: 0, // กำหนดค่าสำหรับค้นหาอย่างน้อยเป็น 0 สำหรับใช้กับปุ่ใแสดงทั้งหมด  
            source: "gdata.php", // กำหนดให้ใช้ค่าจากการค้นหาในฐานข้อมูล  
            open:function(){ // เมื่อมีการแสดงรายการ autocomplete  
                var valInput=$(this).val(); // ดึงค่าจาก text box id=tags มาเก็บที่ตัวแปร  
                if(valInput!=""){ // ถ้าไม่ใช่ค่าว่าง  
                    $(".ui-menu-item a").each(function(){ // วนลูปเรียกดูค่าทั้งหมดใน รายการ autocomplete  
                        var matcher = new RegExp("("+valInput+")", "ig" ); // ตรวจสอบค่าที่ตรงกันในแต่ละรายการ กับคำค้นหา  
                        var s=$(this).text();  
                        var newText=s.replace(matcher, "<b>$1</b>");    //      แทนค่าที่ตรงกันเป็นตัวหนา  
                        $(this).html(newText); // แสดงรายการ autocomplete หลังจากปรับรูปแบบแล้ว  
                    });   
                }  
            },  
            select: function( event, ui ) {  
                // สำหรับทดสอบแสดงค่า เมื่อเลือกรายการ  
//              console.log( ui.item ?  
//                  "Selected: " + ui.item.label :  
//                  "Nothing selected, input was " + this.value);  
                $("#h_input_q").val(ui.item.id); // เก็บ id ไว้ใน hiden element ไว้นำค่าไปใช้งาน  
                $("#h_input_q").parent("form").submit(); // เมื่อเลือกรายการแล้วให้ส่งค่าฟอร์ม ทันที  
            }  
        });  
  
        // สร้างปุ่ม สำหรับคลิกแสดงรายการทั้งหมด  
        $( "<button>&nbsp;</button>" )  
            .attr( "tabIndex", -1 ) // กำหนด tabindex .ให้กับปุ่ม  
            .attr( "title", "Show All Items" ) // กำหนด title เมื่อเลื่อนเมาส์มาอยู่เหนือปุ่ม  
            .addClass("myselect") // ให้ปุ่มนี้มี class=myselect  
            .insertAfter("#input_q") // แทรกปุ่มนี้ต่อจาก input text id=tags  
            .button({ // กำหนด รูปแบบของปุ่ม  
                icons: {  
                    primary: "ui-icon-triangle-1-s"  
                },  
                text: false // กำหนดไม่แสดงข้อความใดๆ ในปุ่ม  
            })  
            .removeClass( "ui-corner-all" )  
            .addClass( "ui-corner-right ui-button-icon" )  
            .click(function() { // เงื่อนไขเมื่อคลิกที่ปุ่มนี้  
                // ตรวจสอบถ้ามีการแสดงรายการทั้งหมดอยู่แล้ว  
                if ($( "#input_q" ).autocomplete( "widget" ).is( ":visible" ) ) {  
                    $( "#input_q" ).autocomplete( "close" ); // ปิดการแสดงรายการทั้งหมด  
                    return;  
                }  
                // ส่งค่าว่างปล่าวไปทำการค้นหา จะได้ผลลัพธ์เป็นรายการทั้งหมด  
                $( "#input_q" ).autocomplete( "search", "" );  
                $( "#input_q" ).focus(); //ให้ cursor ไปอยู่ที่ input text id=tags  
            });  
  
  
    });  
</script>  
</body>  
</html>  