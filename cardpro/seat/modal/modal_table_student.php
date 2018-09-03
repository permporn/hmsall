<?php

if($_GET['id_subject'] ==''){$id_subject_table = 0;}else{$id_subject_table = $_GET['id_subject'];}
	                $strSQL_learn = "SELECT
									seat_log.id AS seat_log_id,
									seat_log.seat_no AS seat_no,
									seat_log.`status` AS seat_status,
									`subject`.subid,
									`subject`.subcode,
									learn.studentid,
									student.studentname,
									learn.learnid AS learn_id
									FROM
									seat_log
									LEFT JOIN `subject` ON `subject`.subid = seat_log.subject_id
									LEFT JOIN learn ON learn.subcode = `subject`.subcode AND learn.id_year = `subject`.id_year AND learn.seat = seat_log.seat_no
									INNER JOIN student ON student.studentid = learn.studentid
									WHERE `subject`.subid = ".$id_subject_table."
									ORDER BY seat_log.seat_no ASC";
					$objQuery_learn = mysql_query($strSQL_learn) or die ("Error Query [".$strSQL_learn."]");
					?>
<form method="get" id="datatable-form">
	<div class="modal fade" id="myModalDatatable" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	    <button type="button" class="close closeDatatable" data-dismiss="modal">&times;</button>
	    <h4 class="modal-title">รายชื่อที่เรียนวิชา <?=$objResult_subject['subname'];?>
	    
	  </div>
	<div class="modal-body">
	    <table id="datatable" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="col-md-1"><center>ที่นั่ง</center></th>
                    <th class="col-md-10">ชื่อนักเรียน</th>
                    <th class="col-md-1"><center>ลบ</center></th>
                    <th class="col-md-1"><center>print</center></th>
                </tr>
            </thead>
            <tbody>
           <?php while ( $objResult_learn = mysql_fetch_array($objQuery_learn)) {?>

                <tr>
                    <td align="center"><?=$objResult_learn['seat_no'];?></td>
                    <td><?=$objResult_learn['studentname'];?></td>
                    <?php 
                    $link_print = "form_print.php?id_subject=".$objResult_learn['subid']."&studentid=".$objResult_learn['studentid']."&subject_code=".$objResult_learn['subcode'];

                    $link_remove = "?id_subject=".$objResult_learn['subid']."&mode=remove_learn&id_learn=".$objResult_learn['learn_id']."&seat_log_id=".$objResult_learn['seat_log_id'];
                    ?>
                    <td align="center"><a href="<?=$link_remove?>" onclick="return confirm('ยืนยันการลบ')">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>

                    <td align="center"><a href="<?=$link_print?>" >
                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span></a></td>
                </tr>
           <?php }?>    
            </tbody>
        </table>         
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-warning download" id="download" data-dismiss="modal" id="download">
	    <span class="glyphicon glyphicon-cloud-download" aria-hidden="true" ></span> download</button></h4>
	    <button type="button" class="btn btn-default closeDatatable" data-dismiss="modal" id="closeDatatable">Close</button>
	  </div>
	</div>
	</div>
	</div>
</form>	
<!-- End Modal-form Datatable--> 