<form action="<?php echo base_url().'index.php/subjects/add_new_subject';?>" method="post" >

<label> Subject Code </label>
<input type="text" name="code" />
<br>
<label> Title (en) </label>
<input type="text" name="title_en" />
<br>
<label> Title (da) </label>
<input type="text" name="title_da" />
<br>
<input type="submit" name="submit" value="Save" />
<br>
