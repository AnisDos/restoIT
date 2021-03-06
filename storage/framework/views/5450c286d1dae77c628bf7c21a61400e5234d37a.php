<!DOCTYPE html>
<html lang="en">


<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>INNOVAR registre</title>
  <!-- Iconic Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset ('styleRestoIT/vendors/iconic-fonts/flat-icons/flaticon.css')); ?>">
    <link href="<?php echo e(asset ('styleRestoIT/vendors/iconic-fonts/font-awesome/css/all.min.css')); ?>" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset ('styleRestoIT/assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="<?php echo e(asset ('styleRestoIT/assets/css/jquery-ui.min.css')); ?>" rel="stylesheet">
  <!-- Costic styles -->
  <link href="<?php echo e(asset ('styleRestoIT/assets/css/style.css')); ?>" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset ('styleRestoIT/favicon.ico')); ?>">

</head>

<body class="ms-body ms-primary-theme ms-logged-out">

  

  
  <!-- Main Content -->
  <main class="body-content">

   

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper ms-auth">

      <div class="ms-auth-container">
        <div class="ms-auth-col">
          <div class="ms-auth-bg"></div>
        </div>
        <div class="ms-auth-col">
          <div class="ms-auth-form">
            <form method="POST" action="<?php echo e(route('register')); ?>" class="needs-validation" novalidate>
                <?php echo csrf_field(); ?> 
                <h3>Create Admin Account</h3>
              <p >This form is only for Admins</p>
              <div class="form-row">



                <div class="col-md-12 ">
                  <label for="validationCustom01">Name  <?php echo e(__('name')); ?> </label>
                  <div class="input-group">
                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>"  id="validationCustom01" placeholder="Name"  required="">
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




                <div class="col-md-12 ">
                    <label for="validationCustom01">address</label>
                    <div class="input-group">
                      <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" value="<?php echo e(old('address')); ?>"  id="validationCustom01" placeholder="address"  required="">
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

                  



              </div>
              <div class="form-row">


                <div class="col-md-12 ">
                  <label for="validationCustom03">Email Address</label>
                  <div class="input-group">
                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>"  id="validationCustom03" placeholder="Email Address" required="">

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






                <div class="col-md-12 ">
                  <label for="validationCustom04">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="validationCustom04" placeholder="Password" required="">
                    
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


                <div class="col-md-12 ">
                    <label for="validationCustom04">Confirm Password</label>
                    <div class="input-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm your Password" required autocomplete="new-password">
                    
           
                    </div>
                  </div>

         



              </div>
              <div class="form-group">
                <div class="form-check pl-0">
                  <label class="ms-checkbox-wrap">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
                    <i class="ms-checkbox-check"></i>
                  </label>
                  <span class="invalid-feedback" role="alert">
                    <strong>you have to check this</strong>
                </span>
                  <span> Agree to terms and conditions <span style="color:red">you have to check it</span> </span>
                </div>
              </div>
              <button class="btn btn-primary mt-4 d-block w-100" type="submit">Create Account</button>
              
              <p class="mb-0 mt-3 text-center">Already have an account? <a class="btn-link" href="<?php echo e(route('login')); ?>">Login</a> </p>
            </form>

          </div>
        </div>
      </div>

    </div>

  </main>

  <!-- SCRIPTS -->
  <!-- Global Required Scripts Start -->
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/jquery-3.3.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/perfect-scrollbar.js')); ?>"> </script>
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/jquery-ui.min.js')); ?>"> </script>
  <!-- Global Required Scripts End -->

  <!-- Costic core JavaScript -->
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/framework.js')); ?>"></script>

  <!-- Settings -->
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/settings.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\laravelAnis\restoIT\resources\views/auth/register.blade.php ENDPATH**/ ?>