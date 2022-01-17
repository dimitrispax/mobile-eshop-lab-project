<?php
    //open connection to mysql db
    $connection = mysqli_connect("localhost","root","root","eshop") or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    $sql = "select * from phones";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

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