<?php
defined('_JEXEC') or die;

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
                'a.id, a.title,' .
                    'a.state, a.company, a.alias'
            )
        );
        $query->from($db->quoteName('#__folio') . ' AS a');
        if ($id = $this->getState('id')) {
            $query->where('a.id = ' . (int) $id);
        }
        return $query;
    }
}