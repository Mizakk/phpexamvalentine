<?php
require_once '../../functions/db.php';
require_once '../../functions/utils.php';

$pdo = getPdo();
$login = ""; //chaine vide comme appris
$error = false;

if (!empty($_POST['login']) && !empty($_POST['password'])) {
  session_start();
  $login = $_POST['login'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE login = :login";
  $stmt = $pdo->prepare($query);
  $stmt->execute([
    'login' => $login
  ]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($row && password_verify($password, $row['password'])) {
    $_SESSION['state'] = 'connected';
    // Enregistrer l'ID de l'utilisateur connecté en session
    $_SESSION['user_id'] = $row['ID'];
    redirect('/admin');
  } else {
    $error = true;
  }
} 
require_once '../../views/layout/header.php';
?>

<h1>Connexion</h1>
<h4>Identifiez-vous pour accéder à l'administration</h4>

<?php if ($error) { ?>
  <div class="alert alert-danger" role="alert">
    Les informations fournies n'ont pas permis de vous identifier
  </div>
<?php } ?>

<form method="POST">
  <div class="form-group">
    <label for="login">Login</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Login..." value="<?php echo $login; ?>" />
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe..." />
  </div>
  <button type="submit" class="btn btn-primary">Connexion</button>
</form>

<?php require_once '../../views/layout/footer.php'; ?>