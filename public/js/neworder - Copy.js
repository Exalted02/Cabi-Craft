document.addEventListener('DOMContentLoaded', function() {
	initializeSelect2();
	Livewire.hook('message.processed', (message, component) => {
		initializeSelect2();
	});
	
	$('#select-project-type').on('change', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			//alert(data);
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
	// modal form
	/*$(document).on('change', '#modal_room_material', function (e) {
		var data = $(this).val();
		if(data!='')
		{
			Livewire.emit('modalRoomHandleTypeSelected', data);
		}
	});*/
	
});

function initializeSelect2() {
	$("select").select2({
		width: '100%',
		theme: "classic"
	});
	
	$('#expo_name, #expo_colour, #shutter_finish, #box_inner_laminate_val, #material, #shutter_material, #legtype, #handeltype, #room_material, #room_box_inner_lam, #room_shutter_material, #room_shutter_finish, #room_handeltype_val, #modal_room_material, #modal_room_box_inner_lam, #modal_room_shutter_material, #modal_room_shutter_finish, #modal_room_skt_type, #modal_room_skt_height, #modal_room_handeltype_val').select2({
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
/*document.addEventListener('livewire:update', function () {
	 alert('update');
	//$('#modal_room_material').val(5);
});*/
document.addEventListener('livewire:load', function () {
	//initializeSelect2();
	//$('#modal_room_material').select2();
	$('#modal_room_material').on('change', function (e) {
		alert($(this).val());
        //@this.set('modal_room_cabinet_material', $(this).val(), true);
		//let value = $(this).val();
        //Livewire.emit('updateCabinetMaterial', value);
    });
	
    // Listen for the event dispatched from Livewire
	window.addEventListener('openRoomDetailsModal', function (event) {
		const data = event.detail.status;
		//alert(data);
		if (data == 'true') {
            $('#roomDetailsModal').modal('hide');
        } else if (data == 'false') {
            $('#roomDetailsModal').modal('show');
        }
	});
	
	window.addEventListener('modalClosed', function () {
        $('#roomDetailsModal').modal('show');
    });
});
/*document.addEventListener('livewire:update', function (event) {
		$('#modal_room_material').select2();
		$('#modal_room_material').on('change', function (e) {
			//@this.set('modal_room_cabinet_material', $(this).val(), true);
			//eval(livewire).set('modal_room_cabinet_material', $(this).val())
		});
	});*/

