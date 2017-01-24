$(document).ready(function(){
	$('#theme-head-photo').slideshow({
		width: 507,
		height: 458,
		title: false,
		panel: false,
		play: true,
		loop: true,
		playframe: false
	});

	function updateTotal() {
		var totalSandwich;
		var totalSides;
		var totalDessert;
		var totalGuests;
		var totalAll;

		totalGuests = parseFloat( $('#smoked-red-brat').val() )
			+ parseFloat( $('#white-brat').val() )
			+ parseFloat( $('#ribeye-steak-sandwich').val() )
			+ parseFloat( $('#chicken-breast-sandwich').val() )
			+ parseFloat( $('#state-street-burger').val() )
			+ parseFloat( $('#bacon-cheeseburger').val() )
			+ parseFloat( $('#triple-cheeseburger').val() )
			+ parseFloat( $('#bacon-swiss-chicken').val() )
			+ parseFloat( $('#hotdog').val() )
			+ parseFloat( $('#blackbean-burger').val() )
			+ parseFloat( $('#pretzel-burger').val() )
			+ parseFloat( $('#bbq-chicken').val() )
			+ parseFloat( $('#red-brat-reuben').val() )
		;

		totalSandwich = parseFloat( $('#smoked-red-brat').val() ) * 4.5
			+ parseFloat( $('#white-brat').val() ) * 4.5
			+ parseFloat( $('#ribeye-steak-sandwich').val() ) * 6.75
			+ parseFloat( $('#chicken-breast-sandwich').val() ) * 6.75
			+ parseFloat( $('#state-street-burger').val() ) * 5.5
			+ parseFloat( $('#bacon-cheeseburger').val() ) * 6.75
			+ parseFloat( $('#triple-cheeseburger').val() ) * 7.00
			+ parseFloat( $('#bacon-swiss-chicken').val() ) * 6.75
			+ parseFloat( $('#hotdog').val() ) * 4
			+ parseFloat( $('#blackbean-burger').val() ) * 5.00
			+ parseFloat( $('#pretzel-burger').val() ) * 6.50
			+ parseFloat( $('#bbq-chicken').val() ) * 7.00
			+ parseFloat( $('#red-brat-reuben').val() ) * 6.25
		;

		// SIDES
		var pricePerSide;
		if ( parseFloat( $('input.number-of-sides:checked').val() ) == 2 ) pricePerSide = 2.5;
		else if ( parseFloat( $('input.number-of-sides:checked').val() ) == 3 ) pricePerSide = 2.75;
		else if ( parseFloat( $('input.number-of-sides:checked').val() ) == 4 ) pricePerSide = 3.25;
		
		var totalCobs;
		totalCobs = parseFloat( $('#corn-cob').val() ) * 2.00;
		
		totalSides = totalCobs + totalGuests * pricePerSide;
		
		// DESSERT

		totalDessert = parseFloat( $('#frosted-cookies').val() )
			+ parseFloat( $('#rice-krispie-treat').val() )
			+ parseFloat( $('#double-choco-brownies').val() )
			* 1.75
		;

		totalAll = parseFloat(totalSandwich + totalSides + totalDessert).toFixed(2);

		$('#ShowTotal').html(totalAll);
		$('#estimated-total').val(totalAll);
	}

	$('#catering input').change(function(){
		updateTotal();
	});

	$('#party-type-tabs').tabs();
	
	$('#QapTcha').QapTcha({
		disabledSubmit: true,
		txtLock: 'Slide to unlock the Submit button.',
		txtUnlock: 'Unlocked! Click the Submit button.'
	});
});