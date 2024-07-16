@extends('layouts.app')
@section('content')
<!-- =-=-=-=-=-=-= Home Banner 2 =-=-=-=-=-=-= -->
      <section class="main-search parallex ">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-xs-12 col-sm-12">
                  <div class="main-search-title">
                     <h1>Find Whatever Your Want?</h1>
                     <p>Search <strong>267,241</strong> new ads - 83 added today</p>
                  </div>
                  <div class="search-section">
                     <div id="form-panel">
                        <ul class="list-unstyled search-options clearfix">
                           <li>
                              <select class=" form-control make">
                                 <option label="Any Make"></option>
                                 <option>BMW</option>
                                 <option>Honda </option>
                                 <option>Hyundai </option>
                                 <option>Nissan </option>
                                 <option>Mercedes Benz </option>
                              </select>
                           </li>
                           <li>
                              <input type="text" placeholder="Audi A4 For Sale....">
                           </li>
                           <li>
                            <select class=" form-control search-year">
                                 <option label="Any Year"></option>
                                 <option>Year</option>
                                 <option>2010</option>
                                 <option>2011</option>
                                 <option>2012</option>
                                 <option>2013</option>
                                 <option>2014</option>
                                 <option>2015</option>
                                 <option>2016</option>
                            </select>
                           </li>
                           <li>
                              <button type="submit" class="btn btn-danger btn-lg btn-block">Search</button>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- =-=-=-=-=-=-= Home Banner 2 End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
      <!-- =-=-=-=-=-=-= About CarSpot =-=-=-=-=-=-= -->
         <section class="custom-padding about-us">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="title">
                        <h3>About <span class="heading-color">Car Spot </span> Dealership</h3>
                     </div>
                     <div class="content">
                        <p class="service-summary">Everything you need to build an amazing dealership automotive responsive website</p>
                        <p>Carspot is not only a hub where buyers and sellers can interact, it is also a comprehensive automotive portal with a forum dedicated to all automotive discussions, a blog that keeps the users up to date with the latest happenings in the automotive industry.</p>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <img  class="wow slideInRight center-block img-responsive" data-wow-delay="0ms" data-wow-duration="3000ms" alt="" src="front-assets/images/gtr.png" >
                  </div>
               </div>
               <div class="row margin-top-20">
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <!-- services grid -->
                     <div class="services-grid">
                        <div class="icons"><i class="flaticon-key"></i></div>
                        <h4>Dealership</h4>
                        <p>We have the right caring, experience and dedicated professional for you.</p>
                     </div>
                  </div>
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <!-- services grid -->
                     <div class="services-grid">
                        <div class="icons"><i class="flaticon-engine-2"></i></div>
                        <h4> Engine Upgrades</h4>
                        <p>We have the right caring, experience and dedicated professional for you.</p>
                     </div>
                  </div>
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <!-- services grid -->
                     <div class="services-grid">
                        <div class="icons"><i class="flaticon-security"></i></div>
                        <h4> Security Inspections</h4>
                        <p>We have the right caring, experience and dedicated professional for you.</p>
                     </div>
                  </div>
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <!-- services grid -->
                     <div class="services-grid">
                        <div class="icons"><i class="flaticon-disc-brake-1"></i></div>
                        <h4>Break Checkup</h4>
                        <p>We have the right caring, experience and dedicated professional for you.</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      <!-- =-=-=-=-=-=-= About CarSpot End =-=-=-=-=-=-= -->   
         <!-- =-=-=-=-=-=-= Featured  Ads =-=-=-=-=-=-= -->
         <section class="custom-padding gray over-hidden">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Latest <span class="heading-color"> Featured</span> Cars</h1>
                        <!-- Short Description -->
                        <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row">
                        <div class="featured-slider container owl-carousel owl-theme">
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <!-- Ad Box -->
                                 <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/4.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">BMW I8 1.5 Auto 4X4 2dr </a>
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
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <!-- Ad Box -->
                                 <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">2017 Audi A4 quattro Premium</a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$210</span> 
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
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <!-- Ad Box -->
                                 <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/2.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">Porsche 911 Carrera 2017 </a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$120</span> 
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
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <!-- Ad Box -->
                                 <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/3.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">2014 Ford Shelby GT500 Coupe</a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$420</span> 
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
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <!-- Ad Box -->
                                 <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/5.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a>
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
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <!-- Ad Box -->
                                 <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/6.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">McLaren F1 Sports Car</a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$990</span> 
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
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <!-- Ad Box -->
                                 <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/7.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">2015 Lamborghini Huracan</a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$450</span> 
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
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <!-- Ad Box -->
                                 <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/8.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a>
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
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <!-- Ad Box -->
                                 <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/9.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">Audi A4 2.0T quattro Premium</a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$100</span> 
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
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Featured Ads End =-=-=-=-=-=-= -->
 <!-- =-=-=-=-=-=-= Services Section  =-=-=-=-=-=-= -->
         <section class="padding-top-80 services-center">
            <div class="container">
               <!-- Heading Area -->
               <div class="heading-panel">
                  <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                     <!-- Main Title -->
                     <h1>Our <span class="heading-color"> Feature </span> Services</h1>
                     <!-- Short Description -->
                     <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>
                  </div>
               </div>
               <div class="row clearfix">
                  <!--Left Column-->
                  <div class="col-md-4 col-sm-6 col-xs-12 pull-left">
                  <!--Service Block -->
                  <div class="services-grid">
                        <div class="icons icon-right"><i class="flaticon-engine-4"></i></div>
                        <h4>Engine Upgrades</h4>
                        <p>We have the right caring, experience and dedicated professional for you.</p>
                     </div>
                  <!--Service Block -->
                  <div class="services-grid">
                        <div class="icons icon-right"><i class="flaticon-settings"></i></div>
                        <h4>Car Inspection</h4>
                        <p>We have the right caring, experience and dedicated professional for you.</p>
                     </div>
                      <!--Service Block -->
                    <div class="services-grid">
                        <div class="icons icon-right"><i class="flaticon-settings"></i></div>
                        <h4>Car Inspection</h4>
                        <p>We have the right caring, experience and dedicated professional for you.</p>
                     </div>
                      <!--Service Block -->
                  

                  </div>
                  
                  <!--Right Column-->
                  <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                     <!--Service Block-->
                     
                       
                     <div class="services-grid">
                        <div class="icons icon-left"><i class="flaticon-vehicle-3"></i></div>
                        <h4>Car Oil Change</h4>
                        <p>We have the right caring, experience and dedicated professional for you.</p>
                     </div>
                     <!--Service Block-->
                      <div class="services-grid">
                        <div class="icons icon-left"><i class="flaticon-car-steering-wheel"></i></div>
                        <h4>Power steering</h4>
                        <p>We have the right caring, experience and dedicated professional for you.</p>
                     </div>
                      
                       <!--Service Block-->
                      <div class="services-grid">
                        <div class="icons icon-left"><i class="flaticon-car-steering-wheel"></i></div>
                        <h4>Power steering</h4>
                        <p>We have the right caring, experience and dedicated professional for you.</p>
                     </div>
                  </div>
                  <!--Image Column-->
                  <div class="col-md-4 col-sm-12 col-xs-12">
                     <figure class="wow bounceInUp  animated" data-wow-delay="0ms" data-wow-duration="3500ms" >
                        <img class="center-block" src="front-assets/images/car-mechanic.png" alt="">
                     </figure>
                  </div>
               </div>

            </div>

         </section>
         <!-- =-=-=-=-=-=-=  Services Section End =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= Buy Or Sale =-=-=-=-=-=-= -->
         <section class="sell-box padding-top-70">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                     <div class="sell-box-grid">
                        <div class="short-info">
                        <h3> Want To Sale Your Car ?</h3>
                           <a href="#">Are you looking for a car?</a>
                           <p>Search your car in our Inventory and request a quote on the vehicle of your choosing. </p>
                        </div>
                        <div class="text-center">
                           <img class="img-responsive wow slideInLeft center-block" data-wow-delay="0ms" data-wow-duration="2000ms" src="front-assets/images/sell.png" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                     <div class="sell-box-grid">
                        <div class="short-info">
                        <h3> Want To Sale Your Car ?</h3>
                           <a href="#">Do you want to sell your car?</a>
                           <p>Request search your car in our Inventory and a quote on the vehicle of your choosing. </p>
                        </div>
                        <div class="text-center">
                           <img class="img-responsive wow slideInRight center-block" data-wow-delay="0ms" data-wow-duration="2000ms" src="front-assets/images/sell-1.png" alt="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- =-=-=-=-=-=-= Blog Section =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= Trending Ads =-=-=-=-=-=-= -->
         <section class="custom-padding white">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Latest <span class="heading-color"> Trending</span> Ads</h1>
                        <!-- Short Description -->
                        <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <!-- Nav tabs -->
                  <div class="recent-tab">
                     <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#newcars" role="tab" data-toggle="tab" aria-expanded="true">New Car's</a></li>
                        <li role="presentation" class=""><a href="#usedcars" role="tab" data-toggle="tab" aria-expanded="false">Used Car's</a></li>
                     </ul>
                  </div>
                  <!-- Recently Listed New Cars -->
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane active" id="newcars">
                        <!-- Middle Content Box -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                              <!-- Image Box -->
                              <div class="image"> <img alt="Carspot" src="front-assets/images/posting/11.jpg" class="img-responsive"></div>
                              <!-- Short Description -->
                              <div class="short-description-1 ">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="single-page-listing.html">Mazda RX8 Fro sale</a>
                                 </h3>
                                 <!-- Location -->
                                 <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                 <!-- Price -->
                                 <span class="ad-price">$1270</span> 
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                              <!-- Image Box -->
                              <div class="image"> <img alt="Carspot" src="front-assets/images/posting/12.jpg" class="img-responsive"></div>
                              <!-- Short Description -->
                              <div class="short-description-1 ">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a>
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                              <!-- Image Box -->
                              <div class="image"> <img alt="Carspot" src="front-assets/images/posting/13.jpg" class="img-responsive"></div>
                              <!-- Short Description -->
                              <div class="short-description-1 ">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a>
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                              <!-- Image Box -->
                              <div class="image"> <img alt="Carspot" src="front-assets/images/posting/17.jpg" class="img-responsive"></div>
                              <!-- Short Description -->
                              <div class="short-description-1 ">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a>
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                              <!-- Image Box -->
                              <div class="image"> <img alt="Carspot" src="front-assets/images/posting/15.jpg" class="img-responsive"></div>
                              <!-- Short Description -->
                              <div class="short-description-1 ">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a>
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                              <!-- Image Box -->
                              <div class="image"> <img alt="Carspot" src="front-assets/images/posting/16.jpg" class="img-responsive"></div>
                              <!-- Short Description -->
                              <div class="short-description-1 ">
                                 <!-- Category Title -->
                                 <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                 <!-- Ad Title -->
                                 <h3>
                                    <a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a>
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <div class="clearfix"></div>
                        <div class="text-center">
                           <div class="load-more-btn">
                              <button class="btn btn-lg  btn-theme"> View All <i class="fa fa-refresh"></i> </button>
                           </div>
                        </div>
                        <!-- Middle Content Box End -->
                     </div>
                     <!-- Recently Listed Used Cars -->
                     <div role="tabpanel" class="tab-pane" id="usedcars">
                        <!-- Middle Content Box -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">2017 Audi A4 quattro Premium</a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$210</span> 
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/2.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">Porsche 911 Carrera 2017 </a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$120</span> 
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/3.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">2014 Ford Shelby GT500 Coupe</a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$420</span> 
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/5.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a>
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/6.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">McLaren F1 Sports Car</a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$990</span> 
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <!-- Listing Ad Grid -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
                           <div class="white category-grid-box-1 ">
                                    <div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="front-assets/images/posting/7.jpg" class="img-responsive">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                       <!-- Ad Title -->
                                       <h3>
                                          <a title="" href="single-page-listing.html">2015 Lamborghini Huracan</a>
                                       </h3>
                                       <!-- Location -->
                                       <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
                                       <!-- Price -->
                                       <span class="ad-price">$450</span> 
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
                        </div>
                        <!-- Listing Ad Grid -->
                        <div class="clearfix"></div>
                        <div class="text-center">
                           <div class="load-more-btn">
                              <button class="btn btn-lg btn-theme"> View All <i class="fa fa-refresh"></i> </button>
                           </div>
                        </div>
                        <!-- Middle Content Box End -->
                     </div>
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Trending Ads End =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= Statistics Counter =-=-=-=-=-=-= -->
         <div class="funfacts custom-padding parallex">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     <div class="icons">
                        <i class="flaticon-vehicle"></i>
                     </div>
                     <div class="number"><span class="timer" data-from="0" data-to="1238" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     <h4>Total <span>Cars</span></h4>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     <div class="icons">
                        <i class="flaticon-security"></i>
                     </div>
                     <div class="number"><span class="timer" data-from="0" data-to="820" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     <h4>Verified <span>Dealers</span></h4>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     <div class="icons">
                        <i class="flaticon-like-1"></i>
                     </div>
                     <div class="number"><span class="timer" data-from="0" data-to="1042" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     <h4>Active <span>Users</span></h4>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                     <div class="icons">
                        <i class="flaticon-cup"></i>
                     </div>
                     <div class="number"><span class="timer" data-from="0" data-to="34" data-speed="1500" data-refresh-interval="5">0</span>+</div>
                     <h4>Featured <span>Ads</span></h4>
                  </div>
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container -->
         </div>
         <!-- =-=-=-=-=-=-= Statistics Counter End =-=-=-=-=-=-= -->
         <!-- =-=-=-=-=-=-= Blog Section =-=-=-=-=-=-= -->
         <section class="custom-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Content Box -->
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Latest <span class="heading-color"> Blog</span> Post</h1>
                        <!-- Short Description -->
                        <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row">
                        <div class="posts-masonry">
                           <!-- Blog Post-->
                           <div class="col-md-4 col-sm-6 col-xs-12">
                              <div class="blog-post">
                                 <div class="post-img">
                                    <a href="#"> <img class="img-responsive" alt="" src="front-assets/images/posting/15.jpg"> </a>
                                    <div class="user-preview">
                                       <a href="#"> <img src="front-assets/images/users/2.jpg" class="avatar avatar-small" alt=""> </a>
                                    </div>
                                 </div>
                                 <div class="post-info"> <a href="">Aug 30, 2017</a> <a href="#">23 comments</a> </div>
                                 <h3 class="post-title"> <a href="#"> 2017 Bugatti Chiron: Again with the Overkill </a> </h3>
                                 <p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.  																						<a href="#"><strong>Read More</strong></a>
                                 </p>
                              </div>
                           </div>
                           <!-- Blog Post-->
                           <div class="col-md-4 col-sm-6 col-xs-12">
                              <div class="blog-post">
                                 <div class="post-img">
                                    <a href="#"> <img class="img-responsive" alt="" src="front-assets/images/posting/27.jpg"> </a>
                                    <div class="user-preview">
                                       <a href="#"> <img src="front-assets/images/users/2.jpg" class="avatar avatar-small" alt=""> </a>
                                    </div>
                                 </div>
                                 <div class="post-info"> <a href="">Aug 30, 2017</a> <a href="#">23 comments</a> </div>
                                 <h3 class="post-title"> <a href="#"> Ford Mustang EcoBoost Premium Convertible</a> </h3>
                                 <p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.  																						<a href="#"><strong>Read More</strong></a>
                                 </p>
                              </div>
                           </div>
                           <!-- Blog Post-->
                           <div class="col-md-4 col-sm-6 col-xs-12">
                              <div class="blog-post">
                                 <div class="post-img">
                                    <a href="#"> <img class="img-responsive" alt="" src="front-assets/images/posting/9.jpg"> </a>
                                    <div class="user-preview">
                                       <a href="#"> <img src="front-assets/images/users/2.jpg" class="avatar avatar-small" alt=""> </a>
                                    </div>
                                 </div>
                                 <div class="post-info"> <a href="">Aug 30, 2017</a> <a href="#">23 comments</a> </div>
                                 <h3 class="post-title"> <a href="#"> 2010 Audi A5 Auto Premium quattro MY10 </a> </h3>
                                 <p class="post-excerpt"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.  																						<a href="#"><strong>Read More</strong></a>
                                 </p>
                              </div>
                           </div>
                           <!-- Blog Grid -->
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Blog Section End =-=-=-=-=-=-= -->
         <section class="client-section gray">
            <div class="container">
               <div class="row">
                  <div class="col-md-4 col-sm-12 col-xs-12">
                     <div class="margin-top-30">
                        <h3>Why Choose Us</h3>
                        <h2>Our premium Clients</h2>
                     </div>
                  </div>
                  <div class="col-md-8 col-sm-12 col-xs-12">
                     <div class="brand-logo-area clients-bg">
                        <div class="clients-list">
                           <div class="client-logo">
                              <a href="#"><img src="front-assets/images/brands/16.png" class="img-responsive" alt="Brand Image" /></a>
                           </div>
                           <div class="client-logo">
                              <a href="#"><img src="front-assets/images/brands/2.png" class="img-responsive" alt="Brand Image" /></a>
                           </div>
                           <div class="client-logo">
                              <a href="#"><img src="front-assets/images/brands/11.png" class="img-responsive" alt="Brand Image" /></a>
                           </div>
                           <div class="client-logo">
                              <a href="#"><img src="front-assets/images/brands/4.png" class="img-responsive" alt="Brand Image" /></a>
                           </div>
                           <div class="client-logo">
                              <a href="#"><img src="front-assets/images/brands/5.png" class="img-responsive" alt="Brand Image" /></a>
                           </div>
                           <div class="client-logo">
                              <a href="#"><img src="front-assets/images/brands/6.png" class="img-responsive" alt="Brand Image" /></a>
                           </div>
                           <div class="client-logo">
                              <a href="#"><img src="front-assets/images/brands/7.png" class="img-responsive" alt="Brand Image" /></a>
                           </div>
                           <div class="client-logo">
                              <a href="#"><img src="front-assets/images/brands/8.png" class="img-responsive" alt="Brand Image" /></a>
                           </div>
                           <div class="client-logo">
                              <a href="#"><img src="front-assets/images/brands/9.png" class="img-responsive" alt="Brand Image" /></a>
                           </div>
                           <div class="client-logo">
                              <a href="#"><img src="front-assets/images/brands/17.png" class="img-responsive" alt="Brand Image" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
          <!-- =-=-=-=-=-=-= Car Inspection =-=-=-=-=-=-= -->
         <section class="car-inspection section-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12 nopadding hidden-sm">
                     <div class="call-to-action-img-section-right">
                        <img src="front-assets/images/service-team.png" class="wow bounce img-responsive" data-wow-delay="0ms" data-wow-duration="3000ms" alt="">
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
                     <div class="call-to-action-detail-section">
                        <div class="heading-2">
                           <h3> Want To Sale Your Car ?</h3>
                           <h2>Car Inspection</h2>
                        </div>
                        <p> Our CarSure experts inspect the car on over 200 checkpoints so you get complete satisfaction and peace of mind before buying. </p>
                        <div class="row">
                           <ul>
                              <li class="col-sm-4"> <i class="fa fa-check"></i> Transmission</li>
                              <li class="col-sm-4"> <i class="fa fa-check"></i> Steering</li>
                              <li class="col-sm-4"> <i class="fa fa-check"></i> Engine</li>
                              <li class="col-sm-4"> <i class="fa fa-check"></i> Tires</li>
                              <li class="col-sm-4"> <i class="fa fa-check"></i> Lighting</li>
                              <li class="col-sm-4"> <i class="fa fa-check"></i> Interior</li>
                              <li class="col-sm-4">  <i class="fa fa-check"></i> Suspension</li>
                              <li class="col-sm-4">  <i class="fa fa-check"></i> Exterior</li>
                              <li class="col-sm-4">  <i class="fa fa-check"></i> Brakes</li>
                              <li class="col-sm-4">  <i class="fa fa-check"></i> Air Conditioning</li>
                              <li class="col-sm-4">  <i class="fa fa-check"></i> Engine Diagnostics</li>
                              <li class="col-sm-4">  <i class="fa fa-check"></i> Wheel Alignment</li>
                           </ul>
                        </div>
                        <a href="" class="btn-theme btn-lg btn">Schedule Inspection <i class="fa fa-angle-right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- =-=-=-=-=-=-= Car Inspection End =-=-=-=-=-=-= -->
      </div>

@endsection
