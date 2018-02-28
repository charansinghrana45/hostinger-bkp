<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include('admin_header.php'); ?>
<?php include('admin_left_panel.php'); ?>

<div class="container">
    <ul class="breadcrumb ">
        <li class="active"> <?php echo anchor('admin/dashboard','Dashboard'); ?> </li>
        <li class="active">Add article</li>
   </ul>
    
<?php if($this->session->flashdata('faild_message')): ?>
<div class="row">
   <div class="col-lg-4">
       <div class="alert alert-dismissible <?php echo $this->session->flashdata('message_display_class'); ?>">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
         <?php echo $this->session->flashdata('faild_message'); ?>d
       </div>
   </div>
</div>
<?php endif; ?>
    
<?php echo form_open_multipart('admin/store_article'); ?>
  <fieldset>
    <legend>Add Article</legend>   
   
    <div class="row">
       <div class="col-lg-6">
        <div class="form-group">
        <label for="inputEmail" class="col-lg-4 control-label">Article Title</label>
        <div class="col-lg-8">
        <?php echo form_input(array('name'=>'title','class'=>'form-control','placeholder'=>'Article Title','value'=>  set_value('title'))); ?>
        </div>
        </div>
       </div>
        <div class="col-lg-6"><?php echo form_error('title'); ?> </div>
    </div>
   
    <div class="row">
       <div class="col-lg-6">
       <div class="form-group">
      <label for="inputPassword" class="col-lg-4 control-label">Article Body</label>
      <div class="col-lg-8">
      <?php echo form_textarea(array('name'=>'body','class'=>'form-control','placeholder'=>'Article Body','value'=>  set_value('body'))); ?>
       </div>
       </div>
       </div>
       <div class="col-lg-6"><?php echo form_error('body'); ?></div>
    </div>
    
    <div class="row">
       <div class="col-lg-6">
       <div class="form-group">
      <label for="inputPassword" class="col-lg-4 control-label">Article Image</label>
      <div class="col-lg-8">
      <?php echo form_upload(array('name'=>'article_image','class'=>'form-control','value'=>  set_value('article_image'))); ?>
       </div>
       </div>
       </div>
       <div class="col-lg-6"><?php echo $upload_error; ?></div>
    </div>
    
    <div class="row">
       <div class="col-lg-6">
       <div class="form-group">
      <label for="inputPassword" class="col-lg-4 control-label"></label>
      <div class="col-lg-8">
      <?php //echo form_upload(array('name'=>'article_image','class'=>'form-control','value'=>  set_value('article_image'))); ?>
       </div>
       </div>
       </div>
       <div class="col-lg-6"><?php //echo $upload_error; ?></div>
    </div>
      
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
          <?php echo form_reset(array('name'=>'reset','type'=>'reset','value'=>'Reset','class'=>'btn btn-default')); ?>
          <?php echo form_submit(array('name'=>'submit','type'=>'submit','value'=>'Submit','class'=>'btn btn-primary')); ?>
      </div>
    </div>
  </fieldset>
</form>
</div>

<?php include('admin_footer.php'); ?>
