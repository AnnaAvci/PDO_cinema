<?php 
namespace ActeurController;
// require_once "./Model/Connect.php";
use Model\Connect;


$film = $stmt->fetch(); ?>

<h1><?= $film["titre_film"] ?></h1>
<table>
    <thead>
        <tr>
            <td>
                <strong> Acteurs:</strong>
            </td>
            <td>
                <strong>Roles:</strong>    
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
<?php while($filmcast = $stmtFilm->fetch()) { ?>
                        <td><?=$filmcast['nom_acteur'].' '.$filmcast['prenom_acteur']?></td>
                        <td><?=$filmcast['nom_role']?></td>
                      
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                   

<?php
$title = "Infos sur le film";
$content = ob_get_clean();
require "template.php";






