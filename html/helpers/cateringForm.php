<form id="party-reservation-form">
	<div class="form-group">
		<label for="party-name">Name</label>
		<input type="text" class="form-control party-field" id="party-name" name="party-name"/>
	</div>
	<div class="form-group">
		<label for="party-email">Email</label>
		<input type="email" class="form-control party-field" id="party-email" name="party-email"/>
	</div>
	<div class="form-group">
		<label for="party-phone">Phone</label>
		<input type="tel" class="form-control party-field" id="party-phone" name="party-phone" />
	</div>
	<div class="form-group">
		<label for="party-date">Date</label>
		<input type="date" class="form-control party-field" id="party-date" name="party-date" />
		  <script>
		  $( function() {
		    $( "#party-date" ).datepicker();
		  } );
		  </script>
	</div>
	<div class="form-group">
		<label for="party-time">Time</label>
		<input type="time" class="form-control party-field" id="party-time" name="party-time" />
	</div>
	<div class="form-group">
		<label for="party-number">Number of Guests</label>
		<input type="text" class="form-control party-field" id="party-number" name="party-number" />
	</div>
	<div class="form-group">
		<label for="party-theme">Group Name or Theme</label>
		<input type="text" class="form-control party-field" id="party-theme" name="party-theme" />
	</div>
	<div class="form-group">
		<label for="party-privacy">This party is</label><br/>
		<input type="radio" class="party-field" name="party-privacy" value="private"> Private
		<input type="radio" class="party-field" name="party-privacy" value="semi-private"> Semi-private
		<input type="radio" class="party-field" name="party-privacy" value="public"> Public
	</div>
	<div class="form-group">
		<label for="party-comments">Additional Comments</label>
		<textarea class="form-control party-field" id="party-comments" name="party-comments" rows="3"></textarea>
	</div>
	<button type="reset" class="btn btn-warning">Reset</button>
	<input type="button" id="party-submit-button" class="btn btn-success" value="Submit" />
	<div id="response"></div>
</form>

<script>
//Process form submission
$("#party-submit-button").click(function()
	{
		submitPartyReservationForm();
	});

function submitPartyReservationForm()
{
	var values = {};
	//Populate the values object with the values entered in the form
	$(".party-field").each(function(index, element){
		var value;
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
	});
	//Send a request to the mailer
	$.ajax({
		type: "POST",
		url: "/mailers/partyReservation.php",
		data: values,
	}).done(function(data){
		$("#response").html(data);
	});
}

</script>




