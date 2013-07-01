<meta charset="UTF8" >
<form action="<?php echo base_url().'index.php/faculties/add_new_faculty';?>" method="post" >

<label> Code</label>
<input type="text" name="code" />
<br>
<label> Title (en) </label>
<input type="text" name="title_en" />
<br>
<label> Title (da) </label>
<input type="text" name="title_da" />
<br>
<label> Branch ID</label>
<input type="text" name="branch_id" />
<br>
<label> Description</label>
<textarea name="desc" ></textarea>
<br>
<input type="submit" name="submit" value="Save" />
<br>
