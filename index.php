<?php
	require_once "databasefunctions.php";	

	/* 
		sommige browser blokeren XSS aanvallen al automatisch
		we zetten de beveiliging voor nu even uit.
	*/
	header('X-XSS-Protection:0');
	
	if(isset($_GET["resetdb"]) && $_GET["resetdb"]) {
		require_once "resetdatabase.php";
		resetDatabase();
		header("location: index.php");
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		insertMessage($_POST["name"], $_POST["message"]);
	}
	
	$messages = getAllMessages();
	
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="actionbar">
			<span style="float:left;">CROSS SITE SCRIPTING (XSS) PLAYGROUND</span>
			<a href="index.php?resetdb=true">Reset database</a>
		</div>
		
		<div id="container">
			<h2>Bericht versturen:</h2>
			<form method="post">
				<div>Naam:</div>
				<input type="text" name="name" maxlength="200" /><br/>
				<div>Bericht:</div>
				<textarea type="text" name="message"></textarea><br/>
				<input type="submit" value="Bericht versturen" /> 
			</form>
			<br/>
			<h2>Berichten:</h2>
			<br/>
			<div id="message_container">
				<?php
					foreach($messages as $message) {
						echo "<div class='message_wrapper'>";
						echo "<div class='message_header'>$message->name<span style='float:right;'>$message->message_date</span></div>";
						echo "<div class='message_content'>$message->message</div>";
						echo "</div>";
					}
				?>
			</div>
		</div>
	</body>
</html>