<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include('public_header.php'); ?>

<div class="container">  
 
<div class="jumbotron">
 
 <h3><?php echo $article->title; ?></h3>
 <p>Posted By: Admin <span>|</span> Posted On: <?php echo $article->create_date; ?></p>
 <hr>

 <?php if($article->article_image): ?>
 <img src="<?php echo base_url(article_image_path($article->user_id).$article->article_image);  ?>" alt="<?php echo $article->title; ?>" />
 <?php endif; ?>
 
  <p><?php echo $article->body; ?></p>
</div>
      
</div>

<?php include('public_footer.php'); ?>
