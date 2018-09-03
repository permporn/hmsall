<?php 
	include('../config.php');
	
	if($_GET['password'] == 'P@ssw0rd'){
	
		if($_GET['action'] == 'TRUNCATE'){
			$sql = "TRUNCATE TABLE `ex_mapexam`";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'TRUNCATE TABLE ex_mapexam sucess'.'<BR>';
			}else if(!$result){
				echo 'TRUNCATE TABLE ex_mapexam not sucess'.'<BR>';
			}
			
			$sql = "TRUNCATE TABLE `ex_mapset`";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'TRUNCATE TABLE ex_mapset sucess'.'<BR>';
			}else if(!$result){
				echo 'TRUNCATE TABLE ex_mapset not sucess'.'<BR>';
			}
			
			$sql = "TRUNCATE TABLE `ex_question`";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'TRUNCATE TABLE ex_question sucess'.'<BR>';
			}else if(!$result){
				echo 'TRUNCATE TABLE ex_question not sucess'.'<BR>';
			}
			
			$sql = "TRUNCATE TABLE  `ex_set`";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'TRUNCATE TABLE ex_set sucess'.'<BR>';
			}else if(!$result){
				echo 'TRUNCATE TABLE ex_set not sucess'.'<BR>';
			}
			
			$sql = "TRUNCATE TABLE 'ex_subject'";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'TRUNCATE TABLE ex_subject sucess'.'<BR>';
			}else if(!$result){
				echo 'TRUNCATE TABLE ex_subject not sucess'.'<BR>';
			}
			
			
		}else if($_GET['action'] == 'DROP_TABLE'){
			$sql = "DROP TABLE 'ex_mapexam'";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'DROP table ex_mapexam sucess'.'<BR>';
			}else if(!$result){
				echo 'DROP table ex_mapexam not sucess'.'<BR>';
			}
			
			$sql = "DROP TABLE 'ex_mapset'";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'DROP table ex_mapset sucess'.'<BR>';
			}else if(!$result){
				echo 'DROP table ex_mapset not sucess'.'<BR>';
			}
			
			$sql = "DROP TABLE 'ex_question'";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'DROP table ex_question sucess'.'<BR>';
			}else if(!$result){
				echo 'DROP table ex_question not sucess'.'<BR>';
			}
			
			$sql = "DROP TABLE 'ex_set'";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'DROP table ex_set sucess'.'<BR>';
			}else if(!$result){
				echo 'DROP table ex_set not sucess'.'<BR>';
			}
			
			$sql = "DROP TABLE 'ex_subject'";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'DROP table ex_subject sucess'.'<BR>';
			}else if(!$result){
				echo 'DROP table ex_subject not sucess'.'<BR>';
			}
		}else if($_GET['action'] == 'DROP_DATABASE'){
			$sql = "DROP DATABASE  `selfdb`";
			$query = mysql_query($sql) or die ("Error Query [".$sql."]");
			$result = mysql_fetch_array($query);
			if($result){
				echo 'DROP DATABASE selfdb sucess'.'<BR>';
			}else if(!$result){
				echo 'DROP DATABASE selfdb not sucess'.'<BR>';
			}
		}else{
			echo 'action incorrect'.'<BR>';
		}
	}else{
		echo 'password incorrect'.'<BR>';
	}
	 
?>
