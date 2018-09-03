<? 
	ob_start();
	session_start();
	include("config.inc_multidb.php");
	include("funtion.php");
	include("ck_session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<? include("script_link.php");?>
<script type="text/javascript">

/*$(document).ready(function(){
	var id_card = $.urlParam('id_card');
	//alert(id_card);
	
});

$.urlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	if (results==null){
		return null;
	}
	else{
		return results[1] || 0;
	}
}*/

</script>
</head>

<body>
<!-- START PAGE SOURCE -->
<div id="container">
	<? include('menu.php')?>
    <div id="content">
	<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
    <?php
		$id_card = $_GET['id_card'];
		if($id_card != ""){
			$query_card_fck = mysql_query("SELECT * FROM hms_card WHERE id_card = '".$id_card."'", $connect_school);
			$result_card_fck = mysql_fetch_array($query_card_fck);
			
			$ck_dayExpire_point = DateDiff(date('Y-m-d'), $result_card_fck['date_expirePoint']);
			if($ck_dayExpire_point < 0){
				$newPoint = 0;
				$str_up_point = "UPDATE hms_card SET ";
				$str_up_point .="point = '".$newPoint."' ";
				$str_up_point .="WHERE id_hms = '".$result_card_fck['id_hms']."' ";
				$OQ_up_point = mysql_query($str_up_point, $connect_school);
			}
			
			$query_card = mysql_query("SELECT * FROM hms_card WHERE id_card = '".$id_card."'", $connect_school);
			$result_card = mysql_fetch_array($query_card);
			
			if(empty($result_card)){
				echo "<script language='javascript'>alert('ขออภัย บัตรของท่านยังไม่ถูกลงทะเบียน');</script>";
				echo "<script>window.location='HMScardscan.php';</script>";
			}else if($result_card['status'] == '4'){
				echo "<script language='javascript'>alert('ขออภัย ท่านได้สมัครบัตรใหม่แล้ว');</script>";
				echo "<script>window.location='HMScardscan.php';</script>";
			}else if($result_card['status'] == '7'){
				echo "<script language='javascript'>alert('ขออภัย บัตรนี้ถูกแจ้งเลิกใช้แล้ว');</script>";
				echo "<script>window.location='HMScardscan.php';</script>";
			}
			
			$query_hmsall = mysql_query("SELECT * FROM hms_allstudent WHERE id = '".$result_card["id_allstudent"]."'", $connect_school);
			$result_hmsall = mysql_fetch_array($query_hmsall);
			
			if($result_hmsall["school_studentid"] != '0'){
				$query_std = mysql_query("SELECT * FROM student WHERE studentid = '".$result_hmsall["school_studentid"]."'", $connect_school);
				$result_std = mysql_fetch_array($query_std);
				$name_stud = $result_std['studentname'];
			}else if($result_hmsall["school_studentid"] == '0' && $result_hmsall["selfdb_studentid"] != '0'){
				
				$query_std = mysql_query("SELECT * FROM student WHERE studentid = '".$result_hmsall["selfdb_studentid"]."'", $connect_self);
				$result_std = mysql_fetch_array($query_std);
				$name_stud = $result_std['name'];
			}
			
			if($result_card['status'] == '2' && $_GET['ac'] == 'chengpoint' && $_GET['rid'] != ''){
				
				$query_rw = mysql_query("SELECT * FROM hms_rewards WHERE id = '".$_GET['rid']."'", $connect_school);
				$result_rw = mysql_fetch_array($query_rw);
				
				$newPoint_hc = $result_card['point'] - $result_rw['use_point'];
				if($newPoint_hc >= 0){
					//insert log cheng point
					$lcp_id_hms = $result_card['id_hms'];
					$lcp_id_rewards = $_GET['rid'];
					$lcp_date = date('Y-m-d');
					$lcp_id_staff = $_SESSION['accid_cardpro'];
					
					$sql_lcp = "INSERT INTO hms_logchengpoint (";
					$sql_lcp .= "id_hms";
					$sql_lcp .= ", id_rewards";
					$sql_lcp .= ", date";
					$sql_lcp .= ", id_staff";
					$sql_lcp .= ") values (";
					$sql_lcp .= "'$lcp_id_hms'";
					$sql_lcp .= ", '$lcp_id_rewards'";
					$sql_lcp .= ", '$lcp_date'";
					$sql_lcp .= ", '$lcp_id_staff'";
					$sql_lcp .= ")"; 
					$dbquery_lcp = mysql_query($sql_lcp, $connect_school) or die ("Error Query [".$sql_lcp."]");
					
					//update hms_card
					
					$str_up_hc = "UPDATE hms_card SET ";
					$str_up_hc .="point = '".$newPoint_hc."' ";
					$str_up_hc .="WHERE id_hms = '".$result_card["id_hms"]."' ";
					$OQ_up_hc = mysql_query($str_up_hc, $connect_school);
					
					/*echo "<script>window.location='HMS_CardDetail.php?id_card=$id_card';</script>";*/
					$query_card = mysql_query("SELECT * FROM hms_card WHERE id_card = '".$id_card."'", $connect_school);
					$result_card = mysql_fetch_array($query_card);
					
					echo "<script>window.location='HMS_CardDetail.php?id_card=$id_card';</script>";
				}else{
					echo "<script language='javascript'>alert('ขออภัย บัตรไม่สามารถแลก point ได้');</script>";
					echo "<script>window.location='HMScardscan.php';</script>";
				}
				
			}else if($_GET['ac'] == 'chengpoint' && $result_card['status'] != '2'){
				echo "<script language='javascript'>alert('ขออภัย บัตรไม่สามารถแลก point ได้');</script>";
				echo "<script>window.location='HMScardscan.php';</script>";
			}else if($_GET['ac'] == 'uplcp' && $_GET['id_lcp'] != ''){
				$str_uplcp = "UPDATE hms_logchengpoint SET ";
				$str_uplcp .="status = '2' ";
				$str_uplcp .=", date_receive = '".date('Y-m-d')."' ";
				$str_uplcp .="WHERE id = '".$_GET['id_lcp']."' ";
				$OQ_uplcp = mysql_query($str_uplcp, $connect_school);
				//echo $str_uplcp;
				echo "<script>window.location='HMS_CardDetail.php?id_card=$id_card';</script>";
			}
	?>
    <tr>
    <td colspan="3" class="tbl23" style="white-space: nowrap;" align="center"  height="">ข้อมูลนักเรียน <a href="">all</a></td>
    </tr>
    <tr>
          <td width="14%"  height="" colspan="" align="right" class="tblyy" style="white-space: nowrap;">
          รหัสบัตร : </td>
          <td width="72%"  height="" colspan="" align="left" class="tblyy" style="white-space: nowrap;">
          <font color="#0099FF"><?=$id_card;?></font>
          </td>
          <td width="14%"  height=""  rowspan="9" align="left" class="tblyy" style="white-space: nowrap;"> <img src="images/hmscard.png" width="132" height="200"/></td>
    </tr>

    <tr>
          <td width="14%"  height="" colspan="" align="right" class="tblyy" style="white-space: nowrap;">
          วันทำบัตร : </td>
          <td width="72%"  height="" colspan="" align="left" class="tblyy" style="white-space: nowrap;">
          <font color="#0099FF"><?=DateThai($result_card['start_date']);?></font>
          </td>
    </tr>
    <tr>
          <td width="14%"  height="" colspan="" align="right" class="tblyy" style="white-space: nowrap;">
          วันหมดอายุ point : </td>
          <td width="72%"  height="" colspan="" align="left" class="tblyy" style="white-space: nowrap;">
          <font color="#0099FF"><?=DateThai($result_card['date_expirePoint']);?></font><!--<?php if($result_card['status']=='3' || $result_card['status']=='6'){?><input type=button onClick="parent.location='HMS_CardRenewal.php'" value='ต่ออายุ POINT'/><?php }?>-->
          </td>
    </tr>
    
      <tr>
          <td width="14%"  height="" colspan="" align="right" class="tblyy" style="white-space: nowrap;">
          รหัสนักเรียน : </td>
          <td width="72%"  height="" colspan="" align="left" class="tblyy" style="white-space: nowrap;">
          <font color="#0099FF">
		  <?php
          	if($result_hmsall["school_studentid"]!='0'){echo $result_hmsall["school_studentid"];}
			else{echo $result_hmsall["selfdb_studentid"];}
		  ?></font>
          </td>
     </tr>
     <tr>
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อ - นามสกุล : </td>
		  
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$result_hmsall['name'];?></font>
          </td>
      </tr>
      <tr>
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          POINT : </td>
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#FF0000"> <?=$result_card["point"];?></font>
          </td>
      </tr>
      <tr>
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          วันหมดอายุ point : </td>
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#FF0000"> <?=DateThaiDMY($result_card["date_expirePoint"]);?></font>
          </td>
      </tr>
      <tr>
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          รับแลกสิทธิตามโปนโมชั่น : </td>
          
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
              <table>
                  <tr>
					  <?php if($result_card["point"]>=2){?>
                      <td><a href="HMS_CardDetail.php?id_card=<?=$id_card?>&ac=chengpoint&rid=1" onclick="return confirm('กรุณายืนยันการแลก ถุงผ้า ใช้ 2 point !!!')">
                      <img src="images/bag.png" height="200" /></a></td>
                      <?php }if($result_card["point"]>=3){?>
                      <td><a href="HMS_CardDetail.php?id_card=<?=$id_card?>&ac=chengpoint&rid=2" onclick="return confirm('กรุณายืนยันการแลก หมวก ใช้ 3 point !!!')">
                      <img src="images/hat.png" height="200" /></a></td>
                      <?php }if($result_card["point"]>=4){?>
                      <td><a href="HMS_CardDetail.php?id_card=<?=$id_card?>&ac=chengpoint&rid=3" onclick="return confirm('กรุณายืนยันการแลก เสื้อ ใช้ 4 point !!!')">
                      <img src="images/coat.png" height="200" /></a></td>
                      <?php }if($result_card["point"]>=5){?>
                      <td><a href="HMS_CardDetail.php?id_card=<?=$id_card?>&ac=chengpoint&rid=4" onclick="return confirm('กรุณายืนยันการแลก กระเป๋าเป้ ใช้ 5 point !!!')">
                      <img src="images/backpack.png" height="200" /></a></td>
                      <?php }if($result_card["point"]>=6){?>
                      <td><a href="HMS_CardDetail.php?id_card=<?=$id_card?>&ac=chengpoint&rid=5" onclick="return confirm('กรุณายืนยันการแลก ลดราคา 7% ใช้ 0 point !!!')">
                      <img src="images/discount.png" height="200" /></a></td>
					  <?php }?>
                  </tr>
              </table>
          </td>
      </tr>
      <tr>
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="right"  height="">ประวัติการแลกสิทธิ : </td>
          <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
              <table >
              	<?php
					$query_loc = mysql_query("SELECT * FROM hms_logchengpoint WHERE id_hms = '".$result_card['id_hms']."' ORDER BY id DESC", $connect_school);
					while($result_loc = mysql_fetch_array($query_loc)){	 
				?>
                <tr>
                    <td>วันที่ <U><?=DateThaiDMY($result_loc['date']);?></U>&nbsp;&nbsp;  
                    <?php
						 $query_rewards = mysql_query("SELECT * FROM hms_rewards WHERE id = '".$result_loc['id_rewards']."'", $connect_school);
						 $result_rewards = mysql_fetch_array($query_rewards);
						 echo 'ใช้ <U>'.$result_rewards['use_point']." POINT</U> แลก <U>".$result_rewards['rewards'].'</U>';
					?> 
                    สถานะ <font color="#FF0000"><U>
					<?php 
						if($result_loc['status'] == '1'){
							echo 'รอรับของ';
						}else if($result_loc['status'] == '2'){
							echo 'รับของแล้ว '.DateThaiDMY($result_loc['date_receive']);
						}
					?></U></font>
                    <?php if($result_loc['status'] == '1'){?>
                    	<button type="button" onclick="JavaScript:if(confirm('ยืนยันการรับของ?')==true){window.location='HMS_CardDetail.php?ac=uplcp&id_card=<?=$_GET['id_card']?>&id_lcp=<?=$result_loc['id'];?>'}">รับของแล้วคลิก!!</button>
                        <input type=button onClick="parent.location='HMS_PrinBillExchange.php?id_lcp=<?=$result_loc['id'];?>'" value='Print ใบรับของ'/>
                    <?php }?>
                    </td>
                </tr>
                <?php }?>
                <!--<tr>
                    <td>วันที่ ___________  2 POINT แลก กระเป๋าถือ <input type=button onClick="parent.location='HMS_PrinBillExchange.php'" value='Print ใบรับของ'/>
                    สถานะ <font color="#FF0000">รับของแล้ว</font>(วันที่ ___________)
                    </td>
                </tr>-->
            </table>
          </td>
      </tr>
      <tr>
          <td colspan="3" class="tblyy" style="white-space: nowrap;" align="center"  height="">
          <input type="button" onClick="parent.location='HMS_student.php?id_hms=<?=$result_card_fck['id_allstudent']?>'" value='ดูประวัติการเรียนทั้งหมด'/>
          <button type="button" onClick="parent.location='self/manageaccount.php?id_hmsall=<?=$result_card_fck['id_allstudent']?>'" >สมัครคอร์สเรียน Self</button>
          </td>
      </tr>
<? }else{
	echo "<script language='javascript'>alert('ขออภัย บัตรของท่านยังไม่ได้ลงทะเบียน');</script>";
	echo "<script>window.location='HMScardscan.php';</script>";
}?>
</table>
</div>
</div>
<div id="dialog" title="สแกนบัตร" align="center">
	<img src="images/taaaa.png" width="400"/>
	<input id="idcard_textbox" type="text" size="40" />
</div>
</body>
</html>
<?php mysql_close();?>