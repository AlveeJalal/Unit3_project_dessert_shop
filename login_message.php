<!--
Alvee Jalal 
3/25/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 4
ahj24@njit.edu 
-->
<?php
//start the session if it's not on
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
//function to retrieve the first and last name, and email of the user to display in the login message
function loginMessage($email)
{
$db = getDB();
// Query to select the user info
$query = 'SELECT firstName, lastName, emailAddress 
          FROM dessertManagers
          WHERE emailAddress = :email';
//bind values, execute the query. Store data as an array to a variable with fetchAll() 
$statement = $db->prepare($query);
$statement->bindValue(':email',$email);
$statement->execute();
$info = $statement->fetchAll();
$statement->closeCursor();

//Store array of user information to session variable for access throughout the sites 
if (!isset($_SESSION['info'])) {
    $_SESSION['info'] = $info;
}

}
?>
    
