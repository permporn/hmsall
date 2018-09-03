<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Student</title>
</head>

<body>
<form id="form1" name="form1" method="GET" action="insertstudent.php">
<p><label for="" class="left">ชื่อ-นามสกุล:</label>
<input name="name"/></p>
<p><label for="" class="left">โรงเรียน:</label>
<input name="school"/></p>
<p><label for="" class="left">เบอร์โทร: </label>
<input name="tel"/></p>
<p><label for="" class="left">สมัครที่:</label>
<select name="local"  id="local"  >
    <option>เลือกสถานที่</option>
    <option value="1">พญาไท ชั้น 10 </option>
    <option value="5">พญาไท ชั้น 9 </option>
    <option value="4">พญาไท ชั้น 2 </option>
    <option value="2">วงเวียนใหญ่</option>
    <option value="3">วิสุทธิธานี</option>
    <option value="6">สระบุรี สุขอนันต์ ปาร์ค</option>
    <option value="7">ชลบุรี</option>
    <option value="8">ราชบุรี</option>
    </select>
</p>
<p><input type="submit" name="Save" id="Save" value="Save"></p>
</form>
</body>
</html>