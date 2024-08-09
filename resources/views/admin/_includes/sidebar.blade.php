<nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a style="font-size: 20px;text-transform: none;" class="sidebar-brand" id="logo" href="">
                    <!--<img src="{{ url('images/logo.png') }}"width="200">-->
					 {{ config('app.name', 'Laravel') }} 
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Main Menu
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.dashboard')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                            <i class="align-middle" data-feather="file-text"></i> 
                            <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.index')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.index') }}">
                            <i class="align-middle" data-feather="file-text"></i> 
                            {{-- <i class="align-middle" data-feather="sliders"></i>  --}}
                            <span class="align-middle">Add Invoice</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ (request()->routeIs('admin.order')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.order') }}">
                            <i class="align-middle" data-feather="file-text"></i> 
                            <span class="align-middle">Order</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.projecttype','admin.projecttype','admin.update-projecttype')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.projecttype') }}">
                            <i class="align-middle" data-feather="projecttype"></i> <span class="align-middle">Project Type</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.expo-shutter-color','admin.add-expo-shutter-color','admin.update-expo-shutter-color')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.expo-shutter-color') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Expo/Shutter Colour</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.products','admin.products','admin.update-products')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.products') }}">
                            <i class="align-middle" data-feather="products"></i> <span class="align-middle">Products</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.static','admin.static','admin.update-static')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.static') }}">
                            <i class="align-middle" data-feather="static"></i><span class="align-middle">Static</span>
                        </a>
                    </li>
					@if(Auth::guard('admin')->user()->role_id != 1)
					<li class="sidebar-item {{ (request()->routeIs('admin.account')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.account') }}">
                            <i class="align-middle" data-feather="file-text"></i> 
                            <span class="align-middle">Account</span>
                        </a>
                    </li>
					<div class=""><span class="white-text">Offer</span>
						<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-left:40px;margin-top:10px;height=100px;width:400px">
							<div class="carousel-inner">
								@foreach(couponCodeImages() as $key => $image)
									<div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
										<img src="{{ asset('admin-assets/images/couponcode/' . $image->image )}}" class="d-block w-50" alt="...">
									</div>
								@endforeach
							</div>
						</div>
					</div>
					@endif
					@if(Auth::guard('admin')->user()->role_id == 1)
					<li class="sidebar-item {{ (request()->routeIs('admin.category','admin.add-category','admin.update-category')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.category') }}">
                            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Category</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.subcategory','admin.add-subcategory','admin.update-subcategory')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.subcategory') }}">
                            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Sub Category</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.cabinettype','admin.add-cabinettype','admin.update-cabinettype')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.cabinettype') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Cabinet Type</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.material','admin.add-material','admin.update-material')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.material') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Material</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.cabinet','aadmin.add-cabinet','admin.update-cabinet')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.cabinet') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Cabinet Colour</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.exposide','admin.add-exposide','admin.update-exposide')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.exposide') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Expo Side</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.shutter-material','admin.add-shutter-material','admin.update-shutter-material')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.shutter-material') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Shutter Material</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.legtype','admin.legtype','admin.update-legtype')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.legtype') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Leg Type</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.handletype','admin.handletype','admin.update-handletype')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.handletype') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Handle Type</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ (request()->routeIs('admin.couponcode','admin.couponcode','admin.update-couponcode')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.couponcode') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Coupon Code</span>
                        </a>
                    </li>
                    <li class="sidebar-item sub_menu {{ (request()->routeIs('admin.materialply6mm','admin.materialply18mm','admin.shuttermaterialply18mm')) ? 'active' : '' }}">
                        <a class="sidebar-link {{ (request()->routeIs('admin.materialply6mm','admin.materialply18mm','admin.shuttermaterialply18mm')) ? '' : 'collapsed' }}" href="#collapseReport" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="align-middle" data-feather="share-2"></i> <span class="align-middle">Price</span>
                        </a>
						<ul class="submenu collapse {{ (request()->routeIs('admin.materialply6mm','admin.materialply18mm','admin.shuttermaterialply18mm')) ? 'show' : '' }}" id="collapseReport">
                            <li><a class="nav-link {{ (request()->routeIs('admin.materialply6mm')) ? 'active' : '' }}" href="{{ route('admin.materialply6mm') }}">Material Ply 6mm</a></li>
							<li><a class="nav-link {{ (request()->routeIs('admin.materialply18mm')) ? 'active' : '' }}" href="{{ route('admin.materialply18mm') }}">Material Ply 18mm</a></li>
							<li><a class="nav-link {{ (request()->routeIs('admin.shuttermaterialply18mm')) ? 'active' : '' }}" href="{{ route('admin.shuttermaterialply18mm') }}">Shutter Material Ply 18mm</a></li>
							<li><a class="nav-link {{ (request()->routeIs('admin.exposideprice')) ? 'active' : '' }}" href="{{ url('admin/exposideprice/add-exposideprice/1') }}">Exposide Price</a></li>
						</ul>
                    </li>
                    <li class="sidebar-item {{ (request()->routeIs('admin.user','admin.user','admin.update-user')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.user') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users Manage</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.staff')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.staff') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Our Staff</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ (request()->routeIs('admin.apikey')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ url('admin/apikey/add-apikey/1') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Appscript API Key</span>
                        </a>
                    </li>
				@endif
				
				@if(Auth::guard('admin')->user()->role_id == 1)
				<div class=""><span class="white-text">Offer</span>
					<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-left:40px;;margin-top:10px;height=100px;width:400px">
						<div class="carousel-inner">
							@foreach(couponCodeImages() as $key => $image)
								<div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
									<img src="{{ asset('admin-assets/images/couponcode/' . $image->image )}}" class="d-block w-50" alt="...">
								</div>
							@endforeach
						</div>
					</div>
				</div>
				@endif
				</ul>
            </div>
        </nav>