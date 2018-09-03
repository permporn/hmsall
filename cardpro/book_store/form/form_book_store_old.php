<?php include("../ck_session.php");?>
<script type="text/javascript">

$('table#datatable').DataTable({
    dom: 'Bfrtip',
    "lengthMenu" : [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
    buttons: ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/,'pageLength'],
    "pageLength": 15,
stateSave: true
});

$('.add_book').click(function(){
    //$('#form-book-insert').modal();
    $("#container_book").show();
    $.ajax({
    type: "POST",
    url: "form/form_book_manage.php",
    success: function(data){
        //console.log(data);
        $(".header").hide();
        $("#container_book").html(data);
        } 
    });
});

function reloadBookStore(){
    var s_date = $('.s_date').val();
    var e_date = $('.e_date').val();
    var type = $('#type').val();
    if(type == 2){
        var subject = $('#subject_self').val();
        var branch  = $('#branch_self').val();
        var term    = $('#term_self').val();
        var teacher = $('#teacher_self').val();
        var pay     = $('#pay_self').val();
    }else if(type == 1){
        var subject = $('#subject_learn').val();
        var branch  = $('#branch_learn').val();
        var term    = $('#term_learn').val();
        var teacher = $('#teacher_learn').val();
        var pay     = "";
    }
    
    $.ajax({
        type: "POST",
        url: "form/form_book.php",
        data: { s_date : s_date , e_date : e_date , type : type , subject : subject , branch : branch , term : term , teacher : teacher , pay : pay},
        success: function(data){
            //console.log(data);
            $("#container_book").hide();
            $("#header").show();
            $("#data-table").html(data);
        } 
    });  
}
function deleteBook(id){
    //alert(id);
    var request = $.ajax({
        url:"book.php",
        method: "GET",
        data: { id : id , type : "delete_book"}
    });
    request.done(function( result ) {
        reloadBookStore();
    });
}

function editBook(id){
    //alert(id);
    $("#container_book").show();
    var request = $.ajax({
        url: "form/form_book_manage.php",
        method: "GET",
        data: { id : id , type : "edit_book"}
    });
    request.done(function( result ) {
        $(".header").hide();
        $("#container_book").html(result);
    });
}

</script>
<?php
date_default_timezone_set("Asia/Bangkok");

$s_date = $_POST['s_date'];
$e_date = $_POST['e_date'];
$type = $_POST['type'];

$subject = $_POST['subject'];
$branch = $_POST['branch'];
$term = $_POST['term'];
$pay = $_POST['pay'];
$teacher = $_POST['teacher'];

$data_all = $_POST['data_all'];

if($data_all == "all"){
    $s_date = date( "Y-m-d", strtotime( "-7 day" ) );
    $e_date = date('Y-m-d');
}

include('../config/config_db_self.php');
$strSQL_book =  
            "SELECT book_store.id, 
                book_store.id_book, 
                book_store.qty, 
                book_store.id_branch, 
                book_store.create_date, 
                book_store.modify_date,
                book_information.code as code_book,
                book_information.title as title_book,
                book_information.type as type_book,
                subject.teacherid
                FROM
                book_store
                LEFT JOIN book_information ON book_information.id = book_store.id_book
                LEFT JOIN subject ON book_information.id_subject = subject.subid
                WHERE ";
$strSQL_book .= " book_store.create_date BETWEEN '".$s_date."' AND '".$e_date."'";
$strSQL_book .= " AND book_store.id_branch =".$id_branch_self;   
$strSQL_book .= " ORDER BY subject.teacherid,book_information.title ASC";
//echo $strSQL_book ;
$objQuery_book = mysql_query($strSQL_book) or die ("Error Query [".$strSQL_book."]");
mysql_close($conn);
?>
<div id="book_table">
<table id="datatable" class="display" cellspacing="0" width="100%">
    <?php if($objQuery_book){?>
    <thead>
        <tr>
            <th class="col-md-1"><center>ลำดับ</center></th>
            <th class="col-md-1"><center>รหัสหนังสือ</center></th>
            <th class="col-md-1"><center>ชื่อหนังสือ</center></th>
            <th class="col-md-1"><center>ประเภทหนังสือ</center></th>
            <th class="col-md-1"><center>จำนวน</center></th>
        </tr>
    </thead>
    <tbody>
<?php
/*
$action= $_GET['action'];
if($action == "delete_book"){  
    include('config/config_db_self.php'); 
    $id = $_GET['id'];
    $strSQL = "DELETE FROM `book_information` WHERE id = ".$id; 
    $objQuery = mysql_query($strSQL);
    if(!$objQuery)
        {
            echo "fail!!  : $strSQL (delete_book.php)";
        }else{
            echo "";
        }
    mysql_close($conn);
}*/
?>
    <?php 
    $i = 1;
    while ( $objResult_book = mysql_fetch_array($objQuery_book)) {?>
    <tr>
    <td><center><?=$i?></center></td>
    <td><center><?=$objResult_book['code_book'];?></center></td>
    <td><?=$objResult_book['title_book'];?></td>
    <?
    if($objResult_book['type_book'] == "1"){$pay_type = "คอร์สสด";}
    else if($objResult_book['type_book'] == "2"){$pay_type = "คอร์สself";}
    else{$pay_type = "-";}
    ?>
    <td><center><?=$pay_type;?></center></td>
    <td><center><?=$objResult_book['qty'];?></center></td>
    </tr>
    <? $i++; }?>
    </tbody>
    <? }?>
</table>
</div>