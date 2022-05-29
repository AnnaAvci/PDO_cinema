<?php ob_start(); ?>

<h1>Ajouter un film</h1>

<form action="index.php?action=ajouterFilm" method="POST">
    <label for="titre_film">Titre du film: <br>
    <input type="text" name="titre_film" id="titre_film"><br>
    </label>
    <label for="annee_sortie">Année de sortie: <br>
        <input type="text" name="annee_sortie" id="annee_sortie"><br>
    </label>
    <label for="duree_min">Durée en minutes: <br> 
        <input type="text" name="duree_min" id="duree_min"><br>
    </label>
    <label for="id_realisateur">Réalisateur: <br>
    <select name="id_realisateur" id="id_realisateur">
    <?php
        foreach ($stmtRealisateur->fetchAll() as $id_realisateur) { ?>
          <option value="<?= $id_realisateur["id_realisateur"] ?>"><?= $id_realisateur["nom_realisateur"] ?></option>
    </label> 
    <?php } ?>
    </select>
    </label> <br>
    <label for="synopsis">Synopsis: <br> 
        <textarea name="synopsis" id="synopsis"></textarea> <br>
    </label> <br>
    <input type="submit" name="submit" value="Envoyer">
</form>

<?php

    $title = "Ajouter un acteur";
    $content = ob_get_clean();
    require "template.php";

