<?php
include "conponent/header.php";

?>
<?php
include "../controller/usercontroller.php";

?>
<?php
include "../handle/modal.php";

?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Product</h3>
        <a href="add_prodect.php" class="btn btn-primary btn-sm">Add More</a>
    </div>

    <?php

    if (isset($_SESSION['status']) == 'success') {
    ?>
        <div class="text-light alert bg-success alert-dismissible fade show" role="alert">
            <stron>Emjuy. </stron><?php echo $_SESSION['message'] ?>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        session_destroy();
    }
    ?>
    <!-- // end of message -->



    <?php
    $obj = new ProductController();
    $products = $obj->index("");


    // <!-- print chea array -->
    // echo "<pre>";
    // print_r($products);
    // echo "<?pre>";

    ?>
    <?php
    ModelDelete()
    ?>
    <div class="d-flex justify-content-end my-3">

        <form class="mx-3">
            <input type="search" name="search" class="form-control shadow-none " placeholder="Seach">
        </form>
        <a href="main.php" class="btn btn-danger btn-sm rounded px-3 ">Reset</a>
        <?php
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $products = $obj->index($search);
        }
        ?>
    </div>
    <table class=" table table-border">
        <tr class="table-success">
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Qty</th>
            <th class="text-center">Action</th>
        </tr>

        <?php
        foreach ($products  as $product) {
        ?>
            <tr class="align-middle text-center">
                <td><?php echo $product['product_id'] ?></td>
                <td>
                    <img style="width: 100px; height: 100px ;" src="../public/image/<?php echo $product['product_image'] ?>" alt="">
                </td>
                <td><?php echo $product['product_title'] ?></td>
                <td><?php echo $product['product_price'] ?>$</td>
                <td><?php echo $product['product_qty'] ?>in Stok</td>
                <td class="text-center">
                    <a href="edit.php?id=<?php echo $product['product_id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a onclick="DeleteProduct(<?php echo $product['product_id'] ?>)" data-bs-toggle="modal" data-bs-target="#Modal_delete" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php


        }

        if (isset($_POST['yes_delete'])) {
            $id = $_POST['product_id'];
            $obj->delete($id);
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Delete Product Success.';
        }
        ?>


    </table>
</div>
<?php
include "conponent/footer.php"
?>