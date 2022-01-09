<?php
session_start();

require "../../../controller/helper.php";

if (isset($_GET["letter"]) || isset($_GET["word"])) {
    require "../../../controller/mainController.php";
}
