
<?php $__env->startSection('header'); ?>
<?php echo $__env->make('frontend.layouts.forumheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
  <section class="content">



      <div class="container" style="padding: 15px;">
        <div class="row">
                      <div class="col-lg-8 col-md-8">



                          <!-- POST -->
                          <div class="post">
                              <form action="<?php echo e(url('/user/postquestion')); ?>" class="form newtopic" method="post" id="topic-form">
                                <div class="alert alert-danger error-message"></div>
                               		<div class="alert alert-success succcess-message"></div>
                                <?php echo csrf_field(); ?>
                                  <div class="topwrap">
                                      <div class="userinfo pull-left">
                                          <div class="avatar">
                                              <img src="<?php echo e(url('/forum_asset')); ?>/images/avatar4.jpg" alt="">
                                              <div class="status red">&nbsp;</div>
                                          </div>

                                          <div class="icons">
                                              <img src="<?php echo e(url('/forum_asset')); ?>/images/icon3.jpg" alt=""><img src="<?php echo e(url('/forum_asset')); ?>/images/icon4.jpg" alt=""><img src="<?php echo e(url('/forum_asset')); ?>/images/icon5.jpg" alt=""><img src="<?php echo e(url('/forum_asset')); ?>/images/icon6.jpg" alt="">
                                          </div>
                                      </div>
                                      <div class="posttext pull-left">

                                          <div>
                                              <input type="text" placeholder="Enter Topic Title" name="subject" class="form-control" required>
                                          </div>



                                          <div>
                                              <textarea id="desc" name="question" required placeholder="Description" class="form-control"></textarea>
                                          </div>

                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="postinfobot">



                                      <div class="pull-right postreply">
                                          <!-- <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div> -->
                                          <div class="pull-left"><button type="submit" class="btn btn-primary topic-form-submit">Post</button></div>
                                          <div class="clearfix"></div>
                                      </div>


                                      <div class="clearfix"></div>
                                  </div>
                              </form>
                          </div><!-- POST -->

                          <div class="row similarposts">
                              <div class="col-lg-10"><i class="fa fa-info-circle"></i> <p>Recently <a href="#">Questions</a>.</p></div>
                              <div class="col-lg-2 loading"><i class="fa fa-spinner"></i></div>

                          </div>

                          <!-- POST -->
                          <?php if(isset($data)): ?>
                          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="post">
                              <div class="wrap-ut pull-left">
                                  <div class="userinfo pull-left">
                                      <div class="avatar">
                                          <img src="<?php echo e(url('/forum_asset')); ?>/images/avatar.jpg" alt="">
                                          <div class="status green">&nbsp;</div>
                                      </div>

                                      <div class="icons">
                                          <img src="<?php echo e(url('/forum_asset')); ?>/images/icon1.jpg" alt=""><img src="<?php echo e(url('/forum_asset')); ?>/images/icon4.jpg" alt="">
                                      </div>
                                  </div>
                                  <div class="posttext pull-left">
                                      <h2><a href="<?php echo e(url('/user/singlequestion',$getdata->id)); ?>"><?php echo e($getdata->subject); ?></a></h2>
                                      <p><?php echo Illuminate\Support\Str::limit($getdata->question, $limit = 100, $end = '...'); ?></p>
                                  </div>
                                  <div class="clearfix"></div>
                              </div>
                              <div class="postinfo pull-left">
                                  <div class="comments">
                                      <div class="commentbg">
                                          560
                                          <div class="mark"></div>
                                      </div>

                                  </div>
                                  <div class="views"><i class="fa fa-eye"></i> 1,568</div>
                                  <div class="time"><i class="fa fa-clock-o"></i><?php echo e($getdata->created_at->diffForHumans($today)); ?></div>
                              </div>
                              <div class="clearfix"></div>
                          </div><!-- POST -->
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>

                          <!-- POST -->



                          <!-- POST -->







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
                                          <tbody><tr>
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
                                                  <input id="opt2" type="radio" name="opt" value="2" checked="">
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
                                      </tbody></table>
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



      <!-- <div class="container">
          <div class="row">
              <div class="col-lg-8 col-xs-12">
                  <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                  <div class="pull-left">
                      <ul class="paginationforum">
                          <li class="hidden-xs"><a href="#">1</a></li>
                          <li class="hidden-xs"><a href="#">2</a></li>
                          <li class="hidden-xs"><a href="#">3</a></li>
                          <li class="hidden-xs"><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#">6</a></li>
                          <li><a href="#" class="active">7</a></li>
                          <li><a href="#">8</a></li>
                          <li class="hidden-xs"><a href="#">9</a></li>
                          <li class="hidden-xs"><a href="#">10</a></li>
                          <li class="hidden-xs hidden-md"><a href="#">11</a></li>
                          <li class="hidden-xs hidden-md"><a href="#">12</a></li>
                          <li class="hidden-xs hidden-sm hidden-md"><a href="#">13</a></li>
                          <li><a href="#">1586</a></li>
                      </ul>
                  </div>
                  <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                  <div class="clearfix"></div>
              </div>
          </div>
      </div> -->


  </section>
  <script>
   	$(document).ready(function(){
   		$('.error-message').hide();
   		$('.succcess-message').hide();
   		jQuery('#topic-form').submit(function(e){
        e.preventDefault();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
   			var form = $(this);
   			jQuery.ajax({
   				url: "<?php echo e(url('/user/postquestion')); ?>",
   				method: 'post',
   				data: form.serialize(),
   				success: function(result){

   					if(result.success == 0){

                  $('.error-message').show();
                  $('.error-message').append(result.message);
   					}
   					else{
   						$('.succcess-message').show();
   						$('.succcess-message').append(result.message);
              setTimeout(function(){
     						window.location.reload(1);
     					}, 3000);
   					}


   				}});

   		});
   	});
   </script>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('footer'); ?>
  <?php echo $__env->make('frontend.layouts.forumfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.forumlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/newtopic.blade.php ENDPATH**/ ?>