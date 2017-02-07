<?php
/*
*   Name: config.php
*   Purpose: Contains all the data required for connecting the web application to the database.
*   Author: Saurabh Mehta
*/
	
	// connecting to the database class
    require_once ('dbconnect.php');
		
    $database = 'semiEvent';
    $host = '172.16.9.62';
    $username = 'admin';
    $password = '16may1995';
    $db = new Database();
    $db->initDB($database, $host, $username, $password);