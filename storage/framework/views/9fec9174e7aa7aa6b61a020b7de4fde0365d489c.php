
<?php $__env->startSection('header'); ?>
<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>

  <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Manage News</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item active">Edit News</li>
                    </ol>
                </div>

            </div>
  <div class="container-fluid" id="mydiv">
  <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">

                              <h6 class="card-subtitle">Just Edit </h6>
                              <form class="m-t-40"  id="events-form" enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>

                                

                                    <input type="hidden" class="form-control" value="<?php echo e($news->id); ?>" name="id" >

                                  <div class="form-group m-b-40">
                                      <label for="input1">News Title</label>
                                      <input type="text" class="form-control" value="<?php echo e($news->title); ?>" name="title" id="title">
                                      <span class="bar"></span>

                                  </div>

                                  <div class="form-group m-b-40">
                                    <label for="input2"> News Content</label>

                                      <textarea name="content" class="form-control"  id="content"><?php echo e($news->content); ?></textarea>
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Image</label>

                                      <input type="file" name="images" value="<?php echo e(old('images')); ?>" class="form-control"   
                                       onchange="readURL(this);" >
                                        <img id="blah" src="<?php echo e(url('/assets/events')); ?>/<?php echo e($news->image); ?>" height="200" width="100" style="border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;"  alt="Your selected image..." />
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Speaker</label>

                                    <select class="form-control p-0" id="input6" name="speaker">
                                        
                                        <?php $__currentLoopData = $imam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speakr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($speakr->id); ?>" <?php if($speakr->id == $news->imam_id): ?> selected <?php endif; ?>><?php echo e($speakr->imamname); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                         
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Venue</label>

                                      <input type="text" name="venue" value="<?php echo e($news->venue); ?>" class="form-control">
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Date</label>

                                      <input type="date" name="date" value="<?php echo e($news->date); ?>" class="form-control" id="date">
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Time</label>

                                      <input type="text" name="time" value="<?php echo e($news->time); ?>" class="form-control">
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> News Status</label>

                                    <select class="form-control p-0" id="input6" name="newsstatus">
                                        <option  disabled="disabled">Choose Status</option>
                                        <option value="publish" <?php if($news->status == 'publish'): ?> selected="selected" <?php endif; ?>>Publish</option>
                                        <option value="draft" <?php if($news->status == 'draft'): ?> selected="selected" <?php endif; ?>>Draft</option>
                                         </select>
                                      <span class="bar"></span>
                                  </div>

                                  <button type="submit" class="btn btn-info " id="register-button">Update </button>
                                  <button type="reset" class="btn btn-danger " id="register-button">Reset </button>

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

                    jQuery('#content').summernote({
                    height:300,
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                  // set focus to editable area after initializing summernote

                  });

                jQuery('#events-form').submit(function(e){

                  e.preventDefault();
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  });

                  // var myForm = document.getElementById('events-form');
                  
                  //var form_data=$("#events-form").serialize();
                  var myForm = document.getElementById('events-form');
                  var form_data = new FormData(myForm);
                    jQuery.ajax({
                      url: "<?php echo e(url('/admin/newsedit')); ?>",
                      method : 'post',
                      data: form_data,
                      contentType: false,
                       cache: false,
                       processData: false,
                      success: function(result){

                        if(result.success == 0){
                          // $('.signup-error-message').html(result.message);
                        bootbox.alert({
                        title: "Message",
                        message:result.message,
                        callback: function(){
                          }
                    });
                        }
                        else{
                          // $('.signup-error-message').html(result.message);
                        bootbox.alert({
                        title: "Message",
                        message:result.message,
                        callback: function(){
                          // window.setTimeout(function(){location.reload()},2000)
                          
        }
    });
                          // $("#register-form").trigger("reset");

                        }
                      }});
                  });
              });
            </script>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/admin/editnews.blade.php ENDPATH**/ ?>