<?php
session_start();

if ($_POST['submitCatering']) {
	// CAPTCHA passed
	if (isset($_POST['iQapTcha']) && empty($_POST['iQapTcha']) && isset($_SESSION['iQaptcha']) && $_SESSION['iQaptcha']) {
		unset($_SESSION['iQaptcha']);
		$msg = '';
		foreach ($_POST['catering'] as $field => $value) {
			if ($value) {
				$field = strip_tags($field);
				$field = str_replace('-', ' ', $field);
				$field = ucwords( $field );
				$value = strip_tags($value);
				$msg .= "$field: $value\n\n";
			}
		}
		$from = 'From: "'. addslashes(strip_tags($_POST['catering']['Contact-Name'])) .'" <' . $_POST['catering']['Contact-Email'] . '>';
		mail(_SITE_EMAIL, 'Catering Request Form', $msg, $from);
		echo '<h3>Thanks! Your inquiry has been submitted. Someone will get back to you as soon as possible.</h3>';
	}
	// CAPTCHA failed
	else {
		echo '<h3>Sorry, your submission failed a spam prevention check, so it could not be processed. If this is a legitimate catering request, please call us at 255-5544. Sorry for any inconvenience.</h3>';
	}
}
else {
?>

	<form action="catering" id="catering" method="post" name="catering[]">
		<div class="menu" id="catering-menu">
		<table id="catering-menu-sandwiches">
			<thead>
				<tr>
					<th colspan="3">
						<h4>
							Sandwiches</h4>
					</th>
					<th>
						<h4>
							Quantity</h4>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						Smoked Red Brat</td>
					<td>
						Classic smoked beef brat, sliced butterfly style and grilled perfection</td>
					<td>
						$4.50</td>
					<td>
						<input id="smoked-red-brat" name="catering[red-brat]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						White Brat</td>
					<td>
						Classic pork brat. Boiled in beer and onions!</td>
					<td>
						$4.50</td>
					<td>
						<input id="white-brat" name="catering[white-brat]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						Ribeye Steak Sandwich</td>
					<td>
						Alumni favorite since 1936. Same great steak, different cow!</td>
					<td>
						$6.75</td>
					<td>
						<input id="ribeye-steak-sandwich" name="catering[ribeye-steak-sandwich]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						Chicken Breast Sandwich</td>
					<td>
						A boneless, skinless 6oz breast with cajun seasoning!</td>
					<td>
						$6.75</td>
					<td>
						<input id="chicken-breast-sandwich" name="catering[chicken-breast-sandwich]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						State Street Burger</td>
					<td>
						Same great tasting burger that's served on State Street but served on YOUR street!</td>
					<td>
						$5.50</td>
					<td>
						<input id="state-street-burger" name="catering[state-street-burger]" type="text" size="4" value="0" /></td>
				</tr>
                <tr>
					<td>
						Bacon Cheeseburger</td>
					<td>
						Our burger patty blanketed in cheese and bacon!</td>
					<td>
						$6.50</td>
					<td>
						<input id="bacon-cheeseburger" name="catering[bacon-cheeseburger]" type="text" size="4" value="0" /></td>
				</tr>
                <tr>
					<td>
						Triple Cheeseburger</td>
					<td>
						Burgers are best with three portions of cheese!</td>
					<td>
						$7.00</td>
					<td>
						<input id="triple-cheeseburger" name="catering[triple-cheeseburger]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						Bacon Swiss Chicken</td>
					<td>
						A tasty topping of bacon and Swiss are sure to please your palate!</td>
					<td>
						$6.75</td>
					<td>
						<input id="bacon-swiss-chicken" name="catering[bacon-swiss-chicken]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						Hot Dog</td>
					<td>
						Kids Love em!</td>
					<td>
						$4.00</td>
					<td>
						<input id="hotdog" name="catering[hotdog]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						Blackbean Burger</td>
					<td>
						For the vegetarians out there!</td>
					<td>
						$5.00</td>
					<td>
						<input id="blackbean-burger" name="catering[blackbean-burger]" type="text" size="4" value="0" /></td>
				</tr>
                <tr>
					<td>
						Pretzel Burger</td>
					<td>
						All dressed up on a pretzel roll!</td>
					<td>
						$6.50</td>
					<td>
						<input id="pretzel-burger" name="catering[pretzel-burger]" type="text" size="4" value="0" /></td>
				</tr>
                <tr>
					<td>
						BBQ Chicken</td>
					<td>
						A chicken calls out to be sauced!</td>
					<td>
						$7.00</td>
					<td>
						<input id="bbq-chicken" name="catering[bbq-chicken]" type="text" size="4" value="0" /></td>
				</tr>
                 <tr>
					<td>
						Red Brat Reuben</td>
					<td>
						A red brat topped with kraut and 1000 island and cheese!</td>
					<td>
						$6.25</td>
					<td>
						<input id="red-brat-reuben" name="catering[red-brat-reuben]" type="text" size="4" value="0" /></td>
				</tr>
			</tbody>
		</table>
		<p>&nbsp;
			</p>

		<table id="catering-menu-desserts">
			<tbody>
				<tr>
					<th colspan="2"><h4>Desserts</h4></th>
				</tr>
				<tr><td colspan="2" style="text-align: center">$1.75 each</td></tr>
				<tr>
					<td>
						Frosted Cookies</td>
					<td>
						<input id="frosted-cookies" name="catering[frosted-cookies]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						Rice Krispie Treats</td>
					<td>
						<input id="rice-krispie-treat" name="catering[rice-krispie-treat]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						Double Choco Brownies</td>
					<td>
						<input id="double-choco-brownies" name="catering[double-choco-brownies]" type="text" size="4" value="0" /></td>
				</tr>
			</tbody>
		</table>
				
		<table id="catering-menu-sides">
			<tbody>
				<tr>
					<th colspan="6">
						<h4>
							Available Side Orders</h4>
					</th>
				</tr>
				<tr>
					<td colspan="6">
						Choice of:</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<input checked="checked" name="catering[number-of-sides]" class="number-of-sides" type="radio" value="2" />2 . . . $2.50</td>
					<td colspan="2" style="text-align: center;">
						<input name="catering[number-of-sides]" class="number-of-sides" type="radio" value="3" />3 . . . $2.75</td>
					<td colspan="2" style="text-align: center;">
						<input name="catering[number-of-sides]" type="radio" class="number-of-sides" value="4" />4 . . . $3.25</td>
				</tr>
				<tr>
					<td colspan="3">
						<input name="catering[cole-slaw]" type="checkbox" value="(Side)" /> Cole Slaw<br />
						<input name="catering[baked-beans]" type="checkbox" value="(Side)" /> Baked Beans<br />
						<input name="catering[american-potato-salad]" type="checkbox" value="(Side)" /> American Potato Salad<br />
						<input name="catering[rotini-pasta-salad]" type="checkbox" value="(Side)" /> Rotini Pasta Salad<br />
                        <input name="catering[cheesecake-bites]" type="checkbox" value="(Side)" /> Cheesecake bites</td>
					<td colspan="3">
						<input name="catering[veggie-platter]" type="checkbox" value="(Side)" /> Veggie &amp; Dip Platter<br />
						<input name="catering[fruit-platter]" type="checkbox" value="(Side)" /> Fresh slices Fruit Plate<br />
						<input name="catering[pub-chips]" type="checkbox" value="(Side)" /> Pub Chips<br />
						<input name="catering[chips-and-salsa]" type="checkbox" value="(Side)" /> Chips &amp; Salsa</td>
				</tr>
				<tr>
					<td colspan="4">
						Corn on the Cob is $2.00 per ear (seasonal)
						<br />requires a minimum order of 50 coborder size.</td>
					<td colspan="2">
						<input id="corn-cob" name="catering[corn-cob]" type="text" size="4" value="0" style="float: right" /></td>
				</tr>
			</tbody>
		</table>
		</div>

<table class="total-box">
	<tr>
		<th>Estimated Total*</th>
	</tr><tr>
		<td style="font-size: x-large">
			$<span id="ShowTotal">0.00</span>
			<input type="hidden" name="catering[Estimated-Total]" id="estimated-total" />
		</td>
	</tr>
</table>

<!-- Contact Details -->
<h3 style="text-align: center">Ready to order? Need more info?</h3>

<p style="text-align: center">Either way, just fill in your details below and we'll contact you as soon as possible!</p>

<table class="contact-form" border="0" align="center">
<tr>
		<th><label for="Event-Date">Event Date</label></th>
		<td><input type="text" name="catering[Event-Date]" id="Event-Date" size="50" /></td>
	</tr><tr>
		<th><label for="Event-Time">Event Time</label></th>
		<td><input type="text" name="catering[Event-Time]" id="Event-Time" size="50" /></td>
	</tr><tr>
		<th><label for="Event-Type">Event Type</label></th>
		<td><input type="text" name="catering[Event-Type]" id="Event-Type" size="50" /></td>
	</tr><tr>
		<th><label for="Attendees">Number of Guests</label></th>
		<td><input type="text" name="catering[Attendees]" id="Attendees" size="50" /></td>
	</tr><tr>
		<th><label for="Contact-Name">Contact Name</label></th>
		<td><input type="text" name="catering[Contact-Name]" id="Contact-Name" size="50" />
	</tr><tr>
		<th><label for="Contact-Email">Contact Email</label></th>
		<td><input type="text" name="catering[Contact-Email]" id="Contact-Email" size="50" /></td>
	</tr><tr>
		<th><label for="Contact-Phone">Contact Phone</label></th>
		<td><input type="text" name="catering[Contact-Phone]'" id="Contact-Phone" size="50" /></td>
	</tr><tr>
		<th colspan="2"><label for="Comments">Comments or Special Requests</label></th>
	</tr><tr>
		<td colspan="2"><textarea name="catering[Comments]" cols="60" rows="5"></textarea></td>
	</tr><tr>
		<td colspan="2"><div id="QapTcha"></div></td>
	</tr><tr>
		<td colspan="2">
			<input name="submitCatering" type="submit" id="submitCatering" value="Submit" />
			<input type="reset" name="Reset" id="Reset" value="Reset" />
		</td>
	</tr>
</table>
</form>

<hr />
<p>
	Please Note...<br />
	<br />
	This is only a portion of what we are capable of catering. Special requests are no problem at State Street Brats. We will work to ensure that you and your guests will eat exactly the right food for the occasion. From vegetarian options to Cajun seasoned chicken to hot dogs for the kids, State Street Brats can take care of your catering needs, just ask!</p>
<p>
	To book a catering event at SSB or your place of interest, fill out the form above or call 255-5544.</p>

	<p>&nbsp;
		</p>
	<table width="45%" border="0">
		<tbody>
			<tr>
				<th colspan="2">
					<h4>
						A sample meal for a 100 person party.</h4>
				</th>
			</tr>
			<tr>
				<td>
					$225.00</td>
				<td>
					20 Red Brats @ 4.50 each</td>
			</tr>
			<tr>
				<td>
					90.00</td>
				<td>
					20 White Brats @ 4.50 each</td>
			</tr>
			<tr>
				<td>
					202.50</td>
				<td>
					30 Chickens @ 6.75 each</td>
			</tr>
			<tr>
				<td>
					250.00</td>
				<td>
					Choice of 2 side dishes</td>
			</tr>
			<tr>
				<td>
					$767.50*</td>
				<td>
					$7.68 per person</td>
			</tr>
			</tr>
		</tbody>
	</table>

<hr />
<p>* <em>This price does not reflect tax or gratuity. Sales tax of 5.5 % and a 10% gratuity will be added to your total. All on site catering events have a $500.00 minimum charge as a deposit which will be deducted from the final invoice.</em></p>

<?php } ?>