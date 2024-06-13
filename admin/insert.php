<?php
include_once "all.html";
include "connection.php";
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['userpass'])) {
    $user = $_SESSION['username'];
    $pass = $_SESSION['userpass'];
} else {
    echo "<h3 class='text-center mt-5'>Please Try to login again</h3>";
    echo "<div class='container text-center'><a href='login.php' class='btn btn-dark'> Login Here </a></div>";
    die('');
}


if (isset($_POST['upload'])) {
    $pname = $_POST['pname'];
    $pcat = $_POST['pcat'];
    $pdes = $_POST['pdes'];
    $price = $_POST['price'];
    $files = $_FILES['image'];

    $filename = $files['name'];
    $tmp1 = $files['tmp_name'];

    $filext = explode('.', $filename);
    $imgext = ['jpg', 'png', 'jpeg'];
    $check = strtolower(end($filext));

    if (in_array($check, $imgext)) {
        $filename = date("Y_m_d_H_i_s").'.jpg';
        $dest = '../prod/' . $filename;
        move_uploaded_file($tmp1, $dest);

        $cmdp = "INSERT INTO `product`( `user`, `pass`, `pname`, `pcat`, `pdes`, `price`, `image`) VALUES ('$user','$pass','$pname','$pcat','$pdes','$price','$dest')";

        $conn2->query($cmdp);
        header("Location: product.php");
    } else {
        echo "<h3 class='text-center text-white bg-danger p-2'>Product Not Added USE JPG, JPEG, PNG file</h3>";
        echo "<a class='btn btn-secondary text-center' href='product.php'>Go back</a>";
    }
}
