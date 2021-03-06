
@extends('admin.base')



@section('content')
{{App::setLocale(Session::get('locale'))}}



    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1  class="db-header-title"> </h1>
        </div>
        




<!--===============================================table=================================================-->
        

<!--==============================================================================================-->        
        




<!--update info admin -->


<!--//////////////////////////////////////////////////////////////// -->
<div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>Update informations admin Form</h6>
      </div>
      <div class="ms-panel-body">
        <form method="POST"  action="{{ url('admin/updateadminInfo') }}" enctype="multipart/form-data" class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">


   
            <input type="hidden" name="id_res" value="{{ $admin->user->id }}" >
                      
   
            <div class="col-md-12 mb-3">
                <label for="validationCustom18">Name</label>
                <div class="input-group">
                  <input type="text" name="name" value="{{ $admin->name }}"  class="form-control @error('name') is-invalid @enderror" id="validationCustom18" placeholder="Name" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              
          

                <div class="col-md-12 mb-3">
                  <label for="validationCustom08">Email Address</label>
                  <div class="input-group">
                    <input type="email" value="{{ $admin->user->email }}"  name="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom08" placeholder="Email Address" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

        

                
                <label for="validationCustom12">Old Admin Logo</label>
               <div class="input-group">
                <img src='/storage/{{$admin->image}}' style='width:200px; height:100px;'>
               </div>
                
                <div class="col-md-12 mb-3">
                  <label for="validationCustom12">New Admin Logo</label>
                  <div class="custom-file">
                    <input type="file" name="image" value="{{ old('image') }}"  class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile">
                    <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label>
                  
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                  </div>
                </div>











            


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary d-block" type="submit">Update Admin Information</button>
          </div>



        </form>

      </div>
    </div>

  </div>



<!--//////////////////////////////////////////////////////////////// -->

  
<!-- for activate or deactivate compte admin  -->


  
<!-- update password admin  -->


  <!--//////////////////////////////////////////////////////////////// -->
  <div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>Update Password Form</h6>
      </div>
      <div class="ms-panel-body">
        <form method="POST"  action="{{ url('admin/updatePasswordadmin') }}"  class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">



                      
   


   
<input type="hidden" name="id_res" value="{{ $admin->user->id }}" >
                      
   
<div class="col-md-12 mb-2">
          <label for="validationCustom09">Password</label>
          <div class="input-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="validationCustom09" placeholder="Password" required >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="col-md-12 mb-2">
          <label for="validationCustom09">Repeat Password</label>
          <div class="input-group">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="validationCustom099" placeholder="Repeat Password" required >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary d-block" type="submit">Update paasword</button>
          </div>



        </form>

      </div>
    </div>

  </div>


<!--====================================================================================-->











      </div>
    </div>
              
    
  
@endsection




@section('script')

  
@endsection

