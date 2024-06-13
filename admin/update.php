<?php
include_once "all.html";
include "connection.php";
include "adminnav.php";
$id = $_GET['ID'];
$cmd = "SELECT * FROM `product` WHERE id = $id";
$record = mysqli_query($conn2, $cmd);
$data = mysqli_fetch_array($record);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <div class="container ">
        <div class="row">
            <div class="c-1 col-md-8 mx-auto p-3 border border-primary mt-3 mb-5 rounded ">
                <form enctype="multipart/form-data" method="POST">
                    <div class="text-center p-3 text-danger">
                        <h1 class="fas text-uppercase">Update Products</h1>
                        <p class="fas">*Note img will be update just choose new image or Keep image again</p>
                    </div>
                    <div class="form-group">
                        <label class="fas">
                            <h4>Product Name: </h4>
                        </label>
                        <input type="text" required class="form-control" value="<?php echo $data['pname'] ?>" name="pname" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label class="fas">
                            <h4>Product Price:</h4>
                        </label>
                        <input type="text" required class="form-control" value="<?php echo $data['price'] ?>" name="price" placeholder="Enter product price">
                    </div>
                    <div class="form-group">
                        <label class="fas">
                            <h4>Product Description: </h4>
                        </label>
                        <textarea class="form-control" required name="pdes" rows="3" placeholder="Enter product description" maxlength="150"><?php echo $data['pdes'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="fas">
                            <h4>Add Product Image: </h4>
                        </label>
                        <input required type="file" class="form-control-file" name="image"><br>
                        <img src="<?php echo $data['image'] ?>" alt="img" style="width: 60px; height: 60px; border: 1px black solid;">
                    </div>
                    <div class="form-group">
                        <label class="fas">
                            <h4>Product Category: </h4>
                        </label>
                        <select required class="custom-select" name="pcat">
                            <option value="<?php echo $data['pcat'] ?>"><?php echo $data['pcat'] ?></option>
                            <option value="Electronic">Electronic</option>
                            <option value="Household">Household</option>
                            <option value="Different">Different</option>
                        </select>
                    </div>
                    <input type="submit" name="update" class="btn btn-danger btn-lg text-white font-weight-bold p-2 col-md-4" value="Update">
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['update'])) {
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

            $cmdp = "UPDATE `product` SET `pname`='$pname',`pcat`='$pcat',`pdes`='$pdes',`price`='$price',`image`='$dest' WHERE id = $id";

            $conn2->query($cmdp);
        } else {
            echo "<h3 class='text-center text-white bg-danger p-2'>Product Not Added USE JPG, JPEG, PNG file</h3>";
            echo "<h3 class='text-center text-white bg-danger p-2'>Upload Image file again</h3>";
        }
    }
    ?>
</body>

</html>