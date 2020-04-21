
@extends('restaurant.base')



@section('content')


    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
        
              <li class="breadcrumb-item"><a href="#">Employee</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
            </ol>
          </nav>




          
        <script type="text/javascript" > 
          setTimeout(function() {
       $('#successalert').fadeOut('fast');
     }, 8000); // <-- time in milliseconds
     </script>
    
   
        
        @if (session('success'))
        <div class="x_content bs-example-popovers" id="successalert" >
          <div class="alert alert-success" role="alert" >
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>well done!</strong> {{ session('success') }}
            </div>
          </div>

        
          @endif

         







        </div>



        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Add Employee Form</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="{{ url('restaurant/addProviderForm') }}"  class="needs-validation clearfix" novalidate>
                
              @csrf
                <div class="form-row">



                            
         
    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Provider Name</label>
                    <div class="input-group">
                      <input type="text" name="providerName" value="{{ old('providerName') }}"  class="form-control @error('providerName') is-invalid @enderror" id="validationCustom18" placeholder="providerName" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('providerName')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>






                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">email</label>
                    <div class="input-group">
                      <input type="email" name="email" value="{{ old('email') }}"  class="form-control @error('email') is-invalid @enderror" id="validationCustom18" placeholder="email" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>








                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">adresse</label>
                    <div class="input-group">
                      <input type="text" value="{{ old('adresse') }}"  class="form-control @error('adresse') is-invalid @enderror " name="adresse" id="validationCustom25" placeholder="adresse" required>
                     
                      @error('adresse')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>



         

                  
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">telephone</label>
                    <div class="input-group">
                      <input type="number" value="{{ old('tel') }}"  class="form-control @error('tel') is-invalid @enderror " name="tel" id="validationCustom25" placeholder="telephone" required>
                     
                      @error('tel')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  
               




            
                </div>



                <div class="ms-panel-header new">
                  <button class="btn btn-primary d-block" type="submit">Add Provider</button>
                </div>



              </form>

            </div>
          </div>

        </div>



        

        

      </div>
    </div>


  
    @endsection