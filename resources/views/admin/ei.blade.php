@extends('admin.masterpage')
@section('header')
@include('admin.header')
@endsection

@section('content')

  <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Manage Images</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item active">Edit Image</li>
                    </ol>
                </div>
            </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">

      </div>
      
    
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>
    <div class="row" style="margin-top:10px;">
                  <div class="col-12">
                      <div class="card">

                          <div class="card-body">

                              <h6 class="card-subtitle">Just add </h6>
                              <form class="m-t-40"  id="image-form" enctype="multipart/form-data" >

                                {!! csrf_field() !!}
                                  <div class="form-group m-b-40">

                                    <input type="hidden" class="form-control" value="{{$image->id}}" name="id" id="title" required >

                                      <label for="input1">Image Title</label>
                                      <input type="text" class="form-control" value="{{$image->imagetitle}}" name="title" id="title"  >
                                      <span class="bar"></span>

                                  </div>

                                  <div class="form-group m-b-40">
                                    <label for="input2"> Image Description</label>

                                      <textarea name="description" class="form-control"  id="description"  >{{$image->description}}</textarea>
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Image Category</label>

                                    <select class="form-control p-0" id="catoption" name="category" >

                                      @foreach($category as $cat)
                                      <option value="{{$cat->id}}">{{$cat->categorytitle}}</option>
                                      @endforeach
                                         </select>

                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Image File</label>

                                      <input type="file" name="images" value="{{old('images')}}" class="form-control"   onchange="readURL(this);" >
                                        <img id="blah" src="{{url('/assets/images')}}/{{$image->image}}" height="200" width="100" style="border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;"  alt="Your selected image..." />
                                      <span class="bar"></span>
                                  </div>
                                  <div class="form-group m-b-40">
                                    <label for="input2"> Image AltText</label>

                                      <input type="text" name="alttext" value="{{$image->alttext}}" class="form-control"  >
                                      <span class="bar"></span>
                                  </div>
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

                jQuery('#image-form').submit(function(e){
                  e.preventDefault();
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                  });
                  var myForm = document.getElementById('image-form');
                  var formData = new FormData(myForm);
                    jQuery.ajax({
                      url: "{{ url('/admin/updateimage') }}",
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
                   $("#image-form").trigger("reset");
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
                        url: "{{ url('/admin/addcategory') }}",
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

  @endsection
