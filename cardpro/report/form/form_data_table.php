<?
session_start();
include("../ck_session.php");
?>
<script type="text/javascript">
$('table#datatable').DataTable( {
         "dom": 'Bfrtip',
		"lengthMenu" : [
			[ 10, 25, 50, -1 ],
			[ '10 rows', '25 rows', '50 rows', 'Show all' ]
		],
		"buttons": ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/ ,'pageLength'],
		"iDisplayLength": 10,
		"order": [[ 0, "desc" ]]
});
/*function printBill(sum_amount,quantity,percentag1,quantity2,percentag2){
	var sql = $('#sql_bill').val();
	var start_date = $('#start_date').val();
	var end_date = $('#end_date').val();
	var branch = $('#branch').val();
    var request = $.ajax({
        url: "form/form_print_bill.php",
        method: "GET",
        data: { sql : sql , start_date : start_date , end_date : end_date , sum_amount : sum_amount , quantity : quantity , percentag1 : percentag1 , quantity2 : quantity2 , percentag2 : percentag2 , branch : branch}
    });
    request.done(function( result ) {
        $(".header").hide();
        $("#data-table").html(result);
    });
}*/
</script>
<?php

// ฟังก์ชั่นวนลูปวันที่
function m2h($mins) {
    if ($mins < 0) {
        $min = Abs($mins);
    } else {
        $min = $mins;
    }
    $H = Floor($min / 60);
    $M = ($min - ($H * 60)) / 100;
    $hours = $H + $M;
    if ($mins < 0) {
        $hours = $hours * (-1);
    }

    $expl = explode(".", $hours);
    $H = $expl[0];
    if (empty($expl[1])) {
        $expl[1] = "";//00;
    }

    $M = $expl[1];
    if (strlen($M) == 1) {
        $M = ".". $M . 0;
    }
    

    $hours = $H . $M;

    return $hours;
}

$quantity = $_POST['quantity'];
if($quantity == ""){$quantity = 100;}
$s_date = $_POST['s_date'];
$e_date = $_POST['e_date'];
$type = $_POST['type'];

$subject = $_POST['subject'];
$branch = $_POST['branch'];
$term = $_POST['term'];
$pay = $_POST['pay'];
if($objResultSTT["status"]== "teacher" && $account_teacher_id != ''){
	$Sql_teacher_id = "SELECT * FROM teacher WHERE teacherid=".$account_teacher_id;
	$objQuery_teacher_id = mysql_query($Sql_teacher_id ,$connect_school);
	$objResult_teacher_id = mysql_fetch_array($objQuery_teacher_id);
	//$teacher = $array($objResult_teacher_id['map_id_self']);
	$teacher_name = $objResult_teacher_id['teachername'];
	$teacher[] = $objResult_teacher_id['map_id_self'];
}else{
	$teacher = $_POST['teacher'];
}
$price_self = $_POST['price_self'];
if($price_self == ""){
	$price_self = "self_amount";
}

//echo  "===>".$price_self;

// echo "<br>s_date"; 
// echo $s_date."<br>e_date"; 
// echo $e_date."<br>subject";print_r($subject);
// echo "<br>branch";print_r($branch);
// echo "<br>term";print_r($term);
// echo "<br>pay";print_r($pay);
// echo "<br>teacher";print_r($teacher);

