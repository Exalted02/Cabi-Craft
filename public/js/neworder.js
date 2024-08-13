document.addEventListener('DOMContentLoaded', function() {
	initializeSelect2();
	Livewire.hook('message.processed', (message, component) => {
		initializeSelect2();
		/*if($('#has_room_details').val()=='false')
		{
			$('#roomDetailsModal').modal('show');
		}*/
	});
	
	$('#select-project-type').on('change', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			//@this.set('project_type', data);
			Livewire.emit('projectTypeSelected', data);
		}
	});
	
	$('#select-room-lists').on('change', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			Livewire.emit('roomTypeSelected', data);
		}
	});
	
	/*Livewire.on('openRoomDetailsModal', () => {
		console.log('modal open');
        $('#roomDetailsModal').modal('show');
    });*/
	
	$(document).on('change', '#room_material', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			Livewire.emit('roomMaterialTypeSelected', data);
		}
	});
	$(document).on('change', '#room_box_inner_lam', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			Livewire.emit('roomBoxInnerTypeSelected', data);
		}
	});
	$(document).on('change', '#room_shutter_material', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			Livewire.emit('roomShutterTypeSelected', data);
		}
	});
	$(document).on('change', '#room_shutter_finish', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			Livewire.emit('roomShFinishTypeSelected', data);
		}
	});
	$(document).on('change', '#room_skt_type', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			Livewire.emit('roomSktTypeTypeSelected', data);
		}
	});
	$(document).on('change', '#room_skt_height', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			Livewire.emit('roomSktHtTypeSelected', data);
		}
	});
	$(document).on('change', '#room_handeltype_val', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			Livewire.emit('roomHandleTypeSelected', data);
		}
	});
	
});

function initializeSelect2() {
	$("select").select2({
		width: '100%',
		theme: "classic"
	});
	
	$('#expo_name, #expo_colour, #shutter_finish, #box_inner_laminate_val, #material, #shutter_material, #legtype, #handeltype, #room_material, #room_box_inner_lam, #room_shutter_material, #room_shutter_finish, #room_handeltype_val').select2({
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