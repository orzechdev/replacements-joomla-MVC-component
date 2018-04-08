<?php
/**
 * Hellos View for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_5
 * @license        GNU/GPL
 */
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view' );
 
/**
 * Hellos View
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class ReplacementsViewReplacements extends JView
{
    /**
     * Hellos view display method
     * @return void
     **/
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'Zastępstwa wersja beta' ), 'repllogo' );
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();
 
        // Get data from the model
        $items =& $this->get( 'Data');
 
        $this->assignRef( 'items', $items );
		
		//echo("<h2>Administracja zastępstw w fazie beta. Wróć później.</h2>");
		
        parent::display($tpl);
    }
}