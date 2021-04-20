<div class="row">
    <div class="col user-details-col">
        <a href="<?php echo e(route('index')); ?>"> <img id="logo" src="<?php echo e(asset($settings->logo)); ?>" alt="Logo"> </a>
        <img src="<?php echo e(asset($admin->profile->avatar)); ?>" alt="Avatar" id="avatar">
        <h5 class="text-center mt-2 text-capitalize"><?php echo e($admin->username); ?></h5>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col dashboard-menu">
        <ul>
            <li class="li-menu <?php if($page == 'dashboard'): ?> menu-active <?php endif; ?>">
                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 27"><path d="M4.5,19.5h12V4.5H4.5Zm0,12h12v-9H4.5Zm15,0h12v-15h-12Zm0-27v9h12v-9Z" transform="translate(-4.5 -4.5)" fill="#00b9ff"/></svg>
                <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
            </li>
            <li class="li-menu <?php if($page == 'users'): ?> menu-active <?php endif; ?>">
                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 31.5"><path d="M6.75,15.75a4.5,4.5,0,1,0-4.5-4.5A4.5,4.5,0,0,0,6.75,15.75Zm31.5,0a4.5,4.5,0,1,0-4.5-4.5A4.5,4.5,0,0,0,38.25,15.75ZM40.5,18H36a4.487,4.487,0,0,0-3.171,1.308A10.285,10.285,0,0,1,38.109,27H42.75A2.248,2.248,0,0,0,45,24.75V22.5A4.5,4.5,0,0,0,40.5,18Zm-18,0a7.875,7.875,0,1,0-7.875-7.875A7.871,7.871,0,0,0,22.5,18Zm5.4,2.25h-.584a10.873,10.873,0,0,1-9.633,0H17.1A8.1,8.1,0,0,0,9,28.35v2.025a3.376,3.376,0,0,0,3.375,3.375h20.25A3.376,3.376,0,0,0,36,30.375V28.35A8.1,8.1,0,0,0,27.9,20.25Zm-15.729-.942A4.487,4.487,0,0,0,9,18H4.5A4.5,4.5,0,0,0,0,22.5v2.25A2.248,2.248,0,0,0,2.25,27H6.884A10.311,10.311,0,0,1,12.171,19.308Z" transform="translate(0 -2.25)" fill="#00b9ff"/></svg>
                <a href="<?php echo e(route('user.index')); ?>">Users</a>
            </li>
            <li class="li-menu <?php if($page == 'posts'): ?> menu-active <?php endif; ?>">
                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 22.059"><g transform="translate(-2.25 -4.5)"><path d="M26.357,4.5H11.179a.935.935,0,0,0-.893.948v1.81H4.594A2.386,2.386,0,0,0,2.25,9.67V21.59a4.911,4.911,0,0,0,4.8,4.969H22.657a4.672,4.672,0,0,0,4.593-4.71V5.419A.909.909,0,0,0,26.357,4.5ZM10.286,9.1V20.125H7.942V10.2a2.879,2.879,0,0,0-.184-1.1ZM9.337,23.767a3.247,3.247,0,0,1-2.26.954A2.99,2.99,0,0,1,4.929,23.8a3.159,3.159,0,0,1-.893-2.212V10.2a1.061,1.061,0,1,1,2.121,0V21.044a.909.909,0,0,0,.893.919h3.209A3.052,3.052,0,0,1,9.337,23.767Zm16.127-1.919a2.9,2.9,0,0,1-.831,2.028,2.748,2.748,0,0,1-1.975.844H10.916a4.884,4.884,0,0,0,1.155-3.131V6.4H25.464Z" fill="#00b9ff"/><path d="M17.438,9.563h6.071v2.125H17.438Z" transform="translate(-0.991 -0.687)" fill="#00b9ff"/><path d="M17.438,15.75h6.071v1.214H17.438Z" transform="translate(-0.991 -1.775)" fill="#00b9ff"/><path d="M17.438,20.25h6.071v1.214H17.438Z" transform="translate(-0.991 -2.485)" fill="#00b9ff"/><path d="M23.25,24.75H17.179s0,1.214-.3,1.214h5.643C23.25,25.964,23.25,25.167,23.25,24.75Z" transform="translate(-0.789 -3.195)" fill="#00b9ff"/></g></svg>
                <a href="<?php echo e(route('post.index')); ?>">Posts</a>
            </li>
            <li class="li-menu <?php if($page == 'categories'): ?> menu-active <?php endif; ?>">
                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#00b9ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                <a href="<?php echo e(route('category.index')); ?>">Categories</a>
            </li>
            <li class="li-menu <?php if($page == 'tags'): ?> menu-active <?php endif; ?>">
                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 45 36"><path d="M35.011,15.886,20.114.989A3.375,3.375,0,0,0,17.727,0H3.375A3.375,3.375,0,0,0,0,3.375V17.727a3.375,3.375,0,0,0,.989,2.386l14.9,14.9a3.375,3.375,0,0,0,4.773,0L35.011,20.659a3.375,3.375,0,0,0,0-4.773ZM7.875,11.25A3.375,3.375,0,1,1,11.25,7.875,3.375,3.375,0,0,1,7.875,11.25Zm36.136,9.409L29.659,35.011a3.375,3.375,0,0,1-4.773,0l-.025-.025L37.1,22.748a6.328,6.328,0,0,0,0-8.949L23.3,0h3.426a3.375,3.375,0,0,1,2.386.989l14.9,14.9a3.375,3.375,0,0,1,0,4.773Z" fill="#00b9ff"/></svg>
                <a href="<?php echo e(route('tag.index')); ?>">Tags</a>
            </li>
            <li class="li-menu <?php if($page == 'menu'): ?> menu-active <?php endif; ?>">
                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="27" height="18" viewBox="0 0 27 18"><path d="M4.5,27h27V24H4.5Zm0-7.5h27v-3H4.5ZM4.5,9v3h27V9Z" transform="translate(-4.5 -9)" fill="#00b9ff"/></svg>
                <a href="#">Menu</a>
            </li>
            <li class="li-menu <?php if($page == 'footer'): ?> menu-active <?php endif; ?>">
                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#00b9ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <a href="#">Footer</a>
            </li>
            <li class="li-menu <?php if($page == 'settings'): ?> menu-active <?php endif; ?>">
                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path d="M22.5,18A4.5,4.5,0,1,1,18,13.5,4.5,4.5,0,0,1,22.5,18Z" fill="none" stroke="#00b9ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/><path d="M29.1,22.5a2.475,2.475,0,0,0,.495,2.73l.09.09a3,3,0,1,1-4.245,4.245l-.09-.09a2.5,2.5,0,0,0-4.23,1.77V31.5a3,3,0,1,1-6,0v-.135A2.475,2.475,0,0,0,13.5,29.1a2.475,2.475,0,0,0-2.73.495l-.09.09A3,3,0,1,1,6.435,25.44l.09-.09a2.5,2.5,0,0,0-1.77-4.23H4.5a3,3,0,1,1,0-6h.135A2.475,2.475,0,0,0,6.9,13.5a2.475,2.475,0,0,0-.5-2.73l-.09-.09A3,3,0,1,1,10.56,6.435l.09.09a2.475,2.475,0,0,0,2.73.495h.12A2.475,2.475,0,0,0,15,4.755V4.5a3,3,0,0,1,6,0v.135a2.5,2.5,0,0,0,4.23,1.77l.09-.09a3,3,0,1,1,4.245,4.245l-.09.09a2.475,2.475,0,0,0-.5,2.73v.12A2.475,2.475,0,0,0,31.245,15H31.5a3,3,0,0,1,0,6h-.135A2.475,2.475,0,0,0,29.1,22.5Z" fill="none" stroke="#00b9ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/></svg>
               <a href="<?php echo e(route('settings.index')); ?>">Settings</a>
            </li>
            <li class="li-menu li-sub-menu <?php if( isset($subPage) ): ?> <?php if($subPage == 'settings-home'): ?> sub-menu-active <?php endif; ?> <?php elseif($page != 'settings'): ?> d-none <?php endif; ?>">
                <a href="<?php echo e(route('settings.home')); ?>">Homepage</a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH D:\wamp64\www\Laravel\cyber\resources\views/admin/inc/nav.blade.php ENDPATH**/ ?>