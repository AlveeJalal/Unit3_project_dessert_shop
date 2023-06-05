<!-- 
Alvee Jalal 
2/5/23
IT 202 
006
Unit 3 Project Assignment Dessert Shop Phase 1 
ahj24@njit.edu -->


<?php 
//retrieve form data
$first_name = filter_input(INPUT_POST,'first_name');
$last_name = filter_input(INPUT_POST,'last_name');
$street_address = filter_input(INPUT_POST,'street_address');
$city = filter_input(INPUT_POST,'city');
$state = filter_input(INPUT_POST,'state');
$zipcode = filter_input(INPUT_POST,'zipcode');
$shipping_date = filter_input(INPUT_POST,'shipping_date');
$order_number = filter_input(INPUT_POST,'order_number',FILTER_VALIDATE_INT);
$length = filter_input(INPUT_POST,'length',FILTER_VALIDATE_FLOAT);
$width = filter_input(INPUT_POST,'width',FILTER_VALIDATE_FLOAT);
$height = filter_input(INPUT_POST,'height',FILTER_VALIDATE_FLOAT);
$weight = filter_input(INPUT_POST,'weight',FILTER_VALIDATE_FLOAT);


//conditions to validate data. Show error message if there is a problem with the data
if($first_name=='' || is_numeric($first_name))
{
    $error_message="Please enter a valid first name.";
}

else if($last_name==''|| is_numeric($last_name))
{
    $error_message="Please enter a valid last name.";
}

else if($street_address=='')
{
    $error_message="Please enter a valid street address.";
}

else if($city=='' || is_numeric($city))
{
    $error_message="Please enter a valid city.";
}

else if($state=='')
{
    $error_message="Please enter a valid U.S. State in ALL CAPS.";
}
else if($zipcode===FALSE ||!is_numeric($zipcode) )
{
    $error_message="Please enter a valid numerical zip code.";
}
else if($shipping_date==='')
{
    $error_message="Please enter a valid shipping date.";
}
else if($order_number===FALSE)
{
    $error_message="Please enter a valid order number.";
}
else if($length===FALSE || $length > 36 || !is_numeric($length))
{
    $error_message="Please enter a valid numerical length and one that is no more than 36 inches.";
}
else if($width===FALSE || $width > 36 || !is_numeric($width))
{
    $error_message="Please enter a valid numerical width and one that is no more than 36 inches.";
}
else if($height===FALSE || $height > 36 || !is_numeric($height)) 
{
    $error_message="Please enter a valid numerical height and one that is no more than 36 inches.";
}
else if($weight===FALSE || $weight>150 || !is_numeric($weight))
{
    $error_message="Please enter a valid numerical weight and one that is no more than 150 pounds";
}

else if($state!=='AL' &&  $state!=='AK'
&&  $state!=='AZ' &&  $state!=='AR' && $state!=='CA' && $state!=='CO' && 
$state!=='CT' && $state!=='DE' && $state!=='FL' && $state!=='GA' && $state!=='HI' && $state!=='ID' && $state!=='IL' && 
$state!=='IN' && $state!=='IA' && $state!=='KS' && $state!=='KY' && $state!=='LA' && $state!=='ME' && $state!=='MD' && 
$state!=='MA' && $state!=='MI' && $state!=='MN' && $state!=='MS' && $state!=='MO' && $state!=='MT' && $state!=='NE' && 
$state!=='NV' && $state!=='NH' && $state!=='NJ' && $state!=='NM' && $state!=='NY' && $state!=='NC' && $state!=='ND' && 
$state!=='OH' && $state!=='OK' && $state!=='OR' && $state!=='PA' && $state!=='RI' && $state!=='SC' && $state!=='SD' && 
$state!=='TN' && $state!=='TX' && $state!=='UT' && $state!=='VT' && $state!=='VA' && $state!=='WA' && $state!=='WV' && 
$state!=='WI' && $state!=='WY')
{
    $error_message="Please enter a valid U.S. State in ALL CAPS";
}


//if there's no error with the data, set error message to nothing
else{
    $error_message='';
}

//if the error message isn't empty (i.e there is an error message), include the shipping.php page
if($error_message!=='')
{
    include('shipping.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title for shipping results -->
<title>Order Info</title>
<!-- Header code included from header.php file -->
<?php include('header.php'); ?>
</head>

<body>
    <main>
            <!-- Navbar with links to other pages -->
<nav><?php include('menu.php');?></nav>

<!-- Header explaining what the page is for -->
<h1 class="center"> Your Order Information </h1>

<section id="label">

<!-- Information for Dimensions-->
<label id='space'>FROM: </label><label> <strong>WEIGHT:</strong> </label> <span id='labelspace'><?php echo htmlspecialchars($weight);?> LBS </span>

<label> <strong>LENGTH:</strong> </label> <span id='labelspace'>  <?php echo htmlspecialchars($length);?> IN. </span><span id='labelspace'> X </span>
<label> <strong>WIDTH:</strong> </label> <span id='labelspace'>  <?php echo htmlspecialchars($width);?> IN. </span><span id='labelspace'> X </span>
<label> <strong>HEIGHT:</strong> </label> <span id='labelspace'>  <?php echo htmlspecialchars($height);?> IN. </span>

 <label id="right"> <strong> 1 OF 1 </strong></label>


 <!-- FROM Address information (Dessert Shop information)-->
<p>Alvee's Delicious Desserts </p> 
<p>5647852476</p>
<p>888 Delicious ST.</p>
<p>Princeton, NJ 07458</p>



 <!-- TO Address information (Customer information)-->

<label id='space'>SHIP TO: </label>

<p class='indent'><?php echo htmlspecialchars($first_name); ?> <?php echo htmlspecialchars($last_name); ?> </p> 
<p class='indent'><?php echo htmlspecialchars($street_address); ?> </p> 
<p class='indent'><?php echo htmlspecialchars($city); ?> <?php echo htmlspecialchars($state); ?> <?php echo htmlspecialchars($zipcode); ?> </p> 
<p class='indent'></p>
<p class='line'> </p>

 <!-- Order information-->
<img src='images/qr-code.png' width="100px" height="100px" id="field"> <label id='order'> <strong>ORDER #:</strong> </label> <?php echo htmlspecialchars($order_number);?> 

 <!-- Shipping information-->
<span id='labelspace'> </span><strong>SHIPPING DATE:</strong><?php echo htmlspecialchars($shipping_date);?>

<p class='line'> </p>
<label id='divider'> UPS NEXT DAY AIR </label> <span id='labelspace'></span> <label><strong>TRACKING #:</strong> 1B 987 7Z2 23 7756 2023</label>
<p class='line'> </p>
<img src="images/barcode.png" width="500px" height="150px" id='field'> </label> <span id='labelspace'></span> <label>BILLING: P/P</label> <span id='labelspace'></span> DESC:N/A <span id='labelspace'></span> Ref NO: 123456789

</section>

 <!-- Contact Info-->
<figure id='left'><img src="images/call.png" width="100px" height="100px"/> <figcaption>If there is anything wrong with the information above or your food, contact our number: (973) 123-456</figcaption></figure>

<!-- Footer with copyright -->
<footer> Copyright &copy; 2023 Alvee Jalal </footer>
</main>
</body> 

</html>