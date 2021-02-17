@extends('admin.masterpage')
@section('header')
@include('admin.header')
@endsection

  @section('content')

  <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Form float input</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item active">Add Menu</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
  <div class="container-fluid">
  <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">

                              <h6 class="card-subtitle">Just add </h6>
                               @if(!empty($role))
                              <form class="floating-labels m-t-40"   id="register-form">

                                 @csrf
                                 <div class="form-group m-b-40">

                                         <select class="form-control p-0" id="input6" name="userselect">
                                             <option></option>


                                             @foreach ($role as $roles)



                                             <option value="{{$roles->id}}">{{$roles->name}}</option>
                                             @endforeach
				                                      @endif
                                         </select><span class="bar"></span>
                                         <label for="input6">Select User</label>
                                     </div>

                                  <div class="alert alert-danger signup-error-message"></div>
  	                               <div class="alert alert-success signup-succcess-message"></div>

                                  <button type="button" class="btn btn-success " id="register-button">Make Moderator </button>
                                  <!-- <div class="form-group m-b-40">
                                      <input type="text" class="form-control" id="input3">
                                      <span class="bar"></span>
                                      <label for="input3">Placeholder</label>
                                  </div> -->



                              </form>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="right-sidebar">
                  <div class="slimscrollright">
                      <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                      <div class="r-panel-body">
                          <ul id="themecolors" class="m-t-20">
                              <li><b>With Light sidebar</b></li>
                              <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                              <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                              <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                              <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                              <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                              <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                              <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                              <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                              <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                              <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                              <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                              <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                              <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                          </ul>
                          <ul class="m-t-20 chatonline">
                              <li><b>Chat option</b></li>
                              <li>
                                  <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
            </div>
            <script type="text/javascript">
              jQuery(document).ready(function(){
                $('.signup-error-message').hide();
                $('.signup-succcess-message').hide();
                jQuery('#register-button').click(function(e){
                  e.preventDefault();
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  });
                    var form_data=$("#register-form").serialize();
                    jQuery.ajax({
                      url: "{{ url('/admin/userrolechange') }}",
                      method : 'post',
                      data: form_data,
                      success: function(result){

                        if(result.success == 0){
                            $('.signup-error-message').show();
                            $('.signup-error-message').append(result.message);
                        }
                        else{
                          $('.signup-succcess-message').show();
                          $('.signup-succcess-message').append(result.message);
                        }
                      }});
                  });
              });
            </script>
  @endsection
