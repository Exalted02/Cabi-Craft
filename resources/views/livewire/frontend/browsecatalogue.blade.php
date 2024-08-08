
    <div class="submited-form">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="row">
            <div class="col-md-12">
                <div class="search-widget">
					<form wire:submit.prevent="search">
                    <input placeholder="Search by Products" type="text" wire:model="search_product" name="search_product">
					@if($search_button)
						<button type="submit"><i class="fa fa-search"></i></button>
					@else
						<button type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
				    @endif
					</form>
                </div>
                <!-- Middle Content Box -->
				<div class="row grid-style-4">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="new-order-body-scroll">
						<div class="posts-masonry1 row">
						@foreach($products as $product)
							<div class="col-md-3 col-xs-12 col-sm-6">
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
						
						<input type="hidden" value="$moreload" name="moreload" wire:model="moreload">
							@if($remain>0)
							<div class="row">
								<div class="col-lg-12 col-xl-12 col-sm-12 text-center">
								<a href="javascript:void(0);" wire:click="loadMore" class="btn-theme btn-lg btn">{{ __('Load More') }} <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
							@endif
						</div>
						</div>
					</div>
				</div>
                <!-- Middle Content Box End -->
            </div>
             
        </div>
        </div>
    </div>
    </div>
    
