








<?php $__env->startSection('content'); ?>







    <div class="ms-content-wrapper">
      <div class="row">

        <script type="text/javascript" > 
          setTimeout(function() {
       $('#successalert').fadeOut('fast');
     }, 20000); // <-- time in milliseconds
     </script>
    
   
        
        <?php if(session('success')): ?>
        <div class="x_content bs-example-popovers" id="successalert" >
          <div class="alert alert-success" role="alert" >
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>well done!</strong> <?php echo e(session('success')); ?>

            </div>
          </div>

        
          <?php endif; ?>

      






















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
              <h6>Project Sales</h6>
              <p>Monitor how much sales your product does</p>
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
  text: 'Revenu of all your restaurant, 2020'
  },
  
  subtitle: {
  text: 'Source: thesolarfoundation.com'
  },
  
  yAxis: {
  title: {
    text: 'Number of Employees'
  }
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
  
    <?php $__currentLoopData = $revenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    {
  name: '<?php echo e($revenu[0]); ?>',
  data: [  <?php echo e($revenu[1][0]); ?>, <?php echo e($revenu[1][1]); ?>, <?php echo e($revenu[1][2]); ?>, <?php echo e($revenu[1][3]); ?>, <?php echo e($revenu[1][4]); ?>, <?php echo e($revenu[1][5]); ?>, <?php echo e($revenu[1][6]); ?>, <?php echo e($revenu[1][7]); ?>, <?php echo e($revenu[1][8]); ?>, <?php echo e($revenu[1][9]); ?>, <?php echo e($revenu[1][10]); ?>, <?php echo e($revenu[1][11]); ?>,]
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


<?php echo $__env->make('superadmin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/superadmin/showRevenu.blade.php ENDPATH**/ ?>