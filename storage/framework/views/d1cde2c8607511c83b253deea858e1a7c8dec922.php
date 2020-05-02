




<?php $__env->startSection('content'); ?>
<script type="text/javascript" > 
    setTimeout(function() {
 $('#successalert').fadeOut('fast');
}, 8000); // <-- time in milliseconds
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
<?php if(session('danger')): ?>
<div class="x_content bs-example-popovers" id="successalert" >
  <div class="alert alert-danger" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong>DANGER!</strong> <?php echo e(session('danger')); ?>

    </div>
  </div>


  <?php endif; ?>





    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Purchare A product </li>
            </ol>
          </nav>




          
         







        </div>



        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Purchare A product  Form</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="<?php echo e(url('restaurant/send_mail')); ?>"  class="needs-validation clearfix" novalidate>
                
              <?php echo csrf_field(); ?>
                <div class="form-row">



                            
                    
    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Product Name</label>
                    <div class="input-group">
                      <input type="text"  value="<?php echo e($product->productName); ?>"   class="form-control" id="validationCustom18" readonly >
                    </div>
                  </div>




                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Current QNT</label>
                    <div class="input-group">
                      <input type="text"  value="<?php echo e($productWest); ?> <?php echo e($product->unity); ?>"   class="form-control" id="validationCustom18" readonly >
                    </div>
                  </div>



                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>" >
                  
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25">quantity you want to purchase it</label>
                    <div class="input-group">
                      <input type="number" name="qntSTK" value="<?php echo e(old('qntSTK')); ?>"  class="form-control <?php $__errorArgs = ['qntSTK'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> "  id="validationCustom25" placeholder="quantity" required>
                     
                      <?php $__errorArgs = ['qntSTK'];
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
                    <label for="validationCustom25">message</label>
                    <div class="input-group">
                      <input type="text" name="message" value="<?php echo e(old('message')); ?>"  class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> "  id="validationCustom25" placeholder="quantity" required>
                     
                      <?php $__errorArgs = ['message'];
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
                    <label for="validationCustom22">Select provider</label>
                    <div class="input-group">
                      <select class="form-control <?php $__errorArgs = ['provider_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="provider_id" id="validationCustom22" >
                 
                        
              
                     <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            

                      <option value="<?php echo e($provider->id); ?>"><?php echo e($provider->providerName); ?></option>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                      </select>
                      <div class="invalid-feedback">
                        Please select a Catagory.
                      </div>
                    </div>
                  </div>






                </div>



                <div class="ms-panel-header new">
                  <button class="btn btn-primary d-block" type="submit">Purchare A product </button>
                </div>



              </form>

            </div>
          </div>

        </div>

        
<!--===============================================================================================-->

<div class="col-xl-6 col-md-12">
    <div class="ms-panel ms-panel-fh">
      <div class="ms-panel-header">
        <h6>All pruduct Inventory Shortage</h6>
      </div>
      <div class="ms-panel-body">
  










        <?php $__currentLoopData = $productNoQnt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="media p-2" href="/restaurant/purchaseOrder/<?php echo e($prod->id); ?>">
          <div class="media-body"> <span> Inventory shortage <strong> <?php echo e($prod->productName); ?> </strong></span>

          </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
















      </div>
    </div>

  </div>































      </div>
    </div>


  
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('restaurant.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/restaurant/purchaseOrder.blade.php ENDPATH**/ ?>