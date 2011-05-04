<?php

jimport( 'joomla.application.component.view');
jimport('joomla.html.pagination');
class MitNViewMitN extends JView
{
	function display($tpl = null)
	{
		$mainframe =& JFActory::getApplication();
		$user=JFactory::getUser();
		$userid=$user->id;
		$model =& $this->getModel();
		$item = JRequest::getInt('item',0);
		if ($item) {
			$iteminfo=$model->getNewsItem($item);
		} 
		if ($iteminfo) {
			$model->logHit($item);
			$mainframe->redirect($iteminfo->mitn_url);
		} else {
			$params = $mainframe->getPageParameters();
			$days = $params->get('days',0);
			$arts = $params->get('arts',15);
			$pagetit = $params->get('pagetit','News Archives');
			$limit = $arts;
			$limitstart	= JRequest::getVar('limitstart', 0, '', 'int');
			$total = $model->getTotalNewsItems($days);
			$pageNav = new JPagination( $total, $limitstart, $limit );
			$items=$model->getNewsItems($days,$pageNav);
			
			$this->assignRef('pagetit',$pagetit);
			$this->assignRef( 'items',	$items );
			$this->assignRef('pageNav',		$pageNav);
			$this->assignRef('total',		$total);
			$this->assignRef('limitstart',		$limitstart);
			
			
			parent::display($tpl);
		}
	}
}
?>
