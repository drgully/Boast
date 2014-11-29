<?php
	// Connect to the database server
	$hostname = "mysql.boast-app.org";   // eg. mysql.yourdomain.com (unique)
	$username = "boastapp";   // the username specified when setting-up the database
	$password = "Boast-App.Org";   // the password specified when setting-up the database
	$database = "boast";   // the database name chosen when setting-up the database (unique)
	$link = mysql_connect($hostname,$username,$password);
	mysql_select_db($database) or die("Unable to select database");
?>