<?php
/**
 * Hellos Model for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_5
 * @license        GNU/GPL
 */
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );
 
jimport( 'joomla.application.component.model' );
 
/**
 * Hello Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ReplacementsModelHour extends JModel
{
	/**
	 * Constructor that retrieves the ID from the request
	 *
	 * @access    public
	 * @return    void
	 */
	function __construct()
	{
		parent::__construct();
	 
		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
	}
	
	
	
	/**
	 * Method to set the hello identifier
	 *
	 * @access    public
	 * @param    int Hello identifier
	 * @return    void
	 */
	function setId($id)
	{
		// Set id and wipe data
		$this->_id      = $id;
		$this->_data    = null;
	}
	/**
	 * Method to get a hello
	 * @return object with data
	 */
	 
	function &getData()
	{
		// Load the data
		if (empty( $this->_data )) {
			$query = ' SELECT * FROM #__hours '.
					'  WHERE id = '.$this->_id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			$this->_data->NumHour = null;
			$this->_data->StartHour = null;
			$this->_data->EndHour = null;
			$this->_data->TypeHour = null;
		}
		return $this->_data;
	}
	
	/**
	 * Method to store a record
	 *
	 * @access    public
	 * @return    boolean    True on success
	 */
	function store()
	{
		$row =& $this->getTable();
	 
		$data = JRequest::get( 'post' );
		// Bind the form fields to the hello table
		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
	 
		// Make sure the hello record is valid
		if (!$row->check()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		
		// Sprawdzanie czy godzina nie jest wieksza lub rowne 24 i minuty 60 albo mniejsze niz 0
		$starth = JRequest::getVar('StartH', '00', 'post');
		$startm = JRequest::getVar('StartM', '00', 'post');
		$endh = JRequest::getVar('EndH', '00', 'post');
		$endm = JRequest::getVar('EndM', '00', 'post');
		if ($starth>=24 or $startm>=60 or $endh>=24 or $endm>=60 or $starth<0 or $startm<0 or $endh<0 or $endm<0){
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		$row->StartHour = $starth.':'.$startm.':00';
		$row->EndHour = $endh.':'.$endm.':00';
		// Nastepnie wykonuje sie funkcja $row->store() w ponizszej instrukcji warunkowej if do zapisu nowych rekordow
	 
		// Store the web link table to the database
		if (!$row->store()) {
			$this->setError( $row->getErrorMsg() );
			return false;
		}
	 
		return true;
	}
	
	/**
	 * Method to delete record(s)
	 *
	 * @access    public
	 * @return    boolean    True on success
	 */
	function delete()
	{
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$row =& $this->getTable();
	 
		if (count( $cids )) {
			foreach($cids as $cid) {
				if (!$row->delete( $cid )) {
					$this->setError( $row->getErrorMsg() );
					return false;
				}
			}
		}
		return true;
	}
}