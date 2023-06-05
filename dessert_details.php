<!-- 
Alvee Jalal 
4/8/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 5
ahj24@njit.edu -->
<?php 
require_once('database.php');

//if the session isnt started, then turn it on
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}

//get the specific dessert record from clicking the dessert code on the dessert page 
$dessertID = filter_input(INPUT_GET,'dessert_id',FILTER_VALIDATE_INT);
//using a query, retrieve the dessert details of the specific dessert record 

$query = 'SELECT dessertcategories.dessertCategoryName, dessertID, dessert.dessertCategoryID, dessertCode, dessertName, description, price, dessert.dateAdded
FROM dessertcategories INNER JOIN dessert
          WHERE dessertID = :dessert_id';

$db = getDB();
$statement=$db->prepare($query);
$statement->bindValue(':dessert_id',$dessertID);
$statement->execute();
$allData=$statement->fetch();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Details</title>
<!-- Header code included from header.php file -->
<?php include('header.php'); 
?>

</head>
<body>
        <!-- cdn for adding jquery -->
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous">

</script>

        <!-- script for mouseover event handler. Turning image to black&white when moused over,and then normal when moused out.  -->

<script src ="bw_image_mouseover.js">
        </script>
                <!-- Navbar with links to other pages -->
<nav><?php include('menu.php');?></nav>
<main id='home'>
<?php 

//if the record doesn't exist, write there's an error with a message 
if($allData===FALSE || $allData===NULL)
{
        echo "<h1 id='red'> ERROR! The dessert does NOT exist! </h1>";
}
else { ?>

<?php

$query2 = 'SELECT dessertCategoryName 
           FROM dessertcategories
           WHERE dessertCategoryID = :dessertCategoryID';

$db = getDB();
$statement2=$db->prepare($query2);
$statement2->bindValue(':dessertCategoryID',$allData['dessertCategoryID']);
$statement2->execute();
$allData2=$statement2->fetch();
$statement2->closeCursor();

?>
        <h2 class="center">Dessert Details</h2>
        <table>
                                <!-- table headers -->

                <tr id="cornsilk">
                        <th id="palegoldenrod">DessertID</th>
                        <th id="palegoldenrod">DessertCategoryID</th>
                        <th id="palegoldenrod">DessertCategoryName</th>
                        <th id="peachpuff">DessertCode</th>
                        <th id="papayawhip">DessertName</th>
                        <th id="blanchedalmond">Description</th>
                        <th id="burlywood">Price</th>
                        <th id="burlywood">DateAdded</th>


                </tr>
                                <!-- display dessert details in a single record -->

                <tr>        
                <td id="palegoldenrod"><?php echo $allData['dessertID'];?></td>       
                <td id="palegoldenrod"><?php echo $allData['dessertCategoryID'];?></td>       
                <td id="palegoldenrod"><?php echo $allData2['dessertCategoryName'];?></td>       
                <td id="palegoldenrod"><?php echo $allData['dessertCode'];?></td>       
                <td id="palegoldenrod"><?php echo $allData['dessertName'];?></td>       
                <td id="palegoldenrod"><?php echo $allData['description'];?></td>       
                <td id="palegoldenrod"><?php echo $allData['price'];?></td>       
                <td id="palegoldenrod"><?php echo $allData['dateAdded'];?></td> 
                


        
        </tr>

        </table>
        <!-- display dessert image below record-->
        <figure id="barcode">
        <img src = "images/<?php echo $allData['dessertCode'];?>.jpg" id="dessertImage">
        <figcaption id>Your delicious dessert! ORDER NOW!</figcaption>
        </figure>
<?php }?>
</main>


</body>


<br>
<br>
<br>

<!-- Footer with copyright -->

<footer id="bottomfooter"> Copyright &copy; 2023 Alvee Jalal </footer>
</html>