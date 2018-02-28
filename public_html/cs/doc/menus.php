

<?php

	require_once('dbconnect.php'); 
	
	$file = fopen("menus.csv","r");
	while(! feof($file))
	{
		$menudata = fgetcsv($file, 1000, ";");
		
		$menu = $menudata[0];
		$url = $menudata[1];
        echo "ajoute(menu,".$menu.")";
		echo "<br/ >";
		echo "ajoute(url,".$url.")";
		echo "<br />";
		echo "menu_ajoute(".$menu.",".$url.")";
		echo "<br />";
		echo "vide(menu)";
		echo "<br />";
		echo "vide(url)";
		echo "<br />";
		
		
		
	}

	echo "all result displayed successfully.";
	
	fclose($file);

?>