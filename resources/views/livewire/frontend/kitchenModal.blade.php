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
														@error('modal_room_cabinet_material') <span class="text-danger">{{ $message }}</span> @enderror
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
														@error('modal_room_box_inner_lam') <span class="text-danger">{{ $message }}</span> @enderror
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
														@error('modal_room_shutter_material') <span class="text-danger">{{ $message }}</span> @enderror
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
														@error('modal_room_shutter_finish') <span class="text-danger">{{ $message }}</span> @enderror
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
														@error('modal_room_skt_type') <span class="text-danger">{{ $message }}</span> @enderror
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
														@error('modal_room_skt_height') <span class="text-danger">{{ $message }}</span> @enderror
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
														@error('modal_room_handeltype_val') <span class="text-danger">{{ $message }}</span> @enderror
												</div>
											</div>
										

											<hr>
											{{--<button type="button" class="btn btn-danger" aria-label="Close" wire:click="return_view_order_form">Close</button>--}}
											<button type="button" class="btn btn-success pull-right" aria-label="Close" wire:click="submitModalKitchenOrderForm">Submit</button>  
                                         </form>							
									</div>
								  </div>
								</div>
							   <!-- Latest Ads Panel End -->
							  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>