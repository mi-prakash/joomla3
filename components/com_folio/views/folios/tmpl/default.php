<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
?>
<div class="mypreview">
    <table class="table table-bordered table-striped">
        <thead>
            <th>Title</th>
            <th>Alias</th>
            <th>Options</th>
        </thead>
        <h3>Folios Lists</h3>
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
                        <a href="<?php echo Route::_('index.php?option=com_folio&task=folio.edit&id=' . (int) $item->id); ?>" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>