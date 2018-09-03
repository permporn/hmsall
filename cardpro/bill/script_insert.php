<?php 
	session_start();
    include('config/config_db_self.php');
    //http://aj-tongmath.com/cardpro/bill/script_insert.php?b=40&y=2017
    $id_branch = $_GET['b'];
    $id_year = $_GET['y']; //2017
    echo $id_branch."&".$id_year."<br>";
	//$strSQL = "SELECT * FROM `account` WHERE username LIKE 'FC%' AND status = '37' ORDER BY sdate ASC";
	//$strSQL =	"SELECT * FROM  `account` 
				//LEFT JOIN credit ON account.accid = credit.accid
				//WHERE account.username LIKE  'FC%' AND account.status =  $id_branch ORDER BY account.sdate ASC ";
	$strSQL =	"SELECT * 
					FROM  `account` 
					LEFT JOIN credit ON account.accid = credit.accid
					WHERE account.username LIKE  'FC%'
					AND account.status =  $id_branch
					AND YEAR( credit.date_pay ) =$id_year
					GROUP BY account.accid
					ORDER BY credit.date_regis ASC ";

	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$i = 1;
	$type_bill = 1;
	while ($objResult = mysql_fetch_array($objQuery)) {
		$id_branch = $objResult['status'];
		$date_now = $objResult['sdate']."  00:00:00";
		$y = date('Y',strtotime($objResult['date_pay'])) + 543;
		$year = substr($y,2,2);

		// $strSQL_COUNT = "SELECT COUNT(id_bill_all) AS count_bill FROM `bill_number` WHERE year_ ='".$year."'";
		// $objQuery_COUNT = mysql_query($strSQL_COUNT) or die ("Error Query [".$strSQL_COUNT."]");
		// $objResult_COUNT = mysql_fetch_array($objQuery_COUNT);
		// $id_bill_all = $objResult_COUNT['count_bill'];
		// if($id_bill_all == 0){
		// 	$id_bill_all = 1;
		// }else{
		// 	$id_bill_all = $id_bill_all+1;
		// }
		//echo $id_bill_all;

		// $strSQL_COUNT_B = "SELECT COUNT(accid) AS count_branch FROM `account` WHERE username LIKE 'JT%' AND status = 37";
		// $objQuery_COUNT_B = mysql_query($strSQL_COUNT_B) or die ("Error Query [".$strSQL_COUNT_B."]");
		// $objResult_COUNT_B = mysql_fetch_array($objQuery_COUNT_B);
		// $id_bill_branch = $objResult_COUNT_B['count_branch'];
		//$id_bill_branch = $i;
		//$h = 3;//จำนวนหลัก
		//$no_bill_all = $id_branch."-".$year.sprintf("%00".$h."d",$id_bill_all);
		///$no_bill_branch = $id_branch."-".$year.sprintf("%00".$h."d",$id_bill_branch);

		$bill = bill_number($type_bill,$id_branch);
		$no_bill_all = $bill['number_all'];
		$no_bill_branch = $bill['number_branch'];
		$id_bill_all = $bill['no_all'];
		$id_bill_branch = $bill['no_branch'];
		$year = $bill['year'];

		$strSQL_insert ="INSERT INTO `bill_number` VALUES ('', $id_bill_all , '$no_bill_all' , $id_bill_branch , '$no_bill_branch' , $type_bill, $id_branch, $year, '$date_now', '', '')";
		$objQuery_insert = mysql_query($strSQL_insert) or die ("Error Query [".$strSQL_insert."]");
		if($objQuery_insert){
			$i++;
			echo "INSERT INTO `bill_number` VALUES ('', $id_bill_all , '$no_bill_all' , $id_bill_branch , '$no_bill_branch' , $type_bill, $id_branch, $year, '$date_now', '', '');<br>";

			$strSQL_update = "UPDATE account SET"; 
            $strSQL_update .=" no_bill_all = '".$no_bill_all."'";
            $strSQL_update .=" ,no_bill_branch = '".$no_bill_branch."'";
            $strSQL_update .=" WHERE accid = '".$objResult['accid'] ."'";
            $objQuery_update = mysql_query($strSQL_update);
            if(!$objQuery_update){
                echo "error2";
            }else{
                echo "--".$strSQL_update."<br>";

                $strSQL_credit ="SELECT *
					FROM  credit 
					WHERE accid = ".$objResult['accid'];
				$objQuery_credit = mysql_query($strSQL_credit) or die ("Error Query [".$strSQL_credit."]");

				while ($objResult_credit = mysql_fetch_array($objQuery_credit)) {
		            $strSQL_update2 = "UPDATE credit SET"; 
		            $strSQL_update2 .=" no_bill_all = '".$no_bill_all."'";
		            $strSQL_update2 .=" ,no_bill_branch = '".$no_bill_branch."'";
		            $strSQL_update2 .=" WHERE creditid = '".$objResult_credit['creditid'] ."'";
		            $objQuery_update2 = mysql_query($strSQL_update2);
		            if(!$objQuery_update){
		                echo "error3";
		            }else{
		            	echo "---".$strSQL_update2."<br>";
		            }
	        	}
            }
		}else{
			echo "error1";
		}			
		
	}

  function bill_number($type_bill ,$id_branch){

  $number_all ='';
  $number_branch ='';

  if($type_bill == "1"){  // self = s
    $text_type = "S";
  }else if($type_bill == "2"){ // receipt = R ใบเสร็จ
    $text_type = "R";
  }else if($type_bill == "3"){ // book_store = B 
    $text_type = "B";
  }

  $strSQL_branch = "SELECT * FROM branch WHERE branchid ='".$id_branch."'"; 
  $objQuery_branch = mysql_query($strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
  $objResult_branch = mysql_fetch_array($objQuery_branch);

  //--- bill all---//
  $y = date('Y') + 543;
  $strSQL_select = "SELECT MAX(id_bill_all) FROM bill_number WHERE year_ ='".substr($y,2,2)."' AND type_bill=".$type_bill; 
  $objQuery_select = mysql_query($strSQL_select) or die ("Error Query [".$strSQL_select."]");
   if(!$objQuery_select)
   {
       //echo "fail !!! : $strSQL_select (report.php)";
        $id_bill_all = 0;
   }else{
        $max = mysql_fetch_array($objQuery_select);
        $id_bill_all = $max[0]+1;
   }
  $h = 3;//จำนวนหลัก
  $year = substr($y,2,2);
  $number_all = $text_type.$objResult_branch['branch_number']."-".$year.sprintf("%0".$h."d",$id_bill_all);

  //---- bill branch---//
  $strSQL_select = "SELECT MAX(id_bill_branch) FROM bill_number WHERE id_branch ='".$id_branch."' AND type_bill=".$type_bill; 
  $objQuery_select = mysql_query($strSQL_select) or die ("Error Query [".$strSQL_select."]");
   if(!$objQuery_select)
   {
       //echo "fail !!! : $strSQL_select (report.php)";
        $id_bill_branch = 0;
   }else{
        $max = mysql_fetch_array($objQuery_select);
        $id_bill_branch = $max[0]+1;
   }
  $h = 3;//จำนวนหลัก
  $year = substr($y,2,2);
  $number_branch = $text_type.$objResult_branch['branch_number']."-".$year.sprintf("%0".$h."d",$id_bill_branch);
  //echo $bill_number.",";

  $array = array( 'number_all' => $number_all, 
                  'no_all' => $id_bill_all, 
                  'number_branch' => $number_branch,
                  'no_branch' => $id_bill_branch,
                  'year' => $year
                );
  return $array;
}
// check
// SELECT account.status, account.sdate, account.accid, credit.creditid, account.no_bill_all AS ac_no_bill_all, account.no_bill_branch AS ac_no_bill_branch, credit.no_bill_all AS cr_no_bill_all, credit.no_bill_branch AS cr_no_bill_branch
// FROM  `account` 
// LEFT JOIN credit ON account.accid = credit.accid
// WHERE account.username LIKE  'FC%'
// AND account.status =  '37'
// ORDER BY account.no_bill_all ASC
?>