	<div>
	<!-- Master Slider -->
      <div class="master-slider ms-skin-default" id="masterslider">
         <!-- slide 1 -->
         <div class="ms-slide slide-1"  data-delay="5">
            <!-- slide background --> 
            <img src="js/masterslider/style/blank.gif" data-src="{{ url('images/banner.jpg') }}" alt="Slide1 background"/>            
            <h3 class="ms-layer title4 font-black font-uppercase font-thin-xs"
               style="left:120px; top:150px;"
               data-type="text"
               data-delay="2000"
               data-duration="2000"
               data-ease="easeOutExpo"
               data-effect="skewleft(30,80)">All Your Design Modules</h3>
            <h3 class="ms-layer title4 font-white font-thin-xs"
               style="left:120px; top:210px;"
               data-type="text"
               data-delay="2500"
               data-duration="2000"
               data-ease="easeOutExpo"
               data-effect="skewleft(30,80)"><span class="font-color font-thin-xs heading-color">You can bring into live</span></h3>
			   {{--<h5 class="ms-layer text1 font-white"
               style="left: 120px; top: 280px;"
               data-type="text"
               data-effect="bottom(45)"
               data-duration="2500"
               data-delay="3000"
               data-ease="easeOutExpo">Lorem Ipsum is simply dummy text of the printing typesetting<br>
               industry is proident sunt in culpa officia deserunt mollit.
            </h5>
            <a class="ms-layer btn3 uppercase"
               style="left:120px; top: 390px;"
               data-type="text"
               data-delay="3500"
               data-ease="easeOutExpo"
               data-duration="2000"
               data-effect="scale(1.5,1.6)">Search Cars</a> --}}
         </div>
         <!-- end of slide --> 
         <!-- slide 2 -->
         <div class="ms-slide slide-3" data-delay="5">
            <!-- slide background --> 
            <img src="js/masterslider/style/blank.gif" data-src="{{ url('images/banner1.jpg') }}" alt="Slide1 background"/>
            <h3 class="ms-layer title4 font-black font-uppercase font-thin-xs"
               style="left:120px; top:150px;"
               data-type="text"
               data-delay="2000"
               data-duration="2000"
               data-ease="easeOutExpo"
               data-effect="skewleft(30,80)">Cupboards Made for</h3>
            <h3 class="ms-layer title4 font-white font-thin-xs"
               style="left:120px; top:210px;"
               data-type="text"
               data-delay="2500"
               data-duration="2000"
               data-ease="easeOutExpo"
               data-effect="skewleft(30,80)"><span class="font-color font-thin-xs heading-color">Designers and Architects.</span></h3>
            <h5 class="ms-layer text1 font-white"
               style="left: 120px; top: 280px;"
               data-type="text"
               data-effect="bottom(45)"
               data-duration="2500"
               data-delay="3000"
               data-ease="easeOutExpo">No more hassle of buying raw materials and working with multiple contractors.<br>
				Just buy the “CABICRAFT”has all the products that are in your design.
            </h5>
         </div>
         <!-- slide 2 -->
         <!-- end of slide --> 
      </div>
      <!-- end Master Slider -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
      <!-- =-=-=-=-=-=-= About CarSpot =-=-=-=-=-=-= -->
         <section class="custom-padding about-us">
            <div class="container">
               <div class="row">
               <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>The new experience using <span class="heading-color">Cabicraft  </span> products</h1>
                        <!-- Short Description -->
                        <p class="heading-text">From Kitchen to Wardrobes, Hinged to Sliding, Laminate toLacquer glass – Deliver your design with ease using“CABICRAFT” products.</p>
                     </div>
                  </div>
               </div>
               
               <div class="row margin-top-20">
                  <div class="col-md-4 col-xs-12 col-sm-6">
                     <!-- services grid -->
                     <div class="services-grid">
                        <div class="icons"><i class="fa fa-inr"></i></div>
                        <h4><b>Estimate in Minutes</b></h4>
                        <p>Just tag our Products to your designs and get the estimate in minutes.</p>
                     </div>
                  </div>
                  <div class="col-md-4 col-xs-12 col-sm-6">
                     <!-- services grid -->
                     <div class="services-grid">
                        <div class="icons"><i class="flaticon-engine-2"></i></div>
                        <h4><b>1000s of Products</b></h4>
                        <p></p>
                     </div>
                  </div>
                  <div class="col-md-4 col-xs-12 col-sm-6">
                     <!-- services grid -->
                     <div class="services-grid">
                        <div class="icons"><i class="flaticon-security"></i></div>
                        <h4> 7 Year Warranty</h4>
                        <p>We offer 5 to 7 year warranty on all our product and finishes.</p>
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
                        <h1><span class="heading-color"> Our Modules in Action</span></h1>
                        <!-- Short Description -->
                        <p class="heading-text">From Kitchen to Wardrobes, Hinged to Sliding, Laminate toLacquer glass – Deliver your design with ease using“CABICRAFT” products.</p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row">
                        <div class="featured-slider container owl-carousel owl-theme">
						@foreach($data as $product)
                           <div class="item">
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <!-- Ad Box -->
                                 <div class="white category-grid-box-1 ">
								 {{--<div class="featured-ribbon">
                                       <span>Featured</span>
                                    </div>--}}
                                    <!-- Image Box -->
                                    <div class="image"> <img alt="Carspot" src="{{ asset('admin-assets/images/product/' .$product->image) }}" class="img-responsive" height="100" width="70">
                                    </div>
                                    <!-- Short Description -->
                                    <div class="short-description-1 ">
                                       <!-- Category Title -->
                                       <!-- Location -->
                                       <p > {{ $product->name }}, {{ \Illuminate\Support\Str::limit($product->description, 30) }}</p><p> {{ $product->size }}</p>
                                       <!-- Price -->
                                       <span class="ad-price">Rs.{{ $product->price }}</span> 
                                    </div>
                                    <!-- Ad Meta Stats -->
                                    <div class="ad-info-1" style="display: flex; justify-content: center; align-items: center;">
                                    <button type="button" class="btn btn-danger">add to cart</button>
                                    </div>
                                 </div>
                                 <!-- Ad Box End -->
                              </div>
                           </div>
						  @endforeach
                           {{--<div class="item">
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
                                       <!-- Location -->
                                       <p > Base Cabinet,1 shutter
                                       +1 Shelf</p><p>720 H x 600 W x 560 D                                       </p>
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
                           </div>--}}
                           {{--<div class="item">
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
                                       <!-- Location -->
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
                           </div>--}}
                           {{--<div class="item">
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
                                       <!-- Location -->
                                       <p > Base Cabinet, 2 SS Drawers(2L Plain Baskets)</p><p>Rs.3500720 H x 600 W x 560 D</p>
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
                           </div>--}}
                        </div>
                     </div>
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
               <div class="" style="display: flex; justify-content: center; align-items: center;">
               <a href="{{url('browsecatalogue')}}" class="btn btn-primary" >Browse Catalogue</a>
               </div>
         </section>
         
         <!-- =-=-=-=-=-=-= Featured Ads End =-=-=-=-=-=-= -->
      </div>
      </div>
