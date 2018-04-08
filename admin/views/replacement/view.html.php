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
class ReplacementsViewReplacement extends JView
{
	/**
	 * display method of Hello view
	 * @return void
	 **/
	function display($tpl = null)
	{
		//get the hello
		$replacement =& $this->get('Data');
		$isNew = ($replacement->id < 1);

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

		$this->assignRef('replacement', $replacement);
		
		
		
		
		$model = &$this->getModel();
		
		
		$currenttable = $model->getTableById($replacement->id);
		$this->assignRef( 'currenttable', $currenttable );
		
		
		$classestable = $model->getClasses();
		// add a first option to the list without looking at the database result
		$classeslist[] = JHTML::_('select.option','',JText::_('Klasa - brak'));
		//now fill the array with your database result
		foreach($classestable as $key=>$value) :
			$classeslist[] = JHTML::_('select.option',$value->id,JText::_($value->NumClass.$value->TypeClass.$value->GroupClass));
		endforeach;
		$this->assignRef( 'classeslist', $classeslist );
		
		
		$teacherstable = $model->getTeachers();
		// add a first option to the list without looking at the database result
		$teacherslist[] = JHTML::_('select.option','',JText::_('Nauczyciel - brak'));
		//now fill the array with your database result
		foreach($teacherstable as $key=>$value) :
			$teacherslist[] = JHTML::_('select.option',$value->id,JText::_($value->Surname.' '.$value->Forename));
		endforeach;
		$this->assignRef( 'teacherslist', $teacherslist );
		
		
		$subjectstable = $model->getSubjects();
		// add a first option to the list without looking at the database result
		$subjectslist[] = JHTML::_('select.option','',JText::_('Przedmiot - brak'));
		//now fill the array with your database result
		foreach($subjectstable as $key=>$value) :
			$subjectslist[] = JHTML::_('select.option',$value->id,JText::_($value->GroupSubject.' - '.$value->NameSubject));
		endforeach;
		$this->assignRef( 'subjectslist', $subjectslist );
		
		
		$placestable = $model->getPlaces();
		// add a first option to the list without looking at the database result
		$placeslist[] = JHTML::_('select.option','',JText::_('Miejsce - brak'));
		//now fill the array with your database result
		//$placesnumber = JText::_($value->Number);
		//(strcmp($placesnumber, '0')==0)? $placesnumber = '' : $placesnumber = $value->Number;     <- to nie dziala
		foreach($placestable as $key=>$value) :
			$placeslist[] = JHTML::_('select.option',$value->id,JText::_($value->NamePlace.' '.(($value->NumPlace == 0)? '' : $value->NumPlace)));
		endforeach;
		$this->assignRef( 'placeslist', $placeslist );
		
		
		$hourstable = $model->getHours();
		// add a first option to the list without looking at the database result
		$hourslist[] = JHTML::_('select.option','',JText::_('Godzina - brak'));
		//now fill the array with your database result
		foreach($hourstable as $key=>$value) :
			$hourslist[] = JHTML::_('select.option',$value->id,JText::_($value->NumHour.' '.$value->TypeHour.' - '.date(' H:i', strtotime($value->StartHour)).' - '.date(' H:i', strtotime($value->EndHour))));
		endforeach;
		$this->assignRef( 'hourslist', $hourslist );
		
		
		/*
		$options[0]['value'] = 'olive';
		$options[0]['text'] = 'Olive';
		$options[1]['value'] = 'onion';
		$options[1]['text'] = 'Onion';
		$options[2]['value'] = 'tomato';
		$options[2]['text'] = 'Tomato';
		$tlist = JHTML::_('select.genericlist',$options, 'toppings[]', 'class="inputbox" size="3" multiple="multiple"','value','text');
		
		$this->assignRef('tlist', $tlist);*/
		
		parent::display($tpl);
	}
}