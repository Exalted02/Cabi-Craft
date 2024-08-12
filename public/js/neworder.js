document.addEventListener('DOMContentLoaded', function() {
	initializeSelect2();
	Livewire.hook('message.processed', (message, component) => {
		initializeSelect2();
	});
	
	$('#select-project-type').on('change', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			//@this.set('project_type', data);
			Livewire.emit('projectTypeSelected', data);
		}
	});
});

/*document.addEventListener('show-success-message', event => {
	document.getElementById('messageContent').textContent = event.detail.message;
	document.getElementById('successMessage').style.display = 'block';

	
	setTimeout(() => {
		document.getElementById('successMessage').style.display = 'none';
	}, 3000);
});*/

function initializeSelect2() {
	$("select").select2({
		width: '100%',
		theme: "classic"
	});
	
	$('#expo_name, #expo_colour, #shutter_finish, #box_inner_laminate_val, #material, #shutter_material, #legtype, #handeltype').select2({
		theme: "classic",
        templateResult: formatOption,
        templateSelection: formatOptionSelection,
        // minimumResultsForSearch: Infinity
    });
}

function formatOptionSelection(option) {
	if (!option.id) {
		return option.text;
	}
	var imageUrl = $(option.element).attr('data-image'); 
	var optionWithImage = $(
		'<span><img src="' + imageUrl + '" class="img-thumbnail" style="width: 25px; height: 25px; margin-right: 5px; margin-top: -6px;" /> ' + option.text + '</span>'
	);
	return optionWithImage;
}

function formatOption(option) {
	if (!option.id) {
		return option.text;
	}
	var imageUrl = $(option.element).attr('data-image'); 
	var optionWithImage = $(
		'<div class="selectoption-item">' +
			'<div class="selectoption-image"><img src="' + imageUrl + '" height="55"/></div>' +
			'<div class="selectoption-text">' + option.text + '</div>' +
		'</div>'
	);
	return optionWithImage;
}