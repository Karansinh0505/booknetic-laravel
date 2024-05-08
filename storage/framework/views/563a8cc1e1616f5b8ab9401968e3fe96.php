<?php $__env->startSection('title', 'Customers'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(route('/')); ?>/assets/css/datatables.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(route('/')); ?>/assets/css/datatable-extension.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
	<h2>Customers<span></span></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
	<!-- <li class="breadcrumb-item">Tables</li>
	<li class="breadcrumb-item">Extension Data Tables</li> -->
	<li class="breadcrumb-item active">Customers</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                     <h5>Customers</h5>
                    </div>
                    <div class="col-2">
                         <!-- Large modal-->
                       <button class="btn btn-primary" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">Add Customers</button>
                       <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                             <div class="modal-content">
                                <div class="modal-header">
                                   <h4 class="modal-title" id="myLargeModalLabel">Add Customers</h4>
                                   <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                        <form class="form theme-form">
                                           <div class="card-body">
                                               
                                               <div class="row">
                                                 <div class="col">
                                                    <div class="form-group">
                                                       <label for="exampleFormControlInput5">First Name</label>
                                                       <input class="form-control btn-pill" id="exampleFormControlInput5" type="text" placeholder="Enter First Name">
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="row">
                                                 <div class="col">
                                                    <div class="form-group">
                                                       <label for="exampleFormControlInput5">Last Name</label>
                                                       <input class="form-control btn-pill" id="exampleFormControlInput5" type="text" placeholder="Enter Last Name">
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="row">
                                                 <div class="col">
                                                    <div class="form-group">
                                                       <label for="exampleFormControlInput5">Phone</label>
                                                       <input class="form-control btn-pill digits" id="exampleFormControlInput5" type="tel" placeholder="Enter Phone">
                                                    </div>
                                                 </div>
                                              </div>
                                              
                                              <div class="row">
                                                 <div class="col">
                                                    <div class="form-group">
                                                       <label for="exampleFormControlSelect7">Gender</label>
                                                       <select class="form-control btn-pill digits" id="exampleFormControlSelect7">
                                                          <option>Female</option>
                                                          <option>Male</option>
                                                       </select>
                                                    </div>
                                                 </div>
                                              </div>
                                              
                                              <div class="row">
                                                 <div class="col">
                                                    <div class="form-group">
                                                       <label for="exampleFormControlInput5">Birthdate</label>
                                                       <input class="form-control btn-pill digits" id="exampleFormControlInput5" type="date" placeholder="Enter Phone">
                                                    </div>
                                                 </div>
                                              </div>
                                              
                                              <div class="row">
                                                 <div class="col">
                                                    <div class="form-group">
                                                       <label for="exampleFormControlInput5">Email address</label>
                                                       <input class="form-control btn-pill" id="exampleFormControlInput5" type="email" placeholder="name@example.com">
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="row">
                                                 <div class="col">
                                                    <div class="form-group">
                                                       <label for="exampleInputPassword6">Password</label>
                                                       <input class="form-control btn-pill" id="exampleInputPassword6" type="password" placeholder="Password">
                                                    </div>
                                                 </div>
                                              </div>
                                              <!--<div class="row">-->
                                              <!--   <div class="col">-->
                                              <!--      <div class="form-group">-->
                                              <!--         <label for="exampleFormControlSelect8">Example multiple select</label>-->
                                              <!--         <select class="form-control btn-pill p-l-45 digits" id="exampleFormControlSelect8" multiple="">-->
                                              <!--            <option>1</option>-->
                                              <!--            <option>2</option>-->
                                              <!--            <option>3</option>-->
                                              <!--            <option>4</option>-->
                                              <!--            <option>5</option>-->
                                              <!--         </select>-->
                                              <!--      </div>-->
                                              <!--   </div>-->
                                              <!--</div>-->
                                              <!--<div class="row">-->
                                              <!--   <div class="col">-->
                                              <!--      <div class="form-group">-->
                                              <!--         <label for="exampleFormControlTextarea9">Example textarea</label>-->
                                              <!--         <textarea class="form-control btn-pill" id="exampleFormControlTextarea9" rows="3"></textarea>-->
                                              <!--      </div>-->
                                              <!--   </div>-->
                                              <!--</div>-->
                                           </div>
                                           <div class="card-footer">
                                              <button class="btn btn-pill btn-primary" type="submit">Submit</button>
                                              <input class="btn btn-pill btn-light" type="reset" value="Cancel">
                                           </div>
                                        </form>
                                </div>
                             </div>
                          </div>
                       </div>
                       
                    </div>
                </div>
            </div>

            <div class="card-body">
               <div class="dt-ext table-responsive">
                  <table class="display" id="responsive">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Position</th>
                           <th>Office</th>
                           <th>Age</th>
                           <th>Start date</th>
                           <th>Salary</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Tiger Nixon</td>
                           <td>System Architect</td>
                           <td>Edinburgh</td>
                           <td>61</td>
                           <td>2011/04/25</td>
                           <td>$320,800</td>
                           <td>Edit</td>
                        </tr>
                        <tr>
                           <td>Garrett Winters</td>
                           <td>Accountant</td>
                           <td>Tokyo</td>
                           <td>63</td>
                           <td>2011/07/25</td>
                           <td>$170,750</td>
                           <td>Edit</td>
                        </tr>
                        
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>Name</th>
                           <th>Position</th>
                           <th>Office</th>
                           <th>Age</th>
                           <th>Start date</th>
                           <th>Salary</th>
                           <th>Actions</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/dataTables.buttons.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/jszip.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/buttons.colVis.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/pdfmake.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/vfs_fonts.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/dataTables.select.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/buttons.html5.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/buttons.print.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/dataTables.responsive.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/dataTables.scroller.min.js"></script>
<script src="<?php echo e(route('/')); ?>/assets/js/datatable/datatable-extension/custom.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.light.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/webdev/Desktop/pc/client_data/XS_ryan/laravel-version/booknetic/resources/views/customers/index.blade.php ENDPATH**/ ?>