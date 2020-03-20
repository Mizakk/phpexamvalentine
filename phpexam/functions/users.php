<?php
require_once __DIR__ . '/db.php';

/**
 * Récupère toutes les users et les renvoies sous forme de tableau
 * @var string $activated "all"|"activated"|"not_activated"
 * @return void
 */
function getUsers(string $activated, ?string $search = null): array
{
  $pdo = getPdo();
  $query = "SELECT * FROM user";


  if ($activated == "activated") {
    $query .= " WHERE activated = 1";
  }

  if ($activated == 'not_activated') {
    $query .= " WHERE activated = 0";
  }

  if ($search !== null) {
    $query = $query . "AND nom LIKE :search";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['search' => "%$search%"]);
  } else {
    $stmt = $pdo->query($query);
  }

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Récupère un user sous forme de tableau
 *
 * @param integer $id
 * @return array
 */
function getUser(int $id): ?array
{
  $pdo = getPdo();
  $query = "SELECT * FROM user WHERE id = :id";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['id' => $id]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
    return null;
  }

  return $row;
}

function insertUser(string $nom, string $email): bool
{

  // Récupération d'une instance de PDO
  $pdo = getPdo();

  // Définition, préparation et exécution de la requête
  $query = "INSERT INTO user (nom, email) VALUES (:nom, :email)";
  $stmt = $pdo->prepare($query);
  return $stmt->execute([
    'nom' => $nom,
    'email' => $email,
  ]);
}

function updateUser(int $id, string $nom, string $email, int $activated = 0): bool
{
  // Récupération d'une instance de PDO
  $pdo = getPdo();

  // Définition, préparation et exécution de la requête
  $query = "UPDATE user SET nom = :nom, email = :email, activated= :activated WHERE id=:id";
  $stmt = $pdo->prepare($query);
  return $stmt->execute(array(':nom' => $nom, ':email' => $email, ':activated' => $activated, ':id' => $id));
}