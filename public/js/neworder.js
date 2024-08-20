document.addEventListener('DOMContentLoaded', function() {
	
	$('#open-kitchen-form-modal').on('click', function (e) {
        //e.preventDefault();
		if($('#select-room-lists').val()=='')
		{
			$('#err_room_type').html('<font color="red">Select Room Type</font>');
		}
		else{
			Livewire.emit('open_kitchen_properties_form');
		}
		
        // Your JavaScript or jQuery function here
        //openKitchenPropertiesForm();
    });
	
	
	$('#submitKitchenOrderForm').on('click', function(e) {
        // Initialize form validation
		//initializeSelect2();
		e.preventDefault();
		$('#error_modal_material').html('');
		$('#error_modal_box_inner').html('');
		$('#error_modal_shutter_material').html('');
		$('#error_modal_shutter_finish').html('');
		$('#error_modal_skt_type').html('');
		$('#error_modal_skt_height').html('');
		$('#error_modal_handle_type').html('');
		
		
		if($('#modal_room_material').val()=='')
		{
			$('#error_modal_material').html('<font color="red">Select Material</font>');
			return false; 
		}
		else if($('#modal_room_box_inner_lam').val()=='')
		{
			$('#error_modal_box_inner').html('<font color="red">Select Inner Box</font>');
			return false; 
		}
		else if($('#modal_room_shutter_material').val()=='')
		{
			$('#error_modal_shutter_material').html('<font color="red">Select Shutter material</font>');
			return false; 
		}
		else if($('#modal_room_shutter_finish').val()=='')
		{
			$('#error_modal_shutter_finish').html('<font color="red">Select Shutter Finish</font>');
			return false; 
		}
		else if($('#modal_room_skt_type').val()=='')
		{
			$('#error_modal_skt_type').html('<font color="red">Select Skt Type</font>');
			return false; 
		}
		else if($('#modal_room_skt_height').val()=='')
		{
			$('#error_modal_skt_height').html('<font color="red">Select Skt Height</font>');
			return false; 
		}
		else if($('#modal_room_handeltype_val').val()=='')
		{
			$('#error_modal_handle_type').html('<font color="red">Select Handle Type</font>');
			return false; 
		}
		else{
			//initializeSelect2();
			Livewire.emit('submitModalKitchenOrderForm');
			//return true;
		}
    });
	
	//$('#modal_room_material').select2({
        //allowClear: true // Optional: Allow clearing the selection
    //});
	
	initializeSelect2();
	Livewire.hook('message.processed', (message, component) => {
		initializeSelect2();
		//$('#roomDetailsModal').modal('show');
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
	//$(document).on('change', '#modal_room_material', function (e) {
		//var data = $(this).val();
		//if(data!='')
		//{
			 //$('#modal_room_material').val(data).trigger('change');
			 //$('#modal_room_material').select2('close');
			 //Livewire.emit('modalRoomMaterialSelected', data);
			 //$('#roomDetailsModal').modal('show');
			 //setTimeout(function() {
                //$('#modal_room_material').select2('close');
            //}, 100); // Adjust the delay if necessary
        
			 
			 //$('#modal_room_material').select2('val', data);
			//initializeSelect2() {$('#modal_room_material').select2({})}
			//Livewire.emit('modalRoomHandleTypeSelected', data);
		//}
	//});
	
	/*$(document).on('change', '[id^=room_], [id^=modal_room_]', function (e) {
		let data = $(this).val();
		if (data !== '') {
			//alert(data);
			let eventName = $(this).data('livewire-event'); // Use data-livewire-event to dynamically determine the event name
			if (eventName) {
				Livewire.emit(eventName, data);
			}
		}
	});*/


	/*document.addEventListener('livewire:load', function () {
		//initializeSelect2();
		
		// Listen for the event dispatched from Livewire
		window.addEventListener('openRoomDetailsModal', function (event) {
			const data = event.detail.status;
			alert(data);
			if (data == 'true') {
				$('#roomDetailsModal').modal('hide');
			} else if (data == 'false') {
				$('#roomDetailsModal').modal('show');
			}
		});
		
		window.addEventListener('modalClosed', function () {
			$('#roomDetailsModal').modal('show');
		});
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

// Generic listener for dynamically generated select elements
/*$(document).on('change', '[id^=room_], [id^=modal_room_]', function (e) {
	let data = $(this).val();
	if (data !== '') {
		//alert(data);
		let eventName = $(this).data('livewire-event'); // Use data-livewire-event to dynamically determine the event name
		if (eventName) {
			Livewire.emit(eventName, data);
		}
	}
});*/


//document.addEventListener('livewire:load', function () {
	//initializeSelect2();
	
	// Listen for the event dispatched from Livewire
	/*window.addEventListener('openRoomDetailsModal', function (event) {
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
    });*/
//});
/*document.addEventListener('livewire:update', function (event) {
		$('#modal_room_material').select2();
		$('#modal_room_material').on('change', function (e) {
			//@this.set('modal_room_cabinet_material', $(this).val(), true);
			//eval(livewire).set('modal_room_cabinet_material', $(this).val())
		});
	});*/
//$('#modal_room_material').select2();
	
	//$('#modal_room_material').on('change', function (e) {
		//alert($(this).val());
		//let livewire = $(this).data('livewire')
        //eval(livewire).set('modal_room_cabinet_material', $(this).val());
		//$('#modal_room_material').val($(this).val());
        //@this.set('modal_room_cabinet_material', $(this).val(), true);
		//let value = $(this).val();
        //Livewire.emit('updateCabinetMaterial', value);
		
    //});
	//Livewire.hook('message.processed', (message, component) => {
        // Sync Select2 with the Livewire property value
        //$('#modal_room_material').val(@this.modal_room_cabinet_material).trigger('change');
    //});
	//document.addEventListener('livewire:update', function () {
		
	//});
	//$('#modal_room_material').on('change', function (e) {
		//alert($(this).val());
		//$('#modal_room_material').val($(this).val());
	//});	
	/*$('#modal_room_material').on('change', function (e) {
		alert($(this).val());
		let livewire = $(this).data('livewire');
		eval(livewire).set('modal_room_cabinet_material', $(this).val());
	});*/
