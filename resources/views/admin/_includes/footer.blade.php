<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a class="text-muted" href="#" target="_blank"><strong><?php echo date('Y')?> {{ config('app.name', 'Laravel') }}</strong></a>
                    &copy;
                </p>
            </div>
            {{-- <div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Help Center</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#" target="_blank">Terms</a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	@if (request()->routeIs('admin.staff','admin.couponcode','admin.order','admin.user','admin.category','admin.subcategory','admin.cabinettype','admin.material','admin.cabinet','admin.shutter-material','admin.exposide','admin.legtype','admin.handletype','admin.materialply6mm','admin.materialply18mm','admin.shuttermaterialply18mm','admin.exposideprice','admin.stock-management','admin.expense-type','admin.expanse-tracker','admin.customer-list','admin.payment-mode','admin.bill-generate'))

	<!--Data table plugin start-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.17.2/ckeditor.js" integrity="sha512-QuHtmTNLFyCbmk2jGlr0URK0XiNn1G0nHYMaNfbOLQgXBiO6RllC+xFkPO5YnG6zYnRVUj6b5uSXwmJeJgOLBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
	
	<script>
		$(document).ready(function(){
			$('#example').DataTable( {
				"bDestroy": true,
				columnDefs: [
					{ orderable: false, targets: [0, -1, -2] }
				],
				order: [[1, 'asc']]
			});
		});
	</script>
	<!--Data table plugin end-->
	@endif
<!--Delete modal start-->
	@if (request()->routeIs('admin.staff','admin.couponcode','admin.order','admin.category','admin.subcategory','admin.cabinettype','admin.material', 'admin.cabinet', 'admin.stock-management','admin.expanse-tracker','admin.customer-list'))
	<!--Single Delete modal start-->
	<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
				   Are you sure want to delete this record?
				</div>
				<div class="modal-footer">
					<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
					<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script>
	$(".delete-data").on('click', function (e) {
		$('#confirmDelete').modal("show");
		var id = $(this).data('id');
		var url = $(this).data('url');
		e.preventDefault();
		$('#confirmDelete').on('click', '#delete', function(e) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				 }
			});
			$.ajax({
				url: url,
				method: "POST",
				data: {id:id},
				dataType: 'json',
				success: function(response) {
					location.reload(true);
				}
			});
		});
	});
	</script>
	<!--Single Delete modal end-->
	@endif
	<!--confirm checkbox selected-->
	@if (request()->routeIs('admin.staff','admin.couponcode','admin.order','admin.category','admin.subcategory','admin.cabinettype','admin.material', 'admin.cabinet'))
	<div class="modal fade" id="confirmChkSelect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body"><strong>Please check checkbox.</strong></div>
				<div class="modal-footer">
				<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">OK</button>
				</div>
			</div>
		</div>
	</div>
	@endif
	<!--Multiple Delete modal start-->
	@if (request()->routeIs('admin.staff','admin.order','admin.category', 'admin.subcategory','admin.cabinettype', 'admin.material', 'admin.material'))
	<div class="modal fade" id="confirmMultiDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<input type="hidden" id="hiddenId">
		<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
		<button type="button"  data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$('#delete_records').on('click', function(e) { 
		// alert(1);
		var url = $(this).data('url');
		var records = [];  
		$(".table input[name=chk_id]:checked").each(function() {  
			records.push($(this).data('emp-id'));
		});	
		if(records.length <=0)  {  
			$('#confirmChkSelect').modal("show");
		}else {
			$('#confirmMultiDelete').modal("show");	
			WRN_CAT_DELETE = "Are you sure you want to delete "+(records.length>1?"these":"this")+" row?";
			$("#confirmMultiDelete").find(".modal-body").text(WRN_CAT_DELETE);
			$('#confirmMultiDelete').on('click', '#delete', function(e) {	
				var selected_values = records.join(",");
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					 }
				});
				$.ajax({
					url: url,
					method: "POST",
					data: {id:selected_values},
					dataType: 'json',
					success: function(response) {
						location.reload(true);
					}
				});
			});		
		} 
	});
	</script>
	@endif
	<!--Multiple Delete modal end-->
<!--Delete modal end-->
<!--Status change modal start-->

@if (request()->routeIs('admin.staff','admin.couponcode','admin.order','admin.user','admin.category','admin.subcategory','admin.cabinettype','admin.material','admin.cabinet','admin.exposide','admin.shutter-material','admin.legtype','admin.handletype','admin.expanse-tracker','admin.customer-list','admin.materialply6mm','admin.materialply18mm','admin.shuttermaterialply18mm'))
<!--Single status modal start-->
<script>
$(".changeStatus").on('click', function (e) {
	//console.log('hello');
	var id = $(this).data('id');
	var url = $(this).data('url');
	var val = $(this).prop('checked') == true ? 1 : 0;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: url,
		method: "POST",
		data: {id:id,val:val},
		dataType: 'json',
		success: function(response) {
			//location.reload(true);
			$('#message').html('<div class="alert alert-success alert-dismissible fade show"><strong>'+response.success+'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button></div>');
		}
	});
});
</script>
<!--Single status modal end-->
@endif

