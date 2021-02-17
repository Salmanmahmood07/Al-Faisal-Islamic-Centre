<style>
.title{

height: 50px;
width: 100px;
overflow: hidden;"

}
.content{

height: 100px;
width: 500px;
overflow: hidden;"

}
</style>
@extends('admin.masterpage')
@section('header')
@include('admin.header')
@endsection

  @section('content')

      <div class="row page-titles">
          <div class="col-md-5 align-self-center">
              <h3 class="text-themecolor">About</h3>
          </div>
          <div class="col-md-7 align-self-center">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

              </ol>
          </div>
        
      </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-md-2">
      <a href="{{url('admin/addhistory')}}"><button type="button" class="btn waves-effect waves-light  btn-info" data-toggle="modal" data-target="#exampleModal"
         style="margin-left:950px;">Add New History</button></a>
         </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">History </h4>
                                <div class="table-responsive table-hover">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>History Title</th>
                                                <th>Content</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                          $count=1;
                                          @endphp

                                          @foreach($history as $history)
                                            <tr>
                                                <td><a href="javascript:void(0)">{{$count++}}</a></td>
                                                <td>
                                                  <div class="title">{{$history->title}}</div></td>
                                                <td><span class="text-muted">
                                                <div class="content">
                                                  {!!$history->content!!}
                                                   </div></span> </td>

                                                <td><a href="{{url('/admin/edithistory',$history->id)}}"><button type="button" class="btn waves-effect waves-light   btn-warning">Edit</button></a>
                                                <button type="button" class="btn waves-effect waves-light  btn-danger del-button" data-id="{{$history->id }}">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->

                </div>

                <!-- Mission Area -->
      <div class="row">
                    <!-- column -->
      <div class="col-md-2">
      <a href="{{url('admin/addmission')}}"><button type="button" class="btn waves-effect waves-light  btn-info" data-toggle="modal" data-target="#exampleModal"
         style="margin-left:945px;">Add New Mission</button></a>
         </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Mission </h4>
                                <div class="table-responsive table-hover">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Mission Title</th>
                                                <th>Content</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                          $count=1;
                                          @endphp

                                          @foreach($missions as $mission)
                                            <tr>
                                                <td><a href="javascript:void(0)">{{$count++}}</a></td>
                                                <td>
                                                  <div class="title">{{$mission->title}}</div></td>
                                                <td><span class="text-muted">
                                                <div class="content">
                                                    {!!$mission->content!!}
                                                   </div></span> </td>

                                                  <td><a href="{{url('/admin/editmission',$mission->id)}}"><button type="button" class="btn waves-effect waves-light   btn-warning">Edit</button></a>
                                                  <button type="button" class="btn waves-effect waves-light  btn-danger del-button" data-id="{{$mission->id }}">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Mission Area -->

                    <!-- Vision Area -->
      <div class="row">
                    <!-- column -->
      <div class="col-md-2">
      <a href="{{url('admin/addvision')}}"><button type="button" class="btn waves-effect waves-light  btn-info" data-toggle="modal" data-target="#exampleModal"
         style="margin-left:975px;">Add New Vison</button></a>
         </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Vision </h4>
                                <div class="table-responsive table-hover">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Vision Title</th>
                                                <th>Content</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                          $count=1;
                                          @endphp

                                          @foreach($visions as $vision)
                                            <tr>
                                                  <td><a href="javascript:void(0)">{{$count++}}</a></td>
                                                  <td>
                                                  <div class="title">{{$vision->title}}</div></td>
                                                  <td><span class="text-muted">
                                                  <div class="content">
                                                  {!!$vision->content!!}
                                                   </div></span> </td>

                                                  <td><a href="{{url('/admin/editvision',$vision->id)}}"><button type="button" class="btn waves-effect waves-light   btn-warning">Edit</button></a>
                                                  <button type="button" class="btn waves-effect waves-light  btn-danger del-button" data-id="{{$vision->id }}">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Mission Area -->
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
          $('.signup-error-message').hide();
          $('.signup-succcess-message').hide();
          jQuery('.del-button').click(function(e){
            var el = this;
            e.preventDefault();
            var token = $("meta[name='csrf-token']").attr("content");
             var id = $(this).data("id");
             bootbox.confirm("Do you really want to delete record?", function(getresult) {
               if(getresult){
              jQuery.ajax({
                url:"{{ url('/admin/videodel')}}/"+id,
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
      @endsection
