<?php
	try{
		$host = '127.0.0.1';
		$dbname ='test';
		$user ='root';
		$pass ='Fsheelaghs2';
		$DBH = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
	}catch(PDOException $e){echo"ERROE";}

?>
