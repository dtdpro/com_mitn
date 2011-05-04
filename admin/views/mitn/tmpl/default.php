<?php defined('_JEXEC') or die('Restricted access'); ?>
<form action="" method="post" name="adminForm">
<div id="editcell">

	<table class="adminlist">
	<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'ID' ); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>			
			<th>
				<?php echo JText::_( 'Title' ); ?>
			</th>
            <th>
				<?php echo JText::_( 'URL' ); ?>
			</th>
            <th width="120">
				<?php echo JText::_( 'Date' ); ?>
			</th>
			<th width="50">
				<?php echo JText::_( 'Published' ); ?>
			</th>
			<th width="80">
				<?php echo JText::_( 'Added By' ); ?>
			</th>
		</tr>			
	</thead>
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)
	{
		$row = &$this->items[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->mitn_id );
		$link 		= JRoute::_( 'index.php?option=com_mitn&controller=mitne&task=edit&cid[]='. $row->mitn_id );
		$published 	= JHTML::_('grid.published',   $row, $i  );
		
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $row->mitn_id; ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
			<td>
				<?php echo '<a href="'.$link.'">'.$row->mitn_title.'</a>'; ?>
			</td>
            <td>
				<?php echo $row->mitn_url; ?>
			</td>
            <td>
				<?php echo date('Y-m-d',strtotime($row->mitn_date)); ?>
			</td>
			<td>
				<?php echo $published; ?>
			</td>
            <td>
				<?php echo $row->username; ?>
			</td>
		</tr>
      
		<?php
		$k = 1 - $k;
	}
	?>  
    <tfoot>
		<tr><td colspan="7">
			<?php echo $this->pagination->getListFooter(); ?>
		</td></tr>
	</tfoot>
	</table>
</div>

<input type="hidden" name="option" value="com_mitn" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="mitne" />
</form>
