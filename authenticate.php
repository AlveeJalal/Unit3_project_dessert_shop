<?php
//require the admin_login_validator.php file to assist in processing the credentials
require_once('admin_login_validator.php');
//require the login_message.php file to display the message
require_once('login_message.php');

//start the session if it's not on
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}

//retrieve credentials from login form
$email = filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST,'password');

//approve the login and set the message if email and password are valid
if(is_valid_admin_login($email, $password))
{
    $_SESSION['is_valid_admin'] = true;
    loginMessage($email);
}

//if credentials are not valid or nothing is inputted, let the user know. Stay on login page until logged in

else
{
    if($email == NULL && $password == NULL)
    {
        $login_message = 'You must login to view this message';
    }

    else
    {
        $login_message = 'Invalid Credentials';
    }
    include('login.php');
}
?>

<!-- 
Alvee Jalal 
3/28/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 4
ahj24@njit.edu -->
<!-- 
Alvee Jalal 
2/5/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 1 
ahj24@njit.edu -->
<!DOCTYPE html>
<?php require_once('database.php');?>
<html lang="en">
<head>
<title>Home</title>
<!-- Header code included from header.php file -->
<?php include('header.php'); ?>
</head>
<body>
        <!-- Navbar with links to other pages -->
<nav><?php include('menu.php');?></nav>
<main id='home'>

<!-- Dessert shop description -->

    <h2><u>About Us:</u></h2>
    <p id='bodypar'>
        Our founder, Alvee Jalal, opened "Alvee's Delicious Desserts" on February 7th, 2023 after quitting his IT job in pursuit of his true interest: desserts! 
        Alvee's Delicious Desserts was opened in the heart of Princeton, New Jersey to cater towards a community built up of many restaurants. Many heavy eats 
        are in the area, but not so many dessert places for those interested in dessert after their meals, so that's where we came in! We offer the finest 
        treats from cakes, brownies, ice cream, cookies, and any dessert you can think of. Our desserts are freshly made daily with the highest quality ingredients
        so you can enjoy what's worth your money. Alvee's Delicious Desserts is talked by about everyone in town, and you should come to see what it's all about! :)
    </p>
    <br>

    <!-- Images and descriptions (figcaptions) of some desserts -->
    <h2><u>A Sample of Our Desserts:</u></h2>
    <section>
        <figure>
        <img src="images/chocolate_waffle.png" id="dessertpic" alt="Chocolate Waffle Image">
        <figcaption> A lovely treat to have with your valentine <br>or for yourself: Chocolate heart shaped waffles with <br> melted chocolate, 
    whipped cream, and strawberries! </figcaption>
        </figure>

        <figure id="brownie">
        <img src="images/brownies.png"  alt="Chocolate Brownie Image">
        <figcaption> A sweet, soft, chocolatey delight that <br>you can eat with  just your hands.<br> Goes perfect with milk! </figcaption>
        </figure>

        <figure>
        <img src="images/banana_split_sundae.png"  alt="Banana split sundae Image">
        <figcaption> Enjoy this cold and creamy banana<br> split sundae on a hot day.  </figcaption>
        </figure>

        <figure>
        <img src="images/cookies_choco.png"  alt="Chocolate chip cookies Image">
        <figcaption> Craving cookies like the <br>cookie monster? Make your dreams <br> come true and enjoy these fresh <br> cookies out the oven!</figcaption>
        </figure>

        <figure id="mousse">
        <img src="images/mousse_cake.png"   alt="Mousse Cake Image">
        <figcaption> Feeling fancy? Delve into our<br> rich chocolate mousse cake! <br> </figcaption>
        </figure>
        
    </section>
</main>
</body>

<!-- Footer with copyright -->


<footer> Copyright &copy; 2023 Alvee Jalal </footer>
</html>
