<?php
?>
<main>
    <h1>Pendu</h1>
    <img src="./assets/img/Capture.jpg" alt="hangman" />
    <h2>Mot: <?= $game->__get("hiddenWord") ?>
    </h2>
    <h3>Longueur du mot: <?= $game->__get("wordLength") ?> lettres</h3>
    <h3>Nombre de lettres que vous avez deviné: 0</h3>
    <h3>Nombre de lettres qu'il vous reste à deviner: <?= $game->__get("wordLength") ?></h3>
    <h3>Il reste <?= $game->__get("difficulty") === "hard" ? 15 : 10; ?> coups</h3>
    <?php
    if ($game->__get("help")) {
    ?>
        <h3>Lettres que vous avez tentés:</h3>
    <?php
    }
    ?>
    <form method="POST">
        <label for="letter">Prochaine lettre:</label>
        <input type="text" maxlength="1" minlength="1" id="letter" />
        <label for="word">Vous avez devinez le mot? </label>
        <input type="text" id="word" />
    </form>
</main>
<script src="./assets/js/game/classes/Game.js"></script>
<script src="./assets/js/game/public_game.js"></script>