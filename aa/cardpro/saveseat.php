<?
session_start();
$seat=$_POST["seat"];
$subid=$_GET["subid"];
$learnid=$_GET["learnid"];$termid=$_GET["termid"];$branchid=$_GET["branchid"];
header("location:confirmcourse.php?subid=$subid&learnid=$learnid&termid=$termid&branchid=$branchid&seat=$seat");
?>