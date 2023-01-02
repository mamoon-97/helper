<?php

use Core\Helpers\Helper;
?>
<div class="mt-5 d-flex flex-row-reverse gap-3">
    <?php if (Helper::check_permission(['post:read', 'post:update'])) : ?>
        <a href="/items/edit?id=<?= $data->item->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['post:read', 'post:delete'])) :
    ?>
        <a href="/items/delete?id=<?= $data->item->id ?>" class="btn btn-danger">Delete</a>
    <?php endif; ?>
</div>

<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center">
        <?= $data->item->item_name ?>
    </h1>

    <p>
        <?= $data->item->cost ?>
    </p>
</div>