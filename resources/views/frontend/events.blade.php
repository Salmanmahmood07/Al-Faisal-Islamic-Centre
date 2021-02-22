@extends('frontend.layouts.app')
@section('header')
@include('frontend.layouts.header')
@endsection

  @section('content')


    <!-- Header -->

    <!-- Top Banner -->

  			<section class="cr-section breadcrumb-area" data-black-overlay="7">
  				<div class="container">
  					<div class="row">
  						<div class="col-lg-12 text-center">
  							<div class="cr-breadcrumb text-center">
  								<h2 class="cr-breadcrumb__title">Events</h2>
  								<div class="cr-breadcrumb__tree text-left text-md-left text-center">
  									<ul>
  										<li><a href="index.html">Home</a></li>
  										<li>Events</li>
  									</ul>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</section>

    <!-- Page Conent -->

    			<!-- Page Conent -->
    			<main class="page-content">

    				<div class="events-grid ptb--150 bg--white">
    					<div class="container">
    						<div class="row">
    							<div class="col-lg-12">
    								<div class="events2">

    									<!-- Event Single -->
                      @foreach($events as $event)
    									<article class="event-single wow fadeInLeft">
    										<div class="event-single__thumb">
    											<a  href="{{url('/event_detail',$event->id)}}">
    												<img src="{{url('/assets/events')}}/{{$event->image}}" style="height:250px;width:350px;" alt="event thumb">
    											</a>
    											<div class="event-single__date">
    											<h3>{{  date("d M Y", strtotime($event->date)) }}</h3>
                          
    											</div>
    										</div>
    										<div class="event-single__content">
    												<h3><a href="{{url('/event_detail',$event->id)}}">{{$event->title}}</a></h3>
                            <p>{!!Illuminate\Support\str::limit($event->description, 300,'...')!!}</p>

                          <div class="event-single__content__location">
    												<p><i class="icofont icofont-institution"></i>{{$event->venue}}</p>
    												<p><i class="icofont icofont-wall-clock"></i> {{$event->time}}</p>

    											</div>
                          <a href="{{url('/event_detail',$event->id)}}" class="cr-readmore">More Details</a>
    										</div>
    									</article><!-- //Event Single -->

                      @endforeach





    								</div>
    								<div class="cr-pagination text-right">
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
    					</div>
    				</div>

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
