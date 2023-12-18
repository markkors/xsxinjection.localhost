<?php
	require_once "databasefunctions.php";	

	/* 
		sommige browser blokeren XSS aanvallen al automatisch
		we zetten de beveiliging voor nu even uit.
	*/
	header('X-XSS-Protection:0');
	
	$html_messages = null;


	if(isset($_GET["resetdb"]) && $_GET["resetdb"]) {
		require_once "resetdatabase.php";
		resetDatabase();
		header("location: index.php");
	}

	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		insertMessage($_POST["name"], $_POST["message"]);
	}

	$messages = getAllMessages();
	foreach($messages as $message) {
		$html_messages .= "<div class='message_wrapper'>";
		$html_messages .= "<div class='message_header'>$message->name<span style='float:right;'>$message->message_date</span></div>";
		$html_messages .= "<div class='message_content'>$message->message</div>";
		$html_messages .= "</div>";
	}


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
				<?=$html_messages;?>
			</div>
		</div>
	</body>
</html>