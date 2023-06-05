<!-- 
Alvee Jalal 
3/28/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 4
ahj24@njit.edu -->
<?php
//start the session if it's not on
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
//If the user is logged in, display ALL navbar links including the Logout link
if(isset($_SESSION['is_valid_admin']))
{
    ?>
<a href="index.php">Home</a><a href="shipping.php">Shipping</a> <a href="dessert.php"> Dessert </a><a href="create.php"> Create </a> <a href="logout.php">Logout</a> </nav>
<?php } else { ?>
      <!-- Else, if the user is NOT logged in, just display Home, Dessert, and Login links. Disable Shipping and Create links -->
    <a href="index.php">Home</a> <a href="dessert.php"> Dessert </a> <a href="login.php">Login</a>
    <?php }?>