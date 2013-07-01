<table border=1 width="100%">
<tr>
<td>Code<td>Title<td colspan=2>More
<?php
foreach($view_data->result() as $subject){ ?>
  <tr>
	<td><?php echo $subject->code; ?>
	<td><?php echo $subject->title_en; ?>
	<td><a href="<?php echo base_url().'index.php/Subjects/edit_subject/'.$subject->code; ?>" >edit</a>
	<td><a href="<?php echo base_url().'index.php/Subjects/remove_subject/'.$subject->code; ?>" >remove</a>
<?php
	}
?>
