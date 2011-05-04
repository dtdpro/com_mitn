<?php
defined('_JEXEC') or die();

class MitNControllerMitNE extends MitNController
{
	function __construct()
	{
		parent::__construct();

		$this->registerTask( 'add'  , 	'edit' );
	}

	function edit()
	{
		JRequest::setVar( 'view', 'mitne' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	function save()
	{
		$model = $this->getModel('mitne');

		if ($model->store($post)) {
			$msg = JText::_( 'News Item Added' );
		} else {
			$msg = JText::_( 'Error Saving News Item' );
		}

		$link = 'index.php?option=com_mitn';
		$this->setRedirect($link, $msg);
	}

	function remove()
	{
		$model = $this->getModel('mitne');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More News items Could not be Deleted' );
		} else {
			$msg = JText::_( 'News Item(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_mitn', $msg );
	}

	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_mitn', $msg );
	}
	
	function publish()
	{
		global $mainframe;

		$cid 	= JRequest::getVar( 'cid', array(0), 'post', 'array' );

		if (!is_array( $cid ) || count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select an item to publish' ) );
		}

		$model = $this->getModel('mitne');
		if(!$model->publish($cid, 1)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_mitn' );
	}


	function unpublish()
	{
		global $mainframe;

		$cid 	= JRequest::getVar( 'cid', array(0), 'post', 'array' );

		if (!is_array( $cid ) || count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select an item to unpublish' ) );
		}

		$model = $this->getModel('mitne');
		if(!$model->publish($cid, 0)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_mitn' );
	}
}
?>
