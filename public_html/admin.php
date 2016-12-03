<?php
	$sign_up;
	$log_in;
	//If the user is logging in
	if (isset($_POST["log-in"]))
	{
		$log_in = $_POST["log-in"];
	}
	//Else if the user is signing up
	elseif (isset($_POST["sign-up"]))
	{
		$sign_up = $_POST["sign-up"];
	}

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
						<label for="sign-up[ssb_password]">State Street Brats Password</label>
						<input type="password" id="sign-up[ssb_password]" class="form-control" />
					</div>
					<button type="submit" name="sign-up[submit]" value="true" class="btn btn-primary">Sign Up</button>
				</form>
			</div>
		</div>

		<div class="row bubble">
		<?php
			echo (isset($_POST["sign-up"]));
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







