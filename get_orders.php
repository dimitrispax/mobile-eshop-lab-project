<?php
    //open connection to mysql db
    $connection = mysqli_connect("localhost","root","root","eshop") or die("Error " . mysqli_error($connection));


    //fetch table rows from mysql db
    $sqlusers = "SELECT id FROM users WHERE email= '".$_SESSION['email']."'";     
    $resultusers = mysqli_query($connection, $sqlusers) or die("Error in Selecting " . mysqli_error($connection));

    $UserId = $row['id'];


    //fetch table rows from mysql db
    $sqlorders = "SELECT productId FROM orders WHERE userId= ' ". $UserId . " ' ";    
    $resultorders = mysqli_query($connection, $sqlorders) or die("Error in Selecting " . mysqli_error($connection));

    $ProductId = $row['productId'];


    $sqlproducts = "SELECT * FROM products WHERE productId= ' ". $ProductId . " ' ";    
    $result = mysqli_query($connection, $sqlproducts) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    $json = json_encode($emparray);

    //close the db connection
    mysqli_close($connection);

    echo $json;
?>