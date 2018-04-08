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
class TableTeacher extends JTable
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
    var $Forename = null;
	var $Surname = null;
	var $Subject0 = null;
	var $Subject1 = null;
	var $Subject2 = null;
 
    /**
     * Constructor
     *
     * @param object Database connector object
     */
    function TableTeacher(& $db) {
        parent::__construct('#__teachers', 'id', $db);
    }
}