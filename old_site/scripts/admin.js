function updateAddressFromTitle() {
	if (document.getElementById('Page[URI]').value == '') {
		// Initialize
		var strValue;
		strValue = document.getElementById('Page[Title]').value;
		// Convert spaces to hyphens
		strValue = strValue.replace(/ /g, '-');
		// Strip punctuation
		strValue = strValue.replace(/[^a-zA-Z0-9_-]/g, '');
		strValue = strValue.toLowerCase();
		document.getElementById('Page[URI]').value = strValue;
	}
}

function updateAddressFromSelf() {
	// Initialize
	var strValue;
	strValue = document.getElementById('Page[URI]').value;
	// Convert spaces to hyphens
	strValue = strValue.replace(/ /g, '-');
	// Strip punctuation
	strValue = strValue.replace(/[^a-zA-Z0-9_-.]/g, '');
	strValue = strValue.toLowerCase();
	document.getElementById('Page[URI]').value = strValue;
}

function resetFCKEditors() {
	// If the editor API does not exist, there are no editors
	if (typeof FCKeditorAPI == "undefined") return;

	// Loop through all FCK instances, in case there are several editors
	for (var sEditorName in FCKeditorAPI.__Instances) {
		// The initial value that was set when the form was created
		// is stored in a hidden <INPUT> with the same name as the
		// editor (the editor itself is in an <IFRAME> with ___Frame
		// appended to the name.  Check whether that INPUT exists
		if (document.getElementById(sEditorName)) {
			// Get the initial value
			var sInitialValue = document.getElementById(sEditorName).value;

			// Overwrite the editor's current value
			FCKeditorAPI.__Instances[sEditorName].SetHTML(sInitialValue);
		}
	}
}
