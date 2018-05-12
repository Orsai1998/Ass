
<?php $__env->startSection('title'); ?>
<?php $__env->startSection('header'); ?>
##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
##parent-placeholder-19bd1503d9bad449304cc6b4e977b74bac6cc771##
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-lg-12">
       <div class="card">
          <div class="card-body">
             <h4 class="card-title">Our employees</h4>
                <div class="col-xs-8 col-xs-offset-2">
                 <div class="input-group">
                  <form class="form-inline" action="<?php echo e(action('MainController@employees')); ?>">
                   <label class="sr-only" for="inlineFormInput">Name</label>
                   <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="name_e" id="inlineFormInput" placeholder="Enter name of employee">
                   <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="name_l" id="inlineFormInput" placeholder="Enter last name of employee">
                   <label class="sr-only" for="inlineFormInputGroup">Departments</label>
                   <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <select  class="custom-select mb-2 mr-sm-2 mb-sm-0" name="departments" id="">
                     <option value="">Select departments</option>
                     <?php $__currentLoopData = $dept; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($key->dept_no); ?>"><?php echo e($key->dept_name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                   </div> 
                   <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
             </div>
            <?php echo $__env->make('info-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
   </div>                  
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>