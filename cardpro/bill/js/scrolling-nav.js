//jQuery to collapse the navbar on scroll
/*$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});*/

$(function() {

    //menu pay
    $('.btn-pay').click(function(){
        alert(1);
        $.ajax({
                type: "POST",
                url: "form/form_data_pay.php",
                //data: { quantity : quantity , s_date : s_date , e_date : e_date , type : type , subject : subject , branch : branch , term : term , teacher : teacher , pay : pay, price_self : price_self},
                success: function(data){
                    //console.log(data);
                    $("#data-table").html(data);
                } 
        });
    });


    $('.selectpicker').selectpicker();

    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 2000, 'easeInOutExpo');
        event.preventDefault();
    });

    $('table#setting,#datatablePrint,#datatable').DataTable( {

           "sDom": "t<'row'<'col-md-12'f>r>t<'row'<'col-md-5'i><'col-md-7 text-right'p>>",
           "oTableTools" : {
              },
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull )
            {
                $('td:eq(0)', nRow);
            },
            "fnDrawCallback": function() {},
           "iDisplayLength": 8,
            "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "oLanguage": {    
            "sInfo":             "ทั้งหมด _TOTAL_ รายการ",
            "sEmptyTable":      "ไม่พบข้อมูล",          
            "sLengthMenu":      "แสดง _MENU_ รายการ",           
            "sSearch":           "ค้นหา ",
            "sZeroRecords":     "ไม่พบข้อมูล",
            "oPaginate": {
            "sPrevious":        "ก่อนหน้า ",
            
            "sNext":            " ถัดไป",
             "sPaginationType": "bootstrap",
            }
         }
    });

    var setTime = 600000;
 
    // DataTable
    //$('#data_table').DataTable();

    // function countdown()
    function countdown() {
      var target_date = new Date().getTime();
      var days, hours, minutes, seconds;
      var countdown = document.getElementById('countdown');
      setInterval(function () {
          var current_date = new Date().getTime();
          var seconds_left = (target_date - current_date) / 1000;

          days = parseInt(seconds_left / 86400);
          seconds_left = seconds_left % 86400;
           
          hours = parseInt(seconds_left / 3600);
          seconds_left = seconds_left % 3600;
           
          minutes = parseInt(seconds_left / 60);
          seconds = parseInt(seconds_left % 60);
          countdown.innerHTML = /*'<span class="days">' + days +  ' <b>Days</b></span> <span class="hours">' + hours + ' <b>Hours</b></span> */'กรุณาทำรายการภายใน 10 นาที <b>[<span class="minutes">'
          + minutes + ' </b> <b>นาที</b></span> <span class="seconds">' + seconds + ' <b>วินาที ]</b></span>';  
       }, 0);
    }
    //  function Timeout
    function Timeout() {
        setTimeout(function() {
            alert("หมดเวลาทำรายการ!!");
            close();
            $('#myModal').modal('hide');
            }, setTime);
     }
        
    $('.seat').tooltip();
    $('.tootip').tooltip();
        
    // search student name
    $('#search').typeahead({
        source:  function (query, process) {
                    var request = $.get('ajaxpro.php', { query: query }, function (data) {
                            //console.log("1"+query);
                            datas = $.parseJSON(data);
                            return process(datas);
                    });
        }//,onSelect: displayResult
    })

    $('.modalDatatable').click(function() {
        $('#myModalDatatable').modal();
    });
        
    // click botton seat open modal
    $('.seat').click(function() {
        
        var id_couses = $('#id_couses').val();
        var seat = $(this).data('value');
        var seat_text = $(this).text();

        var request = $.ajax({
                url:"check_seat.php",
                method: "GET",
                dataType: "html",
                data: { seat : seat, id : id_couses}
        });
        request.done(function( result ) {
            console.log(result);
            if(result != 0){
                alert('ไม่สามารถทำรายการได้ !!');
                reload();
            }else{
                var request = $.ajax({
                    url:"test.php",
                    method: "GET",
                    dataType: "html",
                    data: { seat : seat, id : id_couses}
                });
                request.done(function( result ) {
                    console.log(result);
                    var result_ = JSON.parse(result);
                    // countdown
                    countdown();
                    // add input at myModal
                    document.getElementById("detial").innerHTML = "วิชา : "+ result_.subject_name + "&nbsp;&nbsp;&nbsp; ที่นั่ง : <strong>"+  seat +"</strong>";
                    document.getElementById("subject_id_input").innerHTML = "<input id=\"id_couses2\" class=\"id_couses2\" name=\"id_couses2\" style=\"visibility:hidden\" value=\""+id_couses+"\">";
                    document.getElementById("seat_input").innerHTML = "<input id=\"seat2\" class=\"seat2\" name=\"seat2\" style=\"visibility:hidden\" value=\""+seat+"\">";
                    document.getElementById("id_seat_input").innerHTML = "<input id=\"id_seat\" class=\"id_seat\" name=\"id_seat\" style=\"visibility:hidden\" value=\""+ result_.id_seat+"\">";
                    // open modal 
                    $('#myModal').modal();
                    // Time out
                    Timeout(); 

                });
                request.fail(function( jqXHR, textStatus ) {
                    alert( "Request failed: " + textStatus );
                }); 
            }
        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });     
    });
        
    // insert Reservations
    $('#btn_insert').click(function(){
        var datas = $('form#search-form').serialize();
        var request = $.ajax({
            url:"save.php",
            method: "GET",
            data: { datas : datas }
        });
        request.done(function( result ) {
            $('#myModal').modal('hide');
            if(result == "fail1"){
                alert("รายชื่อมีการจองที่นั่งแล้ว");
                reload();
            }else{
                var result_ = JSON.parse(result);
                console.log(result_);
                //$('#myModalDatatable').modal();
                //reload();         
                $(location).attr('href',"form_print.php?id_subject="+result_.subject_id+"&studentid="+ result_.studentid+"&subject_code="+ result_.subject_code);
            }
        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    });

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'width='+screen.width + ', height='+ screen.height + ', top=0, left=0' + ', fullscreen=yes');
        mywindow.document.write('<html><head><title>my div</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        var subject_name = $('#subject_name').val();
        var subject_id = $('#subject_id').val();

        var request = $.ajax({
            url:"check_subject.php",
            method: "GET",
            data: { subject_name : subject_name, id_subject : subject_id }
        });
        request.done(function( result ) {
            console.log(result);
            $(location).attr('href',result+"?id_subject="+subject_id);

        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    }

    $('#print').click(function() {
        PrintElem('#mydiv');
    });

    $('#close_print').click(function() {

        var subject_name = $('#subject_name').val();
        var subject_id = $('#subject_id').val();

        var request = $.ajax({
            url:"check_subject.php",
            method: "GET",
            data: { subject_name : subject_name, id_subject : subject_id }
        });
        request.done(function( result ) {
            console.log(result);
            $(location).attr('href',result+"?id_subject="+subject_id);

        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
        
    });

    // refresh page
    $('.refresh').click(function() {
        reload();
    });

    function reload(){
      location.reload();
    }

    function close(){
      var datas = $('form#search-form').serialize();
      $.ajax({
        url:"update_satus.php",
        method: "GET",
        data: { datas : datas},
        success:function(result){
          console.log(result)
          reload();
        }
      });
    }

    // close modal
    $('.close_').click(function(){ 
      close()
    });

     // close modal
    $('.closeDatatable').click(function(){ 
      reload()
    });

     $('.selectpicker').change(function(){
        var text = $( ".selectpicker option:selected" ).text();
        var value = $( ".selectpicker option:selected" ).val();
        //alert( $text+$value);
        var request = $.ajax({
            url:"check_subject.php",
            method: "GET",
            data: { subject_name : text, id_subject : value }
        });
        request.done(function( result ) {
            console.log(result);
            $(location).attr('href',result+"?id_subject="+value);

        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    });

    $('#download').on('click', function(){
        $('<table>')
         .append(
            $("#datatable").DataTable().$('tr').clone()
         )
         .table2excel({
            exclude: ".excludeThisClass",
            name: "Worksheet Name",
            filename: "SomeFile" //do not include extension
         });
    }); 


});
        // display typehead
    /*function displayResult(item) {
                console.log(item);
         $('.alert').show().html('<strong>รหัสนักเรียน:' + item.value + '</strong>&nbsp;&nbsp;&nbsp;<strong>ชื่อ: ' + item.text + '</strong>');
                document.getElementById("studentid").innerHTML = "<input id=\"studentid\" class=\"studentid\" name=\"studentid\" style=\"visibility:hidden\" value=\""+item.value+"\">";
                document.getElementById("studentname").innerHTML = "<input id=\"studentname\" class=\"studentname\" name=\"studentname\" style=\"visibility:hidden\" value=\""+item.text+"\">";
    }*/