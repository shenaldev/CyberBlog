<?php $__env->startSection('content'); ?>

<div class="row dashboard-page">
    <div class="col">

        <div class="row">
            <div class="col welcome-col">
                <h1>Welcome To Dashboard <?php echo e($admin->username); ?></h1>
            </div>
        </div>

        <div class="row dashboard-cards-row">

            <div class="col-lg-3 col-md-6 col-sm-12 dashboard-card">
                <div class="card-inner">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 46 45"><ellipse cx="23" cy="22.5" rx="23" ry="22.5" fill="#e5e4ff"/><g transform="translate(8.75 6.5)"><path d="M26.357,4.5H11.179a.935.935,0,0,0-.893.948v1.81H4.594A2.386,2.386,0,0,0,2.25,9.67V21.59a4.911,4.911,0,0,0,4.8,4.969H22.657a4.672,4.672,0,0,0,4.593-4.71V5.419A.909.909,0,0,0,26.357,4.5ZM10.286,9.1V20.125H7.942V10.2a2.879,2.879,0,0,0-.184-1.1ZM9.337,23.767a3.247,3.247,0,0,1-2.26.954A2.99,2.99,0,0,1,4.929,23.8a3.159,3.159,0,0,1-.893-2.212V10.2a1.061,1.061,0,1,1,2.121,0V21.044a.909.909,0,0,0,.893.919h3.209A3.052,3.052,0,0,1,9.337,23.767Zm16.127-1.919a2.9,2.9,0,0,1-.831,2.028,2.748,2.748,0,0,1-1.975.844H10.916a4.884,4.884,0,0,0,1.155-3.131V6.4H25.464Z" fill="#34495e"/><path d="M17.438,9.563h6.071v2.125H17.438Z" transform="translate(-0.991 -0.687)" fill="#34495e"/><path d="M17.438,15.75h6.071v1.214H17.438Z" transform="translate(-0.991 -1.775)" fill="#34495e"/><path d="M17.438,20.25h6.071v1.214H17.438Z" transform="translate(-0.991 -2.485)" fill="#34495e"/><path d="M23.25,24.75H17.179s0,1.214-.3,1.214h5.643C23.25,25.964,23.25,25.167,23.25,24.75Z" transform="translate(-0.789 -3.195)" fill="#34495e"/></g></svg>
                    </div>
                    <h4 class="text-center">Total Posts</h4>
                    <div class="count-div">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 75 65"><path d="M23.641,24.022a16,16,0,0,1,27.718,0L61.156,41A16,16,0,0,1,47.3,65H27.7A16,16,0,0,1,13.844,41Z" transform="translate(75 65) rotate(-180)" fill="#e5e4ff"/></svg>
                        <p><?php echo e($dbRowCount['posts']); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 dashboard-card">
                <div class="card-inner">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 46 45"><ellipse cx="23" cy="22.5" rx="23" ry="22.5" fill="#e5e4ff"/><path d="M3.75,10.529a2.642,2.642,0,0,0,2.5-2.76,2.642,2.642,0,0,0-2.5-2.76,2.642,2.642,0,0,0-2.5,2.76A2.642,2.642,0,0,0,3.75,10.529Zm17.5,0a2.642,2.642,0,0,0,2.5-2.76,2.642,2.642,0,0,0-2.5-2.76,2.642,2.642,0,0,0-2.5,2.76A2.642,2.642,0,0,0,21.25,10.529Zm1.25,1.38H20a2.38,2.38,0,0,0-1.762.8,6.34,6.34,0,0,1,2.934,4.717H23.75A1.318,1.318,0,0,0,25,16.049v-1.38A2.642,2.642,0,0,0,22.5,11.909Zm-10,0a4.617,4.617,0,0,0,4.375-4.83A4.617,4.617,0,0,0,12.5,2.25,4.617,4.617,0,0,0,8.125,7.08,4.617,4.617,0,0,0,12.5,11.909Zm3,1.38h-.324a5.534,5.534,0,0,1-5.352,0H9.5A4.752,4.752,0,0,0,5,18.256V19.5a1.98,1.98,0,0,0,1.875,2.07h11.25A1.98,1.98,0,0,0,20,19.5V18.256A4.752,4.752,0,0,0,15.5,13.289Zm-8.738-.578A2.38,2.38,0,0,0,5,11.909H2.5A2.642,2.642,0,0,0,0,14.669v1.38a1.318,1.318,0,0,0,1.25,1.38H3.824A6.356,6.356,0,0,1,6.762,12.711Z" transform="translate(11 10.75)" fill="#34495e"/></svg>
                    </div>
                    <h4 class="text-center">Total Users</h4>
                    <div class="count-div">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 75 65"><path d="M23.641,24.022a16,16,0,0,1,27.718,0L61.156,41A16,16,0,0,1,47.3,65H27.7A16,16,0,0,1,13.844,41Z" transform="translate(75 65) rotate(-180)" fill="#e5e4ff"/></svg>
                        <p><?php echo e($dbRowCount['users']); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 dashboard-card">
                <div class="card-inner">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 46 45"><ellipse cx="23" cy="22.5" rx="23" ry="22.5" fill="#e5e4ff"/><path d="M24.255,13.235H13.35L20.612,20.5a.737.737,0,0,0,1.02.031,11.006,11.006,0,0,0,3.361-6.473.737.737,0,0,0-.738-.82Zm-.727-2.978A11.056,11.056,0,0,0,13.272,0,.739.739,0,0,0,12.5.746V11.029H22.783a.739.739,0,0,0,.744-.772ZM10.294,13.235V2.331a.736.736,0,0,0-.82-.738A11.021,11.021,0,0,0,.006,12.885,11.165,11.165,0,0,0,11.169,23.529a10.944,10.944,0,0,0,6.216-2.023.73.73,0,0,0,.072-1.107Z" transform="translate(11 11)" fill="#34495e"/></svg>
                    </div>
                    <h4 class="text-center">Total Categories</h4>
                    <div class="count-div">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 75 65"><path d="M23.641,24.022a16,16,0,0,1,27.718,0L61.156,41A16,16,0,0,1,47.3,65H27.7A16,16,0,0,1,13.844,41Z" transform="translate(75 65) rotate(-180)" fill="#e5e4ff"/></svg>
                        <p><?php echo e($dbRowCount['categories']); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 dashboard-card">
                <div class="card-inner">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 46 45"><ellipse cx="23" cy="22.5" rx="23" ry="22.5" fill="#e5e4ff"/><path d="M19.451,8.826,11.174.549A1.875,1.875,0,0,0,9.848,0H1.875A1.875,1.875,0,0,0,0,1.875V9.848a1.875,1.875,0,0,0,.549,1.326l8.277,8.277a1.875,1.875,0,0,0,2.652,0l7.973-7.973a1.875,1.875,0,0,0,0-2.652ZM4.375,6.25A1.875,1.875,0,1,1,6.25,4.375,1.875,1.875,0,0,1,4.375,6.25Zm20.076,5.227-7.973,7.973a1.875,1.875,0,0,1-2.652,0l-.014-.014,6.8-6.8a3.516,3.516,0,0,0,0-4.972L12.945,0h1.9a1.875,1.875,0,0,1,1.326.549l8.277,8.277a1.875,1.875,0,0,1,0,2.652Z" transform="translate(11 13)" fill="#34495e"/></svg>
                    </div>
                    <h4 class="text-center">Total Tags</h4>
                    <div class="count-div">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 75 65"><path d="M23.641,24.022a16,16,0,0,1,27.718,0L61.156,41A16,16,0,0,1,47.3,65H27.7A16,16,0,0,1,13.844,41Z" transform="translate(75 65) rotate(-180)" fill="#e5e4ff"/></svg>
                        <p><?php echo e($dbRowCount['tags']); ?></p>
                    </div>
                </div>
            </div>

        </div> <!-- Dashboard Card Row End -->

        <div class="row dashboard-links-row">
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <a href="<?php echo e(route('post.create')); ?>" class="btn-blue">Add New Post</a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <a href="<?php echo e(route('user.create')); ?>" class="btn-blue">Add New User</a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <a href="<?php echo e(route('category.create')); ?>" class="btn-blue">Create Category</a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                <a href="<?php echo e(route('tag.index')); ?>" class="btn-blue">Create Tag</a>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.inc.html_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\Laravel\cyber\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>