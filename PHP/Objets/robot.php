<?php

class robot
{
    public $name;
    public $color;
    public $height;

    public $width;

    public function __construct($robotName, $robotColor, $robotHeight){
        $this->name = $robotName;
        $this->color = $robotColor;
        $this->height = $robotHeight;
    }

    public function sayHello(){
        echo '<h1>Hello, my name is ' . $this->name . '</h1>';
    }

    public function calc($a,$b){
        echo "<span>" . $a*$b . "</span>";
    }
}

class dog
{
    public $name;
    public $height;
    public $birthDay;
    public $breed;
    private $ownerName;
    private $ownerFirstName;

    public function __construct($dogName, $dogHeight, $dogBirthDay, $dogBreed){
        $this->name = $dogName;
        $this->height = $dogHeight;
        $this->birthDay = $dogBirthDay;
        $this->breed = $dogBreed;
    }

    public function setOwner($ownerName, $ownerFirstName){
        $this->ownerName = $ownerName;
        $this->ownerFirstName = $ownerFirstName;
    }

    public function getOwnerName(){
        return $this->ownerName;
    }

    public function dogBarks(){
        echo "<audio autoplay controls>
                <source src='chienquiaboie.wav' type='audio/wav'>
              </audio>";
    }

}
