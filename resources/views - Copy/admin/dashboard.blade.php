@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" />
<style type="text/css">
	.datepicker {
		font-size: 0.875em;
	}
	.datepicker td, .datepicker th {
		width: 2em;
		height: 2em;
		padding: 5px;
	}
</style>

<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
		<div class="row">
			<div class="col-xl-12 col-xxl-12 d-flex">
				<div class="w-100">
					<div class="row">
						<div class="col-sm-3">
							<a href="javascript:void(0);" class="card text-decoration-none">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Counter 1</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="users"></i>
											</div>
										</div>
									</div>
									<h4 class="mt-1 mb-3">01</h4>
								</div>
							</a>
						</div>
						<div class="col-sm-3">    
							<a href="javascript:void(0);" class="card text-decoration-none">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Counter 2</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="shopping-bag"></i>
											</div>
										</div>
									</div>
									<h4 class="mt-1 mb-3">02</h4>
									
								</div>
							</a>
						</div>
						<div class="col-sm-3">
							<a href="javascript:void(0);" class="card text-decoration-none">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Counter 3</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="trending-down"></i>
											</div>
										</div>
									</div>
									<h4 class="mt-1 mb-3">03</h4>
									
								</div>
							</a>
						</div>
						<div class="col-sm-3">      
							<a href="javascript:void(0);" class="card text-decoration-none">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Counter 4</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="trending-up"></i>
											</div>
										</div>
									</div>
									<h4 class="mt-1 mb-3">04</h4>									
								</div>
							</a>
						</div>
					</div>						
				</div>
			</div>
		</div>
	</div>
</main>
@endsection

@section('scripts')
{{--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}    
@endsection