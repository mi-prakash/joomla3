<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\View\HtmlView;

class FolioViewFolio extends HtmlView
{
    protected $items;
    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        $app = Factory::getApplication();
        $params = $app->getParams();
        $this->assignRef('params', $params);
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));
            return false;
        }
        parent::display($tpl);
    }
}
