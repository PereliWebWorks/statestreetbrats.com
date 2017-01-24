<?php
	session_start();
	define("ENVIRONMENT", "PRODUCTION");
	if (ENVIRONMENT === "PRODUCTION")
	{
		define("HOST_URL", "http://statestreetbrats.com");
	}
	elseif(ENVIRONMENT === "DEVELOPMENT")
	{
		define("HOST_URL", "http://statestreetbrats.drewpereli.com");
	}
	date_default_timezone_set('America/Chicago');
?>