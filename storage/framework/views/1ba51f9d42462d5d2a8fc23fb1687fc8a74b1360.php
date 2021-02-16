<div class="accountbox-wrapper">
				<div class="accountbox text-left">
					<ul class="nav accountbox__filters" id="myTab" role="tablist">
						<li>
							<a class="active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
						</li>
						<li>
							<a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
						</li>
					</ul>
					<div class="accountbox__inner tab-content" id="myTabContent">
						<div class="accountbox__login tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <?php echo $__env->make('frontend.layouts.partials.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						</div>
						<div class="accountbox__register tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <?php echo $__env->make('frontend.layouts.partials.signup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

						</div>
						<span class="accountbox-close-button"><i class="icofont icofont-close"></i></span>
					</div>
				</div>
			</div>
<?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/layouts/modals.blade.php ENDPATH**/ ?>