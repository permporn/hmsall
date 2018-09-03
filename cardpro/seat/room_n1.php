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
					<table width="65%" align="center">
					        <tr bgcolor="#E6E6E6">
					            <td colspan="19" height="90px"><center><img src="images/screen.png" title="เวที และกระดาน" class="tootip" width="650px"></center></td>
	 				        </tr>
	 				        <tr bgcolor="#E6E6E6">
					            <td colspan="13" bgcolor="" height="75px" ></td>
					            <td rowspan="4">ทางเดิน</td>
	 				        </tr>	 				        
	 				        	 				        
					        <tr bgcolor="#E6E6E6">
					        	<td height="55px"><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">A</button></td>
					           				            
					            <!-- 1 -->
					            <td><button id="seat5" name="test" 
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

					            <!-- 7 -->
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

					            

					          </tr>
					        <tr bgcolor="#E6E6E6">

					        	<td height="55px"><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">B</button></td>
								 
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

					            <!-- 15 -->
					            <td><button id="seat11" name="test" 
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

					            
					          </tr>
					        
					        <tr bgcolor="#E6E6E6">
								<td height="55px"><button id="seat0" name="test" class="seat btn btn-default" data-value="" disabled="disabled">C</button></td>					

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

					            <!-- 23 -->
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
					           
					       </tr>
	 				        <tr bgcolor="#E6E6E6">
					            <td colspan="19" height="35px">
					            <img align="right" src="images/exit_2.png" title="ทางเดินเข้า-ออก" class="tootip">
					            </td>
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
