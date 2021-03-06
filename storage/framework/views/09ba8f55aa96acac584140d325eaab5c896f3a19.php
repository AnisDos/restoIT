




<?php $__env->startSection('content'); ?>


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
    
        </div>

<!-- ======================================================Todo Widget========================================================== -->
<div class="col-xl-12 col-md-12 ms-deletable ms-todo-list">
  <div class="ms-card ms-widget ms-card-fh">
    <div class="ms-card-header clearfix">
      <h6 class="ms-card-title">Ingredients Lists</h6>

<button  onclick="addLine()" data-toggle="tooltip" data-placement="left" title="Add a Task to this block" class="ms-btn-icon float-right"> <i class="material-icons text-disabled">add</i> </button>
   
<div class="form-row">
    </div>
    <div class="ms-card-body">
      <ul id="uldin" class="ms-list ms-task-block lisenonchangehere">
   


   
      </ul>
    </div>
    <div class="ms-card-footer clearfix">
      <a href="#" class="text-disabled mr-2"> <i class="flaticon-archive"> </i> Archive </a>
      <a href="#" class="text-disabled ms-delete-trigger float-right"> <i class="flaticon-trash"> </i> Delete </a>
    </div>
  </div>
</div>

<!-- ======================================================Todo Widget========================================================== -->


          </div>





        <div class="col-xl-6 col-md-12">
            <div class="ms-panel">
                <div class="ms-card-header clearfix">
                    <h6 class="ms-card-title">Products List</h6>
        
                  </div>
                <div class="ms-panel-body">
                  <div class="table-responsive">
                    <table id="data-table-123" class="table w-100 thead-primary"></table>
                  </div>
                </div>
    
                
              </div>
          </div>



























<!--===========================================================================================================-->



           <!-- Todo Widget -->
           <div class="col-xl-6 col-md-12 ms-deletable ms-todo-list">
            <div class="ms-card ms-widget ms-card-fh">
              <div class="ms-card-header clearfix">
                <h6 class="ms-card-title">Ingredients Lists</h6>
     
             
              </div>

              <div class="ms-panel-body">
                <form method="POST" onsubmit="return submitForm();"   action="<?php echo e(url('superadmin/generatekeyform')); ?>"  class="needs-validation clearfix" novalidate>
                  
                <?php echo csrf_field(); ?>
                  <div class="form-row">
  
  
  
                              
           
      
  
                    <div class="col-md-12 mb-3">
                   <input id="hiddenInputForm1" type="hidden" name="id_restaurant" value="" >    
                <input id="validationCustom36" name="var[]" type="hidden" value="" />
                   
                    </div>
  
     
      
  
              


  
                    <div class="col-md-12 mb-3">
                      <label  for="validationCustom25">Restaurant Name</label>
                      <div class="input-group">
                        <input type="text" value="" readonly class="form-control"  id="inputrestaurantname" placeholder="Restaurant Name" >
                       
                      
                      </div>
                    </div>
  
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom25">Address</label>
                        <div class="input-group">
                          <input type="text" value="" readonly class="form-control"  id="inputAddress23" placeholder="Address" >
                         
                        
                        </div>
                      </div>
  
  
                      <div class="col-md-12 mb-3">
                        <label for="validationCustom25">Email</label>
                        <div class="input-group">
                          <input type="text" value="" readonly class="form-control"  id="inputemail965" placeholder="Email" >
                         
                        
                        </div>
                      </div>

                 

                      <div class="col-md-12 mb-3">
                        <label for="validationCustom25">PriceKey</label>
                        <div class="input-group">
                          <input type="number" name="priceKey" value="<?php echo e(old('priceKey')); ?>" required  class="form-control <?php $__errorArgs = ['caisseName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="inputemail965" placeholder="priceKey" >
                         
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                          <?php $__errorArgs = ['priceKey'];
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
                        <label for="validationCustom25">type</label>
                      <div class="input-group">
                        <select class="form-control" name="typeAb"  id="validationCustom22" >
            <option value="3"   >3 months</option>
            <option value="6"   >6 months</option>
            <option value="1"   >1 year</option>
                              
  
                        </select>
  
                      </div>
                  
  
                    </div>
                  
  
  
  
  
  
  
              
                  </div>
  
  
  
                  <div class="ms-panel-header new">
                    <button id="kamalyakolfermadj" class="btn btn-primary d-block" disabled="disabled" type="submit">Add an Genrate Key</button>
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

    //on submit form put privileges in input var[]
    function submitForm(){
  
        
  var formElements = new Array();
  $("#uldin :input").not("#uldin :button").each(function(){
      formElements.push($(this).val());
  });
  
  var hidinput = document.getElementById('validationCustom36').value= formElements;
  
      }

      //---------------------------------------------------------------------------------------------------
      $('.lisenonchangehere').on('contentChanged',function(){
        console.log('rrrrrrrrrrrrrrrrrr');
        if ($('ul#uldin li').length < 1 ) {
 
 $('#kamalyakolfermadj').attr('disabled','disabled');
} else {

$('#kamalyakolfermadj').attr('disabled',false);	
}
        });

