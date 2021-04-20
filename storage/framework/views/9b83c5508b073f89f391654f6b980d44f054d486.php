<?php $__env->startSection('body'); ?>
<div class="container mt-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Login')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label" for="remember">
                                        <?php echo e(__('Remember Me')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Login')); ?>

                                </button>

                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Forgot Your Password?')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="social-login-div text-center mt-3">
                    <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>" class="social-btn fb-btn">
                        <div class="btn-inner">
                            <span class="social-login-icons"><svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="25" viewBox="0 0 51.822 100"><path d="M411.822,71.568V55.8s-35.031-8.779-36.48,20.882c-.085-.17,0,14.916,0,14.916H360v17.9h15.342v45.089H393.5V109.5h15.172L411.4,91.6H393.5V79.452s-.384-8.481,9.674-7.884C403.341,71.4,411.822,71.568,411.822,71.568Z" transform="translate(-360 -54.586)" fill="#fff"/></svg></span>
                            Login With Facebook
                        </div>
                    </a>
                </div>

                <div class="text-center social-login-div mt-3 pb-3">
                <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>" class="social-btn google-btn">
                        <div class="btn-inner">
                            <span class="social-login-icons"><svg  width="22" height="22" version="1.1" viewBox="0 0 400 400" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M142.9,24.2C97.6,39.7,59,73.6,37.5,116.5c-7.5,14.8-12.9,30.5-16.2,46.8c-8.2,40.4-2.5,83.5,16.1,120.3   c12.1,24,29.5,45.4,50.5,62.1c19.9,15.8,43,27.6,67.6,34.1c31,8.3,64,8.1,95.2,1c28.2-6.5,54.9-20,76.2-39.6   c22.5-20.7,38.6-47.9,47.1-77.2c9.3-31.9,10.5-66,4.7-98.8c-58.3,0-116.7,0-175,0c0,24.2,0,48.4,0,72.6c33.8,0,67.6,0,101.4,0   c-3.9,23.2-17.7,44.4-37.2,57.5c-12.3,8.3-26.4,13.6-41,16.2c-14.6,2.5-29.8,2.8-44.4-0.1c-14.9-3-29-9.2-41.4-17.9   c-19.8-13.9-34.9-34.2-42.6-57.1c-7.9-23.3-8-49.2,0-72.4c5.6-16.4,14.8-31.5,27-43.9c15-15.4,34.5-26.4,55.6-30.9   c18-3.8,37-3.1,54.6,2.2c15,4.5,28.8,12.8,40.1,23.6c11.4-11.4,22.8-22.8,34.2-34.2c6-6.1,12.3-12,18.1-18.3   c-17.3-16-37.7-28.9-59.9-37.1C228.2,10.6,183.2,10.3,142.9,24.2z" fill="#FFFFFF"/><g><path d="M142.9,24.2c40.2-13.9,85.3-13.6,125.3,1.1c22.2,8.2,42.5,21,59.9,37.1c-5.8,6.3-12.1,12.2-18.1,18.3    c-11.4,11.4-22.8,22.8-34.2,34.2c-11.3-10.8-25.1-19-40.1-23.6c-17.6-5.3-36.6-6.1-54.6-2.2c-21,4.5-40.5,15.5-55.6,30.9    c-12.2,12.3-21.4,27.5-27,43.9c-20.3-15.8-40.6-31.5-61-47.3C59,73.6,97.6,39.7,142.9,24.2z" fill="#FFFFFF"/></g><g><path d="M21.4,163.2c3.3-16.2,8.7-32,16.2-46.8c20.3,15.8,40.6,31.5,61,47.3c-8,23.3-8,49.2,0,72.4    c-20.3,15.8-40.6,31.6-60.9,47.3C18.9,246.7,13.2,203.6,21.4,163.2z" fill="#FFFFFF"/></g><g><path d="M203.7,165.1c58.3,0,116.7,0,175,0c5.8,32.7,4.5,66.8-4.7,98.8c-8.5,29.3-24.6,56.5-47.1,77.2    c-19.7-15.3-39.4-30.6-59.1-45.9c19.5-13.1,33.3-34.3,37.2-57.5c-33.8,0-67.6,0-101.4,0C203.7,213.5,203.7,189.3,203.7,165.1z" fill="#FFFFFF"/></g><g><path d="M37.5,283.5c20.3-15.7,40.6-31.5,60.9-47.3c7.8,22.9,22.8,43.2,42.6,57.1c12.4,8.7,26.6,14.9,41.4,17.9    c14.6,3,29.7,2.6,44.4,0.1c14.6-2.6,28.7-7.9,41-16.2c19.7,15.3,39.4,30.6,59.1,45.9c-21.3,19.7-48,33.1-76.2,39.6    c-31.2,7.1-64.2,7.3-95.2-1c-24.6-6.5-47.7-18.2-67.6-34.1C67,328.9,49.6,307.5,37.5,283.5z" fill="#FFFFFF"/></g></g></svg></span>
                            Login With Google
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.html_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\Laravel\cyber\resources\views/auth/login.blade.php ENDPATH**/ ?>