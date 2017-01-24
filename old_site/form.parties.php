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
<div id="party-type-tabs">
	<ul>
		<li><a href="#party-type-bachelor">Bachelor</a></li>
		<li><a href="#party-type-bachelorette">Bachelorette</a></li>
		<li><a href="#party-type-frat">Frat/Sorority</a></li>
	</ul>
	<div id="party-type-bachelor">We can accommodate any number of rowdy bachelors up to 40 in our VIP room or for those really wicked benders, up to 200 on an exclusive no holds barred party on our entire second floor. Either way, you get bar service dedicated to your group and the options to request wait staff, bouncer services, and food menus at discounted rates. You can provide decorations or cakes and we can hold them for you or help put them up and prepare them. We can also provide snacks for $3 person up to full meal service at $5.50 per plate. Rates for the 40 person room begin at 200 dollars. Rates to book the entire upstairs begin at 400 dollars. Please submit the form for a speedy reply. Don't forget to look <a href="/news">HERE</a> to check availability! We can do keg sales please submit the message for form current rates.</div>
	<div id="party-type-bachelorette">If you are finally ready to make the big move, let the biggest party of your life take place on our second floor! Rent the rumpus room and seat up to 40 of your BFF's in style or rent our whole second floor for a wild party on our dance floor. We can provide a DJ or you can bring your own DJ or even an iPod to connect directly to our massive stereo system. We can also provide snacks from $3 person up to full meal service at $5.50 per plate. Rates for the 40 person room begin at 200 dollars. Rates to book the entire upstairs begin at 400 dollars. Please submit the form for a speedy reply. Don't forget to look <a href="/news">HERE</a> to check availability! We can do keg service or bottle service please submit form for current market rates in a speedy response!</div>
	<div id="party-type-frat">We can do wristbanded parties for 18+ groups of up to 200 party people on our second floor! This includes bouncer services. We do dinner parties offering food options including simple snacks from $3 person up to full meal service at $5.50 per plate. Smaller party room rental rates for the 40 person room begin at 200 dollars. Rates to book the entire upstairs begin at 400 dollars. Please submit the form for a speedy reply. Don't forget to look <a href="/news">HERE</a> to check availability! We can do keg sales please submit the message for form current rates.</div>
</div>

<br />
<form id="bratparty" name="bratparty" method="post">
<table id="bratparty-table">
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