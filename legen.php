<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	try {
		//Creating connection for mysql
		$conn = new PDO("mysql:host=$servername;dbname=opdracht", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = $conn->prepare("TRUNCATE TABLE phples");
		if ($sql->execute()) {
			echo "<strong>Geslaagd!</strong> De databank is leeg.";
		}else{
			echo "<strong>Fout!</strong> Er is iets misgegaan.";
		}
		$conn = null;
	}catch(PDOException $e){
		echo "<strong>Error!</strong> ".$e->getMessage();
	}
?>