@if(request()->routeIs('admin.staff','admin.couponcode','admin.order','admin.user','admin.category','admin.subcategory','admin.cabinettype','admin.material','admin.exposide','admin.shutter-material','admin.legtype','admin.handletype','admin.cabinet','admin.materialply6mm','admin.materialply18mm','admin.shuttermaterialply18mm'))
	<div class="modal fade" id="confirmMultiStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<input type="hidden" id="hiddenId">
		<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="change">Submit</button>
		<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$('.change_status').on('click', function(e) { 
		var status = $(this).data('id');
		var url = $(this).data('url');
		var employee = [];  
		$(".table input[name=chk_id]:checked").each(function() {  
			employee.push($(this).data('emp-id'));
		});	
		if(employee.length <=0)  {  
			$('#confirmChkSelect').modal("show");	
		}else {
			$('#confirmMultiStatus').modal("show");	
			WRN_PROFILE_DELETE = "Are you sure you want to "+(status==1?"active":"inactive")+" "+(employee.length>1?"these":"this")+" row?";
			$("#confirmMultiStatus").find(".modal-body").text(WRN_PROFILE_DELETE);
			$('#confirmMultiStatus').on('click', '#change', function(e) {	
					var selected_values = employee.join(",");
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						 }
					});
					$.ajax({
						url: url,
						method: "POST",
						data: {id:selected_values,status:status},
						dataType: 'json',
						success: function(response) {
							location.reload(true);
						}
					});
				
			});		
		}
	});
	</script>
	@endif
<!--Status change modal end-->
	@if(request()->routeIs('admin.staff','admin.couponcode','admin.order','admin.user','admin.category','admin.subcategory','admin.cabinettype','admin.material','admin.cabinet','admin.shutter-material','admin.legtype','admin.handletype','admin.exposide','admin.materialply6mm','admin.materialply18mm','admin.shuttermaterialply18mm'))

	<!--View modal image click start-->
	<script>
		function showImg(path)
		{
		   $("#imgSrc").attr('src', path);
		   $('.imgShow').show();
		}
		function hideImg()
		{
		   $("#imgSrc").attr('src', '');
		   $('.imgShow').hide();
		}
	</script>
	<!--View modal image click end-->
	@endif
	<script>
		$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		$('.table').each(function() {
			return $(".table #checkAll").click(function() {
				if ($(".table #checkAll").is(":checked")) {
					return $(".table input[name=chk_id]").each(function() {
						return $(this).prop("checked", true);
					});
				} else {
					return $(".table input[name=chk_id]").each(function() {
						return $(this).prop("checked", false);
					});
				}
			});
		});
		$(".table input[name=chk_id]").click(function() {
			$(".table #checkAll").prop("checked", false);
		});
		});
	</script>
	<script>
$(document).on('click', '.sidebar-link', function () {
	$(".simplebar-content-wrapper").css('overflow', 'scroll');
	$(".simplebar-scrollbar").css({'display':'block', 'height':$(".simplebar-placeholder").height()});
	$(".simplebar-vertical").css('visibility', 'visible');
});

/*$("#selcatname").change(function(){
	var categoryId = $("#selcatname").val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		 }
	});
	$.ajax({
		url: "{{ route('admin.subcategory') }}",
		method: "POST",
		data: {id:categoryId},
		dataType: 'json',
		success: function(response) {
			//alert(response);
			//location.reload(true);
		}
	});
});*/
</script>



<!--confirm checkbox selected-->

@if(request()->routeIs('admin.stock-management','admin.customer-list','admin.payment-mode','admin.expanse-tracker','admin.expense-type','admin.bill-generate'))

	<div class="modal fade" id="confirmChkSelect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body"><strong>Please check checkbox.</strong></div>
				<div class="modal-footer">
				<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">OK</button>
				</div>
			</div>
		</div>
	</div>
	@endif
