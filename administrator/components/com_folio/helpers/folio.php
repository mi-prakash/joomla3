<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Access\Access;
use Joomla\CMS\Object\CMSObject;

class FolioHelper
{
    public static function getActions($categoryId = 0)
    {
        $user  = Factory::getUser();
        $result  = new CMSObject;
        if (empty($categoryId)) {
            $assetName = 'com_folio';
            $level = 'component';
        } else {
            $assetName = 'com_folio.category.' . (int) $categoryId;
            $level = 'category';
        }
        $actions = Access::getActions('com_folio', $level);
        foreach ($actions as $action) {
            $result->set($action->name, $user->authorise(
                $action->name,
                $assetName
            ));
        }
        return $result;
    }
}
