<style>
.video-wrapper {
  position: relative;
  padding-bottom: 56.25%;
  height: 0;
}
.video-wrapper object,
.video-wrapper embed,
.video-wrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.cimg{
    width: 500px;
    height: 400px;
}
</style>
@extends('frontend.layouts.app')
@section('header')
@include('frontend.layouts.header')
@endsection

  @section('content')


    <!-- Header -->

    <!-- Top Banner -->

  			<!-- Top Banner -->
  			<div class="banner-area">
  				<div class="banner banner-slide-active fullscreen slide-animate-text slider-arrow--style1 arrow--dark">

  					<!-- Single Banner -->
  					<div class="banner__single right-side--bg fullscreen d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center">
  						<div class="banner__content color--theme text-center">
  							<img src="{{url('/')}}/frontend_asset/images/others-png/bismilla-word-theme.png" alt="bismillah word">
  							<h3>{{__('index.O’ Allah we believe that')}}</h3>
  							<h1>{{__('index.Only you can save us')}}</h1>
  							<div class="banner__content__button">
  								<a href="about-us.html" class="cr-btn cr-btn--theme cr-btn--transparent cr-btn--sm"><span>{{__('index.Learn More')}}</span></a>
  							</div>
  						</div>
  						<div class="banner__side-photo">
  							<img src="{{url('/')}}/frontend_asset/images/others-png/munajat.png" alt="banner side image">
  						</div>
  					</div><!-- //Single Banner -->

  					<!-- Single Banner -->
  					<div class="banner__single right-side--bg fullscreen d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center">
  						<div class="banner__content color--theme text-center">
  							<img src="{{url('/')}}/frontend_asset/images/others-png/bismilla-word-theme.png" alt="bismillah word">
  							<h3>{{__('index.In the name of')}}<strong>{{__('index."Allah"')}}</strong></h3>
  							<h1>{{__('index.Come to the straight path')}}</h1>
  							<div class="banner__content__button">
  								<a href="#" class="cr-btn cr-btn--theme cr-btn--transparent cr-btn--sm"><span>{{__('index.Learn More')}}</span></a>
  							</div>
  						</div>
  						<div class="banner__side-photo">
  							<img src="{{url('/')}}/frontend_asset/images/others-png/munajat.png" alt="banner side image">
  						</div>
  					</div><!-- //Single Banner -->

  				</div>
  			</div><!-- //Top Banner -->


    			<!-- Page Conent -->
    			<main class="page-content">

    				<!-- Pillar Of Islam -->
    				<section class="cr-section islams-pillar-area ptb--120 bg--pattern">
    					<div class="islams-pillars islams-pillars--style-2 d-flex justify-content-between justify-content-lg-center align-items-center flex-wrap flex-xl-nowrap flex-xx-nowrap flex-sp-nowrap">
    						<div class="islams-pillars__content text-left">
    							<h3>{{__('index.Every muslim needs to realise the')}}</h3>
    							<h2>{{__('index.Importance of the “Piller” of Islam')}}</h2>
    							<p><span>{{__('index.Islam')}}</span> {{__('index.is the know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues')}}</p>
    							<a href="about-us.html" class="cr-btn cr-btn--transparent cr-btn--dark cr-btn--sm"><span>{{__('index.Read More')}}</span></a>
    						</div>
    						<div class="pillars d-flex justify-content-lg-between flex-md-wrap justify-content-md-center justify-content-sm-center justify-content-center">
    							<div class="pillar__single wow fadeInRight" data-wow-delay="0s">
    								<div class="pillar__single__inner">
    									<img class="pillar__single__icon" src="{{url('/')}}/frontend_asset/images/pillars/pillar-icon-1.png" alt="pillar 1">
    									<h3>{{__('index.Kalima')}}</h3>
    								</div>
    							</div>
    							<div class="pillar__single wow fadeInRight" data-wow-delay="0.1s">
    								<div class="pillar__single__inner">
    									<img class="pillar__single__icon" src="{{url('/')}}/frontend_asset/images/pillars/pillar-icon-2.png" alt="pillar 2">
    									<h3>{{__('index.Salat')}}</h3>
    								</div>
    							</div>
    							<div class="pillar__single wow fadeInRight" data-wow-delay="0.2s">
    								<div class="pillar__single__inner">
    									<img class="pillar__single__icon" src="{{url('/')}}/frontend_asset/images/pillars/pillar-icon-3.png" alt="pillar 3">
    									<h3>{{__('index.Zakat')}}</h3>
    								</div>
    							</div>
    							<div class="pillar__single wow fadeInRight" data-wow-delay="0.3s">
    								<div class="pillar__single__inner">
    									<img class="pillar__single__icon" src="{{url('/')}}/frontend_asset/images/pillars/pillar-icon-4.png" alt="pillar 4">
    									<h3>{{__('index.Siam')}}</h3>
    								</div>
    							</div>
    							<div class="pillar__single wow fadeInRight" data-wow-delay="0.4s">
    								<div class="pillar__single__inner">
    									<img class="pillar__single__icon" src="{{url('/')}}/frontend_asset/images/pillars/pillar-icon-5.png" alt="pillar 5">
    									<h3>{{__('index.HAJJ')}}</h3>
    								</div>
    							</div>
    						</div>
    					</div>
    				</section><!-- //Pillar Of Islam -->

    				<!-- Activities area -->
    				<section class="cr-section activities-area bg--white pt--120 pb--130">
    					<div class="container">
    						<div class="row">
    							<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
    								<div class="section-title text-center">
    									<h4>{{__('index.Our “Services”')}}</h4>
    									<h2>{{__('index.Here is our Services')}}</h2>
    									<p><span>{{__('index.Alfaisal Islamic Centre')}}</span> {{__('index. serve as locations for prayer, Ramadan vigils, funeral services, Sufi ceremonies, marriage and business agreements, alms collection and distribution, as well as homeless shelters.')}}</p>
    								</div>
    							</div>
    						</div>
    						<div class="activity-slider-active slider-arrow--style2">

    							<!-- Single Activity -->
                                @php
                                $i=1;
                                $class = '';             
                                @endphp

                  @foreach($services as $dta)

    							<div class="activity-wrap" style="height:480px;">
    								<figure class="activity" >
    									<div class="activity__thumb">
                                				
                                            <a href="{{url('/services_detail',$dta->id)}}">
    											<img src="{{url('/assets/services')}}/{{$dta->image}}" alt="activity image" style="height: 250px; width: 350px;">
    										</a>
                                          
    									</div>
    									<figcaption class="activity__content text-center" >
    										<h3><a href="{{url('/services_detail',$dta->id)}}">{{$dta->servicetitle}}</a></h3>
    										
                        <p>{!!Illuminate\Support\Str::limit($dta->description, 300,'...')!!}</p>

    									</figcaption>
    								</figure>
    							</div><!-- //Single Activity -->
                  @endforeach








    						</div>
    					</div>
    				</section><!-- //Activities area -->

    				<!-- Salat times area -->
    				<section class="cr-section salat-times-area">
    					<div class="salat-times large--width d-flex align-items-center justify-content-center">
    						<div class="salat-times__inner text-center">
    							<div class="container">
    								<div class="row">
    									<div  class="col-lg-10 offset-lg-1">
    										<h2>{{__('index.Time of Salat')}}</h2>
    										<!-- <h4>Prayer Times</h4> -->
    										<div class="salat-times__boxes d-flex flex-sm-wrap flex-wrap justify-content-md-between justify-content-center flex-md-nowrap">
    											<!-- <div class="salat-times__box">
    												<h4>Fajr</h4>
    												<span class="fajr"></span>
    											</div>
    											<div class="salat-times__box">
    												<h4>Dhuhr</h4>
    												<span class="dhuhr"></span>
    											</div>
    											<div class="salat-times__box">
    												<h4>Asr</h4>
    												<span class="asr"></span>
    											</div>
    											<div class="salat-times__box">
    												<h4>Maghrib</h4>
    												<span class="maghrib"></span>
    											</div>
    											<div class="salat-times__box">
    												<h4>Isha</h4>
    												<span class="isha"></span>
    											</div> -->
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</section><!-- //Salat times area -->

    				<!-- Upcoming Events -->
    				<section class="cr-section events-area bg--white ptb--150">
    					<div class="container">
    						<div class="row">
    							<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
    								<div class="section-title text-center">
    									<h4>{{__('index.Our “Events”')}}</h4>
    									<h2>{{__('index.Upcoming Events')}}</h2>
    									<p><span>{{__('index.Alfaisal Islamic Centre')}}</span>{{__('index.conducts events, conferances and compititions and meeting for the peoples where they can get infomation and participates in these events.')}}</p>
    								</div>
    							</div>
    						</div>
    						<div class="row">
    							<div class="col-lg-12">
    								<div class="events2">

    									@foreach($events as $event)
    									<article class="event-single video--event">
    										<div class="event-single__thumb">
    											<!-- <a class="video--trigger" href="https://www.youtube.com/watch?v=6I40BWTk95E"> -->
    												<img src="{{url('/assets/events')}}/{{$event->image}}" style="height:200px;width:250px;" alt="event thumb">
    											</a>
    											<div class="event-single__date">
    												<h3>{{$event->date}}</h3>
    											</div>
    										</div>
    										<div class="event-single__content">
    											<h3><a href="event-details.html">{{$event->title}}</a></h3>

    											<div class="event-single__content__location">
    												<p><i class="icofont icofont-institution"></i>{{$event->venue}}</p>
    												<p><i class="icofont icofont-wall-clock"></i> {{$event->time}}</p>
    											</div>
    										</div>
    									</article><!-- //Event Single -->
                      @endforeach



    								</div>
    							</div>
    						</div>
    					</div>
    				</section><!-- //Upcoming Events -->

    				<!--  Offer Donation Area -->
    				<!-- <div class="offer-donation-area bg--pattern ptb--90">
    					<div class="offer-donation__inner d-flex flex-wrap flex-lg-nowrap align-items-center">
    						<div class="offer-donation__offer offer d-flex align-items-center flex-wrap flex-sm-nowrap">
    							<div class="offer__thumb text-lg-center">
    								<img class="wow fadeInLeft" src="{{url('/')}}/frontend_asset/images/others-png/offer-thumb-small.png" alt="offer thumb">
    							</div>
    							<div class="offer__content text-center">
    								<h2>Special Discount on...</h2>
    								<h4>Hajj & Umrah package </h4>
    								<img src="{{url('/')}}/frontend_asset/images/others-png/kaba-small.png" alt="kaba">
    								<div class="offer__content__button">
    									<a href="contact.html" class="cr-btn cr-btn--transparent cr-btn--sm"><span>Contact Us</span></a>
    								</div>
    							</div>
    						</div>
    						<div class="offer-donatino__donation">
    							<div class="donation-wantend text-center">
    								<h2>Donation wanted for...</h2>
    								<h5>Mosque development & kid’s school</h5>
    								<p>Islam is the know how to pursue pleasure rationally encounter consequences that are extremely painful again is there anyone who loves or pursues or desires to obtain pain of itself</p>
    								<div class="donation-wantend__form">
    									<form action="#">
    										<input type="text" placeholder="Your amount here">
    										<button class="cr-btn cr-btn--black"><span>DONATE NOW</span></button>
    									</form>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
            <!-- // Offer Donation Area -->

    				<!-- Team Area -->
    				<section class="cr-section team-area ptb--150 bg--white">
    					<div class="container">
    						<div class="row">
    							<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
    								<div class="section-title text-center">
    									<h4>{{__('index.Our “Team”')}}</h4>
    									<h2>{{__('index.Meet our Organizer')}}</h2>
                      <p><span>{{__('index.Alfaisal Islamic Centre')}}</span>
    									{{__('index.have very passionate team members who are performing their duty with huge responsibilities.')}}</p>
    								</div>
    							</div>
    						</div>
    						<div class="row">
    							<!-- Single Team -->
                  @foreach($imams as $imam)
    							<div class="col-lg-6 col-md-6 col-xl-3">
    								<figure class="team-member wow fadeInUp" style="height:400px;">
    									<div class="team-member__thumb">
    										<div class="hexagon">
    											<div class="hexagon__inner1">
    												<div class="hexagon__inner2">
                                                        <a href="{{url('/team_detail',$imam->id)}}">
    													<img src="{{url('/assets/imams')}}/{{$imam->image}}" alt="team member 1"></a>
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
    					</div>
    				</section><!-- //Team Area -->


            <section class="cr-section team-area ptb--150 bg--white">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
                    <div class="section-title text-center">
                      <h4>{{__('index.Our “Videos”')}}</h4>
                      <h2>{{__('index.Watch our Videos')}}</h2>
                      <p>{{__('index.you can find informative videos here consist of islamic content.')}}</p>
                    </div>
                  </div>
                </div>
                <div class="video-wrapper">
                  @foreach($videos as $video )
                  <div class="">
                    <div>
                    {!!$video->video_embed_src!!}
                  </div>
                  </div>
                @endforeach



                </div>
              </div>
            </section><!-- //Team Area -->

    				<!-- Product Area -->
    				<div class="product-area ptb--150 bg--pattern">
    					<div class="container">
    						<div class="row">
    							<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
    								<div class="section-title text-center">
    									<h4>{{__('index.Our “Courses”')}}</h4>
    									<h2>{{__('index.View our Courses')}}</h2>
                      <p><span>{{__('index.Alfaisal Islamic Centre')}}</span>
    									Islam is the know how to pursue pleasure rationally encounter consequences that are extremely painful again is there anyone who loves or pursues or desires to obtain pain of itself</p>
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="products d-flex justify-content-center flex-wrap">
                @foreach($courses as $course)
                <div class="product">
                  <div class="product__thumb">
                    <img class="cimg" src="{{url('/assets/courses')}}/{{$course->image}}" alt="product thumb">
                  </div>
                  <div class="product__content">
                    <h5 ><a href="product-details.html" style="color:black;">{{$course->coursetitle}}</a></h5>
                    <!-- <span class="product-price">$15</span> -->
                  </div>
                  <div class="product__action">
                    <ul>
                      <!-- <li><a href="cart.html"><i class="fa fa-opencart"></i></a></li>
                      <li><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></li> -->
                    </ul>
                  </div>
                </div><!-- //Single Product -->

              @endforeach






    					</div>
    				</div><!-- //Product Area -->

    				<!-- Blog Area -->
    				<section class="cr-section blog-area pt--150 pb--140 bg--white">
    					<div class="container">
    						<div class="row">
    							<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
    								<div class="section-title text-center">
    									<h4>From “Blog”</h4>
    									<h2>Latest Blog Post</h2>
    									<p>Islam is the know how to pursue pleasure rationally encounter consequences that are extremely painful again is there anyone who loves or pursues or desires to obtain pain of itself</p>
    								</div>
    							</div>
    						</div>
    						<div class="row">

    							<!-- Start Single Blog -->
                  @foreach($posts as $post)
    							<div class="col-lg-6 col-md-6 col-xl-3">
    								<article class="blog wow fadeInUp">
    									<div class="blog__thumb">
    										<a href="blog-details.html">
    											<img src="{{url('/assets/blogposts')}}/{{$post->image}}" alt="single blog thumb">
    										</a>
    									</div>
    									<div class="blog__content">
    										<div class="blog__content__meta">
    											<p>{{$post ->created_at->format('M d Y')}} - <a href="blogs.html">Admin</a></p>
    										</div>
    										<h4 class="blog-title"><a href="blog-details.html">{{$post->posttitle}}</a></h4>
    										<!-- <p>Islam is the know how to pursuesure nally encounter consequences  extremely </p> -->
    										<a href="blog-details.html" class="cr-readmore">Read</a>
    									</div>
    								</article>
    							</div><!-- //Start Single Blog -->

    						@endforeach




    						</div>
    					</div>
    				</section><!-- //Blog Area -->

    			</main><!-- //Page Conent -->

    <!-- Footer -->

    <!-- Login Form -->
    @section('modals')
    @include('frontend.layouts.modals')
    @endsection
    <!-- Cartbox -->




  @endsection


@section('footer')
@include('frontend.layouts.footer')
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function(){
  jQuery(function($) {
   $.getJSON('https://muslimsalat.com/lahore.json?key=29320dd59cfde6394ee5d8378cd43d5b&jsoncallback=?', function (times)
   {
     $('.fajr') .append(times.items[0].fajr);
     $('.dhuhr') .append(times.items[0].dhuhr);
     $('.asr') .append(times.items[0].asr);
     $('.maghrib') .append(times.items[0].maghrib);
     $('.isha') .append(times.items[0].isha);
   });
});
});

</script>
@endpush()
