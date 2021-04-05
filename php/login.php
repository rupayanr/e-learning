<!DOCTYPE html>
<html lang=en>
<head>
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <style>
        div.a{
    font-family: "Source Sans Pro";
    background-color: deepskyblue;
    padding :10px;
    height:70px;
    }
    body{
        background-color:aliceblue;
        font-family: 'Source Sans Pro';
        margin: 0px;
    }
    ::placeholder{
        color:lightgrey;
        font-family:"Source Sans Pro";
        font-size:10px
    }
    table{
        border-collapse: separate;
        border-spacing: 0 1em;
        font-family:"Source Sans Pro";
    }
    input[type="submit"]
            {
            background-color:forestgreen;
            font-family:"Source Sans Pro";
            font-weight: bold;
            font-size: 13.5px;
            color: white;
            border-radius: 7px;
            height: 30px;
            width: 80px;			
            cursor: pointer;
            }    
    input[type="reset"]
            {
                font-family:"Source Sans Pro";
                background-color:red;
                font-weight:bold;
                font-size:13.5px;
                color:white;
                border-radius:7px;
                height: 30px;
                width:80px;			
                cursor: pointer;
                margin-left:20px;
            }

    header{
        letter-Spacing: 3px;
        padding: 0.6px;
        background-color : #6ab8db;
        padding-left: 10px;
    }        

    h1{
        letter-spacing: 2px;
        font-weight: bold;
        font-size: 50px;
    }
    </style>
</head>
    <body>
    <header>
        <h1>E-LEARNING</h1>
    </header>

    <form  action='#'  method='post'>
    <table align='center'>
    <tr><td></td><td><h1 style="font-size:50px; font-weight:lighter;">Login</h1></td></tr>
    <tr><td style="padding-left: 25px;">Email</td><td><input type='email' name='email' size=27px placeholder='    Enter Email Id' required /></td><br>
    <tr><td style="padding-right: 18px;">Password</td><td><input type='password' name='pwd'size=27px placeholder='    Enter Password' required /></td><td><br>
    <tr><td></td><td><input type='submit' name='submit' value='Login'><input type='reset' name='reset' value='Reset'></td></tr></br>
    </form>
    </table>
    </body>
</html>

<?php
    session_start();
    if (isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $pass = $_POST['pwd'];
        if (strtolower($email) == 'admin_123@elearn.com')
        {
            if ($pass == '#Elearn@123')
            {
                $_SESSION['logged_in']=true;
                header('location:homepage.php');
            }
            else
            {
                echo '<script> alert("Please enter the correct password") </script>';
            }
        }
        else
        {
            echo '<script> alert("You are not authorized to log in as admin!")</script>';
        }

    }

?>
