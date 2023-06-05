<!-- 
Alvee Jalal 
2/5/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 1 
ahj24@njit.edu -->


<?php
//if the session isnt started, then turn it on
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
?>

    <!-- Referencing a CSS stylesheet -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Appropriate Meta Data describing the page -->
    <meta charset="utf-8">
    <meta name="description" content = "A well established dessert shop with variety of delightful eats to cater your sweeet tooth!">
    <meta name="keywords" content="Dessert, cupcake, shop, sweet, cookie, cake, bakery, sugar">

        <!-- Header with banner logo, shop name, and location  -->
<header>
     <a href="index.php"><img src = "images/cake_logo.png" alt="Alvee's Dessert Shop Logo"></a>
      <p id="title"> Alvee's Delicious Desserts! </p> <span>  <p class="address">888 Delicious ST. Princeton, NJ 07458</p> </span></header>
      
      <!-- include the login message.php file  -->
<p><?php include_once('login_message.php');
//if the user is logged in, display the login message above the navigation bar
if(isset($_SESSION['is_valid_admin']))
{
  ?>  <?php
  foreach($_SESSION['info'] as $theInfo)
  {
   echo '<p id = green><b>Welcome ' . $theInfo['firstName'] . ' '. $theInfo['lastName'] . ' (' . $theInfo['emailAddress'].')</b><p>';} ?>

  
<?php } 
      
    ?>
    </p>


