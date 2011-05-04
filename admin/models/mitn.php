<?php
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

class MitNModelMitN extends JModel
{
	var $_data;
	var $_total = null;
	var $_pagination = null;

	function __construct()
	{
		parent::__construct();

		global $context;
		$mainframe =& JFactory::getApplication();
		
		$limit			= $mainframe->getUserStateFromRequest( $context.'limit', 'limit', $mainframe->getCfg('list_limit'), 0);
		$limitstart = $mainframe->getUserStateFromRequest( $context.'limitstart', 'limitstart', 0 );
		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);

	}

	function _buildQuery()
	{
		
		$q  = 'SELECT * FROM #__mitn as m ';
		$q .= 'LEFT JOIN #__users as u ON m.mitn_user = u.id ';
		$q .= 'ORDER BY mitn_date DESC, mitn_id DESC';

		return $q;
	}

	function getData()
	{
		if (empty( $this->_data ))
		{
			$query = $this->_buildQuery();
			$this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
		}

		return $this->_data;
	}
	function getTotal()
	{
		if (empty($this->_total))
		{
			$query = $this->_buildQuery();
			$this->_total = $this->_getListCount($query);
		}

		return $this->_total;
	}
	
	function getPagination()
	{
		if (empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination( $this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
		}

		return $this->_pagination;
	}
}
