




<?php $__env->startSection('content'); ?>
<?php echo e(App::setLocale(Session::get('locale'))); ?>






    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Meal Detail</li>
            </ol>
          </nav>
        </div>
         <div class="col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Meal Details</h6>
            </div>
            <div class="ms-panel-body">

              <div id="arrowSlider" class="ms-arrow-slider carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" style="height: 400px;" src="/storage/<?php echo e($meal->image); ?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h3 class="text-white"><?php echo e($meal->mealName); ?> img </h3>
                    </div>
                  </div>
                
                </div>
              
              </div>
            </div>
          </div>
        </div>


<div class=" col-md-6">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-body">
              <h4 class="section-title bold">Meal Info</h4>
              <table class="table ms-profile-information">
                <tbody>

                  <tr>
                    <th scope="row">Price</th>
                    <td><?php echo e($meal->price); ?> SAR </td>
                  </tr>
                  <tr>
                    <th scope="row">Product Category</th>
                    <td><?php echo e($meal->category->categoryName); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Public</th>
                 <td><span class="badge badge-pill badge-primary"><?php if($meal->public ): ?> active <?php else: ?> deactive <?php endif; ?></span></td>
                  </tr>
                  <tr>
                    <th scope="row">Delivery Charges</th>
                    <td>Free</td>
                  </tr>

                  <tr>
                    <th scope="row">SKU Identification</th>
                    <td>23445</td>
                  </tr>

                </tbody>
              </table>
              <div class="new">
                <a href="/restaurant/updateMeal/<?php echo e($meal->id); ?>" class="btn btn-primary">Edit</a>


                <?php if($meal->public ): ?>
                <form method="POST" action="/restaurant/deactivateMeal" >
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="meal_id" value="<?php echo e($meal->id); ?>" >
                  <button type="submit" class="btn btn-secondary">Deactivate</button>
                </form>
             
               
                 <?php else: ?> 
                 <form method="POST" action="/restaurant/activateMeal" >
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="meal_id" value="<?php echo e($meal->id); ?>" >
                  <button type="submit" class="btn btn-success">Activate</button>
                </form>
             
                 <?php endif; ?>
           



              </div>

            </div>
          </div>
        </div>

        <div class=" col-md-6">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-body">

              <h4 class="section-title bold">Meal Details </h4>
              <p class="description"><?php echo e($meal->description); ?>.</p>


            </div>
            <div class="ms-quick-stats">
                <div class="ms-stats-grid">
                  <i class="fa fa-bullhorn"></i>
                <p class="ms-text-dark"><?php echo e($totalOrders); ?></p>
                  <span>Today Order</span>
                </div>
                <div class="ms-stats-grid">
                  <i class="fa fa-heart"></i>
                  <p class="ms-text-dark">3,039</p>
                  <span>Favourite</span>
                </div>
              </div>
          </div>
        </div>




      </div>
    </div>

  
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/restaurant/mealDetails.blade.php ENDPATH**/ ?>