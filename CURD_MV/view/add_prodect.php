<?php
include "conponent/header.php";

?>
<div class="container">
    <form method="post" class="shadow p-5 " enctype="multipart/form-data">
        <!-- message -->
        <?php

        if (isset($_SESSION['status']) == 'error') {
        ?>
            <div class="text-light alert bg-danger alert-dismissible fade show" role="alert">
                <strong>Please Cheking. </strong> Please Input all feild.
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            session_destroy();
        }
        ?>
        <!-- end of message -->
        <div class="form-header d-flex justify-content-between align-items-center">
            <h3>Add Produce</h3>
            <a class="btn btn-danger btn-sm" href="main.php">Back</a>
        </div>
        <div class="form-group">
            <label for="">Product Title</label>
            <input type="text" name="title" class="form-control shadow-none">
        </div>
        <div class="form-group">
            <label for="">Product Price</label>
            <input type="text" name="price" class="form-control shadow-none">
        </div>
        <div class="form-group">
            <label for="">Product Qty</label>
            <input type="number" name="qty" class="form-control shadow-none">
        </div>
        <div class="form-group">
            <label for="">Product Image</label>
            <input type="file" name="image" class="form-control shadow-none">
        </div>
        <div class="form-button my-4">
            <button name="save" type="submit" class="btn  btn-success  ">Add Produce</button>
            <a href="main.php" class="btn btn-secondary rounded-3 px-4">Casel</a>
        </div>
    </form>
    <?php
    if (isset($_POST['save'])) {
        include "../controller/usercontroller.php";
        $obj = new ProductController();
        $title = $_POST['title'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];

        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['iamge']['tmp_name'];
        $imagedir = "../public/images/$file_name";
        move_uploaded_file($file_tmp, $imagedir);

        if (empty($title) || empty($price) || empty($qty)) {
            $_SESSION['status'] = 'error';
            header(("location: add_prodect.php"));
        } else {
            $_SESSION["status"] = "success";
            $_SESSION['message'] = 'Add Product Success.';
            $obj->store($title, $price, $qty, $file_name);
        }
    }


    ?>

</div>
<?php
include "conponent/footer.php" ?>