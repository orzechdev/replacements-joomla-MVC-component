<?php
/**
 * Hello Controller for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license             GNU/GPL
 */
 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
/**
 * Hello Hello Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ReplacementsControllerPlaces extends ReplacementsController
{
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask( 'add'  ,   'edit' );
		$this->registerTask( 'save2New'  ,   'save2New' );
	}

	/**
	 * display the edit form
	 * @return void
	 */
	function edit()
	{
		JRequest::setVar( 'view', 'place' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}
	
	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
		$model = $this->getModel('place');
	 
		if ($model->store($post)) {
			$msg = JText::_( 'Miejsce/sala zapisana!' );
		} else {
			$msg = JText::_( 'Błąd podczas zapisywania miejsca/sali' );
		}
	 
		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_replacements&view=places&layout=default';
		$this->setRedirect($link, $msg);
	}
	
	
	function save2New()
	{
		$model = $this->getModel('place');
	 
		if ($model->store($post)) {
			$msg = JText::_( 'Miejsce/sala zapisana!' );
		} else {
			$msg = JText::_( 'Błąd podczas zapisywania miejsca/sali' );
		}
	 
		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_replacements&controller=places&task=edit&cid[]=0';
		$this->setRedirect($link, $msg);
	}
	
	
	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('place');
		if(!$model->delete()) {
			$msg = JText::_( 'Błąd: Jedna lub więcej miejsc/sal nie mogło być usunięte' );
		} else {
			$msg = JText::_( 'Miejsce(a)/sala(e) usunięte' );
		}
	 
		$this->setRedirect( 'index.php?option=com_replacements&view=places&layout=default', $msg );
	}
	
	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operacja anulowana' );
		$this->setRedirect( 'index.php?option=com_replacements&view=places&layout=default', $msg );
	}
}