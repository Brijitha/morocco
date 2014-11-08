<?php
//error_reporting(0);

/// developed by: Ahmed.M.Yassin.
ini_set('session.cookie_httponly', true);
session_start();

#----------------------------------		LOAD NAMESAPCES 	----------------------------------------------------
require('system.config.php');
require(_sysDBC_);

#----------------------------------		Purpose: Open Connection to database 	---------------------------------

$conn = new mysqlConnection('localhost','root','',mymorocc_main);
$conn->connect();

?>