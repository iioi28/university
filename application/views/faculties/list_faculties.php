<table border=1 width='100%'>
<tr>
<td>Code<td>Title<td>Branch<td>Description<td colspan=2>More
<?php
foreach($view_data->result() as $faculty){  ?>
  <tr>
	<td><?php echo $faculty->code; ?>
	<td><?php echo $faculty->title_en; ?>
	<td><?php echo $faculty->branch_id; ?>
	<td><?php echo $faculty->desc; ?>
	<td><a href="<?php echo base_url().'index.php/faculties/edit_faculty/'.$faculty->code; ?>" >edit</a>
	<td><a href="<?php echo base_url().'index.php/faculties/remove_faculty/'.$faculty->code; ?>" >remove</a>
<?php
	}
?>
