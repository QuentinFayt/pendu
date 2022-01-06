<?php

use gamecontroller\GameController;

if (isset($_POST["gameType"]) && isset($_POST["difficulty"]) && isset($_POST["help"])) {
    $game = new GameController(DICTIONNARY);
    $game->__set("gameType", userEntryProtection($_POST["gameType"]));
    if ($_POST["gameType"] === "duo") {
        $round = empty($_POST["round"]) ? "1" : $_POST["round"];
        $round = $round > 0 && $round < 11 ? $round : "1";
        $game->__set("round", $round);
    }
    $game->__set("difficulty", userEntryProtection($_POST["difficulty"]));
    $game->__set("help", userEntryProtection($_POST["help"]));
}
