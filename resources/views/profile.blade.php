@extends('layouts.app')
@section('content')
<div class="profilerow">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <!-- Sidebar Widgets -->
                    <div class="blog-sidebar">
                        <!-- Categories --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Categories</a></h4>
                           </div>
                           <div class="widget-content categories">
                              <ul>
                                 <li> <a href=""> Computer and IT <span>(121)</span> </a> </li>
                                 <li> <a href=""> Animal <span>(54)</span> </a> </li>
                                 <li> <a href=""> Electronics<span>(313)</span> </a> </li>
                                 <li> <a href=""> Real Estate<span>(23)</span> </a> </li>
                                 <li> <a href=""> Mobile / Laptop <span>(142)</span> </a> </li>
                                 <li> <a href=""> Car / Bike <span>(120)</span> </a> </li>
                              </ul>
                           </div>
                        </div>
                        <!-- Latest News --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Latest News</a></h4>
                           </div>
                           <div class="widget-content recent-ads">
                              <!-- Ads -->
                              <div class="recent-ads-list">
                                 <div class="recent-ads-container">
                                    <div class="recent-ads-list-image">
                                       <a href="#" class="recent-ads-list-image-inner">
                                       <img src="images/posting/thumb-1.jpg" alt="">
                                       </a><!-- /.recent-ads-list-image-inner -->
                                    </div>
                                    <!-- /.recent-ads-list-image -->
                                    <div class="recent-ads-list-content">
                                       <h3 class="recent-ads-list-title">
                                          <a href="#">2010 Audi A5 Auto Premium quattro MY10</a>
                                       </h3>
                                       <ul class="recent-ads-list-location">
                                          <li><a href="#">New York</a></li>
                                       </ul>
                                       <!-- /.recent-ads-list-price -->
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
                                       <img src="images/posting/thumb-2.jpg" alt="">
                                       </a><!-- /.recent-ads-list-image-inner -->
                                    </div>
                                    <!-- /.recent-ads-list-image -->
                                    <div class="recent-ads-list-content">
                                       <h3 class="recent-ads-list-title">
                                          <a href="#">Honda Civic 2017 Sports Edition With Turbo</a>
                                       </h3>
                                       <ul class="recent-ads-list-location">
                                          <li><a href="#">Brooklyn</a></li>
                                       </ul>
                                       <!-- /.recent-ads-list-price -->
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
                                       <img src="images/posting/thumb-3.jpg" alt="">
                                       </a><!-- /.recent-ads-list-image-inner -->
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
                                       <img src="images/posting/thumb-4.jpg" alt="">
                                       </a><!-- /.recent-ads-list-image-inner -->
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
                                    <!-- /.recent-ads-list-content -->
                                 </div>
                                 <!-- /.recent-ads-container -->
                              </div>
                              <!-- Ads -->
                              <div class="recent-ads-list">
                                 <div class="recent-ads-container">
                                    <div class="recent-ads-list-image">
                                       <a href="#" class="recent-ads-list-image-inner">
                                       <img src="images/posting/thumb-5.jpg" alt="">
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
                        <!-- Archives --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Archives</a></h4>
                           </div>
                           <div class="widget-content">
                              <ul>
                                 <li><a href="#">August 2017</a></li>
                                 <li><a href="#">July 2017</a></li>
                                 <li><a href="#">June 2017 </a></li>
                                 <li><a href="#">May 2017  </a></li>
                                 <li><a href="#">April 2014 </a></li>
                              </ul>
                           </div>
                        </div>
                        <!-- Gallery --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Gallery</a></h4>
                           </div>
                           <div class="widget-content gallery">
                              <div class="gallery-image">
                                 <a href="#"><img alt="" src="images/blog/small-5.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-6.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-7.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-8.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-9.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-10.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-1.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-2.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-3.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-4.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-11.png">
                                 </a>
                                 <a href="#"><img alt="" src="images/blog/small-12.png">
                                 </a>
                              </div>
                           </div>
                        </div>
                        <!-- Tags --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Tags cloud</a></h4>
                           </div>
                           <div class="widget-content">
                              <div class="tagcloud">
                                 <a href="#.">Hair</a>
                                 <a href="#.">Waxing</a>
                                 <a href="#.">Body</a>
                                 <a href="#.">Oil</a>
                                 <a href="#.">Facials</a>
                                 <a href="#.">Cutting</a>
                                 <a href="#.">Blowouts</a>
                                 <a href="#.">Curling</a>
                                 <a href="#.">Makeup</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Sidebar Widgets End -->
                </div>
                <div class="col-md-8 col-sm-8">
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection