@extends('admin.layouts.app')

@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-lg-6">
				<h1 class="h3 mb-3"><strong>Email Message </strong> Management</h1>
			</div>
			<div class="col-lg-6 text-end">
				<a href="{{ route('admin.add-email-management') }}"><button type="button" class="btn btn-danger">Add New</button></a>
				<div class="btn-group">
					<button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item change_status" href="javascript:void(0)" data-id="1" data-url="{{url('admin/email-management/multi_change_status')}}">Active</a></li>
						<li><a class="dropdown-item change_status" href="javascript:void(0)" data-id="0" data-url="{{url('admin/email-management/multi_change_status')}}">Inactive</a></li>
						{{-- <li><a class="dropdown-item" href="javascript:void(0)" id="delete_records" data-url="{{url('admin/email-management/multi_delete')}}">Delete</a></li> --}}
					</ul>
				</div>
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
								<th>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="checkAll">
									</label>
								</th>
								<th>Message Subject</th>
								<th class="text-center">Status</th>
								<th class="text-center">Options</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $list)
							<tr class="cmsBody">
								<td>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="chk_id" data-emp-id="{{$list->id}}">
									</label>
								</td>
								<td>{{$list->message_subject}}</td>
								<td class="text-center">
									<label class="switch">
										<input type="checkbox" class="changeStatus" data-id="{{$list->id}}" data-url="{{url('admin/email-management/status')}}" {{$list->status==1 ? 'checked' : ''}}>
										<span class="slider round"></span>
									</label>
								</td>
								<td class="optionsDetails text-center">
									<a class="viewMode view-data" href="javascript:void(0)" data-id="{{$list->id}}" data-url="{{url('admin/email-management/view_email_management')}}"><i class="align-middle me-2" data-feather="eye" data-toggle="tooltip" title="View" data-bs-toggle="modal" data-bs-target="#viewDetails"></i><span class="align-middle"></span></a>
									
									{{-- <a class="deleteMode delete-data" href="javascript:void(0)" data-id="{{$list->id}}" data-url="{{url('admin/email-management/delete')}}"><i class="align-middle me-2" data-feather="trash-2" data-toggle="tooltip" title="Delete"></i><span class="align-middle"></span></a> --}}
									
									<a class="editMode txtLink" href="{{url('admin/email-management/email-management-edit/')}}/{{$list->id}}" data-toggle="tooltip" title="Edit"><i class="align-middle me-2" data-feather="edit" data-toggle="tooltip" title="Edit"></i></a>
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