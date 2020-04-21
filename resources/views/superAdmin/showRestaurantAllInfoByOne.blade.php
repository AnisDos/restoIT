
@extends('superadmin.base')



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
          <h1  class="db-header-title">{{$user->name}}</h1>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Branches</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> {{$user->users()->count()}}</p>
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
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> {{$someInfoEmployees->count()}}</</p>
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
                  <h6 class="ms-card-title">Products List</h6>
      
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
  <!-- Food Widget -->
  <div class="col-xl-12 col-md-12">
    <div class="ms-panel ms-widget ms-crypto-widget">
      <div class="ms-panel-header">
        <h6>Menus of Restaurants</h6>
        <p>Meals of every Restaurant of this Admin and also his own menus</p>
      </div>
      <div class="ms-panel-body p-0">
        <ul class="nav nav-tabs nav-justified has-gap px-4 pt-4" role="tablist">
          @foreach ($restaurants as $restaurant)
          @if ($loop->first)
     
<li style="margin-bottom:10px" role="presentation" class="fs-12"><a href="#{{$restaurant->name}}{{$restaurant->id}}"  class="active show"  aria-controls="{{$restaurant->name}}{{$restaurant->id}}" role="tab" data-toggle="tab"> {{$restaurant->name}} @if($restaurant->is_admin) (ADMIN) @endif </a></li>
    
