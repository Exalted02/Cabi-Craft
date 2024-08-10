@section('styles')
<link href="{{ url('css/select2.css') }}" rel="stylesheet">
@endsection
<div class="submited-form">
    <div class="row">
		<div class="col-md-12 col-xs-12 col-sm-12">
			<div class="row">
				<div class="col-md-8">
					<form wire:submit.prevent="search">
						<div class="search-widget">
							<input placeholder="Search by Products" type="text" wire:model="search_product" name="search_product">
							<input type="hidden" value="{{$search_button}}" wire:model="search_button" name="search_button">
							@if($search_button)
								<button type="submit"><i class="fa fa-search"></i></button>
							@else
								<button type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
							@endif
							{{--<button type="button" wire:click="search"><i class="fa fa-search"></i></button>--}}
						</div>
					</form>
					<!-- Middle Content Box -->
					<div class="row grid-style-4">
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="new-order-body-scroll">
								<div class="posts-masonry1 row">
									@if(count($products) > 0)
									@foreach($products as $product)
									<div class="col-md-4 col-xs-12 col-sm-6">
										<div class="category-grid-box-1">
											<div class="images"> <img alt="" src="{{ asset('admin-assets/images/product/' .$product->image) }}" class="img-responsive">
											</div>
											<div class="short-description-1">
												<h3>
													<a title="" href="{{route('offerdetailpage')}}">{{$product->name}}</a>
												</h3>
												<p>{{ $product->size}}</p>
												<span class="ad-price">Rs.{{ $product->price}}</span> 
											</div>
											<div class="ad-info-1" style="display: flex; justify-content: center; align-items: center;">
												<button type="button" class="btn btn-danger">add to cart</button>
											</div>
										</div>
									</div>
									@endforeach
									@endif
								</div>
								<input type="hidden" value="$moreload" name="moreload" wire:model="moreload">
								{{--<input type="text" value="$remain" name="moreload" wire:model="moreload">--}}
								@if($remain>0 && $products->count()>0)
								<div class="row">
									<div class="col-lg-12 col-xl-12 col-sm-12 text-center">
									<a href="javascript:void(0);" wire:click="loadMore" class="btn-theme btn-lg btn">{{ __('Load More') }} <i class="fa fa-angle-right"></i></a>
									</div>
								</div>
								@endif
								@if($products->count()==0)
									<span style="color: red;" class="text-center"><h3>No Record Found</h3></span>
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
											<form id="bodyform">
												<div class="form-group row">
													<label for="project-name" class="col-sm-5 col-form-label no-wrap">Project Name:</label>
													<div class="col-sm-7">
														<input id="project-name" class="form-control" placeholder="Project name" type="text">
													</div>
												</div>
												
												<div class="form-group row">
													<label for="address" class="col-sm-5 col-form-label">Address:</label>
													<div class="col-sm-7">
														<input id="address" class="form-control" placeholder="Address" type="text">
													</div>
												</div>

												<div class="form-group row">
													<label for="city" class="col-sm-5 col-form-label">City:</label>
													<div class="col-sm-7">
														<input id="city" class="form-control" placeholder="City" type="text">
													</div>
												</div>

												<div class="form-group row">
													<label for="zip-code" class="col-sm-5 col-form-label">Zip Code:</label>
													<div class="col-sm-7">
														<input id="zip-code" class="form-control" placeholder="Zip Code" type="text">
													</div>
												</div>

												<div class="form-group row">
													<label for="state" class="col-sm-5 col-form-label">State:</label>
													<div class="col-sm-7">
														<input id="state" class="form-control" placeholder="State" type="text">
													</div>
												</div>

												<div class="form-group row">
													<label for="country" class="col-sm-5 col-form-label">Country:</label>
													<div class="col-sm-7">
														<input id="country" class="form-control" placeholder="Country" type="text">
													</div>
												</div>

												<div class="form-group row">
													<label for="mobile" class="col-sm-5 col-form-label">Mobile:</label>
													<div class="col-sm-7">
														<input id="mobile" class="form-control" placeholder="Mobile #" type="text">
													</div>
												</div>

												<div class="form-group row">
												<label class="inline-label-select col-sm-5">Project Type:</label>
												<div class="col-sm-7">
													<select class="form-control">
														<option value="">Select</option>
														@foreach($projecttype as $projecttype_val)
															<option value="{{$projecttype_val->id}}">{{$projecttype_val->name}}</option>
														@endforeach
													</select>
												</div>
											</div>
												<hr>
												
												<div class="form-group row align-items-center">
													<label for="project-type" class="col-sm-4 col-form-label">Room Name:</label>
													<div class="col-sm-6">
														<input id="project-type" class="form-control" placeholder="Room Name" type="text">
													</div>
													<div class="col-sm-2">
													<i class="fa fa-plus-square" style="color: green;"></i>
													</div>
												</div>
												<div class="row">
													<div class="col-md-5">
														<ol>
															<li>Kitchen</li>
															<li>Foyer</li>
															<li>Crockery</li>
															<li>Pooja unit</li>
															<li>T.v unit</li>
														</ol>
													</div>
													<div class="col-md-7">
														<ol>
															<li>Master bedroom</li>
															<li>Guest bedroom</li>
															<li>Kids bedroom</li>
															<li>Utility</li>
															<li>PBR</li>
														</ol>
													</div>
												</div>
											</form>
											
											<hr>
											<button type="button" class="btn btn-danger" aria-label="Close">Close</button>
											<button type="button" class="btn btn-success pull-right" aria-label="Close" wire:click="submit_new_order_form">Submit</button>         
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
												<h4 class="panel-title">Mr.Robin_2BKH</h4>
											</label>
											<ul class="pull-right ">
												<li><a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Ad" href="javascript:void(0);" wire:click="edit_new_order_form"><i class="fa fa-pencil edit"></i></a> </li>
												<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times delete"></i></a></li>
											</ul>
										</div>
								  </div>
								  <!-- Content -->
								  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
											
												<!-- Ad Status -->
												<div class="form-group row align-items-center">
													<div class="col-sm-5">
														<select class="form-control ad-post-status col-sm-4">
															<option value="expired">Expired</option>
															<option value="sold">Sold</option>
															<option value="active" selected=""></option>
														</select>
													</div>
													
													<div class="col-sm-4">
														<h5 class="mr-2 mb-0">Rs.9,900</h5> 
													</div>
													<div class="col-sm-3">
														<ul class="list-inline mb-0 ml-auto text-right">
															<li class="list-inline-item dropdown">
																<a href="javascript:void(0)" wire:click="open_kitchen_properties_form">
																	<i class="fa fa-ellipsis-v"></i>
																</a>
															</li>
															<li class="list-inline-item">
																<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete">
																	<i class="fa fa-times delete"></i>
																</a>
															</li>
														</ul>
													</div>
												</div>
										
											  <hr>
											
													<div class="row">
														<div class="col-md-6 col-xs-6 col-sm-6">
																	<p>1 .Basic cabinet, 2ss <br>
																	(2L plane Baskets)<br>
																	720H * 600W * 560D</p>
														</div>
														
														<div class="col-md-6 col-xs-6 col-sm-6">
															<span class="label label-warning" wire:click="open_customise_form">Customize <ul class="pull-right ">
																<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times delete"></i></a></li>
															</ul></span>
															<h5>Rs.3,500.00</h5>
															
														</div>
													</div>
													<div class="row">
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
													</div>
												
											
													<div class="row">
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
													</div>

											<hr>
											<button type="button" class="btn btn-danger" aria-label="Close">Close order</button>
											<a href="{{ route('cartpage') }}" target="_blank"><button type="button" class="btn btn-success pull-right " aria-label="Close">view cart</button></a>         
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
								  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
										<form>
											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Cabinet Material:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status">
															<option value="(MR)_Ply">(MR)_Ply</option>
															<option value="sold">Sold</option>
															<option value="active" selected></option>
														</select>
												</div>
											</div>
	  
											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Box Inner Laminate:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status">
															<option value="expired">Half White</option>
															<option value="sold">Sold</option>
															<option value="active" selected></option>
														</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Shutter Material:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status">
															<option value="expired">HDHMR</option>
															<option value="sold">Sold</option>
															<option value="active" selected></option>
														</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Shutter Finish:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status">
															<option value="expired">21091_HGL</option>
															<option value="sold">Sold</option>
															<option value="active" selected></option>
														</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Skt Type:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status">
															<option value="expired">PVC_Skt</option>
															<option value="sold">Sold</option>
															<option value="active" selected></option>
														</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Skt height:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status">
															<option value="expired">100 mm</option>
															<option value="sold">Sold</option>
															<option value="active" selected></option>
														</select>
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">
												Handle Types:</label>
												<div class="col-sm-7">
														<select class="form-control ad-post-status">
															<option value="expired">Gola profile Handles</option>
															<option value="sold">Sold</option>
															<option value="active" selected></option>
														</select>
												</div>
											</div>
										</form>

											<hr>
											<button type="button" class="btn btn-danger" aria-label="Close" wire:click="return_view_order_form">Close</button>
											<button type="button" class="btn btn-success pull-right" aria-label="Close">Submit</button>         
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
										<h4 class="panel-title">Base Cabinet, 2 SS Drawers (2L Plain Baskets)</h4>
									</label>
								  </div>
								  </div>
								  <!-- Content -->
									
							<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
									<div class="row">
											
											<div class="col-md-3 col-xs-3 col-sm-3">
											<img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive image-margin">
											</div>
											<div class="col-md-6 col-xs-6 col-sm-6">
												<form>
												<div class="form-group row">
													<label class="inline-label-select col-sm-4">
													Width:</label>
													<div class="col-sm-8">
															<select class="form-control ad-post-status">
																<option value="expired">(MR)_Ply</option>
																<option value="sold">Sold</option>
																<option value="active" selected></option>
															</select>
													</div>
												</div>
																
												<div class="form-group row">
													<label class="inline-label-select col-sm-4">
													Length:</label>
													<div class="col-sm-8">
															<select class="form-control ad-post-status">
																<option value="expired">(MR)_Ply</option>
																<option value="sold">Sold</option>
																<option value="active" selected></option>
															</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="inline-label-select col-sm-4">
													Deep:</label>
													<div class="col-sm-8">
															<select class="form-control ad-post-status">
																<option value="expired">(MR)_Ply</option>
																<option value="sold">Sold</option>
																<option value="active" selected></option>
															</select>
													</div>
												</div>  
												<div class="form-group row">
													<label class="inline-label-select col-sm-4">
													QTY:</label>
													<div class="col-sm-8">
															<select class="form-control ad-post-status">
																<option value="expired">(MR)_Ply</option>
																<option value="sold">Sold</option>
																<option value="active" selected></option>
															</select>
													</div>
												</div>  
												</form>

											</div>
											<div class="col-md-3 col-xs-3 col-sm-3">
											 <input type="checkbox" id="toggle1" class="checkbox" />
											 <label for="toggle1" class="switch"></label>
											 <input type="checkbox" id="toggle2" class="checkbox" />
											 <label for="toggle2" class="switch"></label>
											 <input type="checkbox" id="toggle3" class="checkbox" />
											 <label for="toggle3" class="switch"></label>
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
															<option value="{{$material_val->id}}" data-image="{{ asset('admin-assets/images/materials/'.$material_val->image) }}">{{$material_val->name}}</option>
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
															<option value="{{$box_inner_laminate_val->id}}" data-image="{{ asset('admin-assets/images/cabinetcolors/'.$box_inner_laminate_val->image) }}">{{$box_inner_laminate_val->name}}</option>
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
															<option value="{{$shutter_material_val->id}}" data-image="{{ asset('admin-assets/images/shuttermaterial/'.$shutter_material_val->image) }}">{{$shutter_material_val->name}}</option>
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
															<option value="{{$shutter_finish_val->id}}" data-image="{{ asset('admin-assets/images/exposhuttercolors/'.$shutter_finish_val->image) }}">{{$shutter_finish_val->name}}</option>
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
													<input id="address" class="form-control" placeholder="100" type="text">
												</div>
											</div>

											<div class="form-group row">
												<label class="inline-label-select col-sm-5">Handle Type:</label>
												<div class="col-sm-7">
													<select class="form-control" id="handeltype">
														<option value="">Select</option>
														@foreach($handeltype as $handeltype_val)
															<option value="{{$handeltype_val->id}}" data-image="{{ asset('admin-assets/images/handletype/'.$handeltype_val->image) }}">{{$handeltype_val->name}}</option>
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

										<button type="button" class="btn btn-danger" aria-label="Close" wire:click="return_view_order_form">Close</button>
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
	@section('scripts')
	<script src="{{ url('js/neworder.js') }}"></script>
	@endsection
</div>
    
