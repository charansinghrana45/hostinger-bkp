<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include('public_header.php'); ?>

<div class="container">
<?php echo form_open('user/login'); ?>
  <fieldset>
    <legend>User Login</legend>   
    
    <div class="row" style="margin-top:30px;">
       <div class="col-lg-6">
           <div class="col-lg-10">
		   <center><a href="<?php echo $fb_login_url; ?>" class="btn btn-primary btn-sm">Login with Facebook</a>
		   <a href="<?php echo $google_login_url; ?>" class="btn btn-primary btn-sm">Login with Google</a>
		   </center> 
		   </div>
       </div>
	 </div>
    
     <div class="row" style="margin-top:30px;" >
       <div class="col-lg-6">
           <div class="col-lg-10"><center>or</center></div>
       </div>
    </div>
        
    <div class="row">
       <div class="col-lg-6">
        <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
        <?php echo form_input(array('name'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>  set_value('email'))); ?>
        </div>
        </div>
       </div>
        <div class="col-lg-6"><?php echo form_error('email'); ?> </div>
        <div class="col-lg-6"><?php if($this->session->flashdata('error_invalid_credential')) echo $this->session->flashdata('error_invalid_credential'); ?></div>
    </div>
   
    <div class="row">
       <div class="col-lg-6">
       <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
      <?php echo form_password(array('name'=>'password','type'=>'password','class'=>'form-control','placeholder'=>'Password','value'=>  set_value('password'))); ?>
       </div>
       </div>
       </div>
       <div class="col-lg-6"><?php echo form_error('password'); ?></div>
    </div>
  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
</div>

<?php include('public_footer.php'); ?>
