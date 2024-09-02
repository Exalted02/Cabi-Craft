document.addEventListener('DOMContentLoaded', function() {
	
	//$('#open-kitchen-form-modal').on('click', function (e) {
	$(document).on('click', '#open-kitchen-form-modal', function (e) {
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
		$('#error_modal_note').html('');
		
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
			
			Livewire.emit('submitModalKitchenOrderForm');
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
	
	//$('#select-room-lists').on('change', function (e) {
	$(document).on('change', '#select-room-lists', function (e) {
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
	// delete room
	$('#delete-room').on('click', function(e) {
		if($('#select-room-lists').val()=='')
		{
			$('#err_room_type').html('<font color="red">Select Room</font>');
		}
		else{
			$('#confirmDelete').modal("show");
		}
		e.preventDefault();
		$('#confirmDelete').on('click', '#roomdelete', function(e) {
			Livewire.emit('deleteroom');
		});
		
		$('#confirmDelete').on('click', '#cancelroom', function(e) {
			$('#confirmDelete').modal("hide");
		});
	}); 
	$('#delete-project-name').on('click', function(e) {
		
		$('#confirmProjectDelete').modal("show");
		e.preventDefault();
		$('#confirmProjectDelete').on('click', '#projectdelete', function(e) {
			Livewire.emit('deleteprojectname');
		});
		
		$('#confirmProjectDelete').on('click', '#projectcancel', function(e) {
			$('#confirmProjectDelete').modal("hide");
		});
	});
	
	// submit customize orfer form 
	//$('#submitCustomizeOrferForm').on('click', function(e) {
	$(document).on('click', '#submitCustomizeOrferForm', function () {
        // Initialize form validation
		//initializeSelect2();
		//e.preventDefault();
		$('#error_customize_expo').html('');
		$('#error_customize_expo_color').html('');
		$('#error_customize_cab_material').html('');
		$('#error_customize_box_inner').html('');
		$('#error_customize_shut_material').html('');
		$('#error_customize_shut_finish').html('');
		$('#error_customize_legtype').html('');
		$('#error_customize_skt_height').html('');
		$('#error_customize_handle_type').html('');
		$('#error_customize_address').html('');
		
		
		if($('.customize_expo_name').val()=='')
		{
			$('#error_customize_expo').html('<font color="red">Select Expo</font>');
			return false; 
		}
		else if($('.customize_expo_colour').val()=='')
		{
			$('#error_customize_expo_color').html('<font color="red">Select Expo Colour</font>');
			return false; 
		}
		else if($('.customize_cabinet_material').val()=='')
		{
			$('#error_customize_cab_material').html('<font color="red">Select Cabinet Material</font>');
			return false; 
		}
		else if($('.customize_box_inner_laminate').val()=='')
		{
			$('#error_customize_box_inner').html('<font color="red">Select Inner Box</font>');
			return false; 
		}
		else if($('.customize_shutter_material').val()=='')
		{
			$('#error_customize_shut_material').html('<font color="red">Select Shutter material</font>');
			return false; 
		}
		else if($('.customize_shutter_finish').val()=='')
		{
			$('#error_customize_shut_finish').html('<font color="red">Select Shutter Finish</font>');
			return false; 
		}
		else if($('.customize_legtype').val()=='')
		{
			$('#error_customize_legtype').html('<font color="red">Select Leg Type</font>');
			return false; 
		}
		else if($('.customize_skt_height').val()=='')
		{
			$('#error_customize_skt_height').html('<font color="red">Select Skt Height</font>');
			return false; 
		}
		else if($('.customize_handeltype').val()=='')
		{
			$('#error_customize_handle_type').html('<font color="red">Select Handle Type</font>');
			return false; 
		}
		/*else if($('.customer_address').val()=='')
		{
			$('#error_customize_address').html('<font color="red">Address  Require</font>');
			return false; 
		}*/
		else{
			
			Livewire.emit('submitcostomizeOrderForm');
		}
    });
	
	$(document).on('click', '.open-customize-form', function () {
		var cart_id = $(this).data('id');
		//alert(cart_id);
		Livewire.emit('open_customise_form',cart_id);
	});
	
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


