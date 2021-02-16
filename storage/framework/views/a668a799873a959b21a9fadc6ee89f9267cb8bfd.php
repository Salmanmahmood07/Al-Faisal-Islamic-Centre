
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

                        <li class="breadcrumb-item active">Add News</li>
                    </ol>
                </div>
            </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">

      </div>
    </div>

    <div class="row" style="margin-top:10px;">
                  <div class="col-12">
                      <div class="card">

                          <div class="card-body">

                              <h6 class="card-subtitle">Just add </h6>
                              <form class="m-t-40"  id="event-form" >

                                <?php echo csrf_field(); ?>

                                  <div class="form-group m-b-40">
                                      <label for="input1">Event Title</label>
                                      <input type="text" class="form-control" value="<?php echo e(old('title')); ?>" name="title" id="title" required >
                                      <span class="bar"></span>

                                  </div>

                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Content</label>

                                      <textarea name="content" class="form-control"  id="content" required ></textarea>
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Image</label>

                                      <input type="file" name="images" value="<?php echo e(old('images')); ?>" class="form-control"  required onchange="readURL(this);" >
                                        <img id="blah" src="#" height="200" width="100" style="border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;"  alt="Your selected image..." />
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Speaker</label>

                                    <select class="form-control p-0" id="input6" name="speaker" required>
                                        <option selected="true" disabled="disabled">Choose Speaker</option>
                                        <?php $__currentLoopData = $speaker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speakr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($speakr->id); ?>"><?php echo e($speakr->imamname); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Venue</label>

                                      <input type="text" name="venue" value="<?php echo e(old('venue')); ?>" class="form-control"  required>
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Date</label>

                                      <input type="date" name="date" value="<?php echo e(old('date')); ?>" class="form-control"  required>
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Time</label>

                                      <input type="text" name="time" value="<?php echo e(old('time')); ?>" class="form-control"  required>
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Event Status</label>

                                    <select class="form-control p-0" id="input6" name="newsstatus" required>
                                        <option selected="true" disabled="disabled">Choose Status</option>
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
                                         </select>
                                      <span class="bar"></span>
                                  </div>
                                  <!-- <div class="form-group m-b-40">
                                    <label for="input2"> Date</label>

                                      <input type="date" name="date" value="<?php echo e(old('date')); ?>" class="form-control" id="date" required>
                                      <span class="bar"></span>
                                  </div> -->
                                  <button type="submit" class="btn btn-info " id="register-button">Submit </button>
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

                     jQuery('#event-form').submit(function(e){
                       e.preventDefault();
                       $.ajaxSetup({
                         headers: {
                           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                         }
                       });
                       var myForm = document.getElementById('event-form');
                       var formData = new FormData(myForm);
                         jQuery.ajax({
                           url: "<?php echo e(url('/admin/addnews')); ?>",
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
                        $("#event-form").trigger("reset");
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
                                 // Empty the dropdown
              // $('#catoption').find('option').not(':first').remove();
                                 var len = 0;
                  if(result['data'] != null){
                    len = result['data'].length;
                  }

                  if(len > 0){
                    // Read data and create <option >
                    for(var i=0; i<len; i++){

                      var id = result['data'][i].id;
                      var name = result['data'][i].categorytitle;

                      var option = "<option value='"+id+"'>"+name+"</option>";

                      $("#catoption").append(option);
                    }
                  }


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

<?php echo $__env->make('admin.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\salma\faisal-center\resources\views/admin/newspage.blade.php ENDPATH**/ ?>