<?php

namespace Controller;
// require_once "./Model/Connect.php";
use Model\Connect;

class FilmController {

    /**
     * Afficher la liste des films
     * index.php?action=listFilms
     */
    public function listFilms() {

        // on se connecte à la base de données
        $pdo = Connect::seConnecter();
        // on stocke la requête SQL dans une variable
        $sql = 'SELECT * 
                FROM film 
                ORDER BY titre_film';
        // on exécute la requête
        $stmt = $pdo->query($sql);
        // on cible la vue dans laquelle on souhaite afficher le résultat
        require "./Views/listFilms.php";
    }

    /**
     * Afficer le détail d'un lieu + liste des personnages y habitant
     * index.php?action=detailLieu&id=XX
     */
    public function detailFilm($id) {

        $pdo = Connect::seConnecter();

        // récupérer toutes les infos d'un lieu spécifique
        $sql1 = 'SELECT * 
                FROM film 
                WHERE id_film = :id';
        $stmt = $pdo->prepare($sql1);
        $stmt->execute([
            ":id" => $id
        ]);

        // récupérer tous les personnages habitant le lieu passé en paramètre
        $sql2 = 'SELECT titre_film, prenom_acteur, nom_acteur, role.nom_role 
                FROM acteur 
                INNER JOIN casting ON acteur.id_acteur = casting.id_acteur
                INNER JOIN role ON role.id_role = casting.id_role
                INNER JOIN film ON film.id_film = casting.id_film
                WHERE casting.id_film = :id';
        // on prépare la requête SQL
        $stmtFilm = $pdo->prepare($sql2);
        // on exécute la requête SQL en associant le champ paramétré ":id" à la valeur de $id (dans les paramètres de la fonction)
        $stmtFilm->execute([
            ":id" => $id
        ]);

        require "./Views/detailFilm.php";
    }


    public function ajouterFilm() {

        $pdo = Connect::seConnecter();
        // $stmt = $pdo->query("SELECT * FROM film");
        $stmtRealisateur = $pdo->query("SELECT * FROM realisateur");

        // si on soumet le formulaire
        if(isset($_POST["submit"])) {

            // nettoyage du champ
            $titre_film = filter_input(INPUT_POST, "titre_film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $annee_sortie = filter_input(INPUT_POST, "annee_sortie", FILTER_SANITIZE_NUMBER_INT);
            $duree_min = filter_input(INPUT_POST, "duree_min", FILTER_SANITIZE_NUMBER_INT);
            $id_realisateur = filter_input(INPUT_POST, "id_realisateur", FILTER_SANITIZE_NUMBER_INT);
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // si le filtre est valide, on ajoute le lieu en base de données
            if($titre_film && $annee_sortie && $duree_min && $id_realisateur && $synopsis) {
                $sql = 'INSERT INTO film (titre_film, annee_sortie, duree_min, id_realisateur,synopsis) 
                            VALUES (:titre_film, :annee_sortie, :duree_min, :id_realisateur, :synopsis)';
            
                $stmtFilm = $pdo->prepare($sql);
                $stmtFilm->execute([
                    ":titre_film" =>  $titre_film,
                    ":annee_sortie" => $annee_sortie,
                    ":duree_min" => $duree_min,
                    ":id_realisateur" => $id_realisateur,
                    ":synopsis" => $synopsis

                ]);

                // redirection vers la liste des lieux
                header("Location: index.php?action=listFilms");
            }
        }

        require "./Views/ajouterFilm.php";
    }
}
