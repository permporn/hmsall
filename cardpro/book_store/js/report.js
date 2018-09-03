$(function() {

        $(".search-self").hide();
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
        
        // search
        $('.btn-search').click(function(){
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
                url: "form/form_data_table.php",
                data: { s_date : s_date , e_date : e_date , type : type , subject : subject , branch : branch , term : term , teacher : teacher , pay : pay},
                success: function(data){
                    //console.log(data);
                    $("#data-table").html(data);
                } 
            });
        });

        $( ".type" ).change(function() {
            if($('#type').val() == 2){
                $(".search-learn").hide();
                $(".search-self").show("slow");
            }else if($('#type').val() == 1 ){
                $(".search-self").hide();
                $(".search-learn").show("slow");
            }else if($('#type').val() == 0){
                $(".search-self").hide();
                $(".search-learn").hide();
            }
          
        });

});