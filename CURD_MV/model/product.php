<?php
include "../database/database.php";
class Product extends Database
{
    private $id;
    public $title;
    public $qty;
    public $price;
    public $image;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function save()
    {
        $sql = "INSERT INTO `product`( `product_title`, `product_price`, `product_qty`,`product_image`)
        VALUES ('{$this->title}','{$this->price}','{$this->qty}','{$this->image}')";
        mysqli_query($this->conn, $sql);
    }

    public function update()
    {
        $sql = "UPDATE `product` SET `product_title`='{$this->title}',`product_price`='{$this->price}',`product_qty`='{$this->qty}' WHERE `product_id` = {$this->id}";
        mysqli_query($this->conn, $sql);
    }


    public function selectbyid($id)
    {
        // $sql = "SELECT * FROM `product` WHERE `product_id`= {this->id}";
        $sql = "SELECT * FROM `product` WHERE `product_id` = $id";
        $result = mysqli_query($this->conn, $sql);

        $row = mysqli_fetch_assoc($result);
        return $row;
    }


    public function all($search)
    {
        $sql = "SELECT * FROM `product` WHERE `product_title` LIKE '%$search%' ";
        $result = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = [
                'product_id' => $row['product_id'],
                'product_title' => $row['product_title'],
                'product_price' => $row['product_price'],
                'product_qty' => $row['product_qty'],
                'product_image' => $row['product_image']
            ];
        }
        return $data;
    }
    public function Delete()
    {
        $sql = "DELETE FROM `product` WHERE `product_id`= {$this->id}";
        mysqli_query($this->conn, $sql);
    }
}
