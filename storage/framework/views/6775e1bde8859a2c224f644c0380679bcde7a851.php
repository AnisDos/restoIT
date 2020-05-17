




<?php $__env->startSection('content'); ?>
<?php echo e(App::setLocale(Session::get('locale'))); ?>

   


 


    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1  class="db-header-title"><?php echo e($employee->name); ?> <?php if($employee->is_admin): ?> (ADMIN) <?php endif; ?></h1>
        </div>
     



<!--===============================================table=================================================-->
        <div class="col-xl-6 col-md-12">
          <div class="ms-panel">
              <div class="ms-card-header clearfix">
                  <h6 class="ms-card-title"><?php echo e(__('Historique Charge')); ?></h6>
      
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
 



<!--//////////////////////////////////////////////////////////////// -->



<!--update info employees -->


<!--//////////////////////////////////////////////////////////////// -->
<div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6><?php echo e(__('Update informations Employee Form')); ?></h6>
      </div>
      <div class="ms-panel-body">
        <form method="POST"  action="<?php echo e(url('restaurant/updateEmployyeInfo')); ?>"  class="needs-validation clearfix" novalidate>
          
        <?php echo csrf_field(); ?>
          <div class="form-row">


   
            <input type="hidden" name="id_emplo" value="<?php echo e($employee->id); ?>" >
                      
            <div class="col-md-12 mb-3">
                <label for="validationCustom18"><?php echo e(__('id Employee')); ?></label>
                <div class="input-group">
                  <input type="text"  value="<?php echo e($employee->idEmployee); ?>"  class="form-control" id="validationCustom18" placeholder="id Employee" readonly >
            
                </div>
              </div>
              
   
            <div class="col-md-12 mb-3">
                <label for="validationCustom18"><?php echo e(__('Name Employee')); ?></label>
                <div class="input-group">
                  <input type="text" name="nameEmployee" value="<?php echo e($employee->nameEmployee); ?>"  class="form-control <?php $__errorArgs = ['nameEmployee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="Name Employee" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <?php $__errorArgs = ['nameEmployee'];
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
                <label for="validationCustom18"><?php echo e(__('telephone')); ?></label>
                <div class="input-group">
                  <input type="number" name="tel" value="<?php echo e($employee->tel); ?>"  class="form-control <?php $__errorArgs = ['tel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="tel" required >
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <?php $__errorArgs = ['tel'];
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
                    <input type="email" value="<?php echo e($employee->user->email); ?>"  name="email" class="form-control <?php $__errorArgs = ['email'];
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

        

                <div class="col-md-12 mb-3">
                    <label for="validationCustom18"><?php echo e(__('price per hour')); ?></label>
                    <div class="input-group">
                      <input type="number" name="price_ph" value="<?php echo e($employee->price_ph); ?>"  class="form-control <?php $__errorArgs = ['price_ph'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="price per hour" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['price_ph'];
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
                    <label for="validationCustom18"><?php echo e(__('type')); ?></label>
                    <div class="input-group">
                   
                      
                        <select class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="type" id="validationCustom22" >
                 
                           
                            
                            
                            <option value="<?php echo e($employee->type); ?>" selected ><?php echo e($employee->type); ?></option>
       
                            <option value="kashir" >kashir</option>
                            <option value="cook">cook</option>
       
                     
       
       
                             </select>
                      
                      
                        <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['type'];
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
            <button class="btn btn-primary d-block" type="submit"><?php echo e(__('Update Employee Information')); ?></button>
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
          <?php if($employee->active): ?>
        <form method="POST"  action="<?php echo e(url('restaurant/decativateEmployee')); ?>"  class="needs-validation clearfix" novalidate>
          
        <?php echo csrf_field(); ?>
          <div class="form-row">



                      
   
<input type="hidden" name="id_emplo" value="<?php echo e($employee->id); ?>" >


       


          </div>



          <div class="ms-panel-header new">
            <button class="btn btn-primary-info d-block" type="submit"><?php echo e(__('block Employee')); ?></button>
          </div>



        </form>
<?php else: ?>
<form method="POST"  action="<?php echo e(url('restaurant/updatePasswordEmployee')); ?>"  class="needs-validation clearfix" novalidate>
          
    <?php echo csrf_field(); ?>
      <div class="form-row">



                  




<input type="hidden" name="id_emplo" value="<?php echo e($employee->id); ?>" >
<input type="hidden" name="Activate" value="activih" >
                  

<div class="col-md-12 mb-2">
      <label for="validationCustom09"><?php echo e(__('Password')); ?></label>
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
      <label for="validationCustom09"><?php echo e(__('Repeat Password')); ?></label>
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
        <button class="btn btn-primary d-block" type="submit"><?php echo e(__('activate compte Employee')); ?></button>
      </div>



    </form>
<?php endif; ?>
      </div>
    </div>

  </div>



<!--//////////////////////////////////////////////////////////////// -->

  
<!-- update password restaurant  -->


  <!--//////////////////////////////////////////////////////////////// -->
      <?php if($employee->active): ?>
  <div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6><?php echo e(__('Update Password Form')); ?></h6>
      </div>
      <div class="ms-panel-body">
 
        <form method="POST"  action="<?php echo e(url('restaurant/updatePasswordEmployee')); ?>"  class="needs-validation clearfix" novalidate>
          
        <?php echo csrf_field(); ?>
          <div class="form-row">



                      
   


   
<input type="hidden" name="id_emplo" value="<?php echo e($employee->id); ?>" >
                      
   
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
          <label for="validationCustom09"><?php echo e(__('Repeat Password')); ?></label>
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
            <button class="btn btn-primary d-block" type="submit"><?php echo e(__('Update paasword')); ?></button>
          </div>



        </form>

      </div>
    </div>

  </div>

<?php endif; ?>
<!--====================================================================================-->











      </div>
    </div>
              
    
  
<?php $__env->stopSection(); ?>




<?php $__env->startSection('script'); ?>
<script>

(function($) {
  'use strict';

   var dataSet12 = [
    <?php $__currentLoopData = $employeeAllCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $InfoEmployee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            

   [ "  <?php echo e($employee->idEmployee); ?>", " <?php echo e($employee->email); ?>",  " <?php echo e($InfoEmployee->created_at); ?>", "<?php echo e($InfoEmployee->priceCharge); ?>"],
   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('restaurant.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/restaurant/checkEmployeeByOne.blade.php ENDPATH**/ ?>