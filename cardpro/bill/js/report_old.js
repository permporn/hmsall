 $(function() {
         $.ajax({
            type: "POST",
            url: "form/form_data_pay.php",
            data: {},
            success: function(data){
                //console.log(data);
                $("#data-table").html(data);
                $('.form-saerch').hide();
                $('.subject_self').hide();
                $('.term_self').hide();
                $('.quantity').hide(); 
                $('.set_pay').show();
                $('.form-gen').show();
                $(".header").show();
                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 
            } 
        });

         $(".search-learn").hide();

         $('#subject_self,#branch_self,#term_self,#teacher_self,#pay_self,#subject_learn,#branch_learn,#term_learn,#teacher_learn').multiselect({
                 includeSelectAllOption: true,
                 selectAllValue: 'select-all-value',
                 enableFiltering: true
         });

         $('#search-form').on('reset', function() {
             $('#subject_self option:selected,#branch_self option:selected,#term_self option:selected,#teacher_self option:selected ,#pay_self option:selected , #subject_learn option:selected,#branch_learn option:selected,#term_learn option:selected,#teacher_learn option:selected').each(function() {
                 $(this).prop('selected', false);
             })
 
             $('#subject_self,#branch_self,#term_self,#teacher_self,#pay_self,#subject_learn,#branch_learn,#term_learn,#teacher_learn').multiselect('refresh');
             $(".search-self,.search-learn").hide();
         });

         $('#s_date').datepicker({
             autoclose: true,
             todayHighlight: true ,
             format: 'yyyy-mm-dd',
             //startDate: "-90d"
         }).on('changeDate', function(selected){
             startDate = new Date(selected.date.valueOf());
             startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
             $('#e_date').datepicker('setStartDate', startDate);
         });
    
         $('#e_date').datepicker({
             autoclose: true,
             todayHighlight: true ,
             format: 'yyyy-mm-dd'
         }).on('changeDate', function(selected){
             FromEndDate = new Date(selected.date.valueOf());
             FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
             $('#s_date').datepicker('setEndDate', FromEndDate);
         });

         //auto_load(); //load datatable
        
         // search
         $('.btn-search').click(function(){
             var form_type = $('#form_type').val();
             
             var s_date = $('.s_date').val();
             var e_date = $('.e_date').val();
             var type = $('#type').val();
             var price_self = $('#price_self').val();
             //alert(price_self);
             if(type == 2){
                 var quantity = $('#quantity').val();
                 var subject = $('#subject_self').val();
                 var branch  = $('#branch_self').val();
                 var term    = $('#term_self').val();
                 var teacher = $('#teacher_self').val();
                 var pay     = $('#pay_self').val();
             }else if(type == 1){
                 var quantity = $('#quantity').val();
                 var subject = $('#subject_learn').val();
                 var branch  = $('#branch_learn').val();
                 var term    = $('#term_learn').val();
                 var teacher = $('#teacher_learn').val();
                 var pay     = "";
             }
            // if include table
            if(form_type == "pay"){
                 var url = "form/form_data_pay.php";
            }else if(form_type == "index"){
                 var url = "form/form_data_table.php";
            }
             $.ajax({
                 type: "POST",
                 url: url,
                 data: { price_self : price_self, quantity : quantity , s_date : s_date , e_date : e_date , type : type , subject : subject , branch : branch , term : term , teacher : teacher , pay : pay},
                 success: function(data){
                     //console.log(data);
                     $("#data-table").html(data);
                 } 
             });
         });

        // gen
        $('.btn-gen').click(function(){
            //alert(1);
            var form_type = $('#form_type').val();
            //alert(form_type);
            var s_date = $('.s_date').val();
            var e_date = $('.e_date').val();
            var type = $('#type').val();
            var set_pay = $('#set_pay').val();
            if(type == 2){
                var quantity = $('#quantity').val();
                var subject = $('#subject_self').val();
                var branch  = $('#branch_self').val();
                var term    = $('#term_self').val();
                var teacher = $('#teacher_self').val();
                var pay     = $('#pay_self').val();
                var price_self = $('#price_self').val();
            }else if(type == 1){
                var quantity = $('#quantity').val();
                var subject = $('#subject_learn').val();
                var branch  = $('#branch_learn').val();
                var term    = $('#term_learn').val();
                var teacher = $('#teacher_learn').val();
                var pay     = "";
            }
            //alert(teacher);
            if(teacher != null && branch != null && pay != null){
                var url = "report.php";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: { action_type : "insert_bill", quantity : quantity , s_date : s_date , e_date : e_date , type : type , subject : subject , branch : branch , term : term , teacher : teacher , pay : pay , set_pay : set_pay , price_self : price_self},
                    success: function(data){
                        console.log(data);
                        $.ajax({
                            type: "POST",
                            url: "form/form_data_pay.php",
                            data: {},
                            success: function(data){
                                //console.log(data);
                                $("#data-table").html(data);
                                $('.form-saerch').hide(); 
                                $('.form-gen').show(); 
                                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 
                            } 
                        });
                    } 
                });
            }else{
                alert("กรุณาเลือกเงื่อนไขให้ครบถ้วนค่ะ");
            }
        });

         $( ".type" ).change(function() {
             if($('#type').val() == 2){
                 $(".search-learn").hide();
                 $(".search-self").show("slow");
             }else if($('#type').val() == 1 || $('#type').val() == 3){
                 $(".search-self").hide();
                 $(".search-learn").show("slow");
             }
          
         });

     // This button will increment the value
     $('.qtyplus').click(function(e){
         // Stop acting like a button
         e.preventDefault();
        // Get the field name
         fieldName = $(this).attr('field');
        
         // Get its current value
         var currentVal = parseInt($('input[name='+fieldName+']').val());

             // If is not undefined
             if (!isNaN(currentVal) && currentVal < 100) {
                 // Increment
                 $('input[name='+fieldName+']').val(currentVal + 1);
                 var sum = currentVal + 1;
             } else {
                 // Otherwise put a 0 there
                 $('input[name='+fieldName+']').val(0);
                 var sum = 0;
             }
     });

     // This button will decrement the value till 0
     $(".qtyminus").click(function(e) {
         // Stop acting like a button
         e.preventDefault();
         // Get the field name
         fieldName = $(this).attr('field');
        
         // Get its current value
         var currentVal = parseInt($('input[name='+fieldName+']').val());
         
         // If it isn't undefined or its greater than 0
         if (!isNaN(currentVal) && currentVal > 0) {
             // Decrement one
             $('input[name='+fieldName+']').val(currentVal - 1);
             var sum = currentVal - 1;
         } else {
             // Otherwise put a 0 there
             $('input[name='+fieldName+']').val(0);
             var sum = 0;
         }

     });

     // page pay
    $('.btn-pay').click(function(){
        $.ajax({
            type: "POST",
            url: "form/form_data_pay.php",
            data: {},
            success: function(data){
                //console.log(data);
                $("#data-table").html(data);
                $('.form-saerch').hide();
                $('.subject_self').hide();
                $('.term_self').hide();
                $('.quantity').hide(); 
                $('.set_pay').show();
                $('.form-gen').show();
                $(".header").show();
                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 
            } 
        });
    });

     // page pay
     $('#home').click(function(){
         $.ajax({
             type: "POST",
             url: "form/form_data_table.php",
             data: {},
             success: function(data){
                 //console.log(data);
                 $("#data-table").html(data);
                $('.form-saerch').show(); 
                $('.subject_self').show();
                $('.term_self').show();
                $('.quantity').show(); 
                $('.set_pay').hide();
                $('.form-gen').hide(); 
                $('.set_pay').hide();
                $(".header").show();
                 $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ค้นหา'); 
             } 
         });
     });

     // page pay
    $('.btn-pay-setting').click(function(){
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
    });
});

/*function payment(id){
    //alert(id);
    $.ajax({
        type: "GET",
        url: "form/form_payment.php",
        data: {id_bill : id},
        success: function(data){
             $(".header").hide();
             $("#data-table").html(data);
        } 
    });
}*/
function printBill(sum_amount,quantity,percentag1,quantity2,percentag2){
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
}

function auto_load(){
         $.ajax({
           url: "form/form_data_table.php",
           cache: false,
           success: function(data){
              $("#data-table").html(data);
           } 
         });
}
