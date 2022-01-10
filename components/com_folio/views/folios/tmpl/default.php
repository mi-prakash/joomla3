<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
?>
<div class="mypreview">
    <table class="table table-bordered table-striped">
        <thead>
            <th>Title</th>
            <th>Alias</th>
        </thead>
        <h3>Folios Lists</h3>
        <tbody>
            <?php foreach ($this->items as $item) : ?>
                <tr>
                    <td>
                        <a href="<?php echo Route::_('index.php?option=com_folio&task=folio.edit&id=' . (int) $item->id); ?>">
                            <?php echo $item->title; ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $item->alias; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>