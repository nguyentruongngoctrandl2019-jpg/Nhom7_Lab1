<?php
class Product{
    public $name;
    public $price;
    public $quantity;
    public function setName ($name){
        $this->name = $name;
    }
    public function setPrice ($price){
        $this->price = $price;
    }
    public function setQuantity ($quantity){
        $this->quantity = $quantity;
    }
    public function getInfo(){
    return "Name: " . $this ->name ."<br>" . 
           "Price: " . $this ->price ."<br>" . 
           "Quantity: " . $this ->quantity;
}
 public function calculateTotal(){
        if($this->price> 0){
            return true;
        } else {
            return false;
        }
    }
}

$product = new Product();
$product -> setName ("iPhone X");
$product -> setPrice (999);
$product -> setQuantity(10);

echo $product -> getInfo() . "<br>";
echo "Total: $" . $product ->calculateTotal();
