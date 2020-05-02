<!DOCTYPE html>
<html>
<head>
    <title>contact </title>
</head>
<body>
    <h1> <strong> from  </strong> <?php echo e($details['title']); ?></h1>
    <h1> <strong> email  </strong> <?php echo e($details['email']); ?></h1>
    
    <br>
    <p>Le msg</p>
    <p><?php echo e($details['body']); ?></p>
   
    <p>Thank you</p>
</body>
</html><?php /**PATH D:\laravelAnis\restoIT\resources\views/emails/sendmail.blade.php ENDPATH**/ ?>