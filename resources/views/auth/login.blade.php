@extends('layouts.app')
@section('content')
<div class="loginrow">
    <div class="row">
        <!-- Middle Content Area -->
        <div class="col-md-12 doted">
            <div class="row">
                <div class="col-md-4 col-sm-6 gride">
                    <div class="form-grid">
                        <form method="POST" action="{{ route('login') }}">
						@csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email"  placeholder="Your Email" class="form-control" :value="old('email')" autofocus>
								<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
								<x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                            </div>
                            {{--<div class="form-group">
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
                            </div>--}}
                            <button type="submit" class="btn btn-theme btn-lg btn-block">Login With Us</button>
                            <h2 class="no-span"><b>(OR)</b></h2>
                            <a class="btn btn-lg btn-block btn-social btn-facebook">
                                <span class="fa fa-facebook"></span> Sign in with Facebook
                            </a>
                            <a class="btn btn-lg btn-block btn-social btn-google">
                                <span class="fa fa-google"></span> Sign in with Google
                            </a>
                        </form>
                    </div>
                </div>
            
                <!-- Middle Content Area End -->

                <!-- Blog Post -->
            
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="image-container">
                            <div class="page-specific-section">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                    <h4 style="margin-top: 20px;"><b>Kitchen</b></h4>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                    <h4 style="margin-top: 20px;"><b>Laundry</b></h4>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                    <h4 style="margin-top: 20px;"><b>Bedroom</b></h4>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                    <h4 style="margin-top: 20px;"><b>Bathroom</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-excerpts">
                        <p>
                        No more hassle of buying raw materials and working with multiple contractors.
                        Just buy the “CABICRAFT” has all the products that are in your design.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>
@endsection