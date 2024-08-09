@extends('layouts.app')
@section('content')

<div class="loginrow">
    <div class="row">
        <!-- Middle Content Area -->
        <div class="col-md-12 doted">
            <div class="row">
                <div class="col-md-4 col-sm-6 gride">
                    <div class="form-grid">
                        <form method="POST" action="{{ route('register') }}">
						@csrf
                            <div class="form-group">
                                <label>Name</label>
								<input type="text" id="name" name="name"  placeholder="Your Name" class="form-control" value="{{ old('name') }}" autofocus>
								<x-input-error :messages="$errors->get('name')" class="text-danger" />
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" id="contact_number" name="contact_number"  placeholder="Your Contact number" class="form-control" value="{{ old('contact_number') }}">
								<x-input-error :messages="$errors->get('contact_number')" class="text-danger" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email" placeholder="Your Email" class="form-control" value="{{ old('email') }}">
								<x-input-error :messages="$errors->get('email')" class="text-danger" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" class="form-control" type="password" name="password" autocomplete="password" placeholder="Password" value="{{ old('password') }}"/>
								<x-input-error :messages="$errors->get('password')" class="text-danger" />
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" autocomplete="password" placeholder="Confirm password"/>
								<x-input-error :messages="$errors->get('password_confirmation')" class="text-danger" />
                            </div>
                            <div class="form-group">
                                <div class="row">
									{{--<div class="col-xs-12 col-sm-7">
                                        <div class="skin-minimal">
                                            <ul class="list">
                                            <li>
                                                <input  type="checkbox" id="minimal-checkbox-1">
                                                <label for="minimal-checkbox-1">i agree <a href="#">Terms of Services</a></label>
                                            </li>
                                            </ul>
                                        </div>
                                    </div>--}}
                                    <div class="col-xs-12 col-sm-12 text-right">
                                        <p class="help-block"><a href="{{ route('password.request') }}">Forgot password?</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <button class="btn btn-theme btn-lg btn-block">Register</button>
                            <h2 class="no-span"><b>(OR)</b></h2>
                            <a class="btn btn-lg btn-block btn-social btn-facebook">
                                <span class="fa fa-facebook"></span> Sign up with Facebook
                            </a>
                        
                            <a class="btn btn-lg btn-block btn-social btn-google">
                                <span class="fa fa-google"></span> Sign up with Facebook
                            </a>
                        </form> 
                    </div>
                </div>
            
                <!-- Middle Content Area End -->

                <!-- Blog Post -->
            
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="image-container">
						   @foreach($staticdata as $val)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img alt="" src="{{ asset('admin-assets/images/static/' .$val->image) }}" class="img-responsive">
                                <h4 style="margin-top: 20px;">{{$val->name ?? ''}}</h4>
                            </div>
							@endforeach
                            {{--<div class="col-md-3 col-sm-6 col-xs-12">
                                <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                <h4 style="margin-top: 20px;">Laundry</h4>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                <h4 style="margin-top: 20px;">Bedroom</h4>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img alt="" src="front-assets/images/posting/1.jpg" class="img-responsive">
                                <h4 style="margin-top: 20px;">Bathroom</h4>
                            </div>--}}
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