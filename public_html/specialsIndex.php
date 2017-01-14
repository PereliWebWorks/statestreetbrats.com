<?php $titleAddition = "Specials Index"; ?>
<?php require_once("helpers/globalHead.php"); ?>
<?php require_once("helpers/requireLogIn.php"); ?>
<?php require_once("helpers/connectToDB.php"); ?>

<?php
	$selectedDay = "monday"; //The default selected day on the select drop down
	if (isset($_POST["add"])) //If adding a special
	{
		$special = $_POST["text"];
		if (strlen($special) > 0)
		{
			$day = $_POST["day"];
			$query = "INSERT INTO specials (text, day) VALUES (:special, :day)";
			$stmt = $db->prepare($query);
			$stmt->bindParam(":special", $special);
			$stmt->bindParam(":day", $day);
			$stmt->execute();
			$selectedDay = $day;
		}
	}
	elseif (isset($_POST["remove"]))
	{
		$id = $_POST["id"];
		$query = "DELETE FROM specials WHERE id=:id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
	}

?>


<?php require_once("helpers/contentStart.php") ?>

<div class="row">
	<div class="col-md-3 hidden-xs"></div>
	<div class="col-md-6 col-xs-12">
		<div class="row bubble">
			<h2 class="col-xs-12">Add New Special</h2>
			<div class="col-xs-12">
				<form method="post" action="">
					<div class="form-group">
						<label for="special-text">Special</label>
						<textarea id="special-text" name="text" class="form-control" required="true"></textarea>
					</div>
					<div class="form-group">
						<label for="special-day">Day</label>
						<select id="special-day" name="day" class="form-control">
						<?php $days = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"); ?>
						<?php for ($i = 0 ; $i < sizeof($days) ; $i++) : ?>
							<option 
								value="<?= $days[$i] ?>" 
								<?= $selectedDay === $days[$i] ? 'selected="true"' : ""; ?>
							>
								<?= ucfirst($days[$i]) ?>
							</option>
						<?php endfor ?>
						</select>
					</div>
					<input type="submit" value="Add Special" name="add" class="btn btn-success"/>
				</form>
			</div>
		</div>
		<div class="row bubble">
			<h2 class="col-xs-12">Current Specials</h2>
			<table class="table" id="specials-table">
			<?php
				$days = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
				for ($i = 0 ; $i < sizeof($days) ; $i++) :
					$day = $days[$i];
					$query = "SELECT * FROM specials WHERE day=\"$day\"";
					$stmt = $db->prepare($query);
					$stmt->execute();
					?>
					<tr><th colspan="2"><?= ucfirst($day) ?></th></tr>
					<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
						<tr>
							<td><?= $row["text"] ?></td>
							<td class="text-right">
								<form method="post" action="">
									<input type="hidden" name="id" value="<?= $row['id'] ?>" />
									<input type="submit" class="btn btn-danger" value="Remove" name="remove" />
								</form>
							</td>
						</tr>
					<?php endwhile ?>
				<?php endfor ?>
			</table>
		</div>
	</div>
	<div class="col-md-3 hidden-xs"></div>
</div>

<?php require_once("helpers/contentEnd.php"); ?>
<?php require_once("helpers/globalFoot.php"); ?>