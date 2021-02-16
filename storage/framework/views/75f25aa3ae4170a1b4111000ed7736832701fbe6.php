
<?php $__env->startSection('header'); ?>
<?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>


    <!-- Header -->

    <!-- Top Banner -->


    <section class="cr-section breadcrumb-area" data-black-overlay="7">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="cr-breadcrumb text-center">
              <h2 class="cr-breadcrumb__title">Courses</h2>
              <div class="cr-breadcrumb__tree text-left text-md-left text-center">
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li>Courses</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Page Conent -->
    <main class="page-content">

      <div class="events-grid ptb--150 bg--white">
        <div class="container">
          <div class="activities">
            <div class="row">
              <!-- Single Activity -->
              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <figure class="activity wow fadeInLeft">
                  <div class="activity__thumb">
                    <a href="<?php echo e(url('/courses_detail',$course->id)); ?>">
                      <img src="<?php echo e(url('/assets/courses')); ?>/<?php echo e($course->image); ?>" alt="activity image">
                    </a>
                  </div>
                  <figcaption class="activity__content text-center">
                    <h3><a href="<?php echo e(url('/courses_detail',$course->id)); ?>"><?php echo e($course->coursetitle); ?></a></h3>
                    <p><?php echo Illuminate\Support\Str::limit($course->description, 300,'...'); ?></p>
                    
                    <a href="<?php echo e(url('/courses_detail',$course->id)); ?>" class="cr-readmore">Read More</a>
                  </figcaption>
                </figure>
              </div><!-- //Single Activity -->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




            </div>
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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/courses.blade.php ENDPATH**/ ?>