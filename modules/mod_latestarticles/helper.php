<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

abstract class Mod_latestarticlesHelper
{
    public static function getList(&$params)
    {
        $db = Factory::getDbo();
        $query = $db->getQuery(true);
        $query->select('title, asset_id, alias, note');
        $query->from('#__content');
        $query->order('asset_id DESC');
        $db->setQuery($query, 0, $params->get('count', 5));
        try {
            $results = $db->loadObjectList();
        } catch (RuntimeException $e) {
            // JError::raiseError(500, $e->getMessage());
            echo "ERROR! ".$e->getMessage();
            return false;
        }
        foreach ($results as $k => $result) {
            $results[$k] = new stdClass;
            $results[$k]->title = htmlspecialchars($result->title);
            $results[$k]->id = (int)$result->asset_id;
            $results[$k]->alias = htmlspecialchars($result->alias);
            $results[$k]->note = htmlspecialchars($result->note);
        }
        return $results;
    }
}
