
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
	<head>
		<link rel="stylesheet" href="<?=base_url()?>css/layout.css" type="text/css" />
		<script type="text/javascript" src="<?=base_url()?>js/core.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/ajax_core.js"></script>
	</head>
<div id="kankors_div">
	<body>
		<table width="100%">
			<tr>
				<td width="20%" align="center"><?php echo $total?></td>
        		<td><?php echo $links?></td>
			</tr>
		</table>
		<?php if($details!=null)
		{ ?>
			<table border="1" width="100%">
				<tr>
					<th><?=$this->lang->line('kankor_code');?></th>
					<th><?=$this->lang->line('kankor_supervisor');?></th>
					<th><?=$this->lang->line('kankor_location');?></th>
					<th><?=$this->lang->line('kankor_date');?></th>
					<th><?=$this->lang->line('kankor_operation');?></th>
				</tr>
				<?php foreach ($details->result() as $key) {?>
				<tr>
					<td><?=$key->code?></td>
					<td><?=$key->supervisor?></td>
					<td><?=$key->location?></td>
					<td><?=$key->date?></td>
					<td><a href="#">View</a> | <a href="#">Delete</a></td>
				</tr>	
				<?php
				}
				?>
			</table>
			<input type="button" value="<?=$this->lang->line('kankor_add')?>" onclick="parent.location='<?=base_url()?>kankor/add_kankor'" />	
		<?php
		}
		else
		{
			echo "nothing";		
		}
		?>
	</body>
</html>
</div>