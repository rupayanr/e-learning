<?php
    // Establish Connection with the database 
    $conn = mysqli_connect("localhost","root","","e_learning");
    
    //Check if connection established or not 
    if(mysqli_connect_errno($conn)){
        echo 'Failed to established connection.' . mysqli_connect_error();
    }
    else{
        echo '<script> alert("Connection to database established.") </script>';

    }

?>
