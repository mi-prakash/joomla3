<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;

class FolioModelUpdfolios extends ListModel
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
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);
        $published = $this->getUserStateFromRequest($this->context . '.filter.state', 'filter_state', '', 'string');
        $this->setState('filter.state', $published);
        parent::populateState('a.ordering', 'asc');
    }
    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select(
            $this->getState('list.select', 'a.id, a.title, a.alias')
        );
        $query->from($db->quoteName('#__folio') . ' AS a');
        return $query;
    }
}
