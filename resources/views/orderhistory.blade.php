@extends('layouts.app')

@section('content')
<div class="profilerow">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-sm-6">
            <div class="blog-sidebar">
                <div class="widget">
                    <div class="widget-heading">
                        <h4 class="panel-title"><a>Categories</a></h4>
                    </div>
                    <div class="widget-content categories">
                        <ul>
                            <li><a href="{{ url('orderhistorys') }}">Order History</a></li>
                            <li><a href="{{ url('profilepage') }}">Profile</a></li>
                            <li><a href="{{ url('offerpage') }}">Offers</a></li>
                            <li><a href="{{ url('settingpage') }}">Settings</a></li>
                            <li><a href="#">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-md-9 col-sm-12">
            <div class="profile">
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cabinet Type</th>
                                <th>Product Images</th>
                                <th>Length</th>
                                <th>Deep</th>
                                <th>QTY</th>
                                <th>C.C Material</th>
                                <th>C.C Colour</th>
                                <th>Expo Side</th>
                                <th>Expo Colour</th>
                                <th>Shutter Colour</th>
                                <th>Leg Type</th>
                                <th>Skthigh</th>
                                <th>Handle Type</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="14">Kitchen</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Base Cabinet 1 Shutters (without shelf)</td>
                                <td>Row</td>
                                <td>500</td>
                                <td>720</td>
                                <td>560</td>
                                <td>1</td>
                                <td>(MR)_Ply</td>
                                <td>White</td>
                                <td>Without Expo</td>
                                <td>21091 HGl</td>
                                <td>HDHMR</td>
                                <td>21091</td>
                                <td>No-skt</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Base Cabinet, 1 shutter + 1 Shelf</td>
                                <td>Row</td>
                                <td>450</td>
                                <td>720</td>
                                <td>560</td>
                                <td>1</td>
                                <td>(BWP)_Ply</td>
                                <td>White</td>
                                <td>Without Expo</td>
                                <td>21091 HGl</td>
                                <td>HDHMR</td>
                                <td>21091</td>
                                <td>No-skt</td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
