<div class="row">
        <div class="col-lg-12">
            
            <h4 class="col-lg-12 page-header"> 
                <!-- Decription --> 
                <div class="col-md-8" style="margin-left:-20px;"> <? //echo date("d-m-Y H:i:s") ." ----- ".$seat_time[4]."=".$time_diff;?>
                    ผังห้องคอร์ส <?=$objResult_subject['subname'];?>
                    <small>
                    ( ณ <?= date('d-m-Y H:i:s')?> น. <a href="" title="Refresh"><span class="glyphicon glyphicon-refresh" aria-hidden="true" ></span></a> )
                    <button type="button" class="btn btn-primary modalDatatable"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span> รายชื่อ</button>
                
                    <br><!--รหัสวิชา <?=$objResult_subject['subcode'];?> -->
                    โดย <?=$objResult_subject['teachername'];?>
                    วันที่ <? if($objResult_subject['date']==''){echo " - ";}else{ echo $objResult_subject['date'];}?> 
                    เวลา <? if($objResult_subject['time']==''){echo " - ";}else{ echo $objResult_subject['time'];}?>
                    ราคา <? if($objResult_subject['price']==''){echo " - ";}else{ echo number_format($objResult_subject['price']);}?> บาท
                    </small>
                </div>
                <!-- End Decription --> 
                
                <!-- selection subject -->
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
                <div class="col-md-4" align="right" style="margin-top:0px;"> 
                    <select class="selectpicker" data-live-search="true" id="selectpicker">
                        <option data-tokens="กรุณาเลือก" value="0" selected="selected">กรุณาเลือกวิชา</option>
                        <?php 
                            $strSQL_subjectall = "SELECT * 
                            FROM `subject` 
                            LEFT JOIN teacher ON  subject.teachid = teacher.teacherid  
                            WHERE `status_system_seat` = '1' 
                            ORDER BY teacherid ASC , subid ASC" ;
                            $objQuery_subjectall = mysql_query($strSQL_subjectall) or die ("Error Query [".$strSQL_subjectall."]");
                            while ( $objResult_subjectall = mysql_fetch_array($objQuery_subjectall)) {?>
                         <option data-tokens="<?=$objResult_subjectall['teachername']?> <?=$objResult_subjectall['subname']?>" value="<?=$objResult_subjectall['subid']?>">
                         <?=$objResult_subjectall['teachername']?> : <?=$objResult_subjectall['subname'];?></option><? }?>
                    </select>
                    <!--<button type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ค้นหา</button>-->
                </div>
                </form>
                <!-- End selection subject -->
            </h4>
        </div>
</div>
