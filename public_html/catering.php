<?php $titleAddition = "Catering"; ?>
<?php $metaDescription = "All of the delicious selections of State Street Brats brought to your event!"; ?>
<?php require_once("helpers/globalHead.php"); ?>
<?php require_once("helpers/contentStart.php"); ?>

	<div class="row">
		<span class="col-sm-2 hidden-xs"></span>
		<span class="col-sm-8 col-pad-0 col-xs-12">
			<h1 class="col-xs-12 text-center huge neon-sign bubble">Catering</h1>
			<span class="col-xs-12 bubble">
				<p>All of our delicious selections brought to YOUR HOME!</p>
				<p>
					State Street Brats can handle events from 20 to 2,000 (yes 2,000) people. We provide quality food at affordable prices. You get the same great service that you would receive in our restaurant, at the site of your choosing. We are ready to serve your group, large or small, be it a family reunion, company picnic or social club. Our catering crew is ready to go to your home, office, or one of Madison's beautiful parks. We also offer "in house" catering. If you can't find a suitable location, you can bring your group to State Street Brats.  Generally, we can arrange pick ups of large orders (over 20 people) with 2 hours notice. Large orders for delivery require 48 hours notice so we can schedule workers.  Large orders for onsite catering must be placed at least ten days before the event, as we schedule ten days in advance and cannot guarantee we will have workers available to staff such large events once the schedule is posted for a given period.  Small groups (under 20 people) can generally be delivered by staff on the shift with 2 hours notice.
				</p>
				<p>
					State Street Brats offers traditional Wisconsin tailgate at competitive prices. State Street Brats does not have any set-up fees, delivery charges, or cleanup costs. The only thing you pay for is the food you and your guests eat. All utensils, plates and condiments are included in the sandwiches prices. You will never find hidden costs when your party is catered by State Street Brats.
				</p>
				<p>
					Your event can be tailored to your budget! You can pre-order a set amount of sandwiches and sides and know in advance what the event will cost! 
				</p>
				<p>Or . . . </p>
				<p>You can set the menu as you like and you will only be charged for what you actually go through at the event (i.e. not 12.00 per person regardless of age). This works great when you are not sure of the side item people might eat. </p>
				<p>Or . . . </p>
				<p>
					You can ask for tickets and hand them out to guests as YOU see fit. Each ticket will get them a certain sandwich and side for one helping only. If they want more, they have to get a ticket from YOU! 
				</p>
				<h3>Curious about catering costs?</h3>
				<p>
					Fill in item quantities in the form bellow to see an instant price estimate. Like what you see? Enter your details at the bottom and we'll contact you about catering your event!
				</p>
			</span>
		</span>
		<span class="col-sm-2 hidden-xs"></span>
	</div>

	<div class="row">
		<span class="col-sm-2 hidden-xs"></span>
		<form id="catering-form" class="col-sm-8 col-xs-12 bubble">
			<!-- Contact section -->
			<div id="catering-contact-info">
				<div class="form-group">
					<label class="form-control-label" for="catering-name">Name (required)</label>
					<input type="text" class="form-control contact-field required" id="catering-name" name="catering-name"/>
				</div>
				<div class="form-group">
					<label class="form-control-label" for="catering-email">Email (required)</label>
					<input type="email" class="form-control contact-field required" id="catering-email" name="catering-email"/>
				</div>
				<div class="form-group">
					<label class="form-control-label" for="catering-phone">Phone</label>
					<input type="tel" class="form-control contact-field" id="catering-phone" name="catering-phone" />
				</div>
				<div class="form-group">
					<label class="form-control-label" for="catering-date">Date (required)</label>
					<input type="date" class="form-control contact-field required" id="catering-date" name="catering-date" />
					  <script>
					  $( function() {
					    $( "#catering-date" ).datepicker();
					  } );
					  </script>
				</div>
				<div class="form-group">
					<label class="form-control-label" for="catering-time">Time (required)</label>
					<input type="time" class="form-control contact-field required" id="catering-time" name="catering-time" />
				</div>
				<div class="form-group">
					<label class="form-control-label" for="catering-number">Number of Guests (required)</label>
					<input type="text" class="form-control contact-field required" id="catering-number" name="catering-number" />
				</div>
				<div class="form-group">
					<label class="form-control-label" for="catering-theme">Group Name or Theme</label>
					<input type="text" class="form-control contact-field" id="catering-theme" name="catering-theme" />
				</div>
				<div class="form-group">
					<label class="form-control-label" for="catering-comments">Additional Comments</label>
					<textarea class="form-control contact-field" id="catering-comments" name="catering-comments" rows="3"></textarea>
				</div>
			</div>
			<!-- End contact section -->


			<div id="catering-food-info">
				<table id="catering-menu-sandwiches" class="table table-responsive">
					<tbody>
					<tr class="hidden-xs">
						<th colspan="3">
							<h4>Tavern Sandwiches</h4>
							<div><small>Gluten free buns are available for sandwiches.</small></div>
						</th>
						<th>
							<h4>Quantity</h4>
						</th>
					</tr>
					<tr class="hidden-sm hidden-lg hidden-lg">
						<th colspan="2">
							<h4>Tavern Sandwiches</h4>
						</th>
						<th>
							<h4>Quantity</h4>
						</th>
					</tr>
					<tr>
						<td>
							Red Brat</td>
						<td class="catering-description">
							Classic smoked beef brat. Sliced butterfly style and grilled perfection.</td>
						<td>
							$5.50</td>
						<td>
							<input id="red-brat" name="catering[red-brat]" data-price="5.50" size="1" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Trig's World's Best Brat</td>
						<td class="catering-description">
							</td>
						<td>
							$5.50</td>
						<td>
							<input id="white-brat" name="catering[white-brat]"  data-price="5.50" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Cheese Burger</td>
						<td class="catering-description">
							Same great tasting burger that's served on State Street...served on your street.</td>
						<td>
							$6.50</td>
						<td>
							<input id="cheese-burger" name="catering[cheese-burger]" data-price="6.50" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Teriyaki Chicken Breast</td>
						<td class="catering-description">
							</td>
						<td>
							$6.75</td>
						<td>
							<input id="chicken-breast-sandwich" name="catering[chicken-breast-sandwich]" data-price="6.75"  size="4" value="0" type="number"></td>
					</tr>

					<tr>
						<td>
							Garden Burger</td>
						<td class="catering-description">
							For the vegetarians out there!</td>
						<td>
							$6.00</td>
						<td>
							<input id="veggie-burger" name="catering[veggie-burger]" data-price="6.00" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							1/4# Foot Long Dog</td>
						<td class="catering-description">
							Kids Love em!</td>
						<td>
							$5.00</td>
						<td>
							<input id="kids-hotdog" name="catering[kids-hot-dog]" data-price="5.00" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Hamburger</td>
						<td class="catering-description">
							</td>
						<td>
							$5.75</td>
						<td>
							<input id="hamburger" name="catering[hamburger]" data-price="5.75" size="4" value="0" type="number"></td>
					</tr>

					<tr class="hidden-xs">
						<th colspan="3" valign="top">
							<h4>Signature Sandwiches</h4>
							<p>(Always available for 50 or less people. Please limit to 1 selection on groups over 50)</p>
						</th>
						<th valign="top">
							<h4>Quantity</h4>
						</th>
					</tr>
					<tr class="hidden-sm hidden-lg hidden-md">
						<th colspan="2" valign="top">
							<h4>Signature Sandwiches</h4>
							<p>(Always available for 50 or less people. Please limit to 1 selection on groups over 50)</p>
						</th>
						<th valign="top">
							<h4>Quantity</h4>
						</th>
					</tr>
					<tr>
						<td>
							Pretzel Burger</td>
						<td class="catering-description">
							A pretzel-infused patty with cheese on a tasty pretzel roll</td>
						<td>
							$7.50</td>
						<td>
							<input id="pretzel-burger" name="catering[pretzel-burger]" data-price="7.50" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Curd Burger</td>
						<td class="catering-description">
							</td>
						<td>
							$8.75</td>
						<td>
							<input id="curd-burger" name="catering[curd-burger]" data-price="8.75" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Ribeye Steak Sandwich</td>
						<td class="catering-description">
							Alumni favorite since 1936. Same great steak, different cow.</td>
						<td>
							$8.00</td>
						<td>
							<input id="ribeye-steak-sandwich" name="catering[ribeye-steak-sandwich]" data-price="8.00" size="4" value="0" type="number"></td>
					</tr>
					
					<tr>
						<td>
							Bacon Swiss Chicken</td>
						<td class="catering-description">
							A tasty topping of bacon and swiss are sure to please your palate.</td>
						<td>
							$7.50</td>
						<td>
							<input id="bacon-swiss-chicken" name="catering[bacon-swiss-chicken]" data-price="7.50" size="4" value="0" type="number"></td>
					</tr>
					
				</tbody></table>

				<div class="col-xs-12" id="catering-menu-desserts">
					<h3>Desserts</h3>
					<h4>$1.50 each</h4>
					<div>Including Cookies and/or Frosted Brownies</div><br/>
					<input id="cookies" name="catering[cookies]" data-price="1.50" size="4" value="0" type="number">
				</div>
				<br/><br/>
				<div class="col-xs-12" id="catering-menu-sides">
					<h3>Available Side Orders</h3>
					<div>Choice of:</div>
					<input checked="checked" name="catering[number-of-sides]" class="number-of-sides" data-price="2.50" value="2" type="radio"> 2: $2.50 per person<br/>
					<input name="catering[number-of-sides]" class="number-of-sides" data-price="2.75" value="3" type="radio"> 3: $2.75 per person<br/>
					<input name="catering[number-of-sides]" class="number-of-sides" data-price="3.25" value="4" type="radio"> 4: $3.25 per person<br/>
					<br/>
					<div class="col-xs-12">
					Side items including but not limited to Tavern Chips, Baked Beans, Potato Salad, Pasta Salad, Cut Fruit Trays, Cut Veggie Trays, Pretzels, Corn on the Cob (minimum 24 cobs), and more, please ask.
					</div>
				</div>
			</div>
			<span id="total-container" class="text-center">
				<span class="row">
					<span class="col-xs-12" id="display-total">
						<button type="button" id="calculate-total" class="btn btn-primary btn-lg">Calculate Total</button> | $<span id="total">0.00</span>*
					</span>
				</span>
				<span class="row">
					<span class="col-xs-6 text-left">
						<input type="button" id="submit-button" class="btn btn-success btn-lg" value="Submit" />
					</span>
					<span class="col-xs-6 text-right">
						<button type="button" id="reset-button" class="btn btn-warning btn-lg">Reset</button>
					</span>
					<div id="test-message"></div>
				</span>
			</span>
			<span class="col-xs-12" id="message" class="message"></span>
		</form>
		<span class="col-sm-2 hidden-xs"></span>
	</div>

	<div class="row">
		<div class="col-sm-2 hidden-xs"></div>
		<div class="col-sm-8 col-xs-12 bubble">
			<p>* This is only an estimate of the cost. The actual cost for your event may be different. Event catering costs an additional $150/hour for every hour past 90 minutes. Events outside Madison/Verona/Middleton/Sun Prarie  will require a trip charge of $150.00. All on site catering events have a $500.00 minimum charge as a deposit which will be deducted from the final invoice.
			<h3 class="text-danger">Please Note</h3>
			<p>
				This is only a portion of what we are capable of catering. Special requests are no problem at State Street Brats. We will work to ensure that you and your guests will eat exactly the right food for the occasion. From vegetarian options to Cajun seasoned chicken to hot dogs for the kids, State Street Brats can take care of your catering needs, just ask!
			</p>
			<p>
				To book a catering event at SSB or your place of interest, fill out the form above or call 255-5544. Need more info before you book? Just call us, or see our <a href="FAQ#catering">Catering FAQ</a>.
			</p>
			<p><i>
				All on site catering events have a $500.00 minimum charge as a deposit which will be deducted from the final invoice.
			</i></p>
		</div>
		<div class="col-sm-2 hidden-xs"></div>
	</div>

	<script>
		$("#calculate-total").click(function(){calculateTotal();});
		$("#reset-button").click(function(){$("#catering-form")[0].reset();});
		$("#submit-button").click(function(){submitForm();});

		function submitForm()
		{
			var table = calculateTotal();
			if (table)
			{
				//Validate contact info
				var validContactInfo = true;
				var json = {order: table};
				//Validate the presence of each required input
				//Also clears error style from any valid input field
				$("#catering-contact-info .contact-field").each(function(index, element)
				{
					var val = $(element).val();
					if (val !== "" || !$(element).hasClass("required"))//If it's valid
					{
						$(element).parent().removeClass("bg-danger").removeClass("text-danger");
						if (validContactInfo)
						{
							json[element.name] = val;
						}
					}
					else//If it's not valid
					{
						$(element).parent().addClass("bg-danger").addClass("text-danger");
						validContactInfo = false;
					}
				});

				if(validContactInfo)
				{
					//Post the table to the mailer
					$.ajax({
						type: "POST",
						url: "/mailers/catering.php",
						data: json,
					}).done(function(data){
						$("#message").addClass("bg-success").addClass("text-success")
						.html("The catering request has been succesfully submitted.");	
					});

					//Set the success message
					$("#message").addClass("bg-success").addClass("text-success")
						.html("Submitting catering request . . .");	
				}
				else
				{
					$("#message").addClass("bg-danger").addClass("text-danger")
						.html("Missing required info in the contact form.");
				}
			}
		}


		//Appends the total to the "total" span, or throws an error message.
		//Also returns an object with the order info, for convenience.
		function calculateTotal()
		{
			var numberAttending = $("#catering-number").val();
			if (isEmpty(numberAttending))
			{
				$("#message").addClass("bg-danger").addClass("text-danger")
					.html("Please specify the number of people attending.");
				return false;
			}
			numberAttending = Number(numberAttending);
			$("#message").removeClass("bg-danger").removeClass("text-danger").html("");
			var returnTable = 
			`
				<table id="order-table">
					<tr><th>Item</th><th>Quantity</th><th>Cost</th></tr>
			`;
			var hasError = false;
			var totalPrice = 0;
			var totalSandwiches = 0;
			//Validate numeric inputs
			$("#catering-food-info input[type='number']").each(function(index, element){
				var price = Number(element.dataset.price);
				var quantity = element.value;
				if (isEmpty(quantity))//If the user entered a non-number (this is how HTML5 treats number fields, smh)
				{
					hasError = true;
					$(element).parent().parent().addClass("bg-danger").addClass("text-danger");
				}
				else //If it's a valid sandwich
				{
					//Take away error class if it was there
					$(element).parent().parent().removeClass("bg-danger").removeClass("text-danger");
					var sandwichName = element.name.substring(9, element.name.length - 1);
					quantity = Math.round(Number(quantity));
					var itemPrice = price * quantity;
					totalPrice += itemPrice;
					if (sandwichName !== "cookies")
						totalSandwiches += quantity;
					//Add it to the returnObject if they ordered more than 0
					if (quantity > 0)
					{
						returnTable += "<tr>";
						sandwichName = sandwichName.replace(/-/g, ' ');
						price = price.toFixed(2);
						itemPrice = itemPrice.toFixed(2);
						returnTable += `<td>${sandwichName} ($${price})</td>`;
						returnTable += `<td>${quantity}</td>`;
						returnTable += `<td>$${itemPrice}</td>`;
						returnTable += "</tr>";
					}
				}
			});
			//Validate radio buttons
			var checkedInput = $("input[name='catering[number-of-sides]']:checked")[0];
			var sidePrice = Number(checkedInput.dataset.price);
			var sidePriceTotal = sidePrice * numberAttending;
			totalPrice += sidePriceTotal;
			//Add the side to the return object
			returnTable += 
			`
				<tr><th>Sides Per Person</th><th>Number of People</th><th>Cost</th></tr>
			`;
			var sidesPerPerson = Number(checkedInput.value);
			sidePrice = sidePrice.toFixed(2);
			returnTable += `<td>${sidesPerPerson} ($${sidePrice} per meal)</td>`;
			returnTable += `<td>${numberAttending}</td>`;
			returnTable += `<td>$${sidePriceTotal}</td>`;

			$("#total").html(hasError ? "-.--" : totalPrice);
			if (hasError)
			{
				$("#message").addClass("bg-danger").addClass("text-danger")
					.html("All the food fields are required, and they all must be numbers.");
				$("#total").html("-.--");
				return false;
			}
			else
			{
				$("#total").html(totalPrice.toFixed(2));
				returnTable +=
				`		
						<tr><td colspan="3"</td></tr>
						<tr><td colspan="3" style="text-align: right;"><h5><b>Total Cost:</b> $${totalPrice}</h5></td></tr>
					</table>
				`;
				return returnTable;
			}
		}

		function isEmpty(str) {
		    return (!str || 0 === str.length);
		}
	</script>


<?php require_once("helpers/contentEnd.php"); ?>
<?php require_once("helpers/globalFoot.php"); ?>



