if($type ==''){
	$s_date = date('Y-m-d', strtotime('-7 days'));
	$e_date = date('Y-m-d');
	$type = 2;
}

	if($type == 2){
	include('../config/config_db_self.php');
	$strSQL_self =	
			"SELECT
			credit.creditid AS creditid,
			credit.date_regis AS self_regis_date,
			credit.date_pay AS self_date_pay,
			student.`name` AS self_student_name,
			account.accid AS self_id_account,
			account.username AS self_student_username,
			account.sdate AS self_sdate,
			account.edate AS self_edate,
			account.totalcredit AS self_totalcredit,
			account.credit_start AS credit_start,
			account.no_bill_all AS no_bill_all,
			account.no_bill_branch AS no_bill_branch,
			credit.subid  AS self_subject_id,
			credit.codetransfer AS self_codetransfer,
			`subject`.`code` AS self_subject_code,
			`subject`.subname AS self_subject_name,
			`subject`.id_subject_real AS id_subject_real,
			`year`.nameyear AS self_subject_year,
			`subject`.idaddterm AS self_subject_term_id,
			term.nameterm AS self_subject_term,
			credit.Invoicenumber AS self_invoicenumber,
			credit.amount AS self_amount,
			credit.type_pay AS self_type_pay,
			staff_c.stname AS self_staff_name,
			branch_staff.`name` AS self_staff_branch,
			staff_c.branchid AS self_staff_branch_id,
			credit.no_petition AS self_petition_no,
			staff_petition.stname AS self_petition_staff_name,
			branch_petition.`name` AS self_petition_branch_name,
			teacher.teacherid AS self_teacher_id,
			teacher.teachername AS self_teacher_name,
			subject_real.name_subject_real AS name_subject_real,
			subject_real.price AS subject_real_price,
			branch_account.`name` AS branch_account_name,
			type_self.type_name AS type_name
			FROM
			credit
			LEFT JOIN account ON account.accid = credit.accid
			LEFT JOIN student ON student.studentid = account.studentid
			LEFT JOIN branch AS branch_account ON account.status = branch_account.branchid
			LEFT JOIN `subject` ON `subject`.subid = credit.subid AND `subject`.subid = credit.subid
			LEFT JOIN addtrem ON addtrem.idaddterm = `subject`.idaddterm
			LEFT JOIN term ON term.idterm = addtrem.idterm
			LEFT JOIN `year` ON `year`.idyear = addtrem.idyear
			LEFT JOIN staff AS staff_c ON staff_c.stid = credit.staffid
			LEFT JOIN branch AS branch_staff ON staff_c.branchid = branch_staff.branchid
			LEFT JOIN staff AS staff_petition ON staff_petition.stid = credit.no_petition_staff
			LEFT JOIN branch AS branch_petition ON branch_petition.branchid = staff_petition.branchid
			LEFT JOIN teacher ON teacher.teacherid = `subject`.teacherid
			LEFT JOIN `subject_real` ON subject.id_subject_real = `subject_real`.id_subject_real
			LEFT JOIN `type_self` ON credit.type_self = `type_self`.type_id
			WHERE
			 ";
			//echo $account_status.",".$id_branch_self .",".  $id_branch_school ;
	

	if($account_status == "manager_franchise" || $account_status == "pre_end" || $session_status == 'user_franchise' ){
		//$strSQL_self .= " branch_staff.branchid = '".$id_branch_self."'";
		$strSQL_self .= " account.status = '".$id_branch_self."'";
		$strSQL_self .= " AND ";
	}
	if($s_date != '' && $e_date != ''){
		$strSQL_self .= " credit.date_pay BETWEEN '".$s_date."' AND '".$e_date."'";
		$str = " AND ";
	}else{
		$str = " ";
	}
	$strSQL_self .= $str." account.status != 'out'";
	

	if($subject){
		for($s=0;$s<count($subject);$s++){
			if($s == 0){
				$strSQL_self .= $str."(credit.subid = ".$subject[$s];
			}else{
				$strSQL_self .= " OR credit.subid = ".$subject[$s];
			}
		}$strSQL_self .= ")";
	}
	if($branch != ''){
		for($s=0;$s<count($branch);$s++){
			if($s == 0){
			$strSQL_self .= $str."(account.status = ".$branch[$s];
			}else{
				$strSQL_self .= " OR account.status = ".$branch[$s];
			}	
		}$strSQL_self .= ")";
	}
	if($term){
		for($s=0;$s<count($term);$s++){
			if($s == 0){
				$strSQL_self .= $str."(`subject`.idaddterm = ".$term[$s];
			}else{
				$strSQL_self .= " OR `subject`.idaddterm = ".$term[$s];
			}
		}$strSQL_self .= ")";
	}
	if($teacher){
		for($s=0;$s<count($teacher);$s++){
			if($s == 0){
				$strSQL_self .= $str."(teacher.teacherid = ".$teacher[$s];
			}else{
				$strSQL_self .= " OR teacher.teacherid = ".$teacher[$s];
			}
		}$strSQL_self .= ")";
	}
	if($pay){
		for($s=0;$s<count($pay);$s++){
			if($s == 0){
				$strSQL_self .= $str."(credit.type_pay = '".$pay[$s]."'";
			}else{
				$strSQL_self .= " OR credit.type_pay = '".$pay[$s]."'";
			}
		}$strSQL_self .= ")";
	}
	$strSQL_self_1 = " AND credit.type_pay != 'test' AND credit.type_pay != 'free' ";
	$strSQL_self_2 = " ORDER BY self_regis_date DESC ";

	if ($price_self == "self_amount"){
		$colunm = "self_amount";
	}else if ($price_self == "subject_real_price") {
		$colunm = "subject_real_price";
	}
	//echo "->".$colunm;
	$strSQL_sum = "SELECT SUM($colunm) as sum_amount FROM ( ".$strSQL_self.$strSQL_self_1.$strSQL_self_2." ) as sum_amount";
	$objQuery_sum = mysql_query($strSQL_sum) or die ("Error Query [".$strSQL_sum."]");
	$objResult_sum = mysql_fetch_array($objQuery_sum);
	$sum_amount = $objResult_sum['sum_amount'];
	$percentag1 = ($sum_amount * $quantity)/100;
	$percentag2 =  $sum_amount - $percentag1;
	$sent_sql = $strSQL_self.$strSQL_self_1.$strSQL_self_2;
	$objQuery_self = mysql_query($strSQL_self.$strSQL_self_2) or die ("Error Query [".$strSQL_self.$strSQL_self_2."]");
	//echo $strSQL_self.$strSQL_self_2;
	if($branch){
		$branch_name = "";
		for($s=0;$s<count($branch);$s++){
			$strSQL_branch = "SELECT * FROM branch WHERE branchid=". $branch[$s];
			$objQuery_branch = mysql_query($strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
			if($strSQL_branch){
				$objResult_branch = mysql_fetch_array($objQuery_branch);
				if($s!=count($branch)-1){
					$branch_name .= $objResult_branch['name'].",";
				}else{
					$branch_name .= $objResult_branch['name'];
				}
				
			}
		}
	}else{
		$branch_name = "ทุกสาขา";
	}
	//echo $branch_name;
	mysql_close($conn);

	//echo "->".$strSQL_sum;
	}

	// สด
	else if($type == 1){
	include('../config/config_db_school.php');
	$strSQL_learn = "

					SELECT
					learn.regisdate AS learn_regis_date,
					student.studentname AS learn_student_name,
					`subject`.subid AS learn_subject_id,
					`subject`.subcode AS learn_subject_code,
					`subject`.subname AS learn_subject_name,
					`subject`.price AS learn_subject_price,
					learn.id_year AS learn_subject_id_year,
					term.term AS learn_subject_term,
					learn.pricek AS learn_amount,
					room.branchid AS learn_branch_id,
					branch.branchname AS learn_branch_name,
					teacher.teacherid AS learn_teacher_id,
					teacher.teachername AS learn_teacher_name,
					`year`.nameyear AS learn_subject_year,
					learn.type_price AS learn_type_price,
					account.name AS learn_staff_name
					FROM
					learn
					LEFT JOIN student ON student.studentid = learn.studentid
					LEFT JOIN `subject` ON `subject`.subcode = learn.subcode AND `subject`.id_year = learn.id_year
					LEFT JOIN addterm ON addterm.id_year = `subject`.id_year
					LEFT JOIN term ON term.termid = addterm.termid
					LEFT JOIN room ON room.roomid = `subject`.roomid
					LEFT JOIN branch ON branch.branchid = room.branchid
					LEFT JOIN teacher ON teacher.teacherid = `subject`.teachid
					LEFT JOIN `year` ON `year`.id = addterm.year_id
					LEFT JOIN account ON learn.id_staff = account.accid 
					WHERE ";
		//echo $account_status.",".$id_branch_self .",".  $id_branch_school ;
		if($account_status == "manager_franchise" || $account_status == "pre_end" || $session_status == 'user_franchise' ){
			$strSQL_learn .= " branch.branchid = '".$id_branch_school."'";
			$strSQL_learn .= " AND ";
		}
		if($s_date != '' && $e_date != ''){
		$strSQL_learn .= " learn.regisdate BETWEEN '".$s_date."' AND '".$e_date."'";
		$str = " AND ";
		}else{
			$str = " ";
		}
		
		if($subject){
			for($s=0;$s<count($subject);$s++){	

				$str_subject = "SELECT * FROM `subject` WHERE subid = ".$subject[$s];
				$objQuery_subject = mysql_query($str_subject) or die ("Error Query [".$str_subject."]");
				$objResult_subject = mysql_fetch_array($objQuery_subject);
				$subcode = $objResult_subject['subcode'];
				$id_year = $objResult_subject['id_year'];
			
				if($s == 0){
					$strSQL_learn .= $str."(`subject`.subcode = '".$subcode."' AND `subject`.id_year=".$id_year;
				}else{
					$strSQL_learn .= " OR `subject`.subcode = '".$subcode."' AND `subject`.id_year=".$id_year;
				}
			}$strSQL_learn .= ")";
		}
		if($branch){
			for($s=0;$s<count($branch);$s++){
				if($s == 0){
				$strSQL_learn .= $str."(room.branchid = ".$branch[$s];
				}else{
					$strSQL_learn .= " OR room.branchid = ".$branch[$s];
				}	
			}$strSQL_learn .= ")";
		}
		if($term){
			for($s=0;$s<count($term);$s++){
				if($s == 0){
					$strSQL_learn .= $str."(learn.id_year = ".$term[$s];
				}else{
					$strSQL_learn .= " OR learn.id_year = ".$term[$s];
				}
			}$strSQL_learn .= ")";
		}	
		if($teacher){
			for($s=0;$s<count($teacher);$s++){
				if($s == 0){
					$strSQL_learn .= $str."(teacher.teacherid = ".$teacher[$s];
				}else{
					$strSQL_learn .= " OR teacher.teacherid = ".$teacher[$s];
				}
			}$strSQL_learn .= ")";
		}	
	
		//echo $strSQL_learn;
		$strSQL_sum = "SELECT SUM(learn_amount) as  sum_amount FROM ( ".$strSQL_learn." ) as sum_amount";
		$objQuery_sum = mysql_query($strSQL_sum) or die ("Error Query [".$strSQL_sum."]");
		$objResult_sum = mysql_fetch_array($objQuery_sum);
		$sum_amount = $objResult_sum['sum_amount'];
		$percentag1 = ($sum_amount * $quantity)/100;
		$percentag2 =  $sum_amount - $percentag1;
		//echo $sum_amount;

		$objQuery_learn = mysql_query($strSQL_learn) or die ("Error Query [".$strSQL_learn."]");
		mysql_close($conn);
	}
if($account_status == "admin"){
	$start_date = $s_date;
	$end_date = $e_date;
?>
<div id="loading"></div>
<input type="hidden" id="branch" name="branch" value="<?=$branch_name;?>">
<input type="hidden" id="start_date" name="start_date" value="<?=$start_date;?>">
<input type="hidden" id="end_date" name="end_date" value="<?=$end_date;?>">
<input type="hidden" id="sql_bill" name="sql_bill" value="<?=$sent_sql;?>">
<!-- <button type="button"  class="btn btn-warning" onclick="printBill(<?=$sum_amount?>,<?=$quantity?>,<?=$percentag1?>,<?=100-$quantity?>,<?=$percentag2?>)"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> ใบเสร็จรับเงิน</button> -->
<? }?> 
<input type="hidden" id="form_type" name="form_type" value="index">
<br><br>
<? if($objResultSTT["status"] == "teacher"){ //echo 	$sent_sql; echo $teacher;?>

<table align="center">
<tr>
    <th colspan="18" class="text-right">
    <center><h5><strong>ยอดวันที่ <?=$s_date;?> ถึง <?=$e_date;?> ของ<?=$teacher_name;?> 
    <br> ยอดรวมเป็น <font color="red"><?=number_format($sum_amount);?></font> บาท </strong></h5>
    <!-- <h5><strong>คิด % ได้ <font color="red"> <?=number_format($quantity);?></font> เท่ากับ <font color="red"><?=number_format($percentag1);?></font> บาท </strong></h5>
    <h5><strong>คิด % แบ่ง<font color="red"> <?=number_format(100-$quantity);?></font> เท่ากับ <font color="red"><?=number_format($percentag2);?></font> บาท </strong></h5> -->
    </center></th>
</tr> 
</table>

<? }else{?>

<table id="datatable" class="display" cellspacing="0" width="100%">
	<?php if($objQuery_self){?>
    <thead>
    	<? //if( $objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"){?>
    	<tr>
		    <th colspan="18" class="text-right">
		    <h5><strong>ยอดรวม <font color="red"><?=number_format($sum_amount);?></font> บาท </strong></h5>
		    <h5><strong>คิด % ได้ <font color="red"> <?=number_format($quantity);?></font> เท่ากับ <font color="red"><?=number_format($percentag1);?></font> บาท </strong></h5>
		    <h5><strong>คิด % แบ่ง<font color="red"> <?=number_format(100-$quantity);?></font> เท่ากับ <font color="red"><?=number_format($percentag2);?></font> บาท </strong></h5>
		    </th>
		</tr>
		<? //}?>
        <tr>
            <th rowspan="2"><center>ลำดับ</center></th>
            <th rowspan="2" class="col-md-1">วันที่ชำระ</th>
            <th rowspan="2" class="text-left col-md-1">Name</th>
            <th rowspan="2" class="text-left">Username</th>
            <th colspan="2" ><center>จำนวนวัน</center></th>
            <th colspan="2" ><center>จำนวนชม.</center></th>
            <th rowspan="2" class="text-right">รหัสคอร์สเรียน</th>
            <th rowspan="2" class="text-left">ชื่อคอร์สเรียน</th>
            <th rowspan="2" class="text-left">ราคาขาย</th>
            <th rowspan="2" class="text-left">ราคาเต็ม</th>
            <th rowspan="2" ><center>หมายเลขใบชำระ</center>
            <th colspan="2" ><center>เลขใบเสร็จ</center></th>
            <th rowspan="2"><center>จ่ายโดย</center></th>
            <th rowspan="2"><center>ใบคำร้อง/ผู้ร้องขอ</center></th>
            <th rowspan="2"><center>ออกโดย/แก้ไข</center></th>
        </tr>
        <tr>
            <th class="text-left">คงเหลือ</th>
            <th class="text-left">จากทั้งหมด</th>
            <th class="text-left">คงเหลือ</th>
            <th class="text-left">จากทั้งหมด</th>
            <th class="text-left">สนง.ใหญ่</th>
            <th class="text-left">สาขา</th>
        </tr>
    </thead>
    <tbody>

    <?php 
    $i = 1;
    while ( $objResult_self = mysql_fetch_array($objQuery_self)) {
    	$strDate2 = $objResult_self['self_edate'];
    	$strDate1 =$objResult_self['self_sdate'];
    	$today = $e_date;
    	$sum_date =(strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
    	$count_date =(strtotime($strDate2) - strtotime($today))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
    	if($count_date < 0) $count_date = 0;
    ?>
    <tr>
    <td><center><?=$i?></center></td>
    <? if($objResult_self['self_date_pay'] == "0000-00-00"){?>
    <td><?=date("d-m-Y", strtotime($objResult_self['self_regis_date']));?></td>
    <? }else{?>
    <td><?=date("d-m-Y", strtotime($objResult_self['self_date_pay']));?></td>
    <? }?>
    <td><?=$objResult_self['self_student_name'];?></td>
    <td class="text-left"><?=$objResult_self['self_student_username']." (".$objResult_self['branch_account_name'].")";?></td>
    <td><?=number_format($count_date);?></td>
    <td><?=number_format($sum_date);?></td>
    <? 	
    	include('../config/config_db_self.php');
    	$sum_credite = 0;
    	$sql_totalcredit = "SELECT * FROM  `reserve` WHERE  `accid` =".$objResult_self['self_id_account'];
		$objQuery_totalcredit = mysql_query($sql_totalcredit) or die ("Error Query [".$sql_totalcredit."]");
		while ( $objResult_totalcredit = mysql_fetch_array($objQuery_totalcredit)) {
			$date1 = $e_date;
			$date2 = $objResult_totalcredit['time'];
			$arrDate1 = explode("-",$date1);
			$arrDate2 = explode("-",$date2);
			$timStmp1 = mktime(0,0,0,$arrDate1[1],$arrDate1[2],$arrDate1[0]);
			$timStmp2 = mktime(0,0,0,$arrDate2[1],$arrDate2[2],$arrDate2[0]);
			//echo  $timStmp1 .">=". $timStmp2."<br>";
			if ($timStmp1 >= $timStmp2) {
				//echo $date1." >= ".$date2."<br>";
				$sum_credite += ($objResult_totalcredit['section_e'] - $objResult_totalcredit['section_s']);
				//echo $sum_credite;
			}	
		}
		mysql_close($conn);

		//echo $sum_credite."<br>";
	?>
    <td><? if($objResult_self['self_totalcredit'] >= $sum_credite){ 
    		echo m2h(($objResult_self['credit_start']-$sum_credite)*30);
    	}else{ 
    		echo "0";
    	}?>
    </td>
    <td><? echo m2h($objResult_self['credit_start']*30);?></td>
    <td class="text-right">
    	<? if($objResult_self['self_codetransfer']){
    		echo $objResult_self['self_codetransfer']."<br>".$objResult_self['type_name'];
    	}else{
    		echo "<center>-</center>";
    	}?></td>
    <td class="text-left">
    	<? if($objResult_self['id_subject_real']== 0 ){
	    	echo $objResult_self['self_subject_name'];
	    }else{
	     	echo $objResult_self['name_subject_real'];
	   	}?>
    </td>
    <td class="text-left"><?=$objResult_self['self_amount'];?></td>
    <td class="text-left">
    <? if($objResult_self['subject_real_price'] == 0){ echo "ยังไม่มีข้อมูล"; }
    else{ echo $objResult_self['subject_real_price']; }?>
    </td>
    <!-- <td>
 	<? if($objResult_self['self_type_pay'] == "free" || $objResult_self['self_type_pay'] == "test"){?>
 	<?=$objResult_self['self_amount'];?>
 	<? }else{?>
    <? if($objResult_self['subject_real_price'] == 0){?>
    <?=$objResult_self['self_amount'];?>
    <? }else{?>
    <?=$objResult_self['subject_real_price'];?>
    <? }}?>
    </td> -->
    <?php
    	if($objResult_self['self_type_pay'] == "money"){
    		$invoicenumber = $objResult_self['creditid'];
    	}else{
    		$invoicenumber = $objResult_self['self_invoicenumber'];
    	}
    ?>
	<td class="text-left"><? if($invoicenumber){ echo $invoicenumber; }else{ echo "-"; }?></td>
	<td class="text-left"><?=$objResult_self['no_bill_all'];?></td>
	<td class="text-left"><?=$objResult_self['no_bill_branch'];?></td>
	<!-- <td><center><?=$objResult_self['self_invoicenumber'];?></center></td> -->
    <?
    if($objResult_self['self_type_pay'] == "transfer"){$pay_type = "โอน";}
    else if($objResult_self['self_type_pay'] == "cradit"){$pay_type = "บัตรเครดิต";}
    else if($objResult_self['self_type_pay'] == "money"){$pay_type = "เงินสด";}
    else if($objResult_self['self_type_pay'] == "test"){$pay_type = "ทดลองเรียนฟรี";}
    else if($objResult_self['self_type_pay'] == "free"){$pay_type = "ฟรี พิเศษ";}
    else{$pay_type = "-";}
    ?>
    <td><center><?=$pay_type;?></center></td>
    <?
    if($objResult_self['self_petition_no'] == ''){$staff_petition = "-";}
    else{ $staff_petition = $objResult_self['self_petition_no'];}?>
    <td><center><a href="http://aj-tongmath.com/cardpro/endorsee_request_details.php?id=<?=$staff_petition?>"><?=$staff_petition;?></a></center></td>
    <td><?=$objResult_self['self_staff_name'];?> / <?=$objResult_self['self_staff_branch'];?></td>
	</tr>
    <? $i++; }?>
    </tbody>


    <!-- learn -->
    <? }if($objQuery_learn){
    	//echo $strSQL_learn;?>
    	<thead>
    	<?  //if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"){?>
        <tr>
		    <th colspan="11" class="text-right">
		    <h5><strong>ยอดรวม <font color="red"><?=number_format($sum_amount);?></font> บาท </strong></h5>
		    <h5><strong>คิด % ได้ <font color="red"> <?=number_format($quantity);?></font> เท่ากับ <font color="red"><?=number_format($percentag1);?></font>บาท </strong></h5>
		    <h5><strong>คิด % แบ่ง<font color="red"> <?=number_format(100-$quantity);?></font> เท่ากับ <font color="red"><?=number_format($percentag2);?></font> บาท </strong></h5>
		    </th>
		</tr>
		<? //}?>
		<tr>
            <th class=""><center>ลำดับ</center></th>
            <th class="col-md-1">วันที่ชำระ</th>
            <th class="">ปีการศึกษา</th>
            <th class="">ชื่อ-นามสกุล</th>
            <th class="">รหัสคอร์สเรียน</th>
            <th class="">ชื่อคอร์สเรียน</th>
            <th class="">สาขา</th>
            <th class=""><center>ราคาขาย</center></th>
            <th class=""><center>ราคาเต็ม</center></th>
            <th class=""><center>จ่ายโดย</center></th>
            <th class=""><center>ออกโดย/แก้ไข</center></th>
        </tr>
    </thead>
    <tbody>

    <?php 
    $i = 1;
    while ( $objResult_learn = mysql_fetch_array($objQuery_learn)) {?>
    <tr>
    <td><center><?=$i?></center></td>
    <td><?=date("d-m-Y", strtotime($objResult_learn['learn_regis_date']));?></td>
    <td><?=$objResult_learn['learn_subject_year'];?> <?=$objResult_learn['learn_subject_term'];?></td>
    <td><?=$objResult_learn['learn_student_name'];?></td>
    <td><?=$objResult_learn['learn_subject_code'];?></td>
    <td><?=$objResult_learn['learn_subject_name'];?></td>
    <td><? if($objResult_learn['learn_branch_name'] == '') {echo "พญาไท";}else{echo $objResult_learn['learn_branch_name'];}?></td>   
    <td><center><?=$objResult_learn['learn_amount'];?></center></td>
    <td><center><?=$objResult_learn['learn_subject_price'];?></center></td>
    <td><center><? 
    if($objResult_learn['learn_type_price'] == 0){ echo "โอน";}
    else if($objResult_learn['learn_type_price'] == 1){echo "เงินสด";}
    else if($objResult_learn['learn_type_price'] == 2){echo "เคดิต";}
    else{echo "-";}
    ?></center></td>
     <td><?=$objResult_learn['learn_staff_name'];?></td>
	</tr>
    <? $i++; }?>
   
    </tbody>
    <? }?>
</table>

<? }?>