<? 
session_start();
//include("config.inc.php");
include("config.inc_multidb.php");
include("funtion.php");
include("ck_session2.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php');?>
  <div id="content">
   <!-- <h1>ใบคำร้อง</h1>-->
    <p>
    <div align="right">
    <form name="form1" action="manageall.php" method="post">
    <label for="type"><strong> จัดการ :</strong></label>
       <select name="type" id="type" style="width:150px">
       		<option value="0" disabled="disabled" selected="selected">เลือกประเภทจัดการ</option>
            <option value="1"> จัดการสาขา </option>
            <option value="2"> จัดการห้องเรียน </option>
            <option value="3"> จัดการปีการศึกษา </option>
            <option value="4"> จัดการอาจารย์ </option>
           <!-- <option value="5"> จัดการaccount </option>
            <option value="6"> แจ้งข่าว </option>-->
       </select>
       <input class="button" type="submit" name="Submit" value="ตกลง" style="width:70px"/>
   </form>
   </div>
   </p>
   </div>
   <?
   /*------------------------เพิ่มสาขา-----------------------------*/
   if($_GET['action'] == "addbranh"){
			$branchname = $_POST['branchname'];
			$status = $_POST['status'];
		  
			$sql = "INSERT INTO branch (";
			$sql .= "branchname ";
			$sql .= ",status";
			$sql .= ") values (";
			$sql .= "'$branchname'";
			$sql .= ",'$status'";
			$sql .= ")"; 
			$objQuery = mysql_query($sql,$connect_school) or die ("Error Query [".$sql."]");
			if($objQuery){
				$query_branch_school = mysql_query("SELECT * FROM  branch WHERE branchname = '$branchname'",$connect_school);
				$result_branch_school = mysql_fetch_array($query_branch_school);
				$branchid_school = $result_branch_school['branchid'];
				if($status == 3){$status = 1;}
				else{$status = 0;}
				$sql_branch_self = "INSERT INTO branch (";
				$sql_branch_self .= "name ";
				$sql_branch_self .= ",type ";
				$sql_branch_self .= ",id_branch_school ";
				$sql_branch_self .= ",status_branch ";
				$sql_branch_self .= ") values (";
				$sql_branch_self .= "'$branchname'";
				$sql_branch_self .= ",'$status'";
				$sql_branch_self .= ",'$branchid_school'";
				$sql_branch_self .= ",1 ";
				$sql_branch_self .= ")"; 
				$objQuery_branch_self = mysql_query($sql_branch_self,$connect_self) or die ("Error Query [".$sql_branch_self."]");
				mysql_close();
				if($objQuery_branch_self){
					$sql = "SELECT branchid FROM `branch` WHERE `name` = '$branchname' AND id_branch_school = '$branchid_school'";
					$query_branch_self = mysql_query($sql, $connect_self);
					$result_branch_self = mysql_fetch_array($query_branch_self);
					$branchid_self_add = $result_branch_self['branchid']; 

					$strSQL = "UPDATE branch SET ";
					$strSQL .="id_branch_self = '".$branchid_self_add."' ";
					$strSQL .="WHERE branchid = '".$branchid_school."' ";
					$objQuery = mysql_query($strSQL,$connect_school) or die ("Error Query [".$strSQL."]");
			
					 echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					 echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
					 echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=1'>";
				}
			}
				else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ผิดพลาด กรุณาทำรายการใหม่');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=1'>";
				}
		
	}
	/*------------------------แก้ไขสาขา-----------------------------*/
   if($_GET['action'] == "editbranch"){
			$branchid = $_GET['branchid'];
			$branchname = $_POST['branchname'];

			$strSQL = "UPDATE branch SET ";
			$strSQL .="branchname = '".$branchname."' ";
			$strSQL .="WHERE branchid = '".$branchid."' ";
			$objQuery = mysql_query($strSQL,$connect_school) or die ("Error Query [".$strSQL."]");
			
			if($objQuery){
				$strSQL = "UPDATE branch SET ";
				$strSQL .="name = '".$branchname."' ";
				$strSQL .="WHERE id_branch_school = '".$branchid."'";
				//echo $strSQL;
				$objQuery = mysql_query($strSQL,$connect_self) or die ("Error Query [".$strSQL."]");

				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			    echo "<script language='javascript'>alert('แก้ไขเรียบร้อย');</script>";
			 	echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=1'>";
			}
				else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ผิดพลาด กรุณาทำรายการใหม่');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=1'>";}
		
	    }
	/*------------------------ลบสาขา-----------------------------*/
	if($_GET['action'] == "delbranch"){
			$branchid = $_GET['branchid'];
		  
			$strSQL = "DELETE FROM branch  ";
			$strSQL .="WHERE branchid = '".$branchid."' ";
			$objQuery = mysql_query($strSQL,$connect_school) or die ("Error Query [".$strSQL."]");
			if($objQuery){
				$strSQL = "DELETE FROM branch  ";
				$strSQL .="WHERE id_branch_school = '".$branchid."' ";
				$objQuery = mysql_query($strSQL,$connect_self) or die ("Error Query [".$strSQL."]");

				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
				echo "<script language='javascript'>alert('ลบเรียบร้อย');</script>";
				echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=1'>";}
				else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ผิดพลาด กรุณาทำรายการใหม่');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=1'>";}
		
	    }
	?>
        
  <!--จัดการสาขา-->
  
  <? if($_POST['type'] == 1 or $_GET['type'] == 1){?>	
	 <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
     		<tr >
            	<td colspan="4" class="tbl23" style="white-space: nowrap;" align="center">+ เพิ่มสาขา</td>
            </tr>
            <form name="fm" method="post" action="manageall.php?action=addbranh">
            <tr>
           	  <td colspan="4" align="center" class="tblyy2" >ชื่อสาขา : 
              <input type="text" name="branchname" style="width:200px"/> 
              <select id="status" name="status">
              	<option value="1">ศูนย์</option>
              	<option value="2">สาขาศูนย์</option>
              	<option value="3">franchise</option>
              	<option value="0">ปิด</option>
              </select>
              <input type="submit" name="submit" value="บันทึก" /></td>
           	</tr>
            </form>
        	<tr >
            	<td colspan="4" class="tbl23" style="white-space: nowrap;" align="center">ข้อมูลสาขา</td>
            </tr>
            <tr>
           	  <td width="6%"  align="center" class="tbl23" >ลำดับ </td>
           	  <td width="80%" align="center" class="tbl23" >ชื่อสาขา </td>
           	  <td width="7%"  align="center" class="tbl23" >แก้ไข </td>
           	  <td align="center" class="tbl23" >ลบ</td>
            </tr>
            <form name="fm" method="post" action="manageall.php?branchid=<?=$_GET['branchid'];?>&action=editbranch">
            <?
			$b = 0;
			$query_b = mysql_query("SELECT * FROM  branch",$connect_school);
			while($result_b = mysql_fetch_array($query_b)){
					$b++;
					if ($b % 2 == 0){$tblyy = "tblyy2";}else{$tblyy = "tblyy";}?>
            <tr>
           	  <td align="center" class="<?=$tblyy?>" ><?=$b?></td>
           	  <td align="center" class="<?=$tblyy?>" >
			  <? if($_GET['action'] == 'editbranch2' && $_GET['branchid'] == $result_b['branchid'] ){?>
			 	<input type="text" name="branchname" value="<?=$result_b['branchname'];?>"  />
				<? }else{?>
				<?=$result_b['branchname'];?><? } ?></td>
			  <td align="center" class="<?=$tblyy?>" >
              <? if($_GET['action'] == 'editbranch2' && $_GET['branchid'] == $result_b['branchid'] ){?>
              	<input type="submit" name="submit" value="บันทึก" />
              <? }else{ ?>
              <a href="manageall.php?branchid=<?=$result_b['branchid'];?>&action=editbranch2&type=1">แก้ไข</a>
              <? }?>
              </td>
              <td align="center" class="<?=$tblyy?>" ><a href="manageall.php?branchid=<?=$result_b['branchid'];?>&action=delbranch">ลบ</a></td>
            </tr>
            <? } ?>
            </form>
       </table> 
	  
	 <? }?>
<?    /*------------------------เพิ่มห้องเรียน-----------------------------*/
    if($_GET['action'] == "addroom"){
		if($_POST['roomname']!= '' && $_POST['branch']!= '' && $_POST['numseat']!= ''){
			$roomname = $_POST['roomname'];
			$branch = $_POST['branch'];
			$numseat = $_POST['numseat'];
			
			$strSQL2 = "SELECT * FROM room WHERE roomname = '$roomname' AND branchid = '$branch'";
			$objQuery2 = mysql_query($strSQL2,$connect_school) or die ("Error Query [".$strSQL2."]");
			$result2 = mysql_fetch_array($objQuery2);
			if($result2){
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ห้องเรียนชื่อซ้ำ');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=2'>";}
			else{
				$sql = "INSERT INTO room (";
				$sql .= "roomname";
				$sql .= ",total";
				$sql .= ",branchid";
				$sql .= ") values (";
				$sql .= "'$roomname'";
				$sql .= ",'$numseat'";
				$sql .= ",'$branch'";
				$sql .= ")"; 
				$objQuery = mysql_query($sql,$connect_school) or die ("Error Query [".$sql."]");
				if($objQuery){
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					/*echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";*/
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=2'>";}
					else{
						echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
						echo "<script language='javascript'>alert('บันทึกผิดพลาด กรุณาทำรายการใหม่');</script>";
						echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=2'>";}
			}
		}else{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('ค่าที่ส่งมาผิดพลาด กรุณาทำรายการใหม่');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=2&roomname=$roomname&branch=$branch&numseat=$numseat'>";}
	}
	 /*------------------------แก้ไขห้องเรียน-----------------------------*/
   if($_GET['action'] == "editroom"){
	   if($_GET['roomid']!= '' && $_POST['roomname']!= '' && $_POST['branch']!= '' && $_POST['numseat']!= ''){
			$roomid = $_GET['roomid'];
			$roomname = $_POST['roomname'];
			$branch = $_POST['branch'];
			$numseat = $_POST['numseat'];
		 
			$strSQL = "UPDATE room SET ";
			$strSQL .="roomname = '".$roomname."' ";
			$strSQL .=",total = '".$numseat."' ";
			$strSQL .=",branchid = '".$branch."' ";
			$strSQL .="WHERE roomid = '".$roomid."' ";
			$objQuery = mysql_query($strSQL,$connect_school) or die ("Error Query [".$strSQL."]");
			if($objQuery){
				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
				/*echo "<script language='javascript'>alert('แก้ไขเรียบร้อย');</script>";*/
				echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=2'>";}
				else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					/*echo "<script language='javascript'>alert('ผิดพลาด กรุณาทำรายการใหม่');</script>";*/
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=2'>";}
		 }else{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('ค่าส่งมาไม่ครบ');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=2&roomid=$roomid&roomname=$roomname&branch=$branch&numseat=$numseat'>";}
	    }
	/*------------------------ลบห้องเรียน-----------------------------*/
	if($_GET['action'] == "delroom"){
			$roomid = $_GET['roomid'];
		  
			$strSQL = "DELETE FROM room  ";
			$strSQL .="WHERE roomid = '".$roomid."' ";
			$objQuery = mysql_query($strSQL,$connect_school) or die ("Error Query [".$strSQL."]");
			if($objQuery){
				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
				/*echo "<script language='javascript'>alert('ลบเรียบร้อย');</script>";*/
				echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=2'>";}
				else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ผิดพลาด กรุณาทำรายการใหม่');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=2'>";}
		
	    }
	 ?>
     <!-- จัดการห้องเรียน -->
     
     <? if($_POST['type'] == 2 or $_GET['type'] == 2){?>	
	 <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
     		<tr >
            	<td colspan="6" class="tbl23" style="white-space: nowrap;" align="center">+ เพิ่มห้องเรียน</td>
            </tr>
            <form name="fm" method="post" action="manageall.php?action=addroom">
            <tr>
           	  <td colspan="3" align="center" class="tblyy2" ><strong>ชื่อห้องเรียน</strong></td>
              <td width="15%" colspan="1" align="center" class="tblyy2" ><strong>สาขา</strong></td>
              <td width="16%" colspan="1" align="center" class="tblyy2" ><strong>จำนวนที่นั่ง</strong></td>              
              <td width="11%" colspan="1" align="center" class="tblyy2" ><strong>บันทึก</strong></td>
            </tr>
            <tr>
              <td colspan="3" align="center" class="tblyy" ><input type="text" name="roomname" style="width:200px"/></td>
              
              <td colspan="1" align="center" class="tblyy" >
              <select name="branch" style="width:120px">
              <option value="0" selected="selected" disabled="disabled">เลือกสาขา</option>
              <? 	$query_b3 = mysql_query("SELECT * FROM branch ",$connect_school);
					while($result_b3 = mysql_fetch_array($query_b3)){?>
                    <option value="<?=$result_b3['branchid']?>"><?=$result_b3['branchname']?></option>
                    <? }?>
              </select>
              </td>
              <td colspan="1" align="center" class="tblyy" ><input type="text" name="numseat" style="width:100px"/></td>
              <td colspan="1" align="center" class="tblyy" ><input type="submit" name="submit" value="บันทึก" /></td>
           	</tr>
            </form>
        	<tr >
            	<td colspan="6" class="tbl23" style="white-space: nowrap;" align="center">ข้อมูลห้องเรียน</td>
            </tr>
            <tr>
           	  <td width="6%" align="center" class="tbl23" >ลำดับ </td>
           	  <td width="29%" align="center" class="tbl23" >ชื่อห้องเรียน </td>
              <td width="23%" align="center" class="tbl23" >สาขา</td>
              <td width="16%" align="center" class="tbl23" >จำนวนที่นั่ง</td>
              <td align="center" class="tbl23" >แก้ไข </td>
           	  <td align="center" class="tbl23" >ลบ</td>
            </tr>
            <form name="fm2" method="post" action="manageall.php?roomid=<?=$_GET['roomid'];?>&action=editroom">
            <?
			$b = 0;
			$query_r = mysql_query("SELECT * FROM  room ORDER BY room.branchid ,room.roomid  ASC",$connect_school);
			while($result_r = mysql_fetch_array($query_r)){
					$r++;
					if ($r % 2 == 0){$tblyy = "tblyy2";}else{$tblyy = "tblyy";}?>
            <tr>
           	  <td align="center" class="<?=$tblyy?>" ><?=$r?></td>
              <td align="center" class="<?=$tblyy?>" >
			  <? if($_GET['action'] == 'editroom2' && $_GET['roomid'] == $result_r['roomid'] ){?>
			 	<input type="text" name="roomname" value="<?=$result_r['roomname'];?>"   style="width:120px"/>
			  <? }else{?><?=$result_r['roomname']?><? } ?></td>
              
              <? $query_b = mysql_query("SELECT * FROM branch WHERE branchid = '".$result_r['branchid']."'",$connect_school);
			 	 $result_b = mysql_fetch_array($query_b);
				 ?>
                 
              	<td align="center" class="<?=$tblyy?>" >
				 <? if($_GET['action'] == 'editroom2' && $_GET['roomid'] == $result_r['roomid'] ){?>
                 <select name="branch" style="width:120px">
                 	<option value="<?=$result_b['branchid']?>" selected="selected" ><?=$result_b['branchname'];?></option>
					<? 
					$query_b2 = mysql_query("SELECT * FROM branch WHERE branchid != '".$result_r['branchid']."'",$connect_school);
					while($result_b2 = mysql_fetch_array($query_b2)){ ?>
                    <option value="<?=$result_b2['branchid']?>"><?=$result_b2['branchname'];?></option>
                    <? }?>
                 </select>
				 <? }else{echo $result_b['branchname'];?><? } ?>
                 </td>
              
           	  <td align="center" class="<?=$tblyy?>" >
			  <? if($_GET['action'] == 'editroom2' && $_GET['roomid'] == $result_r['roomid'] ){?>
			 	<input type="text" name="numseat" value="<?=$result_r['total'];?>" style="width:120px"/>
				<? }else{?>
				<?=$result_r['total']?><? } ?></td>
			  <td align="center" class="<?=$tblyy?>" >
              <? if($_GET['action'] == 'editroom2' && $_GET['roomid'] == $result_r['roomid'] ){?>
              	<input type="submit" name="submit" value="บันทึก" />
              <? }else{ ?>
              <a href="manageall.php?roomid=<?=$result_r['roomid'];?>&action=editroom2&type=2">แก้ไข</a>
              <? }?>
              </td>
              <td align="center" class="<?=$tblyy?>" ><a href="manageall.php?roomid=<?=$result_r['roomid'];?>&action=delroom">ลบ</a></td>
            </tr>
            <? } ?>
            </form>
       </table> 
	  
	 <? }?>
    
    <?    /*------------------------เพิ่มห้องเรียน-----------------------------*/
    if($_GET['action'] == "addyear"){
		if($_POST['year']!= '' && $_POST['trem']!= ''){
			$idyear = $_POST['year'];
			$idtrem = $_POST['trem'];
			
			$strSQL2 = "SELECT * FROM addterm WHERE year_id = '$idyear' AND termid = '$idtrem'";
			$objQuery2 = mysql_query($strSQL2,$connect_school) or die ("Error Query [".$strSQL2."]");
			$result2 = mysql_fetch_array($objQuery2);
			if($result2){
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ปีการศึกษาซ้ำ');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=3'>";}
			else{
				$sql = "INSERT INTO addterm (";
				$sql .= " year_id";
				$sql .= ",termid";
				$sql .= ") values (";
				$sql .= "'$idyear'";
				$sql .= ",'$idtrem'";
				$sql .= ")"; 
				$objQuery = mysql_query($sql,$connect_school) or die ("Error Query [".$sql."]");
				if($objQuery){
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=3'>";}
					else{
						echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
						echo "<script language='javascript'>alert('บันทึกผิดพลาด กรุณาทำรายการใหม่');</script>";
						echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=3'>";}
			}
		}else{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('ค่าที่ส่งมาผิดพลาด กรุณาทำรายการใหม่');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=3'>";}
	}
	 /*------------------------แก้ไขห้องเรียน-----------------------------*/
   if($_GET['action'] == "edityear"){
	   if($_POST['year']!= '' && $_POST['trem']!= '' && $_GET['id_year']!= ''){
			$year = $_POST['year'];
			$idtrem = $_POST['trem'];
			$id_year = $_GET['id_year'];
		 
			$strSQL = "UPDATE addterm SET ";
			$strSQL .="year_id = '".$year."' ";
			$strSQL .=",termid = '".$idtrem."' ";
			$strSQL .="WHERE id_year = '".$id_year."' ";
			$objQuery = mysql_query($strSQL,$connect_school) or die ("Error Query [".$strSQL."]");
			if($objQuery){
				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
				echo "<script language='javascript'>alert('แก้ไขเรียบร้อย');</script>";
				echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=3&idyear=$idyear&idtrem=$idtrem&id_year=$id_year'>";}
				else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ผิดพลาด กรุณาทำรายการใหม่');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=3&idyear=$idyear&idtrem=$idtrem&id_year=$id_year'>";}
		 }else{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('ค่าส่งมาไม่ครบ');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=3&idyear=$idyear&idtrem=$idtrem&id_year=$id_year'>";}
	    }
	/*------------------------ลบห้องเรียน-----------------------------*/
	if($_GET['action'] == "delyear"){
			$id_year = $_GET['id_year'];
		  
			$strSQL = "DELETE FROM addterm  ";
			$strSQL .="WHERE id_year = '".$id_year."' ";
			$objQuery = mysql_query($strSQL,$connect_school) or die ("Error Query [".$strSQL."]");
			if($objQuery){
				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
				/*echo "<script language='javascript'>alert('ลบเรียบร้อย');</script>";*/
				echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=3'>";}
				else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ผิดพลาด กรุณาทำรายการใหม่');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=3'>";}
		
	    }
	 ?>
	<!-- จัดการปีการศึกษา -->
      
     <? if($_POST['type'] == 3 or $_GET['type'] == 3){?>	
	 <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
     		<tr >
            	<td colspan="5" class="tbl23" style="white-space: nowrap;" align="center">+ เพิ่มปีการศึกษา</td>
            </tr>
            <form name="fm" method="post" action="manageall.php?action=addyear">
            <tr>
           	  <td colspan="2" align="center" class="tblyy2" ><strong>เทอม</strong></td>
              <td colspan="2" width="15%"  align="center" class="tblyy2" ><strong>ปี</strong></td>             
              <td colspan="1" width="11%"  align="center" class="tblyy2" ><strong>บันทึก</strong></td>
            </tr>
            <tr>
              <td colspan="2" align="center" class="tblyy" >
              <select name="year" style="width:120px">
              <option value="0" selected="selected" disabled="disabled">เลือกปี</option>
              <? 	$query_y = mysql_query("SELECT * FROM year",$connect_school);
					while($result_y = mysql_fetch_array($query_y)){?>
                    <option value="<?=$result_y['id']?>"><?=$result_y['nameyear']?></option>
                    <? }?>
              </select>
              </td>
              <td colspan="2" align="center" class="tblyy" >
              <select name="trem">
              	<option value="0" disabled="disabled" selected="selected">เลือกเทอม</option>
                <? 
				$strSQL_t = "SELECT * FROM term";
				$query_t  = mysql_query($strSQL_t,$connect_school);
				while($result_t = mysql_fetch_array($query_t)){
				?>
                <option value="<?=$result_t['termid']?>" ><?=$result_t['term']?></option>
                <? } ?>
              </select>
              </td>
              <td colspan="1" align="center" class="tblyy" ><input type="submit" name="submit" value="บันทึก" /></td>
           	</tr>
            </form>
        	<tr >
            	<td colspan="5" class="tbl23" style="white-space: nowrap;" align="center">ข้อมูลปีการศึกษา</td>
            </tr>
            <tr>
           	  <td width="6%" align="center" class="tbl23" >ลำดับ </td>
           	  <td width="29%" align="center" class="tbl23" >ปี</td>
              <td width="23%" align="center" class="tbl23" >เทอม</td>
              <td align="center" class="tbl23" >แก้ไข </td>
           	  <td align="center" class="tbl23" >ลบ</td>
            </tr>
            <form name="fm2" method="post" action="manageall.php?id_year=<?=$_GET['id_year'];?>&action=edityear">
            <?
			$y = 0;
			$query_y = mysql_query("SELECT at.id_year ,at.year_id ,at.termid ,y.nameyear ,t.term
									 FROM addterm at
									INNER JOIN year y
										ON at.year_id = y.id
									INNER JOIN term t
										ON at.termid = t.termid
									ORDER BY y.nameyear DESC  ",$connect_school);
			while($result_y = mysql_fetch_array($query_y)){
					$y++;
					if ($y % 2 == 0){$tblyy = "tblyy2";}else{$tblyy = "tblyy";}
					?>
            <tr>
           	  <td align="center" class="<?=$tblyy?>" ><?=$y?></td>
              <td align="center" class="<?=$tblyy?>" >
			  <? if($_GET['action'] == 'edityear2' && $_GET['id_year'] == $result_y['id_year'] ){?>
			 	<select name="year" style="width:120px">
                 	<option value="<?=$result_y['year_id']?>" selected="selected" ><?=$result_y['nameyear'];?></option>
					<? 
					$query_y2 = mysql_query("SELECT * FROM year WHERE id != '".$result_y['year_id']."'",$connect_school);
					while($result_y2 = mysql_fetch_array($query_y2)){ ?>
                    <option value="<?=$result_y2['id']?>"><?=$result_y2['nameyear'];?></option>
                    <? }?>
                 </select>
			  <? }else{?><?=$result_y['nameyear']?><? } ?>
             </td>
             <td align="center" class="<?=$tblyy?>" >
				 <? if($_GET['action'] == 'edityear2' && $_GET['id_year'] == $result_y['id_year'] ){?>
                 <select name="trem" style="width:120px">
                 	<option value="<?=$result_y['termid']?>" selected="selected" ><?=$result_y['term'];?></option>
					<? 
					$query_y2 = mysql_query("SELECT * FROM term WHERE termid != '".$result_y['termid']."'",$connect_school);
					while($result_y2 = mysql_fetch_array($query_y2)){ ?>
                    <option value="<?=$result_y2['termid']?>"><?=$result_y2['term'];?></option>
                    <? }?>
                 </select>
				 <? }else{echo $result_y['term'];?><? } ?>
                 </td>
             <td align="center" class="<?=$tblyy?>" >
              <? if($_GET['action'] == 'edityear2' && $_GET['id_year'] == $result_y['id_year'] ){?>
              	<input type="submit" name="submit" value="บันทึก" />
              <? }else{ ?>
              <a href="manageall.php?id_year=<?=$result_y['id_year'];?>&action=edityear2&type=3">แก้ไข</a>
              <? }?>
              </td>
              <td align="center" class="<?=$tblyy?>" ><a href="manageall.php?id_year=<?=$result_y['id_year'];?>&action=delyear">ลบ</a></td>
            </tr>
            <? } ?>
            </form>
       </table> 
	  
	 <? }?>
     <?    /*------------------------เพิ่มครู-----------------------------*/
    if($_GET['action'] == "addteacher"){
		if($_POST['nameteacher']!= ''){
			$nameteacher = $_POST['nameteacher'];
			$status_teacher = $_POST['status_teacher'];
			
			$strSQL2 = "SELECT * FROM teacher WHERE teachername = '$nameteacher'";
			$objQuery2 = mysql_query($strSQL2,$connect_school) or die ("Error Query [".$strSQL2."]");
			$result2 = mysql_fetch_array($objQuery2);
			if($result2){
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ชื่อซ้ำ');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=4'>";}
			else{
				$sql = "INSERT INTO teacher (";
				$sql .= " teachername";
				$sql .= " ,status_teacher";
				$sql .= ") values (";
				$sql .= "'$nameteacher'";
				$sql .= ",'$status_teacher'";
				$sql .= ")"; 
				$objQuery = mysql_query($sql,$connect_school) or die ("Error Query [".$sql."]");
				if($objQuery){
					$sql_self = "INSERT INTO teacher (";
					$sql_self .= " teachername";
					$sql_self .= " ,status_teacher";
					$sql_self .= ") values (";
					$sql_self .= "'$nameteacher'";
					$sql_self .= ",'$status_teacher'";
					$sql_self .= ")"; 
					$objQuery = mysql_query($sql_self,$connect_self) or die ("Error Query [".$sql_self."]");

					$sql_self_ = "SELECT * FROM teacher";
					$sql_self_ .= " WHERE teachername = '".$nameteacher."'"; 
					$objQuery_ = mysql_query($sql_self_,$connect_self) or die ("Error Query [".$sql_self_."]");
					$result_ = mysql_fetch_array($objQuery_);

					$strSQL = "UPDATE teacher SET ";
					$strSQL .="map_id_self = '".$result_['teacherid']."' ";
					$strSQL .="WHERE teachername = '".$nameteacher."' ";
					$objQuery = mysql_query($strSQL,$connect_school) or die ("Error Query [".$strSQL."]");

					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=4'>";
				}else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('บันทึกผิดพลาด กรุณาทำรายการใหม่');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=4'>";
				}
			}
		}else{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('ค่าที่ส่งมาผิดพลาด กรุณาทำรายการใหม่');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=4'>";}
	}
	 /*------------------------แก้ไขครู-----------------------------*/
   if($_GET['action'] == "editteacher"){
	   if($_POST['nameteacher'] != '' && $_GET['teacherid'] != ''){
			$nameteacher = $_POST['nameteacher'];
			$teacherid = $_GET['teacherid'];
			$status_teacher = $_POST['status_teacher'];
			//echo $status_teacher;

			$sql_self_ = "SELECT * FROM teacher";
			$sql_self_ .= " WHERE teacherid = '".$teacherid."'"; 
			$objQuery_ = mysql_query($sql_self_,$connect_school) or die ("Error Query [".$sql_self_."]");
			$result_ = mysql_fetch_array($objQuery_);
			$map_id_self = $result_['map_id_self'];
		 	
			$strSQL = "UPDATE teacher SET ";
			$strSQL .="teachername = '".$nameteacher."' ";
			$strSQL .=",status_teacher = '".$status_teacher."' ";
			$strSQL .="WHERE teacherid = '".$teacherid."' ";
			$objQuery = mysql_query($strSQL,$connect_school) or die ("Error Query [".$strSQL."]");
			if($objQuery){
				$strSQL2 = "UPDATE teacher SET ";
				$strSQL2 .="teachername = '".$nameteacher."' ";
				$strSQL2 .=",status_teacher = '".$status_teacher."' ";
				$strSQL2 .="WHERE teacherid = '".$map_id_self."' ";
				//echo $strSQL2;
				$objQuery2 = mysql_query($strSQL2,$connect_self) or die ("Error Query [".$strSQL2."]");
				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
				echo "<script language='javascript'>alert('แก้ไขเรียบร้อย');</script>";
				echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=4&$map_id_self'>";
			}
				else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ผิดพลาด กรุณาทำรายการใหม่');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=4'>";}
		 }else{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('ค่าส่งมาไม่ครบ');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=4'>";}
	    }
	/*------------------------ลบครู-----------------------------*/
	if($_GET['action'] == "delteacher"){
			$teacherid = $_GET['teacherid'];
			$map_id_self = $_GET['map_id_self'];
		  
			$strSQL2 = "DELETE FROM teacher  ";
			$strSQL2 .="WHERE teacherid = '".$teacherid."' ";
			$objQuery2 = mysql_query($strSQL2,$connect_school) or die ("Error Query [".$strSQL2."]");
			if($objQuery2){
				$strSQL1 = "DELETE FROM teacher ";
				$strSQL1 .="WHERE teacherid = ".$map_id_self;
				$objQuery1 = mysql_query($strSQL1,$connect_self) or die ("Error Query [".$strSQL1."]");
				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
				echo "<script language='javascript'>alert('ลบเรียบร้อย');</script>";
				echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=4'>";}
				else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ผิดพลาด กรุณาทำรายการใหม่');</script>";
					echo "<meta http-equiv='refresh' content='0;URL=manageall.php?type=4'>";}
		
	    }
	 ?>
	<!-- จัดการครู -->
      
     <? if($_POST['type'] == 4 or $_GET['type'] == 4){?>	
	 <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
     		<tr >
            	<td colspan="5" class="tbl23" style="white-space: nowrap;" align="center">+ เพิ่มครู</td>
            </tr>
            <form name="fm" method="post" action="manageall.php?action=addteacher">
            <tr>
           	  <td colspan="4" align="center" class="tblyy2" ><strong>ชื่อครู/อาจารย์</strong></td>         
              <td colspan="1" width="11%"  align="center" class="tblyy2" ><strong>บันทึก</strong></td>
            </tr>
            <tr>
              <td colspan="4" align="center" class="tblyy" >
              <input type="text" name="nameteacher" style="width:200px" />
				<input type="radio" name="status_teacher" value="1" checked />เปิด
				<input type="radio" name="status_teacher" value="0"/>ปิด
            </td>
            <td colspan="1" align="center" class="tblyy" ><input type="submit" name="submit" value="บันทึก" /></td>
           	</tr>
            </form>
        	<tr >
            	<td colspan="5" class="tbl23" style="white-space: nowrap;" align="center">ข้อมูลครู / อาจารย์</td>
            </tr>
            <tr>
           	  <td width="6%" align="center" class="tbl23" >ลำดับ </td>
           	  <td width="71%" align="center" class="tbl23" >ชื่อครู/อาจารย์</td>
           	  <td width="71%" align="center" class="tbl23" >สถานะ</td>
              <td width="12%" align="center" class="tbl23" >แก้ไข </td>
           	  <td align="center" class="tbl23" >ลบ</td>
            </tr>
            <form name="fm2" method="post" action="manageall.php?teacherid=<?=$_GET['teacherid'];?>&action=editteacher">
            <?
			$th = 0;
			$query_th = mysql_query("SELECT *
									FROM teacher
									ORDER BY teacher.teacherid ASC",$connect_school);
			while($result_th = mysql_fetch_array($query_th)){
					$th++;
					if ($th % 2 == 0){$tblyy = "tblyy2";}else{$tblyy = "tblyy";}
					?>
            <tr>
           	  <td align="center" class="<?=$tblyy?>" ><?=$th?></td>
              <td align="center" class="<?=$tblyy?>" >
			  <? if($_GET['action'] == 'editteacher2' && $_GET['teacherid'] == $result_th['teacherid'] ){?>
			 	<input type="text" name="nameteacher" value="<?=$result_th['teachername']?>" />
			  <? }else{?><?=$result_th['teachername']?><? } ?>
             </td>
             <td align="center" class="<?=$tblyy?>" >
			  <? if($_GET['action'] == 'editteacher2' && $_GET['teacherid'] == $result_th['teacherid'] ){?>
			 	<input type="radio" name="status_teacher" <?php if ($result_th['status_teacher'] == 1 ) echo "checked";?> value="1">เปิด
				<input type="radio" name="status_teacher" <?php if ($result_th['status_teacher'] == 0 ) echo "checked";?> value="0">ปิด
			  <? }else{?><? if($result_th['status_teacher'] == 1){echo "เปิด";}else{echo "ปิด";}?><? } ?>
             </td>
             <!-- <input type="text" name="map_id_self" value="<?=$result_th['map_id_self']?>"> -->
             
             <td align="center" class="<?=$tblyy?>" >
             <? if($_GET['action'] == 'editteacher2' && $_GET['teacherid'] == $result_th['teacherid'] ){?>
              	<input type="submit" name="submit" value="บันทึก" />
              <? }else{ ?>
              <a href="manageall.php?teacherid=<?=$result_th['teacherid'];?>&action=editteacher2&type=4&map_id_self=<?=$result_th['map_id_self']?>">แก้ไข</a>
              <? }?>
              </td>
              <td align="center" class="<?=$tblyy?>" >
              	<a href="manageall.php?teacherid=<?=$result_th['teacherid'];?>&action=delteacher&map_id_self=<?=$result_th['map_id_self']?>">ลบ</a></td>
            </tr>
            <? } ?>
            </form>
       </table> 
	  
	 <? }?>
  
</div>
</div>
</body>
</html>
<?php mysql_close();?>