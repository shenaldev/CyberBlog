<?php $__env->startSection('body'); ?>

<div class="container-fluid slider-section">
    <div class="row">
        <div class="col-lg-1 col-md-1 slider-svg">
            <svg viewBox="0 0 117 699" class="animated fadeInLeft slow">
                <text id="TRENDING" transform="translate(0 699) rotate(-90)" fill="#34495e" font-size="80" font-family="Poppins-SemiBold, Poppins" font-weight="600" letter-spacing="0.36em" opacity="0.15"><tspan x="46.34" y="84">TRENDING</tspan></text>
            </svg>
        </div>

        <div class="col-lg-10 col-md-10 col-12">
            <div class="row slider-row">
                <div class="col-12">

                <?php
                    $s = 1;
                ?>
                <?php $__currentLoopData = $trending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row slide <?php if($s == 1): ?> slide-active <?php endif; ?>" id="slide<?php echo e($s); ?>" data-id="<?php echo e($s); ?>">
                        <div class="col-12 col-lg-5 slider-img-col">
                            <a href="<?php echo e(route('post',['slug' => $trend->slug])); ?>">
                                <div class="col-12 slider-thumb" style="background:url('<?php echo e(asset($trend->img)); ?>')"></div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-7 slider-content-div">
                            <div class="col-12">
                                <a class="slider-title" href="<?php echo e(route('post',['slug' => $trend->slug])); ?>">
                                    <h1><?php echo e($trend->title); ?></h1>
                                </a>
                            </div>
                            <div class="col-12 slider-para">
                                <p><?php echo e($trend->getContentChunk($trend->content)); ?></p>
                            </div>
                            <div class="col-12 text-center slider-btn">
                                <a href="<?php echo e(route('post',['slug' => $trend->slug])); ?>" class="btn-blue">Read More</a>
                            </div>
                            <div class="col-12 mt-3 slider-tags">
                            <?php $__currentLoopData = $trend->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('tag.posts',['tag' => $tag->name])); ?>" class="tags"><?php echo e($tag->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="col-12 slider-credits">
                                <p>Author: <a href="<?php echo e(route('author',['name' => $trend->user->username])); ?>"><?php echo e($trend->user->username); ?></a></p>
                                <p>Posted At: <?php echo e($trend->created_at->diffForHumans()); ?></p>
                            </div>
                        </div><!-- Content Div End -->
                    </div><!-- Content Row End -->
                    <?php
                        $s++
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div><!-- Slider Row End -->

            <div class="row justify-content-center mt-4">
                <div class="col-lg-5 col-12 slider-control text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100.2 100.6" onClick="sliderNextPrev('prev')">
                        <title>arrow-left</title><path d="M50.1,100.6a50.3,50.3,0,1,1,50.1-50.3A50.3,50.3,0,0,1,50.1,100.6Zm0-90.5a40.2,40.2,0,1,0,40,40.2A40.1,40.1,0,0,0,50.1,10.1Z" fill="#00b9ff"/><path d="M31.5,54.8a4,4,0,0,1-4-4,3.9,3.9,0,0,1,4-3.9H70.9a4,4,0,0,1,4,4,3.9,3.9,0,0,1-4,3.9Z" fill="#00b9ff"/><path d="M52,75.4a3.8,3.8,0,0,1-2.8-1.2L28.6,53.6a4,4,0,0,1,0-5.6L48.9,27.7a3.9,3.9,0,0,1,5.6,0,4,4,0,0,1,0,5.6L37.1,50.8,54.8,68.6a4,4,0,0,1,0,5.6A3.9,3.9,0,0,1,52,75.4Z" fill="#00b9ff"/>
                    </svg>
                    <svg viewBox="0 0 25 25" class="slider-dot dot-active">
                        <circle id="dot_1" data-name="dot 1" cx="12.5" cy="12.5" r="12.5" fill="#34495E" onClick="slider(1)"/>
                    </svg>
                    <svg viewBox="0 0 25 25" class="slider-dot">
                        <circle id="dot_2" data-name="dot 2" cx="12.5" cy="12.5" r="12.5" fill="#34495E" onClick="slider(2)"/>
                    </svg>
                    <svg viewBox="0 0 25 25" class="slider-dot">
                        <circle id="dot_3" data-name="dot 3" cx="12.5" cy="12.5" r="12.5" fill="#34495E" onClick="slider(3)"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100.2 100.6" onClick="sliderNextPrev('next')">
                        <title>arrow-right</title><path d="M50.1,100.6a50.3,50.3,0,1,1,50.1-50.3A50.3,50.3,0,0,1,50.1,100.6Zm0-90.5a40.2,40.2,0,1,0,40,40.2A40.1,40.1,0,0,0,50.1,10.1Z" fill="#00b9ff"/><path d="M29.3,53.8a4,4,0,1,1,0-8H68.7a3.9,3.9,0,0,1,4,3.9,4,4,0,0,1-4,4Z" fill="#00b9ff"/><path d="M48.5,74a4.1,4.1,0,0,1-2.8-1.1,3.9,3.9,0,0,1,0-5.6L63.1,49.7,45.4,31.9a3.9,3.9,0,0,1,0-5.6,4,4,0,0,1,5.6,0L71.5,46.9a3.9,3.9,0,0,1,0,5.6L51.3,72.9A4.3,4.3,0,0,1,48.5,74Z" fill="#00b9ff"/>
                    </svg>
                </div>
            </div>
        </div><!-- Slider Control Row End -->

        <div class="col-lg-1 col-md-1 slider-svg" id="post-text-div">
            <svg viewBox="0 0 140 846" class="animated fadeInRight slow">
                <text id="POST" transform="translate(0 846) rotate(-90)" fill="#34495e" font-size="100" font-family="Poppins-SemiBold, Poppins" font-weight="600" letter-spacing="0.36em" opacity="0.15"><tspan x="238.55" y="105">POST</tspan></text>
            </svg>
        </div>

    </div>
