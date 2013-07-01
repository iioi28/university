<table border=1 width="100%">
<tr>
<td>Code<td>Title<td>Faculty<td colspan=2>More
<?php
foreach($view_data->result() as $department){ ?>
  <tr>
	<td><?php echo $department->code; ?>
	<td><?php echo $department->title_en; ?>
	<td><?php echo $department->faculty_id; ?>
	<td><a href="<?php echo base_url().'index.php/departments/edit_department/'.$department->code; ?>" >edit</a>
	<td><a href="<?php echo base_url().'index.php/departments/remove_department/'.$department->code; ?>" >remove</a>
<?php
	}
?>
