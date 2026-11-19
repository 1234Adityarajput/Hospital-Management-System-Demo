<?php 

// start classes and other important data
require_once "importance.php";

// destroy all sessions
@session_destroy(); 

// reset the cookie
setcookie("emr-user", "", time() - 3600, "/", "", "", true);

// logout the user
Config::redir("login.php");