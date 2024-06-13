<?php
    include "connection.php";
    include_once "all.html";
    session_start();
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if(isset($_POST['logsubmit'])){
        $cmd = 'select * from client';
        $result = mysqli_query($conn1, $cmd);
        $rows = mysqli_num_rows($result);
        for($i =0; $i<$rows;$i++){
            $ans = mysqli_fetch_assoc($result);
            if($uname == $ans['name'] && $pass == $ans['pass']){
                $_SESSION['username'] = $uname;
                $_SESSION['userpass'] = $pass;
                $_SESSION['manger'] = 'client'; 
                header('Location: home.php');
            }
        }
        echo "<div class='text-center mt-5'>Please Try Again</div>";
        echo "<div class='container text-center'><a href='login.php' class='btn btn-dark'> Login Here </a></div>";
    }
    else if(isset($_POST['regsubmit'])){
        $umail = $_POST['umail'];
        $cmd = 'select * from client';
        $result = mysqli_query($conn1, $cmd);
        $rows = mysqli_num_rows($result);
        for($i =0; $i<$rows;$i++){
            $ans = mysqli_fetch_assoc($result);
            if($uname == $ans['name'] && $pass == $ans['pass'] && $umail == $ans['email']){
                echo "<div class='text-center mt-5'>User is already registered</div>";
                echo "<div class='container text-center'><a href='login.php' class='btn btn-dark'> Login Here </a></div>";
                die();
            }
        }
        $_SESSION['username'] = $_POST['uname'];
        $_SESSION['usermail'] = $_POST['umail'];
        $_SESSION['userpass'] = $_POST['pass'];
        $cmd = "insert into client values('$uname', '$umail', '$pass')";
        $conn1->query($cmd);
        header('Location: home.php');
        
    }
    else{
        header('Location: login.php');
    }

?>
