




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



<!-- ========================================================================== -->


<form id="form_ex_send" method="POST" action="<?php echo e(url('/employee/stocks/addQntProduct')); ?>" >
    <?php echo csrf_field(); ?>


      
   
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel"></h4>
        </div>
        <div class="modal-body khta">
          <form>
            <div class="form-group">
              <label for="recipient-name" id="labelFrom"  class="control-label">:</label>
              <p id="labelTo" > </p>
              <input name="id_product" id="hiddenIdProduct" type="hidden" value="" >
              <input  type="number" name="qntToAdd"   class="form-control" id="recipient-name"
              <?php $__errorArgs = ['qntToAdd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('qntToAdd')); ?>">
              <?php $__errorArgs = ['qntToAdd'];
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
        
          </form>
       <strong>Future Quantity Of Product:   <p id="totalOldNew" > </p>    </strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
          <button type="submit" class="btn btn-primary"  id="regitEx" disabled="disabled" onclick="event.preventDefault();
          document.getElementById('form_ex_send').submit();"  > exchange now</button>







       
        </div>
      </div>
    </div>
  </div>       




  



</form>
<!-------------------------------------------------------------------->
<form id="form_ex_send_revoke" method="POST" action="<?php echo e(url('/employee/stocks/revokeQntProduct')); ?>" >
  <?php echo csrf_field(); ?>


    
 
<div class="modal fade" id="exampleModalRevoke" tabindex="-1" role="dialog" aria-labelledby="exampleModalRevokeLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalRevokeLabel"></h4>
      </div>
      <div class="modal-body khtaRevoke">
        <form>
          <div class="form-group">
            <label for="recipient-name-Revoke" id="labelFromRevoke"  class="control-label">:</label>
            <p id="labelToRevoke" > </p>
            <input name="id_product" id="hiddenIdProductRevoke" type="hidden" value="" >
            <input  type="number" name="qntToAdd"   class="form-control" id="recipient-name-Revoke"
            <?php $__errorArgs = ['qntToAdd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('qntToAdd')); ?>">
            <?php $__errorArgs = ['qntToAdd'];
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
      
        </form>
     <strong>Future Quantity Of Product after revoke:   <p id="totalOldNewRevoke" > </p>    </strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary"  id="regitExRevoke" disabled="disabled" onclick="event.preventDefault();
        document.getElementById('form_ex_send_revoke').submit();"  > exchange now</button>







     
      </div>
    </div>
  </div>
</div>       








</form>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<form id="form_ex_send_Delete" method="POST" action="<?php echo e(url('/employee/stocks/DeleteVersionProduct')); ?>" >
  <?php echo csrf_field(); ?>


    
 
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalDeleteLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalDeleteLabel"></h4>
      </div>
      <div class="modal-body khtaDelete">
        <form>
          <div class="form-group">
            <label for="recipient-name-Delete" id="labelFromDelete"  class="control-label">
              <strong>why you want to delete this version of product:   <p id="totalOldNewDelete"  > </p>    </strong></label>
            <p id="labelToDelete" > </p>
            <input name="id_product" id="hiddenIdProductDelete" type="hidden" value="" >
            <input  type="text" name="textDelete"   class="form-control" id="recipient-name-Delete"
            <?php $__errorArgs = ['textDelete'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('textDelete')); ?>">
            <?php $__errorArgs = ['textDelete'];
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
      
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary"  id="regitExDelete" disabled="disabled" onclick="event.preventDefault();
        document.getElementById('form_ex_send_Delete').submit();"  > exchange now</button>







     
      </div>
    </div>
  </div>
</div>       








</form>
<!--==============================================================================-->

  

        </div>

      </div>
    </div>
  
  
<?php $__env->stopSection(); ?>




<?php $__env->startSection('script'); ?>

<script>


      function changeTextOfLabelInCOnfermationAlert(id_product,name,qnt,unity){
      
                              
        document.getElementById('hiddenIdProduct').value = id_product;
        document.getElementById('labelFrom').innerHTML = 'add Quantity to<strong>  '  + name+ '</strong>';      
        document.getElementById('labelTo').innerHTML = "Old Quantity in stock is<strong>  <input id='idOldQntt' value='"  + qnt + " ' placeholder='"  + qnt + " 'readonly/>" + unity+ "</strong>";
              
              
              
              };

              function changeTextOfLabelInCOnfermationAlertrevoke(id_product,name,qnt,unity){
      
                              
      document.getElementById('hiddenIdProductRevoke').value = id_product;
      document.getElementById('labelFromRevoke').innerHTML = 'Revoke Quantity from<strong>  '  + name+ '</strong>';      
      document.getElementById('labelToRevoke').innerHTML = "Old Quantity in stock is<strong>  <input id='idOldQnttRevoke' value='"  + qnt + " ' placeholder='"  + qnt + " 'readonly/>" + unity+ "</strong>";
            
            
            
            };


            function deleteProduct(id_product,name){
      
                              
      document.getElementById('hiddenIdProductDelete').value = id_product;
      document.getElementById('labelToDelete').innerHTML = name;
            
        
            
            
            };

              //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(document).ready(function() {
  $('.khta input').on('keyup', function() {
    let empty = false;

    $('.khta input').each(function() {
      
      if ($(this).val() == '') {
        empty = true;
    }
    });
    
    if (empty){
    document.getElementById('totalOldNew').innerHTML = "";
      $('#regitEx').attr('disabled', 'disabled');}
    else{
    $old = document.getElementById('idOldQntt').value;
    $new = document.getElementById('recipient-name').value;
    $total = +$old + +$new;
    document.getElementById('totalOldNew').innerHTML = $total  ;
      $('#regitEx').attr('disabled', false);}
  });
});


