<?php

namespace Model;

abstract class Connect {

    /**
     * Connexion à la base de données
     */
    public static function seConnecter() {
        
        try {
            $pdo = new \PDO('mysql:host=localhost;port=3306;dbname=cinema', 'root', '', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch (\PDOException $error) {
            echo $error->getMessage();
            die;
        }

        return $pdo;
    }
}
