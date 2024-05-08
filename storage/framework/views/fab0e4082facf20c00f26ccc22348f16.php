<?php $__env->startSection('title', 'Staff'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(route('/')); ?>/assets/css/prism.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(route('/')); ?>/assets/css/select2.css">
<style>
    .btn-gray {
        background-color: #6c757d !important;
        color: white !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
	<h2>Staff<span></span></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
	<!--<li class="breadcrumb-item">Perk UI</li>-->
 <!--   <li class="breadcrumb-item">Cards</li>	-->
	<li class="breadcrumb-item active">Staff</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 col-xl-12">
         <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-7 col-lg-5">
                        <h5>Staff</h5>
                    </div>
                    <div class="col-md-5 d-flex col-lg-6 col-sm-3">
                        <button class="btn btn-info active" type="button">Add</button>
                       <button class="btn btn-secondary active" type="button">Delete</button>
                       <button class="btn btn-gray active" type="button">Hide</button>
                       <button class="btn btn- active" type="button">Cancel</button>
                       <button class="btn btn-primary active" type="button">Save</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
               <div class="mb-2">
                    <div class="row mb-4">
                        <div class="col-md-5 col-lg-6">

                        </div>
                        <div class="col-md-7 col-lg-6">
                            <!--<div class="card">-->
                            <!--    <div class="card-body">-->
                                   <ul class="nav nav-pills nav-primary" id="pills-successtab" role="tablist">
                                      <li class="nav-item"><a class="nav-link active" id="pills-successhome-tab" data-toggle="pill" href="#pills-successhome" role="tab" aria-controls="pills-successhome" aria-selected="true">Permissions</a></li>
                                      <li class="nav-item"><a class="nav-link" id="pills-successprofile-tab" data-toggle="pill" href="#pills-successprofile" role="tab" aria-controls="pills-successprofile" aria-selected="false">Wage Report</a></li>
                                      <li class="nav-item"><a class="nav-link" id="pills-successcontact-tab" data-toggle="pill" href="#pills-successcontact" role="tab" aria-controls="pills-successcontact" aria-selected="false">Wage History</a></li>
                                   </ul>
                             <!--   </div>-->
                             <!--</div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect7">Name</label>
                                   <select class="form-control btn-pill" id="exampleFormControlSelect7">
                                      <option>user</option>
                                      <option>demo</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                   </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlInput5">Email address</label>
                                <input class="form-control btn-pill" id="exampleFormControlInput5" type="email" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlInput5">Phone</label>
                                <input class="form-control btn-pill digits" id="exampleFormControlInput5" type="tel" placeholder="+91 7567429763">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlInput5">Position</label>
                                <input class="form-control btn-pill" id="exampleFormControlInput5" type="text" placeholder="Position">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                    <label for="exampleFormControlSelect7">Location</label>
                                    <select class="form-control btn-pill" id="exampleFormControlSelect7">
                                      <option value="AL">Philipines</option>
                                      <option value="WY">China</option>
                                      <option value="WY">India</option>
                                    </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="exampleFormControlSelect7">Category</label>
                                <select class="form-control btn-pill" id="exampleFormControlSelect7">
                                    <option value="violin">Violin</option>
                                    <option value="WY">guitar</option>
                                    <option value="WY">Drum</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                             <div class="form-group">
                                <label for="exampleFormControlSelect7">Services</label>
                                <select class="form-control btn-pill" id="exampleFormControlSelect7">
                                    <option value="violin">Violin 101</option>
                                    <option value="guitar">Guitar 101</option>
                                    <option value="drum">Drum 101</option>
                                </select>
                             </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlInput5">Wage Rate</label>
                                <input class="form-control btn-pill digits" id="exampleFormControlInput5" type="number" placeholder="Number">
                            </div>
                        </div>

                        <div class="col-3">
                             <div class="form-group">
                                <label for="exampleFormControlSelect7">Per</label>
                                <select class="form-control btn-pill" id="exampleFormControlSelect7">
                                    <option value="hour">Hour</option>
                                   <option value="lesson">Lesson</option>
                                   <option value="week">Week</option>
                                   <option value="month">Month</option>
                                </select>
                             </div>
                        </div>

                    </div>
                 </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(route('/')); ?>/assets/js/prism/prism.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/clipboard/clipboard.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/custom-card/custom-card.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/height-equal.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/select2/select2.full.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/select2/select2-custom.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.light.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\mysymphony-laravel-master\resources\views/staff/index.blade.php ENDPATH**/ ?>