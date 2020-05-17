




<?php $__env->startSection('content'); ?>

   
<?php echo e(App::setLocale(Session::get('locale'))); ?>



    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1  class="db-header-title"><?php echo e($restaurant->name); ?> <?php if($restaurant->is_admin): ?> (ADMIN) <?php endif; ?></h1>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Orders</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> <?php echo e($totalorders); ?> </p>
                <p class="fs-12">orders this year</p>
              </div>
            </div> <i class="flaticon-statistics"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Revenus (SAR)</h6>
                <p class="ms-card-change"><?php echo e($totalrevenus); ?> </p>
                <p class="fs-12">This Year</p>
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
                <p class="fs-12">Employees of this restaurants</p>
              </div>
            </div> <i class="flaticon-user"></i>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Charges (SAR) </h6>
                <p class="ms-card-change"><?php echo e($totaldepenses); ?> </p>
                <p class="fs-12">This Year</p>
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
 

<!--==============================================================================================-->        
        





<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->




<style>
 .highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
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
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
                A basic column chart compares rainfall values between four cities.
                Tokyo has the overall highest amount of rainfall, followed by New York.
                The chart is making use of the axis crosshair feature, to highlight
                months as they are hovered over.
            </p>
        </figure>
        
        
        <script>
         Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
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
            text: ' SAR'
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
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'revenu',
        data: [<?php $__currentLoopData = $revenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($revenu); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]

    }, {
        name: 'depense',
        data: [<?php $__currentLoopData = $depenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($depense); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]

    }]
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




<!--=================================================================================-->

<!--//////////////////////////////////////////////////////////////// -->

<div class="col-xl-12 col-md-12">
  <div class="ms-panel">
    <div class="ms-panel-header">
      <h6>All Charge List</h6>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
        <table id="data-table-1234" class="table w-100 thead-primary"></table>
      </div>
    </div>
  </div>
</div>

<!--//////////////////////////////////////////////////////////////// -->



<div class="col-xl-12 col-md-12">
<div class="ms-panel">
  <div class="ms-panel-header">
    <h6>Completed Orders List</h6>
  </div>
  <div class="ms-panel-body">
    <div class="table-responsive">
      <table id="data-table-12345" class="table w-100 thead-primary"></table>
    </div>
  </div>
</div>
</div>


<!--//////////////////////////////////////////////////////////////// -->

<div class="col-xl-12 col-md-12">
<div class="ms-panel">
  <div class="ms-panel-header">
  <h6>All Actions in your System  </h6>
  </div>
  <div class="ms-panel-body">
    <div class="table-responsive">
      <table id="data-table-history" class="table w-100 thead-primary"></table>
    </div>
  </div>
</div>
</div>


<!--//////////////////////////////////////////////////////////////// -->
<!--update info restaurant -->
<div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>Update informations restaurant Form</h6>
      </div>
      <div class="ms-panel-body">
        <form method="POST"  action="<?php echo e(url('admin/updateRestaurantInfo')); ?>" enctype="multipart/form-data" class="needs-validation clearfix" novalidate>
          
        <?php echo csrf_field(); ?>
          <div class="form-row">


   
            <input type="hidden" name="id_res" value="<?php echo e($restaurant->id); ?>" >
                      
   
            <div class="col-md-12 mb-3">
                <label for="validationCustom18">Name</label>
                <div class="input-group">
                  <input type="text" name="name" value="<?php echo e($restaurant->name); ?>"  class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="Name" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="invalid-feedback" role="alert">
                      <strong><?php echo e($message); ?></strong>
                  </span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              
              <div class="col-md-12 mb-3">
                <label for="validationCustom18">Address</label>
                <div class="input-group">
                  <input type="text" name="address" value="<?php echo e($restaurant->address); ?>"  class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="Address" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="invalid-feedback" role="alert">
                      <strong><?php echo e($message); ?></strong>
                  </span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                

              </div>

                <div class="col-md-12 mb-3">
                  <label for="validationCustom08">Email Address</label>
                  <div class="input-group">
                    <input type="email" value="<?php echo e($restaurant->user->email); ?>"  name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom08" placeholder="Email Address" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>

        

                
                <label for="validationCustom12">Old Restaurant Logo</label>
               <div class="input-group">
                <img src='/storage/<?php echo e($restaurant->image); ?>' style='width:200px; height:100px;'>
               </div>
                
                <div class="col-md-12 mb-3">
                  <label for="validationCustom12">New Restaurant Logo</label>
                  <div class="custom-file">
                    <input type="file" name="image" value="<?php echo e(old('image')); ?>"  class="custom-file-input <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validatedCustomFile">
                    <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label>
                  
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  </div>
                </div>











            


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary d-block" type="submit">Update Restaurant Information</button>
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
          <?php if($restaurant->active): ?>
        <form method="POST"  action="<?php echo e(url('admin/decativateRestaurant')); ?>"  class="needs-validation clearfix" novalidate>
          
        <?php echo csrf_field(); ?>
          <div class="form-row">



                      
   
<input type="hidden" name="id_res" value="<?php echo e($restaurant->id); ?>" >


       


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary-info d-block" type="submit">block restaurant</button>
          </div>



        </form>
<?php else: ?>
<form method="POST"  action="<?php echo e(url('admin/updatePasswordRestaurant')); ?>"  class="needs-validation clearfix" novalidate>
          
    <?php echo csrf_field(); ?>
      <div class="form-row">



                  




<input type="hidden" name="id_res" value="<?php echo e($restaurant->id); ?>" >
<input type="hidden" name="Activate" value="activih" >
                  

