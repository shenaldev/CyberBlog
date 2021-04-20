<?php $__env->startSection('content'); ?>

<div class="row page post-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Manage All Tags</h2>
            </div>
        </div>

        <div class="row mt-4 justify-content-end">
            <div class="col-lg-3 col-md-4 col-sm-6 float-right">
                <a href="#" id="create-btn" class="btn btn-success btn-sm d-inline float-right">Create New Tag</a>
            </div>
        </div>


        <?php if($tags->count() > 0): ?>

        <!-- multiple posts action form -->
        <form action="<?php echo e(route('tag.action')); ?>" id="actions_form" method="POST"><?php echo csrf_field(); ?></form>

        <div class="row mt-3">
            <div class="col post-table">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all" name="select-all"></th>
                            <th>ID</th>
                            <th>Tag Name</th>
                            <th>Edit / Delete</th>
                        </tr>
                        <tbody>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="action-check" form="actions_form" name="select_tags[]" value="<?php echo e($tag->id); ?>">
                                    </td>
                                    <td> <?php echo e($tag->id); ?> </td>
                                    <td> <?php echo e($tag->name); ?> </td>

                                    <td class="action-btn-div">
                                        <a href="<?php echo e(route('tag.update',['tag' => $tag->id])); ?>" data-name="<?php echo e($tag->name); ?>" class="btn d-inline edit-btn">
                                            <svg class="edit" xmlns="http://www.w3.org/2000/svg" style="pointer-events:none;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </a>

                                        <form action="<?php echo e(route('tag.destroy',['tag' => $tag->id])); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn" type="submit">
                                                <svg class="delete" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>

        <!-- multiple posts actions  -->
        <div class="row bg-dark p-2 mt-3" style="border-radius:5px">
            <div class="col-2">
                <select form="actions_form" name="action" id="action" class="form-control form-control-md">
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="col">
                <button class="btn btn-danger btn-sm" form="actions_form" type="submit">Make Changes</button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col pagination-div text-center">
                <?php echo e($tags->links()); ?>

            </div>
        </div>

        <?php else: ?>

        <div class="row empty-row">
            <div class="col empty-content-col">
                <h2>No Posts To Display</h2>
            </div>
        </div>

        <?php endif; ?>

    </div> <!-- Main col end -->
</div>

<!-- Create Tag Modal -->
<div class="modal" id="new-tag-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('tag.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-success">Create</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Update Tag Modal -->

<div class="modal" id="edit-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="edit-form">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="name">Tag Name <span class="required-icon">*</span></label>
                <input type="text" name="name" id="tag-name-input" class="form-control" required>
            </div>
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-success">Update</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.inc.html_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\Laravel\cyber\resources\views/admin/tags/index.blade.php ENDPATH**/ ?>