<!--Multiple Delete stock-management modal start-->

	@if (request()->routeIs('admin.stock-management','admin.customer-list','admin.payment-mode','admin.expense-type','admin.expanse-tracker','admin.bill-generate'))

	<div class="modal fade" id="confirmMultiDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<input type="hidden" id="hiddenId">
		<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
		<button type="button"  data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$('#delete_records').on('click', function(e) { 
		var url = $(this).data('url');
		var records = [];  
		$(".table input[name=chk_id]:checked").each(function() {  
			records.push($(this).data('emp-id'));
		});	
		if(records.length <=0)  {  
			$('#confirmChkSelect').modal("show");
		}else {
			$('#confirmMultiDelete').modal("show");	
			WRN_CAT_DELETE = "Are you sure you want to delete "+(records.length>1?"these":"this")+" row?";
			$("#confirmMultiDelete").find(".modal-body").text(WRN_CAT_DELETE);
			$('#confirmMultiDelete').on('click', '#delete', function(e) {	
				var selected_values = records.join(",");
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					 }
				});
				$.ajax({
					url: url,
					method: "POST",
					data: {id:selected_values},
					dataType: 'json',
					success: function(response) {
						location.reload(true);
					}
				});
			});		
		} 
	});
	</script>
	@endif
	<!--Multiple Delete stock-management modal end-->

@if(request()->routeIs('admin.stock-management','admin.customer-list','admin.payment-mode','admin.expense-type','admin.expanse-tracker','admin.bill-generate'))

<!--Single status modal start-->
<script>
$(".changeStatus").on('click', function (e) {
	//console.log('hello');
	var id = $(this).data('id');
	var url = $(this).data('url');
	var val = $(this).prop('checked') == true ? 1 : 0;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: url,
		method: "POST",
		data: {id:id,val:val},
		dataType: 'json',
		success: function(response) {
			//location.reload(true);
			$('#message').html('<div class="alert alert-success alert-dismissible fade show"><strong>'+response.success+'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button></div>');
		}
	});
});
</script>
@endif
<!------ multiple status start--->

@if(request()->routeIs('admin.stock-management','admin.customer-list','admin.payment-mode','admin.expense-type','admin.expanse-tracker','admin.bill-generate'))

	<div class="modal fade" id="confirmMultiStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<input type="hidden" id="hiddenId">
		<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="change">Submit</button>
		<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$('.change_status').on('click', function(e) { 
		var status = $(this).data('id');
		//alert(status);
		var url = $(this).data('url');
		var employee = [];  
		$(".table input[name=chk_id]:checked").each(function() {  
			employee.push($(this).data('emp-id'));
		});	
		if(employee.length <=0)  {  
			$('#confirmChkSelect').modal("show");	
		}else {
			$('#confirmMultiStatus').modal("show");	
			WRN_PROFILE_DELETE = "Are you sure you want to "+(status==1?"active":"inactive")+" "+(employee.length>1?"these":"this")+" row?";
			$("#confirmMultiStatus").find(".modal-body").text(WRN_PROFILE_DELETE);
			$('#confirmMultiStatus').on('click', '#change', function(e) {	
					var selected_values = employee.join(",");
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						 }
					});
					$.ajax({
						url: url,
						method: "POST",
						data: {id:selected_values,status:status},
						dataType: 'json',
						success: function(response) {
							location.reload(true);
						}
					});
				
			});		
		}
	});
	</script>
	@endif



<!--Delete customer Bill modal start-->


@if(request()->routeIs('admin.staff','admin.couponcode','admin.order','admin.user','admin.category','admin.subcategory','admin.cabinettype','admin.material','admin.cabinet','admin.exposide','admin.legtype','admin.handletype','admin.shutter-material','admin.materialply6mm','admin.materialply18mm','admin.shuttermaterialply18mm','admin.customer-bill','admin.customer-list','admin.payment-mode','admin.expense-type','admin.expanse-tracker','admin.bill-generate'))


	<!--Single Delete modal start-->
	<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
				   Are you sure want to delete this record?
				</div>
				<div class="modal-footer">
					<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
					<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script>
	$(".delete-data").on('click', function (e) {
		$('#confirmDelete').modal("show");
		var id = $(this).data('id');
		var url = $(this).data('url');
		e.preventDefault();
		$('#confirmDelete').on('click', '#delete', function(e) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				 }
			});
			$.ajax({
				url: url,
				method: "POST",
				data: {id:id},
				dataType: 'json',
				success: function(response) {
					location.reload(true);
				}
			});
		});
	});
	</script>
	<!--Single Delete modal end-->
	@endif
		<!--confirm checkbox selected-->
	@if (request()->routeIs('admin.customer-bill'))
	<div class="modal fade" id="confirmChkSelect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body"><strong>Please check checkbox.</strong></div>
				<div class="modal-footer">
				<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">OK</button>
				</div>
			</div>
		</div>
	</div>
	@endif
	<!--Multiple Delete customer bill modal start-->
	@if (request()->routeIs('admin.customer-bill'))
	<div class="modal fade" id="confirmMultiDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<input type="hidden" id="hiddenId">
		<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
		<button type="button"  data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$('#delete_records').on('click', function(e) { 
		 alert(1);
		var url = $(this).data('url');
		var records = [];  
		$(".table input[name=chk_id]:checked").each(function() {  
			records.push($(this).data('emp-id'));
		});	
		if(records.length <=0)  {  
			$('#confirmChkSelect').modal("show");
		}else {
			$('#confirmMultiDelete').modal("show");	
			WRN_CAT_DELETE = "Are you sure you want to delete "+(records.length>1?"these":"this")+" row?";
			$("#confirmMultiDelete").find(".modal-body").text(WRN_CAT_DELETE);
			$('#confirmMultiDelete').on('click', '#delete', function(e) {	
				var selected_values = records.join(",");
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					 }
				});
				$.ajax({
					url: url,
					method: "POST",
					data: {id:selected_values},
					dataType: 'json',
					success: function(response) {
						location.reload(true);
					}
				});
			});		
		} 
	});
	</script>
	@endif
	<!--Multiple Delete customer bill modal end-->
	<!--Status change modal start-->
