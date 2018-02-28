<html>
<head>
<title>MY Form</title>
<link rel="stylesheet" type="text/css" href="bootsnipform.css">
</head>

<body style='background-image:url("http://reachit.esy.es/cs/doc/landing_image.png");background-size:cover;background-repeat: no-repeat;'>
<?php 
	session_start();

	//require_once('lol.php'); exit;
	
	require_once('dbconnect.php'); 
	
	require_once('inputform.php'); 
	
	$_SESSION['error'] = '';

	if(isset($_POST['submit']) && $_POST['submit'] == 'submit')
	{
		if(isset($_POST['npids']) && $_POST['npids'] != '')
		{
			$npids = $_POST['npids'];
		}
		else
		{
			$_SESSION['error'] = "Npid can not be empty.";
			header('location:/');
			return;
		}
		
		if(isset($_POST['database']) && $_POST['database'] != '')
		{
			$database = $_POST['database'];
		}
		else
		{	
			$_SESSION['error'] = "Database can not be empty.";
			header('location:/');
			return;
		}
		
		$query = "select npid,npname,docurl,docurl2,docurl3 from ".$database."_newspapers where npid in(".$npids.");";
		$result = mysqli_query($conn,$query);
		
		
		$today = date('Y-m-d');
		
		$base_doc_url = '';
		$email = 'charan.singh.icreon@gmail.com';
		
		if($database == "fi")
		{
			$db_value = "R - ";
			$database_value = "FI";
		}
		else if($database == "dk")
		{
			$db_value = "S - ";
			$database_value = "DK";
		}
		else if($database == "no")
		{
			$db_value = "T - ";
			$database_value = "NO";
		}
		else if($database == "my")
		{
			$db_value = "O - ";
			$database_value = "ec_my_beta";
		}
		else if($database == "brico")
		{
			$db_value = "N - ";
			$database_value = "BRICO";
		}
		else if($database == "meubles")
		{
			$db_value = "Q - ";
			$database_value = "ec_meubles_beta";
		}
		else if($database == "sw")
		{
			$db_value = "P - ";
			$database_value = "ec_sw_beta";
		}
		else if($database == "multi")
		{
			$db_value = "V - ";
			$database_value = "ec_multi_beta";
		}
		else if($database == "fr")
		{
			$db_value = "M - ";
			$database_value = "FR";
		}
		else if($database == "egp_fr")
		{
			$db_value = "L - ";
			$database_value = "FR for INDIA for ec_decale_egp_2tournees";
		}
		
		while($row = mysqli_fetch_object($result))
		{
			echo "<span class='npidname'>".$row->npid."	-	". $row->npname."</span><br />";
			echo "<a style='color:blueviolet' href='".$base_doc_url."?emailReceipt=true&emailAddress=".$email."&entry.1785223658=".$row->npid."&entry.776532868=".$row->npname."&entry.283696596=".$database_value ."&entry.1177974982=Open&entry.9259775=".$db_value.$database_value."' target='_blank'>".$base_doc_url."?emailReceipt=true&emailAddress=".$email."&entry.1785223658=".$row->npid."&entry.776532868=".$row->npname."&entry.283696596=".$database_value ."&entry.1177974982=Open&entry.9259775=".$db_value.$database_value."</a>";
			echo "<br /> <br />";
		}
	}

?>



</body>

</html>
