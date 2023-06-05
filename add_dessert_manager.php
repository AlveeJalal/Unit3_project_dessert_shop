<!-- 
Alvee Jalal 
3/25/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 4 
ahj24@njit.edu -->
<?php

//function to add dessert managers to the dessertManagers table. Takes data as arguments
function add_dessert_manager($email,$password,$firstName,$lastName)
{
    $db = getDB();
    require_once('database.php');
//creating a hash for the user's password
$hash = password_hash($password, PASSWORD_DEFAULT);
//insert the data into the table
$query = 'INSERT INTO dessertManagers (emailAddress, password, firstName, lastName)
          VALUES (:email,:password,:firstName,:lastName)';
//bind values and execute the query
$statement = $db->prepare($query);
$statement->bindValue(':email',$email);
$statement->bindValue(':password',$hash);
$statement->bindValue(':firstName',$firstName);
$statement->bindValue(':lastName',$lastName);
$statement->execute();
$statement->closeCursor();
}

//Calling the function to execute the script and add the managers to the table.
add_dessert_manager('johnnyappleseed123@gmail.com','iloveiphone1234','Johnny','Appleseed');
add_dessert_manager('tomholland554@gmail.com','iamSpiderman4458','Tom','Holland');

add_dessert_manager('billgates454@gmail.com','m!cr0s0ftw!nd0w$','Bill','Gates');
?>  