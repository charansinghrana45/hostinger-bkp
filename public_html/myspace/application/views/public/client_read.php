<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include('public_header.php'); ?>

<div class="container">  
 
<div class="jumbotron">    
  <h3>All Articles</h3>
  <hr>
  <table class="table table-striped table-hover">
  <thead>
    <tr class="danger">
      <th>Sr.No.</th>
      <th>Title</th>
      <th>Published On</th>
    </tr>
  </thead>
  <tbody>
      <?php if(count($articles)): ?>
      <?php $serial_no = $this->uri->segment(3,0); ?>
	  <?php $class='info'; ?>
      <?php foreach($articles as $article): ?>
      <tr class="<?php echo $class = ($class == 'info')?'success':'info'; ?>">
      <td><?php echo $serial_no = $serial_no+1; ?></td>
      <td>
			<?php if($article->article_image) { 
					$image_data = pathinfo($article->article_image);
					$src = base_url(article_image_path($article->user_id).'/thumb/'.$image_data['filename'].'_thumb'.'.'.$image_data['extension']);
                  } else {
					$src = base_url('uploads/images/article_no_image_thumb.png');
				  }
			?>
			<?php echo anchor('article/article/'.$article->id,"<img src='$src' />".' '.$article->title,array('style'=>'text-decoration:none')); ?>
	  </td>
      <td><?php echo $article->create_date; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
    <tr class="active">
        <td colspan="3"><span>No Records Found.</span></td>
    </tr>
    <?php endif; ?>
  </tbody>
</table> 

<?php if(count($articles) > 0): echo $this->pagination->create_links(); endif;?>

</div>
    
</div>

<?php include('public_footer.php'); ?>