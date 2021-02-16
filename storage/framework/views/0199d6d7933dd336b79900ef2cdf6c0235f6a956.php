
<?php $__env->startSection('header'); ?>
<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>

      <div class="row page-titles">
          <div class="col-md-5 align-self-center">
              <h3 class="text-themecolor">Users</h3>
          </div>
          <div class="col-md-7 align-self-center">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

              </ol>
          </div>

      </div>

      <div class="container-fluid">
        <div class="col-md-2">
    <a href="<?php echo e(url('admin/addimam')); ?>">    <button type="button" class="btn waves-effect waves-light  btn-info" style="margin-left:870px;">Add More Imams</button></a>
      </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Imams List </h4>


                                <div class="table-responsive table-hover">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Imam Name</th>
                                                <!-- <th>Description</th> -->
                                                <th>About Imam</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $count=1;
                                          ?>

                                          <?php $__currentLoopData = $imams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><a href="javascript:void(0)"><?php echo e($count++); ?></a></td>
                                                <td><?php echo e($imam->imamname); ?></td>

                                                <td><?php echo e(Illuminate\Support\str::limit($imam->about, $limit = 30, $end = '...')); ?></td>

                                                <td><a href="<?php echo e(url('/admin/editimam',$imam->id)); ?>"><button type="button" class="btn waves-effect waves-light   btn-warning">Edit</button></a>
                                                  <button type="button" class="btn waves-effect waves-light  btn-danger del-button" data-id="<?php echo e($imam->id); ?>">Delete</button>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->

                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
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
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

      <footer class="footer">
          © 2019 Online Portal
      </footer>

      <script type="text/javascript">
        jQuery(document).ready(function(){

          jQuery('.del-button').click(function(e){
            var el = this;
            e.preventDefault();
            var token = $("meta[name='csrf-token']").attr("content");
             var id = $(this).data("id");
             bootbox.confirm("Do you really want to delete record?", function(getresult) {
               if(getresult){
              jQuery.ajax({
                url:"<?php echo e(url('/admin/imamdelete')); ?>/"+id,
                method : 'post',
                data: { id: id,
                  "_token": token,
                 },
                success: function(result){

                  if(result.success == 0){
                    bootbox.alert({
          title: "Message",
          message:result.message,
          callback: function(){
              // window.setTimeout(function(){location.reload()},2000)
}
});
                  }
                  else{

                    $(el).closest('tr').css('background','tomato');
                    $(el).closest('tr').fadeOut(800,function(){
      		          $(this).remove();
      		          });
                    bootbox.alert({
              title: "Message",
              message:result.message,
              callback: function(){
              // window.setTimeout(function(){location.reload()},2000)
              }
              });
                  }
                }});
              }
              });
            });
        });
      </script>
      <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\faisal-center\resources\views/admin/getallimam.blade.php ENDPATH**/ ?>