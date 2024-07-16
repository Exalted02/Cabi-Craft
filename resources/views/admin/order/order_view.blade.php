@extends('admin.layouts.app', [
'title'=> "HappyLife"
])

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="{{ asset('admin-assets/css/invoice.css') }}" rel="stylesheet">        
<main class="content">
	<div class="container ">

      <form method="POST" class="needs-validation" novalidate   action="https://script.google.com/macros/s/AKfycbyvdYLqyHaCpdN3f6DzxGVL4H2xQ1Il2Oo9GjKWy1ceCJnsuL5wIJhuiYpdLczSa1VMiQ/exec">

        <div class="card mt-3">
            <div class="card-header text-center">
             <h4>View Invoice</h4>
            </div>
			<input type="hidden" value="{{ session()->get('appApiKey') }}" id="appapikey">
            <div class="card-body">
               <div class="row">
                    <div class="col-md-8 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Customer</span>
                            <input type="text" class="form-control"   
                                   placeholder="Customer" name="cust_nm" 
                                   id="cust_nm" required minlength="4" disabled>

                            <div class="invalid-feedback">
                                Please Enter Customer Name </div>                          
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                      
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Sl. No</span>
                            <input type="text" class="form-control" 
                                   placeholder="Sl. No"  id="inv_no" 
                                   name="inv_no" autocomplete="off" 
                                   required disabled>
								   
                            <div class="input-group-append">
							<button class="btn btn-secondary searchBtn"  
                                          type="button" onclick="Search();">
										  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
										  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
										  </svg>
                                    </button>
                            </div>
                            <div class="valid-feedback">Invoice No. is 
                            OK</div>
							<input type="hidden" name="inv_sl" id="inv_sl">   
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
            
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Address</span>
                            <input type="text" 
                                   class="form-control" placeholder="Address" 
                                   name="addr"  id="addr" disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">

                        <div class="input-group mb-3">
                            <span class="input-group-text" >Inv. Date</span>
                            <input type="date" class="form-control" 
                                   placeholder="Inv. Date" name="inv_dt" id="inv_dt" disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
            
                        <div class="input-group mb-3">
                            <span class="input-group-text" >City</span>
                            <input type="text" class="form-control" 
                                   placeholder="City"  name="city" id="city" disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" >State</span>
                            <input type="text" class="form-control"  
                                   placeholder="State" name="state" id="state" disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Zipcode</span>
                            <input type="text" class="form-control"  
                                   placeholder="Zipcode" name="zipcode" id="zipcode" disabled>
                        </div>
                    </div>
				</div>

               <input type="hidden"  id="IsNew"    name="IsNew"    value="Y">
               <input type="hidden"  id="StartRow" name="StartRow" value="0"> 
               <input type="hidden"  id="RowCount" name="RowCount" value="0"> 
			   <input type="hidden" value="{{$role_id}}" name="role_id" id="role_id">
			   <input type="hidden" value="{{$username}}" name="username" id="username">
				<div style="overflow-x:auto;">
					<div class="alert alert-success" id="successmsg" style="display:none">
					  <strong>Success!</strong> Data inserted successfully.
					</div>
					<table class="table table-bordered table-scrolled">
						<thead class="table-success">
						  <tr>
							<th scope="col">#</th>
							<th scope="col" class="text-center">Cabinet Type</th>
							<th scope="col" class="text-center">Image</th>
							<th scope="col" class="text-center">Width</th>
							<th scope="col" class="text-center">Length</th>
							<th scope="col" class="text-center">Deep</th>
							<th scope="col" class="text-center">Quantity</th>
							<th scope="col" class="text-center">Price</th>
							<th scope="col" class="text-center">Sft. Rate</th>
							<th scope="col" class="NoPrint text-center">                         
						<!--<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#inputFormModal" onClick="Add_Items()">+</button>-->
						{{--<button type="button" class="btn btn-sm btn-success addBtn"  onClick="Add_Items()">ADD</button>--}}
							</th>

						  </tr>
						</thead>
						<tbody class="dataTableBodyOrderView" id="TBody"></tbody>
						
						
						 <!--<tbody id="TBody">
						  <tr id="TRow" class="d-none">
							<th scope="row">1</th>
							<td>
							  <input class="form-control " name="item_nm" 
									 list="mylist" autocomplete="off" 
									 required value="a"  >
							  <datalist id="mylist" ></datalist>
							</td>
							<td><input type="text" 
									   class="form-control text-end" name="desc"></td>
							<td><input type="number" 
									   class="form-control text-end" name="qty"  
									   onchange="Calc(this);" ></td>
							<td><input type="number" 
									   class="form-control text-end" name="rate" 
									   onchange="Calc(this);"></td>
							<td><input type="number" 
									   class="form-control text-end" name="amt" 
									   value="0" readonly=""></td>
							<td class="NoPrint">
							  <button type="button" class="btn btn-sm btn-danger" 
									  onclick="BtnDel(this)">X</button></td>
						  </tr>
						</tbody>-->
						</table>
						<input type="hidden" id="mode">
					</div>
                  <div class="row">
                    <div class="col-12">
					{{--<button type="submit" 
                                class="btn btn-primary saveToTable" onClick="sentToExcel()">Submit</button>
						<button type="button" class="btn btn-danger"  
                                onclick="ResetTable()">Reset Table</button>--}}
                        
                    </div>
					
					<input type="hidden" 
                                   class="form-control text-end" id="FTotal" 
                                   name="FTotal" disabled="">
								   <input type="hidden" 
                                   class="form-control text-end" id="FGST" 
                                   name="FGST" onchange="GetTotal()">
								   <input type="hidden" 
                                   class="form-control text-end" id="FNet" 
                                   name="FNet" disabled="">
                    <!--<div class="col-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Total</span>
                            <input type="number" 
                                   class="form-control text-end" id="FTotal" 
                                   name="FTotal" disabled="">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >GST</span>
                            <input type="number" 
                                   class="form-control text-end" id="FGST" 
                                   name="FGST" onchange="GetTotal()">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Net Amt</span>
                            <input type="number" 
                                   class="form-control text-end" id="FNet" 
                                   name="FNet" disabled="">
                        </div>
                    </div>-->
                </div>
				     
					<div class="row">
						<div class="col-md-7 col-12"></div>
						<div class="col-md-5 col-12">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">Total Amount</div>
									<div class="col-md-8">	 
										  <input type="text" class="form-control" disabled id="total_amount_s" value="{{$totAmt}}">
										  <input type="hidden" name="total_amount" class="form-control" id="total_amount_hid">
									</div>
								</div>
							</div>
							<div class="col-md-12 invoiceprice">
								<div class="row">
									<div class="col-md-4">Discount Coup.</div>
									<div class="col-md-5">	 
										  <input type="text" class="form-control" id="discount_code_s" disabled value="{{$discountAmt}}">
										  <span id="couponErr"></span>
										  <input type="hidden" class="form-control" id="discount_code_hid" name="discount_coupon">
										  
									</div>
									
									{{--<div class="col-md-2">
									<button type="button" class="btn btn-primary couponcodevalue">Apply</button></div>--}}
								</div>
							</div>
							<div class="col-md-12 invoiceprice">
								<div class="row">
									<div class="col-md-4">GST 18%</div>
									<div class="col-md-8">	 
										  <input type="text" class="form-control" disabled id="gst_val_s" value="{{$gstAmt}}">
										  <input type="hidden" class="form-control" id="gst_val_hid" name="gstAmt">
									</div>
								</div>
							</div>
							<div class="col-md-12 invoiceprice">
								<div class="row">
									<div class="col-md-4">Grand Total</div>
									<div class="col-md-8">	 
										  <input type="text" class="form-control" disabled id="grand_total_s" value="{{$g_totAmt}}">
										  <input type="hidden" class="form-control" id="grand_total_hid" name="grand_total">
									</div>
								</div>
							</div>
						</div>
					</div>
					 
					<input type="hidden" value="{{$exlid}}" id="edit_id"> 
            </div>
          </div>
		</form>
		
    </div>
	
	
