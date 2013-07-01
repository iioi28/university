<table border=1 width='100%'>
<tr>
<td>Code<td>Subject ID<td>Lecturer ID<td>Sessions<td>Credits<td>Classroom#<td colspan=2>More
<?php
foreach($view_data->result() as $course){  ?>
  <tr>
	<td><?php echo $course->code; ?>
	<td><?php echo $course->subjects_id; ?>
	<td><?php echo $course->lecturers_id; ?>
	<td><?php echo $course->no_sessions; ?>
	<td><?php echo $course->no_credits; ?>
	<td><?php echo $course->classroom; ?>
	<td><a href="<?php echo base_url().'index.php/courses/dismiss_course/'.$course->code; ?>" >dismiss</a>
	<td><a href="<?php echo base_url().'index.php/courses/remove_course/'.$course->code; ?>" >remove</a>
<?php
	}
?>
