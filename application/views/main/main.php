
		<style>
			#header h1{
				font:40 calibri;
				color:#484848;
			}
			.homelink{
				text-decoration:none;
			}
			#main_container{
				border:1px solid #ccc;
				border-radius:10px;
				width:880px;
				height:490px;
				margin:auto;
			}
			.item{
				float:left;
				border:1px solid #ccc;
				border-radius:2px;
				width:250px;
				height:100px;
				margin:30px 20px;
				background:#e9e9e9;
				text-align:center;
				font:22 comic;
				color:#494949;
			}
			.item:hover{
				background:#ccc;
				cursor:pointer;
			}
		</style>
<html>
	<div id="kankor_div">

	<title>university</title>
	<body>
		<ul>
			<li><a href="<?=base_url()?>main"><?=$this->lang->line('home')?></a></li>
			<li><a href="<?=base_url()?>kankor"><?=$this->lang->line('kankor')?></a></li>
			<li><a href="<?=base_url()?>kankor"><?=$this->lang->line('kankor_condidates')?></a></li>
			<li><a href="<?=base_url()?>kankor"><?=$this->lang->line('branches')?></a></li>
			
		</ul>
	</div>
		<div id="header">
			<h1 align="center"> select an item </h1>
		<div>
		<div id="main_container">
			<a class="homelink" class="home-link" href="<?php echo base_url().'index.php/konkors';?>">
			<div class="item">
				<h2>Konkors</h2>
			</div>
			</a>
			
			<a class="homelink" href="<?php echo base_url().'index.php/candidates';?>">
			<div class="item">
				<h2>Candidates</h2>
			</div>
			</a>
			
			<a class="homelink" href="<?php echo base_url().'index.php/students';?>">
			<div class="item">
				<h2>Students</h2>
			</div>
			</a>
			
			<a class="homelink" href="<?php echo base_url().'index.php/faculties';?>">
			<div class="item">
				<h2>Faculties</h2>
			</div>
			</a>
			
			<a class="homelink" href="<?php echo base_url().'index.php/departments';?>">
			<div class="item">
				<h2>Departments</h2>
			</div>
			</a>
			
			<a class="homelink" href="<?php echo base_url().'index.php/subjects';?>">
			<div class="item">
				<h2>Subjects</h2>
			</div>
			</a>
			
			<a class="homelink" href="<?php echo base_url().'index.php/courses';?>">
			<div class="item">
				<h2>Courses</h2>
			</div>
			</a>
			
			<a class="homelink" href="<?php echo base_url().'index.php/exams';?>">
			<div class="item">
				<h2>Exams/Results</h2>
			</div>
			</a>
			
	</body>
</html>
