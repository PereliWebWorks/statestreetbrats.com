<?php require_once("helpers/globalHead.php") ?>
<?php require_once("helpers/contentStart.php") ?>

<div class="row">
	<div class="col-xs-3"></div>
	<div class="col-xs-6">
		<div class="row bubble">
			<h2 class="col-xs-12">Add New Special</h2>
			<div class="col-xs-12">
				<form method="post" action="">
					<div class="form-group">
						<label for="special-text">Special</label>
						<textarea id="special-text" name="text" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="special-day">Day</label>
						<select id="special-day" name="day">
							<option value="monday">Monday</option>
							<option value="tuesday">Tuesday</option>
							<option value="wednesday">Wednesday</option>
							<option value="thursday">Thursday</option>
							<option value="friday">Friday</option>
							<option value="saturday">Saturday</option>
							<option value="sunday">Sunday</option>
						</select>
					</div>
				</form>
			</div>
		</div>
		<div class="row bubble">
			<h2 class="col-xs-12">Current Specials</h2>
		</div>
	</div>
	<div class="col-xs-3"></div>
</div>

<?php require_once("helpers/contentEnd.php") ?>
<?php require_once("helpers/globalFoot.php") ?>