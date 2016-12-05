<?php require_once("global.php"); ?>
<?php
	if (!isset($_SESSION["logged_in"]))
	{
		header("Location: " . HOST_URL);
		die();
	}
?>