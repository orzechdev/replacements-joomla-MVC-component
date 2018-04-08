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
class ReplacementsModelReplacement extends JModel
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
			$query = ' SELECT * FROM #__replacementsall '.
					'  WHERE id = '.$this->_id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			$this->_data->TypeReplace = null;
			$this->_data->TargetDate = null;
			//$this->_data->ClassId = null;
			//$this->_data->TeacherId = null;
			//$this->_data->SubjectId = null;
			//$this->_data->PlaceId = null;
			//$this->_data->HourId = null;
			//$this->_data->HourVar = null;
			//$this->_data->TeacherAbsentId = null;
			$this->_data->CreateDateTime = null;
			$this->_data->EditDateTime = null;
		}
		return $this->_data;
	}
	
	function getTableById($currentid)
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__replacements'.$currentid.' ORDER BY ClassId, HourId, TeacherId, SubjectId, PlaceId, TeacherAbsentId';
	   $db->setQuery( $query );
	   $currenttable = $db->loadObjectList();
	 
	   return $currenttable;
	}
	
	
	
	function getClasses()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__classes ORDER BY TypeClass, NumClass';
	   $db->setQuery( $query );
	   $classestable = $db->loadObjectList();
	 
	   return $classestable;
	}
	function getTeachers()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__teachers ORDER BY Surname';
	   $db->setQuery( $query );
	   $teacherstable = $db->loadObjectList();
	 
	   return $teacherstable;
	}
	function getSubjects()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__subjects ORDER BY GroupSubject, NameSubject';
	   $db->setQuery( $query );
	   $subjectstable = $db->loadObjectList();
	 
	   return $subjectstable;
	}
	function getPlaces()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__places ORDER BY AddressPlace, FloorPlace, NamePlace, NumPlace';
	   $db->setQuery( $query );
	   $placestable = $db->loadObjectList();
	 
	   return $placestable;
	}
	function getHours()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__hours ORDER BY TypeHour, NumHour';
	   $db->setQuery( $query );
	   $hourstable = $db->loadObjectList();
	 
	   return $hourstable;
	}
	function getHourVars()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__hours ORDER BY Type, Number';
	   $db->setQuery( $query );
	   $hourvarstable = $db->loadObjectList();
	 
	   return $hourvarstable;
	}
	
	
	
