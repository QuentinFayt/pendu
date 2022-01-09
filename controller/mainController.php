<?php

use gamecontroller\GameController;

if (isset($_POST["gameType"]) && isset($_POST["difficulty"]) && isset($_POST["help"])) {
    $game = new GameController;
    $game->__set("gameType", userEntryProtection($_POST["gameType"]));
    if ($_POST["gameType"] === "duo") {
        $round = empty($_POST["round"]) ? "1" : $_POST["round"];
        $round = $round > 0 && $round < 11 ? $round : "1";
        $game->__set("round", $round);
    }
    $game->__set("difficulty", userEntryProtection($_POST["difficulty"]));
    $game->__set("help", userEntryProtection($_POST["help"]));
}
if (isset($_GET["letter"]) || isset($_GET["word"])) {
    $keys = array_keys($_GET);
    $key = $keys[0];
    $userEntry = [$key => userEntryProtection($_GET["$key"])];
    $accentLetters = ["é", "è", "ê", "ë"];
}
if (isset($userEntry["letter"])) {
    if ($userEntry["letter"]) {
    }
    echo json_encode(["word" => $_SESSION["word"], "contains" => strpos($_SESSION["word"], $userEntry["letter"])]);
}
if (isset($userEntry["word"])) {
    echo json_encode(["word" => $_SESSION["word"] === $userEntry["word"]]);
}
