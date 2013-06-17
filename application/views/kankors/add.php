
<h1 class="title">Invoice Insert</h1>
<?php
$attributes = array('id' => 'add_form','name' => 'add_form');
echo form_open(base_url().'kankor/add_kankor');
?>
	<table cellpadding="0" cellspacing="0" width="50%">
		<tr>
			<td width="30%"><?=$this->lang->line('kankor_code')?>:</td>
			<td><input type="text" id="code" name="code"/></td>
		</tr>
		<tr>
			<td><?=$this->lang->line('kankor_supervisor')?>:</td>
			<td><input type="text" id="supervisor" name="supervisor"/></td>
		</tr>
		<tr>
			<td><?=$this->lang->line('kankor_location')?>:</td>
			<td><select name="percentage">
				<?php echo $percentage?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?=$this->lang->line('kankor_date')?>:</td>
			<td></td>
		</tr>
	</table>
	<input type="submit" value="Save" onclick="javascript:do_it2('add_form');">
	<input type="button" onclick="parent.location='<?=base_url()?>kankor'" value="Cancel">
<?php form_close();?>
</div> 
 </div>
</div>
