<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themedesigner.in/demo/admin-press/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 09:26:18 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('/admin_asset')); ?>/images/favicon.png">
    <title>Online Portal</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(url('/admin_asset')); ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo e(url('/admin_asset')); ?>/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(url('/admin_asset')); ?>/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo e(url('/admin_asset')); ?>/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- <link href="<?php echo e(url('/admin_asset')); ?>/css/summernote.css" id="theme" rel="stylesheet"> -->

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
<!-- <script type="text/javascript" src="<?php echo e(url('/admin_asset/js/jquery-1.11.3.min.js')); ?>"></script> -->
   <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <?php echo $__env->yieldContent('header'); ?>
        <div class="page-wrapper">
       <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(url('/admin_asset')); ?>/plugins/jquery/jquery.min.js"></script>


    <!-- <script src="<?php echo e(url('/admin_asset')); ?>/plugins/jquery/jquery-1.11.3.min.js"></script> -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(url('/admin_asset')); ?>/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo e(url('/admin_asset')); ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(url('/admin_asset')); ?>/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(url('/admin_asset')); ?>/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(url('/admin_asset')); ?>/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo e(url('/admin_asset')); ?>/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(url('/admin_asset')); ?>/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="<?php echo e(url('/admin_asset')); ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="<?php echo e(url('/admin_asset')); ?>/plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo e(url('/admin_asset')); ?>/plugins/morrisjs/morris.min.js"></script>
    <!-- Chart JS -->
    <script src="<?php echo e(url('/admin_asset')); ?>/js/dashboard1.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo e(url('/admin_asset')); ?>/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- <script src="<?php echo e(url('/admin_asset')); ?>/js/ckeditor.js"></script> -->
    <script src="<?php echo e(url('/admin_asset')); ?>/js/summernote.js"></script>
    <script src="<?php echo e(url('/admin_asset')); ?>/js/bootbox.min.js"></script>
    
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    


    <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script> -->
</body>


<!-- Mirrored from themedesigner.in/demo/admin-press/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 09:30:23 GMT -->
</html>
<?php /**PATH C:\Users\salma\faisal-center\resources\views/admin/masterpage.blade.php ENDPATH**/ ?>