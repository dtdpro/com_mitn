<?php
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class MitNModelMitNE extends JModel
{
	function __construct()
	{
		parent::__construct();

		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
	}

	function setId($id)
	{
		$this->_id		= $id;
		$this->_data	= null;
	}
	
	function &getData()
	{
		if (empty( $this->_data )) {
			$query = ' SELECT * FROM #__mitn '.
					'  WHERE mitn_id = '.$this->_id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			
		}
		return $this->_data;
	}

	function store()
	{
		$row =& $this->getTable();

		$data->mitn_id = JRequest::getVar('mitn_id');
		$data->mitn_title = JRequest::getVar('mitn_title');
		$data->mitn_desc =  mysql_escape_string(JRequest::getVar('mitn_desc',null,'default','string',4));
		$data->mitn_url = JRequest::getVar('mitn_url');
		$data->mitn_date = JRequest::getVar('mitn_date');
		$data->mitn_user = JRequest::getVar('mitn_user');
		$data->published = JRequest::getVar('published');
		if (!$data->mitn_date) $data->mitn_date = date("Y-m-d");
		
		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		if (!$row->check()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		
		if (!$row->store()) {
			$this->setError( $this->_db->getErrorMsg() );
			return false;
		}

		return true;
	}

	function delete()
	{
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );

		$row =& $this->getTable();

		if (count( $cids ))
		{
			foreach($cids as $cid) {
				if (!$row->delete( $cid )) {
					$this->setError( $row->getErrorMsg() );
					return false;
				}
			}						
		}
		return true;
	}
	
	function publish($cid = array(), $publish = 1)
	{
		
		if (count( $cid ))
		{
			$cids = implode( ',', $cid );

			$query = 'UPDATE #__mitn'
				. ' SET published = ' . intval( $publish )
				. ' WHERE mitn_id IN ( '.$cids.' )'
				
			;
			$this->_db->setQuery( $query );
			if (!$this->_db->query()) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}		
	}
	


			

}
?>