<!-- The edit data Modal -->
<div class="modal" id="editFormModal" tabindex="-1" aria-labelledby="editFormModal Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Form</h4>
        <button type="button" class="close" data-dismiss="modal" onClick="close_edit()">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
			<div class="row">
			    <input type="hidden" id="editid">
                <div class="col-md-6" id="eselectcategory">
				  <label for="formGroupExampleInput" class="form-label">Category</label>
				  <select id="editcategorySelect" class="form-control js-example-responsive" placeholder="Category*" style="width:100px;" disabled>
						<option value="">Select Category</option>
				  </select>
				  <span id="editcategoryErr"></span>
				</div>
				<div class="col-md-6" id="escategory">
					<label for="formGroupExampleInput" class="form-label">Sub Category</label>
					<select id="editsubcategorySelect" class="form-control" style="width:100px;" disabled>
						<option value="">Select Sub Category</option>
					</select>
					<span id="editsubcategoryErr"></span>
				</div>
				<div class="col-md-6" id="ectype">
					<label for="formGroupExampleInput" class="form-label">Cabinet Type</label>
					<select id="editcabinetTypeSelect" class="form-control" style="width:130px;" disabled>
						<option value="">Select Cabinet Type</option>
					</select>
					<span id="editcabinetTypeErr"></span>
				</div>
				<div class="col-md-6">
				  <label for="formGroupExampleInput" class="form-label">Width</label>
				  <input type="text" class="form-control" id="editwidth" placeholder="Width" disabled>
				  <span id="editwidthErr"></span>
				</div>
				<div class="col-md-6">
				  <label for="formGroupExampleInput" class="form-label">Length</label>
				  <input type="text" class="form-control" id="editlength" placeholder="Length" disabled>
				  <span id="editlengthErr"></span>
				</div>
				<div class="col-md-6">
				  <label for="formGroupExampleInput" class="form-label">Deep</label>
				  <input type="text" class="form-control" id="editdeep" placeholder="Deep" disabled>
				  <span id="editdeepErr"></span>
				</div>
				<div class="col-md-6">
				  <label for="formGroupExampleInput" class="form-label">Qty</label>
				  <input type="number" class="form-control" id="editqty" placeholder="Qty" disabled>
				  <span id="editqtyErr"></span>
				</div>
				<div class="col-md-6" id="eselectmaterial">
				  <label for="formGroupExampleInput" class="form-label">Material</label>
				    <select id="editmaterialSelect" class="form-control" disabled>
						<option value="">Select Material</option>
					</select>
					<span id="editmaterialselectErr"></span>
				</div>
				<div class="col-md-6" id="eccolor">
				    <label for="formGroupExampleInput" class="form-label">Cabinet Colour</label>
				    <select id="editcabinetcolour" class="form-control" disabled>
						<option value="">Select cabinet</option>
					</select>
					<span id="editcabinetcolourErr"></span>
				</div>
				<div class="col-md-6" id="eeside">
				  <label for="formGroupExampleInput" class="form-label">EXPO SIDE</label>
				    <select id="editexposide" class="form-control" disabled>
						<option value="">Select Expo Side</option>
					</select>
					<span id="editexposideErr"></span>
				</div>
				<div class="col-md-6">
				  <label for="formGroupExampleInput" class="form-label">EXPO Colour</label>
				  <input type="text" class="form-control" id="editexpocolour" placeholder="EXPO Colour" disabled>
				  <span id="editexpocolourErr"></span>
				</div>
				<div class="col-md-6" id="esmaterial">
				    <label for="formGroupExampleInput2" class="form-label">Shutter  Material</label>
				    <select id="editshuttermaterial" class="form-control" disabled>
						<option value="">Select Shutter  Material</option>
					</select>
					<span id="editshuttermaterialErr"></span>
				</div>
				<div class="col-md-6">
				  <label for="formGroupExampleInput" class="form-label">Shutter Colour</label>
				  <input type="text" class="form-control" id="editshuttercolour" placeholder="Shutter Colour" disabled>
				  <span id="editshuttercolourErr"></span>
				</div>
				<div class="col-md-6" id="eltype">
				  <label for="formGroupExampleInput2" class="form-label">Leg Type</label>
				    <select id="editlegtype" class="form-control" disabled>
						<option value="">Select Leg Type</option>
					</select>
					<span id="editlegtypeErr"></span>
				</div>
				<div class="col-md-6">
				  <label for="formGroupExampleInput" class="form-label">Skt Hight (mm)</label>
				  <input type="text" class="form-control" id="editsktheight" placeholder="Skt Hight (mm)" disabled>
				  <span id="editsktheightErr"></span>
				</div>
				<div class="col-md-6" id="ehtype">
				  <label for="formGroupExampleInput2" class="form-label">Handel Type</label>
				    <select id="edithandeltype" class="form-control" disabled>
						<option value="">Handel Type</option>
					</select>
					<span id="edithandeltypeErr"></span>
				</div>
			</div>
		</div>

      <!-- Modal footer -->

      <div class="modal-footer">
	  {{--<input type="submit" name="submit" id="handleEdit" class="btn btn-primary" value="UPDATE" onclick="handleEdit()"/>
	  <input type="submit" name="submit" id="handleSearchEdit" class="btn btn-primary" value="UPDATES" onclick="handleSearchEdit()"/>--}}
        <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="close_edit()">Close</button>
      </div>

    </div>
  </div>
