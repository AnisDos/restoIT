




<?php $__env->startSection('content'); ?>
<?php echo e(App::setLocale(Session::get('locale'))); ?>



    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> <?php echo e(__('Home')); ?></a></li>
              <li class="breadcrumb-item"><a href="#"><?php echo e(__('Menu')); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Product')); ?></li>
            </ol>
          </nav>




       
   
     
         







        </div>



        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6><?php echo e(__('Add Meal Form')); ?></h6>
            </div>
            <div class="ms-panel-body">
              <form onsubmit="return submitForm();" id="ratinoupikamila" method="POST"  action="<?php echo e(url('restaurant/addMealForm')); ?>" enctype="multipart/form-data" class="needs-validation clearfix" novalidate>
                
              <?php echo csrf_field(); ?>
                <div class="form-row">



                            
         
    

                  <div class="col-md-12 mb-3">
                    <label for="validationCustom18"><?php echo e(__('Meal Name')); ?></label>
                    <div class="input-group">
                      <input id="validationCustom36" name="var[]" type="hidden" value="" />

                      <input type="text" name="mealName" value="<?php echo e(old('mealName')); ?>"  class="form-control <?php $__errorArgs = ['mealName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom18" placeholder="Meal Name" required >
                      <div class="valid-feedback">
                        <?php echo e(__('Looks good')); ?>!
                      </div>
                      <?php $__errorArgs = ['mealName'];
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
                    <label for="validationCustom22"><?php echo e(__('Select Catagory')); ?></label>
                    <div class="input-group">
                      <select class="form-control <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="category" id="validationCustom22" >
                 
                     <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            

                      <option value="<?php echo e($category->id); ?>"><?php echo e($category->categoryName); ?></option>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                      </select>
                      <div class="invalid-feedback">
                        <?php echo e(__('Please select a Catagory')); ?>.
                      </div>
                    </div>
                  </div>
          



                  <div class="col-md-12 mb-3">
                    <label for="validationCustom25"><?php echo e(__('Price')); ?></label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01" value="<?php echo e(old('price')); ?>"  class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="price" id="validationCustom25" placeholder="price" required>
                     
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
                    <label for="validationCustom25"><?php echo e(__('tax')); ?></label>
                    <div class="input-group">
                      <input type="number" min="0" step=".01" value="<?php echo e(old('tax')); ?>"  class="form-control <?php $__errorArgs = ['tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="tax" id="validationCustom25" placeholder="tax" required>
                     
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
                    <label for="validationCustom12"><?php echo e(__('Description')); ?></label>
                    <div class="input-group">
                      <textarea rows="5"  name="description" id="validationCustom12"   class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Message" required ><?php echo e(old('description')); ?></textarea>
                      <?php $__errorArgs = ['description'];
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
                    <label for="validationCustom12"><?php echo e(__('Meal Image')); ?></label>
                    <div class="custom-file">
                      <input type="file" name="image" value="<?php echo e(old('image')); ?>"  class="custom-file-input <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validatedCustomFile">
                      <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label>
                    
                      <?php $__errorArgs = ['image'];
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


       

                <div class="ms-panel-header new">
                  <button  class="btn btn-primary d-block" type="submit"><?php echo e(__('Add Meal')); ?></button>
                </div>



              </form>

            </div>
          </div>

        </div>

       









































































           <!-- Todo Widget -->
           <div class="col-xl-6 col-md-12 ms-deletable ms-todo-list">
            <div class="ms-card ms-widget ms-card-fh">
              <div class="ms-card-header clearfix">
                <h6 class="ms-card-title"><?php echo e(__('Ingredients Lists')); ?></h6>
          
      <button  onclick="addLine()" data-toggle="tooltip" data-placement="left" title="Add a Task to this block" class="ms-btn-icon float-right"> <i class="material-icons text-disabled"><?php echo e(__('add')); ?></i> </button>
             
             
              </div>
              <div class="ms-card-body">
                <ul id="uldin" class="ms-list ms-task-block">
             
                </ul>
              </div>
              <div class="ms-card-footer clearfix">
           
              </div>
            </div>
          </div>



















      </div>
    </div>


  
    <?php $__env->stopSection(); ?>



    



<?php $__env->startSection('script'); ?>

  <script>

    function submitForm(){

      
var formElements = new Array();
$("#uldin :input").not("#uldin :button").each(function(){
    formElements.push($(this).val());
});

var hidinput = document.getElementById('validationCustom36').value= formElements;

    }



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




div2.innerHTML = "<select class='form-control <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> ' name='category' id='validationCustom22' ><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value='<?php echo e($product->id); ?>'><?php echo e($product->productName); ?>  ========>  <?php echo e($product->unity); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>";


var div3 = document.createElement('div');
div3.classList.add("col-md-12");
div3.classList.add("mb-3");


div3.innerHTML = "  <label for='validationCustom25'>qnt</label><div class='input-group'><input type='number' value='<?php echo e(old('price')); ?>'  class='form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> ' name='price' id='validationCustom25' placeholder='quantity' required><?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class='invalid-feedback' role='alert'><strong><?php echo e($message); ?></strong></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>";



var button = document.createElement('button');
button.classList.add("close");
button.setAttribute('type', 'submit');


var i = document.createElement('i');
i.classList.add("flaticon-trash");
i.classList.add("ms-delete-trigger");


button.appendChild(i);



div1.appendChild(div2);

//hadi test ====================
var div4 = document.createElement('div');
div4.classList.add("col-md-12");
div4.classList.add("mb-3");
div4.appendChild(button);
//==============================
li.appendChild(div1);

li.appendChild(div3);


//hadi test ====================

li.appendChild(div4);

//==============================

//li.appendChild(button);


ul.appendChild(li);




}

  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('restaurant.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/restaurant/addMeal.blade.php ENDPATH**/ ?>