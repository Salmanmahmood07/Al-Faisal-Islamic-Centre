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
              @include('frontend.layouts.partials.login')
						</div>
						<div class="accountbox__register tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              @include('frontend.layouts.partials.signup')

						</div>
						<span class="accountbox-close-button"><i class="icofont icofont-close"></i></span>
					</div>
				</div>
			</div>
