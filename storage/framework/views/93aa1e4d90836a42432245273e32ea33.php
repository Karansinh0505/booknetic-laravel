<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Booknetic">
      <meta name="keywords" content="Booknetic">
      <meta name="author" content="pixelstrap">
      <link rel="icon" href="<?php echo e(asset('assets/images/logo/logo-sm.svg')); ?>" type="image/x-icon">
      <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo/logo-sm.svg')); ?>" type="image/x-icon">
      <title>Booknetic - <?php echo $__env->yieldContent('title'); ?></title>
      <?php echo $__env->make('layouts.app.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->yieldContent('style'); ?>
   </head>
   <body>
      <div class="page-wrapper">
           <?php echo $__env->yieldContent('content'); ?>
      </div>
      <?php echo $__env->make('layouts.app.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </body>
</html>
<?php /**PATH D:\laragon-6.0.0\www\laravel_booknetic\resources\views/layouts/app/master.blade.php ENDPATH**/ ?>