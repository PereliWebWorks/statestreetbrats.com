<?php require_once("helpers/globalHead.php"); ?>

	<div class="row">
		<span class="col-xs-3"></span>
		<form id="catering-form" class="col-xs-6 bubble">
			


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
				<table id="catering-menu-sandwiches">
					<tbody><tr>
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
							<input id="red-brat" name="catering[red-brat]" data-price="5.25" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Trig's World's Best Brat</td>
						<td>
							</td>
						<td>
							$5.25</td>
						<td>
							<input id="white-brat" name="catering[white-brat]"  data-price="5.25" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Cheese Burger</td>
						<td>
							Same great tasting burger that's served on State Street...served on your street.</td>
						<td>
							$6.25</td>
						<td>
							<input id="cheese-burger" name="catering[cheese-burger]" data-price="6.25" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Teriyaki Chicken Breast</td>
						<td>
							</td>
						<td>
							$6.75</td>
						<td>
							<input id="chicken-breast-sandwich" name="catering[chicken-breast-sandwich]" data-price="6.75"  size="4" value="0" type="number"></td>
					</tr>

					<tr>
						<td>
							Chicken Cheddar Brat</td>
						<td>
							</td>
						<td>
							$5.25</td>
						<td>
							<input id="chicken-cheddar-brat" name="catering[chicken-cheddar-brat]" data-price="5.25" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Garden Burger</td>
						<td>
							For the vegetarians out there!</td>
						<td>
							$5.00</td>
						<td>
							<input id="veggie-burger" name="catering[veggie-burger]" data-price="5.00" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							1/4# Foot Long Dog</td>
						<td>
							Kids Love em!</td>
						<td>
							$4.50</td>
						<td>
							<input id="kids-hotdog" name="catering[kids-hot-dog]" data-price="4.50" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Hamburger</td>
						<td>
							</td>
						<td>
							$5.75</td>
						<td>
							<input id="hamburger" name="catering[hamburger]" data-price="5.75" size="4" value="0" type="number"></td>
					</tr>

					<tr>
						<th colspan="3" valign="top">
							<h4>Signature Sandwiches</h4>
							<p>(Always available for 50 or less people â€“ please limit to 1 selection on groups over 50)</p>
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
							<input id="pretzel-burger" name="catering[pretzel-burger]" data-price="7.00" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Curd Burger</td>
						<td>
							</td>
						<td>
							$8.25</td>
						<td>
							<input id="curd-burger" name="catering[curd-burger]" data-price="8.25" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Mushroom &amp; Swiss Chicken</td>
						<td>
							</td>
						<td>
							$8.00</td>
						<td>
							<input id="mushroom-swiss-chicken" name="catering[mushroom-swiss-chicken]" data-price="8.00" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Ribeye Steak Sandwich</td>
						<td>
							Alumni favorite since 1936. Same great steak, different cow.</td>
						<td>
							$7.00</td>
						<td>
							<input id="ribeye-steak-sandwich" name="catering[ribeye-steak-sandwich]" data-price="7.00" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Bacon Cheese Burger</td>
						<td>
							</td>
						<td>
							$7.25</td>
						<td>
							<input id="bacon-cheese-burger" name="catering[bacon-cheese-burger]" data-price="7.25" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Bacon Swiss Chicken</td>
						<td>
							A tasty topping of bacon and swiss are sure to please your palate.</td>
						<td>
							$7.25</td>
						<td>
							<input id="bacon-swiss-chicken" name="catering[bacon-swiss-chicken]" data-price="7.25" size="4" value="0" type="number"></td>
					</tr>
					<tr>
						<td>
							Mushroom &amp; Swiss Burger</td>
						<td>
							A tasty topping of mushroom and swiss are sure to please your palate.</td>
						<td>
							$7.50</td>
						<td>
							<input id="mushroom-swiss-burger" name="catering[mushroom-swiss-burger]" data-price="7.50" size="4" value="0" data-com.agilebits.onepassword.user-edited="yes" type="number"></td>
					</tr>
				</tbody></table>

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
								<input id="cookies" name="catering[cookies]" data-price="1.50" size="4" value="0" type="number"></td>
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
								<input checked="checked" name="catering[number-of-sides]" class="number-of-sides" data-price="2.50" value="2" type="radio"> 2: $2.50</td>
							<td colspan="2" style="text-align: center;">
								<input name="catering[number-of-sides]" class="number-of-sides" data-price="2.75" value="3" type="radio"> 3: $2.75</td>
							<td colspan="2" style="text-align: center;">
								<input name="catering[number-of-sides]" class="number-of-sides" data-price="3.25" value="4" type="radio"> 4: $3.25</td>
						</tr>
						<tr>
							<td colspan="6">Side items including but not limited to Tavern Chips, Baked Beans, Potato Salad, Pasta Salad, Cut Fruit Trays, Cut Veggie Trays, Pretzels, Corn on the Cob (minimum 24 cobs), and more, please ask.  </td>
					</tr></tbody>
				</table>
			</div>
		</form>
		<span class="col-xs-3"></span>
	</div>

	<div class="row">
		<div class="col-xs-3"></div>
		<div class="col-xs-6 text-center bubble">
			<span id="total-container">
				<span class="col-xs-12">
					<button type="button" id="calculate-total" class="btn btn-primary">Calculate Total</button> | $<span id="total">0.00</span>
				</span>
				<span class="col-xs-6">
					<input type="button" id="submit-button" class="btn btn-success" value="Submit" />
				</span>
				<span class="col-xs-6 text-right">
					<button type="button" id="reset-button" class="btn btn-warning">Reset</button>
				</span>
			</span>
			<span class="col-xs-12" id="message" class="message"></span>
		</div>
		<div class="col-xs-3"></div>
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
			$("#catering-food-info input[type='number'").each(function(index, element){
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
			var sidePriceTotal = sidePrice * totalSandwiches;
			totalPrice += sidePriceTotal;
			//Add the side to the return object
			returnTable += 
			`
				<tr><th>Sides Per Meal</th><th>Number of Meals</th><th>Cost</th></tr>
			`;
			var sidesPerMeal = Number(checkedInput.value);
			sidePrice = sidePrice.toFixed(2);
			returnTable += `<td>${sidesPerMeal} ($${sidePrice} per meal)</td>`;
			returnTable += `<td>${totalSandwiches}</td>`;
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
						<tr><td colspan="3" style="text-align: right;"><b>Total Cost:</b> $${totalPrice}</td></tr>
					</table>
				`;
				return returnTable;
			}
		}

		function isEmpty(str) {
		    return (!str || 0 === str.length);
		}
	</script>



<?php require_once("helpers/globalFoot.php"); ?>



















