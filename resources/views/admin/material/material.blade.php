@extends('admin.layouts.app', [
        'title'=> "Material Management"
    ])

@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-lg-6">
				<h1 class="h3 mb-3"><strong></strong>Product Material Management</h1>
			</div>
			<div class="col-lg-6 text-end">
				<a href="{{ route('admin.add-material') }}"><button type="button" class="btn btn-danger">Add New</button></a>
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
				<div class="table-responsive categoryTable">
					<table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
						<thead>
							<tr class="cmsHead">
								{{-- <th>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="checkAll">
									</label>
								</th> --}}
								<th>Category Name</th>
								<th>Image</th>
								<th class="text-center">Status</th>
								<th class="text-center">Options</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $list)
							<tr class="cmsBody">
								{{-- <td>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="chk_id" data-emp-id="{{$list->id}}">
									</label>
								</td> --}}
								<td>{{$list->name}}</td>
								<td><img src="{{ asset('admin-assets/images/materials/' .$list->image) }}" width="50" height="50"></td>
								<td class="text-center">
									<label class="switch">
										<input type="checkbox" class="changeStatus" data-id="{{$list->id}}" data-url="{{url('admin/material/status')}}" {{$list->status==1 ? 'checked' : ''}}>
										<span class="slider round"></span>
									</label>
								</td>
								<td class="optionsDetails text-center">
									
									<a class="deleteMode delete-data" href="javascript:void(0)" data-id="{{$list->id}}" data-url="{{url('admin/material/delete')}}"><i class="align-middle me-2" data-feather="trash-2" data-toggle="tooltip" title="Delete"></i><span class="align-middle"></span></a>
									
									<a class="editMode txtLink" href="{{url('admin/material/update-material/')}}/{{$list->id}}" data-toggle="tooltip" title="Edit"><svg style="width:17px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
									
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
@endsection