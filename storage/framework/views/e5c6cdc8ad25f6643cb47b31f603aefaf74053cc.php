<style type="text/css">

 /* .sel{
    height: 40px;
    line-height: 42px;
    border: 1px solid #aaaaaa;
    background: transparent;
    font-size: 14px;
    font-weight: 400;
    color: #afacac;
} */
</style>
<form  id="register-form">
  <div class=" signup-error-message"></div>
	<div class=" signup-succcess-message"></div>
  <?php echo csrf_field(); ?>

  <div class="single-input">
    <input type="text" placeholder="User name" name="name" class="cr-round cr-round--lg txt">
    <div class="name-feedback" style="color:#c33d2d;margin-left:20px;font-size:14px;"></div>

  </div>
  <div class="single-input">
    <input type="email" placeholder="Email address" name="email" class="cr-round cr-round--lg txt">
    <div class="email-feedback" style="color:#c33d2d;margin-left:20px;font-size:14px;"></div>
  </div>
  <!-- <div class="single-input">

<select class="sel cr-round cr-round--lg">
  <option value="" disabled selected>Choose your option</option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
  <option value="4">Option 4</option>
  <option value="5">Option 5</option>
</select>
  </div> -->

  <div class="single-input">
    <input type="password" placeholder="Password" name="password" class="cr-round cr-round--lg txt">
    <div class="password-feedback" style="color:#c33d2d;margin-left:20px;font-size:14px;"></div>
  </div>
  <div class="single-input">
    <input type="password" placeholder="Confirm password" name="password_confirmation" class="cr-round cr-round--lg txt">
    <div class="confirmpassword-feedback" style="color:#c33d2d;margin-left:20px;font-size:14px;"></div>
  </div>
  <div class="single-input">
    <button type="submit"  id="register-button" class="cr-btn cr-btn--sm cr-btn--theme cr-round cr-round--lg"><span>Sign Up</span></button>
  </div>
</form>
<script>
jQuery(document).ready(function(){

  $('.signup-error-message').hide();
  $('.signup-succcess-message').hide();

  jQuery('#register-button').click(function(e){

    $('.name-feedback').html('');
    $('.email-feedback').html('');
    $('.password-feedback').html('');
    $('.confirmpassword-feedback').html('');
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    var form_data=$("#register-form").serialize();

    jQuery.ajax({
      url: "<?php echo e(url('/user/signup')); ?>",
      method : 'post',
      data: form_data,
      success: function(result){

        if(result.success == 0){

          if(result.validation == 0){

            if(result.message.email){
              $('.email-feedback' ).append(result.message.email[0] );
            }
            if(result.message.name){
              $('.name-feedback' ).append(result.message.name[0] );
            }
            if(result.message.password){
              $('.password-feedback' ).append(result.message.password[0] );
            }

          }

            $('.signup-error-message').show();
            $('.signup-error-message').append(result.message);

        }
        else{
          $('.signup-succcess-message').show();
          $('.signup-succcess-message').append(result.message);
          setTimeout(function(){
            window.location.reload(1);
          }, 3000);

        }

      }});

  });
});
</script>
<?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/layouts/partials/signup.blade.php ENDPATH**/ ?>