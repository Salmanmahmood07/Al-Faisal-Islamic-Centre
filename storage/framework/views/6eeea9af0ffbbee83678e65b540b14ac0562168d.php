<style>
.video-container iframe{
  max-width: 100%;
  max-height: 300px;
  border: 3px solid rgb(221, 221, 221);
border-radius: 4px;
}
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



  <!-- Breadcrumb area -->
  			<section class="cr-section breadcrumb-area" data-black-overlay="7">
  				<div class="container">
  					<div class="row">
  						<div class="col-lg-12 text-center">
  							<div class="cr-breadcrumb text-center">
  								<h2 class="cr-breadcrumb__title">Our History</h2>
  								<div class="cr-breadcrumb__tree text-left text-md-left text-center">
  									<ul>
  										<li><a href="index.html">Home</a></li>
  										<li>History </li>
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
          <div class="shop-page-products">
            <div class="row">
              <!-- Single Team -->
             <!--  <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-6 col-md-6 col-xl-3">
                <figure class="team-member wow fadeInUp" style="height:400px;">
                  <div class="team-member__thumb">
                    <div class="hexagon">
                      <div class="hexagon__inner1">
                        <div class="hexagon__inner2">
                         
                        </div>
                      </div>
                    </div>
                  </div>
                  <figcaption class="team-member__content">
                  
                    <h5><?php echo e($content->content); ?></h5>
                  </figcaption>
                </figure>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> --><!-- //Single Team -->
              <!-- Single Team -->
              <!-- History Area 1 -->
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="about-content">
                  <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <h3><strong><?php echo $detail->title; ?></strong></h3>
                  <h2><?php echo $detail->content; ?></h2>
                  
                 <!--  <div class="about-content__bottom d-flex align-items-center flex-wrap flex-sm-nowrap">
                    <div class="about-content__bottom__left">
                      <p>Have you any quary?</p>
                      <h3 class="body--font"><a href="callto://+00812356369">+00812 356 369</a></h3>
                    </div>
                    <span>or</span>
                    <div class="about-content__bottom__right">
                      <a href="about-us.html" class="cr-btn cr-btn--sm cr-btn--transparent cr-btn--dark"><span>Read More</span></a>
                    </div>
                  </div> -->
                </div>
              </div>
              
              <div class="col-lg-6">
                <div class="about-images clearfix">
                  
                  <?php
                    $i=1;
                    $class = '';
                    
                  ?>
                  <?php $__currentLoopData = $detail->getimages()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $historyimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                  <a href="<?php echo e(url('/history',$historyimage->id)); ?>">
                          <img class="wow fadeInUp <?php echo e($class); ?>" data-wow-delay="0.1s" src="<?php echo e(url('/assets/historyimages')); ?>/<?php echo e($historyimage->image); ?>" alt="about image">
                          </a>

                          <?php
                            $i++;
                          ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <!-- <img class="wow fadeInUp" src="<?php echo e(url('/frontend_asset/images/about/large-1.jpg')); ?>" alt="about image">
                  <img class="wow fadeInUp" src="<?php echo e(url('/frontend_asset/images/about/small-1.jpg')); ?>" alt="smalal image">
                  <img class="wow fadeInUp" data-wow-delay="0.1s" src="<?php echo e(url('/frontend_asset/images/about/small-2.jpg')); ?>" alt="smalal image"> -->
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div><!-- //History Area 1 -->

          <!-- History Area 2 -->
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6" style="margin-top: 20px">
                <div class="about-images clearfix">
                  <?php $__currentLoopData = $mission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $i=1;
                    $class = '';
                    
                  ?>
                  <?php $__currentLoopData = $detail->getimages()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $missionimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                  <a href="<?php echo e(url('/history',$missionimage->id)); ?>">
                          <img class="wow fadeInUp <?php echo e($class); ?>" data-wow-delay="0.1s" src="<?php echo e(url('/assets/missionimages')); ?>/<?php echo e($missionimage->image); ?>" alt="about image">
                          </a>

                          <?php
                            $i++;
                          ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <!-- <img class="wow fadeInUp" src="<?php echo e(url('/frontend_asset/images/about/m21.jpg')); ?>" alt="about image">
                  <img class="wow fadeInUp" src="<?php echo e(url('/frontend_asset/images/about/m31.jpg')); ?>" alt="smalal image">
                  <img class="wow fadeInUp" data-wow-delay="0.1s" src="<?php echo e(url('/frontend_asset/images/about/m41.jpg')); ?>" alt="smalal image"> -->
                </div>
              </div>
              <div class="col-lg-6" style="margin-top: 20px">
                <div class="about-images clearfix">
                  <div class="about-content">
                    
                  <h3><strong><?php echo $detail->title; ?></strong></h3>
                  <h2><?php echo $detail->content; ?></h2>

                  <!-- <div class="about-content__bottom d-flex align-items-center flex-wrap flex-sm-nowrap">
                    <div class="about-content__bottom__left">
                      <p>Have you any quary?</p>
                      <h3 class="body--font"><a href="callto://+00812356369">+00812 356 369</a></h3>
                    </div>
                    <span>or</span>
                    <div class="about-content__bottom__right">
                      <a href="about-us.html" class="cr-btn cr-btn--sm cr-btn--transparent cr-btn--dark"><span>Read More</span></a>
                    </div>
                  </div> -->
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <!-- //History Area 2 -->

          <!-- History Area 3 -->
          
            <div class="row align-items-center">
              <div class="col-lg-6">
                <div class="about-content">
                  <?php $__currentLoopData = $vision; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <h3><strong><?php echo $detail->title; ?></strong></h3>
                  <h2><?php echo $detail->content; ?></h2>
                  <!-- <div class="about-content__bottom d-flex align-items-center flex-wrap flex-sm-nowrap">
                    <div class="about-content__bottom__left">
                      <p>Have you any quary?</p>
                      <h3 class="body--font"><a href="callto://+00812356369">+00812 356 369</a></h3>
                    </div>
                    <span>or</span>
                    <div class="about-content__bottom__right">
                      <a href="about-us.html" class="cr-btn cr-btn--sm cr-btn--transparent cr-btn--dark"><span>Read More</span></a>
                    </div>
                  </div> -->
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-6" style="margin-top: 20px">
                <div class="about-images clearfix">
                  <?php $__currentLoopData = $vision; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $i=1;
                    $class = '';
                    
                  ?>
                  <?php $__currentLoopData = $detail->getimages()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visionimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                  <a href="<?php echo e(url('/history',$visionimage->id)); ?>">
                          <img class="wow fadeInUp <?php echo e($class); ?>" data-wow-delay="0.1s" src="<?php echo e(url('/assets/visionimages')); ?>/<?php echo e($visionimage->image); ?>" alt="about image">
                          </a>

                          <?php
                            $i++;
                          ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <!-- <img class="wow fadeInUp" src="<?php echo e(url('/frontend_asset/images/about/v21.jpg')); ?>" alt="about image">
                  <img class="wow fadeInUp" src="<?php echo e(url('/frontend_asset/images/about/v31.jpg')); ?>" alt="smalal image">
                  <img class="wow fadeInUp" data-wow-delay="0.1s" src="<?php echo e(url('/frontend_asset/images/about/v41.jpg')); ?>" alt="smalal image"> -->
                </div>
              </div>
            </div>
          </div><!-- //History Area 3 -->


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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/history.blade.php ENDPATH**/ ?>