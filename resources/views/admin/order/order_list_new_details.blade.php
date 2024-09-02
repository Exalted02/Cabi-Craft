@extends('admin.layouts.app', [
        'title'=> "Categories Management"
    ])

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" />
<style type="text/css">
	.datepicker {
		font-size: 0.875em;
	}
	.datepicker td, .datepicker th {
		width: 2em;
		height: 2em;
		padding: 5px;
	}
</style>
<main class="content">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-lg-6">
				<h1 class="h3 mb-3"><strong></strong>Order Details Management</h1>
			</div>
			<div class="col-lg-6 text-end">
			{{-- <a href="{{ route('admin.add-category') }}"><button type="button" class="btn btn-danger">Add New</button></a> --}}
				{{-- <div class="btn-group">
					<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item change_status" href="javascript:void(0)" data-id="1" data-url="{{url('category/multi_change_status')}}">Active</a></li>
						<li><a class="dropdown-item change_status" href="javascript:void(0)" data-id="0" data-url="{{url('category/multi_change_status')}}">Inactive</a></li>
						<li><a class="dropdown-item" href="javascript:void(0)" id="delete_records" data-url="{{url('category/multi_delete')}}">Delete</a></li>
					</ul>
				</div> --}}
			</div>
		</div>
        <div id="message"></div>
		@if(session('message') )
		<div class="alert alert-success alert-dismissible fade show">
			<strong>{{session('message')}}</strong> 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
			</button>
		</div>
		@endif
        <div class="card">
			<div class="card-body">
			   
				<div class="col-md-12 invoiceprice"></div>
				<div class="table-responsive categoryTable">
					<table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
						<thead>
							<tr class="cmsHead">
								{{-- <th>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="checkAll">
									</label>
								</th> --}}
								<th>Sl.No.</th>
								<th>Room</th>
								<th>Product Name</th>
								<th>Width</th>
								<th>Length</th>
								<th>Deep</th>
								<th class="text-center">Status</th>
								<th class="text-center">Action</th>
								<th class="text-center">Invoice</th>
							</tr>
						</thead>
						<tbody>
							@php 
							$sl = 0;
							@endphp
							
							@foreach($orderDetails as $list)
							@php 
							$sl++;
							@endphp
							<tr class="cmsBody">
								<td class="text-center">{{$sl}}</td>
								<td class="text-center">{{$list->room->room_name ?? 'N/A'}}</td>
								<td class="text-center">{{$list->product->name ?? 'N/A'}}</td>
								<td class="text-center">{{$list->width}}</td>
								<td class="text-center">{{$list->length}}</td>
								<td class="text-center">{{ $list->deep }}</td>
								<td class="text-center">
								@if($list->status == 0)
								Cancel
							    @elseif($list->status == 1)
								pending
								@elseif($list->status == 2)
								Approval
								@elseif($list->status == 3)
								Payment confirmation 
								@elseif($list->status == 4)
								Ordered
								@elseif($list->status == 5)
								Manufacturing
								@elseif($list->status == 6)
								Ready to dispatch
								@elseif($list->status == 7)
								Dispatched
								@elseif($list->status == 8)
								Completed
								@else
								Delivered
                                @endif							
								
								{{-- <label class="switch">
										<input type="checkbox" class="changeStatus" data-id="{{$list->id}}" data-url="{{url('category/status')}}" {{$list->status==1 ? 'checked' : ''}}>
										<span class="slider round"></span>
									</label> --}}
								</td>
								
								<td class="optionsDetails text-center">
								<select name="status" data-id="{{ $list->id }}" class="form-control actionupdate">
									<option value="">Action</option>
									@foreach($statusArr as $key=>$val)
									<option value="{{$key }}" {{ ($list->status== $key) ? 'selected' : ''}}>{{ $val }}</option>
									@endforeach
								</select>
								</td>
								<td>
								{{--<a href="{{ url('/admin/order-edit')}}/{{ $list->id }}"><svg style="width:17px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>--}}
								
								<a href="javascript:void(0);" id="view_sub_order" data-id="{{$list->id}}">
								<svg enable-background="new 0 0 32 32" height="20px" id="svg2" version="1.1" viewBox="0 0 32 32" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><g id="background"><rect fill="none" height="32" width="32"/></g><g id="view"><circle cx="16" cy="16" r="6"/><path d="M16,6C6,6,0,15.938,0,15.938S6,26,16,26s16-10,16-10S26,6,16,6z M16,24c-8.75,0-13.5-8-13.5-8S7.25,8,16,8s13.5,8,13.5,8   S24.75,24,16,24z"/></g></svg><a>
								
								@if($list->status !='1')
								<a href="{{ url('/admin/order-download-pdf')}}/{{$list->id}}"  class="{{ $list->status == 2 ? 'disabled-link' : '' }}"><i class="align-middle me-2" data-feather="download"></i></a>
								@endif
								
								@if($list->status !='1')
								<a href="{{ url('/admin/order-view')}}/{{$list->excel_sl_no}}">
								<svg enable-background="new 0 0 32 32" height="20px" id="svg2" version="1.1" viewBox="0 0 32 32" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><g id="background"><rect fill="none" height="32" width="32"/></g><g id="view"><circle cx="16" cy="16" r="6"/><path d="M16,6C6,6,0,15.938,0,15.938S6,26,16,26s16-10,16-10S26,6,16,6z M16,24c-8.75,0-13.5-8-13.5-8S7.25,8,16,8s13.5,8,13.5,8   S24.75,24,16,24z"/></g></svg><a>
								@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
</main>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Order Details</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table table-borderless">
			
			<tbody>
				<tr>
					<td>Cabinet Type</td>
					<td>12</td>
					
				</tr>
				<tr>
					<td>Product Images</td>
					<td>12</td>
					
				</tr>
				<tr>
					<td>Width</td>
					<td>12</td>
				</tr>
				<tr>
					<td>Length</td>
					<td>12</td>
					
				</tr>
				<tr>
					<td>Deep</td>
					<td>12</td>
					
				</tr>
				<tr>
					<td>QTY</td>
					<td></td>
				</tr>
				<tr>
					<td>C.C Material</td>
					<td></td>
				</tr>
				<tr>
					<td>C.C colour</td>
					<td></td>
				</tr>
				<tr>
					<td>Expo side</td>
					<td></td>
				</tr>
				<tr>
					<td>Expo Colour</td>
					<td></td>
				</tr>
				<tr>
					<td>Shutter Material</td>
					<td></td>
				</tr>
				<tr>
					<td>Shutter Colour</td>
					<td></td>
				</tr>
				<tr>
					<td>Leg Type</td>
					<td></td>
				</tr>
				<tr>
					<td>Skthigh</td>
					<td></td>
				</tr>
				<tr>
					<td>Handel Type</td>
					<td></td>
				</tr>
				<tr>
					<td>Price</td>
					<td></td>
				</tr>
			</tbody>
		</table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>-->
<!--<script>
	$(".datepicker").datepicker({
		clearBtn: true,
		format: "dd/mm/yyyy",
	});
</script>-->
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<script>
    $(document).ready(function(){
        $('#start_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        $('#end_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
</script>


<script>
$(document).ready(function () {
	$('.actionupdate').on('change', function (e) {
        var val = $(this).val();
		var order_id = $(this).data('id');
		
		$.ajax({
			url: "{{ route('admin.orderStatusChange') }}",
			type: "POST",
			data: {status:val, order_id:order_id, _token: "{{ csrf_token() }}"},
			dataType: 'json',
			success: function(response) {
				 //alert(response);
				 
				 $('#message').html('<div class="alert alert-success alert-dismissible fade show"><strong>'+response.success+'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button></div>');
				 setInterval(function(){reloadpage();}, 2000);
			},
		});
        
	});
	function reloadpage()
	{
		location.reload(true);
	}
	
	$(".reset-order").on("click", function(){
		location.href= "{{ route('admin.order')}}";
	});
	
	$(document).on('click','#view_sub_order',function(){
		var id = $(this).data('id');
		
		$.ajax({
			url: "{{ route('admin.subOrderDetails') }}",
			type: "POST",
			data: {id:id, _token: "{{ csrf_token() }}"},
			dataType: 'json',
			success: function(response) {
				var materials 			= response.materials;
				var cabinetcolour 		= response.cabinetcolour;
				var exposides 			= response.exposides;
				var shuttermaterials 	= response.shuttermaterials;
				var legtypes 			= response.legtypes;
				var handeltypes 		= response.handeltypes;
				//alert(materials);alert(cabinetcolour);alert(exposides);alert(shuttermaterials);alert(legtypes);alert(handeltypes);
				$('#myModal').modal('show');
			},
		});
		
	});
});
</script>
@endsection