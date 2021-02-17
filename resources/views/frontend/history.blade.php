<style>
.video-container iframe{
  max-width: 100%;
  max-height: 300px;
  border: 3px solid rgb(221, 221, 221);
border-radius: 4px;
}
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



  <!-- Breadcrumb area -->
  			<section class="cr-section breadcrumb-area" data-black-overlay="7">
  				<div class="container">
  					<div class="row">
  						<div class="col-lg-12 text-center">
  							<div class="cr-breadcrumb text-center">
  								<h2 class="cr-breadcrumb__title">Our History</h2>
  								<div class="cr-breadcrumb__tree text-left text-md-left text-center">
  									<ul>
  										<li><a href="index.html">Home</a></li>
  										<li>History </li>
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
             <!--  @foreach($history as $content)
              <div class="col-lg-6 col-md-6 col-xl-3">
                <figure class="team-member wow fadeInUp" style="height:400px;">
                  <div class="team-member__thumb">
                    <div class="hexagon">
                      <div class="hexagon__inner1">
                        <div class="hexagon__inner2">
                         
                        </div>
                      </div>
                    </div>
                  </div>
                  <figcaption class="team-member__content">
                  
                    <h5>{{$content->content}}</h5>
                  </figcaption>
                </figure>
              </div>
              @endforeach --><!-- //Single Team -->
              <!-- Single Team -->
              <!-- History Area 1 -->
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="about-content">
                  @foreach($history as $detail)
                  <h3><strong>{!!$detail->title!!}</strong></h3>
                  <h2>{!!$detail->content!!}</h2>
                  
                 <!--  <div class="about-content__bottom d-flex align-items-center flex-wrap flex-sm-nowrap">
                    <div class="about-content__bottom__left">
                      <p>Have you any quary?</p>
                      <h3 class="body--font"><a href="callto://+00812356369">+00812 356 369</a></h3>
                    </div>
                    <span>or</span>
                    <div class="about-content__bottom__right">
                      <a href="about-us.html" class="cr-btn cr-btn--sm cr-btn--transparent cr-btn--dark"><span>Read More</span></a>
                    </div>
                  </div> -->
                </div>
              </div>
              
              <div class="col-lg-6">
                <div class="about-images clearfix">
                  
                  @php
                    $i=1;
                    $class = '';
                    
                  @endphp
                  @foreach($detail->getimages()->get() as $historyimage)
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
                  <a href="{{url('/history',$historyimage->id)}}">
                          <img class="wow fadeInUp {{$class}}" data-wow-delay="0.1s" src="{{url('/assets/historyimages')}}/{{$historyimage->image}}" alt="about image">
                          </a>

                          @php
                            $i++;
                          @endphp
                          @endforeach
                  <!-- <img class="wow fadeInUp" src="{{url('/frontend_asset/images/about/large-1.jpg')}}" alt="about image">
                  <img class="wow fadeInUp" src="{{url('/frontend_asset/images/about/small-1.jpg')}}" alt="smalal image">
                  <img class="wow fadeInUp" data-wow-delay="0.1s" src="{{url('/frontend_asset/images/about/small-2.jpg')}}" alt="smalal image"> -->
                </div>
              </div>
              @endforeach
            </div>
          </div><!-- //History Area 1 -->

          <!-- History Area 2 -->
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6" style="margin-top: 20px">
                <div class="about-images clearfix">
                  @foreach($mission as $detail)
                  @php
                    $i=1;
                    $class = '';
                    
                  @endphp
                  @foreach($detail->getimages()->get() as $missionimage)
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
                  <a href="{{url('/history',$missionimage->id)}}">
                          <img class="wow fadeInUp {{$class}}" data-wow-delay="0.1s" src="{{url('/assets/missionimages')}}/{{$missionimage->image}}" alt="about image">
                          </a>

                          @php
                            $i++;
                          @endphp
                          @endforeach
                  <!-- <img class="wow fadeInUp" src="{{url('/frontend_asset/images/about/m21.jpg')}}" alt="about image">
                  <img class="wow fadeInUp" src="{{url('/frontend_asset/images/about/m31.jpg')}}" alt="smalal image">
                  <img class="wow fadeInUp" data-wow-delay="0.1s" src="{{url('/frontend_asset/images/about/m41.jpg')}}" alt="smalal image"> -->
                </div>
              </div>
              <div class="col-lg-6" style="margin-top: 20px">
                <div class="about-images clearfix">
                  <div class="about-content">
                    
                  <h3><strong>{!!$detail->title!!}</strong></h3>
                  <h2>{!!$detail->content!!}</h2>

                  <!-- <div class="about-content__bottom d-flex align-items-center flex-wrap flex-sm-nowrap">
                    <div class="about-content__bottom__left">
                      <p>Have you any quary?</p>
                      <h3 class="body--font"><a href="callto://+00812356369">+00812 356 369</a></h3>
                    </div>
                    <span>or</span>
                    <div class="about-content__bottom__right">
                      <a href="about-us.html" class="cr-btn cr-btn--sm cr-btn--transparent cr-btn--dark"><span>Read More</span></a>
                    </div>
                  </div> -->
                </div>
              </div>
              @endforeach
            </div>
          <!-- //History Area 2 -->

          <!-- History Area 3 -->
          
            <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="about-content">
                  @foreach($vision as $detail)
                  <h3><strong>{!!$detail->title!!}</strong></h3>
                  <h2>{!!$detail->content!!}</h2>
                  <!-- <div class="about-content__bottom d-flex align-items-center flex-wrap flex-sm-nowrap">
                    <div class="about-content__bottom__left">
                      <p>Have you any quary?</p>
                      <h3 class="body--font"><a href="callto://+00812356369">+00812 356 369</a></h3>
                    </div>
                    <span>or</span>
                    <div class="about-content__bottom__right">
                      <a href="about-us.html" class="cr-btn cr-btn--sm cr-btn--transparent cr-btn--dark"><span>Read More</span></a>
                    </div>
                  </div> -->
                </div>
              </div>
              @endforeach
              <div class="col-lg-6" style="margin-top: 20px">
                <div class="about-images clearfix">
                  @foreach($vision as $detail)
                  @php
                    $i=1;
                    $class = '';
                    
                  @endphp
                  @foreach($detail->getimages()->get() as $visionimage)
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
                  <a href="{{url('/history',$visionimage->id)}}">
                          <img class="wow fadeInUp {{$class}}" data-wow-delay="0.1s" src="{{url('/assets/visionimages')}}/{{$visionimage->image}}" alt="about image">
                          </a>

                          @php
                            $i++;
                          @endphp
                          @endforeach
                          @endforeach
                  <!-- <img class="wow fadeInUp" src="{{url('/frontend_asset/images/about/v21.jpg')}}" alt="about image">
                  <img class="wow fadeInUp" src="{{url('/frontend_asset/images/about/v31.jpg')}}" alt="smalal image">
                  <img class="wow fadeInUp" data-wow-delay="0.1s" src="{{url('/frontend_asset/images/about/v41.jpg')}}" alt="smalal image"> -->
                </div>
              </div>
            </div>
          </div><!-- //History Area 3 -->


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
