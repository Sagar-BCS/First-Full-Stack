<?php
include_once "all.html";
include "alogin.php";
include "connection.php";

if (isset($_POST['add'])) {
    $id = $_POST['pid'];
    $auser = $_POST['auser'];
    $apass = $_POST['apass'];
    $pname = $_POST['pname'];
    $image = $_POST['pimg'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    if (!empty($_SESSION['cart'])) {
        $check = array_column($_SESSION['cart'], 'id');
        if (in_array($id, $check)) {
            echo "
        <script>
        alert('Product already added');
        window.location.href = 'home.php';
        </script>
        ";
        } else {
            $_SESSION['cart'][] = array('id' => $id, 'auser' => $auser, 'apass' => $apass, 'pname' => $pname, 'image' => $image, 'price' => $price, 'quantity' => $quantity);
            header("Location: home.php");
        }
    } else {
        $_SESSION['cart'][] = array('id' => $id,'auser' => $auser, 'apass' => $apass, 'pname' => $pname, 'image' => $image, 'price' => $price, 'quantity' => $quantity);
        header("Location: home.php");
    }
}

if (isset($_POST['rcart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id'] === $_GET['ID']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
    header("Location: mycart.php");
}
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
            min-width: 99%;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container my-2">
        <div class="row">
            <div class="col-sm-10 text-center p-3">
                <h1 class="fas text-danger ">MY CART</h1>
            </div>
        </div>
    </div>
    <form method="POST" action="myorder.php" class="container">
        <div class="row justify-content-around">
            <div class="col-lg-9 col-sm-12 c-1 bg-white">
                <table class="table text-center table-hover table-striped table-dark mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NAME</th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">REMOVE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total1 = 0;
                        if (!empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $key1 = $key + 1;
                                $total = $value['price'] * $value['quantity'];
                                $total1 = $total1 + $total;
                                $total = number_format($total,2);
                                $value['price'] = number_format($value['price'],2);
                                echo "
                            <form action='mycart.php?ID=$value[id]' method='POST'>
                            <tr>
                            <td scope='col'>$key1</td>
                            <td scope='col'>$value[pname]</td>
                            <td scope='col'><img src='$value[image]' alt='img'></td>
                            <td scope='col'>$value[price]</td>
                            <td scope='col'>$value[quantity]</td>
                            <td scope='col'>$total</td>
                            <td scope='col'><button name='rcart' class='btn btn-danger'><i class='fas fa-trash-alt'></i> Remove</button></td>
                            </tr>
                            </form>
                        ";
                            }
                        } else {
                        ?>

                            <tr>
                                <td colspan="8">Cart is empty please add item to list here</td>
                            </tr>
                        <?php
                        }
                        
                        ?>
                    </tbody>
                    <input type="hidden" name="tprice" value="<?php echo $total1?>">
                </table>
            </div>
            <div class="col-lg-3 fas d-flex flex-column justify-content-start align-content-center">
                <h3 class="text-center font-weight-bold text-white p-1">TOTAL</h3>
                <h5 class="text-center font-weight-bold p-2 w-75 mx-auto"><?php if($total1 != 0){echo "$ " . number_format($total1,2);}else{echo "No item added";}?></h5>
                <button name="buy" type="submit" class="btn btn-warning font-weight-bold w-50 mx-auto"><i class="far fa-money-bill-alt"></i> BUY</button>
            </div>
        </div>
    </form>

</body>

</html>