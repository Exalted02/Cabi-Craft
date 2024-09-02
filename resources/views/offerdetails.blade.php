@extends('layouts.app')
@section('content')

@php
								   
	$lengthArr = [];							
	$breadthArr = [];							
	$deepArr = [];
	if(isset($product_details->length) && $product_details->length!=0)							
	{
		if(strpos($product_details->length, ',') !== false)
		$lengthArr = explode(',',$product_details->length);
		else
		$lengthArr[] = $product_details->length;
	}
	
	if(isset($product_details->breadth) && $product_details->breadth!=0)
	{
	if (strpos($product_details->breadth, ',') !== false)
	$breadthArr=explode(',',$product_details->breadth);
	else
		$breadthArr[] = $product_details->breadth;
	}
	
	if(isset($product_details->deep) && $product_details->deep!=0)
	{
	if (strpos($product_details->deep, ',') !== false)
		$deepArr = explode(',',$product_details->deep);
	else
		$deepArr[] = $product_details->deep;
	}
@endphp
<div class="submited-form">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="row">
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <div class="new-order-body-scroll">
                        <div class="posts-masonry">
                            <div class="category-grid-box-1">
                                <div class="images"> <img alt="" src="{{ url('admin-assets/images/product/'. $product_details->image) }}" height="50%" width="100%" class="img-responsive">
                                </div>
                                <div class="short-description-1">
                                    <h3>
                                        <a title="" href="single-page-listing.html">{{$product_details->name ?? ''}}</a>
                                    </h3>
                                    <p> {{$product_details->description ?? ''}}.</p>
									<div>
										<span class="ad-price">Rs.{{$product_details->price ?? ''}}</span> 
										<a href="{{ route('neworder') }}" class="btn btn-theme pull-right mb-15px">Back</a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 new-order-right-sidebar">
                    <div class="sidebar mr-5px">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">  
                            <div class="panel panel-default">
                            <!-- Heading -->
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <div class="widget">
                                        <div class="widget-heading">
                                            <h4 class="panel-title"><a>Available Size</a></h4>
                                        </div>
                                        <div class="widget-content recent-ads">
                                        <!-- Ads -->
                                            <div class="recent-ads-list">
                                                <div class="recent-ads-container">
												{{--<div class="recent-ads-list-image">
                                                        <a href="#" class="recent-ads-list-image-inner">
                                                            <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                                        </a>
                                                    </div>--}}
                                                    <div class="recent-ads-list-content">
                                                        <h3 class="recent-ads-list-title">
                                                            <a href="#">Width</a>
                                                        </h3>
                                                        <ul class="recent-ads-list-location">
                                                            <li><a href="#">@foreach($breadthArr as $brd) {{$brd}}&nbsp; @endforeach</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="recent-ads-list">
                                                <div class="recent-ads-container">
												{{--<div class="recent-ads-list-image">
                                                        <a href="#" class="recent-ads-list-image-inner">
                                                            <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                                        </a>
                                                    </div>--}}
                                                    <div class="recent-ads-list-content">
                                                        <h3 class="recent-ads-list-title">
                                                            <a href="#">Length</a>
                                                        </h3>
                                                        <ul class="recent-ads-list-location">
                                                            <li><a href="#">@foreach($lengthArr as $len) {{$len}}&nbsp; @endforeach</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Ads -->
                                            <div class="recent-ads-list">
                                                <div class="recent-ads-container">
												{{--<div class="recent-ads-list-image">
                                                        <a href="#" class="recent-ads-list-image-inner">
                                                            <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                                        </a>
                                                    </div>--}}
                                                    <!-- /.recent-ads-list-image -->
                                                    <div class="recent-ads-list-content">
                                                        <h3 class="recent-ads-list-title">
                                                            <a href="#">Deep</a>
                                                        </h3>
                                                        <ul class="recent-ads-list-location">
                                                            <li><a href="#">@foreach($deepArr as $deep) {{$deep}}&nbsp; @endforeach</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.recent-ads-list-content -->
                                                </div>
                                                <!-- /.recent-ads-container -->
                                            </div>
                                            <!-- Ads -->
                                            {{--<div class="recent-ads-list">
                                                <div class="recent-ads-container">
                                                    <div class="recent-ads-list-image">
                                                            <a href="#" class="recent-ads-list-image-inner">
                                                                <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                                            </a>
                                                    </div>
                                                    
                                                    <div class="recent-ads-list-content">
                                                        <h3 class="recent-ads-list-title">
                                                            <a href="#">2017 Bugatti Chiron: Again with the Overkill </a>
                                                        </h3>
                                                        <ul class="recent-ads-list-location">
                                                            <li><a href="#">Brooklyn</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>--}}
                                           
										   {{--<div class="recent-ads-list">
                                                <div class="recent-ads-container">
                                                    <div class="recent-ads-list-image">
                                                        <a href="#" class="recent-ads-list-image-inner">
                                                            <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                                        </a>
                                                    </div>
                                                   
                                                    <div class="recent-ads-list-content">
                                                        <h3 class="recent-ads-list-title">
                                                            <a href="#">Porsche 911 Carrera 2017  Super Charger</a>
                                                        </h3>
                                                        <ul class="recent-ads-list-location">
                                                            <li><a href="#">Brooklyn</a></li>
                                                        </ul>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
    
