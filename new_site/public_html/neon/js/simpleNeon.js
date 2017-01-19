/*
	Adds my own custom version of neong (using the neon plugin) to elements with the neon-sign class.
*/
$(function(){
	$(".neon-sign").each(function(index, element)
	{
		//Add make the element a neon sign
		$(element).attr("data-neon", "custom");
		//Find a random character to blink
		var html = $(element).html();
		//Find a random non-space, non-comma, non-apostropher character
		var regEx = new RegExp("[a-zA-Z]");
		var foundChar = false;
		var charIndex;
		do
		{
			charIndex = Math.floor(Math.random() * html.length);
			char = html[charIndex];
			foundChar = char.match(regEx);
		}
		while(!foundChar)
		//Fuck immutable js strings
		var beginning = html.substr(0, charIndex);
		var end = html.substr(charIndex + 1, html.length);
		$(element).html(`${beginning}<span data-neon-params="blinks">${char}</span>${end}`);
	});
});