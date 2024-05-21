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
                    <li class="sidebar-item sub_menu {{ (request()->routeIs('admin.colleges.mou','admin.college.add-mou-college','admin.college.update-mou-college','admin.colleges.non-mou','admin.college.add-non-mou-college','admin.college.update-non-mou-college','admin.college.manage_college_images','admin.college.manage_college_courses','admin.college.manage_college_faculty')) ? 'active' : '' }}">
                        <a class="sidebar-link {{ (request()->routeIs('admin.colleges.mou','admin.college.add-mou-college','admin.college.update-mou-college','admin.colleges.non-mou','admin.college.add-non-mou-college','admin.college.update-non-mou-college','admin.college.manage_college_images','admin.college.manage_college_courses','admin.college.manage_college_faculty')) ? '' : 'collapsed' }}" href="#collapseReport" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Colleges</span>
                        </a>
						<ul class="submenu collapse {{ (request()->routeIs('admin.colleges.mou','admin.college.add-mou-college','admin.college.update-mou-college','admin.colleges.non-mou','admin.college.add-non-mou-college','admin.college.update-non-mou-college','admin.college.manage_college_images','admin.college.manage_college_courses','admin.college.manage_college_faculty')) ? 'show' : '' }}" id="collapseReport">
							<li><a class="nav-link {{ (request()->routeIs('admin.colleges.mou','admin.college.add-mou-college','admin.college.update-mou-college')) ? 'active' : '' }}" href="{{ route('admin.colleges.mou') }}">MoU Colleges</a></li>
							<li><a class="nav-link {{ (request()->routeIs('admin.colleges.non-mou','admin.college.add-non-mou-college','admin.college.update-non-mou-college')) ? 'active' : '' }}" href="{{ route('admin.colleges.non-mou') }}">Non MoU Colleges</a></li>
						</ul>
                    </li>
                    <li class="sidebar-item {{ (request()->routeIs('admin.agent','admin.add-agent','admin.update-agent')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.agent') }}">
                            {{-- <i class="align-middle" data-feather="align-justify"></i> --}}
                            <i class="fas fa-layer-group"></i>
                             <span class="align-middle">Agent</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ (request()->routeIs('admin.institutions','admin.add-institution','admin.update-institution')) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.institutions') }}">
                            {{-- <i class="align-middle" data-feather="align-justify"></i> --}}
                            <i class="fas fa-layer-group"></i>
                             <span class="align-middle">Institution</span>
                        </a>
                    </li>
				</ul>
            </div>
        </nav>