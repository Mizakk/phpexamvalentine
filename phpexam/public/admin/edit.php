<?php
require_once '../../functions/users.php';
require_once '../../views/layout/header.php';
?>

<h1>Editer un utilisateur</h1>

<?php if (!isset($_GET['id'])) { ?>
  <div class="alert alert-danger" role="alert">
    Paramètre manquant : id
  </div>
  <?php
  exit;
}

// Si on arrive à ce stade du script, alors on n'est pas rentré dans le if
// Donc cela signifie qu'on a un paramètre GET id
$id = $_GET['id'];

if (isset($_POST['nom']) && isset($_POST['email'])) {
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $visible = isset($_POST['visible']) ? 1 : 0;

  $update = updateUser(
    $id,
    $nom,
    $email,
    $visible
  );
  
  var_dump($update);
}

$user = getUser($id);

if ($user == null) {?>
  <div class="alert alert-danger" role="alert">
    L'utilisateur demandé n'existe pas
  </div>
  <?php
  exit;
}

?>

<form method="POST">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom..." value="<?php echo $user['nom']; ?>" />
  </div>
  <div class="form-group">
    <label for="email">email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email..." value="<?php echo $user['email']; ?>" />
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="activated" name="activated" <?php if ($user['activated'] == 1) { ?>checked<?php } ?> />
    <label class="form-check-label" for="activated">activated</label>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
require_once '../../views/layout/footer.php';