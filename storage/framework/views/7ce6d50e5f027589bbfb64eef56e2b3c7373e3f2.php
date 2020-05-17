




<?php $__env->startSection('content'); ?>
<?php echo e(App::setLocale(Session::get('locale'))); ?>



<?php

use Carbon\Carbon;
?>





    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1  class="db-header-title"><?php echo e($user->name); ?>, <?php echo e($user->user->email); ?></h1>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Branches</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> <?php echo e($user->restaurants()->count()); ?></p>
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
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> <?php echo e($someInfoEmployees->count()); ?></</p>
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
                  <h6 class="ms-card-title">Employees List</h6>
      
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
          <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($loop->first): ?>
     
<li style="margin-bottom:10px" role="presentation" class="fs-12"><a href="#<?php echo e($restaurant->name); ?><?php echo e($restaurant->id); ?>"  class="active show"  aria-controls="<?php echo e($restaurant->name); ?><?php echo e($restaurant->id); ?>" role="tab" data-toggle="tab"> <?php echo e($restaurant->name); ?> <?php if($restaurant->is_admin): ?> (ADMIN) <?php endif; ?> </a></li>
    
<?php else: ?>
<li style="margin-bottom:10px" role="presentation" class="fs-12"><a href="#<?php echo e($restaurant->name); ?><?php echo e($restaurant->id); ?>"  aria-controls="<?php echo e($restaurant->name); ?><?php echo e($restaurant->id); ?>" role="tab" data-toggle="tab"> <?php echo e($restaurant->name); ?> <?php if($restaurant->is_admin): ?> (ADMIN) <?php endif; ?></a></li>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </ul>

        <div class="tab-content">
     
           
   
          <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($loop->first): ?>
     
   
  
          <div role="tabpanel" class="tab-pane active show fade in" id="<?php echo e($restaurant->name); ?><?php echo e($restaurant->id); ?>">
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
              
                  <?php $__currentLoopData = $restaurant->categories()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
                  <?php $__currentLoopData = $cat->meals()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><img src='/storage/<?php echo e($meal->image); ?>' style='width:50px; height:30px;'> <?php echo e($meal->mealName); ?></td>
                      <td><?php echo e($cat->categoryName); ?></</td>
                      <td ><?php echo e($meal->price); ?></td>
                      <?php if($meal->public): ?>
                  
                       <td class="ms-text-success">public</td>
                      <?php else: ?> 
                      
                      <td class="ms-text-danger">nopublic</td>
                      <?php endif; ?>





                    </tr>
             
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tbody>
              </table>
            </div>
          </div>

          <?php else: ?>
   
  
          <div role="tabpanel" class="tab-pane fade" id="<?php echo e($restaurant->name); ?><?php echo e($restaurant->id); ?>">
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
              
                  <?php $__currentLoopData = $restaurant->categories()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
                  <?php $__currentLoopData = $cat->meals()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                  <td><img src='/storage/<?php echo e($meal->image); ?>' style='width:50px; height:30px;'> <?php echo e($meal->mealName); ?></td>
                    <td><?php echo e($cat->categoryName); ?></</td>
                    <td ><?php echo e($meal->price); ?></td>
                    <?php if($meal->public): ?>
               
                    <td class="ms-text-success">public</td>
                   <?php else: ?> 
                   
                   <td class="ms-text-danger">nopublic</td>
                   <?php endif; ?>

                  </tr>
           
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tbody>
              </table>
            </div>
          </div>

          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
          
                            
          
     
    
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














        




<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->




<style>
  .highcharts-figure, .highcharts-data-table table {
min-width: 360px; 
max-width: 800px;
margin: 1em auto;
}

.highcharts-data-table table {
font-family: Verdana, sans-serif;
border-collapse: collapse;
border: 1px solid #EBEBEB;
margin: 10px auto;
text-align: center;
width: 100%;
max-width: 500px;
}
.highcharts-data-table caption {
padding: 1em 0;
font-size: 1.2em;
color: #555;
}
.highcharts-data-table th {
font-weight: 600;
padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
background: #f8f8f8;
}
.highcharts-data-table tr:hover {
background: #f1f7ff;
}

