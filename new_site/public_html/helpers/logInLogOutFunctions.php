<?php require_once("global.php"); ?>
<?php
	function logIn($username)
	{
		$_SESSION["username"] = $username;
		$_SESSION["logged_in"] = true;
	}

	function logOut()
	{
		$_SESSION["username"] = null;
		$_SESSION["logged_in"] = null;
	}

?>