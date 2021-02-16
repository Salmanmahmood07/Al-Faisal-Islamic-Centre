<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/azan/azan/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 05:47:43 GMT -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Azan – Islamic HTML Template</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<!-- Favicons -->
		<link rel="shortcut icon" href="<?php echo e(url('/frontend_asset')); ?>/images/favicon.ico">
		<link rel="apple-touch-icon" href="<?php echo e(url('/frontend_asset')); ?>/images/favicon.png">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

		<!-- Google font (font-family: 'Hind', sans-serif;) -->
		<link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo e(url('/frontend_asset')); ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo e(url('/frontend_asset')); ?>/css/plugins.css">
		<link rel="stylesheet" href="<?php echo e(url('/frontend_asset')); ?>/style.css">
		<link rel="stylesheet" href="<?php echo e(url('/frontend_asset')); ?>/css/screen.css">

		<!-- Cusom css -->
	   <link rel="stylesheet" href="<?php echo e(url('/frontend_asset')); ?>/css/custom.css">

		<!-- Modernizer js -->
		<script src="<?php echo e(url('/frontend_asset')); ?>/js/vendor/modernizr-3.5.0.min.js"></script>
		<script type="text/javascript" src="<?php echo e(url('/frontend_asset/js/jquery-1.11.3.min.js')); ?>"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
		<script src="<?php echo e(url('/admin_asset')); ?>/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

		

	</head>
	<body>
		<!--[if lte IE 9]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
		<![endif]-->

		<!-- Add your site or application content here -->
		<div class="fakeloader"></div>
		<div class="wrapper" id="wrapper" ng-app="timeCalc" ng-controller="CtrlTimeCalc as timeCalc">

      <?php echo $__env->yieldContent('header'); ?>
      <?php echo $__env->yieldContent('content'); ?>
			<?php echo $__env->yieldContent('modals'); ?>
      <?php echo $__env->yieldContent('footer'); ?>
    </div><!-- //Main wrapper -->





		<!-- JS Files -->
		<script src="<?php echo e(url('/frontend_asset')); ?>/js/vendor/jquery-3.2.1.min.js"></script>
		<script src="<?php echo e(url('/frontend_asset')); ?>/js/angular.min.js"></script>
		<script src="<?php echo e(url('/frontend_asset')); ?>/js/popper.min.js"></script>
		<script src="<?php echo e(url('/frontend_asset')); ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo e(url('/frontend_asset')); ?>/js/plugins.js"></script>
		<script src="<?php echo e(url('/frontend_asset')); ?>/js/salat-times.js"></script>
		<script src="<?php echo e(url('/frontend_asset')); ?>/js/active.js"></script>
		<script src="<?php echo e(url('/frontend_asset')); ?>/js/scripts.js"></script>
		<script src="<?php echo e(url('/admin_asset')); ?>/js/bootbox.min.js"></script>
		
		<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->

	 <?php echo $__env->yieldPushContent('scripts'); ?>
	</body>

<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/azan/azan/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 May 2019 05:48:34 GMT -->
</html>
<?php /**PATH C:\Users\salma\faisal-center\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>