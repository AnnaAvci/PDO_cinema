<?php
namespace Controller;
// require_once "./Model/Connect.php";
use Model\Connect;


class ActeurController {

    public function listActeurs() {

        // on se connecte à la base de données
        $pdo = Connect::seConnecter();
        // on stocke la requête SQL dans une variable
        $sql = 'SELECT * 
                FROM acteur 
                ORDER BY nom_acteur';
        // on exécute la requête
        $stmt = $pdo->query($sql);
        // on cible la vue dans laquelle on souhaite afficher le résultat
        require "./Views/listActeurs.php";
    }

    public function detailActeur($id) {

        $pdo = Connect::seConnecter();

        // récupérer toutes les infos d'un lieu spécifique
        $sql1 = 'SELECT * 
                FROM acteur 
                WHERE id_acteur = :id';
        $stmt = $pdo->prepare($sql1);
        $stmt->execute([
            ":id" => $id
        ]);

        // récupérer tous les personnages habitant le lieu passé en paramètre
        $sql2 = 'SELECT prenom_acteur, nom_acteur, role.nom_role, titre_film 
                FROM acteur 
                INNER JOIN casting ON acteur.id_acteur = casting.id_acteur
                INNER JOIN role ON role.id_role = casting.id_role
                INNER JOIN film ON film.id_film = casting.id_film
                WHERE casting.id_acteur = :id';
        // on prépare la requête SQL
        $stmtActeur = $pdo->prepare($sql2);
        // on exécute la requête SQL en associant le champ paramétré ":id" à la valeur de $id (dans les paramètres de la fonction)
        $stmtActeur->execute([
            ":id" => $id
        ]);

        require "./Views/detailActeur.php";
    }


    public function ajouterActeur() {

        $pdo = Connect::seConnecter();
        $stmtActeur = $pdo->query("SELECT * FROM acteur");
     

        // si on soumet le formulaire
        if(isset($_POST["submit"])) {

            // nettoyage du champ
            $nom_acteur = filter_input(INPUT_POST, "nom_acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom_acteur = filter_input(INPUT_POST, "prenom_acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexe_acteur = filter_input(INPUT_POST, "sexe_acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date_naissance = filter_input(INPUT_POST, "date_naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        

            // si le filtre est valide, on ajoute le lieu en base de données
            if($nom_acteur && $prenom_acteur && $sexe_acteur && $date_naissance) {
                $sql = 'INSERT INTO acteur (nom_acteur, prenom_acteur, sexe_acteur, date_naissance) 
                            VALUES (:nom_acteur, :prenom_acteur, :sexe_acteur, :date_naissance)';
            
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ":nom_acteur" => $nom_acteur,
                    ":prenom_acteur" => $prenom_acteur,
                    ":sexe_acteur" => $sexe_acteur,
                    ":date_naissance" => $date_naissance
                ]);

                // redirection vers la liste des acteurs
                header("Location: index.php?action=listActeurs");
            }
        }

        require "./Views/ajouterActeur.php";
    }
}



 


