<?php

class Person {
    private $email,$name;
    public static $age = 40;

    public function __construct($name = NULL, $email = NULL) {
        $this->name = $name;
        $this->email = $email;
        echo __CLASS__." constructor<br>";
    }

    public function __destruct() {
        echo __CLASS__." destroy<br>";
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name . "<br>";
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email . "<br>";
    }

    public function getAge() {
        return self::$age;
    }

}

class Customer extends Person  {
    private $balance;

    public function __construct($name = NULL, $email = NULL, $balance) {
        parent:: __construct($name, $email, $balance);
    }

    public function setBalance($balance) {
        $this->balance = $balance;
    }

    public function getBalance() {
        return $this->balance . "<br>";
    }
}


$person1 = new Person('amang' , 'amang@mail.com');
echo $person1->getName();

$person2 = new Person();
echo $person2->getName();
// $person1->setName("amang");

// echo $person1->getName();$name 

$customer1 = new Customer('amang' , 'amang@mail.com', 300);
echo $customer1->name;

echo Person::$age;


echo Person::getAge();

?>