
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
    								<h2 class="cr-breadcrumb__title">Blog</h2>
    								<div class="cr-breadcrumb__tree text-left text-md-left text-center">
    									<ul>
    										<li><a href="index.html">Home</a></li>
    										<li>Blog</li>
    									</ul>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</section><!-- //Breadcrumb area -->

          <!-- Page Conent -->
        			<main class="page-content">

        				<!-- Blogs area -->
        				<div class="pg-blogs bg--white ptb--150">
        					<div class="container">
        						<div class="row">
        							<!-- Start Single Blog -->
                      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        							<div class="col-lg-4 col-md-6 col-xl-3">
        								<article class="blog wow fadeInUp">
        									<div class="blog__thumb">
        										<a href="<?php echo e(url('/blog_detail',$post->id)); ?>">
        											<img src="<?php echo e(url('/assets/blogposts')); ?>/<?php echo e($post->image); ?>" alt="single blog thumb">
        										</a>
        									</div>
        									<div class="blog__content">
        										<div class="blog__content__meta">
                              <p><?php echo e($post ->created_at->format('M d Y')); ?> - <a href="<?php echo e(url('/blog_detail',$post->id)); ?>">Admin</a></p>

        										</div>
                            <h4 class="blog-title"><a href="<?php echo e(url('/blog_detail',$post->id)); ?>"><?php echo e($post->posttitle); ?></a></h4>
                            <p><?php echo Illuminate\Support\Str::limit($post->description, 300,'...'); ?></p>

        										<a href="<?php echo e(url('/blog_detail',$post->id)); ?>" class="cr-readmore">Read More</a>
        									</div>
        								</article>
        							</div><!-- //Start Single Blog -->

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>














        						</div>
        						<div class="row">
        							<div class="col-lg-12">
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
        					</div>
        				</div><!-- //Blogs area -->

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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/blog.blade.php ENDPATH**/ ?>