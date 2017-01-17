
<?php
	$nL = "<div>&nbsp;</div>";
	//Mail the contents of the post array to state street brats. Send a confirmation email to the users email as well
	$sSBMsg; //The message being sent to state street brats;
	$sSBEmail = "statestreetbrats@yahoo.com";
	$sSBSubject = "New Party Reservation";

	$customerMsg; //The message being sent to the customer
	$customerEmail = $_POST["party-email"];
	$customerSubject = "Thank you for requesting a party reservation with State Street Brats!";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: StateStreetBrats@statestreetbrats.drewpereli.com' . "\r\n";
	$customerHeaders = $headers . 'Reply-To: statestreetbrats@yahoo.com' . "\r\n";
	$ssbHeaders = $headers . 'Reply-To: ' . $customerEmail . "\r\n";
	
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
	$sSBMsg = "<h2>New request for a party reservation.</h2>";
	$info = "<div>"; //A string containing the form info submitted
	for ($i = 0 ; $i < sizeof($titles) ; $i++)
	{
		$valueName = $valueNames[$i];
		$value = $_POST["party-" . $valueName];
		$title = $titles[$i];
		if (!empty($value))
		{
			$info .= "<div>" . $title . ": " . $value . "</div>";
		}
		elseif (in_array($title, ["name", "email", "date", "time", "number", "privacy"]))//If a required field is empty
		{
			echo "error";
			die();
		}
	}
	$info .= "</div>";
	$sSBMsg .= $info;
	$sSBMsg .= "${nL}<b>Send a message to the creater of this order by responding to this email.</b>"
			. "$nL $nL"
			. "<div>If you have any questions about this email system, contact Drew Pereli at drewpereli@gmail.com</div>";

	$customerMsg = "<h2>Thanks for requesting State Street Brats for your party!</h2>"
		. "If any of the following information is incorrect, respond to "
		. "this email and let us know.$nL $nL";
	$customerMsg .= $info;
	$customerMsg .= "${nL}Thank you!${nL}--State Street Brats";

	mail($sSBEmail, $sSBSubject, $sSBMsg, $ssbHeaders);
	mail($customerEmail, $customerSubject, $customerMsg, $customerHeaders);
	echo "success";

?>



