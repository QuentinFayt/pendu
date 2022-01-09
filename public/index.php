<?php
session_start();
require_once "../config/config.php";

require_once "../model/Dictionnary.php";

require_once "../controller/helper.php";
require_once "../controller/GameController.php";
require_once "../controller/mainController.php";

include "../view/head.php";
include "../view/public/" . (isset($game) && $game->checkConfiguration() ? "public_room" : "gameConfigurationView") . ".php";
include "../view/foot.php";
