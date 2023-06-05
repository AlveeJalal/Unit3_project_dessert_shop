<!-- 
Alvee Jalal 
3/28/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 4
ahj24@njit.edu -->
<?php
//start the session
session_start();

//clear the session and delete it if the user logs out
$_SESSION = [];
session_destroy();
//Message stating user is logged out
$login_message = 'You have been logged out';
//Show the login link and page when user is logged out
include('login.php');

?>
