

<?php

	require_once('dbconnect.php'); 
	
	$file = fopen("newspapers.csv","r");
	while(! feof($file))
	{
		$npdata = fgetcsv($file, 1000, ";");
		

		$docurl = "";
		
		$todaydate = date("Y-m-d");
		
		$docurl2 = "+12:30&entry.1680137155=";
		
		$docurl3 = "+01:00&entry.1561576522=3-ec_meubles_beta&entry.1569492719=".$npdata[0]."&entry.1706324071=".$npdata[1]."&entry.451538230=Open&emailReceipt=true";
	 
		$query = "insert into multi_newspapers (npid,npname,docurl,docurl2,docurl3) values(".$npdata[0].",'".$npdata[1]."','".$docurl."','".$docurl2."','".$docurl3."');";
		
		mysqli_query($conn,$query);
		
	}

	echo "all records inserted successfully.";
	
	fclose($file);

?>