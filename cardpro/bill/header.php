<style>
#myform {
    text-align: center;
    padding: 5px;
    border: 1px dotted #ccc;
    margin: 2%;
}
.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}

</style>
 
<div class="col-md-12">
<? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"){?>
<div class="row header">
        <div class="col-lg-12">
            
            <div class="panel panel-default search-form">
            <div class="panel-heading"><h4><div id="header_title"></div></h4></div>
            <div class="panel-body"> 
                <!-- Decription --> 

                <!-- search-form --> 
                <form id="search-form">
                <? include('config/config_db_self.php'); ?>
                <div class="col-md-12" align="left" style="margin-top:0px;"> 
                    <input type="hidden" name="staff_id_bill" id="staff_id_bill" value="<?=$id_account_self?>">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="s_date" class="col-sm-4 control-label"><h5>วันเริ่มต้น :</h5></label>
                            <div class='input-group date col-sm-6' id='s_date'>
                            <input type='text' data-date-format="yyyy-mm-dd" class="form-control s_date" value="<?=date('Y-m-d', strtotime('-7 days'));?>" name="s_date" id="s_date"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div>
                        </div>
                        <div class="form-group">
                            <label for="e_date" class="col-sm-4 control-label"><h5>วันที่สิ้นสุด :</h5></label>
                            <div class='input-group date col-sm-6' id='e_date'>  
                            <input type='text' data-date-format="yyyy-mm-dd" class="form-control e_date" value="<?=date('Y-m-d');?>" name="e_date" id="e_date"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> </div>
                        </div>
                        <!-- <div class="form-group">
                          <label for="type" class="col-sm-4 control-label"><h5><font color="red">*</font>คอร์ส :</h5></label>
                          <select class="form-control type" id="type" style="width:130px;">
                            <option value="0" selected="selected" disabled="disabled">กรุณาเลือก</option>
                            <? if(($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") &&  $objResultSTT["status"]!= "teacher"){?>
                            <option value="1" >คอร์ส สด</option>
                            <? }?>
                            <option value="2" selected="selected">คอร์ส self</option>
                            <? if(($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin")&&  $objResultSTT["status"]!= "teacher"){?>
                            <option value="3">คอร์ส DVD</option>
                            <? }?>
                          </select>
                          <select class="form-control type"  name="type" id="type" style="width:130px;">
                                <option value="0" disabled="disabled" selected="selected">กรุณาเลือก</option>
                                <?
                                $strSQL_type = "SELECT * FROM type_self WHERE type_id != 2 AND type_id != 3";
                                $objQuery_type = mysql_query($strSQL_type) or die ("Error Query [".$strSQL_type."]");
                                while ( $result_type = mysql_fetch_array($objQuery_type)){?>
                                        <option value="<?=$result_type['type_id']?>" ><?=$result_type['type_name'];?></option>
                                <? }?>
                            </select>
                        </div> -->
                        
                        <? if($objResultSTT["status"]!= "teacher"){?>
                        <div class="form-group quantity">
                            <label class="col-sm-4 control-label"><h5>คิด % ได้ :</h5></label>
                                <div class="input-group col-sm-6"> <h5> 
                                    <input type='button' value='-' class='qtyminus btn btn-primary' field='quantity'/>
                                    <input type='text'  value='100' class='qty' name='quantity' max="100"  min="0" id="quantity" />
                                    <input type='button' value='+' class='qtyplus btn btn-primary' field='quantity'/>  %</h5>
                                </div>
                        </div>
                        <div class="form-group set_pay">
                            <label class="col-sm-4 control-label"><h5>เซต :</h5></label>
                                <select class="form-control set_pay" id="set_pay" style="width:130px;">
                                     <?php 
                                        $strSQL_set_pay = "SELECT * FROM `bill_percent` GROUP BY set_name ORDER BY id ASC" ;
                                        $objQuery_set_pay = mysql_query($strSQL_set_pay) or die ("Error Query [".$strSQL_set_pay."]");
                                        while ( $objResult_set_pay = mysql_fetch_array($objQuery_set_pay)) {?>
                                         <option value="<?=$objResult_set_pay['id_set']?>"><?=$objResult_set_pay['set_name']?></option>
                                        <? }?>
                                </select>
                        </div>
                        <? }?>
                        
                    </div>
                    
                    
                    <? if($objResultSTT["status"]!= "teacher"){?>
                    <div class="search-self col-md-6">
                        <div class="form-group subject_self">
                        <label for="subject_self" class="col-sm-3 control-label subject_self"><h5>วิชาเรียน :</h5></label>
                        <select id="subject_self" multiple="multiple" class="subject_self">
                            <?php 
                                $strSQL_subjectall = "SELECT * FROM `subject` " ; //LIMIT 0, 15
                                $objQuery_subjectall = mysql_query($strSQL_subjectall) or die ("Error Query [".$strSQL_subjectall."]");
                                while ( $objResult_subjectall = mysql_fetch_array($objQuery_subjectall)) {?>
                             <option value="<?=$objResult_subjectall['subid']?>"><?=$objResult_subjectall['code']?> <?=$objResult_subjectall['subname'];?></option><? }?>
                        </select>
                        </div>

                        <div class="form-group term_self">
                        <label for="term_self" class="col-sm-3 control-label term_self"><h5>ปีการศึกษา :</h5></label>
                        <select id="term_self" multiple="multiple" class="term_self">
                            <?php  $strSQL_term = "SELECT
                                                    addterm.idaddterm AS id,
                                                    term.nameterm AS term,
                                                    `year`.nameyear AS `year`
                                                    FROM
                                                    addtrem AS addterm
                                                    LEFT JOIN term ON term.idterm = addterm.idterm
                                                    LEFT JOIN year ON year.idyear = addterm.idyear
                                                    ORDER BY
                                                    `year` DESC,
                                                    term DESC ";
                                $objQuery_term = mysql_query($strSQL_term) or die ("Error Query [".$strSQL_term."]");
                                while ( $objResult_term = mysql_fetch_array($objQuery_term)) { ?>
                                <option value="<?=$objResult_term['id']?>"><?=$objResult_term['year']?> <?=$objResult_term['term'];?></option>
                                <? }?>
                        </select>
                        </div>
                        <? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"){?>
                        <div class="form-group">
                        <label for="branch_self" class="col-sm-3 control-label branch_self"><h5>สาขา :</h5></label>
                        <select id="branch_self" multiple="multiple" class="branch_self">
                            <?php 
                                $strSQL_branch = "SELECT * FROM `branch` WHERE status_branch != 0 ORDER BY name ASC";
                                $objQuery_branch = mysql_query($strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
                                while ( $objResult_branch = mysql_fetch_array($objQuery_branch)) {?>
                            <option value="<?=$objResult_branch['branchid']?>"><?=$objResult_branch['name'];?></option><? }?>
                        </select>                       
                        </div>
                        <? }?>

                        <div class="form-group">
                            <label for="teacher_self" class="col-sm-3 control-label teacher_self"><h5>ครู :</h5></label>
                            <select id="teacher_self" multiple="multiple" class="teacher_self">
                                <?php 
                                    $strSQL_teacherall = "SELECT * FROM `teacher` WHERE status_teacher = 1" ; //LIMIT 0, 15
                                    $objQuery_teacherall = mysql_query($strSQL_teacherall) or die ("Error Query [".$strSQL_teacherall."]");
                                    while ( $objResult_teacherall = mysql_fetch_array($objQuery_teacherall)) {?>
                                    <option value="<?=$objResult_teacherall['teacherid']?>"><?=$objResult_teacherall['teachername'];?></option><? }?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pay_self" class="col-sm-3 control-label pay_self"><h5>ประเภทการจ่าย :</h5></label>
                            <select id="pay_self" multiple="multiple" class="pay_self">
                                    <option value="transfer">โอน</option>
                                    <option value="cradit">บัตรเครดิต</option>
                                    <option value="money">เงินสด</option>
                                    <option value="test">ทดลองเรียนฟรี</option>
                                    <? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"){?>
                                    <option value="free">ฟรี พิเศษ</option>
                                    <? }?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="price_self" class="col-sm-3 control-label price_self"><h5>ประเภทราคา :</h5></label>
                            <select class="form-control price_self" id="price_self" style="width:130px;">
                                <option value="self_amount" >ราคาที่ชำระ</option>
                                <option value="subject_real_price" selected="selected">ราคาเต็ม</option>
                          </select>
                        </div>                       
                    </div>
                    <? 
                    mysql_close($conn);
                    include("config/config_db_school.php");
                    ?>
                    <!-- <div class="search-learn col-md-6">
                        <div class="form-group">
                        <label for="subject_learn" class="col-sm-3 control-label subject_learn"><h5>วิชาเรียน :</h5></label>
                        <select id="subject_learn" multiple="multiple" class="subject_learn">
                            <?php 
                                $strSQL_subjectall = "SELECT * FROM `subject` WHERE `status_system_seat` = '1'" ; //LIMIT 0, 15
                                $objQuery_subjectall = mysql_query($strSQL_subjectall) or die ("Error Query [".$strSQL_subjectall."]");
                                while ( $objResult_subjectall = mysql_fetch_array($objQuery_subjectall)) {?>
                             <option data-tokens="<?=$objResult_subjectall['subcode']?> <?=$objResult_subjectall['subname']?>" value="<?=$objResult_subjectall['subid']?>">
                             <?=$objResult_subjectall['subcode']?> <?=$objResult_subjectall['subname'];?></option><? }?>
                        </select>
                        </div>

                        <div class="form-group">
                        <label for="term_learn" class="col-sm-3 control-label term_learn"><h5>ปีการศึกษา :</h5></label>
                        <select id="term_learn" multiple="multiple" class="term_learn">
                            <?php 
                                $strSQL_term = "  SELECT
                                                        addterm.id_year AS `id`,
                                                        `year`.nameyear AS year,
                                                        term.term AS term
                                                        FROM
                                                        addterm
                                                        LEFT JOIN `year` ON `year`.id = addterm.year_id
                                                        LEFT JOIN term ON term.termid = addterm.termid
                                                        ORDER BY `year` DESC, term.termid DESC" ; //LIMIT 0, 15
                                $objQuery_term = mysql_query($strSQL_term) or die ("Error Query [".$strSQL_term."]");
                                while ( $objResult_term = mysql_fetch_array($objQuery_term)) {?>
                             <option data-tokens="" value="<?=$objResult_term['id']?>"><?=$objResult_term['year']?> <?=$objResult_term['term'];?></option><? }?>
                        </select>
                        </div>

                        <? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin"){?>
                        <div class="form-group">
                        <label for="branch_learn" class="col-sm-3 control-label branch_learn"><h5>สาขา :</h5></label>
                        <select id="branch_learn" multiple="multiple" class="branch_learn">
                            <?php 
                                $strSQL_branch = "SELECT * FROM `branch` ORDER BY branchname ASC";
                                $objQuery_branch = mysql_query($strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
                                while ( $objResult_branch = mysql_fetch_array($objQuery_branch)) {?>
                            <option value="<?=$objResult_branch['branchid']?>"><?=$objResult_branch['branchname'];?></option><? }?>
                        </select>                       
                        </div>
                        <? }?>

                        <div class="form-group">
                            <label for="teacher_learn" class="col-sm-3 control-label teacher_learn"><h5>ครู :</h5></label>
                            <select id="teacher_learn" multiple="multiple" class="teacher_learn">
                                <?php 
                                    $strSQL_teacherall = "SELECT * FROM `teacher` WHERE status_teacher = 1 " ; //LIMIT 0, 15
                                    $objQuery_teacherall = mysql_query($strSQL_teacherall) or die ("Error Query [".$strSQL_teacherall."]");
                                    while ( $objResult_teacherall = mysql_fetch_array($objQuery_teacherall)) {?>
                                    <option value="<?=$objResult_teacherall['teacherid']?>"><?=$objResult_teacherall['teachername'];?></option><? }?>
                            </select>
                        </div>
                    </div>
                </div> -->
                <? }?>
                <? mysql_close($conn);?>
                
                <!-- <div class="col-md-12 form-saerch">
                <button type="reset" id="example-reset-button" class="btn btn-default">Reset</button>
                <button type="button" class="btn btn-primary btn-search" id="btn-search"><span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ค้นหา</button>
                </div> -->

                <div class="col-md-12 form-gen">
                <!-- <button type="reset" id="example-reset-button" class="btn btn-default">Reset</button> -->
                <button type="button" class="btn btn-success btn-gen" id="btn-gen"><span class="glyphicon glyphicon-refresh" aria-hidden="true" ></span> gen ใบเสร็จ</button>
                </div>
            </div>
            </form>
        </div>
        </div>
        </div>
</div>
<? }?>
        <!--<div class="panel panel-default">
        <div class="panel-heading"><h4><span class="glyphicon glyphicon-list" aria-hidden="true"></span> รายการทั้งหมด </h4></div>
        <div class="panel-body">--> 
        <div class="col-md-12" id="data-table" ></div><!-- </div> 
        </div>  -->
</div>
