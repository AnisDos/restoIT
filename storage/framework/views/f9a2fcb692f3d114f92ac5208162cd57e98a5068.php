




<?php $__env->startSection('content'); ?>
<?php echo e(App::setLocale(Session::get('locale'))); ?>




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
  









    

<!-- ========================================================================== -->


<form id="form_ex_send" method="POST" action="<?php echo e(url('/restaurant/validatePayEmployee')); ?>" >
    <?php echo csrf_field(); ?>


      
   
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel"></h4>
        </div>
        <div class="modal-body khta">
         
            <div class="form-group">
              <label for="recipient-name" id="labelFrom"  class="control-label">Do you want to pay </label>
              <p id="labelTo" > </p>
              <input name="id_employee" id="hiddenIdProduct" type="hidden" value="" >
              <input name="total" id="hiddentotale" type="hidden" value="" >
       
             
            </div>
        
      
       <strong>   <p id="totalOldNew" > </p>    </strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
          <button type="submit" class="btn btn-primary"  id="regitEx"  onclick="event.preventDefault();
          document.getElementById('form_ex_send').submit();"  > submit</button>







       
        </div>
      </div>
    </div>
  </div>       




  



</form>
<!-------------------------------------------------------------------->






  
<?php $__env->stopSection(); ?>




<?php $__env->startSection('script'); ?>

<script>

function changeTextOfLabelInCOnfermationAlert(id,idEmployee,employeeName,total){
    
                              
      document.getElementById('hiddenIdProduct').value = id;
      document.getElementById('hiddentotale').value = total;
      document.getElementById('labelFrom').innerHTML = 'ID of Employee <strong>  '  + idEmployee+ '</strong> and his name is : <strong>   '  + employeeName+ '  </strong>';      
      document.getElementById('labelTo').innerHTML = "Pay totale of:  "  + total+ " SAR   ";
            
            
            
            };

</script>
<script>

(function($) {
  'use strict';

   var dataSet12 = [
    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            

   [ "<?php echo e($employee->idEmployee); ?>",
   "  <?php echo e($employee->user->email); ?>",  
   "<?php echo e($employee->type); ?>",
    "<?php echo e($employee->hWork); ?>", 
    "<?php echo e($employee->price_ph); ?>",
    "<?php echo e($employee->hWork * $employee->price_ph); ?>",
    "<?php if( $employee->charges()->exists() ): ?> <?php echo e($employee->charges()->latest()->first()->created_at); ?> <?php else: ?> <p style='color:red' > never get payed </p> <?php endif; ?>",
    "<button id='exNoForm' class='ms-btn-icon btn-success'  \
    onclick=\"changeTextOfLabelInCOnfermationAlert(<?php echo e($employee->id); ?>,'<?php echo e($employee->idEmployee); ?>','<?php echo e($employee->nameEmployee); ?>',<?php echo e($employee->hWork * $employee->price_ph); ?>)\" \
    type='button' data-toggle='modal' data-target='#exampleModal' data-whatever='@getbootstrap' > <i class='flaticon-tick-inside-circle' ></i></button>"],
   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  ];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "ID Employee" },
      { title: "Email" },

      { title: "Type" },
      { title: "Hour of Work" },
      { title: "Price per Hour" },
      { title: "Total to Pay" },
      { title: "Date last Pay" },
      { title: "Action" },



    ],
  });


 




})(jQuery);

</script>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/restaurant/employeeCharge.blade.php ENDPATH**/ ?>