<?php

session_start();

$connection = mysqli_connect("localhost","root","root","eshop") or die("Error " . mysqli_error($connection));


//fetch table rows from mysql db
$sqlusers = "SELECT id FROM users WHERE email= '".$_SESSION['email']."'";     
$resultusers = mysqli_query($connection, $sqlusers) or die("Error in Selecting " . mysqli_error($connection));

while($row = mysqli_fetch_array($resultusers)){ 
    
    $UserId = $row['id'];
    
 }


//  echo $UserId;


//fetch table rows from mysql db
$sqlorders = "SELECT productID, date FROM orders WHERE userID= ' ". $UserId . " ' ";    
$resultorders = mysqli_query($connection, $sqlorders) or die("Error in Selecting " . mysqli_error($connection));

while($row = mysqli_fetch_array($resultorders)){ 

    $ProductId = $row['productID'];
    $Date = $row['date'];
 }


$sqlproducts = "SELECT * FROM phones WHERE productId= ' ". $ProductId . " ' ";    
$result = mysqli_query($connection, $sqlproducts) or die("Error in Selecting " . mysqli_error($connection));

//create an array
$emparray = array();
while($row = mysqli_fetch_assoc($result))
{
    $row["date"] = $Date;
    array_push($emparray, $row);
    
}



$json = json_encode($emparray);



//close the db connection
mysqli_close($connection);

echo $json;
?>