<?php
include_once "all.html";
include "connection.php";
include "adminnav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form class="mt-4">
        <ul class="d-flex justify-content-center list-group list-group-horizontal">
            <a href="product.php" class="btn list-group-item bg-danger text-light mx-1"><i class="fas fa-cart-plus"></i> Add Product</a>
            <a href="admin.php" class="btn list-group-item bg-danger text-light mx-1"><i class="fas fa-eye"></i> View Product</a>
        </ul>
    </form>
    <div class="container">
        <div class="row">
            <div class="c-1 bg-white col-md-8 mx-auto p-3 border border-primary mt-3 mb-5 rounded ">
                <form enctype="multipart/form-data" action="insert.php" method="POST">
                    <div class="text-center p-3 text-warning">
                        <h1 class="fas text-uppercase">Add Products</h1>
                    </div>
                    <div class="form-group">
                        <label class="fas">
                            <h4>Product Name: </h4>
                        </label>
                        <input type="text" required class="form-control" name="pname" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label class="fas">
                            <h4>Product Price:</h4>
                        </label>
                        <input type="text" required class="form-control" name="price" placeholder="Enter product price">
                    </div>
                    <div class="form-group">
                        <label class="fas">
                            <h4>Product Description: </h4>
                        </label>
                        <textarea class="form-control" required name="pdes" rows="3" placeholder="Enter product description" maxlength="150"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="fas">
                            <h4>Add Product Image: </h4>
                        </label>
                        <input required type="file" class="form-control-file" name="image">
                    </div>
                    <div class="form-group">
                        <label class="fas">
                            <h4>Product Category: </h4>
                        </label>
                        <select required class="custom-select" name="pcat">
                            <option selected>--Choose--</option>
                            <option value="Electronic">Electronic</option>
                            <option value="Household">Household</option>
                            <option value="Different">Different</option>
                        </select>
                    </div>
                    <input type="submit" name="upload" class="btn btn-danger btn-lg text-white font-weight-bold p-2 col-md-4" value="Upload">
                </form>
            </div>
        </div>
    </div>
</body>

</html>