<?php 

class TournamentClass
{
    protected $name;
    protected $location;
    protected $starting_date;
    protected $ending_date;
    protected $teams;

    public function __construct($name, $location, $starting_date, $ending_date, $teams) 
    {
        $this->name = $name;
        $this->location = $location;
        $this->starting_date = $starting_date;
        $this->ending_date = $ending_date;
        $this->teams = $teams;
    }

    private function match($team1, $team2) {
        $teams = [$team1, $team2];
        $win = array_rand($teams);
        $teams[$win]->addScore(10);
        echo $teams[$win]->name . "à gagné";
        return $teams[$win];
    }

    public function startTournament() {
        for ($i = 0; $i < count($this->teams); $i++) {
            for ($j = 0; $j < count($this->teams); $j++) {
                if ($i != $j) {
                    $this->match($this->teams[$i], $this->teams[$j]);
                }
            }
        }
    }

};