/*	function getTablePostId()
	{
	   $currentid = JRequest::getVar('id', '0', 'post');
	 
	   return $currentid;
	}*/
	
	/**
	 * Method to store a record
	 *
	 * @access    public
	 * @return    boolean    True on success
	 */
	function store()
	{
//		$row =& $this->getTable();
//	 
//		$data = JRequest::get( 'post' );
//		// Bind the form fields to the hello table
//		if (!$row->bind($data)) {
//			$this->setError($this->_db->getErrorMsg());
//			return false;
//		}
//	 
//		// Make sure the hello record is valid
//		if (!$row->check()) {
//			$this->setError($this->_db->getErrorMsg());
//			return false;
//		}
//	 
//		// Store the web link table to the database
//		if (!$row->store()) {
//			$this->setError( $row->getErrorMsg() );
//			return false;
//		}
		
		
		//$row =& $this->getTable('replacementid');
		$currentid = JRequest::getVar('id', '0', 'post');
		//$db =& JFactory::getDBO();
		$db = $this->getDBO();
		if($currentid==0){
			$query = "INSERT INTO `#__replacementsall` (`TypeReplace`, `TargetDate`, `CreateDateTime`, `EditDateTime`) VALUES ('".JRequest::getVar('TypeReplace', '', 'post')."', '".JRequest::getVar('TargetDate', '', 'post')."', NOW(), NOW());";
			$db->setQuery($query);
			$db->query();
			
			$newid = "SELECT MAX(id) FROM #__replacementsall;"+1;
			
						
			$querynew = "DROP TABLE IF EXISTS `#__replacements".$newid."`;
 
			CREATE TABLE `#__replacements".$newid."` (
			  `id` int(11) NOT NULL auto_increment,
			  `ClassId` int(11) NOT NULL,
			  `TeacherId` int(11) NOT NULL,
			  `SubjectId` int(11) NOT NULL,
			  `PlaceId` int(11) NOT NULL,
			  `HourId` int(11) NOT NULL,
			  `HourVar` int(1) NOT NULL,
			  `TeacherAbsentId` int(11) NOT NULL,
			  `SubjectAbsentId` int(11) NOT NULL,
			  `PlaceAbsentId` int(11) NOT NULL,
			  `HourAbsentId` int(11) NOT NULL,
			  `HourAbsentVar` int(1) NOT NULL,
			  PRIMARY KEY  (`id`)
			) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;";
			
//			//$columns = implode("`, `",array_keys($newtable));
//			//$escaped_values = array_map('mysql_real_escape_string', array_values($newtable));
//			$columns = "`TeacherId`, `ClassId`, `SubjectId`, `PlaceId`, `HourId`, `TeacherAbsentId`";
//			//if (count( $newtable )) {
//				$stringtable = "";
//				$comma = "";
//				$ik = 1;
//				foreach($newtable as $cid) {
//					$newtablerow[] = $newtable[$ik];
//					$stringtable  = $stringtable.$comma."(".implode("`, `", $newtablerow).")";
//					//if (!$row->delete( $cid )) {
//					//	$this->setError( $row->getErrorMsg() );
//					//	return false;
//					//}
//					$comma = ", ";
//					$ik++;
//				}
//				$stringtable = $stringtable.";";
//			//};
//			$sqlnew = "INSERT INTO `#__replacements".$newid."`(".$columns.") VALUES ".$stringtable;
//			$querynew = $querynew.$sqlnew;
//			//$newtable = newtable['.$currentid.'][TeacherId];
//			
//			//$db->setQuery( $querynew );
//			//$hourvarstable = $db->loadObject();
			$query = $querynew;
			$db->setQuery($query);
			$db->query();
			
			$newtable = JRequest::getVar( 'newtable', array(0), 'post', 'array' );
			
			$columnsnew = "`TeacherId`, `ClassId`, `SubjectId`, `PlaceId`, `HourId`, `TeacherAbsentId`";
			
			$stringtable = "";
			$comma = "";
			foreach($newtable as $cid) {
				$stringtable  = $stringtable.$comma."(";
				$comma = "";
				foreach($cid as $cell) {
				//for ($i=1; $i<=count( $newtable ); $i++){
					$stringtable  = $stringtable.$comma."'".$cell."'";//ewentualnie JArrayHelper::getValue
					$comma = ", ";
				//};
				};
				$stringtable  = $stringtable.")";
				$comma = ", ";
			};
			
			$sqlnew = "INSERT INTO `#__replacements".$newid."` (".$columnsnew.") VALUES ".$stringtable.";";
			
			$query = $sqlnew;
			$db->setQuery($query);
			$db->query();
		}else{
			$query = "INSERT INTO `#__replacementsall` (`id`, `TypeReplace`, `TargetDate`, `CreateDateTime`, `EditDateTime`) VALUES ('".$currentid."', '".JRequest::getVar('TypeReplace', '', 'post')."', '".JRequest::getVar('TargetDate', '', 'post')."', '".JRequest::getVar('CreateDateTime', '', 'post')."', NOW()) ON DUPLICATE KEY UPDATE TypeReplace=VALUES(TypeReplace), TargetDate=VALUES(TargetDate), CreateDateTime=VALUES(CreateDateTime), EditDateTime=VALUES(EditDateTime);";
			$db->setQuery($query);
			$db->query();
			
			
			$newtable = JRequest::getVar( 'newtable', array(0), 'post', 'array' );
			
			$columnsnew = "`TeacherId`, `ClassId`, `SubjectId`, `PlaceId`, `HourId`, `TeacherAbsentId`";
			
			$stringtable = "";
			$comma = "";
			foreach($newtable as $cid) {
				$stringtable  = $stringtable.$comma."(";
				$comma = "";
				foreach($cid as $cell) {
				//for ($i=1; $i<=count( $newtable ); $i++){
					$stringtable  = $stringtable.$comma."'".$cell."'";//ewentualnie JArrayHelper::getValue
					$comma = ", ";
				//};
				};
				$stringtable  = $stringtable.")";
				$comma = ", ";
			};
			$sqlold = "DELETE FROM `#__replacements".$currentid."`;";
			
			$query = $sqlold;
			$db->setQuery($query);
			$db->query();
			
			$sqlincr = "ALTER TABLE `#__replacements".$currentid."` AUTO_INCREMENT = 1;";
			
			$query = $sqlincr;
			$db->setQuery($query);
			$db->query();
			
			$sqlnew = "INSERT INTO `#__replacements".$currentid."` (".$columnsnew.") VALUES ".$stringtable.";";
			
			$query = $sqlnew;
			$db->setQuery($query);
			$db->query();
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