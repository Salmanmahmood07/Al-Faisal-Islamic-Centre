
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
                      <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    									<article class="event-single wow fadeInLeft">
    										<div class="event-single__thumb">
    											<a  href="<?php echo e(url('/event_detail',$event->id)); ?>"">
    												<img src="<?php echo e(url('/assets/events')); ?>/<?php echo e($event->image); ?>" style="height:200px;width:150px;" alt="event thumb">
    											</a>
    											<div class="event-single__date">
    											<h3><?php echo e(date("d M Y", strtotime($event->date))); ?></h3>
                          
    											</div>
    										</div>
    										<div class="event-single__content">
    												<h3><a href="<?php echo e(url('/event_detail',$event->id)); ?>"><?php echo e($event->title); ?></a></h3>
                            <p><?php echo Illuminate\Support\str::limit($event->description, 300,'...'); ?></p>

                          <div class="event-single__content__location">
    												<p><i class="icofont icofont-institution"></i><?php echo e($event->venue); ?></p>
    												<p><i class="icofont icofont-wall-clock"></i> <?php echo e($event->time); ?></p>

    											</div>
                          <a href="<?php echo e(url('/event_detail',$event->id)); ?>" class="cr-readmore">More Details</a>
    										</div>
    									</article><!-- //Event Single -->

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





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
    <?php $__env->startSection('modals'); ?>
    <?php echo $__env->make('frontend.layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
    <!-- Cartbox -->




  <?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\faisal-center\resources\views/frontend/events.blade.php ENDPATH**/ ?>