@extends('admin.layouts.app', [
        'title'=> "User Invoice List"
    ])

@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-lg-6">
				<h1 class="h3 mb-3"><strong></strong>User Invoice List</h1>
			</div>
			<div class="col-lg-6 text-end">
			{{-- <a href="{{ route('admin.add-user') }}"><button type="button" class="btn btn-danger">Add New</button></a> --}}
				{{-- <div class="btn-group">
					<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item change_status" href="javascript:void(0)" data-id="1" data-url="{{url('admin/category/multi_change_status')}}">Active</a></li>
						<li><a class="dropdown-item change_status" href="javascript:void(0)" data-id="0" data-url="{{url('admin/admin/category/multi_change_status')}}">Inactive</a></li>
						<li><a class="dropdown-item" href="javascript:void(0)" id="delete_records" data-url="{{url('admin/category/multi_delete')}}">Delete</a></li>
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
				<div class="table-responsive categoryTable">
					<table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
						<thead>
							<tr class="cmsHead">
								{{-- <th>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="checkAll">
									</label>
								</th> --}}
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								{{-- <th>Password</th> --}}
								<th>Phone</th>
								<th class="text-center">Status</th>
								<th class="text-center">Options</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
</main>
@endsection