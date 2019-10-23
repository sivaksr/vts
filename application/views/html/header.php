<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicle Tracking System</title>
    <!-- Bootstrap -->
	
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
  
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/bootstrapValidator.css"/>
    <script src="<?php echo base_url();?>assets/vendors/scripts/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/bootstrapValidator.js"></script>

   
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
  
  </head>
  <?php if($this->session->flashdata('success')): ?>
	<div class="alert_msg1 animated slideInUp bg-succ">
	<?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
	</div>
	<?php endif; ?>
	<?php if($this->session->flashdata('error')): ?>
	<div class="alert_msg1 animated slideInUp bg-warn">
	<?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-warning ico_bac" aria-hidden="true"></i>
	</div>
	<?php endif; ?>
  <body>
	  <div class="container">
      <div class="row">
        <div class="col-12">
            <h1 class="text-center">Welcome to Telangana State Police</h1>
			  <h3 class="text-center">Vehicle Tracking System</h3>
        </div>
      </div>
	  </div>
	<div class="container mt-2">  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="<?php echo base_url('');?>">VTS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($this->uri->segment(1)=='home'){ echo "active";} ?>">
            <a class="nav-link" href="<?php echo base_url('home');?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>-->	
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <form action="<?php echo base_url('login/loginpost');?>" method="post" >
			  <input class="form-control mr-sm-1" type="email" placeholder="Enter Email" name="email" required>
			  <input class="form-control mr-sm-1" type="password" placeholder="Enter Password" name="password" required>
			  <button  type="submit"  class="btn btn-outline-success my-2 my-sm-0">Login</button>
			  <!--<a href="<?php echo base_url('register');?>"  class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</a>-->
		  </form>
        </div>
      </div>
    </nav>
	</div>