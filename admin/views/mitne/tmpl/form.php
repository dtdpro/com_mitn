<?php defined('_JEXEC') or die('Restricted access'); 
$editor=&JFactory::getEditor();
?>
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Main Settings' ); ?></legend>

		<table class="admintable">
			<tr>
			<td width="100" align="right" class="key">
				<label for="greeting">
					<?php echo JText::_( 'Published' ); ?>:
				</label>
			</td>
			<td>
				<?php echo JHTML::_('select.booleanlist','published','',$this->data->published,'Yes','No','published'); ?>
			</td></tr>
			<tr>
			<td width="100" align="right" class="key">
				<label for="greeting">
					<?php echo JText::_( 'Title' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="mitn_title" id="mitn_title" size="60" maxlength="250" value="<?php echo $this->data->mitn_title;?>" />
			</td></tr>
			<tr>
			<td width="100" align="right" class="key">
				<label for="greeting">
					<?php echo JText::_( 'URL' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="mitn_url" id="mitn_url" size="60" maxlength="250" value="<?php echo $this->data->mitn_url;?>" />
			</td></tr>
			
           <tr>
            <td width="100" align="right" class="key">
				<label for="greeting">
					<?php echo JText::_( 'Description' ); ?>:
				</label>
			</td>
			<td><textarea name="mitn_desc" id="mitn_desc" cols="80" rows="20"><?php echo $this->data->mitn_desc; ?></textarea><br />Mobile Apps Only
            	<?php 
//echo $editor->display('mitn_desc',$this->data->mitn_desc,'100%','200','30','30',false); 
?>
            </td>
		</tr>
		 <tr>
			<td width="100" align="right" class="key">
				<label for="greeting">
					<?php echo JText::_( 'Date' ); ?>:
				</label>
			</td>
			<td>
            	<?php echo JHTML::_('calendar',$this->data->mitn_date,'mitn_date','mitn_date','%Y-%m-%d',null); ?> Leave blank or 0000-00-00 for none
			</td></tr>
        </table>
    </fieldset>
            
    
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_mitn" />
<input type="hidden" name="mitn_id" value="<?php echo $this->data->mitn_id; ?>" />
<input type="hidden" name="mitn_user" value="<?php echo ($this->data->mitn_user?$this->data->mitn_user:$this->user->id); ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="mitne" />
</form>
