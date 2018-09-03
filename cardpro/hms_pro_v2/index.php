<?php 
    session_start();
    include("ck_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HMS - Pro</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="css/bootstrap-multiselect.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.min.css" rel="stylesheet">
   <!--  <link href="js/jquery.dataTables.min.css" rel="stylesheet"> -->
    <link href="js/buttons.dataTables.min.css" rel="stylesheet">
    
    
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


    <!-- Navigation -->
    <?php include('navigation.php');?>

    <input id="id_couses" name="id_couses" type="hidden" value="<?=$_GET['id_subject']?>">

    <!-- Intro Section -->
    <section id="intro">
        <div class="container">

            <!-- header -->
             <?php include('header.php');?>
             <input type="hidden" name="p" id="p" value="<?=$_GET['p']?>">
             <!-- <div class="loader" id="loader"></div>
             <div class="col-md-12" id="data-table" ></div> -->
            <!-- /.row -->
            
            <!-- button seat -->
            <div class="row">

                <!-- Modal-form-Datatable -->
               <!--  <div name="subject_id_print" id="subject_id_print"></div>
                <div name="studentid_print" id="studentid_print"></div>
                <div name="subject_code_print" id="subject_code_print"></div> -->
                <?php //include('modal/modal_payment.php'); ?>
                <!-- seat -->       
                <div class="col-md-12 " align="center">
                    
                </div>
                <!-- End seat -->   
            </div>
            <!-- /.row -->
        </div>       
    </section>

     <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="managment.js"></script>
   <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap3-typeahead.min.js"></script>
    <script src="js/jquery.table2excel.js"></script>
    <script src="js/bootstrap-multiselect.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
      <!--<script src="js/jquery.dataTables.min.js"></script> -->
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/buttons.flash.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>
    <script src="js/buttons.print.min.js"></script>

</body>

</html>