<?php session_start();
include_once('../includes/functions.php');
$_SESSION['logged_in'] = "";
$_SESSION['session_name_user_client'] = "";
$_SESSION['logged_in_username'] = "";
$_SESSION = array();
$_SESSION['session_name_user_client'] = "";
session_destroy();
redirect_page("index.php"); ?>
<a href="login.php">Login</a> | <a href="index.php">HOME</a>