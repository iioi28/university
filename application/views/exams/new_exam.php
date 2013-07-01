<form action="<?php echo base_url().'index.php/exams/add_new_exam';?>" method="post" >

<label> Code </label>
<input type="text" name="code" value="<?php echo set_value('code'); ?>" />
<br>
<label> Course Code </label>
<input type="text" name="course_code" value="<?php echo set_value('course_code'); ?>" />
<br>
<label> Type </label>
<select name="type">
  <option value="Quiz">Quiz</option>
	<option value="Mid-Term">Mid-Term</option>
	<option value="Final">Final</option>
	<option value="Other">Othere</option>
</select>
<br>
<label> Date & Time </label>
<input type="text" name="date" value="<?php echo set_value('date'); ?>" />
<br>
<label> Room# </label>
<input type="text" name="room_no" value="<?php echo set_value('room_no'); ?>" />
<br>
<label> Description </label>
<textarea name="desc" ><?php echo set_value('desc'); ?> </textarea>
<br>
<input type="submit" name="submit" value="Save" />
<hr>
<?php echo validation_errors(); ?>
