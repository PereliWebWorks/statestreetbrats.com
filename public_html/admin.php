<?php

	$db;
	$message = "";
	//If the user is logging in
	if (isset($_POST["log-in"]))
	{
		$db = new PDO('mysql:host=localhost;dbname=ssb_db', "root", "bliss-eastern-stiffen-outboard");
		$username = $_POST["log-in"]["username"];
		$stmt = $db->prepare("SELECT password_digest FROM users WHERE username = :username");
		$stmt->bindParam(":username", $username);
		$stmt->execute();
		$result = $stmt->fetch();
		if ($stmt->rowCount() == 0) //If the username is bad, the statement will return 0 rows.
		{
			$message = "Bad username.";
		}
		else
		{
			$hash = $result["password_digest"];
			$pwd_confirmed = password_verify($_POST["log-in"]["password"], $hash);
			$_POST["log-in"]["password"] = null;
			if (!$pwd_confirmed)
			{
				$message = "Bad password.";
			}
			else
			{
				$message = "Log in this user.";
			}
		}
	}
	//Else if the user is signing up
	elseif (isset($_POST["sign-up"]))
	{
		$db = new PDO('mysql:host=localhost;dbname=ssb_db', "root", "bliss-eastern-stiffen-outboard");
		$username = $_POST["sign-up"]["username"];
		//If the username is taken
		$stmt = $db->prepare("SELECT username FROM users WHERE username = :username");
		$stmt->bindParam(":username", $username);
		$stmt->execute();
		if ($stmt->rowCount() != 0) //If there is already a user with that name 
		{
			$message = "That username is taken.";
		}
		else
		{
			$pwdHash = password_hash($_POST["sign-up"]["password"], PASSWORD_DEFAULT);
			$_POST["sign-up"]["password"] = null;
			$pwd_confirmed = password_verify($_POST["sign-up"]["password_confirmation"], $pwdHash);
			$_POST["sign-up"]["password_confirmation"] = null;
			if (!$pwd_confirmed) //If the password doesn't match the password confirmation
			{
				$message = "Passwords do not match.";
			}
			else //If the password and password confirmation match
			{
				$masterPwdHash = "$2y$10$.qDsS7/lEfHT/AaQyFODOeoUICq3EKl2N2UzVCVNryciy5PUaJHnm";
				$masterPwdConfirmed = password_verify($_POST["sign-up"]["ssb_password"], $masterPwdHash);
				if (!$masterPwdConfirmed)
				{
					$message = "Master password is incorrect.";
				}
				else //Else, add the user!
				{
					$role = 0;
					$stmt = $db->prepare("INSERT INTO users (username, password_digest, role) "
											. "VALUES (:username, :pwd_digest, :role)");
					$stmt->bindParam(":username", $username);
					$stmt->bindParam(":pwd_digest", $pwdHash);
					$stmt->bindParam(":role", $role);
					$stmt->execute();

					$message = "Signed up.";
				}
			}
		}
	}
	$db = null;
?>

<?php require_once("helpers/globalHead.php"); ?>
<?php require_once ("helpers/contentStart.php"); ?>

	<div class="col-xs-3"></div>

	<div class="col-xs-6">
		<div class="row bubble">
			<h2>Log In</h2>
			<div class="col-xs-12">
				<form method="post" action="">
					<div class="form-group">
						<label for="log-in[username]">Username</label>
						<input type="text" id="log-in[username]" class="form-control" />
					</div>
					<div class="form-group">
						<label for="log-in[password]">Password</label>
						<input type="password" id="log-in[password]" class="form-control" />
					</div>
					<button type="submit" name="log-in[submit]" value="value" class="btn btn-primary">Log In</button>
				</form>
			</div>
		</div>

		<div class="row bubble">
			<h2>Sign Up</h2>
			<div class="col-xs-12">
				<form method="post" action="">
					<div class="form-group">
						<label for="sign-up[username]">Username</label>
						<input type="text" id="sign-up[username]" class="form-control" />
					</div>
					<div class="form-group">
						<label for="sign-up[password]">Password</label>
						<input type="password" id="sign-up[password]" class="form-control" />
					</div>
					<div class="form-group">
						<label for="sign-up[password_confirmation]">Confirm Password</label>
						<input type="password" id="sign-up[password_confirmation]" class="form-control" />
					</div>
					<div class="form-group">
						<label for="sign-up[ssb_password]">Master Password</label>
						<input type="password" id="sign-up[ssb_password]" class="form-control" />
					</div>
					<button type="submit" name="sign-up[submit]" value="true" class="btn btn-primary">Sign Up</button>
				</form>
			</div>
		</div>

		<div class="row bubble">
		<?php
			echo $message;
		?>
		</div>
	</div>


	<div class="col-xs-3"></div>



<?php require_once ("helpers/contentEnd.php"); ?>
<?php require_once("helpers/globalFoot.php"); ?>


<script>
//Set form name equal to id
	$(".form-control").each(function(index, element){
		$(element).attr("name", $(element).attr("id"));
	});
</script>