@if (request()->routeIs('admin.customer-bill'))
<!--Single status modal start-->
<script>
$(".changeStatus").on('click', function (e) {
	//console.log('hello');
	var id = $(this).data('id');
	var url = $(this).data('url');
	var val = $(this).prop('checked') == true ? 1 : 0;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: url,
		method: "POST",
		data: {id:id,val:val},
		dataType: 'json',
		success: function(response) {
			//location.reload(true);
			$('#message').html('<div class="alert alert-success alert-dismissible fade show"><strong>'+response.success+'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button></div>');
		}
	});
});
</script>
@endif
<!--Single status modal end-->
<!------ multiple status start--->
@if (request()->routeIs('admin.customer-bill'))
	<div class="modal fade" id="confirmMultiStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<input type="hidden" id="hiddenId">
		<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="change">Submit</button>
		<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$('.change_status').on('click', function(e) { 
		var status = $(this).data('id');
		var url = $(this).data('url');
		var employee = [];  
		$(".table input[name=chk_id]:checked").each(function() {  
			employee.push($(this).data('emp-id'));
		});	
		if(employee.length <=0)  {  
			$('#confirmChkSelect').modal("show");	
		}else {
			$('#confirmMultiStatus').modal("show");	
			WRN_PROFILE_DELETE = "Are you sure you want to "+(status==1?"active":"inactive")+" "+(employee.length>1?"these":"this")+" row?";
			$("#confirmMultiStatus").find(".modal-body").text(WRN_PROFILE_DELETE);
			$('#confirmMultiStatus').on('click', '#change', function(e) {	
					var selected_values = employee.join(",");
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						 }
					});
					$.ajax({
						url: url,
						method: "POST",
						data: {id:selected_values,status:status},
						dataType: 'json',
						success: function(response) {
							location.reload(true);
						}
					});
				
			});		
		}
	});
	</script>

{{-- --------expanse tracker-------------}}

<!--confirm checkbox selected-->
@if (request()->routeIs('admin.expanse-tracker'))
<div class="modal fade" id="confirmChkSelect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body"><strong>Please check checkbox.</strong></div>
			<div class="modal-footer">
			<button type="button" data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">OK</button>
			</div>
		</div>
	</div>
</div>
@endif

<!--Multiple Delete expanse tracker modal start-->
@if (request()->routeIs('admin.expanse-tracker'))
	<div class="modal fade" id="confirmMultiDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<input type="hidden" id="hiddenId">
		<button type="button" data-bs-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
		<button type="button"  data-bs-dismiss="modal" class="btn btn-secondary" id="cancel">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$('#delete_records').on('click', function(e) { 
		//alert(1);
		var url = $(this).data('url');
		var records = [];  
		$(".table input[name=chk_id]:checked").each(function() {  
			records.push($(this).data('emp-id'));
		});	
		if(records.length <=0)  {  
			$('#confirmChkSelect').modal("show");
		}else {
			$('#confirmMultiDelete').modal("show");	
			WRN_CAT_DELETE = "Are you sure you want to delete "+(records.length>1?"these":"this")+" row?";
			$("#confirmMultiDelete").find(".modal-body").text(WRN_CAT_DELETE);
			$('#confirmMultiDelete').on('click', '#delete', function(e) {	
				var selected_values = records.join(",");
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					 }
				});
				$.ajax({
					url: url,
					method: "POST",
					data: {id:selected_values},
					dataType: 'json',
					success: function(response) {
						location.reload(true);
					}
				});
			});		
		} 
	});
	
	
	</script>
	@endif
<!--Multiple Delete expanse tracker modal end-->

@endif


	
</footer>