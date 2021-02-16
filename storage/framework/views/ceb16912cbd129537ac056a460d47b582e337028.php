
<?php $__env->startSection('header'); ?>
<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>

  <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Manage History</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item active">Edit History</li>
                    </ol>
                </div>
            </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
    <a href="<?php echo e(url('admin/addhistoryimages',$history->id)); ?>"><button type="button" class="btn waves-effect waves-light  btn-info" data-toggle="modal" data-target="#exampleModal"
         style="margin-left:900px;">Update Images</button></a>
      </div>
      </div>
    <!-- <div class="col-md-2">
    <a href="<?php echo e(url('admin/allhistory')); ?>"><button type="button" class="btn waves-effect waves-light  btn-success del-button"
      style="margin-left:940px;">Settings</button></a>


      </div> -->
     <!-- <div class="row">
      <div class="col-md-8">

      </div>

      <div class="col-md-2">
   <a href="<?php echo e(url('admin/edithistory')); ?>"><button type="button" class="btn waves-effect waves-light  btn-success del-button"
      style="margin-left:215px;">Edit History</button></a>


      </div>
    </div> -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Image Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="category-form">
            <?php echo csrf_field(); ?>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category Title</label>
            <input type="text" name="imgcategorytitle" class="form-control" required>
              <div class="category-error" style="color:red;"></div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="category-button">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div> -->
    <div class="row" style="margin-top:10px;">
                  <div class="col-12">
                      <div class="card">

                          <div class="card-body">

                              <h6 class="card-subtitle">Just add </h6>
                              <form class="m-t-40"  id="history-form" enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>

                                  <div class="form-group m-b-40">

                                    <input type="hidden" class="form-control" value="<?php echo e($history->id); ?>" name="id" id="title" required >

                                      <label for="input1">History Title</label>
                                      <input type="text" class="form-control" value="<?php echo e($history->title); ?>" name="title" id="title">
                                      <span class="bar"></span>

                                  </div>

                                  <div class="form-group m-b-40">
                                    <label for="input2">History Description</label>

                                      <textarea name="description" class="form-control"  id="description">
                                        <?php if($history): ?>
                                        <?php echo e($history->content); ?>

                                        <?php endif; ?>
                                      </textarea>
                                      <span class="bar"></span>
                                  </div>

                                  <!-- <div class="form-group m-b-40">
                                    <label for="input2"> Post Image</label>

                                      <input type="file" name="images" value="<?php echo e(old('images')); ?>" class="form-control"  required onchange="readURL(this);" >
                                        <img id="blah" src="#" height="200" width="100" style="border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;"  alt="Your selected image..." />
                                      <span class="bar"></span>
                                  </div> -->
                                  <!-- <div class="form-group m-b-40">
                                    <label for="input2"> Image AltText</label>

                                      <input type="text" name="alttext" value="<?php echo e(old('alttext')); ?>" class="form-control"  required>
                                      <span class="bar"></span>
                                  </div> -->
                                  <button type="submit" class="btn btn-info " >Update </button>
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

                  jQuery('#description').summernote({
                  height:300,
                  minHeight: null,             // set minimum height of editor
                  maxHeight: null,             // set maximum height of editor
                  focus: true                  // set focus to editable area after initializing summernote
                  });

                jQuery('#history-form').submit(function(e){
                  e.preventDefault();
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  });
                  var form_data=$("#history-form").serialize();
                    jQuery.ajax({
                      url: "<?php echo e(url('/admin/updatehistory')); ?>",
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
                   //$("#history-form").trigger("reset");
                   $(location).attr('href', '/admin/allhistory');
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
                        url: "<?php echo e(url('/admin/addcategory')); ?>",
                        method : 'post',
                        data: form_data,
                        success: function(result){

                          if(result.success == 0){

                            if(result.validation == 0){

                              if(result.message.imgcategorytitle){
                                $('.category-error' ).html(result.message.imgcategorytitle[0] );
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

<?php echo $__env->make('admin.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\faisal-center\resources\views/admin/edithistory.blade.php ENDPATH**/ ?>