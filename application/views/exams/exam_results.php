<table border=1 width='100%'>
<thead>
  <tr>
		<th>Student ID<th>Score<th>Result
	</tr>
</thead>
<?php
//var_dump($view_data);exit;
$no = 1;
foreach($view_data->result() as $exam){  ?>
	<tr>
	<td><?php echo $exam->code; ?>
	<td><?php echo $exam->courses_id; ?>
	<td><?php echo $exam->date; ?>
	<td><?php echo $exam->type; ?>
	<td><?php echo $exam->classroom; ?>
	<td><?php if(date('Y-m-d H:i:s') > $exam->date){?>
		<a href="<?php echo base_url().'index.php/exams/results_exam/'.$exam->id; ?>" >Results Details</a>
	<?php }else{ ?>
		<a href="<?php echo base_url().'index.php/exams/postpone_exam/'.$exam->id; ?>" >Postpone</a>
	<?php } ?>
		<td><a href="<?php echo base_url().'index.php/exams/remove_exam/'.$exam->id; ?>" >remove</a>
<?php
}
echo "</table>";
if($no<2){ ?>
	<h2>No results announced for the test yet! </h2>
	<a href="<?php echo base_url().'index.php/exams/announce_exam_results/';?>" > Announce Results Now </a>
<?php } ?>
