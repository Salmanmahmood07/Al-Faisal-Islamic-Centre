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

<?php $__env->startSection('header'); ?>
<?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>


    <!-- Header -->

    <!-- Top Banner -->

    <!-- Breadcrumb area -->
    <section class="cr-section breadcrumb-area" data-black-overlay="7">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="cr-breadcrumb text-center">
              <h2 class="cr-breadcrumb__title">Team Details</h2>
              <div class="cr-breadcrumb__tree text-left text-md-left text-center">
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="events.html">Team</a></li>
                  <li>Team Details</li>
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
                  
                  <!-- <img class="wow fadeInUp" src="<?php echo e(url('/assets/imams')); ?>/<?php echo e($detail->image); ?>" alt="Single event Details"> -->
                  <?php
                    $i=1;
                    $class = '';
                    
                  ?>
                  <?php $__currentLoopData = $imams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imamimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    if($i == 1)
                    {
                      $class = 'img-big';
                    }
                    else
                    {
                      $class = 'img-big2';
                    }
                  ?>
                  <a href="<?php echo e(url('/team_detail',$imamimage->id)); ?>">
                          <img class="wow fadeInUp <?php echo e($class); ?>" data-wow-delay="0.1s" src="<?php echo e(url('/assets/imamsimages')); ?>/<?php echo e($imamimage->image); ?>" alt="about image">
                          </a>
                          <?php
                            $i++;
                          ?>
                          
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <!-- <img class="wow fadeInUp" src="<?php echo e(url('/frontend_asset/images/about/large-1.jpg')); ?>" alt="about image">
                  <img class="wow fadeInUp" src="<?php echo e(url('/frontend_asset/images/about/small-2.jpg')); ?>" alt="smalal image">
                  <img class="wow fadeInUp" data-wow-delay="0.1s" src="<?php echo e(url('/frontend_asset/images/about/small-1.jpg')); ?>" alt="smalal image">
                   <img class="wow fadeInUp" src="<?php echo e(url('/frontend_asset/images/about/small-1.jpg')); ?>" alt="smalal image">
                  <img class="wow fadeInUp" data-wow-delay="0.1s" src="<?php echo e(url('/frontend_asset/images/about/small-2.jpg')); ?>" alt="smalal image"> -->
              </div>
              </div>
              
              <h2 class="event-details__title"><?php echo e($detail->imamname); ?></h2>
              <div class="event-details__meta">
                <ul>
                  <li><span>Designation:</span> <?php echo e($detail->designation); ?></li>
                </ul>
              </div>
              <div class="event-details__content">
                <p> <?php echo $detail->about; ?></p>

                </div>
              <div class="calltoaction d-flex justify-content-left justify-content-md-center flex-wrap felx-md-nowrap">
                <h3>Let’s join the Class, know about <?php echo e($detail->designation); ?>...</h3>

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
                            <img src="<?php echo e(url('/assets/imams')); ?>/<?php echo e($detail->image); ?>" alt="speaker 1">

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="signle-speaker__content">
                      <h5><?php echo e($detail->imamname); ?></h5>
                      <span><?php echo e($detail->designation); ?></span><br>
                      <span><?php echo e($detail->about); ?></span>
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
                  <?php $__currentLoopData = $team_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <div class="wgt-recentpost__thumb">
                      <a href="<?php echo e(url('/team_detail',$imam->id)); ?>">
                        <img src="<?php echo e(url('/assets/imams')); ?>/<?php echo e($imam->image); ?>" alt="event thumb">
                      </a>
                    </div>
                    <div class="wgt-recentpost__content">
                      <h5><a href="<?php echo e(url('/team_detail',$imam->id)); ?>"><?php echo e($imam->imamname); ?></a></h5>
                      <p><span><?php echo e($imam->designation); ?></span><span><?php echo e($imam->about); ?></span></p>
                    </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
    <?php $__env->startSection('modals'); ?>
    <?php echo $__env->make('frontend.layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
    <!-- Cartbox -->




  <?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/teamdetail.blade.php ENDPATH**/ ?>