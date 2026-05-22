<?php
class Person
{
    public $name;
    public $age;
    public $address;

    // Hàm set tên
    public function setName($name)
    {
        $this->name = $name;
    }

    // Hàm set tuổi
    public function setAge($age)
    {
        $this->age = $age;
    }

    // Hàm set địa chỉ
    public function setAddress($address)
    {
        $this->address = $address;
    }

    // Hàm lấy thông tin
    public function getInfo()
    {
        return "Name: " . $this->name . "<br>" .
            "Age: " . $this->age . "<br>" .
            "Address: " . $this->address . "<br>";
    }

    // Kiểm tra có đủ tuổi bầu cử không
    public function canVote()
    {
        if ($this->age >= 18) {
            return true;
        } else {
            return false;
        }
    }
}
// Sử dụng lớp Person
$person = new Person();

$person->setName("Thepv");
$person->setAge(25);
$person->setAddress("123 Main Street, City");

// Hiển thị thông tin người và kiểm tra xem có thể bỏ phiếu không
echo $person->getInfo() . "<br>";

if ($person->canVote()) {
    echo "This person can vote.";
} else {
    echo "This person cannot vote.";
}

?>