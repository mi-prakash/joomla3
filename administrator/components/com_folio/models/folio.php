<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Table\Table;
use Joomla\CMS\MVC\Model\AdminModel;

class FolioModelFolio extends AdminModel
{
    protected $text_prefix = 'COM_FOLIO';
    public function getTable($type = 'Folio', $prefix = 'FolioTable', $config = array())
    {
        return Table::getInstance($type, $prefix, $config);
    }
    public function getForm($data = array(), $loadData = true)
    {
        $app = Factory::getApplication();
        $form = $this->loadForm('com_folio.folio', 'folio', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form)) {
            return false;
        }
        return $form;
    }
    protected function loadFormData()
    {
        $data = Factory::getApplication()->getUserState('com_folio.edit.folio.data', array());
        if (empty($data)) {
            $data = $this->getItem();
        }
        return $data;
    }
    protected function prepareTable($table)
    {
        $table->title = htmlspecialchars_decode($table->title, ENT_QUOTES);
    }
}
