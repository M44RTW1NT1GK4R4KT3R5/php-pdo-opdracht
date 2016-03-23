<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	try {
		//Creating connection for mysql
		$conn = new PDO("mysql:host=$servername;dbname=opdracht", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = $conn->prepare("INSERT INTO `phples` VALUES (:naam, :email, :bericht)");
		$sql->bindParam(':naam', $_GET["naam"]);
		$sql->bindParam(':email', $_GET["email"]);
		$sql->bindParam(':bericht', $_GET["bericht"]);
		if ($sql->execute()) {
			echo "<strong>Geslaagd!</strong> Je gegevens zijn opgeslagen.";
		}else{
			echo "<strong>Fout!</strong> Er is iets misgegaan.";
		}
		$conn = null;
	}catch(PDOException $e){
		echo "<strong>Error!</strong> ".$e->getMessage();
	}
?>