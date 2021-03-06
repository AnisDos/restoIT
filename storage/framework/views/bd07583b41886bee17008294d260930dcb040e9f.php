




<?php $__env->startSection('content'); ?>

<?php
use Carbon\Carbon;
?>


    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Menu List</li>

  
          
            </ol>
          </nav>


                  


          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Product List</h6>
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
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            

   [ " <?php echo e($user->name); ?>","<?php echo e($user->email); ?>",  "<?php echo e($user->address); ?>", "<?php echo e($user->restaurant_key); ?>", "<?php echo e($user->date_experation); ?>","<?php echo e((Carbon::parse($user->date_experation))->diffInDays(Carbon::now())); ?> "],
   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    [ "40521","  <img src='../../assets/img/costic/pizza.jpg' style='width:50px; height:30px;'>pizza",  "5421", "In Stock", "$32","564"],
    [ "98521", "<img src='../../assets/img/costic/pizza.jpg' style='width:50px; height:30px;'>shake", "8422", "In Stock", "$17","564"],
    [ "45454", "<img src='../../assets/img/costic/egg-sandwich.jpg' style='width:50px; height:30px;'>Burger",  "1562", "In Stock", "$86" ,"564"],
    [ "12121", "<img src='../../assets/img/costic/egg-sandwich.jpg' style='width:50px; height:30px;'>Noodels",  "6224", "In Stock", "$43" ,"564"],
    [ "14451", "<img src='../../assets/img/costic/french-fries.jpg' style='width:50px; height:30px;'>pizza",  "5384", "Out Of Stock", "$85","564" ]
  ];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "Username"  },
      { title: "Email" },

      { title: "Address" },
      { title: "Key" },
      { title: "Date Experation" },
      { title: "Days left" },


    ],
  });


 




})(jQuery);

</script>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('superadmin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/superadmin/showRestaurantWithKey.blade.php ENDPATH**/ ?>