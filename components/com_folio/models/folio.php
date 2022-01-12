<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\CMS\MVC\Model\ListModel;

class FolioModelFolio extends ListModel
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'title', 'a.title',
                'alias', 'a.alias'
            );
        }
        parent::__construct($config);
    }
    protected function populateState($ordering = null, $direction = null)
    {
        $id = JRequest::getInt('id');
        $this->setState('id', $id);
    }
    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select(
            $this->getState(
                'list.select',
                'a.id, a.title, a.alias'
            )
        );
        $query->from($db->quoteName('#__folio') . ' AS a');
        if ($id = $this->getState('id')) {
            $query->where('a.id = ' . (int) $id);
        }
        return $query;
    }

    public function delete()
    {
        $cids = $_POST['cid'];
        
        if (count($cids) > 0) {
            $db = $this->getDbo();
            $query = $db->getQuery(true);
            $query->delete($db->quoteName('#__folio'));
            $query->where('id IN (' . implode(",", $cids) . ')');
            $db->setQuery($query);
            $result = $db->execute();

            $app = Factory::getApplication();
            $app->redirect(Route::_('index.php/manage-folios?view=updfolios'));
        }
    }
}