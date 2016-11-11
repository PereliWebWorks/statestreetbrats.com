<form id="party-reservation-form">
	<div class="form-group">
		<label for="party-name">Name</label>
		<input type="text" class="form-control" id="party-name" name="party-name"/>
	</div>
	<div class="form-group">
		<label for="party-email">Email</label>
		<input type="email" class="form-control" id="party-email" name="party-email"/>
	</div>
	<div class="form-group">
		<label for="party-phone">Phone</label>
		<input type="tel" class="form-control" id="party-phone" name="party-phone" />
	</div>
	<div class="form-group">
		<label for="party-date">Date</label>
		<input type="date" class="form-control" id="party-date" name="party-date" />
		  <script>
		  $( function() {
		    $( "#party-date" ).datepicker();
		  } );
		  </script>
	</div>
	<div class="form-group">
		<label for="party-time">Time</label>
		<input type="time" class="form-control" id="party-time" name="party-time" />
	</div>
	<div class="form-group">
		<label for="party-number">Number of Guests</label>
		<input type="number" class="form-control" id="party-number" name="party-number" />
	</div>
	<div class="form-group">
		<label for="party-theme">Group Name or Theme</label>
		<input type="text" class="form-control" id="party-theme" name="party-theme" />
	</div>
	<div class="form-group">
		<label for="party-privacy">This party is</label><br/>
		<input type="radio" class="form-control" name="party-privacy" value="private"> Private
		<input type="radio" class="form-control"  name="party-privacy" value="semi-private"> Semi-private
		<input type="radio" class="form-control"  name="party-privacy" value="public"> Public
	</div>
	<div class="form-group">
		<label for="party-comments">Additional Comments</label>
		<textarea class="form-control" id="party-comments" name="party-comments" rows="3"></textarea>
	</div>
	<button type="reset" class="btn btn-warning">Reset</button>
	<input type="button" id="party-submit-button" class="btn btn-success" value="Submit" />
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
	$("#party-reservation-form input.form-control, #party-reservation-form textarea").each(function(index, element){
		console.log(element.value);
	});
}

</script>




