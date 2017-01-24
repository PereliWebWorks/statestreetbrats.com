<?php
session_start();


if ($_POST['submitParty']) {
	// CAPTCHA passed
	if (isset($_POST['iQapTcha']) && empty($_POST['iQapTcha']) && isset($_SESSION['iQaptcha']) && $_SESSION['iQaptcha']) {
		unset($_SESSION['iQaptcha']);
		$msg = '
Name: '. $_POST['Name'] .'

Party Date: '. $_POST['Party-Date'] .'

Party Time: '. $_POST['Party-Time'] .'

Group Name or Theme: '. $_POST['Group-Name-or-Theme'] .'

Attendees: '. $_POST['Attendees'] .'

Email: '. $_POST['Email'] .'

Phone: '. $_POST['Phone'] .'

Private?: '. $_POST['Private?'] .'

Comments: '. $_POST['Comments'] .'
		';
		$from = 'From: "'. addslashes(strip_tags($_POST['Name'])) .'" <' . $_POST['Email'] . '>';
		mail(_SITE_EMAIL, 'Party Reservation Form', $msg, $from);
		echo '<h3>Thanks! Your inquiry has been submitted. Someone will get back to you as soon as possible.</h3>';
	}
	// CAPTCHA failed
	else {
		echo '<h3>Sorry, your submission failed a spam prevention check, so it could not be processed. If this is a legitimate party reservation request, please call us at 255-5544. Sorry for any inconvenience.</h3>';
	}
}
else {
?>

<br />
<form id="bratparty" name="bratparty" method="post" action="index">   
<table border="0" align="center">
	<tr>
		<th><label for="Name">Name</label></th>
		<td><input type="text" name="Name" id="Name" />
	</tr><tr>
		<th><label for="Party-Date">Party Date</label></th>
		<td><input type="text" name="Party-Date" id="Party-Date" /></td>
	</tr><tr>
		<th><label for="Party-Time">Party Time</label></th>
		<td><input type="text" name="Party-Time" id="Party-Time" /></td>
	</tr><tr>
		<th><label for="Group-Name-or-Theme">Group Name or Theme</label></th>
		<td><input type="text" name="Group-Name-or-Theme" id="Group Name or Theme" /></td>
	</tr><tr>
		<th><label for="Attendees">Number of Guests</label></th>
		<td><input type="text" name="Attendees" id="Attendees" /></td>
	</tr><tr>
		<th><label for="Email">Email</label></th>
		<td><input type="text" name="Email" id="Email" /></td>
	</tr><tr>
		<th><label for="Phone">Phone</label></th>
		<td><input type="text" name="Phone" id="Phone" /></td>
	</tr><tr>
		<th></th>
		<td>
			<input type="radio" name="Private?" value="Yes" id="RadioGroup1_0" checked="checked" /> <label for="RadioGroup1_0">Private</label>
			<br /><input type="radio" name="Private?" value="Semi-private" id="RadioGroup1_1" /> <label for="RadioGroup1_1">Semi-private</label>
			<br /><input type="radio" name="Private?" value="V1" id="RadioGroup1_2" /> <label for="RadioGroup1_2">Open</label>
		</td>
	</tr><tr>
		<th colspan="2"><label for="Comments">Additional Comments</label></th>
	</tr><tr>
		<td colspan="2"><textarea rows="3" name="Comments" cols="50"></textarea></td>
	</tr><tr>
		<td colspan="2"><div id="QapTcha"></div></td>
	</tr><tr>
		<td colspan="2">
			<input name="submitParty" type="submit" id="submitParty" onclick="MM_validateForm('Name','','R','Party Date','','R','Party Time','','R','Group Name or THeme','','R','Attendees','','RisNum','Email','','NisEmail','Phone','','R');return document.MM_returnValue" value="Submit" />
			<input type="reset" name="Reset" id="Reset" value="Reset" />
		</td>
	</tr>
</table>
</form>
<?php } ?>