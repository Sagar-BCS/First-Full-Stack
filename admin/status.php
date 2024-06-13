<?php
include_once "all.html";
include "connection.php";
include "adminnav.php";
if (isset($_POST['deliver'])) {
    $did = $_POST['did'];
    $cmd2 = "UPDATE `order` SET `status`='y' WHERE id = $did";
    $upd = mysqli_query($conn2, $cmd2);
    if ($upd) {
        echo "<script>
        alert('Product is Deliver');
        window.location.href = 'status.php';
        </script>";
    } else {
        echo "<script>
        alert('Product is not Deliver');
        window.location.href = 'status.php';
        </script>";
    }
}
$cmd = "SELECT * FROM `order`";
$result = mysqli_query($conn2, $cmd);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Commerce | Status</title>
</head>

<body>
    <div class="fit-content mx-auto my-5 text-center">
        <h1 class="fas text-uppercase">Delivery Status</h1>
    </div>
    <form method="POST" action="status.php" class="c-1 container w-95 p-2 bg-light">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Buyer</th>
                    <th scope="col">Products</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php
                $c = 0;
                while ($fetch = mysqli_fetch_array($result)) {
                    $prod = " ";
                    if ($user == $fetch['admin'] && $pass == $fetch['pass']) {
                        $c++;
                        $prod = $prod . ", " . $fetch['products'];
                        $tprice = $fetch['price'];
                        $buyer = $fetch['client'];
                ?>
                        <tr>
                            <td><?php echo $c ?></td>
                            <td><?php echo $buyer ?></td>
                            <td><?php echo $prod ?></td>
                            <td><?php echo $tprice ?></td>
                            <td><?php if ($fetch['status'] == "n") {
                                    echo "<p class='text-danger'>Pending</p>";
                                } else if ($fetch['status'] == "y") {
                                    echo "<p class='text-success'>Delivered</p>";
                                } else {
                                    echo "<p class='text-secondary'>Undefined status</p>";
                                }
                                ?>
                            </td>
                            <input type="hidden" name="did" value="<?php echo $fetch['id'] ?>">
                            <td>
                                <?php if ($fetch['status'] == "n") {
                                ?>
                                    <button name="deliver" type="submit" class="btn btn-warning text-white font-weight-bold"><i class="fas fa-check-circle"></i> Deliver</button>
                                <?php
                                } else if ($fetch['status'] == "y") {
                                    echo "<p class='text-success'>Delivered</p>";
                                } else {
                                ?>
                                    <button name="deliver" type="submit" class="btn btn-warning text-white font-weight-bold"><i class="fas fa-check-circle"></i> Deliver</button>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </form>
</body>

</html>