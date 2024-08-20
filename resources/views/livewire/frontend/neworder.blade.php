@section('styles')
<link href="{{ url('css/custom-select2.css') }}" rel="stylesheet">
@endsection
<div class="submited-form">
    <div class="row">
		<div class="col-md-12 col-xs-12 col-sm-12">
			<div class="row">
				<div class="col-md-8">
					<div class="search-widget">
						<input placeholder="Search by Products" type="search" wire:model.debounce.350ms="search">
						<button type="submit"><i class="fa fa-search"></i></button>
					</div>
					<!-- Middle Content Box -->
					<div class="row grid-style-4">
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="new-order-body-scroll">
								<div class="posts-masonry1 row">
									@forelse ($products as $product)
									<div class="col-md-4 col-xs-12 col-sm-6">
										<div class="category-grid-box-1">
											{{--<div class="images"> <img alt="" src="{{ asset('admin-assets/images/product/' .$product->image) }}" class="img-responsive">
											</div>--}}
											<div class="category-grid-img">
												<div class="image-background" style="background-image: url('{{ isset($product->image) && $product->image!='' ? asset('admin-assets/images/product/'.$product->image) : asset('/images/noimage.png') }}');"></div>
												<img class="main-image" src="{{ isset($product->image) && $product->image!='' ? asset('admin-assets/images/product/'.$product->image) : asset('/images/noimage.png') }}" alt="image">
											 </div>
											<div class="short-description-1">
												<h3>
													<a title="" href="{{route('offerdetailpage')}}">{{$product->name}}</a>
												</h3>
												<p>{{ \Illuminate\Support\Str::limit($product->description, 30) }}</p>
												<span class="ad-price">Rs.{{ $product->price}}</span> 
											</div>
											<div class="ad-info-1" style="display: flex; justify-content: center; align-items: center;">
												<button type="button" class="btn btn-danger" wire:click="addToCart({{ $product->id }})">add to cart</button>
											</div>
										</div>
									</div>
									@empty
									<span style="color: red;" class="text-center"><h3>No Record Found</h3></span>
									@endforelse
								</div>
								@if($products->total()!=count($products))
								<div class="row">
									<div class="col-lg-12 col-xl-12 col-sm-12 text-center">
										<button
											type="button"
											name=""
											id=""
											wire:click="seeMore"
											class="btn-theme btn-lg btn"
											wire:loading.attr="disabled"
										>
											<span wire:loading.remove>{{ __('Load More') }} <i class="fa fa-angle-right"></i></span>
											<span wire:loading>{{ __('Loading..') }}</span>
										</button>
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>
					
					<!-- Middle Content Box End -->
				</div>
				<div class="col-md-4 new-order-right-sidebar">
					  <!-- Left Sidebar -->
						 <!-- Sidebar Widgets -->
						 <div class="sidebar mr-5px">
							@if($this->new_order_form)
							<!-- Panel group -->
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							   <!-- Brands Panel -->    
							   <div class="panel panel-default">
								  <!-- Heading -->
								  <div class="panel-heading" role="tab" id="headingTwo">
								  <div class="ad-info-1">
									 <!-- Ad Status -->
									 <label>
										 <h4 class="panel-title">New Order From</h4>
									 </label>
									 <ul class="pull-right ">
										<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times delete"></i></a></li>
									 </ul>
								  </div>
								  </div>
								  <!-- Content -->
								  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
											<form wire:submit.prevent="submitNewOrderForm" id="bodyform">
												<div class="form-group row">
													<label for="project-name" class="col-sm-5 col-form-label no-wrap">Project Name:</label>
													<div class="col-sm-7">
														<input wire:model="project_name" id="project_name" class="form-control" placeholder="Project name" type="text">
														@error('project_name') <span class="text-danger">{{ $message }}</span> @enderror
													</div>
												</div>
												
												<div class="form-group row">
													<label for="address" class="col-sm-5 col-form-label">Address:</label>
													<div class="col-sm-7">
														<input wire:model="address" id="address" class="form-control" placeholder="Address" type="text">@error('address') <span class="text-danger">{{ $message }}</span> @enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="city" class="col-sm-5 col-form-label">City:</label>
													<div class="col-sm-7">
														<input wire:model="city" id="city" class="form-control" placeholder="City" type="text">
														@error('city') <span class="text-danger">{{ $message }}</span> @enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="zip-code" class="col-sm-5 col-form-label">Zip Code:</label>
													<div class="col-sm-7">
														<input wire:model="zip_code" id="zip_code" class="form-control" placeholder="Zip Code" type="text">
														@error('zip_code') <span class="text-danger">{{ $message }}</span> @enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="state" class="col-sm-5 col-form-label">State:</label>
													<div class="col-sm-7">
														<input wire:model="state" id="state" class="form-control" placeholder="State" type="text">
														@error('state') <span class="text-danger">{{ $message }}</span> @enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="country" class="col-sm-5 col-form-label">Country:</label>
													<div class="col-sm-7">
														<input wire:model="country" id="country" class="form-control" placeholder="Country" type="text">
														@error('country') <span class="text-danger">{{ $message }}</span> @enderror
													</div>
												</div>

												<div class="form-group row">
													<label for="mobile" class="col-sm-5 col-form-label">Mobile:</label>
													<div class="col-sm-7">
														<input wire:model="mobile" id="mobile" class="form-control" placeholder="Mobile #" type="text">
														@error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
													</div>
												</div>

												<div class="form-group row">
												<label class="inline-label-select col-sm-5">Project Type:</label>
												<div class="col-sm-7">
													<select wire:model="project_type" id="select-project-type" class="form-control">
														<option value="">Select</option>
														@foreach($projecttype as $projecttype_val)
															<option value="{{$projecttype_val->id}}" {{ !empty($project_type) && $project_type == $projecttype_val->id ? 'selected' : '' }}>{{$projecttype_val->name}}</option>
														@endforeach
													</select>
													@error('project_type') <span class="text-danger">{{ $message }}</span> @enderror
												</div>
												</div>
												<hr>
												
												<div class="form-group row align-items-center">
													<label for="project-type" class="col-sm-4 col-form-label">Room Name:</label>
													<div class="col-sm-6">
														<input id="project-type" class="form-control" placeholder="Room Name" type="text" wire:model="roomName">
														@if($room_validation)
															<font color="red">Enter Room Name</font>
														@endif
													</div>
													<div class="col-sm-2">
													<i class="fa fa-plus-square" style="color: green;" wire:click="addRoom"></i>
													</div>
												</div>
												<div class="row">
													@foreach($rooms as $index => $room)
													<div class="col-md-6">
														<div>{{ $index + 1 }}. {{ $room }}</div>
													</div>
													@endforeach
												</div>
											    <input type="hidden" wire:model="room_names" value="{{ json_encode($rooms) }}" id="room_names">
											    <input type="hidden" wire:model="edit_id" id="edit_id" value="{{$edit_id ?? ''}}">
											<hr>
											<button type="button" class="btn btn-danger" aria-label="Close">Close</button>
											<button type="submit" class="btn btn-success pull-right" aria-label="Close">Submit</button>
											{{--<button type="button" class="btn btn-success pull-right" aria-label="Close" wire:click="submit_new_order_form">Submit</button>--}} 
											</form>											
										</div>
								  </div>
								</div>
							   <!-- Latest Ads Panel End -->
							</div>
							<!-- panel-group end -->
							@endif
							@if($this->view_order_form)
							 <!-- MR Robin-->
							 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							   <!-- Brands Panel -->    
							   <div class="panel panel-default">
								  <!-- Heading -->
								  <div class="panel-heading" role="tab" id="headingTwo">
										<div class="ad-info-1">
											<!-- Ad Status -->
											<label>
												<h4 class="panel-title">{{$project_name_label ?? ''}}</h4>
											</label>
											<ul class="pull-right ">
												<li><a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Ad" href="javascript:void(0);" wire:click="edit_new_order_form"><i class="fa fa-pencil edit"></i></a> </li>
												<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" id="delete-project-name"><i class="fa fa-times delete"></i></a></li>
											</ul>
										</div>
								  </div>
								  <!-- Content -->
								  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
											<input type="hidden" wire:model="hasRoomDetails" id="has_room_details">
												<!-- Ad Status -->
												<div class="form-group row align-items-center">
													<div class="col-sm-5">
														<select class="form-control ad-post-status col-sm-4" id="select-room-lists" wire:model="select_rooms">
															<option value="">Select Room</option>
															@foreach($get_rooms as $val)
															<option value="{{$val->id ?? ''}}" {{$select_rooms_id==$val->id ? 'selected' : ''}}>{{ $val->room_name ?? ''}}</option>
															@endforeach
														</select>
														<span id="err_room_type"></span>
														
													</div>
													
													<div class="col-sm-4">
														<h5 class="mr-2 mb-0">Rs.{{$total_cart_price ?? 0}}</h5> 
													</div>
													<div class="col-sm-3">
														<ul class="list-inline mb-0 ml-auto text-right">
															<li class="list-inline-item dropdown">
																<a href="javascript:void(0)" id="open-kitchen-form-modal">
																	<i class="fa fa-ellipsis-v"></i>
																</a>
															</li>
															<li class="list-inline-item">
																<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" id="delete-room">
																	<i class="fa fa-times delete"></i>
																</a>
															</li>
														</ul>
													</div>
												</div>
										
											  <hr>
											@if($exists_cart_data)
											@foreach($list_add_to_cart as $cartlist)
											<div class="row">
														<div class="col-md-6 col-xs-6 col-sm-6">
																	<p>{{ $cartlist->product_name ?? ''}}<br>
																	<br>
																	</p>
														</div>
														
														<div class="col-md-6 col-xs-6 col-sm-6">
															<span class="label label-warning"><font wire:click="open_customise_form({{ $cartlist->product_id }})">Customize</font> <ul class="pull-right ">
																<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" wire:click="deleteFromCart({{ $cartlist->id }})"><i class="fa fa-times delete"></i></a></li>
															</ul></span>
															<h5>Rs.{{ $cartlist->price ?? '' }}</h5>
															
														</div>
													</div>
													@endforeach
													
													{{--<div class="row">
														<div class="col-md-6 col-xs-6 col-sm-6">

																	<p>2.Basic cabinet, 2ss <br>
																	(2L plane Baskets)<br>
																	720H * 600W * 560D</p>
														</div>
														<div class="col-md-6 col-xs-6 col-sm-6">
															<span class="label label-warning" wire:click="open_customise_form">Customize<ul class="pull-right ">
																<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times delete"></i></a></li>
															</ul></span>
															<h5>Rs.4,100.00</h5>
															
														</div>
													</div>--}}
												
											
													{{--<div class="row">
														<div class="col-md-6 col-xs-6 col-sm-6">

																  <p>  3.Basic cabinet, 2ss<br>
																	(2L plane Baskets)<br>
																	720H * 600W * 560D</p>
														</div>
														<div class="col-md-6 col-xs-6 col-sm-6">
															<span class="label label-warning" wire:click="open_customise_form">Customize<ul class="pull-right ">
																<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times delete"></i></a></li>
															</ul></span>
															<h5>Rs.2,300.00</h5>
															
														</div>
													</div>--}}
											@endif	
											<hr>
											@if($exists_cart_data)
											<button type="button" class="btn btn-danger" aria-label="Close">Close order</button>
											<a href="{{ route('cartpage', ['ordid' => $this->edit_id]) }}" target="_blank"><button type="button" class="btn btn-success pull-right " aria-label="Close">view cart</button></a>
											@endif											
										</div>
								  </div>
								</div>
							   <!-- Latest Ads Panel End -->
							</div>
							  <!--  end MR Robin-->
							@endif  
							@if($this->kitchen_properties_form)
							 <!--SubmitKitchen properties-->
							 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							   <!-- Brands Panel -->    
							   <div class="panel panel-default">
								  <!-- Heading -->
								  <div class="panel-heading" role="tab" id="headingTwo">
								  <div class="ad-info-1">
									<label>
										<h4 class="panel-title">Submit Kitchen properties</h4>
									</label>
								  </div>
								  </div>
								  <!-- Content -->
								  <?php 
								  //echo "<pre>";print_r($indivisual_room_data);
								  ?>
								  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
									 <div class="panel-body">
										<form wire:submit.prevent="submitKitchenOrderForm" id="bodyform">
										<input type="hidden" wire:model="select_rooms">
											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Cabinet Material:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="room_cabinet_material" id="room_material">
															<option value="">Select Material</option>
															@foreach($material as $material_val)
															<option value="{{$material_val->id}}" data-image="{{ asset('admin-assets/images/materials/'.$material_val->image) }}" {{!empty($room_cabinet_material) && $room_cabinet_material == $material_val->id ? 'selected' : ''}}  >{{$material_val->name}}</option>
															@endforeach
														</select>
														@error('room_cabinet_material') <span class="text-danger">{{ $message }}</span> @enderror
												</div>
											</div>
	  
											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Box Inner Laminate:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="room_box_inner_lam" id="room_box_inner_lam">
															<option value="">Select</option>
															@foreach($box_inner_laminate as $box_inner_laminate_val)
															<option value="{{$box_inner_laminate_val->id}}" data-image="{{ asset('admin-assets/images/cabinetcolors/'.$box_inner_laminate_val->image) }}" {{!empty($room_box_inner_lam) && $room_box_inner_lam == $box_inner_laminate_val->id ? 'selected' : ''}}>{{$box_inner_laminate_val->name}}</option>
														@endforeach
														</select>
														@error('room_box_inner_lam') <span class="text-danger">{{ $message }}</span> @enderror
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Shutter Material:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="room_shutter_material" id="room_shutter_material">
															<option value="">Select</option>
															@foreach($shutter_material as $shutter_material_val)
															<option value="{{$shutter_material_val->id}}" data-image="{{ asset('admin-assets/images/shuttermaterial/'.$shutter_material_val->image) }}" {{!empty($room_shutter_material) && $room_shutter_material == $shutter_material_val->id ? 'selected' : ''}}>{{$shutter_material_val->name}}</option>
														@endforeach
														</select>
														@error('room_shutter_material') <span class="text-danger">{{ $message }}</span> @enderror
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Shutter Finish:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="room_shutter_finish" id="room_shutter_finish">
															<option value="">Select</option>
															@foreach($shutter_finish as $shutter_finish_val)
															<option value="{{$shutter_finish_val->id}}" data-image="{{ asset('admin-assets/images/exposhuttercolors/'.$shutter_finish_val->image) }}" {{!empty($room_shutter_finish) && $room_shutter_finish == $shutter_finish_val->id ? 'selected' : ''}}>{{$shutter_finish_val->name}}</option>
														@endforeach
														</select>
														@error('room_shutter_finish') <span class="text-danger">{{ $message }}</span> @enderror
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Skt Type:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="room_skt_type" id="room_skt_type">
															<option value="">Select </option>
															<option value="100" {{!empty($room_skt_type) && $room_skt_type == 100 ? 'selected' : ''}}>PVC_Skt</option>
															<option value="200" {{!empty($room_skt_type) && $room_skt_type == 200 ? 'selected' : ''}}>Sold</option>
														</select>
														@error('room_skt_type') <span class="text-danger">{{ $message }}</span> @enderror
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Skt height:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="room_skt_height" id="room_skt_height">
															<option value="">Select</option>
															<option value="100" {{!empty($room_skt_height) && $room_skt_height == 100 ? 'selected' : ''}}>100</option>
															<option value="200" {{!empty($room_skt_height) && $room_skt_height == 200 ? 'selected' : ''}}>200</option>
														</select>
														@error('room_skt_height') <span class="text-danger">{{ $message }}</span> @enderror
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Handle Types:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="room_handeltype_val" id="room_handeltype_val">
															<option value="">Select</option>
															@foreach($handeltype as $handeltype_val)
															<option value="{{$handeltype_val->id}}" data-image="{{ asset('admin-assets/images/handletype/'.$handeltype_val->image) }}" {{!empty($room_handeltype_val) && $room_handeltype_val == $handeltype_val->id ? 'selected' : ''}}>{{$handeltype_val->name}}</option>
														@endforeach
														</select>
														@error('room_handeltype_val') <span class="text-danger">{{ $message }}</span> @enderror
												</div>
											</div>
										

											<hr>
											<button type="button" class="btn btn-danger" aria-label="Close" wire:click="return_view_order_form">Close</button>
											<button type="submit" class="btn btn-success pull-right" aria-label="Close">Submit</button>  
                                         </form>							
									</div>
								  </div>
								</div>
							   <!-- Latest Ads Panel End -->
							  </div>
							<!--End SubmitKitchen properties-->
							@endif  
							@if($this->customise_form)
							 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							   <!-- Brands Panel -->    
							   <div class="panel panel-default">
								  <!-- Heading -->
								  <div class="panel-heading border-bottom-seperator mb-20px" role="tab" id="headingTwo">
								  <div class="ad-info-1">
									<label>
										<h4 class="panel-title">{{$product_details->name ?? ''}}</h4>
									</label>
								  </div>
								  </div>
								  <!-- Content -->
							@php
								$lengthArr = [];							
								$breadthArr = [];							
								$deepArr = [];
								if($product_details->length!=0)							
								{
									if(strpos($product_details->length, ',') !== false)
									$lengthArr = explode(',',$product_details->length);
									else
									$lengthArr[] = $product_details->length;
								}
								
								if (strpos($product_details->breadth, ',') !== false)
								$breadthArr=explode(',',$product_details->breadth);
								else
									$breadthArr[] = $product_details->breadth;
								
								
								if (strpos($product_details->deep, ',') !== false)
									$deepArr = explode(',',$product_details->deep);
								else
									$deepArr[] = $product_details->deep;
								
								
								$roomdtls = App\Models\Temporderroomtype::where('id',$select_rooms_id)->first();
							@endphp							
							<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
									<div class="row">
										<div class="col-md-3 col-xs-3 col-sm-3">
											<img alt="" src="{{ isset($product_details->image) && $product_details->image!='' ? asset('admin-assets/images/product/'.$product_details->image) : asset('/images/noimage.png') }}" class="img-responsive image-margin">
										</div>
										<input type="hidden" value="{{!empty($customize_product_id) ? $customize_product_id : ''}}" wire:model="customize_product_id">
										<div class="col-md-9 col-xs-9 col-sm-9">
											<form>
												<div class="display-flex">
													<div class="width-85-percent">
														<div class="form-group row">
															<label class="inline-label-select col-sm-4">Width:</label>
															<div class="col-sm-8">
															@if($customizewidthSel)
																<select class="form-control" id="width" >
															    <option value="">Select</option>	@foreach($breadthArr as $val)
																	<option value="{{$val}}">{{$val}}</option>
																@endforeach	
																</select>
															@else
																<input type="text" class="form-control">
														    @endif
															</div>
														</div>
													</div>
													<div class="width-15-percent display-flex justify-content-center align-items-center">
														<input type="checkbox" id="toggle1" class="checkbox" wire:model="widthEnabled"/>
														<label for="toggle1" class="switch"></label>
													</div>
												</div>
												<div class="display-flex">
													<div class="width-85-percent">
														<div class="form-group row">
															<label class="inline-label-select col-sm-4">Length:</label>
															<div class="col-sm-8">
															@if($customizelengthSel)
																<select class="form-control" id="length">
																<option value="">Select</option>
																@foreach($lengthArr as $val)
																	<option value="{{$val}}">{{$val}}</option>
																@endforeach	
																</select>
																@else
																<input type="text" class="form-control">	
																@endif
															</div>
														</div>
													</div>
													<div class="width-15-percent display-flex justify-content-center align-items-center">
														<input type="checkbox" id="toggle2" class="checkbox" wire:model="lengthEnabled" />
														<label for="toggle2" class="switch"></label>
													</div>
												</div>
												<div class="display-flex">
													<div class="width-85-percent">
														<div class="form-group row">
															<label class="inline-label-select col-sm-4">Deep:</label>
															<div class="col-sm-8">
															@if($customizedeepSel)
																<select class="form-control" id="deep">
																<option value="">Select</option>
																  @foreach($deepArr as $val)
																	<option value="{{$val}}">{{$val}}</option>
																    @endforeach	
																</select>
															@else 
															<input type="text" class="form-control">
														    @endif
															</div>
														</div>
													</div>
													<div class="width-15-percent display-flex justify-content-center align-items-center">
														<input type="checkbox" id="toggle3" class="checkbox" wire:model="deepEnabled" />
														<label for="toggle3" class="switch"></label>
													</div>
												</div>
												<div class="display-flex">
													<div class="width-85-percent">
														<div class="form-group row">
															<label class="inline-label-select col-sm-4">QTY:</label>
															<div class="col-sm-8">
																<select class="form-control">
																	<option value="expired">(MR)_Ply</option>
																	<option value="sold">Sold</option>
																	<option value="active" selected></option>
																</select>
															</div>
														</div>
													</div>
													<div class="width-15-percent display-flex justify-content-center align-items-center">
														
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="panel-body">
										<form>
											<div class="form-group row">
												<label class="inline-label-select col-sm-5">Expo:</label>
												<div class="col-sm-7">
													<select class="form-control" id="expo_name">
														<option value="">Select</option>
														@foreach($exposide as $val)
															<option value="{{$val->id}}" data-image="{{ asset('admin-assets/images/exposide/'.$val->image) }}">{{$val->name}}</option>
														@endforeach
													</select>
												</div>
											</div>
												
											<div class="form-group row">
												<label class="inline-label-select col-sm-5">Expo Colour:</label>
												<div class="col-sm-7">
													<select class="form-control" id="expo_colour">
														<option value="">Select</option>
														@foreach($expocolour as $expocolour_val)
															<option value="{{$expocolour_val->id}}" data-image="{{ asset('admin-assets/images/exposhuttercolors/'.$expocolour_val->image) }}">{{$expocolour_val->name}}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">Cabinet Material:</label>
												<div class="col-sm-7">
													<select class="form-control" id="material">
														<option value="">Select</option>
														@foreach($material as $material_val)
															<option value="{{$material_val->id}}" data-image="{{ asset('admin-assets/images/materials/'.$material_val->image) }}" {{$roomdtls->cabinet_material==$material_val->id ? 'selected':''}}>{{$material_val->name}}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">Box Inner Laminate:</label>
												<div class="col-sm-7">
													<select class="form-control" id="box_inner_laminate_val">
														<option value="">Select</option>
														@foreach($box_inner_laminate as $box_inner_laminate_val)
															<option value="{{$box_inner_laminate_val->id}}" data-image="{{ asset('admin-assets/images/cabinetcolors/'.$box_inner_laminate_val->image) }}" {{$roomdtls->box_Inner_laminate==$box_inner_laminate_val->id ? 'selected':''}}>{{$box_inner_laminate_val->name}}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">Shutter Material:</label>
												<div class="col-sm-7">
													<select class="form-control" id="shutter_material">
														<option value="">Select</option>
														@foreach($shutter_material as $shutter_material_val)
															<option value="{{$shutter_material_val->id}}" data-image="{{ asset('admin-assets/images/shuttermaterial/'.$shutter_material_val->image) }}" {{$roomdtls->shutter_material==$shutter_material_val->id ? 'selected': ''}}>{{$shutter_material_val->name}}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">Shutter Finish:</label>
												<div class="col-sm-7">
													<select class="form-control" id="shutter_finish">
														<option value="">Select</option>
														@foreach($shutter_finish as $shutter_finish_val)
															<option value="{{$shutter_finish_val->id}}" data-image="{{ asset('admin-assets/images/exposhuttercolors/'.$shutter_finish_val->image) }}" {{$roomdtls->shutter_finish==$shutter_finish_val->id ? 'selected': ''}}>{{$shutter_finish_val->name}}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">Leg Type:</label>
												<div class="col-sm-7">
													<select class="form-control" id="legtype">
														<option value="">Select</option>
														@foreach($legtype as $legtype_val)
															<option value="{{$legtype_val->id}}" data-image="{{ asset('admin-assets/images/legtype/'.$legtype_val->image) }}">{{$legtype_val->name}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="address" class="col-sm-5 col-form-label">Skt height:</label>
												<div class="col-sm-7">
													<input id="address" class="form-control" placeholder="100" type="text" value="{{$roomdtls->skt_height ?  $roomdtls->skt_height: ''}}">
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">Handle Type:</label>
												<div class="col-sm-7">
													<select class="form-control" id="handeltype">
														<option value="">Select</option>
														@foreach($handeltype as $handeltype_val)
															<option value="{{$handeltype_val->id}}" data-image="{{ asset('admin-assets/images/handletype/'.$handeltype_val->image) }}" {{$roomdtls->handle_types==$handeltype_val->id ? 'selected': ''}}>{{$handeltype_val->name}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group row">
													<label for="address" class="col-sm-5 col-form-label">Address:</label>
													<div class="col-sm-7">
														<input id="address" class="form-control" placeholder="Address" type="text">
													</div>
												</div>

										</form>
										<hr>

										<button type="button" class="btn btn-danger" aria-label="Close" wire:click="return_room_property_form({{ $select_rooms_id }})">Close</button>
										<button type="button" class="btn btn-success pull-right" aria-label="Close">Submit</button>         
									</div>
									</div>
								</div>
							   <!-- Latest Ads Panel End -->
							</div>
							@endif  
						</div>
						 <!-- Sidebar Widgets End -->
					  <!-- Left Sidebar End -->
				</div> 
			</div>
        </div>
    </div>
	<input type="hidden" wire:model="edit_id" id="edit_id" value="{{$edit_id ?? ''}}">
	<!-- Modal -->
	{{--<div class="modal fade" id="roomDetailsModal" tabindex="-1" role="dialog" aria-labelledby="roomDetailsModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<!-- Modal content goes here -->
			</div>
		</div>
	</div>--}}
	<!-- Button trigger modal -->
	{{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>--}}


	
	<div class="modal fade" id="roomDetailsModal" tabindex="-1" role="dialog" aria-labelledby="roomDetailsModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="roomDetailsModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<!-- Brands Panel -->    
							   <div class="panel panel-default">
								  <!-- Heading -->
								  <div class="panel-heading" role="tab" id="headingTwo">
								  <div class="ad-info-1">
									<label>
										<h4 class="panel-title">Submit Kitchen properties</h4>
									</label>
								  </div>
								  </div>
								  <!-- Content -->
								  <?php 
								  //echo "<pre>";print_r($indivisual_room_data);
								  ?>
								  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
									 <div class="panel-body">
									 {{--<form id="kitchenOrderForm">--}}
										<form>
										<input type="hidden" wire:model="select_rooms">
											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Cabinet Material:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="modal_room_cabinet_material" id="modal_room_material">
															<option value="">Select Material</option>
															@foreach($material as $material_val)
															<option value="{{$material_val->id}}" data-image="{{ asset('admin-assets/images/materials/'.$material_val->image) }}" {{!empty($room_cabinet_material) && $room_cabinet_material == $material_val->id ? 'selected' : ''}}  >{{$material_val->name}}</option>
															@endforeach
														</select>
														<span id="error_modal_material"></span>
												</div>
											</div>
	  
											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Box Inner Laminate:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="modal_room_box_inner_lam" id="modal_room_box_inner_lam">
															<option value="">Select</option>
															@foreach($box_inner_laminate as $box_inner_laminate_val)
															<option value="{{$box_inner_laminate_val->id}}" data-image="{{ asset('admin-assets/images/cabinetcolors/'.$box_inner_laminate_val->image) }}" {{!empty($room_box_inner_lam) && $room_box_inner_lam == $box_inner_laminate_val->id ? 'selected' : ''}}>{{$box_inner_laminate_val->name}}</option>
														@endforeach
														</select>
														<span id="error_modal_box_inner"></span>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Shutter Material:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="modal_room_shutter_material" id="modal_room_shutter_material">
															<option value="">Select</option>
															@foreach($shutter_material as $shutter_material_val)
															<option value="{{$shutter_material_val->id}}" data-image="{{ asset('admin-assets/images/shuttermaterial/'.$shutter_material_val->image) }}" {{!empty($room_shutter_material) && $room_shutter_material == $shutter_material_val->id ? 'selected' : ''}}>{{$shutter_material_val->name}}</option>
														@endforeach
														</select>
														<span id="error_modal_shutter_material"></span>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Shutter Finish:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="modal_room_shutter_finish" id="modal_room_shutter_finish">
															<option value="">Select</option>
															@foreach($shutter_finish as $shutter_finish_val)
															<option value="{{$shutter_finish_val->id}}" data-image="{{ asset('admin-assets/images/exposhuttercolors/'.$shutter_finish_val->image) }}" {{!empty($room_shutter_finish) && $room_shutter_finish == $shutter_finish_val->id ? 'selected' : ''}}>{{$shutter_finish_val->name}}</option>
														@endforeach
														</select>
														<span id="error_modal_shutter_finish"></span>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Skt Type:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="modal_room_skt_type" id="modal_room_skt_type">
															<option value="">Select </option>
															<option value="100" {{!empty($room_skt_type) && $room_skt_type == 100 ? 'selected' : ''}}>PVC_Skt</option>
															<option value="200" {{!empty($room_skt_type) && $room_skt_type == 200 ? 'selected' : ''}}>Sold</option>
														</select>
														<span id="error_modal_skt_type"></span>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Skt height:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="modal_room_skt_height" id="modal_room_skt_height">
															<option value="">Select</option>
															<option value="100" {{!empty($room_skt_height) && $room_skt_height == 100 ? 'selected' : ''}}>100</option>
															<option value="200" {{!empty($room_skt_height) && $room_skt_height == 200 ? 'selected' : ''}}>200</option>
														</select>
														<span id="error_modal_skt_height"></span>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Handle Types:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status" wire:model="modal_room_handeltype_val" id="modal_room_handeltype_val">
															<option value="">Select</option>
															@foreach($handeltype as $handeltype_val)
															<option value="{{$handeltype_val->id}}" data-image="{{ asset('admin-assets/images/handletype/'.$handeltype_val->image) }}" {{!empty($room_handeltype_val) && $room_handeltype_val == $handeltype_val->id ? 'selected' : ''}}>{{$handeltype_val->name}}</option>
														@endforeach
														</select>
														<span id="error_modal_handle_type"></span>
												</div>
											</div>
										

											<hr>
											{{--<button type="button" class="btn btn-danger" aria-label="Close" wire:click="return_view_order_form">Close</button>--}}
											
											{{--<button type="button" class="btn btn-success pull-right" aria-label="Close" wire:click="submitModalKitchenOrderForm">Submit</button>--}}  
												<button type="submit" class="btn btn-success pull-right" aria-label="Close" id="submitKitchenOrderForm">Submit</button>  
                                         </form>							
									</div>
								  </div>
								</div>
							   <!-- Latest Ads Panel End -->
							  </div>
				</div>
				<div class="modal-footer d-flex justify-content-between">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
				   Are you sure want to delete this Room Name ?
				</div>
				<div class="modal-footer">
					<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="roomdelete">Delete</button>
					<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="cancelroom">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="confirmProjectDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
				   Are you sure want to delete this Project Name ?
				</div>
				<div class="modal-footer">
					<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="projectdelete">Delete</button>
					<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="projectcancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	@section('scripts')
	<script src="{{ url('js/neworder.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
	document.addEventListener('livewire:load', function () {
		 //alert('ok');
		 $('#toggle1').prop('checked', false);
		 $('#toggle2').prop('checked', false);
		 $('#toggle3').prop('checked', false);
		    initializeSelect2();
            $(document).on('change', '#modal_room_material', function (e) {
                var data = $(this).val();
                if (data != '') {
					@this.set('modal_room_cabinet_material', data, true);
                }
            });
			$(document).on('change', '#modal_room_box_inner_lam', function (e) {
                var data = $(this).val();
                if (data != '') {
					@this.set('modal_room_box_inner_lam', data, true);
                }
            });
			$(document).on('change', '#modal_room_shutter_material', function (e) {
                var data = $(this).val();
                if (data != '') {
					@this.set('modal_room_shutter_material', data, true);
                }
            });
			$(document).on('change', '#modal_room_shutter_finish', function (e) {
                var data = $(this).val();
                if (data != '') {
					@this.set('modal_room_shutter_finish', data, true);
                }
            });
			$(document).on('change', '#modal_room_skt_type', function (e) {
                var data = $(this).val();
                if (data != '') {
					@this.set('modal_room_skt_type', data, true);
                }
            });
			$(document).on('change', '#modal_room_skt_height', function (e) {
                var data = $(this).val();
                if (data != '') {
					@this.set('modal_room_skt_height', data, true);
                }
            });
			$(document).on('change', '#modal_room_handeltype_val', function (e) {
                var data = $(this).val();
                if (data != '') {
					@this.set('modal_room_handeltype_val', data, true);
                }
            });
			
			window.addEventListener('openRoomDetailsModal', function (event) {
				const data = event.detail.status;
				//alert(data);
				if (data == 'true') {
					$('#roomDetailsModal').modal('hide');
				} else if (data == 'false') {
					$('#roomDetailsModal').modal('show');
				}
			});
		});
	</script>
	@endsection
</div>
    
