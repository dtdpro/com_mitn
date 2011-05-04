<?php

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

class MitNModelMitN extends JModel
{
	
	function getNewsItems($days,$pageNav)
	{
		$db =& JFactory::getDBO();
		$query  = 'SELECT * FROM #__mitn';
		$query .= ' WHERE published = 1';
		if ($days) $query .= '&& mitn_date BETWEEN DATE(NOW()) AND DATE_SUB(NOW(),INTERVAL '.$days.' DAY)';
		$query .= ' ORDER BY mitn_date DESC';
		$db->setQuery($query,$pageNav->limitstart,$pageNav->limit); 
		$list = $db->loadObjectList();
		return $list;
	}
	
	function getTotalNewsItems($days) {
		$db =& JFactory::getDBO();
		$query  = 'SELECT * FROM #__mitn';
		$query .= ' WHERE published = 1';
		if ($days) $query .= '&& mitn_date BETWEEN DATE(NOW()) AND DATE_SUB(NOW(),INTERVAL '.$days.' DAY)';
		$query .= ' ORDER BY mitn_date DESC';
		$db->setQuery($query); 
		$list = $db->loadObjectList();
		$db->query();
		return $db->getNumRows();
	}
	
	function getNewsItem($item) {
		
		$db =& JFactory::getDBO();
		$query  = 'SELECT * FROM #__mitn';
		$query .= ' WHERE published = 1';
		if ($days) $query .= '&& mitn_id = '.$item;
		$db->setQuery($query); 
		$list = $db->loadObject();
		return $list;
	}
	
	function logHit($item) {
		$db =& JFactory::getDBO();
		$user =& JFactory::getUser();
		$sess =& JFactory::getSession();
		$q='INSERT INTO #__mitn_track (mt_item,mt_user,mt_session) VALUES ('.$item.','.$user->id.',"'.$sess->getId().'")';
		$db->setQuery($q); $db->query();
	}
	
}
