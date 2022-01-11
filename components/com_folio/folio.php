<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;

$document = Factory::getDocument();
$cssFile = "./media/com_folio/css/site.stylesheet.css";
$document->addStyleSheet($cssFile);

$controller = BaseController::getInstance('Folio');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
