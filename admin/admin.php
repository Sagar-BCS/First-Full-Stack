<?php
include_once "all.html";
include "connection.php";
include "adminnav.php";
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $cmdel = "DELETE FROM `product` WHERE id = $id";
    $result = mysqli_query($conn2, $cmdel);
    if (!$result) {
        die();
    }
    $img2 = $_GET['image'];
    unlink("../$img2");
}
$cmd = "SELECT * FROM `product`";
$record = mysqli_query($conn2, $cmd);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        tbody img {
            height: 90px;
            width: 90px;
            border-radius: 50%;
        }

        .container {
            min-width: 95%;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <form class="mt-4">
        <ul class="d-flex justify-content-center list-group list-group-horizontal">
            <a href="product.php" class="btn list-group-item bg-danger text-light mx-1"><i class="fas fa-cart-plus"></i> Add Product</a>
            <a href="admin.php" class="btn list-group-item bg-danger text-light mx-1"><i class="fas fa-eye-slash"></i> View Product</a>
        </ul>
    </form>
    <div class="text-center text-primary mt-2">
        <h1 class="fas text-uppercase">Your Products</h1>
    </div>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12 c-1 bg-white">
                <table class="table table-hover table-striped table-dark mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NAME</th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">Category</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">UPDATE</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($record)) {
                            if ($row['user'] == $user && $row['pass'] == $pass) {
                                $i++;
                                echo "
                <tr>
                    <th scope='row'>$i</th>
                    <td>$row[pname]</td>
                    <td><img src='$row[image]' alt='img'></td>
                    <td>$row[pcat]</td>
                    <td>$row[price]</td>
                    <td><a href='update.php?ID=$row[id]' class='btn btn-warning'><i class='fas fa-edit'></i> Update</a></td>
                    <td><a href='admin.php?ID=$row[id]&image=$row[image]' class='btn btn-danger'><i class='fas fa-trash'></i> Remove</a></td>
                </tr>
                ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php

    ?>
</body>

</html>