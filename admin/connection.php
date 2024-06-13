<?php
    $conn2 = new mysqli('localhost','root','','ecommerce');
    if($conn2->connect_error){
        die();
    }
?>