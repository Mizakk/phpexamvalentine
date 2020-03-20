<?php
require_once '../../functions/utils.php';
session_start();
if(isset($_SESSION['state']) && $_SESSION["state"] == "connected") {
  echo "Vous êtes connecté";
} else {
  redirect('/public/admin/login.php');
}

require_once '../../functions/users.php';
require_once '../../views/layout/header.php';

$activated = $_GET['activated'] ?? "all";
$users = getUsers($activated);
?>

<h1>Administration - Liste des utilisateurs</h1>

<form>
  <div class="form-group">
    <label for="activated">Filtrer</label>
    <select class="form-control" id="activated" name="activated">
      <option value="all" <?php if ($activated == "all") { ?>selected="selected" <?php } ?>>
        Tous les utilisateurs
      </option>
      <option value="activated" <?php if ($activated == "activated") { ?>selected="selected" <?php } ?>>
        Utilisateurs activés
      </option>
      <option value="not_activated" <?php if ($activated == "not_activated") { ?>selected="selected" <?php } ?>>
        Utilisateurs désactivés
      </option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Appliquer</button>
</form>

<table class="table table-striped">
  <thead>
    <tr>
      <th></th>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Activé</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) { ?>
      <tr>
        <td><a href="/admin/edit.php?id=<?php echo $user['ID']; ?>" class="btn btn-warning">Editer</a></td>
        <td><?php echo $user['ID']; ?></td>
        <td><?php echo $user['nom']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td>
          <?php if ($user['activated'] == 1) { ?>
            <span class="badge badge-success">OUI</span>
          <?php } else { ?>
            <span class="badge badge-danger">NON</span>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php require_once '../../views/layout/footer.php';