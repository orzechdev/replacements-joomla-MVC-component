<?php
/**
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_1
 * @license    GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the HelloWorld Component
 *
 * @package    HelloWorld
 */

class ReplacementsViewReplacements extends JView
{
	function display($tpl = null)
	{
		$model = &$this->getModel();
		
		
		$replTitle = 'Zastępstwa';
		$this->assignRef( 'replTitle', $replTitle );
		$replDescription = '(Uwaga!! Wersja testowa, może zawierać niepoprawne zastępstwa.)';
		$this->assignRef( 'replDescription', $replDescription );
		$replInfo = 'Brak zastępstw.';
		$this->assignRef( 'replInfo', $replInfo );
		
		
		$currentrow = $model->getReplacementsId();
		$this->assignRef( 'currentrow', $currentrow );
		$currenttable = $model->getReplacements($currentrow->id);
		$this->assignRef( 'currenttable', $currenttable );
		
		$replcurdate = 'Dzisiaj';
		$this->assignRef( 'replcurdate', $replcurdate );
		
		
		$nextrow = $model->getReplacementsNextId();
		$this->assignRef( 'nextrow', $nextrow );
		$nexttable = $model->getReplacementsNext($nextrow->id);
		$this->assignRef( 'nexttable', $nexttable );
		
		$timenew = strtotime($nextrow->TargetDate);
		$today = date("Y-m-d");  
		$timenow = strtotime($today);
		
		$time_diff = $timenew - $timenow;
		
		if($time_diff/3600/24 == 1){
			$replnextdate = 'Jutro';
		}else{
			$replnextdate = mb_convert_case(strftime('%A', $timenew), MB_CASE_TITLE, "UTF-8");
		}
		$this->assignRef( 'replnextdate', $replnextdate );
		
		
		
		$classestable = $model->getClasses();
		// add a first option to the list without looking at the database result
		$classeslist[] = '';//'Klasa - brak';
		//now fill the array with your database result
		foreach($classestable as $key=>$value) :
			$classeslist[] = $value->NumClass.$value->TypeClass.$value->GroupClass;
		endforeach;
		$this->assignRef( 'classeslist', $classeslist );
		
		
		$teacherstable = $model->getTeachers();
		// add a first option to the list without looking at the database result
		$teacherslist[] = '';//'Nauczyciel - brak';
		//now fill the array with your database result
		foreach($teacherstable as $key=>$value) :
			$teacherslist[] = $value->Forename[0].'. '.$value->Surname;
		endforeach;
		$this->assignRef( 'teacherslist', $teacherslist );
		
		
		$subjectstable = $model->getSubjects();
		// add a first option to the list without looking at the database result
		$subjectslist[] = '';//'Przedmiot - brak';
		//now fill the array with your database result
		foreach($subjectstable as $key=>$value) :
			$subjectslist[] = $value->GroupSubject.' - '.$value->NameSubject;
		endforeach;
		$this->assignRef( 'subjectslist', $subjectslist );
		
		
		$placestable = $model->getPlaces();
		// add a first option to the list without looking at the database result
		$placeslist[] = '';//'Miejsce - brak';
		//now fill the array with your database result
		//$placesnumber = JText::_($value->Number);
		//(strcmp($placesnumber, '0')==0)? $placesnumber = '' : $placesnumber = $value->Number;     <- to nie dziala
		foreach($placestable as $key=>$value) :
			$placeslist[] = $value->NamePlace.' '.(($value->NumPlace == 0)? '' : $value->NumPlace);
		endforeach;
		$this->assignRef( 'placeslist', $placeslist );
		
		
		$hourstable = $model->getHours();
		// add a first option to the list without looking at the database result
		$hourslist[] = '';//'Godzina - brak';
		//now fill the array with your database result
		foreach($hourstable as $key=>$value) :
			$hourslist[] = $value->NumHour.' '.$value->TypeHour;
		endforeach;
		$this->assignRef( 'hourslist', $hourslist );
		
		
		
		parent::display($tpl);
	}
}