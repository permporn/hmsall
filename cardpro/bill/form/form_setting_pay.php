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



function showSetting(id_set){

    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");

     $.ajax({

        type: "GET",

        url: "form/form_setting_pay_edit.php",

        data: {id_set : id_set},

        success: function(data){

            //console.log(data);

            $("#data-table").html(data);

            $(".header").hide();

            $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ตั้งค่า'); 

            $("#loading").hide();

        } 

    });

}



function deleteSetting(id,id_set){

    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");

    var update_percent = $('#percent'+id).val(); 

    //alert(id_set);

    var request = $.ajax({

        url: "report.php",

        method: "GET",

        data: { id : id , action_type : "deleteSetting" , update_percent : update_percent , id_set : id_set}

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

        <th><center>name_set</center></th>

        <th><center></center></th>

        <th><center></center></th>

        <th><center>Action</center></th>



    </tr>

    </thead>

    <tbody>

      <? $sql_set = "SELECT id,  id_set, set_name, teacher_id, percent, teacher.teachername AS teacher_name

                          FROM bill_percent 

                          LEFT JOIN teacher ON bill_percent.teacher_id = teacher.teacherid

                          GROUP BY id_set

                          ORDER BY id DESC

                          ";

        $objQuery_set = mysqli_query($con_ajtongmath_self,$sql_set) or die ("Error Query [".$sql_set."]");

        $j =0;

        while($objResult_set = mysqli_fetch_array($objQuery_set)){ ?>

            <tr>

            <td align="center"><? echo $objResult_set['set_name'];?></td>

            <td align="center"></td>

            <td align="center"></td>

            <td align="center">

            <div id="loading"></div><button type="button" onclick="showSetting(<?=$objResult_set['id_set']?>)" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button>

            <button type="button" onclick="deleteSetting(<?=$objResult_set['id']?>,<?=$objResult_set['id_set']?>)" class="btn btn btn-xs"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ลบ</button>

            </td>

          </tr>

        <? $j++;}?>

         <tr>

              <td align="center"><strong>name_set</strong></td>

              <td align="center"><strong>ขื่ออาจารย์</strong></td>

              <td align="center"><strong>%</strong></td>

              <td align="center"><strong>Action</strong></td>

          </tr>

            <tr>

              <td align="center"><input type="text" placeholder="กรอกชื่อเป็นตัวหนังสือ" id="name_set" name="name_set"></td>

              <td>

                <select name="teacher_self" class="teacher_set" id="teacher_set" align="center">

                    <?php 

                        $strSQL_teacherall = "SELECT * FROM `teacher`" ; //LIMIT 0, 15

                        $objQuery_teacherall = mysqli_query($con_ajtongmath_self,$strSQL_teacherall) or die ("Error Query [".$strSQL_teacherall."]");

                        while ( $objResult_teacherall = mysqli_fetch_array($objQuery_teacherall)) {?>

                        <option value="<?=$objResult_teacherall['teacherid']?>"><?=$objResult_teacherall['teachername'];?></option><? }?>

                </select></td>

              <td align="center"><input type="text" placeholder="กรอก % เป็นตัวเลข" id="percent_set" name="percent_set"></td>

              <td align="center">

                <button type="button" class="btn btn-primary btn-xs setting-add"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> เพิ่ม</button></td>

          </tr>

    </tbody>

  </table>

</div>



<div class="col-md-12" id="non-printable">

<center>

  <button type="button" class="btn btn-default close_pay" id="close_pay">Close</button>



</center>

</div>



<? mysqli_close($con_ajtongmath_self);?>