
<?php $__env->startSection('header'); ?>
<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>

  <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Manage Videos</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item active">Edit Video</li>
                    </ol>
                </div>
            </div>
  <div class="container-fluid">
  
    <div class="row" style="margin-top:10px;">
                  <div class="col-12">
                      <div class="card">

                          <div class="card-body">

                              <h6 class="card-subtitle">Just Edit </h6>
                              <form class="m-t-40"  id="video-form" enctype="multipart/form-data" >

                                <?php echo csrf_field(); ?>


                                <input type="hidden" name="id" value="<?php echo e($video->id); ?>">
                                  <div class="form-group m-b-40">
                                      <label for="input1">Video Title</label>
                                      <input type="text" class="form-control" value="<?php echo e($video->videotitle); ?>" name="title" id="title">
                                      <span class="bar"></span>

                                  </div>

                                  <div class="form-group m-b-40">
                                    <label for="input2"> Video Description</label>

                                      <textarea name="description" class="form-control"  id="description"><?php echo e($video->description); ?></textarea>
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Video Category</label>
                                    <input type="text" class="form-control" value="<?php echo e($video->category); ?>" name="category" id="category">
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Video Embed</label>

                                      <input type="text" name="videoembed" value="<?php echo e($video->video_embed_src); ?>" class="form-control">

                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Video AltText</label>

                                      <input type="text" name="alttext" value="<?php echo e($video->alttext); ?>" class="form-control">
                                      <span class="bar"></span>
                                  </div>
                                  <button type="submit" class="btn btn-info " id="button1" >Update </button>
                        
                                  <button type="reset" class="btn btn-danger " id="register-button">Reset </button>

                                  <!-- <div class="form-group m-b-40">
                                      <input type="text" class="form-control" id="input3">
                                      <span class="bar"></span>
                                      <label for="input3">Placeholder</label>
                                  </div> -->
                                  <script type="text/javascript">
                                    $(function() {
                                      $("#button1").click(function(){
                                        $(location).attr('href', '/admin/videos')
                                    })
                                  });
                                  </script>



                              </form>
                          </div>
                      </div>

                  </div>
              </div>
            </div>
            <footer class="footer">
                © 2019 Online Portal
            </footer>
            <script type="text/javascript">
                function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result)
                            .width(150)
                            .height(200);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
              jQuery(document).ready(function(){

                  jQuery('#description').summernote({
                  height:300,
                  minHeight: null,             // set minimum height of editor
                  maxHeight: null,             // set maximum height of editor
                  focus: true                  // set focus to editable area after initializing summernote
                  });

                jQuery('#video-form').submit(function(e){
                  e.preventDefault();
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  });
                  // var myForm = document.getElementById('video-form');
                  // var formData = new FormData(myForm);
                    var form_data=$("#video-form").serialize();
                    jQuery.ajax({
                      url: "<?php echo e(url('/admin/videoedit')); ?>",
                      method : 'post',
                      data: form_data,
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
                   $("#video-form").trigger("reset");
                }
              });


                        }
                      }});
                  });

                  // Add Category
                  jQuery('#category-form').submit(function(e){
                    e.preventDefault();
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                    });
                      var form_data=$("#category-form").serialize();
                      jQuery.ajax({
                        url: "<?php echo e(url('/admin/addvideocategory')); ?>",
                        method : 'post',
                        data: form_data,
                        success: function(result){

                          if(result.success == 0){

                            if(result.validation == 0){

                              if(result.message.videocategorytitle){
                                $('.category-error' ).html(result.message.videocategorytitle[0] );
                              }
                              else{
                                bootbox.alert({
                      title: "Message",
                      message:result.message,
                      callback: function(){
                        }
                    });
                              }
                              // $('.signup-error-message').show();
                              // $('.signup-error-message').html(result.message);

                          }
                        }
                          else{

                             // $("#catoption").append("<option value='"$category['id']"'>"+$category['categorytitle']+"</option>");
                            bootbox.alert({
                            title: "Message",
                            message:result.message,
                            callback: function(){
                            $('#exampleModal').modal('hide');
                           }
                           });

                          }
                        }});
                    });

              });
            </script>
         

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/admin/editvideos.blade.php ENDPATH**/ ?>