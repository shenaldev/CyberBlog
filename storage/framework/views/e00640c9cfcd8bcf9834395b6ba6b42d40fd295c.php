
<div class="dialog-box">
    <div class="dialog-box-inner">
        <div class="dialog-header">

        </div>
        <div class="dialog-body">

        </div>
        <div class="dialog-footer">
            <button class="btn btn-info" id="dialog-close">Close</button>
        </div>
    </div>
</div>

<footer>

    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>


    <?php if(Session::has('success')): ?>
        <script>
            toastr.success(' <?php echo e(Session::get('success')); ?> ');
            toastr.options.showMethod = 'slideDown';
        </script>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            toastr.error(' <?php echo e(Session::get('error')); ?> ');
            toastr.options.showMethod = 'slideDown';
        </script>
    <?php endif; ?>
</footer>
<?php /**PATH D:\wamp64\www\Laravel\cyber\resources\views/admin/inc/footer.blade.php ENDPATH**/ ?>