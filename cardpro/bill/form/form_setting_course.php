<?

session_start();

include("../ck_session.php");

include('../config/config_multidb.php');

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

    "order": [[ 0, "DESC" ]]

});

$(function() {

    $('.setting-add').click(function(){

       var name_set = $('#name_set').val();

       var teacher_set = $('#teacher_set').val();

       var percent_set = $('#percent_set').val();

       //alert(teacher_set);



       if(name_set != '' && teacher_set != '' && percent_set != ''){

       $.ajax({

            type: "GET",

            url: "report.php",

            data: {type : "insert_setting", name_set : name_set, teacher_set : teacher_set, percent_set : percent_set},

            success: function(data){

                console.log(data);

                $.ajax({

                    type: "POST",

                    url: "form/form_setting_pay.php",

                    data: {},

                    success: function(data){

                        //console.log(data);

                        $("#data-table").html(data);

                        $(".header").hide();

                        $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ตั้งค่า'); 

                    } 

                });

       

            } 

        });

       }else{

         alert('กรุณากรอกข้อมูลให้ครบ');

       }

    });

    $('.close_pay').click(function(){

        $.ajax({

            type: "POST",

            url: "form/form_data_pay.php",

            data: {},

            success: function(data){

                //console.log(data);

                $("#data-table").html(data);

                $(".header").show();

                $('.form-saerch').hide();

                $('.subject_self').hide();

                $('.term_self').hide();

                $('.quantity').hide(); 

                $('.set_pay').show();

                $('.form-gen').show();

                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 

            } 

        });

    });



});

function editSetting(id,id_set){

    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");

    var update_percent = $('#percent'+id).val(); 

    //alert(id_set);

    var request = $.ajax({

        url: "report.php",

        method: "GET",

        data: { id : id , action_type : "editSetting" , update_percent : update_percent , id_set : id_set}

    });

    request.done(function( result ) {

        //console.log(result);

        if(result != ''){

            alert(result);

        }

        $.ajax({

            type: "POST",

            url: "form/form_setting_pay.php",

            data: {},

            success: function(data){

                //console.log(data);

                $("#data-table").html(data);

                $(".header").hide();

                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ตั้งค่า'); 

                $("#loading").hide();

            } 

        });

    });

}



function showSetting(type_id){

    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");

     $.ajax({

        type: "GET",

        url: "form/form_setting_course_edit.php",

        data: {type_id : type_id},

        success: function(data){

            //console.log(data);

            $("#data-table").html(data);

            $(".header").hide();

            $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ตั้งค่า'); 

            $("#loading").hide();

        } 

    });

}



function deleteSetting(id,id_type){

    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");

    var request = $.ajax({

        url: "report.php",

        method: "GET",

        data: { id : id , action_type : "deleteSetting_course" , id : id, id_type : id_type}

    });

    request.done(function( result ) {

        //console.log(result);

        if(result != ''){

            alert(result);

        }

        $.ajax({

            type: "POST",

            url: "form/form_setting_course.php",

            data: {},

            success: function(data){

                //console.log(data);

                $("#data-table").html(data);

                $(".header").hide();

                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ตั้งค่า'); 

                $("#loading").hide();

            } 

        });

    });

}

</script>

<div class="col-sm-12">

    <div class="col-md-11"></div>

    <!-- <div class="col-md-1" style="padding-bottom: 10px "><button type="button" class="btn btn-info setting-add"> <span class="glyphicon glyphicon-plus " aria-hidden="true"></span> เพิ่ม</button></div>  -->

</div>

<!-- form show -->

<div class="col-sm-12 setting-table">  

    <table id="datatable" class="display" cellspacing="0" width="100%">

    <thead>

    <tr>

        <th><center>#</center></th>

        <th><center>name</center></th>

        <th><center>Action</center></th>

    </tr>

    </thead>

    <tbody>

      <? $sql_set = "SELECT * FROM type_self WHERE type_id !=2 AND type_id !=3  ORDER BY id ASC";

        $objQuery_set = mysqli_query($con_ajtongmath_self,$sql_set) or die ("Error Query [".$sql_set."]");

        $j =0;

        while($objResult_set = mysqli_fetch_array($objQuery_set)){ ?>

            <tr>

            <td align="center"><? echo $objResult_set['type_id'];?></td>

            <td align="center"><? echo $objResult_set['type_name'];?></td>

            <td align="center">

            <div id="loading"></div><button type="button" onclick="showSetting(<?=$objResult_set['type_id']?>)" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button>

            <button type="button" onclick="deleteSetting(<?=$objResult_set['id']?>,<?=$objResult_set['type_id']?>)" class="btn btn btn-xs"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ลบ</button>

            </td>

          </tr>

        <? $j++;}?>

    </tbody>

  </table>

</div>



<div class="col-md-12" id="non-printable">

<center>

  <button type="button" class="btn btn-default close_pay" id="close_pay">Close</button>



</center>

</div>



<? mysqli_close($con_ajtongmath_self);?>

