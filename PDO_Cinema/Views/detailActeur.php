<?php 
  ob_start();

$acteur = $stmt->fetch(); ?>

<h1><?= $acteur["prenom_acteur"].' '.$acteur["nom_acteur"] ?></h1>
<table>
    <thead>
        <tr>
            <td>
                <strong> Filmographie:</strong>
            </td>
            <td>
                <strong>Roles:</strong>    
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
<?php while($film = $stmtActeur->fetch()) { ?>
                        <td><?=$film['titre_film']?></td>
                        <td><?=$film['nom_role']?></td>
                      
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                   
<?php
$title = "Infos sur l'acteur";
$content = ob_get_clean();
require "template.php";







