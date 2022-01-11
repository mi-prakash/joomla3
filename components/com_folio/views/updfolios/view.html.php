<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView;

class FolioViewUpdfolios extends HtmlView
{
    protected $items;
    protected $state;
    protected $pagination;
    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        $this->state = $this->get('State');
        $this->pagination = $this->get('Pagination');
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));
            return false;
        }
        parent::display($tpl);
    }
    protected function getSortFields()
    {
        return array(
            'a.ordering' => Text::_('JGRID_HEADING_ORDERING'),
            'a.title' => Text::_('JGLOBAL_TITLE'),
            'a.alias' => Text::_('Alias'),
            'a.id' => Text::_('JGRID_HEADING_ID')
        );
    }
}
