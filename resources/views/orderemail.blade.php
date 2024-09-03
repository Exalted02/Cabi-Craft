
{{--<link rel="stylesheet" href="{{ url('front-assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('front-assets/css/style.css') }}">--}}
 <style>
        .cartrow p {
            font-size: 14px;
            line-height: 1.6;
            color: #333; /* Customize as needed */
            /* Add other styles you need */
        }
        .profile {
            margin-top: 20px;
            /* Add other styles */
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
<div class="cartrow">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <p>
                        HAPPY LIFE INTERIORS LLP.
                        SITE NO.33 & 43, SY NO.13/6, AT KALKERE
                        VILLAGE,K R PURAM HOBLI, BANGALORE
                        EAST TALUK KARNATAKA-560043.
                    </p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <p><b>Project Type :<u> Job Work</b></u></p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <p>Date :- {{ \Carbon\Carbon::now()->format('d-F-y') }}<br>
                        Valid Until :-<br>
                        Order ID :-<br>
                        Customer Name :- Mr.Kumar<br>
                        Address :- 9-22,11th cross banjara<br>
                        layout ,Bangalore - 450067</p> 
                </div>
            </div>
        </div>
    </div>
    <div class="profile">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cabinet Type</th>
                        {{--<th>product_images</th>--}}
                        <th>Width</th>
                        <th>Length</th>
                        <th>Deep </th>
                        <th>QTY</th>
                        <th>C.C Material</th>
                        <th>C.C colour </th>
                        <th>Expo side</th>
                        <th>Expo Colour</th>
                        <th>Shutter Material</th>
                        <th>Shutter Colour</th>
                        <th>Leg Type</th>
                        <th> Skthigh</th>
                        <th>Handel Type </th>
						<th>Note </th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
				@php 
				$pr = 0;
				@endphp
				
				@foreach($cartdata as $cart)
                    <tr>
                        <td colspan="18"><strong>{{$cart->room_name ?? ''}}</strong></td>
                    </tr>
					@php 
						//$material = App\Models\Material::select('name')->where('id',$cart->cabinet_material)->first();
						//$handletyp = App\Models\Handeltype::select('name')->where('id',$cart->handle_types)->first();
						
					@endphp
					@foreach($cart->get_cart_data as $val)
					
					@php 
						$material = App\Models\Material::select('name')->where('id',$val->cabinet_material)->first();
						
						$cabinet_color = App\Models\Cabinet::select('name')->where('id',$val->box_Inner_laminate)->first();
						
						$exposide = App\Models\Exposide::select('name')->where('id',$val->expo)->first();
						
						$expocolor = DB::table('expo_shutter_colour')->where('id',$val->expo_colour)->first();
						
						$shutMaterial = App\Models\ShutterMaterial::select('name')->where('id',$val->expo)->first();
						
						$shutFinish = DB::table('expo_shutter_colour')->where('id',$val->shutter_finish)->first();
						
						$Legtype = App\Models\Legtype::select('name')->where('id',$val->leg_type)->first();
						
						$handletyp = App\Models\Handeltype::select('name')->where('id',$val->handle_type)->first();
						
					@endphp
                    <tr>
                        <td>1 </td>
                        <td>{{ ucwords($val->product_name) ?? ''}}</td>
							{{--<td><img src="{{asset('admin-assets/images/product/' . $val->get_products->image)}}" height="70" width="70"> </td>--}}
                        <td>{{ $val->breadth ?? ''}}</td>
                        <td>{{ $val->length ?? ''}} </td>
                        <td>{{ $val->deep ?? ''}} </td>
                        <td>{{ $val->qty ?? ''}} </td>
                        <td>{{$material->name ?? 'N/A'}}</td>
                        <td>{{$cabinet_color->name ?? 'N/A'}} </td>
                        <td>{{$exposide->name ?? 'N/A'}}</td>
                        <td>{{ $expocolor->name ?? 'N/A'}}</td>
                        <td>{{ $shutMaterial->name ?? 'N/A'}}</td>
                        <td>{{$shutFinish->name ?? 'N/A'}} </td>
                        <td>{{ $Legtype->name ?? 'N/A'}}</td>
                        <td>{{$cart->skt_height ?? 'N/A'}}</td>
                        <td>{{$handletyp->name ?? 'N/A'}} </td>
                        <td>{{$val->address ?? 'N/A'}} </td>
                        <td>{{ $val->price ?? 'N/A'}} </td>
                    </tr>
					 @php 
					 $pr += $val->price;
					 @endphp
					@endforeach
                @endforeach
				@php
				$percentage	 = 18;			
				$percentage_of_price = ($pr * $percentage) / 100;
				
				$grand_total = $pr + $percentage_of_price;
				@endphp
                    <tr class="sub-total-row">
                        <td colspan="14"></td>
                        <td colspan="2">Sub Total Rs. </td>
                        <td colspan="2">₹ {{$pr ?? ''}} </td>
                    </tr>
                    <tr class="gst-row">
                        <td colspan="14"></td>
                        <td colspan="1">GST</td>
                        <td colspan="1">18% </td>
                        <td colspan="2">₹ {{ $percentage_of_price}}</td>
                    </tr>
                    <tr class="Total-row">
                        <td colspan="14"></td>
                        <td colspan="2">Total </td>
                        <td colspan="2">₹ {{$pr + $percentage_of_price}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
