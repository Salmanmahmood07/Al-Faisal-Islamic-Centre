
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
              <h2 class="cr-breadcrumb__title">Services</h2>
              <div class="cr-breadcrumb__tree text-left text-md-left text-center">
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li>Services</li>
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
              <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <figure class="activity wow fadeInLeft">
                  <div class="activity__thumb">
                    <a href="<?php echo e(url('/services_detail',$service->id)); ?>">
                      <img src="<?php echo e(url('/assets/services')); ?>/<?php echo e($service->image); ?>" alt="activity image" style="height: 250px; width: 350px;">
                    </a>
                  </div>
                  <figcaption class="activity__content text-center">
                    <h3><a href="<?php echo e(url('/services_detail',$service->id)); ?>"><?php echo e($service->servicetitle); ?></a></h3>
                    <p><?php echo Illuminate\Support\Str::limit($service->description, 300,'...'); ?></p>

                    <a href="<?php echo e(url('/services_detail',$service->id)); ?>" class="cr-readmore">Read More</a>
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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\faisal-center\resources\views/frontend/services.blade.php ENDPATH**/ ?>