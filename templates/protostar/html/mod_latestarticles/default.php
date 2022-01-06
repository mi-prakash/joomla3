<?php
defined('_JEXEC') or die;
?>
<div class="latestarticles <?php echo $moduleclass_sfx ?>">
    <div class="row-striped">
        <div class="row-fluid">
            <div class="span2">
                <strong class="row-title">ID</strong>
            </div>
            <div class="span6">
                <strong class="row-title">Title</strong>
            </div>
        </div>
        <?php foreach ($list as $item) : ?>
            <div class="row-fluid">
                <div class="span2">
                    <?php echo $item->id; ?>
                </div>
                <div class="span6">
                    <?php echo $item->title; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>