</style>
  <div class="col-xl-12 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header header-mini">
        <div class="d-flex justify-content-between">
          <div>
            <h6>Restaurants Revenu</h6>
            <p>Monitor how much revenu <?php echo e($user->name); ?>'s restaurants does</p>
          </div>
        </div>




        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
                Basic line chart showing trends in a dataset. This chart includes the
                <code>series-label</code> module, which adds a label to each line for
                enhanced readability.
            </p>
        </figure>
  

        <script>
          Highcharts.chart('container', {

title: {
text: 'Revenu of all <?php echo e($user->name); ?>\'s restaurants, <?php echo e(Carbon::now()->year); ?>'
},

subtitle: {
text: 'Source: thesolarfoundation.com'
},

yAxis: {
title: {
  text: 'SAR'
}
},
tooltip: {
headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
'<td style="padding:0"><b>{point.y:.2f} SAR</b></td></tr>',
footerFormat: '</table>',
shared: true,
useHTML: true
},

xAxis: {
  categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
    ],
   
},

legend: {
layout: 'vertical',
align: 'right',
verticalAlign: 'middle'
},

plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },

series: [

  <?php $__currentLoopData = $charts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  {
name: '<?php echo e($chart[0]); ?>',
data: [  <?php echo e($chart[1][0]); ?>, <?php echo e($chart[1][1]); ?>, <?php echo e($chart[1][2]); ?>, <?php echo e($chart[1][3]); ?>, <?php echo e($chart[1][4]); ?>, <?php echo e($chart[1][5]); ?>, <?php echo e($chart[1][6]); ?>, <?php echo e($chart[1][7]); ?>, <?php echo e($chart[1][8]); ?>, <?php echo e($chart[1][9]); ?>, <?php echo e($chart[1][10]); ?>, <?php echo e($chart[1][11]); ?>,]
}, 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
],

responsive: {
rules: [{
  condition: {
      maxWidth: 500
  },
  chartOptions: {
      legend: {
          layout: 'horizontal',
          align: 'center',
          verticalAlign: 'bottom'
      }
  }
}]
}

});
        </script>
        



      </div>
      <div class="ms-panel-body">
        <canvas id="pm-chart"></canvas>
      </div>
    </div>
  </div>



<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->  




<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->




<style>
  .highcharts-figure, .highcharts-data-table table {
min-width: 360px; 
max-width: 800px;
margin: 1em auto;
}

.highcharts-data-table table {
font-family: Verdana, sans-serif;
border-collapse: collapse;
border: 1px solid #EBEBEB;
margin: 10px auto;
text-align: center;
width: 100%;
max-width: 500px;
}
.highcharts-data-table caption {
padding: 1em 0;
font-size: 1.2em;
color: #555;
}
.highcharts-data-table th {
font-weight: 600;
padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
background: #f8f8f8;
}
.highcharts-data-table tr:hover {
background: #f1f7ff;
}

</style>
  <div class="col-xl-12 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header header-mini">
        <div class="d-flex justify-content-between">
          <div>
          <h6>Chart of number Orders Per <?php echo e($user->name); ?>'s Restaurants</h6>
       
          </div>
        </div>




        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="container1"></div>
            <p class="highcharts-description"  style="text-align: center" >
              A pie chart showing the number orders for each restaurants of <?php echo e($user->name); ?> per month for a full year.
            </p>
        </figure>
        
        <script>
          Highcharts.chart('container1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Orders Completed'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Number of Orders'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.f} Orders</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
  
<?php $__currentLoopData = $chartOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      {
        name: '<?php echo e($chart[0]); ?>',
        data: [ <?php echo e($chart[1][0]); ?>, <?php echo e($chart[1][1]); ?>, <?php echo e($chart[1][2]); ?>, <?php echo e($chart[1][3]); ?>, <?php echo e($chart[1][4]); ?>, <?php echo e($chart[1][5]); ?>, <?php echo e($chart[1][6]); ?>, <?php echo e($chart[1][7]); ?>, <?php echo e($chart[1][8]); ?>, <?php echo e($chart[1][9]); ?>, <?php echo e($chart[1][10]); ?>, <?php echo e($chart[1][11]); ?>,]

    },
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   ]
});
        </script>
        



      </div>
      <div class="ms-body">
        <canvas id="pm-chart"></canvas>
      </div>
    </div>
  </div>



<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->  

































<!-- ======================================================Todo Widget========================================================== -->
<div class="col-xl-12 col-md-12 ms-deletable ms-todo-list">
  <div class="ms-card ms-widget ms-card-fh">
    <div class="ms-card-header clearfix">
      <h6 class="ms-card-title">Privileges Lists</h6>

