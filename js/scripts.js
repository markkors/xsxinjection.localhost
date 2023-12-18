function confirmReset(event) {
	if(confirm("Weet je zeker dat je de database wilt resetten?")) {
		document.location.href = "index.php?resetdb=true";
	}
}