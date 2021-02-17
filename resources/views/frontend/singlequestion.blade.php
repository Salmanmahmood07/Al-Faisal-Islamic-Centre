@extends('frontend.layouts.forumlayout')
@section('header')
@include('frontend.layouts.forumheader')
@endsection

  @section('content')
  <section class="content">



    <div class="container" style="padding: 15px;">
                  <div class="row">
                      <div class="col-lg-8 col-md-8">

                          <!-- POST -->
                          <div class="post beforepagination">
                              <div class="topwrap">
                                  <div class="userinfo pull-left">
                                      <div class="avatar">
                                        <i class="fa fa-user"></i>

                                          <div class="status green">&nbsp;</div>
                                      </div>

                                      <div class="icons">
                                          <img src="{{url('/forum_asset')}}/images/icon1.jpg" alt="" /><img src="{{url('/forum_asset')}}/images/icon4.jpg" alt="" /><img src="{{url('/forum_asset')}}/images/icon5.jpg" alt="" /><img src="{{url('/forum_asset')}}/images/icon6.jpg" alt="" />
                                      </div>
                                  </div>

                                  <div class="posttext pull-left">

                                      <h2>{{$user->subject}}</h2>
                                      <p>{{$user->question}}</p>

                                  </div>
                                  <div class="clearfix"></div>
                              </div>
                              <div class="postinfobot">

                                  <div class="likeblock pull-left">

                                  </div>

                                  <div class="prev pull-left">
                                      <a href="#"><i class="fa fa-reply"></i></a>
                                  </div>

                                  <div class="posted pull-left" style="color:black;"><i class="fa fa-clock-o"></i> Posted on : {{$user->created_at->diffForHumans($today)}}  </div>

                                  <div class="next pull-right">


                                      <a href="#"><i class="fa fa-flag"></i></a>
                                  </div>

                                  <div class="clearfix"></div>

                              </div>
                          </div><!-- POST -->
                          <br>
                          @if(isset($getuserreply))
                          <h4 style="color:black;text-align:center;"> {{$getuserreply->count()}} Answers</h4>
                          @endif
                          <div class="paginationf" style="padding-top:15px;">
                              <div class="clearfix"></div>
                          </div>

                          @if(isset($getuserreply))
                          @foreach($getuserreply as $getusr)
                          <div class="post">
                              <div class="topwrap">
                                  <div class="userinfo pull-left">
                                      <div class="avatar">
                                        <i class="fa fa-user"></i>

                                          <div class="status red">&nbsp;</div>
                                      </div>

                                      <div class="icons">
                                          <img src="{{url('/forum_asset')}}/images/icon3.jpg" alt="" /><img src="{{url('/forum_asset')}}/images/icon4.jpg" alt="" /><img src="{{url('/forum_asset')}}/images/icon5.jpg" alt="" /><img src="{{url('/forum_asset')}}/images/icon6.jpg" alt="" />
                                      </div>
                                  </div>
                                  <div class="posttext pull-left">
                                      <p>{{$getusr->reply}}</p>
                                  </div>
                                  <div class="clearfix"></div>
                              </div>

                              <div class="postinfobot">

                                  <div class="likeblock pull-left">

                                  </div>

                                  <div class="prev pull-left">
                                      <a href="#"><i class="fa fa-reply"></i></a>
                                  </div>

                                  <div class="posted pull-left" style="color:black;"><i class="fa fa-clock-o"></i> Posted on : {{date('m-d-Y ',strtotime($getusr->createdtime))}} , By : {{$getusr->username}}</div>

                                  <div class="next pull-right">

                                      <a href="#"><i class="fa fa-flag"></i></a>
                                  </div>

                                  <div class="clearfix"></div>
                              </div>
                          </div><!-- POST -->
                          @endforeach
                          @endif

                          <!-- POST -->


                          <div class="container">
                                             <div class="row">
                                                 <div class="col-lg-8">
                                                     <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                                                     <div class="pull-left">
                                                         <ul class="paginationforum">
                                                            <li>{{ $getuserreply->links() }}</li>
                                                         </ul>
                                                     </div>
                                                     <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                                                     <div class="clearfix"></div>
                                                 </div>
                                             </div>
                                         </div>

                          <!-- POST -->
                          <div class="post">
                              <form  class="form"  id="form-reply">
                                @csrf
                                  <div class="topwrap">
                                      <div class="userinfo pull-left">
                                          <div class="avatar">
                                              <img src="{{url('/forum_asset')}}/images/avatar4.jpg" alt="" />
                                              <div class="status red">&nbsp;</div>
                                          </div>

                                          <div class="icons">
                                              <img src="{{url('/forum_asset')}}/images/icon3.jpg" alt="" /><img src="{{url('/forum_asset')}}/images/icon4.jpg" alt="" /><img src="{{url('/forum_asset')}}/images/icon5.jpg" alt="" /><img src="{{url('/forum_asset')}}/images/icon6.jpg" alt="" />
                                          </div>
                                      </div>
                                      <div class="posttext pull-left">
                                          <div class="textwraper">
                                              <div class="postreply">Post a Reply</div>
                                              <textarea name="reply" id="reply" required placeholder="Type your message here"></textarea>
                                          </div>
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="postinfobot">

                                      <div class="notechbox pull-left">
                                          <input type="checkbox" name="note" id="note" class="form-control" />
                                      </div>

                                      <div class="pull-left">
                                          <label for="note"> Email me when some one post a reply</label>
                                      </div>

                                      <div class="pull-right postreply">
                                          <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                          <div class="pull-left"><button type="submit" class="btn btn-primary">Post Reply</button></div>
                                          <div class="clearfix"></div>
                                      </div>


                                      <div class="clearfix"></div>
                                  </div>
                              </form>
                          </div><!-- POST -->


                      </div>
                      <div class="col-lg-4 col-md-4">

                          <!-- -->
                          <div class="sidebarblock">
                              <h3>Categories</h3>
                              <div class="divline"></div>
                              <div class="blocktxt">
                                  <ul class="cats">
                                      <li><a href="#">Trading for Money <span class="badge pull-right">20</span></a></li>
                                      <li><a href="#">Vault Keys Giveway <span class="badge pull-right">10</span></a></li>
                                      <li><a href="#">Misc Guns Locations <span class="badge pull-right">50</span></a></li>
                                      <li><a href="#">Looking for Players <span class="badge pull-right">36</span></a></li>
                                      <li><a href="#">Stupid Bugs &amp; Solves <span class="badge pull-right">41</span></a></li>
                                      <li><a href="#">Video &amp; Audio Drivers <span class="badge pull-right">11</span></a></li>
                                      <li><a href="#">2K Official Forums <span class="badge pull-right">5</span></a></li>
                                  </ul>
                              </div>
                          </div>

                          <!-- -->
                          <div class="sidebarblock">
                              <h3>Poll of the Week</h3>
                              <div class="divline"></div>
                              <div class="blocktxt">
                                  <p>Which game you are playing this week?</p>
                                  <form action="#" method="post" class="form">
                                      <table class="poll">
                                          <tr>
                                              <td>
                                                  <div class="progress">
                                                      <div class="progress-bar color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                          Call of Duty Ghosts
                                                      </div>
                                                  </div>
                                              </td>
                                              <td class="chbox">
                                                  <input id="opt1" type="radio" name="opt" value="1">
                                                  <label for="opt1"></label>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <div class="progress">
                                                      <div class="progress-bar color2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 63%">
                                                          Titanfall
                                                      </div>
                                                  </div>
                                              </td>
                                              <td class="chbox">
                                                  <input id="opt2" type="radio" name="opt" value="2" checked>
                                                  <label for="opt2"></label>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <div class="progress">
                                                      <div class="progress-bar color3" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                                          Battlefield 4
                                                      </div>
                                                  </div>
                                              </td>
                                              <td class="chbox">
                                                  <input id="opt3" type="radio" name="opt" value="3">
                                                  <label for="opt3"></label>
                                              </td>
                                          </tr>
                                      </table>
                                  </form>
                                  <p class="smal">Voting ends on 19th of October</p>
                              </div>
                          </div>

                          <!-- -->
                          <div class="sidebarblock">
                              <h3>My Active Threads</h3>
                              <div class="divline"></div>
                              <div class="blocktxt">
                                  <a href="#">This Dock Turns Your iPhone Into a Bedside Lamp</a>
                              </div>
                              <div class="divline"></div>
                              <div class="blocktxt">
                                  <a href="#">Who Wins in the Battle for Power on the Internet?</a>
                              </div>
                              <div class="divline"></div>
                              <div class="blocktxt">
                                  <a href="#">Sony QX10: A Funky, Overpriced Lens Camera for Your Smartphone</a>
                              </div>
                              <div class="divline"></div>
                              <div class="blocktxt">
                                  <a href="#">FedEx Simplifies Shipping for Small Businesses</a>
                              </div>
                              <div class="divline"></div>
                              <div class="blocktxt">
                                  <a href="#">Loud and Brave: Saudi Women Set to Protest Driving Ban</a>
                              </div>
                          </div>


                      </div>
                  </div>
              </div>





  </section>

  <script>
   	$(document).ready(function(){

   		jQuery('#form-reply').submit(function(e){
        e.preventDefault();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
   			var form = $(this);
   			jQuery.ajax({
   				url: "{{url('/user/postreply',$user->id)}}",
   				method: 'post',
   				data: form.serialize(),
   				success: function(result){

   					if(result.success == 0){


                  alert(result.message);
   					}
   					else{

   						alert(result.message);
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
  @include('frontend.layouts.forumfooter')
  @endsection
