<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

?>
<form action="<?php echo Route::_('index.php?option=com_folio&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
    <div class="row-fluid">
        <div class="span10 form-horizontal">
            <fieldset>
                <?php echo HTMLHelper::_(
                    'bootstrap.startPane',
                    'myTab',
                    array('active' => 'details')
                ); ?>
                <?php echo HTMLHelper::_(
                    'bootstrap.addPanel',
                    'myTab',
                    'details',
                    empty($this->item->id) ?
                        Text::_('COM_FOLIO_NEW_FOLIO', true) :
                        Text::sprintf(
                            'COM_FOLIO_EDIT_FOLIO',
                            $this->item->id,
                            true
                        )
                ); ?>
                <div class="control-group">
                    <div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
                    <div class="controls"><?php echo $this->form->getInput('title'); ?></div>
                </div>
                <div class="control-group">
                    <div class="control-label"><?php echo $this->form->getLabel('alias'); ?></div>
                    <div class="controls"><?php echo $this->form->getInput('alias'); ?></div>
                </div>
                <?php echo HTMLHelper::_('bootstrap.endPanel'); ?>
                <input type="hidden" name="task" value="" />
                <?php echo HTMLHelper::_('form.token'); ?>
                <?php echo HTMLHelper::_('bootstrap.endPane'); ?>
            </fieldset>
        </div>
    </div>
</form>