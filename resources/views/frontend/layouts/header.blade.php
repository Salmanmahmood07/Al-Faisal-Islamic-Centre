<style >
.dropbtn {

  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover{
  background-color: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}


.show {display: block;}
</style>

    <!-- Header -->
    <header id="header-area" class="header-area sticky--header">
      <div class="header header--style-2">
        <!-- Header Top Area <-->
        <div class="header__top bg--white">
          <div class="container">
            <div class="header__top__inner">
              <div class="logo image--logo hidden-md hidden-sm hidden-xs">
                <a href=""><img src="{{url('/')}}/frontend_asset/images/logo/logo-theme.png" alt="header logo"></a>
              </div>
              <div class="header__right">
                <div class="header__right__top d-flex justify-content-end align-items-center flex-wrap flex-sm-nowrap">
                  <ul class="header__right__times d-flex justify-content-end">
                    <li><p><i class="icofont icofont-full-sunny" onMouseOver="this.style.color='#55C827'"
                    onMouseOut="this.style.color='#28a745'" style="color: #28a745;
                    
                    cursor: pointer;"></i>{{__('header.SUNRISE')}} : <span class="time-sunrise"></span></p></li>
                    <li><p><i class="icofont icofont-full-night" onMouseOver="this.style.color='#55C827'"
                    onMouseOut="this.style.color='#28a745'" style="color: #28a745;
                    
                    cursor: pointer;"></i>{{__('header.SUNSET')}} : <span class="time-sunset"></span></p></li>
                    
                    <!-- <li><a href="{{url('/user/forum')}}" class="topic" onMouseOver="this.style.color='#55C827'"
              onMouseOut="this.style.color='#fff'" style="color: white;
                    padding: 16px;
                    font-size: 16px;
                    border: none;
                    cursor: pointer;"><i class="fa fa-comments"></i> Islamic Topics</a></li> -->
                    @if(Auth::check())
                    <li><a href="{{url('/user/forum')}}" class="topic" onMouseOver="this.style.color='#55C827'"
              onMouseOut="this.style.color='#28a745'" style="color: #28a745;
                    padding: 16px;
                    font-size: 16px;
                    border: none;
                    cursor: pointer;"><i class="fa fa-comments"></i>{{__('header.ISLAMIC TOPICS')}}</a></li>
                    <li><a href="#"  onclick="myFunction()" onMouseOver="this.style.color='##28a745'"
              onMouseOut="this.style.color='#28a745'" class="dropbtn" style="color: #28a745;"><i class="fa fa-user-o"></i>   {{Auth::user()->name}}</a>
                    <div id="myDropdown" class="dropdown-content">
                    <a href="{{url('/user/dashboard')}}">{{__('header.Dashboard')}}</a>
                  </div></li>
                <li>  <a href="{{url('/user/logout')}}"><button type="button" class="btn btn-success btn-lg btn-block">{{__('header.LOGOUT')}}</button></a></li>
                  </ul>
                    @else
                  <ul class="header__right__icons d-flex justify-content-end">
                    <li class="accountbox-trigger"><a href="#"><i class="fa fa-user-o"></i></a></li>
                  </ul>
                  @endif
                  <!-- <div class="dropdown">
                      <button class="btn btn-success btn-lg btn-block" style="height: 40px; width: 60px; margin-left:20px; margin-top:40px" type="button" data-toggle="dropdown">
                      <span class="caret"></span>
                       
                      @if(Session::has('locale'))
                          {{session('locale')}}
                      @else
                          {{Config::get('app.locale')}}
                      @endif

                      </button>
                      <ul class="dropdown-menu">
                      <li><a href="{{url('/language/urd')}}">{{__('header.Urdu')}}</a></li>
                      <li><a href="{{url('/language/en')}}">English</a></li>
                    </ul>
                  </div> -->
                </div>
            </div>
          </div>
        </div><!-- //Header Top Area -->

        <!-- Header Bottom Area -->
        <div class="header__bottom bg--theme">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <!-- Main naviagtion -->
                <nav class="menu">
                  <ul class="justify-content-end">
                    <li ><a href="{{ url('/') }}">{{__('header.HOME')}}</a>
                    </li>
                    <li class="cr-dropdown"><a href="#">{{__('header.ABOUT')}}</a>
                      <ul class="cr-dropdown-menu">
                        <li><a href="{{url('/history')}}">{{__('header.History')}}</a></li>
                        <li><a href="{{url('/team')}}">{{__('header.Team')}}</a></li>
                      </ul>
                    </li>
                    <li class="cr-dropdown"><a href="#">{{__('header.Media')}}</a>
                      <ul class="cr-dropdown-menu">
                        <li><a href="{{url('/events')}}">{{__('header.News and Events')}}</a></li>
                        <li><a href="{{url('/videos')}}">{{__('header.Videos')}}</a></li>
                        <li><a href="{{url('/images')}}">{{__('header.Images')}}</a></li>
                      </ul>
                    </li>
                    <!-- <li ><a href="{{url('/api/onlinetutoring')}}">{{__('header.Online Tutoring')}}</a>
                    </li> -->
                    <li class="cr-dropdown"><a href="activities.html">{{__('header.Calendar')}}</a>
                      <ul class="cr-dropdown-menu">
                        <li><a href="{{url('/comingsoon')}}">{{__('header.Ramazan')}}</a></li>
                        <li><a href="{{url('/comingsoon')}}">{{__('header.Yearly')}}</a></li>
                      </ul>
                    </li>

                    <li class="cr-dropdown"><a href="#">{{__('header.Facilities')}}</a>
                      <ul class="cr-dropdown-menu">
                        <li><a href="{{url('/services')}}">{{__('header.Services')}}</a></li>
                        <li><a href="{{url('/courses')}}">{{__('header.Courses')}}</a></li>
                        <li><a href="{{url('/comingsoon')}}">{{__('header.Donations')}}</a></li>
                        <li><a href="{{url('/upcomingprojects')}}">{{__('header.Upcoming Projects')}}</a></li>
                        <li><a href="{{url('/comingsoon')}}">{{__('header.Child Sponsor')}}</a></li>

                      </ul>
                    </li>
                    <li ><a href="{{url('/blog')}}">{{__('header.Blog')}}</a>
                    </li>
                    <li><a href="{{url('/contact')}}">{{__('header.Contact')}}</a></li>
                  </ul>
                </nav><!-- //Main naviagtion -->

                <!-- Mobile Menu -->
                <div class="mobile-menu hidden-lg hidden-xlg hidden-xx hidden-sp">
                  <a class="mobile-logo" href="index.html"><img src="images/logo/mobile-logo.png" alt="logo"></a>
                </div><!-- //Mobile Menu -->

              </div>
            </div>
          </div>

        </div>
        <!-- //Header Bottom Area -->



      </div>
    </header><!-- //Header -->
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
