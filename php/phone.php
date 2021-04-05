<?php
    $phone=7777777773;
    $a=$phone%10;
    echo $a;

    if($a!=0){
    $b=$phone/$a;
        if($b==1111111111){
            echo 'failed';
        }
        else{
            echo "passed";
        }
    }
    else{
        echo 'passed';
    }
?>