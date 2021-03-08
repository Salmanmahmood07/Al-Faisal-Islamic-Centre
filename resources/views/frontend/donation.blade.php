@extends('frontend.layouts.app')
@section('header')
@include('frontend.layouts.header')
@endsection

@section('content')
<style type="text/css">
.map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
</style>


  <!-- Breadcrumb area -->
  			<section class="cr-section breadcrumb-area" data-black-overlay="7">
  				<div class="container">
  					<div class="row">
  						<div class="col-lg-12 text-center">
  							<div class="cr-breadcrumb text-center">
  								<h2 class="cr-breadcrumb__title">{{__('donation.Donations')}}</h2>
  								<div class="cr-breadcrumb__tree text-left text-md-left text-center">
  									<ul>
  										<li><a href="{{ url('/') }}">{{__('contact.HOME')}}</a></li>
  										<li>{{__('donation.Donations')}}</li>
  									</ul>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</section><!-- //Breadcrumb area -->

        <!-- Page Conent -->
      <main class="page-content">

        <!-- Donnation Form -->
        <div class="pg-donation-area ptb--150 bg--white">
          <div class="container">
            <form action="#" id="pg-donation" class="pg-donation">
              <div class="row">
                <div class="col-lg-6">
                  <aside class="pg-donation__personalinfo">
                    <h4 class="pg-dontation__title">Personal Information</h4>
                    <div class="single-input">
                      <label for="pg-donation-name">Name*</label>
                      <input type="text" id="pg-donation-name">
                    </div>
                    <div class="single-input">
                      <label for="pg-donation-email">Email*</label>
                      <input type="email" id="pg-donation-email">
                    </div>
                    <div class="single-input">
                      <label for="pg-donation-phone">Phone*</label>
                      <input type="number" id="pg-donation-phone">
                    </div>
                    <div class="single-input">
                      <label for="pg-donation-address">Address*</label>
                      <input type="text" id="pg-donation-address">
                      <input type="text">
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="single-input">
                          <label for="pg-donation-country">Country*</label>
                          <select name="pg-donation-country" id="pg-donation-country">
                            <option value="united-states">United States</option>
                            <option value="canada">Canada</option>
                            <option value="australia">Australia</option>
                            <option value="germany">Germany</option>
                            <option value="sweden">Sweden</option>
                            <option value="india">India</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="single-input">
                          <label for="pg-donation-profession">Profession*</label>
                          <input type="text" id="pg-donation-profession">
                        </div>
                      </div>
                    </div>
                  </aside>
                </div>
                <div class="col-lg-6">
                  <aside class="pg-donation__bankinfo">
                    <h4 class="pg-dontation__title">Donation Information</h4>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="single-input">
                          <label for="pg-donation-amount">Donation Amount*</label>
                          <input type="number" id="pg-donation-amount">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="single-input donation-type">
                          <p>
                            <input type="radio" name="pg-donation-type" id="pg-donation-type-onetime">
                            <label for="pg-donation-type-onetime">Onetime</label>
                          </p>
                          <p>
                            <input type="radio" name="pg-donation-type" id="pg-donation-type-monthly">
                            <label for="pg-donation-type-monthly">Monthly</label>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="single-input">
                      <label for="pg-donation-cardnumber">Card number</label>
                      <input type="text" id="pg-donation-cardnumber">
                    </div>
                    <div class="single-input">
                      <label for="pg-donation-expiry-month">Expire Date</label>
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <select name="pg-donation-country" id="pg-donation-expiry-month">
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                          </select>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <select name="pg-donation-country" id="pg-donation-expiry-year">
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="single-input">
                          <label for="pg-donation-security">Security Code</label>
                          <input type="text" id="pg-donation-security">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="single-input">
                          <label for="pg-donation-zipcode">Zip Code</label>
                          <input type="text" id="pg-donation-zipcode">
                        </div>
                      </div>
                    </div>
                    <div class="single-input payment-cards">
                      <h6>Payment Method</h6>
                      <p>
                        <input type="radio" name="pg-donation-paycard" id="pg-donation-card-mastercard">
                        <label for="pg-donation-card-mastercard"><img src="{{url('/frontend_asset')}}/images/icons/card-mastercard.png" alt="card type"></label>
                      </p>
                      <p>
                        <input type="radio" name="pg-donation-paycard" id="pg-donation-card-visa">
                        <label for="pg-donation-card-visa"><img src="{{url('/frontend_asset')}}/images/icons/card-visa.png" alt="card type"></label>
                      </p>
                      <p>
                        <input type="radio" name="pg-donation-paycard" id="pg-donation-card-american-express">
                        <label for="pg-donation-card-american-express"><img src="{{url('/frontend_asset')}}/images/icons/card-american-express.png" alt="card type"></label>
                      </p>
                      <p>
                        <input type="radio" name="pg-donation-paycard" id="pg-donation-card-decover">
                        <label for="pg-donation-card-decover"><img src="{{url('/frontend_asset')}}/images/icons/card-decover.png" alt="card type"></label>
                      </p>
                    </div>
                    <div class="single-input">
                      <button type="submit">Donate Now</button>
                    </div>
                  </aside>
                </div>
              </div>
            </form>
          </div>
        </div><!-- //Donnation Form -->

      </main><!-- //Page Conent -->

      
      <script type="text/javascript">

  
              jQuery(document).ready(function(){

                jQuery('#contact-form').submit(function(e){
                  e.preventDefault();
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  });
                  var myForm = document.getElementById('contact-form');
                  var formData = new FormData(myForm);
                    jQuery.ajax({
                      url: "{{ url('/storecontact') }}",
                      method : 'post',
                      data: formData,
                      contentType: false,
                       cache: false,
                       processData: false,
                      success: function(result){
                        if(result.success == 0){

                                  bootbox.alert({
                        title: "Message",
                        message:result.message,
                        callback: function(){
                          }
                      });
                        }
                        else{
                          bootbox.alert({
                title: "Message",
                message:result.message,
                callback: function(){
                   $("#contact-form").trigger("reset");
                }
              });


                        }
                      }});
                  });
              });
            </script>
    @section('modals')
    @include('frontend.layouts.modals')
    @endsection
    <!-- Cartbox -->




  @endsection

@section('footer')
@include('frontend.layouts.footer')
@endsection
