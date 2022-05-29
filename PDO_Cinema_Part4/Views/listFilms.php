<?php
ob_start() ?>

<h1>Liste des films</h1>

<div id="listFilms">
<?php
    foreach($stmt->fetchAll() as $film): ?>
    <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"class = "film"><i class="fa-solid fa-clapperboard"></i><br><?= $film["titre_film"]; ?></a><br>
<?php endforeach; ?> 
</div>
<?php

$title = "Liste des films";
$content = ob_get_clean();
require "template.php";