<button  onclick="addLine()" data-toggle="tooltip" data-placement="left" title="Add a Task to this block" class="ms-btn-icon float-right"> <i class="material-icons text-disabled">add</i> </button>
   
<div class="form-row">
    </div>
    <div class="ms-card-body">
      <ul id="uldin" class="ms-list ms-task-block lisenonchangehere">
   


   
      </ul>
    </div>

    <form method="POST" onsubmit="return submitForm();"   action="<?php echo e(url('superadmin/adminUpdatePrivileges')); ?>"  class="needs-validation clearfix" novalidate>
                  
      <?php echo csrf_field(); ?>

    <input id="hiddenInputForm1" type="hidden" name="id_admin" value="<?php echo e($user->id); ?>" >   
    <input id="validationCustom36" name="var[]" type="hidden" value="" /> 
<div class="ms-panel-header new">
          <button id="kamalyakolfermadj" class="btn btn-primary d-block" disabled="disabled" type="submit">Add an Genrate Key</button>
        </div>



      </form>
  </div>
</div>

<!-- ======================================================Todo Widget========================================================== -->




















      </div>
    </div>
              
    
  
<?php $__env->stopSection(); ?>




<?php $__env->startSection('script'); ?>

<script>

    //on submit form put privileges in input var[]
    function submitForm(){
  
        
  var formElements = new Array();
  $("#uldin :input").not("#uldin :button").each(function(){
      formElements.push($(this).val());
  });
  
  var hidinput = document.getElementById('validationCustom36').value= formElements;
  
      }
    //---------------------------------------------------------------------------------------------------
    $('.lisenonchangehere').on('contentChanged',function(){
        console.log('rrrrrrrrrrrrrrrrrr');
        if ($('ul#uldin li').length < 1 ) {
 
 $('#kamalyakolfermadj').attr('disabled','disabled');
} else {

$('#kamalyakolfermadj').attr('disabled',false);	
}
        });

//------------------------------------------------------------------------------------------------------
  //------------------------------------------------------------------------------------------------------
function addLine() {
  
  var ul = document.getElementById('uldin');
  
   
  var li = document.createElement('li');
  li.classList.add("ms-list-item");
  li.classList.add("ms-to-do-task");
  li.classList.add("ms-deletable");
  
  
  
  var div1 = document.createElement('div');
  div1.classList.add("col-md-12");
  div1.classList.add("mb-3");
  
  
  
  var div2 = document.createElement('div');
  div2.classList.add("input-group");
  
  
  
  
  div2.innerHTML = "<select class='form-control'  id='validationCustom22' >\
                 <?php $__currentLoopData = $allprivileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allprivilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
               <option value='<?php echo e($allprivilege->id); ?>'><?php echo e($allprivilege->privilegeName); ?></option>\
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                 </select>";
  
  
  var button = document.createElement('button');
  button.classList.add("close");
  button.setAttribute('type', 'submit');
  
  
  var i = document.createElement('i');
  i.classList.add("flaticon-trash");
  i.classList.add("ms-delete-trigger");
  
  
  button.appendChild(i);
  
  
  
  div1.appendChild(div2);
  
  var div4 = document.createElement('div');
  div4.classList.add("col-md-12");
  div4.classList.add("mb-3");
  div4.appendChild(button);
  li.appendChild(div1);
  
  
 
  li.appendChild(div4);
  
 
  
  ul.appendChild(li);
  
  //-----------------------------------
  if ($('ul#uldin li').length < 1 ) {
 console.log('hgkjk');
 $('#kamalyakolfermadj').attr('disabled','disabled');
} else {

$('#kamalyakolfermadj').attr('disabled',false);	
}
  
  //-----------------------------------
  }
//---------------------------------------------------------------------------------------------------

</script>
<script>

(function($) {
  'use strict';

   var dataSet12 = [
    <?php $__currentLoopData = $someInfoEmployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $InfoEmployee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            

   [ "  <?php echo e($InfoEmployee->idEmployee); ?>", " <?php echo e($InfoEmployee->email); ?>",  " <?php echo e($InfoEmployee->type); ?>", "<?php echo e($InfoEmployee->name); ?>"],
   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('superadmin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/superadmin/showRestaurantAllInfoByOne.blade.php ENDPATH**/ ?>