<?php
	require_once __DIR__ . "/../../secrets/passwords.php";
	if (ENVIRONMENT === "PRODUCTION")
	{
		define("DB_NAME", "ssbdb");
	}
	elseif (ENVIRONMENT === "DEVELOPMENT")
	{
		define("DB_NAME", "ssb_db");
	}
	$db = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>