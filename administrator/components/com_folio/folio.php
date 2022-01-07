<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;

if (!Factory::getUser()->authorise('core.manage', 'com_folio')) {
    throw new Exception('JERROR_ALERTNOAUTHOR', 404);
}

$controller  = BaseController::getInstance('Folio');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
