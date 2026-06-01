<?php 
class Product{
    public $name;
    public $price;  
    public $quantity;

public function setName($ten){
    $this->name = $ten;
}
public function setPrice($gia){
    $this->price = $gia;
}
public function setQuantity($soLuong){
    $this->quantity = $soLuong;
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
 $product->setName("iphone X");
 $product->setPrice(999);
 $product->setQuantity(10);
echo $product->getInfo() . "<br>";
echo "Total: $" . $product->calculateTotal();
