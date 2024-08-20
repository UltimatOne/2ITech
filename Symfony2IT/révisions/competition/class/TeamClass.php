<?php 

class TeamClass
{
    public $name;
    private $country;
    private $athletes;
    private $score;
    public function __construct($name, $country, $athletes, $score) {
        $this->name = $name;
        $this->country = $country;
        $this->athletes = $athletes;
        $this->score = $score;
    }

    public function addScore($score) {
        $this->score += $score;
    }
}