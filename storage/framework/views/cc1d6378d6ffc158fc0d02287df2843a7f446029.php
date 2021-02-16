<?php $__env->startComponent('mail::message'); ?>
		
		<b>Name: </b> <?php echo e($data['name']); ?> <br>
		<b>Email:</b> <?php echo e($data['email']); ?> <br>
		<b>Countrycode: </b> <?php echo e($data['countrycode']); ?> <br>
		<b>Phone: </b> <?php echo e($data['phone']); ?> <br>
		<b>Subject: </b> <?php echo e($data['subject']); ?> <br>
		<b>Message: </b> <?php echo e($data['message']); ?> <br>

<?php $__env->startComponent('mail::button', ['url' => 'mailto:' .$data['email']]); ?>
Reply to <?php echo e($data['name']); ?>

<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\salma\faisal-center\resources\views/emails/contactMail.blade.php ENDPATH**/ ?>