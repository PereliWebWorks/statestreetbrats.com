
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
	$sSBMsg = "<h2>New request for catering.</h2>";
	$info = "<div>"; //A string containing the form info submitted
	for ($i = 0 ; $i < sizeof($titles) ; $i++)
	{
		$valueName = $valueNames[$i];
		$value = $_POST["catering-" . $valueName];
		$title = $titles[$i];
		$info .= "<div>" . $title . ": " . $value . "</div>";
	}
	$info .= "</div>";
	$info .= "<div>&nbsp;</div>";
	$info .= "<div>" . $_POST["order"] . "</div>";
	$sSBMsg .= $info . "<div>&nbsp;</div><div>&nbsp;</div>";
	$sSBMsg .= "<b>Send a message to the creater of this order by responding to this email.</b>"
			. "<div>&nbsp;</div><div>&nbsp;</div>"
			. "<div>If you have any questions about this email system, contact Drew Pereli at drewpereli@gmail.com</div>";

	$customerMsg = "<h2>Thanks for chosing State Street Brats</h2>"
		. "<div>Your catering request has been sent.</div>"
		. "<div>If any of the following information is incorrect, please respond to this email "
		. "and let us know!</div><div>&nbsp;</div>"
		. "<h3>Your Order</h3>";
	$customerMsg .= $info;
	$customerMsg .= "<div>&nbsp;</div><div>&nbsp;</div><div>Thank you!</div><div>&nbsp;</div><div>--State Street Brats</div>";

	mail($sSBEmail, $sSBSubject, $sSBMsg, $ssbHeaders);
	mail($customerEmail, $customerSubject, $customerMsg, $customerHeaders);

?>



