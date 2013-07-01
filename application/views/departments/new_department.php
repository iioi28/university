<form action="<?php echo base_url().'index.php/departments/add_new_department';?>" method="post" >

<label> Code</label>
<input type="text" name="code" />
<br>
<label> Title (en) </label>
<input type="text" name="title_en" />
<br>
<label> Title (da) </label>
<input type="text" name="title_da" />
<br>
<label> Faculty ID</label>
<input type="text" name="faculty_id" />
<br>
<label> Description</label>
<textarea name="desc" ></textarea>
<br>
<input type="submit" name="submit" value="Save" />
<br>
