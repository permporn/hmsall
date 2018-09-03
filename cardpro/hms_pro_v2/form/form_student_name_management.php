<?
// UPDATE student SET sex = 'Man' WHERE sex = ''
// SELECT `sex` FROM  `student` GROUP BY  `sex` 
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

function deleteStudentName(id){

    if(show_alert('ยืนยันการลบชื่อนักเรียน') != false){
        var sex = $('#sex').val();
        $("#loading").html("<img src='images/loading.gif' width='50px'/>");
        var request = $.ajax({
            url: "managment.php",
            method: "GET",
            data: { id : id , action_type : "deleteStudentName"}
        });
        request.done(function( result ) {
            $.ajax({
                type: "POST",
                url: "form/form_student_name_management.php",
                data: {sex : sex},
                success: function(data){
                    //console.log(data);
                    $("#data-table").html(data);
                } 
            });
        });
    }
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
    $strSQL_student ="SELECT * FROM student WHERE sex = '".$_POST['sex']."' ORDER BY studentid DESC";
    $objQuery_student = mysql_query($strSQL_student) or die ("Error Query [".$strSQL_student."]");
    //echo $strSQL_student;
    mysql_close($conn);

?>
<input type="hidden" name="sex" id="sex" value="<?=$_POST['sex']?>">
<div class="panel panel-default">
<div class="panel-heading"><h4><span class="glyphicon glyphicon-list" aria-hidden="true"></span> รายการนักเรียนทั้งหมด </h4></div>
<div class="panel-body">
<div id="loading"></div>
<table id="datatable" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class=""><center>รหัสนักเรียน</center></th>
            <th class="">ชื่อ - นามสกุล</th>
            <th class="">sex.</th>
            <th class="">รหัสประชาชน</th>
            <th class="">โรงเรียน</th>
            <th class="">tel</th>
            <th class="">create date.</th>       
            <th class=""><center>Action Admin</center></th>
        </tr>
    </thead>
    <? $i = 1;
        while ( $objResult_student = mysql_fetch_array($objQuery_student)) {?>
        <tr>
            <td><center><?=$objResult_student['studentid'];?></center></td>
            <td><?=$objResult_student['name'];?></td>
            <td><?=$objResult_student['sex'];?></td>
            <td><?=$objResult_student['pcode'];?></td>
            <td><?=$objResult_student['school'];?></td>
            <td><?=$objResult_student['tel'];?></td>
            <td><?=$objResult_student['DateAddName'];?></td>
            <td><center>
                <button type="button" onclick="deleteStudentName(<?=$objResult_student['studentid']?>)" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button>
            </center></td>
        </tr>
    <? $i++; }?>
</table>
</div>
</div>