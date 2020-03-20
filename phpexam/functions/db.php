<?php
/**
 * Une petite fonction, sans objet, pour récupérer une instance de PDO
 *
 * @return PDO
 */
function getPdo(): PDO
{
  try {
    $pdo = new PDO(
      "mysql:host=localhost;dbname=phpexam",
      "root"
    );
    return $pdo;
  } catch(PDOException $ex) {
    exit("Erreur lors de la connexion à la base de données");
  }
}