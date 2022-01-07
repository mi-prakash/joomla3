<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\BaseController;

class FolioController extends BaseController
{
    protected $default_view = 'folios';
    public function display($cachable = false, $urlparams = false)
    {
        require_once JPATH_COMPONENT.'/helpers/folio.php';
        $view   = $this->input->get('view', 'folios');
        $layout = $this->input->get('layout', 'default');
        $id     = $this->input->getInt('id');
        if ($view == 'folio' && $layout == 'edit' && !$this->checkEditId('com_folio.edit.folio', $id))
        {
            $this->setMessage(Text::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id), 'error');
            $this->setRedirect(Route::_('index.php?option=com_folio&view=folios', false));
            return false;
        }
        parent::display();
        return $this;
    }
}