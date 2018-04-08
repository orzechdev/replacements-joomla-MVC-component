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
class ReplacementsViewHour extends JView
{
	/**
	 * display method of Hello view
	 * @return void
	 **/
	function display($tpl = null)
	{
		//get the hello
		$hour =& $this->get('Data');
		$isNew = ($hour->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'Zastępstwa wersja beta' ).': <small><small>[ ' . $text.' ]</small></small>', 'repllogo' );
		JToolBarHelper::save();
		JToolBarHelper::custom('save2New', 'save2new.png', 'save2new.png', 'Zaspisz i utwórz'/*'JTOOLBAR_SAVE_AND_NEW'*/, false);
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}

		$this->assignRef('hour', $hour);

		parent::display($tpl);
	}
}