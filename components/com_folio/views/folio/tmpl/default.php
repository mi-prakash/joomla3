<?php
defined('_JEXEC') or die;
?>
<div class="mypreview">
    <?php foreach ($this->items as $item) : ?>
        <div class="myfolio">
            <!-- <div class="folio_title">
                <?php echo $item->title; ?>
            </div>
            <div class="folio_element_full">
                <?php echo $item->alias; ?>
            </div> -->
            <h4>Folio Details</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-th">
                    <th>Title</th>
                    <th>Alias</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $item->title; ?>
                        </td>
                        <td>
                            <?php echo $item->alias; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>
</div>