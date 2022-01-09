<?php

namespace dictionnary;

class Dictionnary
{
    private $wordList = null;

    public function __construct(array $wordList)
    {
        $this->wordList = $wordList;
    }

    public function getWord(): string
    {
        return utf8_encode(strtolower($this->wordList[mt_rand(0, (count($this->wordList) - 1))]));
    }
}
