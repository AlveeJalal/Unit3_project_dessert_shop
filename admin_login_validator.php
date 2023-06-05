<!-- 
Alvee Jalal 
3/25/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 4
ahj24@njit.edu -->
<?php 
//including the database
require_once('database.php');

//function to verify the password of the user after they submit their credentials
function is_valid_admin_login($email, $password)
{
  $db=getDB();
  //retrieve the password hash from the database table based on the email
    $query = 'SELECT password 
              from dessertmanagers
              WHERE emailAddress = :email';
              $statement = $db->prepare($query);
              $statement->bindValue(':email',$email);
              $statement->execute();
              $row = $statement->fetch();
              $statement->closeCursor();

              //return false if the email  doesn't exist
              if($row == false)
              {

                return false;
              }

                //else call the password_verify function to see if the passwords match 
              else
              {
                $hash = $row['password'];
                return password_verify($password,$hash);
              }
}

?>