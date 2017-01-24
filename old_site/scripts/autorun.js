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
			+ parseFloat( $('#cheese-burger').val() )
			+ parseFloat( $('#bacon-swiss-chicken').val() )
			+ parseFloat( $('#mushroom-swiss-chicken').val() )
			+ parseFloat( $('#mushroom-swiss-burger').val() )
			+ parseFloat( $('#chicken-cheddar-brat').val() )
			+ parseFloat( $('#bacon-cheese-burger').val() )
			+ parseFloat( $('#kids-hotdog').val() )
			+ parseFloat( $('#veggie-burger').val() )
			+ parseFloat( $('#pretzel-burger').val() )
			+ parseFloat( $('#curd-burger').val() )
			+ parseFloat( $('#hamburger').val() )
		;

		totalSandwich = parseFloat( $('#red-brat').val() ) * 5.25
			+ parseFloat( $('#white-brat').val() ) * 5.25
			+ parseFloat( $('#ribeye-steak-sandwich').val() ) * 8.25
			+ parseFloat( $('#chicken-breast-sandwich').val() ) * 6.75
			+ parseFloat( $('#cheese-burger').val() ) * 6.25
			+ parseFloat( $('#bacon-swiss-chicken').val() ) * 7.25
			+ parseFloat( $('#mushroom-swiss-chicken').val() ) * 8.00
			+ parseFloat( $('#mushroom-swiss-burger').val() ) * 7.50
			+ parseFloat( $('#chicken-cheddar-brat').val() ) * 5.25
			+ parseFloat( $('#bacon-cheese-burger').val() ) * 7.25
			+ parseFloat( $('#kids-hotdog').val() ) * 4.50
			+ parseFloat( $('#veggie-burger').val() ) * 5.00
			+ parseFloat( $('#pretzel-burger').val() ) * 7.00
			+ parseFloat( $('#curd-burger').val() ) * 8.25
			+ parseFloat( $('#hamburger').val() ) * 5.75
		;

		// SIDES
		var pricePerSide;
		if ( parseFloat( $('input.number-of-sides:checked').val() ) == 2 ) pricePerSide = 2.5;
		else if ( parseFloat( $('input.number-of-sides:checked').val() ) == 3 ) pricePerSide = 2.75;
		else if ( parseFloat( $('input.number-of-sides:checked').val() ) == 4 ) pricePerSide = 3.25;
		
		var totalCobs;
// 		totalCobs = parseFloat( $('#corn-cob').val() ) * 2.00;
		totalCobs = 0;
		
		totalSides = totalCobs + totalGuests * pricePerSide;
		
		// DESSERT

		totalDessert = (
				parseFloat( $('#cookies').val() )
/*
				+ parseFloat( $('#cherry-pies').val() )
				+ parseFloat( $('#creme-puffs').val() )
				+ parseFloat( $('#apple-pies').val() )
				+ parseFloat( $('#chocolate-brownies').val() )
*/
			) * 1.50
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