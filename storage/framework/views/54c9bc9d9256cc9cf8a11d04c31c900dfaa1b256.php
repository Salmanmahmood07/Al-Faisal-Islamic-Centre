<style type="text/css">
  .content{
    text-align: center;
    margin-left: 60%;
    margin-top: -90px;
  }
  .h3{
    color: #009047;
    font-size: 50px;
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
                <div class="cr-breadcrumb text-md-left">
                  <h2 class="cr-breadcrumb__title">Learn Everything From Home <br> During This Pandemic</h2>
                  <div><br>
                  <h3 style="color: white"> Quran Classes With Tajweed</h3>
                  <h4 style="color: white">We have started courses in our institution to make <br>possible for students learn from home.</h4>
                  </div>
                  <div style="margin-top:20px" class="banner__content__button">
                  <a href="about-us.html" class="cr-btn cr-btn--theme cr-btn cr-btn--sm"><span><?php echo e(__('index.Learn More')); ?></span></a>
                  </div>

                  <div class="cr-breadcrumb__tree text-left text-md-left text-center">
                    <ul>
                      <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                      <li>Online classes</li>
                      
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
              <div class="content">

              <div class="iframe-container" style="overflow: hidden; padding-top: 56.25%; position: relative;">
                      <iframe allow="microphone; camera" style="border: 0; height: 100%; left: 0; position: absolute; top: 0; width: 100%;" src="<?php echo e($join_url); ?>" frameborder="0"></iframe>
              </div>

<!-- https://success.zoom.us/wc/join/{meeting-id} -->
              <h3>Online Summer Classes</h3>
              <p>We've Started Courses From Home</p>
<script>
function open_win()
{
window.open("<?php echo e($join_url); ?>");
}
</script>

              <div class="row">

                <div class="col-sm-15">
                  
                      <?php
                      echo "Join Url:";
                      echo "</br>";
                      echo "$join_url";
                      ?>
                  <!-- <h3>Qur'an With Tajweed</h3>
                  <p>Lorem ipsum dolor..</p>  -->
                  <div style="margin-top:20px" class="banner__content__button">
                  <a id="start" onclick="open_win()" href="#" class="cr-btn cr-btn--theme cr-btn cr-btn--sm"><span>Join Meeting</span></a>
                  </div>
                </div>
                
                <script>
                function open_wi()
                {
                window.open("<?php echo e(url('/api/meetingsl')); ?>");
                }
                </script>

                <div class="col-sm-6">
                  <h3>Islamic Beliefs</h3>
                  <p>Lorem ipsum dolor..</p>
                  <div style="margin-top:20px" class="banner__content__button">
                  <a onclick="open_wi()" href="#" class="cr-btn cr-btn--theme cr-btn cr-btn--sm"><span>List of Meetings</span></a>
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                  <h3>Islamic History</h3>
                  <p>Lorem ipsum dolor..</p>
                  <div style="margin-top:20px" class="banner__content__button">
                  <a href="<?php echo e(url('/api/meetingsl1')); ?>" class="cr-btn cr-btn--theme cr-btn cr-btn--sm"><span><?php echo e(__('index.Meetings list')); ?></span></a>
                  </div>
                </div>
                <div class="col-sm-6">
                  <h3>Islamic Etiquette</h3>
                  <p>Lorem ipsum dolor..</p>
                  <div style="margin-top:20px" class="banner__content__button">
                  <a href="about-us.html" class="cr-btn cr-btn--theme cr-btn cr-btn--sm"><span><?php echo e(__('index.Learn More')); ?></span></a>
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                  <h3>Hadith</h3>
                  <p>Lorem ipsum dolor..</p>
                  <div style="margin-top:20px" class="banner__content__button">
                  <a href="about-us.html" class="cr-btn cr-btn--theme cr-btn cr-btn--sm"><span><?php echo e(__('index.Learn More')); ?></span></a>
                  </div>
                </div>
                <div class="col-sm-6">
                  <h3>Information</h3>
                  <p>Lorem ipsum dolor..</p>
                  <div style="margin-top:20px" class="banner__content__button">
                  <a href="about-us.html" class="cr-btn cr-btn--theme cr-btn cr-btn--sm"><span><?php echo e(__('index.Learn More')); ?></span></a>
                  </div>
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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\faisal-center\resources\views/frontend/onlinetutoring.blade.php ENDPATH**/ ?>