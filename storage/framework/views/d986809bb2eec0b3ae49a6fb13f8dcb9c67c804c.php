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
                <a href=""><img src="<?php echo e(url('/')); ?>/frontend_asset/images/logo/logo-theme.png" alt="header logo"></a>
              </div>
              <div class="header__right">
                <div class="header__right__top d-flex justify-content-end align-items-center flex-wrap flex-sm-nowrap">
                  <ul class="header__right__times d-flex justify-content-end">
                    <li><p><i class="icofont icofont-full-sunny" onMouseOver="this.style.color='#55C827'"
                    onMouseOut="this.style.color='#28a745'" style="color: #28a745;
                    
                    cursor: pointer;"></i><?php echo e(__('header.SUNRISE')); ?> : <span class="time-sunrise"></span></p></li>
                    <li><p><i class="icofont icofont-full-night" onMouseOver="this.style.color='#55C827'"
                    onMouseOut="this.style.color='#28a745'" style="color: #28a745;
                    
                    cursor: pointer;"></i><?php echo e(__('header.SUNSET')); ?> : <span class="time-sunset"></span></p></li>
                    
                    <!-- <li><a href="<?php echo e(url('/user/forum')); ?>" class="topic" onMouseOver="this.style.color='#55C827'"
              onMouseOut="this.style.color='#fff'" style="color: white;
                    padding: 16px;
                    font-size: 16px;
                    border: none;
                    cursor: pointer;"><i class="fa fa-comments"></i> Islamic Topics</a></li> -->
                    <?php if(Auth::check()): ?>
                    <li><a href="<?php echo e(url('/user/forum')); ?>" class="topic" onMouseOver="this.style.color='#55C827'"
              onMouseOut="this.style.color='#28a745'" style="color: #28a745;
                    padding: 16px;
                    font-size: 16px;
                    border: none;
                    cursor: pointer;"><i class="fa fa-comments"></i><?php echo e(__('header.ISLAMIC TOPICS')); ?></a></li>
                    <li><a href="#"  onclick="myFunction()" onMouseOver="this.style.color='##28a745'"
              onMouseOut="this.style.color='#28a745'" class="dropbtn" style="color: #28a745;"><i class="fa fa-user-o"></i>   <?php echo e(Auth::user()->name); ?></a>
                    <div id="myDropdown" class="dropdown-content">
                    <a href="<?php echo e(url('/user/dashboard')); ?>"><?php echo e(__('header.Dashboard')); ?></a>
                  </div></li>
                <li>  <a href="<?php echo e(url('/user/logout')); ?>"><button type="button" class="btn btn-success btn-lg btn-block"><?php echo e(__('header.LOGOUT')); ?></button></a></li>
                  </ul>
                    <?php else: ?>
                  <ul class="header__right__icons d-flex justify-content-end">
                    <li class="accountbox-trigger"><a href="#"><i class="fa fa-user-o"></i></a></li>
                  </ul>
                  <?php endif; ?>
                  <!-- <div class="dropdown">
                      <button class="btn btn-success btn-lg btn-block" style="height: 40px; width: 60px; margin-left:20px; margin-top:40px" type="button" data-toggle="dropdown">
                      <span class="caret"></span>
                       
                      <?php if(Session::has('locale')): ?>
                          <?php echo e(session('locale')); ?>

                      <?php else: ?>
                          <?php echo e(Config::get('app.locale')); ?>

                      <?php endif; ?>

                      </button>
                      <ul class="dropdown-menu">
                      <li><a href="<?php echo e(url('/language/urd')); ?>"><?php echo e(__('header.Urdu')); ?></a></li>
                      <li><a href="<?php echo e(url('/language/en')); ?>">English</a></li>
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
                    <li ><a href="<?php echo e(url('/')); ?>"><?php echo e(__('header.HOME')); ?></a>
                    </li>
                    <li class="cr-dropdown"><a href="#"><?php echo e(__('header.ABOUT')); ?></a>
                      <ul class="cr-dropdown-menu">
                        <li><a href="<?php echo e(url('/history')); ?>"><?php echo e(__('header.History')); ?></a></li>
                        <li><a href="<?php echo e(url('/team')); ?>"><?php echo e(__('header.Team')); ?></a></li>
                      </ul>
                    </li>
                    <li class="cr-dropdown"><a href="#"><?php echo e(__('header.Media')); ?></a>
                      <ul class="cr-dropdown-menu">
                        <li><a href="<?php echo e(url('/events')); ?>"><?php echo e(__('header.News and Events')); ?></a></li>
                        <li><a href="<?php echo e(url('/videos')); ?>"><?php echo e(__('header.Videos')); ?></a></li>
                        <li><a href="<?php echo e(url('/images')); ?>"><?php echo e(__('header.Images')); ?></a></li>
                      </ul>
                    </li>
                    <li ><a href="<?php echo e(url('/onlinetutoring')); ?>"><?php echo e(__('header.Online Tutoring')); ?></a>
                    </li>
                    <li class="cr-dropdown"><a href="activities.html"><?php echo e(__('header.Calendar')); ?></a>
                      <ul class="cr-dropdown-menu">
                        <li><a href="<?php echo e(url('/comingsoon')); ?>"><?php echo e(__('header.Ramazan')); ?></a></li>
                        <li><a href="<?php echo e(url('/comingsoon')); ?>"><?php echo e(__('header.Yearly')); ?></a></li>
                      </ul>
                    </li>

                    <li class="cr-dropdown"><a href="#"><?php echo e(__('header.Facilities')); ?></a>
                      <ul class="cr-dropdown-menu">
                        <li><a href="<?php echo e(url('/services')); ?>"><?php echo e(__('header.Services')); ?></a></li>
                        <li><a href="<?php echo e(url('/courses')); ?>"><?php echo e(__('header.Courses')); ?></a></li>
                        <li><a href="<?php echo e(url('/comingsoon')); ?>"><?php echo e(__('header.Donations')); ?></a></li>
                        <li><a href="<?php echo e(url('/upcomingprojects')); ?>"><?php echo e(__('header.Upcoming Projects')); ?></a></li>
                        <li><a href="<?php echo e(url('/comingsoon')); ?>"><?php echo e(__('header.Child Sponsor')); ?></a></li>

                      </ul>
                    </li>
                    <li ><a href="<?php echo e(url('/blog')); ?>"><?php echo e(__('header.Blog')); ?></a>
                    </li>
                    <li><a href="<?php echo e(url('/contact')); ?>"><?php echo e(__('header.Contact')); ?></a></li>
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
<?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>