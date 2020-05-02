
@extends('restaurant.base')



@section('content')

   
<script type="text/javascript" > 
  setTimeout(function() {
$('#successalert').fadeOut('fast');
}, 12000); // <-- time in milliseconds
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

  @if (session('danger'))
<div class="x_content bs-example-popovers" id="successalert" >
  <div class="alert alert-danger" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong>DANGER!</strong> {{ session('danger') }}
    </div>
  </div>


  @endif


    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1  class="db-header-title">{{$employee->name}} @if($employee->is_admin) (ADMIN) @endif</h1>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Branches</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i></p>
                <p class="fs-12">48% From Last 24 Hours</p>
              </div>
            </div> <i class="flaticon-statistics"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Budgets</h6>
                <p class="ms-card-change">$80,950</p>
                <p class="fs-12">2% Decreased from last budget</p>
              </div>
            </div> <i class="flaticon-stats"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Employees</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> </p>
                <p class="fs-12">48% From Last 24 Hours</p>
              </div>
            </div> <i class="flaticon-user"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Conversions</h6>
                <p class="ms-card-change">$80,950</p>
                <p class="fs-12">2% Decreased from last budget</p>
              </div>
            </div> <i class="flaticon-reuse"></i>
          </div>
        </div>




<!--===============================================table=================================================-->
        <div class="col-xl-6 col-md-12">
          <div class="ms-panel">
              <div class="ms-card-header clearfix">
                  <h6 class="ms-card-title">Historique Charge</h6>
      
                </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
                  <table id="data-table-123" class="table w-100 thead-primary"></table>
                </div>
              </div>
  
              
            </div>
        </div>



<!--===============================================table=================================================-->






        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Project Timeline</h6>
            </div>
            <div class="ms-panel-body">
              <ul class="ms-activity-log">
                <li>
                  <div class="ms-btn-icon btn-pill icon btn-success"> <i class="flaticon-tick-inside-circle"></i>
                  </div>
                  <h6>Lorem ipsum dolor sit</h6>
                  <span> <i class="material-icons">event</i>1 January, 2018</span>
                  <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                </li>
                <li>
                  <div class="ms-btn-icon btn-pill icon btn-danger"> <i class="flaticon-alert-1"></i>
                  </div>
                  <h6>Lorem ipsum dolor sit</h6>
                  <span> <i class="material-icons">event</i>1 March, 2020</span>
                  <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....
              


                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>


<!--============================================================================================-->
 

<!--==============================================================================================-->        
        <div class="col-xl-7 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header header-mini">
              <div class="d-flex justify-content-between">
                <div>
                  <h6>Project Sales</h6>
                  <p>Monitor how much sales your product does</p>
                </div>
                <div class="btn-group btn-group-toggle ms-graph-metrics" data-toggle="buttons">
                  <label class="btn btn-sm btn-outline-primary active day">
                    <input type="radio" checked="">Day</label>
                  <label class="btn btn-sm btn-outline-primary month">
                    <input type="radio">Month</label>
                  <label class="btn btn-sm btn-outline-primary year">
                    <input type="radio">Year</label>
                </div>
              </div>
              <div class="d-flex justify-content-between ms-graph-meta">
                <div class="ms-graph-labels"> <span class="ms-graph-decrease"></span>
                  <p>Traffic</p> <span class="ms-graph-regular"></span>
                  <p>Sales</p>
                </div>
              </div>
            </div>
            <div class="ms-panel-body">
              <canvas id="pm-chart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>most sellings projects</h6>
            </div>
            <div class="ms-panel-body"> <span class="progress-label">HTML & CSS Projects</span><span class="progress-status">83%</span>
              <div class="progress progress-tiny">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 83%" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
              </div> <span class="progress-label">Wordpress Projects</span><span class="progress-status">50%</span>
              <div class="progress progress-tiny">
                <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div> <span class="progress-label">PSD Projects</span><span class="progress-status">75%</span>
              <div class="progress progress-tiny">
                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div> <span class="progress-label">Code Snippets</span><span class="progress-status">92%</span>
              <div class="progress progress-tiny">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Top Sales</h6>
              <p>Your highest selling projects</p>
            </div>
            <div class="ms-panel-body p-0">
              <div class="ms-quick-stats">
                <div class="ms-stats-grid">
                  <p class="ms-text-success">+47.18%</p>
                  <p class="ms-text-dark">8,033</p> <span>Admin Dashboard</span>
                </div>
                <div class="ms-stats-grid">
                  <p class="ms-text-success">+17.24%</p>
                  <p class="ms-text-dark">6,039</p> <span>Wordpress Theme</span>
                </div>
              </div>
            </div>
          </div>
        </div>
  



<!--=================================================================================-->

<!--//////////////////////////////////////////////////////////////// -->



