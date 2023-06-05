<!-- 
Alvee Jalal 
2/20/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 2
ahj24@njit.edu -->
<!DOCTYPE html>
<html>
<head>
    <!-- Title for page -->
    <title> Database Error </title>
<!-- Header code included from header.php file -->
<?php include('header.php'); ?>

</head>

<body>
        <!-- Navbar with links to other pages -->
        <nav><?php include('menu.php');?></nav>


        <!-- Main content with error info in sentences -->

    <main>
        <h1> DATABASE ERROR </h1>
        <p id='bodypar'> There was an error connecting to the database. </p>
        <p id='bodypar'> The database must be installed and running.</p>
        <p id='bodypar'> Error Message: <?php echo $error_message; ?></p>
    </main>
</body>
<br>
<br>
<br>


<!-- Footer with copyright -->

<footer> Copyright &copy; 2023 Alvee Jalal </footer>

</html>
