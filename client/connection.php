<?php
    $conn1 = new mysqli('localhost','root','','ecommerce');
    if($conn1->connect_error){
        die();
    }
?>