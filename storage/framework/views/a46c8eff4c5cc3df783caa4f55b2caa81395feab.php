




<?php $__env->startSection('content'); ?>


<script type="text/javascript" > 
  setTimeout(function() {
$('#successalert').fadeOut('fast');
}, 12000); // <-- time in milliseconds
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
                <table id="data-table-123" class="table table-hover w-100"></table>
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
    <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            

   [ "<?php echo e($restaurant->id); ?>","  <img src='/storage/<?php echo e($restaurant->image); ?>' style='width:50px; height:30px;'><?php echo e($restaurant->name); ?> <?php if($restaurant->is_admin): ?> (ADMIN) <?php endif; ?>",  "46546", "In Stock", "$32","<a href='/admin/restaurantDetails/<?php echo e($restaurant->id); ?>  '> DETAILS</a>"],
   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 ];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "Restaurant ID" },
      { title: "Restaurant Name" },

      { title: "Quantity" },
      { title: "Status" },
      { title: "Price" },
      { title: "details" },


    ],
  });


 




})(jQuery);

</script>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/admin/restaurantsList.blade.php ENDPATH**/ ?>