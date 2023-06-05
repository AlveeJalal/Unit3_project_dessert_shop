<?php
/*
Alvee Jalal 
3/17/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 3 
ahj24@njit.edu 
*/

//The database connection
require_once('database.php');
// get all the input from the form in 'create.php', filter the inputs, and assign to variables
$dessertCategoryID = filter_input(INPUT_POST, 'dessertCategoryID', FILTER_VALIDATE_INT);
$dessertCode = filter_input(INPUT_POST, 'dessertCode');
$dessertName = filter_input(INPUT_POST, 'dessertName');
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

//validate inputs

if($dessertCategoryID == null || $dessertCategoryID == false || $dessertCode == null || $dessertName == null || $description == null || $price == null)
{

    $error_message = "Invalid or missing dessert data. Please enter correct data in all fields and try again.";
}

else if($price > 200.00)
{
    $error_message = "Price is over $200.00 (the maximum). Please enter anything lower than $200.00";

}
else if($price < 0.00)
{
    $error_message = "Price is not a positive value. Please enter a price that is more than $0.00";

}
else if($price == false)
{
    $error_message = "Price is not a float/double/decimal value. Please enter a price that contains decimals to two places (Ex: 25.00).";

}
//if the dessert code matches the dessert code found in the dessert table as a result of the
// findDuplicate($dessertCode) function, show this the error message. Means there is a duplicate dessert code.
else if($dessertCode == findDuplicate($dessertCode))
{
    $error_message = "You have entered a duplicate dessert code that already exists. Please enter a unique one that doesn't exist yet.";

}
//if there is no error, keep the $error_message variable blank.
else{
    $error_message='';
}
//if there is an error, reload this page with the error message
if($error_message!=='')
{
    include('create.php');
    exit();
}






//add desserts into the desserts table database
$query = 'INSERT into dessert
          (dessertCategoryID, dessertCode, dessertName, description, price, dateAdded)

          VALUES
          (:dessertCategoryID, :dessertCode, :dessertName, :description, :price, NOW())';
$db = getDB();
$statement = $db->prepare($query);
$statement->bindValue(':dessertCategoryID', $dessertCategoryID);
$statement->bindValue(':dessertCode', $dessertCode);
$statement->bindValue(':dessertName', $dessertName);
$statement->bindValue(':description', $description);
$statement->bindValue(':price', $price);
$statement->execute();
$statement->closeCursor();


//uses select query to find the duplicate dessert code and returns the dessert code if it is found. 
function findDuplicate($dessertCode)
    {
        require_once('database.php');
        $db = getDB();
        //get everything from the dessert table based on the dessertCode passed to the function
        $query2 = 'SELECT *
                    FROM dessert
                    WHERE dessertCode = :dessertCode';

                    //prepare query and execute
                    $statement2 = $db->prepare($query2);
                    $statement2->bindValue(':dessertCode', $dessertCode);
                    $statement2->execute();
                    //get all dessert data as an array into a variable
                    $theDessertCode = $statement2->fetchAll();
                    $statement2->closeCursor();
                    
                    //loop through each row of dessert data, return the duplicate dessertCode 
                    foreach ($theDessertCode as $dessertCodes)
                        return $dessertCodes['dessertCode'];
                    
          }

          //displays dessert table page
    include('dessert.php');

     
?>