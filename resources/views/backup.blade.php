@extends('layouts.app')/* .form-group.row {
	  margin-right: -3px;
	  margin-left: -3px;
	}  */
@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="col-md-8">
                <div class="search-widget">
                    <input placeholder="Search by Car Name" type="text">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
                <!-- Middle Content Box -->
                        <div class="row grid-style-4">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="posts-masonry">
                                <div class="col-md-4 col-xs-12 col-sm-6">
                                    <!-- Ad Box -->
                                    <div class="white category-grid-box-1 ">
                                        <div class="featured-ribbon">
                                            <span>Featured</span>
                                        </div>
                                        <!-- Image Box -->
                                        <div class="images"> <img alt="Carspot" src="images/posting/4.jpg" class="img-responsive">
                                        </div>
                                        <!-- Short Description -->
                                        <div class="short-description-1 ">
                                            <!-- Category Title -->
                                            <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                            <!-- Ad Title -->
                                            <p > Base Cabinet, 2 shutters
                                    (+ 1 Shelf)</p><p>720 H x 600 W x 560 D                                       </p>
                                    <!-- Price -->
                                    <span class="ad-price">Rs.210</span> 
                                        </div>
                                        <!-- Ad Meta Stats -->
                                        <div class="ad-info-1" style="display: flex; justify-content: center; align-items: center;">
                                            <button type="button" class="btn btn-danger">add to cart</button>
                                        </div>
                                    </div>
                                    <!-- Ad Box End -->
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-6">
                                    <!-- Ad Box -->
                                    <div class="white category-grid-box-1 ">
                                        <div class="featured-ribbon">
                                            <span>Featured</span>
                                        </div>
                                        <!-- Image Box -->
                                        <div class="image"> <img alt="Carspot" src="images/posting/3.jpg" class="img-responsive">
                                        </div>
                                        <!-- Short Description -->
                                        <div class="short-description-1 ">
                                            <!-- Category Title -->
                                            <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                            <!-- Ad Title -->
                                            <h3>
                                            <a title="" href="single-page-listing.html">2014 Ford Shelby GT500 Coupe</a>
                                            </h3>
                                            <!-- Location -->
                                            <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                            <!-- Price -->
                                            <span class="ad-price">$370</span> 
                                        </div>
                                        <!-- Ad Meta Stats -->
                                        <div class="ad-info-1">
                                            <ul>
                                            <li><i class="flaticon-fuel-1"></i>Diesel</li>
                                            <li><i class="flaticon-dashboard"></i>35,000 km</li>
                                            <li><i class="flaticon-engine-2"></i> 1800 cc</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Ad Box End -->
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-6">
                                    <!-- Ad Box -->
                                    <div class="white category-grid-box-1 ">
                                        <div class="featured-ribbon">
                                            <span>Featured</span>
                                        </div>
                                        <!-- Image Box -->
                                        <div class="image"> <img alt="Carspot" src="images/posting/2.jpg" class="img-responsive">
                                        </div>
                                        <!-- Short Description -->
                                        <div class="short-description-1 ">
                                            <!-- Category Title -->
                                            <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                            <!-- Ad Title -->
                                            <h3>
                                            <a title="" href="single-page-listing.html">Porsche 911 Carrera 2017 </a>
                                            </h3>
                                            <!-- Location -->
                                            <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                            <!-- Price -->
                                            <span class="ad-price">$370</span> 
                                        </div>
                                        <!-- Ad Meta Stats -->
                                        <div class="ad-info-1">
                                            <ul>
                                            <li><i class="flaticon-fuel-1"></i>Diesel</li>
                                            <li><i class="flaticon-dashboard"></i>35,000 km</li>
                                            <li><i class="flaticon-engine-2"></i> 1800 cc</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Ad Box End -->
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-6">
                                    <!-- Ad Box -->
                                    <div class="white category-grid-box-1 ">
                                        <!-- Image Box -->
                                        <div class="image"> <img alt="Carspot" src="images/posting/7.jpg" class="img-responsive">
                                        </div>
                                        <!-- Short Description -->
                                        <div class="short-description-1 ">
                                            <!-- Category Title -->
                                            <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                            <!-- Ad Title -->
                                            <h3>
                                            <a title="" href="single-page-listing.html">Lamborghini Gallardo 5.0 V10 2dr</a>
                                            </h3>
                                            <!-- Location -->
                                            <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                            <!-- Price -->
                                            <span class="ad-price">$370</span> 
                                        </div>
                                        <!-- Ad Meta Stats -->
                                        <div class="ad-info-1">
                                            <ul>
                                            <li><i class="flaticon-fuel-1"></i>Diesel</li>
                                            <li><i class="flaticon-dashboard"></i>35,000 km</li>
                                            <li><i class="flaticon-engine-2"></i> 1800 cc</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Ad Box End -->
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-6">
                                    <!-- Ad Box -->
                                    <div class="white category-grid-box-1 ">
                                        <!-- Image Box -->
                                        <div class="image"> <img alt="Carspot" src="images/posting/8.jpg" class="img-responsive">
                                        </div>
                                        <!-- Short Description -->
                                        <div class="short-description-1 ">
                                            <!-- Category Title -->
                                            <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                            <!-- Ad Title -->
                                            <h3>
                                            <a title="" href="single-page-listing.html">Honda Civic 2.0 i-VTEC Type R</a>
                                            </h3>
                                            <!-- Location -->
                                            <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                            <!-- Price -->
                                            <span class="ad-price">$370</span> 
                                        </div>
                                        <!-- Ad Meta Stats -->
                                        <div class="ad-info-1">
                                            <ul>
                                            <li><i class="flaticon-fuel-1"></i>Diesel</li>
                                            <li><i class="flaticon-dashboard"></i>35,000 km</li>
                                            <li><i class="flaticon-engine-2"></i> 1800 cc</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Ad Box End -->
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-6">
                                    <!-- Ad Box -->
                                    <div class="white category-grid-box-1 ">
                                        <div class="featured-ribbon">
                                            <span>Featured</span>
                                        </div>
                                        <!-- Image Box -->
                                        <div class="image"> <img alt="Carspot" src="images/posting/9.jpg" class="img-responsive">
                                        </div>
                                        <!-- Short Description -->
                                        <div class="short-description-1 ">
                                            <!-- Category Title -->
                                            <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                            <!-- Ad Title -->
                                            <h3>
                                            <a title="" href="single-page-listing.html">Audi A4 quattro Premium GT</a>
                                            </h3>
                                            <!-- Location -->
                                            <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                            <!-- Price -->
                                            <span class="ad-price">$370</span> 
                                        </div>
                                        <!-- Ad Meta Stats -->
                                        <div class="ad-info-1">
                                            <ul>
                                            <li><i class="flaticon-fuel-1"></i>Diesel</li>
                                            <li><i class="flaticon-dashboard"></i>35,000 km</li>
                                            <li><i class="flaticon-engine-2"></i> 1800 cc</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Ad Box End -->
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Middle Content Box End -->
            </div>
                <div class="col-md-4 ">
                  <!-- Left Sidebar -->
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
                        <!-- Panel group -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                           <!-- Brands Panel -->    
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingTwo">
                              <div class="ad-info-1">
                                 <!-- Ad Status -->
                                 <label>
                                     <h4>New Order From</h4>
                                 </label>
                                 <ul class="pull-right ">
                                    <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times delete"></i></a></li>
                                 </ul>
                              </div>
                              </div>
                              <!-- Content -->
                              <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <form class="submited-form">
                                            <div class="form-group row">
                                                <label for="project-name" class="col-sm-5 col-form-label no-wrap">Project Name:</label>
                                                <div class="col-sm-7">
                                                    <input id="project-name" class="form-control" placeholder="Project name" type="text">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-5 col-form-label">Address:</label>
                                                <div class="col-sm-7">
                                                    <input id="address" class="form-control" placeholder="Address" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="city" class="col-sm-5 col-form-label">City:</label>
                                                <div class="col-sm-7">
                                                    <input id="city" class="form-control" placeholder="City" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="zip-code" class="col-sm-5 col-form-label">Zip Code:</label>
                                                <div class="col-sm-7">
                                                    <input id="zip-code" class="form-control" placeholder="Zip Code" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="state" class="col-sm-5 col-form-label">State:</label>
                                                <div class="col-sm-7">
                                                    <input id="state" class="form-control" placeholder="State" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="country" class="col-sm-5 col-form-label">Country:</label>
                                                <div class="col-sm-7">
                                                    <input id="country" class="form-control" placeholder="Country" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="mobile" class="col-sm-5 col-form-label">Mobile:</label>
                                                <div class="col-sm-7">
                                                    <input id="mobile" class="form-control" placeholder="Mobile #" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Project Type:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="(MR)_Ply"></option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>
                                            <hr>
                                            <div class="form-group row align-items-center">
                                                <label for="project-type" class="col-sm-4 col-form-label">Room Name:</label>
                                                <div class="col-sm-6">
                                                    <input id="project-type" class="form-control" placeholder="Room Name" type="text">
                                                </div>
                                                <div class="col-sm-2">
                                                <i class="fa fa-plus-square" style="color: green;"></i>
                                                </div>
                                            </div>
                                            <ol>
                                                <li>Kitchen</li>
                                                <li>Foyer</li>
                                                <li>Crockery</li>
                                                <li>Pooja unit</li>
                                                <li>T.v unit</li>
                                                <li>Master bedroom</li>
                                                <li>Gust bedroom</li>
                                                <li>Kids bed room</li>
                                                <li>Utility</li>
                                                <li>PBR</li>   
                                            </ol>
                                        </form>
                                        
                                        <hr>
                                        <button type="button" class="btn btn-danger" aria-label="Close">Close</button>
                                        <button type="button" class="btn btn-success pull-right" aria-label="Close">Submit</button>         
                                    </div>
                              </div>
                            </div>
                           <!-- Latest Ads Panel End -->
                        </div>
                        <!-- panel-group end -->
                         <!-- MR Robin-->
                         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                           <!-- Brands Panel -->    
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingTwo">
                                    <div class="ad-info-1">
                                        <!-- Ad Status -->
                                        <label>
                                            <h4>Mr.Robin_2BKH</h4>
                                        </label>
                                        <ul class="pull-right ">
                                            <li><a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Ad" href="javascript:void(0);"><i class="fa fa-pencil edit"></i></a> </li>
                                            <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times delete"></i></a></li>
                                        </ul>
                                    </div>
                              </div>
                              <!-- Content -->
                              <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        
                                            <!-- Ad Status -->
                                            <div class="form-group row align-items-center">
                                                <div class="col-sm-5">
                                                    <select class="form-control ad-post-status col-sm-4">
                                                        <option value="expired">Expired</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected=""></option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-sm-4">
                                                    <h5 class="mr-2 mb-0">Rs.9,900</h5> 
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-inline mb-0 ml-auto">
                                                        <li class="list-inline-item dropdown">
                                                            <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Edit Ad">Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete">Delete</a>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="fa fa-times delete"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                    
                                          <hr>
                                        
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                                                <p>1 .Basic cabinet, 2ss <br>
                                                                (2L plane Baskets)<br>
                                                                720H * 600W * 560D</p>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                                        <span class="label label-warning">Customize <ul class="pull-right ">
                                                            <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times delete"></i></a></li>
                                                        </ul></span>
                                                        <h5>Rs.3,500.00</h5>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6 col-sm-6">

                                                                <p>2.Basic cabinet, 2ss <br>
                                                                (2L plane Baskets)<br>
                                                                720H * 600W * 560D</p>
                                                    </div>
                                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                                        <span class="label label-warning">Customize<ul class="pull-right ">
                                                            <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times delete"></i></a></li>
                                                        </ul></span>
                                                        <h5>Rs.4,100.00</h5>
                                                        
                                                    </div>
                                                </div>
                                            
                                        
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6 col-sm-6">

                                                              <p>  3.Basic cabinet, 2ss<br>
                                                                (2L plane Baskets)<br>
                                                                720H * 600W * 560D</p>
                                                    </div>
                                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                                        <span class="label label-warning">Customize<ul class="pull-right ">
                                                            <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-times delete"></i></a></li>
                                                        </ul></span>
                                                        <h5>Rs.2,300.00</h5>
                                                        
                                                    </div>
                                                </div>

                                        <hr>
                                        <button type="button" class="btn btn-danger" aria-label="Close">Close order</button>
                                        <button type="button" class="btn btn-success pull-right " aria-label="Close">view cart</button>         
                                    </div>
                              </div>
                            </div>
                           <!-- Latest Ads Panel End -->
                        </div>
                          <!--  end MR Robin-->
                         <!--SubmitKitchen properties-->
                         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                           <!-- Brands Panel -->    
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingTwo">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Submit Kitchen properties
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                    <form class="submited-form">
                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Cabinet Material:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="(MR)_Ply">(MR)_Ply</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>
  
                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Box Inner Laminate:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">Half White</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Shutter Material:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">HDHMR</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Shutter Finish:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">21091_HGL</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Skt Type:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">PVC_Skt</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Skt height:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">100 mm</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Handle Types:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">Gola profile Handles</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>
                                    </form>

                                        <hr>
                                        <button type="button" class="btn btn-danger" aria-label="Close">Close</button>
                                        <button type="button" class="btn btn-success pull-right" aria-label="Close">Submit</button>         
                                    </div>
                              </div>
                            </div>
                           <!-- Latest Ads Panel End -->
                          </div>
                        
                         <!--End SubmitKitchen properties-->
                         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                           <!-- Brands Panel -->    
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingTwo">
                                 <h5 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Base Cabinet, 2 SS Drawers (2L Plain Baskets)
                                    </a>
                                 </h5>
                              </div>
                              <hr>
                              <!-- Content -->
                              <div class="row">
                                        
                                        <div class="col-md-3 col-xs-3 col-sm-3">
                                        <img alt="Carspot" src="front-assets/images/posting/1.jpg" class="img-responsive image-margin">
                                        </div>
                                        <div class="col-md-5 col-xs-5 col-sm-5">
                                            <form class="submited-form">
                                            <div class="form-group row">
                                                <label class="inline-label-select col-sm-4">
                                                Width:</label>
                                                <div class="col-sm-10">
                                                        <select class="form-control ad-post-status">
                                                            <option value="expired">(MR)_Ply</option>
                                                            <option value="sold">Sold</option>
                                                            <option value="active" selected></option>
                                                        </select>
                                                </div>
                                            </div>
                                                            
                                            <div class="form-group row">
                                                <label class="inline-label-select col-sm-4">
                                                Length:</label>
                                                <div class="col-sm-8">
                                                        <select class="form-control ad-post-status">
                                                            <option value="expired">(MR)_Ply</option>
                                                            <option value="sold">Sold</option>
                                                            <option value="active" selected></option>
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="inline-label-select col-sm-4">
                                                Deep:</label>
                                                <div class="col-sm-8">
                                                        <select class="form-control ad-post-status">
                                                            <option value="expired">(MR)_Ply</option>
                                                            <option value="sold">Sold</option>
                                                            <option value="active" selected></option>
                                                        </select>
                                                </div>
                                            </div>    
                                            </form>

                                        </div>
                                        <div class="col-md-3 col-xs-3 col-sm-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                                            </div>
                                        </div>
                                    </div>
                                
                        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <form class="submited-form">
                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Expo:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">Expo</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>
                                            
                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Expo Colour:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">Expo Colour</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Cabinet Materia:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">(MR)_Ply</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Box Inner Laminate:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">Box Inner Laminate</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Shutter Materia:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">Shutter Materia</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">
                                            Shutter nish:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">Shutter nish</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="inline-label-select col-sm-5">Skt Type:</label>
                                            <div class="col-sm-7">
                                                    <select class="form-control ad-post-status">
                                                        <option value="expired">Skt Type</option>
                                                        <option value="sold">Sold</option>
                                                        <option value="active" selected></option>
                                                    </select>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>

                                    <button type="button" class="btn btn-danger" aria-label="Close">Close</button>
                                    <button type="button" class="btn btn-success pull-right" aria-label="Close">Submit</button>         
                                </div>
                                </div>
                            </div>
                           <!-- Latest Ads Panel End -->
                        </div>
                     </div>
                     <!-- Sidebar Widgets End -->
                  <!-- Left Sidebar End -->
                </div> 
                
        </div>
    </div>
    
