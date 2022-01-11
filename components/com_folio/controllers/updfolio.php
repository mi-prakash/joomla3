<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\FormController;

class FolioControllerUpdfolio extends FormController
{
    protected function allowAdd($data = array())
    {
        $user = Factory::getUser();
        if ($user) {
            // In the absence of better information, revert to the component permissions.
            return parent::allowAdd($data);
        } else {
            return null;
        }
    }
    protected function allowEdit($data = array(), $key = 'id')
    {
        $user = Factory::getUser();
        if ($user) {
            // Since there is no asset tracking, revert to the component permissions.
            return parent::allowEdit($data, $key);
        } else {
            return null;
        }
    }
}
