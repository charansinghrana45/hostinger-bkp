<html>
<head>
<title>MY Form</title>
<link rel="stylesheet" type="text/css" href="bootsnipform.css">
</head>

<body style='background-image:url("http://reachit.esy.es/cs/doc/landing_image.png");background-size:cover;background-repeat: no-repeat;'>
<?php 
	session_start();
	
	require_once('dbconnect.php'); 
	
	require_once('inputnpform.php'); 
	
	
	$_SESSION['error'] = '';

	if(isset($_POST['submit']) && $_POST['submit'] == 'submit')
	{
		if(isset($_POST['npid']) && $_POST['npid'] != '')
		{
			$npid = $_POST['npid'];
		}
		else
		{
			$_SESSION['error'] = "Npid can not be empty.";
			header('location:/cs/doc/insertnp.php');
			return;
		}
		
		if(isset($_POST['npname']) && $_POST['npname'] != '')
		{
			$npname = $_POST['npname'];
		}
		else
		{
			$_SESSION['error'] = "Np name can not be empty.";
			header('location:/cs/doc/insertnp.php');
			return;
		}
		
		if(isset($_POST['database']) && $_POST['database'] != '')
		{
			$database = $_POST['database'];
		}
		else
		{	
			$_SESSION['error'] = "Database can not be empty.";
			header('location:/cs/doc/insertnp.php');
			return;
		}
		
		$docurl = "";
		
		$docurl2 = "+12:00&entry.1680137155=";
		
		if($database == "brico")
		{
			$docdbname = "26-BRICO";
		}
		else if($database == "egp_fr")
		{
			$docdbname = "23-FR for INDIA for ec_decale_egp_2tournees";
		}
		else if($database == "fr")
		{
			$docdbname = "25-FR";
		}
		else if($database == "my")
		{
			$docdbname = "28-ec_my_beta";
		}
		else if($database == "sw")
		{
			$docdbname = "29-ec_sw_beta";
		}
		else if($database == "meubles")
		{
			$docdbname = "3-ec_meubles_beta";
		}
		else if($database == "fi")
		{
			$docdbname = "30-FI";
		}
		else if($database == "dk")
		{
			$docdbname = "31-DK";
		}
		else if($database == "no")
		{
			$docdbname = "32-NO";
		}
		else if($database == "id")
		{
			$docdbname = "34-ID";
		}
		else if($database == "th")
		{
			$docdbname = "35-TH";
		}
		else if($database == "vn")
		{
			$docdbname = "36-VN";
		}
		else if($database == "ph")
		{
			$docdbname = "38-ec_ph_beta";
		}
		else if($database == "sg")
		{
			$docdbname = "39-ec_sg_beta";
		}
		else if($database == "multi")
		{
			$docdbname = "ec_multi_beta";
		}
		else if($database == "brico_beta_extern")
		{
			$docdbname = "42-Brico_beta_extern";
		}
		else
		{	
			exit('wrong db selected');
		}
		
		$docurl3 = "entry.1561576522=".$docdbname."&entry.1569492719=".$npid."&entry.1706324071=".$npname."&entry.451538230=Open&emailReceipt=true";
		
		$query = "insert into ".$database."_newspapers (npid,npname,docurl,docurl2,docurl3) values(".$npid.",'".$npname."','".$docurl."','".$docurl2."','".$docurl3."');";
		
		mysqli_query($conn,$query);
		
		$_SESSION['success'] = "Your record has been inserted successfully.";
		
		header('location:/cs/doc/insertnp.php');
		return;
	}

?>



</body>

</html>
