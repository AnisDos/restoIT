




<?php $__env->startSection('content'); ?>




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
    <?php $__currentLoopData = $meals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            

   [ "<?php echo e($meal->id); ?>","  <img src='/storage/<?php echo e($meal->image); ?>' style='width:50px; height:30px;'><?php echo e($meal->mealName); ?>",  "46546", "In Stock", "$32","<a href='/admin/mealDetails/<?php echo e($meal->id); ?>  '> 3abez</a>"],
   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 ];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "Product ID" },
      { title: "Product Name" },

      { title: "Quantity" },
      { title: "Status" },
      { title: "Price" },
      { title: "details" },


    ],
  });


 




})(jQuery);

</script>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/admin/mealsList.blade.php ENDPATH**/ ?>