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
    private $separators = [" ", "-", "'"];
    private $separatorList = null;
    private $hiddenWord = null;

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
    }
    public function __get(string $name)
    {
        return $this->$name;
    }
    public function checkConfiguration()
    {
        if (!is_null($this->gameType)) {
            if ($this->gameType === "duo") {
                if (!empty($this->round) && !is_null($this->difficulty) && !is_null($this->help)) {
                    $this->loadWord();
                    return true;
                }
            } else {
                $this->loadWord();
                return !is_null($this->difficulty) && !is_null($this->help);
            }
        }
    }
    private function separator(string $word, array $separators): array
    {
        static $sepPos = [];
        $sepPos = array_replace($sepPos, ["word" => $word]);
        foreach ($separators as $separator) {
            if (strpos($word, $separator) !== false) {
                $pos = strpos($word, $separator);
                $sepPos = array_replace($sepPos, ["$pos" => "$separator"]);
                $word = substr_replace($word, ".", $pos, 1);
                $sepPos = array_replace($sepPos, $this->separator($word, [$separator]));
            }
        }
        return $sepPos;
    }

    static function writeHiddenWord(array $word, array $separatorList): string
    {
        $hiddenWord = "";
        $count = 0;
        $separatorList = array_slice($separatorList, 1, null, true);
        ksort($separatorList);
        if (count($separatorList)) {
            foreach ($separatorList as $key => $separator) {
                if (!$count) {
                    $hiddenWord .= str_repeat("_", (int) $key) . "$separator";
                } else {
                    $hiddenWord .= str_repeat("_", ((int)$key) - strlen($hiddenWord)) . "$separator";
                }
                $count++;
                $hiddenWord .= str_repeat("_", (strlen($word[$count])));
            }
        } else {
            $hiddenWord .= str_repeat("_", strlen($word[0]));
        }
        return $hiddenWord;
    }

    private function loadWord()
    {
        $tempWord = userEntryProtection((new Dictionnary(DICTIONNARY))->getWord(), ENT_COMPAT);
        $this->separatorList = $this->separator($tempWord, $this->separators);
        $this->word = explode(".", $this->separatorList["word"]);
        $this->hiddenWord = $this->writeHiddenWord($this->word, $this->separatorList);
        if (count($this->word) > 1) {
            foreach ($this->word as $word) {
                $this->wordLength += strlen($word);
            }
        } else {
            $this->wordLength = strlen($this->word[0]);
        }
        $_SESSION["word"] = $this->word;
    }
}
