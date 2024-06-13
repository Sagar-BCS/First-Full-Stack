<?php
include "all.html";
include "alogin.php";
include "connection.php";

if (isset($_GET['ed'])) {
    $ed = $_GET['ed'];
} else {
    $ed = 'Electronic';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .imgcard {
            width: 150px;
            height: 150px;
            border: 5px red solid;
            border-radius: 50%;
        }
    </style>
    <title>Document</title>
</head>

<body>

    <form class="mt-4">
        <ul class="d-flex justify-content-center list-group list-group-horizontal">
            <a href="home.php?ed=Electronic" class="btn list-group-item bg-danger text-light mx-1"><i class="fas fa-plug"></i> Electronic</a>
            <a href="home.php?ed=Household" class="btn list-group-item bg-danger text-light mx-1"><i class="fas fa-home"></i> Household</a>
            <a href="home.php?ed=Different" class="btn list-group-item bg-danger text-light mx-1"><i class="fab fa-pied-piper-hat"></i> Different</a>
        </ul>
    </form>
    <div class="container w-98 mt-3 d-flex flex-wrap text-center">
        <?php
        $product = mysqli_query($conn1, 'SELECT * FROM product');
        $rowcount = mysqli_num_rows($product);
        while ($fetch = mysqli_fetch_array($product)) {
            if ($fetch['pcat'] == $ed) {
        ?>
                <form method="POST" action="mycart.php">
                    <div class=" c-1 card m-2 bg-card" style="width: 250px">
                        <div class="my-2">
                            <input type="hidden" name="pid" value="<?php echo $fetch['id'] ?>">
                            <input type="hidden" name="auser" value="<?php echo $fetch['user'] ?>">
                            <input type="hidden" name="apass" value="<?php echo $fetch['pass'] ?>">
                            <input type="hidden" name="pimg" value="<?php echo $fetch['image'] ?>">
                            <input type="hidden" name="pname" value="<?php echo $fetch['pname'] ?>">
                            <input type="hidden" name="price" value="<?php echo $fetch['price'] ?>">
                        </div>
                        <img class="card-img-top mx-auto imgcard" src="<?php echo $fetch['image'] ?>" alt="Card image">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h4 class="card-title fas text-center"><?php echo $fetch['pname'] ?></h4>
                            <h5 class="card-text">Price: $<?php echo number_format($fetch['price'], 2) ?></h5>
                            <input required type="number" class="text-center mx-auto form-control col-6" name="quantity" min='0' max='20' placeholder="Quantity">
                        </div>
                        <div class="mb-3 d-flex flex-column align-items-center mx-auto">
                            <button type="submit" name="add" class="btn btn-warning mb-2"><i class='fas fa-cart-plus'></i> Add TO Cart</button>
                            <div class="dropdown p-0 m-0">
                                <button class="btn btn-primary dropdown-toggle" id="dp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Description
                                </button>
                                <div class="dropdown-menu p-0 m-0" aria-labelledby="dp">
                                    <p class="p-2"><?php echo $fetch['pdes'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>