@else
<li style="margin-bottom:10px" role="presentation" class="fs-12"><a href="#{{$restaurant->name}}{{$restaurant->id}}"  aria-controls="{{$restaurant->name}}{{$restaurant->id}}" role="tab" data-toggle="tab"> {{$restaurant->name}} @if($restaurant->is_admin) (ADMIN) @endif</a></li>
@endif
@endforeach

      </ul>

        <div class="tab-content">
     
           
   
          @foreach ($restaurants as $restaurant)
          @if ($loop->first)
     
   
  
          <div role="tabpanel" class="tab-pane active show fade in" id="{{$restaurant->name}}{{$restaurant->id}}">
            <div class="table-responsive">
              <table class="table table-hover thead-light">
                <thead>
                  <tr>
                    <th scope="col">Meal Names</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Public</th>
                  </tr>
                </thead>
                <tbody>
              
                  @foreach ($restaurant->categories()->get() as $cat)
          
                  @foreach ($cat->meals()->get() as $meal)
                  <tr>
                    <td><img src='/storage/{{$meal->image}}' style='width:50px; height:30px;'> {{$meal->mealName}}</td>
                      <td>{{$cat->categoryName}}</</td>
                      <td >{{$meal->price}}</td>
                      @if($meal->public)
                  
                       <td class="ms-text-success">public</td>
                      @else 
                      
                      <td class="ms-text-danger">nopublic</td>
                      @endif





                    </tr>
             
                  @endforeach
          
                  @endforeach
                
                </tbody>
              </table>
            </div>
          </div>

          @else
   
  
          <div role="tabpanel" class="tab-pane fade" id="{{$restaurant->name}}{{$restaurant->id}}">
            <div class="table-responsive">
              <table class="table table-hover thead-light">
                <thead>
                  <tr>
                    <th scope="col">Meal Names</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Public</th>
                  </tr>
                </thead>
                <tbody>
              
                  @foreach ($restaurant->categories()->get() as $cat)
          
                  @foreach ($cat->meals()->get() as $meal)
                  <tr>
                  <td><img src='/storage/{{$meal->image}}' style='width:50px; height:30px;'> {{$meal->mealName}}</td>
                    <td>{{$cat->categoryName}}</</td>
                    <td >{{$meal->price}}</td>
                    @if($meal->public)
               
                    <td class="ms-text-success">public</td>
                   @else 
                   
                   <td class="ms-text-danger">nopublic</td>
                   @endif

                  </tr>
           
                  @endforeach
          
                  @endforeach
                
                </tbody>
              </table>
            </div>
          </div>

          @endif
          @endforeach
                           
          
                            
          
     
    
        </div>

      </div>
    </div>
  </div>

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
        <div class="col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Latest Projects</h6>
              <p>Some of your latest works</p>
            </div>
            <div class="ms-panel-body">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="ms-card">
                    <div class="ms-card-body">
                      <div class="media fs-14">
                        <div class="mr-2 align-self-center">
                          <img src="../../assets/img/costic/customer-1.jpg" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <h6>John Doe </h6>
                          <div class="dropdown float-right">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li class="ms-dropdown-list">
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Comment</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Share</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Favorite</span>
                                  </div>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <p class="fs-12 my-1 text-disabled">30 seconds ago</p>
                        </div>
                      </div>
                      <h6>This is a project name</h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nunc velit, dictum eget nulla a, sollicitudin rhoncus orci. Vivamus nec commodo turpis.</p>
                    </div>
                    <div class="ms-card-img">
                      <img src="../../assets/img/costic/food-2.jpg" alt="card_img">
                    </div>
                    <div class="ms-card-footer text-disabled d-flex">
                      <div class="ms-card-options"> <i class="material-icons">favorite</i> 982</div>
                      <div class="ms-card-options"> <i class="material-icons">comment</i> 785</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="ms-card">
                    <div class="ms-card-body">
                      <div class="media fs-14">
                        <div class="mr-2 align-self-center">
                          <img src="../../assets/img/costic/customer-4.jpg" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <h6>John Doe </h6>
                          <div class="dropdown float-right">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li class="ms-dropdown-list">
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Comment</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Share</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Favorite</span>
                                  </div>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <p class="fs-12 my-1 text-disabled">30 seconds ago</p>
                        </div>
                      </div>
                      <h6>This is a project name</h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nunc velit, dictum eget nulla a, sollicitudin rhoncus orci. Vivamus nec commodo turpis.</p>
                    </div>
                    <div class="ms-card-img">
                      <img src="../../assets/img/costic/food-3.jpg" alt="card_img">
                    </div>
                    <div class="ms-card-footer text-disabled d-flex">
                      <div class="ms-card-options"> <i class="material-icons">favorite</i> 982</div>
                      <div class="ms-card-options"> <i class="material-icons">comment</i> 785</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="ms-card">
                    <div class="ms-card-body">
                      <div class="media fs-14">
                        <div class="mr-2 align-self-center">
                          <img src="../../assets/img/costic/customer-5.jpg" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <h6>John Doe </h6>
                          <div class="dropdown float-right">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li class="ms-dropdown-list">
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Comment</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Share</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Favorite</span>
                                  </div>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <p class="fs-12 my-1 text-disabled">30 seconds ago</p>
                        </div>
                      </div>
                      <h6>This is a project name</h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nunc velit, dictum eget nulla a, sollicitudin rhoncus orci. Vivamus nec commodo turpis.</p>
                    </div>
                    <div class="ms-card-img">
                      <img src="../../assets/img/costic/food-1.jpg" alt="card_img">
                    </div>
                    <div class="ms-card-footer text-disabled d-flex">
                      <div class="ms-card-options"> <i class="material-icons">favorite</i> 982</div>
                      <div class="ms-card-options"> <i class="material-icons">comment</i> 785</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
              
    
  
@endsection




@section('script')
<script>

(function($) {
  'use strict';

   var dataSet12 = [
    @foreach ($someInfoEmployees as $InfoEmployee)
                            

   [ "  {{ $InfoEmployee->idEmployee }}", " {{ $InfoEmployee->email }}",  " {{ $InfoEmployee->type }}", "{{ $InfoEmployee->name }}@if ( $InfoEmployee->is_admin )<div style='color:red'> (ADMIN)</div> @endif"],
   
                            @endforeach
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
     
      { title: "id Employee" },

      { title: "Email" },
      { title: "Type" },
      { title: "Restaurant" },
 

    ],
  });


 




})(jQuery);

</script>

  
@endsection

