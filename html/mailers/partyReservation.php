
<?php
	
	//Mail the contents of the post array to state street brats. Send a confirmation email to the users email as well
	$sSBMsg; //The message being sent to state street brats;
	$sSBEmail = "drewpereli@gmail.com";
	$sSBSubject = "New Party Reservation";
	$customerMsg; //The message being sent to the customer
	$customerMsg = $_POST["email"];
	$customerSubject = "Thank you for requesting a party reservation with State Street Brats!";

	$valueNames = array(
		"name",
		"email",
		"phone",
		"date",
		"time",
		"number",
		"theme",
		"privacy",
		"comments"
	);

	$titles = array(
		"Name",
		"Email",
		"Phone",
		"Date",
		"Time",
		"Number of Guests",
		"Group Name or Theme",
		"Privacy",
		"Additional Comments"
	)

	//First sent the ssb email
	$sSBMsg = "New request for a party reservation.\n";
	$info = ""; //A string containing the form info submitted
	for ($i = 0 ; $i < sizeof($titles) ; $i++)
	{
		$valueName = $valueNames[$i];
		$title = $titles[$i];
		$info .= $title . ": " . $valueName . "\n";
	}
	$sSBMsg .= $info;

	mail($sSBEmail, $sSBSubject, $sSBMsg);
	echo $sSBMsg;
?>



