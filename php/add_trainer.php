<?php
    echo '<script> alert("You are in add trainer module") </script>';
    
    include('php_mysql_conn.php');
    include('C:\xampp\htdocs\project\MyProject\html\add_trainer.html');

   /* //Querry to be written for the database
        $query = 'SELECT * FROM trainer_details';

    //Running the querry and getting a result  
        $res = mysqli_query($conn,$query);
    
    //fetching the result 
        $arr = mysqli_fetch_all($res,MYSQLI_ASSOC);
        
    //free result from memory 
        mysqli_free_result($res);
    
    //close connection 
        mysqli_close($conn);
    
        print_r($arr);
    
   */
        
?>  