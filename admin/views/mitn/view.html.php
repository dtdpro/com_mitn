<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

class MitNViewMitN extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(   JText::_( 'In the News Item Manager' ), 'generic.png' );
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		
		
		// Get data from the model
		$items		= & $this->get( 'Data');
		$pagination = & $this->get( 'Pagination' );
		
		$this->assignRef('items',		$items);
	    $this->assignRef('pagination',$pagination);
	   
		parent::display($tpl);
	}
}