<div class="col-md-12 mb-2">
      <label for="validationCustom09">Password</label>
      <div class="input-group">
        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="validationCustom09" placeholder="Password" required >
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>

    <div class="col-md-12 mb-2">
      <label for="validationCustom09">Repeat Password</label>
      <div class="input-group">
        <input type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation" id="validationCustom099" placeholder="Repeat Password" required >
        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>


      </div>



      <div class="ms-panel-header new">
        <button class="btn btn-primary d-block" type="submit">activate compte restaurant</button>
      </div>



    </form>
<?php endif; ?>
      </div>
    </div>

  </div>



<!--//////////////////////////////////////////////////////////////// -->

  
<!-- update password restaurant  -->


  <!--//////////////////////////////////////////////////////////////// -->
  <div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>Update Password Form</h6>
      </div>
      <div class="ms-panel-body">
        <?php if($restaurant->active): ?>
        <form method="POST"  action="<?php echo e(url('admin/updatePasswordRestaurant')); ?>"  class="needs-validation clearfix" novalidate>
          
        <?php echo csrf_field(); ?>
          <div class="form-row">



                      
   


   
<input type="hidden" name="id_res" value="<?php echo e($restaurant->id); ?>" >
                      
   
<div class="col-md-12 mb-2">
          <label for="validationCustom09">Password</label>
          <div class="input-group">
            <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="validationCustom09" placeholder="Password" required >
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
        </div>

        <div class="col-md-12 mb-2">
          <label for="validationCustom09">Repeat Password</label>
          <div class="input-group">
            <input type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation" id="validationCustom099" placeholder="Repeat Password" required >
            <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
        </div>


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary d-block" type="submit">Update paasword</button>
          </div>



        </form>
<?php endif; ?>
      </div>
    </div>

  </div>


<!--====================================================================================-->











      </div>
    </div>
              
    
  
<?php $__env->stopSection(); ?>




<?php $__env->startSection('script'); ?>
<script>

(function($) {
  'use strict';

   var dataSet12 = [
    <?php $__currentLoopData = $someInfoEmployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $InfoEmployee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            

   [ "  <?php echo e($InfoEmployee->idEmployee); ?>", " <?php echo e($InfoEmployee->user->email); ?>",  " <?php echo e($InfoEmployee->type); ?>", "<?php echo e($InfoEmployee->restaurant->name); ?>"],
   
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

<script>

  (function($) {
    'use strict';
  
     var dataSet123 = [
      <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
  
     [ "  <?php echo e($charge->type); ?>"," <?php if( $charge->type == 'employee'): ?> <?php echo e($charge->employee->idEmployee); ?><?php endif; ?> ",  " <?php if( $charge->type == 'delevryCompany' ): ?><?php echo e($charge->delivery_companies->deliveryCompaniesName); ?> <?php endif; ?> ", "<?php echo e($charge->note); ?>", "<?php echo e($charge->priceCharge); ?>", "<?php if( $charge->type == 'additional'): ?> <?php if($charge->image): ?><img id='imgadd' src='/storage/<?php echo e($charge->image); ?>' > <?php endif; ?> <?php endif; ?>"],
     
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  ];
  
  
  
  
  
  
  
  
  
    var tableFour = $('#data-table-1234').DataTable( {
      data: dataSet123,
      columns: [
      
        { title: "type" },
        { title: "Id Employee" },
        { title: "delivery Company Name" },
        { title: "note" },
        { title: "price Charge" },
        { title: "image" },
     
  
      ],
    });
  
  
   
  
  
  
  
  })(jQuery);
  
  </script>
  
<script>

  (function($) {
    'use strict';
  
     var dataSet1245 = [
      <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
  
     [ "<?php echo e($order->nOrder); ?>","  <?php echo e($order->taux); ?>",  "<?php echo e($order->orderType); ?>", "<?php echo e($order->paymentMethod); ?>", "<?php echo e($order->created_at); ?>", "<?php echo e($order->priceOrder); ?>"],
     
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  ];
  
  
  
  
  
  
  
  
  
    var tableFour = $('#data-table-12345').DataTable( {
      data: dataSet1245,
      columns: [
        { title: "nOrder" },
        { title: "taux" },
  
        { title: "orderType" },
        { title: "paymentMethod" },
        { title: "date" },
        { title: "priceOrder" },
  
  
      ],
    });
  
  
   
  
  
  
  
  })(jQuery);
  
  </script>
  
<script>















  (function($) {
    'use strict';
  
     var dataSet12history = [
      <?php $__currentLoopData = $historyTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $historyTransaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
  
     [ "<?php echo e($historyTransaction->type); ?>","  <?php echo e($historyTransaction->restaurant->name); ?>",  "<?php if( $historyTransaction->employee_id): ?> <?php echo e($historyTransaction->employee->idEmployee); ?> <?php endif; ?>", "<?php echo e($historyTransaction->productVersion->product->productName); ?>","<?php echo e($historyTransaction->oldqnt); ?>","<?php echo e($historyTransaction->qnt); ?>" ,"<?php echo e($historyTransaction->noteIfDelete); ?>" ,"<?php echo e($historyTransaction->created_at); ?>"],
     
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  ];
  
  
  
  
  
  
  
  
  
    var tableFour = $('#data-table-history').DataTable( {
      data: dataSet12history,
      columns: [
        { title: "type" },
        { title: "restaurant name" },
  
        { title: "employee_id" },
        { title: "product_version_id" },
        { title: "oldqnt" },
        { title: "qnt" },
        { title: "noteIfDelete" },
        { title: "date" },
      
      
  
  
      ],
    });
  
  
   
  
  
  
  
  })(jQuery);
  
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/admin/restaurantDetails.blade.php ENDPATH**/ ?>