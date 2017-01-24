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

		totalGuests = parseFloat( $('#red-brat').val() )
			+ parseFloat( $('#white-brat').val() )
			+ parseFloat( $('#ribeye-steak-sandwich').val() )
			+ parseFloat( $('#chicken-breast-sandwich').val() )
			+ parseFloat( $('#state-street-burger').val() )
			+ parseFloat( $('#bacon-swiss-chicken').val() )
			+ parseFloat( $('#double-burger').val() )
			+ parseFloat( $('#kids-hotdog').val() )
			+ parseFloat( $('#veggie-burger').val() )
		;

		totalSandwich = parseFloat( $('#red-brat').val() ) * 4.5
			+ parseFloat( $('#white-brat').val() ) * 4.5
			+ parseFloat( $('#ribeye-steak-sandwich').val() ) * 6.75
			+ parseFloat( $('#chicken-breast-sandwich').val() ) * 6.75
			+ parseFloat( $('#state-street-burger').val() ) * 5.5
			+ parseFloat( $('#bacon-swiss-chicken').val() ) * 6.75
			+ parseFloat( $('#double-burger').val() ) * 9
			+ parseFloat( $('#kids-hotdog').val() ) * 2
			+ parseFloat( $('#veggie-burger').val() ) * 5.50
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

		totalDessert = parseFloat( $('#cookies').val() )
			+ parseFloat( $('#cherry-pies').val() )
			+ parseFloat( $('#creme-puffs').val() )
			+ parseFloat( $('#apple-pies').val() )
			+ parseFloat( $('#chocolate-brownies').val() )
			* 1.75
		;

		totalAll = parseFloat(totalSandwich + totalSides + totalDessert).toFixed(2);

		$('#ShowTotal').html(totalAll);
		$('#estimated-total').val(totalAll);
	}

	$('#catering input').change(function(){
		updateTotal();
	});
	
	$('#QapTcha').QapTcha({
		disabledSubmit: true,
		txtLock: 'Slide to unlock the Submit button.',
		txtUnlock: 'Unlocked! Click the Submit button.'
	});
});