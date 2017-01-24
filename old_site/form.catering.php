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
			<tr>
				<th colspan="3">
					<h4>Tavern Sandwiches</h4>
				</th>
				<th>
					<h4>Quantity</h4>
				</th>
			</tr>
			<tr>
				<td>
					Red Brat</td>
				<td>
					Classic smoked beef brat. Sliced butterfly style and grilled perfection.</td>
				<td>
					$5.25</td>
				<td>
					<input id="red-brat" name="catering[red-brat]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Trig's World's Best Brat</td>
				<td>
					</td>
				<td>
					$5.25</td>
				<td>
					<input id="white-brat" name="catering[white-brat]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Cheese Burger</td>
				<td>
					Same great tasting burger that's served on State Street...served on your street.</td>
				<td>
					$6.25</td>
				<td>
					<input id="cheese-burger" name="catering[cheese-burger]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Teriyaki Chicken Breast</td>
				<td>
					</td>
				<td>
					$6.75</td>
				<td>
					<input id="chicken-breast-sandwich" name="catering[chicken-breast-sandwich]" type="text" size="4" value="0" /></td>
			</tr>
<!--
			<tr>
				<td>
					1/2 lb. Double Burger</td>
				<td>
					Two of our burger patties Char-Grilled to perfection!</td>
				<td>
					$9.00</td>
				<td>
					<input id="double-burger" name="catering[double-burger]" type="text" size="4" value="0" /></td>
			</tr>
-->
			<tr>
				<td>
					Chicken Cheddar Brat</td>
				<td>
					</td>
				<td>
					$5.25</td>
				<td>
					<input id="chicken-cheddar-brat" name="catering[chicken-cheddar-brat]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Garden Burger</td>
				<td>
					For the vegetarians out there!</td>
				<td>
					$5.00</td>
				<td>
					<input id="veggie-burger" name="catering[veggie-burger]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					1/4# Foot Long Dog</td>
				<td>
					Kids Love em!</td>
				<td>
					$4.50</td>
				<td>
					<input id="kids-hotdog" name="catering[kids-hot-dog]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Hamburger</td>
				<td>
					</td>
				<td>
					$5.75</td>
				<td>
					<input id="hamburger" name="catering[hamburger]" type="text" size="4" value="0" /></td>
			</tr>
<!--
			<tr>
				<td>
					Pulled Pork Big Boy</td>
				<td>
					A delicious summertime treat slathered with sweet BBQ sauce!</td>
				<td>
					$5.00</td>
				<td>
					<input id="big-boy" name="catering[big-boy]" type="text" size="4" value="0" /></td>
			</tr>
-->
			<tr>
				<th colspan="3" valign="top">
					<h4>Signature Sandwiches</h4>
					<p>(Always available for 50 or less people – please limit to 1 selection on groups over 50)</p>
				</th>
				<th valign="top">
					<h4>Quantity</h4>
				</th>
			</tr>
			<tr>
				<td>
					Pretzel Burger</td>
				<td>
					A pretzel-infused patty with cheese on a tasty pretzel roll</td>
				<td>
					$7.00</td>
				<td>
					<input id="pretzel-burger" name="catering[pretzel-burger]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Curd Burger</td>
				<td>
					</td>
				<td>
					$8.25</td>
				<td>
					<input id="curd-burger" name="catering[curd-burger]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Mushroom &amp; Swiss Chicken</td>
				<td>
					</td>
				<td>
					$8.00</td>
				<td>
					<input id="mushroom-swiss-chicken" name="catering[mushroom-swiss-chicken]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Ribeye Steak Sandwich</td>
				<td>
					Alumni favorite since 1936. Same great steak, different cow.</td>
				<td>
					$7.00</td>
				<td>
					<input id="ribeye-steak-sandwich" name="catering[ribeye-steak-sandwich]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Bacon Cheese Burger</td>
				<td>
					</td>
				<td>
					$7.25</td>
				<td>
					<input id="bacon-cheese-burger" name="catering[bacon-cheese-burger]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Bacon Swiss Chicken</td>
				<td>
					A tasty topping of bacon and swiss are sure to please your palate.</td>
				<td>
					$7.25</td>
				<td>
					<input id="bacon-swiss-chicken" name="catering[bacon-swiss-chicken]" type="text" size="4" value="0" /></td>
			</tr>
			<tr>
				<td>
					Mushroom &amp; Swiss Burger</td>
				<td>
					A tasty topping of mushroom and swiss are sure to please your palate.</td>
				<td>
					$7.50</td>
				<td>
					<input id="mushroom-swiss-burger" name="catering[mushroom-swiss-burger]" type="text" size="4" value="0" /></td>
			</tr>
		</table>

		<p>&nbsp;</p>

		<table id="catering-menu-desserts">
			<tbody>
				<tr>
					<th colspan="2"><h4>Desserts</h4></th>
				</tr>
				<tr><td colspan="2" style="text-align: center">$1.50 each</td></tr>
				<tr>
					<td>
						Including Cookies and/or Frosted Brownies</td>
					<td>
						<input id="cookies" name="catering[cookies]" type="text" size="4" value="0" /></td>
				</tr>
