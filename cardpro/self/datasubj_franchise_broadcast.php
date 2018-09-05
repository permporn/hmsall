<?php
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
// เชื่อมต่อฐานข้อมูล
include("../config.inc.php");
// $link=mysqli_connect("10.10.11.14:3306","ajtong_root","076424746") or die("error".mysqli_error());
// //$link=mysqli_connect("localhost","root","1234") or die("error".mysqli_error());
// mysqli_select_db("selfdb",$link);
// mysqli_query($con_ajtongmath_self,"SET NAMES UTF8");
// 	mysqli_query($con_ajtongmath_self,"SET character_set_results=UTF8");
// 	mysqli_query($con_ajtongmath_self,"SET character_set_client=UTF8");
// 	mysqli_query($con_ajtongmath_self,"SET character_set_connection=UTF8");
	mb_internal_encoding('UTF-8');
	mb_http_output('UTF-8');
	mb_http_input('UTF-8');
	mb_language('uni');
	mb_regex_encoding('UTF-8');
	ob_start('mb_output_handler');
	setlocale(LC_ALL, 'th_TH');
 
$q = urldecode($_GET["q"]);
//$q= iconv('utf-8', 'tis-620', $_GET['test']);
$pagesize = 50; // จำนวนรายการที่ต้องการแสดง
$table_db="subject"; // ตารางที่ต้องการค้นหา
$find_field="name_subject_real"; // ฟิลที่ต้องการค้นหา
$sql = "select 
`subject`.subid as subid,
`subject`.subname as subname,
`subject`.`code`,
`subject`.state,
`subject`.`hour`,
`subject`.disc,
`subject`.`level`,
`subject`.idaddterm,
`subject`.brsnchvdo,
`subject`.staffid,
`subject`.date_subj,
`subject`.`status`,
`subject`.teacherid,
`subject`.id_subject_real,
`subject`.status_delete,
`subject`.status_branch_hms,
`subject`.status_branch_school,
 subject_real.name_subject_real as name_subject_real
 from $table_db  
 LEFT JOIN subject_real ON subject_real.id_subject_real = `subject`.id_subject_real 
 where `subject`.status_delete != 1 AND `subject_real`.type_self = 4 AND `subject`.status_branch_hms = 1 AND locate('$q', $find_field) > 0 order by locate('$q', $find_field), $find_field limit $pagesize";
$results = mysqli_query($con_ajtongmath_self,$sql);
while ($row = mysqli_fetch_array( $results )) {
	$id = $row["subid"]; // ฟิลที่ต้องการส่งค่ากลับ
	$name =$row["subname"]; // ฟิลที่ต้องการแสดงค่า
	$name_subject_real =$row["name_subject_real"];
	if($name_subject_real == ' '){
		$subject_name = $name;
	}else{
		$subject_name = $name_subject_real;
	}
	// ป้องกันเครื่องหมาย '
	$name = str_replace("'", "'", $subject_name);
	// กำหนดตัวหนาให้กับคำที่มีการพิมพ์
	$display_name = preg_replace("/(" . $q . ")/i", "<b>$1</b>", $subject_name);
	echo "<li onselect=\"this.setText('$name').setValue('$id');\">$display_name</li>";
}
mysqli_close();
?>