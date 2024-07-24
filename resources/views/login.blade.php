@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <!-- Middle Content Area -->
        <div class="col-md-12 dotted">
            <div class="row">
                <div class="col-md-4 col-sm-6">
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
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <div class="row">
                        <div class="image-container">
                            <div class="col-md-3 col-sm-6 col-XS-12">
                                <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                <h4>Kitchen</h4>
                            </div>
                            <div class="col-md-3 col-XS-6">
                                <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                <h4>Laundry</h4>
                            </div>
                            <div class="col-md-3 col-XS-6">
                                <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                <h4>Bedroom</h4>
                            </div>
                            <div class="col-md-3 col-SX-6">
                                <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                <h4>Bathroom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="passage">No more hassle of buying raw materials and working with multiple contractors. Just buy the "CABICRAFT" has all the products that are in your design.</p>
                        </div>
                    </div>
                </div>
                <!-- Blog Post End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>
@endsection