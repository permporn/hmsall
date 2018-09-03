<?php 
include("ck_session.php");
include('config/config_db_self.php'); 
$button_class = array('btn-warning', 'btn-primary' ,'btn-default', 'btn-success', 'btn-info', 'btn-danger');
?>
<style>
</style>
<div class="row">
    <div class="col-md-12">
        <div class="row header">
            <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><span class="glyphicon glyphicon-search" aria-hidden="true" ></span>  ค้นหา</h4></div>
                <div class="panel-body"> 
                    <div class="btn-group search-sex" role="group">
                        <?php 
                        $strSQL_stu = "SELECT `sex` FROM  `student` GROUP BY  `sex` ORDER BY  `student`.`sex` DESC" ; //LIMIT 0, 15
                        $objQuery_stu = mysql_query($strSQL_stu) or die ("Error Query [".$strSQL_stu."]");
                        $i = 0;
                        while ( $objResult_stu = mysql_fetch_array($objQuery_stu)) {
                        if($objResult_stu['sex'] == ''){
                            $name_sex = "ไม่ระบุ";
                        }else{
                            $name_sex = $objResult_stu['sex'];
                        }?>
                        <button type="button" class="btn <?=$button_class[$i]?> btn-search-sex" value="<?=$objResult_stu['sex'];?>"><?=$name_sex?></button>
                        <? $i++;}?>
                    </div>
                    <div class="loader" id="loader"></div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-12" id="data-table" ></div>
</div>

