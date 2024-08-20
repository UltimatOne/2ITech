<?php 

class AthleteClass
{
    private $firstname;
    private $lastname;
    private $birthday;
    private $discipline;

    public function __construct($firstname, $lastname, $birthday, $discipline) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthday = $birthday;
        $this->discipline = $discipline;
    }

}