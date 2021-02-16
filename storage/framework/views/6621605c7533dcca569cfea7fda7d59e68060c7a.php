
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
              <h2 class="cr-breadcrumb__title">Project Details</h2>
              <div class="cr-breadcrumb__tree text-left text-md-left text-center">
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="events.html">Events</a></li>
                  <li>Project Details</li>
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
                <img src="<?php echo e(url('/assets/projects')); ?>/<?php echo e($detail->image); ?>" style="width:100%;height:400px;" alt="Single event Details">
              </div>
              <h2 class="event-details__title"><?php echo e($detail->projecttitle); ?></h2>
              <!-- <div class="event-details__meta">
                <ul>
                  <li><span>Date:</span> <?php echo e($detail->date); ?></li>
                  <li><span>Vanu :</span> <?php echo e($detail->venue); ?></li>
                  <li><span>Time :</span> <?php echo e($detail->time); ?></li>
                </ul>
              </div> -->
              <div class="event-details__content">
                <p> <?php echo $detail->description; ?></p>

                </div>
              <!-- <div class="calltoaction d-flex justify-content-left justify-content-md-center flex-wrap felx-md-nowrap">
                <h3>Let’ s join the event, know about <?php echo e($detail->title); ?>...</h3>

              </div> -->

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

            </div>
          </div>

          <!-- Sidebar Widgets Area -->
          <div class="col-lg-4 col-xl-3">
            <!-- Sidebar Widgets -->
            <div class="sidebar widgets">

              <!-- Single Widget (Searchbox) -->
              <div class="single-widget wgt-searchbox">
                <h4 class="widget-title">Search Projects</h4>
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
                <h4 class="widget-title">Recent Projects</h4>
                <ul>
                  <?php $__currentLoopData = $project_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <div class="wgt-recentpost__thumb">
                      <a href="<?php echo e(url('/project_detail',$project->id)); ?>">
                        <img src="<?php echo e(url('/assets/projects')); ?>/<?php echo e($project->image); ?>" alt="event thumb">
                      </a>
                    </div>
                    <div class="wgt-recentpost__content">
                      <h5><a href="<?php echo e(url('/project_detail',$project->id)); ?>"><?php echo e($project->projecttitle); ?></a></h5>
                       <p><span><?php echo e(date("d M Y", strtotime($project->created_at))); ?></span></p>

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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/projectdetail.blade.php ENDPATH**/ ?>