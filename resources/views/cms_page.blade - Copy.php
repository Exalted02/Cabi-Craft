@extends('layouts.app')

@section('content')
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
		 <section class="custom-padding about-us">
            <div class="container">
				<div class="heading-panel">
                    <div class="col-xs-12 col-md-12 col-sm-12 left-side">
                        <!-- Main Title -->
                        <h1>{{ $data->cms_page_name ?? ''}}</h1>
                    </div>
                </div>
               <div class="row margin-top-20">
					<div class="col-md-12">
						<p>{!! $data->cms_page_content ?? '' !!}</p>
					</div>
               </div>
            </div>
        </section>
    </div>
    
   @endsection



