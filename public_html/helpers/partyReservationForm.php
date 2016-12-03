<form id="party-reservation-form" class="col-xs-12">
	<div class="form-group">
		<label class="form-control-label" for="party-name">Name (required)</label>
		<input type="text" class="form-control party-field required" id="party-name" name="party-name"/>
	</div>
	<div class="form-group">
		<label class="form-control-label" for="party-email">Email (required)</label>
		<input type="email" class="form-control party-field required" id="party-email" name="party-email"/>
	</div>
	<div class="form-group">
		<label class="form-control-label" for="party-phone">Phone</label>
		<input type="tel" class="form-control party-field" id="party-phone" name="party-phone" />
	</div>
	<div class="form-group">
		<label class="form-control-label" for="party-date">Date (required)</label>
		<input type="date" class="form-control party-field required" id="party-date" name="party-date" />
		  <script>
		  $( function() {
		    $( "#party-date" ).datepicker();
		  } );
		  </script>
	</div>
	<div class="form-group">
		<label class="form-control-label" for="party-time">Time (required)</label>
		<input type="time" class="form-control party-field required" id="party-time" name="party-time" />
	</div>
	<div class="form-group">
		<label class="form-control-label" for="party-number">Number of Guests (required)</label>
		<input type="text" class="form-control party-field required" id="party-number" name="party-number" />
	</div>
	<div class="form-group">
		<label class="form-control-label" for="party-theme">Group Name or Theme</label>
		<input type="text" class="form-control party-field" id="party-theme" name="party-theme" />
	</div>
	<div class="form-group">
		<label class="form-control-label" for="party-privacy">This party is</label><br/>
		<input type="radio" class="party-field" name="party-privacy" value="private"> Private
		<input type="radio" class="party-field" name="party-privacy" value="semi-private"> Semi-private
		<input type="radio" class="party-field" name="party-privacy" value="public"> Public
	</div>
	<div class="form-group">
		<label class="form-control-label" for="party-comments">Additional Comments</label>
		<textarea class="form-control party-field" id="party-comments" name="party-comments" rows="3"></textarea>
	</div>
	<span class="col-xs-6">
		<input type="button" id="party-submit-button" class="btn btn-success" value="Submit" />
	</span>
	<span class="col-xs-6 text-right">
		<button type="reset" class="btn btn-warning">Reset</button>
	</span>
</form>
<div class="col-xs-12 alert" id="party-form-response" class="message"></div>

<script>
//Process form submission
$("#party-submit-button").click(function()
	{
		submitPartyReservationForm();
	});

function submitPartyReservationForm()
{
	var validInput = true;
	var values = {};
	//Populate the values object with the values entered in the form
	$(".party-field").each(function(index, element){
		var value;
		//If it's a required field and it's empty
		if ($(element).hasClass("required") && element.value === "")
		{
			//Add the "danger" class/look to the parent element (form-group)
			$(element).parent().find("label").addClass("text-danger");
			$(element).parent().addClass("has-error");
			validInput = false;
		}
		else //If not, remove the danger class if it had it before (i.e. if the previous submission was invalid)
		{
			$(element).parent().find("label").removeClass("text-danger");
			$(element).parent().removeClass("has-error");
		}

		if (element.type === "radio")
		{
			if ($("input[name='party-privacy']:checked")[0] === element)
			{
				value = element.value;
				values[element.name] = value;
			}
		}
		else
		{
			value = element.value;
			values[element.name] = value;
		}
		$(element).parent()
	});
	//Send a request to the mailer, if the input is valid
	if (validInput)
	{
		$("#party-form-response").html("Your party reservation request has been sent.")
			.removeClass("alert-danger").addClass("alert-success");
		$.ajax({
			type: "POST",
			url: "/mailers/partyReservation.php",
			data: values,
		}).done(function(data){
			//$("#response").html(data);
		});
	}
	else
	{
		//Set the "response" message to "invalid input" or whatever
		$("#party-form-response").html("You must fill in all required fields.")
			.removeClass("alert-success").addClass("alert-danger");
	}
}

</script>




