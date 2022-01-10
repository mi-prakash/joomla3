<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

class FolioViewFolio extends HtmlView
{
    protected $item;
    protected $form;
    public function display($tpl = null)
    {
        $this->item = $this->get('Item');
        $this->form = $this->get('Form');
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));
            return false;
        }
        $this->addToolbar();
        parent::display($tpl);
    }
    protected function addToolbar()
    {
        Factory::getApplication()->input->set('hidemainmenu', true);
        ToolbarHelper::title(Text::_('COM_FOLIO_MANAGER_FOLIO'), '');
        ToolbarHelper::save('folio.save');
        ToolbarHelper::save2new('folio.save2new');
        ToolbarHelper::save2copy('folio.save2copy');
        if (empty($this->item->id)) {
            ToolbarHelper::cancel('folio.cancel');
        } else {
            ToolbarHelper::cancel('folio.cancel', 'JTOOLBAR_CLOSE');
        }
    }
}
