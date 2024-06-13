<?php
include "alogin.php";
include "connection.php";
$user = $_SESSION['username'];
$pass = $_SESSION['userpass'];
$tprice = 0;
if (isset($_POST['buy'])) {
    $cmd1 = "SELECT * FROM `admin`";
    $result = mysqli_query($conn1, $cmd1);
    while($fetch = mysqli_fetch_array($result)){
        $pnames = " ";
        $pprice = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value['auser'] == $fetch['name'] && $value['apass'] == $fetch['pass']){
                $pnames = $pnames . ", " . $value['pname'];
                $total = $value['price']* $value['quantity'];
                $pprice = $pprice + $total;
            }
        }
        if($pnames != " " && $pprice != 0){
            $cmd2 = "INSERT INTO `order`(`admin`, `pass`, `client`, `pass2`, `price`, `products`, `status`) VALUES ('$fetch[name]','$fetch[pass]','$user', '$pass', '$pprice','$pnames','n')";
            $result2 = mysqli_query($conn1, $cmd2);
            if(!$result2){
                echo "<script>alert('Product not added');window.location.href = 'mycart.php';</script>";
            }
        }
        
    }
    
    $tprice = $_POST['tprice'];
    foreach ($_SESSION['cart'] as $i => $value) {
        unset($_SESSION['cart'][$i]);
    }
    echo "<script>alert('Cart is cleared');window.location.href = 'myorder.php';</script>";
}
$cmd3 = "SELECT * FROM `order`";
$result3 = mysqli_query($conn1, $cmd3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce | Orders</title>
</head>

<body>
    <div class="fit-content mx-auto my-5 text-center">
        <h1 class="fas">Placed Orders Status</h1>
    </div>
    <div class="container w-95 p-1">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Products</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php
                $c=0;
                    while($fetch = mysqli_fetch_array($result3)){
                        $prod = " ";
                        if($user == $fetch['client'] && $pass == $fetch['pass2']){
                            $c++;
                            $prod = $prod . ", " . $fetch['products'];
                            $tprice = $fetch['price'];
                            $owner = $fetch['admin'];
                ?>
                <tr>
                    <td><?php echo $c?></td>
                    <td><?php echo $owner?></td>
                    <td><?php echo $prod?></td>
                    <td><?php echo $tprice ?></td>
                    <td><?php if($fetch['status'] == "n"){
                            echo "<p class='text-danger font-weight-bold'>Not Deliver</p>";
                        }else{
                            echo "<p class='text-success font-weight-bold'>Delivered</p>";
                        }
                        ?></td>
                </tr>
                <?php
                        }
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>