<?
header('Content-type: application/vnd.ms-excel; charset=tis620');
session_start();
include("../funtion.php");
include("../ck_session.php");
require_once "class.writeexcel_workbook.inc.php";
require_once "class.writeexcel_worksheet.inc.php";
$token = md5(uniqid(rand(), true)); 
$fname= "MyExcel.xls";
$workbook =& new writeexcel_workbook($fname);

$worksheet =& $workbook->addworksheet("Data HMS Card");
$worksheet->set_margin_right(0.50);
$worksheet->set_margin_bottom(1.10);



## Set Format ##
$xlscelldesc_header =& $workbook->addformat();
$xlscelldesc_header->set_font('Angsana New');
$xlscelldesc_header->set_size(14);
$xlscelldesc_header->set_color('black');
$xlscelldesc_header->set_bold(1);
$xlscelldesc_header->set_text_v_align(1);
$xlscelldesc_header->set_merge(1);


$xlsCellDesc =& $workbook->addformat();
$xlsCellDesc->set_font('Angsana New');
$xlsCellDesc->set_size(14);
$xlsCellDesc->set_color('black');
$xlsCellDesc->set_bold(1);
$xlsCellDesc->set_align('left');
$xlsCellDesc->set_text_v_align(1);


$xlsCellDesc2 =& $workbook->addformat();
$xlsCellDesc2->set_font('Angsana New');
$xlsCellDesc2->set_size(14);
$xlsCellDesc2->set_color('black');
$xlsCellDesc2->set_bold(1);
$xlsCellDesc2->set_align('left');
$xlsCellDesc2->set_text_v_align(1);
## End of Set Format ##

## Set Column Width & Height กำหนดความกว้างของ Cell
$worksheet->set_column('A:B', 11.29);
$worksheet->set_column('B:C', 21);
$worksheet->set_column('C:D', 15);
/*$worksheet->set_column('D:E', 15);
$worksheet->set_column('E:F', 15);
$worksheet->set_column('F:G', 15);*/
$celldesc_h = 16.50;
/*$message = "ข้อมูลทะเบียนรถ พ.ศ 2557-2558";*/
## Writing Data เพิ่มข้อมูลลงใน Cellง
/*$worksheet->write(A1,iconv("utf-8", "tis-620", $message),$xlscelldesc_header);
$worksheet->write_blank(B1, $xlscelldesc_header);
$worksheet->write_blank(C1,$xlscelldesc_header);*/
/*$worksheet->write_blank(D1,$xlscelldesc_header);
$worksheet->write_blank(E1,$xlscelldesc_header);*/
# กำหนดความสูงของ Cell
$worksheet->set_row(1, $celldesc_h); 
$worksheet->set_row(2, $celldesc_h);
$worksheet->set_row(3, $celldesc_h);
/*$worksheet->set_row(4, $celldesc_h);
$worksheet->set_row(5, $celldesc_h);*/
$messager1 = "NO.";
$messager2 = "ID_Student";
$messager3 = "Name";
$messager4 = "ID_Card";

$worksheet->write(A1, iconv("utf-8", "tis-620", $messager1), $xlscelldesc_header);
$worksheet->write(B1, iconv("utf-8", "tis-620", $messager2), $xlscelldesc_header);
$worksheet->write(C1, iconv("utf-8", "tis-620", $messager3), $xlscelldesc_header);
$worksheet->write(D1, iconv("utf-8", "tis-620", $messager4), $xlscelldesc_header);
/*$worksheet->write(D2, iconv("utf-8", "tis-620", $messager4), $xlscelldesc_header); 
$worksheet->write(E2, iconv("utf-8", "tis-620", $messager5), $xlscelldesc_header)*/;
/*$worksheet->write(D2, iconv("utf-8", "tis-620", $messager5), $xlscelldesc_header);
$worksheet->write_blank(E6,$xlscelldesc_header);
$worksheet->write(F6," ", $xlscelldesc_header);*/

# ตรงนี้คือดึงข้อมูลจาก mysql มาใส่ใน Cell
$xlsRow = 2;

mysql_query("SET NAMES tis620");
mysql_query("set character set tis620"); 
$k = 0;
for($i=0;$i<count($_POST["ID_HMS"]);$i++){
	if($_POST["ID_HMS"][$i] != ""){
		$strSQL = "SELECT card.id_card, allstud.id, allstud.name 
				FROM hms_card card 
				INNER JOIN hms_allstudent allstud 
				ON allstud.id = card.id_allstudent";
		$strSQL .=" WHERE card.id_hms = '".$_POST["ID_HMS"][$i]."' ";
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
		
		$student_name = $objResult['name'];	
		/*if($objResult['school_studentid']!='0'){
			$student_code = $objResult['school_studentid'];
		}else{
			$student_code = $objResult['selfdb_studentid'];
		}*/
		$student_code = $objResult['id'];	
		$student_cardid = $objResult['id_card'];
		
		$k++;
		$worksheet->set_row($xlsRow, 19.80);
		$worksheet->write_string("A$xlsRow", "$k", $xlsCellDesc);
		$worksheet->write_string("B$xlsRow", "$student_code", $xlsCellDesc);
		$worksheet->write_string("C$xlsRow", "$student_name", $xlsCellDesc); 
		$worksheet->write_string("D$xlsRow", "$student_cardid", $xlsCellDesc2);
		//++$i;
		$xlsRow++;
	}	
}
# เสร็จแล้วก็ส่งไฟล์ไปยัง Browser 
$workbook->close();

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Type: application/vnd.ms-excel; name='excel';charset='tis620' ");;
header("Content-Disposition: attachment; filename=".basename("MyExcel.xls").";");
header("Content-Transfer-Encoding: binary\r\n"); 
header("Content-Length: ".filesize($fname));
readfile($fname); 
unlink($fname);
exit();?>


