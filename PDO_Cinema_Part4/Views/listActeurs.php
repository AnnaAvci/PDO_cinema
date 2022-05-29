
<?php

ob_start() ?>

<h1>Liste des acteurs</h1>


<div id="listActeurs">
<?php  foreach($stmt->fetchAll() as $acteur): ?>
   
  <a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"class = "acteur"><i class="fa-solid fa-masks-theater"></i><br>

<?=$acteur["prenom_acteur"].' '.$acteur["nom_acteur"];?></a>
  

<?php endforeach; ?> 
</div>
<?php

    $title = "Liste des acteurs";
    $content = ob_get_clean();
    require "template.php";



