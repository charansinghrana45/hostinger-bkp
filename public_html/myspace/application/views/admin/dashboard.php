<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include('admin_header.php'); ?>
<?php include('admin_left_panel.php'); ?>

<div class="container col-lg-9">  
   <ul class="breadcrumb ">
    <li class="active">Dashboard</li>
   </ul>
    <div class="row">
        <div class="col-lg-9 col-lg-offset-3"><?php echo anchor('admin/add_article','Add Article','class="btn btn-primary pull-right"') ?></div>
    </div>
    
    <?php if($this->session->flashdata('success_message')): ?>
    <div class="row">
       <div class="col-lg-4">
           <div class="alert alert-dismissible <?php echo $this->session->flashdata('message_display_class'); ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
             <?php echo $this->session->flashdata('success_message'); ?>
           </div>
       </div>
    </div>
    <?php endif; ?>
    
  <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Sr.No.</th>
      <th>Title</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php if(count($articles)): ?>
      <?php $serial_no = $this->uri->segment(3,0); ?>
      <?php foreach($articles as $article): ?>
    <tr>
      <td><?php echo $serial_no = $serial_no+1; ?></td>
      <td><?php echo $article->title; ?></td>
      <td> <?php $edit_article_url = 'admin/edit_article/'.$article->id; ?>
           <?php echo anchor($edit_article_url,'Edit','class="btn btn-primary"'); ?>
           <?php $delete_article_url = 'admin/delete_article/'.$article->id; ?>
           <?php echo anchor($delete_article_url,'Delete','class="btn btn-danger"'); ?>
      </td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="3"><span>No Records Found.</span></td>
    </tr>
    <?php endif; ?>
  </tbody>
</table> 

<?php if(count($articles) > 0): echo $this->pagination->create_links(); endif;?>
    
</div>

<?php include('admin_footer.php'); ?>


