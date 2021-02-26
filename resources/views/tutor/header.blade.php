<header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header" style="background-color: transparent;
            color: #fff;">
                <!-- <a class="navbar-brand" href="{{url('/admin/dashboard')}}"> -->
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    {{-- <img src="{{url('/admin_asset')}}/images/logo-icon.png" alt="homepage" class="dark-logo" /> --}}
                    <!-- Light Logo icon -->
                    {{-- <img src="{{url('/admin_asset')}}/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                    --}}
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                    <!-- dark Logo text -->
                <a class="sm-hidden text-white" href="{{url('/')}}/tutor/dashboard">Online Portal</a>
                    <!-- Light Logo text -->
                    {{-- <img src="{{url('/admin_asset')}}/images/logo-light-text.png" class="light-logo" alt="homepage"
                    /></span> </a> --}}
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                            href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item m-l-10"> <a
                            class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome,
                            </a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                    </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <!-- <div class="u-img"><img src="{{url('/')}}/uploads/avatars/{{Auth::user()->avatar}}" alt="user"></div> -->
                                            <div class="u-text">
                                            <h4>{{Auth::user()->name}}</h4>
                                            <p class="text-muted">{{Auth::user()->email}}</p>
                                            {{-- <a href="#" class="btn btn-rounded btn-danger btn-sm">View Profile</a> --}}
                                        </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                <li><a href="{{url('/')}}/tutor/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                </ul>
            </div>
        </nav>
    </header>





    <aside class="left-sidebar">
        <!-- Sidebar scroll-->

        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li> <a class="waves-effect waves-dark" href="{{url('/tutor/dashboard')}}">
                        <i class="mdi mdi-checkbox-multiple-blank"></i><span class="hide-menu">Dashboard</span></a>

                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-video"></i><span class="hide-menu">Online Tutoring</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('/tutor/meetinginvite')}}">Create Invitations</a></li>
                            <li><a href="{{url('/tutor/getallinvite')}}">All Meetings</a></li>
                        </ul>
                </li>

                
                {{-- <li> <a class="waves-effect waves-dark" href="{{url('/tutor/front-page')}}">
                        <i class="mdi mdi-gauge"></i><span class="hide-menu">Front Page </span></a>

                </li> --}}
                <li> <a class="waves-effect waves-dark" href="{{url('/tutor/logout')}}">
                        <i class="mdi mdi-power"></i><span class="hide-menu">Logout </span></a>

                </li>
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
