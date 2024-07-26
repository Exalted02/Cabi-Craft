@extends('layouts.app')
@section('content')
<div class="submited-form">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="row">
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <div class="new-order-body-scroll">
                        <div class="posts-masonry">
                            <div class="category-grid-box-1">
                                <div class="images"> <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                </div>
                                <div class="short-description-1">
                                    <h3>
                                        <a title="" href="single-page-listing.html">2014 Ford Shelby GT500 Coupe</a>
                                    </h3>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis erat sed lorem dictum ullamcorper. Sed vel elit sed nunc ornare auctor. Suspendisse id ullamcorper purus, sed cursus dui. Sed eget elit magna. Morbi pellentesque gravida vehicula. Nunc ullamcorper rutrum nunc, non consectetur ante egestas non. Donec elementum est at velit accumsan, nec accumsan neque porta. Nunc iaculis condimentum ipsum, eget molestie nulla.</p>
                                    <a href="{{ route('offerpage') }}" class="btn btn-theme pull-right ">Back</a>
                                    <span class="ad-price">Rs.210</span> 
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
                                            <h4 class="panel-title"><a>Latest offer</a></h4>
                                        </div>
                                        <div class="widget-content recent-ads">
                                        <!-- Ads -->
                                            <div class="recent-ads-list">
                                                <div class="recent-ads-container">
                                                    <div class="recent-ads-list-image">
                                                        <a href="#" class="recent-ads-list-image-inner">
                                                            <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                                        </a>
                                                    </div>
                                                    <div class="recent-ads-list-content">
                                                        <h3 class="recent-ads-list-title">
                                                            <a href="#">2010 Audi A5 Auto Premium quattro MY10</a>
                                                        </h3>
                                                        <ul class="recent-ads-list-location">
                                                            <li><a href="#">New York</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="recent-ads-list">
                                                <div class="recent-ads-container">
                                                    <div class="recent-ads-list-image">
                                                        <a href="#" class="recent-ads-list-image-inner">
                                                            <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                                        </a>
                                                    </div>
                                                    <div class="recent-ads-list-content">
                                                        <h3 class="recent-ads-list-title">
                                                            <a href="#">Honda Civic 2017 Sports Edition With Turbo</a>
                                                        </h3>
                                                        <ul class="recent-ads-list-location">
                                                            <li><a href="#">Brooklyn</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Ads -->
                                            <div class="recent-ads-list">
                                                <div class="recent-ads-container">
                                                    <div class="recent-ads-list-image">
                                                        <a href="#" class="recent-ads-list-image-inner">
                                                            <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                                        </a>
                                                    </div>
                                                    <!-- /.recent-ads-list-image -->
                                                    <div class="recent-ads-list-content">
                                                        <h3 class="recent-ads-list-title">
                                                            <a href="#">Ford Mustang EcoBoost Premium Convertible</a>
                                                        </h3>
                                                        <ul class="recent-ads-list-location">
                                                            <li><a href="#">Brooklyn</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.recent-ads-list-content -->
                                                </div>
                                                <!-- /.recent-ads-container -->
                                            </div>
                                            <!-- Ads -->
                                            <div class="recent-ads-list">
                                                <div class="recent-ads-container">
                                                    <div class="recent-ads-list-image">
                                                            <a href="#" class="recent-ads-list-image-inner">
                                                                <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                                            </a>
                                                    </div>
                                                    <!-- /.recent-ads-list-image -->
                                                    <div class="recent-ads-list-content">
                                                        <h3 class="recent-ads-list-title">
                                                            <a href="#">2017 Bugatti Chiron: Again with the Overkill </a>
                                                        </h3>
                                                        <ul class="recent-ads-list-location">
                                                            <li><a href="#">Brooklyn</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Ads -->
                                            <div class="recent-ads-list">
                                                <div class="recent-ads-container">
                                                    <div class="recent-ads-list-image">
                                                        <a href="#" class="recent-ads-list-image-inner">
                                                            <img alt="" src="{{ url('images/cabinet.jpg') }}" class="img-responsive">
                                                        </a><!-- /.recent-ads-list-image-inner -->
                                                    </div>
                                                    <!-- /.recent-ads-list-image -->
                                                    <div class="recent-ads-list-content">
                                                        <h3 class="recent-ads-list-title">
                                                            <a href="#">Porsche 911 Carrera 2017  Super Charger</a>
                                                        </h3>
                                                        <ul class="recent-ads-list-location">
                                                            <li><a href="#">Brooklyn</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.recent-ads-list-content -->
                                                </div>
                                                <!-- /.recent-ads-container -->
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
    
