<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\Utilities\ArrayHelper;
use Joomla\CMS\MVC\Controller\AdminController;

class FolioControllerUpdfolios extends AdminController
{
    public function getModel($name = 'Folio', $prefix = 'FolioModel', $config = array('ignore_request' => true)) 
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
    public function saveOrderAjax()
    {
        $input = Factory::getApplication()->input;
        $pks = $input->post->get('cid', array(), 'array');
        $order = $input->post->get('order', array(), 'array');
        ArrayHelper::toInteger($pks);
        ArrayHelper::toInteger($order);
        $model = $this->getModel();
        $return = $model->saveorder($pks, $order);
        if ($return) {
            echo "1";
        }
        Factory::getApplication()->close();
    }
}
