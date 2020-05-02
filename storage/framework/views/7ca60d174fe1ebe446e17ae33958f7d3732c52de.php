<?php if(Auth::guard('web')->check()): ?>

<p style="color:green;">
    your are logged in as User
</p>

<?php else: ?>
<p style="color:red;">
    your are logged out  as User
</p>

<?php endif; ?>


<?php if(Auth::guard('employee')->check()): ?>

<p style="color:green;">
    your are logged in as employee
</p>

<?php else: ?>
<p style="color:red;">
    your are logged out  as employee
</p>

<?php endif; ?><?php /**PATH D:\laravelAnis\restoIT\resources\views/components/who.blade.php ENDPATH**/ ?>