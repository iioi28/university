<table border=1 width='100%'>
<tr>
<td>Code<td>Course ID<td>Date / Time<td>Type<td>Classroom#<td colspan=2>More
<?php
foreach($view_data->result() as $exam){  ?>
  <tr>
	<td><?php echo $exam->code; ?>
	<td><?php echo $exam->courses_id; ?>
	<td><?php echo $exam->date; ?>
	<td><?php echo $exam->type; ?>
	<td><?php echo $exam->classroom; ?>
	<td><?php if(date('Y-m-d H:i:s') > $exam->date){?>
		<a href="<?php echo base_url().'index.php/exams/results_exam/'.$exam->code; ?>" >Results Details</a>
	<?php }else{ ?>
		<a href="<?php echo base_url().'index.php/exams/postpone_exam/'.$exam->code; ?>" >Postpone</a>
	<?php } ?>
		<td><a href="<?php echo base_url().'index.php/exams/remove_exam/'.$exam->code; ?>" >remove</a>
	<br>
<?php
}
?>
