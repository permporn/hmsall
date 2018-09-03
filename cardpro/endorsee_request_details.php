<?php
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include("config.inc.php");
include("funtion.php");
date_default_timezone_set('Asia/Bangkok');

if($_SESSION["accid_cardpro"] == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('session ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
}else{
	$strSTT = "SELECT * FROM account WHERE accid = '".$_SESSION["accid_cardpro"]."'";
	$objQuerySTT = mysql_query($strSTT);
	$objResultSTT = mysql_fetch_array($objQuerySTT);
	
	$objQuery_bname = mysql_query("SELECT * FROM branch WHERE branchid = '".$objResultSTT["branchid"]."'");
	$objResult_bname = mysql_fetch_array($objQuery_bname);
	
	$objQuery_Req = mysql_query("SELECT * FROM ptt_request WHERE id = '".$_GET["id"]."'");
	$objResult_Req = mysql_fetch_array($objQuery_Req);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php')?>
  <div id="content">
  <br /><br />
   <p>
   <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
       <tr>
               			<td class="tblyy3" colspan="2" align="center"><strong> คำร้อง
                        <?
                            $query_tname = mysql_query("SELECT name_type FROM ptt_type WHERE id = '".$objResult_Req["type"]."'");
                            $result_tname = mysql_fetch_array($query_tname);
                            echo $result_tname["name_type"];
                        ?></strong> (เลขใบคำร้องที่ : <?=$objResult_Req["id"]?> ) 
                        </td>
            		</tr>
           		 	<tr>
                  		<td class="tblyy4" colspan="2">
                        <p align="right"><strong>วันที่บันทึก </strong><?=DateThai($objResult_Req["date_insert"])?></p>
            			<p align="right"><strong>วันที่ร้องขอ </strong><?=DateThaiDMY($objResult_Req["date_request"])?></p>
                        <p><strong>เรื่อง </strong><?=$objResult_Req["subject"]?></p>
                        <p><strong> เรียน </strong><?=$objResult_Req["request_to"]?></p>
                      	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>ข้าพเจ้า </strong><?=$objResult_Req["name"]?> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong> เบอร์ติดต่อ</strong> <?=$objResult_Req["tel"]?></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong> มีความประสงค์ </strong><font color="#0099FF">
						<?php
							echo $objResult_Req["wishes"];
                        	if($objResult_Req["type"]=="4"){
								//echo $objResult_Req["wishes"];
							}else if($objResult_Req["type"]=="1"){
								echo "ขอคืนคอร์ส ชื่อคอร์ส : ".$objResult_Req["course_name"]. " รหัสคอร์ส : ".$objResult_Req["course_code"]. " ราคา : ".$objResult_Req["course_price"];
							}else if($objResult_Req["type"]=="2"){
								echo "ขอย้าย,เปลี่ยนคอร์ส จากเดิมคอร์ส : ".$objResult_Req["course_name"]. " รหัสคอร์ส : ".$objResult_Req["course_code"]. " ราคา : ".$objResult_Req["course_price"]."<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เปลี่ยนเป็นคอร์ส : ".$objResult_Req["course2_name"]. " รหัสคอร์ส : ".$objResult_Req["course2_code"]. " ราคา : ".$objResult_Req["course2_price"];
							}else if($objResult_Req["type"]=="3"){
								echo "แจ้งสลิปหลักฐานการสมัครหาย ชื่อคอร์ส : ".$objResult_Req["course_name"]. " รหัสคอร์ส : ".$objResult_Req["course_code"]. " ราคา : ".$objResult_Req["course_price"];
							}
							
						?>
                        </font></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong> เนื่องจาก </strong><font color="#0099FF"><?=$objResult_Req["because"]?></font></p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>จึงเรียนมาเพื่อโปรดพิจารณา</strong></p>
                        <p align="right" style="padding-bottom:15px"><strong> ขอแสดงความนับถือ</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <br /><br />(ลงชื่อ).................................................
                          <br /><br />(.................................................)</p>
                        
                          
              </td>
            </tr>
            
            
            </table>
         

            <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
            <tr>
                <td class="tblyy3" colspan="2">
               <strong> 1. ผู้รับเรื่อง </strong>
               <font color="#3399FF">
               เจ้าหน้าที่
                <?
                    $query_AcName = mysql_query("SELECT * FROM account WHERE accid = '".$objResult_Req["accid_user"]."'");
                    $result_AcName = mysql_fetch_array($query_AcName);
                    
                    $query_AcNameB = mysql_query("SELECT * FROM branch WHERE branchid = '".$result_AcName["branchid"]."'");
                    $result_AcNameB = mysql_fetch_array($query_AcNameB);
                    echo $result_AcName["name"]." (".$result_AcNameB["branchname"].")";
                ?>
                </font>
                </td>
            </tr>
            <? if($objResult_Req["status"]==1 || ($_GET["editAp"]=="edit" && ($objResult_Req["status"]==2 || $objResult_Req["status"]==3 ))){?>
            <form name="form" method="post" action="endorsee_request_insert.php?ac=approval&id=<?=$_GET["id"]?>">
            <tr>
                <td class="tblyy3" colspan="2" >
                <p><strong>2. คำสั่งโรงเรียนกวดวิชาคณิตศาสตร์ อ.โต้ง</strong></p>
                </td>
            </tr>
            <tr>
                <td class="tblyy4" colspan="2" >
                <p><input type="radio" name="approval" id="approval" value="1" <? if($objResult_Req["status"]==1 || $objResult_Req["approval"]=="1"){?>checked="checked"<? }?>/> อนุมัติ</p>
                <p><input type="radio" name="approval" id="approval" value="0" <? if($objResult_Req["approval"]=="0"){?>checked="checked"<? }?>/>
                 ไม่อนุมัติ เนื่องจาก <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <textarea name="because_not_approval" id="because_not_approval" cols="45" rows="5"><?=$objResult_Req["because_not_approval"]?></textarea>
                </p>
             
                <p align="right" style="padding-bottom:10px">ผู้อนุมัติ 
                <? 
                    if($objResult_Req["status"]==1){
                        echo ".......................................................";
                    }else if($objResult_Req["status"]>=2){
                        $query_ApName = mysql_query("SELECT * FROM account WHERE accid = '".$objResult_Req["accid_endorsee"]."'");
                        $result_ApName = mysql_fetch_array($query_ApName);
                        
                        $query_ApNameB = mysql_query("SELECT * FROM branch WHERE branchid = '".$result_ApName["branchid"]."'");
                        $result_ApNameB = mysql_fetch_array($query_ApNameB);
                        echo "โดย ".$result_ApName["name"]." (".$result_ApNameB["branchname"].")";
                    }
				?></p>
                </td>
             	</tr>
           <tr>
                <td class="tblyy3" colspan="2">
                <p><strong>2.1 กรอกรายละเอียดค่าใช้จ่าย</strong></p>
                </td>
           </tr>
           <tr>
                <td width="71%"  colspan="1" align="right" class="tblyy4" >จำนวนเงินที่จ่ายเพิ่ม: </td>
                <td width="29%"  colspan="1" class="tblyy4" ><input type="text" name="money_pay" id="money_pay" value="<?=$objResult_Req["money_pay"]?>" />บาท</td>
           </tr>
           <tr>
             	<td  colspan="1" class="tblyy4" align="right">จำนวนเงินที่คืน: </td>
                <td  colspan="1" class="tblyy4" ><input type="text" name="money_repay" id="money_repay" value="<?=$objResult_Req["money_repay"]?>" />บาท</td>
           </tr>
           <tr>
            	<td width="71%"  colspan="1" align="right" class="tblyy4" >หักค่าธรรมเนียม </td>
				<td width="71%"  colspan="1" align="" class="tblyy4" ><input type="text" name="money_fee" id="money_fee" value="<?=$objResult_Req["money_fee"]?>" /> บาท</td>
            </tr>
           <tr>
             	<td  colspan="1" class="tblyy4" align="right">ไม่คิดค่าบริการ: </td>
                <td  colspan="1" class="tblyy4" ><input type="checkbox" name="type_pay" id="type_pay" value="free" <? if($objResult_Req["type_pay"]=="free"){?>checked="checked"<? }?> > Free</td>
           </tr>
           <tr>
                <td  colspan="2" class="tblyy4" >
                <div align="center" style="padding-top:5px; padding-bottom:5px">
                <input type="submit" name="Submit" value="บันทึก" style="width:70px"/>
          		<input type="button" name="cmdweblogin" class="button" value="กลับ" onClick="window.location='endorsee_home.php'" style="width:70px"/>
                </div>
          		</td>
          	</tr>
          </form>
          </table>
          
          
     <? }else if($objResult_Req["status"]>=2 && $_GET["editAp"]==""){//show detail ?>
      <form name="form" method="post" action="endorsee_request_details.php?editAp=edit&id=<?=$_GET["id"]?>">
    		<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
            <tr>
                <td class="tblyy3" colspan="2"><strong>2.คำสั่งโรงเรียนกวดวิชาคณิตศาสตร์ อ.โต้ง</strong></td>
            </tr>
            <tr>
                <td class="tblyy4" colspan="2" >
                <p><input type="radio" name="approval" id="approval" <? if($objResult_Req["approval"]=="1"){?>checked="checked"<? }?> disabled="disabled"/> อนุมัติ</p>
                <p><input type="radio" name="approval" id="approval" <? if($objResult_Req["approval"]=="0"){?>checked="checked"<? }?> disabled="disabled"/>
                 ไม่อนุมัติ เนื่องจาก <? if($objResult_Req["approval"]=="0"){echo $objResult_Req["because_not_approval"];}else{echo "...............";}?></p>
                 <p align="right" style="padding-bottom:10px"><strong>ผู้อนุมัติ</strong> 
                <?
                    $query_ApName = mysql_query("SELECT * FROM account WHERE accid = '".$objResult_Req["accid_endorsee"]."'");
                    $result_ApName = mysql_fetch_array($query_ApName);
                    
                    $query_ApNameB = mysql_query("SELECT * FROM branch WHERE branchid = '".$result_ApName["branchid"]."'");
                    $result_ApNameB = mysql_fetch_array($query_ApNameB);
                    echo $result_ApName["name"]." (".$result_ApNameB["branchname"].")";
                ?> </p>
            	</td>
            </tr>
            <tr>
                <td class="tblyy3" colspan="2">
                <p><strong>2.1 กรอกรายละเอียดค่าใช้จ่าย</strong></p>
                </td>
           </tr>
           
            <? if($objResult_Req["approval"]=="1"){?>
            <tr>
                <td width="71%"  colspan="1" align="right" class="tblyy4" >จำนวนเงินที่จ่ายเพิ่ม</td>
				<td width="71%"  colspan="1" align="right" class="tblyy4" ><?=number_format($objResult_Req["money_pay"])?> บาท</td>
            </tr>
            <tr>
            	<td width="71%"  colspan="1" align="right" class="tblyy4" >จำนวนเงินที่คืน</td>
				<td width="71%"  colspan="1" align="right" class="tblyy4" ><?=number_format($objResult_Req["money_repay"])?> บาท</td>
            </tr>
            <tr>
            	<td width="71%"  colspan="1" align="right" class="tblyy4" >หักค่าธรรมเนียม </td>
				<td width="71%"  colspan="1" align="right" class="tblyy4" ><?=number_format($objResult_Req["money_fee"])?> บาท</td>
            </tr>
            <tr>
            	<td width="71%"  colspan="1" align="right" class="tblyy4" >ไม่คิดค่าบริการ</td>
				<td width="71%"  colspan="1" align="right" class="tblyy4" ><input type="checkbox" <? if($objResult_Req["type_pay"]=="free"){?>checked="checked"<? }?> disabled="disabled" />
Free</td>
			<tr>
			<? $sum = ($objResult_Req["money_pay"]+ $objResult_Req["money_fee"]) - $objResult_Req["money_repay"]?>
            <? if($sum >= 0){?> 
            <td width="62%" colspan="1" align="right" class="tblyy4"  height="20">รวมเงินชำระ</td>
            <td width="17%" colspan="1" align="right" class="tblyy4"><?=number_format($sum)?> บาท</td>
            <? }else{?>
            <td width="62%" colspan="1" align="right" class="tblyy4"  height="20">รวมคืนเงิน</td>
            <td width="17%" colspan="1" align="right" class="tblyy4"><?=number_format(substr("$sum",1));?> บาท</td>
            <? }?>
           
            </tr>

            
            </table>
	   </form>
       
         <? }if($objResult_Req["status"]==2 || $objResult_Req["status"]==3){?>  
         <form name="form" method="post" action="endorsee_request_details.php?editAp=edit&id=<?=$_GET["id"]?>">
            <div align="center" style="margin-top:20px; margin-bottom:20px"><input type="submit" name="Submit1" value="แก้ไขการอนุมัติ"></div>
          </form>
      	 <? }?>     
        
        <? if($objResult_Req["status"]==2 && $objResult_Req["type_pay"]!="free"){?>
        <form name="form_money" action="endorsee_request_insert.php?id=<?=$_GET["id"]?>&ac=money" method="post">
        <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
            <tr>
                <td class="tblyy3" colspan="2"><strong>2.2 ยืนยันการรับเงิน</strong></td>
            </tr>
            <tr>
                <td class="tblyy4" colspan="1" align="left">ประเภทการจ่ายเงิน : </td>
                <td class="tblyy4" colspan="1" align="left">
                <input name="type_pay" type="radio" value="transfer" class="input4" checked="checked" />โอน&nbsp;			
                <input name="type_pay" type="radio" value="cradit" class="input4" /> บัตรเคดิต 
                <input name="type_pay" type="radio" value="monay" class="input4" /> เงินสด
                </td>
                </tr>
                <tr>
                <td class="tblyy4" colspan="1" align="left">หมายเลขใบเสร็จรับเงิน : </td>
                <td class="tblyy4" colspan="2" align="left">
                <input type="text" name="num_pay" id="num_pay" value="" /> 
                </td>
                </tr>
                <tr>
                <td class="tblyy4" colspan="1" align="left">วันที่รับเงิน : </td>
                <td class="tblyy4" colspan="2" align="left">
                <input type="date" name="date_money" id="date_money" value="<?=date('Y-m-d')?>" />
                <input type="hidden" id="accid_user_money" name="accid_user_money" value="<?=$_SESSION["accid_cardpro"]?>" />
                </td>
                </tr>
                <tr>
                <td class="tblyy4" colspan="2"  align="right">
                <input type="submit" name="Submit2" value="บันทึกการรับเงิน"><font color="#EE0000">* เมื่อตรวจเช็คจำนวนครบถ้วน ให้ยืนยันการรับเงินโดยการบันทึกวันที่</font>
            	</td>
            </tr>
         </table>
        </form>
        <? }else if($objResult_Req["status"]>=4 && $objResult_Req["type_pay"]!="free"){?>
        <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
            <tr>
                <td class="tblyy3" colspan="2"><strong>3.ข้อมูลผู้รับเงิน </strong>
                <a href="printprice.php?id=<?=$_GET["id"]?>">พิมพ์ใบเสร็จรับเงิน</a></td></tr>
            <tr>
                <td class="tblyy4" colspan="2"  align="right"> โดย 
			<?
                $query_MnName = mysql_query("SELECT * FROM account WHERE accid = '".$objResult_Req["accid_user_money"]."'");
                $result_MnName = mysql_fetch_array($query_MnName);
                
                $query_MnNameB = mysql_query("SELECT * FROM branch WHERE branchid = '".$result_MnName["branchid"]."'");
                $result_MnNameB = mysql_fetch_array($query_MnNameB);
                echo $result_MnName["name"]." (".$result_MnNameB["branchname"].")";
            ?>
        		</td>
            </tr>
            <tr>
                <td class="tblyy4" colspan="2"  align="right">วันที่รับเงิน <?=DateThaiDMY($objResult_Req["date_money"])?></td>
            </tr>
            <tr>
                <td class="tblyy4" colspan="2"  align="right">ชำระด้วย :
				<?
				if($objResult_Req["type_pay"] == "monay"){ echo "เงินสด";}
				if($objResult_Req["type_pay"] == "transfer"){ echo "โดนผ่านธนาคาร";}
				if($objResult_Req["type_pay"] == "cradit"){ echo "บัตรเคดิต";} ?></td>
            </tr>
            <tr>
                <td class="tblyy4" colspan="2"  align="right">หมายเลขใบเสร็จรับเงิน : <?=$objResult_Req["num_pay"]?></td>
            </tr>
        </table>
      <? }?> 
      
      <? if($objResult_Req["status"]==4 || $objResult_Req["status"]==6){?>
      
      <form name="form_final" action="endorsee_request_insert.php?id=<?=$_GET["id"]?>&ac=final" method="post">
         <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
            <tr>
                <td class="tblyy3" colspan="2"><strong>4.ยืนยันการดำเนินการ</strong></td>
            </tr>
             <tr>
                <td class="tblyy4" colspan="2" align="left">โดยทำการดำเนินการ: 
				
                </td></tr>
             <tr>
             	<td class="tblyy4" colspan="2" align="right"> 
                 กรอกข้อมูลเพิ่มเติม 
                <textarea name="results" id="results" cols="45" rows="5"></textarea>
                <input type="hidden" id="accid_payer" name="accid_payer" value="<?=$_SESSION["accid_cardpro"]?>" />
                <input type="submit" name="Submit3" value="ยืนยัน" style="width:100px">
           		</td>
             </tr>
         </table>
      </form>
      
      <p><? }else if($objResult_Req["status"]==5){?>
      <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
            <tr>
                <td class="tblyy3" colspan="2"><strong>4.ผู้ดำเนินการตามคำร้อง</strong></td>
            </tr>
            <tr>
                <td class="tblyy4" colspan="2" align="left">โดยทำการดำเนินการ: 
				<? 
				echo $objResult_Req["wishes"];
				if($objResult_Req["type"]=="1"){
					echo "ขอคืนคอร์ส ชื่อคอร์ส : ".$objResult_Req["course_name"]. " รหัสคอร์ส : ".$objResult_Req["course_code"]. " ราคา : ".$objResult_Req["course_price"];
				}else if($objResult_Req["type"]=="2"){
					echo "ขอขอย้าย,เปลี่ยนคอร์ส จากเดิมคอร์ส : ".$objResult_Req["course_name"]. " รหัสคอร์ส : ".$objResult_Req["course_code"]. " ราคา : ".$objResult_Req["course_price"]."<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เปลี่ยนเป็นคอร์ส : ".$objResult_Req["course2_name"]. " รหัสคอร์ส : ".$objResult_Req["course2_code"]. " ราคา : ".$objResult_Req["course2_price"];
				}else if($objResult_Req["type"]=="3"){
					echo "แจ้งสลิปหลักฐานการสมัครหาย ชื่อคอร์ส : ".$objResult_Req["course_name"]. " รหัสคอร์ส : ".$objResult_Req["course_code"]. " ราคา : ".$objResult_Req["course_price"];
				}
				?>
                
                </td></tr>
            <tr>
            <tr>
                <td class="tblyy4" colspan="2" align="left">รายละเอียดเพิ่มเติม: <?=$objResult_Req["results"]?></td></tr>
            <tr>
                <td class="tblyy4" colspan="2" align="right"> โดย 
				<?
                    $query_FnName = mysql_query("SELECT * FROM account WHERE accid = '".$objResult_Req["accid_payer"]."'");
                    $result_FnName = mysql_fetch_array($query_FnName);
                    
                    $query_FnNameB = mysql_query("SELECT * FROM branch WHERE branchid = '".$result_FnName["branchid"]."'");
                    $result_FnNameB = mysql_fetch_array($query_FnNameB);
                    echo $result_FnName["name"]." (".$result_FnNameB["branchname"].")";
                ?>
                เสร็จสมบูรณ์
                </td>
            </tr>
      </table>
      <? }?>
      
      <div align="center">
      <input type="button" name="cmdweblogin" class="button" value="กลับ" onClick="window.location='endorsee_home.php'" style="margin:10px; width:100px"/>
      </div>
      
      <? }?>
     </p>

</div>
</body>
</html>
<? }?>
<?php mysql_close();?>