<!--update info restaurant -->


<!--//////////////////////////////////////////////////////////////// -->
<div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>Update informations restaurant Form</h6>
      </div>
      <div class="ms-panel-body">
        <form method="POST"  action="{{ url('restaurant/updateEmployyeInfo') }}"  class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">


   
            <input type="hidden" name="id_emplo" value="{{ $employee->id }}" >
                      
            <div class="col-md-12 mb-3">
                <label for="validationCustom18">id Employee</label>
                <div class="input-group">
                  <input type="text"  value="{{ $employee->idEmployee }}"  class="form-control" id="validationCustom18" placeholder="id Employee" readonly >
            
                </div>
              </div>
              
   
            <div class="col-md-12 mb-3">
                <label for="validationCustom18">Name Employee</label>
                <div class="input-group">
                  <input type="text" name="nameEmployee" value="{{ $employee->nameEmployee }}"  class="form-control @error('nameEmployee') is-invalid @enderror" id="validationCustom18" placeholder="Name Employee" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  @error('nameEmployee')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              
              <div class="col-md-12 mb-3">
                <label for="validationCustom18">tel</label>
                <div class="input-group">
                  <input type="number" name="tel" value="{{ $employee->tel}}"  class="form-control @error('tel') is-invalid @enderror" id="validationCustom18" placeholder="tel" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  @error('tel')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

                <div class="col-md-12 mb-3">
                  <label for="validationCustom08">Email Address</label>
                  <div class="input-group">
                    <input type="email" value="{{ $employee->user->email }}"  name="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom08" placeholder="Email Address" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

        

                <div class="col-md-12 mb-3">
                    <label for="validationCustom18">price per hour</label>
                    <div class="input-group">
                      <input type="number" name="price_ph" value="{{ $employee->price_ph}}"  class="form-control @error('price_ph') is-invalid @enderror" id="validationCustom18" placeholder="price per hour" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('price_ph')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
    
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">type</label>
                    <div class="input-group">
                   
                      
                        <select class="form-control @error('type') is-invalid @enderror " name="type" id="validationCustom22" >
                 
                           
                            
                            
                            <option value="{{ $employee->type}}" selected >{{ $employee->type}}</option>
       
                            <option value="kashir" >kashir</option>
                            <option value="cook">cook</option>
       
                     
       
       
                             </select>
                      
                      
                        <div class="valid-feedback">
                        Looks good!
                      </div>
                      @error('type')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>











            


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary d-block" type="submit">Update Employee Information</button>
          </div>



        </form>

      </div>
    </div>

  </div>



<!--//////////////////////////////////////////////////////////////// -->

  
<!-- for activate or deactivate compte restaurant  -->


<!--//////////////////////////////////////////////////////////////// -->
  <div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>Add Category Form</h6>
      </div>
      <div class="ms-panel-body">
          @if($employee->active)
        <form method="POST"  action="{{ url('restaurant/decativateEmployee') }}"  class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">



                      
   
<input type="hidden" name="id_emplo" value="{{ $employee->id }}" >


       


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary-info d-block" type="submit">block Employee</button>
          </div>



        </form>
@else
<form method="POST"  action="{{ url('restaurant/updatePasswordEmployee') }}"  class="needs-validation clearfix" novalidate>
          
    @csrf
      <div class="form-row">



                  




<input type="hidden" name="id_emplo" value="{{ $employee->id }}" >
<input type="hidden" name="Activate" value="activih" >
                  

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
        <button class="btn btn-primary d-block" type="submit">activate compte Employee</button>
      </div>



    </form>
@endif
      </div>
    </div>

  </div>



<!--//////////////////////////////////////////////////////////////// -->

  
<!-- update password restaurant  -->


  <!--//////////////////////////////////////////////////////////////// -->
      @if($employee->active)
  <div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>Update Password Form</h6>
      </div>
      <div class="ms-panel-body">
 
        <form method="POST"  action="{{ url('restaurant/updatePasswordEmployee') }}"  class="needs-validation clearfix" novalidate>
          
        @csrf
          <div class="form-row">



                      
   


   
<input type="hidden" name="id_emplo" value="{{ $employee->id }}" >
                      
   
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

@endif
<!--====================================================================================-->











      </div>
    </div>
              
    
  
@endsection




@section('script')
<script>

(function($) {
  'use strict';

   var dataSet12 = [
    @foreach ($employeeAllCharges as $InfoEmployee)
                            

   [ "  {{ $employee->idEmployee }}", " {{ $employee->email }}",  " {{ $InfoEmployee->created_at }}", "{{ $InfoEmployee->priceCharge }}"],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
     
      { title: "id Employee" },

      { title: "Email" },
      { title: "Date" },
      { title: "Charge" },
 

    ],
  });


 




})(jQuery);

</script>

  
@endsection

