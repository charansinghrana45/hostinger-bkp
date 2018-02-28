<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(APPPATH.'views/public/public_header.php'); ?>

<div class="container">
<?php echo form_open('login/admin_login'); ?>
  <fieldset>
    <legend>Admin Login</legend>   
    
    <div class="row">
       <div class="col-lg-6">
        <div class="form-group">
          <div class="col-lg-10">
          </div>
          <div class="col-lg-6"><?php if($this->session->flashdata('error_invalid_credential')) echo $this->session->flashdata('error_invalid_credential'); ?></div>
        </div>
       </div>
    </div>
    
    <div class="row">
       <div class="col-lg-6">
        <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Username</label>
        <div class="col-lg-10">
        <?php echo form_input(array('name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>  set_value('username'))); ?>
        </div>
        </div>
       </div>
        <div class="col-lg-6"><?php echo form_error('username'); ?> </div>
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

<?php include(APPPATH.'views/public/public_footer.php'); ?>
