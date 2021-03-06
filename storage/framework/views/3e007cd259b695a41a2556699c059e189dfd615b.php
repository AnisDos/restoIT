<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from slidesigma.com/themes/html/costic/pages/prebuilt-pages/default-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:51:11 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Costic Dashboard</title>
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
 
  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>
  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
  <!-- Sidebar Navigation Left -->
  <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="../../index.html">
        <img src="../../assets/img/costic/costic-logo-216x62.png" alt="logo">
      </a>
    </div>
    
  </aside>
  <!-- Main Content -->
  <main class="body-content">

    <div class="ms-content-wrapper ms-auth">
      <div class="ms-auth-container">
        <div class="ms-auth-col">
          <div class="ms-auth-bgemployee"></div>
        </div>
        <div class="ms-auth-col">
          <div class="ms-auth-form">
            <form method="POST" action="<?php echo e(route('employee.login.submit')); ?>" class="needs-validation" novalidate="">
                <?php echo csrf_field(); ?>
              <h3>Employee Login </h3>  
               <p class="mb-0 mt-3 text-center" >You are NOT an Employee? <a class="btn-link" href="<?php echo e(url('login')); ?>">Please Login here</a> 
            
              <p>Please enter your email and password to continue</p>
           
              <div class="mb-3">
                <label for="validationCustom08">Email Address</label>
                <div class="input-group">
                  <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control <?php $__errorArgs = ['email'];
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
              <div class="mb-2">
                <label for="validationCustom09">Password</label>
                <div class="input-group">
                  <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom09" placeholder="Password" required="">
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
              <div class="form-group">
                <label class="ms-checkbox-wrap">
                  <input class="form-check-input" type="checkbox" value=""> <i class="ms-checkbox-check"></i>
                </label> <span> Remember Password </span>

                <?php if(Route::has('password.request')): ?>
                <label class="d-block mt-3"><a href="<?php echo e(route('password.request')); ?>" class="btn-link" >Forgot Password?</a>
                </label>
                <?php endif; ?>

              </div>
              <button class="btn btn-primary mt-4 d-block w-100" type="submit">Sign In</button> 
           
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Forgot Password Modal -->
 
  </main>
  <!-- SCRIPTS -->
  <!-- Global Required Scripts Start -->
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/jquery-3.3.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/perfect-scrollbar.js')); ?>">
  </script>
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/jquery-ui.min.js')); ?>">
  </script>
  <!-- Global Required Scripts End -->
  <!-- Costic core JavaScript -->
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/framework.js')); ?>"></script>
  <!-- Settings -->
  <script src="<?php echo e(asset ('styleRestoIT/assets/js/settings.js')); ?>"></script>
</body>


<!-- Mirrored from slidesigma.com/themes/html/costic/pages/prebuilt-pages/default-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:51:11 GMT -->
</html><?php /**PATH D:\laravelAnis\restoIT\resources\views/authEmployee/login.blade.php ENDPATH**/ ?>