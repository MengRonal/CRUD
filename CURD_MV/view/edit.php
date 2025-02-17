<?php
if (isset($_GET['id']) == "" || $_GET['id'] == null) {
    header('location:main.php');
}
?>

<?php
include "conponent/header.php";
include_once "../controller/usercontroller.php";
?>

<div class="container">
    <form method="post" class="shadow p-5">
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

        // Error
        $obj = new ProductController();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $obj->edit($id);
        }

        ?>
        <!-- end of message -->
        <div class="form-header d-flex justify-content-between align-items-center">
            <h3>Update Produce</h3>
            <a class="btn btn-danger btn-sm" href="main.php">Back</a>
        </div>
        <div class="form-group">
            <input type="hidden" name="product_id" value="<?php echo (!empty($product['product_id'])) ? $product['product_id'] : "" ?>" class="form-control">
            <label for="">Product Title</label>
            <input type="text" name="title" value="<?php echo (!empty($product['product_title'])) ? $product['product_title'] : "" ?>" class="form-control shadow-none">
        </div>
        <div class="form-group">
            <label for="">Product Price</label>
            <input type="text" name="price" value="<?php echo (!empty($product['product_price'])) ? $product['product_price'] : "" ?>" class="form-control shadow-none">
        </div>
        <div class="form-group">
            <label for="">Product Qty</label>
            <input type="number" name="qty" value="<?php echo (!empty($product['product_qty'])) ? $product['product_qty'] : "" ?>" class="form-control shadow-none">
        </div>
        <div class="form-group">
            <label for="">Product Image</label>
            <input type="file" name="image" class="form-control shadow-none">
        </div>
        <div class="form-button my-4">
            <button name="update" type="submit" class="btn  btn-success  ">Update</button>
            <a href="main.php" class="btn btn-secondary rounded-3 px-4">Casel</a>
        </div>
    </form>
    <?php
    if (isset($_POST["update"])) {
        $id = $_POST['product_id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];


        if (empty($id) || empty("title") || empty("price") || empty("qty")) {
            $_SESSION["status"] = 'error';
            header("location:edit.php?id=$id");
        } else {
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Update Product Success.!';
            $obj->update($id, $title, $price, $qty);
        }
    }
    ?>


</div>
<?php
include "conponent/footer.php" ?>