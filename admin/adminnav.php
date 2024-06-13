<?php
include_once "all.html";
include "connection.php";
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['userpass']) && $_SESSION['manger'] == 'admin') {
    $user = $_SESSION['username'];
    $pass = $_SESSION['userpass'];
} else {
    echo "<h3 class='text-center mt-5'>Please Try to login again</h3>";
    echo "<div class='container text-center'><a href='login.php' class='btn btn-dark'> Login Here </a></div>";
    die('');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            background-color: #861657;
            background: linear-gradient(326deg, #861657 0%, #ffa69e 74%)no-repeat;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <form method="POST" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php"><i class="fab fa-etsy"></i> - Commerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="#"><i class="fas fa-house-user"></i> Home<span class="sr-only">(current)</span> |</a>
                <a class="nav-link" href="admin.php"><i class="fab fa-product-hunt"></i> Products |</a>
                <a class="nav-link" href="status.php"><i class="fas fa-user-shield"></i> Delivery |</a>
                <button name="logout" class="btn nav-link"><i class="fas fa-sign-out-alt"></i> logout</button>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: login.php');
    }
    ?>
</body>

</html>