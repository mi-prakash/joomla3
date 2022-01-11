<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

$user = Factory::getUser();
//make sure user is logged in
if ($user->id == 0) {
    JError::raiseWarning(403, Text::_('COM_FOLIO_ERROR_MUST_LOGIN'));
    $joomlaLoginUrl = 'index.php?option=com_users&view=login';
    echo "<br><a href='" . Route::_($joomlaLoginUrl) . "'>" . Text::_('COM_FOLIO_LOG_IN') . "</a><br>";
} else {
    $listOrder = $this->escape($this->state->get('list.ordering'));
    $listDirn = $this->escape($this->state->get('list.direction'));
?>
    <form action="<?php echo Route::_('index.php?option=com_folio&view=updfolios'); ?>" method="post" name="adminForm" id="adminForm">
        <div class="btn-toolbar">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('updfolio.add')">
                    <i class="icon-new"></i> <?php echo Text::_('JNEW') ?>
                </button>
            </div>
            <div class="btn-group">
                <!-- <button type="button" class="btn btn-danger" onclick="Joomla.submitbutton('updfolio.delete')">
                    <i class="icon-trash"></i> <?php echo Text::_('JTRASH') ?>
                </button> -->

                <button type="button" onclick="deleteNow()" class="btn btn-danger">
	                <span class="icon-trash" aria-hidden="true"></span> Delete
                </button>

            </div>
        </div>
        <?php if (!empty($this->sidebar)) : ?>
        <div id="j-sidebar-container" class="span2">
            <?php echo $this->sidebar; ?>
        </div>
        <div id="j-main-container" class="span10">
        <?php else : ?>
        <div id="j-main-container">
        <?php endif; ?>
        </div>
        <div class="clearfix"> </div>
        <table class="table table-striped" id="folioList">
            <thead>
                <tr>
                    <th width="1%" class="hidden-phone">
                        <input type="checkbox" name="checkall-toggle"
                            value="" title="<?php echo Text::_('JGLOBAL_CHECK_ALL'); ?>"
                            onclick="Joomla.checkAll(this)" />
                    </th>
                    <th class="title">
                        <?php echo HTMLHelper::_('grid.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder); ?>
                    </th>
                    <th width="25%" class="nowrap hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'Alias', 'a.alias', $listDirn, $listOrder); ?>
                    </th>
                    <th width="1%" class="nowrap center hidden-phone">
                        <?php echo HTMLHelper::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $i => $item) :
                    $canCheckin = $user->authorise('core.manage', 'com_checkin');
                    $canChange  = $user->authorise('core.edit.state', 'com_folio') && $canCheckin;
                    $canEdit    = $user->authorise('core.edit', 'com_folio.alias.' . $item->alias);
                ?>
                <tr class="row<?php echo $i % 2; ?>" sortable-group-id="1">
                    <td class="center hidden-phone">
                        <?php echo HTMLHelper::_('grid.id', $i, $item->id); ?>
                    </td>
                    <td class="nowrap has-context">
                        <?php if ($canEdit) : ?>
                        <a href="<?php echo Route::_('index.php?option=com_folio&task=updfolio.edit&id='.(int) $item->id); ?>">
                            <?php echo $this->escape($item->title); ?>
                        </a>
                        <?php else : ?>
                            <?php echo $this->escape($item->title); ?>
                        <?php endif; ?>
                    </td>
                    <td class="hidden-phone">
                        <?php echo $this->escape($item->alias); ?>
                    </td>
                    <td class="center hidden-phone">
                        <?php echo (int) $item->id; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="filter_order" value="<?php echo$listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
        <?php echo HTMLHelper::_('form.token'); ?>
    </form>
    <script>
        function deleteNow(now) {
            console.log(document.adminForm.boxchecked.value);
            // return;
            if (document.adminForm.boxchecked.value == 0) {
                alert(Joomla.JText._('JLIB_HTML_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST')); 
            } else { 
                // Joomla.submitbutton('updfolios.delete');
            }
        }
    </script>
<?php 
}