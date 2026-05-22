<?php
class Product
{
    public $name;
    public $price;
    public $quantity;

    // Set tên sản phẩm
    public function setName($name)
    {
        $this->name = $name;
    }

    // Set giá
    public function setPrice($price)
    {
        $this->price = $price;
    }

    // Set số lượng
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    // Hiển thị thông tin sản phẩm
    public function getInfo()
    {
        return "Product Name: " . $this->name . "<br>" .
            "Price: $" . $this->price . "<br>" .
            "Quantity: " . $this->quantity;
    }

    // Tính tổng giá trị sản phẩm
    public function calculateTotal()
    {
        return $this->price * $this->quantity;
    }
}

// Sử dụng lớp Product
$product = new Product();

$product->setName("IPhone X");
$product->setPrice(999);
$product->setQuantity(10);

// Hiển thị thông tin sản phẩm và tính tổng giá trị
echo $product->getInfo() . "<br>";
echo "Total: $" . $product->calculateTotal();
?>