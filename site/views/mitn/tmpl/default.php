<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php
echo '<div class="componentheading">'.$this->pagetit.'</div>';
echo '<ul>';
foreach ($this->items as $item) {
	echo '<li>'.date('Y-m-d',strtotime($item->mitn_date)).' - <a href="index.php?option=com_mitn&item='.$item->mitn_id.'">'.$item->mitn_title.'</a></li>';
}
echo '</ul><div align="center">';
echo $this->pageNav->getPagesLinks(); //$this->pageNav->getResultsCounter().
echo '</div>';
?>
