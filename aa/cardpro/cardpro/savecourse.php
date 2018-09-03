<?
session_start();
$subid=$_POST["subid"];
$learnid=$_GET["learnid"];$id_year=$_GET["id_year"];$branchid=$_GET["branchid"];
header("location:courseseat.php?subid=$subid&learnid=$learnid&id_year=$id_year&branchid=$branchid");
?>