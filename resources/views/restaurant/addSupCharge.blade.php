
@extends('restaurant.base')



@section('content')


    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add sub charge</li>
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
                <h6>Login Form</h6>
              </div>
              <div class="ms-panel-body">
                <form enctype="multipart/form-data" method="POST"  action="{{ url('restaurant/addSupChargeForm') }}"  class="needs-validation clearfix" novalidate>
                
                  @csrf
                    <div class="form-row">
    
    
    
                                
             
        
    
             
                      
                      <div class="col-md-12 mb-3">
                        <label for="validationCustom18">Price Charge</label>
                        <div class="input-group">
                          <input type="nomber" min="0" step=".01" name="priceCharge" value="{{ old('priceCharge') }}"  class="form-control @error('priceCharge') is-invalid @enderror" id="validationCustom18" placeholder="priceCharge" required >
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          @error('priceCharge')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>


                           
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom12">note</label>
                    <div class="input-group">
                      <textarea rows="5"  name="note" id="validationCustom12"   class="form-control @error('price') is-invalid @enderror" placeholder="Message" required >{{ old('note') }}</textarea>
                      @error('note')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>




                        
                        <div class="col-md-12 mb-3">
                          <label for="validationCustom12">preuve</label>
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
                      <button class="btn btn-primary d-block" type="submit">Add Restaurant</button>
                    </div>
    
    
    
                  </form>
  
            </div>
            </div>
          </div>

      </div>
    </div>


  
    @endsection