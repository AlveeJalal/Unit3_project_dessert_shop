<!-- 
Alvee Jalal 
3/28/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 4
ahj24@njit.edu -->
<?php 
//set the login message if it's not set
if(!isset($login_message))
{
    $login_message =  'You must login to view this page';  
}

//if email is not set, initialize it to ""
if(!isset($email))
{
    $email = "";
}
//if password is not set, initialize it to ""
if(!isset($password))
{
    $password = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<!-- Header code included from header.php file -->
<?php include('header.php'); ?>
</head>
<body>
        <!-- Limited Navbar with links to SOME other pages when not logged in -->
<nav><a href="index.php">Home</a><a href="dessert.php"> Dessert </a><a href="login.php"> Login </a></nav>
<main id='home'>
    <h1 class="center">Login!</h1>
    <section class="TO">
<main>

<!-- Form sending credentials to authenticate.php to ensure data is correct.   --> 
<form action = "authenticate.php" method = "post" id="login_form" class="whitesmoke">
<p class="big"> Enter Your Credentials : </p>

  
    
    <!-- Email field with text input.  -->
    <label>Email:</label>
    <input type="text" name="email" value=""/>
    <br>
    <br>
        <!-- Password field with hidden password input. -->
    <label>Password:</label>
    <input type="password" name="password" value=""/>

     

    <br>
<br>
       <!-- Login button sends data to authenticate.php for credential validation and eventually logs user in -->
   <input type="submit" value="Login"/>
   <p><?php echo $login_message?></p> 

</form>
</main>
</body>

<!-- Footer with copyright -->


<footer id="bottomfooter"> Copyright &copy; 2023 Alvee Jalal </footer>
</html>
