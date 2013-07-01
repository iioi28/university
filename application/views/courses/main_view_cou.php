<html>
  <head>
		<title> Main View </title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/main_style.css';?>" />
		<script type="text/javascript" src="<?php echo base_url().'js/jquery.js';?>" ></script>
	</head>
	<body>
		
		<div id="all-page">
			<div id="header">
			
			</div>
			<!--
			<div id="main-menu">
			</div>
			-->
			<div id="left-bar">
				<?php $this->load->view('lbcou'); ?>
			</div>
			<div id="content">
					<?php $this->load->view($page); ?>
			</div>
		</div>
	
	</body>
</html>
