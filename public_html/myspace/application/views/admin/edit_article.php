<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include('admin_header.php'); ?>
<?php include('admin_left_panel.php'); ?>

<div class="container">
  
    <ul class="breadcrumb ">
        <li class="active"> <?php echo anchor('admin/dashboard','Dashboard'); ?> </li>
        <li class="active">Edit Article</li>
   </ul>
    
<?php echo form_open('admin/update_article/'.$article->id); ?>
  <fieldset>
    <legend>Edit Article</legend>   
   
    <div class="row">
       <div class="col-lg-6">
        <div class="form-group">
        <label for="inputEmail" class="col-lg-4 control-label">Article Title</label>
        <div class="col-lg-8">
        <?php echo form_input(array('name'=>'title','class'=>'form-control','placeholder'=>'Article Title','value'=>  $article->title)); ?>
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
      <?php echo form_textarea(array('name'=>'body','class'=>'form-control','placeholder'=>'Article Body','value'=>  $article->body)); ?>
       </div>
       </div>
       </div>
       <div class="col-lg-6"><?php echo form_error('body'); ?></div>
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
