<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/admin_asset')}}/assets/images/favicon.png">
    <title>OnlineMaseet</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('/admin_asset')}}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('/admin_asset')}}/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{url('/admin_asset')}}/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <section id="wrapper">
            <div class="login-register" style='background-image:url({{url("/admin_asset")}}/images/background/login-register.jpg);'>
                <div class="login-box card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" id="tutor-form" enctype="multipart/form-data">
                          {!! csrf_field() !!}

                         <h3 class="box-title m-b-20">Sign Up</h3>
                          <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="name" type="text" required="" placeholder="Name" value="{{old('name')}}"> </div>
                                <span id="subject" class="form-errors" style="color:red;">{{ $errors->first('name') }}</span>
                            </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="about" required="" placeholder="About" value="{{old('about')}}"></div>
                                <span id="subject" class="form-errors" style="color: red;">
                                    {{$errors->first('about')}}
                                </span>
                            </div>
                            <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="images" required="" placeholder="About" value="{{old('images')}}"></div>
                                <span id="subject" class="form-errors" style="color: red;">
                                    {{$errors->first('images')}}
                                </span>
                            </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="email" type="email" required="" placeholder="Email" value="{{old('email')}}"> </div>
                                <span id="subject" class="form-errors" style="color:red;">{{ $errors->first('email') }}</span>
                        </div>
                        
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" name="password" required="" placeholder="Password"> </div>
                                    <span id="subject" class="form-errors" style="color:red;">{{ $errors->first('password') }}</span>
                                </div>
                                <div class="form-group">
                                <div class="col-xs-12">
                                <input class="form-control" type="password" placeholder="Confirm password" name="password_confirmation"></div>
                                <span id="subject" class="form-errors" style="color:red;">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                          
                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"   type="submit">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="{{url('/admin_asset')}}/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="{{url('/admin_asset')}}/plugins/bootstrap/js/popper.min.js"></script>
            <script src="{{url('/admin_asset')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="{{url('/admin_asset')}}/js/jquery.slimscroll.js"></script>
            <!--Wave Effects -->
            <script src="{{url('/admin_asset')}}/js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="{{url('/admin_asset')}}/js/sidebarmenu.js"></script>
            <!--stickey kit -->
            <script src="{{url('/admin_asset')}}/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
            <script src="{{url('/admin_asset')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
            <!--Custom JavaScript -->
            <script src="{{url('/admin_asset')}}/js/custom.min.js"></script>
            <!-- ============================================================== -->
            <!-- Style switcher -->
            <!-- ============================================================== -->
            <script src="{{url('/admin_asset')}}/plugins/styleswitcher/jQuery.style.switcher.js"></script>
            <script src="{{url('/admin_asset')}}/js/bootbox.min.js"></script>
           
            <script type="text/javascript">
               
              jQuery(document).ready(function(){

                jQuery('#tutor-form').submit(function(e){
                  e.preventDefault();
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  });
                  var myForm = document.getElementById('tutor-form');
                  var formData = new FormData(myForm);
                    jQuery.ajax({
                      url: "{{ url('/tsignup') }}",
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
                   $(location).attr('href', '/tutor');
                }
              });


                        }
                      }});
                  });
              });
            </script>
        </body>

        </html>
