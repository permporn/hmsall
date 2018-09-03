<?php
Header("Content-type:image/gif");
$img=ImageCreate(80,24);   // ปรับขนาด *(ถ้าปรับก็ต้องปรับทั้งโค้ดเลยน่ะไม่งั้นภาพจะเพี้ยนๆไม่รู้ด้วยน่ะ)
$white=ImageColorAllocate($img,255,255,255); //พื้นหลัง
$x =ImageColorAllocate($img,145,145,145);  //สีเส้น
for($i=0;$i<4 ;$i++){
	ImageRectangle($img,1+20*$i,11,19+20*$i,19,$x);
}
$font = "tahoma.ttf";  //เปลี่ยนฟอนต์ตามใจได้เลยครับ :>
$text ='Password Strength';  //ข้อความ ถ้าเป็นภาษาไทยต้อง save ไฟล์เป็น  utf-8 น่ะ
$n=$_GET[num];  // รับค่าจำนวนระดับความยาก
switch($n){
	case 1:
		$f =ImageColorAllocate($img,246,44,44);  // สีของบล็อคระดับ1
		$text="Weak";  //ข้อความแสดงระดับ 1
		break;
	case 2:
		$f=ImageColorAllocate($img,247,191,93);// สีของบล็อคระดับ2
		$text="Medium"; //ข้อความแสดงระดับ 2
		break;
	case 3:
		$f=ImageColorAllocate($img,234,246,44);// สีของบล็อคระดับ3
		$text="strong"; //ข้อความแสดงระดับ 3
		break;
	case 4:
		$f=ImageColorAllocate($img,44,246,125);// สีของบล็อคระดับ4
		$text="very strong";  //ข้อความแสดงระดับ 4
		break;
}
$black=ImageColorAllocate($img,0,0,0); // สีข้อความแสดงระดับความยากง่าย
imageTTFText($img,7,0,1,9,$black,$font,$text);
for($i=0;$i<$n;$i++){
ImageFilledRectangle($img,1+20*$i,11,19+20*$i,19,$f);
}
ImageGIF($img);
Imagedestroy($Img);
?>