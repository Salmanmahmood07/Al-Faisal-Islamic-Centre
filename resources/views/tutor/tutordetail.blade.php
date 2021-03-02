<style>
.img-big {
  /*min-width: 100px;*/
  width: 280px;
  /*min-height: 100px;*/
  min-height: 379px;
}
.img-big2 {
  /*min-width: 100px;*/
  width: 224px;
  /*min-height: 100px;*/
  min-height: 181px;
  max-height: 181px;
}
</style>
@extends('frontend.layouts.app')
@section('header')
@include('frontend.layouts.header')
@endsection

  @section('content')


    <!-- Header -->

    <!-- Top Banner -->

    <!-- Breadcrumb area -->
    <section class="cr-section breadcrumb-area" data-black-overlay="7">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="cr-breadcrumb text-center">
              <h2 class="cr-breadcrumb__title">Tutor Details</h2>
              <div class="cr-breadcrumb__tree text-left text-md-left text-center">
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="events.html">Tutor</a></li>
                  <li>Tutor Details</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- //Breadcrumb area -->
    <!-- Page Conent -->

    <main class="page-content">

    <!-- Event Details Area -->
    <div class="event-details-area ptb--150 bg--white">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-xl-9">
            <!-- <div class="event-details"> -->
                <div class="container">

                <div class="about-images clearfix"> 
                  
                  <!-- <img class="wow fadeInUp" src="{{url('/assets/imams')}}/{{$detail->image}}" alt="Single event Details"> -->
                  @php
                    $i=1;
                    $class = '';
                    
                  @endphp
                  @foreach($tutors as $tutor)
                  @php
                    if($i == 1)
                    {
                      $class = 'img-big';
                    }
                    else
                    {
                      $class = 'img-big2';
                    }
                  @endphp
                  <a href="{{url('/tutor_detail',$tutor->id)}}">
                          <img class="wow fadeInUp {{$class}}" data-wow-delay="0.1s" src="{{url('/assets/tutors')}}/{{$tutor->photo}}" alt="about image">
                          </a>
                          @php
                            $i++;
                          @endphp
                          
                          @endforeach
                  <!-- <img class="wow fadeInUp" src="{{url('/frontend_asset/images/about/large-1.jpg')}}" alt="about image">
                  <img class="wow fadeInUp" src="{{url('/frontend_asset/images/about/small-2.jpg')}}" alt="smalal image">
                  <img class="wow fadeInUp" data-wow-delay="0.1s" src="{{url('/frontend_asset/images/about/small-1.jpg')}}" alt="smalal image">
                   <img class="wow fadeInUp" src="{{url('/frontend_asset/images/about/small-1.jpg')}}" alt="smalal image">
                  <img class="wow fadeInUp" data-wow-delay="0.1s" src="{{url('/frontend_asset/images/about/small-2.jpg')}}" alt="smalal image"> -->
              </div>
              </div>
              
              <h2 class="event-details__title">{{$detail->imamname}}</h2>
              <div class="event-details__meta">
                <ul>
                  <li><span>Designation:</span> {{$detail->designation}}</li>
                </ul>
              </div>
              <div class="event-details__content">
                <p> {!!$detail->about!!}</p>

                </div>
              <div class="calltoaction d-flex justify-content-left justify-content-md-center flex-wrap felx-md-nowrap">
                <h3>Let’s join the Class, know about {{$detail->name}}...</h3>

              </div>
              <div class="event-details__speakers">
                <h3>Education & Academic Specialization</h3>
                <!-- <p>know is  to pursue pleasure ratio because those who do not know how to pursue pleasure rationally counter consequences that are extremely painful</p> -->
                <div class="speakers">
                  <!-- Single Speaker -->
                  <div class="single-speaker">
                    <div class="single-speaker__thumb">
                      <div class="hexagon">
                        <div class="hexagon__inner1">
                          <div class="hexagon__inner2">
                            <img src="{{url('/assets/tutors')}}/{{$detail->photo}}" alt="speaker 1">

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="signle-speaker__content">
                      <h5>{{$detail->imamname}}</h5><br>
                      <span>{{$detail->about}}</span>
                    </div>
                  </div><!-- //Single Speaker -->
                  <!-- Single Speaker -->

                </div>
              </div>
              <!-- <div class="event-details__footer d-flex justify-content-between align-items-center flex-wrap">
                <div class="social-icons social-icons--rounded">
                  <ul>
                    <li class="facebook"><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li class="instagram"><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                    <li class="google-plus"><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                </div>
                <div class="cr-pagination2">
                  <ul>
                    <li>
                      <a href="event-details.html"><i class="fa fa-angle-left"></i></a>
                    </li>
                    <li>
                      <a href="event-details.html"><i class="fa fa-angle-right"></i></a>
                    </li>
                  </ul>
                </div>
              </div> -->

            <!-- </div> -->
          </div>

          <!-- Sidebar Widgets Area -->
          <div class="col-lg-4 col-xl-3">
            <!-- Sidebar Widgets -->
            <div class="sidebar widgets">

              <!-- Single Widget (Searchbox) -->
              <div class="single-widget wgt-searchbox">
                <h4 class="widget-title">Search Team</h4>
                <form action="#">
                  <input type="text" placeholder="Keywords here...">
                  <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                </form>
              </div><!-- //Single Widget (Searchbox) -->

              <!-- Single Widget (Categories) -->
              <!-- <div class="single-widget wgt-categories">
                <h4 class="widget-title">Event Categories</h4>
                <ul>
                  <li><a href="events.html">Ramadan <span>25</span></a></li>
                  <li><a href="events.html">Salat <span>20</span></a></li>
                  <li><a href="events.html">Hajj <span>15</span></a></li>
                  <li><a href="events.html">Zakat <span>29</span></a></li>
                  <li><a href="events.html">Kalima <span>36</span></a></li>
                  <li><a href="events.html">Hijab <span>18</span></a></li>
                  <li><a href="events.html">Fluneral <span>22</span></a></li>
                </ul>
              </div><!-- //Single Widget (Categories) -->

              <!-- Single Widget (Recentpost) -->
              <div class="single-widget wgt-recentpost">
                <h4 class="widget-title">Other Team Members</h4>
                <ul>
                  @foreach($tutor_detail as $tutor)
                  <li>
                    <div class="wgt-recentpost__thumb">
                      <a href="{{url('/tutor_detail',$tutor->id)}}">
                        <img src="{{url('/assets/tutors')}}/{{$tutor->photo}}" alt="event thumb">
                      </a>
                    </div>
                    <div class="wgt-recentpost__content">
                      <h5><a href="{{url('/tutor_detail',$tutor->id)}}">{{$tutor->name}}</a></h5>
                      <p><span>{{$tutor->about}}</span></p>
                    </div>
                  </li>
                  @endforeach

                </ul>
              </div><!-- Single Widget (Recentpost) -->






            </div><!-- //Sidebar Widgets  -->
          </div><!-- //Sidebar Widgets Area -->

        </div>
      </div>
    </div><!-- //Event Details Area -->

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
