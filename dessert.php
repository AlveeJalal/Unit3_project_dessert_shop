<!-- 
Alvee Jalal 
2/20/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 2 
ahj24@njit.edu -->

<?php require_once('database.php');

//get all desserts' categoryName, dessertCode, dessertName, description, and price
$query = 'SELECT dessertCategoryName, dessertID, dessert.dessertCategoryID, dessertCode, dessertName, description, price 
                  FROM dessertcategories INNER JOIN dessert
                  on dessertcategories.dessertCategoryID = dessert.dessertCategoryID';

//prepare, execute, fetch all dessert data
$db = getDB();
$statement = $db->prepare($query);
$statement->execute();
$desserts=$statement->fetchall();
$statement->closeCursor();


?>
<!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"> </script>
<head>
  <!-- Title for Desserts Page -->
<title>DESSERTS</title>
<!-- Header code included from header.php file -->
<?php include('header.php'); ?>
</head>
<body>
            <!-- Navbar with links to other pages -->
            <nav><?php include('menu.php');?></nav>
<h1 class="center"> Dessert Menu! </h1>
<main>
    <!-- Empty section for centering the table -->
    <section id="table">
            <!-- Empty Aside for centering the table -->
        <aside>

            <!-- Table to display the dessert data (dessertCategory, dessertCode, dessertName, description, price) -->

  <table>

  <tr id="cornsilk">
        <th id="palegoldenrod">DessertCategoryName</th>         
        <th id="peachpuff">DessertCode</th>
        <th id="papayawhip">DessertName</th>
        <th id="blanchedalmond">Description</th>
        <th id="burlywood">Price</th>
        <!-- Display the delete buttons -->
        <?php if(isset($_SESSION['is_valid_admin'])) {?>
        <th id="burlywood">Delete</th>
       <?php }?>

  </tr>


              <!-- For each loop to display each value -->

  <?php foreach ($desserts as $dessert) : ?>
    <tr>
    <td id="palegoldenrod"><?php echo $dessert['dessertCategoryName'];?></td>
    <td id="peachpuff"><a href ="dessert_details.php?dessert_id=<?php echo $dessert['dessertID'];?>"><?php echo $dessert['dessertCode'];?></a></td>
    <td id="papayawhip"><?php echo $dessert['dessertName'];?></td>
    <td id="blanchedalmond"><?php echo $dessert['description'];?>.</td>
    <td id="burlywood">$<?php echo $dessert['price'];?></td>
    <!-- If the user is logged in, display the DELETE buttons. If they're not logged in, DONT display them-->
    <?php if(isset($_SESSION['is_valid_admin']))
{?>
    <td><form action = "delete_dessert.php" id="delete_dessert_form" method = "post">
      <input type="hidden" name="dessertID" value ="<?php echo $dessert['dessertID'];?>">
      <input type="hidden" name="dessertCategoryID" value="<?php echo $dessert['dessertCategoryID'];?>">
      <input type="submit" id="delete_dessert" name="delete_dessert" value="DELETE">
  </td>
    </form>
    </tr>
    <?php }?>
    <?php endforeach; ?>
  </table>
  </aside>
  </section>
</main>
</body>
<!-- script to handle delete button click event -->
<script src="delete_confirm.js"> </script>

<!-- Footer with copyright -->
<footer> Copyright &copy; 2023 Alvee Jalal </footer>
</html>