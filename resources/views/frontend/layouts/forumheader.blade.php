
            <div class="headernav"> <div class="container"> <div class="row">
            <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a
            href="index.html"><img src="{{url('/forum_asset')}}/images/logo.jpg" alt=""  /></a></div>
            <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic"> <div
            class="dropdown" > <a  href="#" style="text-decoration: none;" >Ask Question</a> &nbsp
            <span><a href="{{ url()->previous() }}" style="color: #1abc9c;text-decoration: none;" >Back</a></span>

                            </div>
                        </div>
                        <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
                            <div class="wrap">
                                <form action="#" method="post" class="form">
                                    <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                                    <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                            <div class="stnt pull-left">
                                <a href="{{url('/user/newtopic')}}">
                                    <button class="btn btn-primary">Start Conversation</button>
                                </a>
                            </div>
                            <div class="env pull-left"><i class="fa fa-envelope"></i></div>

                            <div class="avatar pull-left dropdown">
                                <a data-toggle="dropdown" href="#"><img src="{{url('/forum_asset')}}/images/avatar.jpg" alt="" /></a> <b class="caret"></b>
                                <div class="status green">&nbsp;</div>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/user/dashboard')}}">My Profile</a></li>
                                    <!-- <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Inbox</a></li> -->
                                    <li role="presentation"><a role="menuitem" tabindex="-3" href="{{url('/user/logout')}}">Log Out</a></li>
                                    <!-- <li role="presentation"><a role="menuitem" tabindex="-4" href="04_new_account.html">Create account</a></li> -->
                                </ul>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
