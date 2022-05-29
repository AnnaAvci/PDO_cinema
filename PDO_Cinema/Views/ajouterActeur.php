<?php ob_start(); ?>

<h1>Ajouter un acteur</h1>
<div id="form">
<form action="index.php?action=ajouterActeur" method="POST">
    <label for="nom_acteur">Nom: <br>
    <input type="text" name="nom_acteur" id="nom_acteur"><br>
    </label>
    <label for="prenom_acteur">Prénom: <br>
        <input type="text" name="prenom_acteur" id="prenom_acteur"><br>
    </label>
    <label for="sexe_acteur">Homme/Femme: <br> 
        <input type="text" name="sexe_acteur" id="sexe_acteur"><br>
    </label>
    <label for="date_naissance">Date de Naissance: <br>
        <input type="text" name="date_naissance" id="date_naissance"><br>
    </label>
    <input type="submit" name="submit" value="Envoyer">


</form>
</div>
<?php

    $title = "Ajouter un acteur";
    $content = ob_get_clean();
    require "template.php";

