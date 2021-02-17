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
              <h2 class="cr-breadcrumb__title">Blog Details</h2>
              <div class="cr-breadcrumb__tree text-left text-md-left text-center">
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="events.html">Events</a></li>
                  <li>Blog Details</li>
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
            <div class="event-details">
              <div class="event-details__thumb">
                  <img src="{{url('/assets/blogposts')}}/{{$detail->image}}" style="width:100%;height:400px;" alt="Single event Details">
              </div>
              <h2 class="event-details__title">{{$detail->posttitle}}</h2>
              <div class="event-details__meta">
                <ul>
                  <li><span>Date:</span> {{  date("d M Y", strtotime($detail->created_at)) }}</li>
                  <li><span>Posted By :</span> Admin</li>
                  <!-- <li><span>Time :</span> {{$detail->time}}</li> -->
                </ul>
              </div>
              <div class="event-details__content">
                <p> {!!$detail->description!!}</p>

                </div>
              <div class="calltoaction d-flex justify-content-left justify-content-md-center flex-wrap felx-md-nowrap">
                <h3>Let’ s read out the post, know about {{$detail->posttitle}}...</h3>

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
              <div id="disqus_thread" style="margin-top:70px;"></div>
  <script>

  /**
  *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
  *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

  var disqus_config = function () {
  this.page.url = ' {{Request::url()}} ';  // Replace PAGE_URL with your page's canonical URL variable
  this.page.identifier = {{ $detail->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
  };

  (function() { // DON'T EDIT BELOW THIS LINE
  var d = document, s = d.createElement('script');
  s.src = 'https://online-portal.disqus.com/embed.js';
  s.setAttribute('data-timestamp', +new Date());
  (d.head || d.body).appendChild(s);
  })();
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

            </div>
          </div>

          <!-- Sidebar Widgets Area -->
          <div class="col-lg-4 col-xl-3">
            <!-- Sidebar Widgets -->
            <div class="sidebar widgets">

              <!-- Single Widget (Searchbox) -->
              <div class="single-widget wgt-searchbox">
                <h4 class="widget-title">Search Event</h4>
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
                <h4 class="widget-title">Recent Posts</h4>
                <ul>
                  @foreach($blog_detail as $blog)
                  <li>
                    <div class="wgt-recentpost__thumb">
                      <a href="{{url('/blog_detail',$blog->id)}}">
                        <img src="{{url('/assets/blogposts')}}/{{$blog->image}}" alt="event thumb">
                      </a>
                    </div>
                    <div class="wgt-recentpost__content">
                      <h5><a href="{{url('/blog_detail',$blog->id)}}">{{$blog->posttitle}}</a></h5>
                      <p><span>{{  date("d M Y", strtotime($blog->created_at)) }}</span></p>
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