@endsection
<div class="row">
    <!-- Middle Content Area -->
    <div class="col-md-12 doted">
        <div class="row">
            <div class="gride col-md-4 col-sm-3">
                <!-- Form -->
                <div class="form-grid">
                    <form>
                        <div class="form-group">
                            <label>Email</label>
                            <input placeholder="Your Email" class="form-control" type="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input placeholder="Your Password" class="form-control" type="password">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="skin-minimal">
                                        <ul class="list">
                                            <li>
                                                <input type="checkbox" id="minimal-checkbox-1">
                                                <label for="minimal-checkbox-1">Remember Me</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-theme btn-lg btn-block">Login With Us</button>
                        <h2 class="no-span"><b>(OR)</b></h2>
                        <a class="btn btn-lg btn-block btn-social btn-facebook">
                            <span class="fa fa-facebook"></span> Sign in with Facebook
                        </a>
                        <a class="btn btn-lg btn-block btn-social btn-google">
                            <span class="fa fa-google"></span> Sign in with Google
                        </a>
                    </form>
                </div>
                <!-- Form -->
            </div>
            <!-- Middle Content Area End -->

            <!-- Blog Post -->
            <div class="col-md-8">
                <div class="row image-container">
                    <div class="image-container">
                        <div class="col-md-3 col-sm-3">
                            <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                            <h4>Kitchen</h4>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                            <h4>Laundry</h4>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                            <h4>Bedroom</h4>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                            <h4>Bathroom</h4>
                        </div>
                    </div>
                </div>
                <!-- Blog Post End -->
                 <p class="passage">No more hassle of buying raw materials and working with multiple contractors.
                 <br>Just buy the “CABICRAFT” has all the products that are in your design.</p>
            </div>
        </div>
    </div>
    <!-- Row End -->
</div>
/* .image-container {
	margin-top: 50px;
	display: flex;
	flex-wrap: wrap;
	gap: 5px;
}  */

/* .image-container { 
	padding-top: 40px;
	padding-right: 30px;
	padding-bottom: 50px;
	padding-left: 20px; 
}
.image-container img {
	height: 280px;
	border-radius: 10px;
	border-bottom-right-radius: 50px;
	
} 
.passage{
	word-wrap: break-word;
    white-space: normal;
    overflow: hidden; 
    text-overflow: ellipsis; 
    max-height: 4.5em;
    line-height: 1.5em; 
} */