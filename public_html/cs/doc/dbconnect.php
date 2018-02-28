<?php
	//$con = mysql_connect('localhost','root','');
	//$db = mysql_select_db("priceveille",$con);
			 
	//if($db != true)
	//{
		//die("no database connction found.");
	//}
	
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
