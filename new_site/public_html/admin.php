<?php $titleAddition = "Admin"; ?>
<?php $metaDescription = "This page is for admins only."; ?>
<?php
	require_once("helpers/requireLogIn.php");
?>

<?php require_once("helpers/globalHead.php"); ?>
<script>
	window.location.replace("<?=HOST_URL?>/specialsIndex.php");
</script>

	<div class="row">
	You are logged in!
	</div>

<?php require_once("helpers/globalFoot.php"); ?>
