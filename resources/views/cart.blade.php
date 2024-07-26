@extends('layouts.app')
@section('content')
<div class="cartrow">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <p>
                        HAPPY LIFE INTERIORS LLP.
                        SITE NO.33 & 43, SY NO.13/6, AT KALKERE
                        VILLAGE,K R PURAM HOBLI, BANGALORE
                        EAST TALUK KARNATAKA-560043.
                    </p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <p><b>Project Type :<u> Job Work</b></u></p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <p>Date :- 07-July-24<br>
                        Valid Until :-<br>
                        Order ID :-<br>
                        Customer Name :- Mr.Kumar<br>
                        Address :- 9-22,11th cross banjara<br>
                        layout ,Bangalore - 450067</p> 
                </div>
            </div>
        </div>
    </div>
    <div class="profile">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cabinet Type</th>
                        <th>product_images</th>
                        <th>Length</th>
                        <th>Deep </th>
                        <th>QTY</th>
                        <th>C.C Material</th>
                        <th>C.C colour </th>
                        <th>Expo side</th>
                        <th>Expo Colour</th>
                        <th>Shutter Colour</th>
                        <th>Leg Type</th>
                        <th> Skthigh</th>
                        <th>Handel Type </th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="14">Kitchen</td>
                    </tr>
                    <tr>
                        <td>1 </td>
                        <td>Base Cabinet 1 Shutters (with out shelf)</td>
                        <td>Row </td>
                        <td>500 </td>
                        <td>720 </td>
                        <td>560 </td>
                        <td>1 </td>
                        <td>(MR)_Ply </td>
                        <td>White </td>
                        <td>Without Expo </td>
                        <td>21091 HGl </td>
                        <td>HDHMR </td>
                        <td>21091 </td>
                        <td>No-skt </td>
                        <td>100 </td>
                    </tr>
                    <tr>
                        <td>2 </td>
                        <td>Base Cabinet,1 shutter +1 Shelf.</td>
                        <td>Row </td>
                        <td>450 </td>
                        <td>720 </td>
                        <td>560 </td>
                        <td>1 </td>
                        <td>(BWP)_Ply </td>
                        <td>White </td>
                        <td>Without Expo </td>
                        <td>21091 HGl </td>
                        <td>HDHMR </td>
                        <td>21091 </td>
                        <td>No-skt </td>
                        <td>100 </td>
                    </tr>
                        <tr class="sub-total-row">
                        <td colspan="11"></td>
                        <td colspan="2">Sub Total Rs. </td>
                        <td colspan="2">₹ 1,625,690.00 </td>
                    </tr>
                    <tr class="gst-row">
                        <td colspan="11"></td>
                        <td colspan="1">GST</td>
                        <td colspan="1">18% </td>
                        <td colspan="2">₹ 292,624.20</td>
                    </tr>
                    <tr class="Total-row">
                        <td colspan="11"></td>
                        <td colspan="2">Total </td>
                        <td colspan="2">₹ 1,918,314.20 </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <h4 class="special-heading">special Notice and instructions</h4>
        <p>All prices and spifications are subject to change without notice at any time.<br>
          This prelim design & quote is valid for a 45 days.</p>
        <h5 class="special-heading">WHAT IS INCLUDEDS </h5>
        <P>All Text Includeds.
        <br>price include  cost  of transportaction.
        <br>price include  of 5 years warenty & 3 free servis.</P>
        <h4 class="special-heading">special Notice and instructions</h4>
        <p>1.the warranty shall aplly only.
        <br>2.price include  of 5 years warenty & 3 free servis.</P>
   </div>
    <div>
        <button type="button" class="btn btn-danger " aria-label="Close">Cancel</button>
        <button type="button" class="btn btn-success pull-right" aria-label="Close" >order</button>         
    </div>


</div>
@endsection