<?php

namespace gamecontroller;

use dictionnary\Dictionnary;

class GameController
{
    private $gameType = null;
    private $difficulty = null;
    private $help = null;
    private $round = null;
    private $word = null;
    private $wordLength = null;

    public function __set(string $property, string $value)
    {
        switch ($property) {
            case "gameType":
                $this->gameType = $value === "duo" ? "duo" : "solo";
                break;
            case "difficulty":
                $this->difficulty = $value === "easy" ? "easy" : "hard";
                break;
            case "help":
                $this->help = $value === "false" ? false : true;
                break;
            case "round":
                $this->round = (int) $value;
                break;
        }
        $this->word = (new Dictionnary(DICTIONNARY))->getWord();
        $this->wordLength = strlen($this->word);
    }
    public function __get(string $name)
    {
        return $this->$name;
    }
    public function checkConfiguration()
    {
        if (!is_null($this->gameType)) {
            if ($this->gameType === "duo") {
                return !empty($this->round) && !is_null($this->difficulty) && !is_null($this->help);
            } else {
                return !is_null($this->difficulty) && !is_null($this->help);
            }
        }
    }
}
