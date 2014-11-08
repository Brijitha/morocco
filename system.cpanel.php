<?php
require('system.global.php');
if(isset($_SESSION['user'])){header('location:system.cpanel.maininterface.php');}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title><?=_sys_name;?> :: System</title>
    <script src="http://localhost/jquery/jquery-1.10.1.min.js"></script>
    <script src="http://localhost/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="system/sys-references/jquery.easing.1.3.js"></script>
    <script src="system/sys-references/cpanel.main.js"></script>
    <link href="system/sys-references/css/cpanel.login.css" rel="stylesheet">
</head>
<body><div id="loginForm"><div class="logo"></div></div><div class="footer">© 2013/2014 All Copy Right To Daman-Tech IT Network Services</div></body>
</html>