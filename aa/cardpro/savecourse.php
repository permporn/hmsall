<?
session_start();
$subid=$_POST["subid"];
$learnid=$_GET["learnid"];$termid=$_GET["termid"];$branchid=$_GET["branchid"];
header("location:courseseat.php?subid=$subid&learnid=$learnid&termid=$termid&branchid=$branchid");
?>