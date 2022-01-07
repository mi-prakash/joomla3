<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\AdminController;

class FolioControllerFolios extends AdminController
{
    public function getModel($name = 'Folio', $prefix = 'FolioModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
}