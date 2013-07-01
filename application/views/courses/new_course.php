<style>
  label{float:left;width:200px;}
	input,select,textarea{width:200px;}
	#course_days{padding:10px;background:#ccc;}
</style>
<Script type="text/javascript">
	$(document).ready(function(){
 
   // $("#qp-stuff").hide();
	var counter = 2;
 
    $("#add").click(function () {
 
 
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
 
	newTextBoxDiv.after().html('<br><label>Days ' + counter + ' </label>'+
			'<select name=days_'+counter+' >'+
			//'<select name="days[]" >'+
				'<option value="0">Saturdays</option>'+
				'<option value="1">Sundays</option>'+
				'<option value="2">Mondays</option>'+
				'<option value="3">Tuesdays</option>'+
				'<option value="4">Wednesdays</option>'+
				'<option value="5">Thursdays</option>'+
				'<option value="6">Fridays</option>'+
			'</select> <br> '+
			' <label>From</label> '+
				'<input type="text" name="time_from_'+counter+'" required /> <br> '+
				//'<input type="text" name="time_from[]" required /> <br> '+
			' <label>To</label>'+
				'<input type="text" name="time_to_'+counter+'" required /> <br>  ');
				//'<input type="text" name="time_to[]" required /> <br>  ');
 
	newTextBoxDiv.appendTo("#course_days");
 
 
	counter++;
     });
 
     $("#remove").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
 
	counter--;
 
        $("#TextBoxDiv" + counter).remove();
 
     });
});
</script>
<form action="<?php echo base_url().'index.php/courses/add_new_course';?>" method="post" >

<label> Code</label>
<input type="text" name="code" required />
<br>
<label> Subject ID </label>
<input type="text" name="sub_id" required />
<br>
<label> Lecturer ID </label>
	<input type="text" name="lec_id" required />
<br>
<label> Start Date </label>
	<input type="text" name="s_date" required />
<br>
<label> End Date</label>
	<input type="text" name="e_date" required />
<br>
<div id="course_days">
	<label>Days 1</label>
	<select name="days_1" >
		<option value="0">Saturdays</option>
		<option value="1">Sundays</option>
		<option value="2">Mondays</option>
		<option value="3">Tuesdays</option>
		<option value="4">Wednesdays</option>
		<option value="5">Thursdays</option>
		<option value="6">Fridays</option>
	</select>
	<br>
	<label>From</label>
		<input type="text" name="time_from_1" required />
	<br>
	<label>To</label>
		<input type="text" name="time_to_1" required />
	<br>
</div>
<div id="add_remove_btns">
	<img src="" id="add" title="add" />
	<img src="" id="remove" title="remove" />
</div>
<br>
<label> No. Sessions </label>
	<input type="text" name="sessions" required />
<br>
<label> No. Credits </label>
<input type="text" name="credits" required />
<br>
<label> Classroom </label>
<input type="text" name="classroom" required />
<br>
<label> Description </label>
<textarea name="desc" ></textarea>
<br>
<input type="submit" name="submit" value="Save" />
<br>
