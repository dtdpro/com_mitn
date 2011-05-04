<?php
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

class MitNViewMitNE extends JView
{
	function display($tpl = null)
	{
		$data		=& $this->get('Data');
		$isNew		= ($data->mitn_id < 1);
		$user =& JFactory::getUser();
		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'In the News item Manager' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::save();
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}
		

		$this->assignRef('data',$data);
	    $this->assignRef('user',$user);
	    parent::display($tpl);
	}
}
