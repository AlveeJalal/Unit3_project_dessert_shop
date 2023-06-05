<!-- 
Alvee Jalal 
2/5/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 1 
ahj24@njit.edu -->

<!-- Turn the session on if it's not on already -->
<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
// set default values of variables for initial page load 
if(!isset($first_name))
{
    $first_name='';
}

if(!isset($last_name))
{
    $last_name='';
}

if(!isset($street_address))
{
    $street_address='';
}

if(!isset($city))
{
    $city='';
}
if(!isset($state))
{
    $state='';
}

if(!isset($zipcode))
{
    $zipcode='';
}
if(!isset($shipping_date))
{
    $shipping_date='';
}
if(!isset($order_number))
{
    $orderNumber='';
}

if(!isset($length))
{
    $length='';
}
if(!isset($width))
{
    $width='';
}

if(!isset($height))
{
    $width='';
}

if(!isset($weight))
{
    $weight='';
}
//Display this page's content if the user is logged in and tries to access
if(isset($_SESSION['is_valid_admin']))
{

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Shipping</title>
<!-- Header code included from header.php file -->
<?php include('header.php'); ?>
</head>

<body>
    <!-- Navbar with links to other pages -->
    <nav><?php include('menu.php');?></nav>
    <!-- Image and caption for Tres Leches cake for decoration -->
<figure>
    <img src="images/Tres-Leches-Cake.png" id="Tres"/>
    <br><figcaption id="Tres">This Tres Leches Cake can't wait to arrive to you! </figcaption>
    </figure>
<h1 class="center"> Order Up! </h1>

    <!-- Display error message in red on this page if there is one  -->
<?php 
if(!empty($error_message)){?>
<p id="red"> <strong><?php echo htmlspecialchars($error_message); ?> </strong></p>

<?php } ?>
    <section class="TO">
<main>

    <!-- Form with input data to be submitted to shipping_results.php-->

<form action = "shipping_results.php" method = "post" class="pinkbg">
<p class="big"> TO: </p>

    <!-- All fields have user input. After submitting form, their default values are what was last inputted-->
    <label>First Name:</label>
    <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name);?>"/>

    <label>Last Name:</label>
    <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name);?>"/>
    <br>
    <br>
    <label>Street Address:</label>
    <input type="text" name="street_address" value="<?php echo htmlspecialchars($street_address);?>"/>

    <label>City:</label>
    <input type="text" name="city" value="<?php echo htmlspecialchars($city);?>"/>
   
    <br>
    <br>
    <label>State:</label>
    <input type="text" name="state" maxlength = "2" value="<?php echo htmlspecialchars($state);?>"/>

    <label>Zip Code:</label>
    <input type="number" name="zipcode" maxlength = "5" value="<?php echo htmlspecialchars($zipcode);?>"/>

    <p class="big"> ORDER INFORMATION: </p>

    <label>Shipping Date:</label>
    <input type="date" name="shipping_date" value="<?php echo htmlspecialchars($shipping_date);?>"/>

        <br>
        <br>

    <label>Order Number:</label>
    <input type="number" name="order_number" value="<?php echo htmlspecialchars($order_number);?>"/>

    <br>
    <br>
    
    <label>Length(Inches):</label>
    <input type="number" name="length" value="<?php echo htmlspecialchars($length);?>"/>
 
    <label>Width(Inches):</label>
    <input type="number" name="width" value="<?php echo htmlspecialchars($width);?>"/>

    <label>Height(Inches):</label>
    <input type="number" name="height" value="<?php echo htmlspecialchars($height);?>"/>

    <br>
    <br>

    <label> Weight(lbs): </label>
    <input type="number" name = "weight" value="<?php echo htmlspecialchars($weight);?>"/>
    
<br>
<br>
    <!-- Submit button sends data to shipping_results.php page -->

    <input type="submit" value="SUBMIT ORDER"/>

    </main>
</form>

</section>

<!-- Footer with copyright -->
<footer id="bottomfooter"> Copyright &copy; 2023 Alvee Jalal </footer>

</body> 

</html>
<!-- If the user is NOT logged in and tries to access, display the error message page -->
<?php }

else{
    include('login_error_message.php');
}?>

