@extends('frontend.layouts.app')
@section('header')
@include('frontend.layouts.header')
@endsection

  @section('content')
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
.send-button{
background: #28a745;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.g-button{
color: #fff !important;
border: 1px solid #EA4335;
background: #ea4335 !important;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
.my-input{
box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
cursor: text;
padding: 8px 10px;
transition: border .1s linear;


color: #262020eb;
font-size: 16px!important;
    height: 2.461em!important;
}
.header-title{
margin: 5rem 0;
}
h1{
font-size: 31px;
line-height: 40px;
font-weight: 600;
color:#4c5357;
}
h2{
color: #5e8396;
font-size: 21px;
line-height: 32px;
font-weight: 400;
}
.login-or {
position: relative;
color: #aaa;
margin-top: 10px;
margin-bottom: 10px;
padding-top: 10px;
padding-bottom: 10px;
}
.span-or {
display: block;
position: absolute;
left: 50%;
top: -2px;
margin-left: -25px;
background-color: #fff;
width: 50px;
text-align: center;
}
.hr-or {
height: 1px;
margin-top: 0px !important;
margin-bottom: 0px !important;
}
@media screen and (max-width:480px){
h1{
font-size: 26px;
}
h2{
font-size: 20px;
}
}
/* .thumb{
  border: 1px  #000;
        margin: 10px 5px 0 0;
} */
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

												<a href="{{ url()->previous() }}">Dashboard
											</a>
										</li>




										<li><a href="{{url('/user/logout')}}">Logout</a></li>
									</ul>

								</div>

							</div>

						</aside>

					</div>


				            </div>

				            <!-- Order Details -->
				            <div class="col-sm-8 col-md-9">

                      <div class="row">
           <div class="col-md-8 mx-auto ">
             <div class="col-md-12 ">
                <div class="login-or">
                   <hr class="hr-or">
                   <span class="span-or">Account</span>
                </div>
             </div>
             <div class="card ">
                <div class="card-body">
              <div class="myform form ">
                 <form  id="update-emailform">
                   <div class="alert alert-danger update-error-message"></div>
                  		<div class="alert alert-success update-succcess-message"></div>
                   @csrf
                   <label class="col-md-5 col-md-2 control-label">Add new e-mail</label>
                    <div class="form-group">
                       <input type="email" name="email" id="email"  value="{{old('email')}}"class="form-control my-input" placeholder="&#xf0e0; Add new e-mail" style="font-family:Arial, FontAwesome">
                       <div class="email-feedback" style="color:#c33d2d;margin-left:20px;font-size:14px;"></div>

                    </div>

                    <span style="font-style: inherit; font-weight: inherit;color:#2d5106;font-size:17px;">{{$user->email}}</span>
                    <i class="fa fa-check-circle"></i>
                    <div class="text-center ">
                       <button type="button" id="update-button" class=" btn btn-block send-button tx-tfm">Add Email</button>
                    </div>
                 </form>
              </div>
           </div>
        </div>
</div></div>


  <div class="password-container" style="margin-top:30px;">
        <div class="row">

      <div class="col-md-8 mx-auto ">
        <div class="card">
           <div class="card-body">
      <div class="myform form ">
         <form  id="update-passwordform">
           <!-- <div class="alert alert-danger update-error-message"></div>
              <div class="alert alert-success update-succcess-message"></div> -->
           @csrf
           <label class="col-md-5 col-md-2 control-label">Change Password</label>
            <div class="form-group">
               <input type="password" name="currentpassword" value="{{old('currentpassword')}}" value="" id="currentpassword" class="form-control my-input" placeholder="&#xf023;  Current Password" style="font-family:Arial, FontAwesome">
               <div class="currentpassword-feedback" style="color:#c33d2d;margin-left:20px;font-size:14px;"></div>

            </div>
            <div class="form-group">
               <input type="password" name="password" id="password"  value="{{old('password')}}" class="form-control my-input" placeholder="&#xf023;  New Password" style="font-family:Arial, FontAwesome">
               <div class="newpassword-feedback" style="color:#c33d2d;margin-left:20px;font-size:14px;"></div>

            </div><div class="form-group">
               <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" id="password_confirmation" class="form-control my-input" placeholder="&#xf023;  Confirm New Password" style="font-family:Arial, FontAwesome">
               <div class="confirmpassword-feedback" style="color:#c33d2d;margin-left:20px;font-size:14px;"></div>

            </div>
            <!-- <span style="font-style: inherit; font-weight: inherit;color:#2d5106;font-size:17px;">{{$user->email}}</span>
            <i class="fa fa-check-circle"></i> -->
            <div class="text-center ">
               <button type="button" id="update-passbutton" class=" btn btn-block send-button tx-tfm">Save</button>
            </div>
         </form>
      </div>
      </div>
      </div>
    </div></div>


  </div></div>
				        </div>
				    </div>
				</div><!-- Checkout Section End-->

			</main><!-- //Page Conent -->

      <script type="text/javascript">
  //     function readURL(input) {
  //     if (input.files && input.files[0]) {
  //         var reader = new FileReader();
  //
  //         reader.onload = function (e) {
  //             $('#blah')
  //                 .attr('src', e.target.result)
  //                 .width(150)
  //                 .height(200);
  //         };
  //
  //         reader.readAsDataURL(input.files[0]);
  //     }
  // }
  jQuery(document).ready(function(){

    $('.update-error-message').hide();
    $('.update-succcess-message').hide();

    jQuery('#update-button').click(function(e){
      $('.email-feedback').html('');
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      var form_data=$("#update-emailform").serialize();

      jQuery.ajax({
        url: "{{ url('/user/addemail', $user->id)}}",
        method : 'post',
        data: form_data,
        success: function(result){

          if(result.success == 0){

            if(result.validation == 0){

              if(result.message.email){
                $('.email-feedback' ).append(result.message.email[0] );
              }
            }
            else{
              $('.update-error-message').show();
              $('.update-error-message').append(result.message);
            }
          }
          else{
            $('.update-succcess-message').show();
            $('.update-succcess-message').append(result.message);
            $('#update-emailform').trigger("reset");
            setTimeout(function(){
              window.location.reload(1);
            }, 3000);
          }


        }});

    });

    jQuery('#update-passbutton').click(function(e){
      $('.currentpassword-feedback').html('');
      $('.newpassword-feedback').html('');
      $('.confirmpassword-feedback').html('');
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      var form_data=$("#update-passwordform").serialize();

      jQuery.ajax({
        url: "{{ url('/user/changepassword', $user->id)}}",
        method : 'post',
        data: form_data,
        success: function(result){

          if(result.success == 0){

            if(result.validation == 0){
              if(result.message.currentpassword){
                $('.currentpassword-feedback' ).append(result.message.currentpassword[0] );
              }if(result.message.password){
                $('.newpassword-feedback' ).append(result.message.password[0] );
              }
              if(result.message.password_confirmation){
                $('.confirmpassword-feedback' ).append(result.message.password_confirmation[0] );
              }
              else{
              $('.update-error-message').show();
              $('.update-error-message').append(result.message);
            }
            }

          }
          else{
            $('.update-succcess-message').show();
            $('.update-succcess-message').append(result.message);
            $('#update-emailform').trigger("reset");
            setTimeout(function(){
              window.location.reload(1);
            }, 3000);
          }


        }});

    });



  });



      </script>
      @endsection
      @section('footer')
      @include('frontend.layouts.footer')
      @endsection

      @section('modals')
      @include('frontend.layouts.modals')
      @endsection
