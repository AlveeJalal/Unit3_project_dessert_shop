<!-- 
Alvee Jalal 
3/17/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 3
ahj24@njit.edu -->
<?php 
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
//The database connection
require_once('database.php');
//Get all the information from the dessertCategories table. Intention is to get category names.
$db = getDB();
$query = 'SELECT *
          FROM dessertCategories';
$statement=$db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

//if any of the variables to hold data from the dessert table isn't set, intialize them to an empty string 
if(!isset($dessertCode))
{
    $dessertCode='';
}

if(!isset($dessertName))
{
    $dessertName='';
}

if(!isset($description))
{
    $description='';
}

if(!isset($price))
{
    $price='';
}
//if the user is logged in, display this page
if(isset($_SESSION['is_valid_admin']))
{
?>
<!-- 
Alvee Jalal 
3/17/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 3 
ahj24@njit.edu -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Create</title>
<!-- Header code included from header.php file -->
<?php include('header.php'); ?>
</head>
<body>
    <script src="create_form_field_validation.js">
    </script>
    <script src="reset_button.js">
    </script>
        <!-- Navbar with links to other pages -->
<nav><?php include('menu.php');?></nav>
<figure>
    <img src="images/rainbow_brownies.jpg" id="Brownie"/>
    <br><figcaption >Add something to the dessert collection like rainbow sprinkled brownies! </figcaption>
    </figure>

    <!-- Display error message in red on this page if there is one  -->
<?php 
if(!empty($error_message)){?>
<p id="red"> <strong><?php echo htmlspecialchars($error_message); ?> </strong></p>

<?php } ?>

<h1 class="center"> Create Desserts! </h1>

<section class="TO">
<main>

<!-- Form to add a dessert with information from user input. Once submitted, data is sent for validation to add_dessert.php file 
and then then added to dessert table --> 
<form action = "add_dessert.php" method = "post" id="add_dessert_form" class="khakibg">
<p class="big"> Insert Dessert Items : </p>

    <!-- All fields have user input. After submitting form, their default values are what was last inputted-->
    <label>Dessert Category/Genre:</label>
    <!-- dropdown select field with labels as categories from dessertCategories table. Their values are the dessertCategoryIDs-->
    <!-- This field data is saved to the dessert database table dessertCategoryID column -->
   <select name = "dessertCategoryID">
    <?php foreach ($categories as $category): ?>
        <option value = "<?php echo $category['dessertCategoryID'];?>">
        <?php echo $category['dessertCategoryName'];?>
        </option>
        <?php endforeach;?>
    </select>
    
    <!-- Dessert code with text input. This field data is saved to the dessert database table dessertCode column -->
    <label>Dessert Code:</label>
    <input type="text" name="dessertCode" id="dessertCode" value="<?php echo htmlspecialchars($dessertCode);?>"/> 
    <br>
    <span id="dessertCodeError">*</span>
    <br>
    <br>
        <!-- Dessert name with text input. This field data is saved to the dessert database table dessertname column -->
    <label>Dessert Name:</label>
    <input type="text" name="dessertName" id="dessertName" value="<?php echo htmlspecialchars($dessertName);?>"/>

        <!-- Dessert description with text area input. This field data is saved to the dessert database table description column -->
    <label>Dessert Description:</label>
    
    <textarea name="description" id="dessertDescription" value="<?php echo htmlspecialchars($description);?>"></textarea>
    <br>
    <span id="dessertNameError">*</span>
    <span id="dessertDescriptionError">*</span>

   
    <br>
    <br>

        <!-- Dessert price with text input. This field data is saved to the dessert database table price column. 
        This will have a limit no less than 0 and no more than 200  -->
    <label>Dessert Price:</label>
    <input type="text" id="dessertPrice" name="price" max = "200" min = "0" value="<?php echo htmlspecialchars($price);?>"/>
    <span id="dessertPrice">*</span>

    <br>
<br>

       <!-- Reset button clears input data from fields -->
   <input type="button" id="resetButton" value="RESET"/> 
       <!-- Submit button sends data to add_dessert.php for data validation and eventually adds data to the database -->
   <input type="button" id="submit_create_form" value="SUBMIT"/>
   
   
</main>

</form>

</section>

 <!-- Footer with copyright -->

 <footer id="bottomfooter"> Copyright &copy; 2023 Alvee Jalal </footer>

</body>
<?php
}
//if the user is NOT logged in, display an error message

else{
    include('login_error_message.php');
}
?>


</html>