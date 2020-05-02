




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
                            

   [ " <?php echo e($user->name); ?>","<?php echo e($user->email); ?>",  "<?php echo e($user->address); ?>", "<?php echo e($user->restaurant_key); ?>", "<?php echo e($user->date_experation); ?>","<?php if($user->date_experation < Carbon::now()): ?> - <?php endif; ?><?php echo e((Carbon::parse($user->date_experation))->diffInDays(Carbon::now())); ?> ","<?php if($user->verified): ?><div style='color:green'> active </div> <?php else: ?> <div style='color:red'> noActive </div> <?php endif; ?>","<a href='/superadmin/showRestaurantAllInfoByOne/<?php echo e($user->user_id); ?>'> check =></a>"],
   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
      { title: "Status" },

      { title: "Action" },

    ],
  });


 




})(jQuery);

</script>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('superadmin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/superAdmin/showRestaurantAllInfo.blade.php ENDPATH**/ ?>