<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Session\Session;
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
        // Check for request forgeries
		$this->checkToken();

        $cids = $_POST['cid'];
        $app = Factory::getApplication();

        if (count($cids) > 0) {
            $db = $this->getDbo();
            $query = $db->getQuery(true);
            $query->delete($db->quoteName('#__folio'));
            $query->where('id IN (' . implode(",", $cids) . ')');
            $db->setQuery($query);
            $result = $db->execute();
            $count = count($cids);
            $app->enqueueMessage($count . ' Item(s) deleted', 'success');
            $app->redirect(Route::_('index.php/manage-folios?view=updfolios'));
        } else {
            $app->enqueueMessage('Please select an item from the list', 'error');
            $app->redirect(Route::_('index.php/manage-folios?view=updfolios'));
        }
    }

    protected function checkToken($method = 'post', $redirect = true)
    {
        $valid = Session::checkToken($method);

		if (!$valid && $redirect)
		{
			$referrer = $this->input->server->getString('HTTP_REFERER');

			if (!Uri::isInternal($referrer))
			{
				$referrer = 'index.php';
			}

			$app = Factory::getApplication();
			$app->enqueueMessage(Text::_('JINVALID_TOKEN_NOTICE'), 'warning');
			$app->redirect($referrer);
		}

		return $valid;
    }
}