<?php
	require_once "database.php";
	
	function getAllMessages() {
		global $con;

		$statement = $con->prepare("SELECT * FROM message");
		
		$statement->execute();
		
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	function insertMessage($name, $message) {
		global $con;

		$statement = $con->prepare("INSERT INTO message(name, message) VALUES(?, ?)");
		$statement->bindValue(1, $name);
		$statement->bindValue(2, $message);
		
		$statement->execute();
	}
	
?>