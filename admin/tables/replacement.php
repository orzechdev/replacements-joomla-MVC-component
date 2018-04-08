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
class TableReplacement extends JTable
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
    var $TypeReplace = null;
    var $TargetDate = null;
    var $CreateDateTime = null;
    var $EditDateTime = null;
 
    /**
     * Constructor
     *
     * @param object Database connector object
     */
    function TableReplacement(& $db) {
        parent::__construct('#__replacementsall', 'id', $db);
    }
}