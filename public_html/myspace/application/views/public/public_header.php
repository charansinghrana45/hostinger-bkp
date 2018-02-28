<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Myspace</title>
	<?php echo link_tag('assets/css/bootstrap.min.css'); ?>
        <?php echo link_tag('assets/css/footer-basic-centered.css'); ?>
        <style>
            .homepage{
                background-image: url('<?php echo base_url('assets/images/landing_image.png');?>');
                background-repeat: no-repeat;
                background-size:cover;
            }
        </style>
</head>
<body class="<?php if($this->uri->segment(1,'') === ''){ echo 'homepage'; } ?>">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('/'); ?>">Myspace</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
        <li><a href="<?php echo base_url('article'); ?>">Articles</a></li>
        <li><a href="<?php echo base_url('page/about'); ?>">About Us</a></li>
        <li><a href="<?php echo base_url('page/contact'); ?>">Contact Us</a></li>
       </ul>
        
        <?php echo form_open('article/search',array("class"=>"navbar-form navbar-left","role"=>"search")); ?>
        <div class="form-group">
        <?php echo form_input(array("name"=>"query","type"=>"text","class"=>"form-control","placeholder"=>"Search")); ?>
        </div>
        <?php echo form_submit(array('name'=>'submit','type'=>'submit','value'=>'Submit','class'=>'btn btn-default')); ?>
       <?php echo form_close(); ?>
       <?php echo form_error('query'); ?>
      <ul class="nav navbar-nav navbar-right">
         
         <?php if(!$this->session->userdata('fullname')): ?>
         <li><a href="<?php echo base_url('user/login'); ?>">Login</a></li>
         <?php else: ?>
            <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              <?php echo $this->session->userdata('fullname'); ?><span class="caret"></span>
             </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo base_url('user/profile');?>">Profile</a></li>
              <li><a href="<?php echo base_url('user/settings'); ?>">Settings</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url('#');?>">Help</a></li>
              <li><a href="<?php echo base_url('#');?>">FAQs</a></li>
            </ul>
           </li> 
         <?php endif; ?>
       
      </ul>
    </div>
  </div>
</nav>
