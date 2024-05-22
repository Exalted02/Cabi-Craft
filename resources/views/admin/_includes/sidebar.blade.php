<nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a style="font-size: 20px;text-transform: none;" class="sidebar-brand" id="logo" href="">
                    <img src="{{ url('images/logo.png') }}"width="200">
					<!-- {{ config('app.name', 'Laravel') }} -->
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Main Menu
                    </li>
                    <li class="sidebar-item {{ (request()->routeIs('admin.dashboard')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ (request()->routeIs('admin.course','admin.add-course','admin.update-course')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.course') }}">
                            {{-- <i class="align-middle" data-feather="align-justify"></i> --}}
                            <i class="fas fa-layer-group"></i>
                             <span class="align-middle">Course</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.cms','admin.add-cms','admin.cms-edit')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.cms') }}">
                            <i class="align-middle" data-feather="server"></i> <span class="align-middle">CMS</span>
                        </a>
                    </li>
					<li class="sidebar-item {{ (request()->routeIs('admin.email-management','admin.add-email-management','admin.email-management-edit')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.email-management') }}">
                            <i class="align-middle" data-feather="server"></i> <span class="align-middle">Email Management</span>
                        </a>
                    </li>
				</ul>
            </div>
        </nav>