</div>
	
	
</main>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!--<script src="{{ asset('public/admin-assets/js/app.js') }}"></script>-->
<script src="{{ asset('admin-assets/js/order_list_invoice.js') }}"></script>
<script src="{{ asset('public/admin-assets/js/dataArray.js') }}"></script>
<!------- for select2 ------->
	
	  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	  
	 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
		document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById("chartjs-dashboard-line2").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line2"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
		document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById("chartjs-dashboard-line3").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line3"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: ["Chrome", "Firefox", "IE"],
                    datasets: [{
                        data: [4306, 3801, 1689],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger
                        ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var markers = [{
                    coords: [31.230391, 121.473701],
                    name: "Shanghai"
                },
                {
                    coords: [28.704060, 77.102493],
                    name: "Delhi"
                },
                {
                    coords: [6.524379, 3.379206],
                    name: "Lagos"
                },
                {
                    coords: [35.689487, 139.691711],
                    name: "Tokyo"
                },
                {
                    coords: [23.129110, 113.264381],
                    name: "Guangzhou"
                },
                {
                    coords: [40.7127837, -74.0059413],
                    name: "New York"
                },
                {
                    coords: [34.052235, -118.243683],
                    name: "Los Angeles"
                },
                {
                    coords: [41.878113, -87.629799],
                    name: "Chicago"
                },
                {
                    coords: [51.507351, -0.127758],
                    name: "London"
                },
                {
                    coords: [40.416775, -3.703790],
                    name: "Madrid "
                }
            ];
            var map = new jsVectorMap({
                map: "world",
                selector: "#world_map",
                zoomButtons: true,
                markers: markers,
                markerStyle: {
                    initial: {
                        r: 9,
                        strokeWidth: 7,
                        stokeOpacity: .4,
                        fill: window.theme.primary
                    },
                    hover: {
                        fill: window.theme.primary,
                        stroke: window.theme.primary
                    }
                },
                zoomOnScroll: false
            });
            window.addEventListener("resize", () => {
                map.updateSize();
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });

    </script>
    
    <script>
    
  $(document).ready(function () {
    var appapikey = $("#appapikey").val();
    localStorage.setItem('appApiKey', appapikey);
	  
    var URLCabinetTyP = '{{ url("/getCabinetTyPrcVal") }}';
	$.ajax({
        url: URLCabinetTyP,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonCabinetTyPrice) {
			//alert(JSON.stringify(jsonCabinetTyPrice));
			localStorage.setItem('jsonCabinetTyPrice', JSON.stringify(jsonCabinetTyPrice));
		},
    });
   //---- store order---
   /*var storedData = JSON.parse(localStorage.getItem('formData')) || [];
   $.ajax({
			url: "{{ route('admin.orderdetailsstore') }}",
			type: "POST",
			data: {storedData:storedData, _token: "{{ csrf_token() }}"},
			//dataType: 'json',
			success: function(response) {
				 alert(response);
				//sessionStorage.setItem("linkURL",window.location.href);
				//setInterval(function(){reset_localstorage();}, 1003);
			},
		});*/
   /*$.ajax({
			url: "{{ route('admin.orderstore') }}",
			type: "POST",
			data: {cust_nm:"atanu",addr:"kolkata",inv_dt:"2024-02-07",city:"dumdumn",state:"wb",zipcode:"7111102",username:"AA2023",inv_sl:"ivn-0015", _token: "{{ csrf_token() }}"},
			//dataType: 'json',
			success: function(response) {
				 alert(response);
				//sessionStorage.setItem("linkURL",window.location.href);
				//setInterval(function(){reset_localstorage();}, 1003);
			},
		});*/
   //--------------------------------------------
   // var URL18mmMat = '/getMaterial18mmVal';
    var URL18mmMat = '{{ url("/getMaterial18mmVal") }}';
	$.ajax({
        url: URL18mmMat,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(json18mmMaterial) {
			//alert(json18mmMaterial);
			//alert(JSON.stringify(json18mmMaterial));
			
			//localStorage.setItem('json18mmMaterial', json18mmMaterial);
			localStorage.setItem('json18mmMaterial', JSON.stringify(json18mmMaterial));
			//var storedJson18mmMaterialVal = JSON.parse(localStorage.getItem('json18mmMaterial'));
		},
    });
    
	// ----- for get 6mm material value------
	var URL6mmMat = '{{ url("/getMaterial6mmVal") }}';
	$.ajax({
        url: URL6mmMat,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(json6mmMaterial) {
			//alert(JSON.stringify(jsonMaterial));
			localStorage.setItem('json6mmMaterial', JSON.stringify(json6mmMaterial));
			//var storedJson6mmMaterialVal = JSON.parse(localStorage.getItem('json6mmMaterial'));
		},
    });
	// ----- for get 18mm shuttermaterial value------
	var URL18mmShu = '{{ url("/getShutterMaterial18mmVal") }}';
	$.ajax({
        url: URL18mmShu,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(json18mmShutter) {
			//alert(JSON.stringify(json18mmShutter));
			localStorage.setItem('json18mmShutter', JSON.stringify(json18mmShutter));
			//var storedJson18mmShutter = JSON.parse(localStorage.getItem('json18mmShutter'));
		},
    });
	
	// ----- for get exposide price  value------
	var URLExpoPrice = '{{ url("/getExposidePrice") }}';
	$.ajax({
        url: URLExpoPrice,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonExpoPrice) {
			//alert(JSON.stringify(jsonExpoPrice));
			localStorage.setItem('jsonExpoPrice', JSON.stringify(jsonExpoPrice));
		},
    });
	
	
    //------ for material---------------------
	var urlMaterial ='{{ url("/materialUrl") }}';
	$.ajax({
        url: urlMaterial,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonMaterial) {
			//alert(JSON.stringify(jsonMaterial));
			localStorage.setItem('jsonMaterial', JSON.stringify(jsonMaterial));
			var storedJsonMaterial = JSON.parse(localStorage.getItem('jsonMaterial'));
			$("#materialSelect").select2({
				search : true,
				data: storedJsonMaterial,
				templateResult: formatMaterial,
				templateSelection: formatMaterialSelection,
				dropdownParent: $('#selectmaterial'),
			});
			
        },
    });
	/*alert(jsonMaterial[0].text);
	$("#materialSelect").select2({
		search : true,
		data: jsonMaterial,
		templateResult: formatMaterial,
		templateSelection: formatMaterialSelection,
		dropdownParent: $('#selectmaterial'),
	});*/
	function formatMaterial(material)
	{
		if (!material.id) {
		  return material.text;
		}

		/*var $material = $(
		  '<span><img src="' + material.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + material.text + '</span>'
		);*/
		var $material = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + material.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + material.text + '</div>' +
			'</div>'
		);

		return $material;
	}
	function formatMaterialSelection(material)
	{
		if (!material.id) {
		  return material.text;
		}

		return $(
		  '<span><img src="' + material.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + material.text + '</span>'
		);
	}
	//------------- for cabinet colour---------
	var urlCabinetColour = '{{ url("/cabinetcolour") }}';
	$.ajax({
        url: urlCabinetColour,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonCabinet) {
			//alert(JSON.stringify(jsonMaterial));
			localStorage.setItem('jsonCabinet', JSON.stringify(jsonCabinet));
			var storedjsonCabinet = JSON.parse(localStorage.getItem('jsonCabinet'));
			$("#cabinetcolour").select2({
				data: storedjsonCabinet,
				templateResult: formatCabinet,
				templateSelection: formatCabinetSelection,
				dropdownParent: $('#ccolor'),
			});
			
        },
    });
	/*$("#cabinetcolour").select2({
		data: jsonCabinet,
		templateResult: formatCabinet,
		templateSelection: formatCabinetSelection,
		dropdownParent: $('#ccolor'),
	});*/
	function formatCabinet(cabinet)
	{
		if (!cabinet.id) {
		  return cabinet.text;
		}

		/*var $cabinet = $(
		  '<span><img src="' + cabinet.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + cabinet.text + '</span>'
		);*/
		var $cabinet = $(
		    '<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + cabinet.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + cabinet.text + '</div>' +
			'</div>'
		);

		return $cabinet;
	}
	function formatCabinetSelection(cabinet)
	{
		if (!cabinet.id) {
		  return cabinet.text;
		}

		return $(
		  '<span><img src="' + cabinet.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + cabinet.text + '</span>'
		);
	}
   //--------------------- expo side----------------------
   var urlExposide = '{{ url("/exposideUrl") }}';
	$.ajax({
        url: urlExposide,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonExposide) {
			localStorage.setItem('jsonExposide', JSON.stringify(jsonExposide));
			var storedjsonExposide = JSON.parse(localStorage.getItem('jsonExposide'));
			$("#exposide").select2({
				data: storedjsonExposide,
				templateResult: formatExposide,
				templateSelection: formatExposideSelection,
				dropdownParent: $('#eside'),
			});
		},
    });
	/*$("#exposide").select2({
		data: jsonExposide,
		templateResult: formatExposide,
		templateSelection: formatExposideSelection,
		dropdownParent: $('#eside'),
	});*/
	function formatExposide(exposide)
	{
		if (!exposide.id) {
		  return exposide.text;
		}

		/*var $exposide = $(
		  '<span><img src="' + exposide.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + exposide.text + '</span>'
		);*/
		var $exposide = $(
		    '<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + exposide.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + exposide.text + '</div>' +
			'</div>'
		);

		return $exposide;
	}
	function formatExposideSelection(exposide)
	{
		if (!exposide.id) {
		  return exposide.text;
		}

		return $(
		  '<span><img src="' + exposide.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + exposide.text + '</span>'
		);
	}
	//--------------------- Shutter  Material----------------------
	var urlShutterMaterial = '{{ url("/shutterMaterial") }}';
	$.ajax({
        url: urlShutterMaterial,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonShutterMaterial) {
			localStorage.setItem('jsonShutterMaterial', JSON.stringify(jsonShutterMaterial));
			var storedjsonShutterMaterial = JSON.parse(localStorage.getItem('jsonShutterMaterial'));
			$("#shuttermaterial").select2({
				data: storedjsonShutterMaterial,
				templateResult: formatShutterMaterial,
				templateSelection: formatShutterMaterialSelection,
				dropdownParent: $('#smaterial'),
			});
		},
    });
	/*$("#shuttermaterial").select2({
		data: jsonShutterMaterial,
		templateResult: formatShutterMaterial,
		templateSelection: formatShutterMaterialSelection,
		dropdownParent: $('#smaterial'),
	});*/
	function formatShutterMaterial(shutter)
	{
		if (!shutter.id) {
		  return shutter.text;
		}

		/*var $shutter = $(
		  '<span><img src="' + shutter.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + shutter.text + '</span>'
		);*/
		var $shutter = $(
		    '<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + shutter.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + shutter.text + '</div>' +
			'</div>'
		);

		return $shutter;
	}
	function formatShutterMaterialSelection(shutter)
	{
		if (!shutter.id) {
		  return shutter.text;
		}

		return $(
		  '<span><img src="' + shutter.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + shutter.text + '</span>'
		);
	}
	//--------------------- Leg Type----------------------
	var urlLegtyp = '{{ url("/legtyp") }}';
	$.ajax({
        url: urlLegtyp,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonlegtype) {
			localStorage.setItem('jsonlegtype', JSON.stringify(jsonlegtype));
			var storedjsonlegtype = JSON.parse(localStorage.getItem('jsonlegtype'));
			$("#legtype").select2({
				data: storedjsonlegtype,
				templateResult: formatLegtype,
				templateSelection: formatLegtypeSelection,
				dropdownParent: $('#ltype'),
			});
		},
    });
	/*$("#legtype").select2({
		data: jsonlegtype,
		templateResult: formatLegtype,
		templateSelection: formatLegtypeSelection,
		dropdownParent: $('#ltype'),
	});*/
	function formatLegtype(legtype)
	{
		if (!legtype.id) {
		  return legtype.text;
		}

		/*var $legtype = $(
		  '<span><img src="' + legtype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + legtype.text + '</span>'
		);*/
		var $legtype = $(
		  '<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + legtype.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + legtype.text + '</div>' +
			'</div>'
		);

		return $legtype;
	}
	function formatLegtypeSelection(legtype)
	{
		if (!legtype.id) {
		  return legtype.text;
		}

		return $(
		  '<span><img src="' + legtype.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + legtype.text + '</span>'
		);
	}
	//--------------------- Handel Type----------------------
	var urlHandeltype = '{{ url("/handeltype") }}';
	$.ajax({
        url: urlHandeltype,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
        success: function(jsonHandeltype) {
			localStorage.setItem('jsonHandeltype', JSON.stringify(jsonHandeltype));
			var storedjsonHandeltype = JSON.parse(localStorage.getItem('jsonHandeltype'));
			$("#handeltype").select2({
				data: storedjsonHandeltype,
				templateResult: formatHandeltype,
				templateSelection: formatHandeltypeSelection,
				dropdownParent: $('#htype'),
			});
		},
    });
	/*$("#handeltype").select2({
		data: jsonHandeltype,
		templateResult: formatHandeltype,
		templateSelection: formatHandeltypeSelection,
		dropdownParent: $('#htype'),
	});*/
	function formatHandeltype(handeltype)
	{
		if (!handeltype.id) {
		  return handeltype.text;
		}

		/*var $handeltype = $(
		  '<span><img src="' + handeltype.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;" /> ' + handeltype.text + '</span>'
		);*/
		var $handeltype = $(
			'<div class="itemType-item">' +
					'<div class="itemType-image"><img src="' + handeltype.image + '" class="img-thumbnail"/></div>' +
					'<div class="itemType-text">' + handeltype.text + '</div>' +
			'</div>'
		);

		return $handeltype;
	}
	function formatHandeltypeSelection(handeltype)
	{
		if (!handeltype.id) {
		  return handeltype.text;
		}

		return $(
		  '<span><img src="' + handeltype.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -11px;" /> ' + handeltype.text + '</span>'
		);
	}
  //--------- original-------------------------------------
     // Initialize Select2 for category dropdown
	 
	var urlrelationaltype = '{{ url("/relationaltype") }}';
	$.ajax({
		url: urlrelationaltype,
		type: "get",
		data: { _token: "{{ csrf_token() }}"},
		dataType: 'json',
		success: function(jsonData) {
			localStorage.setItem('jsonData', JSON.stringify(jsonData));
			//var jsonData = JSON.parse(localStorage.getItem('jsonData'));
			//alert(JSON.stringify(jsonData[0].subcategories.text));
			loadrelationaltypeData(jsonData);
			//localStorage.setItem('jsonData', jsonDataString);
		},
	});
	function loadrelationaltypeData(jsonData)
	{	
		 //var jsonData = localStorage.getItem('jsonData');
		 //alert(jsonData);
		$('#categorySelect').select2({
			search: true,
			data: jsonData,
			templateResult: formatCategory,
			templateSelection: formatCategorySelection,
			dropdownParent: $('#selectcategory'),
		});
		 //$('.select2-container--open').css('z-index', 9999);
		  // Initialize Select2 for subcategory dropdown
		  
		$('#subcategorySelect').select2({
			search: true,
			templateResult: formatSubcategory,
			templateSelection: formatSubcategorySelection,
			dropdownParent: $('#scategory'),
		});
		
		//$('.select2-container--open').css('z-index', 9999);
		$('#cabinetTypeSelect').select2({
			templateResult: formatcabinettype,
			templateSelection: formatCabinettypeSelection,
			dropdownParent: $('#ctype'),
		});
		 // Initialize Select2 for cabinet type dropdown
		  $('#cabinetTypeSelect').select2();
		
		/*text: '<span><img src="' + subcategory.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px; margin-top: -6px"/> ' + subcategory.text + '</span>',*/
		
		/*text: '<div class="subcategory-item">' +
					'<div class="subcategory-image"><img src="' + subcategory.image + '" class="img-thumbnail"/></div>' +
					'<div class="subcategory-text">' + subcategory.text + '</div>' +
				'</div>',
				text2: '<span><img src="' + subcategory.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;  margin-top: -11px;" /> ' + subcategory.text + '</span>',*/
		
		  // Event listener for changes in the category dropdown
		$('#categorySelect').on('change', function() {
			var categoryId = $(this).val();
			var selectedCategory = jsonData.find(category => category.id == categoryId);
			//alert(selectedCategory);
			var subcategoryData = [{ id: '', text2: 'Please Select Subcategory' }].concat(selectedCategory.subcategories.map(subcategory => ({
				id: subcategory.id,
				text: '<div class="subcategory-item">' +
					'<div class="subcategory-image"><img src="' + subcategory.image + '" class="img-thumbnail"/></div>' +
					'<div class="subcategory-text">' + subcategory.text + '</div>' +
				'</div>',
				text2: '<span><img src="' + subcategory.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;  margin-top: -11px;" /> ' + subcategory.text + '</span>',
			})));
			
			// Initialize Select2 for subcategory dropdown
			$('#subcategorySelect').empty().select2({
				data: subcategoryData,
				escapeMarkup: function(markup) {
					return markup; // Allows HTML in the result text
				},
				templateResult: function(data) {
					return data.text; // Use the HTML from the text property for display
				},
				templateSelection: function(data) {
					return data.text2; // Use the HTML from the text property for selection
				},
				dropdownParent: $('#scategory'),
			});
			
			// Clear and disable the cabinet type dropdown
			$('#cabinetTypeSelect').empty().prop('disabled', true).select2();
		});
			
			// Event listener for changes in the subcategory dropdown
		$('#subcategorySelect').on('change', function() {
			var subcategoryId = $(this).val();
			var selectedCategory = $('#categorySelect').val();
			var selectedCategoryObj = jsonData.find(category => category.id == selectedCategory);

			if (selectedCategoryObj) {
				var selectedSubcategory = selectedCategoryObj.subcategories.find(subcategory => subcategory.id == subcategoryId);

				// Update the cabinet type dropdown
				if (selectedSubcategory) {
					//var cabinetTypesData = [{ id: '', text: 'Please Select' }].concat(selectedSubcategory.cabinetTypes || []);
					var cabinetTypesData = [{ id: '', text2: 'Please Select Cabinet Type' }].concat(selectedSubcategory.cabinetTypes.map(cabinettypes => ({
						id: cabinettypes.id,
						text: '<div class="subcategory-item">' +
							'<div class="subcategory-image"><img src="' + cabinettypes.image + '" class="img-thumbnail"/></div>' +
							'<div class="subcategory-text">' + cabinettypes.text + '</div>' +
						'</div>',
						text2: '<span><img src="' + cabinettypes.image + '" class="img-thumbnail" style="width: 30px; height: 30px; margin-right: 5px;  margin-top: -11px;" /> ' + cabinettypes.text + '</span>',
					})));
					// Initialize Select2 for cabinet type dropdown
					$('#cabinetTypeSelect').empty().prop('disabled', false).select2({
						data: cabinetTypesData,
						escapeMarkup: function(markup) {
							return markup; // Allows HTML in the result text
						},
						templateResult: function(data) {
							return data.text; // Use the HTML from the text property for display
						},
						templateSelection: function(data) {
							return data.text2; // Use the HTML from the text property for selection
						},
						dropdownParent: $('#ctype'),
					});
				} else {
					// Clear and disable the cabinet type dropdown if no subcategory is selected
					$('#cabinetTypeSelect').empty().prop('disabled', true).select2();
				}
			}
		});
		// Custom function to format the displayed category option
		function formatCategory(category) {
			if (!category.id) {
			  return category.text;
			}

			/*var $category = $(
			  '<span><img src="' + category.image + '" class="img-thumbnail" style="width: 40px; height: 40px; margin-right: 5px;" /> ' + category.text + '</span>'
			);*/
			
			var $category = $(
				'<div class="category-item">' +
					'<div class="category-image"><img src="' + category.image + '" class="img-thumbnail"/></div>' +
					'<div class="category-text">' + category.text + '</div>' +
				'</div>'
			);

			return $category;
		}

		  // Custom function to format the selected category option
		function formatCategorySelection(category) {
			if (!category.id) {
			  return category.text;
			}

			return $(
			  '<span><img src="' + category.image + '" class="img-thumbnail" style="width: 35px; height: 35px; margin-right: 5px;  margin-top: -11px;" /> ' + category.text + '</span>'
			);
		}
		
		function formatSubcategory(subcategory) {
			return subcategory.text;
		}	
		  
		function formatSubcategorySelection(subcategory) {
			return subcategory.text;
		}
		function formatcabinettype(cabinetType)
		{
			 return cabinetType.text;
		}
		function formatCabinettypeSelection(cabinetType)
		{
			return cabinetType.text;
		}
    }
	// data save to database table
	$(".saveToTable").on("click", function(){
		order_store();
	});
	function order_store()
	{
		//alert('hello');
		var cust_nm = $("#cust_nm").val();
		var addr = $("#addr").val();
		var inv_dt = $("#inv_dt").val();
		var city = $("#city").val();
		var state = $("#state").val();
		var zipcode = $("#zipcode").val();
		var username = $("#username").val();
		var total_amount = $("#total_amount_hid").val();
		var discount_code = $("#discount_code_hid").val();
		var gstAmt = $("#gst_val_hid").val();
		var grand_total = $("#grand_total_hid").val();
		//alert(total_amount);alert(discount_code);alert(gstAmt);alert(grand_total);
		var inv_sl = $("#inv_sl").val();
		var excel_sl_no = $("#inv_no").val();
		var storedData = JSON.parse(localStorage.getItem('searchformData')) || [];
		//var urlstoreToTable = '{{ url("/order-store-data") }}';
		$.ajax({
			url: "{{ route('admin.orderstore') }}",
			type: "POST",
			data: {cust_nm:cust_nm, addr:addr,inv_dt:inv_dt,city:city,state:state,zipcode:zipcode,username:username,total_amount:total_amount,discount_coupon:discount_code,gstAmt:gstAmt,grand_total:grand_total,excel_sl_no:excel_sl_no,inv_sl:inv_sl,storedData:storedData, _token: "{{ csrf_token() }}"},
			//dataType: 'json',
			success: function(response) {
				//alert(response);
			},
		});
	}
	
	$(".couponcodevalue").on("click", function(){
		var total_amount = $("#total_amount").val();
		var gst_amt = $("#gst_val").val();
		var discount_code = $("#discount_code").val();
		//alert(discount_code);alert(total_amount);
		 $("#couponErr").html('');
		$.ajax({
			url: "{{ route('admin.couponcodevalue') }}",
			type: "POST",
			data: {discount_code:discount_code, _token: "{{ csrf_token() }}"},
			dataType: 'json',
			success: function(response) {
				 //alert(response.status);
				 if(response.status ==0)
				 {
					 $("#couponErr").append('<span class="error-text">Invalid Coupon Code</span>');
				 }
				 else{
					 if(response.mode==1)
					 {
				        $("#discount_code_hid").val(response.couponvalue);
						var amt = parseFloat(total_amount) - parseFloat(response.couponvalue);
						var grd_tot = parseFloat(amt) + parseFloat(gst_amt);
						$("#grand_total").val(grd_tot.toFixed(2));
						$("#grand_total_hid").val(grd_tot.toFixed(2));
					 }
					 else{
						var coupAmt = couponPercntVal(total_amount,response.couponvalue);
						$("#discount_code_hid").val(coupAmt);
						var amt = parseFloat(total_amount) - parseFloat(coupAmt);
						var grd_tot = parseFloat(amt) + parseFloat(gst_amt);
						$("#grand_total").val(grd_tot.toFixed(2));
						$("#grand_total_hid").val(grd_tot.toFixed(2));
					 }
				 }
			},
		});
	});
	
    function couponPercntVal(amt,val)
	{
		var coupAmount = (amt * val) / 100;
		coupAmount = coupAmount.toFixed(2);
		return coupAmount;
	}
	
		var editId = $("#edit_id").val();
		$("#inv_no").val(editId);
		get_excel_data();
	});
    function get_excel_data()
	{
		$('.searchBtn').trigger('click');
	}
    </script>
    
@endsection
