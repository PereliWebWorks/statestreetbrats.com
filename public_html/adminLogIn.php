<?php
	require_once("helpers/global.php");
	if (isset($_SESSION["logged_in"]))
	{
		header("Location: " . HOST_URL . "admin.php");
	}
	require_once("helpers/logInLogOutFunctions.php"); //Session will be started in here
	$db;
	$response = array(
		"log-in" => array("message" => "", "error" => "NONE" ),
		"sign-up" => array("message" => "", "error" => "NONE" )
		);
	//If the user is logging in
	if (isset($_POST["log-in"]))
	{
		require_once("helpers/connectToDB.php");
		$username = $_POST["log-in"]["username"];
		$stmt = $db->prepare("SELECT password_digest FROM users WHERE username = :username");
		$stmt->bindParam(":username", $username);
		$stmt->execute();
		$result = $stmt->fetch();
		if ($stmt->rowCount() == 0) //If the username is bad
		{
			$response["log-in"]["message"] = "The username is invalid.";
			$response["log-in"]["error"] = "BAD_U";
		}
		else
		{
			$hash = $result["password_digest"];
			$pwd_confirmed = password_verify($_POST["log-in"]["password"], $hash);
			$_POST["log-in"]["password"] = null;
			if (!$pwd_confirmed)
			{
				$response["log-in"]["message"] = "The password is incorrect.";
				$response["log-in"]["error"] = "BAD_P";
			}
			else
			{
				logIn($username);
				$newUrl = HOST_URL . "admin.php";
				header('Location: ' . $newUrl);
				die();
			}
		}
	}
	//Else if the user is signing up
	elseif (isset($_POST["sign-up"]))
	{
		require_once("helpers/connectToDB.php");
		$username = $_POST["sign-up"]["username"];
		//If the username is taken
		$stmt = $db->prepare("SELECT username FROM users WHERE username = :username");
		$stmt->bindParam(":username", $username);
		$stmt->execute();
		if ($stmt->rowCount() != 0) //If there is already a user with that name 
		{
			$response["sign-up"]["message"] = "That username is taken.";
			$response["sign-up"]["error"] = "BAD_U";
		}
		elseif (strlen($username) > 100)
		{
			$response["sign-up"]["message"] = "Your username must be less than 100 characters.";
			$response["sign-up"]["error"] = "BAD_U";
		}
		else
		{
			$pwdHash = password_hash($_POST["sign-up"]["password"], PASSWORD_DEFAULT);
			$_POST["sign-up"]["password"] = null;
			$pwd_confirmed = password_verify($_POST["sign-up"]["password_confirmation"], $pwdHash);
			$_POST["sign-up"]["password_confirmation"] = null;
			if (!$pwd_confirmed) //If the password doesn't match the password confirmation
			{
				$response["sign-up"]["message"] = "The passwords do not match.";
				$response["sign-up"]["error"] = "BAD_P";
			}
			else //If the password and password confirmation match
			{
				$masterPwdHash = "$2y$10$.qDsS7/lEfHT/AaQyFODOeoUICq3EKl2N2UzVCVNryciy5PUaJHnm";
				$masterPwdConfirmed = password_verify($_POST["sign-up"]["ssb_password"], $masterPwdHash);
				if (!$masterPwdConfirmed)
				{
					$response["sign-up"]["message"] = "The master password is incorrect.";
					$response["sign-up"]["error"] = "BAD_MP";
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
					//The log in
					logIn($username);
					$newUrl = HOST_URL . "admin.php";
					header('Location: ' . $newUrl);
				}
			}
		}
	}
	$db = null;
?>

<?php require_once("helpers/globalHead.php"); ?>
<?php require_once ("helpers/contentStart.php"); ?>

	<div class="col-md-3 hidden-xs"></div>

	<div class="col-md-6 col-xs-12">
		<div class="row bubble">
			<h2 class="col-xs-12">Log In</h2>
			<div class="col-xs-12">
				<form method="post" action="">
					<div class="form-group <?= $response['log-in']['error'] === 'BAD_U' ? 'text-danger' : ''; ?>">
						<label for="log-in[username]">Username</label>
						<input type="text" id="log-in[username]" class="form-control" />
					</div>
					<div class="form-group <?= $response['log-in']['error'] === 'BAD_P' ? 'text-danger' : ''; ?>">
						<label for="log-in[password]">Password</label>
						<input type="password" id="log-in[password]" class="form-control" />
					</div>
					<button type="submit" name="log-in[submit]" value="value" class="btn btn-primary">Log In</button>
				</form>
			</div>
			<?php if(!empty($response["log-in"]["message"])) : ?> 
				<div class="col-xs-12 message bg-danger text-danger">
					<?= $response["log-in"]["message"]; ?>
				</div>
			<?php endif ?>
		</div>

		<div class="row bubble">
			<h2>Sign Up</h2>
			<div class="col-xs-12">
				<form method="post" action="">
					<div class="form-group">
						<label for="sign-up[username] <?= $response['sign-up']['error'] === 'BAD_U' ? 'text-danger' : ''; ?>">Username</label>
						<input type="text" id="sign-up[username]" class="form-control" />
					</div>
					<div class="form-group <?= $response['sign-up']['error'] === 'BAD_P' ? 'text-danger' : ''; ?>">
						<label for="sign-up[password]">Password</label>
						<input type="password" id="sign-up[password]" class="form-control" />
					</div>
					<div class="form-group <?= $response['sign-up']['error'] === 'BAD_P' ? 'text-danger' : ''; ?>">
						<label for="sign-up[password_confirmation]">Confirm Password</label>
						<input type="password" id="sign-up[password_confirmation]" class="form-control" />
					</div>
					<div class="form-group <?= $response['sign-up']['error'] === 'BAD_MP' ? 'text-danger' : ''; ?>">
						<label for="sign-up[ssb_password]">Master Password</label>
						<input type="password" id="sign-up[ssb_password]" class="form-control" />
					</div>
					<button type="submit" name="sign-up[submit]" value="true" class="btn btn-primary">Sign Up</button>
				</form>
			</div>
			<?php if(!empty($response["sign-up"]["message"])) : ?> 
				<div class="col-xs-12 message bg-danger text-danger">
					<?= $response["sign-up"]["message"]; ?>
				</div>
			<?php endif ?>
		</div>
		<div class="row bubble">
		</div>
	</div>


	<div class="col-md-3 hidden-xs"></div>



<?php require_once ("helpers/contentEnd.php"); ?>
<?php require_once("helpers/globalFoot.php"); ?>


<script>
//Set form name equal to id
	$(".form-control").each(function(index, element){
		$(element).attr("name", $(element).attr("id"));
	});
</script>







