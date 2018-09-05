<?
session_start();
include("funtion.php");
include("ck_session_self.php");
error_reporting(~E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <? include("script_link.php");?>
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
      });
    });
    </script>
  </head>
  <body>
    <!-- START PAGE SOURCE -->
    <div id="container">
      <?php include('menu.php');?>
      <div id="content">
        <h2>ตารางไฟล์เรียน SELF ทั้งหมด</h2>
        <p>
          <style type="text/css">
          #sss {
          width:691px;
          height:60px;
          background:url(images/managesub.png) no-repeat left top;
          }
          .submit{
          width:90px;
          height:30px;
          background-color:#069;
          border-bottom-color:#CCC;
          color:#FFF;
          font-size: 10pt;
          font-family: arial;
          margin-left:80px;
          }
          </style>
          <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>#</strong></div></td>
                <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>วิชา</strong></div></td>
                <!-- <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>รหัสวิชา</strong></div></td> -->
                <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ผู้สอน</strong></div></td>
                <!-- <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ปีการศึกษา</strong></div></td> -->
                <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>เครดิต</strong></div></td>
                <th width=""  class="tbl2" style="white-space: nowrap;"><div align="center"><strong>แผ่น</strong></div></td>
              </tr>
            </thead>
            <tbody>
              <?
              $str_subject = "SELECT
              `subject`.subid,
              `subject`.subname,
              `subject`.`code`,
              `subject`.state,
              `subject`.`hour`,
              `subject`.disc,
              `subject`.`level`,
              `subject`.idaddterm,
              `subject`.brsnchvdo,
              `subject`.staffid,
              `subject`.date_subj,
              `subject`.`status`,
              `subject`.teacherid,
              `subject`.id_subject_real,
              `subject`.status_delete,
              `subject`.status_branch_hms,
              `subject`.status_branch_school,
              subject_real.name_subject_real,
              teacher.teachername,
              `year`.nameyear,
              term.nameterm
              FROM
              `subject`
              LEFT JOIN subject_real ON subject_real.id_subject_real = `subject`.id_subject_real
              LEFT JOIN teacher ON teacher.teacherid = `subject`.teacherid
              LEFT JOIN addtrem ON addtrem.idaddterm = `subject`.idaddterm
              LEFT JOIN `year` ON `year`.idyear = addtrem.idyear
              LEFT JOIN term ON term.idterm = addtrem.idterm
              WHERE subject.status_branch_hms = 1 and `subject`.status_delete != 1";
              $i=0;
              /*
              $strSQL = "SELECT * FROM subject WHERE status_delete != 1 AND status_branch_hms = 1 ORDER BY  `subject`.`subid` ASC";*/
              $objQuery = mysqli_query($con_ajtongmath_self,$str_subject) or die ("Error Query [".$str_subject."]");
              while($objResult = mysqli_fetch_array($objQuery)){
              $i++;
              if($objResult['id_subject_real'] == 0  || $objResult['id_subject_real'] == ''){
              $name_subject = $objResult["subname"];
              }else{
              $name_subject = $objResult["name_subject_real"];
              }
              ?>
              
              <tr>
                <td style="white-space:nowrap;" class="tblyy"><div align="center">
                  <?=$i?>
                </td>
                <?
                /*$strSQL7 = "SELECT * FROM subject_real WHERE id_subject_real = '".$objResult['id_subject_real']."'";
                $objQuery7 = mysqli_query($con_ajtongmath_self,$strSQL7) or die ("Error Query [".$strSQL7."]");
                $objResult7 = mysqli_fetch_array($objQuery7);
                if($objResult['id_subject_real'] != 0){
                $name_subject = $objResult["subname"];
                }else{
                $name_subject = $objResult["name_subject_real"];
                }*/
                ?>
                <td ><?=$name_subject;?></td>
                <!-- <td style="white-space:nowrap;"><div align="center"><?=$objResult["code"];?></div></td> -->
                <?
                /* $strSQL4 = "SELECT * FROM teacher WHERE  teacherid = '".$objResult['teacherid']."'";
                $objQuery4 = mysqli_query($con_ajtongmath_self,$strSQL4) or die ("Error Query [".$strSQL."]");
                $objResult4 = mysqli_fetch_array($objQuery4);*/
                ?>
                <td style="white-space:nowrap;"><div align="center">
                  <?  if($objResult['teachername'] != ''){echo $objResult['teachername']; }
                  else{ echo "ไม่มีข้อมูล";}
                  ?>
                </div>
              </td>
              <?
              // $strSQL_trem = "SELECT *
              // FROM (addtrem LEFT JOIN term ON addtrem.idterm = term.idterm)
              // LEFT JOIN year ON addtrem.idyear = year.idyear
              // WHERE addtrem.idaddterm = '".$objResult['idaddterm']."'";
              //             $objQuery_trem = mysqli_query($con_ajtongmath_self,$strSQL_trem) or die ("Error Query [".$strSQL_trem."]");
              //   $objResult_trem = mysqli_fetch_array($objQuery_trem)
              ?>
              
              <!-- <td style="white-space:nowrap;"><div align="center">
                <?  if($objResult["nameterm"] != '' && $objResult["nameterm"]){echo $objResult['nameyear']."/".$objResult["nameterm"]; }
                else{ echo "ไม่มีข้อมูล";}
                ?>
              </div></td> -->
              <td style="white-space:nowrap;"><div align="center">
                <?=$objResult["hour"];?>
              </div></td>
              <td style="white-space:nowrap;"><div align="center">
                <?=$objResult["disc"];?>
              </div></td>
            </tr>
            
            <? } ?>
          </tbody>
        </table>
        <table class="tbl22" cellpadding="0" cellspacing="1" width="100%" align="rigth">
          <tr><td class="tbl3">*หมายเหตุ :หมายเลขของแต่ละสาขา เพื่อบ่งบอกไฟล์เรียนที่อัพแล้ว</td></tr>
          
        </table>
        <br/>
      </form>
    </p>
  </div>
</body>
<? mysqli_close($con_ajtongmath_self);?>
</html>