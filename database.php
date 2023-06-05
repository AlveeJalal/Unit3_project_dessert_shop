<!-- 
Alvee Jalal 
2/20/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 2
ahj24@njit.edu -->

<?php 
//function to retrieve the Database
function getDB()
{
//Data Source Name (DSN) and credentials for user
$dsn = 'mysql:host=localhost; dbname=dessert_shop';
$username = 'web_user';
$password = 'pa55word';


try 
{
    //try to create the PDO object (PHP Data Object) 
    $db = new PDO($dsn, $username, $password); 
}

catch (PDOException $e)
{
    //If there is a PDOException, get the message and display it by including the database_error.php page
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
return $db;
}

?>