<!--
				<tr>
					<td>
						Cherry Pies</td>
					<td>
						<input id="cherry-pies" name="catering[cherry-pies]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						Cr&egrave;me Puffs</td>
					<td>
						<input id="creme-puffs" name="catering[creme-puffs]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						Apple Pies</td>
					<td>
						<input id="apple-pies" name="catering[apple-pies]" type="text" size="4" value="0" /></td>
				</tr>
				<tr>
					<td>
						Frosted Brownies</td>
					<td>
						<input id="chocolate-brownies" name="catering[chocolate-brownies]" type="text" size="4" value="0" /></td>
				</tr>
-->
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
<!--
				<tr>
					<td colspan="3">
						<input name="catering[cole-slaw]" type="checkbox" value="(Side)" /> Cole Slaw<br />
						<input name="catering[baked-beans]" type="checkbox" value="(Side)" /> Baked Beans<br />
						<input name="catering[american-potato-salad]" type="checkbox" value="(Side)" /> American Potato Salad<br />
						<input name="catering[rotini-pasta-salad]" type="checkbox" value="(Side)" /> Rotini Pasta Salad</td>
					<td colspan="3">
						<input name="catering[veggie-platter]" type="checkbox" value="(Side)" /> Veggie &amp; Dip Platter<br />
						<input name="catering[fruit-platter]" type="checkbox" value="(Side)" /> Fresh Fruit Platter<br />
						<input name="catering[pub-chips]" type="checkbox" value="(Side)" /> Pub Chips<br />
						<input name="catering[chips-and-salsa]" type="checkbox" value="(Side)" /> Chips &amp; Salsa</td>
				</tr>
				<tr>
					<td colspan="4">
						Corn on the Cob is $2.00 per ear (seasonal)
						<br />With a minimum order of 24 ears.</td>
					<td colspan="2">
						<input id="corn-cob" name="catering[corn-cob]" type="text" size="4" value="0" style="float: right" /></td>
				</tr>
-->
				<tr>
					<td colspan="6">Side items including but not limited to Tavern Chips, Baked Beans, Potato Salad, Pasta Salad, Cut Fruit Trays, Cut Veggie Trays, Pretzels, Corn on the Cob (minimum 24 cobs), and more, please ask.  </td>
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

<p style="text-align: center">Either way, just fill in your details below and we'll contact you as soon as possible! Or see our <a href="/faq#catering">Catering FAQ</a> for more info.</p>

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
<p>Your event can be tailored to your budget!  You can pre-order a set amount of sandwiches and sides and know in advance what the event will cost!
<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OR
<br>You can set the menu as you like and you will only be charged for what you actually go through at the event (i.e. not 12.00 per person regardless of age).  This works great when you are not sure of the side item people might eat.
<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; OR
<br>You can ask for tickets and hand them out to guests as YOU see fit.  Each ticket will get them a certain sandwich and side for one helping only.  If they want more, they have to get a ticket from YOU!
</p>

<p>
	Please Note...<br />
	<br />
	This is only a portion of what we are capable of catering. Special requests are no problem at State Street Brats. We will work to ensure that you and your guests will eat exactly the right food for the occasion. From vegetarian options to Cajun seasoned chicken to hot dogs for the kids, State Street Brats can take care of your catering needs, just ask!</p>
<p>
	To book a catering event at SSB or your place of interest, fill out the form above or call 255-5544. Need more info before you book? Just call us, or see our <a href="/faq#catering">Catering FAQ</a>.</p>
	<p>&nbsp;</p>

	
	<table width="60%" border="0">
		<tbody>
			<tr>
				<th colspan="2">
					<h3>A sample meal for a 100 person party.</h3>
					<p>Cheese Burger with choice of Tavern Chips and Baked Beans.</p>
				</th>
			</tr>
			<tr><td>Cheese Burgers ($6.25) x 100</td><td>$625</td></tr>
			<tr><td>Choice of 2 sides ($2.50) x 100</td><td>$250</td></tr>
				
			<tr><td>All set up and clean up</td><td>INCLUDED</td></tr>
			<tr><td>All utensils and napkins</td><td>INCLUDED</td></tr>
			<tr><td>All sandwich condiments</td><td>INCLUDED</td></tr>
			<tr><td>All necessary service tables</td><td>INCLUDED</td></tr>
			<tr><td>Tents, service smallware, tablecloths as needed</td><td>INCLUDED</td></tr>
			<tr><td>All labor for 90 minute service time</td><td>INCLUDED</td></tr>
				
			<tr><td>Wisconsin sales tax (5.5%)</td><td>$48.13</td></tr>
			<tr><td>Gratuity (15%)</td><td>$138.47</td></tr>
				
			<tr><td><strong>TOTAL:</strong></td><td><strong>$961.60</strong></td></tr>
		</tbody>
	</table>

<hr />
<p><em>All on site catering events have a $500.00 minimum charge as a deposit which will be deducted from the final invoice.</em></p>

<?php } ?>