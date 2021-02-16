<form id="login-form" class="login-form-data">
  <div class="alert alert-danger login-error-message"></div>
 		<div class="alert alert-success login-succcess-message"></div>
      <?php echo csrf_field(); ?>

  <div class="single-input">
    <input type="email" placeholder="Email" value="<?php echo e(old('e-mail')); ?>" name="email" class="cr-round cr-round--lg">
    <div class="email-feedback" style="color:red;"></div>
  </div>
  <div class="single-input">
    <input type="password" placeholder="Password" name="password" class="cr-round cr-round--lg">
    <div class="password-feedback" style="color:red;"></div>
  </div>
  <div class="single-input">
    <button type="button" class="cr-btn cr-btn--sm cr-btn--theme cr-round cr-round--lg login-form-submit"><span>Go</span></button>
  </div>
  <div class="accountbox-login__others">
    <h6>Or login with</h6>
    <div class="social-icons social-icons--rounded">
      <ul>
        <li class="facebook"><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
        <li class="twitter"><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
        <li class="pinterest"><a href="#"><i class="fa fa-google-plus"></i></a></li>
      </ul>
    </div>
  </div>
</form>

<script>
 	jQuery(document).ready(function(){
    // alert("hy");
 		$('.login-error-message').hide();
 		$('.login-succcess-message').hide();

 		jQuery('.login-form-submit').click(function(e){

 			$('.password-feedback').html('');
 			$('.email-feedback').html('');

      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
 			var form_data = $('.login-form-data').serialize();
 			jQuery.ajax({
 				url: "<?php echo e(url('/user/authenticate-user')); ?>",
 				method: 'post',
 				data: form_data,
 				success: function(result){

 					if(result.success == 0){

 						if(result.validation == 0){


 							if(result.message.email){
 								$('.email-feedback' ).html(result.message.email[0] );
 							}
 							if(result.message.password){
 								$('.password-feedback' ).html(result.message.password[0] );
 							}
              else{
                $('.login-error-message').show();
                $('.login-error-message').html(result.message);
                $('.login-error-message').fadeTo(2000, 500).slideUp(500, function(){
                $('.login-error-message').slideUp(500);
                });
              }
 						}


 					}
 					else{
 						$('.login-succcess-message').show();
 						$('.login-succcess-message').html(result.message);
            setTimeout(function(){
   						window.location.reload(1);
   					}, 3000);
 					}


 				}});

 		});
 	});
 </script>
<?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/layouts/partials/login.blade.php ENDPATH**/ ?>