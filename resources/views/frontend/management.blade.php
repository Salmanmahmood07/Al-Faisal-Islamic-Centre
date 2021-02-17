<style>
.video-container iframe{
  max-width: 100%;
  max-height: 300px;
  border: 3px solid rgb(221, 221, 221);
border-radius: 4px;
}
</style>
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
  								<h2 class="cr-breadcrumb__title">Our Team</h2>
  								<div class="cr-breadcrumb__tree text-left text-md-left text-center">
  									<ul>
  										<li><a href="index.html">Home</a></li>
  										<li>Team </li>
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
              @foreach($members as $imam)
              <div class="col-lg-6 col-md-6 col-xl-3">
                <figure class="team-member wow fadeInUp" style="height:400px;">
                  <div class="team-member__thumb">
                    <div class="hexagon">
                      <div class="hexagon__inner1">
                        <div class="hexagon__inner2">
                          <a href="{{url('/team_detail',$imam->id)}}">
                          <img src="{{url('/assets/imams')}}/{{$imam->image}}" alt="team member 1">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <figcaption class="team-member__content">
                    <h3>{{$imam->imamname}}</h3>
                    <h5>{{$imam->designation}}</h5>
                  </figcaption>
                </figure>
              </div>
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
    @section('modals')
    @include('frontend.layouts.modals')
    @endsection
    <!-- Cartbox -->




  @endsection

@section('footer')
@include('frontend.layouts.footer')
@endsection
