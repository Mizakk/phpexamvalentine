<?php
require_once __DIR__ . '/db.php';

$reqnewsletter = $pdo->prepare("SELECT * FROM newsletter");
$reqnewsletter->execute(array($_SERVER['REMOTE_ADDR']));
$newsletterexist = $reqnewsletter->rowCount();
if(isset($_POST['newsletterform'])){
   if(isset($_POST['newsletter'])){
      if(!empty($_POST['newsletter'])){
        $newsletter = htmlspecialchars($_POST['newsletter']);
         if(filter_var($newsletter, FILTER_VALIDATE_EMAIL)) {
            $stmt = $pdo->prepare('INSERT INTO newsletter(email) VALUES (?)');
            } else {
            $erreur = "Vous êtes déjà inscrit à la Newsletter..";
            }
        } else {
            $erreur = "Vous êtes déjà inscrit à la Newsletter..";
        }
    } else {
        $erreur = "Vous devez indiquer une adresse e-mail..";
        }
} else {
    $erreur = "Champs manquants..";
    }

?>