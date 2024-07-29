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
                                 <li> <a href="{{url('orderhistorys')}}"> Order History </a> </li>
                                 <li> <a href="{{url('profilepage')}}"> Profile </a> </li>
                                 <li> <a href="{{url('offerpage')}}"> Offers </a> </li>
                                 <li> <a href="{{url('settingpage')}}">Settings </a> </li>
                                 <li> <a href=""> Long out  </a> </li>
                              </ul>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="post-ad ">
                        <form  class="submit-form">
                        <!-- Title  -->
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label class="control-label">mobile</label>
                                <input class="form-control" placeholder="****" type="text">
                            </div>
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label class="control-label">Transmission Type</label>
                                <input class="form-control" placeholder="address" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <!-- Category  -->
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label class="control-label">email </label>
                                <input class="form-control" placeholder="email" type="text">
                            </div>
                            <!-- Price  -->
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label class="control-label">address</label>
                                <input class="form-control" placeholder="address" type="text">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <!-- Category  -->
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label class="control-label">Photo </label>
                                <input class="form-control" placeholder="Photo" type="text">
                            </div>
                            <!-- Price  -->
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label class="control-label">Body Type</label>
                                <input class="form-control" placeholder="Body" type="text">
                            </div>
                        </div>
                        <div class="btns">
                        <button type="button" class="btn btn-danger pull-right" aria-label="Close" wire:click="return_view_order_form">submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection