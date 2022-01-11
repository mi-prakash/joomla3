<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;

class FolioViewUpdfolio extends HtmlView
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
        parent::display($tpl);
    }
}
