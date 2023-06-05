
<?php
/*
Alvee Jalal 
3/25/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 4
ahj24@njit.edu 
*/
//require the database 
require_once('database.php');

//retrieve the dessertIDs and dessertCategoryIDs from the dessert table in the database
$dessertID = filter_input(INPUT_POST, 'dessertID', FILTER_VALIDATE_INT);
$dessertCategoryID = filter_input(INPUT_POST, 'dessertCategoryID', FILTER_VALIDATE_INT);
//if the dessertID and dessertCategoryID exist, delete the item from the dessert table
if($dessertID != false && $dessertCategoryID != false)
{
    
    $db = getDB();
    $query = 'DELETE FROM dessert
              WHERE dessertID = :dessertID';
    $statement = $db->prepare($query);
    $statement->bindValue(':dessertID',$dessertID);
    $statement->execute();
    $statement->closeCursor();

              
}

//update the dessert page with the changes by reloading it 
include('dessert.php');
?>
    
    <script src="delete_confirm.js"> </script>
