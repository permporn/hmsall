<?php include('config/config_db.php');?>
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

    <title>Ajtong</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php //include('config/config_lib.php');?>
    
    
</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <?php include('navigation.php');?>

    <input id="id_couses" name="id_couses" type="hidden" value="<?=$_GET['id_subject']?>">
			
	<?php include('query_01.php');?>

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <!--<a class="btn btn-default page-scroll" href="#about">Click Me to Scroll Down!</a>-->
        <div class="container">

            <!-- header -->
             <?php include('header.php');?>

            <!-- /.row -->
			<div class="loaderImage"><center><img src="images/ajax-loader.gif" /></center></div><br>
			<!-- button seat -->
            <div class="row">

	            <!-- Modal-form-seat -->
				<?php include('modal/modal_seat.php');?>	

				<!-- Modal-form-Datatable -->
				<div name="subject_id_print" id="subject_id_print"></div>
				<div name="studentid_print" id="studentid_print"></div>
				<div name="subject_code_print" id="subject_code_print"></div>
							
				<?php include('modal/modal_table_student.php');?>	
				

				
				<!-- seat -->       
                <div class="col-md-12 thumbnail" style="margin:2px">  
                <div align="center" style="background-color:#FAFAFA;padding:2px">
                	<table width="80%" align="center" bgcolor="#2E64FE" style="margin:2px">
                		
                		<tr>
                			<td align="center"><button class="btn btn-primary tootip" title="Premium Seat ที่นั่งแถวหน้า (ว่าง)"  >No.</button></td>
                			<td align="center"><button class="btn btn-success tootip" title="Good Zone ที่นั่งโซนที่ดีที่สุด (ว่าง)">No.</button></td>
                			<td align="center"><button class="btn btn-info tootip" title="Regular seat ที่นั่งปกติ (ว่าง)">No.</button> </td>
                			<td align="center">
                			<button class="btn btn-danger"><img src="images/female.png" class="tootip"  title="จองแล้ว"/></button>
                			<button class="btn btn-danger"><img src="images/male.png" class="tootip" title="จองแล้ว"/></button>
                			</td>
                			<td align="center"><img src="images/tv.png" title="จอทีวี" class="tootip"> </td>
                			<td align="center"><img src="images/exit_2.png" title="ทางเดินเข้า-ออก" class="tootip"> </td>
                		</tr>
                		<tr>
                			<td align="center">Premium Seat ที่นั่งแถวหน้า (ว่าง)</td>
                			<td align="center">Good Zone ที่นั่งโซนที่ดีที่สุด (ว่าง)</td>
                			<td align="center">Regular seat ที่นั่งปกติ (ว่าง)</td>
                			<td align="center">จองแล้ว</td>
                			<td align="center">จอทีวีเหนือศรีษะ</td>
                			<td align="center">ทางเดินเข้า-ออก</td>
                		</tr>
                	</table>
                </div>
                </div>
                <div class="col-md-12 thumbnail" align="center">
                    <!-- <img class="img-responsive" src="http://placehold.it/750x500" alt=""> -->
					<table width="85%" align="center">
					        <tr bgcolor="#E6E6E6">
					            <td colspan="19" height="60px"><center><img src="images/screen.png" title="เวที และกระดาน" class="tootip"></center></td>
	 				        </tr>
	 				        <tr bgcolor="#E6E6E6">
					            <td colspan="19" bgcolor="" height="20px" >
					            <img align="left" src="images/tv.png" style="margin-left:105px" title="จอทีวี" class="tootip">
					            <img align="right" src="images/tv.png" style="margin-right:105px" title="จอทีวี" class="tootip">
					            </td>
	 				        </tr>
	 				        <tr bgcolor="#E6E6E6">
					            <td colspan="19" bgcolor="" height="75px">
					            <img align="left" src="images/exit.png" title="ทางเดินเข้า-ออก" class="tootip">
					            <img align="right" src="images/exit.png" title="ทางเดินเข้า-ออก" class="tootip">
					            </td>
	 				        </tr>
	 				        
					        <tr bgcolor="#E6E6E6">
					        	<td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">A</button></td>

					            <!-- 53 -->
					            <td><button id="seat53" name="test" 
					      	class="<?php if($seat[53]==2||$seat[53]==3){?>btn btn-danger<?php }else if($seat[53]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="53" title="<?php echo $seat_text[53]?>">
					              <?php if($seat[53] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[53] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              53
					              <? }?>
					            </button>
					            </td>
					            
					            <!-- 52 -->
					            <td><button id="seat52" name="test" 
					      	class="<?php if($seat[52]==2||$seat[52]==3){?>btn btn-danger<?php }else if($seat[52]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="52" title="<?php echo $seat_text[52]?>">
					              <?php if($seat[52] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[52] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              52
					              <? }?>
					            </button>
					            </td>
					            
					            <!-- 51 -->
					            <td><button id="seat51" name="test" 
					      	class="<?php if($seat[51]==2||$seat[51]==3){?>btn btn-danger<?php }else if($seat[51]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="51" title="<?php echo $seat_text[51]?>">
					              <?php if($seat[51] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[51] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              51
					              <? }?>
					            </button>
					            </td>
					            
					            <!-- 5 -->
					            <td><button id="seat5" name="test" 
					      	class="<?php if($seat[5]==2||$seat[5]==3){?>btn btn-danger<?php }else if($seat[5]==1){?>btn btn-warning<?php }else{?>btn btn-primary <? }?> seat " 
					        data-value="5" title="<?php echo $seat_text[5]?>">
					              <?php if($seat[5] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[5] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              5
					              <? }?>
					              </button>
					            </td>

					            <!-- 4 -->
					            <td><button id="seat4" name="test" 
					      	class="<?php if($seat[4]==2||$seat[4]==3){?>btn btn-danger<?php }else if($seat[4]==1){?>btn btn-warning<?php }else{?>btn btn-primary <? }?> seat " 
					        data-value="4" title="<?php echo $seat_text[4]?>">
					              <?php if($seat[4] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[4] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>

					              4
					              <? }?>
					              </button>
					            </td>

					            <!-- 3 -->
					            <td><button id="seat3" name="test" 
					      	class="<?php if($seat[3]==2||$seat[3]==3){?>btn btn-danger<?php }else if($seat[3]==1){?>btn btn-warning<?php }else{?>btn btn-primary <? }?> seat " 
					        data-value="3" title="<?php echo $seat_text[3]?>">
					              <?php if($seat[3] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[3] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              3
					              <? }?>
					            </button>
					            </td>

					            <!-- 2 -->
					            <td><button id="seat2" name="test" 
					      	class="<?php if($seat[2]==2||$seat[2]==3){?>btn btn-danger<?php }else if($seat[2]==1){?>btn btn-warning<?php }else{?>btn btn-primary <? }?> seat " 
					        data-value="2" title="<?php echo $seat_text[2]?>">
					              <?php if($seat[2] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[2] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              2
					              <? }?>
					            </button>
					            </td>

					            <!-- 1 -->
					            <td><button id="seat1" name="test" 
					      	class="<?php if($seat[1]==2||$seat[1]==3){?>btn btn-danger<?php }else if($seat[1]==1){?>btn btn-warning<?php }else{?>btn btn-primary <? }?> seat " 
					        data-value="1" title="<?php echo $seat_text[1]?>">
					              <?php if($seat[1] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[1] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              1
					              <? }?>
					            </button>
					            </td>
					            <td rowspan="9" width="50"><p style="margin-top:100px"><center>ทางเดิน</center></p></td>

					            <!-- 6 -->
					            <td><button id="seat6" name="test" 
					      	class="<?php if($seat[6]==2||$seat[6]==3){?>btn btn-danger<?php }else if($seat[6]==1){?>btn btn-warning<?php }else{?>btn btn-primary <? }?> seat " 
					        data-value="6" title="<?php echo $seat_text[6]?>">
					              <?php if($seat[6] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[6] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              6
					              <? }?>
					            </button>
					            </td>

					            <!-- 6 -->
					            <td><button id="seat7" name="test" 
					      	class="<?php if($seat[7]==2||$seat[7]==3){?>btn btn-danger<?php }else if($seat[7]==1){?>btn btn-warning<?php }else{?>btn btn-primary <? }?> seat " 
					        data-value="7" title="<?php echo $seat_text[7]?>">
					              <?php if($seat[7] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[7] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              7
					              <? }?>
					            </button></td>

					            <!-- 8 -->
					            <td><button id="seat8" name="test" 
					      	class="<?php if($seat[8]==2||$seat[8]==3){?>btn btn-danger<?php }else if($seat[8]==1){?>btn btn-warning<?php }else{?>btn btn-primary <? }?> seat " 
					        data-value="8" title="<?php echo $seat_text[8]?>">
					              <?php if($seat[8] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[8] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              8
					              <? }?>
					            </button></td>

					            <!-- 9 -->
					            <td><button id="seat9" name="test" 
					      	class="<?php if($seat[9]==2||$seat[9]==3){?>btn btn-danger<?php }else if($seat[9]==1){?>btn btn-warning<?php }else{?>btn btn-primary <? }?> seat " 
					        data-value="9" title="<?php echo $seat_text[9]?>">
					              <?php if($seat[9] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[9] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              9
					              <? }?>
					            </button></td>

					            <!-- 10 -->
					            <td><button id="seat10" name="test" 
					      	class="<?php if($seat[10]==2||$seat[10]==3){?>btn btn-danger<?php }else if($seat[10]==1){?>btn btn-warning<?php }else{?>btn btn-primary <? }?> seat " 
					        data-value="10" title="<?php echo $seat_text[10]?>">
					              <?php if($seat[10] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[10] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              10
					              <? }?>
					            </button></td>

					            <!-- 55 -->
					            <td><button id="seat55" name="test" 
					      	class="<?php if($seat[55]==2||$seat[55]==3){?>btn btn-danger<?php }else if($seat[55]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="55" title="<?php echo $seat_text[55]?>">
					              <?php if($seat[55] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[55] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              55
					              <? }?>
					            </button></td>
					            
					           	<!-- 56 -->
					            <td><button id="seat56" name="test" 
					      	class="<?php if($seat[56]==2||$seat[56]==3){?>btn btn-danger<?php }else if($seat[56]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="56" title="<?php echo $seat_text[56]?>">
					              <?php if($seat[56] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[56] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              56
					              <? }?>
					            </button></td>

					            <!-- 57 -->
					            <td><button id="seat57" name="test" 
					      	class="<?php if($seat[57]==2||$seat[57]==3){?>btn btn-danger<?php }else if($seat[57]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="57" title="<?php echo $seat_text[57]?>">
					              <?php if($seat[57] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[57] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              57
					              <? }?>
					            </button></td>

					            <td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">A</button></td>

					          </tr>
					        <tr bgcolor="#E6E6E6">

					        	<td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">B</button></td>
								 <!-- 60 -->
					            <td><button id="seat60" name="test" 
					      	class="<?php if($seat[60]==2||$seat[60]==3){?>btn btn-danger<?php }else if($seat[60]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="60" title="<?php echo $seat_text[60]?>">
					              <?php if($seat[60] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[60] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              60
					              <? }?>
					            </button></td>

					            <!-- 59 -->
					            <td><button id="seat59" name="test" 
					      	class="<?php if($seat[59]==2||$seat[59]==3){?>btn btn-danger<?php }else if($seat[59]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="59" title="<?php echo $seat_text[59]?>">
					              <?php if($seat[59] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[59] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              59
					              <? }?>
					            </button></td>

					            <!-- 58 -->
					            <td><button id="seat58" name="test" 
					      	class="<?php if($seat[58]==2||$seat[58]==3){?>btn btn-danger<?php }else if($seat[58]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="58" title="<?php echo $seat_text[58]?>">
					              <?php if($seat[58] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[58] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              58
					              <? }?>
					            </button></td>

					            <!-- 15 -->
					            <td><button id="seat15" name="test" 
					      	class="<?php if($seat[15]==2||$seat[15]==3){?>btn btn-danger<?php }else if($seat[15]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="15" title="<?php echo $seat_text[15]?>">
					              <?php if($seat[15] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[15] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              15
					              <? }?>
					            </button></td>

					            <!-- 14 -->
					            <td><button id="seat14" name="test" 
					      	class="<?php if($seat[14]==2||$seat[14]==3){?>btn btn-danger<?php }else if($seat[14]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="14" title="<?php echo $seat_text[14]?>">
					              <?php if($seat[14] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[14] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              14
					              <? }?>
					            </button></td>

					            <!-- 13 -->
					            <td><button id="seat13" name="test" 
					      	class="<?php if($seat[13]==2||$seat[13]==3){?>btn btn-danger<?php }else if($seat[13]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="13" title="<?php echo $seat_text[13]?>">
					              <?php if($seat[13] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[13] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              13
					              <? }?>
					            </button></td>

					            <!-- 12 -->
					            <td><button id="seat12" name="test" 
					      	class="<?php if($seat[12]==2||$seat[12]==3){?>btn btn-danger<?php }else if($seat[12]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="12" title="<?php echo $seat_text[12]?>">
					              <?php if($seat[12] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[12] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              12
					              <? }?>
					            </button></td>

					            <!-- 11 -->
					            <td><button id="seat11" name="test" 
					      	class="<?php if($seat[11]==2||$seat[11]==3){?>btn btn-danger<?php }else if($seat[11]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="11" title="<?php echo $seat_text[11]?>">
					              <?php if($seat[11] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[11] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              11
					              <? }?>
					            </button></td>

					            <!-- 16 -->
					            <td><button id="seat16" name="test" 
					      	class="<?php if($seat[16]==2||$seat[16]==3){?>btn btn-danger<?php }else if($seat[16]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="16" title="<?php echo $seat_text[16]?>">
					              <?php if($seat[16] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[16] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              16
					              <? }?>
					            </button></td>

					            <!-- 17 -->
					            <td><button id="seat17" name="test" 
					      	class="<?php if($seat[17]==2||$seat[17]==3){?>btn btn-danger<?php }else if($seat[17]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="17" title="<?php echo $seat_text[17]?>">
					              <?php if($seat[17] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[17] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              17
					              <? }?>
					            </button></td>

					         	<!-- 18 -->
					            <td><button id="seat18" name="test" 
					      	class="<?php if($seat[18]==2||$seat[18]==3){?>btn btn-danger<?php }else if($seat[18]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="18" title="<?php echo $seat_text[18]?>">
					              <?php if($seat[18] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[18] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              18
					              <? }?>
					            </button></td>
					           
					            <!-- 19 -->
					            <td><button id="seat19" name="test" 
					      	class="<?php if($seat[19]==2||$seat[19]==3){?>btn btn-danger<?php }else if($seat[19]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="19" title="<?php echo $seat_text[19]?>">
					              <?php if($seat[19] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[19] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              19
					              <? }?>
					            </button></td>

					            <!-- 20 -->
					            <td><button id="seat20" name="test" 
					      	class="<?php if($seat[20]==2||$seat[20]==3){?>btn btn-danger<?php }else if($seat[20]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="20" title="<?php echo $seat_text[20]?>">
					              <?php if($seat[20] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[20] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              20
					              <? }?>
					            </button></td>

					            <!-- 62 -->
					            <td><button id="seat62" name="test" 
					      	class="<?php if($seat[62]==2||$seat[62]==3){?>btn btn-danger<?php }else if($seat[62]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="62" title="<?php echo $seat_text[62]?>">
					              <?php if($seat[62] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[62] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              62
					              <? }?>
					            </button></td>

					            <!-- 63 -->
					            <td><button id="seat63" name="test" 
					      	class="<?php if($seat[63]==2||$seat[63]==3){?>btn btn-danger<?php }else if($seat[63]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="63" title="<?php echo $seat_text[63]?>">
					              <?php if($seat[63] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[63] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              63
					              <? }?>
					            </button></td>

					            <!-- 64 -->
					            <td><button id="seat64" name="test" 
					      	class="<?php if($seat[64]==2||$seat[64]==3){?>btn btn-danger<?php }else if($seat[64]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="64" title="<?php echo $seat_text[64]?>">
					              <?php if($seat[64] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[64] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              64
					              <? }?>
					            </button></td>
					            <td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">B</button></td>
					          </tr>
					        <tr bgcolor="#E6E6E6">
					            <td colspan="19" bgcolor="" height="5px">
					            <img align="left" src="images/tv.png" style="margin-left:105px" title="จอทีวี" class="tootip"> 
					            <img align="right" src="images/tv.png" style="margin-right:105px" title="จอทีวี" class="tootip">
					            </td>
	 				        </tr>
					        <tr bgcolor="#E6E6E6">
								<td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">C</button></td>
					            <!-- 67 -->
					            <td><button id="seat67" name="test" 
					      	class="<?php if($seat[67]==2||$seat[67]==3){?>btn btn-danger<?php }else if($seat[67]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="67" title="<?php echo $seat_text[67]?>">
					              <?php if($seat[67] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[67] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              67
					              <? }?>
					            </button></td>

					            <!-- 66 -->
					            <td><button id="seat66" name="test" 
					      	class="<?php if($seat[66]==2||$seat[66]==3){?>btn btn-danger<?php }else if($seat[66]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="66" title="<?php echo $seat_text[66]?>">
					              <?php if($seat[66] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[66] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              66
					              <? }?>
					            </button></td>

					            <!-- 65 -->
					            <td><button id="seat65" name="test" 
					      	class="<?php if($seat[65]==2||$seat[65]==3){?>btn btn-danger<?php }else if($seat[65]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="65" title="<?php echo $seat_text[65]?>">
					              <?php if($seat[65] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[65] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              65
					              <? }?>
					            </button></td>

					            <!-- 25 -->
					            <td><button id="seat25" name="test" 
					      	class="<?php if($seat[25]==2||$seat[25]==3){?>btn btn-danger<?php }else if($seat[25]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="25" title="<?php echo $seat_text[25]?>">
					              <?php if($seat[25] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[25] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              25
					              <? }?>
					            </button></td>

					            <!-- 24 -->
					            <td><button id="seat24" name="test" 
					      	class="<?php if($seat[24]==2||$seat[24]==3){?>btn btn-danger<?php }else if($seat[24]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="24" title="<?php echo $seat_text[24]?>">
					              <?php if($seat[24] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[24] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              24
					              <? }?>
					            </button></td>

					            <!-- 24 -->
					            <td><button id="seat23" name="test" 
					      	class="<?php if($seat[23]==2||$seat[23]==3){?>btn btn-danger<?php }else if($seat[23]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="23" title="<?php echo $seat_text[23]?>">
					              <?php if($seat[23] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[23] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              23
					              <? }?>
					            </button></td>

					            <!-- 22 -->
					            <td><button id="seat22" name="test" 
					      	class="<?php if($seat[22]==2||$seat[22]==3){?>btn btn-danger<?php }else if($seat[22]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="22" title="<?php echo $seat_text[22]?>">
					              <?php if($seat[22] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[22] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              22
					              <? }?>
					            </button></td>

					            <!-- 21 -->
					            <td><button id="seat21" name="test" 
					      	class="<?php if($seat[21]==2||$seat[21]==3){?>btn btn-danger<?php }else if($seat[21]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="21" title="<?php echo $seat_text[21]?>">
					              <?php if($seat[21] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[21] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              21
					              <? }?>
					            </button></td>

					            <!-- 26 -->
					            <td><button id="seat26" name="test" 
					      	class="<?php if($seat[26]==2||$seat[26]==3){?>btn btn-danger<?php }else if($seat[26]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="26" title="<?php echo $seat_text[26]?>">
					              <?php if($seat[26] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[26] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              26
					              <? }?>
					            </button></td>

					            <!-- 27 -->
					            <td><button id="seat27" name="test" 
					      	class="<?php if($seat[27]==2||$seat[27]==3){?>btn btn-danger<?php }else if($seat[27]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="27" title="<?php echo $seat_text[27]?>">
					              <?php if($seat[27] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[27] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              27
					              <? }?>
					            </button></td>

					            <!-- 28 -->
					            <td><button id="seat28" name="test" 
					      	class="<?php if($seat[28]==2||$seat[28]==3){?>btn btn-danger<?php }else if($seat[28]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="28" title="<?php echo $seat_text[28]?>">
					              <?php if($seat[28] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[28] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              28
					              <? }?>
					            </button></td>

					            <!-- 29 -->
					            <td><button id="seat29" name="test" 
					      	class="<?php if($seat[29]==2||$seat[29]==3){?>btn btn-danger<?php }else if($seat[29]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="29" title="<?php echo $seat_text[29]?>">
					              <?php if($seat[29] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[29] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              29
					              <? }?>
					            </button></td>

					             <!-- 30 -->
					            <td><button id="seat30" name="test" 
					      	class="<?php if($seat[30]==2||$seat[30]==3){?>btn btn-danger<?php }else if($seat[30]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="30" title="<?php echo $seat_text[30]?>">
					              <?php if($seat[30] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[30] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              30
					              <? }?>
					            </button></td>

					            <!-- 70 -->
					            <td><button id="seat70" name="test" 
					      	class="<?php if($seat[70]==2||$seat[70]==3){?>btn btn-danger<?php }else if($seat[70]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="70" title="<?php echo $seat_text[70]?>">
					              <?php if($seat[70] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[70] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              70
					              <? }?>
					            </button></td>

					            <!-- 71 -->
					            <td><button id="seat71" name="test" 
					      	class="<?php if($seat[71]==2||$seat[71]==3){?>btn btn-danger<?php }else if($seat[71]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="71" title="<?php echo $seat_text[71]?>">
					              <?php if($seat[71] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[71] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              71
					              <? }?>
					            </button></td>

					            <!-- 72 -->
					            <td><button id="seat72" name="test" 
					      	class="<?php if($seat[72]==2||$seat[72]==3){?>btn btn-danger<?php }else if($seat[72]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="72" title="<?php echo $seat_text[72]?>">
					              <?php if($seat[72] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[72] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              72
					              <? }?>
					            </button></td>
					            <td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">C</button></td>
					       </tr>
					       <tr bgcolor="#E6E6E6">
					            <td colspan="19" bgcolor="" height="">
					            <center><img src="images/tv.png" title="จอทีวี" class="tootip"></center>
					            </td>
	 				        </tr>
					        <tr bgcolor="#E6E6E6">
					        <td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">D</button></td>
					        	<!-- 75 -->
					            <td><button id="seat75" name="test" 
					      	class="<?php if($seat[75]==2||$seat[75]==3){?>btn btn-danger<?php }else if($seat[75]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="75" title="<?php echo $seat_text[75]?>">
					              <?php if($seat[75] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[75] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              75
					              <? }?>
					            </button></td>

					            <!-- 74 -->
					            <td><button id="seat74" name="test" 
					      	class="<?php if($seat[74]==2||$seat[74]==3){?>btn btn-danger<?php }else if($seat[74]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="74" title="<?php echo $seat_text[74]?>">
					              <?php if($seat[74] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[74] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              74
					              <? }?>
					            </button></td>

					            <!-- 73 -->
					            <td><button id="seat73" name="test" 
					      	class="<?php if($seat[73]==2||$seat[73]==3){?>btn btn-danger<?php }else if($seat[73]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="73" title="<?php echo $seat_text[73]?>">
					              <?php if($seat[73] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[73] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              73
					              <? }?>
					            </button></td>

					            <!-- 35 -->
					            <td><button id="seat35" name="test" 
					      	class="<?php if($seat[35]==2||$seat[35]==3){?>btn btn-danger<?php }else if($seat[35]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="35" title="<?php echo $seat_text[35]?>">
					              <?php if($seat[35] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[35] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              35
					              <? }?>
					            </button></td>

					            <!-- 34 -->
					            <td><button id="seat34" name="test" 
					      	class="<?php if($seat[34]==2||$seat[34]==3){?>btn btn-danger<?php }else if($seat[34]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="34" title="<?php echo $seat_text[34]?>">
					              <?php if($seat[34] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[34] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              34
					              <? }?>
					            </button></td>

					            <!-- 33 -->
					            <td><button id="seat33" name="test" 
					      	class="<?php if($seat[33]==2||$seat[33]==3){?>btn btn-danger<?php }else if($seat[33]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="33" title="<?php echo $seat_text[33]?>">
					              <?php if($seat[33] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[33] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              33
					              <? }?>
					            </button></td>

					            <!-- 32 -->
					            <td><button id="seat32" name="test" 
					      	class="<?php if($seat[32]==2||$seat[32]==3){?>btn btn-danger<?php }else if($seat[32]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="32" title="<?php echo $seat_text[32]?>">
					              <?php if($seat[32] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[32] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              32
					              <? }?>
					            </button></td>

					            <!-- 31 -->
					            <td><button id="seat31" name="test" 
					      	class="<?php if($seat[31]==2||$seat[31]==3){?>btn btn-danger<?php }else if($seat[31]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="31" title="<?php echo $seat_text[31]?>">
					              <?php if($seat[31] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[31] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              31
					              <? }?>
					            </button></td>

					            <!-- 36 -->
					            <td><button id="seat36" name="test" 
					      	class="<?php if($seat[36]==2||$seat[36]==3){?>btn btn-danger<?php }else if($seat[36]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="36" title="<?php echo $seat_text[36]?>">
					              <?php if($seat[36] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[36] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              36
					              <? }?>
					            </button></td>

					           <!-- 37 -->
					            <td><button id="seat37" name="test" 
					      	class="<?php if($seat[37]==2||$seat[37]==3){?>btn btn-danger<?php }else if($seat[37]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="37" title="<?php echo $seat_text[37]?>">
					              <?php if($seat[37] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[37] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              37
					              <? }?>
					            </button></td>

					            <!-- 38 -->
					            <td><button id="seat38" name="test" 
					      	class="<?php if($seat[38]==2||$seat[38]==3){?>btn btn-danger<?php }else if($seat[38]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="38" title="<?php echo $seat_text[38]?>">
					              <?php if($seat[38] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[38] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              38
					              <? }?>
					            </button></td>

					            <!-- 39 -->
					            <td><button id="seat39" name="test" 
					      	class="<?php if($seat[39]==2||$seat[39]==3){?>btn btn-danger<?php }else if($seat[39]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="39" title="<?php echo $seat_text[39]?>">
					              <?php if($seat[39] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[39] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              39
					              <? }?>
					            </button></td>

					            <!-- 40 -->
					            <td><button id="seat40" name="test" 
					      	class="<?php if($seat[40]==2||$seat[40]==3){?>btn btn-danger<?php }else if($seat[40]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="40" title="<?php echo $seat_text[40]?>">
					              <?php if($seat[40] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[40] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              40
					              <? }?>
					            </button></td>

					            <!-- 78 -->
					            <td><button id="seat78" name="test" 
					      	class="<?php if($seat[78]==2||$seat[78]==3){?>btn btn-danger<?php }else if($seat[78]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="78" title="<?php echo $seat_text[78]?>">
					              <?php if($seat[78] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[78] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              78
					              <? }?>
					            </button></td>

					            <!-- 79 -->
					            <td><button id="seat79" name="test" 
					      	class="<?php if($seat[79]==2||$seat[79]==3){?>btn btn-danger<?php }else if($seat[79]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="79" title="<?php echo $seat_text[79]?>">
					              <?php if($seat[79] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[79] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              79
					              <? }?>
					            </button></td>

					            <!-- 80 -->
					            <td><button id="seat80" name="test" 
					      	class="<?php if($seat[80]==2||$seat[80]==3){?>btn btn-danger<?php }else if($seat[80]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="80" title="<?php echo $seat_text[80]?>">
					              <?php if($seat[80] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[80] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              80
					              <? }?>
					            </button></td>
					            <td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">D</button></td>
							</tr>
							<tr bgcolor="#E6E6E6">
					            <td colspan="19" bgcolor="" height="5px">
					            <img align="left" src="images/tv.png" style="margin-left:105px" title="จอทีวี" class="tootip">
					            <img align="right" src="images/tv.png" style="margin-right:105px" title="จอทีวี" class="tootip">
					            </td>
	 				        </tr>
					        <tr bgcolor="#E6E6E6">
					            <td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">E</button></td>
					            <!-- 83 -->
					            <td><button id="seat83" name="test" 
					      	class="<?php if($seat[83]==2||$seat[83]==3){?>btn btn-danger<?php }else if($seat[83]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="83" title="<?php echo $seat_text[83]?>">
					              <?php if($seat[83] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[83] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              83
					              <? }?>
					            </button></td>

					            <!-- 82 -->
					            <td><button id="seat82" name="test" 
					      	class="<?php if($seat[82]==2||$seat[82]==3){?>btn btn-danger<?php }else if($seat[82]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="82" title="<?php echo $seat_text[82]?>">
					              <?php if($seat[82] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[82] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              82
					              <? }?>
					            </button></td>

					            <!-- 81 -->
					            <td><button id="seat81" name="test" 
					      	class="<?php if($seat[81]==2||$seat[81]==3){?>btn btn-danger<?php }else if($seat[81]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="81" title="<?php echo $seat_text[81]?>">
					              <?php if($seat[81] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[81] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              81
					              <? }?>
					            </button></td>

					            <!-- 45 -->
					            <td><button id="seat45" name="test" 
					      	class="<?php if($seat[45]==2||$seat[45]==3){?>btn btn-danger<?php }else if($seat[45]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="45" title="<?php echo $seat_text[45]?>">
					              <?php if($seat[45] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[45] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              45
					              <? }?>
					            </button></td>

					            <!-- 44 -->
					            <td><button id="seat44" name="test" 
					      	class="<?php if($seat[44]==2||$seat[44]==3){?>btn btn-danger<?php }else if($seat[44]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="44" title="<?php echo $seat_text[44]?>">
					              <?php if($seat[44] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[44] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              44
					              <? }?>
					            </button></td>

					            <!-- 43 -->
					            <td><button id="seat43" name="test" 
					      	class="<?php if($seat[43]==2||$seat[43]==3){?>btn btn-danger<?php }else if($seat[43]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="43" title="<?php echo $seat_text[43]?>">
					              <?php if($seat[43] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[43] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              43
					              <? }?>
					            </button></td>

					            <!-- 42 -->
					            <td><button id="seat42" name="test" 
					      	class="<?php if($seat[42]==2||$seat[42]==3){?>btn btn-danger<?php }else if($seat[42]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="42" title="<?php echo $seat_text[42]?>">
					              <?php if($seat[42] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[42] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              42
					              <? }?>
					            </button></td>

					            <!-- 41 -->
					            <td><button id="seat41" name="test" 
					      	class="<?php if($seat[41]==2||$seat[41]==3){?>btn btn-danger<?php }else if($seat[41]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="41" title="<?php echo $seat_text[41]?>">
					              <?php if($seat[41] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[41] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              41
					              <? }?>
					            </button></td>

					            <!-- 46 -->
					            <td><button id="seat46" name="test" 
					      	class="<?php if($seat[46]==2||$seat[46]==3){?>btn btn-danger<?php }else if($seat[46]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="46" title="<?php echo $seat_text[46]?>">
					              <?php if($seat[46] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[46] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              46
					              <? }?>
					            </button></td>

					            <!-- 47 -->
					            <td><button id="seat47" name="test" 
					      	class="<?php if($seat[47]==2||$seat[47]==3){?>btn btn-danger<?php }else if($seat[47]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="47" title="<?php echo $seat_text[47]?>">
					              <?php if($seat[47] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[47] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              47
					              <? }?>
					            </button></td>

					            <!-- 48 -->
					            <td><button id="seat48" name="test" 
					      	class="<?php if($seat[48]==2||$seat[48]==3){?>btn btn-danger<?php }else if($seat[48]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="48" title="<?php echo $seat_text[48]?>">
					              <?php if($seat[48] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[48] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              48
					              <? }?>
					            </button></td>

					            <!-- 49 -->
					            <td><button id="seat49" name="test" 
					      	class="<?php if($seat[49]==2||$seat[49]==3){?>btn btn-danger<?php }else if($seat[49]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="49" title="<?php echo $seat_text[49]?>">
					              <?php if($seat[49] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[49] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              49
					              <? }?>
					            </button></td>

					            <!-- 50 -->
					            <td><button id="seat50" name="test" 
					      	class="<?php if($seat[50]==2||$seat[50]==3){?>btn btn-danger<?php }else if($seat[50]==1){?>btn btn-warning<?php }else{?>btn btn-success <? }?> seat " 
					        data-value="50" title="<?php echo $seat_text[50]?>">
					              <?php if($seat[50] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[50] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              50
					              <? }?>
					            </button></td>

					            <!-- 84 -->
					            <td><button id="seat84" name="test" 
					      	class="<?php if($seat[84]==2||$seat[84]==3){?>btn btn-danger<?php }else if($seat[84]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="84" title="<?php echo $seat_text[84]?>">
					              <?php if($seat[84] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[84] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              84
					              <? }?>
					            </button></td>

					            <!-- 85 -->
					            <td><button id="seat85" name="test" 
					      	class="<?php if($seat[85]==2||$seat[85]==3){?>btn btn-danger<?php }else if($seat[85]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="85" title="<?php echo $seat_text[85]?>">
					              <?php if($seat[85] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[85] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              85
					              <? }?>
					            </button></td>

					            <!-- 86 -->
					            <td><button id="seat86" name="test" 
					      	class="<?php if($seat[86]==2||$seat[86]==3){?>btn btn-danger<?php }else if($seat[86]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="86" title="<?php echo $seat_text[86]?>">
					              <?php if($seat[86] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[86] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              86
					              <? }?>
					            </button></td>
					            <td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">E</button></td>
					          </tr>
					        <tr bgcolor="#E6E6E6">
					            <td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">F</button></td>
					            <!-- 94 -->
					            <td><button id="seat94" name="test" 
					      	class="<?php if($seat[94]==2||$seat[94]==3){?>btn btn-danger<?php }else if($seat[94]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="94" title="<?php echo $seat_text[94]?>">
					              <?php if($seat[94] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[94] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              94
					              <? }?>
					            </button></td>

					            <!-- 93 -->
					            <td><button id="seat93" name="test" 
					      	class="<?php if($seat[93]==2||$seat[93]==3){?>btn btn-danger<?php }else if($seat[93]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="93" title="<?php echo $seat_text[93]?>">
					              <?php if($seat[93] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[93] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              93
					              <? }?>
					            </button></td>

					            <!-- 92 -->
					            <td><button id="seat92" name="test" 
					      	class="<?php if($seat[92]==2||$seat[92]==3){?>btn btn-danger<?php }else if($seat[92]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="92" title="<?php echo $seat_text[92]?>">
					              <?php if($seat[92] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[92] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              92
					              <? }?>
					            </button></td>

					             <!-- 91 -->
					            <td><button id="seat91" name="test" 
					      	class="<?php if($seat[91]==2||$seat[91]==3){?>btn btn-danger<?php }else if($seat[91]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="91" title="<?php echo $seat_text[91]?>">
					              <?php if($seat[91] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[91] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              91
					              <? }?>
					            </button></td>

					            <!-- 90 -->
					            <td><button id="seat90" name="test" 
					      	class="<?php if($seat[90]==2||$seat[90]==3){?>btn btn-danger<?php }else if($seat[90]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="90" title="<?php echo $seat_text[90]?>">
					              <?php if($seat[90] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[90] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              90
					              <? }?>
					            </button></td>

					            <!-- 89 -->
					            <td><button id="seat89" name="test" 
					      	class="<?php if($seat[89]==2||$seat[89]==3){?>btn btn-danger<?php }else if($seat[89]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="89" title="<?php echo $seat_text[89]?>">
					              <?php if($seat[89] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[89] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              89
					              <? }?>
					            </button></td>

					            <!-- 87 -->
					            <td><button id="seat87" name="test" 
					      	class="<?php if($seat[87]==2||$seat[87]==3){?>btn btn-danger<?php }else if($seat[87]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="87" title="<?php echo $seat_text[87]?>">
					              <?php if($seat[87] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[87] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              87
					              <? }?>
					            </button></td>

					            <!-- 88 -->
					            <td><button id="seat88" name="test" 
					      	class="<?php if($seat[88]==2||$seat[88]==3){?>btn btn-danger<?php }else if($seat[88]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="88" title="<?php echo $seat_text[88]?>">
					              <?php if($seat[88] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[88] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              88
					              <? }?>
					            </button></td>

					            <!-- 95 -->
					            <td><button id="seat95" name="test" 
					      	class="<?php if($seat[95]==2||$seat[95]==3){?>btn btn-danger<?php }else if($seat[95]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="95" title="<?php echo $seat_text[95]?>">
					              <?php if($seat[95] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[95] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              95
					              <? }?>
					            </button></td>

					            <!-- 96 -->
					            <td><button id="seat96" name="test" 
					      	class="<?php if($seat[96]==2||$seat[96]==3){?>btn btn-danger<?php }else if($seat[96]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="96" title="<?php echo $seat_text[96]?>">
					              <?php if($seat[96] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[96] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              96
					              <? }?>
					            </button></td>

					            <!-- 97 -->
					            <td><button id="seat97" name="test" 
					      	class="<?php if($seat[97]==2||$seat[97]==3){?>btn btn-danger<?php }else if($seat[97]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="97" title="<?php echo $seat_text[97]?>">
					              <?php if($seat[97] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[97] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              97
					              <? }?>
					            </button></td>

					            <!-- 98 -->
					            <td><button id="seat98" name="test" 
					      	class="<?php if($seat[98]==2||$seat[98]==3){?>btn btn-danger<?php }else if($seat[98]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="98" title="<?php echo $seat_text[98]?>">
					              <?php if($seat[98] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[98] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              98
					              <? }?>
					            </button></td>

					            <!-- 99 -->
					            <td><button id="seat99" name="test" 
					      	class="<?php if($seat[99]==2||$seat[99]==3){?>btn btn-danger<?php }else if($seat[99]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="99" title="<?php echo $seat_text[99]?>">
					              <?php if($seat[99] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[99] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              99
					              <? }?>
					            </button></td>

					            <!-- 100 -->
					            <td><button id="seat100" name="test" 
					      	class="<?php if($seat[100]==2||$seat[100]==3){?>btn btn-danger<?php }else if($seat[100]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="100" title="<?php echo $seat_text[100]?>">
					              <?php if($seat[100] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[100] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              100
					              <? }?>
					            </button></td>

					            <!-- 101 -->
					            <td><button id="seat101" name="test" 
					      	class="<?php if($seat[101]==2||$seat[101]==3){?>btn btn-danger<?php }else if($seat[101]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="101" title="<?php echo $seat_text[101]?>">
					              <?php if($seat[101] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[101] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              101
					              <? }?>
					            </button></td>

					            <!-- 102 -->
					            <td><button id="seat102" name="test" 
					      	class="<?php if($seat[102]==2||$seat[102]==3){?>btn btn-danger<?php }else if($seat[102]==1){?>btn btn-warning<?php }else{?>btn btn-info <? }?> seat" 
					        data-value="102" title="<?php echo $seat_text[102]?>">
					              <?php if($seat[102] == 2){?>
					              <img src="images/male.png"/>
					              <? }else if($seat[102] == 3){?>
					              <img src="images/female.png"/>
					              <? }else{?>
					              102
					              <? }?>
					            </button></td>
					            <td><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">F</button></td>
					            
					          </tr>
					        
					        <tr bgcolor="#FBFBEF">
					            <td colspan="22" bgcolor="#E6E6E6"><center> หลังห้อง </center></td>
					         </tr>
	 				        </tr>
					      </table>
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
    <script src="js/scrolling-nav.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap3-typeahead.min.js"></script>
<script src="js/jquery.table2excel.js"></script>
</body>

</html>
