<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include('public_header.php'); ?>

<div class="container">

<div class="jumbotron">
  <h1>All Products</h1>
  <hr>
  
  <p>Memorex 256MB Memory Stick combos (2 items)</p>
  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
	
	<!-- set rm value =2 to receive respnse from paypal in post method -->
	<input type="hidden" name="rm" value="2">
    <input type="hidden" name="upload" value="1">

    <INPUT TYPE="hidden" NAME="return" value="<?php echo base_url('payment/success?c=1');?>">
    <INPUT TYPE="hidden" NAME="cancel_return" value="<?php echo base_url('payment/cancel?c=1');?>">
    <input type="hidden" name="business" value="charan.singh.icreon-facilitator1@gmail.com">
    <input type="hidden" name="currency_code" value="USD">

    <input type="hidden" name="item_name_1" value="Memorex 256MB Memory Stick1">
    <input type="hidden" name="item_number_1" value="MEM32507725">
    <input type="hidden" name="amount_1" value="1.00">
    <input type="hidden" name="quantity_1" value="1">

    <input type="hidden" name="item_name_2" value="Memorex 256MB Memory Stick2">
    <input type="hidden" name="item_number_2" value="MEM32507785">
    <input type="hidden" name="amount_2" value="1.00">
    <input type="hidden" name="quantity_2" value="1">
    
    <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>



<!--  <p><a class="btn btn-primary btn-lg">Learn more</a></p>-->
</div>
    
</div>

<?php include('public_footer.php'); ?>
