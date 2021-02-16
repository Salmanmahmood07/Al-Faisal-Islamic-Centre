<style>
.video-container iframe{
  max-width: 100%;
  max-height: 300px;
  border: 3px solid rgb(221, 221, 221);
border-radius: 4px;
}
</style>

<?php $__env->startSection('header'); ?>
<?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>



  <!-- Breadcrumb area -->
  			<section class="cr-section breadcrumb-area" data-black-overlay="7">
  				<div class="container">
  					<div class="row">
  						<div class="col-lg-12 text-center">
  							<div class="cr-breadcrumb text-center">
  								<h2 class="cr-breadcrumb__title">Our Videos</h2>
  								<div class="cr-breadcrumb__tree text-left text-md-left text-center">
  									<ul>
  										<li><a href="index.html">Home</a></li>
  										<li>Videos</li>
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
          <button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false">Basic dropdown</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Separated link</a>
        </div>

          <div class="shop-page-products" style="margin-top:30px;">
            <div class="row">
              <!-- Single Product -->
              <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 wow fadeInUp">
                <div class="product">
                  <div class="product__thumb">
                    <div class="video-container" >
                    <?php echo $video->video_embed_src; ?>

                  </div>
                  </div>

                  <!-- <div class="product__action">
                    <ul>
                      <li><a href="cart.html"><i class="fa fa-opencart"></i></a></li>
                      <li><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                    </ul>
                  </div> -->
                </div>
              </div><!-- //Single Product -->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

















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
    <?php $__env->startSection('modals'); ?>
    <?php echo $__env->make('frontend.layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
    <!-- Cartbox -->




  <?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/videos.blade.php ENDPATH**/ ?>