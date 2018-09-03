<?
session_start();
include("../ck_session.php");
include('../config/config_db_self.php');
?>
<script type="text/javascript">
$(function() {
    $('table#datatable').DataTable( {
        "dom": 'Bfrtip',
        "lengthMenu" : [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        "buttons": ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/ ,'pageLength'],
        "iDisplayLength": 50,
        "order": [[ 0, "desc" ]],
        stateSave: true
    });
    
});

function clearLogin(id){

    $("#loading").html("<img src='images/loading.gif' width='50px'/>");
    var request = $.ajax({
        url: "managment.php",
        method: "GET",
        data: { id : id , action_type : "updateReserve"}
    });
    request.done(function( result ) {
        //console.log(result);
        $.ajax({
            type: "POST",
            url: "form/form_login_self_management.php",
            data: {},
            success: function(data){
                ///console.log(data);
                $("#loading").hide();
                $("#data-table").html(data);
            } 
        });
    });
}

function show_alert(text) {
    if(confirm(text)){
        return true;//document.forms[0].submit();
    }else{
        return false;
    }
}

</script>
<?php
    $strSQL ="SELECT reserve.reservid, reserve.time, account.username, student.name,  reserve.checkin, reserve.section, reserve.checkout, reserve.section_s, reserve.section_e,  reserve.branchid, branch.name AS branch_name
            FROM  reserve 
            LEFT JOIN account ON account.accid = reserve.accid
            LEFT JOIN student ON account.studentid = student.studentid
            LEFT JOIN branch ON reserve.branchid = branch.branchid
            WHERE  reserve.time >=  '".date('Y-m-d')."' AND student.name IS NOT NULL  ORDER BY reserve.time ASC ";//LIMIT 10
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    //echo $strSQL;
    mysql_close($conn);
?>
<div class="panel panel-default">
<div class="panel-heading"><h4><span class="glyphicon glyphicon-list" aria-hidden="true"></span> รายการทั้งหมด </h4></div>
<div class="panel-body">
<div id="loading"></div>
<table id="datatable" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><center>#id</center></th>
            <th class=""><center>วันที่จอง</center></th>
            <th class="">เวลาเริ่ม</th>
            <th class="">เวลาสิ้นสุด</th>
            <th class="">Username</th>
            <th class="">ชื่อ - นามสกุล</th>
            <th class="">สาขา</th>
            <th class="">เวลา Login</th>
            <th class="">เวลา Logout</th>       
            <th class=""><center>Action Admin</center></th>
        </tr>
    </thead>
    <? $i = 1;
        while ( $objResult = mysql_fetch_array($objQuery)) {
            // time start
            $time_s = 8 + floor(($objResult["section_s"]-1)/2); 
            if($objResult["section_s"]%2==1){
                $min_s="00";
            }else{
                $min_s="30";
            }
            // time end
            $time_e = 8 + floor(($objResult["section_e"]-1)/2);    
            if($objResult["section_e"]%2==1){
                $min_e="00";
            }else{
                $min_e="30";
            }
            ?>
        <tr>
            <td><center><?=$objResult['reservid'];?></center></td>
            <td><center><?=$objResult['time'];?></center></td>
            <td><center><?=$time_s.":".$min_s;?></center></td>
            <td><center><?=$time_e.":".$min_e;;?></center></td>
            <td><?=$objResult['username'];?></td>
            <td><?=$objResult['name'];?></td>
            <td><?=$objResult['branch_name']?></td>
            <td><?=$objResult['checkin'];?></td>
            <td><?=$objResult['checkout'];?></td>
            <td><center>
                <button type="button" onclick="clearLogin(<?=$objResult['reservid']?>)" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span> Clear login</button>
            </center></td>
        </tr>
    <? $i++; }?>
</table>
</div>
</div>