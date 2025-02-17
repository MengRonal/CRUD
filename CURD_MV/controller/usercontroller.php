<?php
include '../model/product.php';
include "../handle/Redirect.php";
include "../handle/message.php";
class ProductController
{

    public function store($title, $price, $qty, $image)
    {
        $product = new Product();
        $product->title = $title;
        $product->price = $price;
        $product->qty = $qty;
        $product->image = $image;
        $product->save();

        return redirect("main.php");
    }
    public function index($search)
    {
        $products = new Product();

        $allData =  $products->all($search);

        return $allData;
    }

    public function delete($id)
    {
        $product = new Product();
        $product->setId($id);

        $row = $product->selectbyid($id);
        $image = $row['product_image'];
        $imageDir = '../public/images/$image';
        if (file_exists($imageDir)) {
            unlink($imageDir);
        }
        $product->Delete();


        return redirect('main.php');
    }

    public function edit($id)
    {
        $product = new Product();
        $data = $product->selectbyid($id);

        return $data;
    }

    public function update($id, $title, $price, $qty)
    {
        $product = new Product();
        $product->title = $title;
        $product->price = $price;
        $product->qty = $qty;
        $product->setId($id);
        $product->update();
        return redirect("main.php");
    }
}
