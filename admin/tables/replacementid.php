<?php
/**
 * Hello World table class
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license        GNU/GPL
 */
 
// No direct access
defined('_JEXEC') or die('Restricted access');
 
/**
 * Hello Table class
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class TableReplacementid extends JTable
{
    /**
     * Primary Key
     *
     * @var int
     */
    var $id = null;
 
    /**
     * @var string
     */
    var $ClassId = null;
    var $TeacherId = null;
    var $SubjectId = null;
    var $PlaceId = null;
    var $HourId = null;
    var $HourVar = null;
    var $TeacherAbsentId = null;
	
	//$model = &$this->getObject()->getModel();
	//$currentid = $model->getTablePostId;
	
    /**
     * Constructor
     *
     * @param object Database connector object
     */
    function TableReplacementid(& $db) {
        parent::__construct('#__replacements'.$db->id, 'id', $db);
    }
}