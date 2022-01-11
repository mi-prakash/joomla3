<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
?>
<div class="mypreview">
    <h3>Folios Lists</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-th">
            <th>Title</th>
            <th>Alias</th>
            <th>Options</th>
        </thead>
        <tbody>
            <?php foreach ($this->items as $item) : ?>
                <tr>
                    <td>
                        <?php echo $item->title; ?>
                    </td>
                    <td>
                        <?php echo $item->alias; ?>
                    </td>
                    <td>
                        <a href="<?php echo Route::_('index.php?option=com_folio&view=folio&id=' . (int)$item->id); ?>" class="btn btn-info btn-small">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>