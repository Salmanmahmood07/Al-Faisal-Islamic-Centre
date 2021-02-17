@extends('frontend.layouts.app')
@section('header')
@include('frontend.layouts.header')
@endsection

  @section('content')



  <!-- Breadcrumb area -->
  			<section class="cr-section breadcrumb-area" data-black-overlay="7">
  				<div class="container">
  					<div class="row">
  						<div class="col-lg-12 text-center">
  							<div class="cr-breadcrumb text-center">
  								<h2 class="cr-breadcrumb__title">Our Images</h2>
  								<div class="cr-breadcrumb__tree text-left text-md-left text-center">
  									<ul>
  										<li><a href="index.html">Home</a></li>
  										<li>Images</li>
  									</ul>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</section><!-- //Breadcrumb area -->
        <!-- Page Conent -->
    <main class="page-content">

      <!-- Shop Page Area -->
      <div class="shop-page-area ptb--150 bg--white">
        <div class="container">
          <div class="shop-page-products">
            <div class="row">
              <!-- Single Team -->
              @foreach($images as $image)
              <div class="col-lg-3  wow fadeInUp">
  									<div class="product">
  										<div class="product__thumb">
                        <img src="{{url('/assets/images')}}/{{$image->image}} "  style="width:250px;height:250px;

                        border: 2px solid rgb(221, 221, 221);
border-radius: 4px;
                        " alt="product thumb">

  										</div>
  										<div class="product__content">
                        <h3><a href="#" style="color:white;">{{$image->imagetitle}}</a></h3>

  										</div>

  									</div>
  								</div><!-- //Single Product -->

              @endforeach<!-- //Single Team -->
              <!-- Single Team -->


            </div>
            <div class="cr-pagination text-center">
              <ul>
                <li><a href="events.html">01</a></li>
                <li class="active"><a href="events.html">02</a></li>
                <li><a href="events.html">03</a></li>
                <li><a href="events.html">04</a></li>
                <li><a href="events.html">05</a></li>
                <li><a href="events.html">06</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div><!-- //Shop Page Area -->

    </main><!-- //Page Conent -->






     <!-- <iframe style="width: 182px; height: 358px; border: 1px solid #ddd;" frameBorder="0" scrolling="no" src="https://www.islamicfinder.org/prayer-widget/"> </iframe>  -->
    @section('modals')
    @include('frontend.layouts.modals')
    @endsection
    <!-- Cartbox -->




  @endsection

@section('footer')
@include('frontend.layouts.footer')
@endsection
