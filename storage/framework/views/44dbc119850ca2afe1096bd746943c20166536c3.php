








<?php $__env->startSection('content'); ?>

<?php echo e(App::setLocale(Session::get('locale'))); ?>

<?php

use Carbon\Carbon;
?>


    <div class="ms-content-wrapper">
      <div class="row">
  
      

        <div class="col-md-12">
        <h1 class="db-header-title"><?php echo e(__('Welcome')); ?>, <?php echo e(Auth::user()->admin->name); ?></h1>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-black"><i class="material-icons"></i> <?php echo e(Carbon::now()->year); ?></span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Total Restaurants</strong></span>
                <h2>3</h2>
              </div>
            </div>
            <canvas id="line-chart"></canvas>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-red"><i class="material-icons">arrow_upward</i> </span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Total Customers</strong></span>
                <h2>973</h2>
              </div>
            </div>
            <canvas id="line-chart-2"></canvas>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-black"><i class="material-icons">arrow_upward</i> </span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Total Employee</strong></span>
                <h2>7333</h2>
              </div>
            </div>
            <canvas id="line-chart-3"></canvas>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-red"><i class="material-icons">arrow_upward</i> </span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Total Orders</strong></span>
                <h2>48973</h2>
              </div>
            </div>
            <canvas id="line-chart-4"></canvas>
          </div>
        </div>
        <!-- Recent Orders Requested -->
        
       
        <!-- Food Orders -->
       
        <!-- END/Food Orders -->
     
        






























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
            <p>Monitor how much revenu your restaurants does</p>
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
text: 'Revenu of all your restaurant, <?php echo e(Carbon::now()->year); ?>'
},

subtitle: {
text: ''
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
/* {
name: 'Installation',
data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175,1236,5465,5465,54654]
}, 
{
name: 'Manufacturing',
data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434,1236,5465,5465,54654]
}, 
{
name: 'Sales & Distribution',
data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387,1236,5465,5465,54654]
},
{
name: 'Project Development',
data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227,1236,5465,5465,54654]
},
{
name: 'Other',
data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111,1236,5465,5465,54654]
} */],

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
            <h6>Restaurants Expenses</h6>
            <p>Monitor how much Expenses your restaurants does</p>
          </div>
        </div>




        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="container1"></div>
            <p class="highcharts-description">
                Basic line chart showing trends in a dataset. This chart includes the
                <code>series-label</code> module, which adds a label to each line for
                enhanced readability.
            </p>
        </figure>
        
        <script>
          Highcharts.chart('container1', {

title: {
text: 'Expenses of all your restaurant, <?php echo e(Carbon::now()->year); ?>'
},

subtitle: {
text: ''
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

  <?php $__currentLoopData = $chartsexpenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

































































      </div>
    </div>
  

  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/admin/home.blade.php ENDPATH**/ ?>