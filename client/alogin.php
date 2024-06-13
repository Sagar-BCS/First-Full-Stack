<?php
include_once "all.html";
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['userpass']) && $_SESSION['manger'] == 'client') {
    $user = $_SESSION['username'];
    $pass = $_SESSION['userpass'];
} else {
    echo "<h3 class='text-center mt-5'>Please Try to login again</h3>";
    echo "<div class='container text-center'><a href='login.php' class='btn btn-dark'> Login Here </a></div>";
    die('');
}
$cartkey = 0;
if (!empty($_SESSION['cart'])) {
    $cartkey = count($_SESSION['cart']);
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

        .c-1 {
            box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%),
                0 6px 20px 0 rgb(0 0 0 / 19%) !important;
        }

        .tdn {
            text-decoration: none;
        }

        .w-90 {
            width: 90%;
        }

        .w-95 {
            width: 95%;
        }

        .w-98 {
            width: 98%;
        }

        .bg-card {
            background: #acbb78;
        }
    </style>
</head>

<body>
    <form method="POST" class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-light fas" href="../index.php"><i class="fab fa-etsy"></i> - Commerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link text-warning" href="home.php"><i class="fab fa-product-hunt"></i> Products<span class="sr-only">(current)</span> |</a>
                <a class="nav-link text-warning" href="mycart.php"><i class="fas fa-shopping-cart"></i> Cart (<?php echo $cartkey ?>) |</a>
                <a class="nav-link text-warning" href="myorder.php"><i class="fas fa-user-shield"></i> <?php echo $user ?> |</a>
                <button name="logout" class="btn nav-link text-warning"><i class="fas fa-sign-out-alt"></i> logout</button>
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