$(document).ready(function() {
  $('.khtaRevoke input').on('keyup', function() {
    let empty = false;

    $('.khtaRevoke input').each(function() {
      
      if ($(this).val() == '') {
        empty = true;
    }
    });
    
    if (empty){
    document.getElementById('totalOldNewRevoke').innerHTML = "";
      $('#regitExRevoke').attr('disabled', 'disabled');}
    else{
    $old = document.getElementById('idOldQnttRevoke').value;
    $new = document.getElementById('recipient-name-Revoke').value;
    $total = +$old - +$new;
    document.getElementById('totalOldNewRevoke').innerHTML = $total  ;
      $('#regitExRevoke').attr('disabled', false);}
  });
});



$(document).ready(function() {
  $('.khtaDelete input').on('keyup', function() {
    let empty = false;

    $('.khtaDelete input').each(function() {
      
      if ($(this).val() == '') {
        empty = true;
    }
    });
    
    if (empty){
      $('#regitExDelete').attr('disabled', 'disabled');}
    else{
      $('#regitExDelete').attr('disabled', false);}
  });
});



//--------------------------------------------------------------------------

(function($) {
  'use strict';

   var dataSet12 = [
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($product->id == ""): ?> 
             
                 <?php else: ?> 

                 [ "<?php echo e($product->id); ?>"," <?php echo e($product->productName); ?>",  " <?php echo e($product->updated_at); ?>", "<?php echo e($product->date_experation); ?>", "<?php if($product->date_experation_bool): ?><?php if($product->date_experation < Carbon::now()): ?> - <?php endif; ?><?php echo e((Carbon::parse($product->date_experation))->diffInDays(Carbon::now())); ?>  <?php else: ?> no limite <?php endif; ?>" ,"<?php echo e($product->qntSTK); ?> <?php echo e($product->unity); ?>","<button id='exNoForm' class='ms-btn-icon btn-success'  onclick=\"changeTextOfLabelInCOnfermationAlert(<?php echo e($product->id); ?>,'<?php echo e($product->productName); ?>',<?php echo e($product->qntSTK); ?>,'<?php echo e($product->unity); ?>')\" type='button' data-toggle='modal' data-target='#exampleModal' data-whatever='@getbootstrap' > <i class='flaticon-tick-inside-circle' ></i></button>","<button id='exNoForm' class='ms-btn-icon btn-warning'  onclick=\"changeTextOfLabelInCOnfermationAlertrevoke(<?php echo e($product->id); ?>,'<?php echo e($product->productName); ?>',<?php echo e($product->qntSTK); ?>,'<?php echo e($product->unity); ?>')\" type='button' data-toggle='modal' data-target='#exampleModalRevoke' data-whatever='@getbootstrap' ><i class='flaticon-alert'></i></button>","<button id='exNoForm' class='ms-btn-icon btn-danger'  onclick=\"deleteProduct(<?php echo e($product->id); ?>,'<?php echo e($product->productName); ?>')\" type='button' data-toggle='modal' data-target='#exampleModalDelete' data-whatever='@getbootstrap' ><i class='flaticon-alert-1'></i></button>"],
   
               
                    
                <?php endif; ?>       
            
  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 ];









  var tableFour = $('#data-table-123').DataTable( {
    data: dataSet12,
    columns: [
      { title: "Codebare" },
      { title: "Product Name" },

      { title: "Date Last Update" },
      { title: "Date Experation" },
      { title: "Day left" },
      { title: "Quantity" },
      { title: "Add" },
      { title: "Revoke" },
      { title: "Delete" },


    ],
  });


 




})(jQuery);

</script>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('employee.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/employee/UpdateQnttToProduct.blade.php ENDPATH**/ ?>