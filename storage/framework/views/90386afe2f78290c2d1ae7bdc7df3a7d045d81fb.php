
<?php $__env->startSection('header'); ?>
<?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
  <style>
  .price-summary-wrapper {
    border: 4px solid #EEE;
    border-radius: 3px;
    padding: 30px 20px;
}
h4.heading{
    line-height: 1;
      margin-bottom: 13px;


}
.uppercase {
    text-transform: uppercase !important;
}
.text-primary {
    color: #5b8e55 !important;

}
.no-mt, .mt-0 {
    margin-top: 0 !important;
}
.sidebar-inner {
    border: 4px solid #EEE;
    padding: 10px 20px 0;
    border-radius: 3px;
}
.no-border {
    border: 0 !important;
}
for-static-page .sidebar-module {
    margin-right: 30px;
}
.sidebar-module {
    padding: 0 0 30px;
}
 ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
ul.static-page-menu li a {
    display: block;
    color: #636363;
    padding: 8px 20px;
    transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    line-height: 1;
    padding-left: 0;
    border-left: 4px solid #FFF !important;
    border-right: 4px solid #FFF;
    margin-right: -4px;
    margin-left: -4px;
    margin-bottom: 1px;
    font-size: 14px;
}
.sorting-wrappper {
    margin: 0 0 23px;
}
.sorting-header {
    margin: 0 0 15px;
}
.sorting-wrappper h3 {
    line-height: 1.2;
    margin: 0;
}.uppercase {
    text-transform: uppercase !important;
}
p:last-child {
    margin-bottom: 0;
}
p .txt{
  text-transform:uppercase;
}

  </style>
  <section class="cr-section breadcrumb-area" data-black-overlay="7">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="cr-breadcrumb text-center">

								<div class="cr-breadcrumb__tree text-left text-md-left text-center">
									<ul>
										<li><a href="index.html">Home</a></li>

										<li>Dashboard</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

      <main class="page-content">

				<!-- Checkout Section Start-->
				<div class="checkout-section cr-section pt--150 pb--120 bg--white">
				    <div class="container">
				        <div class="row">

				            <div class="col-sm-4 col-md-3">

                      <div class="price-summary-wrapper">

						<h4 class="heading mt-0 text-primary uppercase">My Links</h4>

						<aside class="sidebar" style="display:block;">

							<div class="sidebar-inner no-border for-static-page">

								<div class="sidebar-module">

									<ul class="static-page-menu">


										<li>
                      <a href="<?php echo e(url('/user/updateprofile', $user->id)); ?>">
												Update Profile
											</a>
										</li>

                    <li>
                      <a href="<?php echo e(url('/user/accountsettings', $user->id)); ?>">
											Account Settings
											</a>
										</li>



										<li><a href="<?php echo e(url('/user/logout')); ?>">Logout</a></li>
									</ul>

								</div>

							</div>

						</aside>

					</div>


				            </div>

				            <!-- Order Details -->
				            <div class="col-sm-8 col-md-9">

                      <div class="sorting-wrappper">

						<div class="sorting-header">
							<h3 class="sorting-title uppercase">
								Welcome
							</h3>
							<p class="sorting-lead">Here is your dashbord.</p>
						</div>

					</div>

          <div class="order-details-wrapper">
                           <h2>Your Profile</h2>
                           <div class="order-details">
                               <form action="#">
                                   <ul>
                                       <li><p class=" txt">Name</p><p class="strong txt"><?php echo e($user->name); ?></p></li>

                                       <li><p class=" txt">Email</p><p class="strong txt" ><?php echo e($user->email); ?></p></li>
                                       <li><p class=" txt">Marital Status</p><p class="strong"><?php echo e($user->marital_status); ?></p></li>

                                       <li><p class=" txt">Date of Birth</p><p class="strong "><?php echo e($user->dob); ?></p></li>
                                       <li><p class=" txt">About</p><p class="strong"><?php echo e($user->about); ?></p></li>


                                   </ul>
                               </form>
                           </div>
                       </div>
          </div>

				        </div>
				    </div>
				</div><!-- Checkout Section End-->

			</main><!-- //Page Conent -->
      <?php $__env->stopSection(); ?>
      <?php $__env->startSection('footer'); ?>
      <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php $__env->stopSection(); ?>

      <?php $__env->startSection('modals'); ?>
      <?php echo $__env->make('frontend.layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/dashboard.blade.php ENDPATH**/ ?>