//------------------------------------------------------------------------------------------------------
function addLine() {
  
  var ul = document.getElementById('uldin');
  
   
  var li = document.createElement('li');
  li.classList.add("ms-list-item");
  li.classList.add("ms-to-do-task");
  li.classList.add("ms-deletable");
  
  
  
  var div1 = document.createElement('div');
  div1.classList.add("col-md-12");
  div1.classList.add("mb-3");
  
  
  
  var div2 = document.createElement('div');
  div2.classList.add("input-group");
  
  
  
  
  div2.innerHTML = "<select class='form-control'  id='validationCustom22' >\
                 <?php $__currentLoopData = $allprivileges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allprivilege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
               <option value='<?php echo e($allprivilege->id); ?>'><?php echo e($allprivilege->privilegeName); ?></option>\
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                 </select>";
  
  
  var button = document.createElement('button');
  button.classList.add("close");
  button.setAttribute('type', 'submit');
  
  
  var i = document.createElement('i');
  i.classList.add("flaticon-trash");
  i.classList.add("ms-delete-trigger");
  
  
  button.appendChild(i);
  
  
  
  div1.appendChild(div2);
  
  var div4 = document.createElement('div');
  div4.classList.add("col-md-12");
  div4.classList.add("mb-3");
  div4.appendChild(button);
  li.appendChild(div1);
  
  
 
  li.appendChild(div4);
  
 
  
  ul.appendChild(li);
  
  //-----------------------------------
  if ($('ul#uldin li').length < 1 ) {
 console.log('hgkjk');
 $('#kamalyakolfermadj').attr('disabled','disabled');
} else {

$('#kamalyakolfermadj').attr('disabled',false);	
}
  
  //-----------------------------------
  }
//---------------------------------------------------------------------------------------------------

//buttun add key to restaurent disable and enabel on change on input key 
/* $("#validationCustom1889889").on('keyup',function(){
console.log('hhhhhhhhhhh');
  if ($(this).val() == '') {
    console.log('iiiiiiiiiiiiiii');
     $('#buttondalotedjri').attr('disabled','disabled');
  } else {
    console.log('sssssssssssss');
	$('#buttondalotedjri').attr('disabled',false);	
  }
}); */
//---------------------------------------------------------------------------------------------------





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

    
//-------------------------------------------------------------------------------------------------------




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
    
//----------------------------------------------------------------------------------------------------
        function changeProductNameHiddenValueInForm(id,productName,address,email) {
            

            

var nn =document.getElementById('hiddenInputForm1');
var nn1 =document.getElementById('inputrestaurantname');    
var nn2 =document.getElementById('inputAddress23');
var nn3 =document.getElementById('inputemail965');

nn.value = id ;
nn1.value = productName ;
nn2.value = address ;
nn3.value = email ;

          
      
      
        }
      
      
      
//----------------------------------------------------------------------------------------------------
      
        
        </script>

 <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
 <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
 <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->       
    <script>
    
    (function($) {
      'use strict';
    
       var dataSet12 = [
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
    
       [ "  <?php echo e($user->name); ?>", " <?php echo e($user->address); ?>",  " <?php echo e($user->email); ?>", "<button class='ms-btn-icon btn-danger'  onclick=\"changeProductNameHiddenValueInForm(<?php echo e($user->id); ?>,'<?php echo e($user->name); ?>','<?php echo e($user->address); ?>','<?php echo e($user->email); ?>')\" type='button'  ><i class='flaticon-alert-1'></i></button>"],
       
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ];
    
    
    
    
    
    
    
    
    
      var tableFour = $('#data-table-123').DataTable( {
        data: dataSet12,
        columns: [
         
          { title: "Restaurant Name" },
    
          { title: "Address" },
          { title: "email" },
          { title: "Action" },
     
    
        ],
      });
    
    
     
    
    
    
    
    })(jQuery);
    
    </script>
    
      
    <?php $__env->stopSection(); ?>
    
  
<?php echo $__env->make('superadmin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/superAdmin/generatekey.blade.php ENDPATH**/ ?>