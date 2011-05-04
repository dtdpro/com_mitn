<?php
defined('_JEXEC') or die('Restricted access');

class TableMitNE extends JTable
{
	var $mitn_id = null;
	var $mitn_title = null;
	var $mitn_url = null;
	var $mitn_desc = null;
	var $mitn_date = null;
	var $mitn_user = null;
	var $published = null;
	
	function TableMitNE(& $db) {
		parent::__construct('#__mitn', 'mitn_id', $db);
	}
}
?>
