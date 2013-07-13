<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<body>
  <div id="content">
		<table width="100%">
			<tr>
				<td colspan="2" align="center"><h1><?=$this->lang->line('student_list')?></h1></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="button" value="<?=$this->lang->line('student_add')?>" onclick="parent.location='<?=base_url()?>students/add'" />
					<input type="button" value="<?=$this->lang->line('back')?>" onclick="parent.location='<?=base_url()?>'" />	
				</td>
			</tr>
			<tr>
				<td width="20%" align="center"><?php echo $total?></td>
        		<td><?php echo $links?></td>
			</tr>
		</table>
		<table border="1" width="100%">
		<?php if($details!=null)
		{ ?>
			
			<tr>
				<th><?=$this->lang->line('student_code');?></th>
				<th><?=$this->lang->line('student_faculty');?></th>
				<th><?=$this->lang->line('student_dep');?></th>
				<th><?=$this->lang->line('student_regdate');?></th>
				<th><?=$this->lang->line('operation');?></th>
			</tr>
			<?php foreach ($details->result() as $key) {?>
			<tr>
				<td><?=$key->code?></td>
				<td><?=$key->faculty_id?></td>
				<td><?=$key->departments_id?></td>
				<td><?=$key->reg_date?></td>
				<td><a href="#">View</a> | <a href="#">Delete</a></td>
			</tr>	
			<?php
			}
			?>
		
		<?php
		}
		else
		{ ?>
			<tr>
				<td align="center" style="color: red;"><?php echo $this->lang->line('empty');?></td>
			</tr>
		</table>		
		<?php
		}
		?>
		</div>
	</body>
</html>
