<?php 
		
			$username = "root";
			$password = "";
			$hostname = "localhost"; 

	
			$db = mysql_connect($hostname, $username, $password)  or die("Unable to connect to MySQL");
			$con = mysql_select_db("meal",$db) or die("Could not select examples");
			
			return $db;
		
?>