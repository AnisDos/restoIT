




<?php $__env->startSection('content'); ?>
<?php echo e(App::setLocale(Session::get('locale'))); ?>



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




          







        </div>


        <div class="col-xl-12 col-md-12">
            <div class="ms-panel ms-panel-fh">
              <div class="ms-panel-header">
                <h6>Login Form</h6>
              </div>
              <div class="ms-panel-body">
                <form enctype="multipart/form-data" method="POST"  action="<?php echo e(url('restaurant/addSupChargeForm')); ?>"  class="needs-validation clearfix" novalidate>
                
                  <?php echo csrf_field(); ?>
                    <div class="form-row">
    
    
    
                                
             
        
    
             
                      
                      <div class="col-md-12 mb-3">
                        <label for="validationCustom18">Price Charge</label>
                        <div class="input-group">
                          <input type="number" min="0" step=".01" name="priceCharge" value="<?php echo e(old('priceCharge')); ?>"  class="form-control <?php $__errorArgs = ['priceCharge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="priceCharge" required >
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          <?php $__errorArgs = ['priceCharge'];
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
                    <label for="validationCustom12">note</label>
                    <div class="input-group">
                      <textarea rows="5"  name="note" id="validationCustom12"   class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Message" required ><?php echo e(old('note')); ?></textarea>
                      <?php $__errorArgs = ['note'];
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
                          <label for="validationCustom12">preuve</label>
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
                      <button class="btn btn-primary d-block" type="submit">Add Restaurant</button>
                    </div>
    
    
    
                  </form>
  
            </div>
            </div>
        </div>







        <div class="col-xl-12 col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>All Charge List</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="data-table-123" class="table w-100 thead-primary"></table>
              </div>
            </div>
          </div>
        </div>






      </div>
    </div>



  
    <?php $__env->stopSection(); ?>

    

<?php $__env->startSection('script'); ?>




<script>

(function($) {
  'use strict';

   var dataSet12 = [
    <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            

   [ "  <?php echo e($charge->type); ?>"," <?php if( $charge->type == 'employee'): ?> <?php echo e($charge->employee->idEmployee); ?><?php endif; ?> ",  " <?php if( $charge->type == 'delevryCompany' ): ?><?php echo e($charge->delivery_companies->deliveryCompaniesName); ?> <?php endif; ?> ", "<?php echo e($charge->note); ?>", "<?php echo e($charge->priceCharge); ?>", "<?php if( $charge->type == 'additional'): ?> <?php if($charge->image): ?><img id='imgadd' src='/storage/<?php echo e($charge->image); ?>' > <?php endif; ?> <?php endif; ?>"],
   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
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

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/restaurant/addSupCharge.blade.php ENDPATH**/ ?>