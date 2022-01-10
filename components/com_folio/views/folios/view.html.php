<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;

class FolioViewFolios extends HtmlView
{
    protected $items;
    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));
            return false;
        }
        parent::display($tpl);
    }
}
