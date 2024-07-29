@extends('layouts.app')
@section('content')
<div class="profilerow">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Sidebar Widgets -->
                    <div class="blog-sidebar">
                        <!-- Categories --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Categories</a></h4>
                           </div>
                           <div class="widget-content categories">
                              <ul>
                                 <li> <a href="{{url('orderhistorys')}}"> Order History </a> </li>
                                 <li> <a href="{{url('profilepage')}}"> Profile </a> </li>
                                 <li> <a href="{{url('offerpage')}}"> Offers </a> </li>
                                 <li> <a href="{{url('settingpage')}}">Settings </a> </li>
                                 <li> <a href=""> Log out  </a> </li>
                              </ul>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="row grid-style-4">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="new-order-body-scroll">
                                <div class="posts-masonry">
                                    <div class="col-md-4 col-xs-12 col-sm-6">
                                        <div class="category-grid-box-1">
                                            <div class="images"> <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                            </div>
                                            <div class="short-description-1">
                                                <h3>
                                                    <a title="" href="{{url('offerdetailpage')}}">offers</a>
                                                </h3>
                                                <p>720 H x 600 W x 560 D</p>
                                                <span class="ad-price">Rs.210</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-6">
                                        <div class="category-grid-box-1">
                                            <div class="images"> <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                            </div>
                                            <div class="short-description-1">
                                                <h3>
                                                    <a title="" href="{{url('offerdetailpage')}}">offers</a>
                                                </h3>
                                                <p>720 H x 600 W x 560 D</p>
                                                <span class="ad-price">Rs.210</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-6">
                                        <div class="category-grid-box-1">
                                            <div class="images"> <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                            </div>
                                            <div class="short-description-1">
                                                <h3>
                                                    <a title="" href="{{url('offerdetailpage')}}">offers</a>
                                                </h3>
                                                <p>720 H x 600 W x 560 D</p>
                                                <span class="ad-price">Rs.210</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-6">
                                        <div class="category-grid-box-1">
                                            <div class="images"> <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                            </div>
                                            <div class="short-description-1">
                                                <h3>
                                                    <a title="" href="{{url('offerdetailpage')}}">offers </a>
                                                </h3>
                                                <p>720 H x 600 W x 560 D</p>
                                                <span class="ad-price">Rs.210</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-6">
                                        <div class="category-grid-box-1">
                                            <div class="images"> <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                            </div>
                                            <div class="short-description-1">
                                                <h3>
                                                    <a title="" href="{{url('offerdetailpage')}}">offers</a>
                                                </h3>
                                                <p>720 H x 600 W x 560 D</p>
                                                <span class="ad-price">Rs.210</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-6">
                                        <div class="category-grid-box-1">
                                            <div class="images"> <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                            </div>
                                            <div class="short-description-1">
                                                <h3>
                                                    <a title="" href="{{url('offerdetailpage')}}">offers</a>
                                                </h3>
                                                <p>720 H x 600 W x 560 D</p>
                                                <span class="ad-price">Rs.210</span> 
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
</div>
@endsection