<?php 
class Person {
    public $name;
    public $age;
    public $address;
    public function setName($name){
        $this->name = $name;
    }
    public function setAge($age){
        $this->age = $age;
    }
    public function setAddress($address){
        $this->address = $address;
    }
    public function getInfo(){
        return "Name:" .$this->name . "<br>" . 
                "Age:" .$this->age . "<br>" . 
                "Address:" .$this->address; 
    }
    public function canVote(){
        if($this->age >= 18){
            return true;
        } else {
            return false;
        }
    }
}
    $person = new Person();
    $person ->setName("conkhung");
    $person ->setAge(18);
    $person ->setAddress("ag St");

    echo $person ->getInfo() . "<br>";
    if($person ->canVote()){
        echo "This person can vote.";
    } else {
        echo "This person cannot vote.";
    }
