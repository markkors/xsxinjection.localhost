<?php
	
	try {
		$con = new PDO("mysql:host=localhost;port=3307", "root", "");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->exec("USE XSS");	
	}
	catch(Exception $e) {
			require_once "resetdatabase.php";
			resetdatabase();
			$con->exec("USE XSS");
	}

?>