</div>

<!----------------------------------------------------
    Section Posts With Categories
---------------------------------------------------->

<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($category->posts->count() > 0): ?>
        <div class="container-fluid category-section">
            <div class="row">
                <div class="col-lg-5">
                    <div class="category-name-div">
                        <h1><?php echo e($category->name); ?></h1>
                    </div>
                </div>
                <div class="category-lable">
                    <p><?php echo e($category->name); ?></p>
                </div>
                <div class="col category-btn-div">
                    <a href="<?php echo e(route('category.posts',['category' => $category->slug])); ?>" class="btn-blue">View All</a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="container post-card-container">
        <div class="row card-outter-row">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $innerPosts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $innerPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($post->category_id == $category->id): ?>
                <div class="col-lg-4 col-md-6 card-inner-col">
                    <div class="card-inner">
                        <div class="row">
                            <a href="<?php echo e(route('post',['slug' => $post->slug])); ?>" class="card-img-link">
                                <div class="col card-img-div" style="background:url('<?php echo e(asset($post->img)); ?>')">
                                </div>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col card-content">
                                <a href="<?php echo e(route('post',['slug' => $post->slug])); ?>">
                                    <h1><?php echo e($post->title); ?></h1>
                                </a>
                                <p class="py-2"><?php echo $post->getContentChunk($post->content); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <a href="<?php echo e(route('post',['slug' => $post->slug])); ?>" class="btn-blue">Read More</a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col card-credits">
                                <p>Author: <a href="<?php echo e(route('author',['name' => $post->user->username])); ?>"><?php echo e($post->user->username); ?></a></p>
                                <p>Date: <?php echo e($post->created_at->diffForHumans()); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.html_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\Laravel\cyber\resources\views/index.blade.php ENDPATH**/ ?>