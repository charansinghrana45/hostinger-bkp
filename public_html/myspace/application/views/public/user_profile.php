<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include('public_header.php'); ?>

<div class="container">

<div class="row" style="margin-top:30px;">
       <div class="col-lg-6">
           <div class="col-lg-10">Welcome! <?php echo $fullname; ?></div>
       </div>
</div>
    
<ul class="nav nav-tabs">
   <li class="active"><a href="#profile" data-toggle="tab" aria-expanded="true">Profile</a></li>
   <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="profile">
    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
  </div>
  
 
 <div class="tab-pane fade" id="settings">
    
<!-- User Settings Page    -->
<div class="panel panel-default" style="margin-top:20px;">
  <div class="panel-heading">Manage Account</div>
  <div class="panel-body">
      <p><?php echo anchor('/payment/checkout','Become a Pro user'); ?></p>
  </div>
</div>    

  </div>
</div>
    
</div>

<?php include('public_footer.php'); ?>
