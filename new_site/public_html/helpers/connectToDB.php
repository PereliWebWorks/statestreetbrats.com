<?php
	require_once __DIR__ . "/../../secrets/passwords.php";
	$db = new PDO('mysql:host=localhost;dbname=ssb_db', DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>