<?php
/**
 * Hello Model for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_2
 * @license    GNU/GPL
 */
 
// No direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.model' );
 
/**
 * Hello Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ReplacementsModelReplacements extends JModel
{
    /**
    * Gets the greeting
    * @return string The greeting to be displayed to the user
    */
    // function getGreeting()
    // {
        // return "Nowy system zastępstw w fazie beta. Wróć później.";
    // }
	function getReplacementsId()
	{
	   $db =& JFactory::getDBO();
	   
	   $query = 'SELECT * FROM #__replacementsall WHERE TargetDate = CURDATE() ORDER BY TargetDate LIMIT 1';
	   $db->setQuery( $query );
	   $currentrow = $db->loadObject();
	 
	   return $currentrow;
	}
	function getReplacements($currentid)
	{
	   $db =& JFactory::getDBO();
	   
	   $query = 'SELECT * FROM #__replacements'.$currentid.' ORDER BY ClassId, HourId, TeacherId, SubjectId, PlaceId, TeacherAbsentId';
	   $db->setQuery( $query );
	   $currenttable = $db->loadObjectList();
	 
	   return $currenttable;
	}
	function getReplacementsNextId()
	{
	   $db =& JFactory::getDBO();
	   
	   $query = "SELECT * FROM #__replacementsall WHERE TargetDate > CURDATE() ORDER BY TargetDate LIMIT 1";
	   $db->setQuery( $query );
	   $nextrow = $db->loadObject();
	 
	   return $nextrow;
	}
	function getReplacementsNext($nextid)
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__replacements'.$nextid.' ORDER BY ClassId, HourId, TeacherId, SubjectId, PlaceId, TeacherAbsentId';
	   $db->setQuery( $query );
	   $nexttable = $db->loadObjectList();
	 
	   return $nexttable;
	}
	
	
	
	function getClasses()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__classes ORDER BY id';
	   $db->setQuery( $query );
	   $classestable = $db->loadObjectList();
	 
	   return $classestable;
	}
	function getTeachers()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__teachers ORDER BY id';
	   $db->setQuery( $query );
	   $teacherstable = $db->loadObjectList();
	 
	   return $teacherstable;
	}
	function getSubjects()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__subjects ORDER BY id';
	   $db->setQuery( $query );
	   $subjectstable = $db->loadObjectList();
	 
	   return $subjectstable;
	}
	function getPlaces()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__places ORDER BY id';
	   $db->setQuery( $query );
	   $placestable = $db->loadObjectList();
	 
	   return $placestable;
	}
	function getHours()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__hours ORDER BY id';
	   $db->setQuery( $query );
	   $hourstable = $db->loadObjectList();
	 
	   return $hourstable;
	}
	function getHourVars()
	{
	   $db =& JFactory::getDBO();
	 
	   $query = 'SELECT * FROM #__hours ORDER BY id';
	   $db->setQuery( $query );
	   $hourvarstable = $db->loadObjectList();
	 
	   return $hourvarstable;
	}
}