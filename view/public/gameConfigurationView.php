<?php
?>

<main>
    <h1>Configuration de la partie</h1>
    <form method="post">
        <fieldset>
            <legend>Type de partie</legend>
            <label for="solo">Solo</label>
            <input type="radio" name="gameType" value="solo" id="solo" checked />
            <label for="duo">Duo</label>
            <input type="radio" name="gameType" value="duo" id="duo" />
        </fieldset>
        <fieldset>
            <legend>Number of rounds</legend>
            <label for="round">Pick a number of rounds</label>
            <input type="number" name="round" id="round" min="1" max="10" placeholder="1" step="1" checked />
        </fieldset>
        <fieldset>
            <legend>Difficulté</legend>
            <label for="easy">Facile</label>
            <input type="radio" name="difficulty" value="easy" id="easy" checked />
            <label for="hard">Difficile</label>
            <input type="radio" name="difficulty" value="hard" id="hard" />
        </fieldset>
        <fieldset>
            <legend>Aide mémoire</legend>
            <label for="yes">Oui</label>
            <input type="radio" name="help" value="true" id="yes" checked />
            <label for="no">Non</label>
            <input type="radio" name="help" value="false" id="no" />
        </fieldset>
        <div>
            <input type="submit" value="Envoyer" />
        </div>
    </form>
</main>