




<?php $__env->startSection('content'); ?>
<?php echo e(App::setLocale(Session::get('locale'))); ?>



    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> <?php echo e(__('Home')); ?></a></li>
        
              <li class="breadcrumb-item"><a href="#"><?php echo e(__('Caisse')); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Caisse')); ?></li>
            </ol>
          </nav>












        </div>



        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6><?php echo e(__('Add Caisse Form')); ?></h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="<?php echo e(url('restaurant/addCaisseForm')); ?>"  class="needs-validation clearfix" novalidate>
                
              <?php echo csrf_field(); ?>
                <div class="form-row">



                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18"><?php echo e(__('Name Caisse')); ?>  </label>
                    <div class="input-group">
                      <input type="text" name="caisseName" value="<?php echo e(old('caisseName')); ?>"  class="form-control <?php $__errorArgs = ['caisseName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="caisse name" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['caisseName'];
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
                    <label for="validationCustom25"><?php echo e(__('Cache Init')); ?></label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01" value="<?php echo e(old('cacheInit')); ?>"  class="form-control <?php $__errorArgs = ['cacheInit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="cacheInit" id="validationCustom25" placeholder="cache Init" required>
                     
                      <?php $__errorArgs = ['cacheInit'];
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
                  <button class="btn btn-primary d-block" type="submit"><?php echo e(__('Add Caisse')); ?></button>
                </div>



              </form>

            </div>
          </div>

        </div>



        

        

      </div>
    </div>


  
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('restaurant.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/restaurant/addCaisse.blade.php ENDPATH**/ ?>