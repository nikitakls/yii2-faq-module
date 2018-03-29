<?php
/**
 * @author nikitakls
 * @var \nikitakls\faq\models\Hint $model
 */
?>

<div class="modal fade" tabindex="-1" role="dialog" id="hint-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-info">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="panel-title"><?= $model->category ? $model->category->title : '' ?>
                    / <?= $model->title ?></h3>
            </div>
            <div class="panel-body">
                <?= $model->clean_content ?>
            </div>
        </div>
    </div>
</div>