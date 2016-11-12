
<?php
	
	//Mail the contents of the post array to state street brats. Send a confirmation email to the users email as well
	$sSBMsg; //The message being sent to state street brats;
	$sSBEmail = "drewpereli@gmail.com";
	$sSBSubject = "New Party Reservation";

	$customerMsg; //The message being sent to the customer
	$customerEmail = $_POST["party-email"];
	$customerSubject = "Thank you for requesting a party reservation with State Street Brats!";

	$headers = "From: StateStreetBrats@104.236.118.215";
	
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
	);

	//First sent the ssb email
	$sSBMsg = "New request for a party reservation.\n";
	$info = ""; //A string containing the form info submitted
	for ($i = 0 ; $i < sizeof($titles) ; $i++)
	{
		$valueName = $valueNames[$i];
		$value = $_POST["party-" . $valueName];
		$title = $titles[$i];
		$info .= $title . ": " . $value . "\n";
	}
	$sSBMsg .= $info;

	$customerMsg = "Your party reservation request has been sent.\n"
		. "If any of the following information is incorrect, please email us at "
		. "StateStreetBrats@yahoo.com and let us know!\n";
	$customerMsg .= $info;
	$customerMsg .= "Thank you!\n--State Street Brats";

	mail($sSBEmail, $sSBSubject, $sSBMsg, $headers);
	mail($customerEmail, $customerSubject, $customerMsg, $headers);

?>



