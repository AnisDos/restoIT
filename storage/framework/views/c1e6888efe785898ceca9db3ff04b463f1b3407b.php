




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
              <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
          </nav>




          
      
   
        

         







        </div>



        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Add Product Form</h6>
            </div>
            <div class="ms-panel-body">
              <form method="POST"  action="<?php echo e(url('restaurant/addProductForm')); ?>" enctype="multipart/form-data" class="needs-validation clearfix" novalidate>
                
              <?php echo csrf_field(); ?>
                <div class="form-row">



                            
         
    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">Product Name</label>
                    <div class="input-group">
                      <input type="text" name="productName" value="<?php echo e(old('productName')); ?>"  class="form-control <?php $__errorArgs = ['productName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="Product Name" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['productName'];
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
                    <label for="validationCustom25">quantity</label>
                    <div class="input-group">
                      <input type="number" value="<?php echo e(old('qntSTK')); ?>"  class="form-control <?php $__errorArgs = ['qntSTK'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="qntSTK" id="validationCustom25" placeholder="quantity" required>
                     
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
                    <label for="validationCustom18">unity</label>
                    <div class="input-group">
                      <input type="text" name="unity" value="<?php echo e(old('unity')); ?>"  class="form-control <?php $__errorArgs = ['unity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="unity" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['unity'];
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
                    <label for="validationCustom18">price</label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01" name="price" value="<?php echo e(old('price')); ?>"  class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="price" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['price'];
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
                    <label for="validationCustom18">tax</label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01"  name="tax" value="<?php echo e(old('tax')); ?>"  class="form-control <?php $__errorArgs = ['tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="tax" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['tax'];
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
                    <label for="validationCustom18">return</label>
                    <div class="input-group">
                
                        <label class="ms-switch">
                          <input name="return" type="checkbox" checked> <span class="ms-switch-slider ms-switch-success round"></span>
                        </label> <span> Success </span>
                    
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['return'];
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
                    <label for="validationCustom18">date_experation_bool</label>
                    <div class="input-group">
                      <label class="ms-switch">
                        <input name="date_experation_bool" type="checkbox"  onclick="deleteAddInput();" id="chekboxremouvaikd1" checked > <span class="ms-switch-slider ms-switch-success round"></span>
                      </label> <span> Success </span>
                  
                   <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['date_experation_bool'];
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



                  <div class="col-md-12 mb-3" id="colmdaddthisinremouve" >
                          <div  id="remouveadddivinput" >
                              <label for="validationCustom18">date_experation</label>
                              <div class="input-group">
                                <input type="date" name="date_experation" value="<?php echo e(old('date_experation')); ?>"  class="form-control <?php $__errorArgs = ['date_experation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="date_experation" required >
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <?php $__errorArgs = ['date_experation'];
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



                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18">limiteSTK</label>
                    <div class="input-group">
                      <input type="text" name="limiteSTK" value="<?php echo e(old('limiteSTK')); ?>"  class="form-control <?php $__errorArgs = ['limiteSTK'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="limiteSTK" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['limiteSTK'];
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
                    <label for="validationCustom18">codebare</label>
                    <div class="input-group">
                      <input type="text" name="codebare" value="<?php echo e(old('codebare')); ?>"  class="form-control <?php $__errorArgs = ['codebare'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="codebare" required >
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <?php $__errorArgs = ['codebare'];
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
                 
                        
                      <option value=""> no provider now  </option>
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
                  <button class="btn btn-primary d-block" type="submit">Add Product</button>
                </div>



              </form>

            </div>
          </div>

        </div>



        

        

      </div>
    </div>











  
    <?php $__env->stopSection(); ?>




    



<?php $__env->startSection('script'); ?>

<script type="text/javascript">

  function deleteAddInput() {


      if (document.getElementById('chekboxremouvaikd1').checked) {

        

        var div1 = document.createElement('div');
        div1.id = "remouveadddivinput";
        div1.innerHTML = "<label for='validationCustom18'>date_experation</label><div class='input-group'><input type='date' name='date_experation' value='<?php echo e(old('date_experation')); ?>'  class='form-control <?php $__errorArgs = ['date_experation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>' id='validationCustom18' placeholder='date_experation' required ><div class='valid-feedback'>Looks good!</div><?php $__errorArgs = ['date_experation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class='invalid-feedback' role='alert'><strong><?php echo e($message); ?></strong></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>"

        var div2 = document.getElementById('colmdaddthisinremouve');
      

        div2.appendChild(div1);

      } else {
        
        document.getElementById("remouveadddivinput").remove();
      }


  }




  
  </script>
    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('restaurant.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/product/addProduct.blade.php ENDPATH**/ ?>