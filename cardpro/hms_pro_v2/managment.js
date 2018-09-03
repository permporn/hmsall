 $(function() {
 	var p = $('#p').val();
 	// page form_student_name_management.php
 	if( p == "student_name_management"){
 		$('.search-sex').show();
 		$("#loader").html("<img src='images/loading.gif' width='50px'/>");
 		var sex = "Woman";
 		$.ajax({
	        type: "POST",
	        url: "form/form_student_name_management.php",
	        data: {sex : sex},
	        success: function(data){
	            //console.log(data);
	            $("#data-table").html(data);
	            $("#loader").hide();
	        } 
	    });          
 	}
 	// page form_student_name_management.php
 	$('.btn-search-sex,.btn_student_name_management').click(function(){
 		$('.search-sex').show();
        $("#loading").html("<img src='images/loading.gif' width='50px'/>");
        var sex = $(this).val();
        if(!sex){sex = "Woman";}
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
 	// page form_login_self_management.php
    if( p == "login_self_management"){
 		$("#loader").html("<img src='images/loading.gif' width='50px'/>");
 		$('.search-sex').hide();
 		$.ajax({
	        type: "POST",
	        url: "form/form_login_self_management.php",
	        data: {},
	        success: function(data){
	            //console.log(data);
	            $("#data-table").html(data);
	            $("#loader").hide();
	        } 
	    });          
 	}
 	$('.login_self_management').click(function(){
 		$("#loader").html("<img src='images/loading.gif' width='50px'/>");
 		$('.search-sex').hide();
 		$.ajax({
	        type: "POST",
	        url: "form/form_login_self_management.php",
	        data: {},
	        success: function(data){
	            //console.log(data);
	            $("#data-table").html(data);
	            $("#loader").hide();
	        } 
	    });      
 	});
      
 }); 