<div class="maincontainer">

<div>
	<span style="font-weight:bold;"><h2 class="Label"><a href="javascript:void(0);">Priceveille Google Doc URI Generator</a></h2></span>
	<span style="float:right;">
	<a href="insertnp.php" target="_blank" class="myButton">Add new newspaper</a>	
	</span>
</div>

<form name="inputform" action="formation.php" method="post">
<div class="container">
	<h3>Npids</h3>
    <div class="row">
        <div class="form-group form-group-options col-xs-11 col-sm-8 col-md-4">
    		<div class="input-group input-group-option col-xs-12">
    			<input type="text" name="npids" class="form-control" placeholder="Enter comma seperated newspaper ids">
    			<span class="input-group-addon input-group-addon-remove">
    				<span class="glyphicon glyphicon-remove"></span>
    			</span>
    		</div>
    	</div>
    </div>
</div>

<div class="container">
    <h3>Selects Database</h3>
    <div class="row">
        <div class="form-group form-group-multiple-selects col-xs-11 col-sm-8 col-md-4">
    		<div class="input-group input-group-multiple-select col-xs-12">
                <select class="form-control"  style="text-align:center;" name="database">
                    <option value=""> -- Select Here -- </option>
                    <option value="egp_fr">EGP FR</option>
                    <option value="fr">FR</option>
                    <option value="brico">BRICO</option>
                    <option value="my">MY</option>
					<option value="sw">SW</option>
					<option value="meubles">MEUBLES</option>
					<option value="fi">FI</option>
					<option value="dk">DK</option>
					<option value="no">NO</option>
					<option value="id">ID</option>
					<option value="th">TH</option>
					<option value="vn">VN</option>
					<option value="ph">PH</option>
					<option value="sg">SG</option>
					<option value="multi">MULTI</option>
					<option value="brico_beta_extern">BRICO EXTERN</option>
                </select>
    			<span class="input-group-addon input-group-addon-remove">
    				<span class="glyphicon glyphicon-remove"></span>
    			</span>
    		</div>
    	</div>
    </div>
</div>


<div class="container">

    <div class="row">
        <div class="form-group form-group-multiple-selects col-xs-11 col-sm-8 col-md-4">
    		<div class="input-group input-group-multiple-select col-xs-12">
                <input type="submit" name="submit" class="mySubButton" value="submit">
    			<span class="input-group-addon input-group-addon-remove">
    				<span class="glyphicon glyphicon-remove"></span>
    			</span>
    		</div>
    	</div>
    </div>
</div>
</form>

<div style="color:red;">
<?php if(isset($_SESSION['error']) && $_SESSION['error'] != '') {
		echo $_SESSION['error'];
		session_destroy(); 
	}
?>
</div>

</div>