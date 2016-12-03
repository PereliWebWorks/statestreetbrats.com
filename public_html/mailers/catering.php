
<?php
	
	//Mail the contents of the post array to state street brats. Send a confirmation email to the users email as well
	$sSBMsg; //The message being sent to state street brats;
	$sSBEmail = "drewpereli@gmail.com";
	$sSBSubject = "New Catering Request";

	$customerMsg; //The message being sent to the customer
	$customerEmail = $_POST["catering-email"];
	$customerSubject = "Thank you for requesting catering services with State Street Brats!";

	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: StateStreetBrats@104.236.118.215' . "\r\n";
	
	$valueNames = array(
		"name",
		"email",
		"phone",
		"date",
		"time",
		"number",
		"theme",
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
		"Additional Comments"
	);

	//First sent the ssb email
	$sSBMsg = "New request for a catering.<br/>";
	$info = ""; //A string containing the form info submitted
	for ($i = 0 ; $i < sizeof($titles) ; $i++)
	{
		$valueName = $valueNames[$i];
		$value = $_POST["catering-" . $valueName];
		$title = $titles[$i];
		$info .= "<div>" . $title . ": " . $value . "</div>";
	}
	$info .= $_POST["order"];
	$sSBMsg .= $info;

	$customerMsg = "Your catering request has been sent.<br/>"
		. "If any of the following information is incorrect, please email us at "
		. "StateStreetBrats@yahoo.com and let us know!<br/><br/>";
	$customerMsg .= $info;
	$customerMsg .= "<br/>Thank you!<br/>--State Street Brats";

	mail($sSBEmail, $sSBSubject, $sSBMsg, $headers);
	mail($customerEmail, $customerSubject, $customerMsg, $headers);

?>



