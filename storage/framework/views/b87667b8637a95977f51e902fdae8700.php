<html>
<head>
    <title>Form</title>
</head>
<body>
    <form method="post" action="<?php echo e(route('process')); ?>">
    <?php echo csrf_field(); ?>
    <label for="batch">Select Batch:</label>
    
    <select name="batches" id = "b">
     <option value="" selected>select your batch:</option>
        <?php $__currentLoopData = $batches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option > <?php echo e($batch->batch_name); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
    </select>

    <input type="submit"></input>
</form>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\task_tables\resources\views/form.blade.php ENDPATH**/ ?>