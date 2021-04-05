<?php 
    session_start();    
    include('C:\xampp\htdocs\project\MyProject\html\homepage.html');

    //Buffering the tab outputs of homepage.html  
    ob_start();
    if(isset($_REQUEST['view_sc']))
    {
        include('view_sc.php');
    }

    if(isset($_REQUEST['sc_new']))
    {   
        ob_end_clean();
        include('sc_new.php');
    }
    ob_start();

    if(isset($_REQUEST['report']))
    {
        include('report.php');
    }

    if(isset($_REQUEST['ldbrd']))
    {   
        ob_clean();
        include('leaderboard.php');
    }
    
    ob_start();
    if(isset($_REQUEST['add_train']))
    {
        include('add_trainer.php');
    }



?>
